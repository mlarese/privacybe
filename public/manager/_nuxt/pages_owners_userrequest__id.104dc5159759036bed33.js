webpackJsonp([36],{"97VE":function(e,t,r){"use strict";var s={render:function(){var e=this.$createElement,t=this._self._c||e;return t("v-flex",{attrs:{container:"","pa-0":""}},[t("v-card",[t("user-request-form")],1)],1)},staticRenderFns:[]};t.a=s},DDgS:function(e,t,r){var s=r("I6F4");"string"==typeof s&&(s=[[e.i,s,""]]),s.locals&&(e.exports=s.locals);r("rjj0")("4d027054",s,!0,{sourceMap:!1})},I6F4:function(e,t,r){(e.exports=r("FZ+f")(!1)).push([e.i,"",""])},IFBA:function(e,t,r){"use strict";var s=r("hMA5");t.a={components:{UserRequestManagements:s.a},fetch:function(e){var t=e.store,r=e.params.id;return t.dispatch("owners/userrequests/load",{id:r},{root:!0})}}},LVNb:function(e,t,r){"use strict";var s={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-container",{staticClass:"request-user-forms"},[r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{disabled:!e.canSave,box:"",label:e.$t("Mail"),rules:e.rules.mail,required:""},model:{value:e.$record.mail,callback:function(t){e.$set(e.$record,"mail",t)},expression:"$record.mail"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{disabled:!e.canSave,box:"",label:e.$t("Type"),rules:e.rules.type,required:""},model:{value:e.$record.type,callback:function(t){e.$set(e.$record,"type",t)},expression:"$record.type"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{disabled:!e.canSave,box:"",label:e.$t("Domain")},model:{value:e.$record.domain,callback:function(t){e.$set(e.$record,"domain",t)},expression:"$record.domain"}})],1),r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-text-field",{attrs:{disabled:!e.canSave,box:"",label:e.$t("Site")},model:{value:e.$record.site,callback:function(t){e.$set(e.$record,"site",t)},expression:"$record.site"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:"",sm6:""}},[r("v-select",{attrs:{disabled:!e.canSave,items:e.status,label:e.$t("Status"),"item-value":"text"},model:{value:e.$record.status,callback:function(t){e.$set(e.$record,"status",t)},expression:"$record.status"}})],1)],1),r("v-layout",{attrs:{row:""}},[r("v-flex",{attrs:{xs12:""}},[r("v-text-field",{attrs:{disabled:!e.canSave,box:"","multi-line":"",label:e.$t("Note")}})],1)],1)],1)},staticRenderFns:[]};t.a=s},NqEI:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=r("IFBA"),a=r("gKuV"),n=r("VU/8")(s.a,a.a,!1,null,null,null);t.default=n.exports},gKuV:function(e,t,r){"use strict";var s={render:function(){var e=this.$createElement;return(this._self._c||e)("user-request-managements")},staticRenderFns:[]};t.a=s},hMA5:function(e,t,r){"use strict";var s=r("qAGT"),a=r("97VE");var n=function(e){r("DDgS")},o=r("VU/8")(s.a,a.a,!1,n,null,null);t.a=o.exports},oD7s:function(e,t,r){"use strict";var s=r("pcb9"),a=r("LVNb");var n=function(e){r("s97L")},o=r("VU/8")(s.a,a.a,!1,n,null,null);t.a=o.exports},pcb9:function(e,t,r){"use strict";var s=r("Dd8w"),a=r.n(s),n=r("NYxO");t.a={computed:a()({},Object(n.mapState)("owners/userrequests",["$record","record","status"]),Object(n.mapGetters)("auth",["canSave"])),data:function(){var e=this;return{e2:!1,rules:{mail:[function(t){return!!t||e.$t("required")}],type:[function(t){return!!t||e.$t("required")}]}}}}},qAGT:function(e,t,r){"use strict";var s=r("Dd8w"),a=r.n(s),n=r("oD7s"),o=r("NYxO");t.a={methods:a()({},Object(o.mapActions)("owners/userrequests",["save"]),{onSave:function(){var e=this;this.save({data:this.$record,id:this.$record.id}).then(function(t){return e.$router.push("/owners/userrequests"),t})}}),computed:a()({},Object(o.mapState)("owners/userrequests",["$record","record","form"])),components:{UserRequestForm:n.a}}},s97L:function(e,t,r){var s=r("tDRn");"string"==typeof s&&(s=[[e.i,s,""]]),s.locals&&(e.exports=s.locals);r("rjj0")("492cdb50",s,!0,{sourceMap:!1})},tDRn:function(e,t,r){(e.exports=r("FZ+f")(!1)).push([e.i,"",""])}});