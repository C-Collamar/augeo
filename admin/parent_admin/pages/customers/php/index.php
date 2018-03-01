<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");

if(isset($_POST['search']))
    $id = $_POST['search'];
else
    $id = "";

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