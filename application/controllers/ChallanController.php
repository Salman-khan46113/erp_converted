<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('CommonController.php');

class ChallanController extends CommonController {

	const VIEW_CHALLAN_PATH = "challan/";

	function _construct()
    {
        parent::_construct();
		$this->load->model('SupplierParts');
    }

	private function getPath(){
		return self::VIEW_CHALLAN_PATH;
	}

	private function test()	{
	$this->getPage('sales_reports.php', $data);

	}

	public function view_add_challan()
	{
		$this->challan_search();
	}

	public function challan_search()
	{
		$challanId = $this->input->post('challan_id');
		$supplierId = $this->input->post('supplier_id');

		$queryList = "SELECT c.id, c.challan_number FROM `challan` as c WHERE c.clientId =  ".$this->Unit->getSessionClientId()." order by c.id desc";
		$data['challanNo_list'] = $this->Crud->customQuery($queryList);
		$data['supplier'] = $this->Crud->read_data("supplier");

		if($challanId == "ALL"){
			$query ="SELECT c.*,s.supplier_name,s.id as sup_id
						FROM `supplier` as s, `challan` as c
						WHERE
						c.clientId =  ".$this->Unit->getSessionClientId()."
						AND c.supplier_id = s.id
						order by c.id desc";
		}else if(empty($challanId) && empty($supplierId)) {
			$query ="SELECT c.*,s.supplier_name,s.id as sup_id
						FROM `supplier` as s, `challan` as c
						WHERE
						c.clientId =  ".$this->Unit->getSessionClientId()."
						AND c.supplier_id = s.id
						order by c.id desc limit 10 ";
		}else{
			$suppCriteria = empty($supplierId)? " c.supplier_id is NOT NULL " : "c.supplier_id = ".$supplierId;
			$chalCriteria = empty($challanId)  ? "c.id is NOT NULL " : " c.id =".$challanId;
			$query = "SELECT c.*,s.supplier_name,s.id as sup_id
					FROM `supplier` as s, `challan` as c
		    		WHERE
					c.clientId =  ".$this->Unit->getSessionClientId()."
					AND c.supplier_id = s.id and ( ".$suppCriteria." AND ".$chalCriteria." ) order by c.id asc";
		}
		$data['challan'] = $this->Crud->customQuery($query);
		$data['consignee_list'] = $this->Crud->read_data_acc("consignee");

		//set search selection
		$data['challan_id']=$challanId;
		$data['supplier_id']=$supplierId;

		$this->loadView('store/view_add_challan', $data);		
	}

	public function view_challan_by_id()
	{
		$challan_id = $this->uri->segment('2');
		$data['challan_id'] = $challan_id;
		$data['challan_data'] = $this->Crud->get_data_by_id("challan", $challan_id, "id");
		if($data['challan_data'][0]->status !='completed'){
			$data['child_part']  = $this->SupplierParts->readSupplierPartsNotSubcon();
			$data['process'] = $this->Crud->read_data("process");
		}
		$data['challan_parts'] = $this->Crud->get_data_by_id("challan_parts", $challan_id, "challan_id");
		foreach ($data['challan_parts'] as $key => $p) {
			$child_part_data = $this->Crud->get_data_by_id("child_part", $p->part_id, "id");
			$data['challan_parts'][$key]->child_part_data = $child_part_data;
			$data2 = array(
                'challan_id' => $challan_id,
                'part_id' => $p->part_id,
            );
            $challan_parts_history_data = $this->Crud->get_data_by_id_multiple_condition("challan_parts_history", $data2);
            $data['challan_parts'][$key]->challan_parts_history_data = $challan_parts_history_data;
		}
		// pr($data['challan_parts'],1);
		$data['supplier'] = $this->Crud->get_data_by_id("supplier", $data['challan_data'][0]->supplier_id, "id");

		$this->loadView('store/view_challan_by_id', $data);
	}


	public function add_challan_parts()
	{
		$challan_id = $this->input->post('challan_id');

		$challanPartCount = $this->db->query('SELECT COUNT(*) as count FROM `challan_parts` where challan_id = ' . $challan_id)->row();
		if($challanPartCount->count >= 7) {
			$this->addWarningMessage("Already 7 parts added. No more parts are allowed.");
			$this->redirectMessage();
			exit();
		}

		$qty = $this->input->post('qty');
		$part_id = $this->input->post('part_id');
		$process = $this->input->post('process');

		$uniqueCheck = array(
			'challan_id' => $challan_id,
			'part_id' => $this->input->post('part_id'),

		);

		$challan_parts = $this->Crud->get_data_by_id_multiple_condition("challan_parts", $uniqueCheck);

		if ($challan_parts) {
			$this->addWarningMessage("Part already present.");
			$this->redirectMessage();
		} else {
			$child_part_data = $this->SupplierParts->getSupplierPartById($this->input->post('part_id'));
			$data = array(
				'challan_id' => $challan_id,
				'part_id' => $this->input->post('part_id'),
				'qty' => $this->input->post('qty'),
				'remaning_qty' => $this->input->post('qty'),
				'process' => $process,
				'value' => $child_part_data[0]->store_stock_rate * $qty,
				'hsn' => $child_part_data[0]->hsn_code,
				"created_date" => $this->current_date,
				"created_time" => $this->current_time,
				"day" => $this->date,
				"month" => $this->month,
				"year" => $this->year,
			);

			$current_stock = $child_part_data[0]->stock;

			if ((float)$qty > (float)$current_stock) {
				$this->addWarningMessage("Store stock quantity is less than entered quantity.");
				$this->redirectMessage();
			} else {
				$inser_query = $this->Crud->insert_data("challan_parts", $data);
				if ($inser_query) {
					$updateResult = $this->db->query("update child_part set stock = stock - ".$qty.", sub_con_stock = sub_con_stock + ".$qty."
					where child_part.id =".$part_id);
					if($updateResult){
						$this->addSuccessMessage("Part added.");
					}else{
						$this->addErrorMessage("Error while adding quantity to stock.");
					}
					$this->redirectMessage();

						/*
						$current_stock = $child_part_data[0]->stock;
						old code $new_stock = $current_stock - $qty;
						$oldSubcon = $child_part_data[0]->sub_con_stock;
						$newsubcon = $oldSubcon + $qty;

						$stockUpdate = array(
							'stock' => $new_stock,
							'sub_con_stock' => $newsubcon,
						);

						$update = $this->Crud->update_data("child_part", $stockUpdate, $part_id);
						if ($update) {
							$this->addSuccessMessage("Part added successfully");
						} else {
							$this->addErrorMessage("Error while updating Qty to stock");
						}*/

				} else {
					$this->addErrorMessage("Error while adding quantity.");
					$this->redirectMessage();
				}
			}
		}
	}

	public function delete_challan_part()
	{
		$id = $this->input->post('id');
		$partQty = $this->input->post('partQty');
		$part_id = $this->input->post('part_id');

		$table_name = $this->input->post('table_name');

		$data = array(
			"id" => $id
		);
		$result = $this->Crud->delete_data($table_name, $data);

		if ($result) {
			//select stock,sub_con_stock from child_part where id = 1
			//97,1003
			$updateResult = $this->db->query("update child_part set stock = stock + ".$partQty.", sub_con_stock = sub_con_stock - ".$partQty."
			where child_part.id =".$part_id);
			if($updateResult){
				$this->addSuccessMessage("Part successfully deleted.");
			}else{
				$this->addErrorMessage("Error while updating Qty to stock.");
			}
		} else {
			$this->addErrorMessage("Failed to delete part.");
		}
		$this->redirectMessage();
	}

	private function getPage($viewPage,$viewData){
		$this->getHeaderPage();
		$this->load->view($this->getPath().$viewPage,$viewData);
		$this->load->view('footer.php');
	}


	public function generate_challan()
	{
		$sub_po_id = $this->input->post('sub_po_id');
		$supplier_id = $this->input->post('supplier_id');
		$sub_po_id = $this->input->post('sub_po_id');
		$supplier_id = $this->input->post('supplier_id');
		$vechical_number = $this->input->post("vechical_number");
		$remark = $this->input->post("remark");
		$mode = $this->input->post("mode");
		$transpoter = $this->input->post("transpoter");
		$l_r_number = $this->input->post("l_r_number");

		$ship_addressType = $this->input->post('ship_addressType');
		$consignee_id = $this->input->post('consignee');

		$latestSeqFormat = $this->Crud->customQuery("SELECT challan_number FROM challan WHERE challan_number like '" . $this->getChallanSerialNo() . "%' order by id desc LIMIT 1");
		foreach ($latestSeqFormat as $p) {
			$currentChallanNo = $p->challan_number;
		}

		$challan_num = substr($currentChallanNo, strlen($this->getChallanSerialNo())) + 1;
		$challan_number = $this->getChallanSerialNo() . $challan_num;

		$data = array(
				"clientId" => $this->Unit->getSessionClientId(),
				"challan_number" => $challan_number,
				"supplier_id" => $supplier_id,
				"shipping_addressType" => $ship_addressType,
				"consignee_id" => $consignee_id,
				"remark" => $remark,
				"vechical_number" => $vechical_number,
				"mode" => $mode,
				"transpoter" => $transpoter,
				"l_r_number" => $l_r_number,
				"created_date" => $this->current_date,
				"created_time" => $this->current_time,
				"day" => $this->date,
				"month" => $this->month,
				"year" => $this->year,
			);

			$result = $this->Crud->insert_data("challan", $data);
			if ($result) {
				echo "<script>alert('Successfully Added');document.location='" . base_url('view_challan_by_id/') . $result . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
	}
}
