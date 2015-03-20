// JavaScript Document
	/*----------------------------------------------------*/
	/*	IE HTML5 fix
	/*----------------------------------------------------*/
	
	  document.createElement('header');
	  document.createElement('section');
	  document.createElement('article');
	  document.createElement('aside');
	  document.createElement('nav');
	  document.createElement('main');
	  document.createElement('footer');
	  document.createElement('figure');
	  document.createElement('small');
	  document.createElement('blockquote');
	
	
	
	/*----------------------------------------------------*/
	/*	Placeholder for old broswers
	/*----------------------------------------------------*/
	
	$(document).ready(function(){
		
		if(!Modernizr.input.placeholder){
		
			$('[placeholder]').focus(function() {
			  var input = $(this);
			  if (input.val() == input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			  }
			}).blur(function() {
			  var input = $(this);
			  if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			  }
			}).blur();
			$('[placeholder]').parents('form').submit(function() {
			  $(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
				  input.val('');
				}
			  })
			});
		
		}
		
		});
	
        // Squeez header on scroll
		
        function init() {
            window.addEventListener('scroll', function(e){
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 50,
                    header = document.querySelector("header");
                if (distanceY > shrinkOn) {
                    classie.add(header,"smaller");
                } else {
                    if (classie.has(header,"smaller")) {
                        classie.remove(header,"smaller");
                    }
                }
            });
        }
        window.onload = init();
		
		// Show card on click
		
		$('.card').click(function (e) {
					e.stopPropagation();
					$('.check-my-card').toggleClass('display');
					$(this).toggleClass('active')
				});
				/*
				$(document).click(function (e) {
					if (e.target.className == 'check-my-card') return;
					$('.check-my-card').removeClass('display');
					$('.card').removeClass('active');
				});*/
				
		// Index big slider
		
		$('.index-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			dots: true,
		});
		
		// Detox page js
		
		$('.add-new-product').click(function () {
			$('.product-select-popup-add-custom').addClass('display');
			$('html, body').animate({
			scrollTop: $(".product-select-popup-add-custom").offset().top-360
			}, 200);
		});
									
		$('.circle-add a.close').click(function() {
			$('.product-select-popup-add-custom').removeClass('display');
			$('html, body').animate({
			scrollTop: $(".add-new-product").offset().top-360
			}, 200);
		});
		
		$('.circle').click(function (e) {
			e.preventDefault();
			$('div.'+$(this).attr('data-val')).addClass('display');
			$(this).addClass('active');
		});
									
		$('a.close').click(function(e) {
			e.preventDefault();
			
			var val = $(this).attr('data-val');
			
			$('.product-popup').each(function(x, y) {
				if ($(y).hasClass(val)) {
					$(y).removeClass('display');
				}
			});
			$('.circle').removeClass('active');
			
			$('.product-select-popup').each(function(x, y) {
				if ($(y).hasClass(val)) {
					$(y).removeClass('display');
				}
			});
		});
		
		$('.bottle').click(function (e) {
			e.preventDefault();
			$('div.'+$(this).attr('data-val')).addClass('display');
			$(this).addClass('active');
		});
												
		/*            	
		$('.bottle').click(function () {
			$('.product-select-popup').addClass('display');
		});
							
		$('a.close').click(function() {
			$('.product-select-popup').removeClass('display');
		});
		*/
		
		$('.center-slider').slick({
		  centerMode: true,
		  centerPadding: '0px',
		  slidesToShow: 7,
		  responsive: [
			{
			  breakpoint: 768,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 3
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			  }
			}
		  ]
		});
		

		$(document).ready(function () {
			
			$('.payment input.round').iCheck({
				checkboxClass: 'icheckbox_flat-blue',
				radioClass: 'iradio_flat-blue'
			  });
			
            window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 });
			
			$('.detox input').iCheck({
				checkboxClass: 'icheckbox_flat-grey',
				radioClass: 'iradio_flat-grey'
			});
			
			$('.lifestyle input').iCheck({
				checkboxClass: 'icheckbox_flat-grey',
				radioClass: 'iradio_flat-grey'
			});
			
			$('.schedule input').iCheck({
				checkboxClass: 'icheckbox_flat-aero',
				radioClass: 'iradio_flat-aero'
			});
			
			$('.adresses input').iCheck({
				checkboxClass: 'icheckbox_flat-grey',
				radioClass: 'iradio_flat-grey'
			});
			
			$('.shopping-card input').iCheck({
				checkboxClass: 'icheckbox_flat-grey',
				radioClass: 'iradio_flat-grey'
			});
			
			$('.schedule #datepicker').Zebra_DatePicker({
					direction: true    // boolean true would've made the date picker future only
									// but starting from today, rather than tomorrow
			});
			
        });
		
		// Juice page
		
		$('.center-slider-jucie').slick({
		  centerMode: true,
		  centerPadding: '160px',
		  slidesToShow: 3,
		  responsive: [
			{
			  breakpoint: 768,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 3
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			  }
			}
		  ]
		});
		
		
		
