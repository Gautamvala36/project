<?php
session_start();
require_once("include/connection.php");
require_once("include/css.php");
?>
</head>

<body class="app sidebar-mini">
     <?php
     require_once("include/seller_navbar.php");
     ?>
     <!--app-content open-->
     <div class="app-content">
          <div class="side-app">
               <!-- PAGE-HEADER -->
               <div class="table ">
                    <div class="col-lg-12 col-md-12 mt-5">
                         <div class="card">
                              <div class="card-header">
                                   <h3 class="card-title">Bill Details</h3>
                              </div>
                              <div class="card-body pb-2">
                                   <?php
                                   try {
                                        $sql = "SELECT * FROM bill WHERE id = ?";
                                        $statement = $db->prepare($sql);
                                        $statement->bindparam(1, $_REQUEST['id']);
                                        $statement->setFetchMode(PDO::FETCH_ASSOC);
                                        $statement->execute();
                                        $table = $statement->fetch();
                                        // var_dump($table);
                                   } catch (PDOException $error) {
                                        LogError($error);
                                   }
                                   ?>
                                   <table class="table table-bordered ">
                                        <tr>
                                             <th>
                                                  Full Name
                                             </th>
                                             <td colspan="2">
                                                  <?php echo $table['fullname'] ?>
                                             </td>
                                             <th>
                                                  Bill Date
                                             </th>
                                             <td colspan="2">
                                                  <?php echo date("d-m-Y", strtotime($table['billdate'])) ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <th width='20%'>
                                                  Address 1
                                             </th>
                                             <td colspan="2">
                                                  <?php echo $table['address1'] ?>
                                             </td>
                                             <th width='20%'>
                                                  Address 2
                                             </th>
                                             <td colspan="2">
                                                  <?php echo $table['address2'] ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <th>
                                                  Mobile
                                             </th>
                                             <td>
                                                  <?php echo $table['mobile'] ?>

                                             </td>
                                             <th>
                                                  City
                                             </th>
                                             <td>
                                                  <?php echo $table['city'] ?>
                                             </td>
                                             <th>
                                                  pincode
                                             </th>
                                             <td>
                                                  <?php echo $table['pincode'] ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <th>
                                                  paymentmode
                                             </th>
                                             <td>
                                                  <?php
                                                  if ($table['paymentmode'] == 1) {
                                                       echo "Cash On Delivery";
                                                  } else {
                                                       echo "Online Transfer";
                                                  }
                                                  ?>

                                             </td>
                                             <th>
                                                  paymentstatus
                                             </th>
                                             <td>
                                                  <?php
                                                  if ($table['paymentstatus'] == 1) {
                                                       echo "PAID";
                                                  } else {
                                                       echo "UNPAID";
                                                  }
                                                  ?>
                                             </td>
                                             <th>
                                                  orderstatus
                                             </th>
                                             <td>
                                                  <?php
                                                  if ($table['orderstatus'] == 1) {
                                                       echo "CONFIRMED";
                                                  } else if ($table['orderstatus'] == 2) {
                                                       echo "DISPATCHED";
                                                  } else if ($table['orderstatus'] == 3) {
                                                       echo "DELIVERED";
                                                  } else if ($table['orderstatus'] == 4) {
                                                       echo "CANCEL";
                                                  } else {
                                                       echo "RETURN";
                                                  }
                                                  ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <th>
                                                  amount
                                             </th>
                                             <td colspan="2">
                                                  <?php echo $table['amount'] ?>

                                             </td>
                                             <th>
                                                  remarks
                                             </th>
                                             <td colspan="2">
                                                  <?php echo $table['remarks'] ?>

                                             </td>

                                        </tr>
                                   </table>
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