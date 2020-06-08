<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class User extends Model {
  protected $id;
  protected $name;
  protected $email;
	protected $password;
  protected $mobile;

  function __construct() {
    
  }

  public function getName() {
    return $this->name;
  }
  public function setName($name) {
    $this->name = $name;
  }
  public function getEmail() {
    return $this->email;
  }
  public function setEmail($email) {
    $this->email = $email;
  }
  public function getPassword() {
    return $this->password;
  }
  public function setPassword($password) {
    $this->password = $password;
  }
  public function getMobile() {
    return $this->mobile;
  }
  public function setMobile($mobile) {
    $this->mobile = $mobile;
  }
  public function getID() {
    return $this->id;
  }  
	 
}