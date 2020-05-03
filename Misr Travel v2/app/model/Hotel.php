<?php
  require_once(__ROOT__ . "model/Model.php");
?>
<?php
class Hotel extends Model {
    private $id;
    private $city;
    private $location;
    private $rating;

  function __construct($id,$city="",$location="",$rating="") {
    $this->id = $id;
	  $this->db = $this->connect();

    if(""===$city){
      $this->readHotel($id);
    }else{
      $this->city = $city;
      $this->location = $location;
      $this->rating = $rating;
    }
  }
  function getCity() {
    return $this->city;
  }
  function setCity($city) {
    return $this->city = $city;
  }
  function getLocation() {
    return $this->location;
  }
  function setLocation($location) {
    return $this->location = $location;
  }
  function getRating() {
    return $this->rating;
  }
  function setRating($rating) {
    return $this->rating = $rating;
  }
  function getID() {
    return $this->id;
  }
  function readHotel($id){
    $sql = "SELECT * FROM hotels where ID=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->city = $row["City"];
        $this->location = $row["Location"];
        $this->rating = $row["Rating"];
    }
    else {
        $this->city = "";
        $this->location = "";
        $this->rating = "";
    }
  }
  function editHotel($city,$location,$rating){
      $sql = "update hotels set City='$city',Location='$location',Rating='$rating' where ID=$this->id;";
        if($this->db->query($sql) === true){
            echo "updated successfully.";
            $this->readHotel($this->id);
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }

  }
  function deleteHotel(){
    $sql="delete from hotels where ID=$this->id;";
    if($this->db->query($sql) === true){
            echo "deleted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
  }
}
	
?>