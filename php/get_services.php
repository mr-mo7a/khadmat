<?php
// Include the connection file
include_once("connect.php");
// https://localhost/khadmat/get_service.php
// Retrieve the service ID from the request (adjust method as needed)
$categoryId = $_GET['category']; // Assuming ID is received in GET request

// Validate the service ID
if (!is_numeric($categoryId) || $categoryId <= 0) {
    echo json_encode(array("status" => "error", "message" => "Invalid category ID"));
    exit;
}

// Prepare the SELECT query with a placeholder for the ID
$selectServiceQuery = $con->prepare("SELECT * FROM `service` WHERE `category` = :category");

// Bind the parameter with the service ID
$selectServiceQuery->bindParam(':category', $categoryId, PDO::PARAM_INT);

// Execute the query and handle potential errors
try {
    if (!$selectServiceQuery->execute()) {
        throw new Exception("Failed to retrieve service: " . $selectServiceQuery->errorInfo());
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(array("status" => "error", "message" => "Failed to retrieve service"));
    exit;
}

// Fetch the service based on the ID
$service = $selectServiceQuery->fetchAll(PDO::FETCH_ASSOC);

// Provide informative response with data (adjust if needed)
header('Content-Type: application/json');
if ($service) {
  echo  json_encode(array('status'=> 'success','data'=> $service));
} else {
    echo json_encode(array('status'=> 'null', 'message'=> 'no serviec'));

}
