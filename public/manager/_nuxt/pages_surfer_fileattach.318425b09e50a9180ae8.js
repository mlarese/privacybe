webpackJsonp([22],{"3i46":function(t,e,a){"use strict";var n=a("mtWM"),i=a.n(n);e.a={props:{endPoint:{default:""}},computed:{dragging:function(){return this.$upload.dropzone("attachments").active},outputFiles:function(){for(var t=this.$upload.files("attachments").all,e=[],a=0;a<t.length;a++){var n=t[a].$file;e.push({fileName:n.name,description:"Desc "+n.name})}return e}},mounted:function(){var t=this;this.$upload.on&&this.$upload.on("attachments",{maxFilesSelect:20,dropzoneId:"app-upload-drop-zone",multiple:!0,startOnSelect:!0,extensions:!1,onComplete:function(){this.$emit("after-upload",t.outputFiles)},http:function(e){var a=""+t.endPoint;i.a.post(a,e.body).then(e.success).catch(e.error)}})},beforeDestroy:function(){this.$upload&&this.$upload.off&&this.$upload.off("attachments")}}},"3kuc":function(t,e){t.exports=[{fileName:"file 1",description:"description file 1"},{fileName:"file 2",description:"description file 2"},{fileName:"file 3",description:"description file 3"}]},"4xK0":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=a("UE/T"),i=a("KSZU");var o=function(t){a("v2hd")},s=a("VU/8")(n.a,i.a,!1,o,"data-v-67bd78a2",null);e.default=s.exports},"6BrR":function(t,e,a){var n=a("rsnP");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);a("rjj0")("6d58ffd0",n,!0,{sourceMap:!1})},"B/f5":function(t,e,a){"use strict";var n={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"mt-2"},[a("v-flex",{attrs:{xs6:""}},[a("AttachmentList",t._g({attrs:{attachments:t.attachementsObject.attachments,"edit-mode":t.showUploader}},t.$listeners))],1),a("v-flex",{attrs:{xs6:""}},[t.showUploader?a("Uploader",t._b({on:{"after-upload":t.afterUpload}},"Uploader",t.$attrs,!1)):t._e()],1)],1)},staticRenderFns:[]};e.a=n},FEar:function(t,e,a){"use strict";var n={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("v-card",{staticClass:"elevation-1",class:{"drop-zone-active":t.dragging},attrs:{id:"app-upload-drop-zone"}},[a("a",{attrs:{name:"attach-a"},on:{click:function(e){t.$upload.select("attachments")}}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"pa-5 text-xs-center mt-5",attrs:{xs12:""}},[a("div",[t._v(t._s(t.$t("Drop files anywhere here to begin upload.")))]),a("div",[t._v(t._s(t.$t("Or click to select")))])])],1)],1)])],1)},staticRenderFns:[]};e.a=n},GEMo:function(t,e,a){var n=a("zGJu");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);a("rjj0")("4e09236a",n,!0,{sourceMap:!1})},GFJX:function(t,e,a){"use strict";var n=a("ZClL"),i=a("aQuG");e.a={name:"FileAttachmentManager",props:["attachementsObject","editMode","showUploader"],methods:{afterUpload:function(t){this.$emit("after-upload",t)}},components:{AttachmentList:i.a,Uploader:n.a}}},JoV4:function(t,e,a){"use strict";e.a={props:["attachments","editMode"],data:function(){return{$attachments:[]}},name:"AttachmentList",computed:{currentAttachments:function(){return this.attachments&&this.attachments.filter?this.attachments.filter(function(t){return!t.deleted}):[]}},methods:{onShowFile:function(t){this.$emit("download-attachment",t)},deleteItem:function(t){this.$emit("delete-attachment",t)}}}},KSZU:function(t,e,a){"use strict";var n={render:function(){var t=this.$createElement;return(this._self._c||t)("FileAttachmentManager",{attrs:{list:this.attacments}})},staticRenderFns:[]};e.a=n},MKll:function(t,e,a){var n=a("rGc4");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);a("rjj0")("4c5a4e7f",n,!0,{sourceMap:!1})},"UE/T":function(t,e,a){"use strict";var n=a("aMKN"),i=a("3kuc"),o=a.n(i);e.a={name:"fileattach",auth:!1,data:function(){return{attacments:o.a}},components:{FileAttachmentManager:n.a}}},YrFo:function(t,e,a){"use strict";var n={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("v-toolbar",{attrs:{dense:""}},[a("v-toolbar-title",[t._v(t._s(t.$t("Attachments")))])],1),a("v-card",{staticStyle:{overflow:"auto"},attrs:{height:"200"}},[a("v-list",{staticStyle:{"min-height":"200px"},attrs:{"two-line":"",dense:""}},[t._l(t.currentAttachments,function(e,n){return[a("v-list-tile",{key:n,attrs:{avatar:""}},[a("v-list-tile-avatar",{attrs:{color:"blue darken-2"}},[a("v-btn",{attrs:{avatar:"",flat:"",dark:""},on:{click:function(e){t.onShowFile(n)}}},[a("v-icon",{attrs:{dark:"",large:"",dark:""}},[t._v("description")])],1)],1),a("v-list-tile-content",[a("v-list-tile-title",{domProps:{textContent:t._s(e.fileName)}}),a("v-list-tile-sub-title",[a("v-text-field",{staticClass:"attachment-description-input",attrs:{"hide-details":"",disabled:!t.editMode,solo:""},model:{value:e.description,callback:function(a){t.$set(e,"description",a)},expression:"a.description"}})],1)],1),t.editMode?a("v-list-tile-action",[a("v-btn",{attrs:{flat:"",icon:""},on:{click:function(e){t.deleteItem(n)}}},[a("v-icon",[t._v("delete")])],1)],1):t._e()],1),a("v-divider")]})],2)],1)],1)},staticRenderFns:[]};e.a=n},ZClL:function(t,e,a){"use strict";var n=a("3i46"),i=a("FEar");var o=function(t){a("MKll")},s=a("VU/8")(n.a,i.a,!1,o,null,null);e.a=s.exports},aMKN:function(t,e,a){"use strict";var n=a("GFJX"),i=a("B/f5");var o=function(t){a("GEMo")},s=a("VU/8")(n.a,i.a,!1,o,"data-v-7f28f6b3",null);e.a=s.exports},aQuG:function(t,e,a){"use strict";var n=a("JoV4"),i=a("YrFo");var o=function(t){a("6BrR")},s=a("VU/8")(n.a,i.a,!1,o,null,null);e.a=s.exports},rGc4:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"#app-upload-drop-zone{height:251px!important}#app-upload-drop-zone.drop-zone-active{background:#c1c1c1}",""])},rsnP:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".attachment-description-input{min-height:20px}.attachment-description-input .input-group__input{padding:0!important;border-width:0}.attachment-description-input input{padding:0 0 0 5px;background:#f6f6f6}",""])},"sgP/":function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},v2hd:function(t,e,a){var n=a("sgP/");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);a("rjj0")("00878547",n,!0,{sourceMap:!1})},zGJu:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])}});