webpackJsonp([18],{"14mI":function(t,e,r){"use strict";var s=r("tgu/");e.a={components:{UsersManagements:s.a},fetch:function(t){var e=t.store,r=t.params.id;return e.dispatch("operators/users/load",{id:r},{root:!0})}}},BHEt:function(t,e,r){var s=r("gfWv");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("d76ea5a0",s,!0,{sourceMap:!1})},CrhN:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"users-form"},[r("v-layout",{staticClass:"title",attrs:{row:""}},[t._v(t._s(t.$t("Users Data")))]),r("v-form",{ref:"form",model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:t.$t("User"),rules:t.rules.user,required:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:t.$t("Name"),rules:t.rules.name,required:""},model:{value:t.$record.name,callback:function(e){t.$set(t.$record,"name",e)},expression:"$record.name"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",rules:t.rules.password,required:"",name:"input-10-2",label:t.$t("Enter your password"),hint:"At least 8 characters",min:"8","append-icon":t.e2?"visibility":"visibility_off","append-icon-cb":function(){return t.e2=!t.e2},value:"",type:t.e2?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1),r("v-flex",{attrs:{xs12:"",sm2:""}},[r("p",[t._v(t._s(t.$t("Type")))])]),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-select",{attrs:{items:t.type,rules:t.rules.type,required:"","item-value":"text",label:t.$t("Type")},model:{value:t.$record.type,callback:function(e){t.$set(t.$record,"type",e)},expression:"$record.type"}})],1)],1)],1)},staticRenderFns:[]};e.a=s},JKtM:function(t,e,r){"use strict";var s=r("u5bd"),a=r("CrhN");var o=function(t){r("rc2V")},n=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=n.exports},KHKM:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");e.a={name:"FormBar",props:["to","color","disabled","caption"],computed:a()({},Object(o.mapState)("api",["isAjax"]),{isDisabled:function(){return!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},"NI+z":function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("users-managements")},staticRenderFns:[]};e.a=s},"P/A2":function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-flex",{attrs:{container:"","pa-0":""}},[e("form-bar",{attrs:{disabled:!this.form.valid,to:"/operators/users",color:"yellow",caption:"Save User"},on:{"on-save":this.onSave}}),e("v-card",[e("users-form")],1)],1)},staticRenderFns:[]};e.a=s},UPhp:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[r("v-tooltip",{attrs:{right:""}},[r("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",fab:"",flat:"",small:"",to:t.to,"active-class":""},slot:"activator"},[r("v-icon",[t._v("reply")])],1),r("span",[t._v(t._s(t.$t("Back")))])],1)],1),r("v-spacer"),r("v-tooltip",{attrs:{left:""}},[r("v-btn",{staticClass:"elevation-0 mb-2",attrs:{slot:"activator",color:"green darken-3",dark:"",fab:"",small:"",disabled:t.isDisabled},on:{click:t.onSave},slot:"activator"},[r("v-icon",[t._v("save")])],1),r("span",[t._v(t._s(t.$t(t.caption)))])],1)],1)},staticRenderFns:[]};e.a=s},Ymvs:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("JKtM"),n=r("NYxO"),i=r("r3Mr");e.a={name:"UsersManagements",methods:a()({},Object(n.mapActions)("operators/users",["save"]),{onSave:function(){var t=this;this.save({data:this.$record,id:this.$record.code}).then(function(e){return t.$router.push("/operators/users"),e})}}),computed:a()({},Object(n.mapState)("operators/users",["$record","record","form"])),components:{UsersForm:o.a,FormBar:i.a}}},gfWv:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},okdF:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},r3Mr:function(t,e,r){"use strict";var s=r("KHKM"),a=r("UPhp"),o=r("VU/8")(s.a,a.a,!1,null,null,null);e.a=o.exports},rc2V:function(t,e,r){var s=r("okdF");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("06cbb940",s,!0,{sourceMap:!1})},"tgu/":function(t,e,r){"use strict";var s=r("Ymvs"),a=r("P/A2");var o=function(t){r("BHEt")},n=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=n.exports},u5bd:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");e.a={data:function(){var t=this;return{e2:!0,rules:{type:[function(e){return!!e||t.$t("required")}],name:[function(e){return!!e||t.$t("required")}],password:[function(e){return!!e||t.$t("required")}],user:[function(e){return!!e||t.$t("required")}]}}},computed:a()({},Object(o.mapState)("operators/users",["$record","record","form","type"])),props:[]}},zYly:function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=r("14mI"),a=r("NI+z"),o=r("VU/8")(s.a,a.a,!1,null,null,null);e.default=o.exports}});