webpackJsonp([34],{"0K+B":function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("operator-lists")},staticRenderFns:[]};e.a=s},"2HS9":function(t,e,a){"use strict";var s=a("c6p6");e.a={components:{OperatorLists:s.a},fetch:function(t){var e=t.store,a=t.next;return e.getters["auth/canManageOperators"]?e.dispatch("owners/operators/load",{},{root:!0}):a("/")}}},"6ekg":function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},"6nPL":function(t,e,a){var s=a("6ekg");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("2ff4e45e",s,!0,{sourceMap:!1})},CGIQ:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),o=a("NYxO"),n=a("Eoz/"),i=a.n(n),l=a("KOvE");e.a={name:"OperatorLists",filters:{time:function(t){return i()(t,"DD/MM/YYYY HH:mm:ss")},dmy:function(t){return i()(t,"DD/MM/YYYY")}},components:{ListBar:l.a},data:function(){var t=[{text:this.$t("Name"),value:"Name"},{text:this.$t("Surname"),value:"Surname"},{text:this.$t("Email"),value:"Email"},{text:this.$t("Role"),value:"Role"},{text:this.$t("Period"),value:"periodFrom"},{text:this.$t("Actions"),value:"Actions"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[5,10,25,{text:this.$t("All"),value:-1}]},module:"owners/operators",headers:t}},computed:r()({},Object(o.mapState)("owners/operators",["list"]),Object(o.mapGetters)("auth",["canSave"]))}},KOvE:function(t,e,a){"use strict";var s=a("ahYw"),r=a("SGu0"),o=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=o.exports},QYuu:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("2HS9"),r=a("0K+B");var o=function(t){a("6nPL")},n=a("VU/8")(s.a,r.a,!1,o,null,null);e.default=n.exports},SGu0:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("v-layout",{attrs:{row:""}},[a("v-flex",{staticClass:"my-2",attrs:{xs6:""}},[a("div",{staticClass:"title mb-1"},[t._v(t._s(t.$t(t.title)))]),a("div",[t._v(t._s(t.$t(t.subTitle)))])]),a("v-flex",{staticClass:"text-xs-right",attrs:{xs6:"","pt-1":""}},[t.canAdd?a("v-tooltip",{attrs:{left:""}},[a("v-btn",{staticClass:"elevation-1 mb-3",attrs:{slot:"activator",fab:"",dark:"",to:t.to,color:"teal lighten-1",small:""},slot:"activator"},[a("v-icon",[t._v("add")])],1),a("span",[t._v(t._s(t.$t(t.caption)))])],1):t._e()],1)],1)],1)},staticRenderFns:[]};e.a=s},SzrT:function(t,e,a){var s=a("fi+n");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("dfc2bbb6",s,!0,{sourceMap:!1})},ahYw:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),o=a("NYxO");e.a={props:["title","subTitle","caption","to","color"],computed:r()({},Object(o.mapGetters)("auth",["canAdd"]))}},c6p6:function(t,e,a){"use strict";var s=a("CGIQ"),r=a("lCMh");var o=function(t){a("SzrT")},n=a("VU/8")(s.a,r.a,!1,o,null,null);e.a=n.exports},"fi+n":function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},lCMh:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"operator-list pa-0",attrs:{row:"",fluid:""}},[a("list-bar",{attrs:{to:"/owners/operators/add",color:"orange darken-1",caption:"Create New Operators",title:"Management Operators","sub-title":"List of Active Operators"}}),a("v-data-table",{staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list,"hide-actions":"","no-data-text":t.$t("No operators")},scopedSlots:t._u([{key:"items",fn:function(e){var s=e.item;return[a("td",[t._v(t._s(s.name))]),a("td",[t._v(t._s(s.surname))]),a("td",[t._v(t._s(s.email))]),a("td",[t._v(t._s(t.$t(s.role)))]),a("td",[t._v("\n                "+t._s(t._f("dmy")(s.periodFrom))+" "),a("br"),s.periodTo?a("span",[t._v(t._s(t._f("dmy")(s.periodTo)))]):t._e()]),a("td",{staticClass:"justify-center layout px-0"},[a("nuxt-link",{attrs:{to:"/owners/operators/"+s.id+"?mode=edit"}},[a("v-btn",{attrs:{flat:"",icon:"",color:"blue",disabled:!t.canSave}},[a("v-icon",[t._v("edit")])],1)],1),t._e(),t._e(),t._e()],1)]}}])})],1)},staticRenderFns:[]};e.a=s}});