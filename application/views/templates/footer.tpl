</div>
</div>
</div>
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<%include 'quick_menu.tpl'%>
<link rel="stylesheet" href="<%$base_url%>public/assets/css/demo.css" />
<style>
</style>
<script type="text/javascript">
	/*
The MIT License (MIT)

AwesomeGrid v1.0.4

Copyright (c) 2014 M. Kamal Khan <http://bhittani.com/jquery/awesome-grid/>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
!function(t){"use strict";var n={_widthGrid:0,_widthItem:0,_ColumnsArr:[],_Columns:[],_$items:null,init:function(n,o){var e=this;
e.elem=o,e.$elem=t(o),e.options=t.extend({},t.fn.AwesomeGrid.options,n),e._ColumnsArr=e.sort(e.options.columns),e.extract(),e.layout(),e.options.responsive&&t(window).resize(function(){e.extract(),e.layout()
}),e.$elem.on("ag-add",function(t,n){e.$elem.append(n),e.add_one(n)})},sort:function(n){var o=2,e=[],i=0;
return t.each(n,function(t,n){if(n=parseInt(n),parseInt(t)){t=parseInt(t),i||(e[i]=[],e[i][0]=t,e[i][1]=n);
for(var s=i-1;s>=0&&t>e[s][0];)e[s+1]=[],e[s+1][0]=e[s][0],e[s+1][1]=e[s][1],e[s][0]=t,e[s][1]=n,s--;
i++}else"defaults"==t&&(o=n)}),e.push(o),e},get_columns:function(){for(var t=this,n=t._ColumnsArr,o=n[n.length-1],e="self"==t.options.context?t.$elem.width():window.innerWidth,i=0;i<n.length;i++)n[i][0]&&e<=n[i][0]&&(o=n[i][1]);
return o},extract:function(){var n=this;n._$items=t(" > "+n.options.item,n.$elem),n._widthGrid=n.$elem.innerWidth();
var o=n.get_columns(),e=n.options.colSpacing;n._widthItem=(e+n._widthGrid-o*e)/o;
var i=0;n._Columns=[];for(var s=0;o>s;s++)n._Columns[s]={height:0,left:i+"px"},i+=n._widthItem+n.options.colSpacing;
n.$elem.css("position","relative")},smallest:function(){for(var t=this,n=0,o=t._Columns.length>0?t._Columns[0].height:0,e=0;e<t._Columns.length;e++)t._Columns[e].height<o&&(n=e,o=t._Columns[e].height);
return n},largest:function(t){for(var n=this,o=0,e=t[0],i=0;i<t.length;i++)n._Columns[t[i]].height>e&&(o=i,e=n._Columns[t[i]].height);
return o},layout:function(){var n=this;n._$items.each(function(){n.add_one(t(this))
})},add_one:function(t){var n,o,e,i=this;if(!i.options.hiddenClass||!t.hasClass(i.options.hiddenClass)){if(t.outerWidth(i._widthItem),e=[],e[0]=i.smallest(),o=t.data("x")){o=o>=i._Columns.length?i._Columns.length:o,t.outerWidth(i._widthItem*o+(o-1)*i.options.colSpacing),e[0]+o>=i._Columns.length&&(e[0]-=e[0]+o-i._Columns.length);
for(var s=1;o>s;s++)e[s]=e[s-1]+1}n=i._Columns[e[i.largest(e)]].height+(0==i._Columns[e[i.largest(e)]].height?i.options.initSpacing:i.options.rowSpacing),t.css({position:"absolute",left:i._Columns[e[0]].left,top:n+"px"}).addClass("ag-col-"+(e[0]+1));
for(var l=0;l<e.length;l++)i._Columns[e[l]].height=n+t.outerHeight(),i.$elem.height(i._Columns[e[l]].height);
i.options.fadeIn&&t.fadeIn("fast"),i.options.onReady&&i.options.onReady(t)}}};t.fn.AwesomeGrid=function(t){return this.each(function(){var o=function(){function t(){}return t.prototype=n,new t
}();o.init(t,this)})},t.fn.AwesomeGrid.options={rowSpacing:20,colSpacing:20,initSpacing:0,columns:2,context:"window",responsive:!0,fadeIn:!0,hiddenClass:!1,item:"li",onReady:function(){}}
}(jQuery);
//# sourceMappingURL=awesome-grid.min.js.map
$(document).ready(function(){
		
           setTimeout(function(){
           		$('.sitemap-items').AwesomeGrid({
            rowSpacing  : 20,    
            colSpacing  : 20,  
            initSpacing : 0,     
            responsive  : true,  
            fadeIn      : true,  
            hiddenClass : false, 
            item        : 'div.span3',  
            onReady     : function(item){},  
            columns     : {  
                'defaults' : 4,  
                '800'      : 2   
			},
			context     : 'window'    
		});	
           },100);
           
	});
</script>
<!-- <script src="<%$base_url%>public/assets/vendor/libs/popper/popper.js"></script> -->
<script src="<%$base_url%>public/assets/js/main.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>