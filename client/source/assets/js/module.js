
var module = angular.module("app", ["ngRoute", "ngAnimate"]);


module.run(function (launcher, lang, $route) {    
    (function attempt() {
        launcher.init(function () {
            alert(lang.apierror);
            attempt();
        });
    })();
});
