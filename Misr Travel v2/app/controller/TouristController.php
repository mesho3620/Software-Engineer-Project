<?php


class TouristController{

	protected $reservationmodel;

	public function __construct($reservationmodel) {
        $this->reservationmodel = $reservationmodel;
    }

    public function insertReservation() {
		$package_ID = $_REQUEST['package_ID'];

		$this->reservationmodel->insertReservation($package_ID);
	}
	
	public function deleteReservation(){
		$this->reservationmodel->getReservation($_REQUEST['id'])->deleteReservation;
	}

} 
?>