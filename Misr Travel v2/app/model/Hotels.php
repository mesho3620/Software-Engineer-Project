<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Hotel.php");
?>

<?php
class Hotels extends Model {
    private $hotels;

  function __construct() {
      $this->fillArray();
  }
  function fillArray() {
    $this->hotels = array();
    $this->db = $this->connect();
    $result = $this->readHotels();
    if($result!=false)
    while ($row = $result->fetch_assoc()) {
     array_push($this->hotels, new Hotel($row["ID"]));
    }

  }
  function getHotels() {
    return $this->hotels;
  }

  function getHotel($hotelID) {
    foreach ($this->hotels as $hotel) {
      if ( $hotelID == $hotel->getID() ){
        return $hotel;
      }
    }
  }

  function readHotels(){
    $sql = "SELECT * FROM hotels";

    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
        return $result;
    }
    else {
        return false;
    }
  }
  function insertHotel($city,$location,$rating){
    $sql = "INSERT INTO hotels (City,Location,Rating) VALUES ('$city','$location','$rating')";
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
