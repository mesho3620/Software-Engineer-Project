<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ . "model/Employee.php");

class Employees extends Model {
	private $employees;
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {
		$this->employees = array();
		$this->db = $this->connect();
		$result = $this->readStaff();
		if($result!=false){
		while ($row = $result->fetch_assoc()) {
			array_push($this->employees, new Employee($row["Id"],$row["Name"],$row["Email"],$row["Password"],$row["Mobile"],$row["DepartmentId"]));
		}
	}

}

	function getStaff() {
		return $this->employees;
	}

	public function getEmployee($employeeID) {
		foreach ($this->employees as $employee) {
	      if ( $employeeID == $employee->getID() ){
	        return $employee;
	      }
	    }
	}

	function readStaff(){
		$sql = "SELECT * FROM staff INNER JOIN credentials ON staff.Id = credentials.UserID where credentials.Type='S';";

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

	public function insertStaff($name,$email,$password,$mobile,$departmentId){
		$sql1 = "INSERT INTO staff (Name, Mobile, DepartmentId) VALUES ('$name','$mobile', '$departmentId');";
		$sql2 = "INSERT INTO credentials(Email, Password, Type,UserID) VALUES ('$email','$password','S',(SELECT Id FROM staff WHERE Name='$name' AND Mobile='$mobile' AND DepartmentId='$departmentId'));";
		//$sql3 = "UPDATE credentials SET UserID=(SELECT Id FROM staff WHERE Name='$name' AND Mobile='$mobile' AND DepartmentId='$departmentId' ) WHERE Email='$email';";

	if($this->db->query($sql1) === true && $this->db->query($sql2) === true /*&& $this->db->query($sql3) === true*/){
            echo '<script>alert("Records inserted successfully.");</script>' ;
			$this->fillArray();
		}

		else{
			echo '<script>alert("ERROR: Could not able to execute $sql1 '.$this->db->conn->error.'");</script>' ;
		}
	}
}
