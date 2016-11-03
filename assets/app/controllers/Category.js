app.controller('CategoriesCtrl', CategoriesCtrl);

function CategoriesCtrl($scope, $state, Service, Factory, categories) {
    
    $scope.app_data = $scope.$parent.app_data;
    
    $scope.$parent.app_data.categories = $scope.categories = categories.data;
    
    $scope.factory = Factory;
    
    $scope.base_categories = $scope.factory.getBaseCategories($scope.categories);
    
    $scope.sub_categories =  ($scope.categories.length) ? $scope.factory.getSubCategories($scope.categories, $scope.base_categories[0].category_id) : null;
    
    $scope.Category = $scope.base_categories[0];
    
    /** Change Category **/
    $scope.changeCategory = function(id){
        show_loading_overlay();
        $scope.Category = $scope.factory.getCategory($scope.categories, id);
        $scope.sub_categories = $scope.factory.getSubCategories($scope.categories, $scope.Category.category_id);
        hide_loading_overlay();
    }
    
    /** Show Add Category Overlay **/
    $scope.showAddCategoryOverlay = function(){
        $scope.Category = {};
        $('#add-category-overlay').css('display', 'block');
    }
    
    /** Hide Add Category Overlay **/
    $scope.hideAddCategoryOverlay = function(){
        $('#add-category-overlay').css('display', 'none');
    }
    
    /** Add Category **/
    $scope.addCategoryX = function(){
        if($('#form-add-category').smkValidate()){
            $('#add-category-overlay').css('display', 'none');
            show_loading_overlay();
            Service.addCategory($scope.Category).then(function(response){
                Service.getCategories().then(function(response){
                    $scope.categories = $scope.$parent.app_data.categories = response.data;
                    $scope.base_categories = $scope.factory.getBaseCategories($scope.categories);
                    hide_loading_overlay();
                    toast('Category added successfully');
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
    
    /** New Add Category **/
    $scope.addCategory = function(){
        if($('#form-add-category').smkValidate()){
            $('#add-category-overlay').css('display', 'none');
            show_loading_overlay();
            var form_data = new FormData($('#form-add-category')[0]);
            $.ajax({
                type: "POST",
                url: BASE_URL+"api/add-category",
                data: form_data,
                success:function(result, status, xhr){ 
                    result = JSON.parse(result);
                    if(result.status){
                        Service.getCategories().then(function(response){
                            $scope.categories = $scope.$parent.app_data.categories = response.data;
                            $scope.base_categories = $scope.factory.getBaseCategories($scope.categories);
                            hide_loading_overlay();
                            toast('Category added successfully');
                        }, function(error){
                            hide_loading_overlay();
                            toast('An error occurred. Try again');
                        });
                    }else{
                        hide_loading_overlay();
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
    
    /** Show Edit Category Overlay **/
    $scope.showEditCategoryOverlay = function(id){
        $scope.Category = $scope.factory.getCategory($scope.app_data.categories, id);
        $('#edit-category-overlay').css('display', 'block');
    }
    
    /** Hide Edit Category Overlay **/
    $scope.hideEditCategoryOverlay = function(){
        $('#edit-category-overlay').css('display', 'none');
    }
    
    /** Update Category **/
    $scope.updateCategoryX = function(){
        if($('#form-edit-category').smkValidate()){
            $('#edit-category-overlay').css('display', 'none');
            show_loading_overlay();
            Service.updateCategory($scope.Category).then(function(response){
                Service.getCategories().then(function(response){
                    $scope.categories = $scope.$parent.app_data.categories = response.data;
                    $scope.base_categories = $scope.factory.getBaseCategories($scope.categories);
                    hide_loading_overlay();
                    toast('Category updated successfully');
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
    
    $scope.updateCategory = function(){
        if($('#form-edit-category').smkValidate()){
            $('#edit-category-overlay').css('display', 'none');
            show_loading_overlay();
            var form_data = new FormData($('#form-edit-category')[0]);
            $.ajax({
                type: "POST",
                url: BASE_URL+"api/update-category",
                data: form_data,
                success:function(result, status, xhr){ 
                    result = JSON.parse(result);
                    if(result.status){
                        Service.getCategories().then(function(response){
                            $scope.categories = $scope.$parent.app_data.categories = response.data;
                            $scope.base_categories = $scope.factory.getBaseCategories($scope.categories);
                            hide_loading_overlay();
                            toast('Category updated successfully');
                        }, function(error){
                            hide_loading_overlay();
                            toast('An error occurred. Try again');
                        });
                    }else{
                        hide_loading_overlay();
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
    
    
    $scope.SubCategory = {};
    
    /** Show Add Sub Category Overlay **/
    $scope.showAddSubCategoryOverlay = function(){
        $scope.SubCategory = {};
        $('#add-sub-category-overlay').css('display', 'block');
    }
    
    /** Hide Add Category Overlay **/
    $scope.hideAddSubCategoryOverlay = function(){
        $('#add-sub-category-overlay').css('display', 'none');
    }
    
    /** Add Sub Category **/
    $scope.addSubCategory = function(){
        if($('#form-add-sub-category').smkValidate()){
            $('#add-sub-category-overlay').css('display', 'none');
            show_loading_overlay();
            $scope.SubCategory.category_parent_id = $scope.Category.category_id;
            Service.addSubCategory($scope.SubCategory).then(function(response){
                Service.getCategories().then(function(response){
                    $scope.categories = $scope.$parent.app_data.categories = response.data;
                    $scope.sub_categories = $scope.factory.getSubCategories($scope.categories, $scope.SubCategory.category_parent_id);
                    hide_loading_overlay();
                    toast('Category added successfully');
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
    
    /** Show Edit Sub Category Overlay **/
    $scope.showEditSubCategoryOverlay = function(id){
        $scope.SubCategory = $scope.factory.getCategory($scope.app_data.categories, id);
        $('#edit-sub-category-overlay').css('display', 'block');
    }
    
    /** Hide Edit Sub Category Overlay **/
    $scope.hideEditSubCategoryOverlay = function(){
        $('#edit-sub-category-overlay').css('display', 'none');
    }
    
    /** Update Category **/
    $scope.updateSubCategory = function(){
        if($('#form-edit-sub-category').smkValidate()){
            $('#edit-sub-category-overlay').css('display', 'none');
            show_loading_overlay();
            Service.updateCategory($scope.SubCategory).then(function(response){
                Service.getCategories().then(function(response){
                    $scope.categories = $scope.$parent.app_data.categories = response.data;
                    $scope.sub_categories = $scope.factory.getSubCategories($scope.categories, $scope.SubCategory.category_parent_id);
                    hide_loading_overlay();
                    toast('Category updated successfully');
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
    
    
    
    
    
    
    
    
    
    
    
    /** View Category **/
    $scope.viewCategory = function(id){
        $scope.Category = $scope.factory.getCategory($scope.categories, id);
        $state.go('sub-categories');
    }
    
    
}









