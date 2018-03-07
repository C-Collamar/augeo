<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");


if (isset($_POST['customers_active'])) {

    $sql = "SELECT COUNT(*) as total_customer FROM augeo_user_end.user_account WHERE augeo_user_end.user_account.state = '1'";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    '{ '.
                            '"active": '.$row['total_customer'].'.00, '.
                    '';
    }


    $sql = "SELECT COUNT(*) as total_customer FROM augeo_user_end.user_account WHERE augeo_user_end.user_account.state = '0'";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    ''.
                            '"inactive": '.$row['total_customer'].'.00 '.
                    '}';
    }
 }

 elseif (isset($_POST['admins'])) {

    $sql = "SELECT COUNT(*) as total_customer FROM augeo_administration.admin_account WHERE augeo_administration.admin_account.state = '1'";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    '{ '.
                            '"active": '.$row['total_customer'].'.00, '.
                    '';
    }

    $sql = "SELECT COUNT(*) as total_customer FROM augeo_administration.admin_account WHERE augeo_administration.admin_account.state = '0'";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    ''.
                            '"inactive": '.$row['total_customer'].'.00 '.
                    '}';
    }

 }

 elseif (isset($_POST['transactions'])) {
    $sql = "SELECT COUNT(*) as deal FROM augeo_application.deal WHERE augeo_application.deal.confirmation = '1'";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    '{ '.
                            '"successful": '.$row['deal'].', '.
                    '';
    }

     $sql = "SELECT COUNT(*) as deal FROM augeo_application.deal WHERE augeo_application.deal.confirmation = '0'";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    ''.
                            '"pending": '.$row['deal'].' '.
                    '}';
    }
}

elseif (isset($_POST['count_admin'])) {

    $sql = "SELECT COUNT(*) as total_admin FROM augeo_administration.admin WHERE augeo_administration.admin.role_id = '1'";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    '{ '.
                            '"super": '.$row['total_admin'].', '.
                    '';
    }


    $sql = "SELECT COUNT(*) as total_admin FROM augeo_administration.admin WHERE augeo_administration.admin.role_id = '2'";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    ''.
                            '"normal": '.$row['total_admin'].' '.
                    '}';
    }


 }


  elseif (isset($_POST['customer_count'])) {

    $sql = "SELECT COUNT(*) as total_customer FROM augeo_user_end.user_account";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    '{ '.
                            '"total": '.$row['total_customer'].' '.
                    '}';
    }

 }

 elseif (isset($_POST['item_count'])) {

    $sql = "SELECT COUNT(*) as total_item FROM augeo_user_end.item";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    '{ '.
                            '"total": '.$row['total_item'].' '.
                    '}';
    }

 }
?>