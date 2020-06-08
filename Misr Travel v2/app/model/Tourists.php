<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ . "model/Tourist.php");

class Tourists extends Model {
	private $tourists;
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {
		$this->tourists = array();
		$this->db = $this->connect();
		$result = $this->readTourists();
		if($result!=false){
		while ($row = $result->fetch_assoc()) {
			array_push($this->tourists, new Tourist($row["Id"],$row["Name"],$row["Email"],$row["Password"],$row["Mobile"],$row["Nationality"],$row["PassportNumber"]));
		}
	}

	}

	function getTourists() {
		return $this->tourists;
	}

	public function getTourist($touristID) {
		foreach ($this->tourists as $tourist) {
	      if ( $touristID == $tourist->getID() ){
	        return $tourist;
	      }
	    }
	}

	function readTourists(){
		$sql = "SELECT * FROM tourists INNER JOIN credentials ON tourists.Id = credentials.UserID where credentials.Type='T';";

		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}
	/*function readCredentials(){
		foreach ($this->tourists as $tourist) {
	    	$sql = "SELECT * FROM credentials where UserID=".$tourist->getID();
	    	$result = $this->db->query($sql);
	    	$row = $result->fetch_assoc();
	    	$tourist->editUser($row["Email"],$row["Password"],$tourist->getMobile());
	    }
	}*/

	public function insertTourist($name,$email,$password,$mobile,$nationality,$passport_number){
		$sql = "INSERT INTO tourists (Name, Mobile, Nationality, PassportNumber) VALUES ('$name','$mobile', '$nationality', '$passport_number');
				INSERT INTO credentials(Email, Password, Type) VALUES ('$email','$password','T');
				UPDATE credentials SET UserID=(SELECT Id FROM tourists WHERE Name='$name' AND Mobile='$mobile' AND Nationality='$nationality' AND PassportNumber='$passport_number') WHERE Email='$email';";
		if($this->db->query($sql) === true){
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
}




