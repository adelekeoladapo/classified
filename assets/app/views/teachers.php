<div ng-controller="TeacherCtrl">
    <div class="row page-content">
        <div class="page-title">
            Manage Teachers 
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 page-head">
                    <button class="btn btn-primary pull-right" ng-click="showAddTeacher()">Add New</button>
                </div>
                <div class="col-md-12 page-inner">
                    <table class="table table-striped table-hover table-responsive" datatable="ng" dt-options="teacher_td_options" dt-column-defs="teacher_td_column_defs">
                        <thead class="table-bordered">
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                            <tr ng-repeat="teacher in app_data.teachers">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ teacher.Firstname }}</td>
                                <td>{{ teacher.Lastname }}</td>
                                <td>{{ teacher.Email }}</td>
                                <td>{{ teacher.PhoneNo }}</td>
                                <td class="tb-btn">
                                    <i class="fa fa-edit tb-btn-primary" ng-click="showEditTeacher($index)" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Edit" onmouseenter="$(this).tooltip('show')"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Add Teacher-->
    <div class="transparent-overlay" id="add-teacher-overlay">
        <div class="content">
            <div class="title">
                Add Teacher
            </div>
            <form class="middle ng-pristine ng-invalid ng-invalid-required" id="form-add-teacher">
                 <div class="form-group">
                    <label class="control-label" for="firstname">First Name <span class="required-field"> *</span></label>
                    <input type="text" class="form-control" required id="firstname" name="firstname" ng-model="Teacher.Firstname">
                 </div>
                <div class="form-group">
                     <label class="control-label" for="lastname">Last Name <span class="required-field"> *</span></label>
                     <input type="text" class="form-control" required id="lastname" name="lastname" ng-model="Teacher.Lastname">
                </div>
                <div class="form-group">
                     <label class="control-label" for="email">Email <span class="required-field"> *</span></label>
                     <input type="email" class="form-control" required id="email" name="email" ng-model="Teacher.Email">
                 </div>
                <div class="form-group">
                     <label class="control-label" for="phone">Phone No <span class="required-field"> *</span></label>
                     <input type="text" class="form-control" required id="phone" name="phone" ng-model="Teacher.PhoneNo">
                 </div>
            </form>
            <div class="footer">
                <button class="btn" ng-click="hideAddTeacher()">Cancel</button>
                <button class="btn fg-primary" ng-click="addTeacher()">OK</button>
            </div>
        </div>
    </div>
    
    <!--Edit teacher-->
    <div class="transparent-overlay" id="edit-teacher-overlay">
        <div class="content">
            <div class="title">
                Edit Teacher
            </div>
            <form class="middle" id="form-edit-teacher">
                 <div class="form-group">
                    <label class="control-label" for="firstname">First Name <span class="required-field"> *</span></label>
                    <input type="text" class="form-control" required id="firstname" name="firstname" ng-model="Teacher.Firstname">
                 </div>
                <div class="form-group">
                     <label class="control-label" for="lastname">Last Name <span class="required-field"> *</span></label>
                     <input type="text" class="form-control" required id="lastname" name="lastname" ng-model="Teacher.Lastname">
                </div>
                <div class="form-group">
                     <label class="control-label" for="email">Email <span class="required-field"> *</span></label>
                     <input type="email" class="form-control" required id="email" name="email" ng-model="Teacher.Email">
                 </div>
                <div class="form-group">
                     <label class="control-label" for="phone">Phone No <span class="required-field"> *</span></label>
                     <input type="text" class="form-control" required id="phone" name="phone" ng-model="Teacher.PhoneNo">
                 </div>
            </form>
            <div class="footer">
                <button class="btn" ng-click="hideEditTeacher()">Cancel</button>
                <button class="btn fg-primary" ng-click="editTeacher()">OK</button>
            </div>
        </div>
    </div>
    
</div>