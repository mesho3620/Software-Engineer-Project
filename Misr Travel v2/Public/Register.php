<!DOCTYPE html>
<html>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<style type="text/css">






    .login{
      position: relative;
        width: 20%;
        height: 100%;
        padding-top: 5%;
        padding-left: 20%;
        float: left;

    }

    .signup{
      position: relative;
        width: 20%;
        height: 100%;
        padding-top: 5%;
        padding-right: 20%;
        float: right;

    }
    

    

 
</style>







<?php 

 include "Login.php";?>







<script>
$(document).ready(function(){
      $("#email").keyup(function(){
        var filter = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+\.[a-z]{1,4}$/;
        var email = $("#email").val();
        if(!filter.test(email)){
          $("#msg").html("Please enter valid email").css("color","red");
          disableSignup();
        }

        else{
          $.ajax({
          type: "POST",
          url: "GetEmail.php",
          data:'email='+email,
          success: function(data){
            $("#msg").html(data).css("color","red");;
         }
          });
        }
      });
    });
    function getform(val) {
    $.ajax({
    type: "POST",
    url: "GetForm.php",
    data:'Type='+val,
    success: function(data){
      $("#signupform").html(data);
    }
  });
}





function enableSignup(){
    document.getElementById("signupbutton").disabled = false;
}
function disableSignup(){
document.getElementById("signupbutton").disabled = true;
}

 </script>











<div class="login">
  <form action="" method="post">
    <br>
    <label class="text"><b>Email</b></label>
    <br>
    <br>
    <input type="text" name="email1" class="box" required>
    <br><br>
    <label class="text"><b>Password</b></label>
    <br><br>
    <input type="password" name="password" class="box" required>
    <br><br><br>
    <input type="submit" value="Login" class="button" name="login">
    
  </form>
  </div>

  <div class="signup" style="overflow:auto;">

  <label class="text2"><b>Signup As</b></label>

    <select name="type" id="type" onChange="getform(this.value);" class="box2">
    <option value="T">Tourist</option>
    <option value="A">Agency</option>
    </select>
    <br><br>

  <div id="signupform">

  <form action="signup.php" method="post">
    <br>


    <label class="text"><b>Name</b></label>
    <input type="text" name="name" class="box" required>
    <br><br>
 
    <label class="text"><b>Email</b></label>

    <input type="text" name="email" id="email" class="box" required>
    <div id="msg"></div>
    <br>

    <label class="text"><b>Password</b></label>

    <input type="password" name="password" class="box" required>
    <br><br>  

    <label class="text"><b>Mobile</b></label>
    <input type="text" name="mobile" class="box" class="box" required>
    <br><br>

    <label class="text"><b>Nationality</b></label>
    <input type="text" name="nationality" class="box" class="box" required>
    <br><br>

    <label class="text"><b>passport_number</b></label>
    <input type="text" name="passport_number" class="box" class="box" required>
    <br><br>
 

    <input type="submit" value="Signup" class="button" name="signup" id="signupbutton" disabled>
    

  
  </form>
  </div>
  </div>
  </html>