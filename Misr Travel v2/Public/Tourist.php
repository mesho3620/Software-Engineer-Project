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



$conn = new mysqli("localhost", "root", "", "travellingcompany");
$verify= False;

if(isset($_SESSION))
{
	if(!empty($_SESSION['ID'])&&!empty($_SESSION['email'])){
	$sql="SELECT * FROM credentials WHERE UserID= ".$_SESSION['ID']." AND Email='".$_SESSION['email']."' AND Type='T'";
	$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1)
		{
			$verify= True;
		}
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

			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 									//***********************************
		{
			throw new EmailException($_POST['email']);
		}

		if(!preg_match("/^\d{11}$/",$_POST['mobile']))									//***********************************
		{

			throw new Exception("wrong mobile number ");

		}

		if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/",$_POST['password']))
		{

			throw new Exception(" Password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter");

		}

		$exists=FALSE;
		$sqlErr=FALSE;

		$MobileSql="SELECT * FROM tourists where Id !='".$_SESSION['ID']."' AND Mobile ='".$_POST['mobile']."';";
		$EmailSql="SELECT * FROM credentials where Email ='".$_POST['email']."';";

		if($result = mysqli_query($conn,$MobileSql))
		{

			if(mysqli_num_rows($result)>0)
			{

				$exists=TRUE;
				throw new Exception("Mobile number already exists");

			}
		}
		else
		{

			$sqlErr=TRUE;
			throw new SqlException($MobileSql);
		}
		if($result = mysqli_query($conn,$EmailSql))
		{

			if(mysqli_num_rows($result)>0)
			{

				$exists=TRUE;
				throw new Exception("Email already exists");

			}

		}
		else
		{
			$sqlErr=TRUE;
			throw new SqlException($EmailSql);
		}

		$controller->editProfile();
		$_SESSION['email']=$_POST['email'];
		echo $view->output();

		}//try

		catch(EmailException $e)
		{
			echo "<script>alert('".$e->errorMessage()."')</script>";
			echo $view->editProfile();

		}
		catch(SqlException $e)
		{
			echo "<script>alert('".$e->errorMessage()."')</script>";
			echo $view->editProfile();

		}
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
