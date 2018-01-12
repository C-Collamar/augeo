$(window).ready(function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/augeo/global/php/check_user.php",
                    success: function(result) {
                        if(result == "not logged in"){
                            alert("success");
                      }
                      else{
                        alert("success pa din");

                      }
                    }
               });

     });