
module.controller("products", ["$scope", "$http", "$location", "xhrHttp", "lang", "launcher", function($scope, $http, $location, xhrHttp, lang, launcher){   
    $scope.title = lang[($location.$$path).replace("/", "")];
    $http.get(launcher.api() + "products")
    .then(function(r) {
        $scope.articles = r.data;
    });
}]);
