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
$i = "";
$tel = "";
$email = "";
$meal = "";
$uid = 0;
if(!empty($_GET['id'])){
    $uid = $_GET['id'];
    $sql = "SELECT * FROM tblsupplements WHERE Supplement_id = '$uid' LIMIT 1";
        $res = mysqli_query($db,$sql);
        if ($res) {
            $rows = mysqli_fetch_assoc($res);
             //$zz= $row['Supplement_id'];
      $i= $rows['Supplier_ID'];
      $a=$rows['Supplement_Description'];
	  $addr=$rows['Cost_excl'];
	  $code=$rows['Cost_incl'];
      $b=$rows['Min_levels'];
	  $w=$rows['Current_stock_levels'];
	  
        }
}


?>
            
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Supplement</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="product.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
         
            <form role="form" method="post" action="pro_edit1.php">
              <input type="hidden" name="id" value="<?php echo $uid; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Supplier ID:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="supplier ID" name="supplID" value="<?php echo $i; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Description:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Last Name" name="Description" value="<?php echo $a; ?>" required>
                </div>
              </div>
              
			  
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Cost excl:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Cost excl" name="Cost_excl" value="<?php echo $addr; ?>" >
                </div>
              </div>
			  
			  
			   <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Cost incl:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="code" name="Cost_incl" value="<?php echo $code; ?>" >
                </div>
              </div>
			  
			  
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Min levels :
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Min levels" name="Min_levels" value="<?php echo $b; ?>" >
                </div>
              </div>
			  
			  
			  
			   <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Current stock levels:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Current stock levels" name="Current_stock_levels" value="<?php echo $w; ?>" >
                </div>
              </div>
			  
			   
			  
			  
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button> 
              </form>  
          </div>
  </div>

<?php
include'../includes/footer.php';
?>