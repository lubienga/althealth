<?Php
include'../includes/connection.php';
?>
<h3>PURCHASE REPORT</h3>
<?php
if($stmt = $db->query("SELECT
count(extract(month from Inv_Date)) 'NUM OF PURCHASES',
monthname(Inv_Date) 'MONTH'
FROM tblinv_info
GROUP BY MONTH
ORDER BY extract(month from Inv_Date)")){

  echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); 
  echo "<table border= '1'>
<tr> <th>NUM OF PURCHASES</th><th>MONTH</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>$row[0]</td><td>$row[1]</td>";
   $php_data_array[] = $row; 
   }
echo "</table>";
}
?>