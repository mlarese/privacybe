webpackJsonp([16],{"/gZ2":function(t,e){t.exports=function(t,e,a,o,s){return s(t,function(t,s,n){a=o?(o=!1,t):e(a,t,s,n)}),a}},"3Ygm":function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".term-form .top-bar{border-bottom:1px solid silver}.form-term-right-drawer .navigation-drawer__border{display:none;width:0}",""])},"3rZI":function(t,e){t.exports=function(t,e,a,o){var s=-1,n=null==t?0:t.length;for(o&&n&&(a=t[++s]);++s<n;)a=e(a,t[s],s,t);return a}},"4Z5a":function(t,e,a){"use strict";var o=a("Dd8w"),s=a.n(o),n=a("NYxO");e.a={name:"LanguageTab",methods:s()({},Object(n.mapMutations)("layouts",["setTabLanguage"])),watch:{index:function(){var t=this.languages[this.index].id;this.setTabLanguage(t)}},data:function(){return{index:0}},computed:s()({},Object(n.mapState)("layouts",["ui"]),Object(n.mapState)("app",["languages"]),{tabLanguages:function(){return[{id:"it",label:"ITA",active:!0},{id:"en",label:"ENG",active:!0},{id:"de",label:"DEU",active:!0}]}})}},"5acS":function(t,e,a){"use strict";var o={render:function(){var t=this,e=t.$createElement;return(t._self._c||e)("wysiwyg",{staticClass:"term-editor",attrs:{placeholder:""},model:{value:t.text,callback:function(e){t.text=e},expression:"text"}})},staticRenderFns:[]};e.a=o},CbUv:function(t,e,a){"use strict";var o=a("GuTw"),s=a("5acS");var n=function(t){a("IFwN")},r=a("VU/8")(o.a,s.a,!1,n,null,null);e.a=r.exports},"E/Wt":function(t,e,a){"use strict";var o=a("ekew"),s=a("zGGU");var n=function(t){a("JFre")},r=a("VU/8")(o.a,s.a,!1,n,null,null);e.a=r.exports},GuTw:function(t,e,a){"use strict";var o=a("Dd8w"),s=a.n(o),n=a("NYxO");e.a={name:"TermEditor",computed:s()({},Object(n.mapState)("terms",["ui"]),{text:{get:function(){return"test"},set:function(t){var e=this.ui.tabLanguage,a=this.index;this.$store.dispatch("terms/updateParagraph",{value:t,index:a,language:e})}}}),props:["index"]}},IFwN:function(t,e,a){var o=a("z8Og");"string"==typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);a("rjj0")("1218e79e",o,!0,{sourceMap:!1})},IkLi:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".back-to-top-fade-enter-active,.back-to-top-fade-leave-active{-webkit-transition:opacity .7s;transition:opacity .7s}.back-to-top-fade-enter,.back-to-top-fade-leave-to{opacity:0}.vue-back-to-top{position:fixed;z-index:1000;cursor:pointer}.vue-back-to-top .default{width:160px;color:#fff;text-align:center;line-height:30px;background-color:#f5c85c;border-radius:3px}.vue-back-to-top .default span{color:#fff}",""])},JFre:function(t,e,a){var o=a("IkLi");"string"==typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);a("rjj0")("b341ded6",o,!0,{sourceMap:!1})},"M+Z9":function(t,e,a){var o=a("3rZI"),s=a("v9aJ"),n=a("JyYQ"),r=a("/gZ2"),i=a("NGEn");t.exports=function(t,e,a){var c=i(t)?o:r,l=arguments.length<3;return c(t,n(e,4),a,l,s)}},P05i:function(t,e,a){"use strict";var o=a("Dd8w"),s=a.n(o),n=a("s7yB"),r=a("CbUv"),i=a("f3Fq"),c=a("NYxO"),l=a("vJRe"),u=a("ktak"),d=a.n(u),v=a("M+Z9"),f=a.n(v);e.a={name:"LayoutForm",components:{LanguageTab:n.a,LayoutEditor:r.a,BackToTop:l.a,NewLayoutDialog:i.a},methods:s()({},Object(c.mapActions)("layouts",["save","saveby"]),Object(c.mapMutations)("app",["setBurgerRight","setDrawerRight"]),{scrollTop:function(){window.scrollTo({top:0,behavior:"smooth"})},onSave:function(){var t=this,e=this.owner.id;this.saveby({id:e}).then(function(){return t.$router.push(t.to)})}}),props:{to:{default:"/operators/owners"}},data:function(){return{statusChanged:!1,termIsDirty:!1,showNewLayoutDialog:!1}},computed:s()({layoutList:function(){return d()(this.list)},termsList:function(){return f()(this.termsListComplete,function(t,e){var a=e.uid,o=e.name;return t.push({uid:a,name:o}),t},[])}},Object(c.mapState)("layouts",{layoutUi:"ui"}),Object(c.mapState)("terms",{termsListComplete:"list"}),Object(c.mapState)("domains",{domainsList:"list"}),Object(c.mapState)("layouts",["$record","form","list","owner"]),Object(c.mapGetters)("layouts",["isEditMode"]),Object(c.mapState)("auth",["user"]),Object(c.mapGetters)("auth",["canSave"]),Object(c.mapState)("app",["ui"]),{subject:{get:function(){return this.$store.getters["layouts/getSubject"]},set:function(t){this.$store.commit("layouts/setSubject",t)}},code:{get:function(){return this.$store.getters["layouts/getCode"]},set:function(t){this.$store.commit("layouts/setCode",t)}},logo:{get:function(){return this.$store.getters["layouts/getLogo"]},set:function(t){this.$store.commit("layouts/setLogo",t)}},structure:{get:function(){return this.$store.getters["layouts/getStructure"]},set:function(t){this.$store.commit("layouts/setStructure",t)}},termid:{get:function(){return this.$store.getters["layouts/getTermId"]},set:function(t){this.$store.commit("layouts/setTermId",t)}},domain:{get:function(){return this.$store.getters["layouts/getDomain"]},set:function(t){this.$store.commit("layouts/setDomain",t)}},text:{get:function(){return this.$store.getters["layouts/getText"]},set:function(t){this.$store.commit("layouts/setText",t)}}})}},QBnS:function(t,e,a){"use strict";var o={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-layout",{attrs:{column:""}},[e("v-toolbar",{staticClass:"elevation-2  grey lighten-2"},[e("v-toolbar-title",[this._v("\n            "+this._s(this.$t("Double-optin template"))+"\n            "),e("v-spacer"),e("span",{staticClass:"subheading"},[this._v(" "+this._s(this.owner.company))])],1)],1),e("v-card",{staticClass:"pa-3"},[e("v-layout",{attrs:{row:""}},[e("LayoutForm")],1)],1)],1)},staticRenderFns:[]};e.a=o},X0wp:function(t,e,a){"use strict";var o={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{attrs:{fluid:"","grid-list-lg":""}},[a("NewLayoutDialog",{attrs:{show:t.showNewLayoutDialog},on:{"on-close":function(e){t.showNewLayoutDialog=!1},"on-cancel":function(e){t.showNewLayoutDialog=!1}}}),a("v-layout",{attrs:{row:""}},[a("v-flex",{staticClass:"term-form",attrs:{xs12:""}},[a("v-layout",{staticClass:"top-bar",attrs:{row:"",wrap:"","mb-3":""}},[a("v-flex",{staticClass:"btn-back pt-3",attrs:{xs4:""}},[a("v-tooltip",{attrs:{right:""}},[a("v-btn",{attrs:{slot:"activator",flat:"",small:"",fab:"",to:t.to,"active-class":""},slot:"activator"},[a("v-icon",[t._v("reply")])],1),a("span",[t._v(t._s(t.$t("Back")))])],1)],1),a("v-spacer"),a("v-tooltip",{attrs:{left:""}},[a("v-btn",{attrs:{slot:"activator",flat:"",fab:"",color:"green darken-3"},on:{click:t.onSave},slot:"activator"},[a("v-icon",[t._v("save")])],1),a("span",[t._v(t._s(t.$t("Save")))])],1)],1),a("v-form",{model:{value:t.form.valid,callback:function(e){t.$set(t.form,"valid",e)},expression:"form.valid"}},[a("v-layout",{attrs:{row:""}},[a("v-flex",{attrs:{xs8:""}},[a("v-select",{attrs:{items:t.layoutList,hint:t.$t("Select current layout"),"persistent-hint":""},model:{value:t.layoutUi.currentLayout,callback:function(e){t.$set(t.layoutUi,"currentLayout",e)},expression:"layoutUi.currentLayout"}})],1),a("v-flex",{attrs:{xs4:""}},[a("v-tooltip",{attrs:{top:""}},[a("v-btn",{staticClass:"mt-3",attrs:{slot:"activator",fab:"",dark:"",color:"teal lighten-1",small:""},on:{click:function(e){t.showNewLayoutDialog=!0}},slot:"activator"},[a("v-icon",[t._v("add")])],1),t._v("\n                            "+t._s(t.$t("Add layout"))+"\n                        ")],1)],1)],1),a("v-layout",{attrs:{row:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-text-field",{attrs:{"hide-details":"",label:t.$t("Logo struttura"),box:""},model:{value:t.logo,callback:function(e){t.logo=e},expression:"logo"}})],1)],1),a("v-layout",{attrs:{row:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-text-field",{attrs:{"hide-details":"",label:t.$t("Nome struttura"),box:""},model:{value:t.structure,callback:function(e){t.structure=e},expression:"structure"}})],1)],1),a("v-layout",{attrs:{row:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-select",{attrs:{"hide-details":"",label:t.$t("Domain"),box:"",items:t.domainsList,"item-value":"name","item-text":"name","return-object":!1},model:{value:t.domain,callback:function(e){t.domain=e},expression:"domain"}})],1)],1),a("v-layout",{attrs:{row:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-select",{attrs:{"hide-details":"",label:t.$t("Term"),box:"",items:t.termsList,"item-value":"uid","item-text":"name","return-object":!1},scopedSlots:t._u([{key:"item",fn:function(e){var o=e.item;return[[a("v-list-tile-content",{staticClass:"py-2",staticStyle:{"border-bottom":"1px solid #e2e2e2"}},[t._v(t._s(o.name))])]]}}]),model:{value:t.termid,callback:function(e){t.termid=e},expression:"termid"}})],1)],1)],1),a("v-card",{staticClass:"mt-2"},[a("v-layout",{staticClass:"px-2",attrs:{row:""}},[a("v-flex",{staticClass:"pa-0",staticStyle:{background:"white !important"},attrs:{xs12:"","mb-1":""}},[a("language-tab")],1)],1),a("v-layout",{staticClass:"px-1",attrs:{row:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-text-field",{attrs:{"hide-details":"",label:t.$t("Oggetto"),box:""},model:{value:t.subject,callback:function(e){t.subject=e},expression:"subject"}})],1)],1),a("v-layout",{staticClass:"px-3",attrs:{row:""}},[a("v-text-field",{attrs:{"hide-details":"",label:t.$t("Html"),box:"","multi-line":"",rows:"20",textarea:""},model:{value:t.text,callback:function(e){t.text=e},expression:"text"}})],1)],1)],1)],1),a("back-to-top",{attrs:{visibleoffset:"100",right:"35px"}},[a("v-btn",{attrs:{color:"pink",dark:"",small:"",fixed:"",fab:"",disabled:!t.canSave}},[a("v-icon",[t._v("keyboard_arrow_up")])],1)],1)],1)},staticRenderFns:[]};e.a=o},cj6F:function(t,e,a){var o=a("3Ygm");"string"==typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);a("rjj0")("5bffdb12",o,!0,{sourceMap:!1})},ekew:function(t,e,a){"use strict";e.a={name:"BackToTop",props:{text:{type:String,default:"Voltar ao topo"},visibleoffset:{type:[String,Number],default:600},right:{type:String,default:"30px"},bottom:{type:String,default:"40px"}},data:function(){return{visible:!1}},mounted:function(){window.smoothscroll=function(){var t=document.documentElement.scrollTop||document.body.scrollTop;t>0&&(window.requestAnimationFrame(window.smoothscroll),window.scrollTo(0,Math.floor(t-t/5)))},window.addEventListener("scroll",this.catchScroll)},destroyed:function(){window.removeEventListener("scroll",this.catchScroll)},methods:{catchScroll:function(){this.visible=window.pageYOffset>parseInt(this.visibleoffset)},backToTop:function(){window.smoothscroll()}}}},exdo:function(t,e,a){"use strict";var o=a("Dd8w"),s=a.n(o),n=a("Xxa5"),r=a.n(n),i=a("//Fk"),c=a.n(i),l=a("exGp"),u=a.n(l),d=a("go5r"),v=a("NYxO");e.a={components:{LayoutForm:d.a},fetch:function(){var t=u()(r.a.mark(function t(e){var a,o,s=e.store,n=e.params;return r.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return a=n.id,o=[s.dispatch("domains/loadby",{id:a},{root:!0}),s.dispatch("terms/loadby",{id:a},{root:!0}),s.dispatch("layouts/loadby",{id:a},{root:!0}),s.dispatch("owners/load",{id:a},{root:!0}).then(function(t){return s.commit("layouts/setOwner",t.data,{root:!0})}).then(function(){return s.commit("layouts/setCurrentLayout","default",{root:!0})})],t.next=4,c.a.all(o);case 4:case"end":return t.stop()}},t,this)}));return function(e){return t.apply(this,arguments)}}(),computed:s()({},Object(v.mapState)("layouts",["owner"])),props:[]}},f3Fq:function(t,e,a){"use strict";var o=a("vGnU"),s=a("mWGh"),n=a("VU/8")(o.a,s.a,!1,null,null,null);e.a=n.exports},go5r:function(t,e,a){"use strict";var o=a("P05i"),s=a("X0wp");var n=function(t){a("cj6F")},r=a("VU/8")(o.a,s.a,!1,n,null,null);e.a=r.exports},mWGh:function(t,e,a){"use strict";var o={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"500"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[a("v-icon",[t._v("insert_drive_file")]),t._v("\n            "+t._s(t.$t("Add layout"))+"\n        ")],1)],1),a("v-card",{staticClass:"pa-3"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-form",{ref:"exportform"},[a("v-text-field",{attrs:{"prepend-icon":"description",label:t.$t("Name"),box:"","persistent-hint":"",hint:t.$t("Suggerimento: Metti un nome che ti ricordi il dominio che assocerai")},model:{value:t.code,callback:function(e){t.code=e},expression:"code"}})],1)],1)],1),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.code},nativeOn:{click:function(e){return t.onSave(e)}}},[a("v-icon",[t._v("save")]),a("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Add")))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=o},s7yB:function(t,e,a){"use strict";var o=a("4Z5a"),s=a("yl6V"),n=a("VU/8")(o.a,s.a,!1,null,null,null);e.a=n.exports},v0xg:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var o=a("exdo"),s=a("QBnS"),n=a("VU/8")(o.a,s.a,!1,null,null,null);e.default=n.exports},vGnU:function(t,e,a){"use strict";var o=a("Dd8w"),s=a.n(o),n=a("NYxO");e.a={name:"ShareListDialog",watch:{show:function(){this.code=""}},computed:s()({},Object(n.mapGetters)("auth",["canSave"])),methods:s()({},Object(n.mapActions)("layouts",["addLayout"]),Object(n.mapMutations)("layouts",["setCurrentLayout"]),{onCancel:function(){this.code="",this.$emit("on-cancel")},onSave:function(){var t,e,a=this,o=this.code,s=((e={})[t=o]={code:t,logo:"",structure:"",text:{it:"",en:"",de:""},subject:{it:"",en:"",de:""},domain:"",termid:""},e);return this.code="",this.addLayout({layout:s,code:o}).then(function(){return a.setCurrentLayout(o)}).then(function(){return a.$emit("on-close")})}}),mounted:function(){this.code=""},data:function(){return{code:""}},props:{show:{default:!1}}}},vJRe:function(t,e,a){"use strict";var o=a("E/Wt");o.a.install=function(t,e){t.component(o.a.name,o.a)},e.a=o.a},yl6V:function(t,e,a){"use strict";var o={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-tabs",{attrs:{right:"","show-arrows":""},model:{value:t.index,callback:function(e){t.index=e},expression:"index"}},[a("v-tabs-slider",{attrs:{color:"grey"}}),t._l(t.tabLanguages,function(e,o){return[e.active?a("v-tab",{key:e.id},[t._v("\n            "+t._s(e.label)+"\n        ")]):t._e()]})],2)},staticRenderFns:[]};e.a=o},z8Og:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".term-editor{background:#fff}.term-editor .editr--content{font-size:13px;height:400px}",""])},zGGU:function(t,e,a){"use strict";var o={render:function(){var t=this.$createElement,e=this._self._c||t;return e("transition",{attrs:{name:"back-to-top-fade"}},[e("div",{directives:[{name:"show",rawName:"v-show",value:this.visible,expression:"visible"}],staticClass:"vue-back-to-top",style:"bottom:"+this.bottom+";right:"+this.right+";",on:{click:this.backToTop}},[this._t("default",[e("div",{staticClass:"default"},[e("span",[this._v("\n          "+this._s(this.text)+"\n        ")])])])],2)])},staticRenderFns:[]};e.a=o}});