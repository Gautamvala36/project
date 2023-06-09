<?php
require_once("include/check_admin_login.php");
require_once("include/connection.php");
require_once("include/css.php");
?>
</head>

<body class="app sidebar-mini">i
     <?php
     require_once("include/navbar.php");
     ?>
     <!--app-content open-->
     <div class="app-content">
          <div class="side-app ">
               <!-- PAGE-HEADER -->
               <div class="row mt-4">
                    <div class="col-lg-12 col-md-12">
                         <div class="card">
                              <div class="card-header">
                                   <h3 class="card-title">View Bills </h3>
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap border-bottom"
                                             id="basic-datatable">
                                             <thead>
                                                  <tr>
                                                       <th class="wd-15p border-bottom-0">SR NO</th>
                                                       <th class="wd-15p border-bottom-0">User_Email</th>
                                                       <th class="wd-15p border-bottom-0">Bill date</th>
                                                       <th class="wd-20p border-bottom-0">Mobile number</th>
                                                       <th class="wd-20p border-bottom-0">City</th>
                                                       <th class="wd-20p border-bottom-0">Pay Mode</th>
                                                       <th class="wd-20p border-bottom-0">Payment Status</th>
                                                       <th class="wd-20p border-bottom-0">Order Status</th>
                                                       <th class="wd-20p border-bottom-0">Amount</th>
                                                       <th class="wd-20p border-bottom-0">Operation</th>

                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php

                                                  $sql = "SELECT u.email as user_email, b.*  FROM users u,bill b WHERE u.id = b.usersid";
                                                  $statement = $db->prepare($sql);
                                                  $statement->setFetchMode(PDO::FETCH_ASSOC);
                                                  $statement->execute();
                                                  $table = $statement->fetchAll();
                                                  // var_dump($tabel);
                                                  $count = 1;
                                                  foreach ($table as $row) {
                                                       ?>
                                                       <tr>
                                                            <td>
                                                                 <?php echo $count++; ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row['user_email']; ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo date("d-m-Y", strtotime($row['billdate'])); ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row['mobile']; ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row['city']; ?>
                                                            </td>
                                                            <td>
                                                                 <?php
                                                                 if ($row['paymentmode'] == 1) {
                                                                      echo "COD";
                                                                 } else {
                                                                      echo "ONLINE";
                                                                 }

                                                                 ?>
                                                            </td>
                                                            <td align="center">
                                                                 <?php

                                                                 if ($row['paymentstatus'] == 1) {
                                                                      echo "<h4><span class='badge bg-success me-1 center mb-1 mt-1'>PAID</span></h4>";
                                                                 } else {
                                                                      echo "<h4><span class='badge bg-danger  me-1 center mb-1 mt-1'>UNPAID</span></h4>";
                                                                 }

                                                                 ?>
                                                            </td>
                                                            <td>
                                                                 <?php

                                                                 if ($row['orderstatus'] == 1) {
                                                                      echo "CONFIRMED";
                                                                 } else if ($row['orderstatus'] == 2) {
                                                                      echo "DISPATCHED";
                                                                 } else if ($row['orderstatus'] == 3) {
                                                                      echo "DELIVERED";
                                                                 } else if ($row['orderstatus'] == 4) {
                                                                      echo "DELIVERED";
                                                                 } else {
                                                                      echo "DELIVERED";
                                                                 }
                                                                 ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row['amount']; ?>
                                                            </td>
                                                            <td align="center">
                                                                 <h3>
                                                                      <i class="fa fa-eye" data-bs-toggle="tooltip" title=""
                                                                           data-bs-original-title="View More"
                                                                           aria-label="fa fa-eye">
                                                                      </i>
                                                                 </h3>
                                                            </td>
                                                       </tr>
                                                       <?php
                                                  }
                                                  ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     </div>
     <?php
     require_once("include/script.php");
     ?>