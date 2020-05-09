
<?php
if(!isset($_SESSION))
   {
       session_start();
   }
include("css/TopBar.css")
?>


<nav >
  <a class="responsive-menu" href="#"><i class="fa fa-reorder"></i> Menu</a>
  <ul class="menu">
      <li><a class="active" href="Home.php"> HOME</a>
      <li><a  href=""><i class="fa fa-user"></i> ABOUT</a>
        <ul class="sub-menu">
          <li><a href="About Us/WhyMisrTravel.php">Why Misr Travel?</a></li>
          <li><a href="About Us/Terms-Conditions.php">Terms & Conditions</a></li>
          <li><a href="About Us/Chairman-Message.php">Chairman Message</a></li>
          <li><a href="About Us/">11Our Blogs</a></li>
          <li><a href="About Us/National-Evaluation-Conference.php">National Evaluation Conference</a></li>
          <li><a href="About Us/Tips.php">Gratuities</a></li>
          <li><a href="About Us/Our-Story.php">Our Story</a></li>
          <li><a href="About Us/Misr-Travel-Program.php">Travel Programs</a></li>
          <li><a href="About Us/MICE.php">M.I.C.E & Travel Management</a></li>
          <li><a href="About Us/Our-Team.php">Our Team</a></li>/
          <li><a href="About Us/Talk-To-Us.php">Talk To Us</a></li>
          <li><a href="About Us/FAQ.php">FAQs</a></li>
        </ul>
      </li>
      <li><a href="">Inquire Now</a></li>
      <li><a href="">Contact Us</a></li>
      <?php

          if(!empty($_SESSION['FullName']) && $_SESSION["Status"]=="Tourist"||1==1)
          {

              echo "<li><a href=''>Booked Package</a></li>";
              echo "<li><a href=''>Account Settings</a></li>";
              echo "<li><a href='tourist.php'>Packages</a></li>";
              echo "<li><a href='logout.php'>Log Out</a></li>";



          }
          else
            {

            echo"<li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
            echo "<li><a href='SignUp.php'>Sign Up</a></li>";

            }

       ?>
    </ul>
  </nav>
