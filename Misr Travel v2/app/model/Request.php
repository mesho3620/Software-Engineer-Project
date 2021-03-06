<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Hotel.php");
  require_once(__ROOT__ . "model/Package.php");
?>
<?php
class Request extends Package {
    private $agencyId;
    private $touristsno;
    private $status;


  function __construct($id,$name="",$checkin="",$checkout="",$hotel="",$program="",$price="",$touristsno="",$status="") {
    $this->id = $id;
    $this->db = $this->connect();

    if(""===$name){
      $this->readRequest($id);
    }else{
        $this->name = $name;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->hotel = $hotel;
        $this->program = $program;
        $this->price = $price;
      }
  }

  public function getAgencyId() {
    return $this->agencyId;
  }
  function setAgencyId($agencyId) {
    $this->agencyId = $agencyId;
  }
  public function getStatus() {
    return $this->status;
  }
  function setStatus($status) {
    $this->status = $status;
  }
  public function getTouristsNo() {
    return $this->touristsno;
  }
  function setTouristsNo($touristsno) {
    $this->touristsno = $touristsno;
  }



  public function readRequest($id){
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
      $this->touristsno = $row["Tourists"];
      $this->status = $row["Status"];

  }
  else {
    $this->agencyId = "";
      $this->name = "";
      $this->checkin = "";
      $this->checkout = "";
      $this->program = "";
      $this->price = "";
      $this->hotel = "";
      $this->touristsno = "";
      $this->status = "";
  }
  }
  public function editRequest($name,$checkin,$checkout,$program,$price,$touristsno,$status){
      $sql = "update requests set Name='$name',Checkin='$checkin',Checkout='$checkout',Tourists='$touristsno',Program='$program',Price='$price',Status='$status' where ID=$this->id;";
        if($this->db->query($sql) === true){
            echo "updated successfully.";
            $this->readRequest($this->id);
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }

  }
  public function deleteRequest(){
    $sql="delete from requests where ID=$this->id;";
    if($this->db->query($sql) === true){
              echo '<script>alert("deleted successfully");</script>';
        } else{
              echo '<script>alert("ERROR: Could not able to execute $sql ' . $this->db->conn->error.'");</script>' ;
        }
  }
}

?>
