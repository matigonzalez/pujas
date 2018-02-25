
module.factory('xhrHttp', function(launcher) {
    
    var options = {
        method: 'GET',
        withCredentials: true,
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
    };  
    
    return {
        package: setFields,
        post: postOptions,
        get: getOptions,
    };

    function setFields(conf) {
        var 
        url = conf.url,
        data = ((typeof data === "object") ? $.param(conf.data) : "&" + conf.data) || "";        
        options.url = launcher.api() + url;
        options.data = "_token=" + launcher.token() + data;
        return this;
    }

    function getOptions() {
        options.method = "GET";
        return options;
    }

    function postOptions() {
        options.method = "POST";
        return options;
    }
    
});