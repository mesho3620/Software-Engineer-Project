<?php

require_once(__ROOT__ . "model/Model.php");

class credentials extends model
{

protected $email
protected $password
protected $type

function __construct($email,$password,$type)
{
  $this->email-$email;
  $this->password=$password;
  $this->type=$type;
}

function check($email,$password)
{
  $sql = "SELECT * from credentials where Email='$email' and password='$password'";
    if($this->db->query($sql1) === true){
      $result = $dbh->query($sql);
      if ($result->num_rows == 1){
        $row = $dbh->fetchRow();
        $_SESSION["ID"]=$row["UserID"];
        }
        else{
          echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
        }


}
}

}

 ?>
