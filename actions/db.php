<?php 
    $conn = new mysqli("localhost", "root", "", "result_checker");
    if(!$conn){
        die("Error connecting to server");
        exit();
    }


?>