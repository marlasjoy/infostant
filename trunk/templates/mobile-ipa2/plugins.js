
// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console) {
    arguments.callee = arguments.callee.caller;
    var newarr = [].slice.call(arguments);
    (typeof console.log === 'object' ? log.apply.call(console.log, console, newarr) : console.log.apply(console, newarr));
  }
};

// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,clear,count,debug,dir,dirxml,error,exception,firebug,group,groupCollapsed,groupEnd,info,log,memoryProfile,memoryProfileEnd,profile,profileEnd,table,time,timeEnd,timeStamp,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());


// place any jQuery/helper plugins in here, instead of separate, slower script files.

jQuery(document).ready(function($){ 
	
	/* Open/Close Function */

	/******* EOS ********/
	
	/* 	Open Share button */
	$('.button.share').toggle(function() { 
		$('#share').fadeIn(200);
		$('#share').animate({ top: '32px' }, 300);
	}, function() { 
		$('#share').fadeOut(300);
		$('#share').animate({ top: '28px'}, 300);
	})
	/* Close Share button */
	$('#share a').click(function() { 
		$('#share').fadeOut(300);
		$('#share').animate({ top: '28px'}, 300);
	})
	/******* EOS ********/
});
$('div').live( 'pageshow',function(event, ui){
    
   
    

 
  
      try
  {
      $('nav li:nth-child(2) a').click(function() { 
        $('.ui-page-active #function').animate({ top: '45px', useTranslate3d: true, leaveTransforms: true}, 800);
    })    
    $('.ui-page-active #function a, nav li:nth-child(1) a, nav li:nth-child(3) a, h1 > a, a[data-rel="back"]').click(function() { 
        $('.ui-page-active #function').animate({ top: '-=360px', useTranslate3d: true, leaveTransforms: true}, 800);
    })
  }
catch(err)
  {
  //Handle errors here
  }

    
    
        

    
    
  
});
