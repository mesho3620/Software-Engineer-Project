<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Tourist.php");
require_once(__ROOT__ . "controller/TouristController.php");
require_once(__ROOT__ . "view/ViewHome.php");
require_once(__ROOT__ . "model/Package.php");
require_once(__ROOT__ . "model/Packages.php");
require_once(__ROOT__ . "view/ViewPackage.php");
require_once(__ROOT__ . "model/Reservations.php");
include("css/home.css");
include("TopBar.php");
include("js/viewPackage.php");
include("css/viewPackage.css");

//
// $name="Mohmaed";
// $email="Saed";
// $password="123";
// $mobile="01125811644";
// $nationality="eg";
// $passport_number="002";
// $t=new Tourists();
// $t->insertTourist(insertTourist$name,$email,$password,$mobile,$nationality,$passport_number);
$_SESSION['ID']=1;
$touristmodel = new Tourist($_SESSION["ID"]);
$packagemodel=new Packages();
$reservationsmodel=new Reservations();
$controller = new TouristController($reservationsmodel,$packagemodel);
$view = new ViewHome($controller, $touristmodel);



if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'edit':																								//missing
			echo $view->editForm();
			break;
		case 'editaction':																								//missing
			$controller->edit();
			echo $view->output();
			break;
		case 'book':
			$controller->insertReservation();
			echo $view->output();
			break;
		case 'viewPackage':
			$model2=new Package($_REQUEST['SelectedPackage']);
			$view2 = new ViewPackage($controller, $model2);
			echo $view2->output();
			break;
		case 'remove':																								//missing
			$controller->deleteReservation();
			echo $view->output();
		case 'signOut':																								//missing
			session_destroy();
			header("Location:index.php");
			break;
	}
}
else
	echo $view->output();

?>
