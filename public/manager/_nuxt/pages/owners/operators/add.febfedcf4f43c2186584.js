webpackJsonp([1],{"+u1f":function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},add:{default:"Aggiungi"}}}},"+uSM":function(t,e,r){"use strict";var s=function(){var t=this.$createElement,e=this._self._c||t;return e("v-flex",{staticClass:"operators-management",attrs:{container:"","pa-0":""}},[e("form-bar",{attrs:{disabled:this.isDisabled,to:"/owners/operators",color:"light-green accent-4",caption:"Save Operator"},on:{"on-save":this.onSave}}),e("v-card",{staticClass:"mb-2"},[e("operators-data-form")],1),e("v-card",{staticClass:"mb-2"},[e("operators-accessibility-form")],1),e("v-card",{staticClass:"mb-2"},[e("operators-role-form")],1)],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},"/Z00":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"0uIf":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"15h8":function(t,e,r){"use strict";var s=r("Mx7o"),o=r("bV1o"),a=!1;var n=function(t){a||r("zeor")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components/Owners/Operators/OperatorDataForm.vue",e.a=i.exports},"20iY":function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=r("Kxkz"),o=r("cagd"),a=!1;var n=function(t){a||r("v4Dj")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="pages/owners/operators/add.vue",e.default=i.exports},"28DP":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"2dRr":function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[r("v-btn",{staticClass:"mx-0",attrs:{flat:"",small:"",to:t.to,"active-class":""}},[r("v-icon",[t._v("reply")]),t._v("\n            "+t._s(t.$t("Back"))+"\n        ")],1)],1),r("v-spacer"),r("v-btn",{staticClass:"elevation-0 mb-2",attrs:{color:t.color,dark:"",round:"",disabled:t.isDisabled},on:{click:t.onSave}},[t._v(t._s(t.$t(t.caption)))])],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},"4h/e":function(t,e,r){"use strict";var s=r("JByv"),o=r("awGH"),a=!1;var n=function(t){a||r("C0Wd")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components/Owners/Operators/OperatorsRoleForm.vue",e.a=i.exports},"6UvX":function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("NYxO");e.a={name:"UserPassword",data:function(){return{pwdVisibilityToggler:!0}},props:["rules"],computed:o()({},Object(a.mapState)("owners",["$record","record","form","languages"]),Object(a.mapGetters)("owners",["isAddMode","isEditMode","isView"]))}},"9q+M":function(t,e,r){"use strict";var s=r("+u1f"),o=r("gIfT"),a=!1;var n=function(t){a||r("by15")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components/General/AddBtn.vue",e.a=i.exports},B4gK:function(t,e,r){var s=r("MnAc");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("4baab3ae",s,!1,{sourceMap:!1})},BaHX:function(t,e,r){"use strict";var s=r("Mr1O"),o=r("FrzB"),a=!1;var n=function(t){a||r("Bjoe")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components/General/BtnCmds.vue",e.a=i.exports},Bjoe:function(t,e,r){var s=r("kGP/");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("7cfe9dae",s,!1,{sourceMap:!1})},C0Wd:function(t,e,r){var s=r("0uIf");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("1b9cab16",s,!1,{sourceMap:!1})},Dxhv:function(t,e,r){"use strict";r.d(e,"a",function(){return n});var s=r("Dd8w"),o=r.n(s),a=r("NYxO"),n=function(t){return{created:function(){this.setFormSaving(!1)},methods:o()({},Object(a.mapActions)(t,["save"]),Object(a.mapMutations)(t,["setFormSaving"])),computed:o()({},Object(a.mapState)(t,["$record","record","form"]),{isDisabled:function(){return!!this.form.saving||!this.form.valid}})}}},EcGd:function(t,e,r){var s=r("aCM0"),o=r("UnEC"),a="[object Date]";t.exports=function(t){return o(t)&&s(t)==a}},Elyy:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("15h8"),n=r("NYxO");e.a={computed:o()({},Object(n.mapState)("owners/operators",["list"])),components:{OperatorDataForm:a.a}}},FrzB:function(t,e,r){"use strict";var s=function(){var t=this.$createElement;return(this._self._c||t)("v-btn",{style:{backgroundColor:this.backgroundColor,color:this.color}},[this._v(this._s(this.btnName))])};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},HLsV:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("dOit"),n=r("9q+M"),i=r("NYxO"),c=r("Eoz/"),l=r.n(c),u=r("LSBV"),d=r.n(u);e.a={data:function(){var t=this;return{rules:{startDate:[function(e){return!!e||t.$t("required")}],endDate:[function(e){return!!e||t.$t("required")}]}}},filters:{time:function(t){return l()(t,"DD/MM/YYYY HH:mm:ss")}},created:function(){this.$record.created||(this.$record.created=new Date),d()(this.$record.created)||(this.$record.created=new Date(this.$record.created)),this.$record.periodFrom&&!d()(this.$record.periodFrom)&&(this.$record.periodFrom=new Date(this.$record.periodFrom)),this.$record.periodTo&&!d()(this.$record.periodTo)&&(this.$record.periodTo=new Date(this.$record.periodTo))},components:{addBtn:n.a,CancelBtn:a.a},props:[],computed:o()({},Object(i.mapState)("owners/operators",["$record","record","periods","form"]),Object(i.mapGetters)("owners/operators",["canAddDomain"])),methods:o()({},Object(i.mapMutations)("owners/operators",["addDomain","removeDomain"]),{onRemoveDomain:function(t){confirm(this.$t("Do you confirm?"))&&this.removeDomain(t)}})}},JByv:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("NYxO");e.a={computed:o()({},Object(a.mapState)("owners/operators",["$record","record","roles"]))}},KlMu:function(t,e,r){var s=r("/Z00");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("4e7d847e",s,!1,{sourceMap:!1})},Kx8U:function(t,e,r){"use strict";var s=function(){var t=this.$createElement,e=this._self._c||t;return e("v-btn",this._b({style:{backgroundColor:this.backgroundColor},attrs:{flat:"",icon:"",color:"red"},on:{click:this.$listeners.click}},"v-btn",this.$attrs,!1),[e("v-icon",{attrs:{medium:""}},[this._v("delete")])],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},Kxkz:function(t,e,r){"use strict";var s=r("YEkk");e.a={components:{OperatorsManagements:s.a},fetch:function(t){var e=t.store,r={domains:[],created:new Date,period:"permanent",user:"",password:"",role:"incharge"};e.commit("owners/operators/setRecord",r,{root:!0}),e.commit("owners/operators/setAddMode",null,{root:!0})}}},L9dE:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("NYxO");e.a={name:"FormBar",props:["to","color","disabled","caption"],computed:o()({},Object(a.mapState)("api",["isAjax"]),{isDisabled:function(){return!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},LSBV:function(t,e,r){var s=r("EcGd"),o=r("S7p9"),a=r("Dc0G"),n=a&&a.isDate,i=n?o(n):s;t.exports=i},MnAc:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},Mr1O:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},btnName:{default:"Programma Publicazione"}}}},Mx7o:function(t,e,r){"use strict";var s=r("Dd8w"),o=r.n(s),a=r("BaHX"),n=r("NYxO"),i=r("nA4i"),c=r("Gxg5");e.a={data:function(){return{pwdVisibilityToggler:!0,rules:{name:[Object(c.c)(this.$t("required"))],surname:[Object(c.c)(this.$t("required"))],email:[Object(c.a)(this.$t("E-mail not valid"))]}}},computed:o()({},Object(n.mapState)("owners/operators",["$record","record","form"]),Object(n.mapGetters)("owners/operators",["isAddMode"])),components:{BtnCmds:a.a,UserPassword:i.a},created:function(){var t=this;this.isAddMode&&(this.rules.password=[function(e){return!!e||t.$t("required")},function(e){return e.length>=8||t.$t("At least 8 characters")}],this.rules.user=[function(e){return!!e||t.$t("required")}])}}},Pb4q:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},Ufsg:function(t,e,r){var s=r("rApC");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("84079fcc",s,!1,{sourceMap:!1})},UrUy:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement;t._self._c;return t._e()};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},YEkk:function(t,e,r){"use strict";var s=r("hCCv"),o=r("+uSM"),a=!1;var n=function(t){a||r("hYD9")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components/Owners/Operators/OperatorsManagements.vue",e.a=i.exports},ZlGK:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-card",[r("v-layout",{staticClass:"pa-3",attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.user,label:t.$t("User"),box:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{box:"",required:"",rules:t.rules.password,name:"input-10-2",label:t.$t("Enter your password"),hint:t.$t("At least 8 characters"),min:"8","append-icon":t.pwdVisibilityToggler?"visibility":"visibility_off","append-icon-cb":function(){return t.pwdVisibilityToggler=!t.pwdVisibilityToggler},value:"",type:t.pwdVisibilityToggler?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1)],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},awGH:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"role-operator"},[r("v-layout",{staticClass:"ma-3 title",attrs:{row:""}},[t._v(t._s(t.$t("Role Operator")))]),r("v-layout",{attrs:{row:"","justify-right":""}},[r("v-flex",{attrs:{xs12:"",sm3:""}},[r("v-select",{attrs:{items:t.roles,"item-value":"text",label:t.$t("Role")},scopedSlots:t._u([{key:"selection",fn:function(e){return[t._v("\n                    "+t._s(t.$t(e.item.text))+"\n                ")]}},{key:"item",fn:function(e){return[t._v("\n                    "+t._s(t.$t(e.item.text))+"\n                ")]}}]),model:{value:t.$record.role,callback:function(e){t.$set(t.$record,"role",e)},expression:"$record.role"}})],1)],1)],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},bV1o:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{attrs:{"grid-list-md":""}},[r("v-form",{ref:"form",model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Name"),box:"",rules:t.rules.name,required:""},model:{value:t.$record.name,callback:function(e){t.$set(t.$record,"name",e)},expression:"$record.name"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:t.$t("Surname"),rules:t.rules.surname,required:""},model:{value:t.$record.surname,callback:function(e){t.$set(t.$record,"surname",e)},expression:"$record.surname"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Address"),box:""},model:{value:t.$record.address,callback:function(e){t.$set(t.$record,"address",e)},expression:"$record.address"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Zip"),box:""},model:{value:t.$record.zip,callback:function(e){t.$set(t.$record,"zip",e)},expression:"$record.zip"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("City"),box:""},model:{value:t.$record.city,callback:function(e){t.$set(t.$record,"city",e)},expression:"$record.city"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:t.$t("Email"),rules:t.rules.email,required:""},model:{value:t.$record.email,callback:function(e){t.$set(t.$record,"email",e)},expression:"$record.email"}})],1)],1),r("v-layout",{attrs:{row:""}},[t._e(),t._e(),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Telephone"),box:""},model:{value:t.$record.telephone,callback:function(e){t.$set(t.$record,"telephone",e)},expression:"$record.telephone"}})],1)],1),r("v-card",[t.isAddMode?r("v-layout",{staticClass:"pa-3",attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.user,label:t.$t("User"),box:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{box:"",required:"",rules:t.rules.password,name:"input-10-2",label:t.$t("Enter your password"),hint:t.$t("At least 8 characters"),min:"8","append-icon":t.pwdVisibilityToggler?"visibility":"visibility_off","append-icon-cb":function(){return t.pwdVisibilityToggler=!t.pwdVisibilityToggler},value:"",type:t.pwdVisibilityToggler?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1):t._e()],1)],1)],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},by15:function(t,e,r){var s=r("gCXK");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("3944110e",s,!1,{sourceMap:!1})},cagd:function(t,e,r){"use strict";var s=function(){var t=this.$createElement;return(this._self._c||t)("operators-managements")};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},dOit:function(t,e,r){"use strict";var s=r("mXno"),o=r("Kx8U"),a=!1;var n=function(t){a||r("B4gK")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components/General/CancelBtn.vue",e.a=i.exports},g2zA:function(t,e,r){"use strict";var s=function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",{staticClass:"operators-data-form"},[e("v-layout",{staticClass:"title",attrs:{row:""}},[this._v(this._s(this.$t("Operator Data")))]),e("operator-data-form")],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},gCXK:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},gIfT:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"add-btn"},[r("v-btn",t._b({style:{backgroundColor:t.backgroundColor,color:t.color},attrs:{fab:"",small:""},on:{click:t.$listeners.click}},"v-btn",t.$attrs,!1),[r("v-icon",{attrs:{small:""}},[t._v("add")])],1),r("span",{style:(t.color,t.backgroundColor)},[t._v(t._s(t.$t(t.add)))])],1)};s._withStripped=!0;var o={render:s,staticRenderFns:[]};e.a=o},hCCv:function(t,e,r){"use strict";var s=r("j8Js"),o=r("ldug"),a=r("4h/e"),n=r("BaHX"),i=r("r3Mr"),c=r("Dxhv");e.a={mixins:[Object(c.a)("owners/operators")],components:{OperatorsDataForm:s.a,OperatorsAccessibilityForm:o.a,OperatorsRoleForm:a.a,BtnCmds:n.a,FormBar:i.a},methods:{onSave:function(){var t=this;this.setFormSaving(!0),this.save({data:this.$record,id:this.$record.id}).then(function(e){return t.$router.push("/owners/operators")}).catch(function(){t.setFormSaving(!1)})}}}},hYD9:function(t,e,r){var s=r("28DP");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("fbaaf5aa",s,!1,{sourceMap:!1})},"hrC+":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},j8Js:function(t,e,r){"use strict";var s=r("Elyy"),o=r("g2zA"),a=!1;var n=function(t){a||r("Ufsg")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components/Owners/Operators/OperatorsDataForm.vue",e.a=i.exports},"kGP/":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},ldug:function(t,e,r){"use strict";var s=r("HLsV"),o=r("UrUy"),a=!1;var n=function(t){a||r("KlMu")},i=r("VU/8")(s.a,o.a,!1,n,null,null);i.options.__file="components/Owners/Operators/OperatorsAccessibilityForm.vue",e.a=i.exports},mXno:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"red"}}}},nA4i:function(t,e,r){"use strict";var s=r("6UvX"),o=r("ZlGK"),a=r("VU/8")(s.a,o.a,!1,null,null,null);a.options.__file="components/Operators/Owners/UserPassword.vue",e.a=a.exports},r3Mr:function(t,e,r){"use strict";var s=r("L9dE"),o=r("2dRr"),a=r("VU/8")(s.a,o.a,!1,null,null,null);a.options.__file="components/General/FormBar.vue",e.a=a.exports},rApC:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},v4Dj:function(t,e,r){var s=r("hrC+");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("7bd0ce32",s,!1,{sourceMap:!1})},zeor:function(t,e,r){var s=r("Pb4q");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("25c7fe6e",s,!1,{sourceMap:!1})}});