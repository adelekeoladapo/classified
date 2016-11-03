<!DOCTYPE html>
<html>
    <head>
        <title>Home | HomeBuds</title>

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

        <!--Page Body-->
        <div class="block page-content">
            <div class="container-fluid">
                <div class="row"> 

                    <!--Main content-->
                    <div class="col-md-8 col-sm-8">
                        <!--Ads List-->
                        <div class="ads-block-list">
                            
                            <div class="ad-list-title">
                                <div class="title">
                                    All Ads <span class="counter"><? echo $no_of_product; ?></span>
                                </div>
                                <div class="filter">
                                    <select id="sorter">
                                        <option>Sort by</option>
                                        <option value="<? echo current_url()."?order-by=product_date_posted" ?>">Date</option>
                                        <option value="<? echo current_url()."?order-by=product_price" ?>">Price</option>
                                    </select>
                                </div>
                            </div>
                            
                            <table class="table">
                                <?
                                    if($products){
                                        foreach($products as $product){
                                            $seller_account_type = $this->UserModel->getAccountType($product->product_user_id);
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
                                                            N '.$product->product_price.'
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
        
    </body>
</html>
