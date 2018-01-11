function display_content(result) {
    alert(result);
   // var info = JSON.parse(result);
   // alert(info);
   $(document).ready(function(){
    $("#btn1").click(function(){
        $("#test1").text("Hello world!");
    });
    $("#btn2").click(function(){
        $("#test2").html("<input type='submit' value='login'>");
    });
    $("#btn3").click(function(){
        $("#test3").val("Dolly Duck");
    });
});

        $("#container-fluid").html = result;

