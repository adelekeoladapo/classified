<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password | HomeBuds</title>

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
                    <h4 style="text-align: center">Reset your password, <? echo $user->user_firstname; ?></h4>
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                        <div class="login-block">
                            <!--Login form--> 
                            <div class="error">
                                <? echo validation_errors(); ?>
                            </div>
                            <? echo form_open('user/resetPassword/'.$this->encrypt->do_encode($user->user_id), array('class' => 'form-forgot-password', 'id' => 'form-forgot-password', 'method' => 'POST', 'novalidate' => true)); ?>
                                <div class="form-group">
                                    <label for="new-password">Email</label>
                                    <div class="input-icon">
                                        <i class="fa fa-lock"></i>
                                        <input type="password" name="new-password" class="form-control" placeholder="New Password" required value="<? echo set_value('new-password'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="retype-password">Email</label>
                                    <div class="input-icon">
                                        <i class="fa fa-lock"></i>
                                        <input type="password" name="retype-password" class="form-control" placeholder="Retype Password" required value="<? echo set_value('retype-password'); ?>">
                                    </div>
                                </div>
                                
                                <button class="btn btn-block btn-default btn-primary" type="submit">Reset Password</button>
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
