 // check if user is logged in
 window.onload = logged;
 function logged() {
                $.ajax({
                    url: "http://localhost/augeo/global/php/check_user.php",
                    success: function(result) {
                        if(result == "true"){

                     //         $(".logged_in").hide();
                      //        $(".logged_in").slideToggle();

                      }
                      else{
                       // $(".logged_in").hide();
                         //     $(".not_logged").hide();
                           //   $(".not_logged").slideToggle();

                      }
                    }
               });

     };