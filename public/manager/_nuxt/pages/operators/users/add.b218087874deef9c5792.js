webpackJsonp([8],{"2dRr":function(e,t,r){"use strict";var s=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[r("v-btn",{staticClass:"mx-0",attrs:{flat:"",small:"",to:e.to,"active-class":""}},[r("v-icon",[e._v("reply")]),e._v("\n            "+e._s(e.$t("Back"))+"\n        ")],1)],1),r("v-spacer"),r("v-btn",{staticClass:"elevation-0 mb-2",attrs:{color:e.color,dark:"",round:"",disabled:e.isDisabled},on:{click:e.onSave}},[e._v(e._s(e.$t(e.caption)))])],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};t.a=a},"7zMh":function(e,t,r){var s=r("PePI");"string"==typeof s&&(s=[[e.i,s,""]]),s.locals&&(e.exports=s.locals);r("rjj0")("3fe9f258",s,!1,{sourceMap:!1})},FdKJ:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=r("bybP"),a=r("Ma9Z"),o=!1;var n=function(e){o||r("Xx8p")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="pages/operators/users/add.vue",t.default=i.exports},GIhl:function(e,t,r){"use strict";var s=function(){var e=this.$createElement,t=this._self._c||e;return t("v-flex",{attrs:{container:"","pa-0":""}},[t("form-bar",{attrs:{disabled:!this.form.valid,to:"/operators/users",color:"yellow",caption:"Save User"},on:{"on-save":this.onSave}}),t("v-card",[t("users-form")],1)],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};t.a=a},IpL2:function(e,t,r){var s=r("J85V");"string"==typeof s&&(s=[[e.i,s,""]]),s.locals&&(e.exports=s.locals);r("rjj0")("fc23437c",s,!1,{sourceMap:!1})},J85V:function(e,t,r){(e.exports=r("FZ+f")(!1)).push([e.i,"",""])},JKtM:function(e,t,r){"use strict";var s=r("v0SZ"),a=r("VR9u"),o=!1;var n=function(e){o||r("7zMh")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components/Operators/Users/UsersForm.vue",t.a=i.exports},L9dE:function(e,t,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");t.a={name:"FormBar",props:["to","color","disabled","caption"],computed:a()({},Object(o.mapState)("api",["isAjax"]),{isDisabled:function(){return!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},Ma9Z:function(e,t,r){"use strict";var s=function(){var e=this.$createElement;return(this._self._c||e)("users-managements")};s._withStripped=!0;var a={render:s,staticRenderFns:[]};t.a=a},PePI:function(e,t,r){(e.exports=r("FZ+f")(!1)).push([e.i,"",""])},VR9u:function(e,t,r){"use strict";var s=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-container",{staticClass:"users-form"},[r("v-layout",{staticClass:"title",attrs:{row:""}},[e._v(e._s(e.$t("Users Data")))]),r("v-form",{ref:"form",model:{value:e.form.valid,callback:function(t){e.$set(e.form,"valid",t)},expression:"form.valid"}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:e.$t("User"),rules:e.rules.user,required:""},model:{value:e.$record.user,callback:function(t){e.$set(e.$record,"user",t)},expression:"$record.user"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:e.$t("Name"),rules:e.rules.name,required:""},model:{value:e.$record.name,callback:function(t){e.$set(e.$record,"name",t)},expression:"$record.name"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",rules:e.rules.password,required:"",name:"input-10-2",label:e.$t("Enter your password"),hint:"At least 8 characters",min:"8","append-icon":e.e2?"visibility":"visibility_off","append-icon-cb":function(){return e.e2=!e.e2},value:"",type:e.e2?"password":"text"},model:{value:e.$record.password,callback:function(t){e.$set(e.$record,"password",t)},expression:"$record.password"}})],1)],1),r("v-flex",{attrs:{xs12:"",sm2:""}},[r("p",[e._v(e._s(e.$t("Type")))])]),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-select",{attrs:{items:e.type,rules:e.rules.type,required:"","item-value":"text",label:e.$t("Type")},model:{value:e.$record.type,callback:function(t){e.$set(e.$record,"type",t)},expression:"$record.type"}})],1)],1)],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};t.a=a},Xx8p:function(e,t,r){var s=r("h+ow");"string"==typeof s&&(s=[[e.i,s,""]]),s.locals&&(e.exports=s.locals);r("rjj0")("003012f6",s,!1,{sourceMap:!1})},bybP:function(e,t,r){"use strict";var s=r("tgu/");t.a={components:{UsersManagements:s.a},fetch:function(e){e.store.commit("operators/users/setRecord",{root:!0})}}},"h+ow":function(e,t,r){(e.exports=r("FZ+f")(!1)).push([e.i,"",""])},jLKj:function(e,t,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("JKtM"),n=r("NYxO"),i=r("r3Mr");t.a={methods:a()({},Object(n.mapActions)("operators/users",["save"]),{onSave:function(){var e=this;this.save({data:this.$record,id:this.$record.code}).then(function(t){return e.$router.push("/operators/users"),t})}}),computed:a()({},Object(n.mapState)("operators/users",["$record","record","form"])),components:{UsersForm:o.a,FormBar:i.a}}},r3Mr:function(e,t,r){"use strict";var s=r("L9dE"),a=r("2dRr"),o=r("VU/8")(s.a,a.a,!1,null,null,null);o.options.__file="components/General/FormBar.vue",t.a=o.exports},"tgu/":function(e,t,r){"use strict";var s=r("jLKj"),a=r("GIhl"),o=!1;var n=function(e){o||r("IpL2")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components/Operators/Users/UsersManagements.vue",t.a=i.exports},v0SZ:function(e,t,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");t.a={data:function(){var e=this;return{e2:!0,rules:{type:[function(t){return!!t||e.$t("required")}],name:[function(t){return!!t||e.$t("required")}],password:[function(t){return!!t||e.$t("required")}],user:[function(t){return!!t||e.$t("required")}]}}},computed:a()({},Object(o.mapState)("operators/users",["$record","record","form","type"])),props:[]}}});