<?php
include('../../connect.php');

if (isset($_GET["qst_id"])) {
    $id = $_GET["qst_id"];

    $sql = "SELECT questions.*, reponses.rep_id idqst, reponses.rep1 rep1, reponses.rep2 rep2, reponses.rep3 rep3, reponses.rep4 rep4, reponses.true_rep repT 
            FROM questions 
            INNER JOIN reponses ON questions.qst_id = reponses.qst_id 
            WHERE questions.qst_id = $id";

			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
		}
?>

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
	<link rel="stylesheet" href="css.css">
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<div id="wrapper">

		<!-- start header -->
		<?php include '../../nav.php'?>
		<!-- end header -->
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="pageTitle">Modifier La Questions Avec Les Reponses</h2>
					</div>
				</div>
			</div>
		</section>

		<section id="content">
            <form method="post" action="edit.php" onsubmit="return validateForm();">
                <div class="alert alert-danger" role="alert" id="alerto" style="display: none">
                    Selictionner SVP Le Vrai Repponse
                </div>
                <?php
                if (isset($_GET['msg'])) {
                    $decodedMessage = urldecode($_GET['msg']);
                    echo "<div class='alert alert-primary' role='alert' id= 'greenmsg'> $decodedMessage   </div>";
                }
                ?>
                <h3>Modifier La Question : </h3>
				
				<input type="hidden" name="qst_id" value="<?php echo $row['qst_id']; ?>">

                <input type="text" id="qst" placeholder="Question..." required name="qst_name" value="<?php echo $row['qst_content']; ?>">
                <h4>Selictionner le Vrai Reponse</h4>
                <div>
                    <input type="text" placeholder="Reponse1..." name="rep1" required value="<?php echo $row['rep1']; ?>">
                    <input type="checkbox" name="s_rep1" onclick="handleCheckboxClick(this)" required>
                </div>
                <div>
                    <input type="text" placeholder="Reponse 2..." name="rep2" required value="<?php echo $row['rep2']; ?>">
                    <input type="checkbox" name="s_rep2" onclick="handleCheckboxClick(this)" required>
                </div>
                <div>
                    <input type="text" placeholder="Reponse 3..." name="rep3" required value="<?php echo $row['rep3']; ?>">
                    <input type="checkbox" name="s_rep3" onclick="handleCheckboxClick(this)" required>
                </div>
                <div>
                    <input type="text" placeholder="Reponse 4..." name="rep4" required value="<?php echo $row['rep4']; ?>">
                    <input type="checkbox" name="s_rep4" onclick="handleCheckboxClick(this)" required>
                </div>
                <input type="submit" value="Modifier" name="sub1">
                <a href="question.php" id="retour">Retour</a>
            </form>
        </section>

		


	

		<?php include '../../footer.php'?>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	



	<script>

	function handleCheckboxClick(checkbox) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.disabled = checkbox.checked;
        }
    });
    if (!checkbox.checked) {
        checkboxes.forEach(function (cb) {
            cb.disabled = false;
        });
    }
}

    function validateForm() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

        if (!isChecked) {
            document.getElementById("alerto").style.display = "block";
            document.getElementById("greenmsg").style.display = "none";
            return false;
			
        } else {
            document.getElementById("alerto").style.display = "none";
            document.getElementById("greenmsg").style.display = "block";
            return true;
        }
    }
</script>


</body>

</html>