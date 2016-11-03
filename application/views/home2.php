<!DOCTYPE html>
<html>
    <head>
        <title>HomeBuds</title>

        <!--CSS-Links-->
        <? include 'templates/css-links.php'; ?>
        <!--End CSS-Links-->

    </head>
    <body>

        <!--Header-->
        <? include 'templates/header.php'; ?>
        <!--End Header-->

        <!--Search Filter-->
        <? include 'templates/search-filter.php'; ?>
        <!--End Search Filter-->
        
        <!-- Browse by Category -->
        <div class="block browse-by-category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 cat-block-title">
                        <h4 class="block-title">Browse By <span>Category</span></h4>
                    </div>
                    <?
                        if($base_categories)
                            foreach($base_categories as $category){
                                echo '<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 cat">
                                        <a href="'.base_url()."ads/".$category->category_slug."-".$category->category_id.'">
                                            <img src="'.base_url().'assets/images/uploads/'.$category->category_image.'">
                                            <h6>'.$category->category_name.'</h6>
                                        </a>
                                    </div>';
                            }
                    ?>
                </div>
            </div>
        </div>
        <!-- End Browse by Category -->
        
        <!-- Sponsored Ads -->
        <div class="block sponsored-ad">
            <div>
                <?
                    if($premium_exist){
                        echo '<div class="col-md-12 sponsored-block-title">
                                <h4 class="block-title">Premium <span>Ads</span></h4>
                            </div>';
                    }
                ?>
                
                <div class="owl-carousel" id="owl-example" style="background-color: #fff; text-align: center">
                    
                    <?
                        if($products){
                            foreach($products as $product){
                                $seller_account_type = $this->UserModel->getAccountType($product->product_user_id);
                                $price = ($product->product_price > 0) ? $product->product_price : "";
                                if($seller_account_type == 2){
                                    $img = $this->ProductModel->getPrimaryImage($product->product_id);
                                    $img = ($img) ? $img : 'placeholder.png';
                                    echo '<div class="ad">
                                        <a href="'.base_url().'ad/'.$product->product_slug."-".$product->product_id.'">
                                            <img src="'.base_url().'assets/images/uploads/'.$img.'">
                                            <h6>'.$product->product_name.'</h6>
                                            <span class="price">'.$price.'</span>
                                        </a>
                                    </div>';
                                }
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <!-- End Sponsored Ads -->

        <!--Page Body-->
        <div class="block page-content">
            <div class="">
                <div class="row"> 

                    <!--Main content-->
                    <div class="col-md-8 col-sm-8 minus-padding-right">
                        <!--Ads List-->
                        <div class="ads-block-list">
                            
                            <div class="ad-list-title">
                                <div class="title">
                                    <h4>Trending <span>Ads</span></h4>
                                </div>
                            </div>
                            
                            <table class="table">
                                <?
                                    if($products){
                                        foreach($products as $product){
                                            $seller_account_type = $this->UserModel->getAccountType($product->product_user_id);
                                            $price = ($product->product_price > 0) ? $product->product_price : "";
                                            $premium = ($seller_account_type == 2) ? 'premium' : '';
                                            $img = $this->ProductModel->getPrimaryImage($product->product_id);
                                            $img = ($img) ? $img : 'placeholder.png';
                                            echo '<tr class="ad-block-container '.$premium.'-ad">
                                                    <td class="ad-photo">
                                                        <img src="'.base_url().'assets/images/uploads/'.$img.'">
                                                    </td>
                                                    <td class="ad-info">
                                                        <a class="ad-title" href="'.base_url().'ad/'.$product->product_slug."-".$product->product_id.'">
                                                            '.$product->product_name.'
                                                        </a>
                                                        <span class="ad-descr">
                                                            '.$this->CategoryModel->getParentCategory($product->category_parent_id).' -  <i class="fa fa-map-marker"></i> '.$product->state_name.'
                                                        </span>
                                                        <span class="ad-price">
                                                             '.$price.'
                                                        </span>
                                                        <div class="premium-label">
                                                            <img class="premium-img" src="'.base_url().'assets/images/Crest.png">
                                                        </div>
                                                        <div class="no-premium-time"><i class="fa fa-clock-o"></i> '.$this->penguin->formatDate_2($product->product_date_posted).'</div>
                                                    </td>
                                                </tr>';
                                        }
                                    }else{
                                        echo '<tr class="ad-block-container"><td>No data to be displayed</td></tr>';
                                    }
                                ?>
                            </table>
                            
                            <!--Paginaton-->
                            <div class="ads-pagination">
                                <?
                                    echo $pagination;
                                ?>
                            </div>
                            <!--End Paginaton-->
                            
                        </div>
                        <!--End Ads List-->
                        
                        <!-- Bottom Adverts -->
                        <? include 'templates/bottom-ads.php'; ?>
                        <!-- Bottom Adverts -->
                        
                    </div>

                    <!--Side Bar-->
                    <div class="col-md-4 col-sm-4">
                        <div class="side_bar">
                            <div class="ad-categories">
                                <ul>
                                    <li class="title"><a href="#">Categories <i class="fa fa-angle-down"></i></a></li>
                                    <?
                                        if($base_categories)
                                            foreach ($base_categories as $category){
                                                echo '<li><a href="'.base_url()."ads/".$category->category_slug."-".$category->category_id.'">'.$category->category_name.' <span> ('.$this->CategoryModel->getBaseCategoryProductCount($category->category_id).')</span></a></li>';
                                            }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Side ads -->
                        <? include 'templates/side-ads.php'; ?>
                        <!-- End Side ads -->
                    </div>
                    <!--End side bar-->
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
        
        <script>
            $(document).ready(function() {

                $("#owl-example").owlCarousel({
                    items: 4,
                    autoPlay: true,
                    stopOnHover: true
                });

            });
        </script>
        
        
    </body>
</html>
