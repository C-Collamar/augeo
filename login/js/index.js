//request login
$(document).ready(function() {
             $("#submit").click(function(){
                $.ajax({
                    type: "POST",
                    url: "php/login.php",
                    data: {
                        uname: $("#uname").val(),
                        pass : $("#pass").val()
                    },
                    success: function(result) {
                        if(result == "sucess"){
                          window.location.assign("../home");
                      }
                      else{
                        document.getElementById("error_msg").innerHTML= result;

                      }
                    }
               });
          });
     });

// hiding and showing login form/Create form
$(document).ready(function(){


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


// for validating username
$(document).ready(function () {

        $("#crt_uname").blur(
             function (event) {
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
         );
});

// validating email and sending
$(document).ready(function() {
             $("#send_mail").click(function(){
                $.ajax({
                    type: "POST",
                    url: "php/password_reset.php",
                    data: {
                        email: $("#email").val()
                    },
                    success: function(result) {
                        if(result == "failed"){
                          document.getElementById("error_email").innerHTML= "Email not Found";
                      }
                      else{
                         $("#myModal").modal('show');


                      }
                    }
               });
          });
     });

// for creating account
$(document).ready(function() {
             $("#crt_acc").click(function(){
                $.ajax({
                    type: "POST",
                    url: "php/login.php",
                    data: {
                        crt_uname: $("#crt_uname").val(),
                        crt_pass : $("#crt_pass").val()
                    },
                    success: function(result) {
                        if(result == "sucess"){
                         // window.location.assign("../home");
                          window.location.assign("../home");
                      }
                      else{
                        document.getElementById("uname_error").innerHTML= result;

                      }
                    }
               });
          });
     });


