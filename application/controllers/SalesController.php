<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('CommonController.php');

class SalesController extends CommonController
{

	const VIEW_PATH = "sales/";

	function _construct()
	{
		parent::_construct();
		$this->load->model('CustomerPart');
	}

	private function getViewPath()
	{
		return self::VIEW_PATH;
	}

	public function sales_invoice_released()
	{
		/* 
	 Pagination code
	 //http://localhost/bsperp/bsp-gsthero-dev/sales_invoice_released12/10
		
	   $config = array();
       $config["base_url"] = base_url() . "sales_invoice_released";
       $config["total_rows"] = $this->Crud->record_count("new_sales");
       $config["per_page"] = 10;
       $config["uri_segment"] = 2;
       $this->pagination->initialize($config);
       $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	   
	   $data['new_sales'] = $this->Crud->read_data_with_limit("new_sales",$config["per_page"], $page);
	   $data["links"] = $this->pagination->create_links();
	*/

		$created_month = $this->input->post('created_month');
		$created_year = $this->input->post('created_year');

		if (empty($created_month)) {
			$created_month = $this->month;
		}

		if (empty($created_year)) {
			$created_year = $this->year;
		}

		//print_r("created_month: ".$created_month);
		//print_r("created_year: ".$created_year);

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		//$data['job_card'] = $this->Crud->read_data("job_card");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		//$data['new_sales'] = $this->Crud->read_data("new_sales");

		$sql = "SELECT new_sales.*,cus.customer_name,eres.Status,eres.EwbStatus FROM new_sales 
		left join customer cus on new_sales.customer_id = cus.id
		left join einvoice_res eres on new_sales.id = eres.new_sales_id 
		WHERE clientId = ".$this->Unit->getSessionClientId()." AND created_month = " . $created_month . " AND created_year = " . $created_year . " order by id desc";
		$data['new_sales']  = $this->Crud->customQuery($sql);
		$data['created_year'] = $created_year;
		$data['created_month'] = $created_month;
		
		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` ');
		// $data['customer_part_list'] = $role_management_data->result();

		
		if($data['new_sales']){
			foreach ($data['new_sales'] as $c) {
				$sales_id = $c->id;
				$po_parts = $this->Crud->get_data_by_id("sales_parts", $sales_id, "sales_id");
				$final_po_amount[$sales_id] = 0;
				if ($po_parts) {
					foreach ($po_parts as $p) {
						$data['subtotal'][$sales_id] =  $p->total_rate - $p->gst_amount;
						$data['row_total'][$sales_id] =(float) $p->total_rate+(float)$p->tcs_amount;
						$data['final_po_amount'][$sales_id] = (float)$final_po_amount[$sales_id] + (float)$row_total[$sales_id];
					}
				}
	
			}
		}
		
		
		for ($i = 1; $i <= 12; $i++) {
			$data['month_data'][$i] = $this->Common_admin_model->get_month($i);
			$data['month_number'][$i] = $this->Common_admin_model->get_month_number($data['month_data'][$i]);
		}
		$this->loadView('sales/sales_invoice_released', $data);
	}

	public function new_sales()
	{

		$data['id'] = $this->uri->segment('2');
		// $data['customer'] = $this->Crud->get_data_by_id("customer_part", $data['id'], "id");

		// $data['supplier'] = $this->Crud->read_data("supplier");
		$data['customer'] = $this->Crud->read_data("customer");
		$data['transporter'] = $this->Crud->read_data("transporter");

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['bom_list'] = $this->Crud->read_data("bom");
		// $data['bom_list'] = $this->Crud->get_data_by_id("bom", $data['id'], "customer_part_id");
		//$child_part_list = $this->db->query('SELECT DISTINCT po_number,po_end_date FROM `customer_po_tracking`');
		//$data['new_po'] = $child_part_list->result();
		//$data['client_list'] = $this->Crud->read_data_acc("client");
		$data['consignee_list'] = $this->Crud->read_data_acc("consignee");
		$this->loadView('sales/new_sales', $data);
	}

	public function generate_new_sales()
	{
		$customer_id = $this->input->post('customer_id');
		$remark = $this->input->post('remark');
		$clientUnit = $this->Unit->getSessionClientId();
		$mode = $this->input->post('mode');
		$transporter = $this->input->post('transporter');
		$vehicle_number = $this->input->post('vehicle_number');
		$lr_number = $this->input->post('lr_number');
		$part_id = $this->input->post('part_id');
		$distance = $this->input->post('distance');

		$ship_addressType = $this->input->post('ship_addressType');
		$consignee_id = $this->input->post('consignee');

		$data['new_sales'] = $this->Crud->read_data("new_sales");

		$data = array(
			"customer_id" => $customer_id,
		);

		$sql = "SELECT sales_number FROM new_sales WHERE sales_number like '" . $this->getSalesNoFormat(true,true). "'
				 order by id desc LIMIT 1";
		$latestTempSeqFormat = $this->Crud->customQuery($sql);
		foreach ($latestTempSeqFormat as $p) {
			$currentSaleNo = $p->sales_number;
		}
		$sales_num = $this->getCompleteSalesNumber(true,$currentSaleNo); 
		$cretd_dt = date('d/m/Y', strtotime($this->current_date));

		$data = array(
			"clientId" => $clientUnit,
			"sales_number" => $sales_num,
			"customer_id" => $customer_id,
			"consignee_id" => $consignee_id,
			"shipping_addressType" => $ship_addressType,
			"customer_part_id" => $part_id,
			"remark" => $remark,
			"distance" => $distance,
			"mode" => $mode,
			"transporter_id" => $transporter,
			"vehicle_number" => $vehicle_number,
			"lr_number" => $lr_number,
			"created_by" => $this->user_id,
			"created_date" => $cretd_dt,
			"created_time" => $this->current_time,
			"created_by" => $this->current_date,
			"created_day" => $this->date,
			"created_month" => $this->month,
			"created_year" => $this->year
		);


		$result = $this->Crud->insert_data("new_sales", $data);
		if ($result) {
			$this->addSuccessMessage('Sales invoice created.');
			$this->redirectMessage('view_new_sales_by_id/' . $result);
		} else {
			$this->addErrorMessage('Unable to create sales invoice.');
			$this->redirectMessage();
		}
	}

	public function generate_new_sales_update()
	{
		$id = $this->input->post('id');
		$remark = $this->input->post('remark');
		$mode = $this->input->post('mode');
		$transporter_id = $this->input->post('transporter');
		$vehicle_number = $this->input->post('vehicle_number');
		$lr_number = $this->input->post('lr_number');
		$distance = $this->input->post('distance');

		$data = array(
			"remark" => $remark,
			"mode" => $mode,
			"transporter_id" => $transporter_id,
			"vehicle_number" => $vehicle_number,
			"lr_number" => $lr_number,
			"distance" => $distance,
		);
		$result = $this->Crud->update_data_column("new_sales", $data, $id, "id");
		if ($result) {
			$this->addSuccessMessage('Sales invoice updated.');
		} else {
			$this->addErrorMessage('Sales invoice not updated.');
		}
		$this->redirectMessage('view_new_sales_by_id/' . $id);
	}


	public function get_customer_parts_for_sale()
	{
		$customer_id = $this->input->post('id');
	
		$customer_parts = $this->Crud->get_data_by_id("customer_part", $customer_id, 'customer_id');
		echo '<select>Select Part Number // Description // FG Stock // Rate // Tax Structure';
		if ($customer_parts) {
			foreach ($customer_parts as $value) {
				$customer_parts_master_data = $this->CustomerPart->getCustomerPartByPartNumber($value->part_number);
				$gst_structure = $this->Crud->get_data_by_id("gst_structure", $value->gst_id, 'id');
				$customer_part_rate = $this->Crud->get_data_by_id("customer_part_rate", $value->id, 'customer_master_id');
				if (!empty($customer_part_rate[0]->rate)) {
					echo '<option value="' . $value->id . '">'.$value->part_number . ' // ' . $value->part_description . ' // ' . $customer_parts_master_data[0]->fg_stock . ' // ' . $customer_part_rate[0]->rate . ' // ' . $gst_structure[0]->code . '</option>';
				}
			}
		} else {
			echo '<option value="">Select</option>';
		}
		echo '</select>';
	}

	public function get_customer_parts_using_po_details_for_sale()
	{
		$po_id = $this->input->post('id');
		//$salesno = $this->input->post('salesno');
		$customer_tracking_parts = $this->Crud->get_data_by_id("parts_customer_trackings", $po_id, 'customer_po_tracking_id');
		//$customer_part = $this->Crud->get_data_by_id("customer_part", $customer_tracking_parts[0]->part_id,'id');

		echo '<select>Select Part Number // Description // FG Stock // Rate // Tax Structure';
		if ($customer_tracking_parts) {
			foreach ($customer_tracking_parts  as $val) {
				$query = "SELECT * FROM customer_part WHERE id = " . $val->part_id . "";
				$result = $this->db->query($query);
				if (count($result) > 0) {
					foreach ($result->result_array() as $key => $value) {
						$customer_parts_master_data = $this->CustomerPart->getCustomerPartByPartNumber($value['part_number']);
						$gst_structure = $this->Crud->get_data_by_id("gst_structure", $value['gst_id'], 'id');
						$customer_part_rate = $this->Crud->get_data_by_id("customer_part_rate", $val->part_id, 'customer_master_id');
						$sales_parts = $this->Crud->get_data_by_id("sales_parts", $val->part_id, 'part_id');
						if (!empty($customer_part_rate[0]->rate)) {
							echo '<option value="' . $value['id'] . '">' . $po_id . "-" . $value['part_number'] . ' // ' . $value['part_description'] . ' // ' . $customer_parts_master_data[0]->fg_stock . ' // ' . $customer_part_rate[0]->rate . ' // ' . $gst_structure[0]->code . '</option>';
						}
					}
				}
			}
		} else {
			echo '<option value=""></option>';
		}
		echo '</select>';
	}


	public function view_new_sales_by_id()
	{
		$sales_id = $this->uri->segment('2');
		$data['uri_segment_2'] = $sales_id;
		$data['new_sales'] = $this->Crud->get_data_by_id("new_sales", $sales_id, "id");
		
		$data['customer'] = $this->Crud->get_data_by_id("customer", $data['new_sales'][0]->customer_id, "id");
		$data['customer_part_details'] = $this->Crud->get_data_by_id("customer_part", $data['new_sales'][0]->customer_part_id, "id");
		$data['session_type'] = $this->session->userdata['type'];
		//$data['gst_structure'] = $this->Crud->read_data("gst_structure");
		//$data['uom'] = $this->Crud->read_data("uom");
		$data['customer_tracking'] = $this->Crud->customQuery('SELECT po.* FROM customer_po_tracking as po, 
		parts_customer_trackings as po_parts 
		WHERE po.status = "pending" AND po.customer_id =' . $data['new_sales'][0]->customer_id . '
		 AND po.id = po_parts.customer_po_tracking_id AND po_parts.part_id = ' . $data['new_sales'][0]->customer_part_id);

		//old -> $data['customer_tracking'] = $this->Crud->get_data_by_id("customer_po_tracking", $data['new_sales'][0]->customer_id, 'customer_id');

		
		$data['einvoice_res_data'] = $this->Crud->get_data_by_id("einvoice_res", $sales_id, "new_sales_id");
		$data['po_parts'] = $this->Crud->get_data_by_id("sales_parts", $sales_id, "sales_id");
		
		$data['child_part'] = $this->Crud->get_data_by_id("customer_part", $data['new_sales'][0]->customer_id, "customer_id");
		$data['transporter'] = $this->Crud->read_data("transporter");
		// $child_part_list = $this->db->query('SELECT DISTINCT part_number,supplier_id FROM `customer_part` where supplier_id = ' . $data['supplier'][0]->id . '');
		// $data['child_part'] = $child_part_list->result();
		$data['e_invoice_status'] = $this->Crud->get_data_by_id("einvoice_res", $this->uri->segment('2'), "new_sales_id");
		// pr($data['e_invoice_status'],1);
		foreach ($variable as $p) {
			$data['child_part_data'][$p->part_id] = $this->Crud->get_data_by_id("customer_part", $p->part_id, "id");
			$data['gst_structure2'][$p->part_id] = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");
		}
		

		$this->loadView('sales/view_new_sales_by_id', $data);
	}

	public function add_sales_parts()
	{
		$customer_id = $this->input->post('customer_id');
		$po_id = $this->input->post('po_id');
		$sales_id = $this->input->post('sales_id');
		$po_number = $this->input->post('po_number');
		$part_id = $this->input->post('part_id');
		$sales_number = $this->input->post('sales_number');
		$qty = $this->input->post('qty');

		$salesdata = $this->db->query('SELECT sales_id FROM `sales_parts` where sales_id = ' . $sales_id . ' ');
		$salesdata_result = $salesdata->result();
		$added_saled_count = count($salesdata_result);

		if ($added_saled_count == '7') {
			echo "<script>alert('Already 7 Parts Added.');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}

		$customer_part = $this->Crud->get_data_by_id("customer_part", $part_id, "id");
		$customer_parts_master_data = $this->CustomerPart->getCustomerPartByPartNumber($customer_part[0]->part_number);
		$job_card_data = $this->Crud->get_data_by_id("job_card", $part_id, "customer_part_id");

		/**
		 * PO Balance qty should be more than requested qty to be added.
		 */
		$po_part_criteria = array(
			'customer_po_tracking_id' => $po_id,
			'part_id' => $part_id
		);

		$po_part_details = $this->Crud->get_data_by_id_multiple_condition("parts_customer_trackings", $po_part_criteria);
		if ($qty > $po_part_details[0]->qty) {
			$this->addErrorMessage("Insufficient PO Part balance qty. PO Part balance qty is " . $po_part_details[0]->qty);
			$this->redirectMessage();
			exit();
		}

		$prod_qty_new = 0;
		if ($job_card_data) {
			foreach ($job_card_data as $j) {
				$job_card_prod_qty_ = $this->db->query('SELECT DISTINCT operation_id FROM `job_card_prod_qty` where job_card_id = ' . $j->id . ' ORDER BY operation_id ASC ');
				$job_card_prod_qty_data = $job_card_prod_qty_->result();
				if ($job_card_prod_qty_data) {
					$array_count = count($job_card_prod_qty_data);

					$operation_id_prod = $job_card_prod_qty_data[$array_count - 1]->operation_id;
					$array_main = array(
						"operation_id" => $operation_id_prod,
						"job_card_id" => $j->id,

					);

					$job_card_prod_qty_prod = $this->Crud->get_data_by_id_multiple_condition("job_card_prod_qty", $array_main);

					if ($job_card_prod_qty_prod) {
						foreach ($job_card_prod_qty_prod as $jcp) {
							$prod_qty_new = $prod_qty_new + $jcp->production_qty;
						}
					}
				
				} 
			}
		}
		
		if ($qty > $customer_parts_master_data[0]->fg_stock) {
			$this->addErrorMessage("Please check FG stock");
			$this->redirectMessage();
			exit();
		} else {
			$customer_part_rate = $this->Crud->get_data_by_id("customer_part_rate", $part_id, "customer_master_id");
			$total_rate_old = $customer_part_rate[0]->rate * $qty;

			$gst_structure2 = $this->Crud->get_data_by_id("gst_structure", $customer_part[0]->gst_id, "id");
			$cgst_amount = ($total_rate_old * $gst_structure2[0]->cgst) / 100;
			$sgst_amount = ($total_rate_old * $gst_structure2[0]->sgst) / 100;
			$igst_amount = ($total_rate_old * $gst_structure2[0]->igst) / 100;

			if ($gst_structure2[0]->tcs_on_tax == "no") {
				$tcs_amount =   (($total_rate_old * $gst_structure2[0]->tcs) / 100);
			} else {
				$tcs_amount =  ((($cgst_amount + $sgst_amount + $igst_amount + $total_rate_old) * $gst_structure2[0]->tcs) / 100);
			}
			$gst_amount = $cgst_amount + $sgst_amount + $igst_amount;
			$total_rate = $total_rate_old + $cgst_amount + $sgst_amount + $igst_amount;

	
			$data = array(
				"part_id" => $part_id,
				"sales_number" => $sales_number,
			);
			$check = $this->Crud->read_data_where("sales_parts", $data);
			if ($check) {
				$this->addErrorMessage("Part Already Exists To This Invoice Number , Enter Different Part");
				$this->redirectMessage();
				exit();
			} else {
				$customer_po_tracking_data = $this->Crud->get_data_by_id("customer_po_tracking", $po_id, "id");

				$data = array(
					"sales_id" => $sales_id,
					"sales_number" => $sales_number,
					"customer_id" => $customer_id,
					"part_id" => $part_id,
					"tax_id" => $customer_part[0]->gst_id,
					"uom_id" => $customer_part[0]->uom,
					"hsn_code" => $customer_part[0]->hsn_code,
					"part_price" => $customer_part_rate[0]->rate,
					"basic_total" => $total_rate_old,
					"total_rate" => round($total_rate, 2),
					"gst_amount" => $gst_amount,
					"tcs_amount" => $tcs_amount,
					"cgst_amount" => $cgst_amount,
					"sgst_amount" => $sgst_amount,
					"igst_amount" => $igst_amount,
					"qty" => $this->input->post('qty'),
					"pending_qty" => $this->input->post('qty'),
					"invoice_number" => $this->input->post('invoice_number'),
					"created_by" => $this->user_id,
					"created_date" => $this->current_date,
					"created_time" => $this->current_time,
					"created_day" => $this->date,
					"created_month" => $this->month,
					"created_year" => $this->year,
					"po_number" => $customer_po_tracking_data[0]->po_number,
					"po_date" => $customer_po_tracking_data[0]->po_start_date,
				);

				$result = $this->Crud->insert_data("sales_parts", $data);
				if ($result) {
					$this->addSuccessMessage("Part added successfully.");
				} else {
					$this->addErrorMessage("Unable to add part. Please try again.");
				}
				$this->redirectMessage();
			}
		}
	}

	public function lock_invoice()
	{

		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$po_parts  = $this->Crud->get_data_by_id("sales_parts", $id, "sales_id");
		$isLocked = false;

		if (!isset($id) || !isset($po_parts[0]->sales_number)) {
			$isLocked = true;
		}

		//avoid double post so check whether the lock status is there before locking...
		if (strpos($po_parts[0]->sales_number, $this->getSalesNoFormat(false,false)) !== false) {
			$new_sales_number = $po_parts[0]->sales_number;
			$sales_data = $this->Crud->get_data_by_id("new_sales", $po_parts[0]->sales_number, "sales_number");
			if ($sales_data[0]->status == 'lock') {
				$isLocked = true;
			}
		} 
		
		if ($isLocked == false) {
			$sql = "SELECT actualSalesNo FROM new_sales WHERE status!='pending' AND sales_number like'" . $this->getSalesNoFormat(false,true) . "' order by actualSalesNo  desc LIMIT 1";
			$latestSalesNo = $this->Crud->customQuery($sql);
			foreach ($latestSalesNo as $p) {
				$currentSaleNo = $p->actualSalesNo;
			}

			$new_lockCount = $currentSaleNo + 1;
			$new_sales_number = $this->getLockSalesNumber($new_lockCount);
			//updated created date when the invoice is locked..
			$cretd_dt = date('d/m/Y', strtotime($this->current_date));

			$data = array(
				"actualSalesNo" => $new_lockCount,
				"status" => $status,
				"sales_number" => $new_sales_number,
				"created_date" => $cretd_dt
			);

			//transaction management - as of now not working
			$this->db->trans_start();
			$result = $this->Crud->update_data("new_sales", $data, $id);
			$sale_part_data = array(
				"sales_number" => $new_sales_number,
				"created_date" => $this->current_date
			);
			if ($result) {
				//update sales_parts with new sales number 
				$result = $this->Crud->update_data_column("sales_parts", $sale_part_data, $id, "sales_id");
			}
			$this->db->trans_complete();

			//check if transaction status TRUE or FALSE
			if ($this->db->trans_status() === FALSE) {
				//if something went wrong, rollback everything
				$this->db->trans_rollback();
				$this->addErrorMessage('Error 410 :  Not Updated');
				$this->redirectMessage();
			} else {
				//if everything went right, commit the data to the database
				$this->db->trans_commit();
				if ($po_parts) {
					foreach ($po_parts as $p) {
						$customer_part_id = $p->part_id;
						$customer_part_data  = $this->Crud->get_data_by_id("customer_part", $customer_part_id, "id");
						$customer_parts_master_data  = $this->CustomerPart->getCustomerPartByPartNumber($customer_part_data[0]->part_number);
						$old_fg_stock = $customer_parts_master_data[0]->fg_stock;

						$new_fg_stock = $old_fg_stock - ($p->qty);

						$data_update = array(
							"fg_stock" => $new_fg_stock,
						);
						$result2 = $this->CustomerPart->updateStockById($data_update, $customer_parts_master_data[0]->id);
					}
				}
				$this->addSuccessMessage('Updated Sucessfully');
				$this->redirectMessage();
			}
		} else {
			$this->addWarningMessage('Invoice already locked.');
			$this->redirectMessage("sales_invoice_released");
		}
	}


	public function cancel_sale_invoice()
	{

		$sales_id = $this->input->post('sales_id');
		$sales_number = $this->input->post('sales_number');
		$status = $this->input->post('status');

		$sales_part_data = array(
			"basic_total" => 0,
			"total_rate" => 0,
			"cgst_amount" => 0,
			"sgst_amount" => 0,
			"igst_amount" => 0,
			"tcs_amount" => 0,
			"gst_amount" => 0
		);

		$cancel_parts = $this->Crud->update_data_column("sales_parts", $sales_part_data, $sales_id,"sales_id");

		if($cancel_parts){
			$cancel_data = array(
				"status" => 'Cancelled'
			);

			$result = $this->Crud->update_data("new_sales", $cancel_data, $sales_id);
			//check if transaction status TRUE or FALSE
			if ($result) {
				if ($status == 'lock') {
					$this->addSuccessMessage('Sales invoice ' . $sales_number . ' cancelled. <br> Note: Please update FG Stock manually.');
				} else {
					$this->addSuccessMessage('Sales invoice ' . $sales_number . ' cancelled.');
				}
				$this->redirectMessage('view_new_sales_by_id/' . $sales_id);
			} else {
				$this->addErrorMessage('Failed to cancel Sales invoice ' . $sales_number);
				$this->redirectMessage('view_new_sales_by_id/' . $sales_id);
			}
		} else {
			$this->addErrorMessage('Failed to cancel Sales invoice ' . $sales_number);
			$this->redirectMessage('view_new_sales_by_id/' . $sales_id);
		}	
	}


	/*
		Delete sales invoice which are pending only
	*/
	public function delete_sale_invoice()
	{
		$sales_id = $this->input->post('sales_id');
		$status = $this->input->post('status');

		$sales_part_data = array(
			"sales_id" => $sales_id,
		);

		$data = array(
			"id" => $sales_id,
			"status" => 'pending'
		);

		//transaction management - as of now not working
		$this->db->trans_start();
		$result = $this->Crud->delete_data("sales_parts", $sales_part_data);
		$result = $this->Crud->delete_data("new_sales", $data);
		$this->db->trans_complete();

		//check if transaction status TRUE or FALSE
		if ($this->db->trans_status() === FALSE) {
			//if something went wrong, rollback everything
			$this->db->trans_rollback();
			$this->addErrorMessage('Failed to delete Sales invoice ' . $sales_number);
			$this->redirectMessage('sales_invoice_released');
		} else {
			//if everything went right, commit the data to the database
			$this->db->trans_commit();
			$this->addSuccessMessage('Sales invoice ' . $sales_number . ' deleted.');
			$this->redirectMessage('sales_invoice_released');
		}
	}

	public function sales_report()
	{
		if (isset($_POST['export'])) {

			$searchYear = $this->input->post('search_year');
			$searchMonth = $this->input->post('search_month');
			$sales_ids = $this->input->post('sale_numbers');
			$where_condition = "AND sales.clientId = ".$this->Unit->getSessionClientId()."  ";
			if(!empty($searchYear)) {
					$where_condition = $where_condition."
					AND ((sales.created_year = ".$searchYear." AND sales.created_month >= 4)
					OR
					(sales.created_year = ".($searchYear + 1)." AND sales.created_month <= 3)) ";
			}

			if(empty($sales_ids) && !empty($searchMonth)) {
				$where_condition = $where_condition." AND sales.created_month = ".$searchMonth." ";
			}

			if(!empty($sales_ids)) {
				if(strpos($sales_ids, '-')!== false) { //range selection
					//echo "<br>range selection";
					$serial_range = explode("-", $sales_ids);
					$saleNo_condition = " AND sales.actualSalesNo between ".$serial_range[0]." AND ".$serial_range[1];
				} else if(strpos($sales_ids, ',')!== false) { //specific search
					//echo "<br>list search";
					$serial_list = explode("-", $sales_ids);
					$saleNo_condition = " AND sales.actualSalesNo in ( ".$sales_ids." )";
					/*foreach($serial_list as $list){
						$list_in = $list.",";	
					}*/
					//$where_condition = $where_condition.$list_in.")";
				} else if (strpos($sales_ids, '-')!== false && strpos($sales_ids, ',')!== false ){
					echo "<script>alert('Incorrect sales number criteria. Can't have both list and range.');</script>";
					exit();
	
				} else { //individual sales no
					$saleNo_condition = " AND sales.actualSalesNo = ".$sales_ids;
				}
			}
			
			//combine all the conditions
			$where_condition = $where_condition.$saleNo_condition;
		
			$xmlstr = "<ENVELOPE xmlns:UDF='TallyUDF'></ENVELOPE>";
            // optionally you can specify a xml-stylesheet for presenting the results. just uncoment the following line and change the stylesheet name.
            /* "<?xml-stylesheet type='text/xsl' href='xml_style.xsl' ?>\n". */
			$xml = new SimpleXMLElement($xmlstr);
			// Add the HEADER section
			$header = $xml->addChild('HEADER');
			
			$header->addChild('TALLYREQUEST', 'Export Data');
			//$header->addChild('TYPE', 'Data');
			//$header->addChild('ID', 'YourID'); // Replace with your ID

			// Add the BODY section
			$body = $xml->addChild('BODY');
			$data = $body->addChild('EXPORTDATA');
			$data1 = $data->addChild('REQUESTDESC');
			$data1->addChild('REPORTNAME', 'Vouchers');
			$data2 = $data1->addChild("STATICVARIABLES");
			$data2->addChild('SVCURRENTCOMPANY', "TESTING");	//$this->getCustomerNameDetails()
			$request = $data->addChild('REQUESTDATA');

			$sales_details = $this->Crud->customQuery('SELECT parts.sales_id, parts.sales_number, sales.created_date, customer_name, 
			ROUND(sum(total_rate),2) as Total, ROUND(sum(cgst_amount),2) as CGST_AMT, ROUND(sum(sgst_amount),2) as SGST_AMT, 
			ROUND(sum(igst_amount),2) as IGST_AMT ,ROUND(sum(tcs_amount),2) as TCS_AMT, ROUND(sum(gst_amount),2) as GST_AMT, 
			tax.cgst, tax.sgst, tax.igst, tax.tcs, tax.tcs_on_tax, sales.status
			FROM  sales_parts as parts, new_sales as sales, gst_structure tax, customer
			WHERE sales.status in ("lock","Cancelled")
			AND parts.sales_id =  sales.id
			AND parts.tax_id = tax.id
			AND customer.id = parts.customer_id '.
			$where_condition.
			' GROUP BY parts.sales_id '
			);

			if(empty($sales_details)){
				$this->addWarningMessage('No records found for this export criteria.');
				$this->redirectMessage();
				exit();
			}
			if ($sales_details) {
					foreach ($sales_details as $sale_details) {
						$this->requestSalesXML($request, $sale_details);
					}
			}
		
			// Set the Content-Type header to specify XML
			//header('Content-Type: text/xml');
			
			// Convert the XML to a string
			//$xmlString = $xml->asXML();
			// Remove the XML declaration manually
			

			$dom = dom_import_simplexml($xml)->ownerDocument;
			// Format the output with indentation and newlines
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			//$dom->loadXML($dom->saveXML(), LIBXML_NOXMLDECL);
			$xmlString = $dom->saveXML();	
			$xmlStringWithoutDeclaration = preg_replace('/<\?xml version="1.0"\?>/', '', $xmlString);
			

			// Get the formatted XML as a string
			//$formattedXml = $dom->saveXML();

			$filename = 'tally_sales-'.$this->current_date_time.'.xml';
			header('Content-Type: application/xml');
			header('Content-Disposition: attachment; filename="' . $filename . '"');

			// Output the result
			echo $xmlStringWithoutDeclaration;
			

			// Output the XML
			//echo $xml->asXML();
			// Define the file path where you want to save the XML
			//echo "XML file has been saved as $filename";
			exit(); 
		}

		$created_month  = $this->input->post("created_month");
		$created_year  = $this->input->post("created_year");

		if (empty($created_year)) {
			$created_year = $this->year;
		}
		if (empty($created_month)) {
			$created_month = $this->month;
		}

		$data['sales_parts'] = $this->Crud->customQuery("
		SELECT 
			cp.part_number, 
			cp.part_description, 
			c.customer_name, 
			sales.status, 
			sales.sales_number as salesNumber,
			sales.created_date AS sales_date, 
			parts.* 
		FROM 
			`new_sales` AS sales
		INNER JOIN 
			`sales_parts` AS parts ON sales.id = parts.sales_id
		INNER JOIN 
			customer AS c ON parts.customer_id = c.id
		INNER JOIN 
			customer_part AS cp ON parts.part_id = cp.id
		WHERE 
			sales.clientId = ".$this->Unit->getSessionClientId()."
			AND sales.sales_number NOT LIKE 'TEMP%' 
			AND sales.status NOT IN ('pending')
			AND sales.created_month = " . $created_month . "
			AND sales.created_year = " . $created_year . "
		ORDER BY 
			parts.id DESC");

		$data['created_year'] = $created_year;
		$data['created_month'] = $created_month;
		$data['fincYears'] = $this->Common_admin_model->getFinancialYears();
		for ($i = 1; $i <= 12; $i++) {
			$data['month_data'][$i] = $this->Common_admin_model->get_month($i);
			$data['month_number'][$i] = $this->Common_admin_model->get_month_number($data['month_data'][$i]);
		}
		// pr($data,1);
		$this->loadView('reports/sales_reports', $data);
	}

	private function getPage($viewPage, $viewData)
	{
		$this->getHeaderPage();
		$this->load->view($this->getViewPath() . $viewPage, $viewData);
		$this->load->view('footer.php');
	}

	public function rejection_invoices()  
	{
		$data['customer'] = $this->Crud->read_data("customer");
		$data['rejection_sales_invoice'] = $this->Crud->customQuery("
			SELECT r.*,c.customer_name as customer_name
			FROM `rejection_sales_invoice` as r
			LEFT JOIN customer as c On c.id = r.customer_id
			WHERE r.clientId = '".$this->Unit->getSessionClientId()."'
			ORDER BY r.id DESC
		");
		$data['reject_remark'] = $this->Crud->read_data_acc("reject_remark");
		// $this->load->view('header');
		$this->loadView('quality/rejection_invoices', $data);
		// $this->load->view('footer');	

	}

	public function generate_rejection_sales_invoice()
	{
		$customer_id = $this->input->post('customer_id');
		$customer_debit_note_no = $this->input->post('customer_debit_note_no');
		$customer_debit_note_date = $this->input->post('customer_debit_note_date');
		$client_sales_invoice_no = $this->input->post('client_sales_invoice_no');
		$client_invoice_date = $this->input->post('client_invoice_date');
		$debit_basic_amt = $this->input->post('debit_basic_amt');
		$debit_gst_amt = $this->input->post('debit_gst_amt');
		$rejection_reason = $this->input->post('rejection_reason');
		$remark = $this->input->post('remark');

		$sql = "SELECT rejection_invoice_no FROM rejection_sales_invoice WHERE rejection_invoice_no like '" . $this->getSalesRejectionSerialNo() . "%' order by id desc LIMIT 1";
		$latestSeqFormat = $this->Crud->customQuery($sql);

		if(!empty($latestSeqFormat)) {
			foreach ($latestSeqFormat as $p) {
				$currentSaleNo = $p->rejection_invoice_no;
				$rejectionNo = substr($currentSaleNo, strlen($this->getSalesRejectionSerialNo())) + 1;
			}
		}else{
			$rejectionNo = 1;
		}

		$rejection_invoice_no = $this->getSalesRejectionSerialNo() . $rejectionNo;

		$data = array(
			"customer_id" => $customer_id,
			"rejection_invoice_no" => $rejection_invoice_no,
			"document_number" => $customer_debit_note_no,
			"debit_note_date" => $customer_debit_note_date,
			"sales_invoice_number" => $client_sales_invoice_no,
			"client_invoice_date" => $client_invoice_date,
			"debit_basic_amt" => $debit_basic_amt,
			"debit_gst_amt" => $debit_gst_amt,
			"rejection_reasonky" => $rejection_reason,
			"remark" => $remark,
			"created_by" => $this->user_id,
			"created_date" => $this->current_date,
			"created_time" => $this->current_time,
		);

		$result = $this->Crud->insert_data("rejection_sales_invoice", $data);
		if ($result) {
			$this->addSuccessMessage('Rejection invoice successfully created.');
			$this->redirectMessage('view_rejection_sales_invoice_by_id/' . $result);
		} else {
			$this->addErrorMessage('Failed to create rejection invoice ');
			$this->redirectMessage('rejection_invoices');
		}
	}


	public function view_rejection_sales_invoice_by_id()
	{
		$sales_id = $this->uri->segment('2');
		$data['reject_remark'] = $this->Crud->read_data("reject_remark");
		$data['new_sales'] = $this->Crud->get_data_by_id("rejection_sales_invoice", $sales_id, "id");
		$data['customer'] = $this->Crud->get_data_by_id("customer", $data['new_sales'][0]->customer_id, "id");
		$data['gst_structure'] = $this->Crud->read_data("gst_structure");
		$data['uom'] = $this->Crud->read_data("uom");
		$child_part_list = $this->db->query('SELECT DISTINCT part_number,part_description,id FROM `customer_part` where customer_id = ' . $data['customer'][0]->id . '');
		$data['customer_part'] = $child_part_list->result();
		$data['session_type'] = $this->session->userdata['type'];
		$arr = array(
			"rejection_sales_id" => $sales_id,
		);

		$data['parts_rejection_sales_invoice'] = $this->Crud->customQuery("
			SELECT prs.*,c.part_number as part_number,c.part_description as part_description,c.id as customer_part_id
			FROM parts_rejection_sales_invoice as prs
			LEFT JOIN customer_part as c ON c.id = prs.part_id
			WHERE prs.rejection_sales_id = '$sales_id'
		");	
		$data['user_type'] = $this->session->userdata['type'];
		// pr($data['parts_rejection_sales_invoice'],1);
		// $this->load->view('header');
		$this->loadView('quality/view_rejection_sales_invoice_by_id', $data);
	}


	public function update_rejection_sales_invoice()
	{
		$id = $this->input->post('id');

		$rejection_invoice_no = $this->input->post('rejection_invoice_no');
		$customer_debit_note_no = $this->input->post('customer_debit_note_no');
		$customer_debit_note_date = $this->input->post('customer_debit_note_date');
		$client_sales_invoice_no = $this->input->post('client_sales_invoice_no');
		$client_invoice_date = $this->input->post('client_invoice_date');
		$debit_basic_amt = $this->input->post('debit_basic_amt');
		$debit_gst_amt = $this->input->post('debit_gst_amt');
		$rejection_reason = $this->input->post('rejection_reason');
		$remark = $this->input->post('remark');

		$data = array(
			"document_number" => $customer_debit_note_no,
			"debit_note_date" => $customer_debit_note_date,
			"sales_invoice_number" => $client_sales_invoice_no,
			"client_invoice_date" => $client_invoice_date,
			"debit_basic_amt" => $debit_basic_amt,
			"debit_gst_amt" => $debit_gst_amt,
			"rejection_reasonky" => $rejection_reason,
			"remark" => $remark,
			"created_by" => $this->user_id,
		);

		$result = $this->Crud->update_data("rejection_sales_invoice", $data, $id);
		if ($result) {
			$this->addSuccessMessage('Rejection invoice updated successfully.');
			//$this->redirectMessage('view_rejection_sales_invoice_by_id/'. $result);
		} else {
			$this->addErrorMessage('Failed to create rejection invoice ');
			//$this->redirectMessage('rejection_invoices');
		}
		$this->redirectMessage();
	}

	public function generate_new_sales_rejection_Test()
	{
		$customer_id = $this->input->post('customer_id');
		$remark = $this->input->post('remark');
		$po_date = $this->input->post('po_date');
		$qty = $this->input->post('qty');
		$mode = $this->input->post('mode');
		$transporter = $this->input->post('transporter');
		$vehicle_number = $this->input->post('vehicle_number');
		$lr_number = $this->input->post('lr_number');
		$price = $this->input->post('price');
		$hsn_code = $this->input->post('hsn_code');
		$customer_part_id = $this->input->post('customer_part_id');
		$part_number = $this->input->post('part_number');
		$expiry_po_date = $this->input->post('expiry_po_date');
		$data['new_sales'] = $this->Crud->read_data("new_sales");
		// $data['po_date'] = $this->Crud-	>read_data("po_date");
		// $data['expiry_po_date'] = $this->Crud->read_data("expiry_po_date");

		$sql = "SELECT sales_number FROM new_sales_rejection WHERE sales_number like '" . $this->getSalesRejectionTestSerialNo() . "%' order by id desc LIMIT 1";
		$latestSeqFormat = $this->Crud->customQuery($sql);
		foreach ($latestSeqFormat as $p) {
			$currentSaleNo = $p->sales_number;
		}
		$po_number = substr($currentSaleNo, strlen($this->getSalesRejectionTestSerialNo())) + 1;
		$po_number = $this->getSalesRejectionTestSerialNo() . $sales_num;

		$data = array(
			"customer_id" => $customer_id,
			"sales_number" => $po_number,
			"remark" => $remark,
			"part_number" => $part_number,
			"mode" => $mode,
			"transporter" => $transporter,
			"vehicle_number" => $vehicle_number,
			"lr_number" => $lr_number,
			"price" => $price,
			"hsn_code" => $hsn_code,
			"qty" => $qty,
			"created_by" => $this->user_id,
			"created_date" => $this->current_date,
			"created_time" => $this->current_time,
			"created_by" => $this->current_date,
			"created_day" => $this->date,
			"created_month" => $this->month,
			"created_year" => $this->year,
		);


		$result = $this->Crud->insert_data("new_sales_rejection", $data);
		if ($result) {
			echo "<script>alert('Successfully Added');document.location='" . base_url('view_new_sales_by_id_rejection/') . $result . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}

	// Function to add sales data request
	public function xml_extension()
	{
		$this->load->view('xml_extension.php');
	}

	// Function to add sales data request
	function requestSalesXML($data,$sales_details)
	{
		$isCreate = true;
		if($sales_details->status =='Cancelled') {
			$isCreate = false;
		}
		$voucher = $data->addChild('TALLYMESSAGE');
		// Encode special characters
		$customer_name = htmlspecialchars($sales_details->customer_name, ENT_XML1 | ENT_COMPAT, 'UTF-8');

		//$customer_name  = $sales_details->customer_name;
		$sales_number  = $sales_details->sales_number;

		//Get GUID and RANDOMID :
		$guid = str_replace("-","0",$sales_number);
		$guid = str_replace("/","0",$guid);
		
		$voucher_child = $voucher->addChild('VOUCHER');
		$voucher_child->addAttribute('REMOTEID', $guid); 				//Fixed pattern - with sales number etc as this can be used for cancel too.
		$voucher_child->addAttribute('VCHTYPE', 'Sales'); 				//Hard-Coded
		//Hard coded values ?? 
		$voucher_child->addChild('ISOPTIONAL', 'No'); 
		$voucher_child->addChild('USEFORGAINLOSS', 'No'); 
		$voucher_child->addChild('USEFORCOMPOUND', 'No'); 
		$voucher_child->addChild('VOUCHERTYPENAME', 'Sales'); 

		// Create a DateTime object using the input date and the specified format
		$dateTimeObject = DateTime::createFromFormat('d/m/Y', $sales_details->created_date);
		// Format the DateTime object to the desired output format "Ymd"
		$sales_date = $dateTimeObject->format('Ymd');
				
		$voucher_child->addChild('DATE', $sales_date);
		$voucher_child->addChild('EFFECTIVEDATE', $sales_date);

		$voucher_child->addChild('USETRACKINGNUMBER', 'No');
		$voucher_child->addChild('ISPOSTDATED', 'No');
		$voucher_child->addChild('ISINVOICE', 'No');
		
		
		if($isCreate == true) {
			$this->inoviceExportForCreate($sales_details,$voucher_child ,$customer_name,$guid);
		}else {
			$this->inoviceExportForCancel($voucher_child,$guid);
	  }
	}

	/**
	 * Cancel invoice specific fields
	 */
	private function inoviceExportForCancel($voucher_child,$guid) {
		$voucher_child->addAttribute('ACTION', 'Cancel'); 
		$voucher_child->addChild('ISCANCELLED', 'Yes');

		$voucher_child->addChild('VOUCHERNUMBER');
		$voucher_child->addChild('REFERENCE');
		
		$voucher_child->addChild('ASPAYSLIP', 'No');
		$voucher_child->addChild('GUID', $guid);
		$voucher_child->addChild('ALTERID', '1');

		$haryanavat_list = $voucher_child->addChild('HARYANAVAT.LIST');
		$haryanavat_list->addAttribute('DESC', '`HARYANAVAT`'); 
	}

	/**
	 * Create invoice specific fields
	 */
	private function inoviceExportForCreate($sales_details,$voucher_child ,$customer_name,$guid) {
		$voucher_child->addAttribute('ACTION', 'Create');
		$voucher_child->addChild('ISCANCELLED', 'No');
		
		$gst_percntg = $sales_details->cgst + $sales_details->sgst + $sales_details->igst + $sales_details->tcs;
		$gst_all = $sales_details->CGST_AMT + $sales_details->SGST_AMT + $sales_details->IGST_AMT + $sales_details->TCS_AMT;
		$gst_on_amount = ($sales_details->Total - $gst_all);
		
		$leger_arr = array(
			"Total" => $sales_details->Total,			   								// Entire amount
			"SALES GST @ ".$gst_percntg."%" => $gst_on_amount,  						//<LEDGERNAME>SALES GST @ 28%</LEDGERNAME>
			"OUTPUT CGST @ ".$sales_details->cgst."%"  => $sales_details->CGST_AMT, 	//<LEDGERNAME>OUTPUT CGST @ 14%</LEDGERNAME>
			"OUTPUT SGST @ ".$sales_details->sgst."%"  => $sales_details->SGST_AMT,		//<LEDGERNAME>OUTPUT SGST @ 14%</LEDGERNAME>
			"OUTPUT TCS @ ".$sales_details->tcs."%"   => $sales_details->TCS_AMT, 		//<LEDGERNAME>OUTPUT TCS @ 0%</LEDGERNAME>
			"OUTPUT IGST @ ".$sales_details->igst."%"   => $sales_details->IGST_AMT,	//<LEDGERNAME>OUTPUT IGST @ 28%</LEDGERNAME>
		);
		
		//remove those items which are with 0 values.
		foreach ($leger_arr as $key => $value) {
			if ($value < 0.01) {
				unset($leger_arr[$key]);
			}
		}
		
		$voucher_child->addChild('DIFFACTUALQTY', 'Yes');
		$voucher_child->addChild('VOUCHERNUMBER', $sales_details->sales_number);
		$voucher_child->addChild('REFERENCE', $sales_details->sales_number);
		$voucher_child->addChild('PARTYLEDGERNAME', $customer_name);
		$voucher_child->addChild('NARRATION', 'Invoice No. '.$sales_details->sales_number);
		$voucher_child->addChild('ASPAYSLIP', 'No');
		$voucher_child->addChild('GUID', $guid);		//TO-DO This should be randomly generated and should be unique no.
		$voucher_child->addChild('ALTERID', '1');

		//What is this ? Need TO-DO action
		$haryanavat_list = $voucher_child->addChild('HARYANAVAT.LIST');
		$haryanavat_list->addAttribute('DESC', '`HARYANAVAT`'); 
		
		//There would be multiple entries here for ALLLEDGERENTRIES
		// Add ledger details
		foreach ($leger_arr as $key => $value) {
			$ledger_entries = $voucher_child->addChild('ALLLEDGERENTRIES.LIST');
			//Hard Coded
			$ledger_entries->addChild('REMOVEZEROENTRIES', 'No');
			

			//Should be replaced with appr values 
			if($key=="Total") {
				$ledger_entries->addChild('ISDEEMEDPOSITIVE', 'Yes');	// <!-- Specifies whether the ledger entry is positive or negative (e.g., "Yes" for positive). -->				
				$ledger_entries->addChild('LEDGERFROMITEM', 'No');
				$ledger_entries->addChild('LEDGERNAME', $customer_name); // Replace with the customer's ledger name
				$ledger_entries->addChild('AMOUNT', "-".$value);

				$bill_allocations = $ledger_entries->addChild('BILLALLOCATIONS.LIST');
				$bill_allocations->addChild('NAME', $sales_details->sales_number);
				$bill_allocations->addChild('BILLTYPE', $key);
				$bill_allocations->addChild('BILLCREDITPERIOD', '0');	//<!-- NO IDEA Hard Code ? -->
				$bill_allocations->addChild('AMOUNT', "-".$value);
			} else {
				$ledger_entries->addChild('ISDEEMEDPOSITIVE', 'No');	
				$ledger_entries->addChild('LEDGERFROMITEM', 'No');
				$ledger_entries->addChild('LEDGERNAME', $key); // Replace with the customer's ledger name
				$ledger_entries->addChild('AMOUNT', $value);
					
			}
		}
	  
	} 
	/**
	 * Calculate sticker quantity as multiple of fix numbers
	 */
	
	/* public function getFactorsForSticker($requiredQty,$defaultQty) {
		if($defaultQty > 1){
			$factors = array($defaultQty ,100, 50, 20, 10, 1);
		}else{
			$factors = array(100, 50, 20, 10, 1);
		}
		$result = array();

		foreach ($factors as $factor) {
			$count = intdiv($requiredQty, $factor);
			$result[$factor] = $count;
			$requiredQty -= $count * $factor;
		}

		//remove items with 0 
		foreach ($result as $factor => $count) {
			if($count==0) {
				unset($result[$factor]);
			}
		  }
		return $result;
	} */


	public function getSalesPartPackaging_details()
	{
		$sales_id = $this->input->post('salesId');
		$invoice_date = $this->input->post('invoice_date');
		$invoice_no = $this->input->post('invoice_no');
		//$data['sales_part_id'] = $sales_id;

		$data['sales_parts'] = $this->Crud->customQuery("select cp.id as cpid, parts.id, cp.part_number,cp.part_description, cp.packaging_qty, parts.qty as requiredQty
		FROM sales_parts parts, customer_part cp
		WHERE parts.sales_id = ".$sales_id."
		AND parts.part_id = cp.id");

		$data['invoice_no'] = $invoice_no;
		$data['invoice_date'] = $invoice_date;
        $this->load->view('sales/print_stickers', $data);
	}


	public function print_packing_sticker() {
		// Get the total number of items in the form
		$totalItems = $this->input->post('totalItems');
		$invoice_no = $this->input->post('invoice_no');
		$invoice_date = $this->input->post('invoice_date');

		if($totalItems < 1){
			exit();
		}

		$stickerFrom = $this->input->post('stickerFrom');
		$dataSets[] = array();
		// Retrieve values for "requiredQty" fields
		for ($i = 1; $i <= $totalItems; $i++) {
			//UI field name is requiredQty
			$fieldRequiredQty = "requiredQty" . $i;
			$default_pack_qty = "default_pack_qty" . $i;
			$part_name = "part_name" . $i;
			$part_no = "part_no" . $i;
			
			$dataSets[] = array(
				'part_no' => $_POST[$part_no],
				'part_name' => $_POST[$part_name],
				'defaultQty' => $_POST[$default_pack_qty],
				'requiredQty' => $_POST[$fieldRequiredQty],
				'factors' => $this->Common_admin_model->calculateAllFactorsForSticker($_POST[$fieldRequiredQty],$_POST[$default_pack_qty])
			);
		}

		$printData[] = array();
		//iterate through all the factors for each individual
		foreach ($dataSets as $dataset) {
			//echo "<br>";
			$arr_data = $dataset['factors'];
			foreach ($arr_data as $factor) {
				for ($i = 1; $i <= $factor['count']; $i++) {
					$printData[] = array(
						'Invoice No' => $invoice_no,
						'Date' => $invoice_date,
						'Part No' => $dataset['part_no'],
						'Part Name' => $dataset['part_name'],
						'Invoice Qty' => $dataset['requiredQty'],
						'Packing Qty'=> $factor['factor'],
						'Checked By' => ''
					);
				}
			 }
		 } 

		 //print_r($printData);
		 
		$sales_id = $this->uri->segment('2');
		$sales_data = $this->Crud->customQuery(
			"SELECT c.customer_name, c.vendor_code, n.sales_number, n.created_date, p.part_number, 
			p.part_description, s.qty as quantity, n.customer_part_id 
			FROM new_sales n, sales_parts s, customer c, customer_part p
			WHERE s.id = ".$sales_id." 
			AND s.sales_id = n.id
			AND s.part_id = p.id
			AND n.customer_id = c.id");
		 

		$html_content_header = '
            <!DOCTYPE html>
              <style> 
                  html { margin: 0px; }
                  td {
                    border: 0px solid black;
                    border-collapse: collapse;
                    padding-top: 0px;
                    padding-bottom: 0px;
                    padding-left: 0px;
                    padding-right: 0px;
                }		
    
                @media print {
                    .container{ 
                      width: auto; 
                      height: auto; 
                      margin: 0px auto; 
                    } 
    
                  @page 
                  {
                    size: A4;   /* auto is the initial value */
					margin-top: 13mm; 
                    margin-left: 8mm;  /* this affects the margin in the printer settings */
					margin-right: 7mm;
					margin-bottom: 12mm; 
					padding: 0;
               //     size: landscape; /* Set the print layout to landscape */
                  }
                /*  body {
                    margin-top: 0px; 
                    margin-left: 0px;
                    margin-bottom: 0px; 
                    margin-right: 0px;
                }*/
              }
    
             </style>
             <link rel="stylesheet" href="'.base_url('').'dist/css/arom.css">
          </head><body>
          <script>
            function printSection() {
                var printContent = document.getElementById("print-section").innerHTML;
                var originalContent = document.body.innerHTML;
                document.body.innerHTML = printContent;
                window.print();
                document.body.innerHTML = originalContent;
            }
            </script>
			<button class="print-button" onclick="printSection()"><span class="print-icon"></span></button>
    </div>
	<br>
	<div id="print-section" style="background-color: white; width:auto;margin-left: 8mm; ">
	<style type="text/css">

	.new_page {
		margin-top: 0px; 
		margin-left: 0px;
		margin-bottom: 0px; 
		margin-right: 0mm
		margin: 0;
		padding: 0;
		border : 0px solid;
		background-color: white;
		size: A4;
		}

	#sticker {
		height: 34mm;
		width: 65mm;
		border : 0px solid;
		//padding-right: 13.22px;
		background-color : white;
		
	}

	#stickerContent {
		border: 0px solid black;
		border-collapse: collapse;
		padding-top: 2px;
		padding-left: 5px;
		background-color : white;
	}		

	.ritz .waffle {
		color: inherit;
		background-color: #ffffff;
		text-align: left;
		color: #000000;
		font-family: "sans-serif";
		vertical-align: bottom;
		white-space: wrap;
		direction: ltr;
	}

	.ritz .waffle .s0 {
		font-weight: normal;
		font-size: 18px;
	}
	
	.ritz .waffle .s1 {
		font-size: 14px;
	}
	
	.small_container {
		display: flex;
	  }

	.row {
		width: 50%;
	  }

	</style>';


	$html_content_data .='<div class="ritz grid-container new_page" dir="ltr">
	<table border="0" style="padding-left:0px;">
	<tbody>';

	$returnArray = $this->getBlankStickers($stickerFrom,$html_content_data);
	$rowNo = $returnArray[0]; 
	$totalStickers = $returnArray[1]; 
	$totalCntBlank = $returnArray[2];
	$html_content_data = $returnArray[3];
	$j = $returnArray[4];

	$pagCount = 1;
	foreach ($dataSets as $dataset) {
		$arr_data = $dataset['factors'];
		foreach ($arr_data as $factor) {
			for ($i = 1; $i <= $factor['count']; $i++) {	
				if($rowNo == 1 && $j==3){ //new page
					if($pagCount > 1){//We don't need a page break for first page so...
						$html_content_data .='<div style="page-break-after: always;"></div>';
					}
					$html_content_data .='
							<div class="ritz grid-container new_page" dir="ltr">
							<table border="0" style="padding-left:15px;">
							<tbody>';
				}
				$returnArray1 = $this->gePageStickers($rowNo,$totalStickers,$html_content_data,$dataset,$factor,$invoice_no,$j,$invoice_date);
				$rowNo = $returnArray1[0]; 
				$totalStickers = $returnArray1[1]; 
				$html_content_data = $returnArray1[2];
				$j = $returnArray1[3];
			
				if($rowNo == 9 && $j==3){ //close the table if all the options are filled..
					$rowNo = 1;
					$pagCount++;
					$html_content_data .='</tbody></table></div>';
				}
			}	
		}
	}
	
	$html_content_footer = '<tbody></table></div></div>';
	$html_content = $html_content_header.$html_content_data.$html_content_footer;
	echo $html_content;

	//$this->pdf->setPaper('A4', 'landscape');
	//$this->pdf->loadHtml($html_content);
	//$this->pdf->render();
    //$this->pdf->stream("PDI-".$sales_data[0]->part_number, array("Attachment" => 1));
		
	}


	private function gePageStickers($rowNo,$totalStickers,$html_content_data,$dataset,$factor,$invoice_no,$j,$invoice_date) {
		if($totalStickers == 1 || $totalStickers % 3 == 1) {
			$html_content_data.= '<tr>';
			$j = 0;
		} 
	
		$html_content_data .='<td>';
		$html_content_data .='
					<div id="sticker">
						<div class="waffle" cellspacing="0" cellpadding="0" width="100px" style="border: 0px solid;">
							<div id="stickerTbody" width="100%">
								<div id="stickerContent">
									<div>
										<div class="s0" dir="ltr"><b>'.$this->getCustomerNameDetails().'</b></div>
									</div>
									<div>
										<div class="s1" dir="ltr">
											<span style="font-weight:normal;">Invoice No.</span>: '.$invoice_no.'</div>
									</div>
									<div>
										<div class="s1" dir="ltr">
											<span style="font-weight:normal;">Date</span>: '.$invoice_date.'
										</div>
									</div>
									<div>
										<div class="s1" dir="ltr">
											<span style="font-weight:normal;">Part No</span>.: '.$dataset['part_no'].'</div>
									</div>
									<div>
										<div class="s1" style="width:100%;overflow:hidden;white-space: nowrap;" dir="ltr">
											<span style="font-weight:normal;">Part Name</span>: '.$dataset['part_name'].'</div>
									</div>
									<div class="s1 small_container" dir="ltr"> 
											<div class="row">Invoice Qty: '.$dataset['requiredQty'].'</div>
											<div class="row">Packing Qty: '.$factor['factor'].'</div>
									</div>
									<div class="s1 small_container" dir="ltr"> 
											<div class="row">Gross WT:</div>
											<div class="row">Checked By:</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					</td>';
						$j++;
						$totalStickers++;
						
						if($j == 3) {
							$html_content_data.= '</tr>';
							$rowNo++;
						}
						
				
		return array($rowNo, $totalStickers, $html_content_data , $j);
	}

	private function getBlankStickers($stickerFrom,$html_content_data) {
		$rowNo = 1;
		$totalStickers = 1;
		$totalCntBlank = 1;
		for ($i = 1; $i < $stickerFrom; $i++) {
			if($totalCntBlank == 1 || $totalCntBlank % 3 == 1) {
				$html_content_data.= '<tr>';
				$j = 0;
			}

			$html_content_data .='<td>';
			$html_content_data .='
								<div id="sticker">
									<div class="waffle" cellspacing="0" cellpadding="0" width="100px" style="border: 0px solid;">
										<div id="stickerTbody" width="100%">1&nbsp;
										</div>
									</div>
								</div>
								</td>';
								$j++;
								$totalCntBlank++;
								$totalStickers++;
								
								if($j == 3) {
									$html_content_data.= '</tr>';
									$rowNo++;
								}
		}
		return array($rowNo, $totalStickers, $totalCntBlank,$html_content_data,$j);
	}

	public function receivable_report()
	{
		$customer_part_id  = $this->input->post("customer_part_id");
		if(!empty($customer_part_id))
		{
			$data['sales_parts']  = $this->Crud->customQuery(
				"SELECT s.*, SUM(s.gst_amount) as gst, SUM(s.total_rate) as ttlrt, SUM(s.gst_amount) as gstamnt, 
				SUM(s.tcs_amount) as tcsamnt ,cus.customer_name,cus.payment_terms,rrp.payment_receipt_date
				,rrp.amount_received,rrp.transaction_details,ns.created_date
				FROM `sales_parts` s 
				INNER JOIN new_sales n ON s.sales_id = n.id AND n.clientId = ".$this->Unit->getSessionClientId()."
				left JOIN customer cus ON s.customer_id = cus.id  
				left JOIN receivable_report rrp ON s.sales_number = rrp.sales_number  
				left JOIN new_sales ns ON s.sales_id = ns.id  
				WHERE s.customer_id = ".$customer_part_id." group by s.sales_number ORDER BY s.id DESC");
		}
		
		
		$data['customers'] = $this->Crud->read_data("customer");
		$data['selected_customer_part_id'] = $customer_part_id;
		
		foreach ($data['sales_parts'] as $key => $objs) {
			$created_date_str = $objs->created_date;
                                                
			// Create a DateTime object by specifying the format
			$dateTime = DateTime::createFromFormat('d/m/Y', $created_date_str);
		
			if ($dateTime && is_numeric($objs->payment_terms)) {
				// Convert payment_terms to an integer for days
				$payment_terms_days = (int)$objs->payment_terms;
		
				// Add payment_terms (in days) to the created date
				$dateTime->add(new DateInterval('P' . $payment_terms_days . 'D'));
		
				// Get the formatted due date
				$due_date = $dateTime->format('d/m/Y');
		
				
			} else {
				$due_date = '';
			}

			$today = new DateTime();
        
			// Convert due date string to a DateTime object
			$dueDateObject = DateTime::createFromFormat('d/m/Y', $due_date);
			
			// Calculate the interval between the due date and today's date
			$interval = $today->diff($dueDateObject);
			
			// Get the difference in days
			$due_days = $interval->format('%r%a');

			$data['sales_parts'][$key]->due_date = $due_date;
			$data['sales_parts'][$key]->due_days = $due_days;
		}
		// pr($data['sales_parts'],1);
		// $this->load->view('header.php');
		// $this->load->view('receivable_report.php', $data);
		// $this->load->view('footer.php');
		$this->loadView('reports/receivable_report',$data);
	}



	public function update_receivable_report()
	{
		$sales_number = $this->input->post('sales_number');
		$payment_receipt_date = $this->input->post('payment_receipt_date');
		$amount_received = $this->input->post('amount_received');
		$transaction_details = $this->input->post('transaction_details');
		$check = $this->Common_admin_model->get_data_by_id_count("receivable_report", $this->input->post('sales_number'), "sales_number");
		
		if ($check == 0) 
		{
		    $data = array(
						"sales_number" => $sales_number,
						"payment_receipt_date" => $payment_receipt_date,
						"amount_received" => $amount_received,
						"transaction_details" => $transaction_details,
					);
					$result = $this->Crud->insert_data("receivable_report", $data);
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} 
		else 
		{
					$data = array(
						"sales_number" => $sales_number,
						"payment_receipt_date" => $payment_receipt_date,
						"amount_received" => $amount_received,
						"transaction_details" => $transaction_details,
						
					);
					$result = $this->Crud->update_data_column("receivable_report", $data, $sales_number, "sales_number");
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			
		}
	}
}
