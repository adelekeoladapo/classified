app.controller('PlaceCtrl', PlaceCtrl);

function PlaceCtrl($scope, $state, Service, Factory, states) {
    
    $scope.app_data = $scope.$parent.app_data;
    
    $scope.app_data.states = $scope.states = states.data;
    
    $scope.factory = Factory;
    
    $scope.State = {};
    
    /** Change Country **/
    $scope.changeCountry = function(id){
        show_loading_overlay();
        $scope.Country = $scope.factory.getCountry($scope.app_data.countries, id);
        $scope.states = Factory.getCountryStates($scope.app_data.states, id);
        hide_loading_overlay();
    }
    
    $scope.changeCountry($scope.app_data.countries[0].country_id);
    
    /** Show Add State Overlay **/
    $scope.showAddStateOverlay = function(){
        $scope.State = {};
        $('#add-state-overlay').css('display', 'block');
    }
    
    /** Hide Add Country Overlay **/
    $scope.hideAddStateOverlay = function(){
        $('#add-state-overlay').css('display', 'none');
    }
    
    /** Add Country **/
    $scope.addState = function(){
        if($('#form-add-state').smkValidate()){
            $('#add-state-overlay').css('display', 'none');
            show_loading_overlay();
            $scope.State.state_country_id = $scope.Country.country_id;
            Service.addState($scope.State).then(function(response){
                Service.getStates().then(function(response){
                    $scope.states = $scope.$parent.app_data.states = response.data;
                    $scope.changeCountry($scope.State.state_country_id);
                    hide_loading_overlay();
                    toast('Place added successfully');
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
    
    /** Show Edit State Overlay **/
    $scope.showEditStateOverlay = function(id){
        $scope.State = $scope.factory.getState($scope.states, id);
        $('#edit-state-overlay').css('display', 'block');
    }
    
    /** Hide Edit Category Overlay **/
    $scope.hideEditStateOverlay = function(){
        $('#edit-state-overlay').css('display', 'none');
    }
    
    /** Update Country **/
    $scope.updateState = function(){
        if($('#form-edit-state').smkValidate()){
            $('#edit-state-overlay').css('display', 'none');
            show_loading_overlay();
            Service.updateState($scope.State).then(function(response){
                Service.getStates().then(function(response){
                    $scope.states = $scope.$parent.app_data.states = response.data;
                    $scope.changeCountry($scope.State.state_country_id);
                    hide_loading_overlay();
                    toast('Place updated successfully');
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









