webpackJsonp([21],{BUK2:function(t,e,s){"use strict";var a=s("//Fk"),r=s.n(a),i=s("YY4o"),n={root:!0};e.a={components:{TermsList:i.a},fetch:function(t){var e=[t.store.dispatch("terms/load",{},n)];return r.a.all(e)}}},F1gO:function(t,e,s){"use strict";var a=s("Dd8w"),r=s.n(a),i=s("NYxO"),n=s("KOvE");e.a={name:"TermsList",data:function(){var t=[{text:this.$t("Name"),value:"name"},{text:this.$t("Status"),value:"status"},{text:this.$t("Created_"),value:"created"},{text:this.$t("Modified_"),value:"modified"},{text:this.$t("Published_"),value:"published"},{text:this.$t("Suspended_"),value:"suspended"},{text:this.$t("Actions"),value:"action"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[5,10,25,{text:this.$t("All"),value:-1}]},module:"terms",headers:t}},computed:r()({},Object(i.mapState)("terms",["list"])),components:{ListBar:n.a}}},FUYi:function(t,e,s){"use strict";var a={render:function(){var t=this.$createElement;return(this._self._c||t)("terms-list")},staticRenderFns:[]};e.a=a},KOvE:function(t,e,s){"use strict";var a=s("ahYw"),r=s("adXS"),i=s("VU/8")(a.a,r.a,!1,null,null,null);e.a=i.exports},L6jn:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},YY4o:function(t,e,s){"use strict";var a=s("F1gO"),r=s("lweY"),i=s("VU/8")(a.a,r.a,!1,null,null,null);e.a=i.exports},adXS:function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("v-layout",{attrs:{row:""}},[s("v-flex",{staticClass:"my-2",attrs:{xs6:""}},[s("div",{staticClass:"title mb-1"},[t._v(t._s(t.$t(t.title)))]),s("div",[t._v(t._s(t.$t(t.subTitle)))])]),s("v-flex",{staticClass:"text-xs-right",attrs:{xs6:"","pt-1":""}},[s("v-tooltip",{attrs:{left:""}},[s("v-btn",{staticClass:"elevation-1 mb-3",attrs:{slot:"activator",fab:"",dark:"",to:t.to,color:"teal lighten-1",small:""},slot:"activator"},[s("v-icon",[t._v("add")])],1),s("span",[t._v(t._s(t.$t(t.caption)))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=a},ahYw:function(t,e,s){"use strict";e.a={props:["title","subTitle","caption","to","color"]}},"d/Rp":function(t,e,s){var a=s("L6jn");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("7edbe2a4",a,!0,{sourceMap:!1})},lweY:function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"terms-list pa-0",attrs:{row:"",fluid:""}},[s("list-bar",{attrs:{to:"/owners/terms/add",title:"Term Managements","sub-title":"Terms list",color:"orange darken-1",caption:"Create New Term"}}),s("v-data-table",{staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list,"hide-actions":"","no-data-text":t.$t("No terms")},scopedSlots:t._u([{key:"items",fn:function(e){var a=e.item;return[s("td",[t._v(t._s(a.name))]),s("td",[t._v(t._s(t.$t(a.status)))]),s("td",[t._v(t._s(t._f("dmy")(a.created)))]),s("td",[t._v(t._s(t._f("dmy")(a.modified)))]),s("td",[t._v(t._s(t._f("dmy")(a.published)))]),s("td",[t._v(t._s(t._f("dmy")(a.suspended)))]),s("td",{staticClass:"justify-center layout px-0"},[s("nuxt-link",{attrs:{to:"/owners/terms/"+a.uid}},[s("v-btn",{attrs:{flat:"",icon:"",color:"blue"}},[s("v-icon",[t._v("edit")])],1)],1),t._e()],1)]}}])})],1)},staticRenderFns:[]};e.a=a},zFjU:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("BUK2"),r=s("FUYi");var i=function(t){s("d/Rp")},n=s("VU/8")(a.a,r.a,!1,i,null,null);e.default=n.exports}});