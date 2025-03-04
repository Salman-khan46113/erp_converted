<?php
class ExportImportModel extends CI_Model {
    
    public function __construct() {
    }

    public function batchInsert($insert_arr = [],$table_name =""){
        $this->db->insert_batch($table_name, $insert_arr);
        return $this->db->insert_id();
    }
    public function getSupplierPartStock($part_nos = []){
    	$unitId = $this->Unit->getSessionClientId();
        $this->db->select('cp.part_number,cp.id as part_id, cps.stock as stock');
		$this->db->from('child_part  cp');
		$this->db->join('child_part_stock cps','cps.childPartId = cp.id AND cps.clientId = '. $unitId );
		$this->db->where_in('cp.part_number',$part_nos);
		$data_obj = $this->db->get();
    	$data_arr = is_object($data_obj) ? $data_obj->result_array() : array();
    	return $data_arr;
    }
    public function getInhousePartStock($part_nos = []){
    	$unitId = $this->Unit->getSessionClientId();
        $this->db->select('parts.id as part_id,parts.part_number as part_number,stock.production_qty as stock');
		$this->db->from('inhouse_parts parts');
		$this->db->join('inhouse_parts_stock stock','parts.id = stock.inhouse_parts_id
            AND stock.clientId = '. $unitId );
		$this->db->where_in('parts.part_number',$part_nos);
		$data_obj = $this->db->get();
    	$data_arr = is_object($data_obj) ? $data_obj->result_array() : array();
    	return $data_arr;
    }
    public function getCustomerPartStock($part_nos = []){
    	$unitId = $this->Unit->getSessionClientId();
        $this->db->select('parts.id as part_id,parts.part_number as part_number,stock.fg_stock as stock');
		$this->db->from('customer_parts_master parts');
		$this->db->join('customer_parts_master_stock stock','parts.id = stock.customer_parts_master_id
            AND stock.clientId = '. $unitId );
		$this->db->where_in('parts.part_number',$part_nos);
		$data_obj = $this->db->get();
    	$data_arr = is_object($data_obj) ? $data_obj->result_array() : array();
    	return $data_arr;
    }


    public function addStockUpRecord($records = []){
    	$this->db->insert_batch('stock_changes', $records);
    }


}
?>