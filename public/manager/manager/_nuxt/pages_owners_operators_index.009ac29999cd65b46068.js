webpackJsonp([12],{"+3f8":function(t,e,r){var s=r("rKt1");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("3d831212",s,!1,{sourceMap:!1})},"027W":function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])},"2HS9":function(t,e,r){"use strict";var s=r("c6p6");e.a={components:{OperatorLists:s.a},fetch:function(t){return t.store.dispatch("owners/operators/load",{},{root:!0})}}},"6YS5":function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("v-layout",{attrs:{row:""}},[r("v-flex",{staticClass:"my-2",attrs:{xs6:""}},[r("div",{staticClass:"title mb-1"},[t._v(t._s(t.$t(t.title)))]),r("div",[t._v(t._s(t.$t(t.subTitle)))])]),r("v-flex",{staticClass:"text-xs-right",attrs:{xs6:"","pt-1":""}},[r("v-btn",{staticClass:"elevation-0 mb-3",attrs:{dark:"",to:t.to,color:t.color,round:""}},[t._v(t._s(t.$t(t.caption)))])],1)],1)],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},"836n":function(t,e,r){"use strict";var s=function(){var t=this.$createElement;return(this._self._c||t)("operator-lists")};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},CGIQ:function(t,e,r){"use strict";var s=r("Dd8w"),a=r.n(s),o=r("NYxO"),n=r("Eoz/"),i=r.n(n),l=r("KOvE");t="owners/operators";e.a={name:"OperatorLists",filters:{time:function(t){return i()(t,"DD/MM/YYYY HH:mm:ss")},dmy:function(t){return i()(t,"DD/MM/YYYY")}},components:{ListBar:l.a},data:function(){var e=[{text:this.$t("Name"),value:"Name"},{text:this.$t("Surname"),value:"Surname"},{text:this.$t("Email"),value:"Email"},{text:this.$t("Role"),value:"Role"},{text:this.$t("Period"),value:"periodFrom"},{text:this.$t("Actions"),value:"Actions"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[5,10,25,{text:this.$t("All"),value:-1}]},module:t,headers:e}},fetch:function(e){return e.store.dispatch(t+"/load",null,{root:!0})},computed:a()({},Object(o.mapState)(t,["list"]))}},KOvE:function(t,e,r){"use strict";var s=r("ahYw"),a=r("6YS5"),o=r("VU/8")(s.a,a.a,!1,null,null,null);o.options.__file="components\\General\\ListBar.vue",e.a=o.exports},PR9t:function(t,e,r){var s=r("027W");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);r("rjj0")("fb95b4ea",s,!1,{sourceMap:!1})},QYuu:function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=r("2HS9"),a=r("836n"),o=!1;var n=function(t){o||r("PR9t")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="pages\\owners\\operators\\index.vue",e.default=i.exports},ahYw:function(t,e,r){"use strict";e.a={props:["title","subTitle","caption","to","color"]}},aoHi:function(t,e,r){"use strict";var s=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-container",{staticClass:"operator-list",attrs:{row:""}},[r("list-bar",{attrs:{to:"/owners/operators/add",color:"orange darken-1",caption:"Create New Operators",title:"Management Operators","sub-title":"List of Active Operators"}}),r("v-data-table",{staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list,"hide-actions":"","no-data-text":t.$t("No operators")},scopedSlots:t._u([{key:"items",fn:function(e){var s=e.item;return[r("td",[t._v(t._s(s.name))]),r("td",[t._v(t._s(s.surname))]),r("td",[t._v(t._s(s.email))]),r("td",[t._v(t._s(t.$t(s.role)))]),r("td",[t._v("\n                "+t._s(t._f("dmy")(s.periodFrom))+" "),r("br"),s.periodTo?r("span",[t._v(t._s(t._f("dmy")(s.periodTo)))]):t._e()]),r("td",{staticClass:"justify-center layout px-0"},[r("nuxt-link",{attrs:{to:"/owners/operators/"+s.id+"?mode=edit"}},[r("v-btn",{attrs:{flat:"",icon:"",color:"blue"}},[r("v-icon",[t._v("edit")])],1)],1),t._e(),t._e(),t._e()],1)]}}])})],1)};s._withStripped=!0;var a={render:s,staticRenderFns:[]};e.a=a},c6p6:function(t,e,r){"use strict";var s=r("CGIQ"),a=r("aoHi"),o=!1;var n=function(t){o||r("+3f8")},i=r("VU/8")(s.a,a.a,!1,n,null,null);i.options.__file="components\\Owners\\Operators\\OperatorLists.vue",e.a=i.exports},rKt1:function(t,e,r){(t.exports=r("FZ+f")(!1)).push([t.i,"",""])}});