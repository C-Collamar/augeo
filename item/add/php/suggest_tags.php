<?php

//Objective: suggest autocomplete tagnames
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
            "tag.tag_id, ".
            "tag.tag_name ".
        "FROM ".
            "augeo_user_end.tag ".
        "WHERE ".
            "tag_name LIKE '%$search_term%'".
        "ORDER BY augeo_user_end.LEVENSHTEIN('$search_term', tag.tag_name) ASC ".
        "LIMIT 5";
    $result = $conn->query($query) or die(mysqli_error($conn).PHP_EOL.$query);

    $users = [];
    while($row = $result->fetch_assoc()) {
        array_push($users, $row);
    }

    header("HTTP/1.1 200 OK");
    exit(json_encode($users));
}
else header("HTTP/1.1 403 Forbidden");

?>