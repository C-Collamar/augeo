<?php

//Objective: suggest autocomplete user names
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

//check for unauthorized access
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if(!isset($_GET['search_term'])) {
        header("HTTP/1.1 412 Precondition Failed");
        exit(print_r($_GET));
    }

    $search_term = encode($_GET['search_term']);

    //LEVENSHTEIN function is assumed to be defined. See function definition from here:
    //https://gist.github.com/Kovah/df90d336478a47d869b9683766cff718
    $query =
        "SELECT ".
            "user.user_id, ".
            "f_name, ".
            "LEFT(m_name, 1) AS m_initial, ".
            "l_name, ".
            "username ".
        "FROM ".
            "augeo_user_end.user, ".
            "augeo_user_end.user_account ".
        "WHERE ".
            "user.account_id = user_account.account_id AND ".
            "username LIKE '%$search_term%'".
        "ORDER BY augeo_user_end.LEVENSHTEIN('$search_term', user_account.username) ASC ".
        "LIMIT 5";
    $result = $conn->query($query) or die(mysqli_error($conn).PHP_EOL.$query);

    $users = [];
    while($row = $result->fetch_assoc()) {
        $row['username'] = decode($row['username']);
        $row['name'] = decode($row['f_name']).' '.decode($row['m_initial']).'. '.decode($row['l_name']);
        unset($row['f_name'], $row['l_name'], $row['m_initial']);
        array_push($users, $row);
    }

    header("HTTP/1.1 200 OK");
    exit(json_encode($users));
}
else header("HTTP/1.1 403 Forbidden");

?>