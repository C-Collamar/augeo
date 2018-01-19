 // check if user is logged in
 window.onload = logged;
 function logged() {
                $.ajax({
                    url: "http://localhost/augeo/global/php/get_avatar.php",
                    success: function(result) {
                    $("#avatar").val() = result;
                        alert($("#avatar").val());
                    }
               });

     };


