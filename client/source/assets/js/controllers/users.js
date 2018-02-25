
module.controller("users", ["$rootScope", "$scope", "$http", "$location", "xhrHttp", "userinfo", "lang", function($rootScope, $scope, $http, $location, xhrHttp, userinfo, lang){   
    
    $scope.title = lang[($location.$$path).replace("/", "")];
    $scope.errors = {};

    $scope.auth = function(){
        $http(xhrHttp.package({
            url:"auth" + $location.$$path, 
            data:$("form").serialize()
        }).post()).then(function(r) {
            $scope.errors = r.data;
            userinfo.update();
        });
    };
}]);
