<?php
session_start();
require_once("include/connection.php");
require_once("include/css.php");
?>
</head>

<body class="app sidebar-mini">i
     <?php
     require_once("include/seller_navbar.php");
     ?>
     <!--app-content open-->
     <div class="app-content">
          <div class="side-app">
               <!-- PAGE-HEADER -->
               <div class="row">
                    <div class="col-lg-12 col-md-12">
                         <div class="card">
                              <div class="card-header">
                                   <h3 class="card-title">View bill</h3>
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap border-bottom"
                                             id="basic-datatable">
                                             <thead>
                                                  <tr>
                                                       <th class="wd-15p border-bottom-0">Sr No</th>
                                                       <th class="wd-15p border-bottom-0">User name</th>
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
                                                  $sql = "SELECT * FROM bill";
                                                  $statement = $db->prepare($sql);
                                                  $statement->setFetchMode(PDO::FETCH_ASSOC);
                                                  $statement->execute();
                                                  $table = $statement->fetchAll();
                                                  // var_dump($table);
                                                  $count = 1;
                                                  foreach ($table as $row) {
                                                       ?>
                                                       <tr>
                                                            <td>
                                                                 <?php echo $count++ ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row['fullname'] ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo date("d-m-Y", strtotime($row['billdate'])) ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row['mobile'] ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row['city'] ?>
                                                            </td>
                                                            <td>
                                                                 <?php
                                                                 if ($row['paymentmode'] == 1) {
                                                                      echo "Cash On Delivery";
                                                                 } else {
                                                                      echo "Online Transfer";
                                                                 }
                                                                 ?>
                                                            </td>
                                                            <td>
                                                                 <?php
                                                                 if ($row['paymentstatus'] == 1) {
                                                                      echo "PAID";
                                                                 } else {
                                                                      echo "UNPAID";
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
                                                                      echo "CANCEL";
                                                                 } else {
                                                                      echo "RETURN";
                                                                 }
                                                                 ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row['amount'] ?>
                                                            </td>
                                                            <td align="center">
                                                                 <h3>
                                                                      <a href="seller_view_full_bill.php?id=<?php echo $row['id']; ?>">
                                                                           <i class="fa fa-eye" data-bs-toggle="tooltip"
                                                                                title="" data-bs-original-title="View More"
                                                                                aria-label="fa fa-eye">
                                                                           </i>
                                                                      </a>
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