webpackJsonp([15],{"1eZA":function(t,e,a){"use strict";e.a={name:"LastCheckOutBtn",data:function(){return{valid:!0}},methods:{search:function(){},cancel:function(){}}}},"5PD8":function(t,e,a){"use strict";var s=a("eIzO"),i=a("V21m");e.a={components:{LastCheckout:s.a},mixins:[Object(i.a)("bi/qrLastCheckout")],fetch:function(t){t.store}}},"6I4F":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"last-check-out-list pa-0",attrs:{row:""}},[a("v-data-table",t._b({staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list},scopedSlots:t._u([{key:"items",fn:function(e){var s=e.item;return[a("td",[t._v(t._s(s.product))]),a("td",[t._v(t._s(s.origin))]),a("td",[t._v(t._s(s.channel))]),a("td",[t._v(t._s(s.country))]),a("td",[t._v(t._s(t.$t(s.paxtype)))]),a("td",[t._v(t._s(t._f("dmy")(s.checkin)))]),a("td",[t._v(t._s(t._f("dmy")(s.checkout)))]),a("td",[t._v(t._s(s.nights))]),a("td",[t._v(t._s(s.name))])]}}])},"v-data-table",t.tableTexts,!1))],1)},staticRenderFns:[]};e.a=s},"8/rj":function(t,e,a){"use strict";var s=a("X+F4"),i=a("B5Fy");var n=function(t){a("Tt+A")},l=a("VU/8")(s.a,i.a,!1,n,"data-v-5ea53b30",null);e.a=l.exports},"9Tyj":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"500"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("save")]),t._v("\n            "+t._s(t.$t("Carica Risultati"))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("BiResultList",{on:{"result-loaded":t.onResultLoaded}}),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))])],1)],1)],1)},staticRenderFns:[]};e.a=s},"B1m/":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO");e.a={methods:i()({},Object(n.mapActions)("bi/qrLastCheckout",["loadResultListRecord"]),{loadData:function(t){var e=this;this.loadResultListRecord(t.id).then(function(){return e.$emit("result-loaded")})}}),computed:i()({},Object(n.mapState)("bi/qrLastCheckout",["resultList"])),components:{}}},B5Fy:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.filter?a("v-container",{staticClass:"pa-0 ma-0",attrs:{fluid:"","grid-list-sm":""}},[a("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dense:""}},[a("v-toolbar-title",[t._v(t._s(t.$t("Data & Query 2.0")))])],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.items,attach:"",chips:"",label:t.$t("Product"),multiple:""},model:{value:t.filter.product,callback:function(e){t.$set(t.filter,"product",e)},expression:"filter.product"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.items,attach:"",chips:"",label:t.$t("Origin"),multiple:""},model:{value:t.filter.origin,callback:function(e){t.$set(t.filter,"origin",e)},expression:"filter.origin"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.items,attach:"",chips:"",label:t.$t("Channel"),multiple:""},model:{value:t.filter.channel,callback:function(e){t.$set(t.filter,"channel",e)},expression:"filter.channel"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.countryOptions,"item-value":"country","item-text":"country",attach:"",chips:"",label:t.$t("Nationality"),multiple:""},model:{value:t.filter.nationality,callback:function(e){t.$set(t.filter,"nationality",e)},expression:"filter.nationality"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.paxTypeOptions,"item-value":"value","item-text":"label",attach:"",chips:"",label:t.$t("Pax type"),multiple:""},model:{value:t.filter.paxtype,callback:function(e){t.$set(t.filter,"paxtype",e)},expression:"filter.paxtype"}})],1)],1)],1):t._e()},staticRenderFns:[]};e.a=s},DMAy:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{attrs:{row:""}},[a("v-flex",[a("v-card",[a("v-toolbar",{staticClass:"elevation-1",attrs:{dense:""}},[a("v-toolbar-title",[t._v(t._s(t.$t("Ricerche salvate")))])],1),a("v-list",{staticStyle:{height:"300px","overflow-y":"auto"},attrs:{"two-line":""}},[t._l(t.resultList,function(e,s){return[a("v-list-tile",{key:e.id,attrs:{avatar:""},on:{click:function(a){t.loadData(e)}}},[a("v-list-tile-avatar",[a("v-icon",[t._v("folder_open")])],1),a("v-list-tile-content",[a("v-list-tile-title",{domProps:{innerHTML:t._s(e.description)}}),a("v-list-tile-sub-title",[t._v(t._s(t._f("dmy")(e.creationDate.date)))])],1)],1)]})],2)],1)],1)],1)},staticRenderFns:[]};e.a=s},HQrO:function(t,e,a){var s=a("sBQf");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("5596ce42",s,!0,{sourceMap:!1})},Hzol:function(t,e,a){var s=a("i62t");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("4437dd18",s,!0,{sourceMap:!1})},IP0F:function(t,e,a){"use strict";var s=a("kf//"),i=a("6I4F"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=n.exports},"JWg/":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("IP0F"),l=a("8/rj"),r=a("RkB0"),o=a("NYxO"),c=a("ppOC");e.a={components:{LastCheckOutBtn:c.a,LastCheckoutList:n.a,LastCheckOutFilter:l.a,LastCheckOutPredictiveFilter:r.a},computed:i()({},Object(o.mapState)("app",["biTitle"]),Object(o.mapGetters)("app",["userHasPredictive"])),props:[]}},LNrM:function(t,e,a){"use strict";var s=a("B1m/"),i=a("DMAy");var n=function(t){a("Hzol")},l=a("VU/8")(s.a,i.a,!1,n,"data-v-5fe65d74",null);e.a=l.exports},On8i:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("5PD8"),i=a("uAr7"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.default=n.exports},"R/G8":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO");e.a={watch:{show:function(){this.resultName=""}},computed:i()({},Object(n.mapGetters)("auth",["canSave"])),methods:i()({},Object(n.mapActions)("bi/qrLastCheckout",["saveResultList"]),{onCancel:function(){this.resultName="",this.$emit("on-cancel")},onSave:function(){var t=this;return this.saveResultList(this.resultName).then(function(){t.resultName=""}).then(function(){return t.$emit("on-close")})}}),mounted:function(){this.resultName=""},data:function(){return{resultName:""}},props:{show:{default:!1}}}},RkB0:function(t,e,a){"use strict";var s=a("bi2Q"),i=a("y9Ve");var n=function(t){a("HQrO")},l=a("VU/8")(s.a,i.a,!1,n,null,null);e.a=l.exports},"Tt+A":function(t,e,a){var s=a("Y37R");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("0504b66f",s,!0,{sourceMap:!1})},V21m:function(t,e,a){"use strict";a.d(e,"a",function(){return s});var s=function(t){return{asyncData:function(t){return t.store.dispatch("bi/dimensions/load",{},{root:!0})}}}},"X+F4":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO");e.a={name:"LastCheckOutFilter",methods:{search:function(){return!0},cancel:function(){return!0}},computed:i()({},Object(n.mapState)("bi/qrLastCheckout",["filter","filterOptions"]),{languageOptions:function(){return this.filterOptions.language?this.filterOptions.language:[]},countryOptions:function(){return this.filterOptions.country?this.filterOptions.country:[]},paxTypeOptions:function(){return this.filterOptions.paxType?this.filterOptions.paxType:[]}}),data:function(){return{valid:!0,date:"",items:[],dates:[],menu:!1,row:!1}}}},Y37R:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},YZk1:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"500"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("save")]),t._v("\n            "+t._s(t.$t("Salva query"))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-form",{ref:"exportform"},[a("v-text-field",{attrs:{"prepend-icon":"description",label:t.$t("Description"),box:""},model:{value:t.resultName,callback:function(e){t.resultName=e},expression:"resultName"}})],1)],1)],1),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.resultName},nativeOn:{click:function(e){return t.onSave(e)}}},[a("v-icon",[t._v("cloud_download")]),a("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Save")))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},bi2Q:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO"),l=a("jLWv"),r=a("wEVJ"),o=a("ghGH");e.a={name:"LastCheckOutPredictiveFilter",components:{SaveBiResultDialog:r.a,BiLoadResultDialog:o.a},created:function(){this.filter.time_range_type="Giorni"},methods:i()({},Object(n.mapActions)("bi/qrLastCheckout",["loadResultList"]),{formatDate:l.b,parseDate:l.f,openSaveDialog:function(){this.showSaveDialog=!0},openOpenDialog:function(){var t=this;this.loadResultList().then(function(){t.showOpenDialog=!0})},search:function(){return!0},cancel:function(){return!0}}),computed:i()({},Object(n.mapState)("bi/qrLastCheckout",["filter","list"]),{hasQuery:function(){return this.list.length>0}}),data:function(){return{showSaveDialog:!1,showOpenDialog:!1,fltCheckinDate:null,fltCheckinDateFormatted:"",fltCheckoutDateFormatted:"",valid:!0,date:"",items:[],dates:[],fltDtMenuCheckIn:!1,fltDtMenuCheckOut:!1,row:!1}}}},eIzO:function(t,e,a){"use strict";var s=a("JWg/"),i=a("ylgQ");var n=function(t){a("uTzH")},l=a("VU/8")(s.a,i.a,!1,n,null,null);e.a=l.exports},ghGH:function(t,e,a){"use strict";var s=a("jnZc"),i=a("9Tyj"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=n.exports},i62t:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},jnZc:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO"),l=a("LNrM");e.a={components:{BiResultList:l.a},computed:i()({},Object(n.mapGetters)("auth",["canSave"])),methods:i()({},Object(n.mapActions)("bi/qrLastCheckout",["saveResultList"]),{onResultLoaded:function(){this.$emit("on-close")},onCancel:function(){this.$emit("on-cancel")}}),props:{show:{default:!1}}}},"kf//":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO");e.a={data:function(){var t=[{text:this.$t("Product"),value:"product"},{text:this.$t("Origin"),value:"origin"},{text:this.$t("Channel"),value:"channel"},{text:this.$t("Nationality"),value:"country"},{text:this.$t("Pax type"),value:"paxtype",width:40},{text:this.$t("From"),value:"checkin"},{text:this.$t("To"),value:"checkout"},{text:this.$t("Nights"),value:"nights"},{text:this.$t("Name"),value:"name"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[20,50,100]},headers:t}},components:{},computed:i()({},Object(n.mapState)("bi/qrLastCheckout",["list"]))}},oS1N:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".bi-query-filters .list__tile{font-size:12px;height:22px}.input-group--selection-controls{min-width:0}.chip.chip--select-multi{height:18px!important;font-size:11px!important}",""])},pP6R:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"text-xs-right"},[a("v-flex",[a("v-btn",{staticClass:"elevation-1",attrs:{small:"",color:"info"},on:{click:t.search}},[t._v(t._s(t.$t("Esegui query")))]),a("v-btn",{staticClass:"elevation-1",attrs:{small:"",disabled:!t.valid},on:{click:t.cancel}},[t._v(t._s(t.$t("Azzera filtri")))])],1)],1)},staticRenderFns:[]};e.a=s},ppOC:function(t,e,a){"use strict";var s=a("1eZA"),i=a("pP6R"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=n.exports},sBQf:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".filter-numeric-text-field{width:100px;position:relative;top:3px}",""])},uAr7:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("LastCheckout")},staticRenderFns:[]};e.a=s},uTzH:function(t,e,a){var s=a("oS1N");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("f64fde86",s,!0,{sourceMap:!1})},wEVJ:function(t,e,a){"use strict";var s=a("R/G8"),i=a("YZk1"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=n.exports},y9Ve:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.filter?a("v-container",{staticClass:"pa-0 ma-0",attrs:{fluid:"","grid-list-sm":""}},[a("SaveBiResultDialog",{attrs:{show:t.showSaveDialog},on:{"on-close":function(e){t.showSaveDialog=!1},"on-cancel":function(e){t.showSaveDialog=!1}}}),a("BiLoadResultDialog",{attrs:{show:t.showOpenDialog},on:{"on-close":function(e){t.showOpenDialog=!1},"on-cancel":function(e){t.showOpenDialog=!1}}}),a("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dense:""}},[a("v-toolbar-title",[t._v("\n            "+t._s(t.$t("Data Modelli Predditivi"))+"\n        ")]),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.hasQuery,small:"",color:"info"},on:{click:t.openSaveDialog}},[t._v(t._s(t.$t("Salva query")))])],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{staticClass:"pt-2",attrs:{xs6:"",sm3:"","d-flex":""}},[a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("Data Check-in"),type:"date"},model:{value:t.filter.checkin,callback:function(e){t.$set(t.filter,"checkin",e)},expression:"filter.checkin"}})],1),a("v-flex",{staticClass:"pt-2",attrs:{xs6:"",sm3:"","d-flex":""}},[a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("Data Check-out"),type:"date"},model:{value:t.filter.checkout,callback:function(e){t.$set(t.filter,"checkout",e)},expression:"filter.checkout"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-select",{attrs:{"hide-details":"",items:["Giorni","Mesi","Anni"],label:t.$t("Ultima prenotazione")},model:{value:t.filter.time_range_type,callback:function(e){t.$set(t.filter,"time_range_type",e)},expression:"filter.time_range_type"}})],1),a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero"),box:""},model:{value:t.filter.time_range_value,callback:function(e){t.$set(t.filter,"time_range_value",e)},expression:"filter.time_range_value"}})],1),a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero Notti"),box:""},model:{value:t.filter.nights,callback:function(e){t.$set(t.filter,"nights",e)},expression:"filter.nights"}})],1)],1)],1):t._e()},staticRenderFns:[]};e.a=s},ylgQ:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",{staticClass:"ma-0 pa-0 bi-query-filters"},[e("v-layout",{staticClass:"mb-2",attrs:{wrap:"",row:""}},[e("v-flex",{attrs:{xs12:""}},[e("LastCheckOutFilter")],1)],1),this.userHasPredictive?e("v-layout",{staticClass:"mb-2",attrs:{wrap:"",row:""}},[e("v-flex",{attrs:{xs12:""}},[e("LastCheckOutPredictiveFilter")],1)],1):this._e(),e("LastCheckOutBtn"),e("v-layout",{staticClass:"mt-2",attrs:{wrap:"",row:""}},[e("v-flex",{attrs:{xs12:""}},[e("LastCheckoutList")],1)],1)],1)},staticRenderFns:[]};e.a=s}});