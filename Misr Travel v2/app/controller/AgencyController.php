<?php


class AgencyController{

	protected $requestmodel;
	protected $agencymodel;

	public function __construct($requestmodel,$agencymodel) {
        $this->requestmodel = $requestmodel;
        $this->agencymodel = $agencymodel;
    }
    public function editAgency() {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$mobile = $_REQUEST['mobile'];
		$address = $_REQUEST['address'];

		$this->agencymodel->editUser($email,$password,$mobile,$address);
	}

    public function insertRequest() {
		$name = $_REQUEST['name'];
		$checkin = $_REQUEST['checkin'];
		$checkout = $_REQUEST['checkout'];
		$hotel = $_REQUEST['hotel'];
		$program = $_REQUEST['program'];
		// $price = $_REQUEST['price'];
		$touristsno = $_REQUEST['touristsno'];
		// $status = $_REQUEST['status'];

	$this->requestmodel->insertRequest($name,$checkin,$checkout,$hotel,$program,$touristsno/*,$price*/);
	}

	public function editRequest() {
		$name = $_REQUEST['name'];
		$checkin = $_REQUEST['checkin'];
		$checkout = $_REQUEST['checkout'];
		$hotel = $_REQUEST['hotel'];
		$program = $_REQUEST['program'];
		$price = $_REQUEST['price'];
		$touristsno = $_REQUEST['touristsno'];
		$status = $_REQUEST['status'];

		$this->requestmodel->getRequest($_REQUEST['id'])->editRequest($name,$checkin,$checkout,$hotel,$program,$price,$touristsno,$status);
	}

	public function deleteRequest(){
		$this->requestmodel->getRequest($_REQUEST['id'])->deleteRequest();
	}

}
?>
