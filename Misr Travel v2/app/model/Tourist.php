<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/User.php");
?>
<?php
class Tourist extends User {
  private $nationality;
  private $passport_number;
  protected $reservedPackages;


  function __construct($id,$name="",$email="",$password="",$mobile="",$nationality="",$passport_number="") {
    $this->id = $id;
    $this->db = $this->connect();

    if(""===$name){
      $this->readUser($id);
      $this->fillArray();

    }else{
      $this->name = $name;
      $this->email = $email;
	    $this->password=$password;
      $this->mobile = $mobile;
	    $this->nationality=$nationality;
      $this->passport_number = $passport_number;
    }

  }

  function fillArray() {
    $this->reservedPackages = array();
    $this->db = $this->connect();
    $result = $this->reservedPackages();
    if($result!=false)
    while ($row = $result->fetch_assoc()) {
     array_push($this->reservedPackages, [$row["package_id"],$row['reservation_id']]);
    }

  }

  function getReservedPackages() {
    return $this->reservedPackages;
  }
  function getReservedPackage($id) {
    foreach ($this->reservedPackages as $reservation) {
        if ( $id == $reservation[0] ){
          return $reservation;
        }
      }
    return $this->reservedPackages;
  }
  function getNationality() {
    return $this->nationality;
  }
  function setNationality($nationality) {
    $this->nationality = $nationality;
  }
  function getPassport_Number() {
    return $this->passport_number;
  }
  function setPassport_Number($passport_number) {
    $this->passport_number = $passport_number;
  }


  function readUser($id){
    $db = $this->connect();
    $sql1 = "SELECT * FROM tourists where Id=".$id;
    $result1 = $db->query($sql1);
    if ($result1->num_rows == 1){
        $row1 = $db->fetchRow();
        $this->name = $row1["Name"];
		$_SESSION["Name"]=$row1["Name"];
		$this->mobile=$row1["Mobile"];
        $this->nationality = $row1["Nationality"];
		$this->passport_number = $row1["PassportNumber"];

    }
    else {

        $this->name = "";
		$this->mobile="";
        $this->nationality = "";
		$this->passport_number = "";
    }
    $sql2 = "SELECT * FROM credentials where UserID=".$id;
    $result2 = $db->query($sql2);
    if ($result2->num_rows == 1){
        $row2 = $db->fetchRow();
        $this->email = $row2["Email"];
		$this->password=$row2["Password"];

    }
    else {

        $this->email = "";
		$this->password="";

    }
  }

  function editUser($email,$password,$mobile){
      $sql1 = "UPDATE credentials set Email='$email', Password='$password' where UserID=$this->id and Type='T';";
      $sql2 = "UPDATE tourists set Mobile='$mobile' where Id=$this->id;";
        if($this->db->query($sql1) === true){
            if($this->db->query($sql2) === true){
            	echo "updated successfully.";
            	$this->readUser($this->id);
            }
            else{
            	echo "ERROR: Could not able to execute $sql2. " . $this->conn->error;
            }

        }
        else{
            echo "ERROR: Could not able to execute $sql1. " . $this->conn->error;
        }

  }

  function deleteUser(){
	  $sql1="delete from tourists where Id=$this->id;";
	  $sql2="delete from credentials where UserID=$this->id;";
	  if($this->db->query($sql1) === true){
            if($this->db->query($sql2) === true){
            	echo "deleted successfully.";
            }
            else{
            	echo "ERROR: Could not able to execute $sql. " . $conn->error;
            }
        }
      else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
	}

  function reservedPackages()
  {
    $sql="SELECT p.ID as 'package_id',r.ID as 'reservation_id'
      FROM packages p INNER JOIN reservations r
      on(p.ID=r.Package_ID )
      WHERE r.Tourist_ID=".$_SESSION['ID'];

      $result = $this->db->query($sql);
      if ($result->num_rows > 0){
          return $result;
      }
      else {
          return false;
      }
  }

}
