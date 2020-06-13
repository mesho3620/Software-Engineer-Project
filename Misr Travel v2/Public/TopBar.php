<?php
if(!isset($_SESSION))
   {
    //   session_start();
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
          <li><a href="WhyMisrTravel.php">Why Misr Travel?</a></li>
          <li><a href="Our-Story.php">Our Story</a></li>
          <li><a href="FAQ.php">FAQs</a></li>
        </ul>
      </li>
      <li><a href="Talk-To-Us.php">Contact Us</a></li>
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
