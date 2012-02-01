
	/*$('.button.share2').toggle(function() { 
        $(this).parent().children('#share2').fadeIn(200);
        $(this).parent().children('#share2').animate({ top: '32px' }, 300);
    }, 
    function() { 
        $(this).parent().children('#share2').fadeOut(300);
        $(this).parent().children('#share2').animate({ top: '28px'}, 300);
    })*/
	  /* Close Share button */
   $('#share2 a').click(function() { 
								 		 
	/*	//$("#theForm").toggle();	
		$(this).parent().parent().toggle(function() { 
		 $(this).fadeOut(300);
        $(this).animate({ top: '28px'}, 300);										  
        
    }, 
    function() { 
        $(this).fadeIn(200);
        $(this).animate({ top: '32px' }, 300);
    });	*/
        //$(this).parent().parent().fadeOut(300);
        //$(this).parent().parent().animate({ top: '28px'}, 300);
		
	/*	$(this).parent().parent().unbind('click').toggle(function() { 
		
				$(this).fadeIn(200);
				$(this).animate({ top: '32px' }, 300);
        
		}, 
		function() { 
				$(this).fadeOut(300);
				$(this).animate({ top: '28px'}, 300);
			
		});*/
		
		
    })
   
   
		$('.button.share2').click(function(){
				if ( $(this).parent().children('#share2').css("display") == "block" ){
				
				$(this).parent().children('#share2').fadeOut(300);
				$(this).parent().children('#share2').animate({ top: '28px'}, 300);
				
			   } else {
				   
				  $(this).parent().children('#share2').fadeIn(200);
				  $(this).parent().children('#share2').animate({ top: '32px' }, 300);
				
			   }
			
			
		})
		
		$('#share2 a').click(function(){
				if ( $(this).parent().parent().css("display") == "block" ){
				
				$(this).parent().parent().fadeOut(300);
				$(this).parent().parent().animate({ top: '28px'}, 300);
				
			   } else {
				   
				   $(this).parent().parent().fadeIn(200);
				   $(this).parent().parent().animate({ top: '32px' }, 300);
				
			   }
		
		})