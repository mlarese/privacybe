webpackJsonp([25],{"2DrJ":function(t,e,r){"use strict";var a={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",{attrs:{row:"",wrap:""}},[r("v-flex",{attrs:{xs12:""}},[t.title?r("v-toolbar",{staticClass:"elevation-1",attrs:{dense:""}},[r("v-toolbar-title",[t._v(t._s(t.$t(t.title)))]),r("v-spacer"),r("v-text-field",{staticClass:"log-list-search",attrs:{"append-icon":"search","single-line":"","hide-details":""},model:{value:t.search,callback:function(e){t.search=e},expression:"search"}})],1):t._e()],1),r("v-flex",{attrs:{xs12:""}},[r("v-data-table",{staticClass:"elevation-1 ",attrs:{search:t.search,headers:t.headers,items:t.filteredLogs,loading:t.loading,"no-data-text":t.$t("Nessun log trovato")},scopedSlots:t._u([{key:"items",fn:function(e){return[r("tr",{staticStyle:{cursor:"pointer"},attrs:{title:t.$t("Click per dettaglio")},on:{click:function(t){e.expanded=!e.expanded}}},[r("td",[t._v(t._s(t._f("dmy")(e.item.date)))]),r("td",[t._v(t._s(e.item.description))]),r("td",[t._v(t._s(e.item.user_name))])])]}},{key:"expand",fn:function(e){return[r("v-card",{staticStyle:{"min-height":"100px",padding:"10px"},attrs:{flat:""}},[r("div",{domProps:{innerHTML:t._s(t.toHtml(e.item.history))}})])]}}])})],1)],1)},staticRenderFns:[]};e.a=a},A1z7:function(t,e,r){var a=r("BO5E");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("2d07672c",a,!0,{sourceMap:!1})},AIF8:function(t,e,r){"use strict";var a=r("Xxa5"),n=r.n(a),s=r("exGp"),i=r.n(s),o=r("Dd8w"),l=r.n(o),c=r("k/Fe"),u=r("NYxO"),p=r("ebEx"),f={root:!0};e.a={components:{LogList:c.a,LogsDateRangeFilter:p.a},methods:l()({},Object(u.mapActions)("operators/logins",["loadFiltered"])),computed:l()({},Object(u.mapState)("api",["isAjax"]),Object(u.mapState)("operators/actionhistory",["list"])),fetch:function(){var t=i()(n.a.mark(function t(e){var r=e.store;return n.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,r.dispatch("operators/actionhistory/loadFiltered",{},f);case 2:case"end":return t.stop()}},t,this)}));return function(e){return t.apply(this,arguments)}}()}},B2ZE:function(t,e,r){"use strict";var a=r("UEmW"),n=r("kgtZ");var s=function(t){r("SSPU")},i=r("VU/8")(a.a,n.a,!1,s,null,null);e.a=i.exports},BO5E:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,".log-list-search{background:#ffffe0}.log-list-search input{padding-left:14px;height:25px;margin-top:4px}",""])},FD6t:function(t,e,r){var a=r("X0lr");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("092bb6bc",a,!0,{sourceMap:!1})},J9f1:function(t,e,r){"use strict";var a=r("Dd8w"),n=r.n(a),s=r("B2ZE"),i=r("NYxO");e.a={name:"LogsDateRangeFilter",components:{DateRangeFilter:s.a},computed:n()({},Object(i.mapState)("app",["logFilter"]))}},PRqH:function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=r("AIF8"),n=r("qceH");var s=function(t){r("FD6t")},i=r("VU/8")(a.a,n.a,!1,s,null,null);e.default=i.exports},SSPU:function(t,e,r){var a=r("bWxy");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("2848d796",a,!0,{sourceMap:!1})},UEmW:function(t,e,r){"use strict";e.a={methods:{onChange:function(){this.$emit("on-change")}},props:{filter:{default:function(){}},title:{default:"Periodo di riferimento"}}}},X0lr:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},ZgX9:function(t,e,r){"use strict";var a=r("dLj/"),n=r.n(a);e.a={name:"LogList",methods:{toHtml:function(t){return"<pre>"+n()(t,4)+"<pre>"}},data:function(){return{search:"",headers:[{text:this.$t("Data"),value:"date"},{text:this.$t("Description"),value:"description"},{text:this.$t("Utente"),value:"user_name"}]}},computed:{filteredLogs:function(){var t=this;return this.type?this.logs.filter(function(e){return e.type===t.type}):this.logs}},props:{logs:{default:function(){return[]}},title:{default:null},type:{default:null},loading:{default:!1}}}},bWxy:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,".el-date-range-picker__header,.el-date-table{font-family:Arial!important}.date-range-filter .el-picker-panel__content td div span{border:1px solid red;font-family:Arial!important}.date-range-filter .el-range-input{font-weight:400!important}.date-range-filter .el-input__icon{line-height:0!important}.date-range-filter .el-range-separator{line-height:22px!important}",""])},"dLj/":function(t,e){function r(t,e){return'<span class="'+t+'">'+e+"</span>"}t.exports=function t(e,a){var a=a||1;function n(){return Array(a).join("  ")}if("string"==typeof e)return r("string value",'"'+function(t){return String(t).replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;")}(e)+'"');if("number"==typeof e)return r("number",e);if("boolean"==typeof e)return r("boolean",e);if(null===e)return r("null","null");if(Array.isArray(e)){++a;var s="[\n"+e.map(function(e){return n()+t(e,a)}).join(",\n");return--a,s+="\n"+n()+"]"}var s="{";var i=Object.keys(e);var o=i.length;o&&(s+="\n");++a;s+=i.map(function(s){var i=e[s];return s=r("string key",s='"'+s+'"'),n()+s+": "+t(i,a)}).join(",\n");--a;o&&(s+="\n"+n());s+="}";return s}},ebEx:function(t,e,r){"use strict";var a=r("J9f1"),n=r("sFOl"),s=r("VU/8")(a.a,n.a,!1,null,null,null);e.a=s.exports},"k/Fe":function(t,e,r){"use strict";var a=r("ZgX9"),n=r("2DrJ");var s=function(t){r("A1z7")},i=r("VU/8")(a.a,n.a,!1,s,null,null);e.a=i.exports},kgtZ:function(t,e,r){"use strict";var a={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",{staticClass:"pa-0 date-range-filter",attrs:{wrap:"","align-center":""}},[r("v-flex",{attrs:{xs12:""}},[r("v-toolbar",{staticClass:"elevation-1",attrs:{dense:""}},[r("v-toolbar-title",[t._v(t._s(t.$t(t.title)))]),r("v-spacer"),r("el-date-picker",{staticClass:"mr-3 date-range-filter__range",attrs:{"range-separator":"-","start-placeholder":t.$t("From"),"end-placeholder":t.$t("To"),format:"dd/MM/yyyy","value-format":"yyyy-MM-dd",type:"daterange"},on:{change:t.onChange},model:{value:t.filter.date_range,callback:function(e){t.$set(t.filter,"date_range",e)},expression:"filter.date_range"}})],1)],1)],1)},staticRenderFns:[]};e.a=a},qceH:function(t,e,r){"use strict";var a={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",{attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"mb-2",attrs:{xs12:""}},[r("LogsDateRangeFilter",{on:{"on-change":t.loadFiltered}})],1),r("v-flex",{attrs:{xs12:""}},[r("LogList",{attrs:{title:"Operatori: Creazione",logs:t.list,type:"operator creation",loading:t.isAjax}})],1),r("v-flex",{staticClass:"pt-2",attrs:{xs12:""}},[r("LogList",{attrs:{title:"Operatori: Modifiche",logs:t.list,type:"operator update",loading:t.isAjax}})],1),r("v-flex",{staticClass:"pt-2",attrs:{xs12:""}},[r("LogList",{attrs:{title:"Operatori: Invio email di password reset",logs:t.list,type:"operators_email_password_rest",loading:t.isAjax}})],1),r("v-flex",{staticClass:"pt-2",attrs:{xs12:""}},[r("LogList",{attrs:{title:"Operatori: Password reset",logs:t.list,type:"operators_password_rest",loading:t.isAjax}})],1)],1)},staticRenderFns:[]};e.a=a},sFOl:function(t,e,r){"use strict";var a={render:function(){var t=this.$createElement;return(this._self._c||t)("DateRangeFilter",this._g({attrs:{filter:this.logFilter}},this.$listeners))},staticRenderFns:[]};e.a=a}});