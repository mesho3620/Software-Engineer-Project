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
require_once(__ROOT__ . "model/Exceptions.php");

$conn = new mysqli("localhost", "root", "", "travellingcompany");
$verify= False;

if(isset($_SESSION))
{
	if(!empty($_SESSION['ID'])&&!empty($_SESSION['email'])){
	$sql="SELECT * FROM credentials WHERE UserID= ".$_SESSION['ID']." AND Email='".$_SESSION['email']."' AND Type='A'";
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

$agencymodel = new Agency($_SESSION['ID']);
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

		$_POST['name']=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
		$_POST['touristsno']=filter_var($_POST['touristsno'],FILTER_SANITIZE_NUMBER_INT);
		$_POST['program']=filter_var($_POST['program'],FILTER_SANITIZE_STRING);

		try
		{

		if(empty($_POST['name'])||empty($_POST['touristsno'])||empty($_POST['program']))
		{
			throw new Exception("Data cant be left empty");
		}

		if(strlen($_POST['name'])<3||strlen($_POST['name'])>15)
		{
		throw new NameException($_POST['name']);
		}

		if($_POST['touristsno']<0||$_POST['touristsno']>200)
		{
		throw new Exception("invalid tourists number;must be between 0 and 200");
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
		echo $controller->insertRequest();
		echo $view->viewRequests();
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

		case 'editProfileAction':

		$_POST['name']=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$_POST['email']=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$_POST['country']=filter_var($_POST['country'], FILTER_SANITIZE_EMAIL);
$_POST['address']=filter_var($_POST['address'], FILTER_SANITIZE_STRING);

try
{
	if(empty($_POST['name'])||empty($_POST['email'])||empty($_POST['country'])||empty($_POST['address'])||empty($_POST['password'])||empty($_POST['mobile']))
	{
		throw new Exception("Data cant be left empty");
	}

if(strlen($_POST['name'])<3||strlen($_POST['name'])>15)
{
throw new NameException($_POST['name']);
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 									//***********************************
{
	throw new EmailException($_POST['email']);
}

if(strlen($_POST['country'])<3||strlen($_POST['country'])>20)
{
throw new Exception($_POST['country']);
}

if(strlen($_POST['address'])<5||strlen($_POST['address'])>50)
{
throw new Exception($_POST['address']);
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

$MobileSql="SELECT * FROM agencies where Id !='".$_SESSION['ID']."' AND Mobile ='".$_POST['mobile']."';";
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
echo $controller->editAgency();
echo $view->editProfile();

}//try
catch(NameException $e)
{
	echo "<script>alert('".$e->errorMessage()."')</script>";
	echo $view->editProfile();

}
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

		case 'DeleteRequest1':
			$controller->deleteRequest();
			header("Location:Agency.php?action=viewRequest");
			break;
		case 'DeleteRequest2':
			$controller->deleteRequest();
			header("Location:Agency.php?action=viewHistory");
			break;
		}

	if(isset($_POST['addRequest'])){

		$controller->insertRequest();
		header("Location:Agency.php?action=viewRequest");
	}
}
else
	echo $view->editProfile();

?>
