
module.service("load", function(){

    this.start = function(){
        $(".progress").css("opacity", 1);
    };
    this.end = function(){
        $(".progress").css("opacity", 0);
    };

});