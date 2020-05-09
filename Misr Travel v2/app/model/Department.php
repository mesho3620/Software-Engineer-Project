<?php
  require_once(__ROOT__ . "model/Model.php");
?>
<?php
class Department extends Model {
    private $id;
    private $name;

  function __construct($id,$name="") {
    $this->id = $id;
	    $this->db = $this->connect();

    if(""===$name){
      $this->readDepartment($id);
    }else{
      $this->name = $name;
    }
  }
  function getName() {
    return $this->name;
  }
  function setName($name) {
    $this->name = $name;
  }
  function getID() {
    return $this->id;
  }
  function readDepartment($id){
    $sql = "SELECT * FROM departments where ID=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->name = $row["Name"];
    }
    else {
        $this->name = "";
    }
  }
  function editDepartment($name){
      $sql = "update departments set Name='$name' where ID=$this->id;";
        if($this->db->query($sql) === true){
            echo "updated successfully.";
            $this->readDepartment($this->id);
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }

  }
  function deleteDepartment(){
    $sql="delete from departments where ID=$this->id;";
    if($this->db->query($sql) === true){
            echo "deleted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
  }
}
	
?>