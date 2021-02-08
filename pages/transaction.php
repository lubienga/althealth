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
              <h4 class="m-2 font-weight-bold text-primary">Transaction</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
				    <th width="19%">Invoice #</th>
                     <th width="19%">Client ID #</th>
                     <th>Client Full names</th>
                     <th width="13%">Invide date</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php 

 $query = "select *,C_name, C_surname, Inv_Num
              FROM tblclientinfo   T
              JOIN tblinv_info C ON T.`Client_ID`=C.`Client_ID`
              ORDER BY Inv_Num ASC ";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)){
		
      $id = $row['Inv_Num'];
      $Inv_Num = $row['Client_ID'];
     // $description = $row['Supplement_Description'];
      $fullname = $row['C_name'].' '. $row['C_surname'];
      //$meal = $row['Cost_incl'];
	  $Inv_Date = $row['Inv_Date'];
     // $Current_stock_levels = $row['Current_stock_levels'];


?> 
<tr align="center">
  <td><?php echo $id; ?></td>
  <td><?php echo $Inv_Num; ?></td>
  <td><?php echo $fullname; ?></td>
  <td><?php echo $Inv_Date; ?></td>
<td align="right">
<a type="button" class="btn btn-primary bg-gradient-primary"  href="trans_view.php?id=<?php echo $id; ?>"><i class="fas fa-fw fa-th-list"></i> View</a>


          </div> </td>
                </tr>
	<?php
	}
	
	?>       

    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>




     <!--            
    $query = 'SELECT *, C_name, C_surname, Inv_Num
              FROM tblinv_info T
              JOIN tblclientinfo C ON T.`Client_ID`=C.`Client_ID`
              ORDER BY Inv_Num ASC';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
				echo '<td>'. $row['Inv_Num'].'</td>';
                echo '<td>'. $row['Client_ID'].'</td>';
                echo '<td>'. $row['C_name'].' '. $row['C_surname'].'</td>';
				
                echo '<td>'. $row['Inv_Date'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['Client_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                          </div> </td>';
                echo '</tr> ';
                        }

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
-->
<?php
include'../includes/footer.php';
?>
