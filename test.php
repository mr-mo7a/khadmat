<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdown</title>
</head>

<body>
    <label for="category">تحديد فئة</label>
    <select name="category" id="category" class="kind">
        <?php
        include_once('connect.php');

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
    <br>
    <span>
        <label for="service">تحديد خدمة</label>
        <select name="service" id="service" class="services">
            <!-- Options will be dynamically populated using JavaScript -->
        </select>
    </span>

    <script>
        // Create XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Event listener for the change event on the category dropdown
        document.getElementById('category').addEventListener('change', function () {
            // Get the selected category value
            var selectedCategory = this.value;

            document.write(selectedCategory);

            // Make an AJAX request to fetch services based on the selected category
            xhr.open('GET', 'get_service.php?category=' + selectedCategory, true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Parse the JSON response
                    var services = JSON.parse(xhr.responseText);

                    // Update the options in the services dropdown
                    var servicesDropdown = document.getElementById('service');
                    servicesDropdown.innerHTML = ''; // Clear existing options

                    // Add new options based on the fetched data
                    for (var i = 0; i < services.length; i++) {
                        var option = document.createElement('option');
                        option.value = services[i].id;
                        option.textContent = services[i].name;
                        servicesDropdown.appendChild(option);
                    }
                }
            };

            // Send the request
            xhr.send();
        });
    </script>
</body>

</html>
