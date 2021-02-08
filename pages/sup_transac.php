<?php
include'../includes/connection.php';
session_start();
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              // Variables 
              $pc = $_POST['supplierID'];
			  $supp = $_POST['person'];
              $tel = $_POST['SupplierTel'];
              $email = $_POST['SupplierEmail'];
              $incl = $_POST['Bank'];
              $Bankcode = $_POST['Bankcode']; 
              $Current_stock = $_POST['SupplierBankNum'];
			  $Type_Bank = $_POST['TypeBank'];
           
		        switch($_GET['action']){
                case 'add':
				$_SESSION['error'] = array();
					if(empty($pc)) {
						$_SESSION['error'][] = "can not be empty";
					}
					//validate number format
					elseif(!preg_match("/(\([\d]{3}\))+(\-\([\d]{3}\))+(\-\([\d]{4}\))/", $tel)){
						$_SESSION['error'][] ="Enter the correct suppllier telephone format";
					}
					// validate if client email address is well formed 
					elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$_SESSION['error'][] = "Invalid email format";
					}
					else {
				   //Insert new record
						$Query = mysqli_query($db, "INSERT INTO `tblsupplier`(`Supplier_ID`, `Contact_Person`, `Supplier_Tel`, `Supplier_Email`, `Bank`, `Bank_code`, `Supplier_BankNum`, `Supplier_Type_Bank_Account`) VALUES ('$pc','$supp', '$tel','$email','$incl','$Bankcode','$Current_stock','$Type_Bank')"); 				 
						if($Query){
							 echo "<script>alert('Supplier record is successfully inserted!')</script>";
						}else{
							echo "<script>alert('Sorry, Supplier ID already exist!')</script>";
						}
					}
					echo "<script>window.open('supplier.php', '_self');</script>";
					
                break;	
              
		case 'update' :
					  //here when you update supplemet record.
				break;
		  }
			?>
          </div>

<?php
include'../includes/footer.php';
?>