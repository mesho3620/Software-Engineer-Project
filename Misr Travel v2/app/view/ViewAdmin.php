<?php

require_once(__ROOT__ . "view/View.php");

class ViewAdmin extends View{

  protected $touristmodel;
  protected $agencymodel;
  protected $staffmodel;
  protected $departmentmodel;
  protected $packagemodel;
  protected $requestmodel;
  protected $reservationmodel;
  protected $hotelmodel;

  public function __construct($controller,$touristmodel,$agencymodel,$staffmodel,$departmentmodel,$packagemodel,$requestmodel,$reservationmodel,$hotelmodel) {
        $this->controller = $controller;
        $this->touristmodel = $touristmodel;
        $this->agencymodel = $agencymodel;
        $this->staffmodel = $staffmodel;
        $this->departmentmodel = $departmentmodel;
        $this->packagemodel = $packagemodel;
        $this->requestmodel = $requestmodel;
        $this->reservationmodel = $reservationmodel;
        $this->hotelmodel = $hotelmodel;
    }
  private $str="";
  protected $str2='<body>
  	<div class="rectangle">
	  <div class="sidenav">
	  <img src="img1.png" class="logo">
	  <br><br><br>
	  <a href="Admin.php?action=ViewTourists">Tourists</a>
	  <br><br>
	  <a href="Admin.php?action=ViewAgencies">Agencies</a>
	  <br><br>
	  <a href="Admin.php?action=ViewRequests">Requests</a>
	  <br><br>
	  <a href="Admin.php?action=ViewPackages">Packages</a>
	  <br><br>
	  <a href="Admin.php?action=ViewReservations">Reservations</a>
	  <br><br>
	  <a href="Admin.php?action=ViewStaff">Staff</a>
	  <br><br>
	  <a href="Admin.php?action=ViewDepartments">Departments</a>
	  <br><br>
    <a href="Admin.php?action=ViewHotels">Hotels</a>
    <br><br>
	  <br>
	  <a href="Admin.php?action=logout">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a>
	  </div>';

	function showTourists(){
		$this->str.='<div class="DataTable" style="overflow:auto;">
    			<table class="table table-striped table-hover">
    			<thead>
    		  <tr>
    			<th>Name</th>
    			<th>Email</th>
    			<th>Mobile</th>
    			<th>Nationality</th>
    			<th>Passport No.</th>
    			<th>Action</th>
          </tr>';

          foreach ($this->touristmodel->getTourists() as $Tourist)
          {

            $this->str.='<tr>';
            $this->str.='<td>'.$Tourist->getName().'</td>';
            $this->str.='<td>'.$Tourist->getEmail().'</td>';
            $this->str.='<td>'.$Tourist->getMobile().'</td>';
            $this->str.='<td>'.$Tourist->getNationality().'</td>';
            $this->str.='<td>'.$Tourist->getPassport_Number().'</td>';
            $this->str.='</tr>';

          }

    		  $this->str.='</table>
    		  </div></div>';
          return $this->str2.$this->str;

	}

	function showAgencies(){
		$this->str='<div class="DataTable" style="overflow:auto;">
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Country</th>
			<th>Address</th>
			<th>Action</th>
    </tr>';

      foreach ($this->agencymodel->getAgencies() as $Agency)
      {

        $this->str.='<tr>';
        $this->str.='<td>'.$Agency->getName().'</td>';
        $this->str.='<td>'.$Agency->getEmail().'</td>';
        $this->str.='<td>'.$Agency->getMobile().'</td>';
        $this->str.='<td>'.$Agency->getCountry().'</td>';
        $this->str.='<td>'.$Agency->getAddress().'</td>';
        $this->str.='</tr>';

      }

		$this->str.='</table>
          </div></div>';
          return $this->str2.$this->str;
	}

	public function showRequests(){
		$this->str='<div class="DataTable" style="overflow:auto;">
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

  function showPackages(){
    $this->str='<div class="DataTable" style="overflow:auto;" id="Packages">  <!-- Packages block -->
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

  function showReservations(){
    $this->str='<div class="DataTable" style="overflow:auto;">
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

  function showStaff(){
    $this->str='<div class="DataTable" style="overflow:auto;" id="Staff">
			<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a href="#addStaff" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Staff</a></span>
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Department</th>
			<th>Action</th>
    </tr>';

      foreach ($this->staffmodel->getStaff() as $Staff)
      {

        $this->str.='<tr>';
        $this->str.='<td>'.$Staff->getName().'</td>';
        $this->str.='<td>'.$Staff->getEmail().'</td>';
        $this->str.='<td>'.$Staff->getMobile().'</td>';
        $this->str.='<td>'.$Staff->getDepartmentId().'</td>';
        $this->str.='</tr>';

      }

    $this->str.='</table>
          </div></div>';
          return $this->str2.$this->str;
  }

  function showDepartments(){
    $this->str='<div class="DataTable" style="overflow:auto;" id="Departments">  <!-- Departments block -->
			<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a href="#addDep" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Department</a></span>
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Staff</th>
			<th>Action</th>
    </tr>';

      foreach ($this->departmentmodel->getDepartments() as $Department)
      {

        $this->str.='<tr>';
        $this->str.='<td>'.$Department->getID().'</td>';
        $this->str.='<td>'.$Department->getName().'</td>';
        $this->str.='</tr>';

      }

    $this->str.='</table>
          </div></div>';
          return $this->str2.$this->str;
  }
  function showHotels(){
    $this->str='<div class="DataTable" style="overflow:auto;" id="Departments">  <!-- Departments block -->
      <span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a href="#addDep" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Department</a></span>
      <table class="table table-striped table-hover">
      <thead>
     <tr>
      <th>ID</th>
      <th>City</th>
      <th>Location</th>
      <th>Rating</th>
      <th>Action</th>
    </tr>';

      foreach ($this->hotelmodel->getHotels() as $Hotel)
      {

        $this->str.='<tr>';
        $this->str.='<td>'.$Hotel->getID().'</td>';
        $this->str.='<td>'.$Hotel->getCity().'</td>';
        $this->str.='<td>'.$Hotel->getLocation().'</td>';
        $this->str.='<td>'.$Hotel->getRating().'</td>';
        $this->str.='</tr>';

      }

    $this->str.='</table>
          </div></div>';
          return $this->str2.$this->str;
  }
}
?>