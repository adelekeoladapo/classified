<div ng-controller="StudentCtrl">
    <div class="row page-content">
        <div class="page-title">
            Manage Students
        </div>
        <div class="col-md-12">
            <div class="row">
<!--                <div class="col-md-12 page-head">
                    <a ui-sref="new-student" class="btn btn-primary pull-right">Add New</a>
                </div>-->
                <div class="col-md-2 classes">
                    <ul>
                        <li class="title">Classes</li>
                        <li ng-repeat="class in app_data.classes"><a ng-class="{active: $first}" ng-click="initSection(class.ClassID)">{{ class.Name }}</a></li>
                    </ul>
                </div>
                <div class="col-md-10 sub-classes">
                    <div class="col-md-12 page-inner">
                        <div class="section-title">
                            <a ui-sref="new-student" class="btn btn-primary pull-right">Add New</a>
                            <ul>
                                <li class="active" id="all-students" ng-click="initStudents(active_class_id)">All Students</li>
                                <li ng-repeat="section in sections" ng-click="initSectionStudents(section.ClassID)">{{ section.Name }}</li>
                            </ul>
                        </div>
                        <div class="student-table" style="border: solid 1px #ddd; margin-top: -11px; padding: 10px;">
                            <table class="table table-striped table-hover table-responsive" datatable="ng" dt-options="teacher_td_options" dt-column-defs="teacher_td_column_defs">
                                <thead class="table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Reg No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Phone No</th>
                                        <!--<th></th>-->
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                    <tr ng-repeat="student in students">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ student.StudentNo }}</td>
                                        <td>{{ student.Firstname }}</td>
                                        <td>{{ student.Lastname }}</td>
                                        <td>{{ (student.Sex == 1) ? 'Male' : 'Female' }}</td>
                                        <td>{{ student.PhoneNo }}</td>
<!--                                        <td class="tb-btn">
                                            <i class="fa fa-edit tb-btn-primary" ng-click="showEditTeacher($index)" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Edit" onmouseenter="$(this).tooltip('show')"></i>
                                        </td>-->
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>