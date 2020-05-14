      <?php

      switch($_POST["Type"]){
        case 'T':
          echo '<form action="" method="post">
    <br>


    <label class="text"><b>Name</b></label>
    <input type="text" name="name" class="box" required>
    <br><br>

    <label class="text"><b>Email</b></label>

    <input type="text" name="email" id="email" class="box" required>
    <div id="msg"></div>
    <br><br>

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
    <input type="text" name="mobile" class="box" class="box" required>
    <br><br>






    <input type="submit" value="Signup" class="button" name="signup" >



  </form>';
          break;
        case 'A':
          echo '<form action="" method="post">
    <br>


    <label class="text"><b>Name</b></label>
    <input type="text" name="name" class="box" required>
    <br><br>

    <label class="text"><b>Email</b></label>

    <input type="text" name="email" id="email" class="box" required>
    <div id="msg"></div>
    <br><br>

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






    <input type="submit" value="Signup" class="button" name="signup" >



  </form>';
          break;
      }

      ?>
