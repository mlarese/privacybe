webpackJsonp([3],{"/gDq":function(t,e,r){"use strict";var s=function(){var t=this.$createElement;return(this._self._c||t)("operators-managements")};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},"1+QY":function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("NYxO");e.a={name:"UserPassword",data:function(){return{pwdVisibilityToggler:!0}},props:["rules"],computed:o()({},Object(a.mapState)("owners",["$record","record","form","languages"]),Object(a.mapGetters)("owners",["isAddMode","isEditMode","isView"]))}},"15h8":function(t,e,r){"use strict";var s=r("DzSW"),o=r("4Dnw"),a=!1;var n=function(t){a||r("mTmr")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components\\Owners\\Operators\\OperatorDataForm.vue",e.a=i.exports},"20iY":function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=r("sGoC"),o=r("/gDq"),a=!1;var n=function(t){a||r("Z2g2")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="pages\\owners\\operators\\add.vue",e.default=i.exports},"2oY8":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"4Dnw":function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{attrs:{"grid-list-md":""}},[r("v-form",{ref:"form",model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Name"),box:"",rules:t.rules.name,required:""},model:{value:t.$record.name,callback:function(e){t.$set(t.$record,"name",e)},expression:"$record.name"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:t.$t("Surname"),rules:t.rules.surname,required:""},model:{value:t.$record.surname,callback:function(e){t.$set(t.$record,"surname",e)},expression:"$record.surname"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Address"),box:""},model:{value:t.$record.address,callback:function(e){t.$set(t.$record,"address",e)},expression:"$record.address"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Zip"),box:""},model:{value:t.$record.zip,callback:function(e){t.$set(t.$record,"zip",e)},expression:"$record.zip"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("City"),box:""},model:{value:t.$record.city,callback:function(e){t.$set(t.$record,"city",e)},expression:"$record.city"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:t.$t("Email"),rules:t.rules.email,required:""},model:{value:t.$record.email,callback:function(e){t.$set(t.$record,"email",e)},expression:"$record.email"}})],1)],1),r("v-layout",{attrs:{row:""}},[t._e(),t._e(),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Telephone"),box:""},model:{value:t.$record.telephone,callback:function(e){t.$set(t.$record,"telephone",e)},expression:"$record.telephone"}})],1)],1),r("v-card",[t.isAddMode?r("v-layout",{staticClass:"pa-3",attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.user,label:t.$t("User"),box:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{box:"",required:"",rules:t.rules.password,name:"input-10-2",label:t.$t("Enter your password"),hint:t.$t("At least 8 characters"),min:"8","append-icon":t.pwdVisibilityToggler?"visibility":"visibility_off","append-icon-cb":function(){return t.pwdVisibilityToggler=!t.pwdVisibilityToggler},value:"",type:t.pwdVisibilityToggler?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1):t._e()],1)],1)],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},"4h/e":function(t,e,r){"use strict";var s=r("OMRA"),o=r("eKc5"),a=!1;var n=function(t){a||r("nLDS")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components\\Owners\\Operators\\OperatorsRoleForm.vue",e.a=i.exports},"5auJ":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"6VK1":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"9q+M":function(t,e,r){"use strict";var s=r("YxPU"),o=r("hnuB"),a=!1;var n=function(t){a||r("PnoX")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components\\General\\AddBtn.vue",e.a=i.exports},BaHX:function(t,e,r){"use strict";var s=r("RfLG"),o=r("ro4c"),a=!1;var n=function(t){a||r("JGRt")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components\\General\\BtnCmds.vue",e.a=i.exports},Dxhv:function(t,e,r){"use strict";r.d(e,"a",function(){return n});var s=r("Dd8w"),o=r.n(s),a=r("NYxO"),n=function(t){return{created:function(){this.setFormSaving(!1)},methods:o()({},Object(a.mapActions)(t,["save"]),Object(a.mapMutations)(t,["setFormSaving"])),computed:o()({},Object(a.mapState)(t,["$record","record","form"]),{isDisabled:function(){return!!this.form.saving||!this.form.valid}})}}},DzSW:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("BaHX"),n=r("NYxO"),i=r("nA4i"),c=r("Gxg5");e.a={data:function(){return{pwdVisibilityToggler:!0,rules:{name:[Object(c.c)(this.$t("required"))],surname:[Object(c.c)(this.$t("required"))],email:[Object(c.a)(this.$t("E-mail not valid"))]}}},computed:o()({},Object(n.mapState)("owners/operators",["$record","record","form"]),Object(n.mapGetters)("owners/operators",["isAddMode"])),components:{BtnCmds:a.a,UserPassword:i.a},created:function(){var t=this;this.isAddMode&&(this.rules.password=[function(e){return!!e||t.$t("required")},function(e){return e.length>=8||t.$t("At least 8 characters")}],this.rules.user=[function(e){return!!e||t.$t("required")}])}}},EcGd:function(t,e,r){var s=r("aCM0"),o=r("UnEC"),a="[object Date]";t.exports=function(t){return o(t)&&s(t)==a}},EemP:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},ISZr:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("dOit"),n=r("9q+M"),i=r("NYxO"),c=r("Eoz/"),l=r.n(c),u=r("LSBV"),d=r.n(u);e.a={data:function(){var t=this;return{rules:{startDate:[function(e){return!!e||t.$t("required")}],endDate:[function(e){return!!e||t.$t("required")}]}}},filters:{time:function(t){return l()(t,"DD/MM/YYYY HH:mm:ss")}},created:function(){this.$record.created||(this.$record.created=new Date),d()(this.$record.created)||(this.$record.created=new Date(this.$record.created)),this.$record.periodFrom&&!d()(this.$record.periodFrom)&&(this.$record.periodFrom=new Date(this.$record.periodFrom)),this.$record.periodTo&&!d()(this.$record.periodTo)&&(this.$record.periodTo=new Date(this.$record.periodTo))},components:{addBtn:n.a,CancelBtn:a.a},props:[],computed:o()({},Object(i.mapState)("owners/operators",["$record","record","periods","form"]),Object(i.mapGetters)("owners/operators",["canAddDomain"])),methods:o()({},Object(i.mapMutations)("owners/operators",["addDomain","removeDomain"]),{onRemoveDomain:function(t){confirm(this.$t("Do you confirm?"))&&this.removeDomain(t)}})}},JGRt:function(t,e,r){var s=r("LJRO");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("991b3d0e",s,!1,{sourceMap:!1})},KHKM:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("NYxO");e.a={name:"FormBar",props:["to","color","disabled","caption"],computed:o()({},Object(a.mapState)("api",["isAjax"]),{isDisabled:function(){return!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},LJRO:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},LSBV:function(t,e,r){var s=r("EcGd"),o=r("S7p9"),a=r("Dc0G"),n=a&&a.isDate,i=n?o(n):s;t.exports=i},LdH5:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},MRCA:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-card",[r("v-layout",{staticClass:"pa-3",attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.user,label:t.$t("User"),box:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{box:"",required:"",rules:t.rules.password,name:"input-10-2",label:t.$t("Enter your password"),hint:t.$t("At least 8 characters"),min:"8","append-icon":t.pwdVisibilityToggler?"visibility":"visibility_off","append-icon-cb":function(){return t.pwdVisibilityToggler=!t.pwdVisibilityToggler},value:"",type:t.pwdVisibilityToggler?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1)],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},OMRA:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("NYxO");e.a={computed:o()({},Object(a.mapState)("owners/operators",["$record","record","roles"]))}},PnoX:function(t,e,r){var s=r("i7uY");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("3876ef1d",s,!1,{sourceMap:!1})},RfLG:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},btnName:{default:"Programma Publicazione"}}}},VAC3:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},VVQn:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},Vhva:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("15h8"),n=r("NYxO");e.a={computed:o()({},Object(n.mapState)("owners/operators",["list"])),components:{OperatorDataForm:a.a}}},WiEy:function(t,e,r){var s=r("2oY8");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("0342e8e8",s,!1,{sourceMap:!1})},XqT6:function(t,e,r){var s=r("LdH5");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("63152436",s,!1,{sourceMap:!1})},YEkk:function(t,e,r){"use strict";var s=r("sWFY"),o=r("ltsK"),a=!1;var n=function(t){a||r("XqT6")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components\\Owners\\Operators\\OperatorsManagements.vue",e.a=i.exports},YxPU:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},add:{default:"Aggiungi"}}}},Z2g2:function(t,e,r){var s=r("5auJ");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("95950e6c",s,!1,{sourceMap:!1})},dOit:function(t,e,r){"use strict";var s=r("njOx"),o=r("r6IP"),a=!1;var n=function(t){a||r("f+Et")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components\\General\\CancelBtn.vue",e.a=i.exports},eKc5:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"role-operator"},[r("v-layout",{staticClass:"ma-3 title",attrs:{row:""}},[t._v(t._s(t.$t("Role Operator")))]),r("v-layout",{attrs:{row:"","justify-right":""}},[r("v-flex",{attrs:{xs12:"",sm3:""}},[r("v-select",{attrs:{items:t.roles,"item-value":"text",label:t.$t("Role")},scopedSlots:t._u([{key:"selection",fn:function(e){return[t._v("\n                    "+t._s(t.$t(e.item.text))+"\n                ")]}},{key:"item",fn:function(e){return[t._v("\n                    "+t._s(t.$t(e.item.text))+"\n                ")]}}]),model:{value:t.$record.role,callback:function(e){t.$set(t.$record,"role",e)},expression:"$record.role"}})],1)],1)],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},"f+Et":function(t,e,r){var s=r("EemP");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("0d2ea79a",s,!1,{sourceMap:!1})},hnuB:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"add-btn"},[r("v-btn",t._b({style:{backgroundColor:t.backgroundColor,color:t.color},attrs:{fab:"",small:""},on:{click:t.$listeners.click}},"v-btn",t.$attrs,!1),[r("v-icon",{attrs:{small:""}},[t._v("add")])],1),r("span",{style:(t.color,t.backgroundColor)},[t._v(t._s(t.$t(t.add)))])],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},i7uY:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},iLtO:function(t,e,r){var s=r("VAC3");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("61c6bfe0",s,!1,{sourceMap:!1})},isjT:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement;t._self._c;return t._e()};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},j8Js:function(t,e,r){"use strict";var s=r("Vhva"),o=r("laur"),a=!1;var n=function(t){a||r("iLtO")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components\\Owners\\Operators\\OperatorsDataForm.vue",e.a=i.exports},laur:function(t,e,r){"use strict";var s=function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",{staticClass:"operators-data-form"},[e("v-layout",{staticClass:"title",attrs:{row:""}},[this._v(this._s(this.$t("Operator Data")))]),e("operator-data-form")],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},ldug:function(t,e,r){"use strict";var s=r("ISZr"),o=r("isjT"),a=!1;var n=function(t){a||r("WiEy")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components\\Owners\\Operators\\OperatorsAccessibilityForm.vue",e.a=i.exports},ltsK:function(t,e,r){"use strict";var s=function(){var t=this.$createElement,e=this._self._c||t;return e("v-flex",{staticClass:"operators-management",attrs:{container:"","pa-0":""}},[e("form-bar",{attrs:{disabled:this.isDisabled,to:"/owners/operators",color:"orange darken-1",caption:"Save Operator"},on:{"on-save":this.onSave}}),e("v-card",{staticClass:"mb-2"},[e("operators-data-form")],1),e("v-card",{staticClass:"mb-2"},[e("operators-accessibility-form")],1),e("v-card",{staticClass:"mb-2"},[e("operators-role-form")],1)],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},mTmr:function(t,e,r){var s=r("VVQn");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("3ad5fa9b",s,!1,{sourceMap:!1})},nA4i:function(t,e,r){"use strict";var s=r("1+QY"),o=r("MRCA"),a=r("VU/8")(s.a,o.a,!1,null,null,null);a.options.__file="components\\Operators\\Owners\\UserPassword.vue",e.a=a.exports},nLDS:function(t,e,r){var s=r("6VK1");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("e96798b8",s,!1,{sourceMap:!1})},njOx:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"red"}}}},r3Mr:function(t,e,r){"use strict";var s=r("KHKM"),o=r("s3jh"),a=r("VU/8")(s.a,o.a,!1,null,null,null);a.options.__file="components\\General\\FormBar.vue",e.a=a.exports},r6IP:function(t,e,r){"use strict";var s=function(){var t=this.$createElement,e=this._self._c||t;return e("v-btn",this._b({style:{backgroundColor:this.backgroundColor},attrs:{flat:"",icon:"",color:"red"},on:{click:this.$listeners.click}},"v-btn",this.$attrs,!1),[e("v-icon",{attrs:{medium:""}},[this._v("delete")])],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},ro4c:function(t,e,r){"use strict";var s=function(){var t=this.$createElement;return(this._self._c||t)("v-btn",{style:{backgroundColor:this.backgroundColor,color:this.color}},[this._v(this._s(this.btnName))])};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},s3jh:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[r("v-btn",{staticClass:"mx-0",attrs:{flat:"",small:"",to:t.to,"active-class":""}},[r("v-icon",[t._v("reply")]),t._v("\n            "+t._s(t.$t("Back"))+"\n        ")],1)],1),r("v-spacer"),r("v-btn",{staticClass:"elevation-0 mb-2",attrs:{color:t.color,dark:"",round:"",disabled:t.isDisabled},on:{click:t.onSave}},[t._v(t._s(t.$t(t.caption)))])],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},sGoC:function(t,e,r){"use strict";var s=r("YEkk");e.a={components:{OperatorsManagements:s.a},fetch:function(t){var e=t.store,r={domains:[],created:new Date,period:"permanent",user:"",password:"",role:"incharge"};e.commit("owners/operators/setRecord",r,{root:!0}),e.commit("owners/operators/setAddMode",null,{root:!0})}}},sWFY:function(t,e,r){"use strict";var s=r("j8Js"),o=r("ldug"),a=r("4h/e"),n=r("BaHX"),i=r("r3Mr"),c=r("Dxhv");e.a={mixins:[Object(c.a)("owners/operators")],components:{OperatorsDataForm:s.a,OperatorsAccessibilityForm:o.a,OperatorsRoleForm:a.a,BtnCmds:n.a,FormBar:i.a},methods:{onSave:function(){var t=this;this.setFormSaving(!0),this.save({data:this.$record,id:this.$record.id}).then(function(e){return t.$router.push("/owners/operators")}).catch(function(){t.setFormSaving(!1)})}}}}});