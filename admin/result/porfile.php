<?php
include '../../connect.php';
if(isset($_GET['studentid'])){
	$student_id=$_GET['studentid'];

  $student_name_req="SELECT `user_name` FROM personne WHERE `user_id`=$student_id";
  $AfficherResult_student_name = mysqli_query($conn, $student_name_req);
  // FULL NAME 
  $result_student_name = mysqli_fetch_assoc($AfficherResult_student_name);
// -----------------------------------------------------------------------

$student_email_req="SELECT `email` FROM personne WHERE `user_id`=$student_id";
$AfficherResult_student_email = mysqli_query($conn, $student_email_req);
// EMAIL
$result_student_email = mysqli_fetch_assoc($AfficherResult_student_email);

	

	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    
    <!-- Custom CSS -->
    <link href="../../css/style.css" rel="stylesheet" />
    <style>
        /* Your custom styles here */
        body {
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');

        .search {
            top: 6px;
            left: 10px;
        }

        .fa-search {
            display: none;
        }

        .form-control {
            border: none;
            padding-left: 32px;
        }

        .form-control:focus {
            border: none;
            box-shadow: none;
        }

        .green {
            color: green;
        }
        .readCours-btn{
            border: none;
            background: white;
            color: #14A085;
        }
    </style>
</head>
<body>
    <!-- Start Header -->
    <?php include '../../nav.php' ?>
    <!-- End Header -->

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <!-- Start Card Column -->
                <div class="col-md-4 mb-3">
                    <!-- Profile Card -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Card Profile Image -->
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $result_student_name['user_name'];?></h4>
                                    <p class="text-secondary mb-1">STUDENT</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- List Group Card -->
                    <div class="card mt-3">
                        <div class="list-group list-group-flush">
                            <!-- Card Table of Notes -->
                            <div class="container mt-5 px-2">
                              <h4 style="color:#14A085; text-align:center;">my cours</h4>
                                
                                <div class="table-responsive">
                                    <table class="table table-responsive table-borderless">
                                        <!-- Table Header -->
                                        <thead>
                                            <tr class="bg-light">
                                            <th scope="col" width="5%"></th>
                                                <th scope="col" width="5%">cours</th>
                                                <th scope="col" width="20%">note</th>
                                                <th scope="col" width="10%">Status</th>
                                            </tr>
                                        </thead>
                                        <!-- Table Body -->
                                        <tbody>
                                          <?php 
                                           $cours_req="SELECT cours_name from cours ORDER by cours_name";
                                           $AfficherResult_cours = mysqli_query($conn, $cours_req);
                                           

                                           while ($result_cours = mysqli_fetch_assoc($AfficherResult_cours)){
                                            $coursName=$result_cours['cours_name'];
                                            echo ' <tr>';
                                            echo '<th scope="col" width="5%"><a href="#"><button class="readCours-btn">read</button></a></th>';
                                                echo '<td>'.$coursName.'</td>';
                                                
                                                $note_req=" SELECT  R.cours_note FROM Cours C LEFT JOIN Resultat R ON C.cours_id = R.cours_id AND R.user_id = $student_id WHERE cours_name= '$coursName' order by C.cours_name";
                                                $AfficherResult_note= mysqli_query($conn, $note_req);
                                                $result_note = mysqli_fetch_assoc($AfficherResult_note);
                                                $u_note= $result_note['cours_note'];
                                                
                                                if( $u_note != NULL){
                                                  $u_note= $result_note['cours_note'];
                                                }else{
                                                  $u_note="no note";
                                                }
                                                echo'<td style="text-align:center;">';
                                                echo$u_note;
                                                echo'</td>';
                                             if( $result_note['cours_note'] != NULL ){
                                              if($u_note >= 10 ){
                                                 echo '<td><i class="fa fa-check-circle-o green"></i><span class="ms-1">Paid</span></td>';
                                              }
                                             else if($u_note < 10 ){
                                                echo'<td><i class="fa fa-dot-circle-o text-danger"></i><span class="ms-1">Failed</span></td>';
                                              }
                                             }
                                                else{
                                                  echo'<td><a href="#"><button class="readCours-btn">quiez</button></a></td>';
                                                }

                                                echo' </tr>';
                                           }

                                          ?>
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Table of Notes -->
                </div>

  <!-- start table of student info  -->
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $result_student_name['user_name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $result_student_email ['email'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (239) 816-9029
                    </div>
                  </div>
                 
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Bay Area, San Francisco, CA
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " style ="background-color:#14A085 !important; border: 1px solid;"target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
<!-- end card of student info  -->
<!-- start progresion  -->
              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
    <?php include '../../footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>