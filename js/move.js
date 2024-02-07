  // قائمة بمسارات الصور
  var imagePaths = [
      "photo/handyman_services.jpg",
      "photo/GettyImages-1163763269-500px.jpg",
    "photo/it-service-ts-100688860-orig.jpg"
    // يمكنك إضافة المزيد من مسارات الصور هنا
];

// متغير لتتبع الصورة الحالية
var currentImageIndex = 0;

// الوظيفة لعرض الصورة الحالية
function showCurrentImage() {
    var currentImage = document.getElementById("current-image");
    currentImage.src = imagePaths[currentImageIndex];
}

// الوظيفة للانتقال إلى الصورة السابقة
function previousImage() {
    if (currentImageIndex > 0) {
        currentImageIndex--;
    } else {
        currentImageIndex = imagePaths.length - 1;
    }
    showCurrentImage();
}

// الوظيفة للانتقال إلى الصورة التالية
function nextImage() {
    if (currentImageIndex < imagePaths.length - 1) {
        currentImageIndex++;
    } else {
        currentImageIndex = 0;
    }
    showCurrentImage();
}

// عرض الصورة الأولى عند تحميل الصفحة
showCurrentImage();
setInterval(function() {
nextImage();
}, 3000); // 3000 مللي ثانية تعني 3 ثوانٍ