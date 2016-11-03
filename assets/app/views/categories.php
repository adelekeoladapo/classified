<!--Student List Block-->
<div>
    <div class="row page-content">
        <div class="page-title">
            Manage Categories
        </div>
        <div class="col-md-12 top-btns">
            <button ng-click="showAddCategoryOverlay()" class="btn btn-primary"><i class="fa fa-plus-circle"> </i> Add</button>
            <!--<button class="btn btn-back"><i class="fa fa-arrow-circle-left"></i> Back</button>-->
        </div>
        <div class="col-md-12 page-inner">
            <table class="table table-striped table-hover table-responsive" datatable="ng" dt-options="teacher_td_options" dt-column-defs="teacher_td_column_defs">
                <thead class="table-bordered">
                    <tr>
                        <th>Icon</th>
                        <th>Category</th>
                        <th>No. of Sub-Categories</th>
                        <th>No. of Products</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <tr ng-repeat="category in base_categories">
                        <td><img class="cat-img" src="assets/images/uploads/{{ category.category_image }}"></td>
                        <td>{{ category.category_name }}</td>
                        <td ng-init="cc = factory.getSubCategories(app_data.categories, category.category_id) ">{{ cc.length }}</td>
                        <td ng-init="c = factory.getCategoryProducts(app_data.products, category.category_id)">{{ c.length }}</td>
                        <td class="tb-btn">
                            <i class="ion ion-edit tb-btn-primary tb-btn-edit" ng-init="id = category.category_id" ng-click="showEditCategoryOverlay(id)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit" onmouseenter="$(this).tooltip('show')"></i>
                            <!--<i class="ion ion-clipboard tb-btn-primary tb-btn-view" ng-init="id = category.category_id" ng-click="viewCategory(id)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View" onmouseenter="$(this).tooltip('show')"></i>-->
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>
<!--End Student List Block-->



<!-- Add Category -->
<div class="row transparent-overlay" id="add-category-overlay">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="content">
            <div class="title">
                Add Category
            </div>
            <div class="middle">
                <form id="form-add-category">
                    <div class="form-group">
                        <label class="control-label" for="category_name">Category <span class="required-field"> *</span></label>
                        <input type="text" class="form-control" required id="name" name="category_name" ng-model="Category.category_name">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="category_image">Icon <span class="required-field"> *</span></label>
                        <input type="file" class="form-control" required name="category_image" ng-model="Category.category_image">
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn" ng-click="hideAddCategoryOverlay()">Cancel</button>
                <button class="btn fg-primary" ng-click="addCategory()">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Category -->


<!-- Edit Category -->
<div class="row transparent-overlay" id="edit-category-overlay">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="content">
            <div class="title">
                Edit Category
            </div>
            <div class="middle">
                <form id="form-edit-category">
                    <input type="text" ng-show="false" name="category_id" value="{{ Category.category_id }}">
                    <div class="form-group">
                        <label class="control-label" for="category_name">Category <span class="required-field"> *</span></label>
                        <input type="text" class="form-control" required id="name" name="category_name" ng-model="Category.category_name">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="category_image">Icon</label>
                        <input type="file" class="form-control" name="category_image" ng-model="Category.category_image">
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn" ng-click="hideEditCategoryOverlay()">Cancel</button>
                <button class="btn fg-primary" ng-click="updateCategory()">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Category -->