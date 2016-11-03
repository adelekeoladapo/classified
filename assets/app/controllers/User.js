app.controller('UsersCtrl', UsersCtrl);

function UsersCtrl($scope, Factory, users) {
    
    $scope.users = $scope.$parent.app_data.users = users.data;
    
    $scope.factory = Factory;
    
    
}


/** User Controller **/
app.controller('UserCtrl', UserCtrl);

function UserCtrl($scope, $state, Service, Factory, user, payments) {
    
    $scope.factory = Factory;
    
    $scope.user = user.data;
    
    $scope.payments = payments.data;
    
    $scope.showBoostAccOverlay = function(){
        $('#boost-account-overlay').show();
    }
    
    $scope.hideBoostAccOverlay = function(){
        $('#boost-account-overlay').hide();
    }
    
    $scope.boostAccount = function(){
        if($('#form-boost-account').smkValidate()){
            $('#boost-account-overlay').css('display', 'none');
            show_loading_overlay();
            var data = {
                user_id: $scope.user.user_id,
                payment_code: $('#payment_code').val()
            };
            Service.boostAccount(data).then(function(response){
                res = response.data;
                if(res.status){
                    //hide_loading_overlay();
                    //$state.reload();
                    //$state.go($state.current, {'id': 1}, {reload: true});

                    $state.forceReload();
                    
                    toast(res.message);
                    

                    /*Service.getUser($scope.user.user_id).then(function(response){
                        $scope.user = response.data;
                        hide_loading_overlay();
                        toast(res.message);
                    }, function(error){
                        hide_loading_overlay();
                        toast('An error occurred. Try again');
                    });*/

                }else{
                    hide_loading_overlay();
                    toast(res.message)
                }
            }, function(error){
                hide_loading_overlay();
                toast('An error occurred. Try again');
            });
        }
    }


    $scope.deactivateUser = function(){
        var d = confirm('Deactivate this user?');
        if(d){
            show_loading_overlay();
            Service.deactivateUser($scope.user.user_id).then(function(response){
                Service.getUser($scope.user.user_id).then(function(response){
                    $scope.user = response.data;
                    hide_loading_overlay();
                    toast("User successfully deactivated");
                }, function(error){
                    hide_loading_overlay();
                    toast('An error occurred. Try again');
                });
            }, function(error){
                hide_loading_overlay();
                toast('An error occurred. Try again');
            });
        }
    }


    $scope.activateUser = function(){
        var d = confirm('Activate this user?');
        if(d){
            show_loading_overlay();
            Service.activateUser($scope.user.user_id).then(function(response){
                Service.getUser($scope.user.user_id).then(function(response){
                    $scope.user = response.data;
                    hide_loading_overlay();
                    toast("User successfully activated");
                }, function(error){
                    hide_loading_overlay();
                    toast('An error occurred. Try again');
                });
            }, function(error){
                hide_loading_overlay();
                toast('An error occurred. Try again');
            });
        }
    }
    
}






