<link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
  />

 
  <!-- Helpers -->
  <script src="dist/assets/vendor/js/helpers.js"></script>


  <script src="dist/assets/js/config.js"></script>

  <!-- js files -->

  <script src="dist/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="dist/assets/vendor/libs/popper/popper.js"></script>
  <script src="dist/assets/vendor/js/bootstrap.js"></script>
  <script src="dist/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
  <link rel="stylesheet" href="dist/css/dashboard/style.min.css">
   
    <!-- highchart js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- highchart css -->
   <link rel="stylesheet" type="text/css" href="dist/css/dashboard/highchart/highchart.css">
   <link rel="stylesheet" type="text/css" href="dist/css/dashboard/loader.css">

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <div class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1002.5px;">
       

        <!-- Main content -->
        <section class="content">
            <div class="nav-bar-header">
          <div class="header-contain-div scrollable-block"> 
            <div class="d-flex dashboard-header">
              <div class="w-50">
                <h2 class="main-title">
                Dashboard
                </h2>
              </div>
              <div class="w-50">
                <div class="year-drop-down float-right">
                  <select class="select-box"  id="year-filer">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                  </select>
                </div>
                 <div class="year-drop-down unit-drop-down float-right margin-right-2">
                  <select class="select-box"  id="company-unit-filer">
                    <option value=""></option>
                    <option value="unit1">Unit 1</option>
                    <option value="unit2">Unit 2</option>
                    <option value="unit3">Unit 3</option>
                    <option value="unit4">Unit 4</option>
                    <option value="unit5">Unit 5</option>
                    <option value="unit6">Unit 6</option>
                  </select>
                </div>
                <div class="refresh-btn-box float-right margin-right-2">
                  <button class="progress-button action-btn mr-3" data-style="fill" data-horizontal="" id="refresh-btn">
                    <span class="content">Refresh</span>
                    <div class="progress-bar-wrapper">
                      <div class="progress-bar"></div>
                    </div>
            
                  </button>
                </div>
                
              </div>
              
            </div>

            
            <ul class="nav nav-tabs dashboard-nav-tab" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="business-analytics-tab" data-bs-toggle="tab" data-tab="BusinessAnalytics" data-bs-target="#business-analytics" type="button" role="tab" aria-controls="business-analytics" aria-selected="true">Business Analytics</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link " id="sales-tab" data-bs-toggle="tab" data-tab="Sales" data-bs-target="#sales" type="button" role="tab" aria-controls="sales" aria-selected="true">Sales</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link " id="account-tab" data-bs-toggle="tab" data-tab="Account" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="false">Accounts</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link " id="purchase-grn-tab" data-bs-toggle="tab" data-tab="PurchaseGRN" data-bs-target="#purchase-grn" type="button" role="tab" aria-controls="purchase-grn" aria-selected="false">Purchase Grn </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link " id="stotes-tab" data-bs-toggle="tab" data-tab="Stores" data-bs-target="#stotes" type="button" role="tab" aria-controls="stotes" aria-selected="false">Stores </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link " id="subcon-tab" data-bs-toggle="tab" data-tab="Subcon" data-bs-target="#subcon" type="button" role="tab" aria-controls="subcon" aria-selected="false">Subcon </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link " id="production-tab" data-bs-toggle="tab" data-tab="Production" data-bs-target="#production-grn" type="button" role="tab" aria-controls="production" aria-selected="false">Production </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link " id="quality-tab" data-bs-toggle="tab" data-tab="Quality" data-bs-target="#quality" type="button" role="tab" aria-controls="quality" aria-selected="false">Quality </a>
              </li>
            </ul>
          </div>
        </div>
            <div class="container-fluid">
                    <div class="flex-grow-1 container-p-y container-fluid">
      <main class="main users chart-page" id="skip-target">
      <div class="container main-container-block">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="business-analytics" role="tabpanel" aria-labelledby="business-analytics-tab" data-tab="BusinessAnalytics">
            <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="RECEIVABLE_DUE_BLOCK" data-widget="RECEIVABLE_DUE">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon primary">
                      <i class="las la-box"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >Receivables Due</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="PAYABLE_DUE_BLOCK" data-widget="PAYABLE_DUE">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon warning">
                      <i class="las la-boxes"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__title" >Payable Due</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-lg-6">
                   <div class="chart-box widget-box" id="SALES_VS_PURCASE_DOUBLE_BAR_CHART" data-widget="SALES_VS_PURCASE">
                      <div class="title-box">
                        <div class="title-line">
                             Sales vs Purchase GRN
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="SALES_VS_PURCASE" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
                <div class="col-lg-6">
                   <div class="chart-box widget-box" id="RMSP_SINGLE_BAR_CHART" data-widget="RMSP">
                      <div class="title-box">
                        <div class="title-line">
                             RMSP
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="RMSP" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
              </div>
          </div>
          <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab" data-tab="Sales">
              <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="TODAY_SALES_BLOCK" data-widget="TODAY_SALES">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon primary">
                      <i class="las la-box"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >Today’s Sales</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="YESTERDAYS_SALES_BLOCK" data-widget="YESTERDAYS_SALES">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon warning">
                      <i class="las la-boxes"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__title" >Yesterday’s Sales</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="CURRENT_MONTH_PLAN_BLOCK" data-widget="CURRENT_MONTH_PLAN">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon purple">
                      <i class="las la-calendar-check"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >Current Month Plan</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="CURRENT_MONTH_SALE_BLOCK" data-widget="CURRENT_MONTH_SALE">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon success">
                      <i class="las la-shopping-cart"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >Current Month Sale</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                      
                    </div>
                  </article>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-lg-6">
                  <div class="chart-box widget-box" id="CUSTOMER_SALES_PIE_CHART" data-widget="CUSTOMER_SALES">
                      <div class="title-box">
                        <div class="title-line">
                              Customer Sales
                              <i class="las la-sync cursor" title="Refresh"></i>
                        </div>

                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                        
                      <div id="CUSTOMER_SALES" class="chat-plot"></div> 
                      </div> 
                  </div>             
                </div>
                <div class="col-lg-6">
                   <div class="chart-box widget-box" id="MONTH_WISE_SALES_SINGLE_BAR_CHART" data-widget="MONTH_WISE_SALES">
                      <div class="title-box">
                        <div class="title-line">
                             Month Wise Sales
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="MONTH_WISE_SALES" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
                <div class="col-lg-2 hide">
                  <div class="total-sales-today">
                      <div class="title-box">
                          <div class="title-line">
                          Today Sales
                          <i class="las la-sync cursor" title="Refresh"></i>
                          </div>
                      </div>
                      <div class="value-box">
                        <!-- <div class="dot-elastic"></div> -->
                          <div class="today_stock_qty">12,455 Unit(s)</div>
                          <div class="today_stock_value">₹ 50,000,000 </div>
                      </div>
                      <div class="image-box"><img src="dist/assets/images/today_stock.png" width="100%"></div>
                  </div>
                </div>
                <div class="col-lg-5 mt-4">
                   <div class="chart-box widget-box" id="FY_PLAN_VS_SALES_DOUBLE_BAR_CHART" data-widget="FY_PLAN_VS_SALES">
                      <div class="title-box">
                        <div class="title-line">
                             Current Plan vs Sales
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="FY_PLAN_VS_SALES" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-lg-3 hide">
                   <div class="chart-box widget-box"  id="PRODUCT_DELIVERY_SEMI_CIRCLE" data-widget="PRODUCT_DELIVERY">
                      <div class="title-box">
                        <div class="title-line">
                             Product Delivery
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box semi-circle-donut-val">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="PRODUCT_DELIVERY" class="semi-circle-donut"></div>  
                          <div class="total_allocated pl-0 pr-0" style="border-top: none;">
                              <div class="row">
                                  <div class="col-6 side-line">
                                      <div class="total_allocated_lt text_green_dark  p-0 w-100">
                                          <span>Delivered (Unit(s))</span>
                                          <em class="label_el del_qty"></em>
                                      </div>
                                  </div>
                                  <div class="col-6">
                                      <div class="total_allocated_lt p-0 w-100">
                                          <span>Pending (Unit(s))</span>
                                          <em class="label_el pend_qty"></em>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div> 
                  </div> 
                              
                </div>
                <div class="col-lg-3">
                   <div class="chart-box widget-box" id="PRODUCTION_STOCK_SINGLE_BAR" data-widget="PRODUCTION_STOCK">
                      <div class="title-box">
                        <div class="title-line">
                             Production Stock
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="PRODUCTION_STOCK" class="single-bar-chart"></div>  
                          <div class="total_allocated pl-0 pr-0" style="border-top: none;">
                              <div class="row">
                                  <div class="col-6 side-line">
                                      <div class="total_allocated_lt text_green_dark  p-0 w-100">
                                          <span>Completed (Unit(s))</span>
                                          <em class="label_el del_qty"></em>
                                      </div>
                                  </div>
                                  <div class="col-6">
                                      <div class="total_allocated_lt p-0 w-100">
                                          <span>Pending (Unit(s))</span>
                                          <em class="label_el pend_qty"></em>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div> 
                  </div> 
                              
                </div>
              </div>
          </div>
          <div class="tab-pane fade " id="account" role="tabpanel" aria-labelledby="account-tab" data-tab="Account" >
              <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="TOTAL_PAYABLE_DUE_BLOCK" data-widget="TOTAL_PAYABLE_DUE"> 
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon purple">
                      <i class="las la-file-invoice-dollar"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__title">Total Payables Due</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="TOTAL_PAYABLE_PAID_BLOCK" data-widget="TOTAL_PAYABLE_PAID">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div> 
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon primary">
                     <i class="las la-check-circle"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__title">Total Payables Paid</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="TOTAL_RECEIVABLES_DUE_BLOCK" data-widget="TOTAL_RECEIVABLES_DUE">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div> 
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon warning">
                      <i class="las la-money-bill"></i>

                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__title">Total Receivables Due</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="TOTAL_RECEIVABLES_PAID_BLOCK" data-widget="TOTAL_RECEIVABLES_PAID">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon success">
                      <i class="las la-coins"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__title">Receivables Received</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                      
                    </div>
                  </article>
                </div>
              </div>
              <div class="row">
                  <div class="col-lg-5">
                    <div class="chart-box widget-box" id="CUSTOMER_RECEIVER_DUE_PIE_CHART" data-widget="CUSTOMER_RECEIVER_DUE">
                        <div class="title-box">
                          <div class="title-line">
                                Customer Receivables Due
                                <i class="las la-sync cursor" title="Refresh"></i>
                          </div>
                        </div>
                        <div class="value-box">
                          <div class="loader-box">
                              <div class="dot-elastic"></div>
                          </div>
                        <div id="CUSTOMER_RECEIVER_DUE" class="chat-plot"></div> 
                        </div> 
                    </div>             
                  </div>
                  <div class="col-lg-7">
                     <div class="chart-box widget-box" id="SALES_PLAN_AMOUNT_GST_DOUBLE_BAR_CHART" data-widget="SALES_PLAN_AMOUNT_GST">
                        <div class="title-box">
                          <div class="title-line">
                               SALES vs PURCHASE AMOUNT(GST)
                               <i class="las la-sync cursor" title="Refresh"></i>
                          </div>
                        </div>
                        <div class="value-box">
                          <div class="loader-box">
                              <div class="dot-elastic"></div>
                          </div>
                            <div id="SALES_PLAN_AMOUNT_GST" class="chat-plot"></div>  
                        </div> 
                  </div>         
              </div>
              <div class="row mt-4">
                  <div class="col-lg-5">
                      <div class="chart-box widget-box" id="CUSTOMER_RECEIVER_DUE_LIST_TABLE" data-widget="CUSTOMER_RECEIVER_DUE_LIST">
                          <div class="title-box">
                            <div class="title-line">
                                  Customer Receivables Due
                                  <i class="las la-sync cursor" title="Refresh"></i>
                            </div>
                          </div>
                          <div class="value-box">
                          <div class="loader-box">
                            <div class="dot-elastic"></div>
                          </div>
                          <div class="center norecord no_data_msg_row">No customer receivables due found.</div>
                          <div id="CUSTOMER_RECEIVER_DUE_LIST" class="chat-plot">
                            <div class="custom-table custom_midd scroll_default" style="max-height: 310px;">
                                  <table class="dataTable w-100" id="top_10_moving_product_details_table">
                                      <thead>
                                          <tr>
                                              <th class="text-center">Customer Name</th>
                                              <th class="text-center">Due Amount</th>
                                          </tr>
                                      </thead>
                                      <tbody class="tableview_body">
                                      </tbody>
                                  </table>
                            </div>

                          </div> 
                          </div> 
                      </div>             
                  </div>
              </div>
              </div>
          </div>
          <div class="tab-pane fade " id="purchase-grn" role="tabpanel" aria-labelledby="purchase-grn-tab" data-tab="PurchaseGRN">
            <div class="row ">
                <div class="col-lg-5">
                  <div class="chart-box widget-box" id="CATEGORY_PURCHASE_AMOUNT_PIE_CHART" data-widget="CATEGORY_PURCHASE_AMOUNT">
                      <div class="title-box">
                        <div class="title-line">
                             Purchase Amount
                              <i class="las la-sync cursor" title="Refresh"></i>
                        </div>

                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                        
                      <div id="CATEGORY_PURCHASE_AMOUNT" class="chat-plot"></div> 
                      </div> 
                  </div>             
                </div>
                <div class="col-lg-5">
                   <div class="chart-box widget-box" id="CASH_PURCHASE_AMOUNT_SINGLE_BAR_CHART" data-widget="CASH_PURCHASE_AMOUNT">
                      <div class="title-box">
                        <div class="title-line">
                             Cash Purchase(Amount)
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="CASH_PURCHASE_AMOUNT" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
                <div class="col-lg-2">
                  <div class="total-sales-today widget-box" id="PURCHASE_GRN_IMAGE_BLOCK" data-widget="PURCHASE_GRN">
                      <div class="title-box">
                          <div class="title-line">
                          Purchase GRN
                          <i class="las la-sync cursor" title="Refresh"></i>
                          </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div class="today_stock_qty">12,455 Unit(s)</div>
                          <div class="today_stock_value">₹ 50,000,000 </div>
                      </div>
                      <div class="image-box"><img src="dist/assets/images/today_stock.png" width="100%"></div>
                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-lg-5">
                   <div class="chart-box widget-box" id="PURCHASE_GRN_AMOUNT_SINGLE_BAR_CHART" data-widget="PURCHASE_GRN_AMOUNT">
                      <div class="title-box">
                        <div class="title-line">
                             Purchase GRN(Amount)
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="PURCHASE_GRN_AMOUNT" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
              </div>
          </div>
          <div class="tab-pane fade " id="stotes" role="tabpanel" aria-labelledby="stotes-tab" data-tab="Stores">
              <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="PURCHASE_STOCK_AMOUNT_BLOCK" data-widget="PURCHASE_STOCK_AMOUNT">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon pink">
                      <i class="las la-dolly"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >Purchase stock</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="IN_HOUSE_PARTS_STOCK_BLOCK" data-widget="IN_HOUSE_PARTS_STOCK">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon purple">
                      <i class="las la-boxes"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__title" >In-house Parts Stock</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="FG_STOCK_BLOCK" data-widget="FG_STOCK">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon warning">
                      <i class="las la-box"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >FG Stock</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="SALES_STOCK_BLOCK" data-widget="SALES_STOCK">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon success">
                      <i class="las la-shopping-cart"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >Sales Stock</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-lg-5">
                   <div class="chart-box widget-box" id="PURCHASE_STOCK_AMOUNT_SINGLE_BAR_CHART" data-widget="PURCHASE_STOCK_AMOUNT">
                      <div class="title-box">
                        <div class="title-line">
                             Purchase stock(Amount)
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="PURCHASE_STOCK_AMOUNT" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
              </div>
          </div>
          <div class="tab-pane fade " id="subcon" role="tabpanel" aria-labelledby="subcon-tab" data-tab="Subcon">
            <div class="row">
                <div class="col-lg-6">
                  <div class="chart-box widget-box" id="SUBCON_STOCKS_PIE_CHART" data-widget="SUBCON_STOCKS">
                      <div class="title-box">
                        <div class="title-line">
                              Customer Sales
                              <i class="las la-sync cursor" title="Refresh"></i>
                        </div>

                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                        
                      <div id="SUBCON_STOCKS" class="chat-plot"></div> 
                      </div> 
                  </div>             
                </div>
                <div class="col-lg-2">
                  <div class="total-sales-today">
                      <div class="title-box">
                          <div class="title-line">
                          Subcon stock
                          <i class="las la-sync cursor" title="Refresh"></i>
                          </div>
                      </div>
                      <div class="value-box">
                          <div class="today_stock_qty">13,055 Unit(s)</div>
                          <div class="today_stock_value">₹ 96,000,000 </div>
                      </div>
                      <div class="image-box"><img src="dist/assets/images/today_stock.png" width="100%"></div>
                  </div>
                </div>
            </div>
          </div>
          <div class="tab-pane fade " id="production-grn" role="tabpanel" aria-labelledby="production-tab" data-tab="Production">
              <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="YESTERDAYS_PRODUCTION_BLOCK" data-widget="YESTERDAYS_PRODUCTION">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon primary">
                      <i class="las la-industry"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >Yesterday’s Production</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="YESTERDAYS_REJECTION_BLOCK" data-widget="YESTERDAYS_REJECTION">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon warning">
                      <i class="las la-times-circle"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__title" >Yesterday’s Rejection</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="YESTERDAYS_OEE_BLOCK" data-widget="YESTERDAYS_OEE">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon purple">
                      <i class="las la-boxes"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >Yesterday’s OEE</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                    </div>
                  </article>
                </div>
                <div class="col-md-6 col-xl-3">
                  <article class="stat-cards-item widget-box" id="YESTERDAYS_PPM_BLOCK" data-widget="YESTERDAYS_PPM">
                    <div class="refresh-btn-block ">
                      <i class="las la-sync cursor" title="Refresh"></i>
                    </div>
                    <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                    <div class="stat-cards-icon success">
                      <i class="las la-box"></i>
                    </div>
                    <div class="stat-cards-info" >
                      <p class="stat-cards-info__title" >Yesterday’s PPM</p>
                      <p class="stat-cards-info__num timer count-title count-number" data-to="" data-speed="1500"></p>
                      
                    </div>
                  </article>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-lg-7">
                   <div class="chart-box widget-box" id="PRODUCTION_SPLINE_CHART" data-widget="PRODUCTION">
                      <div class="title-box">
                        <div class="title-line">
                             Production
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                            <div class="loader-box ">
                                <div class="dot-elastic"></div>
                            </div>
                        <div class="row spline-chart">
                          <div class="col-6">
                                <div id="PRODUCTION" class="chat-plot mb-3"></div>  
                          </div>
                          <div class="col-6 border-left">
                              <div class="custom-table custom-table  pl-3 pt-3 me-3">
                                  <table class="dataTable w-100" >
                                      <thead>
                                          <tr>
                                              <th class="text-left">Type</th>
                                              <th class="text-center">Production</th>
                                              <th class="text-center">Rejection</th>
                                              <th class="text-center">OEE</th>
                                              <th class="text-center">PPM</th>
                                          </tr>
                                      </thead>
                                      <tbody class="tableview_body position-relative">
                                          
                                      </tbody>
                                  </table>
                              </div>

                          </div>
                        </div>
                        
                        
                      </div> 
                  </div> 
                </div>
                <div class="col-lg-5">
                   <div class="chart-box widget-box" id="PRODUCTION_SCRAP_SINGLE_BAR_CHART" data-widget="PRODUCTION_SCRAP">
                      <div class="title-box">
                        <div class="title-line">
                             Production Scrap (Month Wise)
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="PRODUCTION_SCRAP" class="chat-plot"></div>  
                      </div> 
                  </div>       
                </div>
                <div class="row mt-3">
                  <div class="col-lg-5">
                   <div class="chart-box widget-box" id="PRODUCTION_OEE_SINGLE_BAR_CHART" data-widget="PRODUCTION_OEE">
                      <div class="title-box">
                        <div class="title-line">
                             Production OEE (Month Wise)
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="PRODUCTION_OEE" class="chat-plot"></div>  
                      </div> 
                  </div>       
                </div>
                </div>
              </div>
          </div>
          <div class="tab-pane fade " id="quality" role="tabpanel" aria-labelledby="quality-tab" data-tab="Quality">
            <div class="row">
                <div class="col-lg-6">
                   <div class="chart-box widget-box" id="IN_HOUSE_PPM_SINGLE_BAR_CHART" data-widget="IN_HOUSE_PPM">
                      <div class="title-box">
                        <div class="title-line">
                             In House PPM
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="IN_HOUSE_PPM" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
                <div class="col-lg-6">
                   <div class="chart-box widget-box" id="IN_HOUSE_REJECTION_SINGLE_BAR_CHART" data-widget="IN_HOUSE_REJECTION">
                      <div class="title-box">
                        <div class="title-line">
                             In House Rejection
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="IN_HOUSE_REJECTION" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-lg-6">
                   <div class="chart-box widget-box" id="IN_WARD_PPM_SINGLE_BAR_CHART" data-widget="IN_WARD_PPM">
                      <div class="title-box">
                        <div class="title-line">
                             Inward PPM
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="IN_WARD_PPM" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
                <div class="col-lg-6">
                   <div class="chart-box widget-box" id="CUSTOMER_PPM_SINGLE_BAR_CHART" data-widget="CUSTOMER_PPM">
                      <div class="title-box">
                        <div class="title-line">
                             Customer PPM
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="CUSTOMER_PPM" class="chat-plot"></div>  
                      </div> 
                  </div> 
                              
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-lg-3">
                   <div class="chart-box widget-box"  id="CUSTOMER_COMPLAINT_SEMI_CIRCLE" data-widget="CUSTOMER_COMPLAINT">
                      <div class="title-box">
                        <div class="title-line">
                             Product Delivery
                             <i class="las la-sync cursor" title="Refresh"></i>
                        </div>
                      </div>
                      <div class="value-box semi-circle-donut-val">
                        <div class="loader-box">
                            <div class="dot-elastic"></div>
                        </div>
                          <div id="CUSTOMER_COMPLAINT" class="semi-circle-donut"></div>  
                          <div class="total_allocated pl-0 pr-0" style="border-top: none;">
                              <div class="row">
                                  <div class="col-6 side-line">
                                      <div class="total_allocated_lt text_green_dark  p-0 w-100">
                                          <span>Pending</span>
                                          <em class="label_el del_qty"></em>
                                      </div>
                                  </div>
                                  <div class="col-6">
                                      <div class="total_allocated_lt p-0 w-100">
                                          <span>Completed</span>
                                          <em class="label_el pend_qty"></em>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div> 
                  </div> 
                              
                </div>
              </div>
          </div>
        </div>

        
      </div>
    </main>
    </div>       
            
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
     
    
            
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
            <script src="./dist/js/plugin/couter-animation/couter_animation.js"></script>
            <script src="dist/js/dashboard/script.js"></script> 
         