<?php


class TouristController{

	protected $reservationmodel;
	protected $packagemodel;

	public function __construct($reservationmodel,$packagemodel) {
        $this->reservationmodel = $reservationmodel;
				$this->packagemodel=$packagemodel;
    }

    public function insertReservation() {
		$package_ID = $_REQUEST['package_ID'];

		$this->reservationmodel->insertReservation($package_ID);
	}

	public function deleteReservation(){
		$this->reservationmodel->getReservation($_REQUEST['id'])->deleteReservation;
	}
public function GetPackages()
{

	return $this->packagemodel->getPackages();

}
}
?>
