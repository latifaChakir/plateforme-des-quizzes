




<?php 
require '../../connect.php';

$user_req="SELECT user_name,p.user_id from personne p INNER join  autority_user a on p.user_id=a.user_id WHERE role_name='student'";
$AfficherResult_user = mysqli_query($conn, $user_req);

$cours_req="SELECT cours_name from cours ORDER by cours_name";
$AfficherResult_cours = mysqli_query($conn, $cours_req);




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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link href="../../css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="../../css/jcarousel.css" rel="stylesheet" />
	<link href="../../css/flexslider.css" rel="stylesheet" />
	<link href="../../css/style.css" rel="stylesheet" />

	
</head>
<body>
    <!-- start nav -->
    <?php include '../../nav.php';?>
    <!-- end nav -->
<!-- -------------------------------------------------------------------------------------------------- -->
<div class="container" style="margin-bottom:20rem;">
<h3 style="COLOR: GREEN; text-align: center;">RESULT OF STUDENTS</h1>
  <table class="table caption-top">
  <caption></caption>
  <thead>
    <tr>
      <?php 
      
      echo '<th scope="col">student name<th>';
      while ($result_cours = mysqli_fetch_assoc($AfficherResult_cours)) {
        echo '<th scope="col">';
        echo $result_cours['cours_name'];
        echo '</th>';
      }
      ?>
     
    </tr>
  </thead>
  <tbody>
    
    <?php
    //  if($result_user = mysqli_fetch_assoc($AfficherResult_user)){
    //   echo'mmmmmmmmmmmmmmmmmmmmmmmmmmm';
    //  }
     
      while ($result_user = mysqli_fetch_assoc($AfficherResult_user)) {
        echo'<tr>';
        echo'<th scope="row">';
        echo $result_user['user_name'];
        echo'</th>';
         $user_id_note=$result_user['user_id'];
         echo $user_id_note;
        $note_req=" SELECT  R.cours_note FROM Cours C LEFT JOIN Resultat R ON C.cours_id = R.cours_id AND R.user_id = $user_id_note order by C.cours_name";
        $AfficherResult_note= mysqli_query($conn, $note_req);
        if(!$AfficherResult_note){
          die('Error in user query: ' . mysqli_error($conn));
        }
        echo'===========>eeerrr';
        while ($result_note = mysqli_fetch_assoc($AfficherResult_note)) {
       echo'===========>zznn';
          echo'<td>';
          echo $result_note['cours_note'];
          echo'</td>';
          
        }echo '</tr>';
        
     
        
    }
      ?>
      
      

   
  </tbody>
</table></div>
<!-- -------------------------------------------------------------------------------------------------- -->



      <!-- start footer-->
      <?php include '../../footer.php';?>
      <!-- end footer -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>