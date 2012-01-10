//ACCEPTABLE CHARACTERS PLUGIN By Dr.Yes 
(function($) { 
	$.fn.acceptChars = function(options) { 
		var defaults = { 
			chars : '1234567890.', 
			casesensitive : false, 
				alertOnError : false, 
				alertMessage : 'An unacceptable character detect!' }; 
			var opts = $.extend(defaults, options); 
			return this.each(function(){ 
				var $this = $(this); 
				$this.keypress(function(e){ 
					if(e.which == 13 || e.which == 8 || e.which==0) { return true; } 
					if(e.ctrlKey || e.altKey) { return true; } 
					var ch = String.fromCharCode(e.which); 
					if(!opts.casesensitive) { 
						ch = ch.toLowerCase(); 
						opts.chars = opts.chars.toLowerCase(); } 
						var allowed = opts.chars.indexOf(ch)>-1; 
						if(opts.alertOnError && !allowed) { 
							alert(opts.alertMessage); } 
							return allowed; 
							}); 
							}); 
							}; 
							})(jQuery); 