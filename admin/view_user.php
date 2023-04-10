<?php
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
                                   <h3 class="card-title">View Saler </h3>
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap border-bottom"
                                             id="basic-datatable">
                                             <thead>
                                                  <tr>
                                                       <th class="wd-15p border-bottom-0">SR NO</th>
                                                       <th class="wd-15p border-bottom-0">Email</th>
                                                       <th class="wd-15p border-bottom-0">Mobile number</th>
                                                       <th class="wd-20p border-bottom-0">Registration Date</th>

                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                  $sql = "SELECT * FROM users";
                                                  $statement = $db->prepare($sql);
                                                  $statement->setFetchMode(PDO::FETCH_ASSOC);
                                                  $statement->execute();
                                                  $table = $statement->fetchAll();
                                                  // var_dump($table);
                                                  $count = 1;
                                                  foreach ($table as $row) {
                                                       ?>
                                                       <tr>
                                                            <td><?php echo $count++; ?></td>
                                                            <td><?php echo $row['email']; ?></td>
                                                            <td><?php echo $row['mobile']; ?></td>
                                                            <td><?php echo $row['register_at']; ?> Developer</td>

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