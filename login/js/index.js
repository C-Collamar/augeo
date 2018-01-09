$(document).ready(function() {
             $("#submit").click(function(){
                $.ajax({
                    type: "POST",
                    url: "php/login.php",
                    data: {
                        uname: $("#uname").val(),
                        : $("#pass").val()
                    },
                    success: function(result) {
                        // show returned message in a pop up
                        document.getElementById("error_msg").innerHTML= result;
                    }
               });
          });
     });