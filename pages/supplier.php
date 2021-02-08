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
<?php } 
    

  
  }
  // echo error message 

		if(isset($_SESSION['error'])) {
            ?>
            <div class="alert alert-danger"><center><?php echo implode('<br>', $_SESSION['error']); ?></center></div>
			<?php  unset($_SESSION['error']); } ?> 
           
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Supplier&nbsp;<a  href="#" data-toggle="modal" data-target="#supplierModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                       <th>Supplier ID</th>
                       <th>Contact Person</th>
                       <th>Supplier Tel</th>
                       <th>Supplier Email</th>
					   
					    <th>Bank</th>
						<th>Bank code</th>
						<th>Supplier BankNum</th>
						<th>Type Bank Account</th>
                       <th>Option</th>
                   </tr>
               </thead>
          <tbody>
<?php                  
         
		 $query = "select * from tblsupplier ";
         $result = mysqli_query($db, $query);
         while ($row = mysqli_fetch_array($result)){
      $id = $row['Supplier_ID'];
      $username = $row['Contact_Person'];
      $fullname = $row['Supplier_Tel'];
      $email = $row['Supplier_Email'];
      $meal = $row['Bank'];
	   $Bank_code = $row['Bank_code'];
      $Supplier_BankNum = $row['Supplier_BankNum'];
      $Supplier_Type_Bank_Account = $row['Supplier_Type_Bank_Account'];
	  
?>
 <tr align="center">
  <td><?php echo $id; ?></td>
  <td><?php echo $username; ?></td>
  <td><?php echo $fullname; ?></td>
  <td><?php echo $email; ?></td>
  <td><?php echo $meal; ?></td>
  <td><?php echo $Bank_code; ?></td>
  <td><?php echo $Supplier_BankNum; ?></td>
  <td><?php echo $Supplier_Type_Bank_Account; ?></td>
 
  
<td align="right"> <div class="btn-group">
 <a type="button" class="btn btn-primary bg-gradient-primary" href="sup_searchfrm.php?id=<?php echo $id; ?>"> Read 
<a type="button" class="btn btn-primary bg-gradient-primary"  href="sup_edit.php?id=<?php echo $id; ?>"> Edit</a> </td>
 
   <div class="btn-group">
    
                              <ul class="dropdown-menu text-center" role="menu">
                                <li>
 </tr>
 </tr>
 </tr>
<?php } ?>
 </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

		
  <!-- Customer Modal-->
  <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="sup_transac.php?action=add">
              
              <div class="form-group">
                <input class="form-control" placeholder="Supplier ID" name="supplierID" required>
              </div>
			  
              <div class="form-group">
                <input class="form-control" id="province" placeholder="Contact Person" name="person" required>
              </div>
              <div class="form-group">
               <input class="form-control" id="Supplier_Tel" placeholder="Supplier Tel" name="SupplierTel" >
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Supplier Email" name="SupplierEmail" >
              </div>
			  
			  <div class="form-group">
                <input class="form-control" placeholder="Bank" name="Bank" >
              </div>
			  <div class="form-group">
                <input class="form-control" placeholder="Bank code" name="Bankcode" >
              </div>
			  <div class="form-group">
                <input class="form-control" placeholder="Supplier Bank Num" name="SupplierBankNum" >
              </div>
			  <div class="form-group">
                <input class="form-control" placeholder="Supplier Type Bank Account" name="TypeBank" >
              </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>
<?php
include'../includes/footer.php';
?>