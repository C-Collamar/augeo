<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/connection.php");


if(isset($_POST['page'])){

        $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_application.deal INNER JOIN  augeo_application.bid ON augeo_application.deal.bid_id = augeo_application.bid.bid_id INNER JOIN augeo_user_end.item ON augeo_application.bid.item_id = augeo_user_end.item.item_id INNER JOIN augeo_user_end.user ON augeo_user_end.item.user_id = augeo_user_end.user.user_id LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(deal_id) FROM augeo_application.deal INNER JOIN  augeo_application.bid ON augeo_application.deal.bid_id = augeo_application.bid.bid_id INNER JOIN augeo_user_end.item ON augeo_application.bid.item_id = augeo_user_end.item.item_id')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {
            $item_id = $result->item_id;
            $select1 = $bdd->query("SELECT * FROM augeo_user_end.item_img WHERE augeo_user_end.item_img.item_id = $item_id"); // Select article list from $start
            $select1->setFetchMode(PDO::FETCH_OBJ);
            while($result1 = $select1->fetch() ) {
                $image = $result1->img_path;
            }
            if($result->confirmation == 0)
                $confirmation = "Not Yet Confirmed by the User";
            elseif ($result->confirmation == 1) 
                $confirmation = "Already Confirmed by the User";
            else
                  $confirmation = "PAID";
              
            $list .= '<a href="http://localhost/augeo/admin/parent_admin/pages/transactions/success_transac.php?id='.$result->deal_id.'" class="row card-item">
                        <div class="col-sm-7 border-right">
                            <div class="media">
                                <div class="media-left">
                                    <img src="'.$image.'" class="media-object item-img" title="Sample item description.">
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
?>