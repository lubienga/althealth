<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}

$username = "";
$tel = "";
$email = "";
$meal = "";
$uid = 0;
if(!empty($_GET['id'])){
    $uid = $_GET['id'];
    $sql = "SELECT * FROM tblsupplier WHERE Supplier_ID = '$uid' LIMIT 1";
        $res = mysqli_query($db,$sql);
        if ($res) {
            $rows = mysqli_fetch_assoc($res);
            $username = $rows['Contact_Person'];
            $tel = $rows['Supplier_Tel'];
            $email = $rows['Supplier_Email'];
            $meal = $rows['Bank'];
			
			$Bank_code = $rows['Bank_code'];
            $Supplier_BankNum = $rows['Supplier_BankNum'];
            $Supplier_Type_Bank_Account = $rows['Supplier_Type_Bank_Account'];
        }
}
if(isset($_POST['submit'])){
    $username = $_POST['Contact_Person'];
    $tel = $_POST['Supplier_Tel'];
    $email = $_POST['Supplier_Email'];
    $meal = $_POST['Bank'];
}













 /* $query = 'SELECT *FROM tblsupplier WHERE Supplier_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz = $row['Supplier_ID'];
      $a = $row['Contact_Person'];
      $b = $row['Supplier_Tel'];
      $c = $row['Supplier_Email'];
      $e = $row['Bank'];
	  $d = $row['Bank_code'];
	  $f = $row['Supplier_BankNum'];
	  $g = $row['Supplier_Type_Bank_Account'];
    }*/
      //$id = $_GET['id'];
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Supplier</h4>
            </div>
            <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="supplier.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
      
            <form role="form" method="post" action="sup_edit1.php">
              <input type="hidden" name="id" value="<?php echo $uid; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact Person:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Company Name" name="name" value="<?php echo $username; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Phone:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Tel" name="phone" value="<?php echo $tel; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Email address:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="email" name="email" value="<?php echo $email; ?>" required>
                </div>
              </div>
              
			  
			  
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Bank:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Bank" name="bank" value="<?php echo $meal; ?>" required>
                </div>
              </div>
			  
			  
			  
			  
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Bank code:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Bank code" name="Bankcode" value="<?php echo $Bank_code; ?>" required>
                </div>
              </div>
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Supplier BankNum:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Supplier BankNum" name="BankNum" value="<?php echo $Supplier_BankNum; ?>" required>
                </div>
              </div>
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
               Type Bank Accoun:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Type Bank Accoun" name="Accoun" value="<?php echo $Supplier_Type_Bank_Account; ?>" required>
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>