<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "misrtravel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql1 = "select Email from credentials where Email = '".$_POST['email']."'";
$result1 = mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($result1);
if ($row1['Email']!=null) {
  echo 'Email already taken';
  echo "<script>disableSignup();</script>";  
}
else{ 
  echo "<script>enableSignup();</script>";
}
 ?>