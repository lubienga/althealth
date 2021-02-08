<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
                                
}   
			if(isset($_SESSION['error'])) {
            ?>
            <div class="alert alert-danger"><center><?php echo implode('<br>', $_SESSION['error']); ?></center></div>
			<?php  unset($_SESSION['error']); } ?>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
								 <?Php
                 // reports here
                include ('birthday-report.php');
						    include ('query_client.php');
						    include ('purchase_report.php');
                include ('unpaid_invoicephp.php');
                include ('stock_level.php');

					 	         ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<?php
include'../includes/footer.php';
?>