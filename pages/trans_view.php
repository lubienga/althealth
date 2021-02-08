<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
//session_start();
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
//$i = "";
//$tel = "";
//$email = "";
//$meal = "";
//$uid = 0;
if(!empty($_GET['id'])){
    $uid = $_GET['id'];

        $query = "SELECT *,C_name, C_surname, Inv_Num
              FROM tblclientinfo   T
              JOIN tblinv_info C ON T.`Client_ID`=C.`Client_ID`
              WHERE C.Inv_Num = '$uid' ";
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
       if ($row) {
             //$zz= $row['Supplement_id'];
          $fname = $row['C_name'];
          $lname = $row['C_surname'];
	      $pn = $row['C_Tel_H'];
          $date = $row['Inv_Date'];
          $tid = $row['Inv_Num'];
		  $clientID = $row['Client_ID'];
      }

}


?>
            
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                  <h5 class="font-weight-bold">
                    Alt health Sale Invoice
                  </h5>
                </div>
                <div class="col-sm-3 py-1">
                  <h6>
                    Date: <?php echo $date; ?>
                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                    Full Names:<br> <?php echo $fname; ?> <?php echo $lname; ?>
                  </h6>
                  <h6>
                    Phone: <?php echo $pn; ?>
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6>
                    Invoice #<?php echo $tid; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                    Client Id No: <?php echo $clientID; ?>
                  </h6>
                  <h6>
                    <?php //echo $roles; ?>
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
				<th>Description</th>
                <th width="8%">Qty</th>
                <th width="20%">Price</th>
                <th width="20%">Subtotal</th>
              </tr>
            </thead>
            <tbody>
<?php  

			function getDescription($id) {
				global $db;
				$q = "SELECT *
				FROM tblsupplements
				WHERE Supplement_id = '$id' ";
				$response = mysqli_query($db, $q);
				return $rec = mysqli_fetch_array($response);
			}
		
			$Sub = 0;
			$net = .14;
			$grand = 0;
			$totals = 0;
			
			$q = "SELECT *
              FROM tblinv_items
              WHERE Inv_Num = '$uid' ";
			$response = mysqli_query($db, $q);
			
            while ($rec = mysqli_fetch_array($response)) {
				$row = getDescription($rec['Supplement_id']);
				$Sub =  $rec['Item_Quantity'] * $rec['Item_price'];
				$totals += $Sub;
                echo '<tr>';
                echo '<td>'. $suppID = $rec['Supplement_id'].'</td>';
				echo '<td>'.$row['Supplement_Description'].'</td>';
                echo '<td>'. $qty = $rec['Item_Quantity'].'</td>';
                echo '<td>'. $cost = $rec['Item_price'].'</td>';
                echo '<td>'. $Sub.'</td>';
                echo '</tr> ';
            }
			$grand = $totals + ($totals * $net);
			
?>		
            </tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <!-- h4>
                    Cash Amount: R <?php #echo number_format($cash, 2); ?>
                  </h4 -->
                  <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Subtotal</td>
                      <td class="text-right">R <?php echo number_format($totals, 2); ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Less VAT</td>
                      <td class="text-right">R <?php echo number_format($totals, 2); ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Net of VAT 14%</td>
                      <td class="text-right">R <?php echo number_format(($totals * $net), 2); ?></td>
                    </tr>
                    <!-- tr>
                      <td class="font-weight-bold">Add VAT</td>
                      <td class="text-right">R <?php #echo ($totals + $net); ?></td>
                    </tr -->
                    <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="font-weight-bold text-right text-primary">R <?php echo number_format($grand, 2); ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>

<?php
include'../includes/footer.php';
?>
