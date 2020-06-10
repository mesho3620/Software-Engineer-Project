<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<?php
define('__ROOT__', "../app/");

require_once(__ROOT__ . "model/Tourists.php");
require_once(__ROOT__ . "model/Agencies.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "misrtravel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['signup'])){ //check if login button is pressed



      if(isset($_POST['nationality'])){
        
        $touristmodel = new Tourists();
        $touristmodel->insertTourist($_POST['name'],$_POST['email'],$_POST['password'],$_POST['mobile'],$_POST['nationality'],$_POST['passport_number']);
      }

      else if(isset($_POST['country'])){

        $agencymodel = new Agencies();
        $agencymodel->insertAgency($_POST['name'],$_POST['email'],$_POST['password'],$_POST['mobile'],$_POST['country'],$_POST['address']);
      }
    }

     ?>
