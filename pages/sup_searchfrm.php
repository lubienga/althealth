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
            ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Supplier's Detail</h4>
            </div>
            <a href="supplier.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">
          <?php 
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
			$suppID = $rows['Supplier_ID'];
            $username = $rows['Contact_Person'];
            $tel = $rows['Supplier_Tel'];
            $email = $rows['Supplier_Email'];
            $meal = $rows['Bank'];
			
			$Bank_code = $rows['Bank_code'];
            $Supplier_BankNum = $rows['Supplier_BankNum'];
            $Supplier_Type_Bank_Account = $rows['Supplier_Type_Bank_Account'];
        }
}
          ?>
                <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Supplier ID<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $suppID; ?><br>
                        </h5>
                      </div>
                    </div>
				
				
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $username; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Tel<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tel; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Email<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $email; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Bank<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $meal; ?> <br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Bank code<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $Bank_code; ?> <br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Supplier BankNum<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $Supplier_BankNum; ?> <br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Supplier Type Bank Account<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $Supplier_Type_Bank_Account; ?> <br>
                        </h5>
                      </div>
                    </div>
          </div>
          </div>

<?php
include'../includes/footer.php';
?>