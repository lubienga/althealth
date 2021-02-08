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
            ?>
          <div class="row show-grid">
            <!-- Customer ROW -->
            <div class="col-md-3">
            <!-- Customer record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Client</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM tblclientinfo";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>

			
			 
			
			
            <!-- Supplier record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Supplier</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM tblsupplier";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
<?php include('top_10_report.php');?>

<?php include('purchase_report.php');?>



          </div>
            <!-- unpaid ROW -->
          <div class="col-md-3">
            <!-- Employee record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Unpaid Invoice</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
						// connect db
                         include'../includes/connection.php';
						 // unpaid invoices report
						 if($query = $db->query("SELECT I.Client_ID 'CLIENT ID',CONCAT(C.C_name,' ', C.C_surname) 'CLIENT',


													I.Inv_Num 'INVOICE NUMBER',
													I.Inv_Date 'INVOICE DATE'
													FROM
													tblinv_info I , tblclientinfo C
													WHERE
													I.Inv_Date<'2020-01-02' AND I.Inv_Paid<>'Y'
													AND
													I.Client_ID = C.Client_ID
													ORDER BY I.Inv_Date ASC")){

									echo $query->num_rows." Record(s) "."<br>";
						}
						
                        ?> 
                      </div>
                    </div>
					

                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- birthday -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Client Birthday</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
						// connect db
                         include'../includes/connection.php';
						 // current birthday report
						 if($query = $db->query("SELECT Client_id, CONCAT(C_name,' ',C_surname) 'CLIENT'
												FROM tblclientinfo
												WHERE
												SUBSTRING(Client_ID,3,2) = EXTRACT(MONTH FROM CURRENT_DATE)
												AND
												SUBSTRING(Client_ID,5,2) = EXTRACT(DAY FROM CURRENT_DATE)")){

									echo $query->num_rows." Record(s) "."<br>";
						}
						
                        ?> 
                      </div>
                    </div>
					
					
					
					
					
					
					
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

			
			
			
			
          </div>
		  
		  
		  
          <!-- PRODUCTS ROW -->
          <div class="col-md-3">
            <!-- Product record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Supplement</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                          $query = "SELECT COUNT(*) FROM tblsupplements";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                              echo "$row[0]";
                            }
                          ?> Record(s)
                          </div>
                        </div>
                      </div>
					  
					  
                    </div>

					
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>

			
			
			<div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Minimum stock levels</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                       // connect db
                         include'../includes/connection.php';
						 // Minimum stock levels report
						 if($query = $db->query("SELECT
								S.Supplement_id 'SUPPLEMENT',
								CONCAT(S.Supplier_ID,' ',C.Contact_Person,' ',C.Supplier_Tel) 'SUPPLIER INFO',
								S.Min_levels 'MIN LEVELS',
								S.Current_stock_levels 'CURRENT STOCK'
								FROM `tblsupplements` S, tblsupplier C
								WHERE Current_stock_levels < Min_levels
								AND S.Supplier_ID = C.Supplier_ID
								ORDER BY S.Supplier_ID;")){

								echo $query->num_rows." Record(s) "."<br>";
						}
                        ?> 
                      </div>
                    </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
			  
			  
            </div>
			
			

            </div>
			
			
			
            
          <!-- RECENT PRODUCTS -->
                <div class="col-lg-3">
                    <div class="card shadow h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">

                          <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> 
                          </div>

                        <div class="panel-heading"> Recent Products
                        </div>
                        <div class="row no-gutters align-items-center mt-1">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-0 text-gray-800">
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="list-group">
                              <?php 
                                $query = "SELECT Supplement_Description, Supplement_id FROM tblsupplements order by Supplement_id DESC LIMIT 10";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {

                                    echo "<a href='#' class='list-group-item text-gray-800'>
                                          <i class='fa fa-tasks fa-fw'></i> $row[0]
                                          </a>";
                                  }
                              ?>
                            </div>
                            <!-- /.list-group -->
                            <a href="product.php" class="btn btn-default btn-block">View All Products</a>
                        </div>
						
						
						
						
                        <!-- /.panel-body -->
                    </div></div></div></div></div></div>
          <!-- 
          <div class="col-md-3">
           <div class="col-md-12 mb-2">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><i class="fas fa-list text-danger">&nbsp;&nbsp;&nbsp;</i>Recent Products</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $query = "SELECT Supplement_Description FROM tblsupplements order by Supplement_id DESC LIMIT 10";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                              echo "<ul style='list-style-position: outside'>";
                              echo "<li>$row[0]</li>";
                              echo "</ul>";
                            }
                          ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div> -->
            

          </div>

<?php
include'../includes/footer.php';
?>