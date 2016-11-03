<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard | Classified</title>

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
                                <h4 class="page-title"><? echo $this->ProductModel->getProduct($message->mail_product_id)->product_name; ?> <span class="time"><i class="fa fa-clock-o"></i> <? echo $this->penguin->formatDate_2($message->mail_date_sent); ?></span></h4>
                                <div class="message">
                                    <div class="sender">
                                        <div class="name">
                                            From: <? echo $message->mail_sender_name; ?> <span>(<? echo $message->mail_sender_email; ?>)</span>
                                        </div>
                                        <div>
                                            Phone No: <? echo $message->mail_sender_phone ?>
                                        </div>
                                        <div>
                                            Sent On: Tue, Jul 12, 2016 at 8:41 PM
                                        </div>
                                    </div>
                                    <div class="the-message">
                                        <? echo $message->mail_content; ?>
                                    </div>
                                    <div class="msg-btn">
                                        <button class="btn btn-delete" onclick="deleteMsg(<? echo $message->mail_id ?>)">Delete this message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Main content-->
                    
                    <!-- Side bar -->
                    <div class="col-md-4 col-sm-4">
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
