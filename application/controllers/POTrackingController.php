<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('CommonController.php');

class POTrackingController extends CommonController {
	
	const PO_TRACKING_PATH = "poTracking/";
	
	function _construct()
    {
        parent::_construct();
    }
	
	private function getPath(){
		return self::PO_TRACKING_PATH;
	}

	public function customer_po_tracking() {
		$data['customer_data'] = $this->Crud->read_data("customer");
		// $this->getPage('customer_po_tracking', $data);
		$this->loadView('customer/customer_po_tracking',$data);

	}
	
	
	public function generate_customer_po_tracking()
	{
		$po_start_date = $this->input->post('po_start_date');
		$po_end_date = $this->input->post('po_end_date');
		$po_number = $this->input->post('po_number');
		$po_amedment_number = $this->input->post('po_amedment_number');
		$customer_id = $this->input->post('customer_id');
		$po_amendment_date = $this->input->post('po_amendment_date');
		//$uploadedDoc = $this->input->post('uploadedDoc');
		
		$data = array(
			"po_number" => $po_number,
			"customer_id" => $customer_id
		);
		$ret_arr =[];
		$msg = '';
		$sucess = 1;
		
		$check = $this->Crud->read_data_where("customer_po_tracking", $data);
		if ($check != 0) {
			$msg = 'Record already exists for this customer. Enter different PO Number';
			$sucess = 0;
			// $this->addErrorMessage('Record already exists for this customer. Enter different PO Number');
			// $this->redirectMessage();
			//echo "<script>alert('Error 403 : PO Number  Already Exists , Enter Different PO Number ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			if (!empty($_FILES['uploadedDoc']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['uploadedDoc']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('uploadedDoc')) {
					$uploadData = $this->upload->data();
					$uploadedDocument = $uploadData['file_name'];
					// echo "uploadedDocument: ".$uploadedDocument;
				} else {
					$uploadedDocument = '';
				}
			} else {
				$uploadedDocument = '';
			}
			
			$data = array(
				"po_start_date" => $po_start_date,
				"po_end_date" => $po_end_date,
				"po_number" => $po_number,
				"po_amedment_number" => $po_amedment_number,
				"po_amendment_date" => $po_amendment_date,
				"customer_id" => $customer_id,
				"created_by" => $this->user_id,
				"created_date" => $this->current_date,
				"created_time" => $this->current_time,
				"created_by" => $this->current_date,
				"created_day" => $this->date,
				"created_month" => $this->month,
				"created_year" => $this->year,
				"uploadedDoc" => $uploadedDocument
			);

			$result = $this->Crud->insert_data("customer_po_tracking", $data);
			if ($result) {
				// $this->addSuccessMessage('PO Successfully Added');
				// $this->redirectMessage('view_customer_tracking_id/'.$result);
				$msg = 'PO Successfully Added';
				$sucess = 1;
				$ret_arr['url'] = 'view_customer_tracking_id/'.$result;
				//echo "<script>alert('Successfully Added');document.location='" . base_url('view_customer_tracking_id/') . $result . "'</script>";
			} else {
				// $this->addErrorMessage('Failed to add PO');
				// $this->redirectMessage();
				$msg = 'Failed to add PO';
				$sucess = 0;
			}
		}
		$ret_arr['msg'] = $msg;
		$ret_arr['sucess'] = $sucess;
		echo json_encode($ret_arr);
	}
	
	public function customer_po_tracking_all() {

		checkGroupAccess("customer_po_tracking_all","list","Yes");
		$column[] = [
            "data" => "customer_name",
            "title" => "Customer",
            "width" => "14%",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "po_number",
            "title" => "PO Number",
            "width" => "16%",
            "className" => "dt-left",
        ];
        $column[] = [
            "data" => "po_start_date",
            "title" => "Start Date",
            "width" => "17%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "po_end_date",
            "title" => "End Date",
            "width" => "10%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "po_amedment_number",
            "title" => "Amendment No",
            "width" => "17%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "status",
            "title" => "Status",
            "width" => "17%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "view_details",
            "title" => "View Details",
            "width" => "7%",
            "className" => "dt-center",
        ];
        $column[] = [
            "data" => "po_doc",
            "title" => "PO Document",
            "width" => "7%",
            "className" => "dt-center status-row",
        ];
        $column[] = [
            "data" => "action",
            "title" => "Actions",
            "width" => "17%",
            "className" => "dt-center",
        ];
       		
		// $data['customer_po_tracking'] = $this->Crud->read_data("customer_po_tracking");
		// if ($data['customer_po_tracking']) {
		// 	foreach ($data['customer_po_tracking'] as $s) {
		// 		$data['customer_data'][$s->customer_id] = $this->Crud->get_data_by_id("customer", $s->customer_id, "id");
		// 	}
		// }

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
		$customer_data_raw = $this->CustomerPart->getPoTrakingView();
		$data['customer_data'] = array_column($customer_data_raw,'customer_name','customer_id');
		// pr($data,1);
		$this->loadView('customer/customer_po_tracking_all', $data);
	}

	public function customerPoTrackingAjax(){

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
		$data = $this->CustomerPart->getPoTrakingView($condition_arr,$post_data["search"]);
		foreach ($data as $key => $val) {
			$view_details = $po_doc = $action = '';
			$encode_data = base64_encode(json_encode($val));
			$view_details = '<a href="' . base_url('view_customer_tracking_id/' . $val['id']) . '" class="" title="PO Details"><i class="ti ti-eye"></i></a>';
			if ($val['uploadedDoc'] != '') {
				$po_doc = '<a download href="' . base_url('documents/' . $val['uploadedDoc']) . '" id="" class=" remove_hoverr"><i class="ti ti-download"></i></a>';
			}
		
			$po_doc .= '<a type="button" data-value = '.$encode_data.' class=" upload_doc" data-bs-toggle="modal"  data-bs-target="#upload_modal"><i class="ti ti-upload"></i></a>';
			$action = display_no_character("");
			if(checkGroupAccess("customer_po_tracking_all","update","No")){
				$action = '<a type="button" data-value = '.$encode_data.' class=" edit-part" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="ti ti-edit"></i> </a>
					   <a type="button" data-value = '.$encode_data.' class="close-po" data-bs-toggle="modal" data-bs-target="#close_modal" title="Close PO"><i class="ti ti-circle-x"></i></a>';
			}
		
			$data[$key]['view_details'] = $view_details;
			$data[$key]['po_doc'] = $po_doc;
			$data[$key]['action'] = $action;
			$data[$key]['po_start_date'] = defaultDateFormat($val['po_start_date']);
			$data[$key]['po_end_date'] = defaultDateFormat($val['po_end_date']);
		}
		
		$data["data"] = $data;
		
        $total_record = $this->CustomerPart->getPoTrakingViewCount([], $post_data["search"]);
        $data["recordsTotal"] = $total_record['total_record'];
        $data["recordsFiltered"] = $total_record['total_record'];
        echo json_encode($data);
        exit();

	}
	
	public function customer_po_tracking_all_closed() {
		$data['customer_data'] = $this->Crud->read_data("customer");
		// $role_management_data = $this->db->query('SELECT customer_part.part_number,customer_part.id, customer.customer_name
		// FROM customer_part
		// INNER JOIN customer ON customer_part.customer_id=customer.id;');
		// 		$data['customer_parts'] = $role_management_data->result();
		$data['customer_po_tracking'] = $this->Crud->read_data("customer_po_tracking");
		$data['customer_po_tracking'] = $this->Crud->get_data_by_id("customer_po_tracking", "closed", "status");
		if ($data['customer_po_tracking']) {
			foreach ($data['customer_po_tracking'] as $s) {
				$data['customer_data'][$s->customer_id] = $this->Crud->get_data_by_id("customer", $s->customer_id, "id");
			}
		}
		// $this->getPage('customer_po_tracking_all_closed', $data);
		$this->loadView('customer/customer_po_tracking_all_closed', $data);
	}
	
	public function view_customer_tracking_id()
	{
		$customer_tracking_po_id = $this->uri->segment('2');

		$data['customer_po_tracking'] = $this->Crud->get_data_by_id("customer_po_tracking", $customer_tracking_po_id, "id");
		$data['customer'] = $this->Crud->get_data_by_id("customer", $data['customer_po_tracking'][0]->customer_id , "id");
		$data['new_po'] = $this->Crud->get_data_by_id("customer_po_tracking", $customer_tracking_po_id, "id");
		
		$data['parts_customer_trackings'] = $this->Crud->get_data_by_id("parts_customer_trackings", $customer_tracking_po_id, "customer_po_tracking_id");
		$role_management_data = $this->db->query('SELECT part_number,id,part_description from `customer_part` WHERE customer_id = '. $data['customer_po_tracking'][0]->customer_id.' ORDER BY id DESC');
		$data['customer_part_data'] = $role_management_data->result();

		if ($data['parts_customer_trackings']) {
			$final_po_amount = 0;
			$i = 1;
			foreach ($data['parts_customer_trackings'] as $p) {
				$data_id = array(
					'id' => $p->part_id,
				);
				$data['child_part_data'][$p->part_id] = $this->Crud->get_data_by_id_multiple_condition("customer_part", $data_id);
				$child_part_rate_criteria = array(
					'customer_master_id' => $data['child_part_data'][$p->part_id][0]->id
				);
				$data['child_part_rate'][$data['child_part_data'][$p->part_id][0]->id] = $this->Crud->get_data_by_id_multiple_condition("customer_part_rate", $child_part_rate_criteria);
				//get the parts from sales parts whose sales invoice is locked only
				$role_management_data = $this->db->query('SELECT SUM(parts.qty) AS MAINSUM from `sales_parts`as parts , 
				new_sales as sales WHERE  parts.part_id = ' . $p->part_id . ' 
				AND parts.po_number = \''.$data['customer_po_tracking'][0]->po_number.'\' 
				AND parts.sales_id = sales.id AND sales.status =\'lock\'');
				$data['sales_qty_data'][$p->part_id] = $role_management_data->result();
				
			}
		}
		// pr($data,1);
		// $this->getPage('view_customer_tracking_id', $data);
		$this->loadView('customer/view_customer_tracking_id', $data);
	}
	
	
	public function add_parts_customer_trackings()
	{
		$part_id = $this->input->post('part_id');
		$qty = $this->input->post('qty');
		$customer_po_tracking_id = $this->input->post('customer_po_tracking_id');
		$data = array(
			"part_id" => $part_id,
			"customer_po_tracking_id" => $customer_po_tracking_id,
		);
		$check = $this->Crud->read_data_where("parts_customer_trackings", $data);
		$ret_arr = [];
		$msg = '';
		$sucess = 1;
		if ($check != 0) {
			// echo "<script>alert('Part Number Already Exists , Please Select Different Part Number ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			$msg = 'Part Number Already Exists , Please Select Different Part Number.';
			$sucess = 0;
		} else {
			$data = array(
				"qty" => $qty,
				"customer_po_tracking_id" => $customer_po_tracking_id,
				"part_id" => $part_id,
				"created_by" => $this->user_id,
				"created_date" => $this->current_date,
				"created_time" => $this->current_time,
				"created_day" => $this->date,
				"created_month" => $this->month,
				"created_year" => $this->year,
			);
			
			$result = $this->Crud->insert_data("parts_customer_trackings", $data);
			if ($result) {
				// echo "<script>alert('Successfully Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				$msg = 'Successfully Added';
				
			} else {
				// echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				$msg = 'Unable to Add';
				$sucess = 0;
			}
		}
		$ret_arr['msg'] = $msg;
		$ret_arr['sucess'] = $sucess;
		echo json_encode($ret_arr);
	}

	private function getPage($viewPage,$viewData){
		$this->getHeaderPage();
		$this->load->view($this->getPath().$viewPage,$viewData);
		$this->load->view('footer.php');
	}
		
}