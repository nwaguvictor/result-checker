<?php include('../includes/header.php') ?>
<?php include('../includes/navbar.php') ?>

<div class="container">
<?php 
    require("db.php");

    if (isset($_GET['regNumId'])) {
      $regNumId = $_GET['regNumId'];
      $regNumId = $conn->real_escape_string($regNumId);

      
      $sql = "SELECT * FROM results WHERE reg_number_id = $regNumId";
      $query = $conn->query($sql);
      if ($query->num_rows > 0){
        echo '<h2 class="text-center my-2 text-danger">Student Results And Scores</h2> <hr class="my-2 mb-4">
        <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Results</th>
                <th>Scores</th>
                <th>Actions</th>
            </tr>
        </thead> 
        <tbody>';

          while($rows = $query->fetch_assoc()){
        ?>  

        <tr>
            <td><?php echo $rows['result_id'] ?></td>
            <td><?php echo $rows['result'] ?></td>
            <td><?php echo $rows['score'] ?></td>
            <td>Delete</td>
        </tr>

    <?php 
         }

         echo '       
         </tbody>
     
         </table>
     </div>';
 }else {
    echo '<h2 class="text-center text-danger">No result for This User...! Check back later</h2';
  }

      }

?>
</div>

<?php include('../includes/footer.php') ?>
 