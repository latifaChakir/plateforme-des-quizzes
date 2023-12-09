<?php 
include('../../connect.php');

session_start();

if (isset($_SESSION['id'])) {
    $cour_id = $_SESSION['id'];
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

$sql = "SELECT questions.qst_id, questions.qst_content, questions.cours_id cours_id,
reponses.rep1, reponses.rep2, reponses.rep3, reponses.rep4,
reponses.true_rep tr_rep, reponse_student.content rep_std, reponse_student.ratt ratt
FROM questions 
INNER JOIN reponses ON reponses.qst_id = questions.qst_id 
INNER JOIN reponse_student ON reponse_student.qstID = questions.qst_id 
INNER JOIN personne ON reponse_student.user_id = personne.user_id
WHERE personne.user_id = $user_id AND questions.cours_id =$cour_id;";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

function getrepo_std($row) {
    switch ($row['rep_std']) {
        case 'rep1':
            return $row['rep1'];
        case 'rep2':
            return $row['rep2'];
        case 'rep3':
            return $row['rep3'];
        case 'rep4':
            return $row['rep4'];
        default:
            return 'Réponse non spécifiée';
    }
}

function getrepo_tr($row) {
    switch ($row['tr_rep']) {
        case 'rep1':
            return $row['rep1'];
        case 'rep2':
            return $row['rep2'];
        case 'rep3':
            return $row['rep3'];
        case 'rep4':
            return $row['rep4'];
        default:
            return 'Réponse non spécifiée';
    }
}

function getrepo_ratt($row) {
    switch ($row['ratt']) {
        case 'rep1':
            return $row['rep1'];
        case 'rep2':
            return $row['rep2'];
        case 'rep3':
            return $row['rep3'];
        case 'rep4':
            return $row['rep4'];
        default:
            return 'Réponse non spécifiée';
    }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link href="../../css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="../../css/jcarousel.css" rel="stylesheet" />
    <link href="../../css/flexslider.css" rel="stylesheet" />
    <link href="../../css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="css.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <?php include '../../nav.php'?>
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">Resultat Des Question</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <table class="table table-striped table-hover">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">Nr QST</th>
                        <th scope="col">La Quetion</th>
                        <th scope="col">Votre Reponse</th>
                        <th scope="col">Vrai Reponse</th>
                        <th scope="col">Note Normale</th>
                        <th scope="col">Votre Reponse Ratt</th>
                        <th scope="col">Note De Ratt</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $result_std = 0;
                    $result_ratt = 0;
                    $resultALL = 0; 
                    $resultALLratt = 0; 
                    $num_qst = 0 ; 
                    // Fetch and display the first row
                    if ($row) { // Check if $row is not null
                        $rep_std = getrepo_std($row);
                        $rep_ratt = getrepo_ratt($row);
                        $rep_tr = getrepo_tr($row);

                        if ($rep_std == $rep_tr) {
                            $result_std = 2;
                            $resultALL +=  4;
                        } else {
                            $result_std = 0;
                        }

                        if ($rep_ratt == $rep_tr) {
                            $result_ratt = 2;
                            $resultALLratt += 4;
                        } else {
                            $result_ratt = 0;
                        }
                        $num_qst += 1;

                        // Display the first row
                        echo "<tr>
                                <td>$num_qst</td>
                                <td>{$row["qst_content"]}</td>
                                <td>$rep_std</td>
                                <td>$rep_tr</td>
                                <td style='text-align: center;'>$result_std</td>
                                <td>$rep_ratt</td> 
                                <td style='text-align: center;'>$result_ratt</td> 
                            </tr>";

                        // Loop through and display the remaining rows
                        while ($row = mysqli_fetch_array($result)) {
                            $rep_std = getrepo_std($row);
                            $rep_ratt = getrepo_ratt($row);
                            $rep_tr = getrepo_tr($row);

                            if ($rep_std == $rep_tr) {
                                $result_std = 2;
                                $resultALL +=  4;
                            } else {
                                $result_std = 0;
                            }

                            if ($rep_ratt == $rep_tr) {
                                $result_ratt = 2;
                                $resultALLratt += 4;
                            } else {
                                $result_ratt = 0;
                            }
                            $num_qst += 1;

                            // Display the remaining rows
                            echo "<tr>
                                    <td>$num_qst</td>
                                    <td>{$row["qst_content"]}</td>
                                    <td>$rep_std</td>
                                    <td>$rep_tr</td>
                                    <td style='text-align: center;'>$result_std</td>
                                    <td>$rep_ratt</td> 
                                    <td style='text-align: center;'>$result_ratt</td> 
                                </tr>";
                        }
                    }
                    ?>
                    

            <tr>
                <td> </td>
                <td> </td>       
                <td> </td>                    

                <td>Saison Normale : </td>
                <?php if($resultALL > 1) { 
                  echo  "<td style = 'text-align : center; font-weight: bold;'> $resultALL / 20 </td>" ;} 
                 else{
                    echo  "<td style = 'text-align : center; font-weight: bold;'> - / 20 </td>" ;
                 }
                  ?>


                <td>Saison Ratrappage : </td>
                <?php if($resultALLratt > 1) { 
                  echo  "<td style = 'text-align : center; font-weight: bold;'> $resultALLratt / 20 </td>" ;} 
                 else{
                    echo  "<td style = 'text-align : center; font-weight: bold;'> - / 20 </td>" ;
                 }
                  ?>
            </tr>

 </tbody>
        
        <a href='questionratt.php'><button type='button' class='btn2'>Cliquer Pour Passer Le Rattrapage</button></a>

    </table>


    </section>
    <?php
        $sql_prsn = "SELECT * FROM personne WHERE user_id = $user_id";
        $result_done = mysqli_query($conn, $sql_prsn);

        if ($row = mysqli_fetch_assoc($result_done)) {
            $sql_reseultat = "SELECT * FROM resultat WHERE user_id = $user_id AND cours_id  = $cour_id ";
            $result_done = mysqli_query($conn, $sql_reseultat) ;
            if(mysqli_num_rows($result_done) < 1) {
            
                    $result_done = mysqli_query($conn, $sql_reseultat);
            
                    $sqlADD = "INSERT INTO resultat (ratt_note, normal_note, user_id , cours_id)
                            VALUES ($resultALLratt, $resultALL, $user_id , $cour_id)";
                    $resADD = mysqli_query($conn, $sqlADD);

                    if (!$resADD) {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
                else {
                    $sqlUPDATE = "UPDATE resultat 
                                SET ratt_note = $resultALLratt,
                                    normal_note = $resultALL    
                                WHERE user_id = $user_id AND cours_id  = $cour_id";
                    $resUPDATE = mysqli_query($conn, $sqlUPDATE);
        
                    if (!$resUPDATE) {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
        } 
?>


    <?php include '../../footer.php'?>
  </div>
  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


	<style>
		.main_service_area .single_service i {
			font-size: 2rem;
		}
	</style>

</body>
</html>