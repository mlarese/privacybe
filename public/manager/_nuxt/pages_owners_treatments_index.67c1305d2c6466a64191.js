webpackJsonp([24],{"2/mX":function(t,e,a){var s=a("pf29");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("2033e5ec",s,!0,{sourceMap:!1})},C8YX:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("EGGi"),r=a("zls+");var n=function(t){a("2/mX")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.default=i.exports},EGGi:function(t,e,a){"use strict";var s=a("UruH"),r={root:!0};e.a={components:{TreatmentsList:s.a},fetch:function(t){return t.store.dispatch("treatments/load",{},r)}}},KOvE:function(t,e,a){"use strict";var s=a("ahYw"),r=a("adXS"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=n.exports},Mi2o:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"treatments-list pa-0",attrs:{row:"",fluid:""}},[a("list-bar",{attrs:{to:"/owners/treatments/add",title:"Treatment Managements","sub-title":"Treatment list",color:"orange darken-1",caption:"Create New Treatment"}}),a("v-data-table",{staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list,"hide-actions":!0,"no-data-text":t.$t("No treatments")},scopedSlots:t._u([{key:"items",fn:function(e){var s=e.item;return[a("td",[t._v(t._s(s.code))]),a("td",[t._v(t._s(s.name))]),a("td",[t._v(t._s(s.note))]),a("td",[t._v(t._s(s.creator.userName))]),a("td",[t._v(t._s(t._f("dmy")(s.created)))]),a("td",{attrs:{nowrap:"nowrap"}},[a("nuxt-link",{attrs:{to:"/owners/treatments/"+s.code}},[a("v-btn",{attrs:{flat:"",icon:"",color:"blue"}},[a("v-icon",[t._v("edit")])],1)],1),t._e()],1)]}}])})],1)},staticRenderFns:[]};e.a=s},UruH:function(t,e,a){"use strict";var s=a("zLEx"),r=a("Mi2o"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=n.exports},adXS:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("v-layout",{attrs:{row:""}},[a("v-flex",{staticClass:"my-2",attrs:{xs6:""}},[a("div",{staticClass:"title mb-1"},[t._v(t._s(t.$t(t.title)))]),a("div",[t._v(t._s(t.$t(t.subTitle)))])]),a("v-flex",{staticClass:"text-xs-right",attrs:{xs6:"","pt-1":""}},[a("v-tooltip",{attrs:{left:""}},[a("v-btn",{staticClass:"elevation-1 mb-3",attrs:{slot:"activator",fab:"",dark:"",to:t.to,color:"teal lighten-1",small:""},slot:"activator"},[a("v-icon",[t._v("add")])],1),a("span",[t._v(t._s(t.$t(t.caption)))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},ahYw:function(t,e,a){"use strict";e.a={props:["title","subTitle","caption","to","color"]}},pf29:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},zLEx:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("NYxO"),i=a("n3aF"),o=a("KOvE");e.a={filters:{dmy:i.a},data:function(){var t=[{text:this.$t("Code"),value:"code"},{text:this.$t("Name"),value:"name"},{text:this.$t("Note"),value:"note"},{text:this.$t("Creator"),value:"creator"},{text:this.$t("Created"),value:"created"},{text:this.$t("Actions"),value:"action"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[5,10,25,{text:this.$t("All"),value:-1}]},headers:t}},components:{ListBar:o.a},computed:r()({},Object(n.mapState)("treatments",["list"]))}},"zls+":function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement;return(this._self._c||t)("treatments-list")},staticRenderFns:[]};e.a=s}});