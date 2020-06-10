      <?php
      
      switch($_POST["Type"]){
        case 'T':
          echo '<form action="signup.php" method="post">
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
 

    

 

    <input type="submit" value="Signup" class="button" name="signup" id="signupbutton" >
    

  
  </form>
  <script>
function enableSignup(){
    document.getElementById("signupbutton").disabled = false;
}
function disableSignup(){
document.getElementById("signupbutton").disabled = true;
}
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
          data:"email="+email,
          success: function(data){
            $("#msg").html(data).css("color","red");;
         }
          });
        }
      });
    });
  </script>';
          break;
        case 'A':
          echo '<form action="signup.php" method="post">
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

    <label class="text"><b>Country</b></label>
    <input type="text" name="country" class="box" class="box" required>
    <br><br>

    <label class="text"><b>Address</b></label>
    <input type="text" name="address" class="box" class="box" required>
    <br><br>
 


    <input type="submit" value="Signup" class="button" name="signup" id="signupbutton" >
    

  
  </form>
  <script>
function enableSignup(){
    document.getElementById("signupbutton").disabled = false;
}
function disableSignup(){
document.getElementById("signupbutton").disabled = true;
}
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
          data:"email="+email,
          success: function(data){
            $("#msg").html(data).css("color","red");;
         }
          });
        }
      });
    });
  </script>';
          break;
      }
 
      ?>  
