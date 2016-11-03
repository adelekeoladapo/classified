<div ng-controller="StudentCtrl">
    <div class="row page-content">
        <div class="page-title">
            New Student
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 page-inner">
                    <form class="form-horizontal" id="form-add-student" name="form-add-student" onsubmit="return false" enctype="multipart/form-data">
                        <!--Upper form-->
                        <div class="row">
                            <div class="col-md-6 form-box personal-info">
                                <h4 class="form-title">Personal Information</h4>
                                <div class="form-group">
                                    <label for="reg-no" class="col-sm-4 control-label">Registration No. <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="reg-no" class="form-control" ng-model="Student.StudentNo" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-sm-4 control-label">First Name <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="firstname" class="form-control" ng-model="Student.Firstname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-4 control-label">Last Name  <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="lastname" class="form-control" ng-model="Student.Lastname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="othernames" class="col-sm-4 control-label">Other Names</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="othernames" ng-model="Student.Othernames" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="d-o-b" class="col-sm-4 control-label">Date of Birth <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="date" name="d-o-b" class="form-control" ng-model="Student.DOB" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-sm-4 control-label">Gender <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="gender" ng-model="Student.Sex" required>
                                            <option value="">--select--</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-box photo">
                                <h4 class="form-title">Other Information</h4>
                                <div class="form-group">
                                    <label for="reg-no" class="col-sm-4 control-label">Photo </label>
                                    <div class="col-sm-8">
                                        <div class="img-placeholder" id="img-placeholder">
                                            <img src="asset/images/blank-avatar.png">
                                        </div>
                                        <div>
                                            <input type="file" class="custom-file-input" ng-model="Student.Photo" id="photo" name="photo">
                                            <!--<span class="photo-spec">Accepted formats: .jpg, .gif and .jpeg</span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="class-id" class="col-sm-4 control-label">Class <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <select name="class-id" class="form-control" ng-change="sections = getSubClass(Student.ClassID)" ng-model="Student.ClassID">
                                            <option ng-repeat="class in app_data.classes" value="{{ class.ClassID }}">{{ class.Name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="section-id" class="col-sm-4 control-label">Section <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <select name="section-id" class="form-control" ng-model="Student.SectionID" ng-disabled="hasSections()">
                                            <option ng-repeat="class in sections" value="{{ class.ClassID }}">{{ class.Name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="religion-id" class="col-sm-4 control-label">Religion</label>
                                    <div class="col-sm-8">
                                        <select name="religion-id" class="form-control" ng-model="Student.ReligionID">
                                            <option value="1">Christianity</option>
                                            <option value="2">Islam</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="line"></div>

                        <!--Lower form-->
                        <div class="row">
                            <div class="col-md-6 form-box contact-info">
                                <h4 class="form-title">Contact Information</h4>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-4 control-label">Mobile No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone" class="form-control" ng-model="Student.PhoneNo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="state-id" class="col-sm-4 control-label">State</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="state-id" ng-change="lgas = getLGAs(Student.StateID)" ng-model="Student.StateID">
                                            <option ng-repeat="state in app_data.states" value="{{ state.id }}">{{ state.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="l-g-a-id" class="col-sm-4 control-label">L G A</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="l-g-a-id" ng-model="Student.LGAID">
                                            <option ng-repeat="lga in lgas" value="{{ lga.id }}">{{ lga.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-4 control-label">Address</label>
                                    <div class="col-sm-8">
                                        <textarea name="address" class="form-control" ng-model="Student.Address"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-box contact-info">
                                <h4 class="form-title">Parent / Guildian Information</h4>
                                <div class="form-group">
                                    <label for="parent-name" class="col-sm-4 control-label">Full Name <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="parent-name" class="form-control" ng-model="Parent.Fullname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="parent-phone" class="col-sm-4 control-label">Mobile No. <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="parent-phone" class="form-control" ng-model="Parent.PhoneNo" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="parent-email" class="col-sm-4 control-label">Email </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="parent-email" class="form-control" ng-model="Parent.Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="parent-address" class="col-sm-4 control-label">Address <span class="required-field"> *</span></label>
                                    <div class="col-sm-8">
                                        <textarea name="parent-address" class="form-control" ng-model="Parent.Address" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 20px; margin-bottom: 30px">
                            <button class="btn btn-primary" ng-click="addStudent()">Submit</button> 
                            <button class="btn btn-cancel" ui-sref="students">Back</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function(){
        $('#img-placeholder').imagepreview({
            input: '[name="photo"]',
            reset: '',
            preview: '#img-placeholder'
        });
    });
</script>
