<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Hotel.php");
  require_once(__ROOT__ . "model/Package.php");
?>

<?php
class Packages extends Model {
    private $packages;
  
  function __construct() {
      $this->fillArray();
  }
  function fillArray() {
    $this->packages = array();
    $this->db = $this->connect();
    $result = $this->readPackages();
    while ($row = $result->fetch_assoc()) {
     array_push($this->packages, new Package($row["ID"]));
    }
    
  }
  function getPackages() {
    return $this->packages;
  }

  function getPackage($packageID) {
    foreach ($this->packages as $package) {
      if ( $packageID == $package->getID() ){
        return $package;
      }
    }
  }

  function readPackages(){
    $sql = "SELECT * FROM packages";
    
    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
        return $result;
    }
    else {
        return false;
    }
  }
  function insertPackage($name,$checkin,$checkout,$hotel,$program,$price){
    $sql = "INSERT INTO packages (Name,Checkin,Checkout,Hotel_ID,Program,Price) VALUES ('$name','$checkin','$checkout','$hotel->getID()','$program','$price')";
    if($this->db->query($sql) === true){
      echo "Record inserted successfully.";
      $this->fillArray();
    } 
    else{
      echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
}
?>

