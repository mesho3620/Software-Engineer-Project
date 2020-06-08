<?php

require_once(__ROOT__ . "view/View.php");

class ViewIndex extends View{
	protected $packagemodel;

	public function __construct($packagemodel)
	{

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

    $str.='<form action="Home.php?search" method="post">												<!-- search form -->
  <div class="row" style="margin-left:10%;">
    <div class="column leftCol">
      <label for="destination">Where To:</label></br></br>
      <select id="destination" name="destination">
        <option value="Egypt">Egypt</option>
        <option value="Jordon">Jordon</option>
      </select>
    </div>

    <div class="column Middle">
      <label for="TripType">Trip Type:</label></br></br>
      <select id="TripType" name="TripType">
        <option value="1">Tours & Packages</option>
        <option value="2">Jordan Tour Packages</option>
        <option value="3">Jordan Day Tours</option>
        <option value="4">Multi Country Tours</option>
        <option value="5">Egypt Nile cruise packages</option>
        <option value="6">Egypt Day Tours</option>
        <option value="7">Egypt Shore Excursions</option>
        <option value="8">Airport Transfers &  Transport</option>
      </select>
    </div>

    <div class="column rightCol">
      <label for="price">price Range:</label></br></br>
      <select id="price" name="price">
        <option value="499">Below $500</option>
        <option value="500-1000">$500 - $1000</option>
        <option value="1000-1500">1000-1500</option>
        <option value="1501">Above $1500</option>
      </select>
    </div>

    <br><br>
    <input class="btn-danger" type="submit" style="height:40px;width:80px;">
  </div>
</form>';

$str.='<div class="row">
';

foreach ($this->packagemodel->GetPackages() as $Package)
{

	$str.='<div class="col-md-4">
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

				<form action="index.php?action=viewPackage" method="post">
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


}
?>
