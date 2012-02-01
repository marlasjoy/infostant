/*$('.button.share2').toggle(function() { 
        $('#share2').fadeIn(200);
        $('#share2').animate({ top: '32px' }, 300);
    }, 
    function() { 
        $('#share2').fadeOut(300);
        $('#share2').animate({ top: '28px'}, 300);
    })*/

    /* Close Share button */
   /* $('#share2 a').click(function() { 
        $('#share2').fadeOut(300);
        $('#share2').animate({ top: '28px'}, 300);
    })*/
	
	
	
	//$('.button.share2').children('#share2').css('background-color', 'red');
/*	$('.button.share2').click(function() { 
        $(this).children('#share2').fadeIn(200);
    })*/
	
	
	$('.button.share2').toggle(function() { 
        $(this).parent().children('#share2').fadeIn(200);
        $(this).parent().children('#share2').animate({ top: '32px' }, 300);
    }, 
    function() { 
        $(this).parent().children('#share2').fadeOut(300);
        $(this).parent().children('#share2').animate({ top: '28px'}, 300);
    })
	  /* Close Share button */
   $('#share2 a').click(function() { 
        $('#share2').fadeOut(300);
        $('#share2').animate({ top: '28px'}, 300);
    })
