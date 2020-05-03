<?php
  require_once(__ROOT__ . "model/Model.php");
  require_once(__ROOT__ . "model/Department.php");
?>

<?php
class Departments extends Model {
    private $departments;
  
  function __construct() {
      $this->fillArray();
  }
  function fillArray() {
    $this->departments = array();
    $this->db = $this->connect();
    $result = $this->readDepartments();
    while ($row = $result->fetch_assoc()) {
     array_push($this->departments, new Department($row["ID"]));
    }
    
  }
  function getDepartments() {
    return $this->departments;
  }

  function getDepartment($departmentID) {
    foreach ($this->departments as $department) {
      if ( $departmentID == $department->getID() ){
        return $department;
      }
    }
  }

  function readDepartments(){
    $sql = "SELECT * FROM departments";
    
    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
        return $result;
    }
    else {
        return false;
    }
  }
  function insertDepartment($name){
    $sql = "INSERT INTO departments (Name) VALUES ('$name')";
    if($this->db->query($sql) === true){
      echo "Record inserted successfully.";
      $this->fillArray();
    } 
    else{
      echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
}
?>