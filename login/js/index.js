//request
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
  $(".crt_form").hide();

  $('.show_hide').click(function(){
  $(".crt_form").slideToggle();
  $(".login_form").slideToggle();

  });

});



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
                          $("input[type=button]#crt_acc").removeAttr("disabled");
                           $("input[type=button]#crt_acc").css({backgroundColor: '#50a5e6'});

                      }
                      else{
                          document.getElementById("uname_error").innerHTML= result;
                           $("input[type=button]#crt_acc").attr("disabled", "disabled");
                            $("input[type=button]#crt_acc").css({backgroundColor: 'grey'});
                            $("input[type=button]#crt_acc").removeClass('input[type=button]:hover');


                      }
                    }
               });
             }
         );
});