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

</style>
<?php

define('__ROOT__', "../app/");

require_once(__ROOT__ . "model/Tourists.php");
require_once(__ROOT__ . "model/Agencies.php");
require_once(__ROOT__ . "model/Employees.php");
require_once(__ROOT__ . "model/Departments.php");
require_once(__ROOT__ . "model/Packages.php");
require_once(__ROOT__ . "model/Requests.php");
require_once(__ROOT__ . "model/Reservations.php");
require_once(__ROOT__ . "model/Hotels.php");
require_once(__ROOT__ . "controller/AdminController.php");
require_once(__ROOT__ . "view/ViewAdmin.php");

$touristmodel = new Tourists();
$agencymodel = new Agencies();
$staffmodel = new Employees();
$departmentmodel = new Departments();
$packagemodel = new Packages();
$requestmodel = new Requests();
$reservationmodel = new Reservations();
$hotelmodel = new Hotels();
$controller = new AdminController($touristmodel,$agencymodel,$staffmodel,$departmentmodel,$packagemodel,$requestmodel,$reservationmodel,$hotelmodel);
$view = new ViewAdmin($controller,$touristmodel,$agencymodel,$staffmodel,$departmentmodel,$packagemodel,$requestmodel,$reservationmodel,$hotelmodel);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'ViewTourists':
			echo $view->showTourists();
			break;
		case 'ViewAgencies':
			echo $view->showAgencies();
			break;
		case 'ViewRequests':
			echo $view->showRequests();
			break;
		case 'ViewPackages':
			echo $view->showPackages();
			break;
		case 'ViewReservations':
			echo $view->showReservations();
			break;
		case 'ViewStaff':
			echo $view->showStaff();
			break;
		case 'addStaff':
			echo $view->addStaff();
			break;
		case 'ViewDepartments':
			echo $view->showDepartments();
			break;
		case 'ViewHotels':
			echo $view->showHotels();
			break;
		case 'AddHotel':
			echo $view->addHotel();
			break;
		case 'DeleteAgency':
			$controller->deleteAgency();
			header("Location:Admin.php?action=ViewAgencies");
			break;
		case 'DeleteTourist':
			$controller->deleteTourist();
			header("Location:Admin.php?action=ViewTourists");
			break;
		case 'DeleteStaff':
			$controller->deleteStaff();
			header("Location:Admin.php?action=ViewStaff");
			break;
		case 'DeleteRequest':
			$controller->deleteRequest();
			header("Location:Admin.php?action=ViewRequests");
			break;
		case 'DeletePackage':
			$controller->deletePackage();
			header("Location:Admin.php?action=ViewPackages");
			break;
		case 'DeleteReservation':
			$controller->deleteReservation();
			header("Location:Admin.php?action=ViewReservations");
			break;
		case 'DeleteDepartment':
			$controller->deleteDepartment();
			header("Location:Admin.php?action=ViewDepartments");
			break;
		case 'DeleteHotel':
			$controller->deleteHotel();
			header("Location:Admin.php?action=ViewHotels");
			break;


	}
	if(isset($_POST['addEmployee'])){

			$controller->insertStaff();
	}
	if(isset($_POST['addHotel'])){

			$controller->insertHotel();
			header("Location:Admin.php?action=ViewHotels");
	}
	if(isset($_POST['addDepartment'])){

			$controller->insertDepartment();
			header("Location:Admin.php?action=ViewDepartments");
	}
}
else
	echo $view->showTourists();

?>



