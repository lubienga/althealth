<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
			// Variables 
              $pc = $_POST['prodcode'];
			  $supp = $_POST['supplierID'];
              $description = $_POST['description'];
              $exclud = $_POST['exclud'];
              $incl = $_POST['incl'];
              $Min_levels = $_POST['Min_levels']; 
              $Current_stock = $_POST['Current_stock'];
           
		   switch($_GET['action']){
                case 'add':
   
	   //Insert new record
             $Query = mysqli_query($db, "INSERT INTO `tblsupplements`(`Supplement_id`, `Supplier_ID`, `Supplement_Description`, `Cost_excl`, `Cost_incl`, `Min_levels`, `Current_stock_levels`) VALUES ('$pc','$supp', '$description','$exclud','$incl','$Min_levels','$Current_stock')"); 				 
						if($Query){
						  echo "<script>alert('Supplement record is successfully inserted!')</script>";
						}else{
						  echo "<script>alert('Sorry, Supplement ID already exist!')</script>";
						}
					
					echo "<script>window.open('product.php', '_self');</script>";
					
                break;	
              
		case 'update' :
					  //here when you update supplemet record.




				break;
		  }
			
		//}
            





?>






             <!-- <script type="text/javascript">window.location = "product.php";</script>-->
          </div>

<?php
include'../includes/footer.php';
?>