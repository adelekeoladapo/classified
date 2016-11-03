<style>
    
    .dataTables_wrapper {
        margin: 10px;
    }
    
    .page-content .page-inner {
        border: solid 1px #ddd;
        border-radius: 4px;
    }
    
</style>

<!--Student List Block-->
<div>
    <div class="row page-content">
        <div class="page-title">
            Manage Places
        </div>
        <div class="col-md-12 top-btns">
            <button ng-click="showAddStateOverlay()" class="btn btn-primary"><i class="fa fa-plus-circle"> </i> Add</button>
            <!--<button class="btn btn-back"><i class="fa fa-arrow-circle-left"></i> Back</button>-->
        </div>
        <div class="col-md-12 page-inner">
            <div class="table-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="">
                            <i class="fa fa-map-marker"></i> {{ Country.country_name }}
                        </h4>
                    </div>
                    <div class="col-md-3 category-selector">
                        <select class="form-control" ng-model="country_id" ng-change="changeCountry(country_id)">
                            <option value="">-- Select Country --</option>
                            <option ng-repeat="country in app_data.countries" value="{{ country.country_id }}">{{ country.country_name }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-responsive" datatable="ng" dt-options="teacher_td_options" dt-column-defs="teacher_td_column_defs">
                <thead class="table-bordered">
                    <tr>
                        <th>Place</th>
                        <th>No. of Users</th>
                        <th>No. of Ads</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <tr ng-repeat="state in states">
                        <td>{{ state.state_name }}</td>
                        <td ng-init="u = factory.getStateUsers(app_data.users, state.state_id)">{{ u.length }}</td>
                        <td ng-init="p = factory.getStateProducts(app_data.products, state.state_id)">{{ p.length }}</td>
                        <td class="tb-btn">
                            <i class="ion ion-edit tb-btn-primary tb-btn-edit" ng-init="dd = state.state_id;" ng-click="showEditStateOverlay(dd)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit" onmouseenter="$(this).tooltip('show')"></i>
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
<div class="row transparent-overlay" id="add-state-overlay">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="content">
            <div class="title">
                Add Place
            </div>
            <div class="middle">
                <form id="form-add-state">
                    <div class="form-group">
                        <label class="control-label" for="state_name">Place <span class="required-field"> *</span></label>
                        <input type="text" class="form-control" required id="name" name="state_name" ng-model="State.state_name">
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn" ng-click="hideAddStateOverlay()">Cancel</button>
                <button class="btn fg-primary" ng-click="addState()">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Category -->


<!-- Edit Category -->
<div class="row transparent-overlay" id="edit-state-overlay">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="content">
            <div class="title">
                Edit Place
            </div>
            <div class="middle">
                <form id="form-edit-state">
                    <div class="form-group">
                        <label class="control-label" for="state_name">Place <span class="required-field"> *</span></label>
                        <input type="text" class="form-control" required id="name" name="state_name" ng-model="State.state_name">
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn" ng-click="hideEditStateOverlay()">Cancel</button>
                <button class="btn fg-primary" ng-click="updateState()">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Category -->