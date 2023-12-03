<?php
// hèèèèèèèèèèèèéééééééééééééééé
$dbName = "quizes";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);



if (!$conn) {
    die("Something went wrong: " . mysqli_connect_error());
  }
  
  if (isset($_POST['submit'])) {
    
    
    
    // Sanitize and retrieve the username and password from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
    // Perform a query to check if the username and password match
    $query = "SELECT * FROM autority_user inner JOIN personne ON autority_user.user_id=personne.user_id WHERE user_name = '$username' ";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
 
    
    
    if ($count == 0) {
      // Username and password do not match, display an alert
                echo '    <script>document.getElementById("alert)".innerHTML=" <strong>Invalid!</strong> Invalid password"</script>';
    
      
    
    } else {
      
        // Username and password match, redirect to the desired page
        $password_hashed=$row['password_user'];

       if(password_verify($password ,$password_hashed )& $row['role_name']=='admin'){

        
           header('Location:./admin/Home.html');
        
           exit();
       
         }elseif ($row['role_name']=='student'& password_verify($password ,$password_hashed ) ) {
           header('Location: ./student/Home.html');
           exit();
         }
       
        
       }
      
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://webthemez.com" />
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link href="css/jcarousel.css" rel="stylesheet" />
    <link href="css/flexslider.css" rel="stylesheet" />
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
  </head>
  <body>
    <div id="wrapper">
      <header>
        <div class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button
                type="button"
                class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse"
              >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html"
                ><img src="img/logo.png" alt="logo"
              /></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="admin/contact.html">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>
      <!-- end header -->
      <section id="featured">
        <!-- Slider -->
        <div id="main-slider" class="flexslider">
          <ul class="slides">
            <li>
              <img src="img/slides/1.jpg" alt="" />
              <div class="flex-caption">
                <div class="item_introtext">
                  <strong>Online Education</strong>
                  <p>The best educational template</p>
                </div>
              </div>
            </li>
            <li>
              <img src="img/slides/2.jpg" alt="" />
              <div class="flex-caption">
                <div class="item_introtext">
                  <strong>School Education</strong>
                  <p>Get all courses with on-line content</p>
                </div>
              </div>
            </li>
            <li>
              <img src="img/slides/3.jpg" alt="" />
              <div class="flex-caption">
                <div class="item_introtext">
                  <strong>Collage Education</strong>
                  <p>Awesome Template get it know</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <!-- end slider -->
      </section>
      <section class="callaction">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="aligncenter">
                <h1 class="aligncenter">Our Featured Courses</h1>
                <span
                  class="clear spacer_responsive_hide_mobile"
                  style="height: 13px; display: block"
                ></span
                >Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Dolores quae porro consequatur aliquam, incidunt eius magni
                provident, doloribus omnis minus temporibus perferendis nesciunt
                quam repellendus nulla nemo ipsum odit corrupti consequuntur
                possimus, vero mollitia velit ad consectetur. Alias, laborum
                excepturi nihil autem nemo numquam, ipsa architecto non, magni
                consequuntur quam.
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="content">
  <form action="" id="formLogin" method="POST">
    <h3>LogIn</h3>
    <input type="text" required placeholder="UserName" name="username" />
    <input type="password" required placeholder="Password" name="password" />
    <input type="submit" name='submit' id="subForm" />

    <div class="alert alert-danger" id="alert" style="display:none;" role="alert">
     
    </div>
    
  </form>
</section> 
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <div class="widget">
                <h5 class="widgetheading">Our Contact</h5>
                <address>
                  <strong>Abovecompany Inc</strong><br />
                  JC Main Road, Near Silnile tower<br />
                  Pin-21542 NewYork US.
                </address>
                <p>
                  <i class="icon-phone"></i> (123) 456-789 - 1255-12584 <br />
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
                  <li>
                    <a href="#"
                      >Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit.</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      >Pellentesque et pulvinar enim. Quisque at tempor
                      ligula</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      >Natus error sit voluptatem accusantium doloremque</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="widget">
                <h5 class="widgetheading">Recent News</h5>
                <ul class="link-list">
                  <li>
                    <a href="#"
                      >Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit.</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      >Pellentesque et pulvinar enim. Quisque at tempor
                      ligula</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      >Natus error sit voluptatem accusantium doloremque</a
                    >
                  </li>
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
                    <span
                      >&copy; Above Site All right reserved. Template By </span
                    ><a href="http://webthemez.com" target="_blank"
                      >WebThemez</a
                    >
                  </p>
                </div>
              </div>
              <div class="col-lg-6">
                <ul class="social-network">
                  <li>
                    <a href="#" data-placement="top" title="Facebook"
                      ><i class="fa fa-facebook"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#" data-placement="top" title="Twitter"
                      ><i class="fa fa-twitter"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#" data-placement="top" title="Linkedin"
                      ><i class="fa fa-linkedin"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#" data-placement="top" title="Pinterest"
                      ><i class="fa fa-pinterest"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#" data-placement="top" title="Google plus"
                      ><i class="fa fa-google-plus"></i
                    ></a>
                  </li>
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
    <script src="js/jquery.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.fancybox-media.js"></script>
    <script src="js/portfolio/jquery.quicksand.js"></script>
    <script src="js/portfolio/setting.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/owl-carousel/owl.carousel.js"></script>
  </body>
</html>

