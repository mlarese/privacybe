webpackJsonp([36],{"+IM0":function(t,e,a){"use strict";var r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{attrs:{row:""}},[a("v-flex",[a("v-card",[a("v-toolbar",{staticClass:"elevation-1"},[a("v-toolbar-title",[t._v("\n                       "+t._s(t.$t("Active language"))+"\n                   ")])],1),a("v-list",{attrs:{"two-line":"",dense:""}},[t._l(t.languages,function(e,r){return[a("v-list-tile",{attrs:{avatar:""},on:{click:function(t){}}},[a("v-list-tile-action",[a("v-checkbox",{model:{value:e.active,callback:function(a){t.$set(e,"active",a)},expression:"l.active"}})],1),a("v-list-tile-content",[a("v-list-tile-title",{domProps:{innerHTML:t._s(e.label)}})],1)],1)]})],2)],1)],1)],1)},staticRenderFns:[]};e.a=r},"7wu+":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var r=a("G+iy"),s=a("j1qA"),n=a("VU/8")(r.a,s.a,!1,null,null,null);e.default=n.exports},"7xFP":function(t,e,a){"use strict";var r=a("Dd8w"),s=a.n(r),n=a("sYtN"),i=a("r3Mr"),o=a("NYxO");e.a={components:{FormBar:i.a,ParametersLanguages:n.a},methods:s()({},Object(o.mapActions)("ownerconfig",["save"]),{onSave:function(){var t=this,e=this.$record.profile;this.save({data:{profile:e},id:this.$record.id}).then(function(e){return t.$router.push("/")})}}),computed:s()({},Object(o.mapState)("owners",["$record"]),{isDisabled:function(){return!1}})}},"G+iy":function(t,e,a){"use strict";var r=a("Dd8w"),s=a.n(r),n=a("/5sW"),i=a("NYxO"),o=a("kvU2"),c=a.n(o),l=a("VICx"),u={root:!0};e.a={fetch:function(t){var e=t.store,a=e.state.auth.user.ownerId;e.commit("owners/setEditMode",null,u),e.dispatch("owners/load",{id:a},u)},computed:s()({},Object(i.mapState)("owners",["$record"]),Object(i.mapState)("app",["languages"])),components:{ParametersManager:l.a},created:function(){this.$record.profile||(this.$record.profile={}),this.$record.profile.languages||n.default.set(this.$record.profile,"languages",c()(this.languages))}}},KHKM:function(t,e,a){"use strict";var r=a("Dd8w"),s=a.n(r),n=a("NYxO");e.a={name:"FormBar",props:["to","color","disabled","caption"],computed:s()({},Object(n.mapState)("api",["isAjax"]),Object(n.mapGetters)("auth",["canSave"]),{isDisabled:function(){return!this.canSave||!(!this.disabled&&!this.isAjax)}}),methods:{onSave:function(){this.$emit("on-save")}}}},"Qm/k":function(t,e,a){"use strict";var r={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-flex",{attrs:{container:"","pa-0":""}},[e("form-bar",{attrs:{disabled:this.isDisabled,to:"/",color:"orange darken-1",caption:"Save Config"},on:{"on-save":this.onSave}}),e("v-flex",[e("parameters-languages")],1)],1)},staticRenderFns:[]};e.a=r},SbrG:function(t,e,a){"use strict";var r=a("Dd8w"),s=a.n(r),n=a("NYxO");e.a={computed:s()({},Object(n.mapState)("owners",["$record"]),{languages:function(){return this.$record.profile.languages}})}},VICx:function(t,e,a){"use strict";var r=a("7xFP"),s=a("Qm/k"),n=a("VU/8")(r.a,s.a,!1,null,null,null);e.a=n.exports},j1qA:function(t,e,a){"use strict";var r={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",[e("parameters-manager")],1)},staticRenderFns:[]};e.a=r},r3Mr:function(t,e,a){"use strict";var r=a("KHKM"),s=a("zA40"),n=a("VU/8")(r.a,s.a,!1,null,null,null);e.a=n.exports},sYtN:function(t,e,a){"use strict";var r=a("SbrG"),s=a("+IM0"),n=a("VU/8")(r.a,s.a,!1,null,null,null);e.a=n.exports},zA40:function(t,e,a){"use strict";var r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"mb-2",staticStyle:{"border-bottom":"1px solid silver"},attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"btn-back",attrs:{xs4:"","pt-1":""}},[a("v-tooltip",{attrs:{right:""}},[a("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",fab:"",flat:"",small:"",to:t.to,"active-class":""},slot:"activator"},[a("v-icon",[t._v("reply")])],1),a("span",[t._v(t._s(t.$t("Back")))])],1)],1),a("v-spacer"),a("v-tooltip",{attrs:{left:""}},[a("v-btn",{staticClass:"elevation-0 mb-2",attrs:{slot:"activator",color:"green darken-3",dark:"",fab:"",small:"",disabled:t.isDisabled},on:{click:t.onSave},slot:"activator"},[a("v-icon",[t._v("save")])],1),a("span",[t._v(t._s(t.$t(t.caption)))])],1)],1)},staticRenderFns:[]};e.a=r}});