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
                        // show returned message
                        document.getElementById("error_msg").innerHTML= result;
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