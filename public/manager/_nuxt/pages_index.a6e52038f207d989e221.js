webpackJsonp([13],{"/TYz":function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("hnz5"),r=s("lnBX"),n=s("VU/8")(a.a,r.a,!1,null,null,null);e.default=n.exports},"34nP":function(t,e,s){var a=s("egPo");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("1f0fd46f",a,!0,{sourceMap:!1})},"37VV":function(t,e,s){var a=s("7nl4");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("c8af9826",a,!0,{sourceMap:!1})},"7nl4":function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".domains-and-pages .list__group--active{background:#b2ebf2!important}",""])},"8Qp0":function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"users-grid-small  pa-0"},[s("v-data-table",t._b({staticClass:"elevation-1 surfers-list-table",attrs:{"hide-actions":!1,headers:t.headers,items:t.todayList,loading:t.loading,"no-data-text":t.$t("No user found")+" "+t.dateFilterText},scopedSlots:t._u([{key:"items",fn:function(e){return[s("tr",[s("td",[s("span",[s("b",[t._v(t._s(e.item.email))])]),s("br"),t._v("\n                    "+t._s(e.item.domain+e.item.site)+"\n                ")]),s("td",{staticClass:"justify-center layout px-0 pt-2"},[s("nuxt-link",{attrs:{to:"/owners/usersdash/"+t.encodedId(e.item.email)+"?mode=edit"}},[s("v-tooltip",{attrs:{left:""}},[s("v-btn",{staticClass:"pa-0 ma-0",attrs:{slot:"activator",flat:"",small:"",icon:"",color:"blue"},slot:"activator"},[s("v-icon",[t._v("edit")])],1),s("span",[t._v(t._s(t.$t("Edit user")))])],1)],1)],1)])]}},{key:"pageText",fn:function(e){var a=e.pageStart,r=e.pageStop,n=e.itemsLength;return[s("span",[t._v("\n                "+t._s(t.$t("From"))+" "+t._s(a)+" "+t._s(t.$t("To"))+" "+t._s(r)+"\n            ")]),s("span",{staticClass:"ml-2"},[t._v("\n                "+t._s(t.$t("of"))+" "),s("b",[t._v(" "+t._s(n))])])]}}])},"v-data-table",t.tableTexts,!1),[s("v-progress-linear",{attrs:{slot:"progress",color:"blue",indeterminate:""},slot:"progress"})],1)],1)},staticRenderFns:[]};e.a=a},Ajcb:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".user-request-list-small table.table tbody td,.user-request-list-small table.table tbody th,.user-request-list-small table.table thead tr{height:32px;font-size:12px}",""])},FV3f:function(t,e,s){"use strict";var a=s("Dd8w"),r=s.n(a),n=s("W515"),i=s("wZ8q"),o=s("mhFH"),l=s("NYxO");e.a={name:"OwnerDashboard",data:function(){return{loadingUsers:!1,loadingRequests:!1}},created:function(){var t=this;this.loadOpen(),this.loadUsers(),this.loadPages(),this.$nextTick(function(){t.$nuxt.$loading.start(),setTimeout(function(){return t.$nuxt.$loading.finish()},300)})},computed:r()({},Object(l.mapState)("owners/users",["todayList"]),Object(l.mapState)("owners/termspages",["list"])),components:{UserRequestList:n.a,UsersGridSmall:i.a,DomainsAndPages:o.a},methods:r()({},Object(l.mapActions)("owners/users",["searchListToday"]),Object(l.mapActions)("owners/userrequests",["loadOpen"]),Object(l.mapActions)("owners/termspages",["load"]),Object(l.mapActions)("terms",{loadTermsForMap:"load"}),{loadUsers:function(){var t=this;return this.loadingUsers=!0,this.searchListToday().then(function(){t.loadingUsers=!1})},loadRequests:function(){var t=this;return this.loadingRequests=!0,this.loadOpen().then(function(){t.loadingRequests=!1})},loadPages:function(){var t=this,e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];(0===this.list.length||e)&&this.loadTermsForMap({}).then(function(){return t.load({})})}})}},K40v:function(t,e,s){"use strict";var a=s("zyW9"),r=s("Z2gS");var n=function(t){s("OLtf")},i=s("VU/8")(a.a,r.a,!1,n,null,null);e.a=i.exports},L2Zw:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".surfers-list-table tr{cursor:pointer}.surfers-list-table td{cursor:pointer;padding-right:0!important}.surfers-list-table td .btn{height:26px!important;width:26px}.surfers-list-table table.table tbody td,.surfers-list-table table.table tbody th,.surfers-list-table table.table thead tr{height:32px;font-size:12px}",""])},Lc1j:function(t,e,s){"use strict";var a=s("FV3f"),r=s("VpAT");var n=function(t){s("bmpO")},i=s("VU/8")(a.a,r.a,!1,n,null,null);e.a=i.exports},Mkej:function(t,e,s){"use strict";var a=s("VeEh");e.a={name:"UserRequestSmallList",mixins:[a.a],props:["loading"],computed:{openedList:function(){return this.list?this.list.filter(function(t){return"open"===t.status}):[]}},data:function(){var t=[{text:this.$t("Request date"),value:"created"},{text:this.$t("Email"),value:"mail"},{text:this.$t("Type"),value:"type"},{text:this.$t("Actions"),value:"action"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[5,10,20,{text:this.$t("All"),value:-1}]},headers:t}}}},OLtf:function(t,e,s){var a=s("L2Zw");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("39b1cb10",a,!0,{sourceMap:!1})},OzT4:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".users-grid-small table.table tbody td,.users-grid-small table.table tbody th,.users-grid-small table.table thead tr{height:42px;font-size:12px}",""])},P8vg:function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-layout",{staticClass:"domains-and-pages",attrs:{row:""}},[s("v-flex",[s("v-card",{staticStyle:{"min-height":"62px"},attrs:{color:"white"}},[s("v-list",t._l(t.pagesByDomain,function(e,a){return s("v-list-group",{key:a,attrs:{"_prepend-icon":"desktop_windows",avatar:"","no-action":""},model:{value:e.active,callback:function(s){t.$set(e,"active",s)},expression:"pages.active"}},[s("v-list-tile",{staticClass:"py-3",attrs:{slot:"activator"},slot:"activator"},[s("v-list-tile-avatar",[s("v-icon",{staticClass:"teal lighten-3 white--text"},[t._v("desktop_windows")])],1),s("v-list-tile-content",[s("v-list-tile-title",[s("b",[t._v(t._s(a))])])],1)],1),t._l(e,function(e,r){return s("v-list-tile",{key:r,staticClass:"py-2",on:{click:function(t){}}},[s("v-list-tile-content",{staticStyle:{"min-height":"20px"}},[s("v-list-tile-title",[s("v-icon",{staticClass:"mr-2"},[t._v("bookmark")]),t._v("\n                                "+t._s(a+e.page)+"\n                            ")],1),t._e()],1),s("v-list-tile-action",[s("nuxt-link",{attrs:{to:"/owners/termsdash/"+e.termUid}},[s("v-tooltip",{attrs:{left:""}},[s("v-btn",{attrs:{slot:"activator",icon:"",ripple:""},slot:"activator"},[s("v-icon",{attrs:{color:"blue lighten-1"}},[t._v("subject")])],1),s("span",[t._v(t._s(t.$t("Show associated term")))])],1)],1)],1)],1)})],2)}))],1)],1)],1)},staticRenderFns:[]};e.a=a},Prbg:function(t,e,s){var a=s("Ajcb");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("34fb6c36",a,!0,{sourceMap:!1})},SBX1:function(t,e,s){"use strict";var a=s("Dd8w"),r=s.n(a),n=s("NYxO"),i=s("K40v");e.a={name:"UsersGridSmall",extends:i.a,props:["loading"],data:function(){var t=[{text:this.$t("Email")+"/"+this.$t("Page"),value:"email"},{text:this.$t("Actions"),value:"action",sortable:!1,align:"center"}];return{formDateFilter:"",tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[7,20,50,{text:this.$t("All"),value:-1}]},module:"owners/users",headers:t}},computed:r()({},Object(n.mapState)("owners/users",["todayList"]))}},TIU9:function(t,e,s){"use strict";e.a={props:[]}},VeEh:function(t,e,s){"use strict";var a=s("Dd8w"),r=s.n(a),n=s("NYxO");e.a={methods:r()({},Object(n.mapActions)("owners/userrequests",["closeRequest","loadOpen","sendEmail"]),{onSendData:function(t){var e=this;confirm(this.$t("Do i send user data")+" "+t.mail+"?")&&this.closeRequest(t.uid).then(function(){return e.sendEmail({email:t.mail,id:t.uid})})}}),computed:r()({},Object(n.mapState)("owners/userrequests",["list","search"]),Object(n.mapState)("api",["isAjax"]))}},VpAT:function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"pa-0 owner-dashboard"},[s("v-layout",{staticClass:"mb-3",attrs:{row:"",wrap:""}},[s("v-flex",{staticClass:"pa-1",attrs:{xs12:""}},[s("v-layout",{staticClass:"mb-3",attrs:{column:""}},[s("v-toolbar",{staticClass:"elevation-1",attrs:{dark:"",dense:"",color:"deep-orange lighten-2"}},[s("v-toolbar-title",[t._v(t._s(t.$t("User Requests")))]),s("v-spacer"),s("v-tooltip",{attrs:{top:""}},[s("v-btn",{attrs:{slot:"activator",flat:"",fab:"",small:""},on:{click:t.loadRequests},slot:"activator"},[s("v-icon",{attrs:{small:""}},[t._v("replay")])],1),s("span",{domProps:{textContent:t._s(t.$t("List refresh"))}})],1)],1),s("UserRequestList",{attrs:{loading:t.loadingRequests}})],1),s("v-layout",{attrs:{column:""}},[s("v-toolbar",{staticClass:"elevation-1",attrs:{dark:"",dense:"",color:"light-blue darken-2"}},[s("v-toolbar-title",[t._v("\n                        "+t._s(t.$t("Today subscriptions"))+"\n                    ")]),s("v-spacer"),s("v-tooltip",{attrs:{top:""}},[s("v-btn",{attrs:{slot:"activator",flat:"",fab:"",small:""},on:{click:t.loadUsers},slot:"activator"},[s("v-icon",{attrs:{small:""}},[t._v("replay")])],1),s("span",{domProps:{textContent:t._s(t.$t("List refresh"))}})],1)],1),s("UsersGridSmall",{attrs:{loading:t.loadingUsers}})],1)],1),s("v-flex",{staticClass:"pa-1",attrs:{xs12:"",md6:""}},[s("v-toolbar",{staticClass:"elevation-1",attrs:{color:"teal",dark:"",dense:""}},[s("v-toolbar-title",[t._v("\n                    "+t._s(t.$t("Active domains"))+"\n                ")]),s("v-spacer"),s("v-tooltip",{attrs:{left:""}},[s("v-btn",{attrs:{slot:"activator",flat:"",fab:"",small:""},on:{click:function(e){t.loadPages(!0)}},slot:"activator"},[s("v-icon",{attrs:{small:""}},[t._v("replay")])],1),s("span",{domProps:{textContent:t._s(t.$t("List refresh"))}})],1)],1),s("DomainsAndPages")],1)],1)],1)},staticRenderFns:[]};e.a=a},W515:function(t,e,s){"use strict";var a=s("Mkej"),r=s("dKzz");var n=function(t){s("Prbg")},i=s("VU/8")(a.a,r.a,!1,n,null,null);e.a=i.exports},Z2gS:function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[t.formFilterValidList.length>0?s("v-layout",{staticClass:"subheading mb-2"},[s("b",[t._v(t._s(t.$t("Users found"))+" "+t._s(t.formFilterValidList.length))])]):t._e(),s("v-data-table",t._b({staticClass:"elevation-1 surfers-list-table",attrs:{headers:t.headers,items:t.formFilterValidList,pagination:t.grid.pagination,loading:t.isAjax,"sort-icon":"keyboard_arrow_down","no-data-text":t.$t("No user found")+" "+t.dateFilterText},on:{"update:pagination":function(e){t.$set(t.grid,"pagination",e)}},scopedSlots:t._u([{key:"items",fn:function(e){return[s("tr",{attrs:{title:e.item.termName}},[s("td",[s("b",[t._v(t._s(e.item.email))])]),s("td",[s("span",{staticStyle:{position:"relative",top:"2px"}},[t._v(t._s(t._f("dmy")(e.item.created)))])]),s("td",[s("div",[t._v("\n                        "+t._s(e.item.domain+e.item.site)+"\n                        "),t._l(e.item._flags_,function(e){return s("div",{staticClass:"ml-3",staticStyle:{"white-space":"nowrap"}},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.selected,expression:"fl.selected"}],attrs:{disabled:!0,type:"checkbox"},domProps:{checked:Array.isArray(e.selected)?t._i(e.selected,null)>-1:e.selected},on:{change:function(s){var a=e.selected,r=s.target,n=!!r.checked;if(Array.isArray(a)){var i=t._i(a,null);r.checked?i<0&&t.$set(e,"selected",a.concat([null])):i>-1&&t.$set(e,"selected",a.slice(0,i).concat(a.slice(i+1)))}else t.$set(e,"selected",n)}}}),t._v(" "+t._s(e.code)+"\n\n                            "),e.mandatory?s("span",[t._v("*")]):t._e(),e.unsubscribe?s("span",[t._v("("+t._s(e.user)+")  ")]):t._e()])})],2)]),s("td",[t._v(" "+t._s(e.item.surname)+"  "+t._s(e.item.name))]),s("td",[t._v(" "+t._s(e.item.language)+" ")]),s("td",{staticClass:"justify-center layout px-0 pt-2"},[s("nuxt-link",{attrs:{to:"/owners/users/"+t.encodedId(e.item.email)+"?mode=edit"}},[s("v-tooltip",{attrs:{left:""}},[s("v-btn",{staticClass:"pa-0 ma-0",attrs:{slot:"activator",flat:"",small:"",icon:"",color:"blue"},slot:"activator"},[s("v-icon",[t._v("edit")])],1),s("span",[t._v(t._s(t.$t("Edit user")))])],1)],1),t._e(),t._e()],1)])]}},{key:"expand",fn:function(e){var a=e.item;return[s("v-card",{attrs:{flat:""}},[s("v-card-text",{},[t._v("Ip: "+t._s(a.ip))]),t._l(a.privacyFlags,function(e,a){return s("v-card-text",{key:a,staticClass:"py-0 my-0"},[e.selected?s("v-icon",[t._v("check_box")]):s("v-icon",[t._v("check_box_outline_blank")]),t._v("\n                    "+t._s(e.code)+" dd\n                    "),s("span",{attrs:{"dv-if":"f.mandatory"}},[t._v("(Man)")])],1)}),s("v-card-text")],2)]}},{key:"pageText",fn:function(e){var s=e.pageStart,a=e.pageStop;return[t._v("\n            "+t._s(t.$t("From"))+" "+t._s(s)+" "+t._s(t.$t("To"))+" "+t._s(a)+"\n        ")]}}])},"v-data-table",t.tableTexts,!1),[s("v-progress-linear",{attrs:{slot:"progress",color:"blue",indeterminate:""},slot:"progress"})],1)],1)},staticRenderFns:[]};e.a=a},afVv:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".owner-dashboard .toolbar{border-radius:4px 4px 0 0}",""])},bmpO:function(t,e,s){var a=s("afVv");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("6d7d5381",a,!0,{sourceMap:!1})},dKzz:function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"user-request-list-small user-request-list pa-0",attrs:{row:""}},[s("v-layout",{attrs:{column:""}},[s("v-data-table",{staticClass:"elevation-1 user-request-list-small-table user-request-list-table",attrs:{headers:t.headers,items:t.openedList,loading:t.loading,"no-data-text":t.$t("No request found")},scopedSlots:t._u([{key:"items",fn:function(e){var a=e.item;return[s("td",[t._v(" "+t._s(t._f("dmy")(a.created))+"  ")]),s("td",[t._v(" "+t._s(a.mail)+"  ")]),s("td",[t._v(" "+t._s(t.$t(a.type))+"  ")]),s("td",{attrs:{nowrap:"nowrap"}},[s("v-tooltip",{attrs:{top:""}},[s("v-btn",{attrs:{slot:"activator",flat:"",icon:"",color:"blue",_click:"onSendData(item)"},slot:"activator"},[s("v-icon",[t._v("send")])],1),s("span",[t._v(t._s(t.$t("Send data to user")))])],1)],1)]}},{key:"pageText",fn:function(e){var s=e.pageStart,a=e.pageStop;return[t._v("\n                "+t._s(t.$t("From"))+" "+t._s(s)+" "+t._s(t.$t("To"))+" "+t._s(a)+"\n            ")]}}])},[s("v-progress-linear",{attrs:{slot:"progress",color:"blue",indeterminate:""},slot:"progress"}),s("v-alert",{attrs:{slot:"no-results",value:!0,color:"warning",icon:"warning"},slot:"no-results"},[t._v("\n                "+t._s(t.$t("No request found"))+"\n            ")])],1)],1)],1)},staticRenderFns:[]};e.a=a},egPo:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},gIJ8:function(t,e,s){"use strict";var a=s("TIU9"),r=s("sMMk");var n=function(t){s("34nP")},i=s("VU/8")(a.a,r.a,!1,n,null,null);e.a=i.exports},hnz5:function(t,e,s){"use strict";var a=s("Lc1j"),r=s("gIJ8"),n={root:!0};e.a={computed:{currentDashboard:function(){return"owners"===this.$auth.user.role?a.a:r.a}},components:{OwnerDashboard:a.a},fetch:function(t){var e=t.store,s=e.state.auth.user;if("owners"===s.role){var a=s.ownerId;0!==a&&(e.commit("owners/setEditMode",null,n),e.dispatch("owners/load",{id:a,force:!1},n),e.dispatch("domains/load",{force:!1},n).then(function(){return e.commit("domains/setLoaded",!0,n)}))}else"operators"===s.role&&e.dispatch("domains/loadAll",{force:!1},n);return!0}}},lnBX:function(t,e,s){"use strict";var a={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",{staticClass:"ma-0 pa-0",attrs:{"grid-list-xs":"",fluid:""}},[e("v-layout",{staticClass:"mb-2",attrs:{row:"","justify-center":"","align-center":"",wrap:""}},[e("data-one-icon",{staticStyle:{width:"310px","text-align":"center",margin:"auto","margin-top":"15px"}})],1),e("v-layout",{staticClass:"ma-0 pa-0",attrs:{row:"",wrap:""}},[e(this.currentDashboard,{tag:"component"})],1)],1)},staticRenderFns:[]};e.a=a},mhFH:function(t,e,s){"use strict";var a=s("w+mO"),r=s("P8vg");var n=function(t){s("37VV")},i=s("VU/8")(a.a,r.a,!1,n,null,null);e.a=i.exports},sMMk:function(t,e,s){"use strict";var a={render:function(){var t=this.$createElement;return(this._self._c||t)("v-container")},staticRenderFns:[]};e.a=a},"w+mO":function(t,e,s){"use strict";var a=s("Dd8w"),r=s.n(a),n=s("NYxO");e.a={name:"DomainsAndPages",computed:r()({},Object(n.mapGetters)("owners/termspages",["pagesByDomain"]),Object(n.mapGetters)("terms",["termsMap"]))}},wZ8q:function(t,e,s){"use strict";var a=s("SBX1"),r=s("8Qp0");var n=function(t){s("ypDF")},i=s("VU/8")(a.a,r.a,!1,n,null,null);e.a=i.exports},ypDF:function(t,e,s){var a=s("OzT4");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("5540aae8",a,!0,{sourceMap:!1})},zyW9:function(t,e,s){"use strict";var a=s("Dd8w"),r=s.n(a),n=s("NYxO");t="owners/users";e.a={name:"UsersGrid",methods:{encodedId:function(t){return encodeURI(btoa(t))}},data:function(){var e=[{text:this.$t("Email"),value:"email"},{text:this.$t("Created"),value:"created",width:"100px"},{text:this.$t("Flags"),value:"id",sortable:!1},{text:this.$t("Surname")+" "+this.$t("Name"),value:"surname"},{text:this.$t("Language"),value:"language"},{text:this.$t("Actions"),value:"action"}];return{formDateFilter:"",tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[10,20,50,{text:this.$t("All"),value:-1}]},module:t,headers:e}},computed:r()({},Object(n.mapGetters)(t,["filterListByDate"]),Object(n.mapState)(t,["list","search","grid"]),Object(n.mapState)("api",["isAjax"]),{dateFilterText:function(){return 0===this.search.toggleValue1?this.$t("Today"):1===this.search.toggleValue1?this.$t("Yesterday"):""},formFilterValidList:function(){return this.validList},validList:function(){return this.filterListByDate.filter?this.filterListByDate.filter(function(t){return t.email&&t.email.includes("@")}):[]}})}}});