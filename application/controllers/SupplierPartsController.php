<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('CommonController.php');

class SupplierPartsController extends CommonController
{

	const PATH = "";

	function __construct()
	{
		parent::__construct();
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


	public function addchildpart()
	{
		$part_number = $this->input->post('part_number');
		$part_desc = $this->input->post('part_desc');
		$part_rate = $this->input->post('part_rate');
		$safty_buffer_stk = $this->input->post('safty_buffer_stk');
		$revision_date = $this->input->post('revision_date');
		$revision_no = $this->input->post('revision_no');
		$supplier_id = $this->input->post('supplier_id');
		$uom_id = $this->input->post('uom_id');
		$child_part_id = $this->input->post('child_part_id');
		$hsn_code = $this->input->post('hsn_code');
		$store_rack_location = $this->input->post('store_rack_location');
		$store_stock_rate = $this->input->post('store_stock_rate');
		$revision_remark = $this->input->post('revision_remark');
		$gst_id = $this->input->post('gst_id');
		$sub_type = $this->input->post('sub_type');
		$asset = $this->input->post('asset');
		$max_uom = $this->input->post('max_uom');
		$min_uom = $this->input->post('min_uom');

		$weight = $this->input->post('weight');
		$grade = $this->input->post('grade');
		$size = $this->input->post('size');
		$thickness = $this->input->post('thickness');
		
		if ($sub_type == "RM" && empty($weight)) {
			echo "please add weight for RM parts";
		} else {
			$data = array(
				"part_number" => $part_number,
				"supplier_id" => $supplier_id,
			);
			$check = $this->SupplierParts->isRecordExists($data);
			if ($check != 0) {
				$this->addErrorMessage('Record already exists');
			} else {
				if (!empty($_FILES['part_drawing']['name'])) {
					$image_path = "./documents/";
					$config['allowed_types'] = '*';
					$config['upload_path'] = $image_path;
					$config['file_name'] = $_FILES['part_drawing']['name'];

					//Load upload library and initialize configuration
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('part_drawing')) {
						$uploadData = $this->upload->data();
						$picture4 = $uploadData['file_name'];
					} else {
						$picture4 = '';
						echo "no 1";
					}
				} else {
					$picture4 = '';
					echo "no 2";
				}

				if (!empty($_FILES['modal']['name'])) {
					$image_path = "./documents/";
					$config['allowed_types'] = '*';
					$config['upload_path'] = $image_path;
					$config['file_name'] = $_FILES['modal']['name'];

					//Load upload library and initialize configuration
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('modal')) {
						$uploadData = $this->upload->data();
						$picture5 = $uploadData['file_name'];
					} else {
						$picture5 = '';
						echo "no 1";
					}
				} else {
					$picture5 = '';
					echo "no 2";
				}

				if (!empty($_FILES['cad_file']['name'])) {
					$image_path = "./documents/";
					$config['allowed_types'] = '*';
					$config['upload_path'] = $image_path;
					$config['file_name'] = $_FILES['cad_file']['name'];

					//Load upload library and initialize configuration
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('cad_file')) {
						$uploadData = $this->upload->data();
						$picture6 = $uploadData['file_name'];
					} else {
						$picture6 = '';
						echo "no 1";
					}
				} else {
					$picture6 = '';
					echo "no 2";
				}

				$data = array(
					"part_number" => $part_number,
					"part_description" => $part_desc,
					"supplier_id" => $supplier_id,
					"part_rate" => $part_rate,
					"uom_id" => $uom_id,
					"revision_no" => $revision_no,
					"child_part_id" => $child_part_id,
					"hsn_code" => $hsn_code,
					"store_rack_location" => $store_rack_location,
					"store_stock_rate" => $store_stock_rate,
					"safty_buffer_stk" => $safty_buffer_stk,
					"revision_remark" => $revision_remark,
					"part_drawing" => $picture4,
					"grade" => $grade,
					"modal_document" => $picture5,
					"cad_file" => $picture6,
					"gst_id" => $gst_id,
					"weight" => $weight,
					"size" => $size,
					"thickness" => $thickness,
					"revision_date" => $revision_date,
					"sub_type" => $sub_type,
					"max_uom" => $max_uom,
					"min_uom" => $min_uom,
					"created_id" => $this->user_id,
					"date" => $this->current_date,
					"time" => $this->current_time,
				);
				$result = $this->SupplierParts->createSupplierPart($data);
				if ($result) {
					$this->addSuccessMessage('Record updated successfully');
				} else {
					$this->addErrorMessage('Unable to add record. Please try again.');
				}
			}
		}

		$this->redirectMessage();
	}


	public function child_part_view()
	{
		$this->_child_part_view('');
	}

	public function view_child_part_view_by_filter()
	{
		$this->_child_part_view($this->input->post('child_part_id'));
	}

	public function _child_part_view($filter_child_part_id)
	{
		
		if (isset($filter_child_part_id)) {
			$data['filter_child_part_id'] = $filter_child_part_id;
		} else {
			$data['filter_child_part_id'] = '';
		}

			if ($filter_child_part_id !='ALL' && $filter_child_part_id != '') {
				$data['child_part_master'] = $this->SupplierParts->getSupplierPartById($filter_child_part_id);
			} else if ($filter_child_part_id == 'ALL' || $filter_child_part_id == '') {
				$data['child_part_master'] = $this->SupplierParts->readSupplierParts();
			} 
		

		$data['supplier_part_list'] = $this->SupplierParts->readSupplierPartsOnly();

		$data['uom'] = $this->Crud->read_data("uom");
		$data['cparttypelist'] = $this->Crud->read_data("part_type");
		$data['supplier_list'] = $this->Crud->read_data("supplier");
		$data['gst_structure'] = $this->Crud->read_data("gst_structure");
		
		$this->getPage('purchase/child_part_view', $data);
	}

	public function update_child_part_view()
	{

		$id = $this->input->post('id');
		$data['child_part_id'] = $this->input->post('filter_child_part_id');
		$data['filter_child_part_id'] = $this->input->post('filter_child_part_id');

		$part_number = $this->input->post('part_number');
		$part_description = $this->input->post('part_description');
		// $part_specification = $this->input->post('part_specification');
		// $part_family = $this->input->post('part_family');
		$hsn_code = $this->input->post('hsn_code');
		$sub_type = $this->input->post('sub_type');
		$store_rack_location = $this->input->post('store_rack_location');
		$safty_buffer_stk = $this->input->post('safty_buffer_stk');
		$add_to_child_part = $this->input->post('add_to_child_part');

		// $uom_id = $this->input->post('uom_name');
		$max_uom = $this->input->post('max_uom');
		$store_stock_rate = $this->input->post('store_stock_rate');

		$weight = $this->input->post('weight');
		$size = $this->input->post('size');
		$thickness = $this->input->post('thickness');
		$table_id = $this->input->post('table_id');
		$grade = $this->input->post('grade');
		$safty_buffer_stk = $this->input->post('saft__stk');

			$data = array(
				"part_description" => $part_description,
				"safty_buffer_stk" => $safty_buffer_stk,
				"hsn_code" => $hsn_code,
				"store_rack_location" => $store_rack_location,
				"store_stock_rate" => $store_stock_rate,
				"revision_remark" => "1st",
				"weight" => $weight,
				"size" => $size,
				"thickness" => $thickness,
				"grade" => $grade,
				"sub_type" => $sub_type,
				"max_uom" => $max_uom,
				"min_uom" => $child_part_data[0]->min_uom,
			);
			$result = $this->SupplierParts->updatePartById($data , $id);
			if ($result) {
				$stockData = array(
					"safty_buffer_stk" => $safty_buffer_stk,
				);
				$resultStock = $this->SupplierParts->updateStockById($stockData, $id);
				if ($resultStock) {
					$this->addSuccessMessage('Record updated successfully');
				} else {
					$this->addErrorMessage('Unable to update safty buffer stock record. Please try again.');
				}
			} else {
				$this->addErrorMessage('Unable to update record. Please try again.');
			}
			$this->redirectMessage();
	}


	/**
	 * Update supplier stock page
	 */
	public function child_parts($part_id_selected = null)
	{
		$data['part_select_list'] = $this->SupplierParts->readSupplierPartsOnly();
		if(empty($part_id_selected)){
			$part_id_selected = $this->input->post("part_id_selected");
		}
		
		if (!empty($part_id_selected)) {
			$data['child_part'] = $this->SupplierParts->getSupplierPartById($part_id_selected);
		} else {
			$data['child_part'] = "";
		}
		$data['enableStockUpdate'] = $this->isEnableStockUpdate();
		$this->loadView('admin/child_parts', $data);
	}

	/**
	 * Update supplier stock
	 */
	public function update_child_stock()
	{
		$id = $this->input->post('id');
		$stock = $this->input->post('stock');
		$check = 0;
		
			$stockField = $this->Crud->getStockDBColumnName("stock");
			$data = array(
				$stockField => $stock
			);
			
			$result = $this->SupplierParts->updateStockById($data, $id);
			if ($result) {
				$this->addSuccessMessage('Record updated successfully');
			} else {
				$this->addErrorMessage('Unable to update record. Please try again.');
			}
		$this->child_parts($id);
	}


	/**
	 * Material request
	 */
	public function stock_down()
	{
		$data['child_part'] = $this->SupplierParts->readSupplierParts();
		$data['supplier'] = $this->Crud->read_data("supplier");
		$data['rejection_flow'] = $this->Crud->read_data("rejection_flow");
		$clientId = $this->Unit->getSessionClientId();
		$data['stock_changes'] = $this->Crud->customQuery("SELECT sc.*,cp.part_number as part_number,cp.part_description as part_description,u.uom_name as uom_name
			FROM `stock_changes` sc
			LEFT JOIN child_part  cp ON cp.id = sc.part_id
			LEFT JOIN uom  u ON u.id = cp.uom_id
			WHERE sc.clientId = '".$clientId."'
			ORDER BY sc.id DESC"
		);
		$data['client_list'] = $this->Crud->read_data_acc("client");
		$data['clintUnitId'] = $this->Unit->getSessionClientId();
		$this->loadView('store/stock_down', $data);
	}

	/**
	 * Stock UP/Return
	 */
	public function stock_up()
	{

		$data['child_part'] = $this->SupplierParts->readSupplierParts();
		$unit_id = $this->Unit->getSessionClientId();
		$data['stock_changes'] = $this->Crud->customQuery("
			SELECT s.*,cp.part_number as part_number,cp.part_description as part_description,stock.stock as stock,u.uom_name as uom_name
			FROM stock_changes s
			LEFT JOIN child_part cp ON cp.id = s.part_id
			LEFT JOIN child_part_stock stock ON cp.id = stock.childPartId AND stock.clientId = " . $unit_id. "
			LEFT JOIN uom u ON u.id = cp.uom_id
			WHERE s.clientId = ".$unit_id." AND s.type='addition' ");
		$data['supplier'] = $this->Crud->read_data("supplier");
		$data['rejection_flow'] = $this->Crud->read_data("rejection_flow");
		$this->loadView('store/stock_up', $data);
	}


	public function add_stock()
	{
		$stock_changes_id  = $this->uri->segment('2');
		$stock_changes_data = $this->Crud->get_data_by_id("stock_changes", $stock_changes_id, "id");
		$child_part_data = $this->SupplierParts->getSupplierPartById($stock_changes_data[0]->part_id);
		if ($child_part_data) {
			$qty = $stock_changes_data[0]->qty;
			$current_stock = $child_part_data[0]->stock;

			if (false && $qty > $current_stock) {
				echo "Entered Qty is greater than actual stock please try again";
			} else {
				if ($stock_changes_data[0]->type == "addition") {
					$new_stock = $current_stock + $qty;
				} else {
					$new_stock = $current_stock - $qty;
				}

				$data_update_child_part = array(
					"stock" => $new_stock,
				);
				$result2 = $this->SupplierParts->updateStockById($data_update_child_part, $stock_changes_data[0]->part_id);
				if ($result2) {
					$data_update_rejection_flow = array(
						"status" => "stock_transfered"
					);
					$result3 = $this->Crud->update_data("stock_changes", $data_update_rejection_flow, $stock_changes_id);
					if ($result3) {
						echo "<script>alert('Stock Transfered successfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
					}
				}
			}
		} else {
			echo "Item Part Id : " . $stock_changes_data[0]->part_id . " not found. Please try again ";
		}
	}

}
