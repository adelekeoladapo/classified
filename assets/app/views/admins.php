<!--Student List Block-->
<div>
    <div class="row page-content">
        <div class="page-title">
            Manage Administrators
        </div>
        <div class="col-md-12 top-btns">
            <a ui-sref="new-admin" class="btn btn-primary"><i class="fa fa-plus-circle"> </i> Add</a>
            <!--<button class="btn btn-back"><i class="fa fa-arrow-circle-left"></i> Back</button>-->
        </div>
        <div class="col-md-12 page-inner">
            <table class="table table-striped table-hover table-responsive" datatable="ng">
                <thead class="table-bordered">
                    <tr>
                        <th>Username</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Last Logged In</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <tr ng-repeat="admin in admins">
                        <td>{{ admin.admin_username }}</td>
                        <td>{{ admin.admin_firstname }}</td>
                        <td>{{ admin.admin_lastname }}</td>
                        <td>{{ admin.admin_email }}</td>
                        <td>{{ (admin.admin_last_loged_in != '0000-00-00 00:00:00') ? factory.formatDate_2(admin.admin_last_loged_in) : '' }}</td>
                        <td class="tb-btn"><i class="ion ion-clipboard tb-btn-primary tb-btn-view" ui-sref="admin({ id:admin.admin_id })" rel="tooltip" data-toggle="tooltip" data-placement="top" title="" onmouseenter="$(this).tooltip('show')" href="#/user/8" data-original-title="View"></i></td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>
<!--End Student List Block-->

