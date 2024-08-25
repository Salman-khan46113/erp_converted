<?php
class SupplierParts extends CI_Model {
        
    public function __construct() {
    }
    
    /**
     * Check whether record exists
     */

    public function isRecordExists($data){
        $rows = $this->Crud->read_data_where("child_part",$data);
        if($rows!=0){
             return true;
        }
         return false;
    }

    /**
     * Check whether stock entry is there for supplier part
     */
    public function isStockRecordExists($data){
        $rows = $this->Crud->read_data_where("child_part_stock",$data);
        if($rows!=0){
             return true;
        }
         return false;
    }

    /**
     * This would be more towards Select widget to  get minimal fields
     */
    public function getUniquePartNumber(){
       return $this->Crud->customQuery('SELECT DISTINCT id, part_number FROM `child_part` ');
    }

    /**
     * Just need some basic supplier parts information for display
     */
    public function readSupplierPartsOnly() {
        $part_details = $this->Crud->customQuery("SELECT parts.*
            FROM  child_part parts
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Read all the parts with stock
     */
    public function readSupplierParts() {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  child_part parts
            LEFT JOIN child_part_stock stock
            ON parts.id = stock.childPartId 
            AND stock.clientId = ".$this->Unit->getSessionClientId()." 
            ORDER BY parts.id desc");
        return $part_details;
    }


     /**
     * Read all the parts with stock which are not Subcon type
     */
    public function readSupplierPartsNotSubcon() {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  child_part parts
            LEFT JOIN child_part_stock stock
            ON parts.id = stock.childPartId 
            AND stock.clientId = ".$this->Unit->getSessionClientId()." 
            AND parts.sub_type not in ('Subcon grn', 'Subcon Regular') ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Read specific part details without stock
     */
    public function getSupplierPartOnlyById($id) {
        $part_details = $this->Crud->customQuery("SELECT parts.*
            FROM  child_part parts
            WHERE parts.id = ".$id."
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Read specific part details including stock
     */
    public function getSupplierPartById($id, $unitId=null) {
        if(empty($unitId)){
            $unitId = $this->Unit->getSessionClientId() ;
        }
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  child_part parts
            LEFT JOIN child_part_stock stock
            ON parts.id = stock.childPartId
            AND stock.clientId = " . $unitId . " 
            WHERE parts.id = ".$id."
            ORDER BY parts.id desc");
        return $part_details;
    }


     /**
     * Read specific part details including stock
     */
    public function getSupplierPartByPartNumber($partNumber) {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  child_part parts
            LEFT JOIN child_part_stock stock
            ON parts.id = stock.childPartId
            AND stock.clientId = " . $this->Unit->getSessionClientId() . " 
            WHERE parts.part_number = '".$partNumber."'
            ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Update part basic infromation
     */
    public function updatePartById($update_data, $id) {
       return $this->Crud->update_data("child_part", $update_data, $id);
    }

    /**
     * Update part basic information per criteria
     */
    public function updatePartByCriteria($update_data, $criteria, $id ) {
        return $this->Crud->update_data_column("child_part", $update_data, $id, $criteria);
    }

    /**
     * Update stock information for a part
     */
    public function updateStockById($update_data, $id, $clientId=null) {
        if(empty($clientId)){
                $data = array(
                    "childPartId" => $id
                );
        }else { //need to explicitly update with specific clientId
            $data = array(
                "childPartId" => $id
            );
        }

        if($this->isStockRecordExists($data)){
            return $this->Crud->update_data_column("child_part_stock", $update_data, $id, "childPartId", $clientId);
        }else{
            $stockResult = $this->createStockRecord($id, $update_data); //First insert record and then update
        }       
    }


    /**
     * Get part information with stock based on part number
     */
    public function getSupplierPartByPartNo($part_number) {
        $part_details = $this->Crud->customQuery("SELECT parts.*, stock.* 
            FROM  child_part parts
                INNER JOIN child_part_stock stock
                ON parts.id = stock.childPartId
                AND stock.clientId = " . $this->Unit->getSessionClientId() . "
                AND parts.part_number = '".$part_number."'
                ORDER BY parts.id desc");
        return $part_details;
    }

    /**
     * Create supplier part entry including stock
     */
   public function createSupplierPart($data) {
    $data = array(
                "part_number" => $data["part_number"],
                "part_description" => $data["part_description"],
                "supplier_id" => $data["supplier_id"],
                "part_rate" => $data["part_rate"],
                "uom_id" => $data["uom_id"],
                "revision_no" => $data["revision_no"],
                "child_part_id" => $data["child_part_id"],
                "hsn_code" => $data["hsn_code"],
                "safty_buffer_stk" =>  $data["safty_buffer_stk"],
                "store_stock_rate" => $data["store_stock_rate"],
                "store_rack_location" => $data["store_rack_location"],
                "revision_remark" => $data["revision_remark"],
                "part_drawing" => $data["part_drawing"],
                "grade" => $data["grade"],
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
            $newRecordId = $this->Crud->insert_data("child_part", $data);
           
            if($newRecordId > 0) {
                return $this->createStockRecord($newRecordId, $data);
            }

            return 0;
    }


    /**
     * Insert new stock record
     */
    public function createStockRecord($supplierPartId, $data){
             $stockData = array(
                    "childPartId" => $supplierPartId,
                    "clientId"  =>  $this->Unit->getSessionClientId(),
                    "stock"  => empty($data["stock"])? 0 : $data["stock"],
                    "safty_buffer_stk" =>  empty($data["safty_buffer_stk"])? 0 : $data["safty_buffer_stk"],
                 //   "store_stock_rate" => empty($data["store_stock_rate"])? 0 : $data["store_stock_rate"],
                    "onhold_stock" => empty($data["onhold_stock"])? 0 : $data["onhold_stock"],
                    "production_qty"  => empty($data["production_qty"])? 0 : $data["production_qty"],
                    "rejection_prodcution_qty" => empty($data["rejection_prodcution_qty"])? 0 : $data["rejection_prodcution_qty"],
                    "sub_con_stock"  => empty($data["sub_con_stock"])? 0 : $data["sub_con_stock"],
                    "rejection_stock"  => empty($data["rejection_stock"])? 0 : $data["rejection_stock"],
                    "sharing_qty"  => empty($data["sharing_qty"])? 0 : $data["sharing_qty"],
                    "machine_mold_issue_stock" => empty($data["machine_mold_issue_stock"])? 0 : $data["machine_mold_issue_stock"],
                    "production_scrap"  => empty($data["production_scrap"])? 0 : $data["production_scrap"],
                    "production_rejection" => empty($data["production_rejection"])? 0 : $data["production_rejection"],
                    "deflashing_stock" => empty($data["deflashing_stock"])? 0 : $data["deflashing_stock"],
                    "created_id" => $this->user_id,
                    "date" => $this->current_date,
                    "time" => $this->current_time
                );
            
            $result = $this->Crud->insert_data("child_part_stock", $stockData);
            
        return $result;
    }

    /* for datable */
    public function get_child_part_view_data(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientId = $this->Unit->getSessionClientId();
        $this->db->select(
            'cp.id as part_id,cp.part_number as part_number,cp.part_description as part_description,cs.safty_buffer_stk as buffer_stock,cp.hsn_code as hsn_code,cp.sub_type as sub_type,cp.store_rack_location as store_rack_location,u.uom_name as uom_name,cp.max_uom as max_uom,cp.store_stock_rate as store_stock_rate,cp.weight as weight,cp.size as size,cp.thickness as thickness,cp.grade as grade,cp.uom_id as uom_id'
        );
        $this->db->from("child_part as cp");
        $this->db->join("child_part_stock as cs", "cp.id = cs.childPartId AND cs.clientId = $clientId ",'left');
        $this->db->join("uom as u", "u.id = cp.uom_id",'left');
        if (count($condition_arr) > 0) {
            // pr($condition_arr,1);
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }

        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["part_number"] != "") {
                $this->db->where("cp.id", $search_params["part_number"]);
            }
            if ($search_params["part_description"] != "") {
                $this->db->like(
                    "cp.part_description",
                    $search_params["part_description"]
                );
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

            // if ($search_params["employee_name"] != "") {
            //     $this->db->or_like(
            //         "em.first_name",
            //         $search_params["employee_name"]
            //     );
            //     $this->db->or_like(
            //         "em.last_name",
            //         $search_params["employee_name"]
            //     );
            // }
            // if ($search_params["employee_code"] != "") {
            //     $this->db->like(
            //         "em.employee_code",
            //         $search_params["employee_code"]
            //     );
            // }
            // if ($search_params["join_date"] != "") {
            //     $this->db->where(
            //         "em.employment_date >=",
            //         mysqlFormat($search_params["join_date_from"])
            //     );
            //     $this->db->where(
            //         "em.employment_date <=",
            //         mysqlFormat($search_params["join_date_to"])
            //     );
            // }
            // if ($search_params["email"] != "") {
            //     $this->db->like(
            //         "em.email",
            //         $search_params["email"]
            //     );
            // }
            // if ($search_params["department"] != "") {
            //     $this->db->where(
            //         "d.department_id",
            //         $search_params["department"]
            //     );
            // }
            // if ($search_params["designation"] != "") {
            //     $this->db->where(
            //         "de.id",
            //         $search_params["designation"]
            //     );
            // }
        }

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }
    public function get_child_part_view_count(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientId = $this->Unit->getSessionClientId();
        $this->db->select(
            'COUNT(cp.part_number) as total_record'
        );
        $this->db->from("child_part as cp");
        $this->db->join("child_part_stock as cs", "cp.id = cs.childPartId AND cs.clientId = $clientId ",'left');
        $this->db->join("uom as u", "u.id = cp.uom_id",'left');
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["part_number"] != "") {
                $this->db->where("cp.id", $search_params["part_number"]);
            }
            if ($search_params["part_description"] != "") {
                $this->db->like(
                    "cp.part_description",
                    $search_params["part_description"]
                );
            }
            // if ($search_params["employee_name"] != "") {
            //     $this->db->or_like(
            //         "em.first_name",
            //         $search_params["employee_name"]
            //     );
            //     $this->db->or_like(
            //         "em.last_name",
            //         $search_params["employee_name"]
            //     );
            // }
            // if ($search_params["employee_code"] != "") {
            //     $this->db->like(
            //         "em.employee_code",
            //         $search_params["employee_code"]
            //     );
            // }
            // if ($search_params["join_date"] != "") {
            //     $this->db->where(
            //         "em.employment_date >=",
            //         mysqlFormat($search_params["join_date_from"])
            //     );
            //     $this->db->where(
            //         "em.employment_date <=",
            //         mysqlFormat($search_params["join_date_to"])
            //     );
            // }
            // if ($search_params["email"] != "") {
            //     $this->db->like(
            //         "em.email",
            //         $search_params["email"]
            //     );
            // }
            // if ($search_params["department"] != "") {
            //     $this->db->where(
            //         "d.department_id",
            //         $search_params["department"]
            //     );
            // }
            // if ($search_params["designation"] != "") {
            //     $this->db->where(
            //         "de.id",
            //         $search_params["designation"]
            //     );
            // }
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }

    public function getSupplierData($condition_arr = [],$search_params = []){
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('admin_approve', 'accept');
        if(is_valid_array($search_params) && $search_params['supplier_id'] > 0){
            $this->db->where('supplier.id', $search_params['supplier_id']);
        }
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];
        return $ret_data;
    }

    public function getSupplierDataCount($condition_arr = [],$search_params = []){
        $this->db->select('count(*) AS total_record');
        $this->db->from('supplier');
        $this->db->where('admin_approve', 'accept');
        if(is_valid_array($search_params) && $search_params['supplier_id'] > 0){
            $this->db->where('supplier.id', $search_params['supplier_id']);
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];
        return $ret_data;
    }

    public function getChildSupplierReportData($condition_arr = [],$search_params = []){
        $supplier_id = $filter_supplier_id; // Assuming you have this variable defined

        $this->db->select('cpm.part_number, cpm.supplier_id, s.*, gs.*,cpm.revision_no,cpm.revision_remark,cpm.revision_date,cpm.part_description,cpm.part_rate');
        $this->db->from('child_part_master cpm');
        $this->db->join('supplier s', 'cpm.supplier_id = s.id','left');
        $this->db->join('gst_structure gs', 'cpm.gst_id = gs.id','left');
        $this->db->where('cpm.admin_approve', 'accept');
        if(is_valid_array($search_params) && $search_params['supplier_id'] > 0){
            $this->db->where('s.id', $search_params['supplier_id']);
        }
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
        if($condition_arr["order_by"] == ""){
            $this->db->order_by('cpm.id', 'desc');
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];
        return $ret_data;
    }

    public function getChildSupplierReportCount($condition_arr = [],$search_params = []){
        $this->db->select('count(cpm.id) as total_record');
        $this->db->from('child_part_master cpm');
        $this->db->join('supplier s', 'cpm.supplier_id = s.id','left');
        $this->db->join('gst_structure gs', 'cpm.gst_id = gs.id','left');
        $this->db->where('cpm.admin_approve', 'accept');
        if(is_valid_array($search_params) && $search_params['supplier_id'] > 0){
            $this->db->where('s.id', $search_params['supplier_id']);
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        return $ret_data;
    }

    public function getStockReportDataModel($condition_arr = [],$search_params = []){
        $unitId = $this->Unit->getSessionClientId();
        $this->db->select('parts.*, stock.*, uom.*, IFNULL(grn.total_verified_qty, 0) AS total_verified_qty, IFNULL(grn.total_accept_qty, 0) AS total_accept_qty');
        $this->db->from('child_part parts');
        $this->db->join('child_part_stock stock', 'parts.id = stock.childPartId AND stock.clientId = ' . $unitId, 'left');
        $this->db->join('uom', 'parts.uom_id = uom.id', 'left');
        $this->db->join('(SELECT part_id, SUM(verified_qty) AS total_verified_qty, SUM(accept_qty) AS total_accept_qty FROM grn_details where accept_qty = 0 GROUP BY part_id) grn', 'parts.id = grn.part_id ', 'left');
        if(is_valid_array($search_params) && $search_params['part_id'] > 0){
            $this->db->where('parts.id', $search_params['part_id']);
        }
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
        $this->db->order_by('parts.id', 'desc');
        $query = $this->db->get();
        $result = is_object($query) ? $query->result_array() : [];
        return $result;
    }

    public function getStockReportDataCountModel($condition_arr = [],$search_params = []){
        $unitId = $this->Unit->getSessionClientId();
        $this->db->select('count(parts.id) as total_records');
        $this->db->from('child_part parts');
        $this->db->join('child_part_stock stock', 'parts.id = stock.childPartId AND stock.clientId = ' . $unitId, 'left');
        $this->db->join('uom', 'parts.uom_id = uom.id', 'left');
        $this->db->join('(SELECT part_id, SUM(verified_qty) AS total_verified_qty, SUM(accept_qty) AS total_accept_qty FROM grn_details GROUP BY part_id) grn', 'parts.id = grn.part_id', 'left');
        if(is_valid_array($search_params) && $search_params['part_id'] > 0){
            $this->db->where('parts.id', $search_params['part_id']);
        }
        $query = $this->db->get();
        $result = is_object($query) ? $query->row_array() : [];
        return $result;
    }

    public function getPoRepotData($condition_arr = [],$search_params = []){
        $this->db->select('po.po_number, po.created_date, po.expiry_po_date, po.status, s.supplier_name, c.part_number, c.part_description, parts.qty, parts.pending_qty');
        $this->db->from('new_po po');
        $this->db->join('supplier s', 'po.supplier_id = s.id', 'left');
        $this->db->join('po_parts parts', 'po.id = parts.po_id', 'left');
        $this->db->join('child_part c', 'parts.part_id = c.id', 'left');
        $this->db->where('po.clientId', $this->Unit->getSessionClientId());
        
        if(is_valid_array($search_params) && $search_params['month_number'] > 0){
            $this->db->where('po.created_month', $search_params['month_number']);
        }
        if(is_valid_array($search_params) && $search_params['year'] > 0){
            $this->db->where('po.created_year', $search_params['year']);
        }
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
        $this->db->group_by('po.id');

        $query = $this->db->get();
        $result = is_object($query) ? $query->result_array() : [];
        
        return $result;
    }

    public function getPoRepotDataCount($condition_arr = [],$search_params = []){
        $this->db->select('po.id');
        $this->db->from('new_po po');
        $this->db->join('supplier s', 'po.supplier_id = s.id', 'left');
        $this->db->join('po_parts parts', 'po.id = parts.po_id', 'left');
        $this->db->join('child_part c', 'parts.part_id = c.id', 'left');
        $this->db->where('po.clientId', $this->Unit->getSessionClientId());
        
        if(is_valid_array($search_params) && $search_params['month_number'] > 0){
            $this->db->where('po.created_month', $search_params['month_number']);
        }
        if(is_valid_array($search_params) && $search_params['year'] > 0){
            $this->db->where('po.created_year', $search_params['year']);
        }
        $this->db->group_by('po.id');
        $query = $this->db->get();
        $result = is_object($query) ? $query->result_array() : [];
        
        return $result;
    }

    public function getGNRepotData($condition_arr = [],$search_params = []){
        $this->db->select('
            grn.inwarding_id, 
            inward.grn_number, 
            grn.po_part_id, 
            grn.po_number, 
            grn.created_date as grn_created_date,
            grn.invoice_number, 
            inward.invoice_date, 
            po.supplier_id, 
            grn.qty as po_qty, 
            po.po_number as poNumber, 
            s.supplier_name, 
            po.po_date, 
            part.part_number, 
            part.part_description, 
            part.hsn_code, 
            u.uom_name,
            po_parts.tax_id, 
            po_parts.part_id, 
            po_parts.rate, 
            grn.accept_qty,
            tax.igst, 
            tax.sgst, 
            tax.cgst, 
            tax.tcs, 
            tax.tcs_on_tax,
            ROUND((grn.accept_qty * po_parts.rate), 2) as base_amount, 
            ROUND(((grn.accept_qty * po_parts.rate) * tax.cgst) / 100, 2) as cgst_amount, 
            ROUND(((grn.accept_qty * po_parts.rate) * tax.sgst) / 100, 2) as sgst_amount,
            ROUND(((grn.accept_qty * po_parts.rate) * tax.tcs) / 100, 2) as tcs_amount,
            ROUND(((grn.accept_qty * po_parts.rate) * tax.igst) / 100, 2) as igst_amount,
            po.loading_unloading, 
            po.loading_unloading_gst, 
            po.freight_amount, 
            po.freight_amount_gst
        ');
        $this->db->from('grn_details grn');
        $this->db->join('inwarding inward', 'inward.id = grn.inwarding_id', 'inner');
        $this->db->join('po_parts po_parts', 'po_parts.id = grn.po_part_id', 'inner');
        $this->db->join('new_po po', 'po.id = grn.po_number', 'inner');
        $this->db->join('child_part part', 'part.id = po_parts.part_id', 'inner');
        $this->db->join('uom u', 'u.id = po_parts.uom_id', 'inner');
        $this->db->join('gst_structure tax', 'tax.id = po_parts.tax_id', 'inner');
        $this->db->join('supplier s', 's.id = po.supplier_id', 'inner');
        // $this->db->order_by('grn.id', 'DESC');
        
        if(is_valid_array($search_params) && $search_params['month_number'] > 0){
            $this->db->where('grn.created_month', $search_params['month_number']);
        }
        if(is_valid_array($search_params) && $search_params['year'] > 0){
            $this->db->where('grn.created_year', $search_params['year']);
        }
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
        

        $query = $this->db->get();
        $result = is_object($query) ? $query->result_array() : [];
        // pr($this->db->last_query(),1);
        return $result;
    }

    public function getGNRepotDataCount($condition_arr = [],$search_params = []){
        $this->db->select('count(grn.id) as tot_record');
        $this->db->from('grn_details grn');
        $this->db->join('inwarding inward', 'inward.id = grn.inwarding_id', 'inner');
        $this->db->join('po_parts po_parts', 'po_parts.id = grn.po_part_id', 'inner');
        $this->db->join('new_po po', 'po.id = grn.po_number', 'inner');
        $this->db->join('child_part part', 'part.id = po_parts.part_id', 'inner');
        $this->db->join('uom u', 'u.id = po_parts.uom_id', 'inner');
        $this->db->join('gst_structure tax', 'tax.id = po_parts.tax_id', 'inner');
        $this->db->join('supplier s', 's.id = po.supplier_id', 'inner');
        if(is_valid_array($search_params) && $search_params['month_number'] > 0){
            $this->db->where('grn.created_month', $search_params['month_number']);
        }
        if(is_valid_array($search_params) && $search_params['year'] > 0){
            $this->db->where('grn.created_year', $search_params['year']);
        }
        
        $query = $this->db->get();
        $result = is_object($query) ? $query->row_array() : [];
        
        return $result;
    }

    public function getIncomeReportView($condition_arr = [],$search_params = []){
        $this->db->select('
        grn.*,grn.qty as grn_qty, 
        po.*, 
        inward.*, 
        supplier.*, 
        child_part.*,
        po_parts.*
    ');
        $clientId = $this->Unit->getSessionClientId();
        $this->db->from('grn_details grn');
        $this->db->join('new_po po', 'po.id = grn.po_number', 'inner');
        $this->db->join('inwarding inward', 'inward.id = grn.inwarding_id','left');
        $this->db->join('supplier supplier', 'supplier.id = po.supplier_id','left');
        $this->db->join('child_part child_part', 'child_part.id = grn.part_id','left');
        $this->db->join('po_parts po_parts', 'po_parts.id = grn.po_part_id AND po_parts.part_id','left');
        $this->db->where('po.clientId', $clientId);
        // $this->db->order_by('grn.id', 'DESC');
       
        // Set the created_year and created_month for further processing
        if(is_valid_array($search_params) && $search_params['month_number'] > 0){
            $this->db->where('grn.created_month', $search_params['month_number']);
        }
        if(is_valid_array($search_params) && $search_params['year'] > 0){
            $this->db->where('grn.created_year', $search_params['year']);
        }
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }

        $query = $this->db->get();
        $result = is_object($query) ? $query->result_array() : [];
       
        return $result;
    }

    public function getIncomeReportViewCount($condition_arr = [],$search_params = []){
        $this->db->select('count(grn.id) AS tot_records');
        $clientId = $this->Unit->getSessionClientId();
        $this->db->from('grn_details grn');
        $this->db->join('new_po po', 'po.id = grn.po_number', 'inner');
        $this->db->join('inwarding inward', 'inward.id = grn.inwarding_id','left');
        $this->db->join('supplier supplier', 'supplier.id = po.supplier_id','left');
        $this->db->join('child_part child_part', 'child_part.id = grn.part_id','left');
        $this->db->join('po_parts po_parts', 'po_parts.id = grn.po_part_id AND po_parts.part_id','left');
        $this->db->where('po.clientId', $clientId);
        if(is_valid_array($search_params) && $search_params['month_number'] > 0){
            $this->db->where('grn.created_month', $search_params['month_number']);
        }
        if(is_valid_array($search_params) && $search_params['year'] > 0){
            $this->db->where('grn.created_year', $search_params['year']);
        }
        $query = $this->db->get();
        $result = is_object($query) ? $query->row_array() : [];
        // pr($this->db->last_query(),1);
        return $result;
    }

    public function getInspectionsReportView($condition_arr = [],$search_params = []){
        $clientId = $this->Unit->getSessionClientId();

// Main query to fetch required data
        $this->db->select('
            grn.*, 
            po.*, 
            inward.*, 
            supplier.*, 
            child_part.*
        ');
        $this->db->from('grn_details grn');
        $this->db->join('new_po po', 'po.id = grn.po_number', 'left');
        $this->db->join('inwarding inward', 'inward.id = grn.inwarding_id', 'left');
        $this->db->join('supplier supplier', 'supplier.id = po.supplier_id', 'left');
        $this->db->join('child_part child_part', 'child_part.id = grn.part_id', 'left');
        $this->db->join('po_parts po_parts', 'po.id = po_parts.po_id AND grn.part_id = po_parts.part_id', 'left');
        $this->db->where('po.clientId', $clientId);
       
        // Set the created_year and created_month for further processing
        if(is_valid_array($search_params) && $search_params['month_number'] > 0){
            $this->db->where('grn.created_month', $search_params['month_number']);
        }
        if(is_valid_array($search_params) && $search_params['year'] > 0){
            $this->db->where('grn.created_year', $search_params['year']);
        }
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }

        $query = $this->db->get();
        $result = is_object($query) ? $query->result_array() : [];
       
        return $result;
    }

    public function getInspectionsReportViewCount($condition_arr = [],$search_params = []){
        $clientId = $this->Unit->getSessionClientId();

// Main query to fetch required data
        $this->db->select('
            count(grn.id) as tot_record');
        $this->db->from('grn_details grn');
        $this->db->join('new_po po', 'po.id = grn.po_number', 'left');
        $this->db->join('inwarding inward', 'inward.id = grn.inwarding_id', 'left');
        $this->db->join('supplier supplier', 'supplier.id = po.supplier_id', 'left');
        $this->db->join('child_part child_part', 'child_part.id = grn.part_id', 'left');
        $this->db->join('po_parts po_parts', 'po.id = po_parts.po_id AND grn.part_id = po_parts.part_id', 'left');
        $this->db->where('po.clientId', $clientId);

        if(is_valid_array($search_params) && $search_params['month_number'] > 0){
            $this->db->where('grn.created_month', $search_params['month_number']);
        }
        if(is_valid_array($search_params) && $search_params['year'] > 0){
            $this->db->where('grn.created_year', $search_params['year']);
        }
        $query = $this->db->get();
        $result = is_object($query) ? $query->row_array() : [];
        // pr($this->db->last_query(),1);
        return $result;
    }

    public function getPartStockReportView($condition_arr = [],$search_params = ""){
        // normal code starts
        /*
        $this->db->select('parts.*, stock.*, uom_data.*, part_type_data.*, grn_details_data.*, job_card_details.*');
        $this->db->from('child_part parts');
        $this->db->join('child_part_stock stock', 'parts.id = stock.childPartId AND stock.clientId = ' . $clientId, 'left');
        $this->db->join('uom uom_data', 'parts.uom_id = uom_data.id', 'left');
        $this->db->join('part_type part_type_data', 'parts.child_part_id = part_type_data.id', 'left');
        $this->db->join('grn_details grn_details_data', 'parts.id = grn_details_data.part_id', 'left');
        $this->db->join('job_card_details', 'parts.part_number = job_card_details.item_number', 'left');
        */
        // normal code ends

        $this->db->select('parts.*, stock.*, uom_data.*, child_part_type.*, 
        SUM(IFNULL(grn_details.reject_qty, 0)) AS scrap_stock, 
        SUM(CASE WHEN grn_details.accept_qty = 0 THEN IFNULL(grn_details.verified_qty, 0) ELSE 0 END) AS underinspection_stock, 
        SUM(IFNULL(job_card_details.store_reject_qty, 0)) AS store_scrap, 
        (SUM(IFNULL(stock.stock, 0)) * parts.store_stock_rate) AS total_value');
        $this->db->from('child_part parts');
        $this->db->join('child_part_stock stock', 'parts.id = stock.childPartId AND stock.clientId = '.$this->Unit->getSessionClientId(), 'left');
        $this->db->join('uom uom_data', 'parts.uom_id = uom_data.id', 'left');
        $this->db->join('part_type child_part_type', 'parts.child_part_id = child_part_type.id', 'left');
        $this->db->join('grn_details', 'parts.id = grn_details.part_id', 'left');
        $this->db->join('job_card_details', 'parts.part_number = job_card_details.item_number', 'left');
        $this->db->group_by('parts.id');
        // $this->db->order_by('parts.id', 'desc');
 
        if(is_valid_array($search_params) && $search_params['part_id'] > 0){
            $this->db->where('parts.id', $search_params['part_id']);
        }
        // pr($condition_arr,1);
        // if($condition_arr["order_by"] == ''){    
        //     $this->db->order_by('s.id', 'DESC');
        // }
        
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

    public function getPartStockReportViewCount( $condition_arr = [],$search_params = ""){
        /*
        $this->db->select('Count(parts.id)');
        $this->db->from('child_part parts');
        $this->db->join('child_part_stock stock', 'parts.id = stock.childPartId AND stock.clientId = ' . $clientId, 'left');
        $this->db->join('uom uom_data', 'parts.uom_id = uom_data.id', 'left');
        $this->db->join('part_type part_type_data', 'parts.child_part_id = part_type_data.id', 'left');
        $this->db->join('grn_details grn_details_data', 'parts.id = grn_details_data.part_id', 'left');
        $this->db->join('job_card_details', 'parts.part_number = job_card_details.item_number', 'left');
        */
        $this->db->select('parts.*, stock.*, uom_data.*, child_part_type.*, 
            SUM(IFNULL(grn_details.reject_qty, 0)) AS scrap_stock, 
            SUM(CASE WHEN grn_details.accept_qty = 0 THEN IFNULL(grn_details.verified_qty, 0) ELSE 0 END) AS underinspection_stock, 
            SUM(IFNULL(job_card_details.store_reject_qty, 0)) AS store_scrap, 
            (SUM(IFNULL(stock.stock, 0)) * parts.store_stock_rate) AS total_value');
        $this->db->from('child_part parts');
        $this->db->join('child_part_stock stock', 'parts.id = stock.childPartId AND stock.clientId = '.$this->Unit->getSessionClientId(), 'left');
        $this->db->join('uom uom_data', 'parts.uom_id = uom_data.id', 'left');
        $this->db->join('part_type child_part_type', 'parts.child_part_id = child_part_type.id', 'left');
        $this->db->join('grn_details', 'parts.id = grn_details.part_id', 'left');
        $this->db->join('job_card_details', 'parts.part_number = job_card_details.item_number', 'left');
        $this->db->group_by('parts.id');
        // if(is_valid_array($search_params) && $search_params['customer_part_id'] > 0){
        //     $this->db->where('s.customer_id', $search_params['customer_part_id']);
        // }        

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];

        
        return $ret_data;
    }

    public function getPlanningViewData($planing_id = ''){
        
        $unitId = $this->Unit->getSessionClientId();
        $this->db->select('
            pd.planing_id,
            pd.child_part_id,
            cp.part_number,
            cp.part_description,
            pd.bom_qty,
            pd.schedule_qty,
            (pd.schedule_qty * pd.bom_qty) AS req_qty,
            IFNULL(cps.stock, 0) AS stock,
            ((pd.schedule_qty * pd.bom_qty) - IFNULL(cps.stock, 0)) AS shortage_qty
        ');
        $this->db->from('planing_data pd');
        $this->db->join('child_part cp', 'pd.child_part_id = cp.id', 'left');
        $this->db->join('child_part_stock cps', 'cp.id = cps.childPartId AND cps.clientId = '.$unitId, 'left');
        $this->db->where('pd.planing_id', $planing_id);
        $this->db->order_by('pd.planing_id', 'ASC');

        $query = $this->db->get();
        $planning_data = $query->result();
        
        return $planning_data;
    }

    // for challa view datatable 
    /* for datable */
    public function get_challan_search_view_data(
        $condition_arr = [],
        $search_params = ""
    ) {
       
        $challanId = $search_params['challan_id'];
        $supplierId = $search_params['supplier_id'];
        $suppCriteria = "";
        $chalCriteria = "";
       
        $this->db->select(
            'c.id as id,c.challan_number as challan_number,c.remark as remark,c.vechical_number as vechical_number,c.mode as mode,c.transpoter as transpoter,c.l_r_number as l_r_number,c.created_date as created_date,c.status as status,s.supplier_name,s.id as sup_id'
        );
        $this->db->from("challan as c");
        $this->db->join("supplier as s", "c.supplier_id = s.id",'left');
        $this->db->where("c.clientId",$this->Unit->getSessionClientId());
    
       
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
        
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["challan_id"] != "") {
                $this->db->where("c.id", $search_params["challan_id"]);
            }
            if ($search_params["supplier_id"] != "") {
                $this->db->where("c.supplier_id", $search_params["supplier_id"]);
            }
           
           
        }

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }
    public function get_challan_search_data_count(
        $condition_arr = [],
        $search_params = ""
    ) {
        $challanId = $search_params['challan_id'];
        $supplierId = $search_params['supplier_id'];
        $suppCriteria = "";
        $chalCriteria = "";
        if($challanId == "ALL"){
		}else if(empty($challanId) && empty($supplierId)) {
		}else{
			$suppCriteria = empty($supplierId)? " c.supplier_id is NOT NULL " : "c.supplier_id = ".$supplierId;
			$chalCriteria = empty($challanId)  ? "c.id is NOT NULL " : " c.id =".$challanId;
		}
        $this->db->select(
            'count(c.id) as total_record'
        );
        $this->db->from("challan as c");
        $this->db->join("supplier as s", "c.supplier_id = s.id",'left');
        $this->db->where("c.clientId",$this->Unit->getSessionClientId());
        if($chalCriteria != "" && $chalCriteria != ''){
            $this->db->where(".$suppCriteria." AND ".$chalCriteria.");
        }
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["challan_id"] != "") {
                $this->db->where("c.id", $search_params["challan_id"]);
            }
            if ($search_params["supplier_id"] != "") {
                $this->db->where("c.supplier_id", $search_params["supplier_id"]);
            }
            
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }

    /* for datable */
     public function get_sharing_issue_request_data(
        $condition_arr = [],
        $search_params = ""
    ) {

        $clientId = $this->Unit->getSessionClientId();
        $this->db->select(
            's.id as id,s.status as status,CONCAT(s.created_date," ",s.created_time) as date_time,s.qty as qty, c.part_number as part_number, c.part_description as part_description, c.thickness as part_thickness, c.weight as weight'
        );
        $this->db->from("sharing_issue_request as s");
        $this->db->join("child_part as c", "c.id = s.child_part_id",'left');
        $this->db->where("s.clientId",$clientId);

        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }

        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["created_year"] != "") {
                $this->db->where("s.year", $search_params["created_year"]);
            }
            if ($search_params["created_month"] != "") {
                $this->db->like(
                    "s.month",
                    $search_params["created_month"]
                );
            }
            
        }

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }
    public function get_sharing_issue_request_data_Count(
        $condition_arr = [],
        $search_params = ""
    ) {
       $clientId = $this->Unit->getSessionClientId();
        $this->db->select(
            'count(s.id) as total_record'
        );
        $this->db->from("sharing_issue_request as s");
        $this->db->join("child_part as c", "c.id = s.child_part_id",'left');
        $this->db->where("s.clientId",$clientId);

        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["created_year"] != "") {
                $this->db->where("s.year", $search_params["created_year"]);
            }
            if ($search_params["created_month"] != "") {
                $this->db->like(
                    "s.month",
                    $search_params["created_month"]
                );
            }
            
        }
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }

}
?>