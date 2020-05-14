<?php

require_once(__ROOT__ . "view/View.php");

class ViewIndex extends View{
	public function output($ss=""){
		$str="";
    $str.=' <body>
    <div class="rectangle">
    <div class="sidenav">
    <img src="img1.png" class="logo">
    <br><br><br>
    <a href="index.php?action=Agency">Agency</a>
    <br><br>
    <a href="index.php?action=Tourist">Tourist</a>
    <br><br>

    </div>

    <div class="row">
      <div class="column" style="background-color:#aaa;">

   		 <div class="login" style="overflow:auto;">
       <form action="" method="post">
         <br>
         <label class="text"><b>Email</b></label>
         <br>
         <br>
         <input type="text" name="email" class="box" required>
         <br><br>
         <label class="text"><b>Password</b></label>
         <br><br>
         <input type="password" name="password" class="box" required>
         <br><br><br>
         <input type="submit" value="Login" class="button" name="login">

       </form>
       </div>

    </div>

    <div class="column" style="background-color:#bbb;">

     <div class="signup" style="overflow:auto;">

     <div id="signupform">';

    if($ss=="a")
    {
      $str.=$this->signAsAgency();
    }
    else {
      {
        $str.=$this->signAsTourist();
      }
    }
    $str.='
    </div>


    </div>

  </div>

</div>



</div>
</body>';
		return $str;
	}

	function signAsTourist(){
		$str=' <form action="" method="post">
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


     <input type="submit" value="Signup" class="button" name="signup" disabled>



    </form> ';
		return $str;
	}

	function signAsAgency(){
		$str=' <form action="" method="post">
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


     <input type="submit" value="Signup" class="button" name="signup" disabled>



    </form> ';
		return $str;
	}

	public function logIn(){
		$str=' <form action="#">
      <h1>Sign in</h1>
      <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>or use your account</span>
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Password" />
      <a href="#">Forgot your password?</a>
      <button>Sign In</button>
    </form> ';
		return $str;
	}



}
?>
