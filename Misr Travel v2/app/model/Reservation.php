<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Hotel.php");
  require_once(__ROOT__ . "model/Package.php");
?>
<?php
class Reservation extends Model {
    private $id;
    private $touristId;
    private $package;

    function __construct($id,$touristId="",$package="") {
	    $this->id = $id;
		$this->db = $this->connect();

	    if(""===$touristId){
	      $this->readReservation($id);
	    }else{
	      $this->touristId = $touristId;
	      $this->package = $package();
	    }
  	}
    function getTouristId() {
    	return $this->touristId;
    }
    function setTouristId($touristId) {
    	$this->touristId = $touristId;
    }
    function getPackage() {
      	return $this->package;
    }
    function setPackage($package) {
    	$this->package = $package;
    }
    function getID() {
    	return $this->id;
    }
    function readReservation($id){
    $sql = "SELECT * FROM reservations where ID=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->touristId = $row["Tourist_ID"];
        $this->package = new Package($row["Package_ID"]);
      }
    else {
        $this->touristId = "";
        $this->package = new Package();
      }
  	}
    function deleteReservation(){
	    $sql="delete from reservations where ID=$this->id;";
	    if($this->db->query($sql) === true){
            echo "deleted successfully.";
        }
	    else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
	}
}

?>
