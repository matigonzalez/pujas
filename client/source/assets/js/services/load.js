
module.service("load", function(){

    this.start = function(){
        $("html").css("filter", "blur(1px)");
        $(".progress").css("opacity", 1);
    };
    this.end = function(){
        $("html").css("filter", "");
        $(".progress").css("opacity", 0);
    };

});