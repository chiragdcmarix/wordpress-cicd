jQuery(function($) {    
    $('.item-link-box-switch-images1').hover(function () {
        $(".img-element-switch-images1").css("opacity", "1");
    },
    function () {
        $(".img-element-switch-images1").css("opacity", "1");
    });

    $('.item-link-box-switch-images2').hover(function () {
        $(".img-element-switch-images2").css("opacity", "1");
    },
    function () {
        $(".img-element-switch-images2").css("opacity", "0");
    });

    $('.item-link-box-switch-images3').hover(function () {
        $(".img-element-switch-images3").css("opacity", "1");
    },
    function () {
        $(".img-element-switch-images3").css("opacity", "0");
    });

});

$(document).ready(function(){
	$(window).resize(function(){
		if($('.hide-globa-content-navbar').css('display') == "none") {
			$('.lottie-global-menu-hamburger').removeClass('customclass');
		}
	});
});


const myCarousel = new Carousel(document.querySelector("#myCarousel"), {
    preload: 1
    });
    
    Fancybox.assign('[data-fancybox="carousel-gallery"]', {
    closeButton: "top",
    Thumbs: false,
    Carousel: {
    Dots: true,
    on: {
    change: (that) => {
    myCarousel.slideTo(myCarousel.getPageforSlide(that.page), {
    friction: 0
    });
    }
    }
    }
    });
    