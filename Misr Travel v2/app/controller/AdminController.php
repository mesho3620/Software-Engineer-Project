<?php


class AdminController{

	protected $touristmodel;
	protected $agencymodel;
	protected $staffmodel;
	protected $departmentmodel;
	protected $packagemodel;
	protected $requestmodel;
	protected $reservationmodel;
	protected $hotelmodel;
    
    public function __construct($touristmodel,$agencymodel,$staffmodel,$departmentmodel,$packagemodel,$requestmodel,$reservationmodel,$hotelmodel) {
        $this->touristmodel = $touristmodel;
        $this->agencymodel = $agencymodel;
        $this->staffmodel = $staffmodel;
        $this->departmentmodel = $departmentmodel;
        $this->packagemodel = $packagemodel;
        $this->requestmodel = $requestmodel;
        $this->reservationmodel = $reservationmodel;
        $this->hotelmodel = $hotelmodel;
    }
 
	public function insertHotel() {
		$city = $_REQUEST['city'];
		$location = $_REQUEST['location'];
		$rating = $_REQUEST['rating'];

		$this->hotelmodel->insertHotel($city,$location,$rating);
	}

	public function editHotel() {
		$city = $_REQUEST['city'];
		$location = $_REQUEST['location'];
		$rating = $_REQUEST['rating'];

		$this->hotelmodel->getHotel($_REQUEST['id'])->editHotel($city,$location,$rating);
	}
	
	public function deleteHotel(){
		$this->hotelmodel->getHotel($_REQUEST['id'])->deleteHotel();
	}

	public function insertDepartment() {
		$name = $_REQUEST['name'];

		$this->departmentmodel->insertDepartment($name);
	}

	public function editDepartment() {
		$name = $_REQUEST['name'];

		$this->departmentmodel->getDepartment($_REQUEST['id'])->editDepartment($name);
	}
	
	public function deleteDepartment(){
		$this->departmentmodel->getDepartment($_REQUEST['id'])->deleteDepartment();
	}

	public function insertStaff() {
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$mobile = $_REQUEST['mobile'];
		$departmentId = $_REQUEST['departmentId'];

		$this->staffmodel->insertStaff($name,$email,$password,$mobile,$departmentId);
	}

	public function editStaff() {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$mobile = $_REQUEST['mobile'];
		$departmentId = $_REQUEST['departmentId'];

		$this->staffmodel->getEmployee($_REQUEST['id'])->editUser($email,$password,$mobile,$departmentId);
	}
	
	public function deleteStaff(){
		$this->staffmodel->getEmployee($_REQUEST['id'])->deleteUser();
	}

	public function editAgency() {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$mobile = $_REQUEST['mobile'];
		$address = $_REQUEST['address'];

		$this->agencymodel->getAgency($_REQUEST['id'])->editUser($email,$password,$mobile,$address);
	}
	
	public function deleteAgency(){
		$this->agencymodel->getAgency($_REQUEST['id'])->deleteUser();
	}

	public function editTourist() {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$mobile = $_REQUEST['mobile'];

		$this->touristmodel->getTourist($_REQUEST['id'])->editUser($email,$password,$mobile);
	}
	
	public function deleteTourist(){
		$this->touristmodel->getTourist($_REQUEST['id'])->deleteUser();
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
		$this->reservationmodel->getReservation($_REQUEST['id'])->deleteReservation;
	}


  }


?>
