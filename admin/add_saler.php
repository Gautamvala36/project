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
							<h3 class="card-title">Add Saler </h3>
						</div>
						<div class="card-body">
							<?php
							require_once("include/message.php");
							?>
							<div class="table-responsive">
								<table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
									<thead>
										<tr>
											<th class="wd-15p border-bottom-0">Full Name</th>
											<th class="wd-15p border-bottom-0">Title</th>
											<th class="wd-20p border-bottom-0">Email</th>
											<th class="wd-15p border-bottom-0">City</th>
											<th class="wd-10p border-bottom-0">Mobile</th>
											<th class="wd-10p border-bottom-0">Operations</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "SELECT * FROM salesman Where isdeleted = 2";
										$statement = $db->prepare($sql);
										$statement->setFetchMode(PDO::FETCH_ASSOC);
										$statement->execute();
										$table = $statement->fetchAll();
										// var_dump($table);
										foreach ($table as $value) {
											?>
											<tr>
												<td>
													<?php echo $value['fullname'] ?>
												</td>
												<td>
													<?php echo $value['title'] ?>
												</td>
												<td>
													<?php echo $value['email'] ?>
												</td>
												<td>
													<?php echo $value['city'] ?>
												</td>
												<td>
													<?php echo $value['mobile'] ?>
												</td>
												<td>
													<a href="accept_salesman.php?id=<?php echo $value['id']; ?>"
														class="btn btn-success">Accept</a>
													<a href="reject_salesman.php?id=<?php echo $value['id']; ?>"
														class='btn btn-danger'>Reject</a>
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