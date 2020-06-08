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



    $sql = "select * from credentials where Email = '".$_POST['email1']."'";
    $result = mysqli_query($conn,$sql)
     or die("failed  to query database".mysqli_error());
    $row = mysqli_fetch_array($result) ;
      if ($row['Email'] == $_POST['email1'] && $row['Password'] == $_POST['password']) {

        $_SESSION['Type']=$row['Type'];

        if($row['Type'] == "S"){ //Staff

          $sql1 = "select * from staff INNER JOIN departments on  staff.DepartmentId = departments.ID  where staff.Id = '".$row['UserID']."'";
          $result1 = mysqli_query($conn,$sql1)
           or die("failed  to query database".mysqli_error());
          $row1 = mysqli_fetch_array($result1) ;

          $_SESSION["email"] = $row['Email'];
          $_SESSION["ID"] = $row['UserID'];
          $_SESSION["name"] = $row1['Name'];
          $_SESSION["mobile"] = $row1['Mobile'];
          $_SESSION["departmentid"] = $row1['Department'];

          header("Location:staff.php");

        }
        else if($row['Type'] == "T"){ //tourist

          $sql2 = "select * from tourists where Id = '".$row['UserID']."'";
          $result2 = mysqli_query($conn,$sql2)
           or die("failed  to query database".mysqli_error());
          $row2 = mysqli_fetch_array($result2) ;

          $_SESSION["email"] = $row['Email'];
          $_SESSION["ID"] = $row['UserID'];
          $_SESSION["name"] = $row2['Name'];
          $_SESSION["mobile"] = $row2['Mobile'];
          $_SESSION["nationality"] = $row2['Nationality'];
          $_SESSION["passport"] = $row2['Passport'];

          header("Location:tourist.php");

        }
        else if($row['Type'] == "A"){ //agency

          $sql3 = "select * from agencies where Id = '".$row['UserID']."'";
          $result3 = mysqli_query($conn,$sql3)
           or die("failed  to query database".mysqli_error());
          $row3 = mysqli_fetch_array($result3) ;

          $_SESSION["email"] = $row['Email'];
          $_SESSION["password"] = $row['Password'];
          $_SESSION["ID"] = $row['UserID'];
          $_SESSION["name"] = $row3['Name'];
          $_SESSION["mobile"] = $row3['Mobile'];
          $_SESSION["country"] = $row3['Country'];
          $_SESSION["address"] = $row3['Address'];

          header("Location:agency.php");

        }
        else if($row['Type'] == "AD"){ //admin
          $_SESSION["ID"] = $row['UserID'];
          $_SESSION["email"] = $row['Email'];


          header("Location:admin.php");

        }
      }
      else{
        echo "<script>alert('Invalid email or password')</script>";
      }
    }




     ?>
