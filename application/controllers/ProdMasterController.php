<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('CommonController.php');

class ProdMasterController extends CommonController {

	function __construct() {
		parent::__construct();
	}

	public function shifts()
	{
		$data['shifts'] = $this->Crud->read_data("shifts",true);
		$this->loadView('admin/shifts', $data);
	}


	public function addShift()
	{
		$name = $this->input->post('shiftName');
		$start_time = $this->input->post('shiftStart');
		$end_time = $this->input->post('end_time');
		$shift_type = $this->input->post('shiftType');
		$end_time = $this->input->post('shiftEnd');
		$ppt = $this->input->post('ppt');

		$clientId = $this->Unit->getSessionClientId();

		$data = array(
			"name" => $name,
			"start_time" => $start_time,
			"end_time" => $end_time,
			"shift_type" => $shift_type,
			"ppt" => $ppt
		);

		$result = $this->Crud->insert_data("shifts", $data, true);

		if ($result) {
			$success = 1;
			$messages = "shifts added successfully.";
		} else {
			$success = 0;
			$messages = "Unable to add data.";
		}

		$return_arr['success']=$success;
		$return_arr['messages']=$messages;
		echo json_encode($return_arr);
		exit;

	}

	/**
	* Operator
	*/
	public function operator()
	{
		$data['operator'] = $this->Crud->read_data("operator",true);
		$this->loadView('admin/operator', $data);
	}

	public function add_operator()
	{

		$clientId = $this->Unit->getSessionClientId();

		$data = array(
			'name' => $this->input->post('name'),
		);

		$check = $this->Crud->read_data_where("operator", $data, true);
		if ($check != 0) {
			// echo "<script>alert('Record already exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			// exit();
			$success = 0;
			$messages = "Record already exists";
		}

		$inser_query = $this->Crud->insert_data("operator", $data, true);


		if ($inser_query) {
			$success = 1;
			$messages = "Data added successfully.";
		} else {
			$success = 0;
			$messages = "Error while Adding ,try again.";
		}

		$return_arr['success']=$success;
		$return_arr['messages']=$messages;
		echo json_encode($return_arr);
		exit;
	}

	public function machine()
	{
		$data['machine'] = $this->Crud->read_data("machine",true);
		$this->loadView('admin/machine', $data);
	}

	public function add_machine()
	{
		$clientId = $this->Unit->getSessionClientId();


		$data = array(
			'name' => $this->input->post('name'),
		);

		$check = $this->Crud->read_data_where("machine", $data, true);
		if ($check != 0) {
			$success = 0;
			$messages = "Record already exists.";
			// echo "<script>alert('Record already exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			// exit();
		}

		$inser_query = $this->Crud->insert_data("machine", $data, true);

		if ($inser_query) {
			$success = 1;
			$messages = "Data added successfully.";
		} else {
			$success = 0;
			$messages = "Error while Adding ,try again.";
		}

		$return_arr['success']=$success;
		$return_arr['messages']=$messages;
		echo json_encode($return_arr);
		exit;
	}

}
