<?php include("includes/header.php") ?>
<?php include("includes/navbar.php") ?>

<div class="conainter my-5">
   <h2 class="text-danger text-center">The Result Checker System</h2>
   <hr class="my-1 mb-4">
    <div class="col-lg-5 mx-auto">
       <div id="response"></div>
        <div class="card card-danger">
        <div class="card-header">
            <h5>Enter your Registration Number to View Results</h5>
        </div>
        
        <div class="card-body">
            <form action="" method="post" id="result-form">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-secondary">
                            <i class="fa fa-fw fa-pencil"></i>
                        </button>
                    </div>
                    <input type="text" id="regNum" placeholder="Enter Reg Number" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <button type="reset" class="btn btn-danger"><i class="fa-fw fa fa-times"></i>Cancel</button>
                    <button type="submit" class="btn btn-success float-right" id="check-result">
                        <i class="fa-fw fa fa-check"></i>Check Result</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-border table-hover table-sm" id="resultList">
            
        </table>
    </div>
</div>




<?php include("includes/footer.php") ?>

<script>
   $(document).ready(function(){
       $(document).on('keyup', '#regNum', function(){
           let enterValue = $(this).val();
           $.ajax({
               url:'actions/action.php',
               type:'post',
               data:{data:enterValue},
               success:function(result){
                   $("#response").html(result);
               }
           })
       })
       
       $(document).on('click', '#check-result', function(e){
           e.preventDefault();
           let regNum = $("#regNum").val();
           if (regNum != ''){
           $.ajax({
               url:'actions/fetch_result.php',
               type:'POST',
               data:{regNum:regNum},
               success:function(reply){
                   if (reply != '') {
                    window.location.href = 'actions/results.php?regNumId=' +reply;
                   }else{
                       alert("Reg Number Invalid or Wrong!!");
                   }
               }
           })
           }else {
               alert("Please Enter Regnumber");
           }
       })
   })
</script>

