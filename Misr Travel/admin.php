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

</style>
<body>

	<div class="rectangle">
	 <div class="sidenav">
	  <img src="img1.png" class="logo">

	  <br><br><br>
	  <a onclick="ShowTourists()">Tourists</a>
	  <br><br>
	  <a onclick="ShowAgencies()">Agencies</a>
	  <br><br>
	  <a onclick="ShowRequests()">Requests</a>
	  <br><br>
	  <a onclick="ShowPackages()">Packages</a>
	  <br><br>
	  <a onclick="ShowReservations()">Reservations</a>
	  <br><br>
	  <a onclick="ShowStaff()">Staff</a>
	  <br><br>
	  <a onclick="ShowDepartments()">Departments</a>
	  <br><br>
	  <br>
	  <a href="logout.php">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a> 
	  
	  </div>
        
       <script>
		    $(document).ready(function(){
		        ShowTourists();
		    });
	  </script>
	  <script>
		function ShowTourists() {

			document.getElementById("Tourists").style.display = "block";
			document.getElementById("Agencies").style.display = "none";
			document.getElementById("Requests").style.display = "none";
			document.getElementById("Packages").style.display = "none";
			document.getElementById("Reservations").style.display = "none";
			document.getElementById("Staff").style.display = "none";
			document.getElementById("Departments").style.display = "none";

		}

		function ShowAgencies() {

			document.getElementById("Tourists").style.display = "none";
			document.getElementById("Agencies").style.display = "block";
			document.getElementById("Requests").style.display = "none";
			document.getElementById("Packages").style.display = "none";
			document.getElementById("Reservations").style.display = "none";
			document.getElementById("Staff").style.display = "none";
			document.getElementById("Departments").style.display = "none";

		}

		function ShowRequests() {

			document.getElementById("Tourists").style.display = "none";
			document.getElementById("Agencies").style.display = "none";
			document.getElementById("Requests").style.display = "block";
			document.getElementById("Packages").style.display = "none";
			document.getElementById("Reservations").style.display = "none";
			document.getElementById("Staff").style.display = "none";
			document.getElementById("Departments").style.display = "none";

		}

		function ShowPackages() {

			document.getElementById("Tourists").style.display = "none";
			document.getElementById("Agencies").style.display = "none";
			document.getElementById("Requests").style.display = "none";
			document.getElementById("Packages").style.display = "block";
			document.getElementById("Reservations").style.display = "none";
			document.getElementById("Staff").style.display = "none";
			document.getElementById("Departments").style.display = "none";

		}

		function ShowReservations() {

			document.getElementById("Tourists").style.display = "none";
			document.getElementById("Agencies").style.display = "none";
			document.getElementById("Requests").style.display = "none";
			document.getElementById("Packages").style.display = "none";
			document.getElementById("Reservations").style.display = "block";
			document.getElementById("Staff").style.display = "none";
			document.getElementById("Departments").style.display = "none";

		}

		function ShowStaff() {

			document.getElementById("Tourists").style.display = "none";
			document.getElementById("Agencies").style.display = "none";
			document.getElementById("Requests").style.display = "none";
			document.getElementById("Packages").style.display = "none";
			document.getElementById("Reservations").style.display = "none";
			document.getElementById("Staff").style.display = "block";
			document.getElementById("Departments").style.display = "none";

		}

		function ShowDepartments() {

			document.getElementById("Tourists").style.display = "none";
			document.getElementById("Agencies").style.display = "none";
			document.getElementById("Requests").style.display = "none";
			document.getElementById("Packages").style.display = "none";
			document.getElementById("Reservations").style.display = "none";
			document.getElementById("Staff").style.display = "none";
			document.getElementById("Departments").style.display = "block";

		}
	   </script> 
        <div class="DataTable" style="overflow:auto;" id="Tourists">  <!-- Tourists block -->
		
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Nationality</th>
			<th>Passport No.</th>
			<th>Action</th>
		</thead> 
    		<tbody>
    		<!-- Tourists database php-->
			</tbody>
		</table>
		</div>


		<div class="DataTable" style="overflow:auto;" id="Agencies">  <!-- Agencies block -->
		
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Country</th>
			<th>Address</th>
			<th>Action</th>
		</thead> 
    		<tbody>
    		<!-- Agencies database php-->
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
		<div class="DataTable" style="overflow:auto;" id="Staff">  <!-- Staff block -->
			<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a href="#addStaff" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Staff</a></span>
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Department</th>
			<th>Action</th>
		</thead> 
    		<tbody>
    		<!-- Staff database php-->
			</tbody>
		</table>
		</div>
		<div class="DataTable" style="overflow:auto;" id="Departments">  <!-- Departments block -->
			<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a href="#addDep" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Department</a></span>
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Staff</th>
			<th>Action</th>
		</thead> 
    		<tbody>
    		<!-- Departments database php-->
			</tbody>
		</table>
		</div>


	
        
        
	
	</div>
</body>
</html>
