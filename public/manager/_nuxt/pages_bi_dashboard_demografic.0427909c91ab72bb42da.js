webpackJsonp([45],{"1ckk":function(t,e,a){"use strict";e.a={props:["dimension","dimensionsObject","dimensionList","label","multiple"]}},"1iQ7":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=a("gi/3"),r=a("2diW"),n=a("VU/8")(i.a,r.a,!1,null,null,null);e.default=n.exports},"2diW":function(t,e,a){"use strict";var i={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",{attrs:{"grid-list-xs":"",fluid:""}},[e("DemograficDashBoard")],1)},staticRenderFns:[]};e.a=i},FwsT:function(t,e,a){"use strict";var i={render:function(){var t=this,e=t.$createElement;return(t._self._c||e)("v-select",{attrs:{chips:"",multiple:t.multiple,label:t.label,items:t.dimensionList},model:{value:t.dimensionsObject[t.dimension],callback:function(e){t.$set(t.dimensionsObject,t.dimension,e)},expression:"dimensionsObject[dimension]"}})},staticRenderFns:[]};e.a=i},Gr0b:function(t,e,a){"use strict";var i={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{attrs:{rows:"",wrap:""}},[a("v-toolbar",{staticClass:"mb-3 elevation-1",attrs:{dense:""}},[a("v-toolbar-title",[a("v-icon",[t._v("dashboard")]),t._v("\n            "+t._s(t.$t("Analisi demografica"))+"\n        ")],1)],1),a("v-toolbar",[a("v-flex",{staticClass:"mt-3 pa-2",attrs:{xs2:""}},[a("v-select",{attrs:{multiple:!1,label:t.$t("Anno"),items:t.dimYears},model:{value:t.filter.year,callback:function(e){t.$set(t.filter,"year",e)},expression:"filter.year"}})],1)],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"line-chart",data:t.channelPaxListFiltered,transform:!0,library:t.library,"sub-title":t.$t("Revenue"),title:t.$t("Analisi origine")+" "+t.filter.year}})],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"line-chart",data:t.channelPaxListFiltered,transform:!0,count:!0,library:t.library,"sub-title":t.$t("Prenotazioni"),title:t.$t("Analisi origine")+" "+t.filter.year}})],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"line-chart",data:t.paxChannelListFiltered,transform:!0,title:t.$t("Analisi per pax")+" "+t.filter.year,library:t.library,"sub-title":t.$t("Revenue")}})],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"line-chart",data:t.paxChannelListFiltered,transform:!0,count:!0,"sub-title":t.$t("Prenotazioni"),title:t.$t("Analisi per pax")+" "+t.filter.year}})],1),a("v-toolbar",{staticClass:"mt-3"},[a("v-flex",{staticClass:"mt-3 pa-2",attrs:{xs2:""}},[a("v-select",{attrs:{multiple:!1,label:t.$t("Anno"),items:t.dimYears},model:{value:t.filter.year,callback:function(e){t.$set(t.filter,"year",e)},expression:"filter.year"}})],1),a("v-flex",{staticClass:"mt-3 pa-2",attrs:{xs2:""}},[a("v-select",{attrs:{multiple:!1,label:t.$t("Pax"),items:t.biPax},scopedSlots:t._u([{key:"item",fn:function(e){return[a("v-list-tile-content",{domProps:{textContent:t._s(t.$t(e.item))}})]}},{key:"selection",fn:function(e){return[a("v-list-tile-content",{domProps:{textContent:t._s(t.$t(e.item))}})]}}]),model:{value:t.filter.pax,callback:function(e){t.$set(t.filter,"pax",e)},expression:"filter.pax"}})],1)],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"column-chart",data:t.monthChannelListFiltered,transform:!0,"sub-title":t.$t("Revenue"),library:t.library,title:t.$t("Analisi origine x mese")+" "+t.filter.year+" pax "+t.$t(t.filter.pax)}})],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"column-chart",data:t.monthChannelListFiltered,transform:!0,count:!0,library:t.library,"sub-title":t.$t("Prenotazioni"),title:t.$t("Analisi origine x mese")+" "+t.filter.year+" pax "+t.$t(t.filter.pax)}})],1),a("v-toolbar",{staticClass:"mt-3"},[a("v-flex",{staticClass:"mt-3 pa-2",attrs:{xs2:""}},[a("v-select",{attrs:{multiple:!1,label:t.$t("Anno"),items:t.dimYears},model:{value:t.filter.year,callback:function(e){t.$set(t.filter,"year",e)},expression:"filter.year"}})],1),a("v-flex",{staticClass:"mt-3 pa-2",attrs:{xs2:""}},[a("v-select",{attrs:{multiple:!1,label:t.$t("Channel"),items:t.biChannels},scopedSlots:t._u([{key:"item",fn:function(e){return[a("v-list-tile-content",{domProps:{textContent:t._s(t.$t(e.item))}})]}},{key:"selection",fn:function(e){return[a("v-list-tile-content",{domProps:{textContent:t._s(t.$t(e.item))}})]}}]),model:{value:t.filter.channel,callback:function(e){t.$set(t.filter,"channel",e)},expression:"filter.channel"}})],1)],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"column-chart",data:t.monthPaxListFiltered,transform:!0,library:t.library,"sub-title":t.$t("Revenue"),title:t.$t("Analisi origine x mese")+" "+t.filter.year+" canale "+t.$t(t.filter.channel)}})],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"column-chart",data:t.monthPaxListFiltered,transform:!0,library:t.library,count:!0,"sub-title":t.$t("Prenotazioni"),title:t.$t("Analisi origine x mese")+" "+t.filter.year+" canale "+t.$t(t.filter.channel)}})],1)],1)},staticRenderFns:[]};e.a=i},"Wxz/":function(t,e,a){"use strict";var i=a("1ckk"),r=a("FwsT"),n=a("VU/8")(i.a,r.a,!1,null,null,null);e.a=n.exports},"gi/3":function(t,e,a){"use strict";var i=a("Xxa5"),r=a.n(i),n=a("exGp"),l=a.n(n),s=a("goay");e.a={components:{DemograficDashBoard:s.a},props:[],fetch:function(){var t=l()(r.a.mark(function t(e){var a=e.store;return r.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,a.dispatch("bi/dashdemografic/loadData",{},{root:!0});case 2:case"end":return t.stop()}},t,this)}));return function(e){return t.apply(this,arguments)}}()}},goay:function(t,e,a){"use strict";var i=a("k//D"),r=a("Gr0b"),n=a("VU/8")(i.a,r.a,!1,null,null,null);e.a=n.exports},"k//D":function(t,e,a){"use strict";var i=a("Dd8w"),r=a.n(i),n=a("NYxO"),l=a("Wxz/"),s=a("vp33"),o=a("hlHE");e.a={data:function(){return{dimYears:o.h,biPax:o.c,filter:{country:"Italia",year:o.d,channel:"C",pax:"Single"},libraryMonth:o.i,biChannels:o.a,monthNames:Object(o.k)(),library:o.b,libraryPie:{chart:{type:"pie",options3d:{enabled:!0,alpha:45,beta:0}},plotOptions:{pie:{allowPointSelect:!0,showInLegend:!1,cursor:"pointer",depth:35,dataLabels:{enabled:!0,format:"<b>{point.name}</b>: {point.percentage:.1f} %"}}}}}},components:{DimensionSelect:l.a,BiChart:s.a},computed:r()({channelPaxListFiltered:function(){var t=this;return this.channelPaxList.filter(function(e){return e.filter===t.filter.year})},paxChannelListFiltered:function(){var t=this;return this.paxChannelList.filter(function(e){return e.filter===t.filter.year})},monthChannelListFiltered:function(){var t=this;return this.monthChannelList.filter(function(e){return e.filter===t.filter.year&&e.filter1===t.filter.pax})},monthPaxListFiltered:function(){var t=this;return this.monthPaxList.filter(function(e){return e.filter===t.filter.year&&e.filter1===t.filter.channel})}},Object(n.mapState)("bi/dashdemografic",["channelPaxList","paxChannelList","monthChannelList","monthPaxList"]))}}});