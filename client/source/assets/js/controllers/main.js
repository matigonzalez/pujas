
module.controller("mainController", ["$rootScope", "$scope", "$http", "$location", "xhrHttp", "userinfo", function($rootScope, $scope, $http, $location, xhrHttp, userinfo){   
    
    $scope.logout = function(){
        userinfo.logout(function(){
            userinfo.update();
        });
    };       
    
    userinfo.update();

}]);
