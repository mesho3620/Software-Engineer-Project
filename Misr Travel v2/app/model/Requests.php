<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Hotel.php");
  require_once(__ROOT__ . "model/Package.php");
  require_once(__ROOT__ . "model/Request.php");
?>

<?php
class Requests extends Model {
    private $requests;
  
  function __construct() {
      $this->fillArray();
  }
  function fillArray() {
    $this->requests = array();
    $this->db = $this->connect();
    $result = $this->readRequests();
    while ($row = $result->fetch_assoc()) {
     array_push($this->requests, new Request($row["ID"]));
    }
    
  }
  function getRequests() {
    return $this->requests;
  }

  function getRequest($requestID) {
    foreach ($this->requests as $request) {
      if ( $requestID == $request->getID() ){
        return $request;
      }
    }
  }

  function readRequests(){
    $sql = "SELECT * FROM requests";
    
    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
        return $result;
    }
    else {
        return false;
    }
  }
  function insertPackage($name,$checkin,$checkout,$hotel,$program,$price){
    $sql = "INSERT INTO packages (AgencyID,Name,Checkin,Checkout,Hotel_ID,Program,Price,Status) VALUES ('".$_SESSION['ID']."','$name','$checkin','$checkout','$hotel->getID()','$program','$price','Pending confirmation')";
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

