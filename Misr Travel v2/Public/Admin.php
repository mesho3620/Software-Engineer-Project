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
require_once(__ROOT__ . "model/Exceptions.php");

$conn = new mysqli("localhost", "root", "", "travellingcompany");
$verify= False;

if(isset($_SESSION))
{
	if(!empty($_SESSION['ID'])&&!empty($_SESSION['email'])){
	$sql="SELECT * FROM credentials WHERE UserID= ".$_SESSION['ID']." AND Email='".$_SESSION['email']."' AND Type='AD'";
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


	if(isset($_POST['addEmployee']))
	{

	  $_POST['name']=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	  $_POST['email']=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

	try
	{
	  $email=$_POST['email'];

	  if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['mobile'])||empty($_POST['password']))
	  {
	    throw new Exception("Data cant be left empty");
	  }

	  if(strlen($_POST['name'])<3||strlen($_POST['name'])>15)
	{

	  throw new NameException($_POST['name']);
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 									//***********************************
	{
	  throw new EmailException($email);
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

	$MobileSql="SELECT * FROM staff where Mobile ='".$_POST['mobile']."';";
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
	    throw new Exception("Email Address already exists");

	  }

	}
	else
	{
	  $sqlErr=TRUE;
	  throw new SqlException($EmailSql);
	}


	$controller->insertStaff();

	} //Try
	catch(SqlException $e)
	{
		echo "<script>alert('".$e->errorMessage()."')</script>";
	}
	catch(NameException $e)
	{
		echo "<script>alert('".$e->errorMessage()."')</script>";
	}
	catch(EmailException $e)
	{
		echo "<script>alert('".$e->errorMessage()."')</script>";
	}
	catch(Exception $e)
	{
		echo "<script>alert('".$e->getMessage()."')</script>";
	}

}

	if(isset($_POST['addHotel'])){

	 $_POST['city']=filter_var($_POST['city'],FILTER_SANITIZE_STRING);
	 $_POST['location']=filter_var($_POST['location'],FILTER_SANITIZE_STRING);
	 try
	 {
	 if(empty($_POST['city'])||empty($_POST['location']))
	 {
	 	throw new Exception("Data cant be left empty");
	 }
	 if(strlen($_POST['city'])<3||strlen($_POST['city'])>15)
	 {

	 throw new NameException($_POST['city']);
	 }
	 if(strlen($_POST['location'])<3||strlen($_POST['location'])>15)
	 {

	 throw new NameException($_POST['location']);
	 }
	 $controller->insertHotel();
	 header("Location:Admin.php?action=ViewHotels");
	 }//try
	 catch(NameException $e)
	 {
	 	echo "<script>alert('".$e->errorMessage()."')</script>";
	 }
	 catch(Exception $e)
	 {
	 	echo "<script>alert('".$e->getMessage()."')</script>";
	 }

	}

	if(isset($_POST['addDepartment'])){

		$_POST['name']=filter_var($_POST['name'],FILTER_SANITIZE_STRING);

		try
		{
		 if(empty($_POST['name']))
		 {
			 throw new Exception("Data cant be left empty");
		 }
		 if(strlen($_POST['name'])<2||strlen($_POST['name'])>15)
		{

		 throw new NameException($_POST['name']);
		}
		$DepartmentNameSql="SELECT * FROM departments where Name ='".$_POST['name']."';";
		if($result = mysqli_query($conn,$DepartmentNameSql))
		{

			if(mysqli_num_rows($result)>0)
			{

				$exists=TRUE;
				throw new Exception("Department name already exists");

			}
		}
		else
		{

			$sqlErr=TRUE;
			throw new SqlException($DepartmentNameSql);
		}

		$controller->insertDepartment();
		header("Location:Admin.php?action=ViewDepartments");
	}//Try
		catch(NameException $e)
		{
			echo "<script>alert('".$e->errorMessage()."')</script>";
		}
		catch(Exception $e)
		{
			echo "<script>alert('".$e->getMessage()."')</script>";
		}

	}
}
else
	echo $view->showTourists();


?>
