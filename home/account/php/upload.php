<?php

$extension = explode("/", $_FILES["file"]["type"]);
$name = "test";
/* Upload file */
if(move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$name.'.'.$extension[1])){
    echo $name.'.'.$extension[1];
}else{
    echo "sadasda";
}
