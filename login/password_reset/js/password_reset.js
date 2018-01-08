$(document).ready(function() {
             $("#submit").click(function(){
                $.ajax({
                    type: "POST",
                    url: "php/password_reset.php",
                    data: {
                        email: $("#email").val()

                    },
                    success: function(result) {
                        // show returned message in a pop up
                       alert("success")
                    }
               });
          });
     });

function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}