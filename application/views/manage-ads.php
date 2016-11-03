<!DOCTYPE html>
<html>
    <head>
        <title>Manage Ads | HomeBuds</title>

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
                                <h4 class="page-title"><i class="fa fa-clone"></i> My Ads</h4>
                                <div class="ads-block-list">
                                    <table class="table">
                                        <?
                                            if($products){
                                                foreach($products as $product){
                                                    $img = $this->ProductModel->getPrimaryImage($product->product_id);
                                                    $img = ($img) ? $img : 'placeholder.png';
                                                    echo '<tr class="ad-block-container">
                                                            <td class="ad-photo">
                                                                <img src="'.base_url().'assets/images/uploads/'.$img.'">
                                                            </td>
                                                            <td class="ad-info">
                                                                <a class="ad-title" href="'.base_url().'ad/'.$product->product_slug."-".$product->product_id.'">
                                                                    '.$product->product_name.'
                                                                </a>
                                                                <span class="ad-descr">
                                                                    <i class="fa fa-clock-o"></i> '.$this->penguin->formatDate_1($product->product_date_posted).'
                                                                </span>
                                                                <span class="ad-price">
                                                                    N '.$product->product_price.'
                                                                </span>
                                                                <div class="premium-label">
                                                                    <img class="premium-img" src="'.base_url().'assets/images/Crest.png">
                                                                </div>
                                                                <div class="no-premium-time"><a href="'.base_url().'edit-ad/'.$product->product_slug."-".$product->product_id.'"><i class="fa fa-edit"></i>Edit </a>| <a href="#" onclick="deleteAd('.$product->product_id.', \''.$product->product_name.'\');"><i class="fa fa-trash-o"></i>Delete</a></div>
                                                            </td>
                                                        </tr>';
                                                }
                                            }else{
                                                echo '<tr class="ad-block-container"><td>No data to be displayed</td></tr>';
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