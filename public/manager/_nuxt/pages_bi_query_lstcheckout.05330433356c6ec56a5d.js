webpackJsonp([6],{"07sv":function(t,e,a){var s=a("rpnb"),i=a("CxPB"),l=a("t8rQ");t.exports=function(t,e){return null==t?t:s(t,i(e),l)}},"1eZA":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO");e.a={name:"LastCheckOutBtn",computed:i()({},Object(l.mapState)("bi/qrLastCheckout",["filter"]),Object(l.mapState)("app",["isAjax"])),data:function(){return{valid:!0}},methods:i()({},Object(l.mapMutations)("bi/qrLastCheckout",["resetFilter","togglePanelFilter","setList"]),Object(l.mapActions)("bi/qrLastCheckout",["loadData"]),{search:function(){this.setList([]),this.loadData({})},cancel:function(){this.resetFilter()}})}},"3ySK":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.filter?a("v-container",{staticClass:"pa-0 ma-0 bi-query-filters",attrs:{fluid:"","grid-list-sm":""}},[a("SaveBiResultDialog",{attrs:{show:t.showSaveDialog},on:{"on-close":function(e){t.showSaveDialog=!1},"on-cancel":function(e){t.showSaveDialog=!1}}}),a("BiLoadResultDialog",{attrs:{show:t.showOpenDialog},on:{"on-close":function(e){t.showOpenDialog=!1},"on-cancel":function(e){t.showOpenDialog=!1}}}),a("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[a("v-toolbar-title",[t._v("\n            "+t._s(t.$t("Modelli Predittivi"))+"\n        ")]),a("v-spacer"),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",fab:"",disabled:!t.hasQuery,small:"",color:"success"},on:{click:t.openSaveDialog},slot:"activator"},[a("v-icon",[t._v("save")])],1),t._v("\n            "+t._s(t.$t("Salva query"))+"\n        ")],1),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",fab:"",small:"",color:"info"},on:{click:t.openOpenDialog},slot:"activator"},[a("v-icon",[t._v("cloud_download")])],1),t._v("\n            "+t._s(t.$t("Carica query salvata"))+"\n        ")],1),a("v-btn",{staticClass:"mt-1",attrs:{flat:"",fab:"",small:""},on:{click:function(e){t.panelFilter.predictiveFltPanelOpen=!t.panelFilter.predictiveFltPanelOpen}}},[t.panelFilter.predictiveFltPanelOpen?a("v-icon",[t._v("keyboard_arrow_up")]):a("v-icon",[t._v("keyboard_arrow_down")])],1)],1),t.panelFilter.predictiveFltPanelOpen?a("v-card",{staticClass:"pa-2 elevation-1"},[a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-select",{attrs:{"hide-details":"",items:t.leadtimeOptions,"item-value":"value","item-text":"label",attach:"",chips:"",label:t.$t("Lead time"),multiple:""},model:{value:t.filter.leadtime,callback:function(e){t.$set(t.filter,"leadtime",e)},expression:"filter.leadtime"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-select",{attrs:{"hide-details":"",items:t.items,attach:"",chips:"",label:t.$t("Channel"),multiple:""},model:{value:t.filter.channel,callback:function(e){t.$set(t.filter,"channel",e)},expression:"filter.channel"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-in")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkin_from,callback:function(e){t.$set(t.filter,"checkin_from",e)},expression:"filter.checkin_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkin_to,callback:function(e){t.$set(t.filter,"checkin_to",e)},expression:"filter.checkin_to"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-out")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkout_from,callback:function(e){t.$set(t.filter,"checkout_from",e)},expression:"filter.checkout_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkout_to,callback:function(e){t.$set(t.filter,"checkout_to",e)},expression:"filter.checkout_to"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-select",{attrs:{"hide-details":"",items:t.timeRange,"item-value":"value","item-text":"label",label:t.$t("Ultima prenotazione")},model:{value:t.filter.time_range_type,callback:function(e){t.$set(t.filter,"time_range_type",e)},expression:"filter.time_range_type"}})],1),a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero"),box:""},model:{value:t.filter.time_range_value,callback:function(e){t.$set(t.filter,"time_range_value",e)},expression:"filter.time_range_value"}})],1),a("v-flex",{attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero Notti"),box:""},model:{value:t.filter.nights,callback:function(e){t.$set(t.filter,"nights",e)},expression:"filter.nights"}})],1)],1)],1):t._e()],1):t._e()},staticRenderFns:[]};e.a=s},"5PD8":function(t,e,a){"use strict";var s=a("eIzO"),i=a("V21m");e.a={components:{LastCheckout:s.a},mixins:[Object(i.a)("bi/qrLastCheckout")],fetch:function(t){t.store}}},"7t75":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"text-xs-center"},[a("v-flex",[a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",loading:t.isAjax,small:"",fab:"",color:"info"},on:{click:t.search},slot:"activator"},[a("v-icon",[t._v("search")])],1),t._v("\n            "+t._s(t.$t("Esegui query"))+"\n        ")],1),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",color:"warning",fab:"",small:"",disabled:!t.valid},on:{click:t.cancel},slot:"activator"},[a("v-icon",[t._v("clear")])],1),t._v("\n            "+t._s(t.$t("Reset"))+"\n        ")],1)],1)],1)},staticRenderFns:[]};e.a=s},"8/rj":function(t,e,a){"use strict";var s=a("X+F4"),i=a("Xstx");var l=function(t){a("sud4")},r=a("VU/8")(s.a,i.a,!1,l,"data-v-1a2fd5dc",null);e.a=r.exports},"86Ep":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO"),r=a("07sv"),n=a.n(r);e.a={name:"TreatmentsFilter",data:function(){return{mandatoryTermFilter:[],filter:{person:"",treatments:{},language:""}}},methods:i()({onReload:function(){this.canSearchUsers&&(this.searchListDelegate(),this.setNeedRefresh(!1))},onTermChange:function(t,e){if(t.selected)e.selected=!0;else{var a=this.selectedTermsCount(e);e.selected=a>0}this.onChange(e)},onTreatmentChange:function(t){t.selected?this.setSelectAllTerms(t.terms,!0):this.setSelectAllTerms(t.terms,!1),this.onChange(t)}},Object(l.mapActions)("owners/users",["searchListDelegate"]),Object(l.mapMutations)("owners/users",["setExportFilter","setExportFilterTreatments"]),Object(l.mapMutations)("terms",["setNeedRefresh"]),{setSelectAllTerms:function(t,e){n()(t,function(t){t.selected=e})},onChange:function(t){this.updateTreatment(t)},updateTreatment:function(t){this.setNeedRefresh(!0),this.exportTreatments()},exportTreatments:function(){var t=[];this.filter.treatments||(this.filter.treatments=[]),this.filter.treatments.forEach(function(e){e.selected&&t.push(e)}),this.setExportFilterTreatments(t)},selectedTermsCount:function(t){return t.terms.reduce(function(t,e){return e.selected&&t++,e.selected?t++:t},0)}}),created:function(){this.mandatoryTermFilter=this.termFilter,this.filter.treatments=this.mandatoryTermFilter,this.exportTreatments()},computed:i()({hasSelectedTreatment:function(){return!!this.exportFilter.treatments&&this.exportFilter.treatments.length>0},showRefreshBtn:function(){return this.canSearchUsers},canSearchUsers:function(){return!!this.search.needRefresh&&!(!this.canSeeNoAgreementPrivacies&&!this.hasSelectedTreatment)}},Object(l.mapGetters)("auth",["canSeeNoAgreementPrivacies"]),Object(l.mapState)("auth",["user"]),Object(l.mapState)("terms",["termFilter","search"]),Object(l.mapState)("owners/users",["exportFilter"])),props:{hasRefreshButton:{default:!0}}}},"9ssW":function(t,e,a){var s=a("mqLE");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("01bdc975",s,!0,{sourceMap:!1})},A7iD:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},"B1m/":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO");e.a={methods:i()({},Object(l.mapActions)("bi/qrLastCheckout",["loadResultListRecord"]),{loadData:function(t){this.loadResultListRecord(t.id),this.$emit("result-loaded")}}),computed:i()({},Object(l.mapState)("bi/qrLastCheckout",["resultList"])),components:{}}},Bwf2:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".filter-numeric-text-field{width:100px;position:relative;top:3px}",""])},CxPB:function(t,e,a){var s=a("wSKX");t.exports=function(t){return"function"==typeof t?t:s}},FJVJ:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"treatment-filter ",attrs:{column:""}},[a("div",{staticClass:"blue-grey lighten-5"},[a("v-layout",{attrs:{row:"",wrap:""}},t._l(t.mandatoryTermFilter,function(e,s){return a("v-flex",{key:s,staticClass:"py-2 left-bordered",attrs:{xs12:"",sm4:""}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"pl-2",attrs:{xs12:""}},[a("span",{staticClass:"treatment-flag"},[a("v-checkbox",{staticClass:"treatment-flag-checkbox",attrs:{color:"blue darken-1","hide-details":"",small:"",label:e.name},on:{change:function(a){t.onTreatmentChange(e)}},model:{value:e.selected,callback:function(a){t.$set(e,"selected",a)},expression:"treatment.selected"}})],1)])],1),t._l(e.terms,function(s,i){return[a("v-layout",{key:i,staticClass:"pl-4",attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs1:""}},[a("v-checkbox",{staticClass:"treatment-flag-checkbox",attrs:{color:"blue darken-1","hide-details":"",small:"",_label:"term.name"},on:{change:function(a){t.onTermChange(s,e)}},model:{value:s.selected,callback:function(e){t.$set(s,"selected",e)},expression:"term.selected"}})],1),a("v-flex",{staticClass:"caption pr-3",attrs:{xs11:""}},[a("div",{staticClass:"pl-2"},[a("v-divider"),t._v("\n                                "+t._s(s.name)+"\n                            ")],1)])],1)]})],2)}))],1),t.hasSelectedTreatment?t._e():a("v-layout",{attrs:{column:""}},[a("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[a("v-alert",{attrs:{value:!0,outline:"",color:"info",icon:"info"}},[t.canSeeNoAgreementPrivacies?a("div",[t._v("\n                    "+t._s(t.$t("Searching no subscriptions users"))+"\n                    ")]):a("div",[t._v("\n                        "+t._s(t.$t("You cannot see no subscriptions users"))+"\n                    ")])])],1)],1),t.showRefreshBtn?a("v-layout",{attrs:{column:""}},[t.hasRefreshButton?a("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[a("v-btn",{attrs:{flat:""},on:{click:t.onReload}},[a("span",[t._v(t._s(t.$t("Click here to refresh")))]),a("v-icon",[t._v("replay")])],1)],1):t._e()],1):t._e()],1)},staticRenderFns:[]};e.a=s},FwJs:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"500"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("save")]),t._v("\n            "+t._s(t.$t("Carica Risultati"))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("BiResultList",{on:{"result-loaded":t.onResultLoaded}}),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))])],1)],1)],1)},staticRenderFns:[]};e.a=s},"GlR+":function(t,e,a){var s=a("Y40B");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("38425a48",s,!0,{sourceMap:!1})},JCwE:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"ma-0 pa-0 bi-query-filters"},[e("v-layout",{staticClass:"mb-2",attrs:{wrap:"",row:""}},[e("v-flex",{attrs:{xs12:""}},[e("LastCheckOutFilter")],1)],1),this.userHasPredictive?e("v-layout",{staticClass:"mb-2",attrs:{wrap:"",row:""}},[e("v-flex",{attrs:{xs12:""}},[e("LastCheckOutPredictiveFilter")],1)],1):this._e(),e("LastCheckOutBtn"),e("v-layout",{staticClass:"mt-2",attrs:{wrap:"",row:""}},[e("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[e("v-toolbar-title",[this._v(this._s(this.$t("Risultati"))+" gggggg")])],1),e("v-flex",{attrs:{xs12:""}},[e("LastCheckoutPvList")],1)],1)],1)},staticRenderFns:[]};e.a=s},"JWg/":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("Jdzf"),r=a("8/rj"),n=a("RkB0"),o=a("NYxO"),c=a("ppOC");e.a={components:{LastCheckOutBtn:c.a,LastCheckoutPvList:l.a,LastCheckOutFilter:r.a,LastCheckOutPredictiveFilter:n.a},computed:i()({},Object(o.mapState)("app",["biTitle"]),Object(o.mapGetters)("app",["userHasPredictive"])),props:[]}},Jdzf:function(t,e,a){"use strict";var s=a("rIUX"),i=a("m2i/"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=l.exports},KvBP:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".left-bordered{border-right:1px solid #e1e1e1}.treatment-flag-checkbox .input-group--selection-controls__ripple{height:24px;width:24px;left:9px}.treatment-flag-checkbox label{font-size:12px;line-height:20px;color:rgba(0,0,0,.8)!important}.treatment-flag-checkbox .icon{font-size:18px}.treatment-flag-checkbox .input-group--text-field-box .input-group__input,.treatment-flag-checkbox .input-group__input{min-height:20px}",""])},L5i5:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"290"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("alternate_email")]),t._v("\n            "+t._s(t.$t("Share list"))+" - "+t._s(t.$t(t.adapter))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-form",{ref:"exportform",attrs:{enctype:"text/plain",target:"_blank",method:"POST"}},[a("v-text-field",{attrs:{disabled:!t.canSave,"prepend-icon":"description",label:t.$t("List name"),box:""},model:{value:t.contactlistName,callback:function(e){t.contactlistName=e},expression:"contactlistName"}}),a("input",{directives:[{name:"model",rawName:"v-model",value:t.jsonParams,expression:"jsonParams"}],attrs:{type:"hidden",name:"json"},domProps:{value:t.jsonParams},on:{input:function(e){e.target.composing||(t.jsonParams=e.target.value)}}})],1)],1)],1),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.contactlistName||!t.canSave},nativeOn:{click:function(e){return t.onExport(e)}}},[a("v-icon",[t._v("cloud_download")]),a("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Share")))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},"LBi/":function(t,e,a){"use strict";var s=a("lEY4"),i=a("L5i5"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=l.exports},LNrM:function(t,e,a){"use strict";var s=a("B1m/"),i=a("fusy");var l=function(t){a("GlR+")},r=a("VU/8")(s.a,i.a,!1,l,"data-v-1ebfe1fd",null);e.a=r.exports},On8i:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("5PD8"),i=a("uAr7"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.default=l.exports},"R/G8":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO");e.a={watch:{show:function(){this.resultName=""}},computed:i()({},Object(l.mapGetters)("auth",["canSave"])),methods:i()({},Object(l.mapActions)("bi/qrLastCheckout",["saveResultList"]),{onCancel:function(){this.resultName="",this.$emit("on-cancel")},onSave:function(){var t=this;return this.saveResultList(this.resultName).then(function(){t.resultName=""}).then(function(){return t.$emit("on-close")})}}),mounted:function(){this.resultName=""},data:function(){return{resultName:""}},props:{show:{default:!1}}}},RkB0:function(t,e,a){"use strict";var s=a("bi2Q"),i=a("3ySK");var l=function(t){a("ShRW")},r=a("VU/8")(s.a,i.a,!1,l,null,null);e.a=r.exports},ShRW:function(t,e,a){var s=a("Bwf2");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("54ea2485",s,!0,{sourceMap:!1})},V21m:function(t,e,a){"use strict";a.d(e,"a",function(){return s});var s=function(t){return{asyncData:function(t){return t.store.dispatch("bi/dimensions/load",{},{root:!0})}}}},"X+F4":function(t,e,a){"use strict";for(var s=a("Dd8w"),i=a.n(s),l=a("NYxO"),r=a("LBi/"),n=a("gTC0"),o=a("8wQP"),c=a.n(o),u=[],p=0;p<90;p++)u.push(p);e.a={name:"LastCheckOutFilter",components:{TreatmentsFilter:n.a,ShareListDialog:r.a},methods:{onShowShareList:function(t){this.adapter=t,this.showShareDialog=!0},hideShareDialog:function(){this.showShareDialog=!1}},computed:i()({},Object(l.mapState)("bi/qrLastCheckout",["filter","filterOptions","panelFilter","timeRange","list","privaciesList"]),{privaciesListExport:function(){return this.privaciesList&&this.privaciesList.length&&this.privaciesList.length>0?c()(this.privaciesList,"email"):[]},productOptions:function(){return this.filterOptions.product?this.filterOptions.product:[]},channelOptions:function(){var t=[];if(this.filterOptions.channel)for(var e=0;e<this.filterOptions.channel.length;e++){var a=this.filterOptions.channel[e];t.push({value:a,label:this.$t(a)})}return t},originOptions:function(){var t=[];if(this.filterOptions.origin)for(var e=0;e<this.filterOptions.origin.length;e++){var a=this.filterOptions.origin[e];t.push({value:a,label:this.$t(a)})}return t},languageOptions:function(){return this.filterOptions.language?this.filterOptions.language:[]},countryOptions:function(){return this.filterOptions.country?this.filterOptions.country:[]},paxTypeOptions:function(){return this.filterOptions.paxType?this.filterOptions.paxType:[]},leadtimeOptions:function(){var t=[];if(this.filterOptions.leadtime)for(var e=0;e<this.filterOptions.leadtime.length;e++){var a=this.filterOptions.leadtime[e];t.push({value:a,label:this.$t(a)})}return t}}),data:function(){return{adapter:"csv",shareMenuItems:[{title:"Mailup Export",adapter:"mailup"}],valid:!0,showShareDialog:!1,date:"",items:[],dates:[],menu:!1,row:!1,nightsOptions:u}}}},Xstx:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.filter?a("v-container",{staticClass:"pa-0 ma-0",attrs:{fluid:"","grid-list-sm":""}},[a("ShareListDialog",{attrs:{show:t.showShareDialog,adapter:t.adapter,"send-data":!0,"pay-load":t.privaciesListExport},on:{cancel:t.hideShareDialog}}),a("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[a("v-toolbar-title",[t._v(t._s(t.$t("Data & Query 2.0")))]),a("v-spacer"),a("v-menu",{attrs:{disabled:0==t.privaciesList.length,"_v-if":"canShare",origin:"center center",transition:"scale-transition",bottom:""}},[a("v-btn",{staticClass:"elevation-0 text-upper",attrs:{slot:"activator",small:"",color:"info",disabled:0==t.privaciesList.length},slot:"activator"},[t._v("\n                "+t._s(t.$t("Share list"))+"\n            ")]),a("v-list",t._l(t.shareMenuItems,function(e,s){return a("v-list-tile",{key:s,on:{click:function(t){}}},[a("v-list-tile-title",{on:{click:function(a){t.onShowShareList(e.adapter)}}},[t._v("\n                        "+t._s(t.$t(e.title))+"\n                    ")])],1)}))],1),a("v-btn",{staticClass:"mt-1",attrs:{flat:"",fab:"",small:""},on:{click:function(e){t.panelFilter.queryFltPanelOpen=!t.panelFilter.queryFltPanelOpen}}},[t.panelFilter.queryFltPanelOpen?a("v-icon",[t._v("keyboard_arrow_up")]):a("v-icon",[t._v("keyboard_arrow_down")])],1)],1),t.panelFilter.queryFltPanelOpen?a("v-card",{staticClass:"pa-2 elevation-1"},[a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.productOptions,attach:"",autocomplete:"",chips:"","item-text":"product","item-value":"product",label:t.$t("Product"),multiple:""},model:{value:t.filter.product,callback:function(e){t.$set(t.filter,"product",e)},expression:"filter.product"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.originOptions,attach:"",chips:"",autocomplete:"",label:t.$t("Origin"),"item-value":"value","item-text":"label",multiple:""},model:{value:t.filter.origin,callback:function(e){t.$set(t.filter,"origin",e)},expression:"filter.origin"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.channelOptions,attach:"",chips:"",autocomplete:"",label:t.$t("Channel"),"item-value":"value","item-text":"label",multiple:""},model:{value:t.filter.channel,callback:function(e){t.$set(t.filter,"channel",e)},expression:"filter.channel"}})],1),a("v-flex",{attrs:{xs16:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.countryOptions,"item-value":"country","item-text":"country",attach:"",chips:"",autocomplete:"",label:t.$t("Nationality"),multiple:""},model:{value:t.filter.nationality,callback:function(e){t.$set(t.filter,"nationality",e)},expression:"filter.nationality"}})],1),a("v-flex",{attrs:{xs6:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.languageOptions,attach:"",chips:"",autocomplete:"",label:t.$t("Language"),"item-value":"language","item-text":"language",multiple:""},model:{value:t.filter.language,callback:function(e){t.$set(t.filter,"language",e)},expression:"filter.language"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.paxTypeOptions,"item-value":"value","item-text":"label",attach:"",chips:"",label:t.$t("Pax type"),multiple:""},model:{value:t.filter.paxtype,callback:function(e){t.$set(t.filter,"paxtype",e)},expression:"filter.paxtype"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs6:"",sm4:""}},[a("v-select",{attrs:{"hide-details":"",items:t.leadtimeOptions,"item-value":"value","item-text":"label",attach:"",chips:"",autocomplete:"",label:t.$t("Lead time"),multiple:""},model:{value:t.filter.leadtime,callback:function(e){t.$set(t.filter,"leadtime",e)},expression:"filter.leadtime"}})],1),a("v-flex",{attrs:{xs6:"",sm2:""}},[a("v-select",{attrs:{"hide-details":"",label:t.$t("Numero Notti"),items:t.nightsOptions,attach:""},model:{value:t.filter.nights,callback:function(e){t.$set(t.filter,"nights",e)},expression:"filter.nights"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-in")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkin_from,callback:function(e){t.$set(t.filter,"checkin_from",e)},expression:"filter.checkin_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkin_to,callback:function(e){t.$set(t.filter,"checkin_to",e)},expression:"filter.checkin_to"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-out")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkout_from,callback:function(e){t.$set(t.filter,"checkout_from",e)},expression:"filter.checkout_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkout_to,callback:function(e){t.$set(t.filter,"checkout_to",e)},expression:"filter.checkout_to"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Data prenotazione")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.opendate_from,callback:function(e){t.$set(t.filter,"opendate_from",e)},expression:"filter.opendate_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.opendate_to,callback:function(e){t.$set(t.filter,"opendate_to",e)},expression:"filter.opendate_to"}})],1),a("v-flex",{staticClass:"mt-3",attrs:{xs4:"",sm2:""}},[a("v-select",{attrs:{"hide-details":"",items:t.timeRange,"item-value":"value","item-text":"label",label:t.$t("Ultima prenotazione")},model:{value:t.filter.time_range_type,callback:function(e){t.$set(t.filter,"time_range_type",e)},expression:"filter.time_range_type"}})],1),a("v-flex",{staticClass:"mt-3",attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero"),box:""},model:{value:t.filter.time_range_value,callback:function(e){t.$set(t.filter,"time_range_value",e)},expression:"filter.time_range_value"}})],1)],1),a("v-layout",{staticClass:"mt-2"},[a("v-flex",{attrs:{xs12:""}},[a("div",{staticClass:"title mb-2"},[t._v(t._s(t.$t("Filter users according to accepted regulations")))]),a("TreatmentsFilter",{attrs:{hasRefreshButton:!1}})],1)],1)],1):t._e()],1):t._e()},staticRenderFns:[]};e.a=s},Y40B:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},YZk1:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"500"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("save")]),t._v("\n            "+t._s(t.$t("Salva query"))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-form",{ref:"exportform"},[a("v-text-field",{attrs:{"prepend-icon":"description",label:t.$t("Description"),box:""},model:{value:t.resultName,callback:function(e){t.resultName=e},expression:"resultName"}})],1)],1)],1),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.resultName},nativeOn:{click:function(e){return t.onSave(e)}}},[a("v-icon",[t._v("cloud_download")]),a("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Save")))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},bi2Q:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO"),r=a("jLWv"),n=a("wEVJ"),o=a("ghGH");e.a={name:"LastCheckOutPredictiveFilter",components:{SaveBiResultDialog:n.a,BiLoadResultDialog:o.a},methods:i()({},Object(l.mapActions)("bi/qrLastCheckout",["loadResultList"]),{formatDate:r.b,parseDate:r.f,openSaveDialog:function(){this.showSaveDialog=!0},openOpenDialog:function(){var t=this;this.loadResultList().then(function(){t.showOpenDialog=!0})}}),computed:i()({},Object(l.mapState)("bi/qrLastCheckout",["filter","list","timeRange","panelFilter","filterOptions"]),{leadtimeOptions:function(){var t=[];if(this.filterOptions.leadtime)for(var e=0;e<this.filterOptions.leadtime.length;e++){var a=this.filterOptions.leadtime[e];t.push({value:a,label:this.$t(a)})}return t},hasQuery:function(){return this.list.length>0}}),data:function(){return{showSaveDialog:!1,showOpenDialog:!1,fltCheckinDate:null,fltCheckinDateFormatted:"",fltCheckoutDateFormatted:"",valid:!0,date:"",items:[],dates:[],fltDtMenuCheckIn:!1,fltDtMenuCheckOut:!1,row:!1}}}},eIzO:function(t,e,a){"use strict";var s=a("JWg/"),i=a("JCwE");var l=function(t){a("9ssW")},r=a("VU/8")(s.a,i.a,!1,l,null,null);e.a=r.exports},fusy:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{attrs:{row:""}},[a("v-flex",[a("v-card",[a("v-toolbar",{staticClass:"elevation-1",attrs:{dense:""}},[a("v-toolbar-title",[t._v(t._s(t.$t("Ricerche salvate")))])],1),a("v-list",{staticStyle:{height:"300px","overflow-y":"auto"},attrs:{"two-line":""}},[t._l(t.resultList,function(e,s){return[a("v-list-tile",{key:e.id,attrs:{avatar:""},on:{click:function(a){t.loadData(e)}}},[a("v-list-tile-avatar",[a("v-icon",{staticClass:"blue white--text"},[t._v("folder_open")])],1),a("v-list-tile-content",[a("v-list-tile-title",{domProps:{innerHTML:t._s(e.description)}}),a("v-list-tile-sub-title",[t._v(t._s(t._f("dmy")(e.creationDate.date)))])],1)],1),a("v-divider")]})],2)],1)],1)],1)},staticRenderFns:[]};e.a=s},gTC0:function(t,e,a){"use strict";var s=a("86Ep"),i=a("FJVJ");var l=function(t){a("nVdN")},r=a("VU/8")(s.a,i.a,!1,l,null,null);e.a=r.exports},ghGH:function(t,e,a){"use strict";var s=a("jnZc"),i=a("FwJs"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=l.exports},jnZc:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO"),r=a("LNrM");e.a={name:"BiLoadResultDialog",components:{BiResultList:r.a},computed:i()({},Object(l.mapGetters)("auth",["canSave"])),methods:i()({},Object(l.mapActions)("bi/qrLastCheckout",["saveResultList"]),{onResultLoaded:function(){this.$emit("on-close")},onCancel:function(){this.$emit("on-cancel")}}),props:{show:{default:!1}}}},lEY4:function(t,e,a){"use strict";var s=a("mvHQ"),i=a.n(s),l=a("Dd8w"),r=a.n(l),n=a("NYxO"),o=a("Eoz/"),c=a.n(o),u=a("lbHh"),p=a.n(u),d=a("jLWv"),v=a("/5sW"),f=a("L8MQ"),m=a.n(f),h=a("z1+p"),x=a.n(h);e.a={name:"ShareListDialog",watch:{show:function(){this.contactlistName=this.contactlistFileName}},computed:r()({},Object(n.mapState)("owners/users",["exportFilter"]),{contactlistFileName:function(){var t=c()(new Date,"YYYYMMDDTHHmmss"),e=".csv";return"mailone"===this.adapter?e="":"mailup"===this.adapter&&(e=""),this.adapter+"-"+t+e}},Object(n.mapGetters)("auth",["canSave"])),methods:r()({},Object(n.mapActions)("owners/users",["prepareExportList"]),{onCancel:function(){this.$emit("cancel")},onExport:function(){"csv"===this.adapter?this.onExportCsv():"mailone"===this.adapter?this.onExportMailOne():"mailup"===this.adapter&&this.onExportMailUp()},completeExportRequest:function(){return this.exportFilter.treatments=m()(this.exportFilter.treatments).filter(function(t){return t.selected}),{adapter:this.adapter,contactlistname:this.contactlistName,contactlistemail:"",contactlistreplytoemail:"",filter:this.exportFilter}},onExportMailUp:function(){var t=this,e=this.completeExportRequest();this.prepareExportList(e).then(function(e){t.sendData&&(e.data.filters._result_=t.payLoad),t.$store.dispatch("api/post",e,{root:!0}).then(function(){}),x()(t.onCancel,10)})},onExportMailOne:function(){var t=this,e=this.completeExportRequest();this.prepareExportList(e).then(function(e){t.$store.dispatch("api/post",e,{root:!0}).then(function(){}),x()(t.onCancel,10)})},onExportCsv:function(){var t=this,e=this.$auth.getToken(Object(d.c)()),a=e.split("bearer ");if(a.length>0){e=a[1],p.a.set("token",e);var s=this.completeExportRequest();this.prepareExportList(s).then(function(e){t.jsonParams=i()(e.data),t.$refs.exportform.$el.action=e.url,v.default.nextTick(function(){t.$refs.exportform.$el.submit(),t.onCancel()})})}else alert(this.$t("Error"))}}),mounted:function(){this.contactlistName=this.exportFileName},data:function(){return{jsonParams:null,contactlistName:""}},props:{sendData:{default:!1},payLoad:{default:function(){return[]}},show:{default:!1},adapter:{default:"csv"}}}},"m2i/":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"last-check-out-list pa-0",attrs:{row:""}},[a("v-data-table",t._b({staticClass:"elevation-1",attrs:{headers:t.headers,items:t.privaciesList,loading:t.isAjax},scopedSlots:t._u([{key:"items",fn:function(e){return[a("tr",[a("td",[a("b",[t._v(t._s(e.item.email))])]),a("td",[e.item.created&&e.item.created.date?a("span",{staticStyle:{position:"relative",top:"2px"}},[t._v(t._s(t._f("dmy")(e.item.created.date)))]):a("span",{staticStyle:{position:"relative",top:"2px"}},[t._v(t._s(t._f("dmy")(e.item.created)))])]),a("td",t._l(e.item.privacyFlags,function(e){return a("div",{staticClass:"ml-3",staticStyle:{"white-space":"nowrap"}},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.selected,expression:"fl.selected"}],attrs:{disabled:!0,type:"checkbox"},domProps:{checked:Array.isArray(e.selected)?t._i(e.selected,null)>-1:e.selected},on:{change:function(a){var s=e.selected,i=a.target,l=!!i.checked;if(Array.isArray(s)){var r=t._i(s,null);i.checked?r<0&&t.$set(e,"selected",s.concat([null])):r>-1&&t.$set(e,"selected",s.slice(0,r).concat(s.slice(r+1)))}else t.$set(e,"selected",l)}}}),t._v(" "+t._s(e.code)+"\n\n                        "),e.mandatory?a("span",[t._v("*")]):t._e(),e.unsubscribe?a("span",[t._v("("+t._s(e.user)+")  ")]):t._e()])})),a("td",[t._v(" "+t._s(e.item.surname)+"  "+t._s(e.item.name))]),a("td",[t._v(" "+t._s(e.item.language)+" ")])])]}}])},"v-data-table",t.tableTexts,!1))],1)},staticRenderFns:[]};e.a=s},mqLE:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".bi-query-filters .list__tile{font-size:12px;height:22px}.input-group--selection-controls{min-width:0}.chip.chip--select-multi{height:18px!important;font-size:11px!important}",""])},nVdN:function(t,e,a){var s=a("KvBP");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("6c7f5f7c",s,!0,{sourceMap:!1})},ppOC:function(t,e,a){"use strict";var s=a("1eZA"),i=a("7t75"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=l.exports},rIUX:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),l=a("NYxO");e.a={methods:{encodedId:function(t){return encodeURI(btoa(t))}},data:function(){var t=[{text:this.$t("Email"),value:"email"},{text:this.$t("Created"),value:"created",width:"100px"},{text:this.$t("Flags"),value:"id",sortable:!1},{text:this.$t("Surname")+" "+this.$t("Name"),value:"surname"},{text:this.$t("Language"),value:"language"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[10,20,50,100]},headers:t}},components:{},computed:i()({},Object(l.mapGetters)("bi/qrLastCheckout",["privaciesByEmail"]),Object(l.mapState)("bi/qrLastCheckout",["list","privaciesList"]),Object(l.mapState)("api",["isAjax"]),{privaciesListExport:function(){return this.privaciesList}})}},sud4:function(t,e,a){var s=a("A7iD");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("13dceaea",s,!0,{sourceMap:!1})},uAr7:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("LastCheckout")},staticRenderFns:[]};e.a=s},wEVJ:function(t,e,a){"use strict";var s=a("R/G8"),i=a("YZk1"),l=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=l.exports}});