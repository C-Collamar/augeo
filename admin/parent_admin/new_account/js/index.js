$(document).ready(function() {
  $("#username").blur(
      function (event) {
        if($("#username").val() == "" || !$("input[name='account_type']:checked").val() ){
              $("#uname_error").css({color: 'red'});
              document.getElementById("uname_error").innerHTML= "Please Enter your desired Username and Select Account type";
                            }
        else{
              $.ajax({
              type: "POST",
              url: "php/index.php",
              data: {
                uname: $("#username").val(),
                account_type: $("input[name=account_type]:checked").val()
                    },
              success: function(result) {
                            if(result == "Username's Available"){
                                    document.getElementById("uname_error").innerHTML= result;
                                    $("#uname_error").css({color: 'green'});
                                    $("input[type=submit]#submit").removeAttr("disabled");
                                    $("input[type=submit]#submit").css({backgroundColor: '#50a5e6'});

                                    }
                            else{
                                    document.getElementById("uname_error").innerHTML= result;
                                    $("input[type=submit]#submit").attr("disabled", "disabled");
                                    $("#uname_error").css({color: 'red'});
                                    $("input[type=submit]#submit").css({backgroundColor: 'grey'});
                                  //$("input[type=button]#username").removeClass('input[type=button]:hover');


                                    }
                                  }
                             });

              }
                           }
                       );

     });


function create_account(){
      var stat="";
      $("#submit").val("Creating Account...");
      if( ($("#username").val() == "" && $("#password").val() == "") ||   ($("#username").val() == "" || $("#password").val() == "")  || $("#account_type").val() == "" || $('input[name=account_type]:checked').length == 0){
            $("#submit").val("Create Account");
            $("#uname_error").css({color: 'red'});
            document.getElementById("uname_error").innerHTML = "Please Fill up the form";
            stat = false;
}
      else if($("#password").val().length < 8){

            $("#submit").val("Create Account");
            $("#uname_error").css({color: 'red'});
            document.getElementById("uname_error").innerHTML = "Password Must be atleast 8 characters";
            stat = false;
}
      else{

            $.ajax({
                  type: "POST",
                  url: "php/index.php",
                  data: {
                        account_type:  $("input[name=account_type]:checked").val(),
                        username: $("#username").val(),
                        password : $("#password").val()
                    },
                  success: function(result) {
                    alert(result);
                       // window.location.assign("http://localhost/augeo/home/account/?new=1");
                        document.getElementById("uname_error").innerHTML = "Account Created";
                        }
                    });

          }

          if(!stat)
              return false;
                              }