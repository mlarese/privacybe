webpackJsonp([19],{"07sv":function(t,e,a){var s=a("rpnb"),i=a("CxPB"),r=a("t8rQ");t.exports=function(t,e){return null==t?t:s(t,i(e),r)}},"1eZA":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),r=a("NYxO");e.a={name:"LastCheckOutBtn",computed:i()({},Object(r.mapState)("bi/qrLastCheckout",["filter"]),Object(r.mapState)("app",["isAjax"])),data:function(){return{valid:!0}},methods:i()({},Object(r.mapMutations)("bi/qrLastCheckout",["resetFilter","togglePanelFilter","setList"]),Object(r.mapActions)("bi/qrLastCheckout",["loadData"]),{search:function(){this.setList([]),this.loadData({})},cancel:function(){this.resetFilter()}})}},"7t75":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"text-xs-center"},[a("v-flex",[a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",loading:t.isAjax,small:"",fab:"",color:"info"},on:{click:t.search},slot:"activator"},[a("v-icon",[t._v("search")])],1),t._v("\n            "+t._s(t.$t("Esegui query"))+"\n        ")],1),a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"elevation-1",attrs:{slot:"activator",color:"warning",fab:"",small:"",disabled:!t.valid},on:{click:t.cancel},slot:"activator"},[a("v-icon",[t._v("clear")])],1),t._v("\n            "+t._s(t.$t("Reset"))+"\n        ")],1)],1)],1)},staticRenderFns:[]};e.a=s},"8/rj":function(t,e,a){"use strict";var s=a("X+F4"),i=a("KSTj"),r=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=r.exports},"86Ep":function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),r=a("NYxO"),n=a("07sv"),l=a.n(n);e.a={name:"TreatmentsFilter",data:function(){return{mandatoryTermFilter:[],filter:{person:"",treatments:{},language:""}}},methods:i()({onReload:function(){this.canSearchUsers&&(this.searchListDelegate(),this.setNeedRefresh(!1))},onTermChange:function(t,e){if(t.selected)e.selected=!0;else{var a=this.selectedTermsCount(e);e.selected=a>0}this.onChange(e)},onTreatmentChange:function(t){t.selected?this.setSelectAllTerms(t.terms,!0):this.setSelectAllTerms(t.terms,!1),this.onChange(t)}},Object(r.mapActions)("owners/users",["searchListDelegate"]),Object(r.mapMutations)("owners/users",["setExportFilter","setExportFilterTreatments"]),Object(r.mapMutations)("terms",["setNeedRefresh"]),{setSelectAllTerms:function(t,e){l()(t,function(t){t.selected=e})},onChange:function(t){this.updateTreatment(t)},updateTreatment:function(t){this.setNeedRefresh(!0),this.exportTreatments()},exportTreatments:function(){var t=[];this.filter.treatments||(this.filter.treatments=[]),this.filter.treatments.forEach(function(e){e.selected&&t.push(e)}),this.setExportFilterTreatments(t)},selectedTermsCount:function(t){return t.terms.reduce(function(t,e){return e.selected&&t++,e.selected?t++:t},0)}}),created:function(){this.mandatoryTermFilter=this.termFilter,this.filter.treatments=this.mandatoryTermFilter,this.exportTreatments()},computed:i()({hasSelectedTreatment:function(){return!!this.exportFilter.treatments&&this.exportFilter.treatments.length>0},showRefreshBtn:function(){return this.canSearchUsers},canSearchUsers:function(){return!!this.search.needRefresh&&!(!this.canSeeNoAgreementPrivacies&&!this.hasSelectedTreatment)}},Object(r.mapGetters)("auth",["canSeeNoAgreementPrivacies"]),Object(r.mapState)("auth",["user"]),Object(r.mapState)("terms",["termFilter","search"]),Object(r.mapState)("owners/users",["exportFilter"])),props:{hasRefreshButton:{default:!0}}}},BEx8:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),r=a("Xxa5"),n=a.n(r),l=a("//Fk"),o=a.n(l),c=a("exGp"),u=a.n(c),p=a("Jdzf"),d=a("ppOC"),m=a("8/rj"),f=a("NYxO");e.a={name:"predict",fetch:function(){var t=u()(n.a.mark(function t(e){var a,s=e.store;return n.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return s.dispatch("treatments/load",{},{root:!0}),s.dispatch("terms/load",{},{root:!0}),s.commit("bi/qrLastCheckout/resetFilter"),t.next=5,s.dispatch("terms/loadFilter",{},{root:!0});case 5:return t.t0=t.sent,t.next=8,s.dispatch("bi/qrLastCheckout/loadFilterOptions",{},{root:!0});case 8:return t.t1=t.sent,a=[t.t0,t.t1],t.abrupt("return",o.a.all(a));case 11:case"end":return t.stop()}},t,this)}));return function(e){return t.apply(this,arguments)}}(),methods:i()({},Object(f.mapActions)("bi/qrLastCheckout",["loadData"])),computed:i()({},Object(f.mapState)("bi/qrLastCheckout",["list"]),Object(f.mapState)("app",["biTitle"]),Object(f.mapGetters)("app",["userHasPredictive"])),components:{LastCheckoutPvList:p.a,LastCheckOutFilter:m.a,LastCheckOutBtn:d.a}}},CnxS:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"last-check-out-list pa-0",attrs:{row:""}},[a("v-data-table",t._b({staticClass:"elevation-1",attrs:{headers:t.headers,items:t.privaciesListFlt,loading:t.isAjax},scopedSlots:t._u([{key:"items",fn:function(e){return[a("tr",[a("td",[a("b",[t._v(t._s(e.item.email))])]),a("td",[e.item.created&&e.item.created.date?a("span",{staticStyle:{position:"relative",top:"2px"}},[t._v(t._s(t._f("dmy")(e.item.created.date)))]):a("span",{staticStyle:{position:"relative",top:"2px"}},[t._v(t._s(t._f("dmy")(e.item.created)))])]),a("td",t._l(e.item.privacyFlags,function(e){return a("div",{staticClass:"ml-3",staticStyle:{"white-space":"nowrap"}},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.selected,expression:"fl.selected"}],attrs:{disabled:!0,type:"checkbox"},domProps:{checked:Array.isArray(e.selected)?t._i(e.selected,null)>-1:e.selected},on:{change:function(a){var s=e.selected,i=a.target,r=!!i.checked;if(Array.isArray(s)){var n=t._i(s,null);i.checked?n<0&&t.$set(e,"selected",s.concat([null])):n>-1&&t.$set(e,"selected",s.slice(0,n).concat(s.slice(n+1)))}else t.$set(e,"selected",r)}}}),t._v(" "+t._s(e.code)+"\n\n                        "),e.mandatory?a("span",[t._v("*")]):t._e(),e.unsubscribe?a("span",[t._v("("+t._s(e.user)+")  ")]):t._e()])})),a("td",[t._v(" "+t._s(e.item.surname)+"  "+t._s(e.item.name))]),a("td",[t._v(" "+t._s(e.item.language)+" ")])])]}}])},"v-data-table",t.tableTexts,!1))],1)},staticRenderFns:[]};e.a=s},CxPB:function(t,e,a){var s=a("wSKX");t.exports=function(t){return"function"==typeof t?t:s}},FJVJ:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"treatment-filter ",attrs:{column:""}},[a("div",{staticClass:"blue-grey lighten-5"},[a("v-layout",{attrs:{row:"",wrap:""}},t._l(t.mandatoryTermFilter,function(e,s){return a("v-flex",{key:s,staticClass:"py-2 left-bordered",attrs:{xs12:"",sm4:""}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"pl-2",attrs:{xs12:""}},[a("span",{staticClass:"treatment-flag"},[a("v-checkbox",{staticClass:"treatment-flag-checkbox",attrs:{color:"blue darken-1","hide-details":"",small:"",label:e.name},on:{change:function(a){t.onTreatmentChange(e)}},model:{value:e.selected,callback:function(a){t.$set(e,"selected",a)},expression:"treatment.selected"}})],1)])],1),t._l(e.terms,function(s,i){return[a("v-layout",{key:i,staticClass:"pl-4",attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs1:""}},[a("v-checkbox",{staticClass:"treatment-flag-checkbox",attrs:{color:"blue darken-1","hide-details":"",small:"",_label:"term.name"},on:{change:function(a){t.onTermChange(s,e)}},model:{value:s.selected,callback:function(e){t.$set(s,"selected",e)},expression:"term.selected"}})],1),a("v-flex",{staticClass:"caption pr-3",attrs:{xs11:""}},[a("div",{staticClass:"pl-2"},[a("v-divider"),t._v("\n                                "+t._s(s.name)+"\n                            ")],1)])],1)]})],2)}))],1),t.hasSelectedTreatment?t._e():a("v-layout",{attrs:{column:""}},[a("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[a("v-alert",{attrs:{value:!0,outline:"",color:"info",icon:"info"}},[t.canSeeNoAgreementPrivacies?a("div",[t._v("\n                    "+t._s(t.$t("Searching no subscriptions users"))+"\n                    ")]):a("div",[t._v("\n                        "+t._s(t.$t("You cannot see no subscriptions users"))+"\n                    ")])])],1)],1),t.showRefreshBtn?a("v-layout",{attrs:{column:""}},[t.hasRefreshButton?a("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[a("v-btn",{attrs:{flat:""},on:{click:t.onReload}},[a("span",[t._v(t._s(t.$t("Click here to refresh")))]),a("v-icon",[t._v("replay")])],1)],1):t._e()],1):t._e()],1)},staticRenderFns:[]};e.a=s},J0hP:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"ma-0 pa-0 bi-query-filters"},[this.userHasPredictive?e("v-layout",{staticClass:"mb-2",attrs:{wrap:"",row:""}},[e("v-flex",{attrs:{xs12:""}},[e("LastCheckOutFilter")],1)],1):this._e(),e("LastCheckOutBtn"),e("v-layout",{staticClass:"mt-2",attrs:{wrap:"",row:""}},[e("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[e("v-toolbar-title",[this._v(this._s(this.$t("Risultati")))])],1),e("v-flex",{attrs:{xs12:""}},[e("LastCheckoutPvList")],1)],1)],1)},staticRenderFns:[]};e.a=s},Jdzf:function(t,e,a){"use strict";var s=a("rIUX"),i=a("CnxS"),r=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=r.exports},KSTj:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return t.filter?a("v-container",{staticClass:"pa-0 ma-0",attrs:{fluid:"","grid-list-sm":""}},[a("ShareListDialog",{attrs:{show:t.showShareDialog,adapter:t.adapter,"send-data":!0,"pay-load":t.privaciesListExport},on:{cancel:t.hideShareDialog}}),a("v-toolbar",{staticClass:"elevation-1 mb-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[a("v-toolbar-title",[t._v(t._s(t.$t("Data & Query 2.0")))]),a("v-spacer"),a("v-menu",{attrs:{disabled:0==t.privaciesList.length,"_v-if":"canShare",origin:"center center",transition:"scale-transition",bottom:""}},[a("v-btn",{staticClass:"elevation-0 text-upper",attrs:{slot:"activator",small:"",color:"info",disabled:0==t.privaciesList.length},slot:"activator"},[t._v("\n                "+t._s(t.$t("Share list"))+"\n            ")]),a("v-list",t._l(t.shareMenuItems,function(e,s){return a("v-list-tile",{key:s,on:{click:function(t){}}},[a("v-list-tile-title",{on:{click:function(a){t.onShowShareList(e.adapter)}}},[t._v("\n                        "+t._s(t.$t(e.title))+"\n                    ")])],1)}))],1),a("v-btn",{staticClass:"mt-1",attrs:{flat:"",fab:"",small:""},on:{click:function(e){t.panelFilter.queryFltPanelOpen=!t.panelFilter.queryFltPanelOpen}}},[t.panelFilter.queryFltPanelOpen?a("v-icon",[t._v("keyboard_arrow_up")]):a("v-icon",[t._v("keyboard_arrow_down")])],1)],1),t.panelFilter.queryFltPanelOpen?a("v-card",{staticClass:"pa-2 elevation-1"},[a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.productOptions,attach:"",autocomplete:"",chips:"","item-text":"product","item-value":"product",label:t.$t("Prodotti"),multiple:""},model:{value:t.filter.product,callback:function(e){t.$set(t.filter,"product",e)},expression:"filter.product"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.originOptions,attach:"",chips:"",autocomplete:"",label:t.$t("Origin"),"item-value":"value","item-text":"label",multiple:""},model:{value:t.filter.origin,callback:function(e){t.$set(t.filter,"origin",e)},expression:"filter.origin"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.channelOptions,attach:"",chips:"",autocomplete:"",label:t.$t("Channel"),"item-value":"value","item-text":"label",multiple:""},model:{value:t.filter.channel,callback:function(e){t.$set(t.filter,"channel",e)},expression:"filter.channel"}})],1),a("v-flex",{attrs:{xs16:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.countryOptions,"item-value":"country","item-text":"country",attach:"",chips:"",autocomplete:"",label:t.$t("Nazione"),multiple:""},model:{value:t.filter.nationality,callback:function(e){t.$set(t.filter,"nationality",e)},expression:"filter.nationality"}})],1),a("v-flex",{attrs:{xs6:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.languageOptions,attach:"",chips:"",autocomplete:"",label:t.$t("Language"),"item-value":"language","item-text":"language",multiple:""},model:{value:t.filter.language,callback:function(e){t.$set(t.filter,"language",e)},expression:"filter.language"}})],1),a("v-flex",{attrs:{xs12:"",sm4:"","d-flex":""}},[a("v-select",{attrs:{"hide-details":"",items:t.paxTypeOptions,"item-value":"value","item-text":"label",attach:"",chips:"",label:t.$t("Tipologia di ospite"),multiple:""},model:{value:t.filter.paxtype,callback:function(e){t.$set(t.filter,"paxtype",e)},expression:"filter.paxtype"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs6:"",sm4:""}},[a("v-select",{attrs:{"hide-details":"",items:t.leadtimeOptions,"item-value":"value","item-text":"label",attach:"",chips:"",autocomplete:"",label:t.$t("Lead time"),multiple:""},model:{value:t.filter.leadtime,callback:function(e){t.$set(t.filter,"leadtime",e)},expression:"filter.leadtime"}})],1),a("v-flex",{attrs:{xs6:"",sm2:""}},[a("v-select",{attrs:{"hide-details":"",label:t.$t("Numero Notti"),items:t.nightsOptions,attach:""},model:{value:t.filter.nights,callback:function(e){t.$set(t.filter,"nights",e)},expression:"filter.nights"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-in")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy","value-format":"yyyy-MM-dd",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkin_from,callback:function(e){t.$set(t.filter,"checkin_from",e)},expression:"filter.checkin_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy","value-format":"yyyy-MM-dd",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkin_to,callback:function(e){t.$set(t.filter,"checkin_to",e)},expression:"filter.checkin_to"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Check-out")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy","value-format":"yyyy-MM-dd",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.checkout_from,callback:function(e){t.$set(t.filter,"checkout_from",e)},expression:"filter.checkout_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy","value-format":"yyyy-MM-dd",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.checkout_to,callback:function(e){t.$set(t.filter,"checkout_to",e)},expression:"filter.checkout_to"}})],1)],1),a("v-layout",{staticClass:"pa-0",attrs:{wrap:"","align-center":""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-toolbar",{staticClass:"elevation-0 extradense"},[a("v-toolbar-title",{staticClass:"subheader"},[t._v(t._s(t.$t("Data prenotazione")))])],1),a("el-date-picker",{staticClass:"mr-1",attrs:{format:"dd/MM/yyyy","value-format":"yyyy-MM-dd",placeholder:t.$t("From"),type:"date"},model:{value:t.filter.opendate_from,callback:function(e){t.$set(t.filter,"opendate_from",e)},expression:"filter.opendate_from"}}),a("el-date-picker",{attrs:{format:"dd/MM/yyyy","value-format":"yyyy-MM-dd",placeholder:t.$t("To"),type:"date"},model:{value:t.filter.opendate_to,callback:function(e){t.$set(t.filter,"opendate_to",e)},expression:"filter.opendate_to"}})],1),a("v-flex",{staticClass:"mt-3",attrs:{xs4:"",sm2:""}},[a("v-select",{attrs:{"hide-details":"",items:t.timeRange,"item-value":"value","item-text":"label",label:t.$t("Ultima prenotazione")},model:{value:t.filter.time_range_type,callback:function(e){t.$set(t.filter,"time_range_type",e)},expression:"filter.time_range_type"}})],1),a("v-flex",{staticClass:"mt-3",attrs:{xs4:"",sm2:""}},[a("v-text-field",{staticClass:"filter-numeric-text-field",attrs:{"hide-details":"",label:t.$t("Numero"),box:""},model:{value:t.filter.time_range_value,callback:function(e){t.$set(t.filter,"time_range_value",e)},expression:"filter.time_range_value"}})],1)],1),a("v-layout",{staticClass:"mt-2"},[a("v-flex",{attrs:{xs12:""}},[a("div",{staticClass:"title mb-2"},[t._v(t._s(t.$t("Filter users according to accepted regulations")))]),a("TreatmentsFilter",{attrs:{hasRefreshButton:!1}})],1)],1)],1):t._e()],1):t._e()},staticRenderFns:[]};e.a=s},KvBP:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".left-bordered{border-right:1px solid #e1e1e1}.treatment-flag-checkbox .input-group--selection-controls__ripple{height:24px;width:24px;left:9px}.treatment-flag-checkbox label{font-size:12px;line-height:20px;color:rgba(0,0,0,.8)!important}.treatment-flag-checkbox .icon{font-size:18px}.treatment-flag-checkbox .input-group--text-field-box .input-group__input,.treatment-flag-checkbox .input-group__input{min-height:20px}",""])},"LBi/":function(t,e,a){"use strict";var s=a("lEY4"),i=a("P/w5"),r=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=r.exports},NX9z:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("BEx8"),i=a("J0hP");var r=function(t){a("kG6R")},n=a("VU/8")(s.a,i.a,!1,r,null,null);e.default=n.exports},NcCf:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".bi-query-filters .list__tile{font-size:12px;height:22px}.input-group--selection-controls{min-width:0}.chip.chip--select-multi{height:18px!important;font-size:11px!important}",""])},"P/w5":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"290"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("alternate_email")]),t._v("\n            "+t._s(t.$t("Share list"))+" - "+t._s(t.$t(t.adapter))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-form",{ref:"exportform",attrs:{enctype:"text/plain",target:"_blank",method:"POST"}},[a("v-text-field",{attrs:{disabled:!t.canSave,"prepend-icon":"description",label:t.$t("List name"),box:""},model:{value:t.contactlistName,callback:function(e){t.contactlistName=e},expression:"contactlistName"}}),a("input",{directives:[{name:"model",rawName:"v-model",value:t.jsonParams,expression:"jsonParams"}],attrs:{type:"hidden",name:"json"},domProps:{value:t.jsonParams},on:{input:function(e){e.target.composing||(t.jsonParams=e.target.value)}}})],1)],1)],1),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.contactlistName||!t.canSave},nativeOn:{click:function(e){return t.onExport(e)}}},[a("v-icon",[t._v("cloud_download")]),a("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Share")))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},"X+F4":function(t,e,a){"use strict";for(var s=a("Dd8w"),i=a.n(s),r=a("NYxO"),n=a("LBi/"),l=a("gTC0"),o=a("8wQP"),c=a.n(o),u=[""],p=1;p<90;p++)u.push(p);e.a={name:"LastCheckOutFilter",components:{TreatmentsFilter:l.a,ShareListDialog:n.a},methods:{blankTimeRangeValue:function(){this.filter.time_range_value=null},onShowShareList:function(t){this.adapter=t,this.showShareDialog=!0},hideShareDialog:function(){this.showShareDialog=!1}},computed:i()({},Object(r.mapState)("bi/qrLastCheckout",["filter","filterOptions","panelFilter","timeRange","list","privaciesList"]),{privaciesListExport:function(){return this.privaciesList&&this.privaciesList.length&&this.privaciesList.length>0?c()(this.privaciesList,"email"):[]},productOptions:function(){return this.filterOptions.product?this.filterOptions.product:[]},channelOptions:function(){var t=[];if(this.filterOptions.channel)for(var e=0;e<this.filterOptions.channel.length;e++){var a=this.filterOptions.channel[e];t.push({value:a,label:this.$t(a)})}return t},originOptions:function(){return this.filterOptions.origin},languageOptions:function(){return this.filterOptions.language?this.filterOptions.language:[]},countryOptions:function(){return this.filterOptions.country?this.filterOptions.country:[]},paxTypeOptions:function(){return this.filterOptions.paxType?this.filterOptions.paxType:[]},leadtimeOptions:function(){var t=[];if(this.filterOptions.leadtime)for(var e=0;e<this.filterOptions.leadtime.length;e++){var a=this.filterOptions.leadtime[e];t.push({value:a,label:this.$t(a)})}return t}}),data:function(){return{adapter:"csv",shareMenuItems:[{title:"Mailup Export",adapter:"mailup"}],valid:!0,showShareDialog:!1,date:"",items:[],dates:[],menu:!1,row:!1,nightsOptions:u}}}},gTC0:function(t,e,a){"use strict";var s=a("86Ep"),i=a("FJVJ");var r=function(t){a("nVdN")},n=a("VU/8")(s.a,i.a,!1,r,null,null);e.a=n.exports},kG6R:function(t,e,a){var s=a("NcCf");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("18d0b3e4",s,!0,{sourceMap:!1})},lEY4:function(t,e,a){"use strict";var s=a("mvHQ"),i=a.n(s),r=a("Dd8w"),n=a.n(r),l=a("NYxO"),o=a("GCGT"),c=a("lbHh"),u=a.n(c),p=a("jLWv"),d=a("/5sW"),m=a("L8MQ"),f=a.n(m),h=a("z1+p"),v=a.n(h);e.a={name:"ShareListDialog",watch:{show:function(){this.contactlistName=this.contactlistFileName}},computed:n()({},Object(l.mapState)("owners/users",["exportFilter"]),{contactlistFileName:function(){var t=Object(o.a)(new Date,"yyyyMMddTHHmmss"),e=".csv";return"mailone"===this.adapter?e="":"mailup"===this.adapter&&(e=""),this.adapter+"-"+t+e}},Object(l.mapGetters)("auth",["canSave"])),methods:n()({},Object(l.mapActions)("owners/users",["prepareExportList"]),{onCancel:function(){this.$emit("cancel")},onExport:function(){"csv"===this.adapter?this.onExportCsv():"mailone"===this.adapter?this.onExportMailOne():"mailup"===this.adapter&&this.onExportMailUp()},completeExportRequest:function(){return this.exportFilter.treatments=f()(this.exportFilter.treatments).filter(function(t){return t.selected}),{adapter:this.adapter,contactlistname:this.contactlistName,contactlistemail:"",contactlistreplytoemail:"",filter:this.exportFilter}},onExportMailUp:function(){var t=this,e=this.completeExportRequest();this.prepareExportList(e).then(function(e){t.sendData&&(e.data.filters._result_=t.payLoad),t.$store.dispatch("api/post",e,{root:!0}).then(function(){}),v()(t.onCancel,10)})},onExportMailOne:function(){var t=this,e=this.completeExportRequest();this.prepareExportList(e).then(function(e){t.sendData&&(e.data.filters._result_=t.payLoad),t.$store.dispatch("api/post",e,{root:!0}).then(function(){}),v()(t.onCancel,10)})},onExportCsv:function(){var t=this,e=this.$auth.getToken(Object(p.c)()),a=e.split("bearer ");if(a.length>0){e=a[1],u.a.set("token",e);var s=this.completeExportRequest();this.prepareExportList(s).then(function(e){t.jsonParams=i()(e.data),t.sendData&&(t._result_=i()(t.payLoad)),t.$refs.exportform.$el.action=e.url,d.default.nextTick(function(){t.$refs.exportform.$el.submit(),console.log(t.jsonParams),t.onCancel()})})}else alert(this.$t("Error"))}}),mounted:function(){this.contactlistName=this.exportFileName},data:function(){return{jsonParams:null,_result_:null,contactlistName:""}},props:{sendData:{default:!1},payLoad:{default:function(){return[]}},show:{default:!1},adapter:{default:"csv"}}}},nVdN:function(t,e,a){var s=a("KvBP");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("6c7f5f7c",s,!0,{sourceMap:!1})},ppOC:function(t,e,a){"use strict";var s=a("1eZA"),i=a("7t75"),r=a("VU/8")(s.a,i.a,!1,null,null,null);e.a=r.exports},rIUX:function(t,e,a){"use strict";var s=a("Dd8w"),i=a.n(s),r=a("NYxO");e.a={methods:{encodedId:function(t){return encodeURI(btoa(t))}},data:function(){var t=[{text:this.$t("Email"),value:"email"},{text:this.$t("Created"),value:"created",width:"100px"},{text:this.$t("Flags"),value:"id",sortable:!1},{text:this.$t("Surname")+" "+this.$t("Name"),value:"surname"},{text:this.$t("Language"),value:"language"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[10,20,50,100]},headers:t}},components:{},computed:i()({},Object(r.mapGetters)("bi/qrLastCheckout",["privaciesByEmail"]),Object(r.mapState)("bi/qrLastCheckout",["list","privaciesList"]),Object(r.mapState)("api",["isAjax"]),{privaciesListFlt:function(){return this.privaciesList.filter(function(t){return t.email})},privaciesListExport:function(){return this.privaciesListFlt}})}}});