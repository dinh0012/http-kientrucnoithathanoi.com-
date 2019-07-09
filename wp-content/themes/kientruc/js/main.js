$(function(){
    var swiper = new Swiper('#trust', {
        pagination: '',
        slidesPerView: 6,
        paginationClickable: true,
        spaceBetween: 20,
        loop:true,
        slideToClickedSlide: true,
        navigation: {
            nextEl: '.trust-button-next',
            prevEl: '.trust-button-prev',
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 30
            }
        }
    });
    var swiper = new Swiper('.projectslide', {
        pagination: '.swiper-pagination',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 2,
        spaceBetween: -30,
        loop:true,
        navigation: {
            nextEl: '.arrow-proj-next',
            prevEl: '.arrow-proj-prev',
        },

        breakpoints: {
            577: {
                slidesPerView: 1,
                spaceBetween: 20,
                effect: 'slide',
            },
            3000:{
                coverflow: {
                    rotate: 0,
                    stretch: 100,
                    depth: 100,
                    modifier: 0,
                    slideShadows : true
                }
            }
        }
    });
    $('#bigslideshow').flexslider({
        animation: "slide",
        slideshowSpeed: 5000,
        animationDuration: 600,
        start: function(slider){}
    });
});
