<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('CommonController.php');

class ReportsController extends CommonController
{

	function __construct()
	{
		parent::__construct();
	}
	
	private function getPage($viewPage,$viewData){
        //$this->loadView($this->getPath().$viewPage,$viewData);
		$this->loadView($viewPage,$viewData);
	}


	public function parts_stock_report()
	{	
		$filter_part_id = $this->input->post('part_id');
		$data['filter_part_id'] = $filter_part_id;
		
		$stock_column_name = $this->Crud->getStockColNmForClientUnit();
        $prod_column_name = $this->Crud->getProdColNmForClientUnit();
		
		if (!empty($data['filter_part_id']) && $filter_part_id!='ALL') {
			$data['customer_part_list'] = $this->SupplierParts->getSupplierPartById($filter_part_id);
		} else if ($filter_part_id == 'ALL') {
			$data['customer_part_list'] = $this->SupplierParts->readSupplierParts();
		} else {
			$data['customer_part_list'] = ""; //No record found for particular criteria
		}
		for ($i = 1; $i <= 12; $i++) {
			$data['month_data'][$i] = $this->Common_admin_model->get_month($i);
			$data['month_number'][$i] = $this->Common_admin_model->get_month_number($data['month_data'][$i]);
		}
		foreach ($data['customer_part_list'] as $po) {
			$data['uom_data'][$po->id] = $this->Crud->get_data_by_id("uom", $po->uom_id, "id");
			$data['grn_details_data'][$po->id] = $this->Crud->get_data_by_id("grn_details", $po->id, "part_id");
			$data['underinspection_stock'][$po->id] = 0;
			if ($data['grn_details_data'][$po->id]) {
				foreach ($data['grn_details_data'][$po->id] as $d) {
					if ($d->accept_qty == 0) {
						$data['underinspection_stock'][$po->id] = $data['underinspection_stock'][$po->id] + $d->verified_qty;
					} else {
					}
				}
			}
		}
		
		$data['customer_part_data_new_updated2'] = $this->Crud->customQuery('SELECT DISTINCT part_number, id FROM `child_part`');
		$this->getPage('reports/report_supplier_parts_stock', $data);	
	}


	public function parts_stock_report_old()

	{	

		$filter_part_id = $this->input->post('part_id');
		$filter_client = $this->input->post('clientUnit');

		$data['client_list'] = $this->Crud->read_data_acc("client");
		$data['filter_part_id'] = $filter_part_id;

		if (empty($filter_client)) {
			$filter_client = $this->session->userdata['clientUnit']; 
		}

		$this->session->set_userdata('clientUnit',$filter_client); //set the clientUnit to session..
		$clientDetails = $this->getClientUnitDetails($filter_client);	
		$this->session->set_userdata('clientUnitName', $clientDetails[0]->client_unit);

		$stock_column_name = $this->Crud->getStockColNmForClientUnit();
        $prod_column_name = $this->Crud->getProdColNmForClientUnit();
		$unitId = $this->Unit->getSessionClientId() ;
		if (!empty($data['filter_part_id']) && $filter_part_id!='ALL') {
			$data['customer_part_list'] = $this->Crud->customQuery("
			SELECT DISTINCT 
			c.part_number, 
			c.id, 
			u.uom_name, 
			c.store_stock_rate, 
			c.part_description, 
			c.".$stock_column_name." as stock_qty, 
			c.".$prod_column_name." as production_qty,
			stock
			FROM 
			child_part c
			LEFT JOIN 
			child_part_stock stock 
			ON 
			stock.childPartId = c.id 
			AND 
			stock.clientId = ".$unitId."
			JOIN 
			uom u 
			ON 
			u.id = c.uom_id
			WHERE 
			c.id = ".$filter_part_id
			);


		} else if ($filter_part_id == 'ALL') {
			$data['customer_part_list'] = $this->Crud->customQuery('SELECT DISTINCT c.part_number, c.id, u.uom_name, 
			c.store_stock_rate, c.part_description, '.$stock_column_name.' as stock_qty, '.$prod_column_name.' as production_qty  
			FROM `child_part` c, uom u
			WHERE u.id = c.uom_id
			');

		} else {
			$data['customer_part_list'] = ""; //No record found for particular criteria
		}

		$data['customer_part_data_new_updated2'] = $this->Crud->customQuery('SELECT DISTINCT part_number, id FROM `child_part`');
		$data['filter_client'] = $filter_client;
		foreach ($data['customer_part_list'] as $po) {
			$data['grn_details_data'][$po->id] = $this->Crud->get_data_by_id("grn_details", $po->id, "part_id");
			$underinspection_stock[$po->id] = 0;
			if ($data['grn_details_data'][$po->id]) {
				foreach ($data['grn_details_data'][$po->id] as $d) {
					if ($d->accept_qty == 0) {
						$underinspection_stock[$po->id] = $underinspection_stock[$po->id] + $d->verified_qty;
					} else {
					}
				}
			}
		}
		
		pr($data,1);
		$this->getPage('reports/report_supplier_parts_stock', $data);	
	}


	public function reports_grn()
	{

		$created_month  = $this->input->post("created_month");
		$created_year  = $this->input->post("created_y	ear");

		if (empty($created_year)) {
			$created_year = $this->year;
		}
		if (empty($created_month)) {
			$created_month = $this->month;
		}

		for ($i = 1; $i <= 12; $i++) {
			$data['month_data'][$i] = $this->Common_admin_model->get_month($i);
			$data['month_number'][$i] = $this->Common_admin_model->get_month_number($data['month_data'][$i]);
		}
		$data['fincYears'] = $this->Common_admin_model->getFinancialYears();
		$data['grn_details']  = $this->Crud->customQuery('SELECT grn.inwarding_id, inward.grn_number, grn.po_part_id, grn.po_number, grn.created_date as grn_created_date,
		 grn.invoice_number, inward.invoice_date, po.supplier_id, grn.qty as po_qty, po.po_number as poNumber, s.supplier_name, po.po_date, part.part_number, part.part_description, part.hsn_code, u.uom_name,
			po_parts.tax_id, po_parts.part_id, po_parts.rate, grn.accept_qty,tax.igst, tax.sgst, tax.cgst,tax.tcs,tax.tcs_on_tax,
			ROUND((grn.accept_qty * po_parts.rate),2) as base_amount, 
			ROUND(((grn.accept_qty * po_parts.rate) * tax.cgst) / 100, 2) as cgst_amount, 
			ROUND(((grn.accept_qty * po_parts.rate) * tax.sgst) / 100, 2 ) as sgst_amount,
			ROUND(((grn.accept_qty * po_parts.rate) * tax.tcs) / 100, 2) as tcs_amount,
			ROUND(((grn.accept_qty * po_parts.rate) * tax.igst) / 100, 2) as igst_amount,
			po.loading_unloading, 	po.loading_unloading_gst, po.freight_amount, po.freight_amount_gst
			FROM grn_details grn 
					INNER JOIN inwarding inward ON inward.id = grn.inwarding_id 
					INNER JOIN po_parts po_parts ON po_parts.id = grn.po_part_id
					INNER JOIN new_po po ON po.id = grn.po_number
					INNER JOIN child_part part ON part.id = po_parts.part_id
					INNER JOIN uom u ON u.id = po_parts.uom_id
					INNER JOIN gst_structure tax ON tax.id = po_parts.tax_id
					INNER JOIN supplier s ON s.id = po.supplier_id
					WHERE grn.created_month = ' 
				. $created_month . ' AND grn.created_year = ' . $created_year . ' ORDER BY grn.id DESC ');

		
		$data['created_year'] = $created_year;
		$data['created_month'] = $created_month;
		
		foreach($data['grn_details'] as $v){
			$data['po_date'][$v->poNumber] = $this->Crud->getDateByFormat($v->po_date);
			$data['invoice_date'][$v->invoice_date] = $this->Crud->getDateByFormat($v->invoice_date);
		}
		$data['showDocRequestDetails'] = $this->showMaterialRequestDetails();
		$this->getPage('reports/reports_grn', $data);	
	}
}