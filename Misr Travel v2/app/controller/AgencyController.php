<?php


class AgencyController{

	protected $requestmodel;

	public function __construct($requestmodel) {
        $this->requestmodel = $requestmodel;
    }

    public function insertRequest() {
		$name = $_REQUEST['name'];
		$checkin = $_REQUEST['checkin'];
		$checkout = $_REQUEST['checkout'];
		$hotel = $_REQUEST['hotel'];
		$program = $_REQUEST['program'];
		$price = $_REQUEST['price'];
		$status = $_REQUEST['status'];

		$this->requestmodel->getRequest($_REQUEST['id'])->insertRequest($name,$checkin,$checkout,$hotel,$program,$price);
	}

	public function editRequest() {
		$name = $_REQUEST['name'];
		$checkin = $_REQUEST['checkin'];
		$checkout = $_REQUEST['checkout'];
		$hotel = $_REQUEST['hotel'];
		$program = $_REQUEST['program'];
		$price = $_REQUEST['price'];
		$status = $_REQUEST['status'];

		$this->requestmodel->getRequest($_REQUEST['id'])->editRequest($name,$checkin,$checkout,$hotel,$program,$price,$status);
	}
	
	public function deleteRequest(){
		$this->requestmodel->getRequest($_REQUEST['id'])->deleteRequest();
	}

} 
?>