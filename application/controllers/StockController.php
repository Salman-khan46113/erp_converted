<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('CommonController.php');

class StockController extends CommonController
{

	const PATH = "";

	function __construct()
	{
		parent::__construct();
		$this->load->model('InhouseParts');
		$this->load->model('SupplierParts');
	}

	private function getPath()
	{
		return self::PATH;
	}

	private function getPage($viewPage, $viewData)
	{
		$this->loadView($this->getPath() . $viewPage, $viewData);
	}

	public function part_stocks() {
		$this->_part_stocks('');
	}

	public function view_part_stocks() {
		$this->_part_stocks($this->input->post('part_id'),$this->input->post('clientUnit'));
	}

	public function _part_stocks($filter_part_id, $filter_client='') {


		if ($filter_part_id !='ALL' && $filter_part_id != '') {
			$data['child_part_list'] = $this->SupplierParts->getSupplierPartById($filter_part_id);
		} else if ($filter_part_id == 'ALL') {
			$data['child_part_list'] = $this->SupplierParts->readSupplierParts();
			$fetchedList = true;
		} 


		// pr($this->db->last_query(),1);
		foreach ($data['child_part_list'] as $key => $po) {
			$stock = 0;
			if($po->stock != ''){
				$stock = $stock + $po->stock;
			}
            $data['child_part_list'][$key]->uom_data = $this->Crud->get_data_by_id("uom", $po->uom_id, "id");
            $data['child_part_list'][$key]->child_part_id = $this->Crud->get_data_by_id("part_type", $po->child_part_id, "id");
            $grn_details_data = $this->Crud->get_data_by_id("grn_details", $po->id, "part_id");
            $job_card_details = $this->Crud->get_data_by_id("job_card_details", $po->part_number, "item_number");
            $total_value += ($stock) * ($po->store_stock_rate);
            $store_scrap = 0;
			if ($job_card_details) {
	            foreach ($job_card_details  as $jd) {
					$store_scrap = $store_scrap + $jd->store_reject_qty;
				}
           	}
                
			$store_stock = 0;
            $underinspection_stock = 0;
            $scrap_stock = 0;
            if ($grn_details_data) {
            	foreach ($grn_details_data as $d) {
					$scrap_stock = $scrap_stock + $d->reject_qty;
                	if ($d->accept_qty == 0) {
                    	$underinspection_stock = $underinspection_stock + $d->verified_qty;
                   	} else {
                    }
                }
            }
            $data['child_part_list'][$key]->stock = $stock;
            $data['child_part_list'][$key]->store_scrap = $store_scrap;
            $data['child_part_list'][$key]->underinspection_stock = $underinspection_stock;
            $data['child_part_list'][$key]->scrap_stock = $scrap_stock;
		}
		if(!empty($filter_part_id)) {
			$data['filter_part_id'] = $filter_part_id;
		}

		$data['customer_part_data_new_updated'] = $this->Crud->customQuery('SELECT DISTINCT part_number, id FROM `customer_parts_master` ');
		if($fetchedList == true){
			$data['supplier_part_select_list']  = $data['child_part_list'];
		}else{
			$data['supplier_part_select_list'] = $this->SupplierParts->readSupplierParts();
		}

		$data['stock_column_name'] = $this->Unit->getStockColNmForClientUnit();

		//FOR SHEET ONLY
        $data['sheet_prod_column_name'] = $this->Unit->getProdColNmForClientUnit();

		//FOR PLASTIC ONLY
		$data['plastic_prod_column_name'] = $this->Unit->getPlasticProdColNmForClientUnit();

		//Sharing_qty
		$data['sharingQtyColName'] = $this->Unit->getSharingQtyColNmForClientUnit();
		$this->loadView('store/part_stocks', $data);
	}

	/**
	 * FG Stock transfer
	 */
	public function transfer_child_part_to_fg_stock()	{
		$customer_part_number  = $this->input->post('customer_part_number');
		
		$child_part_id  = $this->input->post('child_part_id');
		$stock  = (float)$this->input->post('stock');

		$child_part = $this->SupplierParts->getSupplierPartById($child_part_id);
		$customer_part_data = $this->CustomerPart->getCustomerPartByPartNumber($customer_part_number);

		$FGStockColName = $this->Unit->getFGStockColNmForClientUnit();
		$old_fg_stock = (float)$customer_part_data[0]->$FGStockColName;
		$new_stock_customer_part = $old_fg_stock + $stock;

		$stockColName = $this->Unit->getStockColNmForClientUnit();
		$old_stock = (float)$child_part[0]->$stockColName;
		$new_stock = $old_stock - $stock;
		
		$data_update_child_part = array(
			$stockColName => $new_stock,
		);

		$data_update_new_stock_customer_part = array(
			$FGStockColName => $new_stock_customer_part
		);

		$query = $this->SupplierParts->updateStockById($data_update_child_part, $child_part[0]->id);
		$customerPartDetails = $this->CustomerPart->getCustomerPartOnlyById($customer_part_number);
		$query = $this->CustomerPart->updateStockById($data_update_new_stock_customer_part, $customerPartDetails[0]->id);

		if ($query) {
			$this->Crud->stock_report($child_part[0]->part_number, $customer_part_number, "child_part", "customer_parts_master", $old_stock, $stock);
			$this->addSuccessMessage('Stock transferred successfully.');
		} else {
			$this->addErrorMessage('Unable to transfer to FG stock');
		}
		$this->_part_stocks($child_part_id, null);

	}

	/**
	 * Transfer Store to Store
	 */
	public function transfer_child_store_to_store_stock()
	{
		$child_part_to  = $this->input->post('customer_part_number');//transferred to location
		$child_part_id  = $this->input->post('child_part_id');
		$stock  = (float)$this->input->post('stock');

		$stock_column_name = $this->Crud->getStockColNmForClientUnit();
		
		$child_part = $this->SupplierParts->getSupplierPartById($child_part_id);
		$old_stock = (float)$child_part[0]->$stock_column_name;
		$new_stock = $old_stock - $stock;

		$part_to_data = $this->SupplierParts->getSupplierPartById($child_part_to);
		$new_stock_part_to_data =(float)$part_to_data[0]->$stock_column_name + $stock;

		$data_update_child_part = array(
			$stock_column_name => $new_stock
		);
		$data_update_child_part_to = array(
			$stock_column_name => $new_stock_part_to_data
		);

		$query = $this->SupplierParts->updateStockById($data_update_child_part, $child_part_id);
		$query = $this->SupplierParts->updateStockById($data_update_child_part_to, $child_part_to);

		if ($query) {
			$this->Crud->stock_report($child_part[0]->part_number, $part_to_data[0]->part_number, "child_part", "child_part", $old_stock, $stock);
			$this->addSuccessMessage('Stock transferred successfully.');
		} else {
			$this->addErrorMessage('Unable to transfer store stock.');
		}
		$this->_part_stocks($child_part_id, null);
	}


	/**
	 * Plastic Production to Store
	 */
	public function update_production_qty_child_part()
	{
		$child_part_id  = $this->input->post('child_part_id');
		$part_number  = $this->input->post('part_number');
		$machine_mold_issue_stock  = (float)$this->input->post('machine_mold_issue_stock');

		$child_part = $this->SupplierParts->getSupplierPartById($child_part_id);
		
		$stockColName = $this->Unit->getStockColNmForClientUnit();
		$prodColName = $this->Unit->getPlasticProdColNmForClientUnit();

		$old_stock = (float)$child_part[0]->$stockColName;
		$new_stock = $old_stock + $machine_mold_issue_stock;

		$old_machine_mold_issue_stock = (float)$child_part[0]->$prodColName;		
		$new_machine_mold_issue_stock = (float)$old_machine_mold_issue_stock - (float)$machine_mold_issue_stock;

		$data_update_child_part = array(
			$stockColName => $new_stock,
			$prodColName => $new_machine_mold_issue_stock
		);
		$query = $this->SupplierParts->updateStockById($data_update_child_part, $child_part[0]->id);
		if ($query) {
			$this->Crud->stock_report($child_part[0]->part_number, $child_part[0]->part_number, "machine_mold_issue_stock", "store_stock", $old_stock, $production_qty);
			$this->addSuccessMessage('Stock transferred successfully.');
		} else {
			$this->addErrorMessage('Unable to transfer the Production stock to Store stock');
		}
		$this->_part_stocks($child_part_id, null);
	}


	public function transfer_child_part_to_fg_stock_inhouse()
	{
		$customer_part_number  = $this->input->post('customer_part_number');
		$child_part_id  = $this->input->post('child_part_id');
		$part_number  = $this->input->post('part_number');
		$stock  = (float)$this->input->post('stock');
		$child_part = $this->InhouseParts->getInhousePartById($child_part_id);
		$customer_part_data = $this->CustomerPart->getCustomerPartByPartNumber($customer_part_number);

		$prodQtyColName = $this->Unit->getProdColNmForClientUnit();
		$fgStockColName = $this->Unit->getFGStockColNmForClientUnit();

		$customer_part_data_old_fg_stock = (float)$customer_part_data[0]->$fgStockColName;
		$old_stock = (float)$child_part[0]->$prodQtyColName;
		$new_stock = $old_stock - $stock;
		$new_stock_customer_part = $customer_part_data_old_fg_stock + $stock;
		$data_update_child_part = array(
			$prodQtyColName => $new_stock,
		);
		$data_update_new_stock_customer_partt = array(
			$fgStockColName => $new_stock_customer_part
		);

		$query = $this->InhouseParts->updateStockById($data_update_child_part, $child_part[0]->id);
		$customerPartDetails = $this->CustomerPart->getCustomerPartOnlyById($customer_part_number);
		$query2 = $this->CustomerPart->updateStockById($data_update_new_stock_customer_partt, $customerPartDetails[0]->id);
		if ($query) {
			$this->Crud->stock_report($child_part[0]->part_number, $customer_part_number, "production_qty", "fg_stock", $old_stock, $stock);
			$this->addSuccessMessage('Stock transferred successfully.');
		} else {
			$this->addErrorMessage('Unable to transfer to stock');
		}
		$this->redirectMessage();
	}

	public function sharing_issue_request_pending()
	{
		$unit_id = $this->Unit->getSessionClientId();
		$data['sharing_issue_request'] = $this->Crud->customQuery("
			SELECT s.* ,cp.part_number as part_number,cp.part_description as part_description,stock.stock as stock,cp.thickness as thickness,cp.weight as weight,cp.sharing_qty as sharing_qty
			FROM sharing_issue_request  s
			LEFT JOIN child_part cp ON cp.id = s.child_part_id
			LEFT JOIN child_part_stock stock ON cp.id = stock.childPartId AND stock.clientId = " . $unit_id. "
			WHERE s.status = 'pending' and s.clientId = ".$unit_id
		);
 		$data['child_part'] = $this->SupplierParts->readSupplierPartsOnly();
		$this->loadView('store/sharing_issue_request_store', $data);
	}

	public function sharing_issue_request_store_completed()
	{
		$unit_id = $this->Unit->getSessionClientId();
		//$data['operations_bom'] = $this->Crud->read_data("operations_bom");
		$data['sharing_issue_request'] = $this->Crud->customQuery("
			SELECT s.* ,cp.part_number as part_number,cp.part_description as part_description,stock.stock as stock,cp.thickness as thickness,cp.weight as weight,cp.sharing_qty as sharing_qty
			FROM sharing_issue_request  s
			LEFT JOIN child_part cp ON cp.id = s.child_part_id
			LEFT JOIN child_part_stock stock ON cp.id = stock.childPartId AND stock.clientId = " . $unit_id. "
			WHERE s.status = 'completed' and s.clientId = ".$unit_id
		);
		//$data['child_part'] = $this->SupplierParts->readSupplierPartsOnly();
		$this->loadView('store/sharing_issue_request_store_completed', $data);
	}
}
