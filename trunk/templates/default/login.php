<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pinterest / Login</title>
        
        <link rel="icon" href="<?=imginfo?>/images/default/login/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon-precomposed" href="<?=imginfo?>/images/default/login/ipad_touch_icon.png" />
        <link rel="stylesheet" href="<?=homeinfo?>/css/login/style.css" type="text/css" media="all"/>
        <script src="http://www.infostant.com/js/libs/jquery-1.7.1.min.js"></script>
      <script src="http://www.infostant.com/js/default/jquery.validate.js"></script>
    </head>
    <h1 id="login_logo"><a href="/"></a></h1>

    <div class="social_buttons" style="display:none;">
        <div class="inset">

            <a class="fb login_button" href="/facebook/?next=%2F">
                <div class="logo_wrapper"><span class="logo"></span></div>
                <span>Login with Facebook</span>
            </a>
        </div>
        <div class="inset">
            <a class="tw login_button" href="/twitter/?next=%2F">
                <div class="logo_wrapper"><span class="logo"></span></div>

                <span>Login with Twitter</span>
            </a>
        </div>
    </div>

    <img class="login_bar" src="<?=imginfo?>/images/default/login/login_bar.png" alt="Horizontal Rule" />

    

    <form class="Form FancyForm AuthForm" id="formlogin" action="<?=homeinfo?>/ajax/loginuser" method="POST" accept-charset="utf-8">
        <ul>

            <li>
                <input id="id_email" name="username" type="text"  />
                <label>Username</label>
                <span class="fff"></span>

                
            </li>

            <li>
                <input id="id_password" name="password" type="password" />

                <label>Password</label>
                <span class="fff"></span>

                
            </li>

            <input type="hidden" name="next" value="/">

            <div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='1d395938ed6daabb39b329f9f7ec4039' /></div>

        </ul>

        <div class="non_inputs">
            <a href="javascript:$('#formlogin').submit()" class="Button WhiteButton Button18" ><strong>Login</strong><span></span></a>
            <a id="resetPassword" class="colorless" href="/forgetpassword">Forgot your password?</a>
            <a id="backToLogin" class="colorless" href="#">Back to Login?</a>
        </div>

    </form><!-- .Form.FancyForm.AuthForm -->

<script>
$('#formlogin').validate();
</script>

    <div id="SearchAutocompleteHolder"></div>
</html>