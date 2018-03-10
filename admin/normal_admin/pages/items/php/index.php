<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/connection.php");


if(isset($_POST['page'])){

        $page = $_POST['page']; // Current page number
        $per_page = $_POST['per_page']; // Articles per page
        if ($page != 1) $start = ($page-1) * $per_page;
        else $start=0;

        $select = $bdd->query("SELECT * FROM augeo_user_end.item INNER JOIN  augeo_user_end.item_img ON augeo_user_end.item_img.item_id  = augeo_user_end.item.item_id INNER JOIN augeo_user_end.user ON augeo_user_end.item.user_id = augeo_user_end.user.user_id LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(item_id) FROM augeo_user_end.item ')->fetch(PDO::FETCH_NUM); // Total number of articles in the database

        $numPage = ceil($numArticles[0] / $per_page); // Total number of page

        // We build the article list
        $list = '';
        $list= '

              ';

        while( $result = $select->fetch() ) {
            if($result->state == 1)
                $state = "SOLD";
            elseif ($result->state == 2)
                $state = "BANNED";
            else
                $state = "AVAILABLE";

            $list .= '<tr class="gradeU">
                <td><a href="http://localhost/augeo/admin/normal_admin/pages/items/info/?id='.$result->item_id.'"><img src="'.$result->img_path.'" width="50px" height="50px"></a></td>
                <td>'.$result->name.'</td>
                <td>'.$result->description.'</td>
                <td>'.$result->initial_price.'</td>
                <td class="center">'.$result->f_name.' '.$result->m_name.' '.$result->l_name.'</td>
                <td class="center">'.$result->view_count.'</td>
                <td class="center">'.$state.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'list' => $list);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
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