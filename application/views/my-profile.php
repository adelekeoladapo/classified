<!DOCTYPE html>
<html>
    <head>
        <title>My Profile | Classified</title>
        
        <!--CSS-Links-->
        <? include 'templates/css-links.php'; ?>
        <!--End CSS-Links-->

    </head>
    <body>

        <!--Header-->
        <? include 'templates/header.php'; ?>
        <!--End Header-->
        
        <!--Page Body-->
        <div class="block page-content">
            <div class="container-fluid">
                <div class="row">
                    
                    <!--Main content-->
                    <div class="col-md-8 col-sm-8 minus-padding-right">
                        
                        <!-- Dashboard  -->
                        <? include 'templates/dashboard-links.php'; ?>
                        <!-- End Dashboard -->
                        
                        <div class="col-md-12">
                            <div class="content page">
                                
                                <!-- My Profile -->
                                <div class="my-panel">
                                    <span class="my-panel-title">My Details</span>
                                    <div class="my-panel-content">
                                        <!--Signup form-->
                                        <form class= "form-horizontal form-sign-up-1" id = "form-my-details" novalidate= true>
                                            <input type="hidden" name="user-id" id="user-id" value="<? echo $user->user_id; ?>" required>
                                            <!--Firstname field-->
                                            <div class="form-group">
                                                <label for="firstname" class="col-sm-4 control-label">First Name </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="firstname" placeholder="First Name" class="form-control" value="<? echo $user->user_firstname; ?>" required>
                                                </div>
                                            </div>
                                            <!--End Firstname field-->

                                            <!--Lastname field-->
                                            <div class="form-group">
                                                <label for="lastname" class="col-sm-4 control-label">Last Name </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="lastname" placeholder="Last Name" class="form-control" value="<? echo $user->user_lastname; ?>" required>
                                                </div>
                                            </div>
                                            <!--End Lastname field-->
                                            
                                            <!--Phone No field-->
                                            <div class="form-group">
                                                <label for="phone" class="col-sm-4 control-label">Phone No </label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="phone" placeholder="Phone No" class="form-control" value="<? echo $user->user_phone; ?>" required>
                                                </div>
                                            </div>
                                            <!--End Phone No field-->

                                            <!--Email field-->
                                            <div class="form-group">
                                                <label for="email" class="col-sm-4 control-label">Email Address </label>
                                                <div class="col-sm-8">
                                                    <input type="email" name="email" placeholder="Email Address" class="form-control" value="<? echo $user->user_email ?>" required>
                                                </div>
                                            </div>
                                            <!--End Email field-->
                                            
                                            <!--Account type field-->
                                            <div class="form-group">
                                                <label for="email" class="col-sm-4 control-label">Account Type </label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" value="<? echo $user->user_account_type; ?>" name="account_type" disabled>
                                                        <option <? echo ($user->user_account_type == '1') ? "selected" : "" ?> value="1">Basic</option>
                                                        <option <? echo ($user->user_account_type == '2') ? "selected" : "" ?> value="2">Premium</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--Account type field-->
                                            
                                            <!--Register btn-->
                                            <div class="form-group">
                                                <!--<label for="password" class="col-sm-4 control-label"></label>-->
                                                <div class="col-sm-8">
                                                    <button class="btn btn-default btn-primary" type="submit" id="register">Update</button>
                                                </div>
                                            </div>
                                            <!--End Register btn-->


                                        </form>
                                        <!--End signup form-->
                                    </div>
                                </div>
                                <!-- End My Profile -->
                                
                                <div class="my-panel">
                                    <span class="my-panel-title">Change Password</span>
                                    <div class="my-panel-content">
                                        
                                        <!--Signup form-->
                                        <form class= "form-horizontal form-sign-up-1" id = "form-update-password" method="POST" novalidate= true>
                                            <input type="hidden" name="user-id" id="user-id" value="<? echo $user->user_id; ?>" required>
                                            <!--Old Password field-->
                                            <div class="form-group" id="old-password">
                                                <label for="old-password" class="col-sm-4 control-label">Old Password </label>
                                                <div class="col-sm-8">
                                                    <input type="password" onfocus="removePwdError()" name="old-password" id="old-password" placeholder="Old Password" class="form-control" required onchange="confirmPassword(<? echo $user->user_id ?>, this.value)" >
                                                </div>
                                            </div>
                                            <!--End Old Password field-->

                                            <!--New Password field-->
                                            <div class="form-group">
                                                <label for="password-1" class="col-sm-4 control-label">New Password </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="password-1" id="password-1" minlength="6" maxlength="41" placeholder="New Password" class="form-control" value="" required>
                                                </div>
                                            </div>
                                            <!--End New Password field-->
                                            
                                            <!--Confirm Password field-->
                                            <div class="form-group">
                                                <label for="password-2" class="col-sm-4 control-label">Confirm Password </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="password-2" id="password-2" placeholder="Confirm Password" class="form-control" value="" required>
                                                </div>
                                            </div>
                                            <!--End Confirm Password field-->
                                            
                                            <!--Register btn-->
                                            <div class="form-group">
                                                <!--<label for="password" class="col-sm-4 control-label"></label>-->
                                                <div class="col-sm-8">
                                                    <button class="btn btn-default btn-primary" type="submit" id="register">Update</button>
                                                </div>
                                            </div>
                                            <!--End Register btn-->
                                            
                                        </form>
                                        <!--End signup form-->
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--End Main content-->
                    
                    <!-- Side bar -->
                    <div class="col-md-4 col-sm-4">
                        
                        <!-- Boost Ad -->
                        <?
                            if($user->user_account_type == '1'){
                                include 'templates/boost-ad.php';
                            }
                        ?>
                        <!-- End Boost Ad -->
                        
                        <!-- Side ads -->
                        <? include 'templates/side-ads.php'; ?>
                        <!-- End Side ads -->
                    </div>
                    <!-- End Side bar -->
                    
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
