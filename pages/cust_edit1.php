<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
		    $lname = $_POST['lastname'];
			$address = $_POST['address'];
			$code = $_POST['code'];
			$C_Tel_H = $_POST['phoneH'];
			$phone = $_POST['phone'];
			$phonecell = $_POST['phonecell'];
			$email = $_POST['email'];
	   	
		
	 			$query = 'UPDATE tblclientinfo set C_name ="'.$fname.'",C_surname ="'.$lname.'",Address ="'.$address.'",Code ="'.$code.'",C_Tel_H ="'.$C_Tel_H.'",
					     C_Tel_Cell ="'.$phonecell.'", C_Tel_W="'.$phone.'" , C_Email="'.$email.'" WHERE
					     Client_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("You've Update Client Successfully.");
			window.location = "customer.php";
		</script>