webpackJsonp([22],{"/wy+":function(t,e,n){"use strict";var i=n("qp/H"),a=n("YPtK"),o=n("VU/8")(i.a,a.a,!1,null,null,null);e.a=o.exports},"9/aU":function(t,e,n){"use strict";var i=n("fHNs"),a=n("awYt");var o=function(t){n("S8kj")},s=n("VU/8")(i.a,a.a,!1,o,null,null);e.a=s.exports},"9Vh3":function(t,e,n){"use strict";var i={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return t.privacyMenuBi&&t.privacyMenuBi.length?n("v-list",{attrs:{dense:""}},[t._l(t.privacyMenuBi,function(e){return[e.visible?n("v-list-tile",{key:e.title,attrs:{nuxt:"",to:e.path}},[n("v-list-tile-action",[n("v-icon",[t._v(t._s(e.icon))])],1),n("v-list-tile-content",[n("v-list-tile-title",[t._v("\n                    "+t._s(t.$t(e.title))+"\n                ")])],1)],1):t._e()]})],2):t._e()},staticRenderFns:[]};e.a=i},DZHd:function(t,e,n){var i=n("bwCd");"string"==typeof i&&(i=[[t.i,i,""]]),i.locals&&(t.exports=i.locals);n("rjj0")("2eea5ee9",i,!0,{sourceMap:!1})},DgkT:function(t,e,n){"use strict";var i=n("aa+y"),a=n("9Vh3"),o=n("VU/8")(i.a,a.a,!1,null,null,null);e.a=o.exports},HfKX:function(t,e,n){"use strict";var i=n("Dd8w"),a=n.n(i),o=n("jNw2"),s=n("NYxO");e.a={watch:{"notification.id":function(t){this.$notify(this.notification)}},components:{RoleMenu:o.a},computed:a()({},Object(s.mapState)("api",["notification"]),Object(s.mapState)("app",["ui"])),methods:{onLogOut:function(){this.$auth.logout()}},data:function(){return{dialog:!1,drawer:null}}}},Ma2J:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=n("HfKX"),a=n("lTu4"),o=n("VU/8")(i.a,a.a,!1,null,null,null);e.default=o.exports},S8kj:function(t,e,n){var i=n("oslq");"string"==typeof i&&(i=[[t.i,i,""]]),i.locals&&(t.exports=i.locals);n("rjj0")("0b1a98d2",i,!0,{sourceMap:!1})},YPtK:function(t,e,n){"use strict";var i={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-layout",{attrs:{row:"",wrap:""}},[n("data-one-icon",{staticStyle:{width:"190px",margin:"auto","padding-top":"12px"}}),n("v-flex",{staticClass:"text-xs-center",attrs:{xs12:"","pa-4":""}},[n("v-avatar",{staticClass:"grey lighten-2",attrs:{size:"52px"}},[n("img",{staticClass:"img-circle elevation-0",attrs:{src:t.image}})]),t.$auth.loggedIn?n("div",[n("div",{staticClass:"mt-3 caption"},[t._v(t._s(t.$auth.user.user)+" "),n("connection-indicator")],1),n("div",{staticClass:"caption"},[t._v(t._s(t.$auth.user.userName))]),n("v-btn",{attrs:{small:"",flat:""},on:{click:t.onLogOut}},[n("v-icon",{staticClass:"mr-1",attrs:{small:""}},[t._v("exit_to_app")]),t._v(" "+t._s(t.$t("Logout"))+"\n            ")],1)],1):t._e()],1)],1)},staticRenderFns:[]};e.a=i},"aa+y":function(t,e,n){"use strict";e.a={name:"BiRoleMenu",props:["privacyMenuBi"]}},awYt:function(t,e,n){"use strict";var i={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-tooltip",{attrs:{bottom:""}},[e("v-badge",{staticClass:"connection-indicator",attrs:{slot:"activator",color:this.color},slot:"activator"},[e("span",{attrs:{slot:"badge"},slot:"badge"})]),e("span",[this._v(this._s(this.$t(this.tooltip)))])],1)},staticRenderFns:[]};e.a=i},bwCd:function(t,e,n){(t.exports=n("FZ+f")(!1)).push([t.i,".expansion-panel__header{background:#efefef}.role-menu .list__tile__action{min-width:28px}.role-menu .list__tile--active{background:#f4f4f4}",""])},eJTI:function(t,e,n){"use strict";e.a={name:"DataOneRoleMenu",props:["privacyMenu"]}},fHNs:function(t,e,n){"use strict";e.a={computed:{tooltip:function(){var t="On the cloud";return"local"===this.$auth.user.source&&(t="Localy connected"),t},color:function(){var t="green";return"local"===this.$auth.user.source&&(t="blue"),t}}}},fpz3:function(t,e,n){"use strict";var i={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-list",{attrs:{dense:""}},[n("v-list-tile",{attrs:{nuxt:"",to:"/"}},[n("v-list-tile-action",[n("v-icon",[t._v("home")])],1),n("v-list-tile-content",[n("v-list-tile-title",[t._v("\n                    Home\n                ")])],1)],1),t._l(t.privacyMenu,function(e){return[e.children?n("v-list-group",{key:e.text,attrs:{"prepend-icon":e.model?e.icon:e["icon-alt"],"append-icon":""},model:{value:e.model,callback:function(n){t.$set(e,"model",n)},expression:"item.model"}},[n("v-list-tile",{attrs:{slot:"activator"},slot:"activator"},[n("v-list-tile-content",[n("v-list-tile-title",[t._v("\n                            "+t._s(t.$t(e.title))+"\n                        ")])],1)],1),t._l(e.children,function(i,a){return e.visible?n("v-list-tile",{key:a,on:{click:function(t){}}},[i.icon?n("v-list-tile-action",[n("v-icon",[t._v(t._s(i.icon))])],1):t._e(),n("v-list-tile-content",[n("v-list-tile-title",[t._v("\n                            "+t._s(t.$t(i.title))+"\n                        ")])],1)],1):t._e()})],2):t._e(),e.visible?n("v-list-tile",{key:e.title,attrs:{nuxt:"",to:e.path}},[n("v-list-tile-action",[n("v-icon",[t._v(t._s(e.icon))])],1),n("v-list-tile-content",[n("v-list-tile-title",[t._v("\n                        "+t._s(t.$t(e.title))+"\n                    ")])],1)],1):t._e()]})],2)},staticRenderFns:[]};e.a=i},gTjB:function(t,e,n){"use strict";var i=n("Dd8w"),a=n.n(i),o=n("NYxO"),s=n("/wy+"),r=n("DgkT"),l=n("oms6");e.a={name:"RoleMenu",methods:{goTo:function(t){var e=t.path;this.$router.push({path:e})}},components:{DataOneRoleMenu:l.a,BiRoleMenu:r.a,NavAvatar:s.a},computed:a()({},Object(o.mapGetters)("app",["privacyMenu","privacyMenuBi","userHasBi"]),Object(o.mapGetters)("auth",["hasBi"]))}},jNw2:function(t,e,n){"use strict";var i=n("gTjB"),a=n("nAfK");var o=function(t){n("DZHd")},s=n("VU/8")(i.a,a.a,!1,o,null,null);e.a=s.exports},lTu4:function(t,e,n){"use strict";var i={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-app",[n("notifications",{staticStyle:{"margin-top":"50px"},attrs:{position:"top right"}}),n("v-navigation-drawer",{attrs:{fixed:"",clipped:!1,app:"",width:250},model:{value:t.drawer,callback:function(e){t.drawer=e},expression:"drawer"}},[n("role-menu")],1),n("v-toolbar",{staticClass:"app-tolbar",attrs:{color:"grey lighten-2",dark:"",flat:"",dense:"",app:"","clipped-left":!1,fixed:""}},[n("v-toolbar-title",{staticClass:"ml-0 pl-3",staticStyle:{width:"600px"}},[n("v-toolbar-side-icon",{staticClass:"side-icon",on:{click:function(e){e.stopPropagation(),t.drawer=!t.drawer}}}),t.drawer?t._e():n("data-one-icon",{staticStyle:{width:"100px",display:"inline-block",position:"relative",top:"8px"}})],1),n("v-spacer"),t.ui.burgerRight?n("v-toolbar-side-icon",{on:{click:function(e){e.stopPropagation(),t.ui.drawerRight=!t.ui.drawerRight}}}):t._e()],1),n("v-content",[n("v-container",{staticClass:"pa-2",attrs:{fluid:""}},[n("nuxt")],1)],1)],1)},staticRenderFns:[]};e.a=i},nAfK:function(t,e,n){"use strict";var i={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-flex",{staticClass:"role-menu"},[n("nav-avatar"),n("v-divider"),n("v-expansion-panel",{staticClass:"elevation-1"},[n("v-expansion-panel-content",{attrs:{value:!0,"expand-icon":"arrow_drop_down"}},[n("div",{staticClass:"text--darken-4 bold caption",attrs:{slot:"header"},slot:"header"},[t._v("Privacy Protection System")]),n("DataOneRoleMenu",{attrs:{privacyMenu:t.privacyMenu}})],1),t.hasBi?n("v-expansion-panel-content",{attrs:{value:!1,"expand-icon":"arrow_drop_down"}},[n("div",{staticClass:"text--darken-4 bold caption",attrs:{slot:"header",dark:""},slot:"header"},[t._v("Business Intelligence")]),t.userHasBi?n("BiRoleMenu",{attrs:{privacyMenuBi:t.privacyMenuBi}}):t._e()],1):t._e()],1)],1)},staticRenderFns:[]};e.a=i},oms6:function(t,e,n){"use strict";var i=n("eJTI"),a=n("fpz3"),o=n("VU/8")(i.a,a.a,!1,null,null,null);e.a=o.exports},oslq:function(t,e,n){(t.exports=n("FZ+f")(!1)).push([t.i,".connection-indicator .badge__badge{width:10px!important;height:10px!important}",""])},"qp/H":function(t,e,n){"use strict";var i=n("9/aU");e.a={name:"NavAvatar",components:{ConnectionIndicator:i.a},methods:{onLogOut:function(){var t=this;this.$auth.logout().then(function(){window.location=t.$router.options.base})}},computed:{image:function(){return"/manager/img/avatar.png"}}}}});