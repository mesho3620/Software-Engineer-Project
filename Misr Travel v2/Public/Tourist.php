<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Tourist.php");
require_once(__ROOT__ . "controller/TouristController.php");
require_once(__ROOT__ . "view/ViewHome.php");
require_once(__ROOT__ . "model/Package.php");
require_once(__ROOT__ . "model/Packages.php");
require_once(__ROOT__ . "view/ViewPackage.php");
require_once(__ROOT__ . "model/Reservations.php");
require_once(__ROOT__ . "model/Exceptions.php");
include("css/home.css");
include("css/viewPackage.css");
// include("css/accordion.css");
include("css/TopBar.css");
include("TopBar.php");
include("js/viewPackage.php");



$verify= False;

if(isset($_SESSION))
{
	if(!empty($_SESSION['ID'])&&$_SESSION['Type']=='T'){

			$verify= True;
		}
	}
if($verify== False)
{
	header("Location:Logout.php");

}

//
// $name="Mohmaed";
// $email="Saed";
// $password="123";
// $mobile="01125811644";
// $nationality="eg";
// $passport_number="002";
// $t=new Tourists();
// $t->insertTourist(insertTourist$name,$email,$password,$mobile,$nationality,$passport_number);
//$_SESSION['ID']=1;
if(!isset($_SESSION['ID']))
{
	header("Location:register.php");
}
$touristmodel = new Tourist($_SESSION["ID"]);
$packagesmodel=new Packages();
$reservationsmodel=new Reservations();
$controller = new TouristController($reservationsmodel,$packagesmodel,$touristmodel);
$view = new ViewHome($controller, $touristmodel,$reservationsmodel,$packagesmodel);



if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'edit':
			echo $view->editProfile();
			break;
		case 'editaction':

		$_POST['email']=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

		try
		{
			if(empty($_POST['mobile'])||empty($_POST['password'])||empty($_POST['email']))
			{
				throw new Exception("Data cant be left empty");
			}


		$controller->editProfile();
		$_SESSION['email']=$_POST['email'];
		echo $view->output();

		}//try


		catch(Exception $e)
		{
			echo "<script>alert('".$e->getMessage()."')</script>";
			echo $view->editProfile();

		}

			break;
		case 'book':
			$controller->insertReservation();
			echo $view->output();
			break;
		case 'viewPackage':
			$packagemodel=new Package($_REQUEST['SelectedPackage']);
			$view2 = new ViewPackage($controller,$packagemodel,$reservationsmodel);
			echo $view2->output();
			break;
		case 'viewReserved':
			echo $view->viewReserved();
			break;
		case 'cancelReservation':
			$controller->deleteReservation();
			echo $view->output();
			break;
			case'logout':
			session_destroy();
			header("Location:Register.php");
			break;
	}
}
else
	echo $view->output();

?>
