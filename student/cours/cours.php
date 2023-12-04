<?php
session_start(); 

    $userId = $_SESSION['user_id'];

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Above Multi-purpose Free Bootstrap Responsive Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="author" content="http://webthemez.com" />
	<!-- css -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="../../css/jcarousel.css" rel="stylesheet" />
	<link href="../../css/flexslider.css" rel="stylesheet" />
	<link href="../../css/style.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />


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
						<a class="navbar-brand" href="index.html"><img src="../../img/logo.png" alt="logo" /></a>
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
							<li><a href="../../student/home.html">Home</a></li>
							<li  class="active"><a href="../cours/cours.php">Courses</a></li>
							<li><a href="result.html">Result</a></li>
							<li><a href="../../student/contact.html">Contact</a></li>

						</ul>
					</div>
				</div>
			</div>
		</header><!-- end header -->
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="pageTitle">Mes Cours</h2>
					</div>
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<section id="service" class="service ">
					<div class="container">
						<div class="row">
							<div class="col-sm-10">
								<div class="main_service_area">
									<div class="row list-group-horizontal mt-5">
										<?php
										include('../../connect.php');
										$sqlSelect = "SELECT * FROM cours";
										$result = mysqli_query($conn, $sqlSelect);
										foreach ($result as $data) {
											?>

											<div class="col-md-4">
												<div class="jumbotron single_service  wow fadeInLeft">
													<div class="s_service_text text-center d-flex justify-content-center align-items-center"
														style="font-size:16px;">
														<strong >
															<?php echo $data['cours_name']; ?>
														</strong>
													</div>


													<div class="service_btn center">
														<a href="view.php?id=<?php echo $data['cours_id']; ?>"
															class="btn btn-lg-square waves-effect waves-orange"
															style="border-radius: 10px;">Show Course</a>
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
	
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/portfolio/jquery.quicksand.js"></script>
	<script src="../js/portfolio/setting.js"></script>
	<script src="../js/jquery.flexslider.js"></script>
	<script src="../js/animate.js"></script>
	<script src="../js/custom.js"></script>
	<script src="../js/owl-carousel/owl.carousel.js"></script>



	<style>
		.service_btn {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 2rem;
			font-weight: bold;

		}
	</style>
</body>

</html>