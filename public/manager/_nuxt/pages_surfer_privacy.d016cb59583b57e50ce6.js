webpackJsonp([10],{"0z4b":function(t,e,a){"use strict";var r=a("981S"),s=a("KceB"),n=a("VU/8")(r.a,s.a,!1,null,null,null);e.a=n.exports},"21M4":function(t,e,a){"use strict";var r=a("UbEG"),s=a("k7t3");var n=function(t){a("BCRM")},i=a("VU/8")(r.a,s.a,!1,n,null,null);e.a=i.exports},"2BmN":function(t,e,a){"use strict";e.a={name:"SubscriptionFixedForm"}},"6LEm":function(t,e,a){"use strict";var r=a("XLdm"),s=a("f1oe"),n=a("VU/8")(r.a,s.a,!1,null,null,null);e.a=n.exports},"6gms":function(t,e,a){"use strict";var r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"owner-user-form-terms",attrs:{column:""}},[a("v-flex",{staticClass:" lighten-5 pa-3",attrs:{xs12:""}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"title pt-3",attrs:{xs12:"",sm6:""}},[t._v("\n                    "+t._s(t.$t("Terms"))+"\n                ")]),t.showSmartBar?a("v-flex",{staticClass:"text-xs-right",attrs:{xs12:"",sm6:""}},[a("SmallEditSaveButtonBar",{attrs:{"hide-delete":!0,"edit-mode":t.dataEdit},on:{edit:function(e){t.dataEdit=!0},save:t.onSave,cancel:function(e){t.dataEdit=!1}}})],1):t._e()],1),a("div",{staticClass:"mb-2"},[t._v(t._s(t.$t("Subscription detail")))]),t._l(t.recordList,function(e,r,s){return[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("table",{staticClass:"owner-user-form-terms-data-table mb-3"},[t._l(e,function(e,r,s){return[0==s?[a("tr",{staticClass:"caption owner-user-form-terms-data-table-privacy-name"},[a("td",{staticClass:"pl-3 pt-2",attrs:{colspan:"3"}},[a("b",[t._v("\n                                            "+t._s(t.termName(e))+"\n                                        ")])])]),a("tr",{staticClass:"caption"},[a("th",{attrs:{width:"1%"}},[t._v(t._s(t.$t("Date")))]),a("th",{attrs:{width:"1%"}},[t._v(t._s(t.$t("Time")))]),a("th",{attrs:{width:"50%"}},[t._v(t._s(t.$t("Treatments")))]),a("th",{attrs:{width:"30%"}},[t._v(t._s(t.$t("Privacy url"))+"/IP")])])]:t._e(),e?[a("tr",{staticClass:"caption"},[e.created?a("td",[t._v(t._s(t._f("dmy")(e.created.date||e.created)))]):t._e(),e.created?a("td",[t._v(" "+t._s(t._f("time")(e.created.date||e.created)))]):t._e(),a("td",[t._l(e.privacy.paragraphs,function(r){return[a("div",[a("div",[a("i",[t._v(t._s(r.title))])]),t._l(r.treatments,function(r,s){return[a("div",{staticClass:"ml-4"},[a("input",{directives:[{name:"model",rawName:"v-model",value:r.selected,expression:"t.selected"}],attrs:{type:"checkbox",disabled:t.flagDisabled(r)},domProps:{checked:Array.isArray(r.selected)?t._i(r.selected,null)>-1:r.selected},on:{click:function(a){t.addChangedTerm(e)},change:function(e){var a=r.selected,s=e.target,n=!!s.checked;if(Array.isArray(a)){var i=t._i(a,null);s.checked?i<0&&t.$set(r,"selected",a.concat([null])):i>-1&&t.$set(r,"selected",a.slice(0,i).concat(a.slice(i+1)))}else t.$set(r,"selected",n)}}}),t._v(" "+t._s(r.code)+"\n                                                        "),r.mandatory||r.restrictive?a("span",{staticClass:"ml-2"},[t._v("\n                                                            ("),r.mandatory?a("span",[t._v(t._s(t.$t("Mandatory"))+" ")]):t._e(),r.restrictive?a("span",[t._v(t._s(t.$t("Restrictive"))+" ")]):t._e(),t._v(")\n                                                        ")]):t._e()])]})],2)]})],2),a("td",[t._v("\n                                        "+t._s(e.page)),a("br"),t._v(t._s(e.ip)+"\n                                    ")])])]:t._e()]})],2)])],1)]})],2)],1)},staticRenderFns:[]};e.a=r},"7pg/":function(t,e,a){"use strict";var r=a("2BmN"),s=a("RZ8+");var n=function(t){a("ZAly")},i=a("VU/8")(r.a,s.a,!1,n,"data-v-e33b2ffc",null);e.a=i.exports},"9/Lz":function(t,e,a){"use strict";var r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{attrs:{color:"white"}},[t.hasError?a("v-card",{staticClass:"pa-3",attrs:{flat:"",color:"white"}},[a("v-layout",[a("v-flex",{staticClass:"title"},[t._v("Invalid request!!!")])],1)],1):t._e(),t.hasError?t._e():a("v-card",{staticClass:"pa-3",attrs:{flat:"",color:"white"}},[a("subscription-title",{attrs:{name:t.$record.name,surname:t.$record.surname,domain:t.$record.domain}}),a("UserFormTerms",{attrs:{"allow-all":!1,"show-smart-bar":!1}})],1)],1)},staticRenderFns:[]};e.a=r},"981S":function(t,e,a){"use strict";e.a={components:{},props:[]}},BCRM:function(t,e,a){var r=a("o9cn");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);a("rjj0")("5298a995",r,!0,{sourceMap:!1})},F8Oc:function(t,e,a){"use strict";var r=a("b+Qv"),s=a("9/Lz");var n=function(t){a("U0Wv")},i=a("VU/8")(r.a,s.a,!1,n,"data-v-16e01cf0",null);e.a=i.exports},GYFM:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},KB5j:function(t,e,a){var r=a("jDdJ");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);a("rjj0")("e85350fc",r,!0,{sourceMap:!1})},KceB:function(t,e,a){"use strict";var r={render:function(){var t=this.$createElement;return(this._self._c||t)("div",[this._v("\neditor\n    ")])},staticRenderFns:[]};e.a=r},M9La:function(t,e,a){"use strict";var r=a("o8fq"),s=a("eyq5"),n=a("VU/8")(r.a,s.a,!1,null,null,null);e.a=n.exports},P2NT:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".owner-user-form-terms-data-table{padding:0;background:transparent;width:100%;border:1px solid silver;border-spacing:0;border-collapse:collapse}.owner-user-form-terms-data-table th{text-transform:uppercase}.owner-user-form-terms-data-table td,.owner-user-form-terms-data-table th{background:#fff;padding:3px 3px 3px 5px;border-spacing:0;border:1px solid silver;text-align:left;vertical-align:baseline}",""])},"RZ8+":function(t,e,a){"use strict";var r={render:function(){var t=this.$createElement;return(this._self._c||t)("div",[this._v("\n    fform\n")])},staticRenderFns:[]};e.a=r},U0Wv:function(t,e,a){var r=a("GYFM");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);a("rjj0")("60be1116",r,!0,{sourceMap:!1})},UbEG:function(t,e,a){"use strict";e.a={components:{},props:{hideCancel:{default:!1},hideDelete:{default:!1},editMode:Boolean,color:{default:"grey darken-1"}},methods:{onEditClick:function(){this.$emit("edit")},onDeleteClick:function(){this.$emit("delete")},onSaveClick:function(){this.$emit("save")},onCancelClick:function(){this.$emit("cancel")}}}},XLdm:function(t,e,a){"use strict";e.a={components:{},props:[]}},"Y+AE":function(t,e,a){"use strict";var r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"pa-0 subscription-title",attrs:{dark:"",fluid:"","grid-list-sm":""}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"headline pt-0 mb-2"},[a("b",[t._v(t._s(t.name)+" "+t._s(t.surname)+": "+t._s(t.$t("Here are your subscriptions to the regulations of the site"))+" "+t._s(t.domain))])])],1),a("v-layout",{attrs:{"mt-0":"",row:"",wrap:""}},[a("v-flex",{staticClass:" pt-2",attrs:{sm10:""}},[t._v("\n            "+t._s(t.$t("If you wish you can modify them"))+"\n        ")]),a("v-flex",{staticClass:"text-xs-right",attrs:{sm2:""}},[a("v-btn",{staticClass:"subscription-title-revoke-all elevation-0 text-upper",attrs:{dark:"",small:""}},[t._v(t._s(t.$t("revoke all")))])],1)],1)],1)},staticRenderFns:[]};e.a=r},ZAly:function(t,e,a){var r=a("ofvO");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);a("rjj0")("0076580b",r,!0,{sourceMap:!1})},Zths:function(t,e,a){var r=a("P2NT");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);a("rjj0")("89b11f2a",r,!0,{sourceMap:!1})},"b+Qv":function(t,e,a){"use strict";var r=a("Dd8w"),s=a.n(r),n=a("y9sX"),i=a("uVDJ"),o=a("6LEm"),c=a("7pg/"),l=a("M9La"),u=a("0z4b"),d=a("NYxO");e.a={name:"Subscription",computed:s()({},Object(d.mapState)("api",["hasError"]),Object(d.mapState)("owners/users",["recordList"]),Object(d.mapGetters)("owners/users",{$record:"getLastSubscription"})),components:{SubscriptionTitle:i.a,SubscriptionDynaForm:o.a,SubscriptionFixedForm:c.a,SubscriptionRecap:l.a,SubscriptionTermEditor:u.a,UserFormTerms:n.a}}},d02f:function(t,e,a){"use strict";var r={render:function(){var t=this.$createElement;return(this._self._c||t)("subscription")},staticRenderFns:[]};e.a=r},eLrQ:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var r=a("q9sE"),s=a("d02f"),n=a("VU/8")(r.a,s.a,!1,null,null,null);e.default=n.exports},eyq5:function(t,e,a){"use strict";var r={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-layout",[e("v-flex",[this._v("\n        "+this._s(this.rec)+"\n    ")])],1)},staticRenderFns:[]};e.a=r},f1oe:function(t,e,a){"use strict";var r={render:function(){var t=this.$createElement;return(this._self._c||t)("div",[this._v("\ndform\n    ")])},staticRenderFns:[]};e.a=r},ipnL:function(t,e,a){"use strict";var r=a("Dd8w"),s=a.n(r),n=a("NYxO"),i=a("21M4");e.a={name:"UserFormTerms",methods:s()({onSave:function(){var t=this;this.$nuxt.$loading.start(),this.saveAllTerms(this.modified).then(function(){t.$nuxt.$loading.finish(),t.dataEdit=!1}).catch(function(){return t.$nuxt.$loading.finish()})},flagDisabled:function(t){return!this.dataEdit||!!t.mandatory&&!this.allowAll},allFlags:function(t){for(var e=[],a=0;a<t.paragraphs.length;a++)for(var r=t.paragraphs[a],s=0;s<r.treatments.length;s++){var n=r.treatments[s],i=n.code,o=n.selected,c=n.mandatory;e.push({code:i,selected:o,mandatory:c})}return e},addChangedTerm:function(t){var e=this,a=this.modified.findIndex(function(e){return t.id===e.id});this.$nextTick(function(){var r={id:t.id,privacy:t.privacy,privacyFlags:e.allFlags(t.privacy)};a<0?e.modified.push(r):e.modified[a]=r})}},Object(n.mapActions)("owners/users",["saveAllTerms"]),{termName:function(t){var e=0;return e=t.privacy&&t.privacy.termId?t.privacy.termId:t.termId,this.termsMap[e]?this.termsMap[e].name:"Informativa generica"}}),props:{allowAll:{default:!1},showSmartBar:{default:!0}},data:function(){return{dataEdit:!1,modified:[]}},components:{SmallEditSaveButtonBar:i.a},created:function(){this.showSmartBar||(this.dataEdit=!0)},computed:s()({},Object(n.mapGetters)("terms",["termsMap"]),Object(n.mapState)("owners/users",["recordList"]))}},jDdJ:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".subscription-title{border-bottom:4px solid #e1e1e1}.subscription-title-revoke-all{background:#2e879d!important;font-size:11px;position:relative;top:-6px}",""])},k7t3:function(t,e,a){"use strict";var r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-flex",{staticClass:"small-edit-save-button-bar pa-0 ma-0"},[t.editMode?t._e():[t.hideDelete?t._e():a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onDeleteClick},slot:"activator"},[a("v-icon",[t._v("delete")])],1),a("span",[t._v(t._s(t.$t("Delete")))])],1),a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onEditClick},slot:"activator"},[a("v-icon",[t._v("edit")])],1),a("span",[t._v(t._s(t.$t("Edit")))])],1)],t.editMode?[t.hideCancel?t._e():a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onCancelClick},slot:"activator"},[a("v-icon",[t._v("exit_to_app")])],1),a("span",[t._v(t._s(t.$t("Cancel")))])],1),a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onSaveClick},slot:"activator"},[a("v-icon",[t._v("save")])],1),a("span",[t._v(t._s(t.$t("Save")))])],1)]:t._e()],2)},staticRenderFns:[]};e.a=r},o8fq:function(t,e,a){"use strict";e.a={components:{},props:["rec"]}},o9cn:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".small-edit-save-button-bar .btn{margin:0}",""])},ofvO:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},q9sE:function(t,e,a){"use strict";var r=a("F8Oc");e.a={components:{Subscription:r.a},layout:"whitepage",auth:!1,fetch:function(t){var e=t.store,a=t.query;if(a._k)return e.dispatch("privacy/load",{id:a._k},{root:!0}).then(function(){}).catch(function(){})}}},uV2p:function(t,e,a){"use strict";var r=a("Dd8w"),s=a.n(r),n=a("NYxO");e.a={computed:s()({},Object(n.mapState)("privacy",["$record"])),props:{name:{default:""},surname:{default:""},domain:{default:""}}}},uVDJ:function(t,e,a){"use strict";var r=a("uV2p"),s=a("Y+AE");var n=function(t){a("KB5j")},i=a("VU/8")(r.a,s.a,!1,n,null,null);e.a=i.exports},y9sX:function(t,e,a){"use strict";var r=a("ipnL"),s=a("6gms");var n=function(t){a("Zths")},i=a("VU/8")(r.a,s.a,!1,n,null,null);e.a=i.exports}});