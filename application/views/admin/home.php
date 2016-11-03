<!DOCTYPE html>
<html>
    <head>
        <title>HomBuds Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<? echo base_url(); ?>assets/images/favicon.fw.png">
        <link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/lib/smoke/css/smoke.min.css">
        <link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/font/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/font/ionicons-2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/font/fonts.css">
        <link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/theme-admin/css/styles.css">
        <link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/theme-admin/css/styles-responsive.css">
        
        <script type="text/javascript" src="<? echo base_url() ?>assets/lib/jquery/jquery-2.2.1.min.js"></script>
        <script type="text/javascript" src="<? echo base_url() ?>assets/lib/jquery/jquery.form.js"></script>
        <link type="text/css" rel="stylesheet" media="all" href="<? echo base_url() ?>assets/lib/datatables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css">
        <link type="text/css" rel="stylesheet" media="all" href="<? echo base_url() ?>assets/lib/datatables/datatables-responsive/css/dataTables.responsive.css">
        <script type="text/javascript" src="<? echo base_url() ?>assets/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<? echo base_url() ?>assets/datatables/media/js/dataTables.bootstrap.min.js"></script>
        
        <script type="text/javascript" src="<? echo base_url() ?>assets/lib/tinymce/js/tinymce/tinymce.min.js"></script>
        
        <script src="<? echo base_url(); ?>assets/lib/angular/angular.min.js"></script>
        <script src="<? echo base_url(); ?>assets/lib/angular/angular-ui-router.min.js"></script> 
        <script type="text/javascript" src="<? echo base_url() ?>assets/lib/ui-tinymce-master/src/tinymce.js"></script>
        
        <script src="<? echo base_url() ?>assets/lib/angular-datatables-master/dist/angular-datatables.js"></script>
        <script src="<? echo base_url(); ?>assets/lib/angular/angular-resource.min.js"></script>
        
        <script>
            var BASE_URL = '<? echo base_url(); ?>';
        </script>
    </head>
    <body ng-app="penguinCMS" ng-controller="mainCtrl">
        
        <!--Navbar starts-->
        <div ng-include="'assets/app/views/templates/header.php'">
            
        </div>
        
        <!--Sidebar-->
        <div class="container-fluid main-container" ng-include="'assets/app/views/templates/sidebar.php'">
            
        </div>
        
        <!--Body content-->
        <div class="container-fluid page-container" ui-view>
            
            <!--dashboard-->
            <!--<div class="row page-content">
                <div class="page-title">
                    Dashboard
                </div>
                <div class="col-md-12">
                    No content
                </div>
            </div> -->
            
        </div>
        
            
        
        <script src="<? echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="<? echo base_url(); ?>assets/lib/smoke/js/smoke.min.js"></script>
        <script src="<? echo base_url() ?>assets/lib/imagepreview/src/imagepreview.js"></script>
        <script src="<? echo base_url(); ?>assets/theme-admin/script/ui.js"></script>
        <script src="<? echo base_url(); ?>assets/theme-admin/script/app.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/mainController.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/User.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/Products.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/Category.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/Country.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/Place.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/Advert.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/Dashboard.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/Settings.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/Payment.js"></script>
        <script src="<? echo base_url(); ?>assets/app/controllers/Admin.js"></script>


        
        <!--Loading overlay-->
        <div class="transparent-overlay" id="loading-overlay">
            <div class="loading-img">
                <img src="<? echo base_url(); ?>assets/images/loading.gif">
            </div>
        </div>
        
        <!--Informational Toast-->
        <div class="toast-container">
            <div class="toast">
                Successfully Added
            </div>
        </div>
        
        <!--Fancybox-->
        <div class="transparent-overlay fancybox">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 fancy">
                    <div class="images">
                        <img src="assets/images/uploads/Samsung-Galaxy-S5-Android-6_0_1-Marshmallow-Update-Samsung.jpg" alt=""/>
                    </div>
                    <div class="dismiss">
                        <i class="fa fa-close"></i>
                    </div>
                    <div class="fancy-btn">
                        <i class="fa fa-angle-left left"></i>
                        <i class="fa fa-angle-right right"></i>
                    </div>
                </div>
            </div>
        </div>
            
    </body>
</html>
