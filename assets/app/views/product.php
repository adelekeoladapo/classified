<div class="row page-content">
    <div class="page-title">
        <a href="#">Product /</a> {{ product.product_name }}
    </div>
    <!-- Back Button -->
    <a ui-sref="products" class="btn default-btn-back"><i class="fa fa-arrow-circle-left"></i> Back</a>
    <!-- End Back Button -->
    <div class="col-md-12 page-inner">
        <div class="split-block">
            <div class="title-div">
                <ul>
                    <li class="active" data-url="pane-1">Basic Information</li>
                    <!--<li data-url="pane-2">Ads Posted</li>-->
                </ul>
            </div>
            <div class="content-div">
                <div class="active" id="pane-1">
                    <div class="row">
                        <div class="col-md-4 info-block">
                            <table class="table">
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       User 
                                    </td>
                                    <td class="info-item-descr" ng-init="user = factory.getUser(app_data.users, product.product_user_id)">
                                        {{ user.user_username }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Price 
                                    </td>
                                    <td class="info-item-descr ">
                                        {{ (product.product_price > 0) ? product.product_price : '' }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Description
                                    </td>
                                    <td class="info-item-descr" style="white-space: pre-line; padding-top: 0;">
                                        {{ product.product_description }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Posted On
                                    </td>
                                    <td class="info-item-descr">
                                        {{ factory.formatDate_1(product.product_date_posted) }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--<div class="col-md-1"></div>-->
                        <div class="col-md-4 info-block">
                            <table class="table">
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Category 
                                    </td>
                                    <td class="info-item-descr" ng-init="category = factory.getParentCategory(app_data.categories, product.category_parent_id)">
                                        {{ category.category_name }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Sub Category 
                                    </td>
                                    <td class="info-item-descr">
                                        {{ product.category_name }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Location 
                                    </td>
                                    <td class="info-item-descr">
                                        {{ product.state_name+", "+product.country_name }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="product-images">
                                <img src="assets/images/uploads/{{ images[0].image_name }}" alt=""/>
                            </div>
                            <div class="user-btns" style="text-align: center; margin-top: 10px;">

                                <button class="btn btn-default btn-deactivate-user" ng-click="deleteAd()"><i class="ion ion-trash-a"></i>Delete Ad</button>

                            </div>
                        </div>
                    </div>
                </div>
<!--                <div id="pane-2">
                    Pane Two
                </div>-->
            </div>
        </div>
    </div>
</div>