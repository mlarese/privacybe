webpackJsonp([18],{"0bYI":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("7V4y"),i=a("fKl7");var l=function(t){a("mk5g")},n=a("VU/8")(s.a,i.a,!1,l,null,null);e.default=n.exports},"1eZA":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO");e.a={name:"LastCheckOutBtn",computed:i()({},Object(l.mapState)("bi/qrLastCheckout",["filter"]),Object(l.mapState)("app",["isAjax"])),data:function(){return{valid:!0}},methods:i()({},Object(l.mapMutations)("bi/qrLastCheckout",["resetFilter","togglePanelFilter","setList"]),Object(l.mapActions)("bi/qrLastCheckout",["loadData"]),{search:function(){this.setList([]),this.loadData({})},cancel:function(){this.resetFilter()}})}},"3ySK":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.filter?a("v-container",{staticClass:"pa-0 ma-0 bi-query-filters",attrs:{fluid:"","grid-list-sm":""}},[a("SaveBiResultDialog",{attrs:{show:t.showSaveDialog},on:{"on-close":function(e){t.showSaveDialog=!1},"on-cancel":function(e){t.showSaveDialog=!1}}}),a("BiLoadResultDialog",{attrs:{show:t.showOpenDialog},on:{"on-close":function(e){t.showOpenDialog=!1},"on-cancel":function(e){t.showOpenDialog=!1}}}),a("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[a("v-toolbar-title",[t._v("\n            "+t._s(t.$t("Modelli Predittivi"))+"\n        ")]),a("v-spacer"),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",fab:"",disabled:!t.hasQuery,small:"",color:"success"},on:{click:t.openSaveDialog},slot:"activator"},[a("v-icon",[t._v("save")])],1),t._v("\n            "+t._s(t.$t("Salva query"))+"\n        ")],1),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",fab:"",small:"",color:"info"},on:{click:t.openOpenDialog},slot:"activator"},[a("v-icon",[t._v("cloud_download")])],1),t._v("\n            "+t._s(t.$t("Carica query salvata"))+"\n        ")],1),a("v-btn",{staticClass:"mt-1",attrs:{flat:"",fab:"",small:""},on:{click:function(e){t.panelFilter.predictiveFltPanelOpen=!t.panelFilter.predictiveFltPanelOpen}}},[t.panelFilter.predictiveFltPanelOpen?a("v-icon",[t._v("keyboard_arrow_up")]):a("v-icon",[t._v("keyboard_arrow_down")])],1)],1),t.panelFilter.predictiveFltPanelOpen?a("v-card",{staticClass:"pa-2 elevation-1"},[a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-select",{attrs:{"hide-details":"",items:t.leadtimeOptions,"item-value":"value","item-text":"label",attach:"",chips:"",label:t.$t("Lead time"),multiple:""},model:{value:t.filter.leadtime,callback:function(e){t.$set(t.filter,"leadtime",e)},expression:"filter.leadtime"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-select",{attrs:{"hide-details":"",items:t.items,attach:"",chips:"",label:t.$t("Channel"),multiple:""},model:{value:t.filter.channel,callback:function(e){t.$set(t.filter,"channel",e)},expression:"filter.channel"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-in")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkin_from,callback:function(e){t.$set(t.filter,"checkin_from",e)},expression:"filter.checkin_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkin_to,callback:function(e){t.$set(t.filter,"checkin_to",e)},expression:"filter.checkin_to"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-out")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkout_from,callback:function(e){t.$set(t.filter,"checkout_from",e)},expression:"filter.checkout_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkout_to,callback:function(e){t.$set(t.filter,"checkout_to",e)},expression:"filter.checkout_to"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-select",{attrs:{"hide-details":"",items:t.timeRange,"item-value":"value","item-text":"label",label:t.$t("Ultima prenotazione")},model:{value:t.filter.time_range_type,callback:function(e){t.$set(t.filter,"time_range_type",e)},expression:"filter.time_range_type"}})],1),a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero"),box:""},model:{value:t.filter.time_range_value,callback:function(e){t.$set(t.filter,"time_range_value",e)},expression:"filter.time_range_value"}})],1),a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero Notti"),box:""},model:{value:t.filter.nights,callback:function(e){t.$set(t.filter,"nights",e)},expression:"filter.nights"}})],1)],1)],1):t._e()],1):t._e()},staticRenderFns:[]};e.a=s},"7V4y":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("Xxa5"),n=a.n(l),r=a("//Fk"),o=a.n(r),c=a("exGp"),u=a.n(c),v=a("IP0F"),d=a("ppOC"),p=a("RkB0"),f=a("NYxO");e.a={name:"predict",fetch:function(){var t=u()(n.a.mark(function t(e){var a,s=e.store;return n.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return s.dispatch("treatments/load",{},{root:!0}),s.dispatch("terms/load",{},{root:!0}),s.commit("bi/qrLastCheckout/resetFilter"),t.next=5,s.dispatch("terms/loadFilter",{},{root:!0});case 5:return t.t0=t.sent,t.next=8,s.dispatch("bi/qrLastCheckout/loadFilterOptions",{},{root:!0});case 8:return t.t1=t.sent,a=[t.t0,t.t1],t.abrupt("return",o.a.all(a));case 11:case"end":return t.stop()}},t,this)}));return function(e){return t.apply(this,arguments)}}(),methods:i()({},Object(f.mapActions)("bi/qrLastCheckout",["loadData"])),computed:i()({},Object(f.mapState)("bi/qrLastCheckout",["list"]),Object(f.mapState)("app",["biTitle"]),Object(f.mapGetters)("app",["userHasPredictive"])),components:{LastCheckoutList:v.a,LastCheckOutPredictiveFilter:p.a,LastCheckOutBtn:d.a}}},"7t75":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"text-xs-center"},[a("v-flex",[a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",loading:t.isAjax,small:"",fab:"",color:"info"},on:{click:t.search},slot:"activator"},[a("v-icon",[t._v("search")])],1),t._v("\n            "+t._s(t.$t("Esegui query"))+"\n        ")],1),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",color:"warning",fab:"",small:"",disabled:!t.valid},on:{click:t.cancel},slot:"activator"},[a("v-icon",[t._v("clear")])],1),t._v("\n            "+t._s(t.$t("Reset"))+"\n        ")],1)],1)],1)},staticRenderFns:[]};e.a=s},"B+Cw":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"last-check-out-list pa-0",attrs:{row:""}},[a("v-data-table",t._b({staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list,loading:t.isAjax},scopedSlots:t._u([{key:"items",fn:function(e){var s=e.item;return[a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.product)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.origin)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.country))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.language))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.paxtype)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t._f("dmy")(t.$t(s.opened))))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t._f("dmy")(s.checkin)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t._f("dmy")(s.checkout)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.leadtime)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.nights))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.email))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.name)+" "+t._s(s.surname))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.return_dates)))])]}}])},"v-data-table",t.tableTexts,!1))],1)},staticRenderFns:[]};e.a=s},"B1m/":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO");e.a={methods:i()({},Object(l.mapActions)("bi/qrLastCheckout",["loadResultListRecord"]),{loadData:function(t){this.loadResultListRecord(t.id),this.$emit("result-loaded")}}),computed:i()({},Object(l.mapState)("bi/qrLastCheckout",["resultList"])),components:{}}},Bwf2:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".filter-numeric-text-field{width:100px;position:relative;top:3px}",""])},FwJs:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"500"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("save")]),t._v("\n            "+t._s(t.$t("Carica Risultati"))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("BiResultList",{on:{"result-loaded":t.onResultLoaded}}),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))])],1)],1)],1)},staticRenderFns:[]};e.a=s},"GlR+":function(t,e,a){var s=a("Y40B");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("38425a48",s,!0,{sourceMap:!1})},IP0F:function(t,e,a){"use strict";var s=a("kf//"),i=a("B+Cw"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=l.exports},LNrM:function(t,e,a){"use strict";var s=a("B1m/"),i=a("fusy");var l=function(t){a("GlR+")},n=a("VU/8")(s.a,i.a,!1,l,"data-v-1ebfe1fd",null);e.a=n.exports},"R/G8":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO");e.a={watch:{show:function(){this.resultName=""}},computed:i()({},Object(l.mapGetters)("auth",["canSave"])),methods:i()({},Object(l.mapActions)("bi/qrLastCheckout",["saveResultList"]),{onCancel:function(){this.resultName="",this.$emit("on-cancel")},onSave:function(){var t=this;return this.saveResultList(this.resultName).then(function(){t.resultName=""}).then(function(){return t.$emit("on-close")})}}),mounted:function(){this.resultName=""},data:function(){return{resultName:""}},props:{show:{default:!1}}}},RkB0:function(t,e,a){"use strict";var s=a("bi2Q"),i=a("3ySK");var l=function(t){a("ShRW")},n=a("VU/8")(s.a,i.a,!1,l,null,null);e.a=n.exports},ShRW:function(t,e,a){var s=a("Bwf2");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("54ea2485",s,!0,{sourceMap:!1})},Y40B:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},YZk1:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"500"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("save")]),t._v("\n            "+t._s(t.$t("Salva query"))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-form",{ref:"exportform"},[a("v-text-field",{attrs:{"prepend-icon":"description",label:t.$t("Description"),box:""},model:{value:t.resultName,callback:function(e){t.resultName=e},expression:"resultName"}})],1)],1)],1),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.resultName},nativeOn:{click:function(e){return t.onSave(e)}}},[a("v-icon",[t._v("cloud_download")]),a("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Save")))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},bi2Q:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO"),n=a("jLWv"),r=a("wEVJ"),o=a("ghGH");e.a={name:"LastCheckOutPredictiveFilter",components:{SaveBiResultDialog:r.a,BiLoadResultDialog:o.a},methods:i()({},Object(l.mapActions)("bi/qrLastCheckout",["loadResultList"]),{formatDate:n.b,parseDate:n.f,openSaveDialog:function(){this.showSaveDialog=!0},openOpenDialog:function(){var t=this;this.loadResultList().then(function(){t.showOpenDialog=!0})}}),computed:i()({},Object(l.mapState)("bi/qrLastCheckout",["filter","list","timeRange","panelFilter","filterOptions"]),{leadtimeOptions:function(){var t=[];if(this.filterOptions.leadtime)for(var e=0;e<this.filterOptions.leadtime.length;e++){var a=this.filterOptions.leadtime[e];t.push({value:a,label:this.$t(a)})}return t},hasQuery:function(){return this.list.length>0}}),data:function(){return{showSaveDialog:!1,showOpenDialog:!1,fltCheckinDate:null,fltCheckinDateFormatted:"",fltCheckoutDateFormatted:"",valid:!0,date:"",items:[],dates:[],fltDtMenuCheckIn:!1,fltDtMenuCheckOut:!1,row:!1}}}},fKl7:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"ma-0 pa-0 bi-query-filters"},[this.userHasPredictive?e("v-layout",{staticClass:"mb-2",attrs:{wrap:"",row:""}},[e("v-flex",{attrs:{xs12:""}},[e("LastCheckOutPredictiveFilter")],1)],1):this._e(),e("LastCheckOutBtn"),e("v-layout",{staticClass:"mt-2",attrs:{wrap:"",row:""}},[e("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[e("v-toolbar-title",[this._v(this._s(this.$t("Risultati")))])],1),e("v-flex",{attrs:{xs12:""}},[e("LastCheckoutList")],1)],1)],1)},staticRenderFns:[]};e.a=s},fusy:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{attrs:{row:""}},[a("v-flex",[a("v-card",[a("v-toolbar",{staticClass:"elevation-1",attrs:{dense:""}},[a("v-toolbar-title",[t._v(t._s(t.$t("Ricerche salvate")))])],1),a("v-list",{staticStyle:{height:"300px","overflow-y":"auto"},attrs:{"two-line":""}},[t._l(t.resultList,function(e,s){return[a("v-list-tile",{key:e.id,attrs:{avatar:""},on:{click:function(a){t.loadData(e)}}},[a("v-list-tile-avatar",[a("v-icon",{staticClass:"blue white--text"},[t._v("folder_open")])],1),a("v-list-tile-content",[a("v-list-tile-title",{domProps:{innerHTML:t._s(e.description)}}),a("v-list-tile-sub-title",[t._v(t._s(t._f("dmy")(e.creationDate.date)))])],1)],1),a("v-divider")]})],2)],1)],1)],1)},staticRenderFns:[]};e.a=s},ghGH:function(t,e,a){"use strict";var s=a("jnZc"),i=a("FwJs"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=l.exports},jnZc:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO"),n=a("LNrM");e.a={name:"BiLoadResultDialog",components:{BiResultList:n.a},computed:i()({},Object(l.mapGetters)("auth",["canSave"])),methods:i()({},Object(l.mapActions)("bi/qrLastCheckout",["saveResultList"]),{onResultLoaded:function(){this.$emit("on-close")},onCancel:function(){this.$emit("on-cancel")}}),props:{show:{default:!1}}}},"kf//":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO");e.a={data:function(){var t=[{text:this.$t("Product"),value:"product"},{text:this.$t("Origin"),value:"origin"},{text:this.$t("Nationality"),value:"country"},{text:this.$t("Language"),value:"language"},{text:this.$t("Pax type"),value:"paxtype",width:40},{text:this.$t("Opened"),value:"opened"},{text:this.$t("From"),value:"checkin"},{text:this.$t("To"),value:"checkout"},{text:this.$t("Leadtime"),value:"leadtime"},{text:this.$t("Nights"),value:"nights"},{text:this.$t("Email"),value:"email"},{text:this.$t("Name"),value:"name"},{text:this.$t("Ritorni"),value:"return_dates"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[10,20,50,100]},headers:t}},components:{},computed:i()({},Object(l.mapGetters)("bi/qrLastCheckout",["privaciesByEmail"]),Object(l.mapState)("bi/qrLastCheckout",["list"]),Object(l.mapState)("api",["isAjax"]))}},mk5g:function(t,e,a){var s=a("tpVB");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("5cda30ff",s,!0,{sourceMap:!1})},ppOC:function(t,e,a){"use strict";var s=a("1eZA"),i=a("7t75"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=l.exports},tpVB:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".bi-query-filters .list__tile{font-size:12px;height:22px}.input-group--selection-controls{min-width:0}.chip.chip--select-multi{height:18px!important;font-size:11px!important}",""])},wEVJ:function(t,e,a){"use strict";var s=a("R/G8"),i=a("YZk1"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=l.exports}});