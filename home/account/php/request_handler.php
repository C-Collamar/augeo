<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");



if($result=mysqli_query($conn,"SELECT * FrOm augeo_user_end.user where augeo_user_end.user.account_id = 1")){
$found = mysqli_fetch_array($result);
$f_name = $found['f_name'];
$m_name = $found['m_name'];
$l_name = $found['l_name'];
}





switch ($_GET["id"]) {

    case 1:
    echo '




<div class="row">
<div class="jumbotron">
Profile Picture:
<img src="" id="img">
 <a href="#" class="profile"> Change Profile</a>
<div class ="show_hide">
                <input type="file" id="file" name="file" onchange="display_img(this);" />
                <input type="button" class="button" value="Upload" id="but_upload">
</div>

    <div class="jumbotext"><p>Name: '.$f_name.' '.$m_name.' '.$l_name.'</p></div>
</div>
</div>

<div class="row">
<div class="jumbotron">
    <div class="jumbotext"><p>Name: '.$f_name.' '.$m_name.' '.$l_name.'</p></div>
</div>
</div>






    ';
        break;
    case 2:
    echo "s";
        break;


    default:
        var_dump($_GET);
        break;
}
?>