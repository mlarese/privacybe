webpackJsonp([3],{"0WQk":function(t,e,r){var s=r("85LH");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("352f128d",s,!0,{sourceMap:!1})},"1+QY":function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");e.a={name:"UserPassword",data:function(){return{pwdVisibilityToggler:!0}},props:["rules"],computed:a()({},Object(o.mapState)("owners",["$record","record","form","languages"]),Object(o.mapGetters)("owners",["isAddMode","isEditMode","isView"]))}},"15h8":function(t,e,r){"use strict";var s=r("DzSW"),a=r("ZQnD");var o=function(t){r("zJ/5")},i=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=i.exports},"1FsI":function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("v-btn",{style:{backgroundColor:this.backgroundColor,color:this.color}},[this._v(this._s(this.btnName))])},staticRenderFns:[]};e.a=s},"20iY":function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=r("sGoC"),a=r("Nfog");var o=function(t){r("Rh1o")},i=r("VU/8")(s.a,a.a,!1,o,null,null);e.default=i.exports},"2q6L":function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-btn",this._b({attrs:{flat:"",icon:"",color:this.color},on:{click:this.$listeners.click}},"v-btn",this.$attrs,!1),[e("v-icon",[this._v("delete")])],1)},staticRenderFns:[]};e.a=s},"2y2j":function(t,e,r){var s=r("HYtO");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("5c9bece4",s,!0,{sourceMap:!1})},"4h/e":function(t,e,r){"use strict";var s=r("OMRA"),a=r("V9gU");var o=function(t){r("6aRd")},i=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=i.exports},"6aRd":function(t,e,r){var s=r("ZIe+");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("a49beeb4",s,!0,{sourceMap:!1})},"7x3r":function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-flex",{staticClass:"operators-management",attrs:{container:"","pa-0":""}},[e("form-bar",{attrs:{disabled:this.isDisabled,to:"/owners/operators",color:"orange darken-1",caption:"Save Operator"},on:{"on-save":this.onSave}}),e("v-card",{staticClass:"mb-2"},[e("operators-data-form")],1),e("v-card",{staticClass:"mb-2"},[e("operators-accessibility-form")],1),e("v-card",{staticClass:"mb-2"},[e("operators-role-form")],1)],1)},staticRenderFns:[]};e.a=s},"85LH":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"9ZPp":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"9q+M":function(t,e,r){"use strict";var s=r("YxPU"),a=r("TbhU");var o=function(t){r("gV5T")},i=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=i.exports},BaHX:function(t,e,r){"use strict";var s=r("RfLG"),a=r("1FsI");var o=function(t){r("0WQk")},i=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=i.exports},Dxhv:function(t,e,r){"use strict";r.d(e,"a",function(){return i});var s=r("Dd8w"),a=r.n(s),o=r("NYxO"),i=function(t){return{created:function(){this.setFormSaving(!1)},methods:a()({},Object(o.mapActions)(t,["save"]),Object(o.mapMutations)(t,["setFormSaving"])),computed:a()({},Object(o.mapState)(t,["$record","record","form"]),{isDisabled:function(){return!!this.form.saving||!this.form.valid}})}}},DzSW:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("BaHX"),i=r("NYxO"),n=r("nA4i"),c=r("Gxg5");e.a={data:function(){return{pwdVisibilityToggler:!0,rules:{name:[Object(c.c)(this.$t("required"))],surname:[Object(c.c)(this.$t("required"))],email:[Object(c.a)(this.$t("E-mail not valid"))]}}},computed:a()({},Object(i.mapState)("owners/operators",["$record","record","form"]),Object(i.mapGetters)("owners/operators",["isAddMode"])),components:{BtnCmds:o.a,UserPassword:n.a},created:function(){var t=this;this.isAddMode&&(this.rules.password=[function(e){return!!e||t.$t("required")},function(e){return e.length>=8||t.$t("At least 8 characters")}],this.rules.user=[function(e){return!!e||t.$t("required")}])}}},EcGd:function(t,e,r){var s=r("aCM0"),a=r("UnEC"),o="[object Date]";t.exports=function(t){return a(t)&&s(t)==o}},F6qW:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},GHIi:function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",{staticClass:"operators-data-form"},[e("v-layout",{staticClass:"title",attrs:{row:""}},[this._v(this._s(this.$t("Operator Data")))]),e("operator-data-form")],1)},staticRenderFns:[]};e.a=s},HYtO:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},ISZr:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("dOit"),i=r("9q+M"),n=r("NYxO"),c=r("Eoz/"),l=r.n(c),d=r("LSBV"),u=r.n(d);e.a={data:function(){var t=this;return{periodFromVisible:!1,periodToVisible:!1,dateFromOpt:{disabledDate:function(t){return t.getTime()<=Date.now()}},dateToOpt:{disabledDate:function(e){return e.getTime()<=t.periodFromTime}},rules:{startDate:[function(e){return!!e||t.$t("required")}],endDate:[function(e){return!!e||t.$t("required")}]}}},filters:{time:function(t){return l()(t,"DD/MM/YYYY HH:mm:ss")}},created:function(){this.$record.created||(this.$record.created=new Date),u()(this.$record.created)||(this.$record.created=new Date(this.$record.created)),this.$record.periodFrom&&!u()(this.$record.periodFrom)&&(this.$record.periodFrom=new Date(this.$record.periodFrom)),this.$record.periodTo&&!u()(this.$record.periodTo)&&(this.$record.periodTo=new Date(this.$record.periodTo))},components:{addBtn:i.a,CancelBtn:o.a},props:[],computed:a()({},Object(n.mapState)("owners/operators",["$record","record","periods","form"]),Object(n.mapGetters)("owners/operators",["canAddDomain"]),{periodFromTime:function(){return new Date(this.$record.periodFrom).getTime()},periodToTime:function(){return new Date(this.$record.periodTo).getTime()}}),methods:a()({},Object(n.mapMutations)("owners/operators",["addDomain","removeDomain"]),{onRemoveDomain:function(t){confirm(this.$t("Do you confirm?"))&&this.removeDomain(t)}})}},KHKM:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");e.a={name:"FormBar",props:["to","color","disabled","caption"],computed:a()({},Object(o.mapState)("api",["isAjax"]),{isDisabled:function(){return!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},LSBV:function(t,e,r){var s=r("EcGd"),a=r("S7p9"),o=r("Dc0G"),i=o&&o.isDate,n=i?a(i):s;t.exports=n},NbqH:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-card",[r("v-layout",{staticClass:"pa-3",attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.user,label:t.$t("User"),box:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{box:"",required:"",rules:t.rules.password,name:"input-10-2",label:t.$t("Enter your password"),hint:t.$t("At least 8 characters"),min:"8","append-icon":t.pwdVisibilityToggler?"visibility":"visibility_off","append-icon-cb":function(){return t.pwdVisibilityToggler=!t.pwdVisibilityToggler},value:"",type:t.pwdVisibilityToggler?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1)],1)},staticRenderFns:[]};e.a=s},Nfog:function(t,e,r){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("operators-managements")},staticRenderFns:[]};e.a=s},OMRA:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");e.a={computed:a()({},Object(o.mapState)("owners/operators",["$record","record","roles"]))}},Qv4V:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},RfLG:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},btnName:{default:"Programma Publicazione"}}}},Rh1o:function(t,e,r){var s=r("p32L");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("9b3d270e",s,!0,{sourceMap:!1})},TbhU:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"add-btn"},[r("v-btn",t._b({attrs:{fab:"",small:"",dark:"",color:"teal lighten-1"},on:{click:t.$listeners.click}},"v-btn",t.$attrs,!1),[r("v-icon",{attrs:{small:""}},[t._v("add")])],1),r("span",{style:(t.color,t.backgroundColor)},[t._v(t._s(t.$t(t.add)))])],1)},staticRenderFns:[]};e.a=s},UPhp:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[r("v-tooltip",{attrs:{right:""}},[r("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",fab:"",flat:"",small:"",to:t.to,"active-class":""},slot:"activator"},[r("v-icon",[t._v("reply")])],1),r("span",[t._v(t._s(t.$t("Back")))])],1)],1),r("v-spacer"),r("v-tooltip",{attrs:{left:""}},[r("v-btn",{staticClass:"elevation-0 mb-2",attrs:{slot:"activator",color:"green darken-3",dark:"",fab:"",small:"",disabled:t.isDisabled},on:{click:t.onSave},slot:"activator"},[r("v-icon",[t._v("save")])],1),r("span",[t._v(t._s(t.$t(t.caption)))])],1)],1)},staticRenderFns:[]};e.a=s},V9gU:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"role-operator"},[r("v-layout",{staticClass:"ma-3 title",attrs:{row:""}},[t._v(t._s(t.$t("Role Operator")))]),r("v-layout",{attrs:{row:"","justify-right":""}},[r("v-flex",{attrs:{xs12:"",sm3:""}},[r("v-select",{attrs:{items:t.roles,"item-value":"text",label:t.$t("Role")},scopedSlots:t._u([{key:"selection",fn:function(e){return[t._v("\n                    "+t._s(t.$t(e.item.text))+"\n                ")]}},{key:"item",fn:function(e){return[t._v("\n                    "+t._s(t.$t(e.item.text))+"\n                ")]}}]),model:{value:t.$record.role,callback:function(e){t.$set(t.$record,"role",e)},expression:"$record.role"}})],1)],1)],1)},staticRenderFns:[]};e.a=s},Vhva:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("15h8"),i=r("NYxO");e.a={computed:a()({},Object(i.mapState)("owners/operators",["list"])),components:{OperatorDataForm:o.a}}},YEkk:function(t,e,r){"use strict";var s=r("sWFY"),a=r("7x3r");var o=function(t){r("e8kg")},i=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=i.exports},YxPU:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"teal"},color:{default:"white"},add:{default:"Aggiungi"}}}},"ZIe+":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},ZQnD:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{attrs:{"grid-list-md":""}},[r("v-form",{ref:"form",model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Name"),box:"",rules:t.rules.name,required:""},model:{value:t.$record.name,callback:function(e){t.$set(t.$record,"name",e)},expression:"$record.name"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:t.$t("Surname"),rules:t.rules.surname,required:""},model:{value:t.$record.surname,callback:function(e){t.$set(t.$record,"surname",e)},expression:"$record.surname"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Address"),box:""},model:{value:t.$record.address,callback:function(e){t.$set(t.$record,"address",e)},expression:"$record.address"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Zip"),box:""},model:{value:t.$record.zip,callback:function(e){t.$set(t.$record,"zip",e)},expression:"$record.zip"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("City"),box:""},model:{value:t.$record.city,callback:function(e){t.$set(t.$record,"city",e)},expression:"$record.city"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:t.$t("Email"),rules:t.rules.email,required:""},model:{value:t.$record.email,callback:function(e){t.$set(t.$record,"email",e)},expression:"$record.email"}})],1)],1),r("v-layout",{attrs:{row:""}},[t._e(),t._e(),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{label:t.$t("Telephone"),box:""},model:{value:t.$record.telephone,callback:function(e){t.$set(t.$record,"telephone",e)},expression:"$record.telephone"}})],1)],1),r("v-card",[t.isAddMode?r("v-layout",{staticClass:"pa-3",attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.user,label:t.$t("User"),box:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{box:"",required:"",rules:t.rules.password,name:"input-10-2",label:t.$t("Enter your password"),hint:t.$t("At least 8 characters"),min:"8","append-icon":t.pwdVisibilityToggler?"visibility":"visibility_off","append-icon-cb":function(){return t.pwdVisibilityToggler=!t.pwdVisibilityToggler},value:"",type:t.pwdVisibilityToggler?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1):t._e()],1)],1)],1)},staticRenderFns:[]};e.a=s},dOit:function(t,e,r){"use strict";var s=r("njOx"),a=r("2q6L"),o=r("VU/8")(s.a,a.a,!1,null,null,null);e.a=o.exports},e8kg:function(t,e,r){var s=r("9ZPp");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("189566ff",s,!0,{sourceMap:!1})},eXdE:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},gV5T:function(t,e,r){var s=r("eXdE");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("480bac3a",s,!0,{sourceMap:!1})},j8Js:function(t,e,r){"use strict";var s=r("Vhva"),a=r("GHIi");var o=function(t){r("2y2j")},i=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=i.exports},k8Xg:function(t,e,r){var s=r("F6qW");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("035116a8",s,!0,{sourceMap:!1})},ldug:function(t,e,r){"use strict";var s=r("ISZr"),a=r("yWEn");var o=function(t){r("k8Xg")},i=r("VU/8")(s.a,a.a,!1,o,null,null);e.a=i.exports},nA4i:function(t,e,r){"use strict";var s=r("1+QY"),a=r("NbqH"),o=r("VU/8")(s.a,a.a,!1,null,null,null);e.a=o.exports},njOx:function(t,e,r){"use strict";e.a={name:"CancelBtn",props:{color:{default:"grey darken-1"}}}},p32L:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},r3Mr:function(t,e,r){"use strict";var s=r("KHKM"),a=r("UPhp"),o=r("VU/8")(s.a,a.a,!1,null,null,null);e.a=o.exports},sGoC:function(t,e,r){"use strict";var s=r("YEkk");e.a={components:{OperatorsManagements:s.a},fetch:function(t){var e=t.store,r={domains:[],periodFrom:new Date,created:new Date,user:"",password:"",role:"incharge"};e.commit("owners/operators/setRecord",r,{root:!0}),e.commit("owners/operators/setAddMode",null,{root:!0})}}},sWFY:function(t,e,r){"use strict";var s=r("j8Js"),a=r("ldug"),o=r("4h/e"),i=r("BaHX"),n=r("r3Mr"),c=r("Dxhv");e.a={mixins:[Object(c.a)("owners/operators")],components:{OperatorsDataForm:s.a,OperatorsAccessibilityForm:a.a,OperatorsRoleForm:o.a,BtnCmds:i.a,FormBar:n.a},methods:{onSave:function(){var t=this;this.setFormSaving(!0),this.save({data:this.$record,id:this.$record.id}).then(function(e){return t.$router.push("/owners/operators")}).catch(function(){t.setFormSaving(!1)})}}}},yWEn:function(t,e,r){"use strict";var s={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"operators-accessibility-form"},[r("v-form",{ref:"form",model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[r("v-layout",{staticClass:"title my-2",attrs:{row:""}},[r("span",{staticClass:"title"},[t._v(t._s(t.$t("Operator Accessibility")))])]),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-flex",{attrs:{xs12:"",sm2:""}},[r("p",[t._v(t._s(t.$t("Domain")))])]),t._l(t.$record.domains,function(e,s){return r("v-flex",{key:s,staticClass:"my-2",attrs:{xs12:"",sm6:""},on:{click:function(t){}}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs10:""}},[r("v-text-field",{attrs:{solo:""},model:{value:e.name,callback:function(r){t.$set(e,"name",r)},expression:"item.name"}})],1),r("v-flex",{attrs:{xs2:""}},[r("cancel-btn",{on:{click:function(e){t.onRemoveDomain(s)}}})],1)],1)],1)}),r("add-btn",{attrs:{add:"Aggiungi dominio",disabled:!t.canAddDomain},on:{click:t.addDomain}})],2),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-flex",{attrs:{xs12:"",sm2:""}},[r("span",[t._v(t._s(t.$t("Period")))])]),r("v-flex",{staticClass:"my-2",attrs:{xs12:"",sm2:""}},[r("span",[t._v(t._s(t.$t("From")))])]),r("v-flex",{staticClass:"py-0",attrs:{xs12:"",sm6:""}},[r("el-date-picker",{attrs:{disabledDate:"",format:"dd/MM/yyyy HH:mm:ss",type:"date",placeholder:t.$t("Select date and time"),rules:t.rules.startDate,required:"","picker-options":t.dateFromOpt},model:{value:t.$record.periodFrom,callback:function(e){t.$set(t.$record,"periodFrom",e)},expression:"$record.periodFrom"}})],1),r("v-flex",{staticClass:"my-1",attrs:{xs12:"",sm2:""}},[r("span",[t._v(t._s(t.$t("To")))])]),r("v-flex",{staticClass:"py-0",attrs:{xs12:"",sm6:""}},[r("el-date-picker",{attrs:{type:"date",format:"dd/MM/yyyy HH:mm:ss",rules:t.rules.endDate,required:"","picker-options":t.dateToOpt,placeholder:t.$t("Select date and time")},model:{value:t.$record.periodTo,callback:function(e){t.$set(t.$record,"periodTo",e)},expression:"$record.periodTo"}})],1)],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},"zJ/5":function(t,e,r){var s=r("Qv4V");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("e03c5f46",s,!0,{sourceMap:!1})}});