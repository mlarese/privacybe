webpackJsonp([22],{"0wcf":function(e,t,r){"use strict";var n=r("Tk4e");t.a={auth:!1,components:{EmailSender:n.a},layout:"whitepage"}},"1Fsp":function(e,t,r){(e.exports=r("FZ+f")(!1)).push([e.i,".surfer-email-sender-submit{height:32px;font-weight:400}.surfer-email-sender-submit .btn__content{font-size:14px}.surfer-email-sender-text{min-height:34px!important}.surfer-email-sender-text .input-group__input{border:1px solid #e0e0e0!important;min-height:33px}",""])},BUf6:function(e,t,r){"use strict";t.a={data:function(){var e=this;return{email:null,valid:!1,rules:{email:[function(t){return!!t||e.$t("required")},function(t){return/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(t)||e.$t("E-mail not valid")}]}}},computed:{canSend:function(){return this.valid}}}},IdFf:function(e,t,r){var n=r("1Fsp");"string"==typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);r("rjj0")("ae55bcaa",n,!0,{sourceMap:!1})},Tk4e:function(e,t,r){"use strict";var n=r("BUf6"),a=r("e2Va");var s=function(e){r("IdFf")},i=r("VU/8")(n.a,a.a,!1,s,null,null);t.a=i.exports},UiW1:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=r("0wcf"),a=r("nDur"),s=r("VU/8")(n.a,a.a,!1,null,null,null);t.default=s.exports},e2Va:function(e,t,r){"use strict";var n={render:function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-container",{staticClass:"surfer-email-sender",attrs:{fluid:"","grid-list-lg":""}},[r("v-form",{model:{value:e.valid,callback:function(t){e.valid=t},expression:"valid"}},[r("v-layout",{attrs:{row:"",wrap:""}},[r("v-flex",{attrs:{xs12:""}},[e._v("\n                privacy text\n            ")])],1),r("v-layout",{attrs:{row:"",wrap:"","align-end":""}},[r("v-flex",{attrs:{xs3:""}},[r("b",[r("span",{domProps:{textContent:e._s(e.$t("Email address"))}})]),r("v-text-field",{staticClass:"elevation-0 grey lighten-5 surfer-email-sender-text ",attrs:{solo:"",required:"",rules:e.rules.email},model:{value:e.email,callback:function(t){e.email=t},expression:"email"}})],1),r("v-flex",{staticClass:"pb-1",attrs:{xs3:""}},[r("v-btn",{staticClass:"elevation-0 surfer-email-sender-submit",staticStyle:{"text-transform":"uppercase"},attrs:{color:"light-blue lighten-2",dark:"",disabled:!e.canSend}},[e._v("\n                     "+e._s(e.$t("Send"))+"\n                     "),r("v-icon",{attrs:{dark:"",right:""}},[e._v("chevron_right")])],1)],1)],1)],1)],1)},staticRenderFns:[]};t.a=n},nDur:function(e,t,r){"use strict";var n={render:function(){var e=this.$createElement;return(this._self._c||e)("email-sender")},staticRenderFns:[]};t.a=n}});