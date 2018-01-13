<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");



if($result=mysqli_query($conn,"SELECT * FrOm augeo_user_end.user where augeo_user_end.user.account_id = 1")){
$found = mysqli_fetch_array($result);
$f_name = $found['f_name'];
$m_name = $found['m_name'];
$l_name = $found['l_name'];
$email = $found['email'];
$bdate = $found['bdate'];
$contact_no = $found['contact_no'];
$full_address = $found['full_address'];
$zip_code = $found['zip_code'];
}





switch ($_GET["id"]) {

    case 1:
    echo '




<div class="row">
<div class="well">
Profile Picture:
<img src="" id="img">


 <a href="#" class="profile"> Change Profile</a>

                <input type="file" id="file" name="file" onchange="display_img(this);" />
                <input type="button" class="button" name="but_upload" value="Upload" id="but_upload">

</div>
<div class="well">
    <p>Name: '.$f_name.' '.$m_name.' '.$l_name.' <t> <a class="edit" data-toggle="collapse" href="#collapse1">edit</a></p>

    <div id="collapse1" class="panel-collapse collapse">
      <ul class="list-group">
        <li class="list-group-item"> Fisrt name: <input class="uname" type="text" name="uname" value="austin" placeholder="First Name" >           </li>
        <li class="list-group-item">Middle name: <input type="text" name="uname" placeholder="Middle Name" > </li>
        <li class="list-group-item">Last name:   <input type="text" name="uname" placeholder="Last Name" > </li>
      </ul>
      <div class="panel-footer"><input type="submit" name="submit_name" id="save" value="save" > </div>
    </div>

<div class="well">
<div class="container">
    <div class="col-sm-6" style="height:130px;">
        <div class="form-group">
            <div class="input-group date" id="datetimepicker10">
                <input type="text" class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>


</div








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