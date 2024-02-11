<?php
// Include the connection file
// include_once("connect.php");
include("connect.php");



// Retrieve new provider data from request (adjust method as needed)
// address
$city = $_POST['city'];
$street = $_POST['street'];
// provider
$name = $_POST['name'];
$phone = $_POST['phone'];
$idCard = $_POST['id_card'];
$service = $_POST['service'];

$picture = $_FILES['picture'];



$errors = validateFormData();
// print_r( $errors);
if(!empty($errors)) {
    echo json_encode(array('error'=> $errors));
    exit();
}



// -------------------------------------------------------------
// image hanling
$pic = handlingPic();

// address adding 
$idAddress = setAddress();




// Prepare the statement with placeholders for values
$insertRequest = $con->prepare("INSERT INTO `proveder_requst`( `name`, `phone`, `address`, `id_card`, `date`, `service` , picture) VALUES ( :`name`, :phone, :`address`, :`id_card`, :`date`, :`service` , :`picture`)");
$date = date("Y-m-d H:i:s");
// Bind the actual values to the placeholders
$insertRequest->bindParam(":name", $name, PDO::PARAM_STR);
$insertRequest->bindParam(":phone", $phone, PDO::PARAM_STR);
$insertRequest->bindParam(":picture", $pic, PDO::PARAM_STR);
$insertRequest->bindParam(":address", $idAddress, PDO::PARAM_STR);
$insertRequest->bindParam(":id_card", $idCard, PDO::PARAM_STR);
$insertRequest->bindParam(":date", $date, PDO::PARAM_STR);  // Assuming date is stored as a string
$insertRequest->bindParam(":service", $service, PDO::PARAM_INT);

// Execute the statement and check for errors
if (!$insertRequest->execute()) {
    // Handle error appropriately, e.g., log error message or provide feedback to user
    echo json_encode(array("status" => "error"));
    exit;
}

// Get the last inserted ID if needed
$idRequest = $con->lastInsertId();





// Provide informative response
echo json_encode(array(
    "status" => "success",
    "message" => "Provider Request added successfully",
    "providerId" => $idRequest
));


function handlingPic()
{
    global $picture;
    $newFilename = uniqid() . '.' . pathinfo($picture['name'], PATHINFO_EXTENSION);

    // Move the file to the "pic" folder
    $targetPath = "../providers_pic/" . $newFilename;
    if (!move_uploaded_file($picture['tmp_name'], $targetPath)) {
        // Handle file upload error
        echo "File upload failed";
        exit;
    }
    // Save the path to $pic
    return $targetPath;
}

function setAddress()
{
    global $con , $city , $street;

    $insertAddress = $con->prepare("INSERT INTO `address`( `city`, `street`) VALUES (:city, :street)");
    $insertAddress->bindParam(":city", $city, PDO::PARAM_STR);
    $insertAddress->bindParam(":street", $street, PDO::PARAM_STR);
    // $insertAddress->execute();

    if (!$insertAddress->execute()) {
        echo json_encode(array("status" => "error"));
        exit;
    }
    return $con->lastInsertId();
}


function validateFormData() {
    global $city, $street, $name, $phone, $idCard, $category, $service, $picture;

    $errors = [];

    // Validate city and street
    if (empty($city)) {
        $errors[] = "Please enter the city.";
    }
    if (empty($street)) {
        $errors[] = "Please enter the street.";
    }

    // Validate provider information
    if (empty($name)) {
        $errors[] = "Please enter your name.";
    }
    // if (!preg_match("/^[0-9+-]+$/", $phone)) { // Basic phone number validation
    //     $errors[] = "Please enter a valid phone number.";
    // }
    if (empty($idCard)) {
        $errors[] = "Please enter your ID card number.";
    }

    if (empty($service)) {
        $errors[] = "Please select a service.";
    }


    // Validate picture
    if ($picture['error'] !== UPLOAD_ERR_OK) {
        switch ($picture['error']) {
            case UPLOAD_ERR_INI_SIZE:
                $errors[] = "File exceeds upload size limit.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $errors[] = "File exceeds form size limit.";
                break;
            case UPLOAD_ERR_PARTIAL:
                $errors[] = "File was partially uploaded.";
                break;
            // ... handle other error cases
        }
    } elseif (!in_array($picture['type'], ['image/jpeg', 'image/png'])) {
        $errors[] = "Invalid image type. Only JPEG and PNG images are allowed.";
    }

    return $errors;
}
