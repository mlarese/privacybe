webpackJsonp([6],{"/oAM":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"text-xs-center"},[a("v-flex",[a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",loading:t.isAjax,small:"",fab:"",color:"info"},on:{click:t.search},slot:"activator"},[a("v-icon",[t._v("search")])],1),t._v("\n            "+t._s(t.$t("Esegui query"))+"\n        ")],1),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",color:"warning",fab:"",small:"",disabled:!t.valid},on:{click:t.cancel},slot:"activator"},[a("v-icon",[t._v("clear")])],1),t._v("\n            "+t._s(t.$t("Reset"))+"\n        ")],1)],1)],1)},staticRenderFns:[]};e.a=s},"07sv":function(t,e,a){var s=a("rpnb"),i=a("CxPB"),n=a("t8rQ");t.exports=function(t,e){return null==t?t:s(t,i(e),n)}},"1eZA":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO");e.a={name:"LastCheckOutBtn",computed:i()({},Object(n.mapState)("bi/qrLastCheckout",["filter"]),Object(n.mapState)("app",["isAjax"])),data:function(){return{valid:!0}},methods:i()({},Object(n.mapMutations)("bi/qrLastCheckout",["resetFilter","togglePanelFilter","setList"]),Object(n.mapActions)("bi/qrLastCheckout",["loadData"]),{search:function(){this.togglePanelFilter(),this.setList([]),this.loadData({})},cancel:function(){this.resetFilter()}})}},"2MHX":function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},"3ySK":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.filter?a("v-container",{staticClass:"pa-0 ma-0 bi-query-filters",attrs:{fluid:"","grid-list-sm":""}},[a("SaveBiResultDialog",{attrs:{show:t.showSaveDialog},on:{"on-close":function(e){t.showSaveDialog=!1},"on-cancel":function(e){t.showSaveDialog=!1}}}),a("BiLoadResultDialog",{attrs:{show:t.showOpenDialog},on:{"on-close":function(e){t.showOpenDialog=!1},"on-cancel":function(e){t.showOpenDialog=!1}}}),a("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[a("v-toolbar-title",[t._v("\n            "+t._s(t.$t("Modelli Predittivi"))+"\n        ")]),a("v-spacer"),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",fab:"",disabled:!t.hasQuery,small:"",color:"success"},on:{click:t.openSaveDialog},slot:"activator"},[a("v-icon",[t._v("save")])],1),t._v("\n            "+t._s(t.$t("Salva query"))+"\n        ")],1),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",fab:"",small:"",color:"info"},on:{click:t.openOpenDialog},slot:"activator"},[a("v-icon",[t._v("cloud_download")])],1),t._v("\n            "+t._s(t.$t("Carica query salvata"))+"\n        ")],1),a("v-btn",{staticClass:"mt-1",attrs:{flat:"",fab:"",small:""},on:{click:function(e){t.panelFilter.predictiveFltPanelOpen=!t.panelFilter.predictiveFltPanelOpen}}},[t.panelFilter.predictiveFltPanelOpen?a("v-icon",[t._v("keyboard_arrow_up")]):a("v-icon",[t._v("keyboard_arrow_down")])],1)],1),t.panelFilter.predictiveFltPanelOpen?a("v-card",{staticClass:"pa-2 elevation-1"},[a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-select",{attrs:{"hide-details":"",items:t.leadtimeOptions,"item-value":"value","item-text":"label",attach:"",chips:"",label:t.$t("Lead time"),multiple:""},model:{value:t.filter.leadtime,callback:function(e){t.$set(t.filter,"leadtime",e)},expression:"filter.leadtime"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-select",{attrs:{"hide-details":"",items:t.items,attach:"",chips:"",label:t.$t("Channel"),multiple:""},model:{value:t.filter.channel,callback:function(e){t.$set(t.filter,"channel",e)},expression:"filter.channel"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-in")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkin_from,callback:function(e){t.$set(t.filter,"checkin_from",e)},expression:"filter.checkin_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkin_to,callback:function(e){t.$set(t.filter,"checkin_to",e)},expression:"filter.checkin_to"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-out")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkout_from,callback:function(e){t.$set(t.filter,"checkout_from",e)},expression:"filter.checkout_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkout_to,callback:function(e){t.$set(t.filter,"checkout_to",e)},expression:"filter.checkout_to"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-select",{attrs:{"hide-details":"",items:t.timeRange,"item-value":"value","item-text":"label",label:t.$t("Ultima prenotazione")},model:{value:t.filter.time_range_type,callback:function(e){t.$set(t.filter,"time_range_type",e)},expression:"filter.time_range_type"}})],1),a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero"),box:""},model:{value:t.filter.time_range_value,callback:function(e){t.$set(t.filter,"time_range_value",e)},expression:"filter.time_range_value"}})],1),a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero Notti"),box:""},model:{value:t.filter.nights,callback:function(e){t.$set(t.filter,"nights",e)},expression:"filter.nights"}})],1)],1)],1):t._e()],1):t._e()},staticRenderFns:[]};e.a=s},"5PD8":function(t,e,a){"use strict";var s=a("eIzO"),i=a("V21m");e.a={components:{LastCheckout:s.a},mixins:[Object(i.a)("bi/qrLastCheckout")],fetch:function(t){t.store}}},"6oet":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"last-check-out-list pa-0",attrs:{row:""}},[a("v-data-table",t._b({staticClass:"elevation-1",attrs:{headers:t.headers,items:t.filteredList,loading:t.isAjax},scopedSlots:t._u([{key:"items",fn:function(e){var s=e.item;return[a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.product)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.origin)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.country))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.language))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.paxtype)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t._f("dmy")(t.$t(s.opened))))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t._f("dmy")(s.checkin)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t._f("dmy")(s.checkout)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.leadtime)))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.nights))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.email))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(s.name)+" "+t._s(s.surname))]),a("td",{staticClass:"no-wrap"},[t._v(t._s(t.$t(s.return_dates)))])]}}])},"v-data-table",t.tableTexts,!1))],1)},staticRenderFns:[]};e.a=s},"8/rj":function(t,e,a){"use strict";var s=a("X+F4"),i=a("qwTD");var n=function(t){a("enC4")},r=a("VU/8")(s.a,i.a,!1,n,"data-v-7ca8922d",null);e.a=r.exports},"86Ep":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO"),r=a("07sv"),l=a.n(r);e.a={name:"TreatmentsFilter",data:function(){return{mandatoryTermFilter:[],filter:{person:"",treatments:{},language:""}}},methods:i()({onReload:function(){this.canSearchUsers&&(this.searchListDelegate(),this.setNeedRefresh(!1))},onTermChange:function(t,e){if(t.selected)e.selected=!0;else{var a=this.selectedTermsCount(e);e.selected=a>0}this.onChange(e)},onTreatmentChange:function(t){t.selected?this.setSelectAllTerms(t.terms,!0):this.setSelectAllTerms(t.terms,!1),this.onChange(t)}},Object(n.mapActions)("owners/users",["searchListDelegate"]),Object(n.mapMutations)("owners/users",["setExportFilter","setExportFilterTreatments"]),Object(n.mapMutations)("terms",["setNeedRefresh"]),{setSelectAllTerms:function(t,e){l()(t,function(t){t.selected=e})},onChange:function(t){this.updateTreatment(t)},updateTreatment:function(t){this.setNeedRefresh(!0),this.exportTreatments()},exportTreatments:function(){var t=[];this.filter.treatments||(this.filter.treatments=[]),this.filter.treatments.forEach(function(e){e.selected&&t.push(e)}),this.setExportFilterTreatments(t)},selectedTermsCount:function(t){return t.terms.reduce(function(t,e){return e.selected&&t++,e.selected?t++:t},0)}}),created:function(){this.mandatoryTermFilter=this.termFilter,this.filter.treatments=this.mandatoryTermFilter,this.exportTreatments()},computed:i()({hasSelectedTreatment:function(){return!!this.exportFilter.treatments&&this.exportFilter.treatments.length>0},showRefreshBtn:function(){return this.canSearchUsers},canSearchUsers:function(){return!!this.search.needRefresh&&!(!this.canSeeNoAgreementPrivacies&&!this.hasSelectedTreatment)}},Object(n.mapGetters)("auth",["canSeeNoAgreementPrivacies"]),Object(n.mapState)("auth",["user"]),Object(n.mapState)("terms",["termFilter","search"]),Object(n.mapState)("owners/users",["exportFilter"])),props:{hasRefreshButton:{default:!0}}}},"B1m/":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO");e.a={methods:i()({},Object(n.mapActions)("bi/qrLastCheckout",["loadResultListRecord"]),{loadData:function(t){this.loadResultListRecord(t.id),this.$emit("result-loaded")}}),computed:i()({},Object(n.mapState)("bi/qrLastCheckout",["resultList"])),components:{}}},Bwf2:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".filter-numeric-text-field{width:100px;position:relative;top:3px}",""])},CxPB:function(t,e,a){var s=a("wSKX");t.exports=function(t){return"function"==typeof t?t:s}},FJVJ:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"treatment-filter ",attrs:{column:""}},[a("div",{staticClass:"blue-grey lighten-5"},[a("v-layout",{attrs:{row:"",wrap:""}},t._l(t.mandatoryTermFilter,function(e,s){return a("v-flex",{key:s,staticClass:"py-2 left-bordered",attrs:{xs12:"",sm4:""}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"pl-2",attrs:{xs12:""}},[a("span",{staticClass:"treatment-flag"},[a("v-checkbox",{staticClass:"treatment-flag-checkbox",attrs:{color:"blue darken-1","hide-details":"",small:"",label:e.name},on:{change:function(a){t.onTreatmentChange(e)}},model:{value:e.selected,callback:function(a){t.$set(e,"selected",a)},expression:"treatment.selected"}})],1)])],1),t._l(e.terms,function(s,i){return[a("v-layout",{key:i,staticClass:"pl-4",attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs1:""}},[a("v-checkbox",{staticClass:"treatment-flag-checkbox",attrs:{color:"blue darken-1","hide-details":"",small:"",_label:"term.name"},on:{change:function(a){t.onTermChange(s,e)}},model:{value:s.selected,callback:function(e){t.$set(s,"selected",e)},expression:"term.selected"}})],1),a("v-flex",{staticClass:"caption pr-3",attrs:{xs11:""}},[a("div",{staticClass:"pl-2"},[a("v-divider"),t._v("\n                                "+t._s(s.name)+"\n                            ")],1)])],1)]})],2)}))],1),t.hasSelectedTreatment?t._e():a("v-layout",{attrs:{column:""}},[a("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[a("v-alert",{attrs:{value:!0,outline:"",color:"info",icon:"info"}},[t.canSeeNoAgreementPrivacies?a("div",[t._v("\n                    "+t._s(t.$t("Searching no subscriptions users"))+"\n                    ")]):a("div",[t._v("\n                        "+t._s(t.$t("You cannot see no subscriptions users"))+"\n                    ")])])],1)],1),t.showRefreshBtn?a("v-layout",{attrs:{column:""}},[t.hasRefreshButton?a("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[a("v-btn",{attrs:{flat:""},on:{click:t.onReload}},[a("span",[t._v(t._s(t.$t("Click here to refresh")))]),a("v-icon",[t._v("replay")])],1)],1):t._e()],1):t._e()],1)},staticRenderFns:[]};e.a=s},FwJs:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"500"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("save")]),t._v("\n            "+t._s(t.$t("Carica Risultati"))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("BiResultList",{on:{"result-loaded":t.onResultLoaded}}),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))])],1)],1)],1)},staticRenderFns:[]};e.a=s},"GlR+":function(t,e,a){var s=a("Y40B");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("38425a48",s,!0,{sourceMap:!1})},IP0F:function(t,e,a){"use strict";var s=a("kf//"),i=a("6oet"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=n.exports},"JWg/":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("IP0F"),r=a("8/rj"),l=a("RkB0"),o=a("NYxO"),c=a("ppOC");e.a={components:{LastCheckOutBtn:c.a,LastCheckoutList:n.a,LastCheckOutFilter:r.a,LastCheckOutPredictiveFilter:l.a},computed:i()({},Object(o.mapState)("app",["biTitle"]),Object(o.mapGetters)("app",["userHasPredictive"])),props:[]}},KvBP:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".left-bordered{border-right:1px solid #e1e1e1}.treatment-flag-checkbox .input-group--selection-controls__ripple{height:24px;width:24px;left:9px}.treatment-flag-checkbox label{font-size:12px;line-height:20px;color:rgba(0,0,0,.8)!important}.treatment-flag-checkbox .icon{font-size:18px}.treatment-flag-checkbox .input-group--text-field-box .input-group__input,.treatment-flag-checkbox .input-group__input{min-height:20px}",""])},LNrM:function(t,e,a){"use strict";var s=a("B1m/"),i=a("fusy");var n=function(t){a("GlR+")},r=a("VU/8")(s.a,i.a,!1,n,"data-v-1ebfe1fd",null);e.a=r.exports},Loep:function(t,e,a){var s=a("j3HH");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("500ca6d8",s,!0,{sourceMap:!1})},On8i:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("5PD8"),i=a("uAr7"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.default=n.exports},"R/G8":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO");e.a={watch:{show:function(){this.resultName=""}},computed:i()({},Object(n.mapGetters)("auth",["canSave"])),methods:i()({},Object(n.mapActions)("bi/qrLastCheckout",["saveResultList"]),{onCancel:function(){this.resultName="",this.$emit("on-cancel")},onSave:function(){var t=this;return this.saveResultList(this.resultName).then(function(){t.resultName=""}).then(function(){return t.$emit("on-close")})}}),mounted:function(){this.resultName=""},data:function(){return{resultName:""}},props:{show:{default:!1}}}},RkB0:function(t,e,a){"use strict";var s=a("bi2Q"),i=a("3ySK");var n=function(t){a("ShRW")},r=a("VU/8")(s.a,i.a,!1,n,null,null);e.a=r.exports},ShRW:function(t,e,a){var s=a("Bwf2");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("54ea2485",s,!0,{sourceMap:!1})},V21m:function(t,e,a){"use strict";a.d(e,"a",function(){return s});var s=function(t){return{asyncData:function(t){return t.store.dispatch("bi/dimensions/load",{},{root:!0})}}}},"X+F4":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO"),r=a("gTC0");e.a={name:"LastCheckOutFilter",components:{TreatmentsFilter:r.a},computed:i()({},Object(n.mapState)("bi/qrLastCheckout",["filter","filterOptions","panelFilter"]),{productOptions:function(){return this.filterOptions.product?this.filterOptions.product:[]},originOptions:function(){var t=[];if(this.filterOptions.origin)for(var e=0;e<this.filterOptions.origin.length;e++){var a=this.filterOptions.origin[e];t.push({value:a,label:this.$t(a)})}return t},languageOptions:function(){return this.filterOptions.language?this.filterOptions.language:[]},countryOptions:function(){return this.filterOptions.country?this.filterOptions.country:[]},paxTypeOptions:function(){return this.filterOptions.paxType?this.filterOptions.paxType:[]}}),data:function(){return{valid:!0,date:"",items:[],dates:[],menu:!1,row:!1}}}},Y40B:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},YZk1:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"500"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("save")]),t._v("\n            "+t._s(t.$t("Salva query"))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-form",{ref:"exportform"},[a("v-text-field",{attrs:{"prepend-icon":"description",label:t.$t("Description"),box:""},model:{value:t.resultName,callback:function(e){t.resultName=e},expression:"resultName"}})],1)],1)],1),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.resultName},nativeOn:{click:function(e){return t.onSave(e)}}},[a("v-icon",[t._v("cloud_download")]),a("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Save")))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},bi2Q:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO"),r=a("jLWv"),l=a("wEVJ"),o=a("ghGH");e.a={name:"LastCheckOutPredictiveFilter",components:{SaveBiResultDialog:l.a,BiLoadResultDialog:o.a},methods:i()({},Object(n.mapActions)("bi/qrLastCheckout",["loadResultList"]),{formatDate:r.b,parseDate:r.f,openSaveDialog:function(){this.showSaveDialog=!0},openOpenDialog:function(){var t=this;this.loadResultList().then(function(){t.showOpenDialog=!0})}}),computed:i()({},Object(n.mapState)("bi/qrLastCheckout",["filter","list","timeRange","panelFilter","filterOptions"]),{leadtimeOptions:function(){var t=[];if(this.filterOptions.leadtime)for(var e=0;e<this.filterOptions.leadtime.length;e++){var a=this.filterOptions.leadtime[e];t.push({value:a,label:this.$t(a)})}return t},hasQuery:function(){return this.list.length>0}}),data:function(){return{showSaveDialog:!1,showOpenDialog:!1,fltCheckinDate:null,fltCheckinDateFormatted:"",fltCheckoutDateFormatted:"",valid:!0,date:"",items:[],dates:[],fltDtMenuCheckIn:!1,fltDtMenuCheckOut:!1,row:!1}}}},eIzO:function(t,e,a){"use strict";var s=a("JWg/"),i=a("oZZA");var n=function(t){a("Loep")},r=a("VU/8")(s.a,i.a,!1,n,null,null);e.a=r.exports},enC4:function(t,e,a){var s=a("2MHX");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("008b63d1",s,!0,{sourceMap:!1})},fusy:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{attrs:{row:""}},[a("v-flex",[a("v-card",[a("v-toolbar",{staticClass:"elevation-1",attrs:{dense:""}},[a("v-toolbar-title",[t._v(t._s(t.$t("Ricerche salvate")))])],1),a("v-list",{staticStyle:{height:"300px","overflow-y":"auto"},attrs:{"two-line":""}},[t._l(t.resultList,function(e,s){return[a("v-list-tile",{key:e.id,attrs:{avatar:""},on:{click:function(a){t.loadData(e)}}},[a("v-list-tile-avatar",[a("v-icon",{staticClass:"blue white--text"},[t._v("folder_open")])],1),a("v-list-tile-content",[a("v-list-tile-title",{domProps:{innerHTML:t._s(e.description)}}),a("v-list-tile-sub-title",[t._v(t._s(t._f("dmy")(e.creationDate.date)))])],1)],1),a("v-divider")]})],2)],1)],1)],1)},staticRenderFns:[]};e.a=s},gTC0:function(t,e,a){"use strict";var s=a("86Ep"),i=a("FJVJ");var n=function(t){a("nVdN")},r=a("VU/8")(s.a,i.a,!1,n,null,null);e.a=r.exports},ghGH:function(t,e,a){"use strict";var s=a("jnZc"),i=a("FwJs"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=n.exports},j3HH:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".bi-query-filters .list__tile{font-size:12px;height:22px}.input-group--selection-controls{min-width:0}.chip.chip--select-multi{height:18px!important;font-size:11px!important}",""])},jnZc:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO"),r=a("LNrM");e.a={name:"BiLoadResultDialog",components:{BiResultList:r.a},computed:i()({},Object(n.mapGetters)("auth",["canSave"])),methods:i()({},Object(n.mapActions)("bi/qrLastCheckout",["saveResultList"]),{onResultLoaded:function(){this.$emit("on-close")},onCancel:function(){this.$emit("on-cancel")}}),props:{show:{default:!1}}}},"kf//":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),n=a("NYxO");e.a={data:function(){var t=[{text:this.$t("Product"),value:"product"},{text:this.$t("Origin"),value:"origin"},{text:this.$t("Nationality"),value:"country"},{text:this.$t("Language"),value:"language"},{text:this.$t("Pax type"),value:"paxtype",width:40},{text:this.$t("Opened"),value:"opened"},{text:this.$t("From"),value:"checkin"},{text:this.$t("To"),value:"checkout"},{text:this.$t("Leadtime"),value:"leadtime"},{text:this.$t("Nights"),value:"nights"},{text:this.$t("Email"),value:"email"},{text:this.$t("Name"),value:"name"},{text:this.$t("Ritorni"),value:"return_dates"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[10,20,50,100]},headers:t}},components:{},computed:i()({},Object(n.mapGetters)("bi/qrLastCheckout",["privaciesByEmail"]),Object(n.mapState)("bi/qrLastCheckout",["list"]),Object(n.mapState)("api",["isAjax"]),{filteredList:function(){return this.list}})}},nVdN:function(t,e,a){var s=a("KvBP");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("6c7f5f7c",s,!0,{sourceMap:!1})},oZZA:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"ma-0 pa-0 bi-query-filters"},[e("v-layout",{staticClass:"mb-2",attrs:{wrap:"",row:""}},[e("v-flex",{attrs:{xs12:""}},[e("LastCheckOutFilter")],1)],1),this.userHasPredictive?e("v-layout",{staticClass:"mb-2",attrs:{wrap:"",row:""}},[e("v-flex",{attrs:{xs12:""}},[e("LastCheckOutPredictiveFilter")],1)],1):this._e(),e("LastCheckOutBtn"),e("v-layout",{staticClass:"mt-2",attrs:{wrap:"",row:""}},[e("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[e("v-toolbar-title",[this._v(this._s(this.$t("Risultati")))])],1),e("v-flex",{attrs:{xs12:""}},[e("LastCheckoutList")],1)],1)],1)},staticRenderFns:[]};e.a=s},ppOC:function(t,e,a){"use strict";var s=a("1eZA"),i=a("/oAM"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=n.exports},qwTD:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.filter?a("v-container",{staticClass:"pa-0 ma-0",attrs:{fluid:"","grid-list-sm":""}},[a("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[a("v-toolbar-title",[t._v(t._s(t.$t("Data & Query 2.0")))]),a("v-spacer"),a("v-btn",{staticClass:"mt-1",attrs:{flat:"",fab:"",small:""},on:{click:function(e){t.panelFilter.queryFltPanelOpen=!t.panelFilter.queryFltPanelOpen}}},[t.panelFilter.queryFltPanelOpen?a("v-icon",[t._v("keyboard_arrow_up")]):a("v-icon",[t._v("keyboard_arrow_down")])],1)],1),t.panelFilter.queryFltPanelOpen?a("v-card",{staticClass:"pa-2 elevation-1"},[a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.productOptions,attach:"",chips:"",label:t.$t("Product"),multiple:""},model:{value:t.filter.product,callback:function(e){t.$set(t.filter,"product",e)},expression:"filter.product"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.originOptions,attach:"",chips:"",label:t.$t("Origin"),"item-value":"value","item-text":"label",multiple:""},model:{value:t.filter.origin,callback:function(e){t.$set(t.filter,"origin",e)},expression:"filter.origin"}})],1),a("v-flex",{attrs:{xs16:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.countryOptions,"item-value":"country","item-text":"country",attach:"",chips:"",label:t.$t("Nationality"),multiple:""},model:{value:t.filter.nationality,callback:function(e){t.$set(t.filter,"nationality",e)},expression:"filter.nationality"}})],1),a("v-flex",{attrs:{xs6:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.languageOptions,attach:"",chips:"",label:t.$t("Language"),"item-value":"language","item-text":"language",multiple:""},model:{value:t.filter.language,callback:function(e){t.$set(t.filter,"language",e)},expression:"filter.language"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.paxTypeOptions,"item-value":"value","item-text":"label",attach:"",chips:"",label:t.$t("Pax type"),multiple:""},model:{value:t.filter.paxtype,callback:function(e){t.$set(t.filter,"paxtype",e)},expression:"filter.paxtype"}})],1)],1)],1):t._e()],1):t._e()},staticRenderFns:[]};e.a=s},uAr7:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("LastCheckout")},staticRenderFns:[]};e.a=s},wEVJ:function(t,e,a){"use strict";var s=a("R/G8"),i=a("YZk1"),n=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=n.exports}});