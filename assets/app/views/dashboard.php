<div class="row page-content">
    <div class="page-title">
        Dashboard
    </div>
    <div class="col-md-12" style="padding-bottom: 10px;">
        <div class="row">
            
            <div class="col-md-3">
                <div class="tab" style="border-top: solid 1px #FFEB3B;">
                    <div class="tab-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="tab-info">
                        <h4 class="counter">{{ app_data.users.length }}</h4>
                        <span class="title">Users</span>
                        <span class="descr"><a href="#">Click here to view</a></span>
                    </div>
                    <div class="tab-footer">
                        <a ui-sref="users">Manage Users <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="tab" style="border-top: solid 1px #00BCD4;">
                    <div class="tab-icon">
                        <i class="fa fa-thumb-tack "></i>
                    </div>
                    <div class="tab-info">
                        <h4 class="counter">{{ app_data.products.length }}</h4>
                        <span class="title">Posted Ads</span>
                        <span class="descr"><a href="#">Click here to view</a></span>
                    </div>
                    <div class="tab-footer">
                        <a ui-sref="products">Manage Ads <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="tab" style="border-top: solid 1px #ff9800;">
                    <div class="tab-icon">
                        <i class="fa fa-clone "></i>
                    </div>
                    <div class="tab-info">
                        <h4 class="counter">{{ factory.getBaseCategories(app_data.categories).length }}</h4>
                        <span class="title">Categories</span>
                        <span class="descr"><a href="#">Click here to view</a></span>
                    </div>
                    <div class="tab-footer">
                        <a ui-sref="categories">Manage Categories <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="tab" style="border-top: solid #79b657 1px;">
                    <div class="tab-icon">
                        <i class="fa fa-map-marker "></i>
                    </div>
                    <div class="tab-info">
                        <h4 class="counter">{{ app_data.countries.length }}</h4>
                        <span class="title">Countries</span>
                        <span class="descr"><a href="#">Click here to view</a></span>
                    </div>
                    <div class="tab-footer">
                        <a ui-sref="countries">Manage Locations <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
        
        <hr>
        
        <div class="row">
            <div class="col-md-6">
                <div class="big-tab" style="border-left: solid 3px #00BCD4;">
                    <div class="title">
                        5 Most Viewed Ads
                        <span><a ui-sref="products">View All</a></span>
                    </div>
                    <table class="table">
                        <tr>
                            <th>SN</th>
                            <th>Ad Title</th>
                            <th style="text-align: center">Views</th>
                        </tr>
                        <tr ng-repeat="product in top_products">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ product.product_name }}</td>
                            <td style="text-align: center">{{ product.product_views }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="big-tab" style="border-left: solid 3px #FF9800;">
                    <div class="title">
                        5 Least Viewed Ads
                        <span><a ui-sref="products">View All</a></span>
                    </div>
                    <table class="table">
                        <tr>
                            <th>SN</th>
                            <th>Ad Title</th>
                            <th style="text-align: center">Views</th>
                        </tr>
                        <tr ng-repeat="product in least_products">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ product.product_name }}</td>
                            <td style="text-align: center">{{ product.product_views }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
        </div>
        
    </div>
</div>