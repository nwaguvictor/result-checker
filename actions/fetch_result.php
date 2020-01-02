<?php 
require_once("db.php");

if (isset($_POST['regNum'])){
    $regNum = $_POST['regNum'];
    $regNum = $conn->real_escape_string($regNum);
    $results = array();
    $output = '';
    $query = $conn->query("select * from reg_numbers where reg_number = '$regNum'");
    if ($query->num_rows == 1){
        $data = $query->fetch_assoc();
       echo $regNumberId = $data['reg_id'];
    }
}



?>