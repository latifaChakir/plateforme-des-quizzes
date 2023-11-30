<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Above Multi-purpose Free Bootstrap Responsive Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="author" content="http://webthemez.com" />
	<link href="css/style.css" rel="stylesheet">

	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="../css/jcarousel.css" rel="stylesheet" />
	<link href="../css/flexslider.css" rel="stylesheet" />
	<link href="../css/style.css" rel="stylesheet" />

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<div id="wrapper">

		<!-- start header -->
		<header>
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.html"><img src="../img/logo.png" alt="logo" /></a>
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
							<li class="active"><a href="home.html">Home</a></li>
							<li><a href="cours.html">Courses</a></li>
							<li><a href="result.html">Result</a></li>
							<li><a href="contact.html">Contact</a></li>

						</ul>
					</div>
				</div>
			</div>
		</header><!-- end header -->
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="pageTitle">Gerer Les Cours</h2>
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

											<button type="button" class="btn custom-bg ">
												<span class="text-muted" data-bs-toggle="modal"
													data-bs-target="#addCoursModal"><strong>Ajouter cours
													</strong></span>
											</button>
										</div>
									</div>
									<div class="row list-group-horizontal mt-5">
										<?php
										include('../connect.php');
										$sqlSelect = "SELECT * FROM cours";
										$result = mysqli_query($conn, $sqlSelect);
										foreach ($result as $data) {
											?>

											<div class="col-md-4">
												<div class="jumbotron single_service  wow fadeInLeft">
													<div class="s_service_text text-sm-center text-xs-center">
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
														<div class="icon2">
															<a href="delete.php?id=<?php echo $data['cours_id']; ?>">
																<i class="fas fa-times custom-icon"></i>
																<span class="d-none d-md-inline"></span>
															</a>
														</div>
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
								<input type="text" class="form-control" name="url" required>
							</div>
							<div class="form-group">
								<label>Progress du cours</label>
								<input type="number" class="form-control" name="progress" required>
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

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="widget">
							<h5 class="widgetheading">Our Contact</h5>
							<address>
								<strong>Abovecompany Inc</strong><br>
								JC Main Road, Near Silnile tower<br>
								Pin-21542 NewYork US.
							</address>
							<p>
								<i class="icon-phone"></i> (123) 456-789 - 1255-12584 <br>
								<i class="icon-envelope-alt"></i> email@domainname.com
							</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="widget">
							<h5 class="widgetheading">Quick Links</h5>
							<ul class="link-list">
								<li><a href="#">Latest Events</a></li>
								<li><a href="#">Terms and conditions</a></li>
								<li><a href="#">Privacy policy</a></li>
								<li><a href="#">Career</a></li>
								<li><a href="#">Contact us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="widget">
							<h5 class="widgetheading">Latest posts</h5>
							<ul class="link-list">
								<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
								<li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
								<li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="widget">
							<h5 class="widgetheading">Recent News</h5>
							<ul class="link-list">
								<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
								<li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
								<li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="copyright">
								<p>
									<span>&copy; Above Site All right reserved. Template By </span><a
										href="http://webthemez.com" target="_blank">WebThemez</a>
								</p>
							</div>
						</div>
						<div class="col-lg-6">
							<ul class="social-network">
								<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
								</li>
								<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
								</li>
								<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a>
								</li>
								<li><a href="#" data-placement="top" title="Pinterest"><i
											class="fa fa-pinterest"></i></a></li>
								<li><a href="#" data-placement="top" title="Google plus"><i
											class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</footer>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<style>
		.main_service_area .single_service i {
			font-size: 2rem;
		}
	</style>

</body>

</html>