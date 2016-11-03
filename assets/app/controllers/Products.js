app.controller('ProductsCtrl', ProductsCtrl);

function ProductsCtrl($scope, Factory, products) {
    
    $scope.app_data = $scope.$parent.app_data;
    
    $scope.products = $scope.$parent.app_data.products = products.data;
    
    $scope.factory = Factory;
    
}


/** Product Controller **/
app.controller('ProductCtrl', ProductCtrl);

function ProductCtrl($scope, $state, Factory, Service, product, images) {
    
    $scope.factory = Factory;
    
    $scope.product = product.data;
    
    $scope.images = images.data;
    
    $scope.deleteAd = function(){
    	var d = confirm('Delete this Ad?');
        if(d){
            show_loading_overlay();
            Service.deleteProduct($scope.product.product_id).then(function(response){
            	$state.go('products');
            	toast('Ad successfully deleted');
            }, function(error){
                hide_loading_overlay();
                toast('An error occurred. Try again');
            });
        }
    }
    
}






