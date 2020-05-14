<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="icon" type="image/ico" href="img2.png"  />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">

	body{
	background-image:url(img3.png);
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

	.profile{
	width:80%;
	float: left;
	height: 100%;
	padding-top: 5%;

	}
	.rectangle{
	  background: rgba(255, 255, 255,1);
	  position: absolute;
	  left: 5%;
	  top: 5%;
	  width: 90%;
	  height: 90%;

	}

	.profile_picture{

		border-radius: 50%;
		width: 50%;
		position: relative;
	    left: 25%;
	}
	.sidenav h1{

	  color: white;
	  font: 150% bold;
	  text-align: center;;
	}
	.text {
		font: 140% bold;
		color: black;
		padding-left:8%;

	}
	.text1 {
		font: 140% bold;
		color: black;
		padding-left:50%;

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
		left:40%;
	}
	.box1{
		font-size: 120%;
		position: absolute;
		left:75%;
	}
	.box2{
		font-size: 120%;
		width: 100%;
		height: 50%;
		position: relative;
		left: 8%;

	}
	.file1{
		position: absolute;
		left: 38%;
		top: 79%;
	}
	.file2{
		position: absolute;
		left: 75%;
		top: 79%;
	}
	.file3{
		position: absolute;
		left: 38%;
		top: 11%;
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
require_once(__ROOT__ . "model/Agency.php");
require_once(__ROOT__ . "model/Agencies.php");
require_once(__ROOT__ . "model/Request.php");
require_once(__ROOT__ . "model/Requests.php");
require_once(__ROOT__ . "model/Hotels.php");
require_once(__ROOT__ . "controller/AgencyController.php");
require_once(__ROOT__ . "view/ViewAgency.php");

$agencymodel = new Agency($_SESSION['id']);
$requestmodel = new Requests();
$hotelmodel = new Hotels();
$controller = new AgencyController($requestmodel,$agencymodel);
$view = new ViewAgency($controller,$requestmodel,$hotelmodel);

if (isset($_GET['action2']) && !empty($_GET['action2'])) {
	switch($_GET['action2']){
		case 'DeleteAgency':
			$controller->deleteAgency();
			break;
		}
}

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'editProfile':
			echo $view->editProfile();
			break;
		case 'addRequest':
			echo $view->addRequest();
			break;
		case 'viewRequest':
			echo $view->viewRequests();
			break;
		case 'viewHistory':
			echo $view->viewHistory();
			break;
		case 'addRequestAction':
			echo $controller->insertRequest();
			echo $view->viewRequests();
			break;

		case 'editProfileAction':
			echo $controller->editAgency();
			echo $view->editProfile();
			break;

		case 'DeleteRequest1':
			$controller->deleteRequest();
			header("Location:Agency.php?action=viewRequest");
			break;
		case 'DeleteRequest2':
			$controller->deleteRequest();
			header("Location:Agency.php?action=viewHistory");
			break;
			case'logout':
			session_destroy();
			header("Location:Register.php");
			break;
		}

	if(isset($_POST['editProfileAction'])){

		$controller->editAgency();
		header("Location:Agency.php?action=editProfile");
	}
	if(isset($_POST['addRequest'])){

		$controller->insertRequest();
		header("Location:Agency.php?action=viewRequest");
	}
}
else
	echo $view->editProfile();

?>
