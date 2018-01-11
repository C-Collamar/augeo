$('#c_pass').on('blur', function(){
    if(this.value.length < 8){ // checks the password value length
       $(this).focus(); // focuses the current field.
       $("input[type=submit]").attr("disabled", "disabled");
       $("input[type=submit]").css({backgroundColor: 'grey'});
       $("input[type=password]#c_pass").css({border: '1px solid red'});
       $("input[type=password]#c_pass").css({padding: '7px 7px 5px'});

       //return false; // stops the execution.
       document.getElementById("error_msg").innerHTML = "Password Must be Atleast 8 characters long";
    }
    else{
       document.getElementById("error_msg").innerHTML = "";
       $("input[type=submit]").removeAttr("disabled");
       $("input[type=password]#c_pass").css({border: '1px solid #ccd6dd'});
       $("input[type=submit]").css({backgroundColor: '#50a5e6'});
    }
});

function validateForm() {
    var crt_pass = document.forms["c_Form"]["c_pass"].value;
    var crt_pass2 = document.forms["c_Form"]["n_pass"].value;

    if (crt_pass != crt_pass2) {
        document.getElementById("error_msg").innerHTML = "Password Must be the same!";
        return false;
    }

}


