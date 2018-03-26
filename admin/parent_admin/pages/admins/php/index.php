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

        $select = $bdd->query("SELECT * FROM augeo_administration.admin_account INNER JOIN  augeo_administration.admin ON augeo_administration.admin_account.account_id = augeo_administration.admin.account_id WHERE augeo_administration.admin_account.account_id = augeo_administration.admin.account_id AND (augeo_administration.admin_account.username LIKE '$id%' OR augeo_administration.admin_account.account_id LIKE '$id%' OR augeo_administration.admin.f_name LIKE '$id%' OR augeo_administration.admin.email LIKE '$id%') LIMIT $start ,$per_page"); // Select article list from $start
        $select->setFetchMode(PDO::FETCH_OBJ);
        $numArticles = $bdd->query('SELECT count(account_id) FROM augeo_administration.admin_account')->fetch(PDO::FETCH_NUM); // Total number of articles in the database
        $numPage = ceil($numArticles[0] / $per_page); // Total number of page
        $data = '';
        $data= '

              ';

        while( $result = $select->fetch() ) {
          if($result->state == 0)
            $state = "Deactivated";
          elseif ($result->state == 1)
            $state = "Activated";
          else
            $state = "Banned";

          if($result->role_id == 1)
            $role = "SUPER";
          else
            $role = "NORMAL";

            $data .= '<tr class="gradeU">
                <td><a href="http://localhost/augeo/admin/parent_admin/pages/admins/info/?account_id='.$result->account_id.'">'.$result->username.'</a></td>
                <td>'.$result->f_name.' '.$result->m_name.' '.$result->l_name.'</td>
                <td>'.$state.'</td>
                <td>'.$role.'</td>
                <td class="center">'.$result->email.'</td>
              </tr>';
        }

        // We send back the total number of page and the article list
        $dataBack = array('numPage' => $numPage, 'data' => $data);
        $dataBack = json_encode($dataBack);

        echo $dataBack;
}

elseif (isset($_POST['active'])) {

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
                            '"inactive": '.$row['total_customer'].'.00, '.
                    '';
    }

    $sql = "SELECT COUNT(*) as total_customer FROM augeo_administration.admin_account WHERE augeo_administration.admin_account.state = '2'";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    ''.
                            '"banned": '.$row['total_customer'].'.00 '.
                    '}';
    }

 }

elseif (isset($_POST['count'])) {

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

/*
echo '

              <div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                  <thead>
                    <tr>
                      <th>Account Id</th>
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>State</th>
                      <th>Email</th>
                  </tr>
                </thead>
            <tbody>';


$sql = "SELECT COUNT(*) FROM augeo_user_end.user_account";
$result = mysqli_query($conn, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 2;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page
$offset = ($currentpage - 1) * $rowsperpage;









$result = mysqli_query($conn,"SELECT * FROM augeo_user_end.user_account INNER JOIN  augeo_user_end.user ON augeo_user_end.user_account.account_id = augeo_user_end.user.account_id WHERE augeo_user_end.user_account.account_id = augeo_user_end.user.account_id AND (augeo_user_end.user_account.username LIKE '$id%' OR augeo_user_end.user_account.account_id LIKE '$id%' OR augeo_user_end.user.f_name LIKE '$id%' OR augeo_user_end.user.email LIKE '$id%') LIMIT $offset, $rowsperpage" );


  while($row = mysqli_fetch_array($result)){
    echo '
            <tr class="gradeU">
                <td>'.$row['account_id'].'</td>
                <td><a href="http://localhost/augeo/admin/parent_admin/pages/customer/info/?account_id='.$row['account_id'].'">'.$row['username'].'</a></td>
                <td>'.$row['f_name'].' '.$row['m_name'].' '.$row['l_name'].'</td>
                <td>'.$row['state'].'</td>
                <td class="center">'.$row['email'].'</td>
              </tr>';

}
echo '      </tbody>
          </table>
          </div>
        </div>
';
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
} // end if

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " [<b>$x</b>] ";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
      } // end else
   } // end if
} // end for

// if not on last page, show forward and last page links
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
} // end if
/****** end build pagination links ******/



?>