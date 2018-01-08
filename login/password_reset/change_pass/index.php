<!DOCTYPE html>
<html>
<head>
    <title>change password</title>
</head>
<body>
<?php
include("php/hide.php");
if(isset($id)){

echo '<div id=change_pass class="change_pass">
<label id="c_pass"> New Password: </label>
<input type="text" name="c_pass" id="c_pass required">

<label id="c_pass"> Re-enter Password: </label>
<input type="text" name="n_pass" id="n_pass required">
<input type="submit" name="submit" value="submit">';

}
else{
    header("location: ../../../global/php/page_error.php");
}

 ?>

</div>
</body>
</html>