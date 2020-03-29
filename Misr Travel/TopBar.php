
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
      <li><a  href="#"><i class="fa fa-user"></i> ABOUT</a>
        <ul class="sub-menu">
          <li><a href="">Why Misr Travel?</a></li>
          <li><a href="">Terms & Conditions</a></li>
          <li><a href="">Chairman Message</a></li>
          <li><a href="">11Our Blogs</a></li>
          <li><a href="">National Evaluation Conference</a></li>
          <li><a href="">Gratuities</a></li>
          <li><a href="">Our Story</a></li>
          <li><a href="">Travel Programs</a></li>
          <li><a href="">M.I.C.E & Travel Management</a></li>
          <li><a href="">Our Team</a></li>/
          <li><a href="">Talk To Us</a></li>
          <li><a href="">FAQs</a></li>
        </ul>
      </li>
      <li><a href="">Inquire Now</a></li>
      <li><a href="">Contact Us</a></li>
      <?php

          if(!empty($_SESSION['FullName']) && $_SESSION["Status"]=="Client")
          {

              echo "<li><a href=''>Booked Package</a></li>";
              echo "<li><a href=''>Account Settings</a></li>";

          }

       ?>
    </ul>
  </nav>
