<?php
include'../includes/connection.php';
session_start();

 // Get invoice number
	$stmt = $stmt = $db->query("SELECT SUBSTR(Inv_Num, 4) AS lastInvoice FROM tblinv_info ORDER BY Inv_Num DESC");
	$row = $stmt->fetch_row();
	
  $lastInvoiceNum = ++$row[0];
  $lastInvoiceNum = 'INV'.$lastInvoiceNum;
  $invoiceDate = $_POST['date'];
  $customerID = $_POST['Client'];


// Variables
  $Inv_Paid = 'Y';
  $emp = $_POST['employee'];
  $rol = $_POST['role'];
  $pay_date = date("Y-m-d", strtotime('+7day')); 
  $countID = count($_POST['id']);

  //get html form submitted value
  if(isset($_REQUEST['action']) && $_REQUEST['action'] == "add") {
    //call the function to insert data into tblinv_info
    $infoResults = insertInvoiceInfo($lastInvoiceNum, $customerID, $invoiceDate, $Inv_Paid, $pay_date);
    if($infoResults) {
      //iterate through array of data
      for ($i=0; $i < $countID; $i++) { 
        $id =  $_POST['id'][$i];
        $price =  $_POST['price'][$i];
        $quantity =  $_POST['quantity'][$i];
        $results = insertItems($lastInvoiceNum, $id, $price, $quantity); //call function to insert data into tblinv_items
      }
      echo ($results==true) ? 'Success': 'Failed'; //IF Condition checks if the function returned true/false;
    }
  }

//function to insert data into tblinv_info
function insertInvoiceInfo($lastInvoiceNum, $customerID, $invoiceDate, $Inv_Paid, $pay_date) {
  global $db;
  $query111 = "INSERT INTO `tblinv_info`(`Inv_Num`, `Client_ID`, `Inv_Date`, `Inv_Paid`, `Inv_Paid_date`)
            VALUES ('{$lastInvoiceNum}','{$customerID}','{$invoiceDate}','{$Inv_Paid}','{$pay_date}')";
  return mysqli_query($db,$query111)or die (mysqli_error($db));
}
//function to insert data into tbinv_items
function insertItems($lastInvoiceNum, $id, $price, $quantity) {
  global $db;
  $query = "INSERT INTO `tblinv_items`(`Inv_Num`, `Supplement_id`, `Item_price`, `Item_Quantity`) 
          VALUES ('{$lastInvoiceNum}', '{$id}', '{$price}', '{$quantity}' )";
   mysqli_query($db,$query)or die (mysqli_error($db));
   return editStockQuantity($id, $quantity);
}
//function updates tblsupplement current stock levels value
function editStockQuantity($supplementID, $quantity) {
  global $db;
  $query = "UPDATE `tblsupplements` 
          SET Current_stock_levels = Current_stock_levels - '{$quantity}' 
          WHERE Supplement_id = '{$supplementID}'";
  return mysqli_query($db, $query) or die(mysqli_error($db));
}
//reset our shopping cart
unset($_SESSION['pointofsale']);

//then finally redirect to another page.
?>
  <script type="text/javascript">
    alert("Product Successfully added.");
    window.location = "pos.php";
  </script>
</div>



