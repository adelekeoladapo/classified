<div ng-controller="ClassCtrl">
    <div class="row page-content">
        <div class="page-title">
            Manage Classes 
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 page-head">
                    <button class="btn btn-primary pull-right" ng-click="showAddClass()">Add New</button>
                </div>
                <div class="col-md-12 page-inner">
                    <table class="table table-striped table-hover table-responsive" datatable="ng" dt-options="class_td_options" dt-column-defs="class_td_column_defs">
                        <thead class="table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Teacher</th>
                                <th>No of Student</th>
                                <th>No of Subject</th>
                                <th>Sections</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                            <tr ng-repeat="class in app_data.classes">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ class.Name }}</td>
                                <td ng-init="teacher = getTeacher(class.TeacherID)">{{ teacher.Firstname+" "+teacher.Lastname }}</td>
                                <td>0</td>
                                <td>0</td>
                                <td ng-init="c = getSubClass(class.ClassID).length">{{ c }}</td>
                                <td class="tb-btn">
                                    <i class="fa fa-edit tb-btn-primary" ng-click="showEditClass($index)" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Edit" onmouseenter="$(this).tooltip('show')"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Add class-->
    <div class="transparent-overlay" id="add-class-overlay">
        <div class="content">
            <div class="title">
                Add Class
            </div>
            <form class="middle" id="form-add-class">
                <div class="form-group">
                    <label class="control-label" for="name">Name <span class="required-field"> *</span></label>
                    <input type="text" class="form-control" required id="name" name="name" ng-model="Class.Name">
                </div>
                <div class="form-group">
                    <label class="control-label" for="teacher-id">Teacher </label>
                    <select class="form-control" name="teacher-id" id="teacher-id" required ng-model="Class.TeacherID">
                         <option ng-repeat="teacher in app_data.teachers" value="{{ teacher.TeacherID }}">{{ teacher.Firstname+" "+teacher.Lastname }}</option>
                    </select>
                </div>
            </form>
            <div class="footer">
                <button class="btn" ng-click="hideAddClass()">Cancel</button>
                <button class="btn fg-primary" ng-click="addClass()">OK</button>
            </div>
        </div>
    </div>
    
    <!--Update class-->
    <div class="transparent-overlay" id="edit-class-overlay">
        <div class="content">
            <div class="title">
                Edit Class
            </div>
            <form class="middle" id="form-edit-class">
                <div class="form-group">
                    <label class="control-label" for="name">Name <span class="required-field"> *</span></label>
                    <input type="text" class="form-control" required id="name" name="name" ng-model="Class.Name">
                </div>
                <div class="form-group">
                    <label class="control-label" for="teacher-id">Teacher </label>
                    <select class="form-control" name="teacher-id" id="teacher-id" required ng-model="Class.TeacherID">
                         <option ng-repeat="teacher in app_data.teachers" value="{{ teacher.TeacherID }}">{{ teacher.Firstname+" "+teacher.Lastname }}</option>
                    </select>
                </div>
            </form>
            <div class="footer">
                <button class="btn" ng-click="hideEditClass()">Cancel</button>
                <button class="btn fg-primary" ng-click="editClass()">OK</button>
            </div>
        </div>
    </div>
    
</div>