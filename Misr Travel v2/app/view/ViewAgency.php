<?php

require_once(__ROOT__ . "view/View.php");
class ViewAgency extends View{
	public function output($ss=""){			//$ss=Profile() to make it default
		$str = "";
    $str='<body>
  	<div class="rectangle">
  	 <div class="sidenav">
  	 <img src="img1.png" class="logo">
  	  <br><br>
  	  <h1>Agency Name</h1>
  	  <br><br><br>-

      <a href="Agency.php?action=editProfile">Profile</a>

  	  <br><br>
  	  <a href="Agency.php?action=addRequest">Add request</a>
  	  <br><br>

  	  <a href="Agency.php?action=viewRequest">View requests</a>
  	  <br><br>

  	  <a href="Agency.php?action=history()">History</a>
  	  <br><br><br>

  	  <a href="Agency.php?action=logOut">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a>

  	  </div>';
      if($ss!="")
      {
        $str.=$ss;
        $ss="";
      }
      $str.='</div></body>';
    return $str;
  }

  function profile()
  {
    $str='<div class="DataTable" style="overflow:auto;" id="Profile"> <!-- Profile block -->

		<div class="profile">
		<form action="editProfileAction" method="post">
		<br><br>

	    <label class="text"><b>Name</b></label>
	    <input type="text" value="'.$this->model->getName().'" name="name" class="box" readonly>
	    <br><br><br><br>

	    <label class="text"><b>Email</b></label>
		<input type="text" value="'.$this->model->getEmail().'" name="email" class="box">
		<br><br><br><br>

	    <label class="text"><b>Mobile</b></label>
	    <input type="text" value="'.$this->model->getMobile().'" name="mobile" class="box" >
	    <br><br><br><br>

	    <label class="text"><b>Country</b></label>
		<input type="text" value="'.$this->model->getCountry().'" name="country" class="box" readonly>
	    <br><br><br><br>

	    <label class="text"><b>Address</b></label>
	    <input type="text" value="'.$this->model->getAddress().'" name="address" class="box" >
	    <br><br><br>

	    <input type="submit" value="Save" class="btn btn-info" name="save" id="save">



		</form>
		</div></div>';
    return $str;
  }

  function addRequest()
  {
    $str='<div class="DataTable" style="overflow:auto;" id="Addrequest"> <!-- Add request block -->

		<div class="profile">
		<form action="addRequestAction" method="post">
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
		</div></div>';
    return $str;
  }

  function viewRequests()
  {
    $str='<div class="DataTable" style="overflow:auto;" id="Viewrequests">  <!-- Pending Requests block -->

			<table class="table table-striped table-hover">
		 <tr>
			<th>ID</th>
			<th>Check-in</th>
			<th>Check-out</th>
			<th>Tourists No.</th>
			<th>Hotel</th>
			<th>Price</th>
			<th>Status</th>
			<th>Action</th>
     </tr>';

     foreach ($this->model->getRequests() as $Request)
     {
       $str.='<tr>';
       $str.='<td>'.$Request->getID().'</td>';
       $str.='<td>'.$Request->getChecin().'</td>';
       $str.='<td>'.$Request->getCheckout().'</td>';
       $str.='<td>'.$Request->gettouristsNo().'</td>';
       $str.='<td>'.$Request->getHotel().'</td>';
       $str.='<td>'.$Request->getPrice().'</td>';
       $str.='<td>'.$Request->getStatus().'</td>';
       $str.='<td>'.$Request->getAction().'</td>';
       $str.='</tr>';

     }
		$str.='</table>
		</div>';
    return $str;
  }

  function history()
  {
    $str='	<div class="DataTable" style="overflow:auto;" id="History">  <!-- History of Requests block -->

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
     </tr>';

     foreach ($this->model->getHistory() as $History)
     {
       $str.='<tr>';
       $str.='<td>'.$History->getID().'</td>';
       $str.='<td>'.$History->getCheckin().'</td>';
       $str.='<td>'.$History->getCheckout().'</td>';
       $str.='<td>'.$History->getTouristNo().'</td>';
       $str.='<td>'.$History->getHotel().'</td>';
       $str.='<td>'.$History->getPrice().'</td>';
       $str.='<td>'.$History->getAction().'</td>';
       $str.='</tr>';

     }

		$str.='</table>
		</div>';
    return $str;
  }
}
?>
