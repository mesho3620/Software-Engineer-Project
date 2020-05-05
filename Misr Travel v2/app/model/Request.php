<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Hotel.php");
  require_once(__ROOT__ . "model/Package.php");
?>
<?php
class Request extends Package {
    private $agencyId;
    private $status;

  function __construct($id,$agencyId="",$name="",$checkin="",$checkout="",$hotel=new Hotel(),$program="",$price="",$status="") {
      $this->id = $id;
	  $this->db = $this->connect();

    if(""===$name){
      $this->readRequest($id);
    }else{
      $this->name = $name;
      $this->agencyId = $agencyId;
      $this->checkin = $checkin;
      $this->checkout = $checkout;
      $this->hotel = $hotel;
      $this->program = $program;
      $this->price = $price;
      $this->status = $status;

    }
  }

  function getAgencyId() {
    return $this->agencyId;
  }
  function setAgencyId($agencyId) {
    return $this->agencyId = $agencyId;
  }
  function getStatus() {
    return $this->status;
  }
  function setStatus($status) {
    return $this->status = $status;
  }


  function readRequest($id){
    $sql = "SELECT * FROM requests where ID=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->agencyId = $row["AgencyID"];
        $this->name = $row["Name"];
        $this->checkin = $row["Checkin"];
        $this->checkout = $row["Checkout"];
        $this->program = $row["Program"];
        $this->price = $row["Price"];
        $this->hotel = new Hotel($row["Hotel_ID"]);
        $this->status = $row["Status"];

    }
    else {
    	$this->agencyId = "";
        $this->name = "";
        $this->checkin = "";
        $this->checkout = "";
        $this->program = "";
        $this->price = "";
        $this->hotel = new Hotel();
        $this->status = "";
    }
  }
  function editRequest($name,$checkin,$checkout,$hotel,$program,$price,$status){
      $sql = "update requests set Name='$name',Checkin='$checkin',Checkout='$checkout',Hotel_ID='$hotel->getID()',Program='$program',Price='$price',Status='$status' where ID=$this->id;";
        if($this->db->query($sql) === true){
            echo "updated successfully.";
            $this->readRequest($this->id);
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }

  }
  function deleteRequest(){
    $sql="delete from requests where ID=$this->id;";
    if($this->db->query($sql) === true){
            echo "deleted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
  }
}
	
?>