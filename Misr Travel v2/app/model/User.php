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

  function getName() {
    return $this->name;
  }
  function setName($name) {
    $this->name = $name;
  }
  function getEmail() {
    return $this->email;
  }
  function setEmail($email) {
    $this->email = $email;
  }
  function getPassword() {
    return $this->password;
  }
  function setPassword($password) {
    $this->password = $password;
  }
  public function getMobile() {
    return $this->mobile;
  }
  function setMobile($mobile) {
    $this->mobile = $mobile;
  }
  function getID() {
    return $this->id;
  }

}
