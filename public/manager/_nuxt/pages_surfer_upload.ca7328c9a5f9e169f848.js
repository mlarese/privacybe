webpackJsonp([32],{"3i46":function(t,e,a){"use strict";var o=a("mtWM"),n=a.n(o),r="attachments";e.a={props:{endPoint:{default:""}},computed:{dragging:function(){return this.$upload.dropzone(r).active},outputFiles:function(){for(var t=this.$upload.files(r).all,e=[],a=0;a<t.length;a++){var o=t[a].$file;e.push({fileName:o.name,description:"Desc "+o.name})}return e}},mounted:function(){var t=this;this.$upload.on&&this.$upload.on(r,{maxFilesSelect:20,dropzoneId:"app-upload-drop-zone",multiple:!0,startOnSelect:!0,extensions:!1,onComplete:function(){this.$emit("after-upload",t.outputFiles),this.$upload.reset(r)},http:function(e){var a=""+t.endPoint;n.a.post(a,e.body).then(e.success).catch(e.error)}})},beforeDestroy:function(){this.$upload&&this.$upload.off&&this.$upload.off(r)}}},DdK3:function(t,e,a){var o=a("ztIB");"string"==typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);a("rjj0")("0229f623",o,!0,{sourceMap:!1})},EkJr:function(t,e,a){"use strict";var o={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("v-card",{staticClass:"elevation-1",class:{"drop-zone-active":t.dragging},attrs:{id:"app-upload-drop-zone"}},[a("a",{attrs:{name:"attach-a"},on:{click:function(e){t.$upload.select("attachments")}}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"pa-5 text-xs-center mt-5",attrs:{xs12:""}},[a("div",[t._v(t._s(t.$t("Drop files anywhere here to begin upload.")))]),a("div",[t._v(t._s(t.$t("Or click to select")))])])],1)],1)])],1)},staticRenderFns:[]};e.a=o},KduK:function(t,e,a){var o=a("nC6h");"string"==typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);a("rjj0")("1b094e9f",o,!0,{sourceMap:!1})},ZClL:function(t,e,a){"use strict";var o=a("3i46"),n=a("EkJr");var r=function(t){a("KduK")},s=a("VU/8")(o.a,n.a,!1,r,null,null);e.a=s.exports},"ftc+":function(t,e,a){"use strict";var o={render:function(){var t=this.$createElement;return(this._self._c||t)("Uploader",{attrs:{endpoint:"http://localhost/api/test/usersupfile"},on:{"after-upload":this.afterUpload}})},staticRenderFns:[]};e.a=o},i6Up:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var o=a("tOWr"),n=a("ftc+");var r=function(t){a("DdK3")},s=a("VU/8")(o.a,n.a,!1,r,"data-v-863adb6e",null);e.default=s.exports},nC6h:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"#app-upload-drop-zone{height:251px!important}#app-upload-drop-zone.drop-zone-active{background:#c1c1c1}",""])},tOWr:function(t,e,a){"use strict";var o=a("ZClL");e.a={auth:!1,methods:{afterUpload:function(t){console.dir(t)}},components:{Uploader:o.a}}},ztIB:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])}});