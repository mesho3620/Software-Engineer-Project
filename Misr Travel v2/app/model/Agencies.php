<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ . "model/Agency.php");

class Agencies extends Model {
	private $agencies;
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {
		$this->agencies = array();
		$this->db = $this->connect();
		$result = $this->readAgencies();
		if($result!=false){
		while ($row = $result->fetch_assoc()) {
			array_push($this->agencies, new Agency($row["Id"],$row["Name"],$row["Email"],$row["Password"],$row["Mobile"],$row["Country"],$row["Address"]));
		}
		}
	}

	function getAgencies() {
		return $this->agencies;
	}

	function getAgency($agencyID) {
		foreach ($this->agencies as $agency) {
	      if ( $agencyID == $agency->getID() ){
	        return $agency;
	      }
	    }
	}

	function readAgencies(){
		$sql = "SELECT * FROM agencies INNER JOIN credentials ON agencies.Id = credentials.UserID where credentials.Type='A';";

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

	public function insertAgency($name,$email,$password,$mobile,$country,$address){


		$sql1 = "INSERT INTO agencies (Name, Mobile, Country, Address) VALUES ('$name','$mobile', '$country', '$address');";
		$sql2 = "INSERT INTO credentials(Email, Password, Type,UserID) VALUES ('$email','$password','A',(SELECT Id FROM agencies WHERE Name='$name' AND Mobile='$mobile' AND Country='$country' AND Address='$address'));";
		if($this->db->query($sql1) === true && $this->db->query($sql2) === true /*&& $this->db->query($sql3) === true*/){
			$this->fillArray();
			header("Location:register.php?status=success");
		} 
		else{
			echo $sql2;
			//header("Location:register.php?status=failed");
		}

}//end func

}
