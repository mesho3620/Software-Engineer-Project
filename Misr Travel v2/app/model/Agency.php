<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/User.php");
?>
<?php
class Agency extends User {
  private $country;
  private $address;

  private $sql1;
  private $sql2;

  public function __construct($id,$name="",$email="",$password="",$mobile="",$country="",$address="") {
    $this->id = $id;
    $this->db = $this->connect();

    if(""===$name){
      $this->readUser($id);
    }
    else{
      $this->name = $name;
      $this->email = $email;
	    $this->password=$password;
      $this->mobile = $mobile;
	    $this->country=$country;
      $this->address = $address;
    }
    $this->sql1="";
    $this->sql2 = "";
  }

  public function getCountry() {
    return $this->country;
  }
  public function setCountry($country) {
    $this->country = $country;
  }
  public function getAddress() {
    return $this->address;
  }
  public function setAddress($address) {
    $this->address = $address;
  }

  public function readUser($id){
    $db = $this->connect();
    $this->sql1 = "SELECT * FROM agencies where Id=".$id;
    $result1 = $db->query($this->sql1 );
    if ($result1->num_rows == 1){
        $row1 = $db->fetchRow();
        $this->name = $row1["Name"];
		    $_SESSION["Name"]=$row1["Name"];
		    $this->mobile=$row1["Mobile"];
        $this->country = $row1["Country"];
    		$this->address = $row1["Address"];
        }
    else {
        $this->name = "";
	     	$this->mobile="";
        $this->country = "";
    		$this->address = "";
        }
    $this->sql2 = "SELECT * FROM credentials where UserID=".$id;
    $result2 = $db->query($this->sql2);
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
  public function editUser($email,$password,$mobile,$address){
      $this->sql1 = "UPDATE credentials set Email='$email',Password='$password' where UserID=$this->id AND Type='A';";
  $this->sql2 = "UPDATE agencies set Mobile='$mobile',Address='$address' where Id=$this->id;";
    if($this->db->query($this->sql1) === true){
            if($this->db->query($this->sql2) === true){
            	echo '<script>alert("updated successfully");</script>';
            	$this->readUser($this->id);
            }
            else{
            	echo '<script>alert("ERROR: Could not able to execute $sql ' . $this->db->conn->error.'");</script>' ;
            }
        }
        else{
            echo '<script>alert("ERROR: Could not able to execute $sql ' . $this->db->conn->error.'");</script>' ;
        }
  }

  public function deleteUser(){
	  $this->sql1="delete from agencies where Id=$this->id;";
	  $this->sql2="delete from credentials where UserID=$this->id;";
	  if($this->db->query($this->sql1) === true){
            if($this->db->query($this->sql2) === true){
              echo '<script>alert("deleted successfully");</script>';
            }
            else{
            	echo '<script>alert("ERROR: Could not able to execute $sql2 ' . $this->db->conn->error.'");</script>' ;
            }
        }
      else{
           echo '<script>alert("ERROR: Could not able to execute $sql1 ' . $this->db->conn->error.'");</script>' ;
        }
	}

}
