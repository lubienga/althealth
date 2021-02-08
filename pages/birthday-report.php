<?Php
				include'../includes/connection.php';

			
			?>		
			
			 <div class="card-body">
        <h3>CURRENT CLIENT BITHDAY REPORT</h3>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
<?php
$query = ("SELECT Client_id, CONCAT(C_name,' ',C_surname) 'CLIENT'
                        FROM tblclientinfo
                        WHERE
                        SUBSTRING(Client_ID,3,2) = EXTRACT(MONTH FROM CURRENT_DATE)
                        AND
                        SUBSTRING(Client_ID,5,2) = EXTRACT(DAY FROM CURRENT_DATE)");


echo ' <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">    
       <thead>
      <tr> 
          <td> <font face="Arial">Client ID</font> </td> 
          <td> <font face="Arial">Client</font> </td> 
          
          
      </tr>';

if ($result = $db->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Client_id"];
        $field2name = $row["CLIENT"];
        
       /* $field5name = $row["Email"]; 
*/
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                 
                
              </tr>';
    }
    $result->free();
} 
?>
</tbody>
                </table>
              </div>
            </div>
         