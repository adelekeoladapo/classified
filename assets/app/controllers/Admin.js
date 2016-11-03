app.controller('AdminsCtrl', AdminsCtrl);

function AdminsCtrl($scope, Factory, Service, admins) {

    $scope.factory = Factory;
    
    $scope.admins = admins.data;

}


app.controller('AdminCtrl', AdminCtrl);

function AdminCtrl($scope, Factory, Service, admin){

    $scope.factory = Factory;

    $scope.admin = admin.data;

}


app.controller('NewAdminCtrl', NewAdminCtrl);

function NewAdminCtrl($scope, $state, Factory, Service){

    $scope.factory = Factory;    

    $scope.new_admin = {};

    $scope.addAdmin = function(){
        if($('#form-add-admin').smkValidate()){
            show_loading_overlay();
            Service.addAdmin($scope.new_admin).then(function(response){
                //$scope.admins = response.data;
                //hide_loading_overlay();
                $state.go('admins');
                toast('Admin added successfully');
            }, function(error){
                hide_loading_overlay();
                toast('An error occurred. Try again');
            });
        }
    }

}


