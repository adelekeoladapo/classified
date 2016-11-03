var app = angular.module("penguinCMS", ['ui.router', 'datatables', 'ngResource', 'ui.tinymce']);

app.factory('Factory', function(){
    var factory = {};
    
    /** Format Number **/
    factory.number_format = function number_format(n){
        return n.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
    
    /** 2016-06-17 14:35:32 to July 17. 2016 **/
    factory.formatDate_1 = function(date){
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        date = date.split(" ")[0].split("-");
        return months[date[1]-1]+" "+date[2]+", "+date[0];
    };
    
    /** 2016-06-17 14:35:32 to July 17. 2016 at 16:00 **/
    factory.formatDate_2 = function(date){
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        d = date.split(" ");
        date = d[0].split("-");
        return months[date[1]-1]+" "+date[2]+", "+date[0]+" at "+d[1];
    };
    
    factory.getUser = function(users, id){
        var user = {};
        angular.forEach(users, function(value, key, obj){
            if(value.user_id == id){
               user = angular.copy(obj[key]);
            }
        });
        return user;
    };
    
    factory.getCategory = function(categories, category_id){
        var cat = {};
        angular.forEach(categories, function(value, key, obj){
            if(value.category_id == category_id){
                cat = angular.copy(obj[key]);
            }
        });
        return cat;
    };
    
    factory.getParentCategory = function(categories, category_Parent_id){
        var cat = {};
        angular.forEach(categories, function(value, key, obj){
            if(value.category_id == category_Parent_id){
                cat = angular.copy(obj[key]);
            }
        });
        return cat;
    };
    
    factory.getBaseCategories = function(categories){
        var cat = [];
        angular.forEach(categories, function(value, key, obj){
            if(value.category_parent_id == 0){
                cat.push(angular.copy(obj[key]));
            }
        });
        return cat;
    }
    
    factory.getSubCategories = function(categories, category_id){
        var cat = [];
        angular.forEach(categories, function(value, key, obj){
            if(value.category_parent_id == category_id){
                cat.push(angular.copy(obj[key]));
            }
        });
        return cat;
    }
    
    factory.getCategoryProducts = function(products, category_id){
        var data = [];
        angular.forEach(products, function(value, key, obj){
            if(value.category_parent_id == category_id){
                data.push(angular.copy(obj[key]));
            }
        });
        return data;
    }
    
    factory.getSubCategoryProducts = function(products, category_id){
        var data = [];
        angular.forEach(products, function(value, key, obj){
            if(value.category_id == category_id){
                data.push(angular.copy(obj[key]));
            }
        });
        return data;
    }
    
    factory.getCountry = function(countries, country_id){
        var data = {};
        angular.forEach(countries, function(value, key, obj){
            if(value.country_id == country_id){
                data = angular.copy(obj[key]);
            }
        });
        return data;
    };
    
    factory.getState = function(states, state_id){
        var data = {};
        angular.forEach(states, function(value, key, obj){
            if(value.state_id == state_id){
                data = angular.copy(obj[key]);
            }
        });
        return data;
    };
    
    factory.getCountryUsers = function(users, country_id){
        var data = [];
        angular.forEach(users, function(value, key, obj){
            if(value.country_id == country_id){
                data.push(angular.copy(obj[key]));
            }
        });
        return data;
    }
    
    factory.getStateUsers = function(users, state_id){
        var data = [];
        angular.forEach(users, function(value, key, obj){
            if(value.state_id == state_id){
                data.push(angular.copy(obj[key]));
            }
        });
        return data;
    }
    
    factory.getStateProducts = function(products, state_id){
        var data = [];
        angular.forEach(products, function(value, key, obj){
            if(value.state_id == state_id){
                data.push(angular.copy(obj[key]));
            }
        });
        return data;
    }
    
    factory.getCountryProducts = function(products, country_id){
        var data = [];
        angular.forEach(products, function(value, key, obj){
            if(value.country_id == country_id){
                data.push(angular.copy(obj[key]));
            }
        });
        return data;
    }
    
    factory.getCountryStates = function(states, country_id){
        var data = [];
        angular.forEach(states, function(value, key, obj){
            if(value.state_country_id == country_id){
                data.push(angular.copy(obj[key]));
            }
        });
        return data;
    }
    
    return factory;
});

app.service('Service', function($http){
    
    /** Get Users **/
    this.getUsers = function(){
        return $http.get(BASE_URL+'api/get-users');
    };
    
    /** Get User Payments **/
    this.getUserPayments = function(user_id){
        return $http({
            method : "POST",
            url : BASE_URL+"api/get-user-payments",
            data : "user-id="+user_id,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    };
    
    /** Get User **/
    this.getUser = function(id){
        return $http({
            method : "POST",
            url : BASE_URL+"api/get-user",
            data : "user-id="+id,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    };
    
    /** Get Products **/
    this.getProducts = function(){
        return $http.get(BASE_URL+'api/get-products');
    };
    
    /** Get Product **/
    this.getProduct = function(id){
        return $http({
            method : "POST",
            url : BASE_URL+"api/get-product",
            data : "product-id="+id,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    };
    
    /** Get Product Images **/
    this.getProductImages = function(id){
        return $http({
            method : "POST",
            url : BASE_URL+"api/get-product-images",
            data : "product-id="+id,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    };
    
    /** Get Categories **/
    this.getCategories = function(){
        return $http.get(BASE_URL+'api/get-categories');
    };
    
    /** Add Sub Category **/
    this.addSubCategory = function(category){
        return $http({
            method: "POST",
            url: BASE_URL+"api/add-sub-category",
            data: category
        });
    };
    
    /** Update Category **/
    this.updateCategory = function(category){
        return $http({
            method: "POST",
            url: BASE_URL+"api/update-category",
            data: category
        });
    };
    
    /** Get Countries **/
    this.getCountries = function(){
        return $http.get(BASE_URL+'api/get-countries');
    };
    
    /** Get States **/
    this.getStates = function(){
        return $http.get(BASE_URL+'api/get-states');
    };
    
    /** Add Country **/
    this.addCountry = function(country){
        return $http({
            method: "POST",
            url: BASE_URL+"api/add-country",
            data: country
        });
    };
    
    /** Add State **/
    this.addState = function(state){
        return $http({
            method: "POST",
            url: BASE_URL+"api/add-state",
            data: state
        });
    };
    
    /** Update Country **/
    this.updateCountry = function(country){
        return $http({
            method: "POST",
            url: BASE_URL+"api/update-country",
            data: country
        });
    };
    
    /** Update State **/
    this.updateState = function(state){
        return $http({
            method: "POST",
            url: BASE_URL+"api/update-state",
            data: state
        });
    };
    
    /** Get States **/
    this.getAdverts = function(){
        return $http.get(BASE_URL+'api/get-adverts');
    };
    
    /** Delete Advert **/
    this.deleteAdvert = function(id){
        return $http({
            method: "POST",
            url: BASE_URL+"api/delete-advert",
            data: {'id': id}
        });
    };
    
    /** Activate Advert **/
    this.activateAdvert = function(id){
        return $http({
            method: "POST",
            url: BASE_URL+"api/activate-advert",
            data: {'id': id}
        });
    }
    
    /** Deactivate Advert **/
    this.deactivateAdvert = function(id){
        return $http({
            method: "POST",
            url: BASE_URL+"api/deactivate-advert",
            data: {'id': id}
        });
    }
    
    /** Get Top Products **/
    this.getTopProducts = function(){
        return $http.get(BASE_URL+'api/get-most-viewed-products');
    };
    
    /** Get Least Product **/
    this.getLeastProducts = function(){
        return $http.get(BASE_URL+'api/get-least-viewed-products');
    };
    
    /** Get Payments **/
    this.getPayments = function(){
        return $http.get(BASE_URL+'api/get-payments');
    };
    
    /** Boost Account **/
    this.boostAccount = function(ddata){
        return $http({
            method: "POST",
            url: BASE_URL+"api/boost-account",
            data: ddata
        });
    };

    /** Deactivate User **/
    this.deactivateUser = function(user_id){
        return $http({
            method : "POST",
            url : BASE_URL+"api/deactivate-user",
            data : "user-id="+user_id,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    };

    /** Activate User **/
    this.activateUser = function(user_id){
        return $http({
            method : "POST",
            url : BASE_URL+"api/activate-user",
            data : "user-id="+user_id,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    }

    /** Delete Product **/
    this.deleteProduct = function(product_id){
        return $http({
            method : "POST",
            url : BASE_URL+"api/delete-product",
            data : "product-id="+product_id,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    }

    /** Get Admins **/
    this.getAdmins = function(){
        return $http.get(BASE_URL+'api/get-admins');
    };

    /** Get Admin **/
    this.getAdmin = function(id){
        return $http({
            method : "POST",
            url : BASE_URL+"api/get-admin",
            data : "admin-id="+id,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    };

    /** Add Admin **/
    this.addAdmin = function(admin){
        return $http({
            method: "POST",
            url: BASE_URL+"api/add-admin",
            data: admin
        });
    };
    
});


app.config(function($stateProvider, $urlRouterProvider){
    
    $urlRouterProvider.otherwise("/dashboard");

    $stateProvider
        
        .state('dashboard', {
            url: "/dashboard",
            templateUrl: "assets/app/views/dashboard.php",
            controller: "DashboardCtrl",
            resolve: {
                top_products: function(Service){
                    return Service.getTopProducts();
                },
                least_products: function(Service){
                    return Service.getLeastProducts();
                }
            }
        })
        
        .state('users', {
            url: "/users",
            templateUrl: "assets/app/views/users.php",
            controller: "UsersCtrl",
            resolve: {
                users: function(Service){
                    return Service.getUsers();
                }
            }
        })
        
        .state('user', {
            url: "/user/:id",
            templateUrl: "assets/app/views/user.php",
            controller: "UserCtrl",
            resolve: {
                user: function($stateParams, Service){
                    return Service.getUser($stateParams.id);
                },
                payments: function($stateParams, Service){
                    return Service.getUserPayments($stateParams.id);
                }
            }
        })
        
        .state('products', {
            url: "/products",
            templateUrl: "assets/app/views/products.php",
            controller: "ProductsCtrl",
            resolve: {
                products: function(Service){
                    return Service.getProducts();
                }
            }
        })
        
        .state('product', {
            url: "/product/:id",
            templateUrl: "assets/app/views/product.php",
            controller: "ProductCtrl",
            resolve: {
                product: function($stateParams, Service){
                    return Service.getProduct($stateParams.id);
                },
                images: function($stateParams, Service){
                    return Service.getProductImages($stateParams.id);
                }
            }
        })
        
        .state('categories', {
            url: "/categories",
            templateUrl: "assets/app/views/categories.php",
            controller: "CategoriesCtrl",
            resolve: {
                categories: function(Service){
                    return Service.getCategories();
                }
            }
        })
        
        .state('sub-categories', {
            url: "/sub-categories",
            templateUrl: "assets/app/views/sub-categories.php",
            controller: "CategoriesCtrl",
            resolve: {
                categories: function(Service){
                    return Service.getCategories();
                }
            }
        })
        
        .state('countries', {
            url: "/countries",
            templateUrl: "assets/app/views/countries.php",
            controller: "CountryCtrl",
            resolve: {
                countries: function(Service){
                    return Service.getCountries();
                }
            }
        })
        
        .state('places', {
            url: "/places",
            templateUrl: "assets/app/views/places.php",
            controller: "PlaceCtrl",
            resolve: {
                states: function(Service){
                    return Service.getStates();
                }
            }
        })
        
        .state('adverts', {
            url: "/adverts",
            templateUrl: "assets/app/views/adverts.php",
            controller: "AdvertCtrl",
            resolve: {
                adverts: function(Service){
                    return Service.getAdverts();
                }
            }
        })
        
        .state('new-advert', {
            url: "/new-advert",
            templateUrl: "assets/app/views/new-advert.php",
            controller: "AdvertCtrl",
            resolve: {
                adverts: function(Service){
                    return Service.getAdverts();
                }
            }
        })
        
        .state('settings', {
            url: "/settings",
            templateUrl: "assets/app/views/settings.php",
            controller: "SettingsCtrl",
            resolve: {
            }
        })
        
        .state('payments', {
            url: "/payments",
            templateUrl: "assets/app/views/payments.php",
            controller: "PaymentCtrl",
            resolve: {
                payments: function(Service){
                    return Service.getPayments();
                }
            }
        })

        .state('admins', {
            url: "/admins",
            templateUrl: "assets/app/views/admins.php",
            controller: "AdminsCtrl",
            resolve: {
                admins: function(Service){
                    return Service.getAdmins();
                }
            }
        })

        .state('admin', {
            url: "/admin/:id",
            templateUrl: "assets/app/views/admin.php",
            controller: "AdminCtrl",
            resolve: {
                admin: function($stateParams, Service){
                    return Service.getAdmin($stateParams.id);
                }
            }
        })

        .state('new-admin', {
            url: "/new-admin",
            templateUrl: "assets/app/views/new-admin.php",
            controller: "NewAdminCtrl",
            resolve: {
            }
        })
        
        
//        .state('new-student', {
//            url: "/new-student",
//            templateUrl: "asset/app/views/new-student.php",
//            controller: "NewStudentCtrl",
//            resolve: {
//                classes: function(portalService){
//                    return portalService.getClasses();
//                },
//                sub_classes: function(portalService){
//                    return portalService.getSubClasses();
//                }
//            }
//        })
//        
//        .state('student', {
//            url: "/student/:id",
//            templateUrl: "asset/app/views/student.php",
//            controller: "StudentInfoCtrl",
//            resolve: {
//                student: function($stateParams, portalService){
//                    return portalService.getStudent($stateParams.id);
//                }
//            }
//        })
//        
//        .state('edit-student', {
//            url: "/edit-student/:id",
//            templateUrl: "asset/app/views/edit-student.php",
//            controller: "EditStudentCtrl",
//            resolve: {
//                student: function($stateParams, portalService){
//                    return portalService.getStudent($stateParams.id);
//                }
//            }
//        })
//        
//        .state('classes', {
//            url: "/classes",
//            templateUrl: "asset/app/views/class-classes.php",
//            controller: "ClassCtrl",
//            resolve: {
//                classes: function(portalService){
//                    return portalService.getClasses();
//                },
//                sub_classes: function(portalService){
//                    return portalService.getSubClasses();
//                }
//            }
//        })
//        
//        .state('sections', {
//            url: "/sections",
//            templateUrl: "asset/app/views/sections.php",
//            controller: "ClassCtrl",
//            resolve: {
//                classes: function(portalService){
//                    return portalService.getClasses();
//                },
//                sub_classes: function(portalService){
//                    return portalService.getSubClasses();
//                }
//            }
//        })
//        
//        .state('staff', {
//            url: "/staff",
//            templateUrl: "asset/app/views/staff.php",
//            controller: "StaffCtrl",
//            resolve: {
//                privileges: function(portalService){
//                    return portalService.getPrivileges();
//                },
//                users: function(portalService){
//                    return portalService.getUsers();
//                }
//            }
//        })
//        
//        .state('new-staff', {
//            url: "/new-staff",
//            templateUrl: "asset/app/views/new-staff.php",
//            controller: "StaffCtrl",
//            resolve: {
//                privileges: function(portalService){
//                    return portalService.getPrivileges();
//                },
//                users: function(portalService){
//                    return portalService.getUsers();
//                }
//            }
//        })
//        
//        .state('view-staff', {
//            url: "/view-staff/:id",
//            templateUrl: "asset/app/views/view-staff.php",
//            controller: "ViewStaffCtrl",
//            resolve: {
//                staff: function($stateParams, portalService){
//                    return portalService.getUser($stateParams.id);
//                }
//            }
//        })
    
});




app.controller('mainCtrl', function($rootScope, $http, $resource, Service, DTOptionsBuilder, DTColumnDefBuilder){
    
    $rootScope.app_data;
    
    /** Init App data **/
    
    $http({
        method : "GET",
        url : BASE_URL+"api/init-admin"
    }).then(function mySucces(response) {
        $rootScope.app_data = response.data;
        //console.log(response.data);
    }, function myError(response) {
        alert(response.statusText);
    });
    
    
    console.log('I am alive');
    
    
    
    $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams, options){ 
        //event.preventDefault(); 
        show_loading_overlay();
    });
    
    
    $rootScope.$on('$stateChangeError', function(event, toState, toParams, fromState, fromParams, error){ 
        hide_loading_overlay();
        toast('No Internet Access');
    });
    
    
    $rootScope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams){ 
        hide_loading_overlay();
    });
    
    
//    
//    
//    $rootScope.logout = function(){
//        window.location = BASE_URL+"login/logout";
//    }
//    
//    /*
//     * Get teacher
//     */
//    $rootScope.getTeacher = function(id){
//        var teacher;
//        angular.forEach($rootScope.app_data.teachers, function(value, key, obj){
//            if(value.TeacherID == id){
//                teacher = obj[key];
//            }
//        });
//        return teacher;
//    }
//    
//    /*
//     * Get sub-classes of a class
//     */
//    $rootScope.getSubClass = function(classID){
//        var sub_class = [];//false;
//        angular.forEach($rootScope.app_data.sub_classes, function(value, key, obj){
//            if(value.ParentID == classID){
//                sub_class.push(angular.copy(obj[key]));
//            }
//        });
//        return sub_class;
//    }
//    
//    /*
//     * Get LGAs
//     */
//    $rootScope.getLGAs = function(stateID){
//        var lgas = [];
//        angular.forEach($rootScope.app_data.lgas, function(value, key, obj){
//            if(value.state_id == stateID){
//                lgas.push(angular.copy(obj[key]));
//            }
//        });
//        return lgas;
//    }
//    
//    /*
//     * Get Students in a class
//     */
//    $rootScope.getClassStudents = function(classID){
//        var students = [];
//        angular.forEach($rootScope.app_data.students, function(value, key, obj){
//            if(value.ClassID == classID){
//                students.push(angular.copy(obj[key]));
//            }
//        });
//        return students;
//    }
//    
//    /*
//     * Get Section students
//     */
//    $rootScope.getSectionStudents = function(sectionID){
//        var students = [];
//        angular.forEach($rootScope.app_data.students, function(value, key, obj){
//            if(value.SectionID == sectionID){
//                students.push(angular.copy(obj[key]));
//            }
//        });
//        return students;
//    }
//    
//    
//    /*
//     * Manage Class Table
//     */
//    $rootScope.class_td_options = DTOptionsBuilder.newOptions();
//    $rootScope.class_td_column_defs = [
//        DTColumnDefBuilder.newColumnDef(5).notSortable()
//    ];
//    
//    /*
//     * Teacher Table
//     */
//    $rootScope.teacher_td_options = DTOptionsBuilder.newOptions();
//    $rootScope.teacher_td_column_defs = [
//        DTColumnDefBuilder.newColumnDef(4).notSortable()
//    ];
//    
//    /*
//     * Section Table
//     */
//    $rootScope.section_td_options = DTOptionsBuilder.newOptions();
//    $rootScope.section_td_column_defs = [
//        DTColumnDefBuilder.newColumnDef(5).notSortable()
//    ];
    
    
});

