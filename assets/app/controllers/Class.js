app.controller('ClassCtrl', ClassCtrl);

function ClassCtrl($scope, $http, $location) {
    
    /*
     * Show add class overlay
     */
    $scope.showAddClass = function(){
        $('#add-class-overlay').css("display", "block");
    }
    
    /*
     * Hide add class overlay
     */
    $scope.hideAddClass = function(){
        $('#add-class-overlay').css("display", "none");
    }
    
    /*
     * Add Class
     */
    $scope.addClass = function(){
        if($('#form-add-class').smkValidate()){
            $('#add-class-overlay').css('display', 'none');
            $('#loading-overlay').css('display', 'block');
            $http({
                method : "POST",
                url : BASE_URL+"class/insertClass",
                data: $scope.Class,
                //headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySucces(response) {
                appendClass($scope.Class, response.data);
                $scope.Class = null;
                $('#loading-overlay').css('display', 'none');
                toast("Class successfully added");
            }, function myError(response) {
                $('#loading-overlay').css('display', 'none');
                toast("An error occurred. Try again");
            });
        }
    }
    
    /*
     * Append Class
     */
    function appendClass(klass, id){
        klass.ClassID = id;
        $scope.$parent.app_data.classes.push(angular.copy(klass));
    }
    
    /*
     * Show edit class overlay
     */
    $scope.showEditClass = function(index){
        $scope.Class = $scope.$parent.app_data.classes[index];
        $scope.Class.index = index;
        $('#edit-class-overlay').css("display", "block");
    }
    
    /*
     * Hide edit class overlay
     */
    $scope.hideEditClass = function(){
        $('#edit-class-overlay').css("display", "none");
    }
    
    /*
     * Update Class
     */
    $scope.editClass = function(){
        if($('#form-edit-class').smkValidate()){
            $('#edit-class-overlay').css('display', 'none');
            $('#loading-overlay').css('display', 'block');
            $http({
                method : "POST",
                url : BASE_URL+"class/updateClass",
                data: $scope.Class
                //headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySucces(response) {
                modifyClass($scope.Class.index, $scope.Class);
                $scope.Class = null;
                $('#loading-overlay').css('display', 'none');
                toast("Class successfully updated");
            }, function myError(response) {
                $('#loading-overlay').css('display', 'none');
                toast("An error occurred. Try again");
            });
        }
    }
    
    /*
     * Modify Class
     */
    function modifyClass(index, klass){
        $scope.$parent.app_data.classes[index] = klass;
    }
    
    
    
    
    
    /*
     * Section Controller
     */
    
    
    $scope.section = [];
    
    /*
     * Init Section function
     */
    $scope.initSection = function(parentID){
        $scope.section = $scope.$parent.getSubClass(parentID);
    }
    
    /*
     * Init section to the first class
     */
    $scope.initSection($scope.$parent.app_data.classes[0].ClassID);
    
    /*
     * Show add section overlay
     */
    $scope.showAddSection = function(){
        $('#add-section-overlay').css("display", "block");
    }
    
    /*
     * Hide add class overlay
     */
    $scope.hideAddSection = function(){
        $('#add-section-overlay').css("display", "none");
    }
    
    /*
     * Add Section
     */
    $scope.addSection = function(){
        if($('#form-add-section').smkValidate()){
            $('#add-section-overlay').css('display', 'none');
            $('#loading-overlay').css('display', 'block');
            $http({
                method : "POST",
                url : BASE_URL+"class/insertClass",
                data: $scope.Class,
                //headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySucces(response) {
                appendSection($scope.Class, response.data);
                $scope.initSection($scope.Class.ParentID);
                $scope.Class = null;
                $('#loading-overlay').css('display', 'none');
                toast("Section successfully added");
            }, function myError(response) {
                $('#loading-overlay').css('display', 'none');
                toast("An error occurred. Try again");
            });
        }
    }
    
    /*
     * Append Class
     */
    function appendSection(klass, id){
        klass.ClassID = id;
        $scope.$parent.app_data.sub_classes.push(angular.copy(klass));
    }
    
    
    /*
     * Show edit section overlay
     */
    $scope.showEditSection = function(index){
        $scope.Class = $scope.$parent.app_data.sub_classes[index];
        $scope.Class.index = index;
        $('#edit-section-overlay').css("display", "block");
    }
    
    /*
     * Hide edit class overlay
     */
    $scope.hideEditSection = function(){
        $('#edit-section-overlay').css("display", "none");
    }
    
    /*
     * Update Class
     */
    $scope.editSection = function(){
        if($('#form-edit-section').smkValidate()){
            $('#edit-section-overlay').css('display', 'none');
            $('#loading-overlay').css('display', 'block');
            $http({
                method : "POST",
                url : BASE_URL+"class/updateClass",
                data: $scope.Class
                //headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySucces(response) {
                modifySection($scope.Class.index, $scope.Class);
                $scope.initSection($scope.Class.ParentID);
                $scope.Class = null;
                $('#loading-overlay').css('display', 'none');
                toast("Section successfully updated");
            }, function myError(response) {
                $('#loading-overlay').css('display', 'none');
                toast("An error occurred. Try again");
            });
        }
    }
    
    /*
     * Modify Class
     */
    function modifySection(index, klass){
        $scope.$parent.app_data.sub_classes[index] = klass;
    }
    
}