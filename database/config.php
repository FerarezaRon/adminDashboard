<?php 
    session_start();

    $connect = mysqli_connect('localhost','root' ,'','sweeps_db');

    // check connection
    if(!$connect){
        echo 'Connection error: ' .mysqli_connect_error();
    }
?>