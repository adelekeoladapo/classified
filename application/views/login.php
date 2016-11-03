<!DOCTYPE html>
<html>
    <head>
        <title>Login | HomeBuds</title>

        <!--CSS-Links-->
        <? include 'templates/css-links.php'; ?>
        <!--End CSS-Links-->

    </head>
    <body class="login">

        <!--Header-->
        <? include 'templates/header.php'; ?>
        <!--End Header-->
        
        <!--Page Body-->
        <div class="block page-content">
            <div class="container-fluid">
                <div class="row login">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                        <div class="login-block">
                            <!--Login form-->
                            <div class="error">
                                <? echo $error; ?>
                            </div>
                            <? echo form_open('user/doLogin', array('class' => 'form-login', 'id' => 'form-login', 'method' => 'POST', 'novalidate' => true)); ?>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Password</label>
                                    <div class="input-icon">
                                        <i class="fa fa-lock"></i>
                                        <input onfocus="$('.login .error').hide(200)" type="password" minlength="6" maxlength="40" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                
                                <button class="btn btn-block btn-default btn-primary" type="submit">Login</button>
                            </form>
                            <!--End Login form-->
                            
                            <!--Forgot password-->
                            <div class="forgot-password">
                                <a href="<? echo base_url()."forgot-password"; ?>">Forgot password?</a>
                            </div>
                            <!--End forgot password-->
                        </div>
                        
                        <!--Have an Account-->
                        <div class="signup">
                            Don't have an account?
                            <a href="<? echo base_url()."sign-up"; ?>">Sign Up!</a>
                        </div>
                        <!--End Have an account-->
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Body-->

        <!--Footer-->
        <? include 'templates/footer.php'; ?>
        <!--End Footer-->




        <!--JS-Links-->
        <? include 'templates/js-links.php'; ?>
        <!--End JS-Links-->


    </body>
</html>
