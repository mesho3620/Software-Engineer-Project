<?php
$_SESSION['Name']="Mahmoud";
require_once(__ROOT__ . "view/View.php");
class ViewAgency extends View{

  protected $requestmodel;
  protected $hotelmodel;
  private $agencymodel;

  private $str="";
  private $str2='<body>
    <div class="rectangle">
     <div class="sidenav">
     <img src="img1.png" class="logo">
      <br><br>
      <h1>';

  public function __construct($controller,$requestmodel,$hotelmodel) {
        $this->controller = $controller;
        $this->requestmodel = $requestmodel;
        $this->hotelmodel = $hotelmodel;
        $this->str2.=$_SESSION['Name'].'</h1>
      <br><br><br>-
      <a href="Agency.php?action=editProfile">Profile</a>
      <br><br>
      <a href="Agency.php?action=addRequest">Add request</a>
      <br><br>
      <a href="Agency.php?action=viewRequest">View requests</a>
      <br><br>
      <a href="Agency.php?action=viewHistory">History</a>
      <br><br><br>
      <a href="logout.php">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a>
      </div>';
      $this->agencymodel= new Agency($_SESSION['id']);
    }




  function editProfile()
  {
    $this->str='<div class="DataTable" style="overflow:auto;" id="Profile"> <!-- Profile block -->
		<div class="profile">
		<form action="Agency.php?action=editProfile" method="post">
		<br><br>
	    <label class="text"><b>Name</b></label>
	    <input type="text" value="'.$this->agencymodel->getName().'" name="name" class="box" readonly>
	    <br><br><br><br>
	    <label class="text"><b>Email</b></label>
		<input type="text" value="'.$this->agencymodel->getEmail().'" name="email" class="box">
		<br><br><br><br>
      <label class="text"><b>Password</b></label>
    <input type="text" value="'.$this->agencymodel->getPassword().'" name="password" class="box">
    <br><br><br><br>
	    <label class="text"><b>Mobile</b></label>
	    <input type="text" value="'.$this->agencymodel->getMobile().'" name="mobile" class="box" >
	    <br><br><br><br>
	    <label class="text"><b>Country</b></label>
		<input type="text" value="'.$this->agencymodel->getCountry().'" name="country" class="box" readonly>
	    <br><br><br><br>
	    <label class="text"><b>Address</b></label>
	    <input type="text" value="'.$this->agencymodel->getAddress().'" name="address" class="box" >
	    <br><br><br>
	    <input type="submit" value="Save" class="btn btn-info" name="editProfileAction" id="save">
		</form>
		</div></div>';
    return $this->str2.$this->str;
  }

  function addRequest()
  {
    $this->str='<div class="DataTable" style="overflow:auto;" >
		<div class="profile">
		<form action="Agency.php?action=viewRequest" method="post">
		<br><br>
    <label class="text"><b>Name</b></label>
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
    }
    $this->str.='</select>
	    <label class="text1"><b>Tourists</b></label>
	    <input type="text" name="touristsno" class="box1" >
	    <br><br><br>
	    <label class="text"><b>Program Description</b></label>
	    <br><br>
	    <input type="text" name="program" class="box2" >
	    <br><br><br>
	    <input type="submit" value="Save" class="btn btn-info" name="addRequest" id="save">
		</form>
		</div></div>';
          return $this->str2.$this->str;
  }

  function viewRequests()
  {
    $this->str='<div class="DataTable" style="overflow:auto;">
      <table class="table table-striped table-hover">
      <thead>
     <tr>
      <th>ID</th>
      <th>Check-in</th>
      <th>Check-out</th>
      <th>Tourists No.</th>
      <th>Hotel Location</th>
      <th>Price</th>
      <th>Status</th>
      <th>Action</th>
    </tr>';

    foreach ($this->requestmodel->getRequests() as $Request)
    {
      echo"111";
      if($Request->getAgencyId()==$_SESSION['id'] && $Request->getStatus()!="Done" ){

        $this->str.='<tr>';
        $this->str.='<td>'.$Request->getID().'</td>';
        $this->str.='<td>'.$Request->getCheckin().'</td>';
        $this->str.='<td>'.$Request->getCheckout().'</td>';
        $this->str.='<td>'.$Request->getTouristsNo().'</td>';
        $this->str.='<td>'.$Request->getHotel()->getLocation().'</td>';
        $this->str.='<td>'.$Request->getPrice().'</td>';
        $this->str.='<td>'.$Request->getStatus().'</td>';
      $this->str.='<td><a href="Agency.php?action=DeleteRequest1&id='.$Request->getID().'" class= "btn btn-danger"><span
      class="glyphicon glyphicon-remove"></span>Delete</a></td>';
        $this->str.='</tr>';
        }


    }

    $this->str.='</table>
          </div></div>';
     return $this->str2.$this->str;
  }

  function viewHistory(){
    $this->str='<div class="DataTable" style="overflow:auto;">
      <table class="table table-striped table-hover">
      <thead>
     <tr>
      <th>ID</th>
      <th>Check-in</th>
      <th>Check-out</th>
      <th>Tourists No.</th>
      <th>Hotel Location</th>
      <th>Price</th>
      <th>Status</th>
      <th>Action</th>
    </tr>';

    foreach ($this->requestmodel->getRequests() as $Request)
    {
      if($Request->getAgencyId()==$_SESSION['id'] && $Request->getStatus()=="Done" ){

        $this->str.='<tr>';
        $this->str.='<td>'.$Request->getID().'</td>';
        $this->str.='<td>'.$Request->getCheckin().'</td>';
        $this->str.='<td>'.$Request->getCheckout().'</td>';
        $this->str.='<td>'.$Request->getTouristsNo().'</td>';
        $this->str.='<td>'.$Request->getHotel()->getLocation().'</td>';
        $this->str.='<td>'.$Request->getPrice().'</td>';
        $this->str.='<td>'.$Request->getStatus().'</td>';
      $this->str.='<td><a href="Agency.php?action=DeleteRequest2&id='.$Request->getID().'" class= "btn btn-danger"><span
      class="glyphicon glyphicon-remove"></span>Delete</a></td>';
        $this->str.='</tr>';
        }


    }

    $this->str.='</table>
          </div></div>';
     return $this->str2.$this->str;
  }
}
?>
