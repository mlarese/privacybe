webpackJsonp([2],{"+NG5":function(t,e,r){"use strict";var s=function(){var t=this.$createElement,e=this._self._c||t;return e("v-layout",{staticClass:"owners-factory",attrs:{"pa-0":""}},[e(this.currentComponent,{tag:"component"})],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},"/sS8":function(t,e,r){"use strict";var s=r("jyKH"),a=r("WfDa"),o=!1;var n=function(t){o||r("i2ru")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components\\Operators\\Owners\\OwnersManagements.vue",e.a=i.exports},"6oAS":function(t,e,r){var s=r("i4dc");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("17d42294",s,!1,{sourceMap:!1})},"89ev":function(t,e,r){"use strict";var s=r("sSre"),a=r("FMci"),o=!1;var n=function(t){o||r("rulr")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components\\Operators\\Owners\\OwnersDomain.vue",e.a=i.exports},"99rs":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"9q+M":function(t,e,r){"use strict";var s=r("YxPU"),a=r("hnuB"),o=!1;var n=function(t){o||r("PnoX")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components\\General\\AddBtn.vue",e.a=i.exports},BMeg:function(t,e,r){var s=r("xeDc");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("3cbd3ad2",s,!1,{sourceMap:!1})},BaHX:function(t,e,r){"use strict";var s=r("RfLG"),a=r("ro4c"),o=!1;var n=function(t){o||r("JGRt")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components\\General\\BtnCmds.vue",e.a=i.exports},DFj7:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("/sS8"),n=r("OD/R"),i=r("NYxO");e.a={components:{OwnersManagements:o.a,OwnersView:n.a},computed:a()({},Object(i.mapState)("owners",["mode"]),{currentComponent:function(){return"edit"===this.mode?o.a:n.a}})}},DmWT:function(t,e,r){"use strict";var s=r("DFj7"),a=r("+NG5"),o=!1;var n=function(t){o||r("6oAS")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components\\Operators\\Owners\\OwnersFactory.vue",e.a=i.exports},EemP:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},FMci:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement;t._self._c;return t._e()};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},HBEj:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"I6+4":function(t,e,r){"use strict";var s=r("K5/h"),a=r("s+Jq"),o=!1;var n=function(t){o||r("ZZAB")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components\\Operators\\Owners\\OwnersForm.vue",e.a=i.exports},"IYV/":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},JGRt:function(t,e,r){var s=r("LJRO");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("991b3d0e",s,!1,{sourceMap:!1})},"K5/h":function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");e.a={data:function(){var t=this;return{pwdVisibilityToggler:!0,rules:{language:[function(e){return!!e||t.$t("required")}],company:[function(e){return!!e||t.$t("required")}],email:[function(e){return!!e||t.$t("required")},function(e){return/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(e)||t.$t("E-mail not valid")}],name:[function(e){return!!e||t.$t("required")}],surname:[function(e){return!!e||t.$t("required")}]}}},created:function(){var t=this;this.isAddMode&&(this.rules.password=[function(e){return!!e||t.$t("required")},function(e){return e.length>=8||t.$t("At least 8 characters")}],this.rules.user=[function(e){return!!e||t.$t("required")}])},computed:a()({},Object(o.mapState)("owners",["$record","record","form","languages"]),Object(o.mapGetters)("owners",["isAddMode","isEditMode","isView"])),props:[]}},KHKM:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO");e.a={name:"FormBar",props:["to","color","disabled","caption"],computed:a()({},Object(o.mapState)("api",["isAjax"]),{isDisabled:function(){return!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},LJRO:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"OD/R":function(t,e,r){"use strict";var s=r("V38v"),a=r("WHsh"),o=!1;var n=function(t){o||r("BMeg")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components\\Operators\\Owners\\OwnersView.vue",e.a=i.exports},PnoX:function(t,e,r){var s=r("i7uY");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("3876ef1d",s,!1,{sourceMap:!1})},RfLG:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},btnName:{default:"Programma Publicazione"}}}},V38v:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO"),n=r("Eoz/"),i=r.n(n);e.a={filters:{time:function(t){return i()(t,"DD/MM/YYYY HH:mm:ss")}},methods:a()({},Object(o.mapMutations)("owners",["setEditMode"])),computed:a()({},Object(o.mapState)("owners",["$record","record","languages"]))}},WHsh:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"operators-view",attrs:{"pa-0":""}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{staticClass:"title my-2",attrs:{xs4:""}},[t._v("ID:"+t._s(t.$record.id))]),r("v-flex",{staticClass:"mx-2 my-2 title",attrs:{xs6:""}},[t._v(t._s(t.$record.name)+" "+t._s(t.$record.surname))]),r("v-flex",{attrs:{xs2:""}},[r("v-btn",{attrs:{flat:"",small:"",color:"black"}},[r("v-icon",[t._v("delete")]),t._v("\n            "+t._s(t.$t("Eliminate Operator"))+"\n            ")],1)],1)],1),r("v-layout",{staticStyle:{"border-bottom":"2px solid black"},attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"btn-back",attrs:{xs4:""}},[r("v-btn",{staticClass:"mx-0",attrs:{flat:"",small:"",to:"/operators/owners"}},[r("v-icon",[t._v("reply")]),t._v("\n                "+t._s(t.$t("Back"))+"\n            ")],1)],1)],1),r("v-layout",{staticClass:"title",attrs:{row:""}},[r("span",{staticClass:"title"},[t._v(t._s(t.$t("Operators Data")))]),r("v-spacer"),r("v-btn",{staticClass:"py-o",attrs:{icon:""},on:{click:t.setEditMode}},[r("v-icon",[t._v("create")])],1)],1),r("v-layout",{staticClass:"my-2",attrs:{row:""}},[r("v-flex",{attrs:{xs2:"",sm2:""}},[r("span",[t._v(t._s(t.$t("Name")))])]),r("v-flex",{staticClass:"mx-4",attrs:{xs2:"",sm2:""}},[t._v("\n            "+t._s(t.$record.name)+"\n        ")]),r("v-spacer"),r("v-flex",{attrs:{xs2:"",sm2:""}},[r("span",[t._v(t._s(t.$t("Surname")))])]),r("v-flex",{staticClass:"mx-4",attrs:{xs2:"",sm2:""}},[t._v("\n            "+t._s(t.$record.surname)+"\n        ")])],1),r("v-layout",{staticClass:"my-2",attrs:{row:""}},[r("v-flex",{attrs:{xs2:"",sm2:""}},[r("span",[t._v(t._s(t.$t("Company")))])]),r("v-flex",{staticClass:"mx-4",attrs:{xs2:"",sm2:""}},[t._v("\n            "+t._s(t.$record.company)+"\n        ")]),r("v-spacer"),r("v-flex",{attrs:{xs2:"",sm2:""}},[r("span",[t._v(t._s(t.$t("Email")))])]),r("v-flex",{staticClass:"mx-4",attrs:{xs2:"",sm2:""}},[t._v("\n            "+t._s(t.$record.email)+"\n        ")])],1),r("v-layout",{staticClass:"title my-2",attrs:{row:""}},[r("span",{staticClass:"title"},[t._v(t._s(t.$t("Accessibility Owners")))])]),r("v-layout",{staticClass:"my-2",attrs:{row:""}},[r("v-flex",{attrs:{xs12:""}},[r("span",[t._v(t._s(t.$t("Domain")))]),r("v-flex",{staticClass:"mx-4",attrs:{xs6:""}},t._l(t.$record.domains,function(e){return r("div",{key:e.name},[t._v(t._s(e.name))])}))],1),r("v-flex",{attrs:{xs12:""}},[r("span",[t._v(t._s(t.$t("Language")))]),r("v-flex",{staticClass:"mx-4",attrs:{xs6:""}},[r("div",[t._v(t._s(t.$record.language))])])],1)],1),r("v-flex",{attrs:{xs2:"",sm2:""}},[r("span",[t._v(t._s(t.$t("Created")))])]),r("v-flex",{staticClass:"mx-4",attrs:{xs2:"",sm2:""}},[t._v("\n        "+t._s(t._f("time")(t.$record.created))+"\n    ")])],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},WfDa:function(t,e,r){"use strict";var s=function(){var t=this.$createElement,e=this._self._c||t;return e("v-flex",{attrs:{container:"","pa-0":""}},[e("form-bar",{attrs:{disabled:this.isDisabled,to:"/operators/owners",color:"blue lighten-1",caption:"Save Owner"},on:{"on-save":this.onSave}}),e("v-card",{staticClass:"mb-2"},[e("owners-form")],1),this.isAddMode?this._e():e("v-card",{staticClass:"mb-2"},[e("owners-domain")],1)],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},XPxn:function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=r("fiCx"),a=r("XqD1"),o=!1;var n=function(t){o||r("gjOa")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="pages\\operators\\owners\\_id.vue",e.default=i.exports},"Xq/1":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},XqD1:function(t,e,r){"use strict";var s=function(){var t=this.$createElement;return(this._self._c||t)("owners-factory")};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},YxPU:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},add:{default:"Aggiungi"}}}},ZZAB:function(t,e,r){var s=r("99rs");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("1d23a964",s,!1,{sourceMap:!1})},dOit:function(t,e,r){"use strict";var s=r("njOx"),a=r("r6IP"),o=!1;var n=function(t){o||r("f+Et")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components\\General\\CancelBtn.vue",e.a=i.exports},"f+Et":function(t,e,r){var s=r("EemP");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("0d2ea79a",s,!1,{sourceMap:!1})},fiCx:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO"),n=r("DmWT"),i={root:!0};e.a={computed:a()({},Object(o.mapState)("owners",["$record"])),components:{OwnersFactory:n.a},fetch:function(t){var e=t.store,r=t.params,s=t.query,a=r.id,o=s.mode;return o?e.commit("owners/setMode",o,i):e.commit("owners/setEditMode",null,i),e.dispatch("owners/load",{id:a},i)}}},gjOa:function(t,e,r){var s=r("IYV/");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("0a6401c0",s,!1,{sourceMap:!1})},hnuB:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"add-btn"},[r("v-btn",t._b({style:{backgroundColor:t.backgroundColor,color:t.color},attrs:{fab:"",small:""},on:{click:t.$listeners.click}},"v-btn",t.$attrs,!1),[r("v-icon",{attrs:{small:""}},[t._v("add")])],1),r("span",{style:(t.color,t.backgroundColor)},[t._v(t._s(t.$t(t.add)))])],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},i2ru:function(t,e,r){var s=r("Xq/1");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("72ea6953",s,!1,{sourceMap:!1})},i4dc:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},i7uY:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},jyKH:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("89ev"),n=r("I6+4"),i=r("BaHX"),c=r("r3Mr"),l=r("NYxO");e.a={components:{OwnersDomain:o.a,OwnersForm:n.a,BtnCmds:i.a,FormBar:c.a},methods:a()({},Object(l.mapActions)("owners",["save"]),Object(l.mapMutations)("owners",["setFormSaving"]),{onSave:function(){var t=this;this.setFormSaving(!0),this.save({data:this.$record,id:this.$record.id}).then(function(e){return t.$router.push("/operators/owners"),e}).catch(function(){t.setFormSaving(!1)})}}),created:function(){this.setFormSaving(!1)},computed:a()({isDisabled:function(){return!!this.form.saving||!this.form.valid}},Object(l.mapState)("owners",["$record","record","form"]),Object(l.mapGetters)("owners",["isAddMode"])),props:[]}},njOx:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"red"}}}},r3Mr:function(t,e,r){"use strict";var s=r("KHKM"),a=r("s3jh"),o=r("VU/8")(s.a,a.a,!1,null,null,null);o.options.__file="components\\General\\FormBar.vue",e.a=o.exports},r6IP:function(t,e,r){"use strict";var s=function(){var t=this.$createElement,e=this._self._c||t;return e("v-btn",this._b({style:{backgroundColor:this.backgroundColor},attrs:{flat:"",icon:"",color:"red"},on:{click:this.$listeners.click}},"v-btn",this.$attrs,!1),[e("v-icon",{attrs:{medium:""}},[this._v("delete")])],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},ro4c:function(t,e,r){"use strict";var s=function(){var t=this.$createElement;return(this._self._c||t)("v-btn",{style:{backgroundColor:this.backgroundColor,color:this.color}},[this._v(this._s(this.btnName))])};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},rulr:function(t,e,r){var s=r("HBEj");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("373abb28",s,!1,{sourceMap:!1})},"s+Jq":function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"owners-form title",attrs:{row:""}},[r("v-layout",{attrs:{row:""}},[t._v(t._s(t.$t("Owner Data")))]),r("v-form",{ref:"form",model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.company,label:t.$t("Company"),box:""},model:{value:t.$record.company,callback:function(e){t.$set(t.$record,"company",e)},expression:"$record.company"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.email,label:t.$t("Email"),box:""},model:{value:t.$record.email,callback:function(e){t.$set(t.$record,"email",e)},expression:"$record.email"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{label:t.$t("Name"),rules:t.rules.name,required:"",box:""},model:{value:t.$record.name,callback:function(e){t.$set(t.$record,"name",e)},expression:"$record.name"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{label:t.$t("Surname"),rules:t.rules.surname,required:"",box:""},model:{value:t.$record.surname,callback:function(e){t.$set(t.$record,"surname",e)},expression:"$record.surname"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{label:t.$t("City"),box:""},model:{value:t.$record.city,callback:function(e){t.$set(t.$record,"city",e)},expression:"$record.city"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{label:t.$t("Address"),box:""},model:{value:t.$record.address,callback:function(e){t.$set(t.$record,"address",e)},expression:"$record.address"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{label:t.$t("Zip"),box:""},model:{value:t.$record.zip,callback:function(e){t.$set(t.$record,"zip",e)},expression:"$record.zip"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{label:t.$t("County"),box:""},model:{value:t.$record.county,callback:function(e){t.$set(t.$record,"county",e)},expression:"$record.county"}})],1)],1),r("v-card",[t.isAddMode?r("v-layout",{staticClass:"pa-3",attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{required:"",rules:t.rules.user,label:t.$t("User"),box:""},model:{value:t.$record.user,callback:function(e){t.$set(t.$record,"user",e)},expression:"$record.user"}})],1),r("v-spacer"),r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-text-field",{attrs:{box:"",required:"",rules:t.rules.password,name:"input-10-2",label:t.$t("Enter your password"),hint:t.$t("At least 8 characters"),min:"8","append-icon":t.pwdVisibilityToggler?"visibility":"visibility_off","append-icon-cb":function(){return t.pwdVisibilityToggler=!t.pwdVisibilityToggler},value:"",type:t.pwdVisibilityToggler?"password":"text"},model:{value:t.$record.password,callback:function(e){t.$set(t.$record,"password",e)},expression:"$record.password"}})],1)],1):t._e()],1),r("v-layout",{attrs:{row:"","mt-2":""}},[r("v-flex",{attrs:{xs12:"",sm5:""}},[r("v-select",{attrs:{items:t.languages,required:"",rules:t.rules.language,"item-value":"text",label:t.$t("Language")},model:{value:t.$record.language,callback:function(e){t.$set(t.$record,"language",e)},expression:"$record.language"}})],1)],1)],1)],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},s3jh:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[r("v-btn",{staticClass:"mx-0",attrs:{flat:"",small:"",to:t.to,"active-class":""}},[r("v-icon",[t._v("reply")]),t._v("\n            "+t._s(t.$t("Back"))+"\n        ")],1)],1),r("v-spacer"),r("v-btn",{staticClass:"elevation-0 mb-2",attrs:{color:t.color,dark:"",round:"",disabled:t.isDisabled},on:{click:t.onSave}},[t._v(t._s(t.$t(t.caption)))])],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},sSre:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("dOit"),n=r("9q+M"),i=r("NYxO");e.a={components:{addBtn:n.a,CancelBtn:o.a},created:function(){this.$record.created=new Date(this.$record.created)},computed:a()({},Object(i.mapState)("owners",["$record","record","languages"]),Object(i.mapGetters)("owners",["canAddDomain"])),methods:a()({},Object(i.mapMutations)("owners",["addDomain","removeDomain"]),{onRemoveDomain:function(t){confirm(this.$t("Do you confirm?"))&&this.removeDomain(t)}})}},xeDc:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])}});