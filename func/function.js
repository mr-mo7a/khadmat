
document.addEventListener("DOMContentLoaded", function() {
    var categoriesSelect = document.getElementById("categories");
    var servicesSelect = document.getElementById("services");

  
    // عند تغيير خيار الخدمة
    categoriesSelect.addEventListener("change", function() {
        var category = categoriesSelect.value;
        
        // إرسال طلب AJAX لجلب الفئات المرتبطة بالخدمة المحددة
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "php/get_services.php?category=" + category, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {

           
                var response = JSON.parse(xhr.responseText);
                // console.log(response.data);
            //  return 0;   
                    // معالجة البيانات وتحديث كومبو بوكس الفئات
                    servicesSelect.innerHTML = "";
                    if(response.status == "null"){
                        var option = document.createElement("option");
                        option.value = 0;
                        option.text = "sorry no service yet!";
                        servicesSelect.appendChild(option);
                    }
                    else{
                        response.data.forEach(function(service) {
                            var option = document.createElement("option");
                            option.value = service.id;
                            option.text = service.name;
                            servicesSelect.appendChild(option);
                            console.log(service);
                        });
                    }

            }else console.error(xhr.error);
        };

        xhr.send();
    });
});


function togglePassword() {
    var passwordField = document.getElementById("password");
    var toggleIcon = document.querySelector(".toggle-icon");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleIcon.textContent = "👁️";
    } else {
      passwordField.type = "password";
      toggleIcon.textContent = "👁";
    }
  }