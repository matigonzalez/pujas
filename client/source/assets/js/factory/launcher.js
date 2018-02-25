

module.factory("launcher", function($http){

    var api = "http://www.pujas.api/", _token;

    return {
        api: getApiUrl,
        token: getToken,
        init: init,
    };

    function init(callback){
        $http({
            method: 'GET',
            url: api + "token",
            withCredentials: true,
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function(r){
            _token = r.data._token;
        }, function(){
            callback();
        });
    }

    function getToken(){
        return _token;
    }

    function getApiUrl(){
        return api;
    }
});


