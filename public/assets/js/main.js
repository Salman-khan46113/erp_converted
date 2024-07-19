$( document ).ready(function() {
    app.init();
});

const app = {
  init: function(){
      $(document).on("click",'.layout-menu-toggle',function(){
          if($(this).find('i').hasClass("bx-chevron-right")){
              $(this).find('i').removeClass("bx-chevron-right").addClass("bx-chevron-left")
              $('html').addClass("layout-compact").removeClass("layout-menu-collapsed").removeClass("layout-menu-hover")
          }else{
              $('html').removeClass("layout-compact").addClass("layout-menu-collapsed")
              $(this).find('i').removeClass("bx-chevron-left").addClass("bx-chevron-right")
              $(this).addClass("hide")
          }
      })

      $("#layout-menu").on("mouseover",function(){
        if(!$('html').hasClass("layout-compact")){
          $('html').addClass("layout-menu-hover")

        }
          // $(this).find('i').removeClass("bx-chevron-right").addClass("bx-chevron-left")
      })
      $('#layout-menu').on('mouseleave',function(){
        if(!$('html').hasClass("layout-compact")){
            $('html').removeClass("layout-menu-hover")
        }
        
        // $(this).find('i').removeClass("bx-chevron-left").addClass("bx-chevron-right")
      });
      $(".menu-item").on("click",function(){
        
         if(!$(this).hasClass("open-menu")){
            $(this).addClass("open-menu")
         }else{
            $(this).removeClass("open-menu")
         }
         $(this).find('.menu-sub').slideToggle('slow')
      })

      $(".filter-icon,.close-filter-btn").on('click',function(){
        if($(".filter-popup-block").hasClass("show")){
          $(".filter-popup-block").removeClass("show")
          $(".filter-popup-block").animate({
            width: 0
          },100)
        }else{
          $(".filter-popup-block").addClass("show")
          $(".filter-popup-block").animate({
            width: 330
          },100)
        }
        
      })
      $(".filter-row .search-show-hide").on("click",function(){
         var element = $(this).parents(".filter-row");
         var cursor_element = $(this).find("i.ti-minus");
         if(cursor_element.length > 0){
          $(this).html("<i class='ti ti-plus'></i>")
         }else{
          $(this).html("<i class='ti ti-minus'></i>")
         }
         $(element).find(".sidebar-item").toggle()
      })
      $("#downloadPDFBtn").on("click",function(){
          $(".buttons-pdf").trigger("click");
      })
      $("#downloadCSVBtn").on("click",function(){
          $(".buttons-csv").trigger("click");
      })
      $(".select2-init").select2();
  }
}