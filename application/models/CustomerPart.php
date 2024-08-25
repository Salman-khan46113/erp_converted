<?php
class CustomerPart extends CI_Model {
    	
    public function __construct() {
    }
	
    /**
     * Check whether record exists
     */

    public function isRecordExists($data){
        $rows = $this->Crud->read_data_where("customer_parts_master",$data);
        if($rows!=0){
             return true;
        }
         return false;
    }

    /**
     * Check whether stock entry is there for supplier part
     */
    public function isStockRecordExists($data){
        $rows = $this->Crud->read_data_where("customer_parts_master_stock",$data);
        if($rows!=0){
             return true;
        }
         return false;
    }

    /**
     * This would be more towards Select widget to  get minimal fields
     */
    public function getUniquePartNumber(){
       return $this->Crud->customQuery('SELECT DISTINCT id, part_number, part_description FROM `customer_parts_master` ');
    }

    /**
     * Just need some basic supplier parts information for display
     */
    public function readCustomerPartsOnly() {
        $part_details = $this->Crud->customQuery("SELECT parts.*
            FROM  customer_parts_master parts
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Read all the parts with stock
     */
    public function readCustomerParts() {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  customer_parts_master parts
            LEFT JOIN customer_parts_master_stock stock
            ON parts.id = stock.customer_parts_master_id 
            AND stock.clientId = ".$this->Unit->getSessionClientId()." 
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Read specific part details without stock
     */
    public function getCustomerPartOnlyById($id) {
        $part_details = $this->Crud->customQuery("SELECT parts.*
            FROM  customer_parts_master parts
            WHERE parts.id = ".$id."
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Read specific part details including stock
     */
    public function getCustomerPartById($id) {
       
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  customer_parts_master parts
            LEFT JOIN customer_parts_master_stock stock
            ON parts.id = stock.customer_parts_master_id
            AND stock.clientId = " . $this->Unit->getSessionClientId() . " 
            WHERE parts.id = ".$id."
            ORDER BY parts.id desc");
            // pr($this->db->last_query(),1);
        return $part_details;
    }


     /**
     * Read specific part details including stock
     */
    public function getCustomerPartByPartNumber($partNumber) {
        $part_details = $this->Crud->customQuery("SELECT parts.id as part_id, parts.*, stock.* 
            FROM  customer_parts_master parts
            LEFT JOIN customer_parts_master_stock stock
            ON parts.id = stock.customer_parts_master_id
            AND stock.clientId = " . $this->Unit->getSessionClientId() . " 
            WHERE parts.part_number = '".$partNumber."'
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Update part basic infromation
     */
    public function updatePartById($update_data, $id) {
       return $this->Crud->update_data("customer_parts_master", $update_data, $id);
    }

    /**
     * Update part basic information per criteria
     */
    public function updatePartByCriteria($update_data, $criteria, $id ) {
        return $this->Crud->update_data_column("customer_parts_master", $update_data, $id, $criteria);
    }

    /**
     * Update stock information for a part
     */
    public function updateStockById($update_data, $id) {
        $data = array(
            "customer_parts_master_id" => $id
        );
        if($this->isStockRecordExists($data)){
            return $this->Crud->update_data_column("customer_parts_master_stock", $update_data, $id, "customer_parts_master_id ");
        }else{
            $stockResult = $this->createStockRecord($id,$update_data); //First insert record and then update
            if($stockResult){
                return $this->Crud->update_data_column("customer_parts_master_stock", $update_data, $id, "customer_parts_master_id ");
            }
        } 
       
    }

    

    /**
     * Get part information with stock based on part number
     */
    public function getCustomerPartByPartNo($part_number) {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  customer_parts_master parts
                INNER JOIN customer_parts_master_stock stock
                ON parts.id = stock.customer_parts_master_id
                AND stock.clientId = " . $this->Unit->getSessionClientId() . "
                AND parts.part_number = '".$part_number."'
                ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Create Customer Part Master entry including stock
     */
   public function createCustomerPart($data) {
    $data = array(
				"part_number" => $data["part_number"],
				"part_description" => $data["part_description"],
			    "created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$newRecordId = $this->Crud->insert_data("customer_parts_master", $data);
           
            if($newRecordId > 0) {
                return $this->createStockRecord($newRecordId, $data);
            }

            return 0;
    }


    /**
     * Insert new stock record
     */
    public function createStockRecord($partId, $data){
             $stockData = array(
                    "customer_parts_master_id" => $partId,
                    "clientId"  =>  $this->Unit->getSessionClientId(),
                    "fg_stock"  => empty($data["fg_stock"])? 0 : $data["fg_stock"],
                    "fg_rate" =>  empty($data["fg_rate"])? 0 : $data["fg_rate"],
                    "molding_production_qty" => empty($data["molding_production_qty"])? 0 : $data["molding_production_qty"],
                    "production_rejection" => empty($data["production_rejection"])? 0 : $data["production_rejection"],
                    "production_scrap"  => empty($data["production_scrap"])? 0 : $data["production_scrap"],
                    "semi_finished_location" => empty($data["semi_finished_location"])? 0 : $data["semi_finished_location"],
                    "deflashing_assembly_location"  => empty($data["deflashing_assembly_location"])? 0 : $data["deflashing_assembly_location"],
                    "final_inspection_location"  => empty($data["final_inspection_location"])? 0 : $data["final_inspection_location"],
                    "created_id" => $this->user_id,
                    "date" => $this->current_date,
				    "time" => $this->current_time
                );
            
            $result = $this->Crud->insert_data("customer_parts_master_stock", $stockData);
            
        return $result;
    }

    // molding code

    public function getCustomerPartsMolding(){
        
        $this->db->select('*,sum(mp.qty) as tot');
        $this->db->from('mold_maintenance mm');
        $this->db->join('customer_part cp','mm.customer_part_id = cp.id','left');
        $this->db->join('customer c','cp.customer_id = c.id','left');
        $this->db->join(' molding_production mp','mp.mold_id = mm.id AND mp.customer_part_id = mm.customer_part_id','left');
        $this->db->group_by('mm.customer_part_id, mm.mold_name');
        $this->db->order_by('mm.id', 'DESC');
        $query = $this->db->get();
        $data = is_object($query) ? $query->result_array() : [];
        return $data;
    }

    // datable machine request 
    /* for datable */
    public function get_machine_request_view_data(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientUnit = $this->Unit->getSessionClientId();
       
        $this->db->select(
            'm_req.id as request_no,m_req.id as id, m.name as machine_name, o.name as operator_name, 
		CONCAT(part.part_number ,"<br>(",part.part_description,")") as customer_part,CONCAT(m_req.created_date," ",m_req.created_time) as created_date, m_req.created_time, m_req.status, req_parts.id as req_parts,
		m_req.customer_parts_master_id'
        );
        $this->db->from(" machine_request m_req");
        $this->db->join("operator as o", "m_req.operator_id = o.id",'left');
        $this->db->join("customer_part as part", "m_req.customer_part_id = part.id",'left');
        $this->db->join("machine as m", "m_req.machine_id = m.id ",'left');
        $this->db->join("machine_request_parts as req_parts", "m_req.id = req_parts.machine_request_id",'left');
        $this->db->where(" m_req.delivery_unit",$clientUnit);
        $this->db->group_by(" m_req.id");
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }

        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["date_range_filter"] != "") {
                $date = explode(" - ",$search_params["date_range_filter"]);
                $start_date = str_replace("/","-",$date[0]);
                $end_date = str_replace("/","-",$date[1]);
                $this->db->where('STR_TO_DATE(m_req.created_date,"%d-%m-%Y") BETWEEN STR_TO_DATE("' . $start_date . '","%d-%m-%Y") AND  STR_TO_DATE(    "' . $end_date . '","%d-%m-%Y")', null, false);
            }
            if ($search_params["value"] != "") {
                $search = $search_params["value"];
                $this->db->group_start(); // Start a group for 'like' queries
                $this->db->like('m_req.id', $search);
                $this->db->or_like(' m.name', $search);
                $this->db->or_like('o.name', $search);
                $this->db->or_like('part.part_number', $search);
                $this->db->or_like('part.part_description', $search);
                $this->db->or_like('m_req.created_date', $search);
                $this->db->or_like('m_req.created_time', $search);
                $this->db->or_like('m_req.status', $search);
                $this->db->group_end(); // End the group
            }
            
        }

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }
    public function get_machine_request_view_count(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientUnit = $this->Unit->getSessionClientId();
        $this->db->select(
            'count(m_req.id ) as total_record'
        );
        $this->db->from(" machine_request m_req");
        $this->db->join("operator as o", "m_req.operator_id = o.id",'left');
        $this->db->join("customer_part as part", "m_req.customer_part_id = part.id",'left');
        $this->db->join("machine as m", "m_req.machine_id = m.id ",'left');
        $this->db->join("machine_request_parts as req_parts", "m_req.id = req_parts.machine_request_id",'left');
        $this->db->where(" m_req.delivery_unit",$clientUnit);
        $this->db->group_by(" m_req.id");
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["date_range_filter"] != "") {
                $date = explode(" - ",$search_params["date_range_filter"]);
                $start_date = str_replace("/","-",$date[0]);
                $end_date = str_replace("/","-",$date[1]);
                $this->db->where('STR_TO_DATE(m_req.created_date,"%d-%m-%Y") BETWEEN STR_TO_DATE("' . $start_date . '","%d-%m-%Y") AND  STR_TO_DATE(    "' . $end_date . '","%d-%m-%Y")', null, false);
            }
            if ($search_params["value"] != "") {
                $search = $search_params["value"];
                $this->db->group_start(); // Start a group for 'like' queries
                $this->db->like('m_req.id', $search);
                $this->db->or_like(' m.name', $search);
                $this->db->or_like('o.name', $search);
                $this->db->or_like('part.part_number', $search);
                $this->db->or_like('part.part_description', $search);
                $this->db->or_like('m_req.created_date', $search);
                $this->db->or_like('m_req.created_time', $search);
                $this->db->or_like('m_req.status', $search);
                $this->db->group_end(); // End the group
            }
            
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }

    public function get_machine_request_completed_view_data(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientUnit = $this->Unit->getSessionClientId();
        $this->db->select('
            m_req.id AS id,
            m_req.id AS request_no, 
            m.name AS machine_name, 
            o.name AS operator_name, 
            CONCAT(part_master.part_number,"<br>(", part.part_description,")") AS customer_part, 
            CONCAT(child.part_number,"<br>(",child.part_description,")") AS child_part, 
            u.uom_name, 
            req_parts.qty, 
            req_parts.status, 
            req_parts.accepted_qty, 
            req_parts.remark, 
            m_req.created_date, 
            m_req.created_time, 
            m_req.status
        ');
        $this->db->from('machine_request m_req');
        $this->db->join('machine m', 'm_req.machine_id = m.id');
        $this->db->join('operator o', 'm_req.operator_id = o.id');
        $this->db->join('machine_request_parts req_parts', 'm_req.id = req_parts.machine_request_id');
        $this->db->join('child_part child', 'req_parts.child_part_id = child.id');
        $this->db->join('uom u', 'child.uom_id = u.id');
        $this->db->join('customer_parts_master part_master', 'm_req.customer_parts_master_id = part_master.id', 'left');
        $this->db->join('customer_part part', 'm_req.customer_part_id = part.id', 'left');
        $this->db->where('m_req.delivery_unit', $clientUnit);
      
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }

        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["status_search"] != "") {
                $this->db->where('m_req.status',$search_params["status_search"]);
            }
            if ($search_params["value"] != "") {
                $search = $search_params["value"];
                $this->db->group_start(); // Start a group for 'like' queries
                $this->db->like('m_req.id', $search);
                $this->db->or_like(' m.name', $search);
                $this->db->or_like('o.name', $search);
                $this->db->or_like('part.part_number', $search);
                $this->db->or_like('part.part_description', $search);
                $this->db->or_like('child.part_number', $search);
                $this->db->or_like('child.part_description', $search);
                $this->db->or_like('u.uom_name', $search);
                $this->db->or_like('req_parts.qty', $search);
                $this->db->or_like('req_parts.status', $search);
                $this->db->or_like('req_parts.accepted_qty', $search);
                $this->db->or_like('req_parts.remark', $search);
                $this->db->or_like('req_parts.accepted_qty', $search);
                $this->db->or_like('req_parts.accepted_qty', $search);
                $this->db->or_like('m_req.created_date', $search);
                $this->db->or_like('m_req.created_time', $search);
                $this->db->or_like('m_req.status', $search);
                $this->db->group_end(); // End the group
            }
            
        }

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }
    public function get_machine_request_completed_count(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientUnit = $this->Unit->getSessionClientId();
            $this->db->select('
            count(m_req.id ) AS total_record
        ');
        $this->db->from('machine_request m_req');
        $this->db->join('machine m', 'm_req.machine_id = m.id');
        $this->db->join('operator o', 'm_req.operator_id = o.id');
        $this->db->join('machine_request_parts req_parts', 'm_req.id = req_parts.machine_request_id');
        $this->db->join('child_part child', 'req_parts.child_part_id = child.id');
        $this->db->join('uom u', 'child.uom_id = u.id');
        $this->db->join('customer_parts_master part_master', 'm_req.customer_parts_master_id = part_master.id', 'left');
        $this->db->join('customer_part part', 'm_req.customer_part_id = part.id', 'left');
        $this->db->where('m_req.delivery_unit', $clientUnit);
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["status_search"] != "") {
                $this->db->where('m_req.status',$search_params["status_search"]);
            }
            if ($search_params["value"] != "") {
                $search = $search_params["value"];
                $this->db->group_start(); // Start a group for 'like' queries
                $this->db->like('m_req.id', $search);
                $this->db->or_like(' m.name', $search);
                $this->db->or_like('o.name', $search);
                $this->db->or_like('part.part_number', $search);
                $this->db->or_like('part.part_description', $search);
                $this->db->or_like('child.part_number', $search);
                $this->db->or_like('child.part_description', $search);
                $this->db->or_like('u.uom_name', $search);
                $this->db->or_like('req_parts.qty', $search);
                $this->db->or_like('req_parts.status', $search);
                $this->db->or_like('req_parts.accepted_qty', $search);
                $this->db->or_like('req_parts.remark', $search);
                $this->db->or_like('req_parts.accepted_qty', $search);
                $this->db->or_like('req_parts.accepted_qty', $search);
                $this->db->or_like('m_req.created_date', $search);
                $this->db->or_like('m_req.created_time', $search);
                $this->db->or_like('m_req.status', $search);
                $this->db->group_end(); // End the group
            }
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }
    
    public function get_molding_stock_transfer_view_data(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientUnit = $this->Unit->getSessionClientId();
        $this->db->select('
             ms.*,CONCAT(c.part_number ,"<br>(",c.part_description,")") as child_part,CONCAT(ms.created_date," ",ms.created_time) as date
        ');
        $this->db->from('molding_stock_transfer ms');
        $this->db->join('customer_part c', ' c.id = ms.customer_part_id');
        $this->db->where('ms.clientId', $clientUnit);
      
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }

        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["value"] != "") {
                $search = $search_params["value"];
                $this->db->group_start(); // Start a group for 'like' queries
                $this->db->or_like('c.part_number', $search);
                $this->db->or_like('c.part_description', $search);
                $this->db->or_like('ms.created_date', $search);
                $this->db->or_like('ms.created_time', $search);
                $this->db->or_like('ms.final_inspection_location', $search);
                $this->db->or_like('ms.status', $search);
                $this->db->group_end(); // End the group
            }
            
        }

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }
    public function get_molding_stock_transfer_count(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientUnit = $this->Unit->getSessionClientId();
        $this->db->select('
            count(ms.id) as total_record
        ');
        $this->db->from('molding_stock_transfer ms');
        $this->db->join('customer_part c', ' c.id = ms.customer_part_id');
        $this->db->where('ms.clientId', $clientUnit);
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["value"] != "") {
                $search = $search_params["value"];
                $this->db->group_start(); // Start a group for 'like' queries
                $this->db->or_like('c.part_number', $search);
                $this->db->or_like('c.part_description', $search);
                $this->db->or_like('ms.created_date', $search);
                $this->db->or_like('ms.created_time', $search);
                $this->db->or_like('ms.final_inspection_location', $search);
                $this->db->or_like('ms.status', $search);
                $this->db->group_end(); // End the group
            }
            
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }
    public function getPoTrakingView($condition_arr = [],$search_params = ""){
        
        $this->db->select('cpt.*,c.customer_name');
        $this->db->from('customer_po_tracking cpt');
        $this->db->join('customer c', 'cpt.customer_id = c.id');
       
        if(is_valid_array($search_params) && $search_params['customer_id'] > 0){
            $this->db->where('cpt.customer_id', $search_params['customer_id']);
        }
        // pr($condition_arr,1);
        if($condition_arr["order_by"] == ''){    
            $this->db->order_by('cpt.id', 'DESC');
        }
        
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];
        // pr($this->db->last_query(),1);
        return $ret_data;
    }

    public function getPoTrakingViewCount( $condition_arr = [],$search_params = ""){
        $this->db->select('count(cpt.id) as total_record');
        $this->db->from('customer_po_tracking cpt');
        $this->db->join('customer c', 'cpt.customer_id = c.id');
       
       
        if(is_valid_array($search_params) && $search_params['customer_id'] > 0){
            $this->db->where('cpt.customer_id', $search_params['customer_id']);
        }

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        
        return $ret_data;
    }

    /* for datable */

    // SELECT
    // parts.*,
    // stock.*
    // FROM
    //     customer_parts_master parts
    // LEFT JOIN customer_parts_master_stock stock ON
    //     parts.id = stock.customer_parts_master_id AND stock.clientId = 1
    // WHERE
    //     parts.id = 247
    // ORDER BY
    //     parts.id
    // DESC
    
    public function get_fg_stock_view(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientId = $this->Unit->getSessionClientId();
        $this->db->select(
            'parts.part_number as part_number ,parts.part_description as part_description, stock.fg_stock as fg_stock,stock.molding_production_qty as molding_production_qty,stock.production_rejection as production_rejection,stock.production_scrap as production_scrap,stock.final_inspection_location as final_inspection_location,parts.id as customer_parts_master_id'
        );
        $this->db->from("customer_parts_master as parts");
        $this->db->join("customer_parts_master_stock as stock", "parts.id = stock.customer_parts_master_id AND stock.clientId = $clientId ",'left');
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }

        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["part_id"] != "") {
                $this->db->where("parts.id", $search_params["part_id"]);
            }
            
            if ($search_params["value"] != "") {
                $search = $search_params["value"];
                $this->db->group_start(); // Start a group for 'like' queries
                $this->db->like('cp.part_number', $search);
                $this->db->or_like('cp.part_description', $search);
                $this->db->or_like('cs.safty_buffer_stk', $search);
                $this->db->or_like('cp.hsn_code', $search);
                $this->db->or_like('cp.sub_type', $search);
                $this->db->or_like('cp.store_rack_location', $search);
                $this->db->or_like('u.uom_name', $search);
                $this->db->or_like('cp.max_uom', $search);
                $this->db->or_like('cp.store_stock_rate', $search);
                $this->db->or_like('cp.weight', $search);
                $this->db->or_like('cp.size', $search);
                $this->db->or_like('cp.thickness', $search);
                $this->db->or_like('cp.grade', $search);
                $this->db->group_end(); // End the group
            }

        }

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }
    public function get_fg_stock_view_count(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientId = $this->Unit->getSessionClientId();
        $this->db->select(
            'COUNT(parts.id) as total_record'
        );
        $this->db->from("customer_parts_master as parts");
        $this->db->join("customer_parts_master_stock as stock", "parts.id = stock.customer_parts_master_id AND stock.clientId = $clientId ",'left');
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["part_id"] != "") {
                $this->db->where("parts.id", $search_params["part_id"]);
            }
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }

}
?>