$(document).ready(function() {
if($("#activated").val() == '1'){
     $("#activated_modal").modal('show');

}
// hiding and showing
      $(".crt_form").hide();
      $(".show_hide").show();
      $(".show_hide2").show();
      $(".crt_form").hide();
      $(".email_d").hide();

      $('.show_hide').click(function(){
          $(".crt_form").slideToggle();
          $(".login_form").slideToggle();

  });

      $('.show_hide2').click(function(){
          $(".crt_form").hide();
          $(".login_form").hide();
          $(".email_d").slideToggle();

  });




  // for creating account
$("#crt_acc").click(function(){
      $(this).val("Creating Account...");
      if( ($("#crt_uname").val() == "" && $("#crt_pass").val() == "") ||   ($("#crt_uname").val() == "" || $("#crt_pass").val() == "")    ){

            $("#crt_acc").val("Create Account");
            $("#uname_error").css({color: 'red'});
            document.getElementById("uname_error").innerHTML = "Please Fill up the form";
}
      else if($("#crt_pass").val().length < 8){

            $("#crt_acc").val("Create Account");
            $("#uname_error").css({color: 'red'});
            document.getElementById("uname_error").innerHTML = "Password Must be atleast 8 characters";
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
                       window.location.assign("http://localhost/augeo/home/account/?new=1");
                        }
                    });

          }

                               });

// checking if username if available
$("#crt_uname").blur(
      function (event) {
        if($("#crt_uname").val() == ""){
              $("#uname_error").css({color: 'red'});
              document.getElementById("uname_error").innerHTML= "Please Enter your desired Username";
                            }
        else{
              $.ajax({
              type: "POST",
              url: "php/login.php",
              data: {
                uname: $("#crt_uname").val()
                    },
              success: function(result) {
                            if(result == "Username's Available"){
                                    document.getElementById("uname_error").innerHTML= result;
                                    $("#uname_error").css({color: 'green'});
                                    $("input[type=button]#crt_acc").removeAttr("disabled");
                                    $("input[type=button]#crt_acc").css({backgroundColor: '#50a5e6'});

                                    }
                            else{
                                    document.getElementById("uname_error").innerHTML= result;
                                    $("input[type=button]#crt_acc").attr("disabled", "disabled");
                                    $("#uname_error").css({color: 'red'});
                                    $("input[type=button]#crt_acc").css({backgroundColor: 'grey'});
                                  //$("input[type=button]#crt_acc").removeClass('input[type=button]:hover');


                                    }
                                  }
                             });

              }
                           }
                       );

//sending email
$("#send_mail").click(function(){
        $(this).val("Sending...");

        $.ajax({
              type: "POST",
              url: "php/password_reset.php",
              data: {
                    email: $("#email").val()
                    },
              success: function(result) {
                          $("#send_mail").val("Send");

                          if(result == "failed"){
                            $("#error_email").css({color: 'red'});
                               document.getElementById("error_email").innerHTML= "Email not Found";
                      }
                          else{
                                $("#myModal").modal('show');


                      }
                    }
               });
          });

// login
$("#submit").click(function(){
        $(this).val("Loging in...");
        $.ajax({
              type: "POST",
              url: "php/login.php",
              data: {
                      uname: $("#uname").val(),
                      pass : $("#pass").val()
                    },
              success: function(result) {
                          if(result == "sucess"){
                              window.location.assign("../home/account");
                      }
                           else if (result == "deactivated account") {
                              window.location.assign("reactivate_account/");

                      }
                          else{
                            $("#submit").val("Login");
                            $("#error_msg").css({color: 'red'});
                             document.getElementById("error_msg").innerHTML= result;

                      }
                    }
               });
          });


//end of on page load ajax
     });


