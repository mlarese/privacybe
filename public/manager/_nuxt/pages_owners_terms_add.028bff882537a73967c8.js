webpackJsonp([1],{"+xd4":function(t,e,s){var r=s("R+NS");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("d2594b02",r,!1,{sourceMap:!1})},"07cl":function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{attrs:{fluid:"","grid-list-lg":""}},[s("v-layout",{attrs:{row:""}},[s("v-flex",{staticClass:"term-form",attrs:{xs9:""}},[s("v-btn",{attrs:{color:"pink",dark:"",fixed:"",absolute:"",bottom:"",right:"",fab:"","mb-5":""},on:{click:t.scrollTop}},[s("v-icon",[t._v("keyboard_arrow_up")])],1),s("v-layout",{staticClass:"top-bar",attrs:{row:"",wrap:"","mb-3":""}},[s("v-flex",{staticClass:"btn-back pt-2",attrs:{xs4:""}},[s("v-btn",{attrs:{flat:"",small:"",to:"/owners/terms","active-class":""}},[s("v-icon",[t._v("reply")]),t._v("\n                        "+t._s(t.$t("Back"))+"\n                    ")],1)],1),s("v-flex",{attrs:{xs8:"","mb-1":""}},[s("language-tab")],1)],1),s("v-form",{model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[s("v-layout",{attrs:{row:""}},[s("v-flex",{attrs:{xs12:""}},[s("v-text-field",{attrs:{label:t.$t("Term name"),required:"",box:""},model:{value:t.$record.name,callback:function(e){t.$set(t.$record,"name",e)},expression:"$record.name"}})],1)],1)],1),t._l(t.paragraphs,function(e,r){return[s("v-card",{staticClass:"mb-2"},[s("v-toolbar",{staticClass:"elevation-1"},[s("v-toolbar-title",[t._v("\n                                "+t._s(t.$t("Paragraph"))+" "+t._s(r+1)+"\n\n                            ")]),s("v-spacer"),r>0?s("cancel-btn",{on:{click:function(e){t.removeParagraph(r)}}}):t._e()],1),s("v-flex",{attrs:{xs12:""}},[s("term-title",{key:r,attrs:{index:r}})],1),s("v-flex",{attrs:{xs12:"","mb-2":""}},[s("h4",{domProps:{textContent:t._s(t.$t("Paragraph text"))}}),s("term-editor",{key:r,attrs:{index:r}})],1),s("v-flex",{attrs:{xs12:""}},[s("term-treatments",{attrs:{paragraph:e,index:r}})],1)],1)]}),s("v-layout",[s("v-flex",[s("add-btn",{attrs:{add:"Add paragraph"},on:{click:function(e){t.addParagraph(t.index)}}})],1)],1),s("v-layout",[s("pages",{attrs:{pages:t.$record.pages}})],1)],2),s("v-flex",{attrs:{xs3:""}},[s("v-layout",{attrs:{row:"","mt-5":""}}),s("v-layout",{attrs:{row:""}},[s("v-flex",{attrs:{xs12:""}},[s("v-card",{staticClass:"pa-2 mb-2",attrs:{flat:""}},[s("v-flex",{attrs:{xs12:""}},[s("terms-info",{attrs:{record:t.$record}})],1),s("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[s("v-btn",{staticClass:"elevation-0",attrs:{dark:"",small:"",color:"orange darken-1"},on:{click:t.onSave}},[t._v("\n                               "+t._s(t.$t("Save changes"))+"\n                           ")])],1),!t.isEditMode||t.isPublished||t.statusChanged?t._e():s("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[s("v-btn",{staticClass:"elevation-0",attrs:{dark:"",small:"",color:"orange darken-1"},on:{click:t.onPublish}},[t._v("\n                               "+t._s(t.$t("Publish"))+"\n                           ")])],1),t.isEditMode&&t.isPublished&&!t.statusChanged?s("v-flex",{staticClass:"text-xs-center",attrs:{xs12:""}},[s("v-btn",{staticClass:"elevation-0",attrs:{dark:"",small:"",color:"orange darken-1"},on:{click:t.onSuspend}},[t._v("\n                               "+t._s(t.$t("Suspend"))+"\n                           ")])],1):t._e()],1),t.$record.options?s("v-flex",{staticClass:"text-xs-center pa-0",attrs:{xs12:""}},[s("terms-history",{attrs:{history:t.$record.options.history}})],1):t._e()],1)],1)],1)],1)],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},"0pYN":function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".term-history{font-size:11px}.term-history .term-history-table{padding-top:3px;border-top:1px solid #d3d3d3}",""])},"0xPC":function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement;return(t._self._c||e)("wysiwyg",{staticClass:"term-editor",attrs:{placeholder:""},model:{value:t.text,callback:function(e){t.text=e},expression:"text"}})};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},"1AdA":function(t,e,s){"use strict";var r=s("wj/a");e.a={components:{TermHistory:r.a},props:["history"]}},"1zEO":function(t,e,s){"use strict";var r=s("Qyen"),a=s("K5vX"),n=!1;var i=function(t){n||s("wjl1")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\TermTreatment.vue",e.a=o.exports},"2Vud":function(t,e,s){var r=s("DzX8");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("f0b617c2",r,!1,{sourceMap:!1})},"32aV":function(t,e,s){var r=s("Oxar");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("6388954e",r,!1,{sourceMap:!1})},"4XFp":function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},"4kx0":function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"pt-3 terms-info"},[s("v-layout",{attrs:{row:"","justify-center":""}},[s("p",{staticClass:"title"},[t._v(t._s(t.$t("INFO")))])]),s("v-layout",{staticClass:"terms-info-data"},[s("v-flex",{staticClass:"text-xs-right",staticStyle:{"border-right":"1px solid black"},attrs:{"pa-2":""}},[s("div",[t._v(t._s(t.$t("Status")))]),s("div",{staticClass:"py-1"},[t._v(t._s(t.$t("Created_")))]),t.record.published?s("div",{staticClass:"py-1"},[t._v(t._s(t.$t("Published_")))]):t._e(),t.record.modified?s("div",{staticClass:"py-1"},[t._v(t._s(t.$t("Modified_")))]):t._e(),t.record.suspended?s("div",{staticClass:"py-1"},[t._v(t._s(t.$t("Suspended_")))]):t._e()]),s("v-flex",{attrs:{"pa-2":"",xs6:""}},[s("div",[t._v(t._s(t.$t(t.record.status)))]),s("div",{staticClass:"py-1"},[t._v(t._s(t._f("dmy")(t.record.created)))]),t.record.published?s("div",{staticClass:"py-1"},[t._v(t._s(t._f("dmy")(t.record.published)))]):t._e(),t.record.modified?s("div",{staticClass:"py-1"},[t._v(t._s(t._f("dmy")(t.record.modified)))]):t._e(),t.record.suspended?s("div",{staticClass:"py-1"},[t._v(t._s(t._f("dmy")(t.record.suspended)))]):t._e()])],1)],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},"8E3W":function(t,e,s){"use strict";var r=s("pKUV"),a=s("p9Ad"),n=s("VU/8")(r.a,a.a,!1,null,null,null);n.options.__file="components\\Owners\\Terms\\TermTreatments.vue",e.a=n.exports},"8Icd":function(t,e,s){"use strict";var r=s("//Fk"),a=s.n(r),n=s("s6XL"),i={root:!0};e.a={components:{TermForm:n.a},fetch:function(t){var e=t.store;t.params;e.commit("terms/setAddMode",null,i);var s=[e.dispatch("terms/load",{id:"_empty_"},i),e.dispatch("treatments/load",{},i),e.dispatch("domains/load",{},i)];return a.a.all(s)}}},"8QJY":function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"page py-1"},[s("v-card",{staticStyle:{"border-bottom":"1px solid lightgrey"}},[s("v-layout",{staticClass:"px-4 py-0",attrs:{row:""}},[s("v-flex",{attrs:{xs4:""}},[s("v-select",{staticClass:"page-domain-select",attrs:{label:t.$t("Domain"),items:t.list,"item-value":"name","item-text":"name",disabled:!t.page.phantom,required:""},model:{value:t.page.domain,callback:function(e){t.$set(t.page,"domain",e)},expression:"page.domain"}})],1),s("v-flex",{attrs:{xs6:""}},[s("v-text-field",{attrs:{disabled:!t.page.phantom,required:"",box:"",label:t.$t("Page")},model:{value:t.page.page,callback:function(e){t.$set(t.page,"page",e)},expression:"page.page"}})],1),s("v-flex",{attrs:{xs2:""}},[s("cancel-btn",{on:{click:t.onDelete}})],1)],1)],1)],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},"9q+M":function(t,e,s){"use strict";var r=s("YxPU"),a=s("hnuB"),n=!1;var i=function(t){n||s("PnoX")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\General\\AddBtn.vue",e.a=o.exports},ASl1:function(t,e,s){"use strict";var r=function(){var t=this.$createElement;return(this._self._c||t)("term-form")};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},ArL2:function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"pt-5 term-button",staticStyle:{"text-align":"center"}},[s("v-layout",{attrs:{row:"","justify-center":""}},[s("p",{staticClass:"title"},[t._v(t._s(t.$t("Publication Program")))])]),s("v-layout",{attrs:{"justify-center":""}},[s("v-flex",{attrs:{xs3:"",sm3:""}},[s("el-date-picker",{staticClass:"my-2",attrs:{type:"datetime",placeholder:t.$t("Select date and time")},model:{value:t.date,callback:function(e){t.date=e},expression:"date"}})],1)],1),s("btn-cmds"),s("v-layout",{attrs:{row:"","justify-center":"","mt-3":""}},[s("p",[t._v(t._s(t.$t("Or")))])]),s("v-btn",{style:{backgroundColor:t.backgroundColor}},[s("span",{style:{color:t.color}},[t._v(t._s(t.$t("Publish Now")))])])],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},BaHX:function(t,e,s){"use strict";var r=s("RfLG"),a=s("ro4c"),n=!1;var i=function(t){n||s("JGRt")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\General\\BtnCmds.vue",e.a=o.exports},DzX8:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".term-editor{background:#fff}.term-editor .editr--content{font-size:13px;height:400px}",""])},EemP:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},JGRt:function(t,e,s){var r=s("LJRO");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("991b3d0e",r,!1,{sourceMap:!1})},JHto:function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement;return(t._self._c||e)("v-text-field",{attrs:{box:"",label:t.$t("Paragraph title")},model:{value:t.text,callback:function(e){t.text=e},expression:"text"}})};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},K5vX:function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-card",{staticClass:"pa-2 term-treatment"},[s("v-container",{attrs:{"grid-list-md":""}},[s("v-layout",{attrs:{row:""}},[s("v-flex",{attrs:{xs12:"",sm3:""}},[s("v-select",{attrs:{items:t.list,"item-text":"name","item-value":"code",label:t.$t("Treatment")},model:{value:t.item.name,callback:function(e){t.$set(t.item,"name",e)},expression:"item.name"}})],1),s("v-flex",{attrs:{xs12:"",sm4:""}},[s("v-text-field",{attrs:{"multi-line":"",box:"",label:t.$t("Text")},model:{value:t.text[t.ui.tabLanguage],callback:function(e){t.$set(t.text,t.ui.tabLanguage,e)},expression:"text[ui.tabLanguage]"}})],1),s("v-flex",{staticClass:"pl-4",attrs:{xs12:"",sm2:""}},[s("label",{staticClass:"switch-label"},[t._v(t._s(t.$t("Mandatory")))]),s("v-switch",{staticClass:"text-xs-center",attrs:{label:t.item.mandatory?t.$t("Yes"):t.$t("Not"),red:""},model:{value:t.item.mandatory,callback:function(e){t.$set(t.item,"mandatory",e)},expression:"item.mandatory"}})],1),s("v-flex",{staticClass:"pl-4",attrs:{xs12:"",sm2:""}},[s("label",{staticClass:"switch-label"},[t._v(t._s(t.$t("Restrictive")))]),s("div",{staticClass:"text-xs-center"},[s("v-switch",{attrs:{label:t.item.restrictive?t.$t("Yes"):t.$t("Not"),red:""},model:{value:t.item.restrictive,callback:function(e){t.$set(t.item,"restrictive",e)},expression:"item.restrictive"}})],1)]),s("v-flex",{attrs:{xs12:"",sm1:""}},[s("cancel-btn",{on:{click:function(e){t.onRemoveTreatment(t.index)}}})],1)],1)],1)],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},K7xp:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".page-domain-select.input-group--dirty label{top:24px!important;left:4px}",""])},LJRO:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},LYeZ:function(t,e,s){"use strict";var r=s("cgkN"),a=s("ArL2"),n=!1;var i=function(t){n||s("SB3v")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\TermsButton.vue",e.a=o.exports},MH2C:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),n=s("NYxO");e.a={name:"TermTitle",computed:a()({},Object(n.mapState)("terms",["ui"]),{text:{get:function(){return this.$store.state.terms.$record.paragraphs[this.index].title[this.ui.tabLanguage]},set:function(t){var e=this.ui.tabLanguage,s=this.index;this.$store.dispatch("terms/updateTitle",{value:t,index:s,language:e})}}}),props:["index"]}},OAwm:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".terms-info .terms-info-data{font-size:12px}",""])},Oxar:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".terms-history{border:1px solid #d3d3d3}.terms-history .terms-history-title{font-size:12px!important;font-weight:700;padding-top:6px;padding-bottom:6px}",""])},PRvV:function(t,e,s){"use strict";var r=function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",{staticClass:"terms-history ma-0 pa-0",attrs:{fluid:""}},[e("v-layout",{attrs:{row:""}},[e("v-flex",{attrs:{xs12:""}},[e("div",{staticClass:"terms-history-title"},[this._v(this._s(this.$t("HISTORY ACTIONS")))])])],1),this._l(this.history,function(t,s){return e("v-layout",{key:s,attrs:{row:""}},[e("v-flex",{staticClass:"pa-0 mb-2",attrs:{xs12:""}},[e("term-history",{attrs:{history:t}})],1)],1)})],2)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},PnoX:function(t,e,s){var r=s("i7uY");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("3876ef1d",r,!1,{sourceMap:!1})},"Q/RV":function(t,e,s){"use strict";var r=s("pC/u"),a=s("4kx0"),n=!1;var i=function(t){n||s("m+6W")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\TermsInfo.vue",e.a=o.exports},Qyen:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),n=s("NYxO"),i=s("dOit");e.a={name:"TermTreatment",props:["index","paraindex"],components:{CancelBtn:i.a},methods:a()({},Object(n.mapMutations)("terms",["updateTreatmentText"]),{onRemoveTreatment:function(t){confirm(this.$t("Do you confirm?"))&&this.paragraph.treatments.splice(t,1)}}),computed:a()({},Object(n.mapState)("treatments",["list"]),Object(n.mapState)("terms",["ui","$record"]),{language:function(){return this.ui.tabLanguage},paragraph:function(){return this.$record.paragraphs[this.paraindex]},item:{get:function(){return this.paragraph.treatments[this.index]}},text:{get:function(){return this.item.text}}})}},"R+NS":function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},RfLG:function(t,e,s){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},btnName:{default:"Programma Publicazione"}}}},Rxz5:function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-layout",[s("v-flex",[s("v-tabs",{attrs:{right:""},model:{value:t.index,callback:function(e){t.index=e},expression:"index"}},[t._l(t.languages,function(e,r){return[e.active?s("v-tab",{key:e.id},[t._v("\n                    "+t._s(e.label)+"\n                ")]):t._e()]})],2)],1)],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},SB3v:function(t,e,s){var r=s("haEn");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("4b84866f",r,!1,{sourceMap:!1})},TjOk:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),n=s("NYxO");e.a={name:"TermEditor",computed:a()({},Object(n.mapState)("terms",["ui"]),{text:{get:function(){return this.$store.state.terms.$record.paragraphs[this.index].text[this.ui.tabLanguage]},set:function(t){var e=this.ui.tabLanguage,s=this.index;this.$store.dispatch("terms/updateParagraph",{value:t,index:s,language:e})}}}),props:["index"]}},YxPU:function(t,e,s){"use strict";e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"},add:{default:"Aggiungi"}}}},Zbrq:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),n=s("NYxO"),i=s("dOit");e.a={name:"Page",methods:{onDelete:function(){confirm(this.$t("Do you confirm?"))&&(this.page.phantom?this.$record.pages.splice(this.index,1):this.page.deleted=!0)}},components:{CancelBtn:i.a},computed:a()({},Object(n.mapState)("domains",["list"]),Object(n.mapState)("terms",["$record"]),{page:function(){return this.$record.pages[this.index]}}),props:["index"]}},a7rw:function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"term-history pt-0 text-xs-left",attrs:{fluid:""}},[s("v-layout",{staticClass:"pt-0 px-3",attrs:{row:""}},[s("table",{staticClass:"term-history-table",attrs:{width:"100%"}},[s("tr",[s("td",[s("b",[t._v(t._s(t.$t(t.history.action)))])]),s("td",{staticClass:"text-xs-right"})]),s("tr",[s("td",[t._v(t._s(t.$t("Date"))+": "+t._s(t._f("dmy")(t.history.date))+"  "+t._s(t.$t("Hour"))+": "+t._s(t._f("time")(t.history.date)))]),s("td",{staticClass:"text-xs-right"})]),s("tr",[s("td",[t._v(t._s(t.$t("User"))+": "+t._s(t.history.user.userName))]),s("td",{staticClass:"text-xs-right"})]),t.history.description?s("tr",[s("td",[t._v(t._s(t.$t("Description"))+": "+t._s(t.history.description))]),s("td",{staticClass:"text-xs-right"})]):t._e()])])],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},aYyC:function(t,e,s){"use strict";var r=s("MH2C"),a=s("JHto"),n=!1;var i=function(t){n||s("+xd4")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\TermTitle.vue",e.a=o.exports},bLMp:function(t,e,s){"use strict";var r=s("1AdA"),a=s("PRvV"),n=!1;var i=function(t){n||s("32aV")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\TermsHistory.vue",e.a=o.exports},cRce:function(t,e,s){"use strict";var r=s("Zbrq"),a=s("8QJY"),n=!1;var i=function(t){n||s("v3ic")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\Page.vue",e.a=o.exports},cTpw:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),n=s("hrz3"),i=s("wCFF"),o=s("aYyC"),c=s("LYeZ"),l=s("8E3W"),u=s("pwP8"),d=s("bLMp"),p=s("Q/RV"),m=s("9q+M"),f=s("NYxO"),v=s("dOit");e.a={components:{LanguageTab:n.a,TermEditor:i.a,TermsButton:c.a,TermTitle:o.a,TermTreatments:l.a,TermsInfo:p.a,TermsHistory:d.a,AddBtn:m.a,CancelBtn:v.a,Pages:u.a},methods:a()({},Object(f.mapActions)("terms",["save"]),Object(f.mapMutations)("terms",["addHistory"]),{scrollTop:function(){window.scrollTo({top:0,behavior:"smooth"})},addParagraph:function(){confirm(this.$t("Do you confirm?"))&&this.paragraphs.push({title:"",text:{it:""},treatments:[]})},removeParagraph:function(t){confirm(this.$t("Do you confirm?"))&&this.paragraphs.splice(t,1)},onPublish:function(){confirm(this.$t("Do you confirm?"))&&(this.addHistory({action:"publication",date:new Date,user:this.user,description:""}),this.statusChanged=!0,this.$record.status="published")},onSuspend:function(){confirm(this.$t("Do you confirm?"))&&(this.addHistory({action:"suspension",date:new Date,user:this.user,description:""}),this.statusChanged=!0,this.$record.status="suspended")},onSave:function(){var t=this;this.termIsDirty&&this.addHistory({action:"Term changes update",date:new Date,user:this.user,description:""}),this.save({data:this.$record,id:this.$record.uid}).then(function(e){return t.$router.push("/owners/terms"),e})}}),watch:{"$record.name":function(){this.termIsDirty=!0},"$record.paragraphs":{deep:!0,handler:function(){this.termIsDirty=!0}}},data:function(){return{statusChanged:!1,termIsDirty:!1}},computed:a()({},Object(f.mapState)("terms",["ui","$record","form"]),Object(f.mapGetters)("terms",["isEditMode"]),Object(f.mapState)("auth",["user"]),{isPublished:function(){return"published"===this.$record.status},isSuspended:function(){return"published"===this.$record.status},title:{get:function(){return this.$store.state.terms.$record.paragraphs[this.index].title[this.ui.tabLanguage]},set:function(t){var e=this.ui.tabLanguage,s=this.index;this.$store.dispatch("terms/updateTitle",{value:t,index:s,language:e})}},paragraphs:function(){return this.$record.paragraphs}})}},cgkN:function(t,e,s){"use strict";var r=s("BaHX");e.a={props:{backgroundColor:{default:"#AEEA00"},color:{default:"white"}},components:{BtnCmds:r.a}}},d5OF:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),n=s("cRce"),i=s("NYxO"),o=s("9q+M");e.a={name:"Pages",methods:{addUrl:function(){this.$record.pages.push({domain:null,page:null,termUid:this.$record.uid,phantom:!0})}},computed:a()({},Object(i.mapState)("terms",["$record"])),components:{Page:n.a,AddBtn:o.a},props:["pages"]}},dOit:function(t,e,s){"use strict";var r=s("njOx"),a=s("r6IP"),n=!1;var i=function(t){n||s("f+Et")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\General\\CancelBtn.vue",e.a=o.exports},dewR:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),n=s("NYxO");e.a={name:"LanguageTab",methods:a()({},Object(n.mapMutations)("terms",["setTabLanguage"])),watch:{index:function(){var t=this.languages[this.index].id;this.setTabLanguage(t)}},data:function(){return{index:0}},computed:a()({},Object(n.mapState)("terms",["ui"]),Object(n.mapState)("app",["languages"]))}},"f+Et":function(t,e,s){var r=s("EemP");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("0d2ea79a",r,!1,{sourceMap:!1})},gtNR:function(t,e,s){var r=s("4XFp");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("03268868",r,!1,{sourceMap:!1})},gvHZ:function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"pages pa-1",attrs:{fluid:""}},[s("v-card",[s("v-toolbar",{staticClass:"elevation-1"},[s("v-toolbar-title",[t._v("\n                "+t._s(t.$t("Terms Url"))+"\n            ")])],1),s("v-flex",{attrs:{xs12:"","mt-2":""}},[t._l(t.pages,function(e,r){return[e.deleted?t._e():s("page",{key:r,attrs:{index:r}})]})],2),s("v-flex",[s("add-btn",{attrs:{add:"Add url"},on:{click:function(e){t.addUrl()}}})],1)],1)],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},haEn:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},hnuB:function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"add-btn"},[s("v-btn",t._b({style:{backgroundColor:t.backgroundColor,color:t.color},attrs:{fab:"",small:""},on:{click:t.$listeners.click}},"v-btn",t.$attrs,!1),[s("v-icon",{attrs:{small:""}},[t._v("add")])],1),s("span",{style:(t.color,t.backgroundColor)},[t._v(t._s(t.$t(t.add)))])],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},hrz3:function(t,e,s){"use strict";var r=s("dewR"),a=s("Rxz5"),n=s("VU/8")(r.a,a.a,!1,null,null,null);n.options.__file="components\\Owners\\Terms\\LanguageTab.vue",e.a=n.exports},i7uY:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},"k+U5":function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".term-form .top-bar{border-bottom:1px solid silver}",""])},"m+6W":function(t,e,s){var r=s("OAwm");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("0d147348",r,!1,{sourceMap:!1})},"mG/w":function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,".term-treatment .input-group{padding:0}.term-treatment .application .theme--light.input-group--text-field.input-group--text-field-box .input-group__input,.term-treatment .theme--light .input-group--text-field.input-group--text-field-box .input-group__input{background:#fff!important}.term-treatment .input-group--text-field-box:not(.input-group--textarea).input-group--multi-line label{top:0}.term-treatment .switch-label{font-size:12px}.term-treatment .input-group--multi-line .input-group__input{background:#fff!important}",""])},njOx:function(t,e,s){"use strict";e.a={props:{backgroundColor:{default:"red"}}}},nm9n:function(t,e,s){"use strict";e.a={name:"TermHistory",props:["history"]}},p9Ad:function(t,e,s){"use strict";var r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("h4",{staticClass:"mb-2",domProps:{textContent:t._s(t.$t("Associated flags"))}}),t._l(t.paragraph.treatments,function(e,r){return[s("term-treatment",{key:r,attrs:{index:r,paraindex:t.index}})]}),s("v-layout",[s("add-btn",{attrs:{add:"Add flag"},on:{click:function(e){t.addTreatment(t.index)}}})],1)],2)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},"pC/u":function(t,e,s){"use strict";e.a={props:{record:{default:function(){return{status:"",published:null,created:"",modified:"",suspended:""}}}}}},pKUV:function(t,e,s){"use strict";var r=s("Dd8w"),a=s.n(r),n=s("1zEO"),i=s("9q+M"),o=s("NYxO");e.a={components:{TermTreatment:n.a,AddBtn:i.a},methods:a()({},Object(o.mapActions)("terms",["addTreatment"])),props:["paragraph","index"]}},pwP8:function(t,e,s){"use strict";var r=s("d5OF"),a=s("gvHZ"),n=!1;var i=function(t){n||s("gtNR")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\Pages.vue",e.a=o.exports},q1wW:function(t,e,s){var r=s("k+U5");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("52020c92",r,!1,{sourceMap:!1})},r6IP:function(t,e,s){"use strict";var r=function(){var t=this.$createElement,e=this._self._c||t;return e("v-btn",this._b({style:{backgroundColor:this.backgroundColor},attrs:{flat:"",icon:"",color:"red"},on:{click:this.$listeners.click}},"v-btn",this.$attrs,!1),[e("v-icon",{attrs:{medium:""}},[this._v("delete")])],1)};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},ro4c:function(t,e,s){"use strict";var r=function(){var t=this.$createElement;return(this._self._c||t)("v-btn",{style:{backgroundColor:this.backgroundColor,color:this.color}},[this._v(this._s(this.btnName))])};r._withStripped=!0;var a={render:r,staticRenderFns:[]};e.a=a},s6XL:function(t,e,s){"use strict";var r=s("cTpw"),a=s("07cl"),n=!1;var i=function(t){n||s("q1wW")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\TermForm.vue",e.a=o.exports},"sF1+":function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var r=s("8Icd"),a=s("ASl1"),n=s("VU/8")(r.a,a.a,!1,null,null,null);n.options.__file="pages\\owners\\terms\\add.vue",e.default=n.exports},v3ic:function(t,e,s){var r=s("K7xp");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("4d138629",r,!1,{sourceMap:!1})},vlC8:function(t,e,s){var r=s("0pYN");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("6f2b3d56",r,!1,{sourceMap:!1})},wCFF:function(t,e,s){"use strict";var r=s("TjOk"),a=s("0xPC"),n=!1;var i=function(t){n||s("2Vud")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\TermEditor.vue",e.a=o.exports},"wj/a":function(t,e,s){"use strict";var r=s("nm9n"),a=s("a7rw"),n=!1;var i=function(t){n||s("vlC8")},o=s("VU/8")(r.a,a.a,!1,i,null,null);o.options.__file="components\\Owners\\Terms\\TermHistory.vue",e.a=o.exports},wjl1:function(t,e,s){var r=s("mG/w");"string"==typeof r&&(r=[[t.i,r,""]]),r.locals&&(t.exports=r.locals);s("rjj0")("3e95997b",r,!1,{sourceMap:!1})}});