<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/User.php");
?>
<?php
class Tourist extends User {
  private $nationality;
  private $passport_number;


  function __construct($id,$name="",$email="",$password="",$mobile="",$nationality="",$passport_number="") {
    $this->id = $id;
    $this->db = $this->connect();

    if(""===$name){
      $this->readUser($id);
    }else{
      $this->name = $name;
      $this->email = $email;
	    $this->password=$password;
      $this->mobile = $mobile;
	    $this->nationality=$nationality;
      $this->passport_number = $passport_number;
    }
  }

  function getNationality() {
    return $this->nationality;
  }
  function setNationality($nationality) {
    return $this->nationality = $nationality;
  }
  function getPassport_Number() {
    return $this->passport_number;
  }
  function setPassport_Number($passport_number) {
    return $this->passport_number = $passport_number;
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
      $sql1 = "update credentials set Email='$email',Password='$password' where UserID=$this->id;";
      $sql2 = "update tourists set Mobile='$mobile' where Id=$this->id;";
        if($this->db->query($sql1) === true){
            if($this->db->query($sql2) === true){
            	echo "updated successfully.";
            	$this->readUser($this->id);
            }
            else{
            	echo "ERROR: Could not able to execute $sql. " . $conn->error;
            }

        }
        else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
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

}
