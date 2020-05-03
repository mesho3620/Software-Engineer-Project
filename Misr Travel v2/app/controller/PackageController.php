<?php

  require_once(__ROOT__ . "controller/Controller.php");

class PackageController extends Controller{

  public function insert() {
 		$name = $_REQUEST['name'];
 		$checkIn = $_REQUEST['checkIn'];
    $checkOut = $_REQUEST['checkOut'];
    $hotel = $_REQUEST['hotel'];
    $price = $_REQUEST['price'];
    $program = $_REQUEST['program'];

 		$this->model->insertPackage($name, $checkIn,$checkOut,$hotel, $program,$price);
 	}

 	public function edit() {
    $name = $_REQUEST['name'];
 		$checkIn = $_REQUEST['checkIn'];
    $checkOut = $_REQUEST['checkOut'];
    $hotel = $_REQUEST['hotel'];
    $price = $_REQUEST['price'];
    $program = $_REQUEST['program'];

    //$id=$_REQUEST['movID'];


 		$this->model->editPackage($name, $checkIn,$checkOut,$hotel, $program,$price);
 	}

 	public function delete(){
    //$id=$_REQUEST['delMov'];
    //echo $id;
 		$this->model->deleteMovie($id);
 	}

  }
?>
