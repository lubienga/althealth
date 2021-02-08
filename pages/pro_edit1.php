<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$name = $_POST['supplID'];
            $prov = $_POST['Description'];
            $cit = $_POST['Cost_excl'];
           $phone = $_POST['Cost_incl'];
			
			$Bankcode = $_POST['Min_levels'];
            $BankNum = $_POST['Current_stock_levels'];
            //$Accoun = $_POST['Accoun'];
		
	 			$query = 'UPDATE tblsupplements  set Supplier_ID="'.$name.'",Supplement_Description ="'.$prov.'", Cost_excl ="'.$cit.'", Cost_incl="'.$phone.'" , Min_levels="'.$Bankcode.'" , Current_stock_levels="'.$BankNum.'" WHERE
					Supplement_id ="'.$zz.'"'; 
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("You've Update Product Successfully.");
			window.location = "product.php";
		</script>