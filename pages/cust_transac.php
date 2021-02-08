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
            ?>
          <!-- Page Content -->
		  
          <div class="col-lg-12">
            <?php
			// define error variables and set to empty values
			$idError ="";
			$fnameError ="";
			$lnameError ="";
			$emailError ="";
			$homeError ="";
			// define variables 
			
			//if(isset($_POST['add'])){ 
			
			  $IDclient = $_POST['IDclient'];
              $fname = $_POST['firstname'];
              $lname = $_POST['lastname'];
			  $addr = $_POST['address'];
			  $code = $_POST['code'];
              $hometel = $_POST['hometel'];
			  $worktel = $_POST['worktel'];
			  $celltel = $_POST['cell'];
              $email = $_POST['email'];
			  $ref = $_POST['client_reference'];
			  
			  
			  //switch($_GET['action']){
               // case 'add':    
			// validation here
			  //if ($submit == 'add' ){ 
          
		  
		  
		  switch($_GET['action']){
                case 'add':
					$_SESSION['error'] = array();
					if(!is_numeric($IDclient)) {
						$_SESSION['error'][] = "Must be numeric";
					}
					// validate client SA ID Number
					elseif(!preg_match("/[\d]{13}/", $IDclient)) {
						$_SESSION['error'][] = '*ID number must be SA 13 digit ID number';
					}
					//validate client phone number with (000)-(000)-(0000)
					elseif(!preg_match("/(\([\d]{3}\))+(\-\([\d]{3}\))+(\-\([\d]{4}\))/", $hometel)){
						$_SESSION['error'][] ="Enter the correct telephone(H) format";
					}
					elseif(!preg_match("/(\([\d]{3}\))+(\-\([\d]{3}\))+(\-\([\d]{4}\))/", $worktel)){
						$_SESSION['error'][] ="Enter the correct telephone(W) format";
					}
					elseif(!preg_match("/(\([\d]{3}\))+(\-\([\d]{3}\))+(\-\([\d]{4}\))/", $celltel)){
						$_SESSION['error'][] ="Enter the correct cellphone format";
					}
					// validate if client email address is well formed 
					elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$_SESSION['error'][] = "Invalid email format";
					}
					else {
						$Query = mysqli_query($db, "INSERT INTO `tblclientinfo`(`Client_ID`, `C_name`, `C_surname`, `Address`, `Code`, `C_Tel_H`, `C_Tel_W`, `C_Tel_Cell`, `C_Email`, `Reference_ID`) VALUES ('$IDclient','$fname', '$lname','$addr','$code','$hometel','$worktel','$celltel','$email','$ref')"); 				 
						if($Query){
						  echo "<script>alert('Client record is successfully inserted!')</script>";
						}else{
						  echo "<script>alert('Sorry, Client ID already exist!')</script>";
						}
					}
					echo "<script>window.open('customer.php', '_self');</script>";
					
                break;	
              
		case 'update' :
					  //here when you update client record.
				break;
		  //}
			
		}
		?>	  
	
          </div>

<?php
include'../includes/footer.php';
?>