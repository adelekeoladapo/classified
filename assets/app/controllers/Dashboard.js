app.controller('DashboardCtrl', DashboardCtrl);

function DashboardCtrl($scope, $state, Service, Factory, top_products, least_products) {
    
    $scope.app_data = $scope.$parent.app_data;
    
    $scope.factory = Factory;
    
    $scope.top_products = top_products.data;
    
    $scope.least_products = least_products.data;
    
    
}







