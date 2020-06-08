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
require_once(__ROOT__ . "model/Exceptions.php");

$conn = new mysqli("localhost", "root", "", "travellingcompany");
$verify= False;

if(isset($_SESSION))
{
	if(!empty($_SESSION['ID'])&&!empty($_SESSION['email'])){
	$sql="SELECT * FROM credentials WHERE UserID= ".$_SESSION['ID']." AND Email='".$_SESSION['email']."' AND Type='S'";
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
		case 'addPackageAction':

		$_POST['name']=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$_POST['price']=filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
$_POST['program']=filter_var($_POST['program'],FILTER_SANITIZE_STRING);

try
{

if(empty($_POST['name'])||empty($_POST['price'])||empty($_POST['program']))
{
	throw new Exception("Data cant be left empty");
}

if(strlen($_POST['name'])<3||strlen($_POST['name'])>15)
{
throw new NameException($_POST['name']);
}

if($_POST['price']<0||$_POST['name']>999999)
{
throw new Exception("invalid price;price must be between 0 and 999999");
}

if(strlen($_POST['program'])<5||strlen($_POST['program'])>10000)
{
throw new Exception("invalid description; description must be between 5 - 10000 character");
}

$valid=false;
$valid1=false;
$today=getDate();
$chIn=strtotime($_POST['checkin']);
$chOut=strtotime($_POST['checkout']);

$CIDay=(int)date('d',$chIn);
$CIMonth=(int)date('m',$chIn);
$CIYear=(int)date('Y',$chIn);

$CODay=(int)date('d',$chOut);
$COMonth=(int)date('m',$chOut);
$COYear=(int)date('Y',$chOut);

if($CIYear>$today['year']&&!$valid)
{
	$valid=True;
}
else if($CIYear==$today['year']&&!$valid)
{
	if($CIMonth>$today['mon']&&!$valid)
	{
		$valid=True;
	}
	else if($CIMonth==$today['mon']&&!$valid)
	{
		if($CIDay>$today['mday']&&!$valid)
		{
			$valid=True;
		}
		else {
			{$valid=false;}
		}
	}

}

if($COYear>$CIYear&&!$valid1)
{
	$valid1=True;
}
else if($COYear==$CIYear&&!$valid1)
{
	if($COMonth>$CIMonth&&!$valid1)
	{
		$valid1=True;
	}
	else if($COMonth==$CIMonth&&!$valid1)
	{
		if($CODay>$CIDay&&!$valid1)
		{
			$valid1=True;
		}
		else
		{$valid1=false;}

	}

}

if($valid==True&&$valid1==True)
{
echo $controller->insertPackage();
echo $view->viewPackages();
}
else
{
throw new Exception("Invalid Date");
}
}//try
catch(NameException $e)
{
	echo "<script>alert('".$e->errorMessage()."')</script>";
}
catch(Exception $e)
{
	echo "<script>alert('".$e->getMessage()."')</script>";
}

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

}}
else
	echo $view->AddPackages();

?>
