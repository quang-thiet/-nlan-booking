$(document).ready(function(){
    $('.banner-slider').slick({
        arrows: false,
        speed: 300,
        autoplaySpeed: 4000,
        slidesToShow: 1,
        autoplay: true,
        dots: true
    })

    $('.list-news').slick({
        slidesToShow: 3,
        focusOnSelect: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
                }
            }
        ]
    })

    $('.author-list').slick({
        slidesToShow: 3,
        arrows: false,
        centerMode: true,
        infinite: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 576,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  centerMode: false
                }
            }
        ]
    })
})