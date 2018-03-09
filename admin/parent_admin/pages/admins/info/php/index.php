<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/connection.php");


if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM augeo_administration.admin_account INNER JOIN  augeo_administration.admin ON augeo_administration.admin_account.account_id = augeo_administration.admin.account_id WHERE augeo_administration.admin_account.account_id = '$id'";

        if($result = $conn->query($sql)) {
            $row = $result->fetch_assoc();
            if($row['role_id'] == 1)
                $role = "SUPER ADMIN";
            else
                $role ="NORMAL ADMIN";
                echo
                    '{ '.
                            '"account_id": "'.decode($row['account_id']).'", '.
                            '"f_name": "'.decode($row['f_name']).'", '.
                            '"m_name": "'.decode($row['m_name']).'", '.
                            '"l_name": "'.decode($row['l_name']).'", '.

                            '"contact_no": "'.decode($row['contact_no']).'", '.
                            '"email": "'.decode($row['email']).'", '.
                            '"profile_img": "'.decode($row['profile_img']).'", '.

                            '"bdate": "'.decode($row['bdate']).'", '.
                              '"role": "'.decode($role).'", '.

                            '"zip_code": "'.decode($row['zip_code']).'", '.
                            '"username": "'.decode($row['username']).'", '.
                            '"full_address": "'.decode($row['full_address']).'" '.
                    '}';
        }
}


if(isset($_POST['page'])){
        $idd =$_POST['idd'];
        $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_administration.admin_log WHERE augeo_administration.admin_log.admin_id = '$idd' LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(log_id) FROM augeo_administration.admin_log WHERE augeo_administration.admin_log.admin_id = '.$idd.' ')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $data = '';
        $data= '

              ';

        while( $result = $select->fetch() ) {
            $data .= '<tr class="gradeU">
                <td>'.$result->details.'</td>
                <td>'.$result->timestamp.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'data' => $data);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}

if(isset($_POST['id_ban'])){
        $id = $_POST['id_ban'];
        mysqli_query($conn,"UPDATE augeo_administration.admin_account SET state = '2' WHERE augeo_administration.admin_account.account_id = $id");
        echo "success";
}

if(isset($_POST['id_del'])){
        $id = $_POST['id_del'];
        mysqli_query($conn,"DELETE FROM augeo_administration.admin_account WHERE augeo_administration.admin_account.account_id= $id");
        echo mysqli_error($conn);
}

?>