<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travellingcompany";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['login'])){ //check if login button is pressed

    

    $sql = "select * from credentials where Email = '".$_POST['email']."'";
    $result = mysqli_query($conn,$sql) 
     or die("failed  to query database".mysqli_error());
    $row = mysqli_fetch_array($result) ;
      if ($row['Email'] == $_POST['email'] && $row['Password'] == $_POST['password']) {

        if($row['Type' == 1]){ //Staff
        
          $sql1 = "select * from staff ,department where Id = '".$row['UserID']."' and staff.DepartmentId = departments.ID";
          $result1 = mysqli_query($conn,$sql1) 
           or die("failed  to query database".mysqli_error());
          $row1 = mysqli_fetch_array($result1) ;

          $_SESSION["email"] = $row['Email'];
          $_SESSION["ID"] = $row['UserID'];
          $_SESSION["Name"] = $row1['Name'];
          $_SESSION["Mobile"] = $row1['Mobile'];
          $_SESSION["Department"] = $row1['Department'];

          header("Location:staff.php");

        }
        else if($row['Type' == 2]){ //tourist
        
          $sql2 = "select * from tourists where Id = '".$row['UserID']."'";
          $result2 = mysqli_query($conn,$sql2) 
           or die("failed  to query database".mysqli_error());
          $row2 = mysqli_fetch_array($result2) ;

          $_SESSION["email"] = $row['Email'];
          $_SESSION["ID"] = $row['UserID'];
          $_SESSION["Name"] = $row2['Name'];
          $_SESSION["Mobile"] = $row2['Mobile'];
          $_SESSION["Nationality"] = $row2['Nationality'];
          $_SESSION["Passport"] = $row2['Passport'];

          header("Location:tourist.php");

        }
        else if($row['Type' == 3]){ //agency
        
          $sql3 = "select * from agencies where Id = '".$row['UserID']."'";
          $result3 = mysqli_query($conn,$sql3) 
           or die("failed  to query database".mysqli_error());
          $row3 = mysqli_fetch_array($result3) ;

          $_SESSION["email"] = $row['Email'];
          $_SESSION["ID"] = $row['UserID'];
          $_SESSION["Name"] = $row3['Name'];
          $_SESSION["Mobile"] = $row3['Mobile'];
          $_SESSION["Country"] = $row3['Country'];
          $_SESSION["Address"] = $row3['Address'];

          header("Location:agency.php");

        }
        else if($row['Type' == 4]){ //admin
        
          header("Location:admin.php");

        }
      }
      else{
        echo "<script>alert('Invalid email or password')</script>";
      }




     ?>
     













        
  

        
  