
$( document ).ready(function() {
    
     dashbord.init();
});



var dashbord = {
  init: function(){
    this.initiatePluggin();
    let tab_name  = "BusinessAnalytics";
    this.getCurrentWidget(tab_name,'');
    
  },
  initiatePluggin: function(){
    let that = this;
    $(".header-contain-div .nav-item").on("click",function(){
        let tab_name = $(this).find(".nav-link").attr("data-tab");
        let loaded = $(this).find(".nav-link").hasClass("loaded");
        if(!loaded){
          that.getCurrentWidget(tab_name,'');
        }
        
    });
    $(".widget-box i.la-sync").on("click",function(){
        let widget_name = $(this).parents(".widget-box").attr("data-widget");
        $(this).parents(".widget-box").find('.loader-box').show();
        let tab_name = $(".tab-pane.active.show").attr("data-tab");
        that.getCurrentWidget(tab_name,widget_name);
    })
    $("#refresh-btn").on("click",function(){
         let tab_name = $(".dashboard-nav-tab .nav-item").find(".nav-link.active").attr("data-tab");
         if(tab_name != "" && tab_name != undefined){ 
          $("#myTabContent .tab-pane.show.active").find('.loader-box').show();
           $("#refresh-btn").addClass("progress-active");
            that.getCurrentWidget(tab_name,'','refresh-btn');
         }
    })
    $("#company-unit-filer,#year-filer").on("change",function(){
      let tab_name = $(".dashboard-nav-tab .nav-item").find(".nav-link.active").attr("data-tab");
         if(tab_name != "" && tab_name != undefined){ 
          $("#myTabContent .tab-pane.show.active").find('.loader-box').show();
           $("#refresh-btn").addClass("progress-active");
            that.getCurrentWidget(tab_name,'','refresh-btn');
         }
    })
    
    this.iniliseSelect2();
    
  },
  iniliseSelect2:function(){
    $('#year-filer').select2();
    $('#company-unit-filer').select2({
      placeholder: "Select company unit",
    });
  },
  getCurrentWidget: function(tab_name,widget_name,type){
    let that = this;
    // let tab_name = $(".tab-pane.active.show").attr("data-tab");
      $.ajax({
          type: "POST",
          url: "dashboard/get_dashboard_widget_data",
          data: {
              tab_name: tab_name,
              widget_name:widget_name
          },
          success: function (response) {
              var response = JSON.parse(response);
              that.initiateTabData(response,tab_name,type);
              
          },
          error: function (error) {}
      });
  },
  initiateTabData: function(data = '',tab_name = '',type){
      var widget_count = data.length;
      for (var i = 0; i < data.length; i++) {
          if(data[i]['widget_type'] == "Block"){
            this.initiateBlock(data[i])
          }else if(data[i]['widget_type'] == "Pie"){
            this.PieChart(data[i]);
          }else if(data[i]['widget_type'] == "SingleBar"){
            this.singleBarChart (data[i]);
          }else if(data[i]['widget_type'] == "SemiCircle"){
            this.semiCircleDonut(data[i]);
          }else if(data[i]['widget_type'] == "SingleColumnBar"){
            this.singleColumnBar(data[i]);
          }else if(data[i]['widget_type'] == "DoubleBar"){
            this.doubleBarChart(data[i]);
          }else if(data[i]['widget_type'] == "Table"){
            this.tableInitiate(data[i])
          }else if(data[i]['widget_type'] == "Spline"){
            this.splineChart(data[i])
          }else if(data[i]['widget_type'] == "ImageBlock"){
            this.imageBlock(data[i])
          }
          if(type == "refresh-btn"){
            this.refreshLoader(widget_count,i+1);
          }
      }
      $(".dashboard-nav-tab .nav-item .nav-link[data-tab='"+tab_name+"']").addClass("loaded");
      // $("#"+tab_name.toLowerCase()+"-tab").addClass("loaded");
  },
  refreshLoader:function(widget_count,current_widget_count){
    var percentage = (current_widget_count/widget_count)*100;
    $(".progress-bar-wrapper .progress-bar").css("width",percentage+"%")
    if(percentage == 100){
      $("#refresh-btn").removeClass("progress-active");
    }
  },
  initiateBlock:function(data){

      let ele_id = data['widget_name']+"_BLOCK";
      $("#"+ele_id+" .loader-box").hide();
      $("#"+ele_id+" .count-number").attr("data-to",data.widget_data.count)
      counter.initiate(ele_id);
  },
  imageBlock: function(data){
      let ele_id = data['widget_name']+"_IMAGE_BLOCK";
      $("#"+ele_id+" .loader-box").hide();
      $("#"+ele_id+" .value-box .today_stock_qty").text(data.widget_data.total_qty);
      $("#"+ele_id+" .value-box .today_stock_value").text(data.widget_data.total_amount);
  },
  PieChart:function(data){
    let ele_id = data['widget_name'] ;
    $("#"+ele_id+"_PIE_CHART .loader-box").hide();
     Highcharts.chart(ele_id, {
          chart: {
              type: 'pie'
          },
          title: {
              text: '',
              align: 'left'
          },
          subtitle: {
              text: '',
              align: 'left'
          },

          accessibility: {
              announceNewData: {
                  enabled: true
              },
              point: {
                  valueSuffix: '%'
              }
          },

          plotOptions: {
              series: {
                  borderRadius: 5,
                  dataLabels: [{
                      enabled: true,
                      distance: 15,
                      format: '{point.name}'
                  }, {
                      enabled: true,
                      distance: '-30%',
                      filter: {
                          property: 'percentage',
                          operator: '>',
                          value: 5
                      },
                      format: '{point.y:.1f}%',
                      style: {
                          fontSize: '0.9em',
                          textOutline: 'none'
                      }
                  }]
              }
          },

          tooltip: {
              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> <br/>'
          },

          series: [
              {
                  name: '',
                  colorByPoint: true,
                  data: data.widget_data.series_data,
                  showInLegend: true
              },
          ]
      });
  },
  singleBarChart: function(data){
    let ele_id = data['widget_name'] ;
    $("#"+ele_id+"_SINGLE_BAR_CHART .loader-box").hide();
    Highcharts.chart(ele_id, {
        chart: {
            type: 'column'
        },
        title: {
            align: 'left',
            text: ''
        },
        subtitle: {
            align: 'left',
            text: ''
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            min: 0,
            type: 'category',
            title:{
                text :data['widget_data']['xAxisLabel']
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: data['widget_data']['yAxisLabel']
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.2f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: `<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> ${data['widget_data']["delemeter"]}<br/>`
        },

        series: [
            {
                name: '',
                colorByPoint: true,
                data: data['widget_data']['series_data']
            }
        ]
    });
  },
  doubleBarChart: function(data){
    
    let ele_id = data.widget_name;
    // console.log("#"+ele_id+"_DOUBLE_BAR_CHART .loader-box")
    $('#'+ele_id+'_DOUBLE_BAR_CHART .loader-box').hide()
      Highcharts.chart(ele_id, {
            chart: {
                type: 'column'
            },

            title: {
                text: ''
            },

            subtitle: {
                text: ''
            },

            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical'
            },

            xAxis: {
                categories: data.widget_data.catergories,
                labels: {
                    x: -10
                },
                title: {
                    text: data.widget_data.xAxisLabel
                }
            },

            yAxis: {
                allowDecimals: false,
                title: {
                    text: data.widget_data.yAxisLabel
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{point.x}</span><br>',
                pointFormat: `<span style="color:{series.color}">{series.name}</span>: <b>{point.y:.2f}</b> <br/>`
            },
            series: data.widget_data.series_data,

        });

  },
  semiCircleDonut: function(data){

      let ele_id = data['widget_name'];
      $("#"+ele_id+"_SEMI_CIRCLE .loader-box").hide();
      let label_data = data.widget_data.label_data;
      for (var i = 0; i < label_data.length; i++) {
            let element = "#"+ele_id+"_SEMI_CIRCLE ."+label_data[i].label
            $(element).text(label_data[i].val);
      }
      Highcharts.chart(ele_id, {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: 0,
              plotShadow: false
          },
          title: {
              text: '',
              align: 'center',
              verticalAlign: 'middle',
              y: 60,
              style: {
                  fontSize: ''
              }
          },
          tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          tooltip: { enabled: false },
          accessibility: {
              point: {
                  valueSuffix: '%'
              }
          },
          plotOptions: {
              pie: {
                  dataLabels: {
                      enabled: false,
                      distance:   0,
                      style: {
                          fontWeight: 'bold',
                          color: 'white'
                      }
                  },
                  startAngle: -90,
                  endAngle: 90,
                  center: ['50%', '75%'],
                  size: '110%',
                  innerSize: '70%',
                   colors: data['widget_data']['color_lengend']
              }
          },
          series: [{
              enableMouseTracking: false,
              type: 'pie',
              name: 'Browser share',
              
              data: data['widget_data']['data']
          }]
      });
  },
  singleColumnBar: function(data){
    let ele_id = data['widget_name'];
    $("#"+ele_id+"_SINGLE_BAR .loader-box").hide();
    let label_data = data.widget_data.label_data;
    for (var i = 0; i < label_data.length; i++) {
        let element = "#"+ele_id+"_SINGLE_BAR ."+label_data[i].label
        $(element).text(label_data[i].val);
    }
    Highcharts.chart(ele_id, {
          chart: {
              type: "column",
          },
          title: {
              text: "",
              align: "left",
          },
          tooltip: {
             formatter: function () {
              let number = this.y;
            return '<b>' + this.series.name + '</b>: ' + number.toLocaleString('en-US'); // Format the number to two decimal places
        }
          },
          xAxis: {
              categories: [""],
              gridLineColor: "transparent",
          },
          yAxis: {
              min: 0,
              title: {
                  text: "",
              },
              stackLabels: {
                  enabled: false,
              },
              labels: {
                  enabled: false,
              },
              gridLineColor: "transparent",
          },
          legend: {
              enabled: false,
          },

          plotOptions: {
              column: {
                  stacking: "normal",
                  dataLabels: {
                      enabled: false
                  },

              },

          },
          series:data.widget_data.series_data,
      });
  },
  tableInitiate:function(data){
    let tbody_data = "";
    let widget_data = data.widget_data;
    let ele_id = data['widget_name'];
    if(widget_data.length > 0){
        for (var index = 0; index < widget_data.length; index++) {
          let widget_row_data = widget_data[index];
          tbody_data += "<tr>";
          for (var index_val = 0; index_val < widget_row_data.length; index_val++) {
            tbody_data += "<td title='"+widget_row_data[index_val]+"' class='text-center'>"+widget_row_data[index_val]+"</td>";
          }
          tbody_data += "</tr>";
        }
        $("#"+ele_id+"").show();
        $("#"+ele_id+"_TABLE .no_data_msg_row").hide();
    }else{
        $("#"+ele_id+"").hide();
        $("#"+ele_id+"_TABLE .no_data_msg_row").show();
        tbody_data = '';
    }
    $("#"+ele_id+"_TABLE .loader-box").hide();
    $("#"+ele_id+" .dataTable tbody").html(tbody_data); 
  },
  splineChart:function(data){
    let ele_id = data['widget_name'];
    $("#"+ele_id+"_SPLINE_CHART .loader-box").hide();
    /* initialise spline chart */
    Highcharts.chart("PRODUCTION", {
        chart: {
            type: "spline",
            zoomType: "xy",
        },
        title: null,
        legend: {
            symbolWidth: null,
        },
        credits: {
            enabled: false,
        },
        plotOptions: {
            series: {
                marker: {
                    enabled: false,
                    symbol: "circle",
                },
            },
        },

        xAxis: {
            categories: data.widget_data.catergories,
            maxPadding: 0,
            endOnTick: false,
            startOnTick: false,
        },

        yAxis: {
            visible: false,
            title: {
                text: "",
            },
        },

        tooltip: {
           headerFormat: '<b>{series.name}</b><br/>',
          pointFormat: '{point.category}: {point.y}'
        },

        series: data.widget_data.series_data,
    });

    /* table data initialise */
    let tbody_data = [];
    let widget_data = data.widget_data.series_data;
    if(widget_data.length > 0){
      for (var index = 0; index < widget_data.length; index++) {
            let widget_row_data = widget_data[index]['data'];
            tbody_data += "<tr><td title='"+widget_data[index]['name']+"' class='text-left'>"+widget_data[index]['name']+"</td>";
            for (var index_val = 0; index_val < widget_row_data.length; index_val++) {
              tbody_data += "<td title='"+widget_row_data[index_val]+"' class='text-center '>"+widget_row_data[index_val]+"</td>";
            }
            tbody_data += "</tr>";
      }
    }else{
      tbody_data = '<tr><td colspan="5" class="text-center no-data-td"><div class="center norecord no_data_msg_row mb-3">No customer receivables due found.</div></td></tr>';
    }
    $("#"+ele_id+"_SPLINE_CHART .dataTable tbody").html(tbody_data); 
  }
}





 
  
 
