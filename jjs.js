var swiper = new Swiper(".slide-content",{
    
    slidesPerView: 3,
    spaceBetween: 25,
    // slidesPerGroup: 3,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    // loopFillGroupWithBlank: true,
    centerSlide: 'true',
    fade: 'true',
    gragCursor: 'true',
    pagination: {
        el:".swiper-pagination",
        clickable: true,
        dynamicBullets: true, 
    },
    navigation:{
        prevEl:".swiper-button-next",
        nextEl:".swiper-button-prev",
    },

    breakpoints:{
        0:{
            slidesPerView: 1, 
        },
        520:{
            slidesPerView: 2, 
        },
        950:{
            slidesPerView: 3, 
        },
    },
    
});