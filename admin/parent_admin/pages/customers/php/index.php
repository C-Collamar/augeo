<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");

include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");

if(isset($_POST['search']))
    $id = $_POST['search'];
else
    $id = "";



if(isset($_POST['page'])){
    $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_user_end.user_account INNER JOIN  augeo_user_end.user ON augeo_user_end.user_account.account_id = augeo_user_end.user.account_id WHERE augeo_user_end.user_account.account_id = augeo_user_end.user.account_id AND (augeo_user_end.user_account.username LIKE '$id%' OR augeo_user_end.user_account.account_id LIKE '$id%' OR augeo_user_end.user.f_name LIKE '$id%' OR augeo_user_end.user.email LIKE '$id%') LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(account_id) FROM augeo_user_end.user_account')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {
            $list .= '<tr class="gradeU">
                <td>'.$result->account_id.'</td>
                <td><a href="http://localhost/augeo/admin/parent_admin/pages/customers/info/?account_id='.$result->account_id.'">'.$result->username.'</a></td>
                <td>'.$result->f_name.' '.$result->m_name.' '.$result->l_name.'</td>
                <td>'.$result->state.'</td>
                <td class="center">'.$result->email.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}


elseif (isset($_POST['active'])) {

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
?>