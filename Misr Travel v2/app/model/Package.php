<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Hotel.php");
?>
<?php
class Package extends Model {
    private $id;
    private $name;
    private $checkin;
    private $checkout;
    private $hotel;
    private $program;
    private $price;

  function __construct($id,$name="",$checkin="",$checkout="",$hotel=new Hotel(),$program="",$price="") {
    $this->id = $id;
	  $this->db = $this->connect();

    if(""===$name){
      $this->readPackage($id);
    }else{
      $this->name = $name;
      $this->checkin = $checkin;
      $this->checkout = $checkout;
      $this->hotel = $hotel;
      $this->program = $program;
      $this->price = $price;
    }
  }
  function getName() {
    return $this->name;
  }
  function setName($name) {
    return $this->name = $name;
  }
  function getCheckin() {
    return $this->checkin;
  }
  function setCheckin($checkin) {
    return $this->checkin = $checkin;
  }
  function getCheckout() {
    return $this->checkout;
  }
  function setCheckout($checkout) {
    return $this->checkout = $checkout;
  }
  function getProgram() {
    return $this->program;
  }
  function setProgram($program) {
    return $this->program = $program;
  }
  function getPrice() {
    return $this->price;
  }
  function setPrice($price) {
    return $this->price = $price;
  }
  function getHotel() {
    return $this->hotel;
  }
  function setHotel($hotel) {
    return $this->hotel = $hotel;
  }
  function getID() {
    return $this->id;
  }
  function readPackage($id){
    $sql = "SELECT * FROM packages where ID=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->name = $row["Name"];
        $this->checkin = $row["Checkin"];
        $this->checkout = $row["Checkout"];
        $this->program = $row["Program"];
        $this->price = $row["Price"];
        $this->hotel = new Hotel($row["Hotel_ID"]);

    }
    else {
        $this->name = "";
        $this->checkin = "";
        $this->checkout = "";
        $this->program = "";
        $this->price = "";
        $this->hotel = new Hotel();
    }
  }
  function editPackage($name,$checkin,$checkout,$hotel,$program,$price){
      $sql = "update packages set Name='$name',Checkin='$checkin',Checkout='$checkout',Hotel_ID='$hotel->getID()',Program='$program',Price='$price' where ID=$this->id;";
        if($this->db->query($sql) === true){
            echo "updated successfully.";
            $this->readPackage($this->id);
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }

  }
  function deletePackage(){
    $sql="delete from packages where ID=$this->id;";
    if($this->db->query($sql) === true){
            echo "deleted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
  }
}
	
?>