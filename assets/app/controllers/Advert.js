app.controller('AdvertCtrl', AdvertCtrl);

function AdvertCtrl($scope, $state, Service, Factory, adverts) {
    
    $scope.factory = Factory;
    
    $scope.adverts = adverts.data;
    
    $scope.addAdvert = function(){
        if($('#form-add-advert').smkValidate()){
            show_loading_overlay();
            var form_data = new FormData($('#form-add-advert')[0]);
            $.ajax({
                type: "POST",
                url: BASE_URL+"api/add-advert",
                data: form_data,
                success:function(result, status, xhr){ 
                    result = JSON.parse(result);
                    hide_loading_overlay();
                    if(result.status){
                        clear_form_fields('form-add-advert');
                        toast("Advert added successfully");
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
        
        return false;
    };
    
    $scope.deleteAdert = function(id){
        var d = confirm("Delete Advert?");
        if(d){
            show_loading_overlay();
            Service.deleteAdvert(id).then(function(response){
                Service.getAdverts().then(function(response){
                    $scope.adverts = response.data;
                    hide_loading_overlay();
                    toast('Advert Deleted Successfully');
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
    
    $scope.activateAdert = function(id){
        var d = confirm("Activate Advert?");
        if(d){
            show_loading_overlay();
            Service.activateAdvert(id).then(function(response){
                Service.getAdverts().then(function(response){
                    $scope.adverts = response.data;
                    hide_loading_overlay();
                    toast('Advert Activated Successfully');
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
    
    $scope.deactivateAdert = function(id){
        var d = confirm("Deactivate Advert?");
        if(d){
            show_loading_overlay();
            Service.deactivateAdvert(id).then(function(response){
                Service.getAdverts().then(function(response){
                    $scope.adverts = response.data;
                    hide_loading_overlay();
                    toast('Advert Deactivated Successfully');
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
    
    $scope.toggleStatus = function(id, status){
        if(status == 1){
            $scope.deactivateAdert(id);
        }else{
            $scope.activateAdert(id);
        }
    }
    
    
}

$('body').on('change', '#ad-type', function(){
    $('.add-type').hide();
    $('#'+$(this).val()).show();
});






