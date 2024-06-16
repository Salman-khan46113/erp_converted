<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once 'CommonController.php';
require_once APPPATH . 'libraries/PHPExcel/IOFactory.php';

class ExportController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
    }

    private function getPage($viewPage, $viewData)
    {
        //$this->loadView($this->getPath().$viewPage,$viewData);
        $this->loadView($viewPage, $viewData);
    }

    public function grn_excel_export()
    {
        $grn_detail_list = $this->get_grn_details();

        if (empty($grn_detail_list)) {
            $this->addWarningMessage('No records found for this export criteria.');
            $this->redirectMessage();
            exit();
        }

        $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
		$sheet = $object->getActiveSheet();
		$sheet->setTitle('Voucher');

		// Set heading values
		$headings = ["Voucher Date", "Voucher Type Name", "Voucher Number", "Reference No.", "Reference Date", "Order No(s)", "Order - Date", "Bill Type of Ref", "Bill Name", "Bill Amount", "Bill Amount - Dr/Cr",
            "Bill Due Dt or Credit Days", "Buyer/Supplier - Address", "Buyer/Supplier - Country", "Buyer/Supplier - State", "Buyer/Supplier - Pincode", "Buyer/Supplier - GSTIN/UIN",
            "Buyer/Supplier - Place of Supply", "Consignee (ship to)", "Consignee - Mailing Name", "Consignee - Address", "Consignee - Country", "Consignee - State",
            "Consignee - Pincode", "Consignee - GSTIN/UIN", "Ledger Name", "Ledger Amount", "Ledger Amount Dr/Cr", "Item Name", "Billed Quantity", "Item Rate",
            "Item Rate per", "Item Amount", "Item Allocations - Order No.", "Item Allocations - Order Due on", "Accounting Allocation - Ledger",
            "Accounting Allocation - Amount", "Change Mode"];

		// Set heading row with colors
		$sheet->fromArray([$headings], NULL, 'A1');
		$headingsStyle = array(
			'font' => array('bold' => true),
			'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'F9C40E')), 
		);
		$sheet->getStyle('A1:AL1')->applyFromArray($headingsStyle);

       
		
        if ($grn_detail_list) {
            $excel_row = 2;
            $rowNo = 1;
            foreach ($grn_detail_list as $grn_details) {
                $grn_part_details = $this->getTAXQueryData($grn_details);
			    $leger_arr = $this->getTaxDetailsUsingTaxQuery($grn_part_details);


				/* Get the final amount */
				foreach ($leger_arr as $leger_entry) {
						$name = $leger_entry["name"];
						if($name == "SUPPLIER_NAME") {
							$ledger_value = round($leger_entry["value"],2);
							$ledger_name = $leger_entry["supplier_name"];
						}
					}
		
                $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $this->getDateByFormat($grn_details->grn_date)); //grn date
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Purchase"); //HARD CODED
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $grn_details->grn_number); //grn number
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $grn_details->invoice_number); //invoice_number
                $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $this->getDateByFormat($grn_details->invoice_date)); //invoice_date

                $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $grn_details->po_number); // po_number
                $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $this->getDateByFormat($grn_details->po_date)); // po_date

                $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "New Ref"); // HARD CODED AS OF NOW
                $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $grn_details->invoice_number); // grn_number
                $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $ledger_value); // Complete AMOUNT
                $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, "cr"); // HARD CODED - Bill Amount - Dr/Cr

				//Supplier details
                $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $grn_details->credit_days." days"); //Bill Due Dt or Credit Days
                $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $grn_details->supplier_address); //Supplier Address
                $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, "India"); // HARD CODED
				$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $grn_details->supplier_state); // Supplier STATE
                $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, "PIN"); // Supplier PIN
                $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $grn_details->supplier_gst); // Supplier GST

				//buyers details
                $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $grn_details->client_shifting_address); // Buyers address

				//Client details BASED ON delivery_unit or Default client
				$object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $grn_details->client_name); //Consignee (ship to)
				$object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $grn_details->client_name); //Consignee - Mailing Name
				$object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $grn_details->client_addr); // Consignee - Address
				$object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, "India"); // Consignee - Country
				$object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $grn_details->client_state); // Consignee - State
				$object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $grn_details->client_pin); // Consignee - Pincode
				$object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $grn_details->client_gst); // Consignee - GSTIN/UIN

                $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $ledger_name); //Ledger Name
                $object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $ledger_value); //Ledger Amount
                $object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, "cr"); //Ledger Amount Dr/Cr
                $object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, ""); //Item Name
                $object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, ""); //Billed Quantity
                $object->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, ""); //Item Rate
                $object->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, ""); //Item Rate per
                $object->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, ""); //Item Amount
                $object->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, ""); //Item Allocations - Order No.
                $object->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, ""); //Item Allocations - Order Due on
                $object->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, ""); //Accounting Allocation - Ledger
                $object->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, ""); //Accounting Allocation - Amount
                $object->getActiveSheet()->setCellValueByColumnAndRow(37, $excel_row, "Item Invoice"); //Change Mode

				//Details to be added to next rows
				$excel_row++;
				$rowNo++;

                if ($grn_part_details) {
                    foreach ($grn_part_details as $grn_parts) {
						$legerTypeName = "Purchase Ims";
						if(empty($grn_parts->cgst)) {
							$legerTypeName = "Purchase Oms";
						}
						
                        $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $legerTypeName); //Ledger Name
                        $object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, round($grn_parts->rate * $grn_parts->accept_qty, 2)); //Ledger Amount
                        $object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, "dr"); //Ledger Amount Dr/Cr
                        $object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $grn_parts->part_number); //Item Name
                        $object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $grn_parts->accept_qty); //Billed Quantity
                        $object->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, $grn_parts->rate); //Item Rate
                        $object->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, $grn_parts->uom_name); //Item Rate per
                        $object->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, round($grn_parts->rate * $grn_parts->accept_qty, 2)); //Item Amount
                        $object->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, $grn_parts->poNumber); //Item Allocations - Order No.
                        $object->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, $this->getDateByFormat($grn_parts->expiry_po_date)); //Item Allocations - Order Due on PO Expiry date
                        $object->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, $legerTypeName); //Accounting Allocation - Ledger
                        $object->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, round($grn_parts->rate * $grn_parts->accept_qty, 2)); //Accounting Allocation - Amount
						
						//Each individual item to be added to next rows
						$excel_row++;
						$rowNo++;
					}
                }

				foreach ($leger_arr as $leger_entry) {
						$name = $leger_entry["name"];
						if($name != "SUPPLIER_NAME") {
							$ledger_name = $leger_entry["name"];
							$ledger_value = round($leger_entry["value"],2);
							
							$object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $ledger_name); //Ledger Name
							$object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $ledger_value); //Ledger Amount
							$object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, "dr"); //Ledger Amount Dr/Cr
							//Each individual item to be added to next rows
							$excel_row++;
							$rowNo++;

						}
					}
                $excel_row++;
                $rowNo++;
            }

            for ($i = 'A'; $i != $object->getActiveSheet()->getHighestColumn(); $i++) {
                $object->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
            }

			header('Content-Type: application/vnd.ms-excel');
			$filename = 'Tally_GRN-' . $this->current_date_time;

            header('Content-Disposition: attachment;filename="' . $filename . ".xls");
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            ob_end_clean();
            ob_start();
            $objWriter->save('php://output');
        } else {
            // echo "<script>alert('No Customer Parts Found');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        }

    }

    public function get_grn_details()
    {
        $searchYear = $this->input->post('search_year');
        $searchMonth = $this->input->post('search_month');
        $grn_ids = $this->input->post('grn_numbers');

        if(!empty($searchMonth)) {
            $updaateSearchYear = 1;
            $monthOperator_1 = ">=";
            $monthOperator_2 = "<=";
            if($searchMonth < 4) {
                $updaateSearchYear = -1;
                $monthOperator_1 = "<=";
                $monthOperator_2 = ">=";              
            }
        }
        if (!empty($searchYear)) {
            $where_condition = "
							((inward.created_year = " . $searchYear . " AND inward.created_month ".$monthOperator_1." 4)
							OR
							(inward.created_year = " . ($searchYear + $updaateSearchYear) . " AND inward.created_month ".$monthOperator_2." 3)) ";
        }

        if (empty($grn_ids) && !empty($searchMonth)) {
            $where_condition = $where_condition . " AND inward.created_month = " . $searchMonth . " ";
        }

        if (!empty($grn_ids)) {
            if (strpos($grn_ids, '-') !== false) { //range selection
                $serial_range = explode("-", $grn_ids);
                $grnNo_condition = " GRN_SERIAL_NO between " . $serial_range[0] . " AND " . $serial_range[1];
            } else if (strpos($grn_ids, ',') !== false) { //specific search
                $serial_list = explode("-", $grn_ids);
                $grnNo_condition = " GRN_SERIAL_NO in ( " . $grn_ids . " )";
            } else if (strpos($grn_ids, '-') !== false && strpos($grn_ids, ',') !== false) {
                echo "<script>alert('Incorrect GRN number criteria. Can't have both list and range.');</script>";
                exit();
            } else { //individual sales no
                $grnNo_condition = " GRN_SERIAL_NO = " . $grn_ids;
            }
        }

        
        $isMultipleClientUnit = $this->session->userdata['isMultipleClientUnits'];
        if($isMultipleClientUnit == "false") {
            $fromClient = " client c ,";
        }else {
            $innerJoinClient = " INNER JOIN client c ON c.client_unit = inward.delivery_unit ";
        }
        
        $query = "SELECT * FROM  ( SELECT inward.id as inward_id,
						po.id as po_id, po.po_number, po.po_date, po.shipping_address as place_of_supply, 
						s.supplier_name, s.location as supplier_address, s.state as supplier_state, s.gst_number as supplier_gst,
                        s.payment_terms as credit_days, 
						CAST(SUBSTRING_INDEX(inward.grn_number, '/', -1) AS UNSIGNED) AS GRN_SERIAL_NO, 
						inward.created_date, inward.grn_date, inward.grn_number, inward.invoice_number, inward.invoice_date,
						c.shifting_address as client_addr, c.state as client_state, c.pin as client_pin, c.gst_number as client_gst,
						c.client_name, c.shifting_address as client_shifting_address
						FROM ".$fromClient." inwarding inward
                        INNER JOIN new_po po ON po.id = inward.po_id
						INNER JOIN supplier s ON po.supplier_id = s.id ".
                        $innerJoinClient.
                        " WHERE inward.status = 'accept'  AND ";

        $query = $query . $where_condition . ' ) AS grn_view ';

        if (!empty($grnNo_condition)) {
            $query = $query . ' WHERE ' . $grnNo_condition . ' ORDER BY created_date desc';
        }

        $grn_detail_list = $this->Crud->customQuery($query);
        return $grn_detail_list;
    }

    public function grn_export()
    {

        $grn_detail_list = $this->get_grn_details();

        if (empty($grn_detail_list)) {
            $this->addWarningMessage('No records found for this export criteria.');
            $this->redirectMessage();
            exit();
        }
        if ($grn_detail_list) {
            foreach ($grn_detail_list as $grn_details) {
                $xmlstr = "<ENVELOPE xmlns:UDF='TallyUDF'></ENVELOPE>";
                // optionally you can specify a xml-stylesheet for presenting the results. just uncoment the following line and change the stylesheet name.
                /* "<?xml-stylesheet type='text/xsl' href='xml_style.xsl' ?>\n". */
                $xml = new SimpleXMLElement($xmlstr);
                // Add the HEADER section
                $header = $xml->addChild('HEADER');

                $header->addChild('TALLYREQUEST', 'Import Data');
                //$header->addChild('TYPE', 'Data');
                //$header->addChild('ID', 'YourID'); // Replace with your ID

                // Add the BODY section
                $body = $xml->addChild('BODY');
                $data = $body->addChild('IMPORTDATA');
                $data1 = $data->addChild('REQUESTDESC');
                $data1->addChild('REPORTNAME', 'Vouchers');
                $data2 = $data1->addChild("STATICVARIABLES");
                $data2->addChild('SVCURRENTCOMPANY', $this->getCustomerNameDetails());
                $request = $data->addChild('REQUESTDATA');
                $this->tallyMessageXML($request, $grn_details);
            }
        }

        /*
        IMPORTANT NOT SURE ON THIS --
        $TALLYMESSAGE_END = $request->addChild('TALLYMESSAGE');
        $COMPANY = $TALLYMESSAGE_END->addChild('COMPANY');
        $REMOTECMPINFO = $COMPANY->addChild('REMOTECMPINFO.LIST');
        $REMOTECMPINFO->addAttribute('MERGE', 'Yes');
        $REMOTECMPINFO->addChild('NAME', '3c9cfafd-3581-422c-b74a-b5deac32a8c8');
        $REMOTECMPINFO->addChild('REMOTECMPNAME', 'Super Polymers');
        $REMOTECMPINFO->addChild('REMOTECMPSTATE', 'Maharashtra');
         */

        $dom = dom_import_simplexml($xml)->ownerDocument;
        // Format the output with indentation and newlines
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        //$dom->loadXML($dom->saveXML(), LIBXML_NOXMLDECL);
        $xmlString = $dom->saveXML();
        $xmlStringWithoutDeclaration = preg_replace('/<\?xml version="1.0"\?>/', '', $xmlString);
        // Get the formatted XML as a string
        //$formattedXml = $dom->saveXML();
        $filename = 'Tally_GRN-' . $this->current_date_time . '.xml';
        header('Content-Type: application/xml');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Output the result
        echo $xmlStringWithoutDeclaration;

        // Output the XML
        //echo $xml->asXML();
        // Define the file path where you want to save the XML
        //echo "XML file has been saved as $filename";
        exit();
    }

    private function getTAXQueryData($grn_details)
    {
        $grn_part_details = $this->Crud->customQuery('SELECT grn.inwarding_id, inward.grn_number, grn.po_part_id, grn.po_number, inward.grn_date,
		 po.po_number as poNumber, po.supplier_id,s.supplier_name, po.expiry_po_date, po.po_date, part.part_number, part.part_description, part.hsn_code, u.uom_name,
			po_parts.tax_id, po_parts.part_id, po_parts.rate, grn.accept_qty,tax.igst, tax.sgst, tax.cgst,tax.tcs,tax.tcs_on_tax,
			ROUND(((grn.accept_qty * po_parts.rate) * tax.cgst) / 100,2) as cgst_amount,
			ROUND(((grn.accept_qty * po_parts.rate) * tax.sgst) / 100,2) as sgst_amount,
			ROUND(((grn.accept_qty * po_parts.rate) * tax.tcs) / 100,2) as tcs_amount,
			ROUND(((grn.accept_qty * po_parts.rate) * tax.igst) / 100,2) as igst_amount,
			po.loading_unloading, 	po.loading_unloading_gst, po.freight_amount, po.freight_amount_gst
			FROM grn_details grn
					INNER JOIN inwarding inward ON inward.id = grn.inwarding_id
					INNER JOIN po_parts po_parts ON po_parts.id = grn.po_part_id
					INNER JOIN new_po po ON po.id = grn.po_number
					INNER JOIN child_part part ON part.id = po_parts.part_id
					INNER JOIN uom u ON u.id = po_parts.uom_id
					INNER JOIN gst_structure tax ON tax.id = po_parts.tax_id
					INNER JOIN supplier s ON s.id = po.supplier_id
					WHERE inward.id = ' . $grn_details->inward_id);

        return $grn_part_details;

    }
    // Function to add sales data request
    public function tallyMessageXML($data, $grn_details)
    {
        // Format the DateTime object to the desired output format "Ymd"
        $dateString = '2024-02-24';
        $date = new DateTime($grn_details->po_date);
        $po_date = $date->format('Ymd');

        $tally_message = $data->addChild('TALLYMESSAGE');
        $grn_number = $grn_details->grn_number;

        //Get GUID and RANDOMID :
        $guidPartial = str_replace("-", "0", $grn_number);
        $guid = str_replace("/", "0", $guidPartial);

        $voucher_child = $tally_message->addChild('VOUCHER'); //HARD CODED
        $voucher_child->addAttribute('REMOTEID', $guid); //Fixed pattern - with sales number etc as this can be used for cancel too.
        $voucher_child->addAttribute('VCHKEY', $guid); //TO-DO : Check what should be added here..
        $voucher_child->addAttribute('VCHTYPE', 'Purchases With GST'); //Hard-Coded
        $voucher_child->addAttribute('OBJVIEW', 'Invoice Voucher View'); //Hard-Coded For detailed information

        //Hard coded values ??
        $address_list = $voucher_child->addChild('ADDRESS.LIST');
        $address_list->addAttribute('TYPE', 'String');
        $address_list->addChild('ADDRESS', $grn_details->location); //Address
        $address_list->addChild('ADDRESS', $grn_details->state); //Address

        $client = $this->Crud->customQuery('select * from client c');

        $basicbuy_address_list = $voucher_child->addChild('BASICBUYERADDRESS.LIST'); //HARD CODED
        $basicbuy_address_list->addAttribute('TYPE', 'String'); //HARD CODED
        $basicbuy_address_list->addChild('BASICBUYERADDRESS', $client[0]->address1); //Address
        $basicbuy_address_list->addChild('BASICBUYERADDRESS', $client[0]->location . ',' . $client[0]->state); //Address
        $basicbuy_address_list->addChild('BASICBUYERADDRESS', $client[0]->pin); //Address
        $basicbuy_address_list->addChild('BASICBUYERADDRESS', $client[0]->email);

        $oldAuditEntryID_list = $voucher_child->addChild('OLDAUDITENTRYIDS.LIST'); //HARD CODED
        $oldAuditEntryID_list->addAttribute('TYPE', 'Number'); //HARD CODED
        $oldAuditEntryID_list->addChild('OLDAUDITENTRYIDS', '-1'); //HARD CODED

        $voucher_child->addChild('DATE', $po_date);
        $voucher_child->addChild('REFERENCEDATE', $po_date);
        $voucher_child->addChild('VCHSTATUSDATE', $po_date);
        $voucher_child->addChild('GUID', $guid);
        $voucher_child->addChild('GSTREGISTRATIONTYPE', 'Regular'); //HARD CODED
        $voucher_child->addChild('VATDEALERTYPE', 'Regular'); //TO-DO - Not sure
        $voucher_child->addChild('STATENAME', $grn_details->state);
        $voucher_child->addChild('ENTEREDBY', $this->user_name);
        $voucher_child->addChild('OBJECTUPDATEACTION', 'Create'); //Need to check whether cancel is there or not
        $voucher_child->addChild('COUNTRYOFRESIDENCE', 'India'); //Future if comes from outside country
        $voucher_child->addChild('PARTYGSTIN', $grn_details->gst_number); //TO-DO -CROSS CHECK
        $voucher_child->addChild('PLACEOFSUPPLY', $client[0]->state); //TO-DO - SHOULD BE PER CLIENT STATE
        $voucher_child->addChild('PARTYNAME', $grn_details->supplier_name); // SUPPLIER_NAME
        $GSTREGISTRATION = $voucher_child->addChild('GSTREGISTRATION', $client[0]->state . ' Registration'); //Client_STATE
        $GSTREGISTRATION->addAttribute('TAXTYPE', 'GST'); //HARD CODED
        $GSTREGISTRATION->addAttribute('TAXREGISTRATION', $client[0]->gst_number); //Client GST

        $voucher_child->addChild('CMPGSTIN', $client[0]->gst_number); //TO-DO        //Client GST
        $voucher_child->addChild('VOUCHERTYPENAME', 'Purchases With GST'); //HARD CODED
        $voucher_child->addChild('PARTYLEDGERNAME', $grn_details->supplier_name); //SUPPLIER_NAME
        $voucher_child->addChild('VOUCHERNUMBER', $grn_details->grn_number); //GR\23-24\01106
        $voucher_child->addChild('BASICBUYERNAME', $client[0]->client_name); //CLIENT NAME
        $voucher_child->addChild('CMPGSTREGISTRATIONTYPE', 'Regular'); //HARD CODED
        $voucher_child->addChild('REFERENCE', $grn_number); //'GR-6709'
        $voucher_child->addChild('PARTYMAILINGNAME', $grn_details->supplier_name); //'STAINLESS BOLT INDUSTRIES');
        $voucher_child->addChild('PARTYPINCODE', $grn_details->pin); //IMPORTANT - '380023');//TO-DO - NEED TO HAVE THIS AS NEW FIELD
        $voucher_child->addChild('CONSIGNEEGSTIN', $grn_details->gst_number); //'27AANCS6031M1ZV');
        $voucher_child->addChild('CONSIGNEEMAILINGNAME', $client[0]->client_name); //'Sai Sound Control Systems Pvt Ltd');
        $voucher_child->addChild('CONSIGNEEPINCODE', $client[0]->pin); //'411060');
        $voucher_child->addChild('CONSIGNEESTATENAME', $client[0]->state); //'Maharashtra');
        $voucher_child->addChild('CMPGSTSTATE', $client[0]->state); //'Maharashtra');
        $voucher_child->addChild('CONSIGNEECOUNTRYNAME', 'India'); //TO-DO    NEED SUPPORT IN FUTURE
        $voucher_child->addChild('BASICBASEPARTYNAME', $grn_details->supplier_name); //'STAINLESS BOLT INDUSTRIES');
        $voucher_child->addChild('NUMBERINGSTYLE', 'Manual'); //HARD CODED
        $voucher_child->addChild('CSTFORMISSUETYPE', 'Not Applicable'); //HARD CODED
        $voucher_child->addChild('CSTFORMRECVTYPE', 'Not Applicable'); //$client[0]->state
        $voucher_child->addChild('CONSIGNEECSTNUMBER', '27575222066C'); //TO-DO        //NOT SURE ABOUT THIS IMPORTANT
        $voucher_child->addChild('FBTPAYMENTTYPE', 'Default'); //HARD CODED
        $voucher_child->addChild('PERSISTEDVIEW', 'Invoice Voucher View'); //HARD CODED - FOR DETAILED VIEW
        $voucher_child->addChild('VCHSTATUSTAXADJUSTMENT', 'Default'); //HARD CODED
        $voucher_child->addChild('VCHSTATUSVOUCHERTYPE', 'Purchases With GST'); //HARD CODED
        $voucher_child->addChild('VCHSTATUSTAXUNIT', $client[0]->state . ' Registration'); //'Maharashtra Registration');
        $voucher_child->addChild('VCHGSTCLASS', ' Not Applicable'); //HARD CODED
        $voucher_child->addChild('CONSIGNEEPINNUMBER', 'AANCS6031M'); //TO-DO    //NOT SURE ABOUT THIS - IMPORTANT
        $voucher_child->addChild('VCHENTRYMODE', 'Item Invoice'); //HARD CODED
        $voucher_child->addChild('DIFFACTUALQTY', 'No'); //HARD CODED
        $voucher_child->addChild('ISMSTFROMSYNC', 'No'); //HARD CODED
        $voucher_child->addChild('ISDELETED', 'No'); //HARD CODED
        $voucher_child->addChild('ISSECURITYONWHENENTERED', 'Yes'); //TO-DO        //NOT SURE ON THIS
        $voucher_child->addChild('ASORIGINAL', 'No'); //HARD CODED
        $voucher_child->addChild('AUDITED', 'No'); //HARD CODED
        $voucher_child->addChild('ISCOMMONPARTY', 'No'); //HARD CODED
        $voucher_child->addChild('FORJOBCOSTING', 'No'); //HARD CODED
        $voucher_child->addChild('ISOPTIONAL', 'No'); //HARD CODED
        $voucher_child->addChild('EFFECTIVEDATE', $po_date);

        $this->getHardCodedFields($voucher_child);

        $voucher_child->addChild('ALTERID', ' 162945'); //TO-DO    //NOT SURE ON THIS -- IMPORTANT
        $voucher_child->addChild('MASTERID', ' 67500'); //TO-DO    //NOT SURE ON THIS -- IMPORTANT
        $voucher_child->addChild('VOUCHERKEY', '194553428574288'); //TO-DO    //NOT SURE ON THIS -- IMPORTANT
        $voucher_child->addChild('VOUCHERRETAINKEY', '4941'); //TO-DO    //NOT SURE ON THIS -- IMPORTANT
        $voucher_child->addChild('VOUCHERNUMBERSERIES', 'Default'); //TO-DO    //HARD CODED
        //$voucher_child->addChild('UPDATEDDATETIME', '20240119105733000');            //TO-DO    //NOT SURE ON THIS -- IMPORTANT
        $voucher_child->addChild('EWAYBILLDETAILS.LIST', ''); //    HARD CODED
        $voucher_child->addChild('EXCLUDEDTAXATIONS.LIST', ''); //    HARD CODED
        $voucher_child->addChild('OLDAUDITENTRIES.LIST', ''); //    HARD CODED
        $voucher_child->addChild('ACCOUNTAUDITENTRIES.LIST', ''); //    HARD CODED
        $voucher_child->addChild('AUDITENTRIES.LIST', ''); //    HARD CODED
        $voucher_child->addChild('DUTYHEADDETAILS.LIST', ''); //    HARD CODED
        $voucher_child->addChild('GSTADVADJDETAILS.LIST', ''); //    HARD CODED

        $grn_part_details = $this->getTAXQueryData($grn_details);
        $leger_arr = $this->getTaxDetailsUsingTaxQuery($grn_part_details);

        if ($grn_part_details) {
            foreach ($grn_part_details as $grn_parts) {
                $this->allInventoryEntriesData($voucher_child, $grn_parts, $grn_details, $leger_arr);
            }
        }

        $voucher_child->addChild('CONTRITRANS.LIST', ''); //    HARD CODED
        $voucher_child->addChild('EWAYBILLERRORLIST.LIST', ''); //    HARD CODED
        $voucher_child->addChild('IRNERRORLIST.LIST', ''); //    HARD CODED
        $voucher_child->addChild('HARYANAVAT.LIST', ''); //    HARD CODED
        $voucher_child->addChild('SUPPLEMENTARYDUTYHEADDETAILS.LIST', ''); //    HARD CODED
        $INVOICEDELNOTES = $voucher_child->addChild('INVOICEDELNOTES.LIST', ''); //    HARD CODED
        $INVOICEDELNOTES->addChild('BASICSHIPPINGDATE', $po_date); //'20240108');
        $INVOICEDELNOTES->addChild('BASICSHIPDELIVERYNOTE', $grn_details->grn_number); //'GR\23-24\01106');

        $INVOICEORDERLIST = $voucher_child->addChild('INVOICEORDERLIST.LIST', ''); //    HARD CODED
        $INVOICEORDERLIST->addChild('BASICORDERDATE', $po_date); //'20240112');
        $INVOICEORDERLIST->addChild('BASICPURCHASEORDERNO', $grn_details->po_number); //'883');

        $voucher_child->addChild('INVOICEINDENTLIST.LIST', ''); //    HARD CODED
        $voucher_child->addChild('ATTENDANCEENTRIES.LIST', ''); //    HARD CODED
        $voucher_child->addChild('ORIGINVOICEDETAILS.LIST', ''); //    HARD CODED
        $voucher_child->addChild('INVOICEEXPORTLIST.LIST', ''); //    HARD CODED

        //There would be multiple entries here for ALLLEDGERENTRIES
        // Add ledger details
        foreach ($leger_arr as $leger_entry) {
            $this->grnLedgerEntries($voucher_child, $leger_entry, $grn_number);
        }

        $this->gstList($voucher_child, $grn_details);

        $voucher_child->addChild('PAYROLLMODEOFPAYMENT.LIST', ''); //HARD CODED
        $voucher_child->addChild('ATTDRECORDS.LIST', ''); //HARD CODED
        $voucher_child->addChild('GSTEWAYCONSIGNORADDRESS.LIST', ''); //HARD CODED
        $voucher_child->addChild('GSTEWAYCONSIGNEEADDRESS.LIST', ''); //HARD CODED
        $voucher_child->addChild('TEMPGSTRATEDETAILS.LIST', ''); //HARD CODED
        $voucher_child->addChild('TEMPGSTADVADJUSTED.LIST', ''); //HARD CODED

    }

    private function getTaxDetailsUsingTaxQuery($getTaxDetails)
    {
        $final_total = 0;
        $cgst_amount = 0;
        $sgst_amount = 0;
        $igst_amount = 0;
        $tcs_amount = 0;
        //$supplier_data = $this->Crud->get_data_by_id("supplier", $getTaxDetails[0]->supplier_id, "id");
        $loading_unloading_gst = $this->Crud->get_data_by_id("gst_structure", $getTaxDetails[0]->loading_unloading_gst, "id");
        $freight_amount_gst = $this->Crud->get_data_by_id("gst_structure", $getTaxDetails[0]->freight_amount_gst, "id");

        if (!empty($loading_unloading_gst)) {
            $loading_cgst_amount = ($loading_unloading_gst[0]->cgst * $getTaxDetails[0]->loading_unloading) / 100;
            $loading_sgst_amount = ($loading_unloading_gst[0]->sgst * $getTaxDetails[0]->loading_unloading) / 100;
            $loading_igst_amount = ($loading_unloading_gst[0]->igst * $getTaxDetails[0]->loading_unloading) / 100;

            $cgst_amount = $loading_cgst_amount;
            $sgst_amount = $loading_sgst_amount;
            $igst_amount = $loading_igst_amount;
        }
        if (!empty($freight_amount_gst)) {
            $freight_cgst_amount = ($freight_amount_gst[0]->cgst * $getTaxDetails[0]->freight_amount) / 100;
            $freight_sgst_cgst = ($freight_amount_gst[0]->sgst * $getTaxDetails[0]->freight_amount) / 100;
            $freight_igst_cgst = ($freight_amount_gst[0]->igst * $getTaxDetails[0]->freight_amount) / 100;
            $cgst_amount = $cgst_amount + $freight_cgst_amount;
            $sgst_amount = $sgst_amount + $freight_sgst_cgst;
            $igst_amount = $igst_amount + $freight_igst_cgst;
        }

        foreach ($getTaxDetails as $p) {
            if ((int) $p->igst === 0) {
                $total_cgst_sgst_amount = $p->cgst_amount + $p->sgst_amount;
                $gst = (int) $p->cgst + (int) $p->sgst;
                $cgst = (int) $p->cgst;
                $sgst = (int) $p->sgst;
                $tcs = (float) $p->tcs;
                $tcs_on_tax = $p->tcs_on_tax;
                $igst = 0;
            } else {
                $total_igst_amount = $p->igst_amount;
                $gst = (int) $p->igst;
                $cgst = 0;
                $sgst = 0;
                $tcs = (float) $p->tcs;
                $tcs_on_tax = $p->tcs_on_tax;
                $igst = $gst;
            }

            $part_rate_new = $p->rate;
            $total_amount = $p->accept_qty * $part_rate_new;
            $final_total = $final_total + $total_amount;

            $cgst_amount = $cgst_amount + $p->cgst_amount;
            $sgst_amount = $sgst_amount + $p->sgst_amount;
            $igst_amount = $igst_amount + $p->igst_amount;

            if ($tcs_on_tax == "no") {
                $tcs_amount = $tcs_amount + (($total_amount * $tcs) / 100);
            } else {
                $tcs_amount = $tcs_amount + ((((float) $p->cgst_amount + (float) $p->sgst_amount
                     + (float) $p->igst_amount + (float) $total_amount) * $tcs) / 100);
            }

        }

        $final_total = $final_total + $getTaxDetails[0]->loading_unloading + $getTaxDetails[0]->freight_amount;
        $final_final_amount = $final_total + $cgst_amount + $sgst_amount + $igst_amount + $tcs_amount;

        /**
         * Note: We have storing gst rates same as that of any part as 99.99% all the parts
         * which are having same tax brackets will be added to a PO.
         */
        $leger_arr = array(
            array(
                "name" => "SUPPLIER_NAME",
                "value" => round($final_final_amount, 2),
                "supplier_name" => $getTaxDetails[0]->supplier_name,
            ));

        if ($getTaxDetails[0]->freight_amount > 0) {
            // New entry to be added
            $newEntry = array(
                "name" => "Freight Charges",
                "value" => round($getTaxDetails[0]->freight_amount, 2),
                // "gstRate" => $tcs,
            );
            $leger_arr[] = $newEntry;
        }

        if ($getTaxDetails[0]->loading_unloading > 0) {
            // New entry to be added
            $newEntry = array(
                "name" => "Loading Unloading Charges",
                "value" => round($getTaxDetails[0]->loading_unloading, 2),
                // "gstRate" => $tcs,
            );
            $leger_arr[] = $newEntry;
        }


        if ($cgst_amount > 0) {
            // New entry to be added
            $newEntry = array(
                "name" => "CGST",
                "value" => round($cgst_amount, 2),
                "gstRate" => $cgst,
            );
            $leger_arr[] = $newEntry;
        }

        if ($sgst_amount > 0) {
            // New entry to be added
            $newEntry = array(
                "name" => "SGST",
                "value" => round($sgst_amount, 2),
                "gstRate" => $sgst,
            );
            $leger_arr[] = $newEntry;
        }

        if ($igst_amount > 0) {
            // New entry to be added
            $newEntry = array(
                "name" => "IGST",
                "value" => round($igst_amount, 2),
                "gstRate" => $igst,
            );
            $leger_arr[] = $newEntry;
        }

        if ($tcs_amount > 0) {
            // New entry to be added
            $newEntry = array(
                "name" => "TCS",
                "value" => round($tcs_amount, 2),
                "gstRate" => $tcs,
            );
            $leger_arr[] = $newEntry;
        }

		return $leger_arr;

    }

    /**
     * GST List PART
     */
    private function gstList($voucher_child, $grn_details)
    {
        $GST_LIST = $voucher_child->addChild('GST.LIST', ''); //HARD CODED
        $GST_LIST->addChild('PURPOSETYPE', 'GST'); //HARD CODED
        $STAT_LIST = $GST_LIST->addChild('STAT.LIST', ''); //HARD CODED
        $STAT_LIST->addChild('PURPOSETYPE', 'GST'); //HARD CODED
        $STAT_LIST->addChild('STATKEY', '202347188' . $grn_details->gst_number . 'Inward Invoice' . $grn_details->grn_number); //TO-DO    //NOT SURE WHAT IS THIS IMPORTANT
        $STAT_LIST->addChild('ISFETCHEDONLY', 'No'); //HARD CODED
        $STAT_LIST->addChild('ISDELETED', 'No'); //TO-DO    MAY CHANGE BASED ON DETAILS IMPORTANT
        $STAT_LIST->addChild('TALLYCONTENTUSER.LIST', ''); //HARD CODED
    }

    /**
     * Ledger entries for each part
     */
    private function grnLedgerEntries($voucher_child, $ledger_entry, $grn_number)
    {

        //Legder entries for each part ---
        $LEDGERENTRIES = $voucher_child->addChild('LEDGERENTRIES.LIST', ''); //HARD CODED
        $OLDAUDITENTRYIDS_list = $LEDGERENTRIES->addChild('OLDAUDITENTRYIDS.LIST', ''); //HARD CODED
        $OLDAUDITENTRYIDS_list->addAttribute('TYPE', 'Number'); //HARD CODED
        $OLDAUDITENTRYIDS_list->addChild('OLDAUDITENTRYIDS', '-1'); //HARD CODED

        $name = $ledger_entry["name"];
        $value = $ledger_entry["value"];
        $gstRate = $ledger_entry["gstRate"];

        if ($name == "SUPPLIER_NAME") {
            $LEDGERENTRIES->addChild('LEDGERNAME', $ledger_entry["supplier_name"]); //SUPPLIER NAME
            $LEDGERENTRIES->addChild('ISDEEMEDPOSITIVE', 'No'); //HARD CODED
            $LEDGERENTRIES->addChild('ISLASTDEEMEDPOSITIVE', 'No'); //HARD CODED
            $LEDGERENTRIES->addChild('ISPARTYLEDGER', 'Yes'); //HARD CODED
            $LEDGERENTRIES->addChild('AMOUNT', $value); //TO-DO

            $bill_allocations = $LEDGERENTRIES->addChild('BILLALLOCATIONS.LIST');
            $bill_allocations->addChild('NAME', $grn_number); //'12233');
            $bill_allocations->addChild('BILLTYPE', 'Total'); //New Ref
            $bill_allocations->addChild('TDSDEDUCTEEISSPECIALRATE', 'No'); //HARD CODED
            $bill_allocations->addChild('AMOUNT', $value);

            $LEDGERENTRIES->addChild('STBILLCATEGORIES.LIST', ''); //TO-DO

        } else {

            $LEDGERENTRIES->addChild('LEDGERNAME', $name); //TO-DO
            $LEDGERENTRIES->addChild('APPROPRIATEFOR', ' Not Applicable'); //HARD CODED
            $LEDGERENTRIES->addChild('ROUNDTYPE', 'Not Applicable'); //HARD CODED
            $LEDGERENTRIES->addChild('ISDEEMEDPOSITIVE', 'Yes'); //HARD CODED
            $LEDGERENTRIES->addChild('ISLASTDEEMEDPOSITIVE', 'Yes'); //HARD CODED
            $LEDGERENTRIES->addChild('ISPARTYLEDGER', 'No'); //HARD CODED
            $LEDGERENTRIES->addChild('AMOUNT', '-' . $value); //TO-DO
            $LEDGERENTRIES->addChild('VATEXPAMOUNT', '-' . $value); //TO-DO
            $LEDGERENTRIES->addChild('BILLALLOCATIONS.LIST', ''); //TO-DO
        }

        //Common for all the ledger entries...
        $LEDGERENTRIES->addChild('GSTCLASS', 'Not Applicable'); //TO-DO
        $LEDGERENTRIES->addChild('INTERESTCOLLECTION.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('SERVICETAXDETAILS.LIST', ''); //TO-DO

        $LEDGERENTRIES->addChild('BANKALLOCATIONS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('LEDGERFROMITEM', 'No'); //TO-DO
        $LEDGERENTRIES->addChild('REMOVEZEROENTRIES', 'No'); //TO-DO
        $LEDGERENTRIES->addChild('GSTOVERRIDDEN', 'No'); //TO-DO
        $LEDGERENTRIES->addChild('ISGSTASSESSABLEVALUEOVERRIDDEN', 'No'); //TO-DO
        $LEDGERENTRIES->addChild('STRDISGSTAPPLICABLE', 'No'); //TO-DO
        $LEDGERENTRIES->addChild('STRDGSTISPARTYLEDGER', 'No'); //TO-DO
        $LEDGERENTRIES->addChild('STRDGSTISDUTYLEDGER', 'No'); //TO-DO
        $LEDGERENTRIES->addChild('CONTENTNEGISPOS', 'No'); //TO-DO
        $LEDGERENTRIES->addChild('ISCAPVATTAXALTERED', 'No'); //TO-DO
        $LEDGERENTRIES->addChild('ISCAPVATNOTCLAIMED', 'No'); //TO-DO

        $LEDGERENTRIES->addChild('OLDAUDITENTRIES.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('ACCOUNTAUDITENTRIES.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('AUDITENTRIES.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('INPUTCRALLOCS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('DUTYHEADDETAILS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('EXCISEDUTYHEADDETAILS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('RATEDETAILS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('SUMMARYALLOCS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('CENVATDUTYALLOCATIONS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('STPYMTDETAILS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('EXCISEPAYMENTALLOCATIONS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('TAXBILLALLOCATIONS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('TAXOBJECTALLOCATIONS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('TDSEXPENSEALLOCATIONS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('VATSTATUTORYDETAILS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('COSTTRACKALLOCATIONS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('REFVOUCHERDETAILS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('INVOICEWISEDETAILS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('VATITCDETAILS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('ADVANCETAXDETAILS.LIST', ''); //TO-DO
        $LEDGERENTRIES->addChild('TAXTYPEALLOCATIONS.LIST', ''); //TO-DO
    }

    /**
     * All inventory entries - i.e. PO parts
     */
    private function allInventoryEntriesData($voucher_child, $grn_parts, $grn_details, $rate_entries)
    {

        //All inventory entries    - i.e ALL PART ENTRIES
        $ALLINVENTORYENTRIES = $voucher_child->addChild('ALLINVENTORYENTRIES.LIST', ''); //HARD CODE
        $ALLINVENTORYENTRIES->addChild('STOCKITEMNAME', $grn_parts->part_description); //'APL SS 304 HEX BOLT M14X50');  //TO-DO
        $ALLINVENTORYENTRIES->addChild('GSTOVRDNINELIGIBLEITC', ' Not Applicable'); //HARD CODE
        $ALLINVENTORYENTRIES->addChild('GSTOVRDNISREVCHARGEAPPL', ' Not Applicable'); //HARD CODE
        $ALLINVENTORYENTRIES->addChild('GSTOVRDNTAXABILITY', 'Taxable'); //HARD CODE
        $ALLINVENTORYENTRIES->addChild('GSTSOURCETYPE', 'Ledger'); //HARD CODE
        $ALLINVENTORYENTRIES->addChild('GSTLEDGERSOURCE', 'Purchase Oms'); //TO-DO    //NOT SURE ON THIS IMPORTANT
        $ALLINVENTORYENTRIES->addChild('HSNSOURCETYPE', 'Stock Item'); //HARD CODE
        $ALLINVENTORYENTRIES->addChild('HSNITEMSOURCE', $grn_parts->part_description); //'APL SS 304 HEX BOLT M14X50');    //TO-DO
        $ALLINVENTORYENTRIES->addChild('GSTOVRDNSTOREDNATURE', ''); //'Interstate Purchase - Taxable');//NEED TO CHECK ON THIS IMPORTANT
        $ALLINVENTORYENTRIES->addChild('GSTOVRDNTYPEOFSUPPLY', 'Goods'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('GSTRATEINFERAPPLICABILITY', 'As per Masters/Company'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('GSTHSNNAME', $grn_parts->hsn_code); //'7318');
        $ALLINVENTORYENTRIES->addChild('GSTHSNINFERAPPLICABILITY', 'As per Masters/Company'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('ISDEEMEDPOSITIVE', 'Yes'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('ISGSTASSESSABLEVALUEOVERRIDDEN', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('STRDISGSTAPPLICABLE', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('CONTENTNEGISPOS', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('ISLASTDEEMEDPOSITIVE', 'Yes'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('ISAUTONEGATE', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('ISCUSTOMSCLEARANCE', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('ISTRACKCOMPONENT', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('ISTRACKPRODUCTION', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('ISPRIMARYITEM', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('ISSCRAP', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('RATE', $grn_parts->rate . '/' . $grn_parts->uom_name); //'74.80/Nos.');//
        //$ALLINVENTORYENTRIES->addChild('DISCOUNT', ' 71');//TO-DO                        //NOT APPLICABLE IN AROM SO FAR
        $ALLINVENTORYENTRIES->addChild('AMOUNT', '-' . ($grn_parts->rate * $grn_parts->accept_qty)); //1084.60
        $ALLINVENTORYENTRIES->addChild('ACTUALQTY', $grn_parts->accept_qty . ' ' . $grn_parts->uom_name); //' 50.00 Nos.');
        $ALLINVENTORYENTRIES->addChild('BILLEDQTY', $grn_parts->accept_qty . ' ' . $grn_parts->uom_name); //' 50.00 Nos.');

        $BATCHALLOCATIONS = $ALLINVENTORYENTRIES->addChild('BATCHALLOCATIONS.LIST', ''); //HARD CODED
        $BATCHALLOCATIONS->addChild('GODOWNNAME', 'Main Location'); //HARD CODED
        $BATCHALLOCATIONS->addChild('BATCHNAME', 'Primary Batch'); //HARD CODED
        $BATCHALLOCATIONS->addChild('DESTINATIONGODOWNNAME', 'Main Location'); //TO-DO //HARD CODED
        $BATCHALLOCATIONS->addChild('INDENTNO', ' Not Applicable'); //TO-DO
        $BATCHALLOCATIONS->addChild('ORDERNO', $grn_details->po_number); //'883');
        $BATCHALLOCATIONS->addChild('TRACKINGNUMBER', $grn_details->grn_number); //'GR\23-24\01106');
        $BATCHALLOCATIONS->addChild('DYNAMICCSTISCLEARED', 'No'); //HARD CODED
        $BATCHALLOCATIONS->addChild('AMOUNT', '-' . ($grn_parts->rate * $grn_parts->accept_qty)); //'-1084.60');
        $BATCHALLOCATIONS->addChild('ACTUALQTY', $grn_parts->accept_qty . ' ' . $grn_parts->uom_name); //' 50.00 Nos.');
        $BATCHALLOCATIONS->addChild('BILLEDQTY', $grn_parts->accept_qty . ' ' . $grn_parts->uom_name); //' 50.00 Nos.');
        $ORDERDUEDATE = $BATCHALLOCATIONS->addChild('ORDERDUEDATE', $grn_details->po_date); //'8-Jan-24');
        $ORDERDUEDATE->addAttribute('JD', '45298'); //TO-DO -NOT SURE WHAT IS THIS IMPORTANT
        $ORDERDUEDATE->addAttribute('P', $grn_details->po_date); //'8-Jan-24');
        $BATCHALLOCATIONS->addChild('ADDITIONALDETAILS.LIST', ''); //HARD CODED
        $BATCHALLOCATIONS->addChild('VOUCHERCOMPONENTLIST.LIST', ''); //HARD CODED

        $ACCOUNTINGALLOCATIONS = $ALLINVENTORYENTRIES->addChild('ACCOUNTINGALLOCATIONS.LIST', ''); //HARD CODED
        $OLDAUDITENTRYIDS_new = $ACCOUNTINGALLOCATIONS->addChild('OLDAUDITENTRYIDS.LIST'); //HARD CODED
        $OLDAUDITENTRYIDS_new->addAttribute('TYPE', 'Number'); //HARD CODED
        $OLDAUDITENTRYIDS_new->addChild('OLDAUDITENTRYIDS', '-1'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('LEDGERNAME', 'Purchase Oms'); //TO-DO    WHAT IS THIS IMPORTANT ? Purchase GST PER TALLY DEFINED
        $ACCOUNTINGALLOCATIONS->addChild('GSTCLASS', ' Not Applicable'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('ISDEEMEDPOSITIVE', 'Yes'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('LEDGERFROMITEM', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('REMOVEZEROENTRIES', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('ISPARTYLEDGER', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('GSTOVERRIDDEN', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('ISGSTASSESSABLEVALUEOVERRIDDEN', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('STRDISGSTAPPLICABLE', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('STRDGSTISPARTYLEDGER', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('STRDGSTISDUTYLEDGER', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('CONTENTNEGISPOS', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('ISLASTDEEMEDPOSITIVE', 'Yes'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('ISCAPVATTAXALTERED', 'No'); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('ISCAPVATNOTCLAIMED', 'No'); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('AMOUNT', '-' . ($grn_parts->rate * $grn_parts->accept_qty)); //1084.60
        //$ACCOUNTINGALLOCATIONS->addChild('AMOUNT', '-1084.60');                                    //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('SERVICETAXDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('BANKALLOCATIONS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('BILLALLOCATIONS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('INTERESTCOLLECTION.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('OLDAUDITENTRIES.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('ACCOUNTAUDITENTRIES.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('AUDITENTRIES.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('INPUTCRALLOCS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('DUTYHEADDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('EXCISEDUTYHEADDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('RATEDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('SUMMARYALLOCS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('CENVATDUTYALLOCATIONS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('STPYMTDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('EXCISEPAYMENTALLOCATIONS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('TAXBILLALLOCATIONS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('TAXOBJECTALLOCATIONS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('TDSEXPENSEALLOCATIONS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('VATSTATUTORYDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('COSTTRACKALLOCATIONS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('REFVOUCHERDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('INVOICEWISEDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('VATITCDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('ADVANCETAXDETAILS.LIST', ''); //HARD CODED
        $ACCOUNTINGALLOCATIONS->addChild('TAXTYPEALLOCATIONS.LIST', ''); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('DUTYHEADDETAILS.LIST', ''); //HARD CODED

        if ($rate_entries != null) {
            foreach ($rate_entries as $rate) {
                if ("SUPPLIER_NAME" == $rate["name"]) {
                    continue;
                }

                $RATEDETAILS = $ALLINVENTORYENTRIES->addChild('RATEDETAILS.LIST', ''); //HARD CODED
                $RATEDETAILS->addChild('GSTRATEDUTYHEAD', $rate["name"]); //PER TAX NAME
                $RATEDETAILS->addChild('GSTRATEVALUATIONTYPE', 'Based on Value'); //HARD CODED
                $RATEDETAILS->addChild('GSTRATE', $rate["gstRate"]); //'18');
            }
        }

        $ALLINVENTORYENTRIES->addChild('SUPPLEMENTARYDUTYHEADDETAILS.LIST', ''); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('TAXOBJECTALLOCATIONS.LIST', ''); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('REFVOUCHERDETAILS.LIST', ''); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('EXCISEALLOCATIONS.LIST', ''); //HARD CODED
        $ALLINVENTORYENTRIES->addChild('EXPENSEALLOCATIONS.LIST', ''); //HARD CODED
    }

    private function getHardCodedFields($voucher_child)
    {
        $voucher_child->addChild('USEFOREXCISE', 'No'); //        HARD CODED
        $voucher_child->addChild('ISFORJOBWORKIN', 'No'); //    HARD CODED
        $voucher_child->addChild('ALLOWCONSUMPTION', 'No'); //    HARD CODED
        $voucher_child->addChild('USEFORINTEREST', 'No'); //    HARD CODED
        $voucher_child->addChild('USEFORGAINLOSS', 'No'); //    HARD CODED
        $voucher_child->addChild('USEFORGODOWNTRANSFER', 'No'); //    HARD CODED
        $voucher_child->addChild('USEFORCOMPOUND', 'No'); //    HARD CODED
        $voucher_child->addChild('USEFORSERVICETAX', 'No'); //    HARD CODED
        $voucher_child->addChild('ISREVERSECHARGEAPPLICABLE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISSYSTEM', 'No'); //    HARD CODED
        $voucher_child->addChild('ISFETCHEDONLY', 'No'); //    HARD CODED
        $voucher_child->addChild('ISGSTOVERRIDDEN', 'No'); //    HARD CODED
        $voucher_child->addChild('ISCANCELLED', 'No'); //    HARD CODED
        $voucher_child->addChild('ISONHOLD', 'No'); //    HARD CODED
        $voucher_child->addChild('ISSUMMARY', 'No'); //
        $voucher_child->addChild('ISECOMMERCESUPPLY', 'No'); //    HARD CODED
        $voucher_child->addChild('ISBOENOTAPPLICABLE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISGSTSECSEVENAPPLICABLE', 'No'); //    HARD CODED
        $voucher_child->addChild('IGNOREEINVVALIDATION', 'No'); //    HARD CODED
        $voucher_child->addChild('CMPGSTISOTHTERRITORYASSESSEE', 'No'); //    HARD CODED
        $voucher_child->addChild('PARTYGSTISOTHTERRITORYASSESSEE', 'No'); //    HARD CODED
        $voucher_child->addChild('IRNJSONEXPORTED', 'No'); //    HARD CODED
        $voucher_child->addChild('IRNCANCELLED', 'No'); //    HARD CODED
        $voucher_child->addChild('IGNOREGSTCONFLICTINMIG', 'No'); //    HARD CODED
        $voucher_child->addChild('ISOPBALTRANSACTION', 'No'); //    HARD CODED
        $voucher_child->addChild('IGNOREGSTFORMATVALIDATION', 'No'); //    HARD CODED
        $voucher_child->addChild('ISELIGIBLEFORITC', 'Yes'); //    HARD CODED
        $voucher_child->addChild('UPDATESUMMARYVALUES', 'No'); //    HARD CODED
        $voucher_child->addChild('ISEWAYBILLAPPLICABLE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISDELETEDRETAINED', 'No'); //    HARD CODED
        $voucher_child->addChild('ISNULL', 'No'); //    HARD CODED
        $voucher_child->addChild('ISEXCISEVOUCHER', 'No'); //    HARD CODED
        $voucher_child->addChild('EXCISETAXOVERRIDE', 'No'); //    HARD CODED
        $voucher_child->addChild('USEFORTAXUNITTRANSFER', 'No'); //    HARD CODED
        $voucher_child->addChild('ISEXER1NOPOVERWRITE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISEXF2NOPOVERWRITE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISEXER3NOPOVERWRITE', 'No'); //    HARD CODED
        $voucher_child->addChild('IGNOREPOSVALIDATION', 'No'); //    HARD CODED
        $voucher_child->addChild('EXCISEOPENING', 'No'); //    HARD CODED
        $voucher_child->addChild('USEFORFINALPRODUCTION', 'No'); //    HARD CODED
        $voucher_child->addChild('ISTDSOVERRIDDEN', 'No'); //    HARD CODED
        $voucher_child->addChild('ISTCSOVERRIDDEN', 'No'); //    HARD CODED
        $voucher_child->addChild('ISTDSTCSCASHVCH', 'No'); //    HARD CODED
        $voucher_child->addChild('INCLUDEADVPYMTVCH', 'No'); //    HARD CODED
        $voucher_child->addChild('ISSUBWORKSCONTRACT', 'No'); //    HARD CODED
        $voucher_child->addChild('ISVATOVERRIDDEN', 'No'); //    HARD CODED
        $voucher_child->addChild('IGNOREORIGVCHDATE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISVATPAIDATCUSTOMS', 'No'); //    HARD CODED
        $voucher_child->addChild('ISDECLAREDTOCUSTOMS', 'No'); //    HARD CODED
        $voucher_child->addChild('VATADVANCEPAYMENT', 'No'); //    HARD CODED
        $voucher_child->addChild('VATADVPAY', 'No'); //    HARD CODED
        $voucher_child->addChild('ISCSTDELCAREDGOODSSALES', 'No'); //    HARD CODED
        $voucher_child->addChild('ISVATRESTAXINV', 'No'); //    HARD CODED
        $voucher_child->addChild('ISSERVICETAXOVERRIDDEN', 'No'); //    HARD CODED
        $voucher_child->addChild('ISISDVOUCHER', 'No'); //    HARD CODED
        $voucher_child->addChild('ISEXCISEOVERRIDDEN', 'No'); //    HARD CODED
        $voucher_child->addChild('ISEXCISESUPPLYVCH', 'No'); //    HARD CODED
        $voucher_child->addChild('GSTNOTEXPORTED', 'No'); //    HARD CODED
        $voucher_child->addChild('IGNOREGSTINVALIDATION', 'No'); //    HARD CODED
        $voucher_child->addChild('ISGSTREFUND', 'No'); //    HARD CODED
        $voucher_child->addChild('OVRDNEWAYBILLAPPLICABILITY', 'No'); //    HARD CODED
        $voucher_child->addChild('ISVATPRINCIPALACCOUNT', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHSTATUSISVCHNUMUSED', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISINCLUDED', 'Yes'); //        HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISUNCERTAIN', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISEXCLUDED', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISAPPLICABLE', 'Yes'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISGSTR2BRECONCILED', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISGSTR2BONLYINPORTAL', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISGSTR2BONLYINBOOKS', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISGSTR2BMISMATCH', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISGSTR2BINDIFFPERIOD', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISRETEFFDATEOVERRDN', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISOVERRDN', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISSTATINDIFFDATE', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISRETINDIFFDATE', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSMAINSECTIONEXCLUDED', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISBRANCHTRANSFEROUT', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHGSTSTATUSISSYSTEMSUMMARY', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHSTATUSISUNREGISTEREDRCM', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHSTATUSISOPTIONAL', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHSTATUSISCANCELLED', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHSTATUSISDELETED', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHSTATUSISOPENINGBALANCE', 'No'); //    HARD CODED
        $voucher_child->addChild('VCHSTATUSISFETCHEDONLY', 'No'); //    HARD CODED
        $voucher_child->addChild('PAYMENTLINKHASMULTIREF', 'No'); //    HARD CODED
        $voucher_child->addChild('ISSHIPPINGWITHINSTATE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISOVERSEASTOURISTTRANS', 'No'); //    HARD CODED
        $voucher_child->addChild('ISDESIGNATEDZONEPARTY', 'No'); //    HARD CODED
        $voucher_child->addChild('HASCASHFLOW', 'No'); //    HARD CODED
        $voucher_child->addChild('ISPOSTDATED', 'No'); //    HARD CODED
        $voucher_child->addChild('USETRACKINGNUMBER', 'No'); //    HARD CODED
        $voucher_child->addChild('ISINVOICE', 'Yes'); //    HARD CODED
        $voucher_child->addChild('MFGJOURNAL', 'No'); //    HARD CODED
        //$voucher_child->addChild('HASDISCOUNTS', 'Yes');//    HARD CODED
        $voucher_child->addChild('ASPAYSLIP', 'No'); //    HARD CODED
        $voucher_child->addChild('ISCOSTCENTRE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISSTXNONREALIZEDVCH', 'No'); //    HARD CODED
        $voucher_child->addChild('ISEXCISEMANUFACTURERON', 'No'); //    HARD CODED
        $voucher_child->addChild('ISBLANKCHEQUE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISVOID', 'No'); //    HARD CODED
        $voucher_child->addChild('ORDERLINESTATUS', 'No'); //    HARD CODED
        $voucher_child->addChild('VATISAGNSTCANCSALES', 'No'); //    HARD CODED
        $voucher_child->addChild('VATISPURCEXEMPTED', 'No'); //    HARD CODED
        $voucher_child->addChild('ISVATRESTAXINVOICE', 'No'); //    HARD CODED
        $voucher_child->addChild('VATISASSESABLECALCVCH', 'No'); //    HARD CODED
        $voucher_child->addChild('ISVATDUTYPAID', 'Yes'); //    HARD CODED
        $voucher_child->addChild('ISDELIVERYSAMEASCONSIGNEE', 'No'); //    HARD CODED
        $voucher_child->addChild('ISDISPATCHSAMEASCONSIGNOR', 'No'); //    HARD CODED
        $voucher_child->addChild('ISDELETEDVCHRETAINED', 'No'); //    HARD CODED
        $voucher_child->addChild('CHANGEVCHMODE', 'No'); //    HARD CODED
        $voucher_child->addChild('RESETIRNQRCODE', 'No'); //    HARD CODED

    }
}
