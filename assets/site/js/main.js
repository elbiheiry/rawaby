/*global $*/
$(document).ready(function () {
    "use strict";

    $('#live').on('click' ,function () {
        $('#div1').addClass('d-none');
    });
    $('#slaughtered').on('click' ,function () {
        $('#div1').removeClass('d-none');
    });
	
});

$(document).ready(function () {
    "use strict";

	$('#selectExample').timepicker();
	$('#selectButton').click(function(e) {
		$('#selectExample').timepicker('option', { useSelect: true });
		$(this).hide();
	});	
	
			
	$( "#datepicker" ).datepicker({
		dateFormat: "dd-mm-yy"
	});
	
});


/*Table Content
=================================
*/

$(window).load(function() {
    "use strict";
    $("#loading").fadeOut(500, function() {
        $("body").css({
            position: "relative",
            top: "auto",
            bottom: "auto",
            height: "auto",
            overflowY:"visible",
            
        });
        $(this).parent().fadeOut(500, function() {
            $(this).remove();
        });
    });
});
/* Nice Scroll
===============================*/
$(document).ready(function () {
    
    "use strict";
    
	$("html").niceScroll({
        scrollspeed: 60,
        mousescrollstep: 35,
        cursorwidth: 5,
        cursorcolor: '#95061F',
        cursorborder: 'none',
        background: 'rgba(255,255,255,0.3)',
        cursorborderradius: 3,
        autohidemode: false,
        cursoropacitymin: 0.1,
        cursoropacitymax: 1,
        zindex: "999",
        horizrailenabled: false
	});
   
});
/*Add Review Scroll
==============================*/

$(document).ready(function () {

    "use strict";
    
    $('a[href="#order-detail--app"]').click(function (e) {
        
        e.preventDefault();
                
        $('body, html').animate({
            scrollTop: $("#order-detail--app").offset().top
        }, 1000);

    });
    
});


/* Product Number count 
====================================*/
$(document).ready(function () {
    'use strict';
    
    $('.number-up').on('click', function () {
        var $value = ($(this).closest('.count-number').find('input[type="text"]').val());
        $(this).closest('.count-number').find('input[type="text"]').val(parseFloat($value) + 1).attr('value', parseFloat($value) + 1);
        return false;
    });
    
    $('.number-down').on('click', function () {
        var $value = ($(this).closest('.count-number').find('input[type="text"]').val());
        if ($value > 1) {
            $(this).closest('.count-number').find('input[type="text"]').val(parseFloat($value) - 1).attr('value', parseFloat($value) - 1);
        }
        return false;
    });
    
    
    $('.count-number').find('input[type="text"]').on('keyup', function () {
        $(this).attr('value', $(this).val());
    });
    
});


/*Owl Carousel
=============================*/
$(document).ready(function () {
    "use strict";
    var selctor = $("#testimonial-1");
    if (selctor.length) {
        selctor.owlCarousel({
            items : 1,
            itemsDesktopSmall : [979, 1],
            itemsDesktop : [1199, 1],
            itemsMobile : [767, 1],
            navigation : false,
            pagination : true,
            autoPlay : true,
            loop : true,
            navigationText: ["التالى", "السابق"]
			
			
			
        });
    }
    
});




