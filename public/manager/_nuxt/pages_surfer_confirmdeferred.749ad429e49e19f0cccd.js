webpackJsonp([23],{"/Aeu":function(t,e,a){"use strict";var r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"owner-user-form-terms",attrs:{column:""}},[a("v-flex",{staticClass:" lighten-5 pa-3",attrs:{xs12:""}},[a("v-layout",{attrs:{row:"",wrap:""}},[t.multiPrivacy?a("v-flex",{staticClass:"title pt-3",attrs:{xs12:"",sm6:""}},[t._v("\n                    "+t._s(t.$t("Terms"))+"\n                ")]):t._e(),t.showSmartBar?a("v-flex",{staticClass:"text-xs-right",attrs:{xs12:"",sm6:""}},[a("SmallEditSaveButtonBar",{attrs:{"hide-delete":!0,"edit-mode":t.dataEdit},on:{edit:function(e){t.dataEdit=!0},save:t.onSave,cancel:function(e){t.dataEdit=!1}}})],1):t._e()],1),a("div",{staticClass:"mb-2"},[t._v(t._s(t.$t("Subscription detail")))]),t._l(t.recordList,function(e,r,s){return[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("table",{staticClass:"owner-user-form-terms-data-table mb-3"},[t._l(e,function(e,r,s){return[0==s?[a("tr",{staticClass:"caption owner-user-form-terms-data-table-privacy-name"},[a("td",{staticClass:"pl-3 pt-2",attrs:{colspan:"3"}},[a("b",[t._v("\n                                            "+t._s(t.termName(e))+"\n                                        ")])])]),a("tr",{staticClass:"caption"},[a("th",{attrs:{width:"1%"}},[t._v(t._s(t.$t("Date")))]),a("th",{attrs:{width:"1%"}},[t._v(t._s(t.$t("Time")))]),a("th",{attrs:{width:"50%"}},[t._v(t._s(t.$t("Treatments")))]),a("th",{attrs:{width:"30%"}},[t._v(t._s(t.$t("Privacy url"))+"/IP")])])]:t._e(),e?[a("tr",{staticClass:"caption"},[e.created?a("td",[t._v(t._s(t._f("dmy")(e.created.date||e.created)))]):t._e(),e.created?a("td",[t._v(" "+t._s(t._f("time")(e.created.date||e.created)))]):t._e(),a("td",[e.privacy?a("span",[t._l(e.privacy.paragraphs,function(r){return[a("div",[a("div",[a("i",[t._v(t._s(r.title))])]),t._l(r.treatments,function(r,s){return[a("div",{staticClass:"ml-4"},[a("input",{directives:[{name:"model",rawName:"v-model",value:r.selected,expression:"t.selected"}],staticClass:"bigger-check",attrs:{type:"checkbox",disabled:t.flagDisabled(r)},domProps:{checked:Array.isArray(r.selected)?t._i(r.selected,null)>-1:r.selected},on:{click:function(a){t.addChangedTerm(e)},change:function(e){var a=r.selected,s=e.target,i=!!s.checked;if(Array.isArray(a)){var n=t._i(a,null);s.checked?n<0&&t.$set(r,"selected",a.concat([null])):n>-1&&t.$set(r,"selected",a.slice(0,n).concat(a.slice(n+1)))}else t.$set(r,"selected",i)}}}),t._v(" "+t._s(r.code)+"\n                                                            "),r.mandatory||r.restrictive?a("span",{staticClass:"ml-2"},[t._v("\n                                                                ("),r.mandatory?a("span",[t._v(t._s(t.$t("Mandatory"))+" ")]):t._e(),r.restrictive?a("span",[t._v(t._s(t.$t("Restrictive"))+" ")]):t._e(),t._v(")\n                                                            ")]):t._e()])]})],2)]})],2):t._e()]),a("td",[t._v("\n                                        "+t._s(e.page)),a("br"),t._v(t._s(e.ip)+"\n                                    ")])]),a("tr",[a("td",{staticClass:"pa-0",staticStyle:{"border-bottom":"3px solid grey"},attrs:{colspan:"4"}},[a("v-expansion-panel",{staticClass:"elevation-0"},[a("v-expansion-panel-content",[a("div",{attrs:{slot:"header"},slot:"header"},[t._v(t._s(t.$t("Other data")))]),a("v-card",[a("v-card-text",{staticClass:"grey lighten-3"},[t._l(e.form,function(e,r){return[a("div",{key:r},[a("b",[t._v(t._s(r))]),t._v(": "+t._s(e)+"\n                                                            ")])]})],2)],1)],1)],1)],1)])]:t._e()]})],2)])],1)]})],2)],1)},staticRenderFns:[]};e.a=r},"21M4":function(t,e,a){"use strict";var r=a("UbEG"),s=a("k7t3");var i=function(t){a("BCRM")},n=a("VU/8")(r.a,s.a,!1,i,null,null);e.a=n.exports},BCRM:function(t,e,a){var r=a("o9cn");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);a("rjj0")("5298a995",r,!0,{sourceMap:!1})},HrW9:function(t,e,a){"use strict";var r={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",[e("v-layout",{staticClass:"align-center",attrs:{row:"",wrap:""}},[e("UserFormTerms",{attrs:{"read-only":"true","allow-all":!1,"show-smart-bar":!1,"multi-privacy":!1}})],1),e("v-layout",{staticClass:"align-center",attrs:{row:"",wrap:""}},[e("v-icon",{staticClass:"mr-3",attrs:{large:"",color:"green"}},[this._v("check_circle")]),e("div",{staticClass:"title"},[this._v(this._s(this.$t("pref_save_success")))])],1)],1)},staticRenderFns:[]};e.a=r},NjoO:function(t,e,a){"use strict";var r=a("Zd8h");e.a={layout:"whitepage",components:{ConfirmDeferred:r.a},auth:!1,fetch:function(t){var e=t.store,a=(t.router,t.query),r=t.redirect,s=(t.app,a._k),i=a._j;return e.commit("privacy/clearError",null,{root:!0}),e.dispatch("privacy/deferredVisited",{_k:s,_j:i},{root:!0}).catch(function(){e.commit("privacy/setError",{message:"Error loading user data",type:"deferred-visit"},{root:!0}),r("/surfer/error")})}}},UbEG:function(t,e,a){"use strict";e.a={components:{},props:{hideCancel:{default:!1},hideDelete:{default:!1},editMode:Boolean,color:{default:"grey darken-1"}},methods:{onEditClick:function(){this.$emit("edit")},onDeleteClick:function(){this.$emit("delete")},onSaveClick:function(){this.$emit("save")},onCancelClick:function(){this.$emit("cancel")}}}},Vt6o:function(t,e,a){var r=a("xfJK");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);a("rjj0")("3ba4c9f0",r,!0,{sourceMap:!1})},Zd8h:function(t,e,a){"use strict";var r=a("ff79"),s=a("HrW9"),i=a("VU/8")(r.a,s.a,!1,null,null,null);e.a=i.exports},ff79:function(t,e,a){"use strict";var r=a("y9sX");e.a={components:{UserFormTerms:r.a},name:"ConfirmDeferred"}},ipnL:function(t,e,a){"use strict";var r=a("Dd8w"),s=a.n(r),i=a("NYxO"),n=a("21M4");e.a={name:"UserFormTerms",methods:s()({onSave:function(){var t=this;this.$nuxt.$loading.start(),this.saveAllTerms(this.modified).then(function(){t.$nuxt.$loading.finish(),t.dataEdit=!1}).catch(function(){return t.$nuxt.$loading.finish()})},flagDisabled:function(t){return!this.dataEdit||!!t.mandatory&&!this.allowAll},allFlags:function(t){if(!t||!t.paragraphs)return[];for(var e=[],a=0;a<t.paragraphs.length;a++)for(var r=t.paragraphs[a],s=0;s<r.treatments.length;s++){var i=r.treatments[s],n=i.code,o=i.selected,c=i.mandatory;e.push({code:n,selected:o,mandatory:c})}return e},addChangedTerm:function(t){var e=this,a=this.modified.findIndex(function(e){return t.id===e.id});this.$nextTick(function(){var r={id:t.id,privacy:t.privacy,privacyFlags:e.allFlags(t.privacy)};a<0?e.modified.push(r):e.modified[a]=r})}},Object(i.mapActions)("owners/users",["saveAllTerms"]),{termName:function(t){var e=0;return e=t.privacy&&t.privacy.termId?t.privacy.termId:t.termId,this.termsMap[e]?this.termsMap[e].name:"Informativa generica"}}),props:{allowAll:{default:!1},showSmartBar:{default:!0},multiPrivacy:{default:!0},readOnly:{default:!1}},data:function(){return{dataEdit:!1,modified:[]}},components:{SmallEditSaveButtonBar:n.a},created:function(){this.readOnly?this.dataEdit=!1:this.showSmartBar||(this.dataEdit=!0)},computed:s()({},Object(i.mapGetters)("terms",["termsMap"]),Object(i.mapState)("owners/users",["recordList"]))}},k7t3:function(t,e,a){"use strict";var r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-flex",{staticClass:"small-edit-save-button-bar pa-0 ma-0"},[t.editMode?t._e():[t.hideDelete?t._e():a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onDeleteClick},slot:"activator"},[a("v-icon",[t._v("delete")])],1),a("span",[t._v(t._s(t.$t("Delete")))])],1),a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onEditClick},slot:"activator"},[a("v-icon",[t._v("edit")])],1),a("span",[t._v(t._s(t.$t("Edit")))])],1)],t.editMode?[t.hideCancel?t._e():a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onCancelClick},slot:"activator"},[a("v-icon",[t._v("exit_to_app")])],1),a("span",[t._v(t._s(t.$t("Cancel")))])],1),a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onSaveClick},slot:"activator"},[a("v-icon",[t._v("save")])],1),a("span",[t._v(t._s(t.$t("Save")))])],1)]:t._e()],2)},staticRenderFns:[]};e.a=r},o9cn:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".small-edit-save-button-bar .btn{margin:0}",""])},oKjE:function(t,e,a){"use strict";var r={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"text-xs-center mt-2"},[e("ConfirmDeferred")],1)},staticRenderFns:[]};e.a=r},oXv0:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var r=a("NjoO"),s=a("oKjE"),i=a("VU/8")(r.a,s.a,!1,null,null,null);e.default=i.exports},xfJK:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".bigger-check{position:relative;top:3px;width:16px;height:16px}.owner-user-form-terms-data-table{padding:0;background:transparent;width:100%;border:1px solid silver;border-spacing:0;border-collapse:collapse}.owner-user-form-terms-data-table th{text-transform:uppercase}.owner-user-form-terms-data-table td,.owner-user-form-terms-data-table th{background:#fff;padding:3px 3px 3px 5px;border-spacing:0;border:1px solid silver;text-align:left;vertical-align:baseline}",""])},y9sX:function(t,e,a){"use strict";var r=a("ipnL"),s=a("/Aeu");var i=function(t){a("Vt6o")},n=a("VU/8")(r.a,s.a,!1,i,null,null);e.a=n.exports}});