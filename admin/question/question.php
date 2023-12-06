<?php 
include('../../connect.php');

if(isset($_GET['cours_id '])){
  $cour_id = $_GET['cours_id '];
}


$sql = "SELECT questions.* , reponses.rep_id idqst , reponses.rep1 rep1 , reponses.rep2 rep2 , reponses.rep3 rep3 , reponses.rep4 rep4, reponses.true_rep repT FROM questions 
INNER JOIN reponses ON questions.qst_id = reponses.qst_id; WHERE cour_id = $cour_id";
$result = mysqli_query($conn , $sql );


if(isset($_GET["qst_id_delete"])){
	$id = $_GET['qst_id_delete'];
	$sql2 = "DELETE FROM questions
	WHERE qst_id = $id;";
	$result2 = mysqli_query($conn , $sql2 );

	if ($result2) {
        header("Location: question.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

$num_qst = 0;


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


	<link href="../../css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="../../css/jcarousel.css" rel="stylesheet" />
	<link href="../../css/flexslider.css" rel="stylesheet" />
	<link href="../../css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="css.css">

	
</head>

<body>
	<div id="wrapper">
		<?php include '../../nav.php'?>
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="pageTitle">Gerer Les Questions</h2>
					</div>
				</div>
			</div>
		</section>
<div class="container">

			<?php 
				if (isset($_GET['msg'])) {
					$decodedMessage = urldecode($_GET['msg']); 
					echo "<div class='alert alert-primary' role='alert' id= 'greenmsg'> $decodedMessage   </div>";
				}
			?>
<div id="displayTitle">double click pour afficher le text complete</div>
<?php  
  if( $num_qst <= 10){
    $count = $num_qst + 1;
    echo "<a href='addquestion.php?num_qst=$count'><input type='submit' value='Ajouter'></a>";
  }
?>

<table class="table table-striped table-hover">
  <thead class="thead-dark	">
    <tr>
      <th scope="col">Nr QST</th>
      <th scope="col">Quetion</th>			
      <th scope="col">Repponse 1</th>
      <th scope="col">Repponse 2</th>
      <th scope="col">Repponse 3</th>
      <th scope="col">Repponse 4</th>
      <th scope="col">T.Reponse</th>
      <th scope="col">Les Actions</th>

      


    </tr>
  </thead>

  <tbody>

    <?php
        while ($row = mysqli_fetch_assoc($result) ) {

          $num_qst += 1;
    
    ?>
    <tr>
      <td class="tdTable1"><?php echo $num_qst; ?></td>
      <td class="tdTable" data-title = "<?php echo $row["qst_content"]; ?> "><?php echo $row["qst_content"]; ?></td>
      <td class="tdTable" data-title = "<?php echo $row["rep1"]; ?> "><?php echo $row["rep1"]; ?></td>
      <td class="tdTable" data-title = "<?php echo $row["rep2"]; ?> "><?php echo $row["rep2"]; ?></td>
      <td class="tdTable" data-title = "<?php echo $row["rep3"]; ?> "><?php echo $row["rep3"]; ?></td>
      <td class="tdTable" data-title = "<?php echo $row["rep4"]; ?> "><?php echo $row["rep4"]; ?></td>
      <td class="tdTable" data-title = "<?php echo $row["repT"]; ?> "><?php echo $row["repT"]; ?></td>  

      <td class="tdTable1">
        <a href="editquestion.php?qst_id=<?php echo $row['qst_id']; ?>"  style="text-decoration: none; color: green;  padding : 0px 5px">Edit</a>
		    <a href="question.php?qst_id_delete=<?php echo $row['qst_id']; ?>" style="text-decoration: none; color: red; padding: 0px 5px;">Supprimer</a>
      </td>      
    

    </tr>
   <?php
}
?>
  </tbody>
</table>
</div>


	<?php include '../../footer.php'?>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


	<style>
		.main_service_area .single_service i {
			font-size: 2rem;
		}
	</style>


	<script>
    function validateForm() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var atLeastOneChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

        if (!atLeastOneChecked) {
            alert("Please select at least one checkbox.");
            return false;
        }
        return true;
    }


	document.addEventListener("DOMContentLoaded", function() {
    var tdTableElements = document.querySelectorAll('.tdTable');
    var displayTitleElement = document.getElementById('displayTitle');

    tdTableElements.forEach(function(td) {
        td.addEventListener('dblclick', function() {
            var dataTitle = td.getAttribute('data-title');
            displayTitleElement.textContent = dataTitle;
        });
    });
});

</script>

</body>
</html>