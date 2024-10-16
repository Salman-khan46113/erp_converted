<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('CommonController.php');

class ReportsController extends CommonController
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('Reports_model');
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
		
		// if (!empty($data['filter_part_id']) && $filter_part_id!='ALL') {
		// 	$data['customer_part_list'] = $this->SupplierParts->getSupplierPartById($filter_part_id);
		// } else if ($filter_part_id == 'ALL') {
		// 	$data['customer_part_list'] = $this->SupplierParts->readSupplierParts();
		// } else {
		// 	$data['customer_part_list'] = ""; //No record found for particular criteria
		// }
		// for ($i = 1; $i <= 12; $i++) {
		// 	$data['month_data'][$i] = $this->Common_admin_model->get_month($i);
		// 	$data['month_number'][$i] = $this->Common_admin_model->get_month_number($data['month_data'][$i]);
		// }
		// foreach ($data['customer_part_list'] as $po) {
		// 	$data['uom_data'][$po->id] = $this->Crud->get_data_by_id("uom", $po->uom_id, "id");
		// 	$data['grn_details_data'][$po->id] = $this->Crud->get_data_by_id("grn_details", $po->id, "part_id");
		// 	$data['underinspection_stock'][$po->id] = 0;
		// 	if ($data['grn_details_data'][$po->id]) {
		// 		foreach ($data['grn_details_data'][$po->id] as $d) {
		// 			if ($d->accept_qty == 0) {
		// 				$data['underinspection_stock'][$po->id] = $data['underinspection_stock'][$po->id] + $d->verified_qty;
		// 			} else {
		// 			}
		// 		}
		// 	}
		// }
		
		$column[] = [
            "data" => "part_number",
            "title" => "Part Number",
            "width" => "14%",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "part_description",
            "title" => "Part Description",
            "width" => "16%",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "uom_name",
            "title" => "UOM",
            "width" => "17%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "stock",
            "title" => "Store Stock",
            "width" => "10%",
            "className" => "dt-center",
			'orderable' => false
        ];
        $column[] = [
            "data" => "store_stock_rate",
            "title" => "Stock Rate",
            "width" => "17%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "stock_value",
            "title" => "Stock Value",
            "width" => "17%",
            "className" => "dt-center",
			'orderable' => false
        ];
        $column[] = [
            "data" => "total_verified_qty",
            "title" => "Inward Inspection QTY",
            "width" => "7%",
            "className" => "dt-center"
        ];
        $column[] = [
            "data" => "production_qty",
            "title" => "Prod QTY",
            "width" => "7%",
            "className" => "dt-center status-row",
        ];

		$data['customer_part_data_new_updated2'] = $this->Crud->customQuery('SELECT DISTINCT part_number, id FROM `child_part`');

		$data["data"] = $column;
        $data["is_searching_enable"] = true;
        $data["is_paging_enable"] = true;
        $data["is_serverSide"] = true;
        $data["is_ordering"] = true;
        $data["is_heading_color"] = "#a18f72";
        $data["no_data_message"] =
            '<div class="p-3 no-data-found-block"><img class="p-2" src="' .
            base_url() .
            'public/assets/images/images/no_data_found_new.png" height="150" width="150"><br> No Employee data found..!</div>';
        $data["is_top_searching_enable"] = true;
        $data["sorting_column"] = json_encode([]);
        $data["page_length_arr"] = [[10,50,100,200], [10,50,100,200]];
        $data["admin_url"] = base_url();
        $data["base_url"] = base_url();

		$this->getPage('reports/report_supplier_parts_stock', $data);	
	}

	public function getStockReportData(){
		
		$post_data = $this->input->post();
        $column_index = array_column($post_data["columns"], "data");
        $order_by = "";
        foreach ($post_data["order"] as $key => $val) {
			if ($key == 0) {
				$order_by .= $column_index[$val["column"]] . " " . $val["dir"];
            } else {
				$order_by .=
				"," . $column_index[$val["column"]] . " " . $val["dir"];
            }
        }
		
        $condition_arr["order_by"] = $order_by;
        $condition_arr["start"] = $post_data["start"];
        $condition_arr["length"] = $post_data["length"];
        $base_url = $this->config->item("base_url");
		
		
		
		$data = $this->SupplierParts->getStockReportDataModel($condition_arr,$post_data["search"]);
		foreach ($data as $key => $value) {
			$data[$key]['stock_value'] = $value['stock'] * $value['store_stock_rate'];

		}
		
		$data["data"] = $data;
        $total_record = $this->SupplierParts->getStockReportDataCountModel([], $post_data["search"]);
		
        $data["recordsTotal"] = ($total_record['total_records']);
        $data["recordsFiltered"] = ($total_record['total_records']);
        echo json_encode($data);
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
		$data['created_year'] = $created_year;
		$data['created_month'] = $created_month;
		$column[] = [
            "data" => "supplier_name",
            "title" => "Supplier name",
            "width" => "14%",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "part_number",
            "title" => "Part No",
            "width" => "16%",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "part_description",
            "title" => "Part Description",
            "width" => "17%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "rate",
            "title" => "Part Rate",
            "width" => "10%",
            "className" => "dt-center",
			'orderable' => false
        ];
        $column[] = [
            "data" => "hsn_code",
            "title" => "HSN",
            "width" => "17%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "uom_name",
            "title" => "UOM",
            "width" => "17%",
            "className" => "dt-center",
			'orderable' => false
        ];
        $column[] = [
            "data" => "poNumber",
            "title" => "PO No",
            "width" => "7%",
            "className" => "dt-center text-nowrap",
        ];
        $column[] = [
            "data" => "po_date",
            "title" => "PO Date",
            "width" => "7%",
            "className" => "dt-center text-nowrap",
        ];
        $column[] = [
            "data" => "grn_number",
            "title" => "GRN No",
            "width" => "17%",
            "className" => "dt-center text-nowrap",
			
        ];
       
        $column[] = [
            "data" => "grn_created_date",
            "title" => "GRN Date",
            "width" => "7%",
            "className" => "dt-center text-nowrap",
        ];
        $column[] = [
            "data" => "invoice_number",
            "title" => "Invoice Number",
            "width" => "7%",
            "className" => "dt-center",
			'orderable' => false
        ];
        $column[] = [
            "data" => "invoice_date",
            "title" => "Invoice Date",
            "width" => "7%",
            "className" => "dt-center",
			'orderable' => false
        ];
        
        $column[] = [
            "data" => "po_qty",
            "title" => "PO Qty",
            "width" => "7%",
            "className" => "dt-center",
			'orderable' => false
        ];

		$column[] = [
            "data" => "total_accept_qty",
            "title" => "Accepted QTY",
            "width" => "7%",
            "className" => "dt-center",
			'orderable' => false
        ];
       
       $column[] = [
            "data" => "base_amount",
            "title" => "Basic Amount",
            "width" => "7%",
            "className" => "dt-center status-row",
        ];
        $column[] = [
            "data" => "sgst_amount",
            "title" => "SGST",
            "width" => "17%",
            "className" => "dt-center",
			
        ];
       
        $column[] = [
            "data" => "cgst_amount",
            "title" => "CGST",
            "width" => "7%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "igst_amount",
            "title" => "IGST",
            "width" => "7%",
            "className" => "dt-center",
			'orderable' => false
        ];
        $column[] = [
            "data" => "tcs_amount",
            "title" => "TCS",
            "width" => "7%",
            "className" => "dt-center",
			'orderable' => false
        ];
        
        $column[] = [
            "data" => "gst_amount",
            "title" => "GST Total",
            "width" => "7%",
            "className" => "dt-center",
			'orderable' => false
        ];

		$column[] = [
            "data" => "total_with_gst",
            "title" => "Total Amount With GST",
            "width" => "7%",
            "className" => "dt-center",
			'orderable' => false
        ];
		$data["data"] = $column;
        $data["is_searching_enable"] = true;
        $data["is_paging_enable"] = true;
        $data["is_serverSide"] = true;
        $data["is_ordering"] = true;
        $data["is_heading_color"] = "#a18f72";
        $data["no_data_message"] =
            '<div class="p-3 no-data-found-block"><img class="p-2" src="' .
            base_url() .
            'public/assets/images/images/no_data_found_new.png" height="150" width="150"><br> No Employee data found..!</div>';
        $data["is_top_searching_enable"] = true;
        $data["sorting_column"] = json_encode([]);
        $data["page_length_arr"] = [[10,50,100,200], [10,50,100,200]];
        $data["admin_url"] = base_url();
        $data["base_url"] = base_url();
		
		$data['showDocRequestDetails'] = $this->showMaterialRequestDetails();
		$this->getPage('reports/reports_grn', $data);	
	}

	public function getReportGnData(){
		$customer_part_id  = $this->input->post("customer_part_id");
		$post_data = $this->input->post();
		
        $column_index = array_column($post_data["columns"], "data");
        $order_by = "";
        foreach ($post_data["order"] as $key => $val) {
			if ($key == 0) {
				$order_by .= $column_index[$val["column"]] . " " . $val["dir"];
            } else {
				$order_by .=
				"," . $column_index[$val["column"]] . " " . $val["dir"];
            }
        }
		
        $condition_arr["order_by"] = $order_by;
        $condition_arr["start"] = $post_data["start"];
        $condition_arr["length"] = $post_data["length"];
        $base_url = $this->config->item("base_url");
		$data = $this->SupplierParts->getGNRepotData($condition_arr,$post_data["search"]);
		
        

		foreach($data as $k=>$v){
			$data[$k]['po_date']= defaultDateFormat($v['po_date']);
			$data[$k]['invoice_date'] = defaultDateFormat($v['invoice_date']);
			$data[$k]['grn_created_date'] = defaultDateFormat($v['grn_created_date']);
			$gst_amount = $v['sgst_amount'] + $v['cgst_amount'] + $v['igst_amount'] + $v['tcs_amount'];
			// Calculate total_with_gst
			$total_with_gst = $gst_amount + $v['base_amount'];
			// Initialize tcs_amount
			$tcs_amount = 0;
			// Check if tcs_amount is not empty and assign its value
			if (!empty($v['tcs_amount'])) {
				$tcs_amount = $g->tcs_amount;
			}
			$data[$k]['gst_amount'] = $gst_amount;
			$data[$k]['total_with_gst'] = $total_with_gst;
			$data[$k]['tcs_amount'] = $tcs_amount;
		}
		$data["data"] = $data;
        $total_record = $this->SupplierParts->getGNRepotDataCount($condition_arr, $post_data["search"]);
		
        $data["recordsTotal"] = $total_record['tot_record'];
        $data["recordsFiltered"] = $total_record['tot_record'];
        echo json_encode($data);
	}

    /* payable report */
    public function payable_report()
    {

        $data['supplier'] = $this->Crud->read_data("supplier");

        $column[] = [
            "data" => "supplier_name",
            "title" => "Supplier name",
            "width" => "150px",
            "className" => "dt-left",
        ];
        $column[] = [                                                                                                                                               
            "data" => "grn_number",
            "title" => "GRN No",
            "width" => "100px",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "grn_created_date",
            "title" => "GRN Date",
            "width" => "100px",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "invoice_number",
            "title" => "Invoice Number",
            "width" => "150px",
            "className" => "dt-center",
            'orderable' => false
        ];
        $column[] = [
            "data" => "invoice_date",
            "title" => "Invoice Date",
            "width" => "150px",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "base_amount",
            "title" => "Basic Amount",
            "width" => "120px",
            "className" => "dt-center",
            'orderable' => false
        ];
        $column[] = [
            "data" => "sgst_amount",
            "title" => "SGST",
            "width" => "3%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "cgst_amount",
            "title" => "CGST",
            "width" => "3%",
            "className" => "dt-center status-row",
        ];
        $column[] = [
            "data" => "igst_amount",
            "title" => "IGST",
            "width" => "3%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "tcs_amount",
            "title" => "TCS",
            "width" => "3%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "gst_amount",
            "title" => "GST Total",
            "width" => "120px",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "total_with_gst",
            "title" => "Total Amount With GST",
            "width" => "150px",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "payment_days",
            "title" => "Payment Terms in Days",
            "width" => "150px",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "due_date",
            "title" => "Due Date",
            "width" => "10%",
            "className" => "dt-center",
            'orderable' => false
            
        ];
        $column[] = [
            "data" => "due_days",
            "title" => "Due Days",
            "width" => "10%",
            "className" => "dt-center due_days_block",
            'orderable' => false
            
        ];
        $column[] = [
            "data" => "amount_received",
            "title" => "Amount Paid",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "tds_amount",
            "title" => "TDS",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "bal_amnt",
            "title" => "Balance Amount to Pay",
            "width" => "150px",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "payment_receipt_date",
            "title" => "Payment Paid Date",
            "width" => "150px",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "transaction_details",
            "title" => "Transaction Details",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "remarks",
            "title" => "Remark",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
       

        $column[] = [
            "data" => "action",
            "title" => "Action",
            "width" => "7%",
            "className" => "dt-center",
            'orderable' => false
        ];

       
       
        $date_filter = date("Y/m/01") ." - ". date("Y/m/d");
        $date_filter =  explode((" - "),$date_filter);
        $data['start_date'] = $date_filter[0];
        $data['end_date'] = $date_filter[1];
        
        $data["data"] = $column;
        $data["is_searching_enable"] = true;
        $data["is_paging_enable"] = true;
        $data["is_serverSide"] = true;
        $data["is_ordering"] = true;
        $data["is_heading_color"] = "#a18f72";
        $data["no_data_message"] =
            '<div class="p-3 no-data-found-block"><img class="p-2" src="' .
            base_url() .
            'public/assets/images/images/no_data_found_new.png" height="150" width="150"><br> No Employee data found..!</div>';
        $data["is_top_searching_enable"] = true;
        $data["sorting_column"] = json_encode([]);
        $data["page_length_arr"] = [[10,50,100,200], [10,50,100,200]];
        $data["admin_url"] = base_url();
        $data["base_url"] = base_url();
        
        $this->loadView('reports/payable_report',$data);
    }


    public function getPayableReportData(){
        $customer_part_id  = $this->input->post("customer_part_id");
        $post_data = $this->input->post();

        $column_index = array_column($post_data["columns"], "data");
        $order_by = "";
        foreach ($post_data["order"] as $key => $val) {
            if ($key == 0) {
                $order_by .= $column_index[$val["column"]] . " " . $val["dir"];
            } else {
                $order_by .=
                "," . $column_index[$val["column"]] . " " . $val["dir"];
            }
        }
        
        $condition_arr["order_by"] = $order_by;
        $condition_arr["start"] = $post_data["start"];
        $condition_arr["length"] = $post_data["length"];
        $base_url = $this->config->item("base_url");
        $data = $this->Reports_model->getPayableReportView($condition_arr,$post_data["search"]);
        // pr($data,1); 
        
        foreach ($data as $key => $objs) {
            $gst_amount = (float)($objs['sgst_amount'] + $objs['cgst_amount'] + $objs['igst_amount'] + $objs['tcs_amount']);
            $data[$key]['gst_amount'] = $gst_amount;
            $created_date_str = $objs['grn_created_date'];  
            $total_with_gst = $gst_amount + $objs['base_amount'];  
            $data[$key]['total_with_gst'] = $total_with_gst;
            $total_with_gst_val += $total_with_gst > 0 ? $total_with_gst : 0;
            $total_paid_amount += $value['amount_received'] > 0 ? $value['amount_received'] : 0;
            $total_balance_amount_to_pay += $value['bal_amnt'] > 0 ? $value['bal_amnt'] : 0;
            $total_tds_amount += $value['tds_amount'] > 0 ? $value['tds_amount'] : 0;
            $tcs_amount = 0;
            if(!empty($objs['tcs_amount'])){
                $tcs_amount = $objs['tcs_amount'];
            }   
            $data[$key]['tcs_amount'] = $tcs_amount;                         
            // Create a DateTime object by specifying the format
            $dateTime = DateTime::createFromFormat('d-m-Y', $created_date_str);
            $due_date = display_no_character("");
            if ($dateTime && is_numeric($objs['payment_days'])) {
                // Convert payment_terms to an integer for days
                $payment_terms_days = (int)$objs['payment_days'];
                // Add payment_terms (in days) to the created date
                $dateTime->add(new DateInterval('P' . $payment_terms_days . 'D'));
                // Get the formatted due date
                $due_date = $dateTime->format('d/m/Y');
                $due_date = defaultDateFormat($due_date);
            }
            $data[$key]['due_date'] = $due_date;

            $today = new DateTime();
            // Convert due date string to a DateTime object
            $due_days = display_no_character("");
            if($due_date != display_no_character("")){
                if(!empty($objs['payment_receipt_date'])){
                    $sales_date = $objs['grn_created_date'];

                    $sales_date = DateTime::createFromFormat("d-m-Y", $sales_date);
                    // Format to the desired output
                    $sales_date = $sales_date->format("Y-m-d");
                    $payment_receipt_date = $objs['payment_receipt_date'];
                    $sales_date = new DateTime($sales_date);
                    $payment_receipt_date = new DateTime($payment_receipt_date);
                    // Calculate the difference
                    $interval = $sales_date->diff($payment_receipt_date);

                    // Get the difference in days
                    $due_days = $interval->days;
                }else{
                    $dueDateObject = DateTime::createFromFormat('d/m/Y', $due_date);
                     // Calculate the interval between the due date and today's date
                    $interval = $today->diff($dueDateObject);
                    // Get the difference in days
                    $due_days = $interval->format('%r%a'); // This will give the difference in days with respect to today's date
                }
                
               
                $due_days_status = "normal";
                if($due_days <= 0 && empty($objs['payment_receipt_date']))
                {
                    $due_days_status = "danger";
                }
            }
            
            $data[$key]['due_days'] = $due_days;
            $data[$key]['due_days_status'] = $due_days_status;

            $bal_amnt = $total_with_gst - $objs['amount_received'] - $objs['tds_amount'];
            $data[$key]['bal_amnt'] = $bal_amnt;    
            $data[$key]['action']= "--";
            if($objs['total_accept_qty'] > 0){
                $data[$key]['action'] = "<a href='javascript:void(0)' class='add-payable-report' data-grn-number='".$objs['grn_number']."' data-amount-paid='".$objs['amount_received']."' data-bal-amnt='".$bal_amnt."' data-transaction-details='".$objs['transaction_details']."' data-payment-receipt-date='".$objs['payment_receipt_date']."' data-tds='".$objs['tds_amount']."'><i class='ti ti-edit'></i></a>";
            }

            $data[$key]['grn_created_date'] = defaultDateFormat($objs['grn_created_date']);
            $data[$key]['invoice_date'] = defaultDateFormat($objs['invoice_date']);
            $data[$key]['payment_receipt_date'] = defaultDateFormat($objs['payment_receipt_date']);                                    
                                                                                
        }  

        $data["data"] = $data;
        $total_record = $this->Reports_model->getReceivableReportCount([], $post_data["search"]);
        $total_with_gst_val = 0;
        $total_paid_amount = 0;
        $total_balance_amount_to_pay = 0;
        $total_tds_amount = 0;
        foreach ($total_record as $key => $objs) {
            $gst_amount = (float)($objs['sgst_amount'] + $objs['cgst_amount'] + $objs['igst_amount'] + $objs['tcs_amount']);
            $data[$key]['gst_amount'] = $gst_amount;
            $created_date_str = $objs['grn_created_date'];  
            $total_with_gst = $gst_amount + $objs['base_amount'];  
            $data[$key]['total_with_gst'] = $total_with_gst;
            $total_with_gst_val += $total_with_gst > 0 ? $total_with_gst : 0;
            $total_paid_amount += $objs['amount_received'] > 0 ? $objs['amount_received'] : 0;
            $bal_amnt = $total_with_gst - $objs['amount_received'] - $objs['tds_amount'];
            $data[$key]['bal_amnt'] = $bal_amnt;
            $total_balance_amount_to_pay += $bal_amnt > 0 ? $bal_amnt : 0;
            $total_tds_amount += $objs['tds_amount'] > 0 ? $objs['tds_amount'] : 0;
        }
        $data["recordsTotal"] = count($total_record);
        $data["recordsFiltered"] = count($total_record);
        $data["total_with_gst_val"] = number_format($total_with_gst_val,2);
        $data["total_paid_amount"] = number_format($total_paid_amount,2);
        $data["total_balance_amount_to_pay"] = number_format($total_balance_amount_to_pay,2);
        $data["total_tds_amount"] = number_format($total_tds_amount,2);
        echo json_encode($data);
    }
    public function update_payable_report()
    {
        // pr($this->input->post(),1);
        $grn_number = $this->input->post('grn_number');
        $payment_receipt_date = $this->input->post('payment_receipt_date');
        $amount_received = $this->input->post('amount_received');
        $transaction_details = $this->input->post('transaction_details');
        $tds = $this->input->post('tds');
        $remark = $this->input->post('remark');
        $check = $this->Common_admin_model->get_data_by_id_count("payable_report", $this->input->post('grn_number'), "grn_number");
        $success = 0;
        $messages = "Something went wrong.";
        if ($check == 0) 
        {
            $data = array(
                        "grn_number" => $grn_number,
                        "payment_receipt_date" => $payment_receipt_date,
                        "amount_received" => $amount_received,
                        "transaction_details" => $transaction_details,
                        "tds_amount" => $tds,
                        "remark" => $remark
            );
            $result = $this->Crud->insert_data("payable_report", $data);
            $messages = "Updated Sucessfully";
            $success = 1;
            // echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        } 
        else 
        {
                $data = array(
                        "grn_number" => $grn_number,
                        "payment_receipt_date" => $payment_receipt_date,
                        "amount_received" => $amount_received,
                        "transaction_details" => $transaction_details,
                        "tds_amount" => $tds,
                        "remark" => $remark
                        
                );
                $messages = "Updated Sucessfully";
                $success = 1;
                // pr($data,1);
                $result = $this->Crud->update_data_column("payable_report", $data, $grn_number, "grn_number");
                // echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
            
        }
        $result = [];
        $result['messages'] = $messages;
        $result['success'] = $success;
        echo json_encode($result);
        exit();
    }
    /* sales summary report */
    public function sales_summary_report()
    {

        $data['customers'] = $this->Crud->read_data("customer");

        $column[] = [
            "data" => "customer_name",
            "title" => "Customer Name",
            "width" => "25%",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "po_number",
            "title" => "Customer PO NO",
            "width" => "25%",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "salesNumber",
            "title" => "Sales Inv No",
            "width" => "17%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "sales_date",
            "title" => "Sales Invoice Date",
            "width" => "25%",
            "className" => "dt-center",

        ];
        $column[] = [
            "data" => "status",
            "title" => "Sales Status",
            "width" => "25%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "qty",
            "title" => "Total Qty",
            "width" => "25%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "subtotal",
            "title" => "taxable Value",
            "width" => "7%",
            "className" => "dt-center status-row",
            'orderable' => false
        ];
        $column[] = [
            "data" => "total_discount_amount",
            "title" => "Discount(₹)",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "sgst_amount",
            "title" => "SGST",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "cgst_amount",
            "title" => "CGST",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "igst_amount",
            "title" => "IGST",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "tcs_amount",
            "title" => "TCS",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "total_gst_amount",
            "title" => "TOTAL GST",
            "width" => "17%",
            "className" => "dt-center due_days_block",
            
        ];
        
        $column[] = [
            "data" => "row_total",
            "title" => "Total With GST",
            "width" => "7%",
            "className" => "dt-center",
            'orderable' => false
        ];

       
       
        $date_filter = date("Y/m/01") ." - ". date("Y/m/d");
        $date_filter =  explode((" - "),$date_filter);
        $data['start_date'] = $date_filter[0];
        $data['end_date'] = $date_filter[1];
        
        $data["data"] = $column;
        $data["is_searching_enable"] = true;
        $data["is_paging_enable"] = true;
        $data["is_serverSide"] = true;
        $data["is_ordering"] = true;
        $data["is_heading_color"] = "#a18f72";
        $data["no_data_message"] =
            '<div class="p-3 no-data-found-block"><img class="p-2" src="' .
            base_url() .
            'public/assets/images/images/no_data_found_new.png" height="150" width="150"><br> No Employee data found..!</div>';
        $data["is_top_searching_enable"] = true;
        $data["sorting_column"] = json_encode([]);
        $data["page_length_arr"] = [[10,50,100,200], [10,50,100,200]];
        $data["admin_url"] = base_url();
        $data["base_url"] = base_url();
        
        $this->loadView('reports/sales_summary_report',$data);
    }


    public function getSalesSummaryReportData(){
        $customer_part_id  = $this->input->post("customer_part_id");
        $post_data = $this->input->post();

        $column_index = array_column($post_data["columns"], "data");
        $order_by = "";
        foreach ($post_data["order"] as $key => $val) {
            if ($key == 0) {
                $order_by .= $column_index[$val["column"]] . " " . $val["dir"];
            } else {
                $order_by .=
                "," . $column_index[$val["column"]] . " " . $val["dir"];
            }
        }
        
        $condition_arr["order_by"] = $order_by;
        $condition_arr["start"] = $post_data["start"];
        $condition_arr["length"] = $post_data["length"];
        $base_url = $this->config->item("base_url");
        $data = $this->Reports_model->getSalesSummaryReportView($condition_arr,$post_data["search"]);
        // pr($data,1);
        
        foreach ($data as $key => $po) {
            if($po['basic_total'] > 0 ) {
                $subtotal = $po['basic_total'];
            }else{
                $subtotal =  $po['total_rate'] - $po['gst_amount'];
            }
            
            $data[$key]['subtotal'] = $subtotal;
            if ($po['part_price'] > 0) {
                $rate = $po['part_price'];
            }else{
                $rate = round((float) $subtotal / (float) $po['qty'], 2);
            }
            $data[$key]['rate'] = $rate;
            $row_total = $po['total_sales_amount'];
            $data[$key]['row_total'] = $row_total;

            $gst_structure = $this->Crud->get_data_by_id("gst_structure", $po['taxid'], "id");
            $sales_total = $this->Crud->tax_calcuation($gst_structure[0], $subtotal, $po['total_discount_amount']);
            $data[$key]['sgst_amount']  = $sales_total["sales_sgst"];
            $data[$key]['cgst_amount'] = $sales_total["sales_cgst"];
            $data[$key]['igst_amount']  = $sales_total["sales_igst"];
            $data[$key]['tcs_amount'] = $sales_total["sales_tcs"];
        } 

        $data["data"] = $data;
        $total_record = $this->Reports_model->getSalesSummaryReportCount([], $post_data["search"]);
        $total_balance_amount = 0;
        $total_gst_amount = 0;
        $total_amount_with_gst_amount = 0;
        foreach ($total_record as $key => $po) {
            if($po['basic_total'] > 0 ) {
                $subtotal = $po['basic_total'];
            }else{
                $subtotal =  $po['total_rate'] - $po['gst_amount'];
            }
            $total_balance_amount += $subtotal;
            $row_total = $po['total_sales_amount'];
            $total_amount_with_gst_amount += $row_total;
            $total_gst_amount += $po['total_gst_amount'];
        }
        $data["recordsTotal"] = count($total_record);
        $data["recordsFiltered"] = count($total_record);
        $data["total_balance_amount"] = number_format($total_balance_amount,2);
        $data["total_gst_amount"] = number_format($total_gst_amount,2);
        $data["total_amount_with_gst_amount"] = number_format($total_amount_with_gst_amount,2);
        echo json_encode($data);
    }

    /* GRN Summary Reports */
    public function grn_summary_report()
    {

         $data['supplier'] = $this->Crud->read_data("supplier");

        $column[] = [
            "data" => "supplier_name",
            "title" => "Supplier Name",
            "width" => "150px",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "poNumber",
            "title" => "PO No",
            "width" => "25%",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "po_date",
            "title" => "PO Date",
            "width" => "17%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "grn_number",
            "title" => "GRN No",
            "width" => "80px",
            "className" => "dt-center",

        ];
        $column[] = [
            "data" => "grn_created_date",
            "title" => "GRN Date",
            "width" => "100px",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "invoice_number",
            "title" => "Invoice Number",
            "width" => "150px",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "invoice_date",
            "title" => "Invoice Date",
            "width" => "120px",
            "className" => "dt-center status-row",
        ];
        $column[] = [
            "data" => "po_qty",
            "title" => "PO Qty",
            "width" => "80px",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "accept_qty",
            "title" => "Total QTY",
            "width" => "100px",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "base_amount",
            "title" => "Basic Amount",
            "width" => "120px",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "sgst_amount",
            "title" => "SGST",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "cgst_amount",
            "title" => "CGST",
            "width" => "17%",
            "className" => "dt-center",
            
        ];
        $column[] = [
            "data" => "igst_amount",
            "title" => "IGST",
            "width" => "17%",
            "className" => "dt-center due_days_block",
            
        ];
        
        $column[] = [
            "data" => "tcs_amount",
            "title" => "TCS",
            "width" => "7%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "gst_amount",
            "title" => "GST Total",
            "width" => "90px",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "total_with_gst",
            "title" => "Total Amount With GST",
            "width" => "160px",
            "className" => "dt-center",
            'orderable' => false
        ];

       
       
        $date_filter = date("Y/m/01") ." - ". date("Y/m/d");
        $date_filter =  explode((" - "),$date_filter);
        $data['start_date'] = $date_filter[0];
        $data['end_date'] = $date_filter[1];
        
        $data["data"] = $column;
        $data["is_searching_enable"] = true;
        $data["is_paging_enable"] = true;
        $data["is_serverSide"] = true;
        $data["is_ordering"] = true;
        $data["is_heading_color"] = "#a18f72";
        $data["no_data_message"] =
            '<div class="p-3 no-data-found-block"><img class="p-2" src="' .
            base_url() .
            'public/assets/images/images/no_data_found_new.png" height="150" width="150"><br> No Employee data found..!</div>';
        $data["is_top_searching_enable"] = true;
        $data["sorting_column"] = json_encode([]);
        $data["page_length_arr"] = [[10,50,100,200], [10,50,100,200]];
        $data["admin_url"] = base_url();
        $data["base_url"] = base_url();
        
        $this->loadView('reports/grn_summary_report',$data);
    }


    public function getGrnSummaryReportData(){
        $customer_part_id  = $this->input->post("customer_part_id");
        $post_data = $this->input->post();

        $column_index = array_column($post_data["columns"], "data");
        $order_by = "";
        foreach ($post_data["order"] as $key => $val) {
            if ($key == 0) {
                $order_by .= $column_index[$val["column"]] . " " . $val["dir"];
            } else {
                $order_by .=
                "," . $column_index[$val["column"]] . " " . $val["dir"];
            }
        }
        
        $condition_arr["order_by"] = $order_by;
        $condition_arr["start"] = $post_data["start"];
        $condition_arr["length"] = $post_data["length"];
        $base_url = $this->config->item("base_url");
        $data = $this->Reports_model->getGrnSummaryReportView($condition_arr,$post_data["search"]);
        foreach ($data as $key => $g) {
            $gst_amount = (float)($g['sgst_amount'] + $g['cgst_amount'] + $g['igst_amount'] + $g['tcs_amount']);
            $total_with_gst = $gst_amount + $g['base_amount'];
            // $data[$key]['gst_amount'] = $gst_amount;
            $data[$key]['total_with_gst']  = $total_with_gst;
            $data[$key]['po_date']  = defaultDateFormat($g['po_date']);
            $data[$key]['grn_created_date']  = defaultDateFormat($g['grn_created_date']);
            $data[$key]['invoice_date']  = defaultDateFormat($g['invoice_date']);            
        } 

        $data["data"] = $data;
        $total_record = $this->Reports_model->getGrnSummaryReportCount([], $post_data["search"]);
        $total_balance_amount = 0;
        $total_gst_amount = 0;
        $total_amount_with_gst_amount = 0;
        foreach ($total_record  as $key => $g) {
            $total_balance_amount += $g['base_amount'];
            $total_gst_amount += $g['gst_amount'];
            $total_amount_with_gst_amount += $g['gst_amount'] + $g['base_amount'];
        }
        $data["recordsTotal"] = count($total_record);
        $data["recordsFiltered"] = count($total_record);
        $data["total_balance_amount"] = number_format($total_balance_amount,2);
        $data["total_gst_amount"] = number_format($total_gst_amount,2);
        $data["total_amount_with_gst_amount"] = number_format($total_amount_with_gst_amount,2);
        echo json_encode($data);
    }


    /* daily stpck report */
    public function get_daily_stock()
    {   
        $client_id = $this->session->userdata("clientUnit");
        $current_date = date("Y-m-d");
        $daily_stock_data = $this->Reports_model->checkStockEntry($current_date);
        $client_data = $this->Reports_model->getClient();
        $data['client_data'] =  array_column($client_data,"client_unit","id");  
        $daily_stock = json_decode($daily_stock_data['stock_json'],TRUE);
        $data['daily_stock'] = $daily_stock;
        $data['current_date'] = $current_date;
        $data['client_id'] = $client_id;
        $this->loadView('reports/daily_stock_report', $data);
    }
    public function get_daily_stock_filter_data()
    {   
        $current_date = $this->input->post("filter_date");
        $daily_stock_data = $this->Reports_model->checkStockEntry($current_date);
        $client_id = $this->session->userdata("clientUnit");
        $html = "";

        if(isset($daily_stock_data['stock_date'])){
            $client_data = $this->Reports_model->getClient();
            $client_data =  array_column($client_data,"client_unit","id");  
            $daily_stock = json_decode($daily_stock_data['stock_json'],TRUE);
            $data['daily_stock'] = $daily_stock;
            $data['current_date'] = $current_date;
            
            $total_store_stock = 0;
            $total_production_store_stock = 0;
            if(count($daily_stock) > 0){
                foreach ($data['daily_stock'] as $key => $value) {
                    if($client_id == $value['clientId'] || $client_id == ""){
                        $total_store_stock += $value['stock']* $value['store_stock_rate'];
                        $total_production_store_stock += $value['production_stock']*$value['store_stock_rate'];
                        $html .= "
                            <tr>
                                <td class='text-left'>".$value['part_number']."</td>
                                <td class='text-left'>".$value['part_description']."</td>";
                        if($client_id == ""){
                            $html .="<td class='text-center'>".$client_data[$value['clientId']]."</td>";
                        }
                        $html .= "
                                <td class='text-left'>".$value['uom_name']."</td>
                                <td class='text-center'>".number_format($value['stock'],2)."</td>
                                <td class='text-center'>".number_format($value['store_stock_rate'],2)."</td>
                                <td class='text-center'>".number_format($value['stock']*$value['store_stock_rate'],2)."</td>
                                <td class='text-center'>".number_format($value['stock']*$value['production_stock'],2)."</td>
                                <td class='text-center'>".number_format($value['production_stock']*$value['store_stock_rate'],2)."</td>
                            </tr>";
                    }
                }
            }
        }

        $response['html'] = $html;
        $response['total_store_stock'] = number_format($total_store_stock,2);
        $response['total_production_store_stock'] = number_format($total_production_store_stock,2);
        echo json_encode($response);
        exit();
    }
}
