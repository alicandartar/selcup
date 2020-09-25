var currentX = '';
var currentY = '';
var movementConstant = .015;
$(document).mousemove(function(e) {
	if(currentX == '') currentX = e.pageX;
	var xdiff = e.pageX - currentX;
	currentX = e.pageX;
	if(currentY == '') currentY = e.pageY;
	var ydiff = e.pageY - currentY;
	currentY = e.pageY; 
	$('.parallax .p-item').each(function(i, el) {
		var movement = (i + 1) * (xdiff * movementConstant);
		var movementy = (i + 1) * (ydiff * movementConstant);
		var newX = $(el).position().left + movement;
		var newY = $(el).position().top + movementy;
		$(el).css('left', newX + 'px');
		$(el).css('top', newY + 'px');
	});
});

function scrollSection(target, topSpace){
	$('html, body').animate({
        scrollTop: target.offset().top - topSpace
    }, 500);
}

$(document).ready(function(){
	$("header .contact-btn a").on("click", function () {
		$("header .menu-btn a").removeClass("active");
		$(".mobile-menu-section").css("right","-330px").addClass("hidden");
		if($(".contact-section").hasClass("hidden")) {
			$(".overlay").show();
			$(".contact-section").css("left","0px").removeClass("hidden");
			$(this).addClass("active");
			$("html").css("overflow", "hidden");			
		} else {
			$(".overlay").hide();
			$(".contact-section").css("left","-330px").addClass("hidden");
			$(this).removeClass("active");
			$("html").css("overflow", "visible");
		}
	});
	
	$("header .menu-btn a").on("click", function () {
		$("header .contact-btn a").removeClass("active");
		$(".contact-section").css("left","-330px").addClass("hidden");
		if($(".mobile-menu-section").hasClass("hidden")) {
			$(".overlay").show();
			$(".mobile-menu-section").css("right","0px").removeClass("hidden");
			$(this).addClass("active");
			$("html").css("overflow", "hidden");			
		} else {
			$(".overlay").hide();
			$(".mobile-menu-section").css("right","-330px").addClass("hidden");
			$(this).removeClass("active");
			$("html").css("overflow", "visible");
		}
	});
	
	$(".mobile-menu-section .mobile-menu-content .menu ul li").find("a.toggle").click(function(){
		$(this).next("ul").slideToggle("fast");
		$(".mobile-menu-section .mobile-menu-content .menu ul li a.toggle").not($(this)).removeClass("active");
		$(this).toggleClass("active");
		$(".mobile-menu-section .mobile-menu-content .menu ul li a.toggle i").not($(this).find("i")).removeClass("fa-chevron-up");
		$(this).find("i").toggleClass("fa-chevron-up");
		$(".mobile-menu-section .mobile-menu-content .menu ul li ul").not($(this).next("ul")).slideUp('fast');
	});
	
	$(".overlay").on("click", function () {
		$(this).hide();
		$("header .contact-btn a").removeClass("active");
		$(".contact-section").css("left","-330px").addClass("hidden");
		$("header .menu-btn a").removeClass("active");
		$(".mobile-menu-section").css("right","-330px").addClass("hidden");
		$("html").css("overflow", "visible");
	});
	
	$(".main-banner .slider").on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1;
        $(".main-banner .slider-info span").text(i + '/' + slick.slideCount);
    });
	$(".main-banner .slider").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
        infinite: true,
		fade: true,
		dots: true,
		arrows: true,
		responsive: [
			{
			  breakpoint: 992,
			  settings: {
				arrows: false
			  }
			}
		]
    });
	
	$(".manufacturing-process .slider").slick({
		centerMode: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: false,
        infinite: false,
		dots: true,
		arrows: true,
		responsive: [
			{
			  breakpoint: 991,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 481,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		]
    });
	
	$(".main-product-size .slider").slick({
		slidesToShow: 7,
		slidesToScroll: 7,
		autoplay: false,
        infinite: true,
		dots: true,
		arrows: false,
		responsive: [
			{
			  breakpoint: 1199,
			  settings: {
				slidesToShow: 6,
				slidesToScroll: 6
			  }
			},
			{
			  breakpoint: 991,
			  settings: {
				slidesToShow: 5,
				slidesToScroll: 5
			  }
			},
			{
			  breakpoint: 767,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			  }
			},
			{
			  breakpoint: 481,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			}
		]
    });
	
	$(".product-detail .product-gallery .slider").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: false,
        infinite: true,
		fade: true,
		dots: true,
		arrows: false
    });
	
	$(".product-detail .product-tab .tab-menu").each(function(){
		var $active, $content;
		var $links = $(this).find("a");		
		$active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
		$active.addClass("active");		
		$content = $($active[0].hash);
		$content.fadeIn("fast");		
		$links.not($active).each(function () {
			$(this.hash).hide();
		});
		$(".product-detail .product-gallery .slider").slick('setPosition');
		$(this).on('click', 'a', function(i){
			if($(this).hasClass("active")){
				return false;
			}
			$active.removeClass('active');
			$content.hide();
			$active = $(this);
			$content = $(this.hash);
			$active.addClass('active');
			$content.fadeIn("fast");
			i.preventDefault();
			$(".product-detail .product-gallery .slider").slick('setPosition');
		});				
	});
	
	$(".about-certifications .slider").slick({
		slidesToShow: 5,
		slidesToScroll: 5,
		autoplay: false,
        infinite: false,
		dots: true,
		arrows: false,
		responsive: [
			{
			  breakpoint: 1199,
			  settings: {
				slidesToShow: 4,
				slidesToScroll: 4
			  }
			},
			{
			  breakpoint: 991,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			  }
			},
			{
			  breakpoint: 481,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			}
		]
    });
});

$(window).resize(function() {
	if (window.innerWidth > 991) {
		$(".contact-section, .mobile-menu-section, .overlay").removeAttr("style");
		$(".contact-section").css("left","-330px").addClass("hidden");
		$(".mobile-menu-section").css("right","-330px").addClass("hidden");
		$("header .contact-btn a").removeClass("active");
		$("header .menu-btn a").removeClass("active");
		$("html").css("overflow", "visible");
	}
});

var controller = new ScrollMagic.Controller();

var categoryTopTween = new TimelineMax().add([
	TweenMax.to(".main-product-category .bean-2", 1, {top:"150px", rotation:-45, ease:Linear.easeOut}),
	TweenMax.to(".main-product-category .bean-4", 1, {bottom:"50px", rotation:-30, ease:Linear.easeInOut})
]);		
var categoryTopScene = new ScrollMagic.Scene({triggerElement: ".main-product-category-top", duration: "100%"}).setTween(categoryTopTween).addTo(controller);

var categoryBottomTween = new TimelineMax().add([
	TweenMax.to(".main-product-category .leaf-1", 1, {top:"150px", rotation:45, ease:Linear.easeOut}),
	TweenMax.to(".main-product-category .leaf-2", 1, {top:"50px", rotation:-30, ease:Linear.easeInOut})
]);		
var categoryBottomScene = new ScrollMagic.Scene({triggerElement: ".main-product-category-bottom", duration: "100%"}).setTween(categoryBottomTween).addTo(controller);

var processTween = TweenMax.to(".manufacturing-process .leaf-2", 1, {top:"250px", rotation:30, ease: Linear.easeOut});
var processScene = new ScrollMagic.Scene({triggerElement: ".manufacturing-process", duration: "100%"}).setTween(processTween).addTo(controller);

var contactTween = new TimelineMax().add([
	TweenMax.to(".main-contact .bean-2", 1, {top:"150px", rotation:-15, ease:Linear.easeOut}),
	TweenMax.to(".main-contact .bean-3", 1, {bottom:"120px", rotation:-30, ease:Linear.easeInOut})
]);		
var contactScene = new ScrollMagic.Scene({triggerElement: ".main-contact", duration: "50%"}).setTween(contactTween).addTo(controller);

var titleTween = TweenMax.to(".page-title .leaf-2", 1, {top:"200px", rotation:15, ease: Linear.easeOut});
var titleScene = new ScrollMagic.Scene({triggerElement: ".manufacturing-process", duration: "25%"}).setTween(titleTween).addTo(controller);

var descriptionTween = TweenMax.to(".product-description .bean-1", 1, {rotation:30, ease: Linear.easeOut});
var descriptionScene = new ScrollMagic.Scene({triggerElement: ".product-description", duration: "100%"}).setTween(descriptionTween).addTo(controller);

var productDetailTween = new TimelineMax().add([
	TweenMax.to(".product-detail .bean-2", 1, {top:"80px", rotation:-15, ease:Linear.easeOut}),
	TweenMax.to(".product-detail .bean-4", 1, {top:"150px", rotation:-30, ease:Linear.easeInOut})
]);		
var productDetailScene = new ScrollMagic.Scene({triggerElement: ".product-detail", duration: "100%"}).setTween(productDetailTween).addTo(controller);