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
<body>

	<div class="rectangle">
	 <div class="sidenav">
	  <img src="img1.png" class="logo">

	  <br><br><br>
	  <a onclick="AddPackages()">Add Packages</a>
	  <br><br>
	  <a onclick="ViewPackages()">View Packages</a>
	  <br><br>
	  <a onclick="ViewRequests()">View Requests</a>
	  <br><br>
	  <a onclick="ViewReservations()">View Reservations</a>
	  <br><br>
	  <br>
	  <a href="logout.php">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a> 
	  
	  </div>
        
       <script>
		    $(document).ready(function(){
		        AddPackages();
		    });
	  </script>
	  <script>
		function AddPackages() {

			document.getElementById("AddPackage").style.display = "block";
			document.getElementById("Packages").style.display = "none";
			document.getElementById("Requests").style.display = "none";
			document.getElementById("Reservations").style.display = "none";

		}

		function ViewPackages() {

			document.getElementById("AddPackage").style.display = "none";
			document.getElementById("Packages").style.display = "block";
			document.getElementById("Requests").style.display = "none";
			document.getElementById("Reservations").style.display = "none";

		}

		function ViewRequests() {

			document.getElementById("AddPackage").style.display = "none";
			document.getElementById("Packages").style.display = "none";
			document.getElementById("Requests").style.display = "block";
			document.getElementById("Reservations").style.display = "none";

		}

		function ViewReservations() {

			document.getElementById("AddPackage").style.display = "none";
			document.getElementById("Packages").style.display = "none";
			document.getElementById("Requests").style.display = "none";
			document.getElementById("Reservations").style.display = "block";

		}
	   </script>


	    <div class="DataTable" style="overflow:auto;" id="AddPackage"> <!-- Add package block -->
		
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

	    <label class="text"><b>Price</b></label>
	    <input type="text" value="number" name="tourists" class="box" >
	    <br><br><br>

	    <label class="text"><b>Program Description</b></label>
	    <br><br>
	    <input type="text" value="Description" name="description" class="box2" >
	    <br><br><br>

	    <input type="submit" value="Add" class="btn btn-info" name="save" id="save">
	  	

	  
		</form>
		</div></div>



	    <div class="DataTable" style="overflow:auto;" id="Packages">  <!-- Packages block -->
		
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Check-in</th>
			<th>Check-out</th>
			<th>Status</th>
			<th>Action</th>
		</thead> 
    		<tbody>
    		<!-- Packages database php-->
			</tbody>
		</table>
		</div>

		<div class="DataTable" style="overflow:auto;" id="Requests">  <!-- Requests block -->
		
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Agency</th>
			<th>Tourists No.</th>
			<th>Check-in</th>
			<th>Check-out</th>
			<th>Status</th>
			<th>Action</th>
		</thead> 
    		<tbody>
    		<!-- Requests database php-->
			</tbody>
		</table>
		</div>
		
		<div class="DataTable" style="overflow:auto;" id="Reservations">  <!-- Reservations block -->
		
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Tourist</th>
			<th>Package</th>
			<th>Date</th>
			<th>Status</th>
			<th>Action</th>
		</thead> 
    		<tbody>
    		<!-- Reservations database php-->
			</tbody>
		</table>
		</div>
		     	
	</div>
</body>
</html>
