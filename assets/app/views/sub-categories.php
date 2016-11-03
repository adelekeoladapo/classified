<!--Student List Block-->
<div>
    <div class="row page-content">
        <div class="page-title">
            Manage Sub-Categories
        </div>
        <div class="col-md-12 top-btns">
            <button ng-click="showAddSubCategoryOverlay()" class="btn btn-primary"><i class="fa fa-plus-circle"> </i> Add</button>
            <!--<button class="btn btn-back"><i class="fa fa-arrow-circle-left"></i> Back</button>-->
        </div>
        <div class="col-md-12 page-inner">
            <div class="table-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="">
                            <i class="fa fa-clone"></i> {{ Category.category_name }}
                        </h4>
                    </div>
                    <div class="col-md-3 category-selector">
                        <select class="form-control" ng-model="category_id" ng-change="changeCategory(category_id)">
                            <option value="">-- Select Category --</option>
                            <option ng-repeat="category in base_categories" value="{{ category.category_id }}">{{ category.category_name }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-responsive">
                <thead class="table-bordered">
                    <tr>
                        <th>Sub-Category</th>
                        <th>No. of Products</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <tr ng-repeat="category in sub_categories">
                        <td>{{ category.category_name }}</td>
                        <td ng-init="c = factory.getSubCategoryProducts(app_data.products, category.category_id)">{{ c.length }}</td>
                        <td class="tb-btn">
                            <!--<i class="fa fa-edit tb-btn-primary tb-btn-edit" ui-sref="edit-student({ id: student.student_id })" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit" onmouseenter="$(this).tooltip('show')"></i>-->
                            <i class="ion ion-edit tb-btn-primary tb-btn-edit" ng-init="id = category.category_id" ng-click="showEditSubCategoryOverlay(id)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit" onmouseenter="$(this).tooltip('show')"></i>
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>
<!--End Student List Block-->



<!-- Add Category -->
<div class="row transparent-overlay" id="add-sub-category-overlay">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="content">
            <div class="title">
                {{ Category.category_name }}
            </div>
            <div class="middle">
                <form id="form-add-sub-category">
                    <div class="form-group">
                        <label class="control-label" for="category_name">Sub Category <span class="required-field"> *</span></label>
                        <input type="text" class="form-control" required id="name" name="category_name" ng-model="SubCategory.category_name">
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn" ng-click="hideAddSubCategoryOverlay()">Cancel</button>
                <button class="btn fg-primary" ng-click="addSubCategory()">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Category -->


<!-- Edit Category -->
<div class="row transparent-overlay" id="edit-sub-category-overlay">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="content">
            <div class="title">
                {{ Category.category_name }}
            </div>
            <div class="middle">
                <form id="form-edit-sub-category">
                    <div class="form-group">
                        <label class="control-label" for="category_name">Sub-Category <span class="required-field"> *</span></label>
                        <input type="text" class="form-control" required id="name" name="category_name" ng-model="SubCategory.category_name">
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn" ng-click="hideEditSubCategoryOverlay()">Cancel</button>
                <button class="btn fg-primary" ng-click="updateSubCategory()">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Category -->