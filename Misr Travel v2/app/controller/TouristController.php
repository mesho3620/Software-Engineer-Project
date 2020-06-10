<?php


class TouristController{

	protected $reservationmodel;
	protected $packagemodel;
	protected $touristmodel;

	public function __construct($reservationmodel,$packagemodel,$touristmodel) {
        $this->reservationmodel = $reservationmodel;
				$this->packagemodel=$packagemodel;
				$this->touristmodel=$touristmodel;
    }

    public function insertReservation() {
		$package_ID = $_REQUEST['package_ID'];

		$this->reservationmodel->insertReservation($package_ID);
	}

	public function deleteReservation(){
		$reservation_ID = $_REQUEST['reservation_ID'];
		$this->reservationmodel->getReservation($reservation_ID)->deleteReservation();
	}
public function GetPackages()
{

	return $this->packagemodel->getPackages();

}
public function editProfile()
{
	$email=$_REQUEST['email'];
	$mobile=$_REQUEST['mobile'];
	$password=$_REQUEST['password'];
	$this->touristmodel->editUser($email,$password,$mobile);
}

}
?>
