<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Above Multi-purpose Free Bootstrap Responsive Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="author" content="http://webthemez.com" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link href="../../css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="../../css/jcarousel.css" rel="stylesheet" />
	<link href="../../css/flexslider.css" rel="stylesheet" />
	<link href="../../css/style.css" rel="stylesheet" />

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<div id="wrapper">

		<!-- start header -->
		<?php include '../../nav.php' ?>
		<!-- end header -->
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="pageTitle">Gérer Les Cours</h2>
					</div>
				</div>
			</div>
		</section>

		<section id="content">
			<div class="container">
				<section id="service" class="service ">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="main_service_area">
									<div class="head_title center m-y-3 wow fadeInUp">
										<div class="d-flex justify-content-end">

											<button type="button" class="btn custom-bg " style="border-radius: 10px;">
												<span class="text-muted" data-bs-toggle="modal"
													data-bs-target="#addCoursModal"><strong>Ajouter cours
													</strong></span>
											</button>
										</div>
									</div>
									<div class="row list-group-horizontal mt-3">
										<?php
										include('../../connect.php');
										$sqlSelect = "SELECT * FROM cours";
										$result = mysqli_query($conn, $sqlSelect);
										foreach ($result as $data) {
											?>

											<div class="col-md-4 mt-2">
												<div class="jumbotron single_service  wow fadeInLeft">
													<div class="s_service_text text-sm-center text-xs-center fs-5 fw-bold">
														<?php echo $data['cours_name']; ?>
													</div>


													<div style="margin-left: 277px">
														<div class="icon1">
															<a href="view.php?id=<?php echo $data['cours_id']; ?>">
																<i class="fas fa-eye custom-icon"></i>
																<span class="d-none d-md-inline"></span>
															</a>
														</div>
														<div class="icon2">
															<a href="edit.php?id=<?php echo $data['cours_id']; ?>">
																<i class="fas fa-pencil-alt custom-icon"></i>
																<span class="d-none d-md-inline"></span>
															</a>
														</div>
														<div class="icon3">
															<a href="delete.php?id=<?php echo $data['cours_id']; ?>">
																<i class="fas fa-times custom-icon"></i>
																<span class="d-none d-md-inline"></span>
															</a>
														</div>
													</div>
													<div class="service_btn center">
														<a href="quiz.php?id=<?php echo $data['cours_id']; ?>" style="margin-top:-50px;border-radius: 10px;"
															class="btn btn-lg-square waves-effect waves-orange" >Add
															Quises</a>

													</div>


												</div>
											</div>

											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</section>

		<div id="addCoursModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="coursForm" method="post" action="add.php">
						<div class="modal-header">
							<h4 class="modal-title">Ajouter cours</h4>
							<button type="button" class="close" data-bs-dismiss="modal"
								aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Nom</label>
								<input type="text" class="form-control" name="cours_name" required>
							</div>
							<div class="form-group">
								<label>Lien vers le cours</label>
								<textarea class="form-control" type="text" class="form-control" name="url" required></textarea>
							</div>

						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-success" value="Add">
						</div>
					</form>
				</div>
			</div>

		</div>

		<?php include '../../footer.php' ?>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<style>
		.main_service_area .single_service i {
			font-size: 2rem;
		}
		.service_btn {
        display: flex;
        justify-content: center;
        align-items: center;
      
    }
	</style>

</body>

</html>