<?php
include("TopBar.php")
 ?>
 <!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include("css/accordion.css")
 ?>

  <style>
  /* Style the tab */
  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
  }

  /* Style the buttons that are used to open the tab content */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 2px solid gray;
    border-radius: 5px;
    width: 70%;
    margin-left:9%;
    margin-top: 5%;

  }

  </style>



</head>
<body>

  <script>

  function startTab() {
    document.getElementById("defaultOpen").click();
 }

document.getElementsByClassName('tablinks')[0].click()

  function openTab(evt, TabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 1; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(TabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
startTab();
  </script>


<div class="w3-display-container" style="margin-bottom:50px">
  <img src="Slideshow/x.jpg" style="width:100%;height:60%">
  <div class="w3-display-bottomleft w3-container w3-amber w3-hover-orange w3-hide-small"
   style="bottom:10%;opaTab:0.7;width:70%">
  <h2><b>4 Good Reasons<br>For travelling with us</b></h2>
</div>
</div>
<br><br>

<div class="container">
  <button id="defaultButton" type="button" class="btn btn-outline-info" onclick="openTab(event, 'INCLUSIONS')">INCLUSIONS</button>
  <button type="button" class="btn btn-outline-info" onclick="openTab(event, 'ITINERARY')">ITINERARY</button>
  <button type="button" class="btn btn-outline-info" onclick="openTab(event, 'HOTELS&PRICES')">HOTELS & PRICES</button>
</div>

                                                                                <!-- Tab content -->
<div id="INCLUSIONS" class="tabcontent">

  <h3>TOUR HIGHLIGHTS</h3>
  <p>London is the capital Tab of England.</p>

  <h3>DEPARTURE DATES</h3>
  <p>London is the capital Tab of England.</p>

  <h1>INCLUDED</h1>

  <h3>ANCIENT EGYPT & NUBIA TOUR ADDITIONAL INCLUDED HIGHLIGHTS:</h3>
  <p>London is the capital Tab of England.</p>

  <h1>NOT INCLUDED</h1>

  <p>London is the capital Tab of England.</p>


</div>

<div id="ITINERARY" class="tabcontent">

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
<div class="row">
				<div class="col-md-12">


					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Why you choose Titanic?
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
								</div>
							</div>
						</div>

            <?php
            for($i=0;$i<8;$i++)
            {
						echo"<div class='panel panel-default'>";
							echo"<div class='panel-heading' role='tab' id='headingTwo'>";
								echo"<h4 class='panel-title'>";
									echo"<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseTwo".$i."' aria-expanded='false' aria-controls='collapseTwo".$i."'>";
										echo"Why Titanic best?";
									echo"</a>";
								echo"</h4>";
							echo"</div>";

							echo"<div id='collapseTwo".$i."' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingTwo'>";
								echo"<div class='panel-body'>";
									echo"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>";
								echo"</div>";
							echo"</div>";
						echo"</div>";
          }
            ?>


						</div>
					</div>
				</div><!--- END COL -->
			</div><!--- END ROW -->
		</div>


  <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
</div>

<div id="HOTELS&PRICES" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

</body>
</html>
