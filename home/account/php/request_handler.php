<?php
require_once "../../../global/php/connection.php";



if($result=mysqli_query($conn,"SELECT * FrOm augeo_user_end.user where augeo_user_end.user.account_id = 1")){
$found = mysqli_fetch_array($result);
$f_name = $found['f_name'];
$m_name = $found['m_name'];
$l_name = $found['l_name'];
}





switch ($_GET["id"]) {

    case 1:
    echo '

    <p>Name: </p><div class="data">'.$f_name.$m_name.$l_name.'</div>








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