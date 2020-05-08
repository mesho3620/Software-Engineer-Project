<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Hotel.php");
  require_once(__ROOT__ . "model/Package.php");
  require_once(__ROOT__ . "model/Reservation.php");
?>

<?php
  class Reservations extends Model {
    private $reservations;

    function __construct() {
        $this->fillArray();
    }
    function fillArray() {
      $this->reservations = array();
      $this->db = $this->connect();
      $result = $this->readReservations();
      if($result!=false)
      while ($row = $result->fetch_assoc()) {
       array_push($this->reservations, new Reservation($row["ID"]));
      }

    }
    function getReservations() {
      return $this->reservations;
    }

    function getReservation($reservationID) {
      foreach ($this->reservations as $reservation) {
        if ( $reservationID == $reservation->getID() ){
          return $reservation;
        }
      }
    }

    function readReservations(){
      $sql = "SELECT * FROM reservations";
      $result = $this->db->query($sql);
      if ($result->num_rows > 0){
          return $result;
      }
      else {
        echo"<script>alert('lol')</script>";
          return false;
      }
    }
    function insertReservation($package_ID){
      $sessionID=$_SESSION['ID'];
      $sql = "INSERT INTO reservations (Package_ID,Tourist_ID) VALUES ('$package_ID','$sessionID')";
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
