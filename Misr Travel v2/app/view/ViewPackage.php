<?php
require_once(__ROOT__ . "view/View.php");

class ViewPackage extends View{

	//protected $touristmodel;
	protected $reservationsmodel;
	protected $packagemodel;

	public function __construct($controller/*,$touristmodel*/,$reservationsmodel,$packagemodel)
	{

		$this->controller=$controller;
		// $this->touristmodel=$touristmodel;
		$this->reservationsmodel=$reservationsmodel;
		$this->packagemodel=$packagemodel;

	}

	public function output(){
		$str = "";
		//$str.="<a href='profile.php'>Back to Profile </a>";
		$reserved=false;


																																										//Header Package Image
		$str.="<div class='w3-display-container' style='margin-bottom:50px'>";
		$str.="<img src='Slideshow/x.jpg' style='width:100%;height:60%'>";
		$str.="<div class='w3-display-bottomleft w3-container w3-amber w3-hover-orange w3-hide-small';";
		$str.="style='bottom:10%;opaTab:0.7;width:70%'>";
		$str.="<h2><b>4 Good Reasons<br>For travelling with us</b></h2>";
		$str.="</div></div><br><br>";

																																								//2 Buttons

		$str.="<div class='container'>";

		// $str.="<button id='defaultButton' type='button' class='btn btn-outline-info tablinks w3-blue' onclick='openTab(event,"."'Program'".")'>Program</button>";
		// $str.="<button type='button' class='btn btn-outline-info tablinks' onclick='openTab(event,"."HOTELSPRICES".")'>HOTELS & PRICES</button>";

		$str.='<div class="bs-example">

		<ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#Program" class="btn btn-outline-info active" data-toggle="tab">Program</a>
        </li>
        <li class="nav-item">
            <a href="#HOTELSPRICES" class="btn btn-outline-info" data-toggle="tab">HOTELSPRICES</a>
        </li>
    </ul>';
		$str.="</div>";

		$str.="<div class='tab-content'>
					<div id='Program' class='tab-pane fade show active'>

				  <h3>CHECK IN</h3>
				  <p>".$this->packagemodel->getCheckin()."</p>

				  <h3>CHECK OUT</h3>
					<p>".$this->packagemodel->getCheckout()."</p>

				  <h1>PROGRAM</h1>
					<p>".$this->packagemodel->getProgram()."</p>


					</div>";

		$str.="<div id='HOTELSPRICES' class='tab-pane fade'>

						<h3>CITY</h3>
						<p>".$this->packagemodel->getHotel()->getCity()."</p>

					  <h3>LOCATION</h3>
					  <p>".$this->packagemodel->getHotel()->getLocation()."</p>

						<h3>RATING</h3>
						<p>".$this->packagemodel->getHotel()->getRating()."</p>

						<h3>PRICE</h3>
						<p>".$this->packagemodel->getPrice()."</p>


						</div>";

		foreach ($this->reservationsmodel->getReservations() as $reservation)
		{
				if($reservation->getPackage()->getID()==$this->packagemodel->getID() && $reservation->getTouristId()==$_SESSION['ID'])
				{
					$reserved=true;
					$reservationID=$reservation->getID();
				}
		}
		if($reserved)
		{
			$str.="<form action='Tourist.php?action=cancelReservation' method='post'><div style='display:none;'><input name='reservation_ID' value='".$reservationID."'/></div><div><input type='submit' value='Cancel Reservation' class='btn btn-danger'/></div></div></div></form>";
		}
		else
		{
			$str.="<form action='Tourist.php?action=book' method='post'><div style='display:none;'><input name='package_ID' value='".$this->packagemodel->getID()."'/></div><div><input type='submit' value='Book' class='btn btn-danger'/></div></div></div></form>";
		}
// $str.='</body>';
		return $str;
	}
}
?>
