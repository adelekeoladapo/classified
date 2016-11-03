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
                                <h4 class="page-title"><i class="fa fa-envelope-o"></i> My Messages</h4>
                                <div class="messages">
                                    <table class="table table-bordered table-hover table-responsive messages-table">
                                        <?
                                            if($messages){
                                                foreach($messages as $message){
                                                    $status = ($message->mail_read) ? "read" : "unread"; 
                                                    echo '<tr>
                                                            <td class="'.$status.'">
                                                                <div class="mail">
                                                                    <a href="'.  base_url()."message/".$this->ProductModel->getProduct($message->mail_product_id)->product_slug."-".$message->mail_id.'">
                                                                        <span class="sender">'.$message->mail_sender_name.' - </span>
                                                                        <span class="ad">'.$this->ProductModel->getProduct($message->mail_product_id)->product_name .'</span>
                                                                        <span class="date"><i class="fa fa-clock-o"></i> '.$this->penguin->formatDate_2($message->mail_date_sent).'</span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>';
                                                }
                                            }else{
                                                echo '<h4>You currently do not have any message</h4>';
                                            }
                                        ?>
                                    </table>  
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
