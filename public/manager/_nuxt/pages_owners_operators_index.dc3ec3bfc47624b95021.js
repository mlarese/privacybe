webpackJsonp([17],{"2HS9":function(t,e,s){"use strict";var a=s("c6p6");e.a={components:{OperatorLists:a.a},fetch:function(t){return t.store.dispatch("owners/operators/load",{},{root:!0})}}},CGIQ:function(t,e,s){"use strict";var a=s("Dd8w"),r=s.n(a),o=s("NYxO"),n=s("Eoz/"),i=s.n(n),l=s("KOvE");e.a={name:"OperatorLists",filters:{time:function(t){return i()(t,"DD/MM/YYYY HH:mm:ss")},dmy:function(t){return i()(t,"DD/MM/YYYY")}},components:{ListBar:l.a},data:function(){var t=[{text:this.$t("Name"),value:"Name"},{text:this.$t("Surname"),value:"Surname"},{text:this.$t("Email"),value:"Email"},{text:this.$t("Role"),value:"Role"},{text:this.$t("Period"),value:"periodFrom"},{text:this.$t("Actions"),value:"Actions"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[5,10,25,{text:this.$t("All"),value:-1}]},module:"owners/operators",headers:t}},computed:r()({},Object(o.mapState)("owners/operators",["list"]))}},EE0r:function(t,e,s){var a=s("ImUu");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("3d60234e",a,!0,{sourceMap:!1})},ImUu:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},JyDK:function(t,e,s){"use strict";var a={render:function(){var t=this.$createElement;return(this._self._c||t)("operator-lists")},staticRenderFns:[]};e.a=a},KOvE:function(t,e,s){"use strict";var a=s("ahYw"),r=s("adXS"),o=s("VU/8")(a.a,r.a,!1,null,null,null);e.a=o.exports},QYuu:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("2HS9"),r=s("JyDK");var o=function(t){s("VSSU")},n=s("VU/8")(a.a,r.a,!1,o,null,null);e.default=n.exports},Uleu:function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"operator-list pa-0",attrs:{row:"",fluid:""}},[s("list-bar",{attrs:{to:"/owners/operators/add",color:"orange darken-1",caption:"Create New Operators",title:"Management Operators","sub-title":"List of Active Operators"}}),s("v-data-table",{staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list,"hide-actions":"","no-data-text":t.$t("No operators")},scopedSlots:t._u([{key:"items",fn:function(e){var a=e.item;return[s("td",[t._v(t._s(a.name))]),s("td",[t._v(t._s(a.surname))]),s("td",[t._v(t._s(a.email))]),s("td",[t._v(t._s(t.$t(a.role)))]),s("td",[t._v("\n                "+t._s(t._f("dmy")(a.periodFrom))+" "),s("br"),a.periodTo?s("span",[t._v(t._s(t._f("dmy")(a.periodTo)))]):t._e()]),s("td",{staticClass:"justify-center layout px-0"},[s("nuxt-link",{attrs:{to:"/owners/operators/"+a.id+"?mode=edit"}},[s("v-btn",{attrs:{flat:"",icon:"",color:"blue"}},[s("v-icon",[t._v("edit")])],1)],1),t._e(),t._e(),t._e()],1)]}}])})],1)},staticRenderFns:[]};e.a=a},VSSU:function(t,e,s){var a=s("uO/6");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("a042704e",a,!0,{sourceMap:!1})},adXS:function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("v-layout",{attrs:{row:""}},[s("v-flex",{staticClass:"my-2",attrs:{xs6:""}},[s("div",{staticClass:"title mb-1"},[t._v(t._s(t.$t(t.title)))]),s("div",[t._v(t._s(t.$t(t.subTitle)))])]),s("v-flex",{staticClass:"text-xs-right",attrs:{xs6:"","pt-1":""}},[s("v-tooltip",{attrs:{left:""}},[s("v-btn",{staticClass:"elevation-1 mb-3",attrs:{slot:"activator",fab:"",dark:"",to:t.to,color:"teal lighten-1",small:""},slot:"activator"},[s("v-icon",[t._v("add")])],1),s("span",[t._v(t._s(t.$t(t.caption)))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=a},ahYw:function(t,e,s){"use strict";e.a={props:["title","subTitle","caption","to","color"]}},c6p6:function(t,e,s){"use strict";var a=s("CGIQ"),r=s("Uleu");var o=function(t){s("EE0r")},n=s("VU/8")(a.a,r.a,!1,o,null,null);e.a=n.exports},"uO/6":function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])}});