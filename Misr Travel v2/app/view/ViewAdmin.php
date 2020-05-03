<?php

require_once(__ROOT__ . "view/View.php");

class ViewAdmin extends View{
	public function output($ss=""){
		$str="";
    $str.='<body>

	<div class="rectangle">
	 <div class="sidenav">
	  <img src="img1.png" class="logo">

	  <br><br><br>
	  <a href="Admin.php?action=showTourists">Tourists</a>
	  <br><br>
	  <a href="Admin.php?action=showAgencies">Agencies</a>
	  <br><br>
	  <a href="Admin.php?action=showRequests">Requests</a>
	  <br><br>
	  <a href="Admin.php?action=showPackages">Packages</a>
	  <br><br>
	  <a href="Admin.php?action=showReservations>Reservations</a>
	  <br><br>
	  <a href="Admin.php?action=showStaff">Staff</a>
	  <br><br>
	  <a href="Admin.php?action=showDepartments">Departments</a>
	  <br><br>
	  <br>
	  <a href="Admin.php?action=logout">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a>

	  </div>';
    if($ss!="")
    {
      $str.=$ss;
      $ss="";
    }
    $str.='</div></body>';
		return $str;
	}

	function showTourists(){
		$str='<div class="DataTable" style="overflow:auto;" id="Tourists">  <!-- Tourists block -->

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

          foreach ($this->model->getTourists() as $Tourist)
          {

            $str.='<tr>';
            $str.='<td>'.$Tourist->getName().'</td>';
            $str.='<td>'.$Tourist->getEmail().'</td>';
            $str.='<td>'.$Tourist->getMobile().'</td>';
            $str.='<td>'.$Tourist->getNationality().'</td>';
            $str.='<td>'.$Tourist->getPassportNo().'</td>';
            $str.='<td>'.$Tourist->getAction().'</td>';
            $str.='</tr>';

          }

    		  $str.='</table>
    		  </div>';
		return $str;
	}

	function showAgencies(){
		$str='<div class="DataTable" style="overflow:auto;" id="Agencies">  <!-- Agencies block -->

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

      foreach ($this->model->getAgencies() as $Agency)
      {

        $str.='<tr>';
        $str.='<td>'.$Agency->getName().'</td>';
        $str.='<td>'.$Agency->getEmail().'</td>';
        $str.='<td>'.$Agency->getMobile().'</td>';
        $str.='<td>'.$Agency->getCountry().'</td>';
        $str.='<td>'.$Agency->getAddress().'</td>';
        $str.='<td>'.$Agency->getAction().'</td>';
        $str.='</tr>';

      }

		$str.='</table>
		</div>';
		return $str;
	}

	public function showRequests(){
		$str='<div class="DataTable" style="overflow:auto;" id="Requests">  <!-- Requests block -->

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

  function showPackages(){
    $str='<div class="DataTable" style="overflow:auto;" id="Packages">  <!-- Packages block -->

			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Check-in</th>
			<th>Check-out</th>
			<th>Status</th>
			<th>Action</th>
    </tr>';

      foreach ($this->model->getPackagess() as $Package)
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

  function showReservations(){
    $str='<div class="DataTable" style="overflow:auto;" id="Reservations">  <!-- Reservations block -->

			<table class="table table-striped table-hover">
			<thead>
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

  function showStaff(){
    $str='<div class="DataTable" style="overflow:auto;" id="Staff">  <!-- Staff block -->
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

      foreach ($this->model->getStaff() as $Staff)
      {

        $str.='<tr>';
        $str.='<td>'.$Staff->getName().'</td>';
        $str.='<td>'.$Staff->getEmail().'</td>';
        $str.='<td>'.$Staff->getMobile().'</td>';
        $str.='<td>'.$Staff->getDepartment().'</td>';
        $str.='<td>'.$Staff->getAction().'</td>';
        $str.='</tr>';

      }

    $str.='</table>
    </div>';
    return $str;
  }

  function showDepartments(){
    $str='<div class="DataTable" style="overflow:auto;" id="Departments">  <!-- Departments block -->
			<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a href="#addDep" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Department</a></span>
			<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Staff</th>
			<th>Action</th>
    </tr>';

      foreach ($this->model->getDepartments() as $Department)
      {

        $str.='<tr>';
        $str.='<td>'.$Department->getID().'</td>';
        $str.='<td>'.$Department->getName().'</td>';
        $str.='<td>'.$Department->getStaff().'</td>';
        $str.='<td>'.$Department->getAction().'</td>';
        $str.='</tr>';

      }

    $str.='</table>
    </div>';
    return $str;
  }
}
?>
