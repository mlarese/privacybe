webpackJsonp([2],{"+u1f":function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},add:{default:"Aggiungi"}}}},"/6C8":function(t,e,r){"use strict";var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-card",{staticClass:"pa-2 term-treatment"},[r("v-container",{attrs:{"grid-list-md":""}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm4:""}},[r("v-select",{staticClass:"elevation-0",attrs:{solo:"",items:[{text:"dddd"}],"item-value":"text","sv-model":"$record.language",label:t.$t("Treatment")}})],1),r("v-flex",{attrs:{xs12:"",sm4:""}},[r("v-text-field",{attrs:{"multi-line":"",box:"",label:t.$t("Text")}})],1),r("v-flex",{staticClass:"pl-4",attrs:{xs12:"",sm2:""}},[r("label",{staticClass:"switch-label"},[t._v(t._s(t.$t("Mandatory")))]),r("v-switch",{staticClass:"text-xs-center",attrs:{label:t.sw?t.$t("Yes"):t.$t("Not"),red:""},model:{value:t.sw,callback:function(e){t.sw=e},expression:"sw"}})],1),r("v-flex",{staticClass:"pl-4",attrs:{xs12:"",sm2:""}},[r("label",{staticClass:"switch-label"},[t._v(t._s(t.$t("Restrictive")))]),r("div",{staticClass:"text-xs-center"},[r("v-switch",{attrs:{label:t.sw?t.$t("Yes"):t.$t("Not"),red:""},model:{value:t.sw,callback:function(e){t.sw=e},expression:"sw"}})],1)])],1)],1)],1)};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},"0eUx":function(t,e,r){"use strict";var a=r("Dd8w"),s=r.n(a),n=r("1zEO"),i=r("9q+M"),o=r("NYxO");e.a={components:{TermTreatment:n.a,AddBtn:i.a},methods:s()({},Object(o.mapActions)("terms",["addTreatment"])),props:["paragraph","index"]}},"1zEO":function(t,e,r){"use strict";var a=r("MYFg"),s=r("/6C8"),n=!1;var i=function(t){n||r("XgpI")},o=r("VU/8")(a.a,s.a,!1,i,null,null);o.options.__file="components/Owners/Terms/TermTreatment.vue",e.a=o.exports},"4Gv5":function(t,e,r){"use strict";var a=function(){var t=this,e=t.$createElement;return(t._self._c||e)("wysiwyg",{staticClass:"term-editor",attrs:{placeholder:""},model:{value:t.text,callback:function(e){t.text=e},expression:"text"}})};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},"5GKA":function(t,e,r){"use strict";var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("h4",{staticClass:"mb-2",domProps:{textContent:t._s(t.$t("Associated flags"))}}),t._l(t.paragraph.treatments,function(t,e){return[r("term-treatment",{key:e,attrs:{index:e}})]}),r("v-layout",[r("add-btn",{attrs:{add:"Add flag"},on:{click:function(e){t.addTreatment(t.index)}}})],1)],2)};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},"8E3W":function(t,e,r){"use strict";var a=r("0eUx"),s=r("5GKA"),n=r("VU/8")(a.a,s.a,!1,null,null,null);n.options.__file="components/Owners/Terms/TermTreatments.vue",e.a=n.exports},"9q+M":function(t,e,r){"use strict";var a=r("+u1f"),s=r("gIfT"),n=!1;var i=function(t){n||r("by15")},o=r("VU/8")(a.a,s.a,!1,i,null,null);o.options.__file="components/General/AddBtn.vue",e.a=o.exports},BaHX:function(t,e,r){"use strict";var a=r("Mr1O"),s=r("FrzB"),n=!1;var i=function(t){n||r("Bjoe")},o=r("VU/8")(a.a,s.a,!1,i,null,null);o.options.__file="components/General/BtnCmds.vue",e.a=o.exports},Bjoe:function(t,e,r){var a=r("kGP/");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("7cfe9dae",a,!1,{sourceMap:!1})},BrWY:function(t,e,r){"use strict";var a=r("Dd8w"),s=r.n(a),n=r("NYxO");e.a={name:"TermTitle",computed:s()({},Object(n.mapState)("terms",["ui"]),{text:{get:function(){return this.$store.state.terms.$record.paragraphs[this.index].title[this.ui.tabLanguage]},set:function(t){var e=this.ui.tabLanguage,r=this.index;this.$store.dispatch("terms/updateTitle",{value:t,index:r,language:e})}}}),props:["index"]}},"CGk/":function(t,e,r){var a=r("Icfa");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("ff9ccf4c",a,!1,{sourceMap:!1})},En8a:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},FSwZ:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,".term-treatment .input-group{padding:0}.term-treatment .application .theme--light.input-group--text-field.input-group--text-field-box .input-group__input,.term-treatment .theme--light .input-group--text-field.input-group--text-field-box .input-group__input{background:#fff!important}.term-treatment .input-group--text-field-box:not(.input-group--textarea).input-group--multi-line label{top:0}.term-treatment .switch-label{font-size:12px}.term-treatment .input-group--multi-line .input-group__input{background:#fff!important}",""])},FrzB:function(t,e,r){"use strict";var a=function(){var t=this.$createElement;return(this._self._c||t)("v-btn",{style:{backgroundColor:this.backgroundColor,color:this.color}},[this._v(this._s(this.btnName))])};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},"Gd2/":function(t,e,r){"use strict";var a=r("BaHX");e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"}},components:{BtnCmds:a.a}}},HRKf:function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=r("v0uI"),s=r("xYVB"),n=r("VU/8")(a.a,s.a,!1,null,null,null);n.options.__file="pages/owners/terms/_id.vue",e.default=n.exports},IOxB:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},Icfa:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,".term-form .top-bar{border-bottom:1px solid silver}",""])},J38O:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,".term-editor{background:#fff}.term-editor .editr--content{font-size:13px;height:400px}",""])},LYeZ:function(t,e,r){"use strict";var a=r("Gd2/"),s=r("nTPB"),n=!1;var i=function(t){n||r("atMn")},o=r("VU/8")(a.a,s.a,!1,i,null,null);o.options.__file="components/Owners/Terms/TermsButton.vue",e.a=o.exports},MGrA:function(t,e,r){"use strict";var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-layout",[r("v-flex",[r("v-tabs",{attrs:{right:""},model:{value:t.index,callback:function(e){t.index=e},expression:"index"}},t._l(t.languages,function(e,a){return r("v-tab",{key:e.id},[t._v("\n                "+t._s(e.label)+"\n            ")])}))],1)],1)};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},MYFg:function(t,e,r){"use strict";e.a={name:"TermTreatment",data:function(){return{sw:!1}}}},Mr1O:function(t,e,r){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},btnName:{default:"Programma Publicazione"}}}},NIGx:function(t,e,r){var a=r("lF57");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("4bea2090",a,!1,{sourceMap:!1})},"Q/RV":function(t,e,r){"use strict";var a=r("WhVF"),s=r("hQP4"),n=!1;var i=function(t){n||r("NIGx")},o=r("VU/8")(a.a,s.a,!1,i,null,null);o.options.__file="components/Owners/Terms/TermsInfo.vue",e.a=o.exports},QUqz:function(t,e,r){var a=r("J38O");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("bcc06e1e",a,!1,{sourceMap:!1})},VIf4:function(t,e,r){"use strict";var a=function(){var t=this,e=t.$createElement;return(t._self._c||e)("v-text-field",{attrs:{box:"",label:t.$t("Paragraph title")},model:{value:t.text,callback:function(e){t.text=e},expression:"text"}})};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},Vg8e:function(t,e,r){"use strict";var a=r("Dd8w"),s=r.n(a),n=r("hrz3"),i=r("wCFF"),o=r("aYyC"),l=r("LYeZ"),c=r("8E3W"),u=r("Q/RV"),d=r("NYxO");e.a={components:{LanguageTab:n.a,TermEditor:i.a,TermsButton:l.a,TermTitle:o.a,TermTreatments:c.a,TermsInfo:u.a},computed:s()({},Object(d.mapState)("terms",["ui","$record","form"]),{title:{get:function(){return this.$store.state.terms.$record.paragraphs[this.index]},set:function(t){var e=this.ui.tabLanguage,r=this.index;this.$store.dispatch("terms/updateTitle",{value:t,index:r,language:e})}},paragraphs:function(){return this.$record.paragraphs}})}},WhVF:function(t,e,r){"use strict";e.a={props:{record:{default:function(){return{status:"",published:null,created:"",modified:"",suspended:""}}}}}},XgpI:function(t,e,r){var a=r("FSwZ");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("4d9ef3ba",a,!1,{sourceMap:!1})},XkMJ:function(t,e,r){"use strict";var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{attrs:{fluid:"","grid-list-lg":""}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{staticClass:"term-form",attrs:{xs9:""}},[r("v-layout",{staticClass:"top-bar",attrs:{row:"",wrap:"","mb-3":""}},[r("v-flex",{staticClass:"btn-back pt-2",attrs:{xs4:""}},[r("v-btn",{attrs:{flat:"",small:"",to:"/owners/terms","active-class":""}},[r("v-icon",[t._v("reply")]),t._v("\n                        "+t._s(t.$t("Back"))+"\n                    ")],1)],1),r("v-flex",{attrs:{xs8:"","mb-1":""}},[r("language-tab")],1)],1),r("v-form",{model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:""}},[r("v-text-field",{attrs:{label:t.$t("Term name"),required:"",box:""},model:{value:t.$record.name,callback:function(e){t.$set(t.$record,"name",e)},expression:"$record.name"}})],1)],1)],1),t._l(t.paragraphs,function(e,a){return[r("v-card",{staticClass:"pa-2 mb-5"},[r("v-toolbar",{staticClass:"elevation-1"},[r("v-toolbar-title",[t._v(t._s(t.$t("Paragraph"))+" "+t._s(a+1))])],1),r("v-flex",{attrs:{xs12:""}},[r("term-title",{key:a,attrs:{index:a}})],1),r("v-flex",{attrs:{xs12:"","mb-2":""}},[r("h4",{domProps:{textContent:t._s(t.$t("Paragraph text"))}}),r("term-editor",{key:a,attrs:{index:a}})],1),r("v-flex",{attrs:{xs12:""}},[r("term-treatments",{attrs:{paragraph:e,index:a}})],1)],1)]})],2),r("v-flex",{attrs:{xs3:""}},[r("v-layout",{attrs:{row:"","mt-5":""}}),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:""}},[r("v-card",{staticClass:"pa-2",staticStyle:{"min-height":"500px"},attrs:{flat:""}},[r("terms-info",{attrs:{record:t.$record}})],1)],1)],1)],1)],1)],1)};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},aYyC:function(t,e,r){"use strict";var a=r("BrWY"),s=r("VIf4"),n=!1;var i=function(t){n||r("llQ/")},o=r("VU/8")(a.a,s.a,!1,i,null,null);o.options.__file="components/Owners/Terms/TermTitle.vue",e.a=o.exports},atMn:function(t,e,r){var a=r("IOxB");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("0ce7310b",a,!1,{sourceMap:!1})},by15:function(t,e,r){var a=r("gCXK");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("3944110e",a,!1,{sourceMap:!1})},ejQN:function(t,e,r){"use strict";var a=r("Dd8w"),s=r.n(a),n=r("NYxO");e.a={name:"LanguageTab",methods:s()({},Object(n.mapMutations)("terms",["setTabLanguage"])),watch:{index:function(){var t=this.languages[this.index].id;this.setTabLanguage(t)}},data:function(){return{index:0}},computed:s()({},Object(n.mapState)("app",["languages"]),Object(n.mapState)("terms",["ui"]))}},gCXK:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},gIfT:function(t,e,r){"use strict";var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"add-btn"},[r("v-btn",t._b({style:{backgroundColor:t.backgroundColor,color:t.color},attrs:{fab:"",small:""},on:{click:t.$listeners.click}},"v-btn",t.$attrs,!1),[r("v-icon",{attrs:{small:""}},[t._v("add")])],1),r("span",{style:(t.color,t.backgroundColor)},[t._v(t._s(t.$t(t.add)))])],1)};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},hQP4:function(t,e,r){"use strict";var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"pt-3 terms-info"},[r("v-layout",{attrs:{row:"","justify-center":""}},[r("p",{staticClass:"title"},[t._v(t._s(t.$t("INFO")))])]),r("v-layout",[r("v-flex",{staticClass:"text-xs-right",staticStyle:{"border-right":"1px solid black"},attrs:{"pa-2":""}},[r("div",[t._v(t._s(t.$t("Status")))]),r("div",{staticClass:"py-1"},[t._v(t._s(t.$t("Created_")))]),t.record.published?r("div",{staticClass:"py-1"},[t._v(t._s(t.$t("Published_")))]):t._e(),t.record.modified?r("div",{staticClass:"py-1"},[t._v(t._s(t.$t("Modified_")))]):t._e(),t.record.suspended?r("div",{staticClass:"py-1"},[t._v(t._s(t.$t("Suspended_")))]):t._e()]),r("v-flex",{attrs:{"pa-2":"",xs6:""}},[r("div",[t._v(t._s(t.$t(t.record.status)))]),r("div",{staticClass:"py-1"},[t._v(t._s(t._f("dmy")(t.record.created)))]),t.record.published?r("div",{staticClass:"py-1"},[t._v(t._s(t._f("dmy")(t.record.published)))]):t._e(),t.record.modified?r("div",{staticClass:"py-1"},[t._v(t._s(t._f("dmy")(t.record.modified)))]):t._e(),t.record.suspended?r("div",{staticClass:"py-1"},[t._v(t._s(t._f("dmy")(t.record.suspended)))]):t._e()])],1)],1)};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},hrz3:function(t,e,r){"use strict";var a=r("ejQN"),s=r("MGrA"),n=r("VU/8")(a.a,s.a,!1,null,null,null);n.options.__file="components/Owners/Terms/LanguageTab.vue",e.a=n.exports},"kGP/":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},lF57:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"llQ/":function(t,e,r){var a=r("En8a");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);r("rjj0")("a5df70f6",a,!1,{sourceMap:!1})},nTPB:function(t,e,r){"use strict";var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"pt-5 term-button",staticStyle:{"text-align":"center"}},[r("v-layout",{attrs:{row:"","justify-center":""}},[r("p",{staticClass:"title"},[t._v(t._s(t.$t("Publication Program")))])]),r("v-layout",{attrs:{"justify-center":""}},[r("v-flex",{attrs:{xs3:"",sm3:""}},[r("el-date-picker",{staticClass:"my-2",attrs:{type:"datetime",placeholder:t.$t("Select date and time")},model:{value:t.date,callback:function(e){t.date=e},expression:"date"}})],1)],1),r("btn-cmds"),r("v-layout",{attrs:{row:"","justify-center":"","mt-3":""}},[r("p",[t._v(t._s(t.$t("Or")))])]),r("v-btn",{style:{backgroundColor:t.backgroundColor}},[r("span",{style:{color:t.color}},[t._v(t._s(t.$t("Publish Now")))])])],1)};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},s6XL:function(t,e,r){"use strict";var a=r("Vg8e"),s=r("XkMJ"),n=!1;var i=function(t){n||r("CGk/")},o=r("VU/8")(a.a,s.a,!1,i,null,null);o.options.__file="components/Owners/Terms/TermForm.vue",e.a=o.exports},v0uI:function(t,e,r){"use strict";var a=r("//Fk"),s=r.n(a),n=r("s6XL"),i={root:!0};e.a={components:{TermForm:n.a},fetch:function(t){var e=t.store,r=t.params.id,a=[e.dispatch("terms/load",{id:r},i),e.dispatch("treatments/load",{},i)];return s.a.all(a)}}},wCFF:function(t,e,r){"use strict";var a=r("zUAD"),s=r("4Gv5"),n=!1;var i=function(t){n||r("QUqz")},o=r("VU/8")(a.a,s.a,!1,i,null,null);o.options.__file="components/Owners/Terms/TermEditor.vue",e.a=o.exports},xYVB:function(t,e,r){"use strict";var a=function(){var t=this.$createElement;return(this._self._c||t)("term-form")};a._withStripped=!0;var s={render:a,staticRenderFns:[]};e.a=s},zUAD:function(t,e,r){"use strict";var a=r("Dd8w"),s=r.n(a),n=r("NYxO");e.a={name:"TermEditor",computed:s()({},Object(n.mapState)("terms",["ui"]),{text:{get:function(){return this.$store.state.terms.$record.paragraphs[this.index].text[this.ui.tabLanguage]},set:function(t){var e=this.ui.tabLanguage,r=this.index;this.$store.dispatch("terms/updateParagraph",{value:t,index:r,language:e})}}}),props:["index"]}}});