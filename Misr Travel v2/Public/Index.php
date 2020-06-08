<?php
// session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "view/viewindex.php");
require_once(__ROOT__ . "model/Packages.php");
require_once(__ROOT__ . "model/Package.php");
require_once(__ROOT__ . "view/ViewPackage.php");
include("css/home.css");
include("css/viewPackage.css");
include("css/TopBar.css");
include("TopBar.php");
include("js/viewPackage.php");



$packagesmodel=new Packages();
$view=new ViewIndex($packagesmodel);
// Create connection

if(!empty($_SESSION['ID']/*||1==1*/)){ //check if login button is pressed

header("Location:Register.php");    //error
}
else
{

  if (isset($_GET['action']) && !empty($_GET['action'])) {
  	switch($_GET['action']){

  		case 'viewPackage':
      $controller=-1;
  			$packagemodel=new Package($_REQUEST['SelectedPackage']);
  			$view2 = new ViewPackage($controller,$packagemodel);
  			echo $view2->output();
  			break;

  	}
  }
  else
  	echo $view->output();

}


     ?>
