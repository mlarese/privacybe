webpackJsonp([8],{"07oM":function(t,e,a){"use strict";var s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",{staticClass:"pa-2",attrs:{fluid:"","grid-list-sm":""}},[e("UserForm")],1)},staticRenderFns:[]};e.a=s},"21M4":function(t,e,a){"use strict";var s=a("UbEG"),r=a("k7t3");var n=function(t){a("BCRM")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},"3i46":function(t,e,a){"use strict";var s=a("mtWM"),r=a.n(s);e.a={props:{endPoint:{default:""}},computed:{dragging:function(){return this.$upload.dropzone("attachments").active},outputFiles:function(){for(var t=this.$upload.files("attachments").all,e=[],a=0;a<t.length;a++){var s=t[a].$file;e.push({fileName:s.name,description:"Desc "+s.name})}return e}},mounted:function(){var t=this;this.$upload.on&&this.$upload.on("attachments",{maxFilesSelect:20,dropzoneId:"app-upload-drop-zone",multiple:!0,startOnSelect:!0,extensions:!1,onComplete:function(){this.$emit("after-upload",t.outputFiles)},http:function(e){var a=""+t.endPoint;r.a.post(a,e.body).then(e.success).catch(e.error)}})},beforeDestroy:function(){this.$upload&&this.$upload.off&&this.$upload.off("attachments")}}},"6BrR":function(t,e,a){var s=a("rsnP");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("6d58ffd0",s,!0,{sourceMap:!1})},"B/f5":function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"mt-2"},[a("v-flex",{attrs:{xs6:""}},[a("AttachmentList",t._g({attrs:{attachments:t.attachementsObject.attachments,"edit-mode":t.showUploader}},t.$listeners))],1),a("v-flex",{attrs:{xs6:""}},[t.showUploader?a("Uploader",t._b({on:{"after-upload":t.afterUpload}},"Uploader",t.$attrs,!1)):t._e()],1)],1)},staticRenderFns:[]};e.a=s},BCRM:function(t,e,a){var s=a("o9cn");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("5298a995",s,!0,{sourceMap:!1})},FEar:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("v-card",{staticClass:"elevation-1",class:{"drop-zone-active":t.dragging},attrs:{id:"app-upload-drop-zone"}},[a("a",{attrs:{name:"attach-a"},on:{click:function(e){t.$upload.select("attachments")}}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"pa-5 text-xs-center mt-5",attrs:{xs12:""}},[a("div",[t._v(t._s(t.$t("Drop files anywhere here to begin upload.")))]),a("div",[t._v(t._s(t.$t("Or click to select")))])])],1)],1)])],1)},staticRenderFns:[]};e.a=s},FTYE:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("NYxO"),i=a("wxRE"),o=a("21M4");t="owners/users";e.a={data:function(){var t=this;return{showDeleteDialog:!1,record:{},formDataEdit:!1,rules:{email:[function(e){return!!e||t.$t("required")},function(e){return/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(e)||t.$t("E-mail not valid")}],name:[function(e){return!!e||t.$t("required")}],surname:[function(e){return!!e||t.$t("required")}]}}},methods:r()({},Object(n.mapActions)(t,["saveLastSubsriptionUserData","loadAttachments"]),Object(n.mapMutations)(t,["resetAttachments"]),{onSave:function(){var t=this,e=this.getLastSubscription,a=e.id,s=e.name,r=e.surname,n=e.telephone,i=e.email,o=e.note;return this.saveLastSubsriptionUserData({id:a,data:{name:s,surname:r,telephone:n,email:i,note:o}}).then(function(){t.formDataEdit=!1}).then(function(){var e=t.list.find(function(t){t.id=a});e&&(e.name=s,e.surname=r,e.telephone=n)})},onCancel:function(){this.resetAttachments(),this.formDataEdit=!1},cancelUserDelete:function(){this.showDeleteDialog=!1}}),components:{RemoveUserDialog:i.a,SmallEditSaveButtonBar:o.a},computed:r()({},Object(n.mapState)(t,["list"]),Object(n.mapGetters)(t,["getLastSubscription","filterListByDate"]),Object(n.mapGetters)("auth",["canSave"])),created:function(){this.record=this.getLastSubscription,this.record.id&&this.loadAttachments(this.record.id)}}},FiYa:function(t,e,a){"use strict";var s=a("FTYE"),r=a("g18l");var n=function(t){a("wKWU")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},GEMo:function(t,e,a){var s=a("zGJu");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("4e09236a",s,!0,{sourceMap:!1})},GFJX:function(t,e,a){"use strict";var s=a("ZClL"),r=a("aQuG");e.a={name:"FileAttachmentManager",props:["attachementsObject","editMode","showUploader"],methods:{afterUpload:function(t){this.$emit("after-upload",t)}},components:{AttachmentList:r.a,Uploader:s.a}}},JoV4:function(t,e,a){"use strict";e.a={props:["attachments","editMode"],data:function(){return{$attachments:[]}},name:"AttachmentList",computed:{currentAttachments:function(){return this.attachments&&this.attachments.filter?this.attachments.filter(function(t){return!t.deleted}):[]}},methods:{onShowFile:function(t){this.$emit("download-attachment",t)},deleteItem:function(t){this.$emit("delete-attachment",t)}}}},MKll:function(t,e,a){var s=a("rGc4");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("4c5a4e7f",s,!0,{sourceMap:!1})},OU2e:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("RrsX"),r=a("07oM"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.default=n.exports},OtzM:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("y9sX"),i=a("FiYa"),o=a("NYxO"),c=a("uHjU"),l=a("VebV");e.a={name:"UserForm",mixins:[Object(l.a)("owners/users")],data:function(){return{apiEndpoint:null}},created:function(){this.apiEndpoint=c.a+"/user/attachmentupd/"+this.getLastSubscription.id},computed:r()({},Object(o.mapState)("owners/users",["attachments","$attachments"]),Object(o.mapGetters)("owners/users",["attachmentList","getLastSubscription","getLastSubscription"]),Object(o.mapGetters)("auth",["canSave"]),{privacyUid:function(){return this.getLastSubscription.id}}),props:{to:{default:"/owners/users"}},components:{UserFormData:i.a,UserFormTerms:n.a}}},Rm3i:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},RrsX:function(t,e,a){"use strict";var s=a("sJ2R");e.a={components:{UserForm:s.a},fetch:function(t){var e=t.params,a=t.store,s=e.id;return a.commit("owners/users/setAttachments",{},{root:!1}),a.dispatch("owners/users/loadRecordList",{id:s},{root:!0})}}},UbEG:function(t,e,a){"use strict";e.a={components:{},props:{hideCancel:{default:!1},hideDelete:{default:!1},editMode:Boolean,color:{default:"grey darken-1"}},methods:{onEditClick:function(){this.$emit("edit")},onDeleteClick:function(){this.$emit("delete")},onSaveClick:function(){this.$emit("save")},onCancelClick:function(){this.$emit("cancel")}}}},VebV:function(t,e,a){"use strict";a.d(e,"a",function(){return d});var s=a("Dd8w"),r=a.n(s),n=a("NYxO"),i=a("aMKN"),o=a("lbHh"),c=a.n(o),l=a("jLWv"),d=function(t){return{components:{FileAttachmentManager:i.a},methods:r()({},Object(n.mapActions)("owners/users",["downloadAttachment"]),Object(n.mapMutations)("owners/users",["removeAttachment","blankAttachments","addAttachments"]),{onAfterUpload:function(t){this.addAttachments(t)},onDownloadAttachment:function(t){var e=this.$auth.getToken(Object(l.c)()),a=e.split("bearer ");a.length>0?(e=a[1],c.a.set("token",e),this.downloadAttachment({i:t,privacyUid:this.privacyUid})):alert(this.$t("Error"))},onDeleteAttachment:function(t){confirm(this.$t("Do you confirm?"))&&this.removeAttachment(t)}}),computed:r()({},Object(n.mapState)("owners/users",["attachments","$attachments"]),Object(n.mapGetters)("owners/users",["attachmentList"]))}}},"X2/d":function(t,e,a){var s=a("Rm3i");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("777e6cac",s,!0,{sourceMap:!1})},YrFo:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("v-toolbar",{attrs:{dense:""}},[a("v-toolbar-title",[t._v(t._s(t.$t("Attachments")))])],1),a("v-card",{staticStyle:{overflow:"auto"},attrs:{height:"200"}},[a("v-list",{staticStyle:{"min-height":"200px"},attrs:{"two-line":"",dense:""}},[t._l(t.currentAttachments,function(e,s){return[a("v-list-tile",{key:s,attrs:{avatar:""}},[a("v-list-tile-avatar",{attrs:{color:"blue darken-2"}},[a("v-btn",{attrs:{avatar:"",flat:"",dark:""},on:{click:function(e){t.onShowFile(s)}}},[a("v-icon",{attrs:{dark:"",large:"",dark:""}},[t._v("description")])],1)],1),a("v-list-tile-content",[a("v-list-tile-title",{domProps:{textContent:t._s(e.fileName)}}),a("v-list-tile-sub-title",[a("v-text-field",{staticClass:"attachment-description-input",attrs:{"hide-details":"",disabled:!t.editMode,solo:""},model:{value:e.description,callback:function(a){t.$set(e,"description",a)},expression:"a.description"}})],1)],1),t.editMode?a("v-list-tile-action",[a("v-btn",{attrs:{flat:"",icon:""},on:{click:function(e){t.deleteItem(s)}}},[a("v-icon",[t._v("delete")])],1)],1):t._e()],1),a("v-divider")]})],2)],1)],1)},staticRenderFns:[]};e.a=s},YroG:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".bigger-check{position:relative;top:3px;width:16px;height:16px}.owner-user-form-terms-data-table{padding:0;background:transparent;width:100%;border:1px solid silver;border-spacing:0;border-collapse:collapse}.owner-user-form-terms-data-table th{text-transform:uppercase}.owner-user-form-terms-data-table td,.owner-user-form-terms-data-table th{background:#fff;padding:3px 3px 3px 5px;border-spacing:0;border:1px solid silver;text-align:left;vertical-align:baseline}",""])},ZClL:function(t,e,a){"use strict";var s=a("3i46"),r=a("FEar");var n=function(t){a("MKll")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},aMKN:function(t,e,a){"use strict";var s=a("GFJX"),r=a("B/f5");var n=function(t){a("GEMo")},i=a("VU/8")(s.a,r.a,!1,n,"data-v-7f28f6b3",null);e.a=i.exports},aQuG:function(t,e,a){"use strict";var s=a("JoV4"),r=a("YrFo");var n=function(t){a("6BrR")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},g18l:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"owner-user-form-layout",attrs:{column:""}},[a("v-flex",{staticClass:"blue-grey lighten-5 pa-3",attrs:{xs12:""}},[a("RemoveUserDialog",{attrs:{email:t.record.email,show:t.showDeleteDialog},on:{cancel:t.cancelUserDelete}}),a("div",{staticClass:"title"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"pt-3",attrs:{xs6:""}},[t._v("\n                    "+t._s(t.$t("User data"))+"\n                ")]),t.canSave?a("v-flex",{staticClass:"text-xs-right",attrs:{xs6:""}},[a("SmallEditSaveButtonBar",{attrs:{"edit-mode":t.formDataEdit,"hide-cancel":!1},on:{delete:function(e){t.showDeleteDialog=!0},save:t.onSave,cancel:t.onCancel,edit:function(e){t.formDataEdit=!0}}})],1):t._e()],1)],1),a("v-form",[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-spacer")],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-text-field",{attrs:{disabled:!t.canSave||!t.formDataEdit,"hide-details":"",rules:t.rules.surname,required:"",box:"",label:t.$t("Surname")},model:{value:t.record.surname,callback:function(e){t.$set(t.record,"surname",e)},expression:"record.surname"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-text-field",{attrs:{disabled:!t.canSave||!t.formDataEdit,"hide-details":"",rules:t.rules.name,required:"",box:"",label:t.$t("Name")},model:{value:t.record.name,callback:function(e){t.$set(t.record,"name",e)},expression:"record.name"}})],1)],1),a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-text-field",{attrs:{"hide-details":"",rules:t.rules.email,required:"",disabled:!0,box:"",label:t.$t("Email")},model:{value:t.record.email,callback:function(e){t.$set(t.record,"email",e)},expression:"record.email"}})],1),a("v-flex",{attrs:{xs12:"",sm6:""}},[a("v-text-field",{attrs:{disabled:!t.canSave||!t.formDataEdit,"hide-details":"",box:"",label:t.$t("Telephone")},model:{value:t.record.telephone,callback:function(e){t.$set(t.record,"telephone",e)},expression:"record.telephone"}})],1)],1),a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-text-field",{attrs:{disabled:!t.canSave||!t.formDataEdit,textarea:"","hide-details":"",box:"",label:t.$t("Note")},model:{value:t.record.note,callback:function(e){t.$set(t.record,"note",e)},expression:"record.note"}})],1)],1),a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"pa-0"},[t._t("bottom",null,{options:{formDataEdit:t.formDataEdit}})],2)],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},i4F6:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".owner-user-form-layout .input-group--text-field input:disabled{opacity:.3}",""])},ipnL:function(t,e,a){"use strict";var s=a("Dd8w"),r=a.n(s),n=a("NYxO"),i=a("21M4");e.a={name:"UserFormTerms",methods:r()({onSave:function(){var t=this;this.$nuxt.$loading.start(),this.saveAllTerms(this.modified).then(function(){t.$nuxt.$loading.finish(),t.dataEdit=!1}).catch(function(){return t.$nuxt.$loading.finish()})},flagDisabled:function(t){return!this.dataEdit||!!t.mandatory&&!this.allowAll},allFlags:function(t){if(!t||!t.paragraphs)return[];for(var e=[],a=0;a<t.paragraphs.length;a++)for(var s=t.paragraphs[a],r=0;r<s.treatments.length;r++){var n=s.treatments[r],i=n.code,o=n.selected,c=n.mandatory;e.push({code:i,selected:o,mandatory:c})}return e},addChangedTerm:function(t){var e=this,a=this.modified.findIndex(function(e){return t.id===e.id});this.$nextTick(function(){var s={id:t.id,privacy:t.privacy,privacyFlags:e.allFlags(t.privacy)};a<0?e.modified.push(s):e.modified[a]=s})}},Object(n.mapActions)("owners/users",["saveAllTerms"]),{termName:function(t){var e=0;return e=t.privacy&&t.privacy.termId?t.privacy.termId:t.termId,this.termsMap[e]?this.termsMap[e].name:"Informativa generica"}}),props:{allowAll:{default:!1},showSmartBar:{default:!0},multiPrivacy:{default:!0},readOnly:{default:!1}},data:function(){return{dataEdit:!1,modified:[]}},components:{SmallEditSaveButtonBar:i.a},created:function(){this.readOnly?this.dataEdit=!1:this.showSmartBar||(this.dataEdit=!0)},computed:r()({},Object(n.mapGetters)("terms",["termsMap"]),Object(n.mapState)("owners/users",["recordList"]))}},k7t3:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-flex",{staticClass:"small-edit-save-button-bar pa-0 ma-0"},[t.editMode?t._e():[t.hideDelete?t._e():a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onDeleteClick},slot:"activator"},[a("v-icon",[t._v("delete")])],1),a("span",[t._v(t._s(t.$t("Delete")))])],1),a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onEditClick},slot:"activator"},[a("v-icon",[t._v("edit")])],1),a("span",[t._v(t._s(t.$t("Edit")))])],1)],t.editMode?[t.hideCancel?t._e():a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onCancelClick},slot:"activator"},[a("v-icon",[t._v("exit_to_app")])],1),a("span",[t._v(t._s(t.$t("Cancel")))])],1),a("v-tooltip",{attrs:{top:"","close-delay":"0","open-delay":"0"}},[a("v-btn",{attrs:{slot:"activator",icon:"",flat:"",color:t.color},on:{click:t.onSaveClick},slot:"activator"},[a("v-icon",[t._v("save")])],1),a("span",[t._v(t._s(t.$t("Save")))])],1)]:t._e()],2)},staticRenderFns:[]};e.a=s},mXxJ:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-dialog",{attrs:{persistent:"","max-width":"450"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[a("v-toolbar",{attrs:{dense:"",color:"blue",dark:""}},[a("v-toolbar-title",{staticClass:"subheading"},[t._v("\n            "+t._s(t.$t("Remove user"))+" "+t._s(t.email)+"\n        ")])],1),a("v-card",{staticClass:"pa-3"},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("v-form",{ref:"exportform",attrs:{enctype:"text/plain",target:"_blank",method:"POST"}},[a("v-text-field",{attrs:{label:t.$t("Security check - Input user email"),box:""},model:{value:t.checkEmail,callback:function(e){t.checkEmail=e},expression:"checkEmail"}}),a("v-alert",{attrs:{type:"error",value:!0}},[t._v("\n                        "+t._s(t.$t("You will delete all the subscriptions"))+"\n                    ")])],1)],1)],1),a("v-card-actions",[a("a",{directives:[{name:"show",rawName:"v-show",value:!1,expression:"false"}]}),a("v-spacer"),a("v-btn",{staticClass:"elevation-1",nativeOn:{click:function(e){return t.onCancel(e)}}},[t._v(t._s(t.$t("Cancel")))]),a("v-btn",{staticClass:"elevation-1",attrs:{disabled:!t.canCancel},nativeOn:{click:function(e){return t.onExport(e)}}},[a("v-icon",[t._v("delete")]),a("span",{staticClass:"ml-2"},[t._v(t._s(t.$t("Remove user")))])],1)],1)],1)],1)},staticRenderFns:[]};e.a=s},o9cn:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".small-edit-save-button-bar .btn{margin:0}",""])},rGc4:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"#app-upload-drop-zone{height:251px!important}#app-upload-drop-zone.drop-zone-active{background:#c1c1c1}",""])},rsnP:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".attachment-description-input{min-height:20px}.attachment-description-input .input-group__input{padding:0!important;border-width:0}.attachment-description-input input{padding:0 0 0 5px;background:#f6f6f6}",""])},sJ2R:function(t,e,a){"use strict";var s=a("OtzM"),r=a("vrJy");var n=function(t){a("X2/d")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},vrJy:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"owner-user-form pt-0",attrs:{column:""}},[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"btn-back",attrs:{xs12:"","pt-0":""}},[a("v-tooltip",{attrs:{right:""}},[a("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",disabled:!t.canSave,fab:"",flat:"",small:"",to:t.to,"active-class":""},slot:"activator"},[a("v-icon",[t._v("reply")])],1),a("span",[t._v(t._s(t.$t("Back")))])],1)],1)],1),a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{staticClass:"mb-3",attrs:{xs12:""}},[a("UserFormData",{scopedSlots:t._u([{key:"bottom",fn:function(e){var s=e.options;return a("div",{},[a("FileAttachmentManager",{attrs:{"edit-mode":s.formDataEdit,"end-point":t.apiEndpoint,"attachements-object":t.$attachments},on:{"after-upload":t.onAfterUpload,"delete-attachment":t.onDeleteAttachment,"download-attachment":t.onDownloadAttachment}})],1)}}])})],1),a("v-flex",{attrs:{xs12:""}},[a("UserFormTerms",{staticClass:"grey lighten-3",attrs:{"allow-all":!0,"show-smart-bar":t.canSave}})],1)],1)],1)},staticRenderFns:[]};e.a=s},vxvt:function(t,e,a){"use strict";var s={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{staticClass:"owner-user-form-terms",attrs:{column:""}},[a("v-flex",{staticClass:" lighten-5 pa-3",attrs:{xs12:""}},[a("v-layout",{attrs:{row:"",wrap:""}},[t.multiPrivacy?a("v-flex",{staticClass:"title pt-3",attrs:{xs12:"",sm6:""}},[t._v("\n                    "+t._s(t.$t("Terms"))+"\n                ")]):t._e(),t.showSmartBar?a("v-flex",{staticClass:"text-xs-right",attrs:{xs12:"",sm6:""}},[a("SmallEditSaveButtonBar",{attrs:{"hide-delete":!0,"edit-mode":t.dataEdit},on:{edit:function(e){t.dataEdit=!0},save:t.onSave,cancel:function(e){t.dataEdit=!1}}})],1):t._e()],1),t._l(t.recordList,function(e,s,r){return[a("v-layout",{attrs:{row:"",wrap:""}},[a("v-flex",{attrs:{xs12:""}},[a("table",{staticClass:"owner-user-form-terms-data-table mb-3"},[t._l(e,function(e,s,r){return[0==r?[a("tr",{staticClass:"caption owner-user-form-terms-data-table-privacy-name"},[a("td",{staticClass:"pl-3 pt-2",attrs:{colspan:"3"}},[a("b",[t._v("\n                                            "+t._s(t.termName(e))+"\n                                        ")])])]),a("tr",{staticClass:"caption"},[a("th",{attrs:{width:"1%"}},[t._v(t._s(t.$t("Date")))]),a("th",{attrs:{width:"1%"}},[t._v(t._s(t.$t("Time")))]),a("th",{attrs:{width:"50%"}},[t._v(t._s(t.$t("Treatments")))]),a("th",{attrs:{width:"30%"}},[t._v(t._s(t.$t("Privacy url"))+"/IP")])])]:t._e(),e?[a("tr",{staticClass:"caption"},[e.created?a("td",[t._v(t._s(t._f("dmy")(e.created.date||e.created)))]):t._e(),e.created?a("td",[t._v(" "+t._s(t._f("time")(e.created.date||e.created)))]):t._e(),a("td",[e.privacy?a("span",[t._l(e.privacy.paragraphs,function(s){return[a("div",[a("div",[a("i",[t._v(t._s(s.title))])]),t._l(s.treatments,function(s,r){return[a("div",{staticClass:"ml-4"},[a("input",{directives:[{name:"model",rawName:"v-model",value:s.selected,expression:"t.selected"}],staticClass:"bigger-check",attrs:{type:"checkbox",disabled:t.flagDisabled(s)},domProps:{checked:Array.isArray(s.selected)?t._i(s.selected,null)>-1:s.selected},on:{click:function(a){t.addChangedTerm(e)},change:function(e){var a=s.selected,r=e.target,n=!!r.checked;if(Array.isArray(a)){var i=t._i(a,null);r.checked?i<0&&t.$set(s,"selected",a.concat([null])):i>-1&&t.$set(s,"selected",a.slice(0,i).concat(a.slice(i+1)))}else t.$set(s,"selected",n)}}}),t._v(" "+t._s(s.code)+"\n                                                            "),s.mandatory||s.restrictive?a("span",{staticClass:"ml-2"},[t._v("\n                                                                ("),s.mandatory?a("span",[t._v(t._s(t.$t("Mandatory"))+" ")]):t._e(),s.restrictive?a("span",[t._v(t._s(t.$t("Restrictive"))+" ")]):t._e(),t._v(")\n                                                            ")]):t._e()])]})],2)]})],2):t._e()]),a("td",[t._v("\n                                        "+t._s(e.page)),a("br"),t._v(t._s(e.ip)+"\n                                    ")])]),a("tr",[a("td",{staticClass:"pa-0",staticStyle:{"border-bottom":"3px solid grey"},attrs:{colspan:"4"}},[a("v-expansion-panel",{staticClass:"elevation-0"},[a("v-expansion-panel-content",[a("div",{attrs:{slot:"header"},slot:"header"},[t._v(t._s(t.$t("Other data")))]),a("v-card",[a("v-card-text",{staticClass:"grey lighten-3"},[t._l(e.form,function(e,s){return[a("div",{key:s},[a("b",[t._v(t._s(s))]),t._v(": "+t._s(e)+"\n                                                            ")])]})],2)],1)],1)],1)],1)])]:t._e()]})],2)])],1)]})],2)],1)},staticRenderFns:[]};e.a=s},wKWU:function(t,e,a){var s=a("i4F6");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("586aa22a",s,!0,{sourceMap:!1})},wxRE:function(t,e,a){"use strict";var s=a("yNn2"),r=a("mXxJ"),n=a("VU/8")(s.a,r.a,!1,null,null,null);e.a=n.exports},x69M:function(t,e,a){var s=a("YroG");"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a("rjj0")("03d69b9a",s,!0,{sourceMap:!1})},y9sX:function(t,e,a){"use strict";var s=a("ipnL"),r=a("vxvt");var n=function(t){a("x69M")},i=a("VU/8")(s.a,r.a,!1,n,null,null);e.a=i.exports},yNn2:function(t,e,a){"use strict";e.a={name:"RemoveUserDialog",methods:{onCancel:function(){this.$emit("cancel")}},computed:{canCancel:function(){return this.email===this.checkEmail}},data:function(){return{checkEmail:""}},props:{show:{default:!1},email:{type:String}}}},zGJu:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])}});