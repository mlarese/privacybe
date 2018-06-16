webpackJsonp([6],{"/sS8":function(t,e,r){"use strict";var s=r("jyKH"),a=r("o9j9");var o=function(t){r("PAkf")},n=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=n.exports},"/zYZ":function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"owners-form title",attrs:{"grid-list-md":""}},[r("v-layout",{attrs:{row:""}},[t._v(t._s(t.$t("Owner Data")))]),r("v-form",{ref:"form",model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.company,label:t.$t("Company"),box:""},model:{value:t.$record.company,callback:function(e){t.$set(t.$record,"company",e)},expression:"$record.company"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.email,label:t.$t("Email"),box:""},model:{value:t.$record.email,callback:function(e){t.$set(t.$record,"email",e)},expression:"$record.email"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Name"),rules:t.rules.name,required:"",box:""},model:{value:t.$record.name,callback:function(e){t.$set(t.$record,"name",e)},expression:"$record.name"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Surname"),rules:t.rules.surname,required:"",box:""},model:{value:t.$record.surname,callback:function(e){t.$set(t.$record,"surname",e)},expression:"$record.surname"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("City"),box:""},model:{value:t.$record.city,callback:function(e){t.$set(t.$record,"city",e)},expression:"$record.city"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Address"),box:""},model:{value:t.$record.address,callback:function(e){t.$set(t.$record,"address",e)},expression:"$record.address"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Zip"),box:""},model:{value:t.$record.zip,callback:function(e){t.$set(t.$record,"zip",e)},expression:"$record.zip"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("County"),box:""},model:{value:t.$record.county,callback:function(e){t.$set(t.$record,"county",e)},expression:"$record.county"}})],1)],1),r("v-card",[t.isAddMode?r("v-layout",{staticClass:"pa-3",attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.user,label:t.$t("User"),box:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",required:"",rules:t.rules.password,name:"input-10-2",label:t.$t("Enter your password"),hint:t.$t("At least 8 characters"),min:"8","append-icon":t.pwdVisibilityToggler?"visibility":"visibility_off","append-icon-cb":function(){return t.pwdVisibilityToggler=!t.pwdVisibilityToggler},value:"",type:t.pwdVisibilityToggler?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1):t._e()],1),r("v-layout",{staticClass:"align-baseline",attrs:{row:"","mt-2":""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-select",{attrs:{items:t.languages,required:"",rules:t.rules.language,"item-value":"text",label:t.$t("Language")},model:{value:t.$record.language,callback:function(e){t.$set(t.$record,"language",e)},expression:"$record.language"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[t.isAddMode?t._e():r("div",[r("v-btn",{staticClass:"elevation-0",attrs:{color:"info"},on:{click:function(e){t.showChangePwdDialog=!0}}},[t._v("\n                        "+t._s(t.$t("Change password"))+"\n                    ")])],1)])],1)],1),r("ChangePasswordDialog",{attrs:{"user-id":t.$record.id,show:t.showChangePwdDialog},on:{cancel:function(e){t.showChangePwdDialog=!1}}})],1)},staticRenderFns:[]};e.a=s},"0WQk":function(t,e,r){var s=r("85LH");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("352f128d",s,!0,{sourceMap:!1})},"1FsI":function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("v-btn",{style:{backgroundColor:this.backgroundColor,color:this.color}},[this._v(this._s(this.btnName))])},staticRenderFns:[]};e.a=s},"2q6L":function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-btn",this._b({attrs:{flat:"",icon:"",color:this.color},on:{click:this.$listeners.click}},"v-btn",this.$attrs,!1),[e("v-icon",[this._v("delete")])],1)},staticRenderFns:[]};e.a=s},"4BbW":function(t,e,r){"use strict";var s=r("TL0H"),a=r("rVcQ"),o=r("VU/8")(s.a,a.a,!1,null,null,null);e.a=o.exports},"85LH":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"89ev":function(t,e,r){"use strict";var s=r("sSre"),a=r("bsll");var o=function(t){r("c0L4")},n=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=n.exports},"9ZGW":function(t,e,r){"use strict";var s=r("/sS8"),a={root:!0};e.a={components:{OwnersManagements:s.a},fetch:function(t){var e=t.store,r={domains:[],created:new Date,language:"it",active:"true",name:"",surname:"",user:"",password:""};e.commit("owners/setAddMode",null,a),e.commit("owners/setRecord",r,a)}}},"9q+M":function(t,e,r){"use strict";var s=r("YxPU"),a=r("TbhU");var o=function(t){r("gV5T")},n=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=n.exports},BaHX:function(t,e,r){"use strict";var s=r("RfLG"),a=r("1FsI");var o=function(t){r("0WQk")},n=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=n.exports},Dxhv:function(t,e,r){"use strict";r.d(e,"a",function(){return n});var s=r("Dd8w"),a=r.n(s),o=r("NYxO"),n=function(t){return{created:function(){this.setFormSaving(!1)},methods:a()({},Object(o.mapActions)(t,["save"]),Object(o.mapMutations)(t,["setFormSaving"])),computed:a()({},Object(o.mapState)(t,["$record","record","form"]),{isDisabled:function(){return!!this.form.saving||!this.form.valid}})}}},FF1P:function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=r("9ZGW"),a=r("pr8t");var o=function(t){r("hhaF")},n=r("VU/8")(s.a,a.a,!1,o,null,null);e.default=n.exports},"I6+4":function(t,e,r){"use strict";var s=r("K5/h"),a=r("/zYZ"),o=r("VU/8")(s.a,a.a,!1,null,null,null);e.a=o.exports},"K5/h":function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO"),n=r("4BbW");e.a={data:function(){var t=this;return{showChangePwdDialog:!1,pwdVisibilityToggler:!0,rules:{domain:[function(e){return!!e||t.$t("required")}],language:[function(e){return!!e||t.$t("required")}],company:[function(e){return!!e||t.$t("required")}],email:[function(e){return!!e||t.$t("required")},function(e){return/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(e)||t.$t("E-mail not valid")}],name:[function(e){return!!e||t.$t("required")}],surname:[function(e){return!!e||t.$t("required")}]}}},components:{ChangePasswordDialog:n.a},created:function(){var t=this;this.isAddMode&&(this.rules.password=[function(e){return!!e||t.$t("required")},function(e){return e.length>=8||t.$t("At least 8 characters")}],this.rules.user=[function(e){return!!e||t.$t("required")}])},computed:a()({},Object(o.mapState)("owners",["$record","record","form","languages"]),Object(o.mapGetters)("owners",["isAddMode","isEditMode","isView"]))}},KHKM:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");e.a={name:"FormBar",props:["to","color","disabled","caption"],computed:a()({},Object(o.mapState)("api",["isAjax"]),{isDisabled:function(){return!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},PAkf:function(t,e,r){var s=r("Y3wP");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("1a6b1402",s,!0,{sourceMap:!1})},RfLG:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},btnName:{default:"Programma Publicazione"}}}},TL0H:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");e.a={name:"ChangePasswordDialog",methods:a()({},Object(o.mapActions)("users",["changePassword"]),{onChangePassword:function(){var t=this;this.changePassword({userId:this.userId,password:this.password,repeatPassword:this.repeatPassword,oldPassword:this.oldPassword}).then(function(){alert(t.$t("Password Changed")),t.onCancel()})},onCancel:function(){this.$emit("cancel")}}),watch:{show:function(){this.repeatPassword="",this.password="",this.oldPassword=""}},computed:{canChange:function(){return this.formValid&&this.passwordMatch},passwordMatch:function(){return this.password===this.repeatPassword}},data:function(){var t=this;return{rules:{password:[function(e){return!!e||t.$t("required")},function(e){return e.length>=8||t.$t("At least 8 characters")}]},formValid:!0,password:"",oldPassword:"",repeatPassword:""}},props:{show:{default:!1},userId:{required:!0}}}},TbhU:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"add-btn"},[r("v-btn",t._b({attrs:{fab:"",small:"",dark:"",color:"teal lighten-1"},on:{click:t.$listeners.click}},"v-btn",t.$attrs,!1),[r("v-icon",{attrs:{small:""}},[t._v("add")])],1),r("span",{style:(t.color,t.backgroundColor)},[t._v(t._s(t.$t(t.add)))])],1)},staticRenderFns:[]};e.a=s},UPhp:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[r("v-tooltip",{attrs:{right:""}},[r("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",fab:"",flat:"",small:"",to:t.to,"active-class":""},slot:"activator"},[r("v-icon",[t._v("reply")])],1),r("span",[t._v(t._s(t.$t("Back")))])],1)],1),r("v-spacer"),r("v-tooltip",{attrs:{left:""}},[r("v-btn",{staticClass:"elevation-0 mb-2",attrs:{slot:"activator",color:"green darken-3",dark:"",fab:"",small:"",disabled:t.isDisabled},on:{click:t.onSave},slot:"activator"},[r("v-icon",[t._v("save")])],1),r("span",[t._v(t._s(t.$t(t.caption)))])],1)],1)},staticRenderFns:[]};e.a=s},Y3wP:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},YxPU:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"teal"},color:{default:"white"},add:{default:"Aggiungi"}}}},bsll:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"owners-acl"},[r("v-layout",{staticClass:"bold my-3",attrs:{row:""}},[r("span",{staticClass:"title"},[t._v(t._s(t.$t("Domain Owner")))])]),r("v-form",{ref:"form",model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[t._l(t.$record.domains,function(e,s){return[e.deleted?t._e():r("v-layout",{key:s,attrs:{row:""}},[r("v-flex",{attrs:{xs8:""}},[r("v-text-field",{attrs:{box:"",label:t.$t("Domain"),disabled:!e.phantom,required:"",rules:t.rules.domain},model:{value:e.name,callback:function(r){t.$set(e,"name",r)},expression:"item.name"}})],1),r("v-flex",{attrs:{xs4:""}},[r("cancel-btn",{on:{click:function(e){t.onRemoveDomain(s)}}})],1)],1)]})],2),r("add-btn",{staticClass:"elevation-0",attrs:{add:"Aggiungi dominio",disabled:!t.canAddDomain},on:{click:t.addDomain}})],1)},staticRenderFns:[]};e.a=s},c0L4:function(t,e,r){var s=r("eL0K");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("f6e666f0",s,!0,{sourceMap:!1})},dOit:function(t,e,r){"use strict";var s=r("njOx"),a=r("2q6L"),o=r("VU/8")(s.a,a.a,!1,null,null,null);e.a=o.exports},eL0K:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},eXdE:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},gV5T:function(t,e,r){var s=r("eXdE");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("480bac3a",s,!0,{sourceMap:!1})},hhaF:function(t,e,r){var s=r("lUsV");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("77461afd",s,!0,{sourceMap:!1})},jyKH:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("89ev"),n=r("I6+4"),i=r("BaHX"),l=r("r3Mr"),c=r("Dxhv"),d=r("NYxO");e.a={components:{OwnersDomain:o.a,OwnersForm:n.a,BtnCmds:i.a,FormBar:l.a},mixins:[Object(c.a)("owners")],computed:a()({},Object(d.mapGetters)("owners",["isAddMode"])),methods:{onSave:function(){var t=this;this.setFormSaving(!0),this.$nextTick(this.$nuxt.$loading.start),this.save({data:this.$record,id:this.$record.id}).then(function(e){return t.$router.push("/operators/owners")}).catch(function(){t.setFormSaving(!1)}).then(function(){return t.$nextTick(t.$nuxt.$loading.start)})}}}},lUsV:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},njOx:function(t,e,r){"use strict";e.a={name:"CancelBtn",props:{color:{default:"grey darken-1"}}}},o9j9:function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-flex",{attrs:{container:"","pa-0":""}},[e("form-bar",{attrs:{disabled:this.isDisabled,to:"/operators/owners",color:"blue lighten-1",caption:"Save Owner"},on:{"on-save":this.onSave}}),e("v-card",{staticClass:"mb-2"},[e("owners-form")],1),e("v-card",{staticClass:"mb-2"},[e("owners-domain")],1)],1)},staticRenderFns:[]};e.a=s},pr8t:function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("owners-managements")},staticRenderFns:[]};e.a=s},r3Mr:function(t,e,r){"use strict";var s=r("KHKM"),a=r("UPhp"),o=r("VU/8")(s.a,a.a,!1,null,null,null);e.a=o.exports},rVcQ:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-dialog",{attrs:{persistent:"","max-width":"390"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[r("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[r("v-toolbar-title",{staticClass:"subheading"},[t._v("\n            "+t._s(t.$t("Change password"))+"\n        ")])],1),r("v-card",{staticClass:"pa-3"},[r("v-layout",{attrs:{row:"",wrap:""}},[r("v-flex",{attrs:{xs12:""}},[r("v-form",{model:{value:t.formValid,callback:function(e){t.formValid=e},expression:"formValid"}},[r("v-flex",[r("v-text-field",{attrs:{label:t.$t("Old password"),box:"",required:"",rules:t.rules.password,type:"password"},model:{value:t.oldPassword,callback:function(e){t.oldPassword=e},expression:"oldPassword"}})],1),r("v-flex",[r("v-text-field",{attrs:{label:t.$t("New password"),box:"",required:"",rules:t.rules.password,type:"password"},model:{value:t.password,callback:function(e){t.password=e},expression:"password"}})],1),r("v-flex",[r("v-text-field",{attrs:{label:t.$t("Repeat password"),box:"",required:"",rules:t.rules.password,type:"password"},model:{value:t.repeatPassword,callback:function(e){t.repeatPassword=e},expression:"repeatPassword"}})],1)],1)],1)],1),r("v-card-actions",[r("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),r("v-spacer"),r("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),r("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.canChange},nativeOn:{click:function(e){return t.onChangePassword(e)}}},[r("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Change password")))])])],1)],1)],1)},staticRenderFns:[]};e.a=s},sSre:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("dOit"),n=r("9q+M"),i=r("NYxO");e.a={data:function(){var t=this;return{rules:{domain:[function(e){return!!e||t.$t("required")}]}}},components:{addBtn:n.a,CancelBtn:o.a},created:function(){this.$record.created=new Date(this.$record.created),this.$record.domains&&this.$record.domains.forEach&&this.$record.domains.forEach(function(t){t._name=t.name,t.phantom=!1})},computed:a()({},Object(i.mapState)("owners",["$record","record","languages","form"]),Object(i.mapGetters)("owners",["canAddDomain",""])),methods:a()({},Object(i.mapMutations)("owners",["addDomain","removeDomain","setDeletedItem"]),{onRemoveDomain:function(t){confirm(this.$t("Do you confirm?"))&&(this.$record.domains[t].name&&""!==this.$record.domains[t].name?this.$record.domains[t].deleted=!0:this.removeDomain(t))}})}}});