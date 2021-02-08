<?Php
				include'../includes/connection.php';

			
			?>		
			
			 <div class="card-body">
        <h3>CLIENT QUERY REPORT</h3>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
<?php
$query = "SELECT Client_ID AS Client, C_Tel_H AS Home, C_Tel_W AS Work, C_Tel_Cell AS Cellphone, C_Email AS Email FROM tblclientinfo 
WHERE (C_Tel_Cell='') AND (C_Email='')";


echo ' <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">    
       <thead>
      <tr> 
          <td> <font face="Arial">Client</font> </td> 
          <td> <font face="Arial">Home</font> </td> 
          <td> <font face="Arial">Work</font> </td> 
          <td> <font face="Arial">Cellphone</font> </td> 
          <td> <font face="Arial">Email</font> </td> 
      </tr>';

if ($result = $db->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Client"];
        $field2name = $row["Home"];
        $field3name = $row["Work"];
        $field4name = $row["Cellphone"];
        $field5name = $row["Email"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
</tbody>
                </table>
              </div>
            </div>
         