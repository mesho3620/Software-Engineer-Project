<?php
// Start the session
session_start();
?>
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
<body>
	
	<div class="rectangle">
	 <div class="sidenav">
	 <img src="img1.png" class="logo">
	  <br><br>
	  <h1>Agency Name</h1>
	  <br><br><br>
	  <a onclick="Profile()">Profile</a>
	  <br><br>
	  <a onclick="Addrequest()">Add request</a>
	  <br><br>
	  
	  <a onclick="Viewrequests()">View requests</a>
	  <br><br>
	  
	  <a onclick="ShowHistory()">History</a>
	  <br><br><br>
	  
	  <a href="logout.php">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a> 
	  
	  </div>
	  	  <script>
		    $(document).ready(function(){
		        Profile();
		    });
	  </script>
	  <script>
		function Profile() {
			document.getElementById("Profile").style.display = "block";
			document.getElementById("Addrequest").style.display = "none";
			document.getElementById("Viewrequests").style.display = "none";
			document.getElementById("History").style.display = "none";

		}
		function Addrequest() {
			document.getElementById("Profile").style.display = "none";
			document.getElementById("Addrequest").style.display = "block";
			document.getElementById("Viewrequests").style.display = "none";
			document.getElementById("History").style.display = "none";

		}
		function Viewrequests() {
			document.getElementById("Profile").style.display = "none";
			document.getElementById("Addrequest").style.display = "none";
			document.getElementById("Viewrequests").style.display = "block";
			document.getElementById("History").style.display = "none";

		}
		function ShowHistory() {
			document.getElementById("Profile").style.display = "none";
			document.getElementById("Addrequest").style.display = "none";
			document.getElementById("Viewrequests").style.display = "none";
			document.getElementById("History").style.display = "block";

		}
		</script>

		

		<div class="DataTable" style="overflow:auto;" id="Profile"> <!-- Profile block -->
		
		<div class="profile">
		<form action="" method="post">
		<br><br>
	    
	    <label class="text"><b>Name</b></label>
	    <input type="text" value="Name" name="name" class="box" readonly>
	    <br><br><br><br>

	    <label class="text"><b>Email</b></label>
		<input type="text" value="email.com" name="email" class="box">
		<br><br><br><br>

	    <label class="text"><b>Mobile</b></label>
	    <input type="text" value="Mobile" name="mobile" class="box" >
	    <br><br><br><br>

	    <label class="text"><b>Country</b></label>
		<input type="text" value="Country" name="country" class="box" readonly>
	    <br><br><br><br>

	    <label class="text"><b>Address</b></label>
	    <input type="text" value="address" name="address" class="box" >
	    <br><br><br>

	    <input type="submit" value="Save" class="btn btn-info" name="save" id="save">
	  	

	  
		</form>
		</div></div>

		<div class="DataTable" style="overflow:auto;" id="Addrequest"> <!-- Add request block -->
		
		<div class="profile">
		<form action="" method="post">
		<br><br>
	    
	    <label class="text"><b>Check-in</b></label>
	    <input type="date" name="checkin" class="box">

	    <label class="text1"><b>Check-out</b></label>
		<input type="date" name="checkout" class="box1">
		<br><br><br><br>

	    <label class="text"><b>Hotel Rate</b></label>
		<input type="text" value="Rate" name="rate" class="box">

	    <label class="text1"><b>Hotel Location</b></label>
	    <input type="text" value="Location" name="location" class="box1" >
	    <br><br><br>

	    <label class="text"><b>Number of Tourists</b></label>
	    <input type="text" value="number" name="tourists" class="box" >
	    <br><br><br>

	    <label class="text"><b>Program Description</b></label>
	    <br><br>
	    <input type="text" value="Description" name="description" class="box2" >
	    <br><br><br>

	    <input type="submit" value="Save" class="btn btn-info" name="save" id="save">
	  	

	  
		</form>
		</div></div>

		<div class="DataTable" style="overflow:auto;" id="Viewrequests">  <!-- Pending Requests block -->
		
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Check-in</th>
			<th>Check-out</th>
			<th>Tourists No.</th>
			<th>Hotel</th>
			<th>Price</th>
			<th>Status</th>
			<th>Action</th>
		</thead> 
    		<tbody>
    		<!-- Pending database php-->
			</tbody>
		</table>
		</div>

		<div class="DataTable" style="overflow:auto;" id="History">  <!-- History of Requests block -->
		
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Check-in</th>
			<th>Check-out</th>
			<th>Tourists No.</th>
			<th>Hotel</th>
			<th>Price</th>
			<th>Action</th>
		</thead> 
    		<tbody>
    		<!-- History database php-->
			</tbody>
		</table>
		</div>


	

</body>
</html>


