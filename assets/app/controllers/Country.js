app.controller('CountryCtrl', CountryCtrl);

function CountryCtrl($scope, $state, Service, Factory, countries) {
    
    $scope.app_data = $scope.$parent.app_data;
    
    $scope.countries = countries.data;
    
    $scope.factory = Factory;
    
    $scope.Country = {};
    
     /** Show Add Country Overlay **/
    $scope.showAddCountryOverlay = function(){
        $scope.Country = {};
        $('#add-country-overlay').css('display', 'block');
    }
    
    /** Hide Add Country Overlay **/
    $scope.hideAddCountryOverlay = function(){
        $('#add-country-overlay').css('display', 'none');
    }
    
    /** Add Country **/
    $scope.addCountry = function(){
        if($('#form-add-country').smkValidate()){
            $('#add-country-overlay').css('display', 'none');
            show_loading_overlay();
            Service.addCountry($scope.Country).then(function(response){
                Service.getCountries().then(function(response){
                    $scope.countries = $scope.$parent.app_data.countries = response.data;
                    hide_loading_overlay();
                    toast('Country added successfully');
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
    
    /** Show Edit Country Overlay **/
    $scope.showEditCountryOverlay = function(id){
        $scope.Country = $scope.factory.getCountry($scope.countries, id);
        $('#edit-country-overlay').css('display', 'block');
    }
    
    /** Hide Edit Category Overlay **/
    $scope.hideEditCountryOverlay = function(){
        $('#edit-country-overlay').css('display', 'none');
    }
    
    /** Update Country **/
    $scope.updateCountry = function(){
        if($('#form-edit-country').smkValidate()){
            $('#edit-country-overlay').css('display', 'none');
            show_loading_overlay();
            Service.updateCountry($scope.Country).then(function(response){
                Service.getCountries().then(function(response){
                    $scope.countries = $scope.$parent.app_data.countries = response.data;
                    hide_loading_overlay();
                    toast('Country updated successfully');
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









