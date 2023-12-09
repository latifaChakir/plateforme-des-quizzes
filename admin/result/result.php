
<?php 
      require '../../connect.php';

      $user_req="SELECT user_name,p.user_id from personne p INNER join  autority_user a on p.user_id=a.user_id WHERE role_name='student'";
      $AfficherResult_user = mysqli_query($conn, $user_req);

      $cours_req="SELECT cours_name,cours_id from cours ORDER by cours_name";
      
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
          <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
      <script src="  https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="  https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
      <script src="  https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        

        
      </head>
      <body class="result-body">
          <!-- start nav -->
          <?php include '../../nav.php';?>
          <!-- end nav -->
      <!-- -------------------------------------------------------------------------------------------------- -->
      <h3 id="xo">RESULTs OF STUDENTS</h1>
      <div class="container">


      <table id="example" class="table table-striped" style="width:100%;overflow-x: scroll;">
          <?php
        
        echo' <thead>
        <tr>';
          
      
          //  get info of users 
          $a=0;
          $b=0;
          $tb_is_repeated = false;
          $count_repeated = false;
          $reqet="UPDATE resultat SET cours_note = 0 ";
          $conect__reqet= mysqli_query($conn, $reqet);
            while ($result_user = mysqli_fetch_assoc($AfficherResult_user)) {
              
              $user_id_note=$result_user['user_id'];
             
            if($a<1){
              echo '<th scope="col" id="student-name" style=" width: 179.725px !important;">student name</th>';
              $a++;
            }$AfficherResult_cours = mysqli_query($conn, $cours_req);
              while ($result_cours = mysqli_fetch_assoc($AfficherResult_cours)){
                if(!$count_repeated ){
                  echo '<th scope="col" id="mb">';
                echo $result_cours['cours_name'];
                echo '</th>';
                }

                $coursName=$result_cours['cours_name'];
                $courSID= $result_cours['cours_id'];
                    
                    $note_req=" SELECT R.normal_note,ratt_note FROM Cours C LEFT JOIN Resultat R ON C.cours_id = R.cours_id AND R.user_id = '$user_id_note' WHERE cours_name= '$coursName' order by C.cours_name";
                    $AfficherResult_note= mysqli_query($conn, $note_req);
                    $result_note = mysqli_fetch_assoc($AfficherResult_note);
                  
                    // check the normal note  
                    $normal_note= $result_note['normal_note'];
                    
                    if( $normal_note != NULL){
                      $normal_note= $result_note['normal_note'];
                    }else{
                      $normal_note="no note";
                    }
                      // check the ratt note  
                      $ratt_note= $result_note['ratt_note'];
                    
                      if( $ratt_note != NULL){
                        $ratt_note= $result_note['ratt_note'];
                      }else{
                        $ratt_note="no note";
                      }
                      // insert the value of coure note 
                      if($normal_note != "no note" && $ratt_note != "no note" ){
                        if($normal_note >= $ratt_note){
                          $u_note=$normal_note ;
                        }
                        else if($normal_note < $ratt_note){
                          $u_note=$ratt_note ;
                        }
                      }
                      else if($normal_note == "no note" && $ratt_note == "no note" ){
                        $u_note = "no note";
                      }
                      else if($normal_note != "no note" && $ratt_note == "no note" ){
                        $u_note = $normal_note;
                      }
                      else if($normal_note == "no note" && $ratt_note != "no note" ){
                        $u_note = $ratt_note;
                      }

                    $reqett="UPDATE resultat SET cours_note = '$u_note' WHERE resultat.user_id = '$user_id_note' AND resultat.cours_id= $courSID";
                    $conect__reqett= mysqli_query($conn,$reqett);

                
                  }
                  $count_repeated =true;
                  if($b<1){
                    echo '<th scope="col" id="mb">MOYENNE</th>';
                    $b++;
                  }
                  echo'  </tr>
                  </thead>';
                if(!$tb_is_repeated){
                  echo'<tbody>';
                  $tb_is_repeated = true;
                }
              // display the name of user 
              echo'<tr>';
              echo'<th scope="row" >';
              
              echo '<a href="profile.php?studentid='. $user_id_note.'" style="text-decoration:none;color:#14A085; margin-right:5px;"><i class="fa-regular fa-user"></i></a><span style="font-size: small;">'.$result_user['user_name'];
            
              echo'</span></th>';

              $user_id_note=$result_user['user_id'];
            //  get the notes of user 
              $note_req=" SELECT  R.cours_note FROM Cours C LEFT JOIN Resultat R ON C.cours_id = R.cours_id AND R.user_id = '$user_id_note' order by C.cours_name";
              $AfficherResult_note= mysqli_query($conn, $note_req);
              if(!$AfficherResult_note){
                die('Error in user query: ' . mysqli_error($conn));
              }
              // display notes 
              
              while ($result_note = mysqli_fetch_assoc($AfficherResult_note)) {

                $u_note= $result_note['cours_note'];
                
              if( $u_note != NULL){
                $u_note= $result_note['cours_note'];
              }else{
                $u_note="no note";
              }
            
                echo'<td style="text-align:center;">';
                echo$u_note;
                echo'</td>';
                
              }
              $num_of_note_req="SELECT COUNT(cours_note) AS num_of_note FROM resultat WHERE user_id = '$user_id_note'";
              $AfficherResult_num_of_note= mysqli_query($conn, $num_of_note_req);
              $result_num_of_note = mysqli_fetch_assoc($AfficherResult_num_of_note);

              $sum_req="SELECT SUM(cours_note) AS some FROM resultat WHERE user_id = '$user_id_note'";
              $AfficherResult_sum= mysqli_query($conn, $sum_req);
              $result_sum = mysqli_fetch_assoc($AfficherResult_sum);

              if($result_num_of_note['num_of_note'] !=0 && $result_sum['some'] !=NULL ){
                  $total=$result_sum['some']/$result_num_of_note['num_of_note'];
              }
            else{
              $total="no note";
            }
              echo'<td style="text-align:center;">';
                echo$total;
                echo'</td>';
                echo '</tr>';
              
          }
            ?>

        </tbody>
      </table></div>
      <!-- -------------------------------------------------------------------------------------------------- -->


      <script>
          new DataTable('#example');
      </script>
            <!-- start footer-->
            <?php include '../../footer.php';?>
            <!-- end footer -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      </body>
      </html>