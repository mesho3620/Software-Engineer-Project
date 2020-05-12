<?php

require_once(__ROOT__ . "view/View.php");

class ViewStaff extends View{
	public function output($ss=""){
		$str="";
    $str.='<body>
	<div class="rectangle">
	 <div class="sidenav">
	  <img src="img1.png" class="logo">
	  <br><br><br>
	  <a href="staff.php?action=AddPackages">Add Packages</a>
	  <br><br>
	  <a href="staff.php?action=ViewPackages">View Packages</a>
	  <br><br>
	  <a href="staff.php?action=ViewRequests">View Requests</a>
	  <br><br>
	  <a href="staff.php?action=ViewReservations">View Reservations</a>
	  <br><br>
	  <br>
	  <a href="staff.php?action=logout">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a>
	  </div>';
    if($ss!="")
    {
      $str.=$ss;
      $ss="";
    }
    $str.='</div></body>';
		return $str;
	}

	function AddPackages(){
		$str='<div class="profile">
		<form action="Staff.php?action=addPackageAction" method="post">
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
		</div></div>';
		return $str;
	}

	function viewPackages(){
		$str='<div class="DataTable" style="overflow:auto;" id="Packages">  <!-- Packages block -->

			<table class="table table-striped table-hover">
		 <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Check-in</th>
			<th>Check-out</th>
			<th>Status</th>
			<th>Action</th>
    </tr>';

      foreach ($this->model->getPackages() as $Package)
      {

        $str.='<tr>';
        $str.='<td>'.$Package->getID().'</td>';
        $str.='<td>'.$Package->getName().'</td>';
        $str.='<td>'.$Package->getCheckin().'</td>';
        $str.='<td>'.$Package->getCheckout().'</td>';
        $str.='<td>'.$Package->getStatus().'</td>';
        $str.='<td>'.$Package->getAction().'</td>';
        $str.='</tr>';

      }

		$str.='</table>
		</div>';
		return $str;
	}

	public function viewRequests(){
		$str='<div class="DataTable" style="overflow:auto;" id="Requests">  <!-- Requests block -->
			<table class="table table-striped table-hover">
		 <tr>
			<th>ID</th>
			<th>Agency</th>
			<th>Tourists No.</th>
			<th>Check-in</th>
			<th>Check-out</th>
			<th>Status</th>
			<th>Action</th>
    </tr>';

    foreach ($this->model->getRequests() as $Request)
    {

      $str.='<tr>';
      $str.='<td>'.$Request->getID().'</td>';
      $str.='<td>'.$Request->getAgency().'</td>';
      $str.='<td>'.$Request->getTouristsNo().'</td>';
      $str.='<td>'.$Request->getCheckin().'</td>';
      $str.='<td>'.$Request->getCheckout().'</td>';
      $str.='<td>'.$Request->getStatus().'</td>';
      $str.='<td>'.$Request->getAction().'</td>';
      $str.='</tr>';


    }

    $str.='</table>
		</div>';
		return $str;
	}

  function viewReservations(){
    $str='<div class="DataTable" style="overflow:auto;" id="Reservations">  <!-- Reservations block -->
			<table class="table table-striped table-hover">
		 <tr>
			<th>ID</th>
			<th>Tourist</th>
			<th>Package</th>
			<th>Date</th>
			<th>Status</th>
			<th>Action</th>
    </tr>';

      foreach ($this->model->getReservations() as $Reservation)
      {

        $str.='<tr>';
        $str.='<td>'.$Reservation->getID().'</td>';
        $str.='<td>'.$Reservation->getTourist().'</td>';
        $str.='<td>'.$Reservation->getPackage().'</td>';
        $str.='<td>'.$Reservation->getDate().'</td>';
        $str.='<td>'.$Reservation->getStatus().'</td>';
        $str.='<td>'.$Reservation->getAction().'</td>';
        $str.='</tr>';

      }

    $str.='</table>
    </div>';
    return $str;
  }

}
?>
