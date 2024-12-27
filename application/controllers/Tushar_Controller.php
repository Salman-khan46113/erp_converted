<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

#require_once('libraries/PHPExcel/IOFactory.php');
require_once('CommonController.php');
require_once(APPPATH.'libraries/PHPExcel/IOFactory.php');
//require 'PHPExcel/PHPExcel.php';
//require_once(APP. ‘Vendor’.DS.‘PHPExcel’.DS.‘IOFactory.php’);

class Tushar_Controller extends CommonController
{
   
    const TUSHAR_TRACKING_PATH = "tushar/";
	
	function __construct() {
		parent::__construct();
        $this->load->model('Tracking');
	}
	
	private function getPath(){
		return self::TUSHAR_TRACKING_PATH;
	}


    public function customer_po_tracking_importExport() {
        $data['customer_data'] = $this->Crud->read_data("customer");
        $customer_id = $this->input->post('customer_id');
        // $role_management_data = $this->db->query('SELECT customer_part.part_number,customer_part.id, customer.customer_name
		// FROM customer_part
		// INNER JOIN customer ON customer_part.customer_id=customer.id;');
		// 		$data['customer_parts'] = $role_management_data->result();
		
        
        //Manoj - working latest query
       /* $sql = "SELECT po.po_number, masterParts.part_number, masterParts.part_description, 
        custPart.imported_price AS imported_price, custPart.qty, custPart.status, custPart.due_date,
        masterParts.id AS masterParts_id, masterParts.customer_id, rate_query.rate 
        FROM customer_po_tracking AS po
            JOIN parts_customer_trackings AS custPart ON custPart.customer_po_tracking_id = po.id
            JOIN customer_part AS masterParts ON custPart.part_id = masterParts.id
            LEFT JOIN (
                SELECT ROW_NUMBER() OVER (PARTITION BY customer_master_id ORDER BY id DESC) AS rownum, id, customer_master_id, rate
                FROM customer_part_rate
            ) AS rate_query ON rate_query.customer_master_id = masterParts.id 
            WHERE rate_query.rownum = 1 ";
        */

        
        $sql =  "SELECT po.po_number, masterParts.part_number, masterParts.part_description, 
                custPart.imported_price AS imported_price, custPart.qty, custPart.status, custPart.due_date,
                custPart.warehouse,custPart.remark, masterParts.thickness, masterParts.passivationType,masterParts.rm_grade,
                masterParts.id AS masterParts_id, masterParts.customer_id, rate_query.rate 
                FROM customer_po_tracking AS po
                JOIN parts_customer_trackings AS custPart ON custPart.customer_po_tracking_id = po.id
                JOIN customer_part AS masterParts ON custPart.part_id = masterParts.id
                LEFT JOIN (
                    SELECT cpr.id, cpr.customer_master_id, cpr.rate
                    FROM customer_part_rate AS cpr
                    LEFT JOIN customer_part_rate AS cpr2
                        ON cpr.customer_master_id = cpr2.customer_master_id
                        AND cpr.id < cpr2.id
                    WHERE cpr2.id IS NULL
                ) AS rate_query ON rate_query.customer_master_id = masterParts.id"; 



        //$ old_working_sql = "SELECT R.rate as rate, I.* FROM view_po_import_export I, customer_part_rate R WHERE I.rate_id = R.id ";

        /*$sql = "select po.po_number, masterParts.part_number, masterParts.part_description, 
            custPart.imported_price as po_price, partRate.rate as rate, masterParts.thickness, masterParts.passivationType,masterParts.rm_grade, 
            custPart.qty, masterParts.uom, custPart.status, 
            custPart.due_date,custPart.warehouse,custPart.remark
            from customer_po_tracking as po, parts_customer_trackings as custPart,customer_part as masterParts, customer_part_rate as partRate
            where custPart.customer_po_tracking_id = po.id AND custPart.part_id = masterParts.id 
            AND masterParts.id = partRate.customer_master_id"; */

        if($customer_id!=null){
            if($customer_id != "ALL"){
                    //$old_working_sql = $old_working_sql." AND I.customer_id = ".$customer_id." group by I.masterParts_id";
                    //$query = $this->db->query($old_working_sql);
                    $sql = $sql." WHERE masterParts.customer_id = ".$customer_id." ORDER BY custPart.id DESC";
                    $data['export_data'] = $this->Crud->customQuery($sql);
            }else if($customer_id == "ALL"){
                    //$old_working_sql = $old_working_sql." group by I.masterParts_id";
                    //$query = $this->db->query($old_working_sql);
                    $sql = $sql." ORDER BY custPart.id DESC";
                    $data['export_data'] = $this->Crud->customQuery($sql);
            }
        }
        /*if($query!=null){
            $data['export_data'] = $query->result();
        }*/

        /* 
        Older query
        $query = $this->db->query("select po.po_number, masterParts.part_number, masterParts.part_description, custPart.imported_price as po_price, partRate.rate as rate, custPart.qty, custPart.status, custPart.due_date,custPart.warehouse,custPart.remark
		from customer_po_tracking as po, parts_customer_trackings as custPart,customer_part as masterParts, customer_part_rate as partRate
		where custPart.customer_po_tracking_id = po.id AND custPart.part_id = masterParts.id AND masterParts.id = partRate.customer_master_id order by custPart.id desc limit 50");
		*/

		//$data['export_data'] = $query->result();
		
		/*select po.po_number, masterParts.part_number, masterParts.part_description, partRate.rate, custPart.qty, custPart.status 
		from customer_po_tracking as po, parts_customer_trackings as custPart,customer_part as masterParts, customer_part_rate as partRate
		where 
		po.created_date = "14-06-2023"					-- get today's PO
		AND custPart.customer_po_tracking_id = po.id	-- get PO specific part details like qty and status
		AND custPart.part_id = masterParts.id			-- get part specific details like number and description
		AND masterParts.id = partRate.customer_master_id -- get rate details for specific customer part
		506, 507
		*/
		
        $data['customer_id']=$customer_id;
		$this->getPage('po_tracking_import_export', $data);
	}

    /**
     *  Import format per Tushar ERP
     */
	public function import_customer_po_tracking(){
	   $customer_id = $this->input->post('customer_id');
       $uploadedDoc = $this->input->post('uploadedDoc');

       //only valid types are allowed.
       if($this->isValidUploadFileType()=="false"){
            $this->addErrorMessage("Only Excel sheets are allowed.");
       } else {
      	if (!empty($_FILES["uploadedDoc"]["name"])) {
        		$error;
				$inputFileName = $_FILES["uploadedDoc"]["tmp_name"];
					try {
						$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
						$objReader = PHPExcel_IOFactory::createReader($inputFileType);
						$objPHPExcel = $objReader->load($inputFileName);
						$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
						$flag = true;
						$i=1;

                        $EXCEL_IMPORT_STATUS_COLUMN = 'A';
                        $EXCEL_IMPORT_PO_COLUMN = 'B';
                        $EXCEL_IMPORT_ITEM_COLUMN = 'C';
                        $EXCEL_IMPORT_ITEM_DESC_COLUMN = 'D';
                        $EXCEL_IMPORT_WAREHOUSE_COLUMN = 'E';
                        $EXCEL_IMPORT_DELIVERY_DATE_COLUMN = 'F';
                        $EXCEL_IMPORT_QUANTITY_COLUMN = 'G';
                        $EXCEL_IMPORT_UNIT_PRICE_COLUMN = 'H';
                        $EXCEL_IMPORT_REMARK_COLUMN = 'I';

						foreach ($allDataInSheet as $value) {
                            // Check if the row is empty
                                if (!empty(array_filter($value))) {
                                if($flag) {
                                    $flag =false;
                                    continue;
                                }

                                $rowNum = $i+1;
                                $errorThisRow=null; 
                                $errorCount;

                                $part_status = empty($value[$EXCEL_IMPORT_STATUS_COLUMN]) ? $errorThisRow =$errorThisRow." Status": trim($value[$EXCEL_IMPORT_STATUS_COLUMN]);
                                $po_number = empty($value[$EXCEL_IMPORT_PO_COLUMN]) ? $errorThisRow =$errorThisRow." PO ,": trim($value[$EXCEL_IMPORT_PO_COLUMN]);
                                $part_name = empty($value[$EXCEL_IMPORT_ITEM_COLUMN]) ? $errorThisRow = $errorThisRow." Item ," : trim($value[$EXCEL_IMPORT_ITEM_COLUMN]);
                                $part_description = empty($value[$EXCEL_IMPORT_ITEM_DESC_COLUMN]) ? $errorThisRow = $errorThisRow." Item description ,": trim($value[$EXCEL_IMPORT_ITEM_DESC_COLUMN]);
                                $part_Warehouse = empty($value[$EXCEL_IMPORT_WAREHOUSE_COLUMN]) ? $errorThisRow =$errorThisRow." Warehouse, ": trim($value[$EXCEL_IMPORT_WAREHOUSE_COLUMN]);
                                $part_quantity = empty($value[$EXCEL_IMPORT_QUANTITY_COLUMN]) ? $errorThisRow =$errorThisRow." Quantity ,": trim($value[$EXCEL_IMPORT_QUANTITY_COLUMN]);
                                $part_price = empty($value[$EXCEL_IMPORT_UNIT_PRICE_COLUMN]) ? $errorThisRow =$errorThisRow." Unit Price ," : trim($value[$EXCEL_IMPORT_UNIT_PRICE_COLUMN]);
                                
                                $part_due_date = empty($value[$EXCEL_IMPORT_DELIVERY_DATE_COLUMN]) ? $errorThisRow =$errorThisRow." Delivery date ,": trim($value[$EXCEL_IMPORT_DELIVERY_DATE_COLUMN]);
                                $due_date=date_create($part_due_date);
                                $part_due_date = date_format($due_date,"d-m-Y");
                                
                                $part_remark = trim($value[$EXCEL_IMPORT_REMARK_COLUMN]);

                                if(!empty($errorThisRow)){
									$error = $error."<br>Row Number ".$rowNum." - Required Fields : ".$errorThisRow;
								}
                                
                                $inserdata[$i]['part_name'] = $part_name;
                                $inserdata[$i]['part_description'] = $part_description;
                                $inserdata[$i]['po_number'] = $po_number;
                                $inserdata[$i]['part_price'] = $part_price;
                                $inserdata[$i]['part_quantity'] = $part_quantity;
                                $inserdata[$i]['part_due_date'] = $part_due_date;
                                $inserdata[$i]['part_warehouse'] = $part_Warehouse;
                                $inserdata[$i]['part_status'] = $part_status;
                                $inserdata[$i]['part_remark'] = $part_remark;

                                $i++;
                            }
						}

				        if(empty($error)){
                            //there are no errors so lets move ahead with executing the file.
                            foreach($inserdata as $po_item) {
                                            // use the po number and see whether it exists if yes use it 
                                            $data = array(
                                                "po_number" => $po_item['po_number'],
                                                "customer_id" => $customer_id
                                            );

                                            //$this->UomModel->getAllUOM();
                                            $check_poNo = $this->Tracking->getPOTracking($data);
                                            if(!empty($check_poNo)) {
                                                 //echo "<br><br>PO data is present for PO :".$po_item['po_number']." so use it.";
                                                 $partMessage = $this->Tracking->addUpdate_customerParts($po_item,$customer_id,$check_poNo[0]->id,false);
                                            } else {
                                                //echo "<br>Lets insert record into PO tracking first for ".$po_item['po_number'];
                                                $po_tracking = $this->Tracking->createPO_tracking($po_item,$customer_id);    
                                                 if($po_tracking!=0){
                                                    $partMessage = $this->Tracking->addUpdate_customerParts($po_item,$customer_id,$po_tracking,true);
                                                } 
                                            }
                                            if(!empty($partMessage)){
                                                //$error = $error."<br>Error added for PO: ".$po_item['po_number']." with Item description: ".$po_item['part_description'].".";
                                                $error = $error.$partMessage;
                                            }
                            }
                            if($error){
                                $this->addErrorMessage($error);
                            }else{
                                $this->addSuccessMessage("Data imported successfully.");
                            }

                        } else {
                            //echo "<br><br>All Errors : ".$error;
                            //echo "<br>ERROR !";
                            $this->addErrorMessage($error);
                        }   

					} catch (Exception $e) {
					    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
					. '": ' .$e->getMessage());
					}
				
				}
                //for view pages
                $data['customer_data'] = $this->Crud->read_data("customer");              
            }
            
            $this->getPage('po_tracking_import_export',$data);
		}


function po_export_customer_part() {
        $this->load->library("excel");
        $customer_id = $this->input->post('customer_id');
       
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $table_columns = array("Status", "PO", "Item", "Item description", "Warehouse", "Delivery date","Quantity","Unit Price", "Remark");

        $column = 0;
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
		
		$customer = $this->Crud->get_data_by_id("customer", $customer_id, "id");

        $customerParts = $this->db->query('SELECT * FROM `customer_part` WHERE customer_id = ' . $customer_id . '  ');
        $customer_parts = $customerParts->result();

        if ($customer_parts) {
            $excel_row = 2;
            $rowNo = 1;
            foreach ($customer_parts as $p) {
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $p->part_number);
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $p->part_description);
                $excel_row++;
                $rowNo++;
            }
            for ($i = 'A'; $i !=  $object->getActiveSheet()->getHighestColumn(); $i++) {
                $object->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
            }

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$customer[0]->customer_name."_Parts.xls");
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            ob_end_clean();
            ob_start();
            $objWriter->save('php://output');
        } else {
            echo "<script>alert('No Customer Parts Found');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        }
    }
	
    private function getPage($viewPage,$viewData){
        $this->loadView($this->getPath().$viewPage,$viewData);
	}
}
