<?php
class InhouseParts extends CI_Model {
    	
    public function __construct() {
    }
	
    /**
     * Check whether record exists
     */

    public function isRecordExists($data){
        $rows = $this->Crud->read_data_where("inhouse_parts",$data);
        if($rows!=0){
             return true;
        }
         return false;
    }

    /**
     * Check whether stock entry is there for inhouse part
     */
    public function isStockRecordExists($data){
        $rows = $this->Crud->read_data_where("inhouse_parts_stock",$data);
        if($rows!=0){
             return true;
        }
         return false;
    }

    /**
     * This would be more towards Select widget to  get minimal fields
     */
    public function getUniquePartNumber(){
       return $this->Crud->customQuery('SELECT DISTINCT part_number, id FROM `inhouse_parts` ');
    }

    /**
     * Just need some basic inhouse parts information for display
     */
    public function readInhousePartsOnly() {
        $part_details = $this->Crud->customQuery("SELECT parts.*
            FROM  inhouse_parts parts
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Read all the parts with stock
     */
    public function readInhouseParts() {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  inhouse_parts parts
            LEFT JOIN inhouse_parts_stock stock
            ON parts.id = stock.inhouse_parts_id 
            AND stock.clientId = ".$this->Unit->getSessionClientId()." 
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Read specific part details without stock
     */
    public function getInhousePartOnlyById($id) {
        $part_details = $this->Crud->customQuery("SELECT parts.*
            FROM  inhouse_parts parts
            WHERE parts.id = ".$id."
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Read specific part details including stock
     */
    public function getInhousePartById($id) {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  inhouse_parts parts
            LEFT JOIN inhouse_parts_stock stock
            ON parts.id = stock.inhouse_parts_id
            AND stock.clientId = " . $this->Unit->getSessionClientId() . " 
            WHERE parts.id = ".$id."
            ORDER BY parts.id desc");
        return $part_details;
    }


     /**
     * Read specific part details including stock
     */
    public function getInhousePartByPartNumber($partNumber) {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  inhouse_parts parts
            LEFT JOIN inhouse_parts_stock stock
            ON parts.id = stock.inhouse_parts_id
            AND stock.clientId = " . $this->Unit->getSessionClientId() . " 
            WHERE parts.part_number = '".$partNumber."'
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Update part basic infromation
     */
    public function updatePartById($update_data, $id) {
       return $this->Crud->update_data("inhouse_parts", $update_data, $id);
    }

    /**
     * Update part basic information per criteria
     */
    public function updatePartByCriteria($update_data, $criteria, $id ) {
        return $this->Crud->update_data_column("inhouse_parts", $update_data, $id, $criteria);
    }

    /**
     * Update stock information for a part
     */
    public function updateStockById($update_data, $id) {
        $data = array(
            "inhouse_parts_id" => $id
        );
        if($this->isStockRecordExists($data)){
            return $this->Crud->update_data_column("inhouse_parts_stock", $update_data, $id, "inhouse_parts_id ");
        }else{
            $stockResult = $this->createStockRecord($id,$update_data); //First insert record and then update
            if($stockResult){
                return $this->Crud->update_data_column("inhouse_parts_stock", $update_data, $id, "inhouse_parts_id ");
            }
        }       
    }


    /**
     * Get part information with stock based on part number
     */
    public function getInhousePartByPartNo($part_number) {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* FROM  inhouse_parts parts
            INNER JOIN inhouse_parts_stock stock
            ON parts.id = stock.inhouse_parts_id
            AND stock.clientId = " . $this->Unit->getSessionClientId() . "
            AND parts.part_number = ".$part_number."
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Create Inhouse part entry including stock
     */
   public function createInhousePart($data) {
    $data = array(
				"part_number" => $data["part_number"],
				"part_description" => $data["part_description"],
				"supplier_id" => $data["supplier_id"],
				"part_rate" => $data["part_rate"],
				"uom_id" => $data["uom_id"],
				"safty_buffer_stk" => $data["safty_buffer_stk"],
				"revision_no" => $data["revision_no"],
				"child_part_id" => $data["child_part_id"],
				"hsn_code" => $data["hsn_code"],
				"store_rack_location" => $data["store_rack_location"],
				"store_stock_rate" => $data["store_stock_rate"],
				"revision_remark" => $data["revision_remark"],
				"part_drawing" => $data["part_drawing"],
				"modal_document" => $data["modal_document"],
				"cad_file" => $data["cad_file"],
				"gst_id" => $data["gst_id"],
				"weight" => $data["weight"],
				"size" => $data["size"],
				"thickness" => $data["thickness"],
				"revision_date" => $data["revision_date"],
				"sub_type" => $data["sub_type"],
				"max_uom" => $data["max_uom"],
				"min_uom" => $data["min_uom"],
                "created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$newRecordId = $this->Crud->insert_data("inhouse_parts", $data);
           
            if($newRecordId > 0) {
                return $this->createStockRecord($newRecordId, $data);
            }

            return 0;
    }


    /**
     * Insert new stock record
     */
    public function createStockRecord($inhousePartId, $data){
             $stockData = array(
                    "inhouse_parts_id" => $inhousePartId,
                    "clientId"  =>  $this->Unit->getSessionClientId(),
                    "stock"  => empty($data["stock"])? 0 : $data["stock"],
                    "safty_buffer_stk" => empty($data["safty_buffer_stk"])? 0 : $data["safty_buffer_stk"],
                    "onhold_stock" => empty($data["onhold_stock"])? 0 : $data["onhold_stock"],
                    "production_qty"  => empty($data["production_qty"])? 0 : $data["production_qty"],
                    "rejection_prodcution_qty" => empty($data["rejection_prodcution_qty"])? 0 : $data["rejection_prodcution_qty"],
                    "sub_con_stock"  => empty($data["sub_con_stock"])? 0 : $data["sub_con_stock"],
                    "rejection_stock"  => empty($data["rejection_stock"])? 0 : $data["rejection_stock"],
                    "sharing_qty"  => empty($data["sharing_qty"])? 0 : $data["sharing_qty"],
                    "machine_mold_issue_stock" => empty($data["machine_mold_issue_stock"])? 0 : $data["machine_mold_issue_stock"],
                    "production_scrap"  => empty($data["production_scrap"])? 0 : $data["production_scrap"],
                    "production_rejection" => empty($data["production_rejection"])? 0 : $data["production_rejection"],
                    "created_id" => $this->user_id,
                    "date" => $this->current_date,
				    "time" => $this->current_time
                );
            
            $result = $this->Crud->insert_data("inhouse_parts_stock", $stockData);
            
        return $result;
    }

}
?>