<?php
//checking user if logged in
session_start();
if(isset($_SESSION['account_id'])){
   echo "true";
}
else{
    echo "false";
}
?>