webpackJsonp([39],{"9zQp":function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("v-container",{staticClass:"users-list",attrs:{row:""}},[s("list-bar",{attrs:{to:"/operators/users/add",title:"User Managements","sub-title":"List Of Users",color:"yellow",caption:"Create New Users"}}),s("v-data-table",{staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list,"hide-actions":!0},scopedSlots:t._u([{key:"items",fn:function(e){var a=e.item;return[s("td",[t._v(t._s(a.user))]),s("td",[t._v(t._s(a.name))]),s("td",[t._v(t._s(a.type))]),s("td",{attrs:{nowrap:"nowrap"}},[s("nuxt-link",{attrs:{to:"/operators/users/"+a.id}},[s("v-btn",{attrs:{flat:"",icon:"",color:"blue"}},[s("v-icon",[t._v("edit")])],1)],1),s("v-btn",{attrs:{flat:"",icon:"",color:"red"}},[s("v-icon",[t._v("delete")])],1)],1)]}}])})],1)},staticRenderFns:[]};e.a=a},KOvE:function(t,e,s){"use strict";var a=s("ahYw"),r=s("SGu0"),n=s("VU/8")(a.a,r.a,!1,null,null,null);e.a=n.exports},SGu0:function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("v-layout",{attrs:{row:""}},[s("v-flex",{staticClass:"my-2",attrs:{xs6:""}},[s("div",{staticClass:"title mb-1"},[t._v(t._s(t.$t(t.title)))]),s("div",[t._v(t._s(t.$t(t.subTitle)))])]),s("v-flex",{staticClass:"text-xs-right",attrs:{xs6:"","pt-1":""}},[t.canAdd?s("v-tooltip",{attrs:{left:""}},[s("v-btn",{staticClass:"elevation-1 mb-3",attrs:{slot:"activator",fab:"",dark:"",to:t.to,color:"teal lighten-1",small:""},slot:"activator"},[s("v-icon",[t._v("add")])],1),s("span",[t._v(t._s(t.$t(t.caption)))])],1):t._e()],1)],1)],1)},staticRenderFns:[]};e.a=a},UlVd:function(t,e,s){"use strict";var a={render:function(){var t=this.$createElement;return(this._self._c||t)("users-list")},staticRenderFns:[]};e.a=a},ahYw:function(t,e,s){"use strict";var a=s("Dd8w"),r=s.n(a),n=s("NYxO");e.a={props:["title","subTitle","caption","to","color"],computed:r()({},Object(n.mapGetters)("auth",["canAdd"]))}},"joE+":function(t,e,s){"use strict";var a=s("kYcL"),r=s("9zQp"),n=s("VU/8")(a.a,r.a,!1,null,null,null);e.a=n.exports},kYcL:function(t,e,s){"use strict";var a=s("Dd8w"),r=s.n(a),n=s("NYxO"),o=s("KOvE");e.a={data:function(){var t=[{text:this.$t("User"),value:"user"},{text:this.$t("Name"),value:"name"},{text:this.$t("Type"),value:"type"},{text:this.$t("Actions"),value:"action"}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[5,10,25,{text:this.$t("All"),value:-1}]},headers:t}},components:{ListBar:o.a},computed:r()({},Object(n.mapState)("operators/users",["list"]))}},lUT6:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("vT3g"),r=s("UlVd");var n=function(t){s("tURG")},o=s("VU/8")(a.a,r.a,!1,n,null,null);e.default=o.exports},tURG:function(t,e,s){var a=s("uA6Z");"string"==typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);s("rjj0")("14c6edab",a,!0,{sourceMap:!1})},uA6Z:function(t,e,s){(t.exports=s("FZ+f")(!1)).push([t.i,"",""])},vT3g:function(t,e,s){"use strict";var a=s("joE+"),r={root:!0};e.a={components:{UsersList:a.a},fetch:function(t){t.store.dispatch("operators/users/load",{},r)}}}});