<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up | HomeBuds</title>

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
                    <!--Breacrumb-->
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Signup</li>
                        </ol>
                    </div>
                    <!--End Breacrumb-->
                    
                    <!--Main content-->
                    <div class="col-md-8 col-sm-8">
                        <div class="content page">
                            <h4 class="page-title"><i class="fa fa-user-plus"></i> Create An Account</h4>
                            
                            <!--Signup form-->
                            <? echo form_open('user/registerUser_', array('class' => 'form-horizontal form-sign-up-1', 'id' => 'form-sign-up-1', 'method' => 'POST', 'novalidate' => true)); ?> 

                                <!--Firstname field-->
                                <div class="form-group">
                                    <label for="reg-no" class="col-sm-4 control-label">First Name <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="firstname" placeholder="First Name" class="form-control" value="<?php echo set_value('firstname'); ?>" required>
                                        <?php echo form_error('firstname'); ?>
                                    </div>
                                </div>
                                <!--End Firstname field-->

                                <!--Lastname field-->
                                <div class="form-group">
                                    <label for="reg-no" class="col-sm-4 control-label">Last Name <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="lastname" placeholder="Last Name" class="form-control" value="<?php echo set_value('lastname'); ?>" required>
                                        <?php echo form_error('lastname'); ?>
                                    </div>
                                </div>
                                <!--End Lastname field-->

                                <!--Email field-->
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">Email Address <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" placeholder="Email Address" class="form-control" value="<?php echo set_value('email'); ?>" required>
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                <!--End Email field-->

                                <!--Username field-->
                                <div class="form-group">
                                    <label for="username" class="col-sm-4 control-label">Username <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo set_value('username'); ?>" required>
                                        <?php echo form_error('username'); ?>
                                    </div>
                                </div>
                                <!--End Username field-->

                                <!--Password field-->
                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">Password <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" minlength="6" maxlength="40" name="password" placeholder="Password" class="form-control" value="<?php echo set_value('password'); ?>" required>
                                        <span class="help-block" style="float: left">Minimum of 6 characters</span>
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                                <!--End Password field-->
                                
                                
                                
                                
                                <!--Country field-->
                                <div class="form-group">
                                    <label for="reg-no" class="col-sm-4 control-label">Country <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="country" id="country" value="<?php echo set_value('country'); ?>" required>
                                            <?
                                                foreach ($countries as $country){
                                                    echo '<option value="'.$country->country_id.'">'.$country->country_name.'</option>';
                                                }
                                            ?>
                                        </select>
                                        <?php echo form_error('country'); ?>
                                    </div>
                                </div>
                                <!--End Country field-->

                                <!--State field-->
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">State <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="state" id="state" value="<?php echo set_value('state'); ?>" required>
                                            <?
                                                foreach ($states as $state){
                                                    echo '<option value="'.$state->state_id.'">'.$state->state_name.'</option>';
                                                }
                                            ?>
                                        </select>
                                        <?php echo form_error('state'); ?>
                                    </div>
                                </div>
                                <!--End State field-->

                                <!--City field-->
                                <div class="form-group">
                                    <label for="username" class="col-sm-4 control-label">City <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="city" placeholder="City" class="form-control" value="<?php echo set_value('city'); ?>" required>
                                        <?php echo form_error('city'); ?>
                                    </div>
                                </div>
                                <!--End City field-->

                                <!--Address field-->
                                <div class="form-group">
                                    <label for="address" class="col-sm-4 control-label">Address <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="address" placeholder="Address" value="<?php echo set_value('address'); ?>" required></textarea>
                                        <?php echo form_error('address'); ?>
                                    </div>
                                </div>
                                <!--End Address field-->
                                
                                <!--Phone No field-->
                                <div class="form-group">
                                    <label for="phone" class="col-sm-4 control-label">Phone Number <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone" placeholder="Phone Number" class="form-control" value="<?php echo set_value('phone'); ?>" required>
                                        <?php echo form_error('phone'); ?>
                                    </div>
                                </div>
                                <!--End Phone No field-->
                                
                                <!--Account Type field-->
<!--                                <div class="form-group">
                                    <label for="reg-no" class="col-sm-4 control-label">Account Type <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="account-type" required name="account-type" value="<?php echo set_value('account-type'); ?>" required>
                                            <option value="1">Basic</option>
                                            <option value="2">Premium</option>
                                        </select>
                                        <span class="help-block" style="color: #337ab7; display: inline-block">Premium accounts require some charges</span>
                                        <?php //echo form_error('account-type'); ?>
                                    </div>
                                </div>-->
                                <!--End Account Type field-->
                                
                                
                                
                                
                                <!--Terms btn-->
                                <div class="form-group">
                                    <label for="terms" class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="checkbox" name="terms" required>
                                        <span class="help-block" style="display: inline;">I agree to the <a href="<? echo base_url()."terms-conditions" ?>" target="_blank">Terms & Conditions</a></span>
                                        <?php echo form_error('terms'); ?>
                                    </div>
                                </div>
                                <!--End Terms btn-->
                                
                                <!--Register btn-->
                                <div class="form-group">
                                    <!--<label for="password" class="col-sm-4 control-label"></label>-->
                                    <div class="col-sm-8">
                                        <button class="btn btn-default btn-primary" type="submit" id="register">Register</button>
                                    </div>
                                </div>
                                <!--End Register btn-->
                                

                            </form>
                            <!--End signup form-->
                        </div>
                    </div>

                    <!--Side Bar-->
                    <div class="col-md-4 col-sm-4">
                        
                        <!--Fancy side 1-->
                        <div class="fancy-side post-ad">
                            <i class="fa fa-image"></i>
                            <h4 class="title">Post Free Classified</h4>
                            <div class="descr">
                                Post your free online classified ads with us. It is absolutely easy and affordable
                            </div>
                        </div>
                        <!--End Fancy side 1-->
                        
                        <!--Fancy side 2-->
                        <div class="fancy-side manage-list">
                            <i class="fa fa-edit"></i>
                            <h4 class="title">Create and Manage Items</h4>
                            <div class="descr">
                                Manage your posted services to suite your needs at all times.
                            </div>
                        </div>
                        <!--End Fancy side 2-->
                        
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
