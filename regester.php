<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <!-- <link rel="stylesheet" href="css/regester.css"> -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="font/fonts.css">
  <title>regester</title>

  <style>
 <?php 
   include('css/regester.css');
 ?>
</style>
</head>

<body>
  <div class="container">
    <h2>تسجيل كمزود خدمة</h2>
    <div class="form-container">
      <a href="login.html" class="login">تسجيل دخول</a>
      <form action="php/add_provider.php" method="post" enctype="multipart/form-data">

        <div class="input-name">
          <i class="fa fa-user lock m"></i>
          <input  name="name" type="text" placeholder="الاسم كامل" id="name" class="name1">
        </div>
        <div class="input-name">
          <!-- <i class="fa fa-user lock mm"></i> -->
          <i class="fa-solid fa-phone lock mm m"></i>
          <input  name="phone" type="text" placeholder="رقم الهاتف" id="phone" class="name ">
          <span>
            <!-- //! يتم حذف  هذا الحقل ويحل مكانة حق اخيار الصورة -->
            <i class="fa-solid fa-image lock ma"></i>
            <input required name="picture" type="file" accept="image/*" placeholder="Choose an image" id="imageInput" class="pic">

          </span>
        </div>
        
        <div class="input-name">
          <i class="fa fa-user lock m"></i>
          <input required name="id_card" type="text" placeholder="رقم البطاقة الشخصية" id="" class="address">
        </div>
        <div class="input-name">
          <i class="fa fa-user lock mm m"></i>
          <input required name="city" type="text" placeholder="المدينة" id="city" class="name ">

          <span>
            <i class="fa fa-user lock m"></i>
            <input required name="street" type="text" placeholder="الشارع" id="street" class="name">
          </span>
        </div>


        <div class="input-name">
          <label for="">تحديد فئة</label>
          <select   name="category" id="categories" class="kind">

            <!-- get category from DB -->
            <?php
            include_once('php/connect.php');

            if ($con) {
              $categoryQuery = $con->prepare("SELECT * FROM category");

              // Execute the statement and check for errors
              if (!$categoryQuery->execute()) {
                error_log("Failed to execute category query: " . $categoryQuery->errorInfo());
                exit;
              }

              // Fetch rows one at a time using fetch()
              while ($row = $categoryQuery->fetch()) {
                echo "<option value='" . htmlspecialchars($row[0]) . "'>" . htmlspecialchars($row[1]) . "</option>";
              }
            }
            ?>

          </select>
          <span>
            <label for="">تحديد خدمة</label>
            <select  name="service" id="services" class="servises">
            <?php
            include_once('php/connect.php');

            if ($con) {
              $categoryQuery = $con->prepare("SELECT * FROM service where category = 1");

              // Execute the statement and check for errors
              if (!$categoryQuery->execute()) {
                error_log("Failed to execute category query: " . $categoryQuery->errorInfo());
                exit;
              }

              // Fetch rows one at a time using fetch()
              while ($row = $categoryQuery->fetch()) {
                echo "<option value='" . htmlspecialchars($row[0]) . "'>" . htmlspecialchars($row[1]) . "</option>";
              }
            }
            ?>
            </select>
          </span>
        </div>

    

    


   

        <div class="input-name">
          <input type="submit" value="ارسال" class="button">
        </div>

      </form>
    </div>
  </div>
</body>
 <script src="func/function.js"></script>
<script>
  // fetch('https://localhost/ser/catagry/get_categories.php')
  //   .then(response => response.json())
  //   .then(data => {
  //       if (data.status === "success") {
  //           const selectElement = document.querySelector(".kind");
  //           data.categories.forEach(category => {
  //               const option = document.createElement("option");
  //               option.value = category.id; // Assuming you have an 'id' column in the category table
  //               option.text = category.name; // Assuming you have a 'name' column
  //               selectElement.appendChild(option);
  //           });
  //       } else {
  //           // Handle error, e.g., display an error message
  //           console.error("Failed to retrieve categories:", data.message);
  //       }
  //   })
  //   .catch(error => {
  //       // Handle network or other errors
  //       console.error("Error fetching categories:", error);
  //   });
</script>

</html>