<?
session_start();

// Include the random string file for captcha
require 'includes/rand.php';

// Set the session contents
$_SESSION['captcha_id'] = $str;

?>

<html>
<head>
<title>Signup Form - Advanced Ajax Validation with Captcha</title>
<link rel="stylesheet" type="text/css" href="css.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/captcha.js"></script>
<script type="text/javascript">

	$.validator.addMethod('myEqual', function (value, element) {
     if ($('#password-password').val() == $('#password-password-confirm').val()) {
	 	  return true;
	 }    else return false;
	}, 'Your password does not match.');




  $(document).ready(function() {

     $('#password-clear').show();
	$('#password-password').hide();

	$('#password-clear').focus(function() {
		$('#password-clear').hide();
		$('#password-password').show();
		$('#password-password').focus();
	});
	$('#password-password').blur(function() {
		if($('#password-password').val() == '') {
			$('#password-clear').show();
			$('#password-password').hide();
		}
	});

        $('#password-clear-confirm').show();
	$('#password-password-confirm').hide();

	$('#password-clear-confirm').focus(function() {
		$('#password-clear-confirm').hide();
		$('#password-password-confirm').show();
		$('#password-password-confirm').focus();
	});
	$('#password-password-confirm').blur(function() {
		if($('#password-password-confirm').val() == '') {
			$('#password-clear-confirm').show();
			$('#password-password-confirm').hide();
		}
	});

  
	var validator = $("#signupform").validate({

		//ignore: ".ignore",

		rules: {

			username: {
				required: true,
				minlength: 5
			},

			captcha: {
				required: true,
				remote: "includes/process.php"
			},

			password: {
				required: true,
				minlength: 5
			},
			passwordconfirm: {
				required: true,
				minlength: 5,
				myEqual: true
			},

			email: {
				required: true,
				email: true
			}
		},
		messages: {
			

			captcha: "Correct captcha is required. Click the captcha to generate a new one",
			username: {
				required: "Enter a username",
				minlength: jQuery.format("Enter at least {0} characters"),
				
			},
			password: {
				required: "Provide a password",
				rangelength: jQuery.format("Enter at least {0} characters")
			},
			passwordconfirm: {
				required: "Provide a password",
				rangelength: jQuery.format("Enter at least {0} characters")
			},
		email: {
				required: "Please enter a valid email address",
				minlength: "Please enter a valid email address"
			}

			
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else

				error.appendTo( element.parent().next() );
		},

                submitHandler: function() {
			alert("submitted!");
		},

		// specifying a submitHandler prevents the default submit, good for the demo
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("").addClass("checked");
                          //  form.submit();
		}
	});
        
  });
</script>
</head>
    <body>

					<form  name="signup" id="signupform" method="post">
					
						<p class="signUpText"><input type="text" name="username" value="Username" onfocus="if(this.value=='Username'){this.value=''}" onblur="if(this.value==''){this.value='Username'}"/></p><div class="status"></div>
					<p class="signUpText"><input type="text" name="email" value="Email Address"  onfocus="if(this.value=='Email Address'){this.value=''}" onblur="if(this.value==''){this.value='Email Address'}"/></p><div class="status"></div>
						<p class="signUpText"><input id="password-clear" type="text" name="notused" value="Password" autocomplete="off" />
						
						<input id="password-password" type="password" name="password"  autocomplete="off" />

						</p><div class="status"></div>
						<p class="signUpText">
						<input id="password-clear-confirm" type="text" name="notused1" value="Confirm Password" autocomplete="off" />
						
						<input id="password-password-confirm" type="password" name="passwordconfirm" autocomplete="off" />
						
						</p><div class="status"></div>
						
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:13px;">
  <tr>
    <td><div id="captchaimage"><a href="" id="refreshimg" onclick="refreshimg(); return false;" title="Click to refresh image"><img src="captcha/image.php?<?php echo time(); ?>" alt="Captcha image" width="132" height="46" align="left" /></a></div>
    <input type="text" maxlength="6" name="captcha" id="captcha"  onfocus="if(this.value=='Enter Verification Code'){this.value=''}" onblur="if(this.value==''){this.value='Enter Verification Code'}" class="error">
    
    </td>
    <td></td>
  </tr>
</table>
		
 
 
<p class="signUpText"> <input type="text" maxlength="6" name="captcha" id="captcha"  value="Enter Verification Code" onfocus="if(this.value=='Enter Verification Code'){this.value=''}" onblur="if(this.value==''){this.value='Enter Verification Code'}" /></p><div class="status"></div>

						
						<p class="clearfix">
							
							<span class="rfloat">
							<input class="submit" type="submit" value="Submit">
							</span>
						</p>
					</form>
        <br><Br/><br>
        <p style="font-family: arial;">For more tutorials visit <a href="http://www.tutorialcadet.com">TutorialCadet</a></p>
			
</body>
</html>