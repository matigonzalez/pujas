
module.controller("users", [
    "$rootScope", "$scope", "$http", "$location", "xhrHttp", "userinfo", "lang", "load", function(
        $rootScope, $scope, $http, $location, xhrHttp, userinfo, lang, load
    ){   
    
    $scope.title = lang[($location.$$path).replace("/", "")];
    $scope.errors = {};

    $scope.auth = function(){
        load.start();
        $http(xhrHttp.package({
            url:"auth" + $location.$$path, 
            data:$("form").serialize()
        }).post()).then(function(r) {
            load.end();
            $scope.errors = r.data;
            userinfo.update();
        });
    };
}]);
