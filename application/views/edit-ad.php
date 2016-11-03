<!DOCTYPE html>
<html>
    <head>
        <title>Edit Ads | HomeBuds</title>

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
                                <h4 class="page-title"><i class="fa fa-clone"></i> Edit Ad</h4>

                                <!--Post Ad form-->
                                <form class= "form-horizontal form-sign-up-1" id= "form-update-ad" novalidate> 
                                    <input type="hidden" name="product-id" value="<? echo $product->product_id; ?>">
                                    <!--Category field-->
                                    <div class="form-group select-field">
                                        <label for="category" class="col-sm-4 control-label">Category <span class="required-field"> *</span></label>
                                        <div class="col-sm-8 ">
                                            <select class="form-control" name="category" id="category" value="<?php echo set_value('category'); ?>" required>
                                                <option value="">--  Select a category --</option>
                                                <?
                                                    foreach($base_categories as $base_category){
                                                        $selected = ($base_category->category_id == $product->category_parent_id) ? 'selected' : '';
                                                        echo '<option value="'.$base_category->category_id.'" '.$selected.' >'.$base_category->category_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <?php echo form_error('category'); ?>
                                        </div>
                                    </div>
                                    <!--End Category field-->

                                    <!--Sub Category field-->
                                    <div class="form-group select-field">
                                        <label for="sub-category" class="col-sm-4 control-label">Sub Category <span class="required-field"> *</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="sub-category" id="sub-category" value="<?php echo set_value('sub-category'); ?>" required>
                                                <?
                                                    foreach($sub_categories as $category){
                                                        $selected = ($category->category_id == $product->category_id) ? 'selected' : '';
                                                        echo '<option value="'.$category->category_id.'" '.$selected.' >'.$category->category_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <?php echo form_error('sub-category'); ?>
                                        </div>
                                    </div>
                                    <!--End Sub Category field-->

                                    <!--Title field-->
                                    <div class="form-group">
                                        <label for="title" class="col-sm-4 control-label">Ad Title <span class="required-field"> *</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="title" placeholder="Ad Title" class="form-control" value="<? echo (set_value('title')) ? set_value('title') : $product->product_name; ?>" required>
                                            <?php echo form_error('title'); ?>
                                        </div>
                                    </div>
                                    <!--End Title field-->

                                    <!--Description field-->
                                    <div class="form-group">
                                        <label for="description" class="col-sm-4 control-label">Description <span class="required-field"> *</span></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="description" rows="5" placeholder="Describe what makes your Ad unique" required><? echo (set_value('description')) ? set_value('description') : trim($product->product_description); ?></textarea>
                                            <?php echo form_error('description'); ?>
                                        </div>
                                    </div>
                                    <!--End Description field-->

                                    <!--Price field-->
                                    <div class="form-group">
                                        <label for="price" class="col-sm-4 control-label">Price <span class="required-field"> *</span></label>
                                        <div class="col-sm-8 price">
                                            <b>N</b>
                                            <input type="number" name="price" placeholder="Price" class="form-control" value="<? echo (set_value('price')) ? set_value('price') : $product->product_price; ?>" required>
                                            <?php echo form_error('price'); ?>
                                        </div>
                                    </div>
                                    <!--End Price field-->

                                    <!--Photo field-->
    <!--                                <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label">Photos </label>
                                        <div class="col-sm-8">
                                            <div class="col-md-12 col-sm-12 img-input-div">
                                                <div class="image-input">
                                                    <div class="col-md-5 col-sm-5 image-preview" id="image-preview-1">
                                                        <img src="<? echo base_url() ?>assets/images/placeholder.png">
                                                    </div>
                                                    <input type="file" name="photo-1" id="photo-1" class="col-md-7 col-sm-7">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 img-input-div">
                                                <div class="image-input">
                                                    <div class="col-md-5 col-sm-5 image-preview" id="image-preview-2">
                                                        <img src="<? echo base_url() ?>assets/images/placeholder.png">
                                                    </div>
                                                    <input type="file" name="photo-2" id="photo-2" class="col-md-7 col-sm-7">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 img-input-div">
                                                <div class="image-input">
                                                    <div class="col-md-5 col-sm-5 image-preview" id="image-preview-3">
                                                        <img src="<? echo base_url() ?>assets/images/placeholder.png">
                                                    </div>
                                                    <input type="file" name="photo-3" id="photo-3" class="col-md-7 col-sm-7">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 img-input-div">
                                                <div class="image-input">
                                                    <div class="col-md-5 col-sm-5 image-preview" id="image-preview-4">
                                                        <img src="<? echo base_url() ?>assets/images/placeholder.png">
                                                    </div>
                                                    <input type="file" name="photo-4" id="photo-4" class="col-md-7 col-sm-7">
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <!--End Photo field-->

                                    <!--Post Ad btn-->
                                    <div class="form-group">
                                        <!--<label for="password" class="col-sm-4 control-label"></label>-->
                                        <div class="col-sm-8">
                                            <button class="btn btn-default btn-primary" type="submit" id="post-ad">Save Ad</button>
                                        </div>
                                    </div>
                                    <!--End Post Ad btn-->


                                </form>
                                <!--End Post Ad form-->
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