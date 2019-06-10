webpackJsonp([27],{"/n4t":function(t,e,s){"use strict";var r={render:function(){var t=this.$createElement;return(this._self._c||t)("customer-care-managements")},staticRenderFns:[]};e.a=r},"1gZw":function(t,e,s){"use strict";var r={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-flex",{attrs:{container:"","pa-0":""}},[e("form-bar",{attrs:{disabled:!this.form.valid,to:"/operators/customercare",color:"amber lighten-1",caption:"Save Operator"},on:{"on-save":this.onSave}}),e("v-card",[e("customer-care-form")],1)],1)},staticRenderFns:[]};e.a=r},"4BbW":function(t,e,s){"use strict";var r=s("TL0H"),a=s("rVcQ"),o=s("VU/8")(r.a,a.a,!1,null,null,null);e.a=o.exports},AU6K:function(t,e,s){"use strict";var r=s("m2oV"),a=s("1gZw");var o=function(t){s("Xyjx")},n=s("VU/8")(r.a,a.a,!1,o,null,null);e.a=n.exports},H9bN:function(t,e,s){"use strict";var r=s("Md3a"),a=s("RN2r"),o=s("VU/8")(r.a,a.a,!1,null,null,null);e.a=o.exports},KHKM:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),o=s("NYxO");e.a={name:"FormBar",props:["to","color","disabled","caption"],computed:a()({},Object(o.mapState)("api",["isAjax"]),Object(o.mapGetters)("auth",["canSave"]),{isDisabled:function(){return!this.canSave||!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},Md3a:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),o=s("NYxO"),n=s("4BbW");e.a={components:{ChangePasswordDialog:n.a},data:function(){var t=this;return{showChangePwdDialog:!1,pwdVisibilityToggler:!0,rules:{name:[function(e){return!!e||t.$t("required")}],surname:[function(e){return!!e||t.$t("required")}],email:[function(e){return/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(e)||t.$t("E-mail not valid")}]}}},computed:a()({},Object(o.mapState)("customerCare",["$record","record","form"]),Object(o.mapGetters)("customerCare",["isAddMode","isEditMode","isView"])),created:function(){var t=this;this.isAddMode&&(this.rules.password=[function(e){return!!e||t.$t("required")},function(e){return e.length>=8||t.$t("At least 8 characters")}],this.rules.user=[function(e){return!!e||t.$t("required")}])}}},NsU6:function(t,e,s){"use strict";var r=s("AU6K"),a={root:!0};e.a={components:{CustomerCareManagements:r.a},fetch:function(t){var e=t.store,s=t.params;e.commit("customerCare/setEditMode",null,a);var r=s.id;return e.dispatch("customerCare/load",{id:r},a)}}},RN2r:function(t,e,s){"use strict";var r={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"users-form",attrs:{"grid-list-md":""}},[s("v-layout",{staticClass:"title",attrs:{row:""}},[t._v(t._s(t.$t("Operator data")))]),s("ChangePasswordDialog",{attrs:{"user-id":t.$record.id,show:t.showChangePwdDialog},on:{cancel:function(e){t.showChangePwdDialog=!1}}}),s("v-form",{ref:"form",model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[s("v-layout",{attrs:{row:""}},[s("v-flex",{attrs:{xs12:"",sm6:""}},[s("v-text-field",{attrs:{box:"",label:t.$t("Name"),_rules:"rules.name",required:""},model:{value:t.$record.firstName,callback:function(e){t.$set(t.$record,"firstName",e)},expression:"$record.firstName"}})],1),s("v-flex",{attrs:{xs12:"",sm6:""}},[s("v-text-field",{attrs:{box:"",label:t.$t("Surname"),required:"",rules:t.rules.surname},model:{value:t.$record.lastName,callback:function(e){t.$set(t.$record,"lastName",e)},expression:"$record.lastName"}})],1)],1),s("v-layout",{attrs:{row:""}},[s("v-flex",{attrs:{xs12:"",sm6:""}},[s("v-text-field",{attrs:{box:"",label:t.$t("Email")},model:{value:t.$record.email,callback:function(e){t.$set(t.$record,"email",e)},expression:"$record.email"}})],1),s("v-flex",{attrs:{xs12:"",sm6:""}},[t.isAddMode?t._e():s("div",[s("v-btn",{staticClass:"elevation-0",attrs:{color:"info"},on:{click:function(e){t.showChangePwdDialog=!0}}},[t._v("\n                        "+t._s(t.$t("Change password"))+"\n                    ")])],1)])],1),s("v-card",{staticClass:"mb-2"},[t.isAddMode?s("v-layout",{staticClass:"pa-3",attrs:{row:""}},[s("v-flex",{attrs:{xs12:"",sm6:""}},[s("v-text-field",{attrs:{required:"",rules:t.rules.user,label:t.$t("User"),box:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),s("v-spacer"),s("v-flex",{attrs:{xs12:"",sm6:""}},[s("v-text-field",{attrs:{box:"",required:"",rules:t.rules.password,name:"input-10-2",label:t.$t("Enter your password"),hint:t.$t("At least 8 characters"),min:"8","append-icon":t.pwdVisibilityToggler?"visibility":"visibility_off","append-icon-cb":function(){return t.pwdVisibilityToggler=!t.pwdVisibilityToggler},value:"",type:t.pwdVisibilityToggler?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1):t._e()],1)],1)],1)},staticRenderFns:[]};e.a=r},TL0H:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),o=s("NYxO");e.a={name:"ChangePasswordDialog",methods:a()({},Object(o.mapActions)("users",["changePassword"]),{onChangePassword:function(){var t=this;this.changePassword({userId:this.userId,password:this.password,repeatPassword:this.repeatPassword,oldPassword:this.oldPassword}).then(function(){alert(t.$t("Password Changed")),t.onCancel()})},onCancel:function(){this.$emit("cancel")}}),watch:{show:function(){this.repeatPassword="",this.password="",this.oldPassword=""}},computed:{canChange:function(){return this.formValid&&this.passwordMatch},passwordMatch:function(){return this.password===this.repeatPassword}},data:function(){var t=this;return{rules:{password:[function(e){return!!e||t.$t("required")},function(e){return e.length>=8||t.$t("At least 8 characters")}]},formValid:!0,password:"",oldPassword:"",repeatPassword:""}},props:{show:{default:!1},userId:{required:!0}}}},Xyjx:function(t,e,s){var r=s("uzf6");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("421d955f",r,!0,{sourceMap:!1})},gkcy:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var r=s("NsU6"),a=s("/n4t"),o=s("VU/8")(r.a,a.a,!1,null,null,null);e.default=o.exports},m2oV:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),o=s("H9bN"),n=s("NYxO"),i=s("r3Mr");e.a={methods:a()({},Object(n.mapActions)("customerCare",["save"]),{onSave:function(){var t=this;this.$nextTick(this.$nuxt.$loading.start),this.save({data:this.$record,id:this.$record.id}).then(function(e){return t.$router.push("/operators/customercare"),e}).catch(function(){t.setFormSaving(!1)}).then(function(){return t.$nextTick(t.$nuxt.$loading.start)})}}),computed:a()({},Object(n.mapState)("customerCare",["$record","record","form"])),components:{CustomerCareForm:o.a,FormBar:i.a}}},r3Mr:function(t,e,s){"use strict";var r=s("KHKM"),a=s("zA40"),o=s("VU/8")(r.a,a.a,!1,null,null,null);e.a=o.exports},rVcQ:function(t,e,s){"use strict";var r={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-dialog",{attrs:{persistent:"","max-width":"390"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[s("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[s("v-toolbar-title",{staticClass:"subheading"},[t._v("\n            "+t._s(t.$t("Change password"))+"\n        ")])],1),s("v-card",{staticClass:"pa-3"},[s("v-layout",{attrs:{row:"",wrap:""}},[s("v-flex",{attrs:{xs12:""}},[s("v-form",{model:{value:t.formValid,callback:function(e){t.formValid=e},expression:"formValid"}},[s("v-flex",[s("v-text-field",{attrs:{label:t.$t("Old password"),box:"",required:"",rules:t.rules.password,type:"password"},model:{value:t.oldPassword,callback:function(e){t.oldPassword=e},expression:"oldPassword"}})],1),s("v-flex",[s("v-text-field",{attrs:{label:t.$t("New password"),box:"",required:"",rules:t.rules.password,type:"password"},model:{value:t.password,callback:function(e){t.password=e},expression:"password"}})],1),s("v-flex",[s("v-text-field",{attrs:{label:t.$t("Repeat password"),box:"",required:"",rules:t.rules.password,type:"password"},model:{value:t.repeatPassword,callback:function(e){t.repeatPassword=e},expression:"repeatPassword"}})],1)],1)],1)],1),s("v-card-actions",[s("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),s("v-spacer"),s("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),s("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.canChange},nativeOn:{click:function(e){return t.onChangePassword(e)}}},[s("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Change password")))])])],1)],1)],1)},staticRenderFns:[]};e.a=r},uzf6:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},zA40:function(t,e,s){"use strict";var r={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[s("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[s("v-tooltip",{attrs:{right:""}},[s("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",fab:"",flat:"",small:"",to:t.to,"active-class":""},slot:"activator"},[s("v-icon",[t._v("reply")])],1),s("span",[t._v(t._s(t.$t("Back")))])],1)],1),s("v-spacer"),s("v-tooltip",{attrs:{left:""}},[s("v-btn",{staticClass:"elevation-0 mb-2",attrs:{slot:"activator",color:"green darken-3",dark:"",fab:"",small:"",disabled:t.isDisabled},on:{click:t.onSave},slot:"activator"},[s("v-icon",[t._v("save")])],1),s("span",[t._v(t._s(t.$t(t.caption)))])],1)],1)},staticRenderFns:[]};e.a=r}});