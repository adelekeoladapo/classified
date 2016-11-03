app.controller('StudentCtrl', StudentCtrl);

function StudentCtrl($scope, $http, $location) {
    
    $scope.sections = [];
    
    $scope.students = [];
    
    $scope.addStudent = function(){
        if($('#form-add-student').smkValidate()){
            show_loading_overlay();
            var form_data = new FormData($('#form-add-student')[0]);
            $.ajax({
                type: "POST",
                url: BASE_URL+"student/insertStudent",
                data: form_data,
                success:function(result, status, xhr){ 
                    result = JSON.parse(result);
                    hide_loading_overlay();
                    if(result.status){
                        appendStudent(Student, result.message);
                        clear_form_fields('form-add-student');
                        toast("Student added successfully");
                    }else{
                        toast(result.message);
                    }
                },
                complete: function(){

                },
                timeout: 50000,
                error: function(){
                    toast("An error occurred. Try again");
                },
                //Options to tell jQuery not to process data or worry about content-type.
                cache: false,
                contentType: false,
                processData: false
            });
        }
    }    
    
    $scope.sections = [];
    
    /*
     * Init Section function
     */
    $scope.initSection = function(parentID){
        $scope.sections = $scope.$parent.getSubClass(parentID);
        $scope.students = $scope.$parent.getClassStudents(parentID);
        $scope.active_class_id = parentID;
        $('#all-students').addClass('active');
    }
    
    /*
     * Init section to the first class
     */
    $scope.initSection($scope.$parent.app_data.classes[0].ClassID);
    
    /*
     * Init student function
     */
    $scope.initStudents = function(classID){
        $scope.students = $scope.$parent.getClassStudents(classID);
    }
    
    /*
     * Init sections function
     */
    $scope.initSectionStudents = function(sectionID){
        $scope.students = $scope.$parent.getSectionStudents(sectionID);
    }
    
    /*
     * Init student
     */
    $scope.students = $scope.$parent.app_data.students;// $scope.$parent.getClassStudents($scope.$parent.app_data.classes[0].ClassID);
    
    
    /*
     * Append student
     */
    function appendStudent(student, id){
        student.StudentID = id;
        $scope.$parent.app_data.students.push(angular.copy(student));
    }
}




