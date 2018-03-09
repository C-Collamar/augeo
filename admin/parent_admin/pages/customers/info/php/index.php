<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/connection.php");



if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM augeo_user_end.user_account INNER JOIN  augeo_user_end.user ON augeo_user_end.user_account.account_id = augeo_user_end.user.account_id WHERE augeo_user_end.user_account.account_id = '$id'";

        if($result = $conn->query($sql)) {
            $row = $result->fetch_assoc();
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
                            '"zip_code": "'.decode($row['zip_code']).'", '.
                            '"username": "'.decode($row['username']).'", '.
                            '"full_address": "'.decode($row['full_address']).'" '.
                    '}';
        }
}

if(isset($_POST['bid'])){
        $id=$_POST['bid'];

        $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_application.deal INNER JOIN  augeo_application.bid ON augeo_application.deal.bid_id = augeo_application.bid.bid_id INNER JOIN augeo_user_end.item ON augeo_application.bid.item_id = augeo_user_end.item.item_id INNER JOIN augeo_user_end.item_img on augeo_user_end.item_img.item_id = augeo_user_end.item.item_id INNER JOIN augeo_user_end.user ON augeo_user_end.item.user_id = augeo_user_end.user.user_id WHERE augeo_application.bid.user_id = $id LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(deal_id) FROM augeo_application.deal INNER JOIN  augeo_application.bid ON augeo_application.deal.bid_id = augeo_application.bid.bid_id INNER JOIN augeo_user_end.item ON augeo_application.bid.item_id = augeo_user_end.item.item_id INNER JOIN augeo_user_end.item_img on augeo_user_end.item_img.item_id = augeo_user_end.item.item_id WHERE augeo_application.bid.user_id = '.$id.'')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {
            if($result->confirmation == 0)
                $confirmation = "Not Yet Confirmed by the User";
            else
                $confirmation = "Already Confirmed by the User";

            $list .= '<a class="row card-item">
                        <div class="col-sm-7 border-right">
                            <div class="media">
                                <div class="media-left">
                                    <img src="'.$result->img_path.'" class="media-object item-img" title="Sample item description.">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">'.$result->name.'</h4>
                                    <span class="item-seller">'.$result->f_name.' '.$result->m_name.' '.$result->l_name.'</span>
                                    <div class="w-100"></div>
                                    <span class="status"><b>'.$confirmation.'</b></span>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-5 text-center align-middle">
                            <div class="row no-padding">
                                <div class="col-xs-6">
                                    <div class="row no-padding your-bid"><h4>'.$result->timestamp.'</h4></div>
                                </div>
                                <div class="col-xs-6">
                                <div class="row no-padding customers-bid"><h4>&#8369; '.$result->amount.'</h4></div>

                                </div>
                            </div>
                        </div>
                    </a>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}


if(isset($_POST['id_ban'])){
        $id = $_POST['id_ban'];
        mysqli_query($conn,"UPDATE augeo_user_end.user_account SET state = '2' WHERE augeo_user_end.user_account.account_id = $id");
        echo "success";
}

if(isset($_POST['id_del'])){
        $id = $_POST['id_del'];
        mysqli_query($conn,"DELETE FROM augeo_user_end.user_account WHERE augeo_user_end.user_account.account_id = $id");
        echo mysqli_error($conn);
}




if(isset($_POST['item'])){
        $item = $_POST['item'];
        $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_user_end.item INNER JOIN  augeo_user_end.item_img ON augeo_user_end.item_img.item_id  = augeo_user_end.item.item_id INNER JOIN augeo_user_end.user ON augeo_user_end.item.user_id = augeo_user_end.user.user_id  WHERE augeo_user_end.item.user_id = $item LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(item_id) FROM augeo_user_end.item ')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {


            $list .= '<tr class="gradeU">
                <td><a href="http://localhost/augeo/admin/parent_admin/pages/items/info/?id='.$result->item_id.'"><img src="'.$result->img_path.'" width="50px" height="50px"></a></td>
                <td>'.$result->name.'</td>
                <td>'.$result->description.'</td>
                <td>'.$result->initial_price.'</td>
                <td class="center">'.$result->view_count.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}
?>