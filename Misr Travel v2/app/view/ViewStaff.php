<?php

require_once(__ROOT__ . "view/View.php");

class ViewStaff extends View{

  protected $packagemodel;
  protected $requestmodel;
  protected $reservationmodel;
  protected $hotelmodel;

  public function __construct($controller,$packagemodel,$requestmodel,$reservationmodel,$hotelmodel) {
        $this->controller = $controller;
        $this->packagemodel = $packagemodel;
        $this->requestmodel = $requestmodel;
        $this->reservationmodel = $reservationmodel;
        $this->hotelmodel = $hotelmodel;
    }



  private $str="";
  private $str2='<body>
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

	function AddPackages(){
		$this->str.='<div class="profile">
		<form action="Staff.php?action=addPackageAction" method="post">
		<br><br><label class="text"><b>Name</b></label>
	    <input type="text" name="name" class="box" required>
	    <br><br><br>
	    <label class="text"><b>Check-in</b></label>
	    <input type="date" name="checkin" class="box" required>
	    <label class="text1"><b>Check-out</b></label>
		<input type="date" name="checkout" class="box1" required>
		<br><br><br>

	    <label class="text"><b>Hotel</b></label>

		<select name="hotel" class="box" required required>';
		foreach ($this->hotelmodel->getHotels() as $hotel) {
		$this->str.='<option value="'.$hotel->getID().'">'.$hotel->getLocation().'</option>';
		echo $hotel->getID();
		echo $hotel->getLocation();
		}
		$this->str.='<label class="text"><b>Price</b></label>
	    <input type="text" name="price" class="box1" required>
	    <br><br><br>
	    <label class="text"><b>Program Description</b></label>
	    <br><br>
	    <input type="text" name="program" class="box2" required>
	    <br><br><br>
	    <input type="submit" value="Add" class="btn btn-info" name="save" id="save">
		</form>
		</div></div>';
        return $this->str2.$this->str;
	}

	function viewPackages(){
		$this->str.='<div class="DataTable" style="overflow:auto;">
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Check-in</th>
			<th>Check-out</th>
      <th>Price</th>
			<th>Action</th>
    </tr>';

      foreach ($this->packagemodel->getPackages() as $Package)
      {

        $this->str.='<tr>';
        $this->str.='<td>'.$Package->getID().'</td>';
        $this->str.='<td>'.$Package->getName().'</td>';
        $this->str.='<td>'.$Package->getCheckin().'</td>';
        $this->str.='<td>'.$Package->getCheckout().'</td>';
        $this->str.='<td>'.$Package->getPrice().'</td>';
        $this->str.='</tr>';

      }

    	$this->str.='</table>
          </div></div>';
        return $this->str2.$this->str;
	}

	public function viewRequests(){
		$this->str.='<div class="DataTable" style="overflow:auto;">
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Agency</th>
			<th>Tourists No.</th>
			<th>Check-in</th>
			<th>Check-out</th>
      <th>Price</th>
			<th>Status</th>
			<th>Action</th>
    </tr>';

    foreach ($this->requestmodel->getRequests() as $Request)
    {

      $this->str.='<tr>';
      $this->str.='<td>'.$Request->getID().'</td>';
      $this->str.='<td>'.$Request->getAgencyId().'</td>';
      $this->str.='<td>'.$Request->getTouristsNo().'</td>';
      $this->str.='<td>'.$Request->getCheckin().'</td>';
      $this->str.='<td>'.$Request->getCheckout().'</td>';
      $this->str.='<td>'.$Request->getPrice().'</td>';
      $this->str.='<td>'.$Request->getStatus().'</td>';
      $this->str.='</tr>';



    }

    $this->str.='</table>
          </div></div>';
          return $this->str2.$this->str;
	}

  function viewReservations(){
    $this->str.='<div class="DataTable" style="overflow:auto;">
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Tourist</th>
			<th>Package</th>
			<th>Check-in</th>
			<th>Action</th>
    </tr>';

      foreach ($this->reservationmodel->getReservations() as $Reservation)
      {

        $this->str.='<tr>';
        $this->str.='<td>'.$Reservation->getID().'</td>';
        $this->str.='<td>'.$Reservation->getTouristId().'</td>';
        $this->str.='<td>'.$Reservation->getPackage()->getName().'</td>';
        $this->str.='<td>'.$Reservation->getPackage()->getCheckin().'</td>';
        $this->str.='</tr>';

      }

    $this->str.='</table>
          </div></div>';
          return $this->str2.$this->str;
  }

}
?>
