$(document).ready(function() {
  $("#Username").blur(
      function (event) {
        if($("#username").val() == ""){
              $("#uname_error").css({color: 'red'});
              document.getElementById("uname_error").innerHTML= "Please Enter your desired Username";
                            }
        else{
              $.ajax({
              type: "POST",
              url: "php/index.php",
              data: {
                uname: $("#username").val()
                    },
              success: function(result) {
                            if(result == "Username's Available"){
                                    document.getElementById("uname_error").innerHTML= result;
                                    $("#uname_error").css({color: 'green'});
                                    $("input[type=submit]#crt_acc").removeAttr("disabled");
                                    $("input[type=submit]#crt_acc").css({backgroundColor: '#50a5e6'});

                                    }
                            else{
                                    document.getElementById("uname_error").innerHTML= result;
                                    $("input[type=submit]#crt_acc").attr("disabled", "disabled");
                                    $("#uname_error").css({color: 'red'});
                                    $("input[type=submit]#crt_acc").css({backgroundColor: 'grey'});
                                  //$("input[type=button]#crt_acc").removeClass('input[type=button]:hover');


                                    }
                                  }
                             });

              }
                           }
                       );

     });


function crt_submit(){
      var stat="";
      $("#crt_acc").val("Creating Account...");
      if( ($("#crt_uname").val() == "" && $("#crt_pass").val() == "") ||   ($("#crt_uname").val() == "" || $("#crt_pass").val() == "")    ){
            $("#crt_acc").val("Create Account");
            $("#uname_error").css({color: 'red'});
            document.getElementById("uname_error").innerHTML = "Please Fill up the form";
            stat = false;
}
      else if($("#crt_pass").val().length < 8){

            $("#crt_acc").val("Create Account");
            $("#uname_error").css({color: 'red'});
            document.getElementById("uname_error").innerHTML = "Password Must be atleast 8 characters";
            stat = false;
}
      else{
            $.ajax({
                  type: "POST",
                  url: "php/login.php",
                  data: {
                        crt_uname: $("#crt_uname").val(),
                        crt_pass : $("#crt_pass").val()
                    },
                  success: function(result) {
                       // window.location.assign("http://localhost/augeo/home/account/?new=1");
                       window.location.assign("http://localhost/augeo/user/account/?new=1");
                        }
                    });

          }

          if(!stat)
              return false;
                              }