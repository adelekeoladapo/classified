<!--Student List Block-->
<div>
    <div class="row page-content">
        <div class="page-title">
            Manage Products
        </div>
        <div class="col-md-12 page-inner">
            <table class="table table-striped table-hover table-responsive" datatable="ng" dt-options="teacher_td_options" dt-column-defs="teacher_td_column_defs">
                <thead class="table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>User</th>
                        <th>Date Posted</th>
                        <th>No. of Views</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <tr ng-repeat="product in products">
                        <td>{{ product.product_name }}</td>
                        <td ng-init="category = factory.getParentCategory(app_data.categories, product.category_parent_id)">{{ category.category_name }}</td>
                        <td>{{ (product.product_price > 0) ? product.product_price : '' }}</td>
                        <td>{{ product.state_name+", "+product.country_name }}</td>
                        <td ng-init="user = factory.getUser(app_data.users, product.product_user_id)">{{ user.user_username }}</td>
                        <td>{{ factory.formatDate_2(product.product_date_posted) }}</td>
                        <td>{{ product.product_views }}</td>
                        <td class="tb-btn">
                            <!--<i class="fa fa-edit tb-btn-primary tb-btn-edit" ui-sref="edit-student({ id: student.student_id })" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit" onmouseenter="$(this).tooltip('show')"></i>-->
                            <i class="ion ion-clipboard tb-btn-primary tb-btn-view" ui-sref="product({ id: product.product_id })" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View" onmouseenter="$(this).tooltip('show')"></i>
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>
<!--End Student List Block-->
