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
              <h4 class="m-2 font-weight-bold text-primary">Product's Detail</h4>
            </div>
            <a href="product.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
            <div class="card-body">
          <?php 
           $uid = 0;
if(!empty($_GET['id'])){
    $uid = $_GET['id'];
    $sql = "SELECT * FROM tblsupplements WHERE Supplement_id = '$uid' LIMIT 1";
        $res = mysqli_query($db,$sql);
        if ($res) {
            $rows = mysqli_fetch_assoc($res);
       $zz= $rows['Supplement_id'];
      $i= $rows['Supplier_ID'];
      $a=$rows['Supplement_Description'];
	  $addr=$rows['Cost_excl'];
	  $code=$rows['Cost_incl'];
      $b=$rows['Min_levels'];
	  $w=$rows['Current_stock_levels'];
	  
        }
}
          ?>

                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Supplement ID<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $zz; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Supplier ID<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $i; ?> <br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Description<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $a; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Cost excl<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $addr; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Cost_incl<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $code; ?><br>
                        </h5>
                      </div>
                    </div>
					
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Minimum Levels<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $b; ?><br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                         Current stock Levels<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $w; ?><br>
                        </h5>
                      </div>
                    </div>
                </div>
          </div></center>

          <div class="card shadow mb-4 col-xs-12 col-md-15 border-bottom-primary">
           
            <div class="card-body">
              <div class="table-responsive">
                

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>


<?php
include'../includes/footer.php';
?>