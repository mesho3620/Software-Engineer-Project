<?php

class SqlException extends Exception {
  public function errorMessage()
  {
	$errorMsg="ERROR: Could not be able to exectute." .$this->getMessage(). mysqli_error($conn);
    return $errorMsg;
  }
}

class NameException extends Exception {
  public function errorMessage()
  {
	$errorMsg="ERROR: Could not be able to exectute, Name must bet Between 3 and 15 character." .$this->getMessage();
    return $errorMsg;
  }
}

class EmailException extends Exception {
  public function errorMessage()
  {
	$errorMsg="ERROR: Could not be able to exectute, Wrong Email format." .$this->getMessage();
    return $errorMsg;
  }
}
?>
