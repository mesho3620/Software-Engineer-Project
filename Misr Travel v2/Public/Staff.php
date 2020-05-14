<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="icon" type="image/ico" href="img2.png"  />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	body{
	background-image:url(img2.jpg);
	background-repeat:no-repeat;
	background-size:cover;
	}

	* {
	  box-sizing: border-box;
	}

	.sidenav{
		position: relative;
	  	width: 20%;
	  	height: 100%;
	  	padding-top: 5%;
  		background-color: black;
  		float: left;

	}
	.sidenav a {

	  color: #818181;;
	  font: 200% bold;
	  padding-left: 20%;

	}
	.sidenav a:hover {
	  color: #f1f1f1;

	}


	.logo{


		width: 80%;
		position: relative;
	    left: 10%;
	}
	.sidenav h1{

	  color: white;
	  font: 150% bold;
	  text-align: center;;
	}

	.rectangle{
	  background: rgba(255, 255, 255,1);
	  position: absolute;
	  left: 5%;
	  top: 5%;
	  width: 90%;
	  height: 90%;

	}

	.text {
		font: 140% bold;
		color: black;
		padding-left:6%;

	}
	.text1 {
		font: 140% bold;
		color: black;
		padding-left:35%;

	}
	.text2{
		font: 140% bold;
		color: black;
		position: absolute;
		left: 63%;

	}
	.box{
		font-size: 120%;
		position: absolute;
		left:35%;
	}
	.box1{
		font-size: 120%;
		position: absolute;
		left:75%;
	}
	.box2{
		font-size: 120%;
		width: 80%;
		height: 50%;
		position: relative;
		left: 8%;

	}
	#save{
		position: absolute;
		left: 77%;
		top: 79%;
		font-size: 130%;
		width: 10%;
		height: 8%;
	}
	.logo{


		width: 80%;
		position: relative;
	    left: 10%;
	}

</style>
<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Packages.php");
require_once(__ROOT__ . "model/Requests.php");
require_once(__ROOT__ . "model/Reservations.php");
require_once(__ROOT__ . "model/Hotels.php");
require_once(__ROOT__ . "controller/StaffController.php");
require_once(__ROOT__ . "view/ViewStaff.php");


$packagemodel = new Packages();
$requestmodel = new Requests();
$reservationmodel = new Reservations();
$hotelmodel = new Hotels();
$controller = new StaffController($packagemodel,$requestmodel,$reservationmodel);
$view = new ViewStaff($controller,$packagemodel,$requestmodel,$reservationmodel,$hotelmodel);


if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'AddPackages':
			echo $view->AddPackages();
			break;
		case 'ViewPackages':
			echo $view->viewPackages();
			break;
		case 'ViewRequests':
			echo $view->viewRequests();
			break;
		case 'ViewReservations':
			echo $view->viewReservations();
			break;
		case'addPackageAction':
			$controller->insertPackage();
			echo $view->viewPackages();
			break;
			case'logout':
			session_destroy();
			header("Location:Register.php");
			break;

}}
else
	echo $view->AddPackages();

?>
