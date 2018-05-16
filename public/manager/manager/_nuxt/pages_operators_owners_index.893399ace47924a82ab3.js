webpackJsonp([13],{"4mT/":function(t,e,s){"use strict";var a=s("LptT"),n=s("8vBe"),r=!1;var o=function(t){r||s("bUJZ")},i=s("VU/8")(a.a,n.a,!1,o,null,null);i.options.__file="components\\Operators\\Owners\\OwnersList.vue",e.a=i.exports},"6YS5":function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("v-layout",{attrs:{row:""}},[s("v-flex",{staticClass:"my-2",attrs:{xs6:""}},[s("div",{staticClass:"title mb-1"},[t._v(t._s(t.$t(t.title)))]),s("div",[t._v(t._s(t.$t(t.subTitle)))])]),s("v-flex",{staticClass:"text-xs-right",attrs:{xs6:"","pt-1":""}},[s("v-btn",{staticClass:"elevation-0 mb-3",attrs:{dark:"",to:t.to,color:t.color,round:""}},[t._v(t._s(t.$t(t.caption)))])],1)],1)],1)};a._withStripped=!0;var n={render:a,staticRenderFns:[]};e.a=n},"8Da7":function(t,e,s){"use strict";var a=function(){var t=this.$createElement;return(this._self._c||t)("owners-list")};a._withStripped=!0;var n={render:a,staticRenderFns:[]};e.a=n},"8vBe":function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"owners-list",attrs:{row:""}},[s("list-bar",{attrs:{to:"/operators/owners/add",color:"blue lighten-1",caption:"Create New Owner",title:"Management Owners","sub-title":"List of active Management Owners"}}),s("v-data-table",t._b({staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list},scopedSlots:t._u([{key:"items",fn:function(e){var a=e.item;return[s("td",[t._v(t._s(a.company))]),s("td",[t._v(t._s(a.email))]),s("td",[t._v(t._s(a.surname))]),s("td",[t._v(t._s(a.name))]),s("td",[t._v(t._s(a.language))]),s("td",{staticClass:"justify-center layout px-0"},[s("nuxt-link",{attrs:{to:"/operators/owners/"+a.id+"?mode=edit"}},[s("v-btn",{attrs:{flat:"",icon:"",color:"blue"}},[s("v-icon",[t._v("edit")])],1)],1),t._e(),t._e()],1)]}},{key:"pageText",fn:function(e){var s=e.pageStart,a=e.pageStop;return[t._v("\n            "+t._s(t.$t("From"))+" "+t._s(s)+" "+t._s(t.$t("To"))+" "+t._s(a)+"\n        ")]}}])},"v-data-table",t.tableTexts,!1))],1)};a._withStripped=!0;var n={render:a,staticRenderFns:[]};e.a=n},KOvE:function(t,e,s){"use strict";var a=s("ahYw"),n=s("6YS5"),r=s("VU/8")(a.a,n.a,!1,null,null,null);r.options.__file="components\\General\\ListBar.vue",e.a=r.exports},LptT:function(t,e,s){"use strict";var a=s("Dd8w"),n=s.n(a),r=s("NYxO"),o=s("n3aF"),i=s("KOvE"),l={root:!0};e.a={name:"OwnersList",filters:{dmy:o.a},data:function(){var t=[{text:this.$t("Company"),value:"company"},{text:this.$t("Email"),value:"email"},{text:this.$t("Surname"),value:"surname"},{text:this.$t("Name"),value:"name"},{text:this.$t("Language"),value:"language"},{text:this.$t("Actions"),value:"action"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[20,30,50,{text:this.$t("All"),value:-1}]},module:"owners",headers:t}},components:{ListBar:i.a},computed:n()({},Object(r.mapState)("owners",["list"])),fetch:function(t){return t.store.dispatch("owners/load",null,l)}}},ahYw:function(t,e,s){"use strict";e.a={props:["title","subTitle","caption","to","color"]}},bRfU:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("tGsv"),n=s("8Da7"),r=!1;var o=function(t){r||s("msa0")},i=s("VU/8")(a.a,n.a,!1,o,null,null);i.options.__file="pages\\operators\\owners\\index.vue",e.default=i.exports},bUJZ:function(t,e,s){var a=s("mjaD");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("492e798e",a,!1,{sourceMap:!1})},mjaD:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},msa0:function(t,e,s){var a=s("rQ0e");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("7b079aaf",a,!1,{sourceMap:!1})},rQ0e:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},tGsv:function(t,e,s){"use strict";var a=s("4mT/"),n={root:!0};e.a={components:{OwnersList:a.a},fetch:function(t){t.store.dispatch("owners/load",{},n)}}}});