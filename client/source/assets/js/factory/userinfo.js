module.factory('userinfo', function($http, xhrHttp, $rootScope, lang, load) {
    
    var username;

    return {
        logout: logout,
        update: set,
        get: get,
    };

    function logout(callback){
        load.start();
        $http(xhrHttp.package({url: "auth/logout"}).get()).then(function(r) {
            callback()
        }).finally(function(){
            load.end();
        });
    }

    function set(){
        load.start();
        $http(xhrHttp.package({url: "auth/userinfo"}).get()).then(function(r) {
            $rootScope.logged = true;
            $rootScope.username = r.data.name;
        }, function(){            
            $rootScope.logged = false;
            $rootScope.username = lang.nouser;
        }).finally(function(){
            load.end();
        });
    }

    function get() {
        return username;
    }

});
