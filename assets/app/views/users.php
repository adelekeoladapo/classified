<!--Student List Block-->
<div>
    <div class="row page-content">
        <div class="page-title">
            Manage Users
        </div>
        <div class="col-md-12 page-inner">
            <table class="table table-striped table-hover table-responsive" datatable="ng" dt-options="teacher_td_options" dt-column-defs="teacher_td_column_defs">
                <thead class="table-bordered">
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Date Registered</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <tr ng-repeat="user in users">
                        <td>{{ user.user_username }}</td>
                        <td>{{ user.user_firstname }}</td>
                        <td>{{ user.user_lastname }}</td>
                        <td>{{ user.user_email }}</td>
                        <td>{{ user.state_name+", "+user.country_name }}</td>
                        <td ng-init="type = (user.user_account_type == 1) ? 'Basic' : 'Premium' " >{{ type }}</td>
                        <td>{{ factory.formatDate_1(user.user_date_registered) }}</td>
                        <td class="tb-btn">
                            <!--<i class="fa fa-edit tb-btn-primary tb-btn-edit" ui-sref="edit-student({ id: student.student_id })" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit" onmouseenter="$(this).tooltip('show')"></i>-->
                            <i class="ion ion-clipboard tb-btn-primary tb-btn-view" ui-sref="user({ id:user.user_id })" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View" onmouseenter="$(this).tooltip('show')"></i>
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>
<!--End Student List Block-->
