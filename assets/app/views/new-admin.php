<div class="row page-content">
    <div class="page-title">
        New Admin
    </div>
    <!-- Back Button -->
    <a ui-sref="admins" class="btn default-btn-back"><i class="fa fa-arrow-circle-left"></i> Back</a>
    <!-- End Back Button -->
    <div class="col-md-12 page-inner">
        <div class="split-block">
            <div class="title-div">
                <ul>
                    <li class="active" data-url="pane-1">Basic Details</li>
                    <!--<li data-url="pane-2">Ads Posted</li>-->
                </ul>
            </div>
            <div class="content-div">
                <div class="active" id="pane-1">
                    <form class="row form-horizontal form-sign-up-1" id="form-add-admin" style="padding: 20px 0px 0px 20px;">
                        
                        <div class="col-md-5">
                            
                            <!--Title field-->
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Firstname <span class="required-field"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="firstname" ng-model="new_admin.admin_firstname" placeholder="Firstname" class="form-control" required>
                                </div>
                            </div>
                            <!--End Title field-->
                            
                            <!--Title field-->
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Lastname <span class="required-field"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="lastname" ng-model="new_admin.admin_lastname" placeholder="Lastname" class="form-control" required>
                                </div>
                            </div>
                            <!--End Title field-->
                            
                            <!--Title field-->
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Email Address <span class="required-field"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" ng-model="new_admin.admin_email" placeholder="Email Address" class="form-control" required>
                                </div>
                            </div>
                            <!--End Title field-->
                            
                        </div>

                        <div class="col-md-offset-1 col-md-5">
                            
                            <!--Title field-->
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Phone No. <span class="required-field"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="number" name="phone" ng-model="new_admin.admin_phone" placeholder="Phone No" class="form-control" required>
                                </div>
                            </div>
                            <!--End Title field-->
                            
                            <!--Title field-->
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Username <span class="required-field"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" ng-model="new_admin.admin_username" placeholder="Username" class="form-control" required>
                                </div>
                            </div>
                            <!--End Title field-->
                            
                            <!--Title field-->
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Password <span class="required-field"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" ng-model="new_admin.admin_password" placeholder="Password" class="form-control" required>
                                </div>
                            </div>
                            <!--End Title field-->
                            
                            <!--Post Ad btn-->
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label"></label>
                                <div class="col-sm-8">
                                    <button class="btn btn-default btn-primary" type="button" ng-click="addAdmin()">Submit</button>  
                                </div>
                            </div>
                            <!--End Post Ad btn-->
                            
                        </div>
                        
                    </form>
                </div>
                <!--<div id="pane-2">
                    Pane Two
                </div>-->
            </div>
        </div>
    </div>
</div>