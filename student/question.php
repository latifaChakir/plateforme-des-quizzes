<?php 
include('../connect.php');


if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

}

if(isset($_GET['cours_id '])){
    $cour_id = $_GET['cours_id '];
}

$sql = "SELECT questions.* , reponses.rep_id idqst , reponses.rep1 rep1 , reponses.rep2 rep2 , reponses.rep3 rep3 , reponses.rep4 rep4, reponses.true_rep repT FROM questions 
INNER JOIN reponses ON questions.qst_id = reponses.qst_id WHERE cours_id = $cours_id;";
$result = mysqli_query($conn , $sql );

$sqlcheck = "SELECT reponse_student.qstID checkid FROM reponse_student;";
$resultcheck = mysqli_query($conn , $sqlcheck);

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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


	<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="../css/jcarousel.css" rel="stylesheet" />
	<link href="../css/flexslider.css" rel="stylesheet" />
	<link href="../css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="css.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	
</head>

<body>
<div id="wrapper">
    <?php include '../nav.php'?>
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="pageTitle">Passer L'exame</h2>
          </div>
        </div>
      </div>
    </section>

    <section id="secQuezes">

    <?php 
      if (($rowcheck = mysqli_fetch_array($resultcheck)) != NULL ) {
         
        echo '<div class="alert alert-primary" role="alert">
              <h4>Tu as passé cet examen De Saison Normale, tu peux voir les résultats</h4>
            </div>';
        echo "<a href='result.php'> <button type='button' class = 'btn2'>Voici La Correction</button></a>";        
      }
      ?>
      <?php
        while ($row = mysqli_fetch_array($result)) {
      ?>
        <form class="question-form" id="form-<?php echo $row["qst_id"]; ?>">
          <div class="qst_rep">
            <h1 class="h1Table"><?php echo $row["qst_content"], " :"; ?></h1>
            <div class="reponse">
              <input type="radio" name="answer_<?php echo $row["qst_id"]; ?>" value="rep1" required>
              <input type="text" name="rep1" value="<?php echo $row["rep1"]; ?>" required disabled>
            </div>
            <div class="reponse">
              <input type="radio" name="answer_<?php echo $row["qst_id"]; ?>" value="rep2" required>
              <input type="text" name="rep2" value="<?php echo $row["rep2"]; ?>" required disabled>
            </div>
            <div class="reponse">
              <input type="radio" name="answer_<?php echo $row["qst_id"]; ?>" value="rep3" required>
              <input type="text" name="rep3" value="<?php echo $row["rep3"]; ?>" required disabled>
            </div>
            <div class="reponse">
              <input type="radio" name="answer_<?php echo $row["qst_id"]; ?>" value="rep4" required>
              <input type="text" name="rep4" value="<?php echo $row["rep4"]; ?>" required disabled>
            </div>
          </div>
        </form>
      <?php
        }
      ?>
   <?php 
      if (($rowcheck = mysqli_fetch_array($resultcheck)) == NULL) {
          echo "<a href='question.php'><button type='button' id='subtn' class = 'btn2'>Valider</button></a>";
      }
      
      ?>

    </section>




    <?php include '../footer.php'?>
  </div>
  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


	<style>
		.main_service_area .single_service i {
			font-size: 2rem;
		}
	</style>


<script>
    $(document).ready(function () {
    $("#subtn").click(function () {
        var selectedAnswers = {};

        $(".question-form").each(function () {
            var qstId = $(this).attr("id").replace("form-", "");
            var selectedAnswer = $("input[name='answer_" + qstId + "']:checked").val();

            selectedAnswers[qstId] = selectedAnswer;
        });

        $.ajax({
            type: "POST",
            url: "save_answers.php",
            contentType: "application/json",
            data: JSON.stringify(selectedAnswers),
            success: function (response) {
                alert(response);
            },
            error: function () {
                alert("Error El ya Problemme dans la connexion.");
            },
        });
    });
});
  </script>

</body>
</html>