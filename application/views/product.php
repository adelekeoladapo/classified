<!DOCTYPE html>
<html>
    <head>
        <title><? echo $product->product_name; ?> | HomeBuds</title>

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
                    <!--Breacrumb-->
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="<? echo base_url(); ?>">Home</a></li>
                            <li><a href="<? echo base_url()."ads/".$category->category_slug."-".$category->category_id; ?>"><? echo $category->category_name; ?></a></li>
                            <li class="active"><? echo $product->product_name ?></li>
                        </ol>
                    </div>
                    <!--End Breacrumb-->
                    <!--Main content-->
                    <div class="col-md-8 col-sm-8">
                        <div class="content product">
                            <h4 class="product-title"><? echo $product->product_name ?></h4>
                            <span class="short-info"><i class="fa fa-clock-o"></i> <? echo "Posted on ".$this->penguin->formatDate_1($product->product_date_posted)."&nbsp &nbsp &nbsp"; ?><i class="fa fa-map-marker"></i> <? echo $product->state_name.", ".$product->country_name; ?> </span>
                            <div class="photo">
                                <img src="<? echo base_url(); ?>assets/images/uploads/<? echo ($product_images) ? $product_images[0]->image_name : 'placeholder.png' ?>">
                                <div class="price-tag"><? echo ($product->product_price > 0) ? "N".$product->product_price : ""; ?></div>
                            </div>
                            
                            <div class="row details">
                                <div class="col-md-12 title">
                                    <h4>Ads Details</h4>
                                </div>
                                <div class="col-md-8">
                                    <p class="product-descr">
                                        <? echo $product->product_description; ?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <div class="well well-sm">
                                        <p><strong>Price: </strong><? echo ($product->product_price > 0) ? "N ".$product->product_price : ""; ?></p>
                                        <p><strong>Type: </strong><? echo $product->category_name; ?></p>
                                        <p><strong>Location: </strong><? echo $product->state_name.", ".$product->country_name; ?></p>
                                    </div>
                                    <ul class="more-details-list">
                                        <li>
                                            <a href="#"><i class="fa fa-user"></i> More ads by user</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> 
                                                <!-- Paste Here -->
                                            </a>
                                            <div class="fb-share-button" 
                                                    data-href="<? echo base_url().'ad/'.$product->product_slug.'-'.$product->product_id; ?>" 
                                                    data-layout="button_count">
                                            </div>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                            
                            <div class="photo-list">
                                <ul>
                                    <?
                                        if($product_images)
                                            foreach ($product_images as $image){
                                                echo '<li>
                                                        <img src="'.base_url().'assets/images/uploads/'.$image->image_name.'">
                                                    </li>';
                                            }
                                    ?>
                                </ul>
                            </div>
                            
                        </div>
                        
                        <!-- Bottom Adverts -->
                        <? include 'templates/bottom-ads.php'; ?>
                        <!-- Bottom Adverts -->
                        
                    </div>

                    <!--Side Bar-->
                    <div class="col-md-4 col-sm-4">
                       <!--Seller's Info-->
                       <div class="seller-info">
                           <span class="title">Contact Seller</span>
                           <div class="info">
                               <p class="name"><? echo $seller->user_firstname." ".$seller->user_lastname; ?></p>
                               <p>Status: <span><? echo ($seller->user_account_type == 1) ? "Basic" : "Premium"; ?></span></p>
                               <p>Joined: <span><? echo $this->penguin->formatDate_1($seller->user_date_activated); ?></span></p>
                               <p>Location: <span><? echo $seller->state_name.", ".$seller->country_name; ?></span></p>
                               <div class="contact-btn">
                                   <button class="btn btn-block btn-call"><i class="fa fa-phone"></i> <? echo $seller->user_phone; ?></button>
                                   
                                   <!-- Contact Seller Form -->
                                   <form class="form-contact-seller" id="form-contact-seller" method="POST">
                                       <input type="hidden" name="receiver-id" value="<? echo $seller->user_id; ?>">
                                       <input type="hidden" name="product-id" value="<? echo $product->product_id; ?>">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="sender-name" placeholder="Full Name (Required)" class="form-control" value="<? echo ($this->session->logged_in) ? $this->session->user_firstname." ".$this->session->user_lastname : ""; ?>" required>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="email" name="sender-email" placeholder="Email Address (Required)" class="form-control" value="<? echo ($this->session->logged_in) ? $this->session->user_email : ""; ?>" required>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="number" name="sender-phone" placeholder="Phone No (Optional)" value="<? echo ($this->session->logged_in) ? $this->session->user_phone : ""; ?>" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="content" rows="5" placeholder="Your message (Required)" required></textarea>
                                            </div>
                                        </div>
                                   </form>
                                   <!-- End Contact Seller Form -->
                                   
                                   <button class="btn btn-block btn-primary" onclick="$('#form-contact-seller').submit()"><i class="fa fa-envelope"></i> Send a message</button>
                               </div>
                           </div>
                       </div>
                       <!--End Seller's Info-->
                       
                       <!-- Side ads -->
                       <? include 'templates/side-ads.php'; ?>
                       <!-- End Side ads -->
                       
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
