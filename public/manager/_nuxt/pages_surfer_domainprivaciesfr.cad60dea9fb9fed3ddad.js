webpackJsonp([11],{"0z4b":function(t,e,a){"use strict";var s=a("981S"),r=a("KceB"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=n.exports},"21M4":function(t,e,a){"use strict";var s=a("UbEG"),r=a("k7t3");var n=function(t){a("BCRM")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},"2BmN":function(t,e,a){"use strict";e.a={name:"SubscriptionFixedForm"}},"6LEm":function(t,e,a){"use strict";var s=a("XLdm"),r=a("f1oe"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=n.exports},"7pg/":function(t,e,a){"use strict";var s=a("2BmN"),r=a("RZ8+");var n=function(t){a("ZAly")},i=a("VU/8")(s.a,r.a,!1,n,"data-v-e33b2ffc",null);e.a=i.exports},"981S":function(t,e,a){"use strict";e.a={components:{},props:[]}},AwqC:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".subscription-title{border-bottom:4px solid #e1e1e1}.subscription-title-revoke-all{background:#2e879d!important;font-size:11px;position:relative;top:-6px}",""])},BCRM:function(t,e,a){var s=a("o9cn");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("5298a995",s,!0,{sourceMap:!1})},F8Oc:function(t,e,a){"use strict";var s=a("b+Qv"),r=a("yR21");var n=function(t){a("XERY")},i=a("VU/8")(s.a,r.a,!1,n,"data-v-33334a88",null);e.a=i.exports},KceB:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("div",[this._v("\neditor\n    ")])},staticRenderFns:[]};e.a=s},M9La:function(t,e,a){"use strict";var s=a("o8fq"),r=a("eyq5"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=n.exports},"RZ8+":function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("div",[this._v("\n    fform\n")])},staticRenderFns:[]};e.a=s},Sz7z:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"owner-user-form-terms",attrs:{column:""}},[a("v-flex",{staticClass:" lighten-5 pa-3",attrs:{xs12:""}},[a("v-layout",{attrs:{row:"",wrap:""}},[t.multiPrivacy?a("v-flex",{staticClass:"title pt-3",attrs:{xs12:"",sm6:""}},[t._v("\n                    "+t._s(t.$t("Terms"))+"\n                ")]):t._e(),t.showSmartBar?a("v-flex",{staticClass:"text-xs-right",attrs:{xs12:"",sm6:""}},[a("SmallEditSaveButtonBar",{attrs:{"hide-delete":!0,"edit-mode":t.dataEdit},on:{edit:function(e){t.dataEdit=!0},save:t.onSave,cancel:function(e){t.dataEdit=!1}}})],1):t._e()],1),a("div",{staticClass:"mb-2"},[t._v(t._s(t.$t("Subscription detail")))]),t._l(t.recordList,function(e,s,r){return[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("table",{staticClass:"owner-user-form-terms-data-table mb-3"},[t._l(e,function(e,s,r){return[0==r?[a("tr",{staticClass:"caption owner-user-form-terms-data-table-privacy-name"},[a("td",{staticClass:"pl-3 pt-2",attrs:{colspan:"3"}},[a("b",[t._v("\n                                            "+t._s(t.termName(e))+"\n                                        ")])])]),a("tr",{staticClass:"caption"},[a("th",{attrs:{width:"1%"}},[t._v(t._s(t.$t("Date")))]),a("th",{attrs:{width:"1%"}},[t._v(t._s(t.$t("Time")))]),a("th",{attrs:{width:"50%"}},[t._v(t._s(t.$t("Treatments")))]),a("th",{attrs:{width:"30%"}},[t._v(t._s(t.$t("Privacy url"))+"/IP")])])]:t._e(),e?[a("tr",{staticClass:"caption"},[e.created?a("td",[t._v(t._s(t._f("dmy")(e.created.date||e.created)))]):t._e(),e.created?a("td",[t._v(" "+t._s(t._f("time")(e.created.date||e.created)))]):t._e(),a("td",[t._l(e.privacy.paragraphs,function(s){return[a("div",[a("div",[a("i",[t._v(t._s(s.title))])]),t._l(s.treatments,function(s,r){return[a("div",{staticClass:"ml-4"},[a("input",{directives:[{name:"model",rawName:"v-model",value:s.selected,expression:"t.selected"}],staticClass:"bigger-check",attrs:{type:"checkbox",disabled:t.flagDisabled(s)},domProps:{checked:Array.isArray(s.selected)?t._i(s.selected,null)>-1:s.selected},on:{click:function(a){t.addChangedTerm(e)},change:function(e){var a=s.selected,r=e.target,n=!!r.checked;if(Array.isArray(a)){var i=t._i(a,null);r.checked?i<0&&t.$set(s,"selected",a.concat([null])):i>-1&&t.$set(s,"selected",a.slice(0,i).concat(a.slice(i+1)))}else t.$set(s,"selected",n)}}}),t._v(" "+t._s(s.code)+"\n                                                        "),s.mandatory||s.restrictive?a("span",{staticClass:"ml-2"},[t._v("\n                                                            ("),s.mandatory?a("span",[t._v(t._s(t.$t("Mandatory"))+" ")]):t._e(),s.restrictive?a("span",[t._v(t._s(t.$t("Restrictive"))+" ")]):t._e(),t._v(")\n                                                        ")]):t._e()])]})],2)]})],2),a("td",[t._v("\n                                        "+t._s(e.page)),a("br"),t._v(t._s(e.ip)+"\n                                    ")])])]:t._e()]})],2)])],1)]})],2)],1)},staticRenderFns:[]};e.a=s},TcwD:function(t,e,a){var s=a("AwqC");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("79c9336a",s,!0,{sourceMap:!1})},UbEG:function(t,e,a){"use strict";e.a={components:{},props:{hideCancel:{default:!1},hideDelete:{default:!1},editMode:Boolean,color:{default:"grey darken-1"}},methods:{onEditClick:function(){this.$emit("edit")},onDeleteClick:function(){this.$emit("delete")},onSaveClick:function(){this.$emit("save")},onCancelClick:function(){this.$emit("cancel")}}}},WDKH:function(t,e,a){var s=a("irBj");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("18d7816e",s,!0,{sourceMap:!1})},XERY:function(t,e,a){var s=a("ft4A");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("7b233354",s,!0,{sourceMap:!1})},XLdm:function(t,e,a){"use strict";e.a={components:{},props:[]}},Yy9M:function(t,e,a){"use strict";var s=a("F8Oc");e.a={components:{Subscription:s.a},layout:"whitepage",auth:!1,fetch:function(t){var e=t.store,a=t.query;if(a.email&&a.ownerId&&a.languange&&a.domain){var s=a.email,r=a.ownerId,n=a.languange,i=a.domain;return e.dispatch("privacy/loadByEmailOwnerDomainFr",{email:s,ownerId:r,languange:n,domain:i},{root:!0}).then(function(){}).catch(function(){})}}}},ZAly:function(t,e,a){var s=a("ofvO");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("0076580b",s,!0,{sourceMap:!1})},"b+Qv":function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("y9sX"),i=a("uVDJ"),o=a("6LEm"),c=a("7pg/"),l=a("M9La"),u=a("0z4b"),d=a("lHK6"),p=a.n(d),v=a("NYxO");e.a={name:"Subscription",methods:r()({},Object(v.mapActions)("owners/users",["unsubscribeAll","unsubscribeNewsletters"]),{onUnsubNewsletters:function(){var t=this;confirm(this.$t("Do you confirm?"))&&this.unsubscribeNewsletters().then(function(){t.$router.replace("/surfer/unnewslettersdone")})},onUnsubscribeAll:function(){var t=this;confirm(this.$t("Do you confirm?"))&&this.unsubscribeAll().then(function(){t.$router.replace("/surfer/unallrequestsent")})}}),computed:r()({},Object(v.mapState)("api",["hasError"]),Object(v.mapState)("owners/users",["recordList"]),Object(v.mapGetters)("owners/users",{$record:"getLastSubscription",hasNewsLetters:"hasNewsLettersTermsDomainObject"}),{hasPrivacies:function(){return!p()(this.recordList)}}),components:{SubscriptionTitle:i.a,SubscriptionDynaForm:o.a,SubscriptionFixedForm:c.a,SubscriptionRecap:l.a,SubscriptionTermEditor:u.a,UserFormTerms:n.a}}},eyq5:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-layout",[e("v-flex",[this._v("\n        "+this._s(this.rec)+"\n    ")])],1)},staticRenderFns:[]};e.a=s},f1oe:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("div",[this._v("\ndform\n    ")])},staticRenderFns:[]};e.a=s},ft4A:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},h984:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"pa-0 subscription-title",attrs:{dark:"",fluid:"","grid-list-sm":""}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"headline pt-0 mb-2"},[a("b",[t._v(t._s(t.name)+" "+t._s(t.surname)+": "+t._s(t.$t("Here are your subscriptions to the regulations of the site"))+" "+t._s(t.domain))])])],1),a("v-layout",{attrs:{"mt-0":"",row:"",wrap:""}},[a("v-flex",{staticClass:" pt-2",attrs:{sm10:""}},[t._v("\n            "+t._s(t.$t("If you wish you can modify them"))+"\n        ")]),a("v-flex",{staticClass:"text-xs-right",attrs:{sm2:""}},[a("v-btn",{staticClass:"subscription-title-revoke-all elevation-0 text-upper",attrs:{dark:"",small:""},on:{click:function(e){t.$emit("unsubscribe-all")}}},[t._v(t._s(t.$t("revoke all"))+"\n            ")])],1)],1)],1)},staticRenderFns:[]};e.a=s},ipnL:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("NYxO"),i=a("21M4");e.a={name:"UserFormTerms",methods:r()({onSave:function(){var t=this;this.$nuxt.$loading.start(),this.saveAllTerms(this.modified).then(function(){t.$nuxt.$loading.finish(),t.dataEdit=!1}).catch(function(){return t.$nuxt.$loading.finish()})},flagDisabled:function(t){return!this.dataEdit||!!t.mandatory&&!this.allowAll},allFlags:function(t){for(var e=[],a=0;a<t.paragraphs.length;a++)for(var s=t.paragraphs[a],r=0;r<s.treatments.length;r++){var n=s.treatments[r],i=n.code,o=n.selected,c=n.mandatory;e.push({code:i,selected:o,mandatory:c})}return e},addChangedTerm:function(t){var e=this,a=this.modified.findIndex(function(e){return t.id===e.id});this.$nextTick(function(){var s={id:t.id,privacy:t.privacy,privacyFlags:e.allFlags(t.privacy)};a<0?e.modified.push(s):e.modified[a]=s})}},Object(n.mapActions)("owners/users",["saveAllTerms"]),{termName:function(t){var e=0;return e=t.privacy&&t.privacy.termId?t.privacy.termId:t.termId,this.termsMap[e]?this.termsMap[e].name:"Informativa generica"}}),props:{allowAll:{default:!1},showSmartBar:{default:!0},multiPrivacy:{default:!0},readOnly:{default:!1}},data:function(){return{dataEdit:!1,modified:[]}},components:{SmallEditSaveButtonBar:i.a},created:function(){this.readOnly?this.dataEdit=!1:this.showSmartBar||(this.dataEdit=!0)},computed:r()({},Object(n.mapGetters)("terms",["termsMap"]),Object(n.mapState)("owners/users",["recordList"]))}},irBj:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".bigger-check{position:relative;top:3px;width:16px;height:16px}.owner-user-form-terms-data-table{padding:0;background:transparent;width:100%;border:1px solid silver;border-spacing:0;border-collapse:collapse}.owner-user-form-terms-data-table th{text-transform:uppercase}.owner-user-form-terms-data-table td,.owner-user-form-terms-data-table th{background:#fff;padding:3px 3px 3px 5px;border-spacing:0;border:1px solid silver;text-align:left;vertical-align:baseline}",""])},jVod:function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("subscription",{attrs:{"read-only":!0}})},staticRenderFns:[]};e.a=s},k7t3:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-flex",{staticClass:"small-edit-save-button-bar pa-0 ma-0"},[t.editMode?t._e():[t.hideDelete?t._e():a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onDeleteClick},slot:"activator"},[a("v-icon",[t._v("delete")])],1),a("span",[t._v(t._s(t.$t("Delete")))])],1),a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onEditClick},slot:"activator"},[a("v-icon",[t._v("edit")])],1),a("span",[t._v(t._s(t.$t("Edit")))])],1)],t.editMode?[t.hideCancel?t._e():a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onCancelClick},slot:"activator"},[a("v-icon",[t._v("exit_to_app")])],1),a("span",[t._v(t._s(t.$t("Cancel")))])],1),a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onSaveClick},slot:"activator"},[a("v-icon",[t._v("save")])],1),a("span",[t._v(t._s(t.$t("Save")))])],1)]:t._e()],2)},staticRenderFns:[]};e.a=s},o8fq:function(t,e,a){"use strict";e.a={components:{},props:["rec"]}},o9cn:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".small-edit-save-button-bar .btn{margin:0}",""])},ofvO:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},rjkw:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("Yy9M"),r=a("jVod"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.default=n.exports},uV2p:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("NYxO");e.a={computed:r()({},Object(n.mapState)("privacy",["$record"])),props:{name:{default:""},surname:{default:""},domain:{default:""}}}},uVDJ:function(t,e,a){"use strict";var s=a("uV2p"),r=a("h984");var n=function(t){a("TcwD")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},y9sX:function(t,e,a){"use strict";var s=a("ipnL"),r=a("Sz7z");var n=function(t){a("WDKH")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},yR21:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{attrs:{color:"white"}},[t.hasError?a("v-card",{staticClass:"pa-3",attrs:{flat:"",color:"white"}},[a("v-layout",[a("v-flex",{staticClass:"title"},[t._v(t._s(t.$t("Invalid request"))+"!!!")])],1)],1):t._e(),t.hasError?t._e():a("v-card",{staticClass:"pa-3",attrs:{flat:"",color:"white"}},[a("subscription-title",{attrs:{name:t.$record.name,surname:t.$record.surname,domain:t.$record.domain},on:{"unsubscribe-all":t.onUnsubscribeAll}}),a("UserFormTerms",t._b({attrs:{"allow-all":!1,"show-smart-bar":!1}},"UserFormTerms",t.$attrs,!1)),a("v-card-actions",{staticClass:"text-xs-center"},[t.hasNewsLetters?a("v-btn",{staticClass:"text-upper elevation-0",attrs:{color:"info",small:""},on:{click:t.onUnsubNewsletters}},[t._v("\n                "+t._s(t.$t("unsubscribe newsletters"))+"\n            ")]):t._e()],1)],1)],1)},staticRenderFns:[]};e.a=s}});