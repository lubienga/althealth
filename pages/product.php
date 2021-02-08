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
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product&nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Supplement ID</th>
                     <th>Supplier_ID</th>
                     <th>Supplement Description</th>
                     <th>Cost_excl</th>
					 <th>Cost_incl</th>
					 <th>Min levels</th>
					 <th>Current stock levels</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php  

  $query = "select * from tblsupplements ";
  $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)){
      $id = $row['Supplement_id'];
      $username = $row['Supplier_ID'];
      $fullname = $row['Supplement_Description'];
      $email = $row['Cost_excl'];
      $meal = $row['Cost_incl'];
	  $Min_levels = $row['Min_levels'];
      $Current_stock_levels = $row['Current_stock_levels'];
?>
 <tr align="center">
  <td><?php echo $id; ?></td>
  <td><?php echo $username; ?></td>
  <td><?php echo $fullname; ?></td>
  <td><?php echo $email; ?></td>
  <td><?php echo $meal; ?></td>
  <td><?php echo $Min_levels; ?></td>
  <td><?php echo $Current_stock_levels; ?></td>
  <td align="right"> <div class="btn-group">
 <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?id=<?php echo $id; ?>"> Read 
<a type="button" class="btn btn-primary bg-gradient-primary"  href="pro_edit.php?id=<?php echo $id; ?>"> Edit</a> </td>
 
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

    
<?php
include'../includes/footer.php';
?>

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="pro_transac.php?action=add">
           <div class="form-group">
             <input class="form-control" placeholder="Supplemet ID" name="prodcode" required>
			 
           </div>
		   <!-- Supplier ID from supplier table -->
		     <div class="form-group">
			 
			 <!--<form>-->
			  <label for="supplierID" class="form-control-label">Supplier ID</label>
           <select name="supplierID" id="supplierID" class="form-control">
			<?php
			$result = mysqli_query($db, "SELECT * FROM tblsupplier");
			while($row = mysqli_fetch_array($result)) {
			echo("<option value='".$row['Supplier_ID']."'> ".$row['Supplier_ID']."</option>");
			}
			?>	 
		<label for="dropdown">Select</label>
          </select>	
         <!--</form>-->		  
			   
           </div>
		   
		    <div class="form-group">
             <textarea rows="5" cols="50" texarea" class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
		   
         
           <div class="form-group">
             <input type="text"  id="exclud" class="form-control" placeholder="Cost excluded" name="exclud"onkeyup="sum();" required>
           </div>
           <div class="form-group">
             <input type="text"  id="vat" class="form-control" placeholder="Vat" name="vat"onkeyup="sum();" required>
           </div>
           <div class="form-group">
             <input type="text" id="incl" class="form-control" placeholder="Cost incl" name="incl"  readonly>
           </div>
		   
            <div class="form-group">
             <input type="text"   class="form-control" placeholder="Min levels" name="Min_levels" >
           </div>
		     <div class="form-group">
             <input class="form-control" placeholder="Current stock levels" name="Current_stock" >
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
  <script>
function sum() {
           var txtFirstNumberValue = document.getElementById('exclud').value;
           var txtSecondNumberValue = document.getElementById('vat').value;
           var result = parseFloat( Math.round(txtFirstNumberValue) * parseFloat(txtSecondNumberValue)).toFixed(2);
           if (!isNaN(result)) {
               document.getElementById('incl').value = result;
           }
       }
</script>