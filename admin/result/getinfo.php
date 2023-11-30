<?php 
require '../../connect.php';

$req="SELECT user_name from personne p INNER join  autority_user a on p.user_id=a.user_id WHERE role_name='student'";
$AfficherResult = mysqli_query($conn, $req);


?>