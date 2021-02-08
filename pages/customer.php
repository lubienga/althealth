<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
                                
}   
			if(isset($_SESSION['error'])) {
            ?>
            <div class="alert alert-danger"><center><?php echo implode('<br>', $_SESSION['error']); ?></center></div>
			<?php  unset($_SESSION['error']); } ?>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Client&nbsp;<a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Client ID</th>
                        <th>Client name</th>
                        <th>Client surname</th>
						<th>Address</th>
						<th>Code</th>
						<th>C Tel_H</th>
						<th>C Tel_W</th>
						<th>Client Tel Cell</th>
						<th>C Email</th>
						<th>Reference</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = 'SELECT * FROM tblclientinfo';
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {
						  
                      echo '<tr>';
                      echo '<td>'. $row['Client_ID'].'</td>';
                      echo '<td>'. $row['C_name'].'</td>';
                      echo '<td>'. $row['C_surname'].'</td>';
					  echo '<td>'. $row['Address'].'</td>';
					  echo '<td>'. $row['Code'].'</td>';
					  echo '<td>'. $row['C_Tel_H'].'</td>';
					  echo '<td>'. $row['C_Tel_W'].'</td>';
					  echo '<td>'. $row['C_Tel_Cell'].'</td>';
					  echo '<td>'. $row['C_Email'].'</td>';
					  echo '<td>'. $row['Reference_ID'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cust_searchfrm.php?action=edit & id='.$row['Client_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="cust_edit.php?action=edit & id='.$row['Client_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                      echo '</tr> ';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<?php
include'../includes/footer.php';
?>