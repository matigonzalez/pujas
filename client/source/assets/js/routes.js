module.config(["$locationProvider", "$routeProvider", function($locationProvider, $routeProvider){

    var htmlBase = "partials/";
    $locationProvider.hashPrefix('');
    $locationProvider.html5Mode(true);
    $routeProvider
    
    .when("/", {
        templateUrl: htmlBase + "home.html"
    })
    .when("/login", {
        templateUrl: htmlBase + "users.html",
        controller: "users"
    })
    .when("/register", {
        templateUrl: htmlBase + "users.html",
        controller: "users"
    })
    .when("/products", {
        templateUrl: htmlBase + "products.html",
        controller: "products"
    })
    .when("/404", {
        templateUrl: htmlBase + "404.html",
        controller: function($scope){
            $scope.title = "404";
        }
    })
    .otherwise({
        redirectTo: "/404",
    })

}]);