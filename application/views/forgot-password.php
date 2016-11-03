<!DOCTYPE html>
<html>
    <head>
        <title>Forgot Password | HomeBuds</title>

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
                <div class="row login" style="margin-top: 10px;">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                        <div class="login-block">
                            <!--Login form-->
                            <div class="error">
                                <? echo $error; ?>
                            </div>
                            <? echo form_open('user/doForgotPassword', array('class' => 'form-forgot-password', 'id' => 'form-forgot-password', 'method' => 'POST', 'novalidate' => true)); ?>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                
                                <button class="btn btn-block btn-default btn-primary" type="submit">Send me my password</button>
                            </form>
                            <!--End Login form-->
                            
                            <!--Forgot password-->
                            <div class="forgot-password">
                                <a href="<? echo base_url()."login" ?>">Back to login</a>
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
