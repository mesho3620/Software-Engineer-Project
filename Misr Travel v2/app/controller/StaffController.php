<?php


class StaffController{


	protected $packagemodel;
	protected $requestmodel;
	protected $reservationmodel;

    public function __construct($packagemodel,$requestmodel,$reservationmodel) {

        $this->packagemodel = $packagemodel;
        $this->requestmodel = $requestmodel;
        $this->reservationmodel = $reservationmodel;
    }

	public function insertHotel() {
		$city = $_REQUEST['city'];
		$location = $_REQUEST['location'];
		$rating = $_REQUEST['rating'];

		$this->hotelmodel->insertHotel($city,$location,$rating);
	}

	public function editRequest() {
		$price = $_REQUEST['price'];
		$status = "Done";
		$request = $this->requestmodel->getRequest($_REQUEST['id']);
		$request->editRequest($request->getName(),$request->getCheckin(),$request->getCheckout(),$request->getProgram(),$price,$request->getTouristsNo(),$status);
	}

	public function deleteRequest(){
		$this->requestmodel->getRequest($_REQUEST['id'])->deleteRequest();
	}

	public function insertPackage() {
		$name = $_REQUEST['name'];
		$checkin = $_REQUEST['checkin'];
		$checkout = $_REQUEST['checkout'];
		$hotel = $_REQUEST['hotel'];
		$program = $_REQUEST['program'];
		$price = $_REQUEST['price'];

		$this->packagemodel->insertPackage($name,$checkin,$checkout,$hotel,$program,$price);
	}

	public function editPackage() {
		$name = $_REQUEST['name'];
		$checkin = $_REQUEST['checkin'];
		$checkout = $_REQUEST['checkout'];
		$hotel = $_REQUEST['hotel'];
		$program = $_REQUEST['program'];
		$price = $_REQUEST['price'];

		$this->packagemodel->getPackage($_REQUEST['id'])->editPackage($name,$checkin,$checkout,$hotel,$program,$price);
	}

	public function deletePackage(){
		$this->packagemodel->getPackage($_REQUEST['id'])->deletePackage();
	}

	public function deleteReservation(){
		$this->reservationmodel->getReservation($_REQUEST['id'])->deleteReservation();
	}


  }


?>
