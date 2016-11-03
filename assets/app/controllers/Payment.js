app.controller('PaymentCtrl', PaymentCtrl);

function PaymentCtrl($scope, $state, Service, Factory, payments) {
    
    $scope.app_data = $scope.$parent.app_data;
    
    $scope.payments = payments.data;
    
    $scope.factory = Factory;
    
}









