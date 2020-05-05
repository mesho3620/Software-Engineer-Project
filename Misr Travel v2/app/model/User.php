<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class User extends Model {
  private $id;
  private $name;
  private $email;
	private $password;
  private $mobile;

  function __construct() {
    
  }

  function getName() {
    return $this->name;
  }
  function setName($name) {
    return $this->name = $name;
  }
  function getEmail() {
    return $email->email;
  }
  function setEmail($email) {
    return $this->email = $email;
  }
  function getPassword() {
    return $this->password;
  }
  function setPassword($password) {
    return $this->password = $password;
  }
  function getMobile() {
    return $this->mobile;
  }
  function setMobile($mobile) {
    return $this->mobile = $mobile;
  }
  function getID() {
    return $this->id;
  }  
	 
}