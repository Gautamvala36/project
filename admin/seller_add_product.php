<?php
session_start();
$_SESSION['seller_id'] = 1;
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
                                   <h3 class="card-title">Add New Product</h3>
                              </div>
                              <div class="card-body">
                                   <div class="card-pay">
                                        <div class="tab-content">
                                             <form action="" method="post">
                                                  <div class="row">
                                                       <div class="col-6">
                                                            <div class="form-group">
                                                                 <label class="form-label">Enter title</label>
                                                                 <input type="text" id="title" name="title"
                                                                      class="form-control"
                                                                      placeholder="Enter title for category">
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="form-group">
                                                                 <label class="form-label">Enter Photo</label>
                                                                 <div class="input-group">
                                                                      <input type="file" name="image" id="image"
                                                                           class="form-control">
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-4">
                                                                 <?php
                                                                 try {

                                                                      $sql = "SELECT title , id FROM category WHERE saleseman_id = ? and isdeleted = 0";
                                                                      $statement = $db->prepare($sql);
                                                                      $statement->bindparam(1, $_SESSION['seller_id']);
                                                                      $statement->setFetchMode(PDO::FETCH_ASSOC);
                                                                      $statement->execute();
                                                                      $table = $statement->fetchAll();
                                                                      // var_dump($table);
                                                                 } catch (PDOException $error) {
                                                                      LogError($error);
                                                                 }
                                                                 ?>
                                                            <label for="" class="form-label">Select Category</label>
                                                            <select name="category" class="form-select">
                                                                 <?php
                                                                      foreach($table as $row)
                                                                      {
                                                                           ?>
                                                                                <option value="<?php echo $row['id']?>"><?php echo $row['title']?></option>
                                                                           <?php
                                                                      }
                                                                 ?>
                                                            </select>
                                                       </div>
                                                       <div class="col-4">
                                                            <div class="form-group">
                                                                 <label class="form-label">Enter Stock</label>
                                                                 <div class="input-group">
                                                                      <input type="number" name="stock" id="stock"
                                                                           class="form-control"
                                                                           placeholder="Enter quantity of stock">
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-4">
                                                            <div class="form-group">
                                                                 <label class="form-label">Enter Price</label>
                                                                 <div class="input-group">
                                                                      <input type="number" name="price" id="price"
                                                                           class="form-control"
                                                                           placeholder="Enter price">
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="form-group">
                                                                 <label class="form-label">Enter Weight</label>
                                                                 <div class="input-group">
                                                                      <input type="number" name="weight" id="weight"
                                                                           class="form-control"
                                                                           placeholder="Enter Weight">
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="row">
                                                                 <div class="col-sm-8 mt-3">
                                                                      <label class="form-label">Select Status</label>
                                                                      <div class="form-check form-check-inline">
                                                                           <input class="form-check-input" type="radio"
                                                                                name="status" value="0"
                                                                                id="inlineRadioDefault">
                                                                           <label class="form-check-label"
                                                                                for="inlineRadioDefault">Live</label>
                                                                      </div>
                                                                      <div class="form-check form-check-inline">
                                                                           <input class="form-check-input" type="radio"
                                                                                name="status" value="1"
                                                                                id="inlineRadioChecked" checked="">
                                                                           <label class="form-check-label"
                                                                                for="inlineRadioChecked">Not
                                                                                Live</label>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-12">
                                                            <label for="" class="form-labe">
                                                                 Enter product details
                                                            </label>
                                                            <textarea name="details" class="form-control" id="details"
                                                                 cols="2" rows="2"></textarea>
                                                       </div>
                                                  </div>
                                                  <!-- <div class="tab-pane active show" id="tab20"> -->
                                                  <div class="text-end mt-2">
                                                       <button type="submit" id="submit"
                                                            class="btn  btn-lg btn-primary">Save
                                                            Confirm</button>
                                                       <button type="reset" class="btn  btn-lg btn-danger">Clear
                                                            All</button>
                                                  </div>
                                                  <!-- </div> -->
                                             </form>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
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
                                                       <th class="wd-15p border-bottom-0">Title</th>
                                                       <th class="wd-20p border-bottom-0">Image</th>
                                                       <th class="wd-20p border-bottom-0">Select Category</th>
                                                       <th class="wd-20p border-bottom-0">Enter Stock</th>
                                                       <th class="wd-20p border-bottom-0">Enter Pricek</th>
                                                       <th class="wd-20p border-bottom-0">Enter Weight</th>
                                                       <th class="wd-20p border-bottom-0">Select Status</th>
                                                       <th class="wd-20p border-bottom-0">Enter product details </th>
                                                       <th class="wd-20p border-bottom-0">Operation</th>
                                                  </tr>
                                             </thead>
                                             <tbody id="mytable">
                                                  <tr>
                                                       <td>1</td>
                                                       <td>hello</td>
                                                       <td><img src="https://picsum.photos/50/50" alt=""></td>
                                                       <td>category 1</td>
                                                       <td>100</td>
                                                       <td>5000</td>
                                                       <td>5.5</td>
                                                       <td>Live</td>
                                                       <td>hello 1</td>
                                                       <td> <i class="fa fa-pencil-square" data-bs-toggle="tooltip"
                                                                 title="" data-bs-original-title="fa fa-pencil-square"
                                                                 aria-label="fa fa-pencil-square"></i></td>
                                                  </tr>
                                                  <!-- <tr style="display:none;">
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td class="d-flex">

                                                            <h2 class="mx-3">
                                                                 <a href="">
                                                                      <i class="fa fa-pencil-square"
                                                                           data-bs-toggle="tooltip" title=""
                                                                           data-bs-original-title="fa fa-pencil-square"
                                                                           aria-label="fa fa-pencil-square"></i>
                                                                 </a>
                                                            </h2>
                                                            <h2>
                                                                 <a href="">
                                                                      <i class="fa fa-trash" data-bs-toggle="tooltip"
                                                                           title="" data-bs-original-title="fa fa-trash"
                                                                           aria-label="fa fa-trash"></i>
                                                                 </a>
                                                            </h2>
                                                       </td>
                                                  </tr> -->
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <script>
          $(document).ready(function () {
               console.log("jquery Working..");
               // var page = "ajax/get_seller_.php";
               // var count = 1;
               // var tr = ``;
               // var edit_id;
          });
     </script>
     <?php
     require_once("include/script.php");
     ?>