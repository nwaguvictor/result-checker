<?php 
include('db.php');

$value = $_POST['data'];
$value = $conn->real_escape_string($value);
$sql = "select * from reg_numbers where reg_number = '$value'";
$query = $conn->query($sql) or die('Error occured...'.$conn->error);
if($query->num_rows <= 0){
     echo '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                Registration Number Not Valid!!!.
          </div>';
}
else {
    echo '<div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                Registration Number Valid!!!.
          </div>';
}



    
        
        
?>