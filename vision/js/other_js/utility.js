function enableAntiXssAjaxPosts(){$.ajaxPrefilter(function(n){var t,i;if(n.type.toUpperCase()==="POST"){if(t=$("input[name^=__RequestVerificationToken]").first(),!t.length)return;i=t.attr("name");n.contentType.indexOf("application/json")===0?n.url+=(n.url.indexOf("?")===-1?"?":"&")+t.serialize():typeof n.data=="string"&&n.data.indexOf(i)===-1&&(n.data+=(n.data?"&":"")+t.serialize())}})}ko.bindingHandlers.showModal={init:function(n){$(n).modal({backdrop:"static",keyboard:!0,show:!1})},update:function(n,t){var i=t();ko.utils.unwrapObservable(i)?($(n).modal("show"),$("input",n).focus()):$(n).modal("hide")}};ko.bindingHandlers.highlight={update:function(n,t){ko.toJS(t());var i=parseInt($(n).html(),10),r=parseInt(t()(),10);$(n).data("ko_init")?r<i?$(n).effect("highlight",{color:"#AA0000"},1e3):r>i&&$(n).effect("highlight",{color:"#00AA00"},1e3):$(n).data("ko_init",!0)}};ko.bindingHandlers.datepicker={init:function(n,t){$(n).datetimepicker({format:"MM/DD/YYYY"});$(n).on("dp.change",function(n){var i=t();i(n.date)})},update:function(n,t){var i=ko.utils.unwrapObservable(t()),r;i&&(r=new moment(i),$(n).data("DateTimePicker").date(r))}};ko.bindingHandlers.timer={update:function(n){var t=$(n).text(),i=setInterval(function(){$(n).text(--t);t==0&&clearInterval(i)},1e3)}};ko.subscribable.fn.subscribeChanged=function(n){var t;this.subscribe(function(n){t=n},this,"beforeChange");this.subscribe(function(i){n(i,t)})};ko.extenders.calculateDelta=function(n){return n.absoluteChange=ko.observable(),n.percentChange=ko.observable(),n.subscribeChanged(function(t,i){n.percentChange(t&&i?(t-i)/i*100:0);n.absoluteChange(t&&i?t-i:0)}),n};ko.extenders.numeric=function(n,t){var i=ko.pureComputed({read:n,write:function(i){var u=n(),f=Math.pow(10,t),e=isNaN(i)?0:parseFloat(+i),r=Math.round(e*f)/f;r!==u?n(r):i!==u&&n.notifySubscribers(r)}}).extend({notify:"always"});return i(n()),i};ko.extenders.date=function(n){n(new moment);n.month=ko.observable().extend({required:!0,min:0,max:11});n.date=ko.observable().extend({required:!0,min:1,max:31});n.year=ko.observable().extend({required:!0,min:1900,max:2016});n.month.subscribe(function(){n.month(n.month())});n.date.subscribe(function(){n.date(n.date())});n.year.subscribe(function(){n.year(n.year())});return ko.computed({read:n,write:function(t){var i=new moment(t);n.month(i.month());n.date(i.date());n.year(i.year())}})};ko.observableArray.fn.indexed=function(n){var t=this;return n=n||"id",this.index=ko.computed(function(){for(var f,r,e=t(),o={},i=0,u=e.length;i<u;i++)f=e[i],r=ko.unwrap(f[n]),(r||r===0)&&(o[r]=i);return o}),this.contains=function(i){var u=ko.unwrap(i[n]),r=t.index()[u];return!!(r||r===0)},this.toggleItem=function(i){var r=ko.unwrap(i[n]),u=t.index()[r];u||u===0?t.splice(u,1):(r||r===0)&&t.push(i)},this.addOrUpdate=function(i){var u=ko.unwrap(i[n]),r=t.index()[u];r||r==0?t.splice(r,1,i):t.push(i)},this},function(){window.KODataTable=function(){function n(n){var t,i,r,u,f,e,o,s,h,c,l,a,v,y,p,w,b,k,d,g,nt,tt,it,rt,ut,ft,et,ot;this.options=n;this.searchText=ko.observable((t=(i=this.options)!=null?i.searchText:void 0)!=null?t:"");this.columns=ko.observableArray((v=(tt=this.options)!=null?tt.columns:void 0)!=null?v:[]);this.rows=ko.observableArray((it=(rt=this.options)!=null?rt.rows:void 0)!=null?it:[]);this.currentPage=ko.observable((ut=(ft=this.options)!=null?ft.currentPage:void 0)!=null?ut:0);this.pageSize=ko.observable((et=(ot=this.options)!=null?ot.pageSize:void 0)!=null?et:20);this.selectedColumn=ko.observable((r=(u=this.options)!=null?u.selectedColumn:void 0)!=null?r:0);this.tableHeight=(f=(e=this.options)!=null?e.tableHeight:void 0)!=null?f:0;this.tableWidth=(o=(s=this.options)!=null?s.tableWidth:void 0)!=null?o:0;this.sortDir=(h=(c=this.options)!=null?c.sortDir:void 0)!=null?h:[];this.autoSearch=(l=(a=this.options)!=null?a.autoSearch:void 0)!=null?l:!0;this.selectedRow=ko.observable(((y=this.options)!=null?y.selectedRow:void 0)!=null);this.filter=ko.observable(this.searchText());this.autoSearch&&(this.throttleSearch=ko.computed(function(n){return function(){return n.filter(n.searchText())}}(this)),this.throttleSearch.extend({throttle:300}));this.filteredRows=ko.computed(function(n){return function(){var t;return t=n.filter().toLowerCase(),t?ko.utils.arrayFilter(n.rows(),function(i){return i[n.selectedColumn()].toString().toLowerCase().indexOf(t)>-1}):n.rows()}}(this));this.currentRows=ko.computed(function(n){return function(){return(n.currentPage()+1)*n.pageSize()>n.filteredRows().length?n.filteredRows().slice(n.currentPage()*n.pageSize()):n.filteredRows().slice(n.currentPage()*n.pageSize(),+((n.currentPage()+1)*n.pageSize()-1)+1||9e9)}}(this));this.pageCount=ko.computed(function(n){return function(){return Math.ceil(n.filteredRows().length/n.pageSize())}}(this));this.nextFn=((p=this.options)!=null?p.nextFn:void 0)!=null;this.prevFn=((w=this.options)!=null?w.prevFn:void 0)!=null;this.searchFn=((b=this.options)!=null?b.searchFn:void 0)!=null;this.sortFn=((k=this.options)!=null?k.sortFn:void 0)!=null;this.lastFn=((d=this.options)!=null?d.lastFn:void 0)!=null;this.firstFn=((g=this.options)!=null?g.firstFn:void 0)!=null;this.selectFn=((nt=this.options)!=null?nt.selectFn:void 0)!=null;typeof jQuery.fn.jTableScroll=="function"&&jQuery(function(n){return function(){return jQuery(".jTableScroll").jTableScroll({height:n.tableHeight,width:n.tableWidth})}}(this));this.activeSort=ko.observable(function(){return 0})}return n.prototype.nextPage=function(){if((this.currentPage()+1)*this.pageSize()<this.filteredRows().length)return typeof this.nextFn=="function"&&this.nextFn(),this.currentPage(this.currentPage()+1)},n.prototype.prevPage=function(){if(this.currentPage()>0)return typeof this.prevFn=="function"&&this.prevFn(),this.currentPage(this.currentPage()-1)},n.prototype.lastPage=function(){return typeof this.lastFn=="function"&&this.lastFn(),this.currentPage(Math.ceil(this.filteredRows().length/this.pageSize())-1)},n.prototype.firstPage=function(){return typeof this.firstFn=="function"&&this.firstFn(),this.currentPage(0)},n.prototype.search=function(){return typeof this.searchFn=="function"&&this.searchFn(),this.filter(this.throttleSearch()()),this.currentPage(0)},n.prototype.sort=function(n){var t;return typeof this.sortFn=="function"?this.sortFn(n):(this.sortDir[n]||(this.sortDir[n]="A"),this.rows.sort(function(t){return function(i,r){return t.sortDir[n]==="A"?i[t.columns()[n]]===r[t.columns()[n]]?0:i[t.columns()[n]]<r[t.columns()[n]]?-1:1:i[t.columns()[n]]===r[t.columns()[n]]?0:i[t.columns()[n]]>r[t.columns()[n]]?-1:1}}(this)),this.sortDir[n]=(t=this.sortDir[n]==="A")!=null?t:{D:"A"})},n.prototype.selectRow=function(n){return this.selectedRow(n),typeof this.selectFn=="function"?this.selectFn():void 0},n.prototype.sort=function(n){var r;if(!n.isSortable)return self.activeSort();n.active()&&n.asc(!n.asc());ko.utils.arrayForEach(self.headers,function(n){n.active(!1)});n.active(!0);var t=n.sortPropertyName,i=function(n,i){return n[t]<i[t]?-1:n[t]>i[t]?1:n[t]==i[t]?0:0},u=function(n,t){return i(t,n)};t=="lastChecked"?i=function(n,t){return n.lastChecked.isBefore(t.lastChecked)?-1:n.lastChecked.isAfter(t.lastChecked)?1:n.lastChecked.isSame(t.lastChecked)?0:0}:t=="status"?i=function(n,t){return n.status()<t.status()?-1:n.status()>t.status()?1:n.status()==t.status()?0:0}:t=="notice"&&(i=function(n,t){return n.notice.localeCompare(t.notice)});r=n.asc()?i:u;self.activeSort(r)},n}()}.call(this),function(n){n.fn.jTableScroll=function(t){var r,i,f;t=n.extend({width:null,height:null,backgroundcolor:null,headerCss:null,reactive:!0},t||{});r=n("<div>").css({visibility:"hidden",width:"50px",height:"50px",overflow:"scroll"}).appendTo("body");i=50-n("<div>").height(99).appendTo(r).outerWidth();r.remove();var u=-1,e=navigator.userAgent,o=new RegExp("Trident/([0-9]{1,}[.0-9]{0,})");o.exec(e)!=null&&(u=parseFloat(RegExp.$1));f=u==4;this.each(function(){var r=n(this),y=r.parent(),b=y.width(),a=parseInt(t.width?t.width:y.width()),v=parseInt(t.height?t.height:y.height()),k,h,u,c,l,e,o,s,d,w,p;r.width()<=a&&r.height()<=v||(k=r.width(),r.width(k),h=n(document.createElement("div")),h.css({overflow:"hidden"}).width(a).height(v),u=n(document.createElement("div")),u.css({overflow:"hidden",position:"relative"}).width(a),t.headerCss&&u.addClass(t.headerCss),c=r.clone(),c.find("tbody").remove(),c.find("tfoot").remove(),l=r.clone(),l.find("tbody").remove(),l.find("thead").remove(),e=null,r.find("thead").find("th").each(function(i,r){var u=n(r),f=u.width();e==null&&(e=t.backgroundcolor==null?u.bkgcolor():t.backgroundcolor);(e=="rgba(0, 0, 0, 0)"||e=="transparent")&&(e="#fff");u.css("width",f+"px");n(c.find("th")[i]).click(function(){u.click()});n(c.find("th")[i]).width(f);n(l.find("th")[i]).click(function(){u.click()});n(l.find("td")[i]).width(f)}),o=n(document.createElement("div")),o.css({overflow:"hidden",position:"relative","background-color":e}).width(a),c.css({"table-layout":"fixed","background-color":e}),l.css({"table-layout":"fixed","background-color":e}),r.css({"table-layout":"fixed"}),s=n(document.createElement("div")),s.scroll(function(){u.scrollLeft(s.scrollLeft());o.scrollLeft(s.scrollLeft())}),u.append(c),o.append(l),r.before(h),r.appendTo(s),h.append(u),h.append(s),h.append(o),d=r.height()+u.height()+o.height(),d>=v&&(u.width(u.width()-i),o.width(o.width()-i)),w=parseFloat(s.css("margin-top")),w-=u.height(),p=parseFloat(s.css("margin-bottom")),p-=o.height(),r.width()+i>=a&&(p-=i),s.css({overflow:"auto","margin-top":w+"px","margin-bottom":p+"px"}).width(a).height(v-i),f&&r.find("thead").hide(),t.reactive&&n(window).resize(function(){if(b!=y.width()){var n=y.width();if(t.width&&n>t.width)return;h.css({overflow:"hidden"}).width(n).height(v);u.css({overflow:"hidden",position:"relative"}).width(n-i);s.css({overflow:"auto","margin-top":w+"px","margin-bottom":p+"px"}).width(n).height(v-i);o.css({overflow:"hidden",position:"relative","background-color":e}).width(n-i);b=n}}))})}}(jQuery),function(n){var t=n('<div style="background:none;display:none;"/>').appendTo("body"),i=t.css("backgroundColor");t.remove();jQuery.fn.bkgcolor=function(t){function r(n){return n.css("backgroundColor")==i?n.is("body")?t||i:r(n.parent()):n.css("backgroundColor")}return r(n(this))}}(jQuery);$.fn.dataTable&&($.fn.dataTable.ext.errMode="throw");enableAntiXssAjaxPosts();$("form").on("focus","input[type=number]",function(){$(this).on("mousewheel.disableScroll",function(n){n.preventDefault()})});$("form").on("blur","input[type=number]",function(){$(this).off("mousewheel.disableScroll")})