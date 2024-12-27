<?php
class SalesModel extends CI_Model {
    // public function __construct() {
        
    // }

    public function getSalesReportData($condition_arr = [],$search_params = ''){
        
    }

    public function getSalesReportViewCount(
        $condition_arr = [],
        $search_params = ""
    ) {
        $clientId = $this->Unit->getSessionClientId();
        $this->db->select(
            'COUNT(sales.sales_number) as total_record'
        );
        // s
        $this->db->from('new_sales AS sales');
        $this->db->join('sales_parts AS parts', 'sales.id = parts.sales_id', 'inner');
        $this->db->join('customer AS c', 'parts.customer_id = c.id', 'inner');
        $this->db->join('customer_part AS cp', 'parts.part_id = cp.id', 'inner');
        $this->db->where('sales.clientId', $clientId);
        $this->db->where('sales.sales_number NOT LIKE', 'TEMP%');
        $this->db->where_not_in('sales.status', ['pending','unlocked']);
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["month_number"] != "") {
                $this->db->where("sales.created_month", $search_params["month_number"]);
            }
            if ($search_params["year"] != "") {
                $this->db->where("sales.created_year",$search_params["year"]);
            }
           
        }
        if (isset($search_params["value"]) && $search_params["value"] != "") {
            $keyword = $search_params["value"];
            // Group OR conditions within a WHERE block
            $this->db->group_start();
            $fields = [
                'cp.part_number',
                'cp.part_description',
                'c.customer_name',
                'sales.status',
                'sales.sales_number',
                'sales.created_date',
                'parts.invoice_number',
                'parts.po_number',
                'parts.hsn_code',
                // Add more columns as needed
            ];
            
            foreach ($fields as $field) {
                $this->db->or_like($field, $keyword);
            }
            $this->db->group_end(); // End the group of OR conditions
        }

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->row_array() : [];

        // pr($this->db->last_query(),1);
        return $ret_data;
    }

    public function getSalesReportViewData($condition_arr = [], $search_params = "") {
        $clientId = $this->Unit->getSessionClientId();
        $this->db->select('cp.part_number, cp.part_description, c.customer_name, sales.status, sales.sales_number as salesNumber, sales.created_date AS sales_date, parts.*,sales.discount as sales_discount');
        $this->db->from('new_sales AS sales');
        $this->db->join('sales_parts AS parts', 'sales.id = parts.sales_id', 'inner');
        $this->db->join('customer AS c', 'parts.customer_id = c.id', 'inner');
        $this->db->join('customer_part AS cp', 'parts.part_id = cp.id', 'inner');
        $this->db->where('sales.clientId', $clientId);
        $this->db->where('sales.sales_number NOT LIKE', 'TEMP%');
        $this->db->where_not_in('sales.status', ['pending','unlocked']);
        
        // Apply conditions based on $condition_arr
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
    
        // Apply additional search conditions
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["month_number"] != "") {
                $this->db->where("sales.created_month", $search_params["month_number"]);
            }
            if ($search_params["year"] != "") {
                $this->db->where("sales.created_year", $search_params["year"]);
            }
            
            // Apply LIKE conditions if a keyword is provided
            if (isset($search_params["value"]) && $search_params["value"] != "") {
                $keyword = $search_params["value"];
                // Group OR conditions within a WHERE block
                $this->db->group_start();
                $fields = [
                    'cp.part_number',
                    'cp.part_description',
                    'c.customer_name',
                    'sales.status',
                    'sales.sales_number',
                    'sales.created_date',
                    'parts.invoice_number',
                    'parts.po_number',
                    'parts.hsn_code',
                    // Add more columns as needed
                ];
                
                foreach ($fields as $field) {
                    $this->db->or_like($field, $keyword);
                }
                $this->db->group_end(); // End the group of OR conditions
            }
        }
    
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];
        
        // Debugging: print the last executed query
        // pr($this->db->last_query(),1);
        
        return $ret_data;
    }
    public function getHsnReportViewCount($condition_arr = [], $search_params = "") {
        $clientId = $this->Unit->getSessionClientId();
        $this->db->select('cp.part_number, cp.part_description, c.customer_name, sales.status, sales.sales_number as salesNumber, sales.created_date AS sales_date, parts.*,SUM(parts.basic_total) as basic_total,SUM(parts.total_rate) as total_rate,SUM(parts.igst_amount) as igst_amount,SUM(parts.sgst_amount) as sgst_amount,SUM(parts.cgst_amount) as cgst_amount,SUM(parts.gst_amount) as gst_amount,SUM(parts.part_price) as part_price,SUM(parts.qty) as qty,SUM(parts.tcs_amount) as tcs_amount,SUM(sales.discount) as sales_discount');
        $this->db->from('new_sales AS sales');
        $this->db->join('sales_parts AS parts', 'sales.id = parts.sales_id', 'inner');
        $this->db->join('customer AS c', 'parts.customer_id = c.id', 'inner');
        $this->db->join('customer_part AS cp', 'parts.part_id = cp.id', 'inner');
        $this->db->where('sales.clientId', $clientId);
        $this->db->where('sales.sales_number NOT LIKE', 'TEMP%');
        $this->db->where_not_in('sales.status', ['pending','unlocked']);
        
        
        // Apply additional search conditions
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["customer"] != "") {
                $this->db->where("parts.customer_id", $search_params["customer"]);
            }
            if ($search_params["hsn_code"] != "") {
                $this->db->where("parts.hsn_code", $search_params["hsn_code"]);
            }
            
            // Apply LIKE conditions if a keyword is provided
            if (isset($search_params["value"]) && $search_params["value"] != "") {
                $keyword = $search_params["value"];
                // Group OR conditions within a WHERE block
                $this->db->group_start();
                $fields = [
                    'c.customer_name',
                    'parts.hsn_code',
                    // Add more columns as needed
                ];
                
                foreach ($fields as $field) {
                    $this->db->or_like($field, $keyword);
                }
                $this->db->group_end(); // End the group of OR conditions
            }
        }
        $this->db->group_by('parts.hsn_code');
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];
        
        // Debugging: print the last executed query
        // pr($this->db->last_query(),1);
        
        return $ret_data;
    }

    public function getHsnReportViewData($condition_arr = [], $search_params = "") {
        $clientId = $this->Unit->getSessionClientId();
        $this->db->select('cp.part_number, cp.part_description, c.customer_name, sales.status, sales.sales_number as salesNumber, sales.created_date AS sales_date, parts.*,SUM(parts.basic_total) as basic_total,SUM(parts.total_rate) as total_rate,SUM(parts.igst_amount) as igst_amount,SUM(parts.sgst_amount) as sgst_amount,SUM(parts.cgst_amount) as cgst_amount,SUM(parts.gst_amount) as gst_amount,SUM(parts.part_price) as part_price,SUM(parts.qty) as qty,SUM(parts.tcs_amount) as tcs_amount,SUM(sales.discount) as sales_discount');
        $this->db->from('new_sales AS sales');
        $this->db->join('sales_parts AS parts', 'sales.id = parts.sales_id', 'inner');
        $this->db->join('customer AS c', 'parts.customer_id = c.id', 'inner');
        $this->db->join('customer_part AS cp', 'parts.part_id = cp.id', 'inner');
        $this->db->where('sales.clientId', $clientId);
        $this->db->where('sales.sales_number NOT LIKE', 'TEMP%');
        $this->db->where_not_in('sales.status', ['pending','unlocked']);
        
        // Apply conditions based on $condition_arr
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
    
        // Apply additional search conditions
        if (is_array($search_params) && count($search_params) > 0) {
            if ($search_params["customer"] != "") {
                $this->db->where("parts.customer_id", $search_params["customer"]);
            }
            if ($search_params["hsn_code"] != "") {
                $this->db->where("parts.hsn_code", $search_params["hsn_code"]);
            }
            
            // Apply LIKE conditions if a keyword is provided
            if (isset($search_params["value"]) && $search_params["value"] != "") {
                $keyword = $search_params["value"];
                // Group OR conditions within a WHERE block
                $this->db->group_start();
                $fields = [
                    'c.customer_name',
                    'parts.hsn_code',
                    // Add more columns as needed
                ];
                
                foreach ($fields as $field) {
                    $this->db->or_like($field, $keyword);
                }
                $this->db->group_end(); // End the group of OR conditions
            }
        }
        $this->db->group_by('parts.hsn_code');
        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];
        
        // Debugging: print the last executed query
        // pr($this->db->last_query(),1);
        
        return $ret_data;
    }
    

    public function getReceivableReportView($condition_arr = [],$search_params = ""){
        $this->db->select('s.*, 
            SUM(s.gst_amount) as gst, 
            SUM(s.total_rate) as ttlrt, 
            SUM(s.gst_amount) as gstamnt, 
            SUM(s.tcs_amount) as tcsamnt, 
            cus.customer_name, 
            cus.payment_terms, 
            rrp.payment_receipt_date,
            rrp.amount_received as amount_received, 
            rrp.transaction_details, 
            ns.created_date as created_date_val,
           rrp.tds_amount as tds_amount,
            rrp.remark as remark_val,
            ROUND(SUM(
                IF(s.total_rate > 0,s.total_rate,0) + 
                IF(s.tcs_amount > 0,s.tcs_amount,0)) - IF(rrp.amount_received > 0,rrp.amount_received,0) - 
                IF(rrp.tds_amount > 0,rrp.tds_amount,0), 
                2) AS bal_amnt,
            s.sales_id as sales_id_val');
        
        $this->db->from('sales_parts s');
        
        $this->db->join('new_sales n', 's.sales_id = n.id AND n.status != "unlocked" AND n.clientId = ' . $this->Unit->getSessionClientId(), 'inner');
        $this->db->join('new_sales ns', 'ns.id = s.sales_id', 'left');
        $this->db->join('receivable_report rrp', 'rrp.sales_number = s.sales_number', 'left');
        $this->db->join('customer cus', 's.customer_id = cus.id', 'left');
        if(is_valid_array($search_params) && $search_params['customer_part_id'] > 0){
            $this->db->where('s.customer_id', $search_params['customer_part_id']);
        }
        $this->db->group_by('s.sales_number');
        // pr($condition_arr,1);
        if($condition_arr["order_by"] == ''){    
            $this->db->order_by('s.id', 'DESC');
        }
        
        if (count($condition_arr) > 0) {
            $this->db->limit($condition_arr["length"], $condition_arr["start"]);
            if ($condition_arr["order_by"] != "") {
                $this->db->order_by($condition_arr["order_by"]);
            }
        }
        if (is_valid_array($search_params) && $search_params["status"] != "") {
                if($search_params["status"] == "Pending"){
                    $this->db->having('bal_amnt >', 0);
                }else{
                    $this->db->having('bal_amnt <=', 0);
                }
        }
        if ($search_params["date_range"] != "") {
                $date_filter =  explode((" - "),$search_params["date_range"]);
                $data['start_date'] = $date_filter[0];
                $data['end_date'] = $date_filter[1];
               $this->db->where("STR_TO_DATE(n.created_date, '%d/%m/%Y') BETWEEN '".$date_filter[0]."' AND '".$date_filter[1]."'");
        }

        if (is_valid_array($search_params) && isset($search_params["value"]) && $search_params["value"] != "") {
            $keyword = $search_params["value"];
            
            // Group OR conditions within a WHERE block
            $this->db->group_start();
            $fields = [
                's.sales_number',
                'cus.customer_name',
                'rrp.transaction_details',
                'ns.created_date',
                'rrp.payment_receipt_date',
                's.created_date'
                // Add other fields to search as needed
            ];
            
            foreach ($fields as $field) {
                $this->db->or_like($field, $keyword);
            }
            $this->db->group_end(); // End the group of OR conditions
        }

       

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];
        // pr($this->db->last_query(),1);
        return $ret_data;
    }

    public function getReceivableReportCount( $condition_arr = [],$search_params = ""){
         $this->db->select('s.*, 
            SUM(s.gst_amount) as gst, 
            SUM(s.total_rate) as ttlrt, 
            SUM(s.gst_amount) as gstamnt, 
            SUM(s.tcs_amount) as tcsamnt, 
            cus.customer_name, 
            cus.payment_terms, 
            rrp.payment_receipt_date,
            rrp.amount_received as amount_received, 
            rrp.transaction_details, 
            ns.created_date as created_date_val,
           rrp.tds_amount as tds_amount,
            rrp.remark as remark_val,
            ROUND(SUM(
                IF(s.total_rate > 0,s.total_rate,0) + 
                IF(s.tcs_amount > 0,s.tcs_amount,0)) - IF(rrp.amount_received > 0,rrp.amount_received,0) - 
                IF(rrp.tds_amount > 0,rrp.tds_amount,0), 
                2) AS bal_amnt,
            s.sales_id as sales_id_val');
        
        $this->db->from('sales_parts s');
        
        $this->db->join('new_sales n', 's.sales_id = n.id AND n.status != "unlocked" AND n.clientId = ' . $this->Unit->getSessionClientId(), 'inner');
        $this->db->join('new_sales ns', 'ns.id = s.sales_id', 'left');
        $this->db->join('receivable_report rrp', 'rrp.sales_number = s.sales_number', 'left');
        $this->db->join('customer cus', 's.customer_id = cus.id', 'left');
        if(is_valid_array($search_params) && $search_params['customer_part_id'] > 0){
            $this->db->where('s.customer_id', $search_params['customer_part_id']);
        }
        $this->db->group_by('s.sales_number');
        if (is_valid_array($search_params) && $search_params["status"] != "") {
                if($search_params["status"] == "Pending"){
                    $this->db->having('bal_amnt >', 0);
                }else{
                    $this->db->having('bal_amnt <=', 0);
                }
        }
        if ($search_params["date_range"] != "") {
                $date_filter =  explode((" - "),$search_params["date_range"]);
                $data['start_date'] = $date_filter[0];
                $data['end_date'] = $date_filter[1];
               $this->db->where("STR_TO_DATE(n.created_date, '%d/%m/%Y') BETWEEN '".$date_filter[0]."' AND '".$date_filter[1]."'");
        }

        if (is_valid_array($search_params) && isset($search_params["value"]) && $search_params["value"] != "") {
            $keyword = $search_params["value"];
            
            // Group OR conditions within a WHERE block
            $this->db->group_start();
            $fields = [
                's.sales_number',
                'cus.customer_name',
                'rrp.transaction_details',
                'ns.created_date',
                'rrp.payment_receipt_date',
                's.created_date'
                // Add other fields to search as needed
            ];
            
            foreach ($fields as $field) {
                $this->db->or_like($field, $keyword);
            }
            $this->db->group_end(); // End the group of OR conditions
        }

       

        $result_obj = $this->db->get();
        $ret_data = is_object($result_obj) ? $result_obj->result_array() : [];
        // pr($this->db->last_query(),1);
        return $ret_data;
    }
}