<!--Student List Block-->
<div>
    <div class="row page-content">
        <div class="page-title">
            Manage Countries
        </div>
        <div class="col-md-12 top-btns">
            <button ng-click="showAddCountryOverlay()" class="btn btn-primary"><i class="fa fa-plus-circle"> </i> Add</button>
            <!--<button class="btn btn-back"><i class="fa fa-arrow-circle-left"></i> Back</button>-->
        </div>
        <div class="col-md-12 page-inner">
            <table class="table table-striped table-hover table-responsive" datatable="ng" dt-options="teacher_td_options" dt-column-defs="teacher_td_column_defs">
                <thead class="table-bordered">
                    <tr>
                        <th>Country</th>
                        <th>No. of Users</th>
                        <th>No. of Places</th>
                        <th>No. of Ads</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <tr ng-repeat="country in countries">
                        <td>{{ country.country_name }}</td>
                        <td ng-init="u = factory.getCountryUsers(app_data.users, country.country_id)">{{ u.length }}</td>
                        <td ng-init="s = factory.getCountryStates(app_data.states, country.country_id)">{{ s.length }}</td>
                        <td ng-init="p = factory.getCountryProducts(app_data.products, country.country_id)">{{ p.length }}</td>
                        <td class="tb-btn">
                            <i class="ion ion-edit tb-btn-primary tb-btn-edit" ng-init="dd = country.country_id;" ng-click="showEditCountryOverlay(dd)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit" onmouseenter="$(this).tooltip('show')"></i>
                            <!--<i class="ion ion-clipboard tb-btn-primary tb-btn-view" ng-init="id = category.category_id" ng-click="console.log('88')" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View" onmouseenter="$(this).tooltip('show')"></i>-->
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>
<!--End Student List Block-->



<!-- Add Category -->
<div class="row transparent-overlay" id="add-country-overlay">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="content">
            <div class="title">
                Add Country
            </div>
            <div class="middle">
                <form id="form-add-country">
                    <div class="form-group">
                        <label class="control-label" for="country_name">Country <span class="required-field"> *</span></label>
                        <input type="text" class="form-control" required id="name" name="country_name" ng-model="Country.country_name">
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn" ng-click="hideAddCountryOverlay()">Cancel</button>
                <button class="btn fg-primary" ng-click="addCountry()">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Category -->


<!-- Edit Category -->
<div class="row transparent-overlay" id="edit-country-overlay">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="content">
            <div class="title">
                Edit Country
            </div>
            <div class="middle">
                <form id="form-edit-country">
                    <div class="form-group">
                        <label class="control-label" for="country_name">Country <span class="required-field"> *</span></label>
                        <input type="text" class="form-control" required id="name" name="country_name" ng-model="Country.country_name">
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn" ng-click="hideEditCountryOverlay()">Cancel</button>
                <button class="btn fg-primary" ng-click="updateCountry()">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Category -->