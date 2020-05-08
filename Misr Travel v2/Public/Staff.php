<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Employee.php");
require_once(__ROOT__ . "controller/StaffController.php");
require_once(__ROOT__ . "view/ViewStaff.php");

$model = new Employee($_SESSION["ID"]);
$controller = new StaffController($model);
$view = new ViewStaff($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'AddPackages':
			echo $view->output($view->AddPackages());
			break;
		case 'addPackageAction':
			$controller->insertPackage();
			echo $view->output($view->viewPackages());
			break;
		case 'ViewPackages':
			$view->output(viewPackages());
			break;
		case 'viewReservations':
			$view->output(viewPackages());
			break;
		case 'ViewRequests':
			$view->output(viewRequests());
			break;
		case 'logout':
			session_destroy();
			header("Location:index.php");
			break;
	}
}
else
	echo $view->output();

?>
