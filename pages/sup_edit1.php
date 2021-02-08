<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$name = $_POST['name'];
            $prov = $_POST['phone'];
            $cit = $_POST['email'];
            $phone = $_POST['bank'];
			
			$Bankcode = $_POST['Bankcode'];
            $BankNum = $_POST['BankNum'];
            $Accoun = $_POST['Accoun'];
		
	 			$query = 'UPDATE tblsupplier  set Contact_Person="'.$name.'",Supplier_Tel ="'.$prov.'", Supplier_Email ="'.$cit.'", Bank="'.$phone.'" , Bank_code="'.$Bankcode.'" , Supplier_BankNum="'.$BankNum.'" , Supplier_Type_Bank_Account="'.$Accoun.'" WHERE
					Supplier_ID ="'.$zz.'"'; 
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Update Supplier Successfully.");
			window.location = "supplier.php";
		</script>