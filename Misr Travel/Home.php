
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>


  .carousel-inner img
  {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px)
  {
    .carousel-caption {
      display: none;
    }
  }

  select
  {
    border: none;
    height: 40px;
    width: 80%;
  }

  .column
  {
    float: left;
    padding: 10px;
  }

  .leftCol
  {
    width: 25%;
  }

  .Middle
  {
    width:25%
  }

  .rightCol {
    width: 25%;
  }

  .row:after
  {
    content: "";
    display: table;
    clear: both;
  }

  </style>

</head>
<body>

    <?php include("TopBar.php") ?>                                                          <!-- TopBar -->
                                                                                                      <!-- carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
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


</div>

                                                                                                <!-- Trip Form -->
<form action="">
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
</form>

    <div class="w3-row-padding w3-padding-16">

      <div class="w3-third w3-margin-bottom">
        <img src="Slideshow/w.jpg" alt="Norway" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Single Room</h3>
          <h6 class="w3-opacity">From $99</h6>
          <p>Description</p>
          <button class="w3-button w3-block w3-black w3-margin-bottom" onclick="book()">Read More</button>
        </div>
      </div>

      <div class="w3-third w3-margin-bottom">
        <img src="Slideshow/x.jpg" alt="Norway" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Double Room</h3>
          <h6 class="w3-opacity">From $149</h6>
          <p>Description</p>

          <button class="w3-button w3-block w3-black w3-margin-bottom">Read More</button>
        </div>
      </div>

      <div class="w3-third w3-margin-bottom">
        <img src="Slideshow/y.jpg" alt="Norway" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Deluxe Room</h3>
          <h6 class="w3-opacity">From $199</h6>
          <p>Description</p>
          <button class="w3-button w3-block w3-black w3-margin-bottom">Read More</button>
        </div>
      </div>
    </div>
</div>

<script>

function book()
{

window.location.href ="TopBar.php";

}
</script>


</body>
</html>
