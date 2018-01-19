 // check if user if logged in
 window.onload = logged;
 function logged() {
                // displaying avatar in topbar
                $.ajax({
                    url: "http://localhost/augeo/global/php/get_avatar.php",
                    success: function(result) {
                   document.getElementById("avatar").src = result;
                    }
               });
                // check if user is logged in
                $.ajax({
                    url: "http://localhost/augeo/global/php/check_user.php",
                    success: function(result) {
                        $("#user_logged").hide(0,"fast");
                        $("#user_not_logged").hide(0,"fast");

                        if (result == "true") {
                            $("#user_logged").show(0,"fast");
                            $("#user_not_logged").hide(0,"fast");
                        } else {
                            $("#user_not_logged").show(0,"fast");
                            $("#user_logged").hide(0,"fast");
                        }
                    }
               });

     };


