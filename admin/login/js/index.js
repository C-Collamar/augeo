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


     });


function login_submit(){
    var stat="";
    $("#submit").val("Loging in...");
        $.ajax({
              type: "POST",
              url: "php/login.php",
              data: {
                      uname: $("#uname").val(),
                      pass : $("#pass").val()
                    },
              success: function(result) {
                          if(result == "sucess_parent"){
                              window.location.assign("../parent_admin");
                          }
                          else if(result == "sucess_normal"){
                              window.location.assign("../normal_admin");
                            }
                          else if(result == "deactivated account") {
                              window.location.assign("reactivate_account/");
                            }
                          else if(result == "banned account") {
                              window.location.assign("banned_account/");
                          }
                          else{

                            $("#submit").val("Login");
                            $("#error_msg").css({color: 'red'});
                             document.getElementById("error_msg").innerHTML= result;
                             stat = false;


                      }
                    }
               });
    if(!stat)
      return false;
  }

function email_submit(){
        var stat="";
        $("#send_mail").val("Sending...");
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
                               stat = false;
                      }
                          else{
                              document.getElementById("error_email").innerHTML= "";
                              $("#myModal").modal('show');


                      }
                    }
               });
         if(!stat)
           return false;
  }
