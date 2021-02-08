<?Php
				include'../includes/connection.php';

			
			?>		
			
			 <div class="card-body">
        <h3>MINIMUM STOCK LEVEL REPORT</h3>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
<?php
$query =("SELECT
                S.Supplement_id 'SUPPLEMENT',
                CONCAT(S.Supplier_ID,' ',C.Contact_Person,' ',C.Supplier_Tel) 'SUPPLIER INFO',
                S.Min_levels 'MIN LEVELS',
                S.Current_stock_levels 'CURRENT STOCK'
                FROM `tblsupplements` S, tblsupplier C
                WHERE Current_stock_levels < Min_levels
                AND S.Supplier_ID = C.Supplier_ID
                ORDER BY S.Supplier_ID;");


echo ' <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">    
       <thead>
      <tr> 
          <td> <font face="Arial">Supplement</font> </td> 
          <td> <font face="Arial">Supplier</font> </td> 
          <td> <font face="Arial">MIN LEVELS</font> </td> 
          <td> <font face="Arial">CURRENT STOCK</font> </td> 
         
      </tr>';

if ($result = $db->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["SUPPLEMENT"];
        $field2name = $row["SUPPLIER INFO"];
        $field3name = $row["MIN LEVELS"];
        $field4name = $row["CURRENT STOCK"];
       

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                 
              </tr>';
    }
    $result->free();
} 
?>
</tbody>
                </table>
              </div>
            </div>
         