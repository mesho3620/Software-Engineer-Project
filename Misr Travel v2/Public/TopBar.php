<?php
if(!isset($_SESSION))
   {
       session_start();
   }

?>


<nav >
  <a class="responsive-menu" href="#"><i class="fa fa-reorder"></i> Menu</a>
  <ul class="menu">
    <?php
    if(!empty($_SESSION['ID']) && $_SESSION["Type"]=="T")
    {
?>
      <li><a class="active" href="Tourist.php"> HOME</a>
<?php
}
else
{
  ?>
  <li><a class="active" href="index.php"> HOME</a>
<?php
}
 ?>

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

          if(!empty($_SESSION['ID']) && $_SESSION["Type"]=="T")
          {
?>
              <li><a href='tourist.php?action=viewReserved'>Booked Package</a></li>;
              <li><a href='tourist.php?action=edit'>Account Settings</a></li>;
              <li><a href='Logout.php'>Log Out</a></li>;

<?php

          }
          else
            {

            echo"<li><a href='register.php'> Login/SignUp</a></li>";

            }

       ?>
    </ul>
  </nav>
