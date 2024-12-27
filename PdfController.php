<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PdfController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/karachi');
    $this->user_name = $this->session->userdata('user_name');
    $this->user_id = $this->session->userdata('user_id');
    $this->current_date = date('d-m-Y');
    $this->current_time = date('h:i:s');


    $d = date_parse_from_format("d-m-Y", $this->current_date);
    $this->date = $d["day"];
    $this->month = $d["month"];
    $this->year = $d["year"];

    // $this->oj_user_name = $this->session->userdata('oj_user_name');
    // $this->oj_id =$this->session->userdata('oj_id');
    // $this->cart_total = $this->Common_admin_model->get_sum_column("cart_items","toal_amount","customer_id",$this->oj_id);

    // $this->user_details = $this->Common_admin_model->get_data_by_id("users",$this->oj_id,"id");
    // $this->cart_items= $this->Common_admin_model->full_puter_join($this->oj_id);
    // $this->current_date = date('Y-m-d');
    // $this->current_time = date('h:i:s');
    // $this->orders_users = $this->Common_admin_model->get_data_by_id("orders",$this->oj_id,"customer_id");

  }

  public function generate_invoice()
  {
    $new_po_id = $this->uri->segment('2');

    $client_data = $this->Crud->read_data("client");

    $new_po_data = $this->Crud->get_data_by_id("new_po", $new_po_id, "id");
    // print_r($new_po_data);
    // echo "<br>";
    $supplier_data = $this->Crud->get_data_by_id("supplier", $new_po_data[0]->supplier_id, "id");
    // print_r($supplier_data);
    // echo "<br>";
    $po_parts_data = $this->Crud->get_data_by_id("po_parts", $new_po_data[0]->id, "po_id");
    // print_r($po_parts_data);
    // echo "<br>";
    $parts_html = "";
    $final_total = 0;
    $cgst_amount = 0;
    $sgst_amount = 0;
    $igst_amount = 0;
    $tcs_amount = 0;
    $with_in_state = "";
    $i = 1;
    foreach ($po_parts_data as $p) {
      $part_data_new = $this->Crud->get_data_by_id("child_part_master", $p->part_id, "child_part_id");
      $with_in_state = $supplier_data[0]->with_in_state;
      $uom_data = $this->Crud->get_data_by_id("uom", $p->uom_id, "id");
      $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");
      $part_data_new2 = $this->Crud->get_data_by_id("child_part", $part_data_new[0]->part_number, "part_number");
      $supplier_data = $this->Crud->get_data_by_id("supplier", $part_data_new[0]->supplier_id, "id");
      $payment_terms = "";
      if ($supplier_data) {
        $payment_terms = $supplier_data[0]->payment_terms;
      }

      if ($part_data_new2) {
        $hsn_code = $part_data_new2[0]->hsn_code;
      } else {
        $hsn_code = "";
      }



      if ((int)$gst_structure_data[0]->igst === 0) {
        $gst = (int)$gst_structure_data[0]->cgst + (int)$gst_structure_data[0]->sgst;
        $cgst = (int)$gst_structure_data[0]->cgst;
        $sgst = (int)$gst_structure_data[0]->sgst;
        $tcs = (float)$gst_structure_data[0]->tcs;
        $tcs_on_tax = $gst_structure_data[0]->tcs_on_tax;
        $igst = 0;
      } else {
        $gst = (int)$gst_structure_data[0]->igst;
        $cgst = 0;
        $sgst = 0;
        $tcs = (float)$gst_structure_data[0]->tcs;
        $tcs_on_tax = $gst_structure_data[0]->tcs_on_tax;
        $igst = $gst;
      }


      $gst_amount = ($gst * $part_data_new[0]->part_rate) / 100;
      $final_amount = $gst_amount + $part_data_new[0]->part_rate;
      $final_row_amount = $final_amount * $p->qty;

      // $final_total = $final_total + $final_row_amount;
      $total_amount = $p->qty * $part_data_new[0]->part_rate;
      $final_total = $final_total + $total_amount;

      $cgst_amount = $cgst_amount + (($total_amount * $cgst) / 100);
      $sgst_amount = $sgst_amount + (($total_amount * $sgst) / 100);
      $igst_amount = $igst_amount + (($total_amount * $igst) / 100);

      if ($gst_structure_data[0]->tcs_on_tax == "no") {
        $tcs_amount =  $tcs_amount + (($total_amount * $tcs) / 100);
      } else {
        $tcs_amount =  $tcs_amount + ((($cgst_amount + $sgst_amount + $igst_amount + $total_amount) * $tcs) / 100);
      }




      if ($with_in_state == "yes") {
        $parts_html .= '
        <tr>
            <td>' . $i . '</td>
            <td colspan="3">' . $part_data_new[0]->part_number . ' / ' . $part_data_new[0]->part_description . '</td>
            <td>' .  $hsn_code . '</td>
            <td>' . $part_data_new[0]->part_rate . '</td>
            <td>' . $p->qty . '</td>
            <td>' . $uom_data[0]->uom_name . '</td>
            <td>' . $cgst . '</td>
            <td>' . $sgst . '</td>
            <td>' . number_format((float)$total_amount, 2, '.', '') . '</td>
        
        </tr>
        ';
      } else {
        $parts_html .= '
        <tr>
            <td>' . $i . '</td>
            <td colspan="3">' . $part_data_new[0]->part_number . ' / ' . $part_data_new[0]->part_description . '</td>
            <td colspan="2">' .  $hsn_code . '</td>
            <td>' . $part_data_new[0]->part_rate . '</td>
            <td>' . $p->qty . '</td>
            <td>' . $uom_data[0]->uom_name . '</td>
            <td>' . $igst . '</td>
            <td>' . number_format((float)$total_amount, 2, '.', '') . '</td>
        
        </tr>
        ';
      }

      $i++;
    }


    $final_final_amount = $final_total + $cgst_amount + $sgst_amount + $igst_amount + $tcs_amount;


    //     <tr>
    // <th>
    //     </th>
    // </tr>

    if ($with_in_state == "yes") {
      $tax = '
      <th>CGST % </th>
      <th>SGST % </th>
      ';

      $colspan1 = 10;
      $description_colspan = 3;
      $footer_gst = ' <tr>
      <th colspan="' . $colspan1 . '" style="text-align:right">CGST </th>
      <th>' .  number_format((float)$cgst_amount, 2, '.', '') . '</th>
    </tr>
    <tr>
      <th colspan="' . $colspan1 . '" style="text-align:right">SGST </th>
      <th>'  . number_format((float)$sgst_amount, 2, '.', '') . '</th>
    </tr>';
    } else {
      $tax = '
      <th>IGST % </th>
      ';
      $colspan1 = 10;
      $description_colspan = 4;
      $footer_gst = '
      <tr>
      <th colspan="' . $colspan1 . '" style="text-align:right">IGST </th>
      <th>' .  number_format((float)$igst_amount, 2, '.', '') . '</th>
    </tr>
      
      
    ';
    }


    $html_content = '
       
    <html>
    <head>
    <style>
    html { margin: 0px}
    </style></head>
    <body>
    <table style="width:100%" border="1px">
    <tr>
       </tr>
        <tr>
            <th colspan="11" style="text-align:center">Purchase Order</th>
        </tr>
        <tr>
            <th colspan="11" style="text-align:center">'.$client_data[0]->client_name.'</th>
        </tr>
        <tr>
        <td colspan="4"><b> To,</b></td>
    <td colspan="7">
    <b> PO NO.:- </b>
   ' . $new_po_data[0]->po_number . '</td>
    </tr>
    <tr>
    <td colspan="7">
    ' . $supplier_data[0]->supplier_name . ' <br>
    ' . $supplier_data[0]->location . ' <br>
   <b> GSTIN- </b>' . $supplier_data[0]->gst_number . ' <br>
   <b>TELEPHONE No:  </b> ' . $supplier_data[0]->mobile_no . ' <br></td>
    <td colspan="4">
    <b> PO Date : </b>
   ' . $new_po_data[0]->po_date . '
    <br>
    <b>Po Amendment No :</b> ' . $new_po_data[0]->amendment_no . '
    <br>
   
    <b>Po Amendment Date:</b> ' . $new_po_data[0]->amendment_date . '
    <br>
 
   <b>Po Expiry  Date :</b> ' . $new_po_data[0]->expiry_po_date . '
    <br>
   

    </td>
   
    </tr>
    <tr>
    <td colspan="7">
       <b>Billing Address:</b> <br>
          ' . $client_data[0]->billing_address . '
        <b>GSTIN -</b>' . $client_data[0]->gst_number . '
        <b>Mob No: </b>  ' . $client_data[0]->phone_no . '
          </td>
          <td  colspan="4">
          <b> Shipping Address:</b>
          <br>
          ' . $client_data[0]->shifting_address . ' 
          </td>     
    </tr>
    <tr>
          <th>Sr No</th>
          <th colspan="' . $description_colspan . '">Description Of Goods </th>
          <th>HSN Code </th>
          <th>Rate/Unit  </th>
          <th>QTY </th>
          <th>UOM </th>
          ' . $tax . '
          <th>Total Amount (Rs)</th>
    </tr>
      ' . $parts_html . '
     
      </table>
      <footer style="position:absolute;bottom:0; width:100%">
      <table style="width:100%" border="1px">
     
      <tr>
      <th colspan="' . $colspan1 . '" style="text-align:right">Subtotal </th>
      <th>'  . number_format((float)$final_total, 2, '.', '') . '</th>
    </tr>
   
    ' . $footer_gst . '
    
    <tr>
    <th colspan="' . $colspan1 . '" style="text-align:right">TCS </th>
    <th>' .  number_format((float)$tcs_amount, 2, '.', '') . '</th>
      </tr>
        <tr>
          <th colspan="' . $colspan1 . '" style="text-align:right">Grand Total (Rs) </th>
          <th>' . number_format((float)$final_final_amount, 2, '.', '') . '</th>
        </tr>
      
        <tr>
          <td colspan="11"><b>Note :</b> <br> 1.PDIR & MTC Required with each lot. Pls mention PO No. on Invoice.
          <br>
          2.Rejection if any will be debited to suppliers account
          <br>

          <b> G. S. T.: </b> GST Extra. <br>
          <b> Delivery :</b>   Door Delivery. <br>
          
          <b> Validity :</b>  30 Days from date of purchase order <br>
          
          <b> Payment Terms : </b> ' . $payment_terms . ' days after GRN clearance <br> 
          
          <h4 style="text-align: right;margin-right:10px"> For, Yash Plastrotech</h4> 
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>
          <h4 style="text-align: right;margin-right:25px"> Authorized Signature </h4>

          <b> Remark : </b> ' . $new_po_data[0]->remark . ' <br> 

        
        
        </td>

      </tr>
    

        
          </footer>
          </table>
        
        </body>
        </html>
          


            
       ';



    $this->pdf->loadHtml($html_content);
    $this->pdf->render();
    $this->pdf->stream("PO-Order.pdf", array("Attachment" => 1));
  }

    public function generate_sales_invoice()
  {
    $new_sales_id = $this->uri->segment('2');
    $copy = $this->uri->segment('3');

    $client_data = $this->Crud->read_data("client");

    $new_sales_data = $this->Crud->get_data_by_id("new_sales", $new_sales_id, "id");
    // print_r($new_po_data);
    // echo "<br>";
    $customer_data = $this->Crud->get_data_by_id("customer", $new_sales_data[0]->customer_id, "id");
    // print_r($supplier_data);
    // echo "<br>";
    $po_parts_data = $this->Crud->get_data_by_id("sales_parts", $new_sales_id, "sales_id");
    // print_r($po_parts_data);
    // echo "<br>";
    $parts_html = "";
    $final_total = 0;
    $cgst_amount = 0;
    $sgst_amount = 0;
    $igst_amount = 0;
    $tcs_amount = 0;
    $height = "350px";

    $i = 1;
    foreach ($po_parts_data as $p) {
      // echo $p->part_id;
      // echo "<br>";
      $child_part_data = $this->Crud->get_data_by_id("customer_part", $p->part_id, "id");
      $customer_part_rate = $this->Crud->get_data_by_id("customer_part_rate", $p->part_id, "customer_master_id");
      $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");
      $payment_terms = "";
      $hsn_code = $child_part_data[0]->hsn_code;
      if ((int)$gst_structure_data[0]->igst === 0) {
        $gst = (int)$gst_structure_data[0]->cgst + (int)$gst_structure_data[0]->sgst;
        $cgst = (int)$gst_structure_data[0]->cgst;
        $sgst = (int)$gst_structure_data[0]->sgst;
        $tcs = (int)$gst_structure_data[0]->tcs;
        $igst = 0;
        $total_gst_percentage = $cgst + $sgst;
      } else {
        $gst = (int)$gst_structure_data[0]->igst;
        $tcs = (int)$gst_structure_data[0]->tcs;
        $cgst = 0;
        $sgst = 0;
        $igst = $gst;
        $total_gst_percentage = $igst;
      }


      $gst_amount = ($gst * $customer_part_rate[0]->rate) / 100;
      $final_amount = $gst_amount + $customer_part_rate[0]->rate;
      $final_row_amount = $final_amount * $p->qty;

      // $final_total = $final_total + $final_row_amount;
      $total_amount = $p->qty * $customer_part_rate[0]->rate;
      $final_total = $final_total + $total_amount;

      $cgst_amount = $cgst_amount + (($total_amount * $cgst) / 100);
      $sgst_amount = $sgst_amount + (($total_amount * $sgst) / 100);
      $igst_amount = $igst_amount + (($total_amount * $igst) / 100);

      if ($gst_structure_data[0]->tcs_on_tax == "no") {
        $tcs_amount =  $tcs_amount + (($total_amount * $tcs) / 100);
      } else {
        $tcs_amount =  $tcs_amount + ((($cgst_amount + $sgst_amount + $igst_amount + $total_amount) * $tcs) / 100);
      }







      $parts_html .= '
    <tr style="font-size:14px">
        <td style="width:20px;">' . $i . '</td>
        <td>' . $child_part_data[0]->part_number .  '</td>
        <td colspan="4" style="width:300px;">' . $child_part_data[0]->part_description . '</td>
        



        <td>' .  $hsn_code . '</td>
        <td>' . $p->uom_id . '</td>
        <td>' . $p->qty . '</td>

        <td>' . $customer_part_rate[0]->rate . '</td>
      
        <td colspan="2">' . number_format((float)$total_amount, 2, '.', '') . '</td>
    
    </tr>
    ';
      $i++;
    }

    if ($i == 2) {
      $height = "200px";
    }
    if ($i == 3) {
      $height = "200px";
    }
    if ($i == 4) {
      $height = "200px";
    }
    if ($i == 5) {
      $height = "200px";
    }
    if ($i >= 6) {
      $height = "200px";
    }
    if ($i >= 7) {
      $height = "200px";
    }if ($i >= 8) {
      $height = "200px";
    }if ($i >= 9) {
      $height = "200px";
    }if ($i >= 10) {
      $height = "200px";
    }if ($i >= 11) {
      $height = "30px";
    }if ($i >= 12) {
      $height = "0px";
    }if ($i >= 13) {
      $height = "0px";
    }if ($i >= 14) {
      $height = "0px";
    }if ($i >= 15) {
      $height = "0px";
    }



    $final_final_amount = $final_total + $cgst_amount + $sgst_amount + $igst_amount + $tcs_amount;


    //     <tr>
    // <th>
    //     </th>
    // </tr>


    $html_content = '
     
    
    
        <html>
        <head>
        <style>
        html { margin: 0px}
        </style></head>
        <body>

        <table border="1px">

        <tr>
      
        <th colspan="12" style="text-align:right; font-size:10px">' . $copy . ' </th>

  </tr>
        


        <tr>
      
              <th colspan="12" style="text-align:center; font-size:16px">TAX INVOICE</th>

      
        </tr>


        <tr style="font-size:12px;text-align:center">

                   


                   <th colspan="12">

                       <b style="margin-top:-100px;font-size:25px">' . $client_data[0]->client_name . '
                       </b>      
                   </th>

        </tr>
        <tr style="font-size:14px">
              <td colspan="6" >

              
             <b>PAN NO :</b ' . $client_data[0]->pan_no . '
        <br>
        <b>GST NO :</b>' . $client_data[0]->gst_number . '
        <br>
        <b>STATE</b>  : ' . $client_data[0]->state . '
        <br>
        <b>STATE CODE </b>: ' . $client_data[0]->state_no . '
        <br>
        
        </td>

        <td colspan="6">
        <b>Invoice NO.:</b> ' . $new_sales_data[0]->sales_number . '
        <br>
        <b>Invoice Date . :</b>' . $po_parts_data[0]->created_date . '<br>
        <b>Time of Supply </b> . :' . $po_parts_data[0]->created_time . '<br>
        WHETHER TAX ON REVERSE CHARGE  : No <br>

        </td>
        </tr>
       
       
        <tr style="font-size:14px">
        <td colspan="6">
        <b>Details of Receiver (Billed To)</b><br> 
        ' . $customer_data[0]->customer_name . '<br>
        ' . $customer_data[0]->billing_address . ' 
        <br>
        <b>STATE </b>: ' . $customer_data[0]->state . '
        <br>
        <b>STATE CODE </b>: ' . $customer_data[0]->state_no . '
        <br>
        <b>PAN NO : </b>' . $customer_data[0]->pan_no . '
        <br>
        <b>GST NO </b>: ' . $customer_data[0]->gst_number . '
        
        </td>
      
        <td colspan="6">
        <b> Details of Consignee (Shipped to)</b> ,
        <br>
        ' . $customer_data[0]->customer_name . '<br>
        ' . $customer_data[0]->shifting_address . ' 
        
        <br>
        <b>STATE : </b>' . $customer_data[0]->state . '
        <br>
        <b>STATE CODE :</b> ' . $customer_data[0]->state_no . '
        <br>
        <b> PAN NO :</b> ' . $customer_data[0]->pan_no . '
        <br>
        <b>GST NO :</b> ' . $customer_data[0]->gst_number . '
        
        </td>
       
        </tr>
        <tr  style="font-size:14px">
        <td colspan="6">
        
        <b>PO Number  :</b>' . $new_sales_data[0]->expiry_po_date . '     
        

        <b style="margin-left:10px">PO Date  :</b>' . $new_sales_data[0]->po_date . '
        </td>
        <td colspan="6">
        <b>Vendor Code  . :</b>' . $customer_data[0]->vendor_code . '<br>
    
        </td>
   
        
        </tr>
        
        <tr style="font-size:12px;text-align:center">
              <th style="width:20px;">Sr No</th>
              <th style="width:90px;" >Part Number </th>
              <th colspan="4" style="width:240px;">Part Description </th>
           

              <th style="width:70px;" >HSN / SAC </th>
              <th style="width:40px;">UOM </th>
              <th style="width:40px;">QTY </th>
              <th style="width:20px;">Rate/Unit  </th>
             
              <th colspan="2">Amount (Rs)</th>
        </tr>
          ' . $parts_html . '
          <tr>
            <td colspan="12" style="height:' . $height . '"></td>
          </tr>

          <tr style="font-size:12px">
            <td rowspan="3" colspan="7">

            <b>
            Mode Of Transport : ' . $new_sales_data[0]->mode . ' <br> <br> 
            Transporter : ' . $new_sales_data[0]->transporter . ' <br> <br>
            Vehicle No : ' . $new_sales_data[0]->vehicle_number . ' <br> <br>
            L.R No : ' . $new_sales_data[0]->lr_number . ' <br> <br>
            </b>
            
          

            </td>
          
            <th colspan="3" style="text-align:right">SUB TOTAL </th>
            <th colspan="2">'  . number_format((float)$final_total, 2, '.', '') . '</th>
          </tr>

          <tr style="font-size:12px">
            <th colspan="3" style="text-align:right">CGST ' . $cgst . '%</th>
            <th colspan="2">' .  number_format((float)$cgst_amount, 2, '.', '') . '</th>
          </tr>
          
          <tr style="font-size:12px">
            <th colspan="3" style="text-align:right">SGST  ' . $sgst . '%</th>
            <th colspan="2">'  . number_format((float)$sgst_amount, 2, '.', '') . '</th>
          </tr>
          <tr style="font-size:12px">
          <td rowspan="3" colspan="7">

           
            
            <b>Payment Terms : ' . $customer_data[0]->payment_terms . '</b> <br><br>
            <span><b>Bank Details :</b> ' . $client_data[0]->bank_details . '</span><br> <br>
            <b>Electronic Reference No.</b> <br> <br>
            <span> <b>Invoice Value (In Words):</b> ' . $this->getIndianCurrency(number_format((float)$final_final_amount, 2, '.', '')) . '</span> 
            

            </td>

            <th colspan="3" style="text-align:right">IGST ' . $igst . '%</th>
            <th colspan="2">' .  number_format((float)$igst_amount, 2, '.', '') . '</th>
          </tr>
          <tr style="font-size:12px">
            <th colspan="3" style="text-align:right">TCS ' . $tcs . '%</th>
            <th colspan="2">' .  number_format((float)$tcs_amount, 2, '.', '') . '</th>
          </tr>
          
          <tr style="font-size:12px">
            <th colspan="3" style="text-align:right">GRAND TOTAL (Rs) </th>
            <th colspan="2">' . number_format((float)$final_final_amount, 2, '.', '') . '</th>
          </tr>


          <tr style="font-size:9px">
            <td colspan="6">
            

         <p>We hereby certify that my/our registration certificate under the Goods and Service Tax
                Act, 2017 is in force on the date on which the sale of the goods specified in this Tax
                invoice is made by me/us and that the transaction of sale covered by this taxinvoice has
                been effected by me/us and it shall be accounted for in the turnover of sales while filling
                of return and the due tax. If any, payable on the sale has been paid or shall be paid
                <br>
                Certified that the particulars given above are true and correct and the amount indicated
                represents the price actully charged and that there is no flow of additional consideration
    directly or indirectly from byuer.
    Interest @24% P.A. will be charged on all overdue invoices.<br>
    Subject To Pune Jurisdiction
                  
               
              </p>
             
             
              
           
           
          
          
          
          </td>
          <td colspan="3" >
          <br>
          <br>
          <br>
          <br>  
          <br>
          <br>

          <h4 style="text-align: left;margin-left:25px; font-size:11px"> Receiver Signature </h4>
          </td>
          <td colspan="3" >
          
          <h4 style="text-align: right;margin-right:25px; font-size:12px"> For, '.$this->getCustomerNameDetails().' </h4>
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>
          <br>
          <br>


          <h4 style="text-align: right;margin-right:25px; font-size:11px"> Authorized Signatory </h4>
         
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>

          </td>

         
        </tr>

      
        
        </table>

        </body>
      </html>


     ';


    // echo $html_content;

    $this->pdf->loadHtml($html_content);
    $this->pdf->render();
    $this->pdf->stream("Sales-Invoice-Order.pdf", array("Attachment" => 1));
  }


  // public function generate_sales_invoice()
  // {
  //   $new_sales_id = $this->uri->segment('2');
  //   $copy = $this->uri->segment('3');

  //   $client_data = $this->Crud->read_data("client");

  //   $new_sales_data = $this->Crud->get_data_by_id("new_sales", $new_sales_id, "id");

  //   $customer_data = $this->Crud->get_data_by_id("customer", $new_sales_data[0]->customer_id, "id");
    
  //   $po_parts_data = $this->Crud->get_data_by_id("sales_parts", $new_sales_id, "sales_id");
   
  //   $parts_html = "";
  //   $final_total = 0;
  //   $cgst_amount = 0;
  //   $sgst_amount = 0;
  //   $igst_amount = 0;
  //   $tcs_amount = 0;
  //   $height = "310px";

  //   $payment_terms = $customer_data[0]->payment_terms;
  
  //   $i = 1;
  //   foreach ($po_parts_data as $p) {
     
  //     $child_part_data = $this->Crud->get_data_by_id("customer_part", $p->part_id, "id");
  //     $customer_part_rate = $this->Crud->get_data_by_id("customer_part_rate", $p->part_id, "customer_master_id");
  //     $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");

  //     $hsn_code = $child_part_data[0]->hsn_code;
  //     if ((int)$gst_structure_data[0]->igst === 0) {
  //       $gst = (int)$gst_structure_data[0]->cgst + (int)$gst_structure_data[0]->sgst;
  //       $cgst = (int)$gst_structure_data[0]->cgst;
  //       $sgst = (int)$gst_structure_data[0]->sgst;
  //       $igst = 0;
  //       $tcs = (float)$gst_structure_data[0]->tcs;
  //       $tcs_on_tax = $gst_structure_data[0]->tcs_on_tax;
  //       $total_gst_percentage = $cgst + $sgst;
  //     } else {
  //       $gst = (int)$gst_structure_data[0]->igst;
  //       $cgst = 0;
  //       $sgst = 0;
  //       $igst = $gst;
  //       $tcs = (float)$gst_structure_data[0]->tcs;
  //       $tcs_on_tax = $gst_structure_data[0]->tcs_on_tax;

  //       $total_gst_percentage = $igst;
  //     }




  //     $gst_amount = ($gst * $customer_part_rate[0]->rate) / 100;
  //     $final_amount = $gst_amount + $customer_part_rate[0]->rate;
  //     $final_row_amount = $final_amount * $p->qty;

  //     $total_amount = $p->qty * $customer_part_rate[0]->rate;
  //     $final_total = $final_total + $total_amount;

  //     $cgst_amount = $cgst_amount + (($total_amount * $cgst) / 100);
  //     $sgst_amount = $sgst_amount + (($total_amount * $sgst) / 100);
  //     $igst_amount = $igst_amount + (($total_amount * $igst) / 100);

  //     if ($gst_structure_data[0]->tcs_on_tax == "no") {
  //       $tcs_amount =  $tcs_amount + (($total_amount * $tcs) / 100);
  //     } else {
  //       $tcs_amount =  $tcs_amount + ((($cgst_amount + $sgst_amount + $igst_amount + $total_amount) * $tcs) / 100);
  //     }





  //     $parts_html .= '
  //   <tr style="font-size:12px">
  //       <td>' . $i . '</td>
  //       <td>' . $child_part_data[0]->part_number .  '</td>
  //       <td>' . $child_part_data[0]->part_description . '</td>
  //       <td>' .  $hsn_code . '</td>
  //       <td>' . $customer_part_rate[0]->rate . '</td>
  //       <td>' . $p->qty . '</td>
  //       <td>' . $p->uom_id . '</td>
  //       <td>' . $cgst . '</td>
  //       <td>' . $sgst . '</td>
  //       <td colspan="2">' . $igst . '</td>
      
  //       <td>' . number_format((float)$total_amount, 2, '.', '') . '</td>
    
  //   </tr>
  //   ';
  //     $i++;
  //   }

  //   if ($i == 2) {
  //     $height = "300px";
  //   }
  //   if ($i == 3) {
  //     $height = "250px";
  //   }
  //   if ($i == 4) {
  //     $height = "250px";
  //   }
  //   if ($i == 5) {
  //     $height = "280px";
  //   }
  //   if ($i == 6) {
  //     $height = "200px";
  //   }
  //   if ($i == ' . $colspan1 . ') {
  //     $height = "180px";
  //   }
  //   if ($i == 8) {
  //     $height = "160px";
  //   }
  //   if ($i == 9) {
  //     $height = "140px";
  //   }
  //   if ($i == 10) {
  //     $height = "120px";
  //   }


  //   $final_final_amount = $final_total + $cgst_amount + $sgst_amount + $igst_amount + $tcs_amount;


  //   $html_content = '
     
    
    
  //       <html>
  //       <head>
  //       <style>
  //       html { margin: 0px}
  //       </style></head>
  //       <body>

  //       <table border="1px" cellspacing="1px">
  //       <tr style="font-size:12px">
  //       <th colspan="12" style="text-align:center;font-size:12px">CHALLAN-CUM TAX INVOICE</th>
      
  //       </tr>
  //       <tr style="font-size:12px">
  //                  <th colspan="2" rowspan="2" style="text-align:center">    
                   
  //                  <img width="47.5px" height="60px"   src="tulasi.jpg" alt="cart-image">
                  
  //                  </th>
  //                  <th colspan="6" rowspan="2">
  //                  <b style="margin-top:-100px">' . $client_data[0]->client_name . '
  //                  ,
  //                  ' . $client_data[0]->billing_address . '</b>
                  
  //                  </th>
                 
                 
                 

                      
                   
  //                  </th>
  //           <th colspan="4">' . $copy . ' COPY</th>

  //       </tr>
  //       <tr style="font-size:12px">
  //             <td colspan="4" >
  //            <b>PAN NO :</b>  ' . $client_data[0]->pan_no . '
  //       <br>
  //       <b>GST NO</b> : ' . $client_data[0]->gst_number . '
  //       <br>
  //       <b>STATE</b> : ' . $client_data[0]->state . '
  //       <br>
  //       <b>STATE CODE</b> : ' . $client_data[0]->state_no . '
  //       <br>
      
  //       </td>
  //       </tr>
       
  //       <tr style="font-size:12px">
  //       <td colspan="7"><b>Mode Of Transpot :</b> By Road <br>
  //       <b>Vehicle No : </b><br>
  //       <b>Date & Time : </b> <br>
  //       <b>Vendor Code No :</b> ' . $customer_data[0]->vendor_code . ' <br>
  //       </td>
  //       <td colspan="5"><b>Invoice NO.</b>:- ' . $new_sales_data[0]->sales_number . '
  //       <br>
  //       <b> Invoice Date . </b>:' . $po_parts_data[0]->created_date . '<br>
  //       <b> P.O. NO : </b>' . $new_sales_data[0]->expiry_po_date . '<br>

  //       <b> PO Date . :</b>' . $new_sales_data[0]->po_date . '<br>

  //       </td>
        
  //       </tr>
  //       <tr style="font-size:12px">
  //       <td colspan="4">
  //       <b>Details Of Receivers( Billed To )</b><br> 
  //       ' . $customer_data[0]->customer_name . 'br>
  //       ' . $customer_data[0]->billing_address . '
  //       </td>
  //       <td colspan="4">
  //       <b>PAN NO : </b>' . $customer_data[0]->pan_no . '
  //       <br>
  //       <b>GST NO : </b>' . $customer_data[0]->gst_number . '
  //       <br>
  //       <b>State : </b>' . $customer_data[0]->state . '
  //       <br>
  //       <b>STATE CODE : </b>' . $customer_data[0]->state_no . '
  //       <br>
  //       </td>
  //       <td colspan="4">
  //       <b>Details Of Consignee (Ship To)</b> ,
  //       <br>
  //       ' . $customer_data[0]->customer_name . '<br>
  //       ' . $customer_data[0]->shifting_address . ' 
  //       </td>
       
  //       </tr>
        
  //       <tr style="font-size:10px">
  //             <td><b> Sr No</b></td>
  //             <td><b>Part Number</b> </td>
  //             <td><b>Part Description</b>  </td>
  //             <td><b> HSN Code</b> </td>
  //             <td><b> Rate/Unit </b> </td>
  //             <td><b>QTY</b>  </td>
  //             <td><b>UOM</b> </td>
  //             <td><b>CGST %</b </td>
  //             <td><b>SGST %</b> </td>
  //             <td colspan="2"><b>IGST %</b> </td>
              
  //             <td><b>Total Amount (Rs)</b></td>
  //       </tr>
      
  //         ' . $parts_html . '
  //         <tr style="border=0px">
  //         <td colspan="12" style="height:' . $height . '"></td>
  //         </tr>
  //         <tr style="font-size:10px">
  //           <td rowspan="6" colspan="6">
  //           <span><b>GST Amount In Words :</b>  ' . $this->getIndianCurrency(number_format((float)$cgst_amount + $sgst_amount + $igst_amount, 2, '.', '')) . '</span> 

  //           <br><br>
  //           <span><b>Grand Total Amount In Words :</b>  ' . $this->getIndianCurrency(number_format((float)$final_final_amount, 2, '.', '')) . '</span> 

  //           <span></span>
  //             <br><br>
  //           <b>Payment Terms In Days : </b>' . $customer_data[0]->payment_terms . '
  //             <br><br>
  //           <b>Bank Details : </b>' . $client_data[0]->bank_details . '
  //           </td>
  //           <th colspan="5" style="text-align:right">Subtotal </th>
  //           <th>'  . number_format((float)$final_total, 2, '.', '') . '</th>
  //         </tr>
  //         <tr style="font-size:10px">
  //           <th colspan="5" style="text-align:right">CGST ' . $cgst . '%</th>
  //           <th>' .  number_format((float)$cgst_amount, 2, '.', '') . '</th>
  //         </tr>
          
  //         <tr style="font-size:10px">
  //           <th colspan="5" style="text-align:right">SGST  ' . $sgst . '%</th>
  //           <th>'  . number_format((float)$sgst_amount, 2, '.', '') . '</th>
  //         </tr>
  //         <tr style="font-size:10px">
  //           <th colspan="5" style="text-align:right">IGST ' . $igst . '%</th>
  //           <th>' .  number_format((float)$igst_amount, 2, '.', '') . '</th>
  //         </tr>
  //         <tr style="font-size:10px">
  //           <th colspan="5" style="text-align:right">TCS  ' . $tcs . '%</th>
  //           <th>' .  number_format((float)$tcs_amount, 2, '.', '') . '</th>
  //         </tr>
          
  //         <tr style="font-size:10px">
  //           <th colspan="5" style="text-align:right"><b>Grand Total (Rs)</b>  </th>
  //           <th><b>' . number_format((float)$final_final_amount, 2, '.', '') . '</b> </th>
  //         </tr>


  //         <tr style="font-size:9px">
  //           <td colspan="6">
            

  //        <p style="font-size:12px">We hereby certify that my/our registration certificate under the Goods and Service Tax
  //               Act, 2017 is in force on the date on which the sale of the goods specified in this Tax
  //               invoice is made by me/us and that the transaction of sale covered by this taxinvoice has
  //               been effected by me/us and it shall be accounted for in the turnover of sales while filling
  //               of return and the due tax. If any, payable on the sale has been paid or shall be paid.
  //               <br>
  //               Certified that the particulars given above are true and correct and the amount indicated
  //               represents the price actully charged and that there is no flow of additional consideration
  //     directly or indirectly from byuer.
  //     Interest @24% P.A. will be charged on all overdue invoices.<br>
  //     Subject To Pune Jurisdiction
              
               
  //             </p>
             
             
              
           
           
          
          
          
  //         </td>
  //         <td colspan="6" >
  //         <br>
  //         <h4 style="text-align: right;margin-right:25px"> For, Yash Plastrotech</h4>
  //         <h6 style="text-align: right">  </h6>
  //         <h6 style="text-align: right">  </h6>
  //         <h6 style="text-align: right">  </h6>
  //         <br>
  //         <br>
  //         <h4 style="text-align: right;margin-right:25px"> Authorized Signature </h4>
      
  //         <h6 style="text-align: right">  </h6>
  //         <h6 style="text-align: right">  </h6>

  //         </td>

         
  //       </tr>

  //       <tr style="font-size:10px">
        
  //       <td colspan="12" style="text-align:right">     <br>
  //       <br>     <h4 style="text-align: left;margin-left:25px"> Receiver Signature </h4>
  //       </td>
  //       </tr>
        
  //       </table>

  //       </body>
  //     </html>


  //    ';

  //   $this->pdf->loadHtml($html_content);
  //   $this->pdf->render();
  //   $this->pdf->stream("Sales-Invoice-Order.pdf", array("Attachment" => 1));
  // }

  public function create_debit_note()
  {
    $debit_note_id = $this->uri->segment('2');

    $client_data = $this->Crud->read_data("client");

    $rejection_flow_data = $this->Crud->get_data_by_id("rejection_flow", $debit_note_id, "id");

    $type = "";
    if ($rejection_flow_data[0]->type == "stock_rejection") {
      $type = "Stock Rejection";
    } else  if ($rejection_flow_data[0]->type == "MDR") {
      $type = "MDR";
    } else  if ($rejection_flow_data[0]->type == "grn_rejection") {
      $type = "GRN Rejection";
    }
    // print_r($new_po_data);
    // echo "<br>";
    $supplier = $this->Crud->get_data_by_id("supplier", $rejection_flow_data[0]->supplier_id, "id");
    // print_r($supplier_data);
    // echo "<br>";
    // print_r($po_parts_data);
    // echo "<br>";
    $parts_html = "";
    $final_total = 0;
    $cgst_amount = 0;
    $sgst_amount = 0;
    $igst_amount = 0;
    $tcs_amount = 0;
    $height = "310px";
    $payment_terms = "";

    // $supplier_data = $this->Crud->get_data_by_id("supplier", $part_data_new[0]->supplier_id, "id");
    // $payment_terms = "";
    // if ($supplier_data) {
    //   $payment_terms = $supplier_data[0]->payment_terms;
    // }

    $i = 1;
    foreach ($rejection_flow_data as $p) {
      $p->part_id;
      // echo "<br>";
      $child_part_data = $this->Crud->get_data_by_id("child_part", $p->part_id, "id");
      $data_old = array(
        'supplier_id' => $rejection_flow_data[0]->supplier_id,
        'child_part_id' => $p->part_id,

      );

      $child_part_master_data = $this->Common_admin_model->get_data_by_id_multiple_condition("child_part_master", $data_old);

      $uom_data = $this->Crud->get_data_by_id("uom", $child_part_data[0]->uom_id, "id");

      // print_r($child_part_master_data);
      $customer_part_rate = (float)$child_part_master_data[0]->part_rate;
      $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $child_part_master_data[0]->gst_id, "id");
      // $gst_structure_data = $child_part_master_data[0]->gst_id;
      $hsn_code = $child_part_data[0]->hsn_code;
      if ((int)$gst_structure_data[0]->igst === 0) {
        $gst = (int)$gst_structure_data[0]->cgst + (int)$gst_structure_data[0]->sgst;
        $cgst = (int)$gst_structure_data[0]->cgst;
        $sgst = (int)$gst_structure_data[0]->sgst;
        $igst = 0;
        $tcs = (float)$gst_structure_data[0]->tcs;
        $tcs_on_tax = $gst_structure_data[0]->tcs_on_tax;
        $total_gst_percentage = $cgst + $sgst;
      } else {
        $gst = (int)$gst_structure_data[0]->igst;
        $cgst = 0;
        $sgst = 0;
        $igst = $gst;
        $tcs = (float)$gst_structure_data[0]->tcs;
        $tcs_on_tax = $gst_structure_data[0]->tcs_on_tax;

        $total_gst_percentage = $igst;
      }
      $gst_amount = ($gst * $customer_part_rate) / 100;
      $final_amount = $gst_amount + $customer_part_rate;
      $final_row_amount = $final_amount * $p->qty;
      // $final_total = $final_total + $final_row_amount;
      $total_amount = $p->qty * $customer_part_rate;
      $final_total = $final_total + $total_amount;
      $cgst_amount = $cgst_amount + (($total_amount * $cgst) / 100);
      $sgst_amount = $sgst_amount + (($total_amount * $sgst) / 100);
      $igst_amount = $igst_amount + (($total_amount * $igst) / 100);

      if ($gst_structure_data[0]->tcs_on_tax == "no") {
        $tcs_amount =  $tcs_amount + (($total_amount * $tcs) / 100);
      } else {
        $tcs_amount =  $tcs_amount + ((($cgst_amount + $sgst_amount + $igst_amount + $total_amount) * $tcs) / 100);
      }





      $parts_html .= '
    <tr style="font-size:10px">
        <td>' . $i . '</td>
        <td>' . $child_part_data[0]->part_number .  '</td>
        <td>' . $child_part_data[0]->part_description . '</td>
        <td>' .  $hsn_code . '</td>
        <td>' . $customer_part_rate . '</td>
        <td>' . $p->qty . '</td>
        <td>' . $uom_data[0]->uom_name . '</td>

        <td>' . $cgst . '</td>
        <td>' . $sgst . '</td>
        <td>' . $igst . '</td>
        <td>' . $tcs . '</td>
        <td>' . number_format((float)$total_amount, 2, '.', '') . '</td>
    
    </tr>
    ';
      $i++;
    }

    if ($i == 2) {
      $height = "300px";
    }
    if ($i == 3) {
      $height = "250px";
    }
    if ($i == 4) {
      $height = "250px";
    }
    if ($i == 5) {
      $height = "280px";
    }
    if ($i == 6) {
      $height = "200px";
    }
    if ($i == ' . $colspan1 . ') {
      $height = "180px";
    }
    if ($i == 8) {
      $height = "160px";
    }
    if ($i == 9) {
      $height = "140px";
    }
    if ($i == 10) {
      $height = "120px";
    }


    $final_final_amount = $final_total + $cgst_amount + $sgst_amount + $igst_amount + $tcs_amount;


    //     <tr>
    // <th>
    //     </th>
    // </tr>


    $html_content = '
     
    
    
        <html>
        <head>
        <style>
        html { margin: 0px}
        </style></head>
        <body>

        <table border="1px" cellspacing="1px">
        <tr style="font-size:12px">
        <th colspan="12" style="text-align:center;font-size:12px">Debit Note :' . $type . ' </th>
      
        </tr>
        <tr style="font-size:12px">
                   <th colspan="2" rowspan="2" style="text-align:center">    
                   
                  
                   </th>
                   <th colspan="6" rowspan="2">
                   <b style="margin-top:-100px">' . $client_data[0]->client_name . '
                   ,
                   ' . $client_data[0]->billing_address . '</b>
                  
                   </th>
                 
                   </th>
                   <th colspan="4"></th>
         

        </tr>
        <tr style="font-size:12px">
              <td colspan="4" >

        <b>GST NO</b> : ' . $client_data[0]->gst_number . '
        <br>
        <b>STATE</b> : ' . $client_data[0]->state . '
        <br>
        <b>STATE CODE</b> : ' . $client_data[0]->state_no . '
        <br>
      
        </td>
        </tr>
       
        <tr style="font-size:12px">
        <td colspan="7"><b>Mode Of Transpot :</b> By Road <br>
        <b>Vehicle No : </b><br>
        <b>Date & Time : </b> <br>
        </td>
        <td colspan="5"><b>Invoice NO.</b>:-
        <br>
        <b> Invoice Date . </b>:<br>
        <b> P.O. NO : ' . $rejection_flow_data[0]->po_number . '</b><br>

        <b> PO Date . :</b><br>

        </td>
        
        </tr>
        <tr style="font-size:12px">
        <td colspan="4">
        <b>Details Of Receivers( Billed To )</b>
        <br> 
        ' . $supplier[0]->supplier_name . '<br>
        ' . $supplier[0]->location . '
        </td>
        <td colspan="4">
        <b>PAN NO : </b>
        <br>
        <b>GST NO : </b>' . $supplier[0]->gst_number . '
        <br>
        <b>State : </b>' . $supplier[0]->state . '
        <br>
        <br>
        </td>
        <td colspan="4">
        <b>Details Of Consignee (Ship To)</b> ,
        <br>
        ' . $supplier[0]->supplier_name . '<br>
        ' . $supplier[0]->location . ' 
        </td>
       
        </tr>
        
        <tr style="font-size:10px">
              <td><b> Sr No</b></td>
              <td><b>Part Number</b> </td>
              <td><b>Part Description</b>  </td>
              <td><b> HSN Code</b> </td>
              <td><b> Rate/Unit </b> </td>
              <td><b>QTY</b>  </td>
              <td><b>UOM</b> </td>
              <td><b>CGST %</b </td>
              <td><b>SGST %</b> </td>
              <td><b>IGST %</b> </td>
              <td><b>TCS % </b></td>
              <td><b>Total Amount (Rs)</b></td>
        </tr>
      
          ' . $parts_html . '
          <tr style="border=0px">
          <td colspan="12" style="height:' . $height . '"></td>
          </tr>
          <tr style="font-size:10px">
            <td rowspan="6" colspan="6">
            <span><b>GST Amount In Words :</b>  ' . $this->getIndianCurrency(number_format((float)$cgst_amount + $sgst_amount + $igst_amount, 2, '.', '')) . '</span> 

            <br><br>
            <span><b>Grand Total Amount In Words :</b>  ' . $this->getIndianCurrency(number_format((float)$final_final_amount, 2, '.', '')) . '</span> 

            <span></span>
              <br><br>
            <b>Payment Terms In Days : </b>' . $supplier[0]->payment_terms . '
              <br><br>
            <b>Bank Details : </b>' . $client_data[0]->bank_details . '
            </td>
            <th colspan="5" style="text-align:right">Subtotal </th>
            <th>'  . number_format((float)$final_total, 2, '.', '') . '</th>
          </tr>
          <tr style="font-size:10px">
            <th colspan="5" style="text-align:right"> CGST ' . $cgst . '%</th>
            <th>' .  number_format((float)$cgst_amount, 2, '.', '') . '</th>
          </tr>
          
          <tr style="font-size:10px">
            <th colspan="5" style="text-align:right">SGST  ' . $sgst . '%</th>
            <th>'  . number_format((float)$sgst_amount, 2, '.', '') . '</th>
          </tr>
          <tr style="font-size:10px">
            <th colspan="5" style="text-align:right">IGST ' . $igst . '%</th>
            <th>' .  number_format((float)$igst_amount, 2, '.', '') . '</th>
          </tr>
          <tr style="font-size:10px">
            <th colspan="5" style="text-align:right">TCS  ' . $tcs . '%</th>
            <th>' .  number_format((float)$tcs_amount, 2, '.', '') . '</th>
          </tr>
          
          <tr style="font-size:10px">
            <th colspan="5" style="text-align:right"><b>Grand Total (Rs)</b>  </th>
            <th><b>' . number_format((float)$final_final_amount, 2, '.', '') . '</b> </th>
          </tr>


          <tr style="font-size:9px">
            <td colspan="6">
            

         <p style="font-size:12px">We hereby certify that my/our registration certificate under the Goods and Service Tax
                Act, 2017 is in force on the date on which the sale of the goods specified in this Tax
                invoice is made by me/us and that the transaction of sale covered by this taxinvoice has
                been effected by me/us and it shall be accounted for in the turnover of sales while filling
                of return and the due tax. If any, payable on the sale has been paid or shall be paid.
                <br>
                Certified that the particulars given above are true and correct and the amount indicated
                represents the price actully charged and that there is no flow of additional consideration
      directly or indirectly from byuer.
      Interest @24% P.A. will be charged on all overdue invoices.<br>
      Subject To Pune Jurisdiction
              
               
              </p>
             
             
              
           
           
          
          
          
          </td>
          <td colspan="6" >
          <br>
          <h4 style="text-align: right;margin-right:25px"> For, Yash Plastrotech </h4>
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>
          <br>
          <br>
          <h4 style="text-align: right;margin-right:25px"> Authorized Signature </h4>
      
          <h6 style="text-align: right">  </h6>
          <h6 style="text-align: right">  </h6>

          </td>

         
        </tr>

        <tr style="font-size:10px">
        
        <td colspan="12" style="text-align:right">     <br>
        <br>     <h4 style="text-align: left;margin-left:25px"> Receiver Signature </h4>
        </td>
        </tr>
        
        </table>

        </body>
      </html>


     ';


    // echo $html_content;

    $this->pdf->loadHtml($html_content);
    $this->pdf->render();
    $this->pdf->stream("Debit-Note.pdf", array("Attachment" => 1));
  }


  function getIndianCurrency(float $number)
  {
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(
      0 => '', 1 => 'one', 2 => 'two',
      3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
      7 => 'seven', 8 => 'eight', 9 => 'nine',
      10 => 'ten', 11 => 'eleven', 12 => 'twelve',
      13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
      16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
      19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
      40 => 'forty', 50 => 'fifty', 60 => 'sixty',
      70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
    );
    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
    while ($i < $digits_length) {
      $divider = ($i == 2) ? 10 : 100;
      $number = floor($no % $divider);
      $no = floor($no / $divider);
      $i += $divider == 10 ? 1 : 2;
      if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
      } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
  }



  public function generate_job_card()
  {
    $job_card_id = $this->uri->segment('2');
    $job_card = $this->Crud->get_data_by_id("job_card", $job_card_id, "id");
    $customer_part_data = $this->Crud->get_data_by_id("customer_part", $job_card[0]->customer_part_id, "id");
    $customer_part_drawing = $this->Crud->get_data_by_id("customer_part_drawing", $job_card[0]->customer_part_id, "customer_master_id");
    $customer_part_operation = $this->Crud->get_data_by_id("customer_part_operation", $job_card[0]->customer_part_id, "customer_master_id");
    $customer_part_operation_data = $this->Crud->get_data_by_id("customer_part_operation_data", $customer_part_operation[0]->id, "customer_part_operation_id");
    // $uom = $this->Crud->get_data_by_id("uom", $customer_part_data[0]->uom, "id");
    $customer_data = $this->Crud->get_data_by_id("customer", $customer_part_data[0]->customer_id, "id");
    $bom_data = $this->Crud->get_data_by_id("bom", $job_card[0]->customer_part_id, "customer_part_id");
    // $customer_part_master = $this->Crud->get_data_by_id("child_part_master", $customer_part_data[0]->part_number, "part_number");
    $number =   "TH/" . $customer_part_data[0]->part_family . "/0000" . $job_card_id;



    $role_management_data = $this->db->query('SELECT operation_id,id  FROM `customer_part_operation` WHERE customer_master_id = ' . $job_card[0]->customer_part_id . ' ORDER BY `operation_id` ASC');
    // $data['operations_new'] = $role_management_data->result();
    // $role_management_data = $this->db->query('SELECT DISTINCT operation_id  FROM `customer_part_operation` WHERE customer_master_id = ' . $job_card[0]->customer_part_id . ' ORDER BY `id` DESC');
    $customer_part_operation = $role_management_data->result();
    $table1 = '';
    $table2 = '';



    if ($bom_data) {
      $i = 1;
      foreach ($bom_data as $b) {
        if (true) {
          $child_part_data = $this->Crud->get_data_by_id("child_part", $b->child_part_id, "id");
          $uom_data = $this->Crud->get_data_by_id("uom", $child_part_data[0]->uom_id, "id");

          $table2 .= '
          <tr style="font-size:10px">
            <td>' . $i . '</td>
            <td>' . $child_part_data[0]->part_number . '</td>
            <td>' . $child_part_data[0]->part_description . '</td>
            <td>' . $child_part_data[0]->store_rack_location . '</td>

            <td>' . $b->quantity . '</td>
            <td>' . $job_card[0]->req_qty * $b->quantity . '</td>
            <td>' . $uom_data[0]->uom_name . '</td>
            <td></td>
            <td></td>



          </tr>';
          $i++;
        }
      }
    }


    $table1 = '';
    if ($customer_part_operation) {
      $i = 1;



      if ($customer_part_operation) {


        foreach ($customer_part_operation as $b) {

          $customer_part_operation_view = $this->Crud->get_data_by_id("customer_part_operation", $b->id, "id");
          $operations = $this->Crud->get_data_by_id("operations", $b->operation_id, "id");

          $customer_part_operation_data = $this->Crud->get_data_by_id_asc("customer_part_operation_data", $customer_part_operation_view[0]->id, "customer_part_operation_id");
          if ($customer_part_operation_data) {
            foreach ($customer_part_operation_data as $cd) {

              $table1 .= '
                    <tr style="font-size:12px">
                        <td></td>
                        <td></td>
                        <td>' . $customer_part_operation_view[0]->name . '</td>
                        <td>' . $customer_part_operation_view[0]->mfg . '</td>
                        <td>' . $i . '</td>
                        <td>' . $cd->product . '</td>
                        <td>' . $cd->process . '</td>
                        <td>' . $cd->specification_tolerance . '</td>
                        <td>' . $cd->evalution . '</td>
                        <td>' . $cd->size . '</td>
                        <td>' . $cd->frequency . '</td>
                        <td style="width:60px"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                       

                    </tr>
                    ';



              $i++;
            }
          }
        }
      }
      // }
    }




    $html_content = '
    <html>
    <head>
    <style>
    html { margin: 2px}
    table{
      width: 100%;
    }
    table, th, td {
     border: 1px solid black;
   }
 
   td {
     text-align: center;
     vertical-align:middle;
    
   }
 
   th {
     text-align: center;
   }
   table.fixed { table-layout:fixed; }
   table.fixed td { overflow: hidden; }
   
    </style></head>
    <body>

<table cellspacing="0">
    <tr style="font-size:12px">
        <td rowspan="3" colspan="2"><img width="47.5px" height="60px"   src="tulasi.jpg" alt="cart-image"></td>
        <td rowspan="3" colspan="3">
        <h2>JOB CARD</h2>
        </td>
        <td>Job Card No</td>
        <td>' . $number . '</td>
       <td></td>
       <td></td>
       
    
        <td>Doc No.</td>
        <td>TUH/QA/002</td>
       
    </tr>
    <tr style="font-size:12px">
        <td>Issue Date</td>

        <td>' . $job_card[0]->issue_date . '</td>
        <td>Completion Date</td>

        <td style=""></td>
       
        <td>Rev No</td>
        <td>01</td>
    </tr>
    <tr style="font-size:12px">
        <td>Lot Qty</td>

        <td>' . $job_card[0]->req_qty . '</td>
        <td>UOM</td>

        <td>' . $customer_part_data[0]->uom . '</td>
       
        <td>Rev Date</td>
        <td>14/09/2021</td>
    </tr>
    <tr style="font-size:12px">
        <td>Customer</td>
        <td>' . $customer_data[0]->customer_name . '</td>
        <td></td>
        <td></td>
        <td></td>
        <td>Lead Time</td>
        <td></td>
        <td></td>
      
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="font-size:12px">
        <td>Part NO</td>
        <td>' . $customer_part_data[0]->part_number . '</td>
        <td></td>
        <td></td>
        <td></td>
        <td>P.O. NO</td>
        <td></td>
       
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="font-size:12px">
        <td>Rev No</td>
        <td>' . $customer_part_drawing[0]->revision_no . '</td>
        <td></td>
        <td></td>
        <td></td>
        <td>P.O. Date</td>
        <td></td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
  <span style="text-align: center;margin-left:50%">Bill Of Material </span>
    <table cellspacing="0">
    
<tr style="font-size:12px">
 
    <td>Sr. No.</td>
    <td>Item Number</td>
    <td>Item Description</td>
    <td>Store Location</td>
    <td>BOM Qty</td>
    <td>REQ Qty</td>
    <td>UOM</td>
    <td>GRN NO </td>
    <td>HOSE Make/Mfg.Date </td>
    </tr>
   
    </tr>
    
    ' . $table2 . '
          
    
    
    </table>
  



    <table cellspacing="0">

    
   
    <thead>

    <tr style="font-size:12px;text-align:left">
        <td rowspan="2">Date</td>
        <td rowspan="2">Op No.</td>
        <td rowspan="2">Process/ Operation Name</td>
        <td rowspan="2">M/c Device, Jigs,Tools For Mfg</td>
        <td colspan="3">Characteristics</td>
        <td rowspan="2">Product Specification / Tolerance</td>
        <td rowspan="2">Evaluation / Measurement Techn.</td>
        <td rowspan="2">Size</td>
        <td rowspan="2">Freq</td>
        <td colspan="2">Set  Up  Approval</td>
        <td colspan="4">In Process Observation</td>
        <td>Last Price</td>
        <td>Qty</td>
        <td>Qty</td>
        <td style="text-align:left;">Remark</td>
        <td></td>
        
    </tr>
    <tr style="font-size:12px;text-align:left;vertical-align: middle;padding:5px;">

        <td style="padding:5px;" valign="middle">No</td>
        <td>Product</td>
        <td>Process</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>Prod</td>
        <td>Acc</td>
        <td></td>
        <td></td>

    </tr>
</thead>

<tbody style="margin-top:50px">
' . $table1 . '
</tbody>

 
   

    </table>
    <table class="fixed" cellspacing="0" width="100%">
    <col width="30px" />
    <col width="30px" />
    <col width="30px" />
    <col width="30px" />
    <col width="30px" />
    <col width="30px" />
    <col width="30px" />
    <col width="30px" />
    <tr style="font-size:12px">
    
        <td>Lot Qty</td>
        <td>' . $job_card[0]->req_qty . '</td>
        <td>Accepted Qty</td>
        <td></td>
        <td>Rejected Qty</td>
        <td></td>
        <td>Rework Qty</td>
        <td></td>
    </tr>
    <tr style="font-size:12px">
      <td>Note (if any)</td>
      <td colspan="7"></td>
    </tr>
    <tr style="font-size:12px">
    
        <td>Issued By</td>
        <td></td>
        <td>Inspected By</td>
        <td></td>
        <td>Approved By</td>
        <td colspan="3"></td>
      
    </tr>
    
    </table>

    
    </body>
    </html>
    
    ';




    // print_r($html_content);
    $this->pdf->set_paper('A4', 'landscape');

    $this->pdf->loadHtml($html_content);
    $this->pdf->render();
    $this->pdf->stream("Job_card.pdf", array("Attachment" => 1));
  }
}
