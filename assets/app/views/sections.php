<div ng-controller="ClassCtrl">
    <div class="row page-content">
        <div class="page-title">
            Manage Sections
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 page-head">
                    <button class="btn btn-primary pull-right" ng-click="showAddSection()">Add New</button>
                </div>
                <div class="col-md-2 classes">
                    <ul>
                        <li class="title">Classes</li>
                        <li ng-repeat="class in app_data.classes"><a ng-class="{active: $first}" href="#" ng-click="initSection(class.ClassID)">{{ class.Name }}</a></li>
                    </ul>
                </div>
                <div class="col-md-10 sub-classes">
                    <div class="col-md-12 page-inner">
                        <table class="table table-striped table-hover table-responsive" datatable="ng" dt-options="section_td_options" dt-column-defs="section_td_column_defs">
                            <thead class="table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Teacher</th>
                                    <th>No of Student</th>
                                    <th>No of Subject</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                <tr ng-repeat="class in section">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ class.Name }}</td>
                                    <td ng-init="teacher = getTeacher(class.TeacherID)">{{ teacher.Firstname+" "+teacher.Lastname }}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td class="tb-btn">
                                        <i class="fa fa-edit tb-btn-primary" ng-click="showEditSection($index)" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Edit" onmouseenter="$(this).tooltip('show')"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!--Add Section-->
    <div class="transparent-overlay" id="add-section-overlay">
        <div class="content">
            <div class="title">
                Add Section
            </div>
            <form class="middle" id="form-add-class">
                <div class="form-group">
                    <label class="control-label" for="name">Name <span class="required-field"> *</span></label>
                    <input type="text" class="form-control" required id="name" name="name" ng-model="Class.Name">
                </div>
                <div class="form-group">
                    <label class="control-label" for="parent-id">Class <span class="required-field"> *</span></label>
                    <select class="form-control" name="parent-id" id="parent-id" required ng-model="Class.ParentID" required>
                         <option ng-repeat="class in app_data.classes" value="{{ class.ClassID }}">{{ class.Name }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="teacher-id">Teacher </label>
                    <select class="form-control" name="teacher-id" id="teacher-id" required ng-model="Class.TeacherID">
                         <option ng-repeat="teacher in app_data.teachers" value="{{ teacher.TeacherID }}">{{ teacher.Firstname+" "+teacher.Lastname }}</option>
                    </select>
                </div>
            </form>
            <div class="footer">
                <button class="btn" ng-click="hideAddSection()">Cancel</button>
                <button class="btn fg-primary" ng-click="addSection()">OK</button>
            </div>
        </div>
    </div>
    
    
    <!--Update section-->
    <div class="transparent-overlay" id="edit-section-overlay">
        <div class="content">
            <div class="title">
                Edit Section
            </div>
            <form class="middle" id="form-section-class">
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
                <button class="btn" ng-click="hideEditSection()">Cancel</button>
                <button class="btn fg-primary" ng-click="editSection()">OK</button>
            </div>
        </div>
    </div>
    

    
</div>







