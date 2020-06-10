<?php

require_once(__ROOT__ . "view/View.php");

class ViewHome extends View{
	protected $touristmodel;
	protected $reservationsmodel;
	protected $packagemodel;

	public function __construct($controller,$touristmodel,$reservationsmodel,$packagemodel)
	{

		$this->controller=$controller;
		$this->touristmodel=$touristmodel;
		$this->reservationsmodel=$reservationsmodel;
		$this->packagemodel=$packagemodel;

	}
	public function output($ss=""){
		$str="";
    $str.='<div id="myCarousel" class="carousel slide" data-ride="carousel">    <!-- carousel -->
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="https://placehold.it/1200x400?text=IMAGE" alt="Image">
        <div class="carousel-caption">
          <h3>Sell $</h3>
          <p>Money Money.</p>
        </div>
      </div>


      <div class="item">
        <img src="https://placehold.it/1200x400?text=Another Image Maybe" alt="Image">
        <div class="carousel-caption">
          <h3>More Sell $</h3>
          <p>Lorem ipsum...</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>


</div>';

$hotelLocations=array();
foreach ($this->packagemodel->GetPackages() as $Package)
{
if(!in_array($Package->getHotel()->getLocation(),$hotelLocations))
{
	array_push($hotelLocations, $Package->getHotel()->getLocation());

}
}


    $str.='<form action="" method="post">												<!-- search form -->
  <div class="row" style="margin-left:10%;">
    <div class="column leftCol">
      <label for="destination">Where To:</label></br></br>
      <select id="destination" name="destination">';
			foreach ($hotelLocations as $loc)
			{
				$str.='<option value="'.$loc.'">'.$loc.'</option>';
			}
			$str.='
      </select>
    </div>


    <div class="column rightCol">
      <label for="price">price Range:</label></br></br>
      <select id="price" name="price">
			<option value="" disabled selected>Price range</option>
        <option value="1">Below $500</option>
        <option value="2">$500 - $1000</option>
        <option value="3">1000-1500</option>
        <option value="4">Above $1500</option>
      </select>
    </div>

    <br><br>
    <input class="btn-danger" name="searchSubmit" type="submit" style="height:40px;width:80px;">
  </div>
</form>';

$str.='<div class="row">';

if(isset($_POST['searchSubmit']) && isset($_POST['price']))
{
	$str.=$this->view2();
}
else
{
	$str.=$this->view1();
}




$str.='</div>';


		return $str;
	}

public function view1()
{
	$str1="";
	foreach ($this->packagemodel->GetPackages() as $Package)
	{

		$str1.='<div class="col-md-4">
	     <div class="thumbnail">
	        <img src="Slideshow/w.jpg" alt="Norway" style="width:100%">
	        <div class="w3-container w3-white">
	          <h3>'.$Package->getName().'</h3>
						<p style="width: 250px;
	     					overflow: hidden;
	     					white-space: nowrap;
	     					text-overflow: ellipsis;">'.$Package->getProgram().'</p>

	          <p>
						Price:'.$Package->getPrice().'
						</p>

					<form action="Tourist.php?action=viewPackage" method="post">
						<div style="display:none;"><input name="SelectedPackage" value="'.$Package->getID().'"/></div>
						<input type="submit" class="w3-button w3-block w3-black w3-margin-bottom" value="Read More">
					 </form>

	        </div>
	      </div>
	    </div>';

	}
	return $str1;
}

public function view2()
{
	$str2='';
$dest=$_POST['destination'];
$price_val=$_POST['price'];
$key=false;
	foreach ($this->packagemodel->GetPackages() as $Package)
	{
		$key=false;
		if($Package->getHotel()->getLocation()==$dest)
		{
			switch($price_val)
			{
				case'1':
				if($Package->getPrice()<500)
				{
					$key=true;
				}
				break;
				case'2':
				if($Package->getPrice()>=500 && $Package->getPrice()<1000)
				{
					$key=true;
				}
				break;
				case'3':
				if($Package->getPrice()>=1000 && $Package->getPrice()<1500)
				{
					$key=true;
				}
				break;
				case'4':
				if($Package->getPrice()>=1500)
				{
					$key=true;
				}
			}
			if($key==true)
			{
				$str2.='<div class="col-md-4">
			     <div class="thumbnail">
			        <img src="Slideshow/w.jpg" alt="Norway" style="width:100%">
			        <div class="w3-container w3-white">
			          <h3>'.$Package->getName().'</h3>
								<p style="width: 250px;
			     					overflow: hidden;
			     					white-space: nowrap;
			     					text-overflow: ellipsis;">'.$Package->getProgram().'</p>

			          <p>
								Price:'.$Package->getPrice().'
								</p>

							<form action="Tourist.php?action=viewPackage" method="post">
								<div style="display:none;"><input name="SelectedPackage" value="'.$Package->getID().'"/></div>
								<input type="submit" class="w3-button w3-block w3-black w3-margin-bottom" value="Read More">
							 </form>

			        </div>
			      </div>
			    </div>';
			}
		}



	}
	return $str2;
}

public function viewReserved()
{

	$str="";

	$str.='<div class="row">';

	foreach ($this->touristmodel->getReservedPackages() as $reservedPackage)
	{
		$Package=$this->packagemodel->getPackage($reservedPackage[0]);							//0->packageID 1->reservationID
		$str.='<div class="col-md-4">
	     <div class="thumbnail">
	        <img src="Slideshow/w.jpg" alt="Norway" style="width:100%">
	        <div class="w3-container w3-white">
					<p>Reservation ID: '.$reservedPackage[1].'</p>
	          <h3>'.$Package->getName().'</h3>
	          <p style="width: 250px;
	     					overflow: hidden;
	     					white-space: nowrap;
	     					text-overflow: ellipsis;">
						Price:'.$Package->getProgram().'
						</p>
						<p>'.$Package->getPrice().'</p>

					<form action="Tourist.php?action=viewPackage" method="post">
						<div style="display:none;"><input name="SelectedPackage" value="'.$Package->getID().'"/></div>
						<input type="submit" class="w3-button w3-block w3-black w3-margin-bottom" value="Read More">
					 </form>

	        </div>
	      </div>
	    </div>';

	}

	$str.='</div>';

	return $str;

}

public function editProfile()
{

	$str='';
	$str.='<div class="DataTable" style="overflow:auto;" id="Profile">
		<div class="profile">
		<form action="Tourist.php?action=editaction" method="post">
		<br><br>

	    <label class="text"><b>Mobile</b></label>
		<input type="text" value="'.$this->touristmodel->getMobile().'" name="mobile" class="box">
		<br><br><br><br>

	    <label class="text"><b>Email</b></label>
	    <input type="text" value="'.$this->touristmodel->getEmail().'" name="email" class="box" >
	    <br><br><br><br>

			<label class="text"><b>Password</b></label>
			<input type="password" value="'.$this->touristmodel->getPassword().'" name="password" class="box">
			<br><br><br><br>

	    <input type="submit" value="Save" class="btn btn-info" name="save" id="save">



		</form>
		</div></div>';
		return $str;
}

}
?>
