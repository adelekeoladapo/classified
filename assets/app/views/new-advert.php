<style>
    .form-horizontal .has-feedback .smk-error-msg {
        margin-top: 0px;
    }
</style>

<div class="row page-content">
    <div class="page-title">
        New Advert
    </div>
    <!-- Back Button -->
    <a ui-sref="adverts" class="btn default-btn-back"><i class="fa fa-arrow-circle-left"></i> Back</a>
    <!-- End Back Button -->
    <div class="col-md-12 page-inner">
        <div class="split-block">
            <div class="title-div">
                <ul>
                    <li class="active" data-url="pane-1">Add new advert</li>
                </ul>
            </div>
            <div class="content-div">
                <div class="active" id="pane-1">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6 info-block">
                            
                            <!--Post Ad form-->
                            <form class= "form-horizontal form-sign-up-1" id= "form-add-advert" name= "form-add-advert" novalidate style="margin-top: 20px"> 
                                <!--Title field-->
                                <div class="form-group">
                                    <label for="title" class="col-sm-4 control-label">Ad Title <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="advert_title" placeholder="Ad Title" class="form-control" required>
                                    </div>
                                </div>
                                <!--End Title field-->
                                
                                <!--Position field-->
                                <div class="form-group">
                                    <label for="title" class="col-sm-4 control-label">Position <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="advert_position">
                                            <!--<option>Top</option>-->
                                            <option>Side</option>
                                            <option>Bottom</option>
                                        </select>
                                    </div>
                                </div>
                                <!--End Position field-->
                                
                                <!--Type field-->
                                <div class="form-group">
                                    <label for="title" class="col-sm-4 control-label">Type <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="ad-type" name="advert_type">
                                            <option>Code</option>
                                            <option>Image</option>
                                        </select>
                                    </div>
                                </div>
                                <!--End Type field-->
                                
                                <!--Image field-->
                                <div class="form-group add-type" id="Image" style="display: none">
                                    <label for="title" class="col-sm-4 control-label">Image <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="advert_content">
                                    </div>
                                </div>
                                <!--End Image field-->

                                <!--Description field-->
                                <div class="form-group add-type" id="Code">
                                    <label for="description" class="col-sm-4 control-label">Code <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="advert_content" rows="5" placeholder="Paste the code here"></textarea>
                                    </div>
                                </div>
                                <!--End Description field-->

                                <!--Post Ad btn-->
                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <button class="btn btn-default btn-primary" type="button" ng-click="addAdvert()">Save Ad</button>
                                    </div>
                                </div>
                                <!--End Post Ad btn-->


                            </form>
                            <!--End Post Ad form-->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>