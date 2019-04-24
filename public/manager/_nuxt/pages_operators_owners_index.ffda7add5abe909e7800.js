webpackJsonp([24],{"+HeT":function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,"",""])},"4mT/":function(t,e,a){"use strict";var n=a("LptT"),o=a("DOsa");var r=function(t){a("ijtl")},s=a("VU/8")(n.a,o.a,!1,r,null,null);e.a=s.exports},DOsa:function(t,e,a){"use strict";var n={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"owners-list",attrs:{row:""}},[a("list-bar",{attrs:{to:"/operators/owners/add",color:"blue lighten-1",caption:"Create New Owner",title:"Management Owners","sub-title":"List of active Management Owners"}}),a("v-toolbar",{staticClass:"py-0 px-4  elevation-1",attrs:{dense:"",color:"white"}},[a("v-text-field",{staticClass:"text-box-search",attrs:{"append-icon":"search",label:t.$t("Search"),"single-line":"","hide-details":""},model:{value:t.search,callback:function(e){t.search=e},expression:"search"}}),a("v-tooltip",{attrs:{top:""}},[a("JsonExcel",{ref:"jsonExcel",staticClass:"ml-3",staticStyle:{cursor:"pointer"},attrs:{slot:"activator",name:"titolari.csv",data:t.filteredItems,type:"csv",fields:t.exportFields},nativeOn:{click:function(e){return t.onExport(e)}},slot:"activator"},[a("v-icon",[t._v("\n                                save_alt\n                            ")])],1),t._v("\n                        "+t._s(t.$t("Csv Export"))+"\n                    ")],1)],1),a("v-data-table",t._b({ref:"ownersDatatable",staticClass:"elevation-1",attrs:{headers:t.headers,items:t.list,search:t.search},scopedSlots:t._u([{key:"items",fn:function(e){var n=e.item;return[a("td",{class:{white:n.active,orange:!n.active}},[t._v(t._s(n.company))]),a("td",{class:{white:n.active,orange:!n.active}},[t._v(t._s(n.email))]),a("td",{class:{white:n.active,orange:!n.active}},[t._v("\n                "+t._s(n.surname)+" "+t._s(n.name!=n.surname?n.name:"")+"\n            ")]),a("td",{class:{white:n.active,orange:!n.active}},[t._v(t._s(n.language))]),a("td",{staticClass:"justify-center layout px-0"},[a("nuxt-link",{attrs:{to:"/operators/owners/"+n.id+"?mode=edit","active-class":""}},[a("v-btn",{attrs:{flat:"",icon:"",color:"blue"}},[a("v-icon",[t._v("edit")])],1)],1),t.production?t._e():a("v-tooltip",{attrs:{left:""}},[a("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",icon:""},on:{click:function(e){t.onLayout(n)}},slot:"activator"},[a("v-icon",{attrs:{color:"green"}},[t._v("mail")])],1),t._v("\n                    "+t._s(t.$t("Email layouts"))+"\n                ")],1),n.active?t._e():a("v-tooltip",{attrs:{left:""}},[a("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",icon:""},on:{click:function(e){t.onActivate(n)}},slot:"activator"},[a("v-icon",{attrs:{color:"green"}},[t._v("play_arrow")])],1),t._v("\n                    "+t._s(t.$t("activate"))+"\n                ")],1),n.active?a("v-tooltip",{attrs:{left:""}},[a("v-btn",{staticClass:"mx-0",attrs:{slot:"activator",icon:""},on:{click:function(e){t.onDeactivate(n)}},slot:"activator"},[a("v-icon",{attrs:{color:"red"}},[t._v("pause")])],1),t._v("\n                    "+t._s(t.$t("deactivate"))+"\n                ")],1):t._e()],1)]}},{key:"pageText",fn:function(e){var a=e.pageStart,n=e.pageStop;return[t._v("\n            "+t._s(t.$t("From"))+" "+t._s(a)+" "+t._s(t.$t("To"))+" "+t._s(n)+"\n        ")]}}])},"v-data-table",t.tableTexts,!1),[a("v-alert",{attrs:{slot:"no-results",value:!0,color:"warning",icon:"warning"},slot:"no-results"},[t._v("\n            "+t._s(t.$t("No owner found"))+"\n        ")])],1)],1)},staticRenderFns:[]};e.a=n},KOvE:function(t,e,a){"use strict";var n=a("ahYw"),o=a("SGu0"),r=a("VU/8")(n.a,o.a,!1,null,null,null);e.a=r.exports},LptT:function(t,e,a){"use strict";var n=a("Dd8w"),o=a.n(n),r=a("NYxO"),s=a("n3aF"),i=a("KOvE"),l=a("rENa"),c=a("xCiF"),u=a.n(c);e.a={name:"OwnersList",filters:{dmy:s.a},methods:o()({},Object(r.mapMutations)("layouts",["setStructure"]),{onExport:function(){var t=this;console.log(this.$refs);var e=this.$refs.ownersDatatable.computedPagination.rowsPerPage;this.$refs.ownersDatatable.computedPagination.rowsPerPage=-1,this.csvValues=this.$refs.ownersDatatable.filteredItems,u()(function(){t.$refs.ownersDatatable.computedPagination.rowsPerPage=e})},onActivate:function(t){confirm(this.$t("do you confirm?"))&&(t.active=!0)},onDeactivate:function(t){confirm(this.$t("do you confirm?"))&&(t.active=!1)},onLayout:function(t){this.setStructure(t),this.$router.push("/owners/layouts/"+t.id)}}),data:function(){var t=[{text:this.$t("Company"),value:"company"},{text:this.$t("Email"),value:"email"},{text:this.$t("Surname")+" "+this.$t("Name"),value:"surname"},{text:this.$t("Language"),value:"language"},{text:this.$t("Actions"),value:"action",sortable:!1}];return{tableTexts:{rowsPerPageText:this.$t("Rows per page"),rowsPerPageItems:[15,30,50,{text:this.$t("All"),value:-1}]},csvValues:[],search:"",module:"owners",headers:t}},components:{ListBar:i.a,JsonExcel:l.a},computed:o()({},Object(r.mapState)("owners",["list"]),{production:function(){return!0},exportFields:function(){return{id:"id",surname:"surname",company:"company",name:"name",email:"email",language:"language",country:"country",zip:"zip",address:"address",city:"city",active:"active",county:"county"}},filteredItems:function(){return this.csvValues}})}},SGu0:function(t,e,a){"use strict";var n={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("v-layout",{attrs:{row:""}},[a("v-flex",{staticClass:"my-2",attrs:{xs6:""}},[a("div",{staticClass:"title mb-1"},[t._v(t._s(t.$t(t.title)))]),a("div",[t._v(t._s(t.$t(t.subTitle)))])]),a("v-flex",{staticClass:"text-xs-right",attrs:{xs6:"","pt-1":""}},[t.canAdd?a("v-tooltip",{attrs:{left:""}},[a("v-btn",{staticClass:"elevation-1 mb-3",attrs:{slot:"activator",fab:"",dark:"",to:t.to,color:"teal lighten-1",small:""},slot:"activator"},[a("v-icon",[t._v("add")])],1),a("span",[t._v(t._s(t.$t(t.caption)))])],1):t._e()],1)],1)],1)},staticRenderFns:[]};e.a=n},VTC5:function(t,e,a){"use strict";var n=a("pFYg"),o=a.n(n),r=a("fZjL"),s=a.n(r),i=a("sJst"),l=a.n(i);e.a={props:{type:{type:String,default:"xls"},data:{type:Array,required:!0},fields:{type:Object,required:!1},exportFields:{type:Object,required:!1},title:{default:null},footer:{default:null},name:{type:String,default:"data.xls"},meta:{type:Array,default:function(){return[]}}},computed:{idName:function(){return"export_"+(new Date).getTime()},downloadFields:function(){return void 0!==this.fields?this.fields:void 0!==this.exportFields?this.exportFields:void 0}},methods:{generate:function(){if(this.data.length){var t=this.getProcessedJson(this.data,this.downloadFields);return"csv"===this.type?this.export(this.jsonToCSV(t),this.name,"application/csv"):this.export(this.jsonToXLS(t),this.name,"application/vnd.ms-excel")}},export:function(t,e,a){var n=this.base64ToBlob(t,a);l()(n,e,a)},jsonToXLS:function(t){var e="<thead><tr>",a=s()(t[0]).length;for(var n in null!=this.title&&(e+=this.parseExtraData(this.title,'<th colspan="'+a+'">${data}<th></tr><tr>')),t[0])e+="<th>"+n+"</th>";return e+="</tr></thead>",e+="<tbody>",t.map(function(t,a){for(var n in e+="<tbody><tr>",t)e+="<td>"+t[n]+"</td>";e+="</tr></tbody>"}),null!=this.footer&&(e+="<tfooter><tr>",e+=this.parseExtraData(this.footer,'<td colspan="'+a+'">${data}<td></tr><tr>'),e+="</tr></tfooter>"),'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><meta name=ProgId content=Excel.Sheet> <meta name=Generator content="Microsoft Excel 11"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">\x3c!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--\x3e</head><body><table>${table}</table></body></html>'.replace("${table}",e)},jsonToCSV:function(t){var e="";for(var a in null!=this.title&&(e+=this.parseExtraData(this.title,"${data}\r\n")),t[0])e+=a+",";return e=e.slice(0,e.length-1),e+="\r\n",t.map(function(t){for(var a in t){var n=t[a]+"";n.match(/[,"\n]/)&&(n='"'+n.replace(/\"/g,'""')+'"'),e+=n+","}e=e.slice(0,e.length-1),e+="\r\n"}),null!=this.footer&&(e+=this.parseExtraData(this.footer,"${data}\r\n")),e},getProcessedJson:function(t,e){var a=this.getKeys(t,e),n=[],o=this;return t.map(function(t,e){var r={};for(var s in a){var i=a[s];r[s]=o.getNestedData(i,t)}n.push(r)}),n},getKeys:function(t,e){if(e)return e;var a={};for(var n in t[0])a[n]=n;return a},parseExtraData:function(t,e){var a="";if(Array.isArray(t))for(var n=0;n<t.length;n++)a+=e.replace("${data}",t[n]);else a+=e.replace("${data}",t);return a},callItemCallback:function(t,e){return"object"===(void 0===t?"undefined":o()(t))&&"function"==typeof t.callback?t.callback(e):e},getNestedData:function(t,e){var a=null,n=("object"===(void 0===t?"undefined":o()(t))?t.field:t).split(".");a=e[n[0]];for(var r=1;r<n.length;r++)a=a[n[r]];return a=this.callItemCallback(t,a)},base64ToBlob:function(t,e){for(var a=window.btoa(window.unescape(encodeURIComponent(t))),n=atob(a),o=n.length,r=new Uint8ClampedArray(o);o--;)r[o]=n.charCodeAt(o);return new Blob([r],{type:e})}}}},"WEN+":function(t,e,a){"use strict";var n={render:function(){var t=this.$createElement;return(this._self._c||t)("div",{attrs:{id:this.idName},on:{click:this.generate}},[this._t("default",[this._v("\n\t\tDownload "+this._s(this.name)+"\n\t")])],2)},staticRenderFns:[]};e.a=n},ahYw:function(t,e,a){"use strict";var n=a("Dd8w"),o=a.n(n),r=a("NYxO");e.a={props:["title","subTitle","caption","to","color"],computed:o()({},Object(r.mapGetters)("auth",["canAdd"]))}},bRfU:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=a("tGsv"),o=a("p+CW");var r=function(t){a("r615")},s=a("VU/8")(n.a,o.a,!1,r,null,null);e.default=s.exports},ijtl:function(t,e,a){var n=a("rYJq");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);a("rjj0")("36a9b688",n,!0,{sourceMap:!1})},"p+CW":function(t,e,a){"use strict";var n={render:function(){var t=this.$createElement;return(this._self._c||t)("owners-list")},staticRenderFns:[]};e.a=n},r615:function(t,e,a){var n=a("+HeT");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);a("rjj0")("53388ac3",n,!0,{sourceMap:!1})},rENa:function(t,e,a){"use strict";var n=a("VTC5"),o=a("WEN+"),r=a("VU/8")(n.a,o.a,!1,null,null,null);e.a=r.exports},rYJq:function(t,e,a){(t.exports=a("FZ+f")(!1)).push([t.i,".owner-list-item-not-active{background:red!important;color:#fff}",""])},sJst:function(t,e,a){var n,o,r;o=[],void 0===(r="function"==typeof(n=function(){return function t(e,a,n){var o,r,s=window,i="application/octet-stream",l=n||i,c=e,u=!a&&!n&&c,d=document.createElement("a"),f=function(t){return String(t)},v=s.Blob||s.MozBlob||s.WebKitBlob||f,p=a||"download";if(v=v.call?v.bind(s):Blob,"true"===String(this)&&(l=(c=[c,l])[0],c=c[1]),u&&u.length<2048&&(p=u.split("/").pop().split("?")[0],d.href=u,-1!==d.href.indexOf(u))){var h=new XMLHttpRequest;return h.open("GET",u,!0),h.responseType="blob",h.onload=function(e){t(e.target.response,p,i)},setTimeout(function(){h.send()},0),h}if(/^data:([\w+-]+\/[\w+.-]+)?[,;]/.test(c)){if(!(c.length>2096103.424&&v!==f))return navigator.msSaveBlob?navigator.msSaveBlob(g(c),p):w(c);l=(c=g(c)).type||i}else if(/([\x80-\xff])/.test(c)){for(var m=0,x=new Uint8Array(c.length),b=x.length;m<b;++m)x[m]=c.charCodeAt(m);c=new v([x],{type:l})}function g(t){for(var e=t.split(/[:;,]/),a=e[1],n=("base64"==e[2]?atob:decodeURIComponent)(e.pop()),o=n.length,r=0,s=new Uint8Array(o);r<o;++r)s[r]=n.charCodeAt(r);return new v([s],{type:a})}function w(t,e){if("download"in d)return d.href=t,d.setAttribute("download",p),d.className="download-js-link",d.innerHTML="downloading...",d.style.display="none",document.body.appendChild(d),setTimeout(function(){d.click(),document.body.removeChild(d),!0===e&&setTimeout(function(){s.URL.revokeObjectURL(d.href)},250)},66),!0;if(/(Version)\/(\d+)\.(\d+)(?:\.(\d+))?.*Safari\//.test(navigator.userAgent))return/^data:/.test(t)&&(t="data:"+t.replace(/^data:([\w\/\-\+]+)/,i)),window.open(t)||confirm("Displaying New Document\n\nUse Save As... to download, then click back to return to this page.")&&(location.href=t),!0;var a=document.createElement("iframe");document.body.appendChild(a),!e&&/^data:/.test(t)&&(t="data:"+t.replace(/^data:([\w\/\-\+]+)/,i)),a.src=t,setTimeout(function(){document.body.removeChild(a)},333)}if(o=c instanceof v?c:new v([c],{type:l}),navigator.msSaveBlob)return navigator.msSaveBlob(o,p);if(s.URL)w(s.URL.createObjectURL(o),!0);else{if("string"==typeof o||o.constructor===f)try{return w("data:"+l+";base64,"+s.btoa(o))}catch(t){return w("data:"+l+","+encodeURIComponent(o))}(r=new FileReader).onload=function(t){w(this.result)},r.readAsDataURL(o)}return!0}})?n.apply(e,o):n)||(t.exports=r)},tGsv:function(t,e,a){"use strict";var n=a("4mT/"),o={root:!0};e.a={components:{OwnersList:n.a},fetch:function(t){t.store.dispatch("owners/load",{},o)}}},xCiF:function(t,e,a){var n=a("M0oS"),o=a("YkxI")(function(t,e){return n(t,1,e)});t.exports=o}});