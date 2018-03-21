<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");

include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");

if(isset($_POST['search']))
    $id = $_POST['search'];
else
    $id = "";



if(isset($_POST['customer'])){
    $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_application.user_logtime LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(logtime_id) FROM augeo_application.user_logtime')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {

            $list .= '<tr class="gradeU">
                <td><a href="http://localhost/augeo/admin/parent_admin/pages/customers/info/?account_id='.$result->user_id.'">'.$result->user_id.'</a></td>
                <td>'.$result->login_time.'</td>
                <td>'.$result->logout_time.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}


if(isset($_POST['admin'])){
    $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_administration.admin_log where augeo_administration.admin_log.classification = 1 LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(log_id) FROM augeo_administration.admin_log where augeo_administration.admin_log.classification = 1')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {

            $list .= '<tr class="gradeU">
                <td><a href="http://localhost/augeo/admin/parent_admin/pages/admins/info/?account_id='.$result->admin_id.'">'.$result->admin_id.'</a></td>
                <td>'.$result->details.'</td>
                <td>'.$result->timestamp.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}



if(isset($_POST['byadmin'])){
    $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_administration.admin_log where augeo_administration.admin_log.classification = 2 LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(log_id) FROM augeo_administration.admin_log where augeo_administration.admin_log.classification = 2')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {

            $list .= '<tr class="gradeU">
                <td><a href="http://localhost/augeo/admin/parent_admin/pages/admins/info/?account_id='.$result->admin_id.'">'.$result->admin_id.'</a></td>
                <td>'.$result->details.'</td>
                <td>'.$result->timestamp.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}



if(isset($_POST['admin1'])){
    $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_administration.admin_log where augeo_administration.admin_log.classification = 3 LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(log_id) FROM augeo_administration.admin_log where augeo_administration.admin_log.classification = 3')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {

            $list .= '<tr class="gradeU">
                <td><a href="http://localhost/augeo/admin/parent_admin/pages/admins/info/?account_id='.$result->admin_id.'">'.$result->admin_id.'</a></td>
                <td>'.$result->details.'</td>
                <td>'.$result->timestamp.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}


if(isset($_POST['transactions'])){
    $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_application.bid, augeo_application.deal,augeo_user_end.user WHERE augeo_application.bid.bid_id = augeo_application.deal.bid_id AND augeo_user_end.user.user_id = augeo_application.bid.user_id AND augeo_application.deal.confirmation = 2 LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(deal_id) FROM augeo_application.bid, augeo_application.deal,augeo_user_end.user WHERE augeo_application.bid.bid_id = augeo_application.deal.bid_id AND augeo_user_end.user.user_id = augeo_application.bid.user_id AND augeo_application.deal.confirmation = 2')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {
            $percent =  $result->amount * .05;

            $list .= '<tr class="gradeU">
                <td>'.$result->f_name.' '.$result->m_name.' '.$result->l_name.'</td>
                <td><a href="http://localhost/augeo/admin/parent_admin/pages/transactions/success_transac.php?id='.$result->deal_id.'"> '.$result->deal_id.'</a></td>
                <td>Php '.$percent.'.00</td>
                <td>'.$result->timestamp.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}



if(isset($_POST['users_activity'])){
    $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_application.user_log WHERE augeo_application.user_log.type = 2 LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(userlog_id) FROM augeo_application.user_log WHERE augeo_application.user_log.type = 2')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {

            $list .= '<tr class="gradeU">
                <td>'.$result->description.'</td>
                <td>'.$result->timestamp.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}



if(isset($_POST['users_signups'])){
    $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_application.user_log WHERE augeo_application.user_log.type = 3 LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(userlog_id) FROM augeo_application.user_log where augeo_application.user_log.type = 3')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {

            $list .= '<tr class="gradeU">
                <td>'.$result->description.'</td>
                <td>'.$result->timestamp.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}
?>