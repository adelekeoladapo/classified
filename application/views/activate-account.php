<!DOCTYPE html>
<html>
    <head>
        <title>Activate Account | Homebuds</title>

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
                            <li><a href="<? echo base_url(); ?>">Home</a></li>
                            <li>Activate Account</li>
                        </ol>
                    </div>
                    <!--End Breacrumb-->
                    
                    <!--Main content-->
                    <div class="col-md-8 col-sm-8">
                        <div class="content page">
                            <h4 class="page-title"><i class="fa fa-check-square-o"></i> Activate Your Account</h4>
                            
                            <!--Signup form-->
                            <? echo form_open('user/activateAccount/'.$this->encrypt->do_encode($user->user_id), array('class' => 'form-horizontal form-sign-up-1 form-activate-account', 'id' => 'form-activate-account', 'method' => 'POST', 'novalidate' => true)); ?> 
                                
                                <div class="user-details">
                                    <i class="fa fa-user"></i>
                                    <h4><? echo $user->user_firstname." ".$user->user_lastname ?></h4>
                                    <p><? echo $user->user_email; ?></p>
                                </div>
                                
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
                                
                                <!--Register btn-->
                                <div class="form-group">
                                    <!--<label for="password" class="col-sm-4 control-label"></label>-->
                                    <div class="col-sm-8">
                                        <button class="btn btn-default btn-primary" type="submit">Activate</button>
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
                                Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                        <!--End Fancy side 1-->
                        
                        <!--Fancy side 2-->
                        <div class="fancy-side go-premium">
                            <i class="fa fa-certificate"></i>
                            <h4 class="title">Create Premium Account</h4>
                            <div class="descr">
                                Go Premium and enjoy some additional features and services we provide. It's very cheap and affordable.
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
