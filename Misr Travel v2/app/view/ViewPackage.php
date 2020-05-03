<?php

require_once(__ROOT__ . "view/View.php");
class ViewPackage extends View{
	public function output(){
		$str = "";
		//$str.="<a href='profile.php'>Back to Profile </a>";
																																								//Header Package Image
		$str.="<div class='w3-display-container' style='margin-bottom:50px'>";
		$str.="<img src='Slideshow/x.jpg' style='width:100%;height:60%'>";
		$str.="<div class='w3-display-bottomleft w3-container w3-amber w3-hover-orange w3-hide-small';";
		$str.="style='bottom:10%;opaTab:0.7;width:70%'>";
		$str.="<h2><b>4 Good Reasons<br>For travelling with us</b></h2>";
		$str.="</div></div><br><br>";

																																								//2 Buttons

		$str.="<table>";

		$str.="<tr>";
		$str.="<th><div class='container'><button id='defaultButton' type='button' class='btn btn-outline-info' onclick='openTab(event, 'Program')'>Program</button></div></th>";
		$str.="<th><div class='container'><button type='button' class='btn btn-outline-info' onclick='openTab(event, 'HOTELS&PRICES')'>HOTELS & PRICES</button></div></th>";
		$str.="</tr>";

		$str.="<tr>";
		$str.="<td colspan='3'>";
		$str.="<div id='Program' class='tabcontent'>

				  <h3>CHECK IN</h3>
				  <p>".$this->model->getCheckin()."</p>

				  <h3>CHECK OUT</h3>
					<p>".$this->model->getCheckout()."</p>

				  <h1>PROGRAM</h1>
					<p>".$this->model->getProgram()."</p>

				  <h1>NOT INCLUDED</h1>

					</div>";

		$str.="<div id='HOTELS&PRICES' class='tabcontent'>

						<h3>CITY</h3>
						<p>".$this->model->getHotel()->getCity()."</p>

					  <h3>LOCATION</h3>
					  <p>".$this->model->getHotel()->getLocation()."</p>

						<h3>RATING</h3>
						<p>".$this->model->getHotel()->getRating()."</p>

						<h3>PRICE</h3>
						<p>".$this->model->getPrice()."</p>

				  	</div>";

		$str.="</td>";
		$str.="</tr>";

		$str.="<tr>";
		$str.="<td>";
		$str.="<form action='Packaged.php?action=book' method='post'><div style='display:none;'><input name='bookPackage' value='".$this->getID()."'/></div><div><input type='submit' value='Book'/></div></form>";
		$str.="</td>";
		$str.="</tr>";
		$str.="</table>";

		return $str;
	}
}
?>
