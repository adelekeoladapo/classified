<!DOCTYPE html>
<html>
    <head>
        <title>Successfully Registered | HomeBuds</title>

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
                <div class="row">
                    <div class="col-md-12 information">
                        <div class="message success-message">
                            <h4 class="title"><i class="fa fa-check"></i> Congratulations! Your account has been successfully created.</h4>
                            <div class="description">Please confirm your registration by following the instruction sent to your email address (<? echo $email; ?>)</div>
                        </div>
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
