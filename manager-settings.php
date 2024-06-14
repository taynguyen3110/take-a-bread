<?php
    $host   = 'localhost';
    $user   = 'root';
    $pwd    = '';
    $sql_db = 'managers';

    $connObj = @mysqli_connect($host, $user, $pwd, $sql_db);
    if ($connObj -> connect_error) {
        die ('Connection Error ('.$connObj -> connect_errno.')');
    }
?>