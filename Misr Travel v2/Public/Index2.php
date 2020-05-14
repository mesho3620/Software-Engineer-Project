<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php

define('__ROOT__', "../app/");
// require_once(__ROOT__ . "model/User.php");
// require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/Viewindex.php");


 include("css/index.css");

$view=new ViewIndex();

if (isset($_GET['action']) && !empty($_GET['action'])) {
	//$controller->{$_GET['action']}();

  switch($_GET['action']){
    case 'Agency':
      echo $view->output('a');
      break;
    case 'Tourist':
      echo $view->output();
      break;

  }
}
else{
  echo $view->output();
}

if(isset($_POST['login']))	{

	$name=$_REQUEST["name"];
	$password=$_REQUEST["password"];
	$sql = "SELECT * FROM credentials where Name='$name' and password='$password'";
	$dbh = new Dbh();
	$result = $dbh->query($sql);
	if ($result->num_rows == 1){
		$row = $dbh->fetchRow();
		$_SESSION["ID"]=$row["ID"];
		$_SESSION["Name"]=$row["Name"];
		header("Location:profile.php");
	}
}

$x=0;
?>

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


</script>
