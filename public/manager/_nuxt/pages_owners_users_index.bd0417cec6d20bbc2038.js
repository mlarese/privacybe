/*! For license information please see LICENSES */
webpackJsonp([15],{"07sv":function(t,e,a){var s=a("rpnb"),r=a("CxPB"),n=a("t8rQ");t.exports=function(t,e){return null==t?t:s(t,r(e),n)}},"0X/x":function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("NYxO"),i=a("YtWf"),o=a("GCGT"),l=a("vaKA"),c=new Date,u=Object(l.a)(c,1),d=[Object(o.a)(c,"yyyy-MM-dd"),Object(o.a)(u,"yyyy-MM-dd"),""];e.a={name:"UserFilter",watch:{domainFilter:function(){this.setNeedRefresh(!0)},languageFilter:function(){this.setNeedRefresh(!0)},"search.criteria":function(){this.setNeedRefresh(!0)}},created:function(){this.setDateFilter(),this.domainFilter&&""!==this.domainFilter||(this.domainFilter="all"),this.languageFilter||(this.languageFilter=[])},methods:r()({setDateFilter:function(){var t=this;this.$nextTick(function(){t.setSearch({value:d[t.search.toggleValue1],path:"localDateCriteria"}),t.searchListDelegate().then(function(){t.setNeedRefresh(!1)})})}},Object(n.mapMutations)("terms",["setNeedRefresh"]),Object(n.mapMutations)("owners/users",["setSearch"]),Object(n.mapActions)("owners/users",["searchList","searchListDelegate"]),{onReload:function(){var t=this;this.$nextTick(function(){t.searchListDelegate().then(function(){t.setNeedRefresh(!1)})})}}),computed:r()({selectDomainList:function(){var t=[{name:this.$t("all"),code:"all"}];return this.domainsList.forEach(function(e){e.code=e.name,t.push(e)}),t}},Object(n.mapGetters)("auth",["canSave"]),{selectLanguageList:function(){return this.comboLanguages},criteria:Object(i.d)("owners/users/search@criteria"),dateFilter:Object(i.b)("owners/users/search@toggleValue1"),domainFilter:Object(i.d)("owners/users/exportFilter@domain"),languageFilter:Object(i.d)("owners/users/exportFilter@language")},Object(n.mapState)("owners/users",["list","exportFilter","search"]),Object(n.mapState)("domains",{domainsList:"list"}),Object(n.mapState)("app",["comboLanguages"]))}},"4TmN":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-toolbar",{staticClass:"py-0 px-4  elevation-1",attrs:{dense:"",color:"white"}},[a("v-text-field",{attrs:{disabled:0==t.list.length,"append-icon":"search",label:t.$t("Filter result set"),"single-line":"","hide-details":""},model:{value:t.search.localCriteria,callback:function(e){t.$set(t.search,"localCriteria",e)},expression:"search.localCriteria"}})],1)},staticRenderFns:[]};e.a=s},"4V3h":function(t,e,a){var s=a("8dNa");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("59898462",s,!0,{sourceMap:!1})},"86Ep":function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("NYxO"),i=a("07sv"),o=a.n(i);e.a={name:"TreatmentsFilter",data:function(){return{mandatoryTermFilter:[],filter:{person:"",treatments:{},language:""}}},methods:r()({onReload:function(){this.canSearchUsers&&(this.searchListDelegate(),this.setNeedRefresh(!1))},onTermChange:function(t,e){if(t.selected)e.selected=!0;else{var a=this.selectedTermsCount(e);e.selected=a>0}this.onChange(e)},onTreatmentChange:function(t){t.selected?this.setSelectAllTerms(t.terms,!0):this.setSelectAllTerms(t.terms,!1),this.onChange(t)}},Object(n.mapActions)("owners/users",["searchListDelegate"]),Object(n.mapMutations)("owners/users",["setExportFilter","setExportFilterTreatments"]),Object(n.mapMutations)("terms",["setNeedRefresh"]),{setSelectAllTerms:function(t,e){o()(t,function(t){t.selected=e})},onChange:function(t){this.updateTreatment(t)},updateTreatment:function(t){this.setNeedRefresh(!0),this.exportTreatments()},exportTreatments:function(){var t=[];this.filter.treatments||(this.filter.treatments=[]),this.filter.treatments.forEach(function(e){e.selected&&t.push(e)}),this.setExportFilterTreatments(t)},selectedTermsCount:function(t){return t.terms.reduce(function(t,e){return e.selected&&t++,e.selected?t++:t},0)}}),created:function(){this.mandatoryTermFilter=this.termFilter,this.filter.treatments=this.mandatoryTermFilter,this.exportTreatments()},computed:r()({hasSelectedTreatment:function(){return!!this.exportFilter.treatments&&this.exportFilter.treatments.length>0},showRefreshBtn:function(){return this.canSearchUsers},canSearchUsers:function(){return!!this.search.needRefresh&&!(!this.canSeeNoAgreementPrivacies&&!this.hasSelectedTreatment)}},Object(n.mapGetters)("auth",["canSeeNoAgreementPrivacies"]),Object(n.mapState)("auth",["user"]),Object(n.mapState)("terms",["termFilter","search"]),Object(n.mapState)("owners/users",["exportFilter"])),props:{hasRefreshButton:{default:!0}}}},"8Qov":function(t,e,a){"use strict";var s=a("phVV"),r=a("4TmN"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=n.exports},"8dNa":function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".left-bordered{border-right:1px solid #e1e1e1}.treatment-flag-checkbox .input-group--selection-controls__ripple{height:24px;width:24px;left:9px}.treatment-flag-checkbox label{font-size:12px;line-height:20px;color:rgba(0,0,0,.8)!important}.treatment-flag-checkbox .icon{font-size:18px}.treatment-flag-checkbox .input-group--text-field-box .input-group__input,.treatment-flag-checkbox .input-group__input{min-height:20px}",""])},BEFF:function(t,e,a){"use strict";var s=a("//Fk"),r=a.n(s),n=a("NUKO");e.a={components:{UserManager:n.a},fetch:function(t){var e=t.store,a=(e.state.owners.users.useCache,e.state.owners.users.inited);e.dispatch("treatments/load",{},{root:!0}),e.dispatch("terms/load",{},{root:!0}),e.state.terms.termFilter&&e.state.terms.termFilter.length;var s=[e.dispatch("terms/loadFilter",{},{root:!0})];return a||s.push(e.dispatch("owners/users/init",{},{root:!0})),r.a.all(s).then(function(){e.dispatch("owners/users/searchListDelegate",null,{root:!0}).then(function(){return e.commit("owners/users/setUseCache",!0,{root:!0})})})}}},CxPB:function(t,e,a){var s=a("wSKX");t.exports=function(t){return"function"==typeof t?t:s}},GJRB:function(t,e,a){var s=a("p+qv");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("623c2961",s,!0,{sourceMap:!1})},HNeJ:function(t,e,a){var s=a("f0CJ");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("64bff3f4",s,!0,{sourceMap:!1})},Jalg:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".surfers-list-table tr{cursor:pointer}.surfers-list-table td{cursor:pointer;padding-right:0!important}.surfers-list-table td .btn{height:26px!important;width:26px}.surfers-list-table table.table tbody td,.surfers-list-table table.table tbody th,.surfers-list-table table.table thead tr{height:32px;font-size:12px}",""])},K40v:function(t,e,a){"use strict";var s=a("zyW9"),r=a("uc+c");var n=function(t){a("QAfV")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},LBBD:function(t,e,a){"use strict";var s=a("0X/x"),r=a("lzjS");var n=function(t){a("HNeJ")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},"LBi/":function(t,e,a){"use strict";var s=a("lEY4"),r=a("qN7s"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=n.exports},NUKO:function(t,e,a){"use strict";var s=a("hJJ5"),r=a("uYHP"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=n.exports},QAfV:function(t,e,a){var s=a("Jalg");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("124d7214",s,!0,{sourceMap:!1})},RYYX:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"treatment-filter ",attrs:{column:""}},[a("div",{staticClass:"blue-grey lighten-5"},[a("v-layout",{attrs:{row:"",wrap:""}},t._l(t.mandatoryTermFilter,function(e,s){return a("v-flex",{key:s,staticClass:"py-2 left-bordered",attrs:{xs12:"",sm4:""}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"pl-2",attrs:{xs12:""}},[a("span",{staticClass:"treatment-flag"},[a("v-checkbox",{staticClass:"treatment-flag-checkbox",attrs:{color:"blue darken-1","hide-details":"",small:"",label:e.name},on:{change:function(a){t.onTreatmentChange(e)}},model:{value:e.selected,callback:function(a){t.$set(e,"selected",a)},expression:"treatment.selected"}})],1)])],1),t._l(e.terms,function(s,r){return[a("v-layout",{key:r,staticClass:"pl-4",attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs1:""}},[a("v-checkbox",{staticClass:"treatment-flag-checkbox",attrs:{color:"blue darken-1","hide-details":"",small:"",_label:"term.name"},on:{change:function(a){t.onTermChange(s,e)}},model:{value:s.selected,callback:function(e){t.$set(s,"selected",e)},expression:"term.selected"}})],1),a("v-flex",{staticClass:"caption pr-3",attrs:{xs11:""}},[a("div",{staticClass:"pl-2"},[a("v-divider"),t._v("\n                                "+t._s(s.name)+"\n                            ")],1)])],1)]})],2)}))],1),t.hasSelectedTreatment?t._e():a("v-layout",{attrs:{column:""}},[a("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[a("v-alert",{attrs:{value:!0,outline:"",color:"info",icon:"info"}},[t.canSeeNoAgreementPrivacies?a("div",[t._v("\n                    "+t._s(t.$t("Searching no subscriptions users"))+"\n                    ")]):a("div",[t._v("\n                        "+t._s(t.$t("You cannot see no subscriptions users"))+"\n                    ")])])],1)],1),t.showRefreshBtn?a("v-layout",{attrs:{column:""}},[t.hasRefreshButton?a("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[a("v-btn",{attrs:{flat:""},on:{click:t.onReload}},[a("span",[t._v(t._s(t.$t("Click here to refresh")))]),a("v-icon",[t._v("replay")])],1)],1):t._e()],1):t._e()],1)},staticRenderFns:[]};e.a=s},a0OY:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("BEFF"),r=a("ktCy");var n=function(t){a("GJRB")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.default=i.exports},f0CJ:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".user-filter-toggle{border:1px solid #e2e2e2}.user-filter-date-toggle.btn--active{background-color:#eee!important;pointer-events:none}.input-group__details{display:none}",""])},gTC0:function(t,e,a){"use strict";var s=a("86Ep"),r=a("RYYX");var n=function(t){a("4V3h")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},hJJ5:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("gTC0"),i=a("LBBD"),o=a("K40v"),l=a("LBi/"),c=a("8Qov"),u=a("NYxO"),d=a("L8MQ"),p=a.n(d);e.a={name:"UserManager",methods:r()({},Object(u.mapActions)("owners/users",["searchList"]),{onShowShareList:function(t){this.adapter=t,this.showShareDialog=!0},onSearch:function(){this.exportFilter.treatments=p()(this.exportFilter.treatments).filter(function(t){return t.selected}),this.searchList(this.exportFilter)},hideShareDialog:function(){this.showShareDialog=!1}}),computed:r()({},Object(u.mapState)("owners/users",["exportFilter"]),Object(u.mapGetters)("auth",["canAdd","canShare"])),data:function(){return{selectedExportMenuItem:null,showShareDialog:!1,toggleTemporaryFilter:1,adapter:"csv",shareMenuItems:[{title:"Csv Export",adapter:"csv"},{title:"Mailone Export",adapter:"mailone"},{title:"Mailup Export",adapter:"mailup"}]}},components:{GridSearchBar:c.a,ShareListDialog:l.a,TreatmentsFilter:n.a,UserFilter:i.a,UsersGrid:o.a}}},ktCy:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("UserManager")},staticRenderFns:[]};e.a=s},lEY4:function(t,e,a){"use strict";var s=a("mvHQ"),r=a.n(s),n=a("Dd8w"),i=a.n(n),o=a("NYxO"),l=a("GCGT"),c=a("lbHh"),u=a.n(c),d=a("jLWv"),p=a("/5sW"),h=a("L8MQ"),m=a.n(h),f=a("z1+p"),v=a.n(f);e.a={name:"ShareListDialog",watch:{show:function(){this.contactlistName=this.contactlistFileName}},computed:i()({},Object(o.mapState)("owners/users",["exportFilter"]),{contactlistFileName:function(){var t=Object(l.a)(new Date,"yyyyMMddTHHmmss"),e=".csv";return"mailone"===this.adapter?e="":"mailup"===this.adapter&&(e=""),this.adapter+"-"+t+e}},Object(o.mapGetters)("auth",["canSave"])),methods:i()({},Object(o.mapActions)("owners/users",["prepareExportList"]),{onCancel:function(){this.$emit("cancel")},onExport:function(){"csv"===this.adapter?this.onExportCsv():"mailone"===this.adapter?this.onExportMailOne():"mailup"===this.adapter&&this.onExportMailUp()},completeExportRequest:function(){return this.exportFilter.treatments=m()(this.exportFilter.treatments).filter(function(t){return t.selected}),{adapter:this.adapter,contactlistname:this.contactlistName,contactlistemail:"",contactlistreplytoemail:"",filter:this.exportFilter}},onExportMailUp:function(){var t=this,e=this.completeExportRequest();this.prepareExportList(e).then(function(e){t.sendData&&(e.data.filters._result_=t.payLoad),t.$store.dispatch("api/post",e,{root:!0}).then(function(){}),v()(t.onCancel,10)})},onExportMailOne:function(){var t=this,e=this.completeExportRequest();this.prepareExportList(e).then(function(e){t.sendData&&(e.data.filters._result_=t.payLoad),t.$store.dispatch("api/post",e,{root:!0}).then(function(){}),v()(t.onCancel,10)})},onExportCsv:function(){var t=this,e=this.$auth.getToken(Object(d.c)()),a=e.split("bearer ");if(a.length>0){e=a[1],u.a.set("token",e);var s=this.completeExportRequest();this.prepareExportList(s).then(function(e){t.jsonParams=r()(e.data),t.sendData&&(t._result_=r()(t.payLoad)),t.$refs.exportform.$el.action=e.url,p.default.nextTick(function(){t.$refs.exportform.$el.submit(),console.log(t.jsonParams),t.onCancel()})})}else alert(this.$t("Error"))}}),mounted:function(){this.contactlistName=this.exportFileName},data:function(){return{jsonParams:null,_result_:null,contactlistName:""}},props:{sendData:{default:!1},payLoad:{default:function(){return[]}},show:{default:!1},adapter:{default:"csv"}}}},lbHh:function(t,e,a){var s,r;!function(n){if(void 0===(r="function"==typeof(s=n)?s.call(e,a,e,t):s)||(t.exports=r),!0,t.exports=n(),!!0){var i=window.Cookies,o=window.Cookies=n();o.noConflict=function(){return window.Cookies=i,o}}}(function(){function t(){for(var t=0,e={};t<arguments.length;t++){var a=arguments[t];for(var s in a)e[s]=a[s]}return e}function e(t){return t.replace(/(%[0-9A-Z]{2})+/g,decodeURIComponent)}return function a(s){function r(){}function n(e,a,n){if("undefined"!=typeof document){"number"==typeof(n=t({path:"/"},r.defaults,n)).expires&&(n.expires=new Date(1*new Date+864e5*n.expires)),n.expires=n.expires?n.expires.toUTCString():"";try{var i=JSON.stringify(a);/^[\{\[]/.test(i)&&(a=i)}catch(t){}a=s.write?s.write(a,e):encodeURIComponent(String(a)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),e=encodeURIComponent(String(e)).replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent).replace(/[\(\)]/g,escape);var o="";for(var l in n)n[l]&&(o+="; "+l,!0!==n[l]&&(o+="="+n[l].split(";")[0]));return document.cookie=e+"="+a+o}}function i(t,a){if("undefined"!=typeof document){for(var r={},n=document.cookie?document.cookie.split("; "):[],i=0;i<n.length;i++){var o=n[i].split("="),l=o.slice(1).join("=");a||'"'!==l.charAt(0)||(l=l.slice(1,-1));try{var c=e(o[0]);if(l=(s.read||s)(l,c)||e(l),a)try{l=JSON.parse(l)}catch(t){}if(r[c]=l,t===c)break}catch(t){}}return t?r[t]:r}}return r.set=n,r.get=function(t){return i(t,!1)},r.getJSON=function(t){return i(t,!0)},r.remove=function(e,a){n(e,"",t(a,{expires:-1}))},r.defaults={},r.withConverter=a,r}(function(){})})},lzjS:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{attrs:{"grid-list-md":""}},[a("v-layout",{staticClass:"user-filter",attrs:{row:"",wrap:"","align-baseline":""}},[a("v-flex",{attrs:{xs9:"",sm5:""}},[a("v-text-field",{attrs:{"append-icon":"search",box:"",color:"silver","hide-details":"",label:t.$t("Surname, Name, Email")},model:{value:t.criteria,callback:function(e){t.criteria=e},expression:"criteria"}}),a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:"",ml:""}},[a("v-select",{staticClass:"mt-2",attrs:{box:"","hide-details":"","item-text":"name","item-value":"code",label:t.$t("Domain"),items:t.selectDomainList},model:{value:t.domainFilter,callback:function(e){t.domainFilter=e},expression:"domainFilter"}})],1)],1)],1),a("v-flex",{attrs:{xs3:"",sm1:""}},[t._e()],1),a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"mt-1",attrs:{xs12:"",sm5:""}},[a("v-btn-toggle",{staticClass:"user-filter-toggle elevation-0 ",staticStyle:{position:"relative",top:"4px"},model:{value:t.search.toggleValue1,callback:function(e){t.$set(t.search,"toggleValue1",e)},expression:"search.toggleValue1"}},[a("v-btn",{staticClass:"user-filter-date-toggle",attrs:{flat:"",disabled:0==t.dateFilter},on:{click:t.setDateFilter}},[a("v-icon",{staticClass:"mr-1"},[t._v("today")]),a("span",{domProps:{textContent:t._s(t.$t("Today"))}})],1),a("v-btn",{staticClass:"user-filter-date-toggle",attrs:{flat:"",disabled:1==t.dateFilter},on:{click:t.setDateFilter}},[a("v-icon",{staticClass:"mr-1"},[t._v("calendar_today")]),a("span",{domProps:{textContent:t._s(t.$t("Yesterday"))}})],1),a("v-btn",{staticClass:"user-filter-date-toggle",attrs:{flat:"",disabled:2==t.dateFilter},on:{click:t.setDateFilter}},[a("v-icon",{staticClass:"mr-1"},[t._v("all_inclusive")]),a("span",{domProps:{textContent:t._s(t.$t("All"))}})],1)],1)],1),a("v-flex",{attrs:{xs12:""}},[a("v-select",{staticClass:"mt-2",attrs:{disabled:!t.canSave,box:"",multiple:"",chips:"","deletable-chips":"","hide-details":"","hide-selected":"","item-text":"label","item-value":"id",label:t.$t("Language"),items:t.selectLanguageList},model:{value:t.languageFilter,callback:function(e){t.languageFilter=e},expression:"languageFilter"}})],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},"p+qv":function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},phVV:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("NYxO");e.a={name:"GridSearchBar",computed:r()({},Object(n.mapState)("owners/users",["list","search","grid"]),Object(n.mapState)("api",["isAjax"]),Object(n.mapGetters)("auth",["canSave"]))}},qN7s:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"290"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("alternate_email")]),t._v("\n            "+t._s(t.$t("Share list"))+" - "+t._s(t.$t(t.adapter))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-form",{ref:"exportform",attrs:{enctype:"text/plain",target:"_blank",method:"POST"}},[a("v-text-field",{attrs:{disabled:!t.canSave,"prepend-icon":"description",label:t.$t("List name"),box:""},model:{value:t.contactlistName,callback:function(e){t.contactlistName=e},expression:"contactlistName"}}),a("input",{directives:[{name:"model",rawName:"v-model",value:t.jsonParams,expression:"jsonParams"}],attrs:{type:"hidden",name:"json"},domProps:{value:t.jsonParams},on:{input:function(e){e.target.composing||(t.jsonParams=e.target.value)}}})],1)],1)],1),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.contactlistName||!t.canSave},nativeOn:{click:function(e){return t.onExport(e)}}},[a("v-icon",[t._v("cloud_download")]),a("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Share")))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},uYHP:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{attrs:{fluid:""}},[a("ShareListDialog",{attrs:{show:t.showShareDialog,adapter:t.adapter},on:{cancel:t.hideShareDialog}}),a("v-layout",{attrs:{row:"",wrap:""}},[a("div",{staticClass:"headline"},[t._v(t._s(t.$t("Users")))]),a("v-spacer"),t.canAdd?a("v-btn",{staticClass:"elevation-0 text-upper",attrs:{dark:"",color:"indigo lighten-1",to:"/owners/users/add"}},[t._v("\n            "+t._s(t.$t("Add user"))+"\n        ")]):t._e(),t.canShare?a("v-menu",{attrs:{origin:"center center",transition:"scale-transition",bottom:""}},[a("v-btn",{staticClass:"elevation-0 text-upper",attrs:{slot:"activator",color:"indigo lighten-1",dark:""},slot:"activator"},[t._v("\n                "+t._s(t.$t("Share list"))+"\n            ")]),a("v-list",t._l(t.shareMenuItems,function(e,s){return a("v-list-tile",{key:s,on:{click:function(t){}}},[a("v-list-tile-title",{on:{click:function(a){t.onShowShareList(e.adapter)}}},[t._v("\n                        "+t._s(t.$t(e.title))+"\n                    ")])],1)}))],1):t._e()],1),a("v-layout",{staticClass:"mb-3"},[a("UserFilter")],1),a("div",{staticClass:"title mb-2"},[t._v(t._s(t.$t("Filter users according to accepted regulations")))]),a("v-layout",{staticClass:"mb-4"},[a("TreatmentsFilter")],1),a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("UsersGrid")],1)],1)],1)},staticRenderFns:[]};e.a=s},"uc+c":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[t.formFilterValidList.length>0?a("v-layout",{staticClass:"subheading mb-2"},[a("b",[t._v(t._s(t.$t("Users found"))+" "+t._s(t.formFilterValidList.length))])]):t._e(),a("v-data-table",t._b({staticClass:"elevation-1 surfers-list-table",attrs:{headers:t.headers,items:t.formFilterValidList,pagination:t.grid.pagination,loading:t.isAjax,"sort-icon":"keyboard_arrow_down","no-data-text":t.$t("No user found")+" "+t.dateFilterText},on:{"update:pagination":function(e){t.$set(t.grid,"pagination",e)}},scopedSlots:t._u([{key:"items",fn:function(e){return[a("tr",{attrs:{title:e.item.termName}},[a("td",[a("b",[t._v(t._s(e.item.email))])]),a("td",[a("span",{staticStyle:{position:"relative",top:"2px"}},[t._v(t._s(t._f("dmy")(e.item.created)))])]),a("td",[a("div",[t._v("\n                        "+t._s(e.item.domain+e.item.site)+"\n                        "),t._l(e.item._flags_,function(e){return a("div",{staticClass:"ml-3",staticStyle:{"white-space":"nowrap"}},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.selected,expression:"fl.selected"}],attrs:{disabled:!0,type:"checkbox"},domProps:{checked:Array.isArray(e.selected)?t._i(e.selected,null)>-1:e.selected},on:{change:function(a){var s=e.selected,r=a.target,n=!!r.checked;if(Array.isArray(s)){var i=t._i(s,null);r.checked?i<0&&t.$set(e,"selected",s.concat([null])):i>-1&&t.$set(e,"selected",s.slice(0,i).concat(s.slice(i+1)))}else t.$set(e,"selected",n)}}}),t._v(" "+t._s(e.code)+"\n\n                            "),e.mandatory?a("span",[t._v("*")]):t._e(),e.unsubscribe?a("span",[t._v("("+t._s(e.user)+")  ")]):t._e()])})],2)]),a("td",[t._v(" "+t._s(e.item.surname)+"  "+t._s(e.item.name))]),a("td",[t._v(" "+t._s(e.item.language)+" ")]),a("td",{staticClass:"justify-center layout px-0 pt-2"},[a("nuxt-link",{attrs:{to:"/owners/users/"+t.encodedId(e.item.email)+"?mode=edit"}},[a("v-tooltip",{attrs:{left:""}},[a("v-btn",{staticClass:"pa-0 ma-0",attrs:{slot:"activator",flat:"",small:"",icon:"",color:"blue"},slot:"activator"},[a("v-icon",[t._v("edit")])],1),a("span",[t._v(t._s(t.$t("Edit user")))])],1)],1),t._e(),t._e()],1)])]}},{key:"expand",fn:function(e){var s=e.item;return[a("v-card",{attrs:{flat:""}},[a("v-card-text",{},[t._v("Ip: "+t._s(s.ip))]),t._l(s.privacyFlags,function(e,s){return a("v-card-text",{key:s,staticClass:"py-0 my-0"},[e.selected?a("v-icon",[t._v("check_box")]):a("v-icon",[t._v("check_box_outline_blank")]),t._v("\n                    "+t._s(e.code)+" dd\n                    "),a("span",{attrs:{"dv-if":"f.mandatory"}},[t._v("(Man)")])],1)}),a("v-card-text")],2)]}},{key:"pageText",fn:function(e){var a=e.pageStart,s=e.pageStop;return[t._v("\n            "+t._s(t.$t("From"))+" "+t._s(a)+" "+t._s(t.$t("To"))+" "+t._s(s)+"\n        ")]}}])},"v-data-table",t.tableTexts,!1),[a("v-progress-linear",{attrs:{slot:"progress",color:"blue",indeterminate:""},slot:"progress"})],1)],1)},staticRenderFns:[]};e.a=s},zyW9:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("NYxO");t="owners/users";e.a={name:"UsersGrid",methods:{encodedId:function(t){return encodeURI(btoa(t))}},data:function(){var e=[{text:this.$t("Email"),value:"email"},{text:this.$t("Created"),value:"created",width:"100px"},{text:this.$t("Flags"),value:"id",sortable:!1},{text:this.$t("Surname")+" "+this.$t("Name"),value:"surname"},{text:this.$t("Language"),value:"language"},{text:this.$t("Actions"),value:"action"}];return{formDateFilter:"",tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[10,20,50,{text:this.$t("All"),value:-1}]},module:t,headers:e}},computed:r()({},Object(n.mapGetters)(t,["filterListByDate"]),Object(n.mapState)(t,["list","search","grid"]),Object(n.mapState)("api",["isAjax"]),{dateFilterText:function(){return 0===this.search.toggleValue1?this.$t("Today"):1===this.search.toggleValue1?this.$t("Yesterday"):""},formFilterValidList:function(){return this.validList},validList:function(){return this.filterListByDate.filter?this.filterListByDate.filter(function(t){return t.email&&t.email.includes("@")}):[]}})}}});