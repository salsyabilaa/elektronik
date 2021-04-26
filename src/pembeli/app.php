<?php 

$dbconnect = mysqli_connect('localhost', 'root', '', 'belajar_lsp');

function queryData($query)
{
    global $dbconnect;
    $data = mysqli_query($dbconnect, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($data)) {
        $rows[] = $row;
    }
    return $rows;
}


?>