$('c_pass').on('blur', function(){
    if(this.value.length < 8){ // checks the password value length
       alert('You have entered less than 8 characters for password');
       $(this).focus(); // focuses the current field.
       return false; // stops the execution.
    }
});

function validateForm() {
    var crt_pass = document.forms["c_Form"]["c_pass"].value;
    var crt_pass2 = document.forms["c_Form"]["n_pass"].value;

    if (crt_pass != crt_pass2) {
        alert("password must be the same!");
        return false;
    }

}

