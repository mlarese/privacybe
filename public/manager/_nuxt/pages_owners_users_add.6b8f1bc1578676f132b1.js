webpackJsonp([20],{"/TGQ":function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=r("twT+"),s=r("D4z9");var o=function(e){r("rZau")},n=r("VU/8")(a.a,s.a,!1,o,null,null);t.default=n.exports},"3Apz":function(e,t,r){var a=r("9lI6");"string"==typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);r("rjj0")("fd976ae6",a,!0,{sourceMap:!1})},"9lI6":function(e,t,r){(e.exports=r("FZ+f")(!1)).push([e.i,".user-add-form-checkbox label{line-height:38px}",""])},D4z9:function(e,t,r){"use strict";var a={render:function(){var e=this.$createElement;return(this._self._c||e)("UserAddForm")},staticRenderFns:[]};t.a=a},Dxhv:function(e,t,r){"use strict";r.d(t,"a",function(){return n});var a=r("Dd8w"),s=r.n(a),o=r("NYxO"),n=function(e){return{created:function(){this.setFormSaving(!1)},methods:s()({},Object(o.mapActions)(e,["save"]),Object(o.mapMutations)(e,["setFormSaving"])),computed:s()({},Object(o.mapState)(e,["$record","record","form"]),Object(o.mapGetters)(e,["isAddMode","isEditMode"]),{isDisabled:function(){return!!this.form.saving||!this.form.valid}})}}},FTjK:function(e,t,r){"use strict";var a={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-container",{staticClass:"user-add-form",attrs:{row:"","grid-list-sm":""}},[r("form-bar",{attrs:{disabled:!e.form.valid,to:"/owners/users",color:"orange darken-1",caption:"Save user"},on:{"on-save":e.onSaveUser}}),r("v-form",{ref:"form",model:{value:e.form.valid,callback:function(t){e.$set(e.form,"valid",t)},expression:"form.valid"}},[r("v-card",{staticClass:"pa-4"},[r("v-layout",{staticClass:"title",attrs:{row:""}},[e._v(e._s(e.$t("Operator Data")))]),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs2:""}},[r("v-select",{attrs:{items:e.comboLanguages,"item-text":"label","item-value":"id",required:"",rules:e.rules.language,label:e.$t("Language")},model:{value:e.$record.language,callback:function(t){e.$set(e.$record,"language",t)},expression:"$record.language"}})],1),r("v-flex",{attrs:{xs10:""}},[r("v-select",{attrs:{disabled:!e.$record.language,label:e.$t("Term"),"item-text":"name","item-value":"uid",items:e.list,required:"",rules:e.rules.term},model:{value:e.$record.termId,callback:function(t){e.$set(e.$record,"termId",t)},expression:"$record.termId"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:""}},[r("v-alert",{attrs:{value:!e.$record.termId,type:"info"}},[e._v("\n                    "+e._s(e.$t("Select language and term"))+"\n                ")])],1)],1),e.$record.termId?r("div",[e._l(e.paragraphs,function(t,a){return[e._l(t.treatments,function(t,s){return[r("v-layout",{key:a+"_"+s,staticClass:"ml-2"},[t.mandatory?r("v-checkbox",{staticClass:"pt-2 user-add-form-checkbox",attrs:{rules:e.rules.checkbox,label:t.code+" - "+t.text,required:t.mandatory},model:{value:t.selected,callback:function(r){e.$set(t,"selected",r)},expression:"flag.selected"}}):r("v-checkbox",{staticClass:"pt-2 user-add-form-checkbox",attrs:{label:t.code+" - "+t.text,required:t.mandatory},model:{value:t.selected,callback:function(r){e.$set(t,"selected",r)},expression:"flag.selected"}})],1)]})]}),r("v-layout",{attrs:{row:"",wrap:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:e.$t("Name"),required:"",rules:e.rules.name},model:{value:e.$record.name,callback:function(t){e.$set(e.$record,"name",t)},expression:"$record.name"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",required:"",rules:e.rules.surname,label:e.$t("Surname")},model:{value:e.$record.surname,callback:function(t){e.$set(e.$record,"surname",t)},expression:"$record.surname"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:e.$t("Email"),required:"",rules:e.rules.email},model:{value:e.$record.email,callback:function(t){e.$set(e.$record,"email",t)},expression:"$record.email"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{box:"",label:e.$t("Telephone"),required:"",rules:e.rules.telephone},model:{value:e.$record.telephone,callback:function(t){e.$set(e.$record,"telephone",t)},expression:"$record.telephone"}})],1),r("v-flex",{attrs:{xs12:""}},[r("v-select",{attrs:{"item-text":"domainPage","item-value":"domainPage",items:e.optionsPages,required:"",rules:e.rules.domainPages,box:"",label:e.$t("Page")},model:{value:e.$record.domainPage,callback:function(t){e.$set(e.$record,"domainPage",t)},expression:"$record.domainPage"}})],1)],1)],2):e._e()],1)],1)],1)},staticRenderFns:[]};t.a=a},KHKM:function(e,t,r){"use strict";var a=r("Dd8w"),s=r.n(a),o=r("NYxO");t.a={name:"FormBar",props:["to","color","disabled","caption"],computed:s()({},Object(o.mapState)("api",["isAjax"]),{isDisabled:function(){return!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},Luo4:function(e,t,r){"use strict";var a=r("pRr6"),s=r("FTjK");var o=function(e){r("3Apz")},n=r("VU/8")(a.a,s.a,!1,o,null,null);t.a=n.exports},UPhp:function(e,t,r){"use strict";var a={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[r("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[r("v-tooltip",{attrs:{right:""}},[r("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",fab:"",flat:"",small:"",to:e.to,"active-class":""},slot:"activator"},[r("v-icon",[e._v("reply")])],1),r("span",[e._v(e._s(e.$t("Back")))])],1)],1),r("v-spacer"),r("v-tooltip",{attrs:{left:""}},[r("v-btn",{staticClass:"elevation-0 mb-2",attrs:{slot:"activator",color:"green darken-3",dark:"",fab:"",small:"",disabled:e.isDisabled},on:{click:e.onSave},slot:"activator"},[r("v-icon",[e._v("save")])],1),r("span",[e._v(e._s(e.$t(e.caption)))])],1)],1)},staticRenderFns:[]};t.a=a},YlRw:function(e,t,r){(e.exports=r("FZ+f")(!1)).push([e.i,"",""])},pRr6:function(e,t,r){"use strict";var a=r("//Fk"),s=r.n(a),o=r("Dd8w"),n=r.n(o),i=r("NYxO"),l=r("r3Mr"),c=r("Dxhv");t.a={mixins:[Object(c.a)("owners/users")],components:{FormBar:l.a},watch:{"$record.language":function(e){this.onLangTermChange()},"$record.termId":function(e){this.onLangTermChange()}},data:function(){var e=this;return{paragraphs:{},domains:[],rules:{domainPages:[function(t){return!!t||e.$t("required")}],term:[function(t){return!!t||e.$t("required")}],name:[function(t){return!!t||e.$t("required")}],language:[function(t){return!!t||e.$t("required")}],checkbox:[function(t){return t||e.$t("required")}],email:[function(t){return!!t||e.$t("required")},function(t){return/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(t)||e.$t("E-mail not valid")}],telephone:[function(t){return!!t||e.$t("required")}]}}},methods:n()({},Object(i.mapActions)("terms",["load","loadToSubscribeTerm"]),Object(i.mapActions)("owners/termspages",["loadByTermId","saveUser"]),{onSaveUser:function(){var e=this,t=this.$auth.user.ownerId,r=this.optionsPages.find(function(t){return t.domainPage===e.$record.domainPage}),a=r.domain,s=r.page,o={paragraphs:this.paragraphs,$record:this.$record,domain:a,page:s,ownerId:t};this.saveUser(o).then(function(){return e.$router.push("owners/users")})},onLangTermChange:function(){var e=this,t=this.$record,r=t.termId,a=t.language;if(r){var o=[this.loadToSubscribeTerm({termId:r,language:a}).then(function(t){e.paragraphs=t}),this.loadByTermId(r)];return s.a.all(o)}}}),computed:n()({},Object(i.mapState)("terms",["list"]),Object(i.mapState)("app",["comboLanguages"]),Object(i.mapState)("owners/termspages",["pagesList"]),Object(i.mapGetters)("owners/termspages",["optionsPages"]),Object(i.mapState)("owners/users",["$record"]))}},r3Mr:function(e,t,r){"use strict";var a=r("KHKM"),s=r("UPhp"),o=r("VU/8")(a.a,s.a,!1,null,null,null);t.a=o.exports},rZau:function(e,t,r){var a=r("YlRw");"string"==typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);r("rjj0")("d31740d2",a,!0,{sourceMap:!1})},"twT+":function(e,t,r){"use strict";var a=r("Luo4");t.a={components:{UserAddForm:a.a},props:[],fetch:function(e){e.store.commit("owners/users/setRecord",{},{root:!0})}}}});