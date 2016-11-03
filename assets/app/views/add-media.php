<div class="row page-content add-media" ng-controller="MediaCtrl">
    <div class="page-title">
        Upload New Media {{ myName }}
    </div>
    <div class="col-md-12 content-inner">
        <div class="select-file-block">
            <h4>Select the image to be uploaded</h4>
            <form class="form-add-media" id="form-add-media" name="form-add-media" method="post" enctype="multipart/form-data" ng-submit="addMedia()" novalidate="true">
                <!--<input type="text" class="form-control file-input" id="photox" name="photox" required="true">-->
                <input type="file" ng-click="clearUploadError()" class="form-control file-input" id="photo" name="photo" required="true">
                <button class="btn btn-primary upload-btn" type="submit">Upload</button>
                <ul class="instructions">
                    <li class="upload-error"></li>
                    <li>Maximum file size: 2MB</li>
                    <li>Image type allowed: jpeg, jpg, png and gif</li>
                </ul>
            </form>
            
        </div>
        <div class="line" style="margin-bottom: 0px;"></div>
        <div class="row uploaded-images">
            <div class="col-md-2 col-sm-4 col-xs-6 new-image" style="display: none">
                <div class="upload-progress">
                    <h4 class="percentage">0%</h4>
                    <div class="loading" id="loading">
                        <div class="loading-line">
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="col-md-2 col-sm-4 col-xs-6">
                <img src="assets/images/placeholder.png" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img src="assets/images/placeholder.png" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img src="assets/images/placeholder.png" alt="..." class="img-thumbnail">
            </div>-->
            
        </div>
    </div>
</div>