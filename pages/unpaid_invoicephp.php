<?Php
				include'../includes/connection.php';

			
			?>		
			
			 <div class="card-body">
        <h3>UNPAID INVOICES REPORT</h3>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
<?php
$query = ("SELECT I.Client_ID 'CLIENT ID',CONCAT(C.C_name,' ', C.C_surname) 'CLIENT',


                          I.Inv_Num 'INVOICE NUMBER',
                          I.Inv_Date 'INVOICE DATE'
                          FROM
                          tblinv_info I , tblclientinfo C
                          WHERE
                          I.Inv_Date<'2020-01-02' AND I.Inv_Paid<>'Y'
                          AND
                          I.Client_ID = C.Client_ID
                          ORDER BY I.Inv_Date ASC");


echo ' <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">    
       <thead>
      <tr> 
          <td> <font face="Arial">ClientID</font> </td> 
          <td> <font face="Arial">Client</font> </td> 
          <td> <font face="Arial">Invoice Number</font> </td> 
          <td> <font face="Arial">Invoice Date</font> </td> 
          
      </tr>';

if ($result = $db->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["CLIENT ID"];
        $field2name = $row["CLIENT"];
        $field3name = $row["INVOICE NUMBER"];
        $field4name = $row["INVOICE DATE"];
       /* $field5name = $row["Email"]; 
*/
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
        
