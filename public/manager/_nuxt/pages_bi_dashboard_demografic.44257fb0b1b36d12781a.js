webpackJsonp([42],{"1ckk":function(t,e,a){"use strict";e.a={props:["dimension","dimensionsObject","dimensionList","label","multiple"]}},"1iQ7":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=a("gi/3"),n=a("QFop"),r=a("VU/8")(i.a,n.a,!1,null,null,null);e.default=r.exports},FwsT:function(t,e,a){"use strict";var i={render:function(){var t=this,e=t.$createElement;return(t._self._c||e)("v-select",{attrs:{chips:"",multiple:t.multiple,label:t.label,items:t.dimensionList},model:{value:t.dimensionsObject[t.dimension],callback:function(e){t.$set(t.dimensionsObject,t.dimension,e)},expression:"dimensionsObject[dimension]"}})},staticRenderFns:[]};e.a=i},ObiV:function(t,e,a){"use strict";var i={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-layout",{attrs:{rows:"",wrap:""}},[a("v-toolbar",{staticClass:"mb-3 elevation-1",attrs:{dense:""}},[a("v-toolbar-title",[a("v-icon",[t._v("dashboard")]),t._v("\n            "+t._s(t.$t("Analisi demografica"))+"\n        ")],1)],1),a("v-toolbar",[a("v-flex",{staticClass:"mt-3 pa-2",attrs:{xs2:""}},[a("v-select",{attrs:{multiple:!1,label:t.$t("Anno"),items:t.dimYears},model:{value:t.filter.year,callback:function(e){t.$set(t.filter,"year",e)},expression:"filter.year"}})],1)],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"line-chart",data:t.channelPaxListFiltered,transform:!0,title:t.$t("Analisi origine")+" "+t.filter.year+" (Revenue)"}})],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"line-chart",data:t.channelPaxListFiltered,transform:!0,count:!0,title:t.$t("Analisi origine")+" "+t.filter.year+" (Prenotazioni)"}})],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"line-chart",data:t.paxChannelListFiltered,transform:!0,title:t.$t("Analisi per pax")+" "+t.filter.year+" (Revenue)"}})],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"line-chart",data:t.paxChannelListFiltered,transform:!0,count:!0,title:t.$t("Analisi per pax")+" "+t.filter.year+" (Prenotazioni)"}})],1),a("v-toolbar",{staticClass:"mt-3"},[a("v-flex",{staticClass:"mt-3 pa-2",attrs:{xs2:""}},[a("v-select",{attrs:{multiple:!1,label:t.$t("Pax"),items:t.biPax},model:{value:t.filter.pax,callback:function(e){t.$set(t.filter,"pax",e)},expression:"filter.pax"}})],1)],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"column-chart",data:t.monthChannelListFiltered,transform:!0,title:t.$t("Analisi origine")+" "+t.filter.year+" pax "+t.$t(t.filter.pax)+" (Revenue)"}})],1),a("v-toolbar",{staticClass:"mt-3"},[a("v-flex",{staticClass:"mt-3 pa-2",attrs:{xs2:""}},[a("v-select",{attrs:{multiple:!1,label:t.$t("Channel"),items:t.biChannels},model:{value:t.filter.channel,callback:function(e){t.$set(t.filter,"channel",e)},expression:"filter.channel"}})],1)],1),a("v-flex",{attrs:{xs12:""}},[a("bi-chart",{attrs:{type:"column-chart",data:t.monthPaxListFiltered,transform:!0,title:t.$t("Analisi origine")+" "+t.filter.year+" canale "+t.$t(t.filter.channel)+" (Revenue)"}})],1)],1)},staticRenderFns:[]};e.a=i},QFop:function(t,e,a){"use strict";var i={render:function(){var t=this.$createElement,e=this._self._c||t;return e("v-container",{attrs:{"grid-list-xs":"",fluid:""}},[e("DemograficDashBoard")],1)},staticRenderFns:[]};e.a=i},"Wxz/":function(t,e,a){"use strict";var i=a("1ckk"),n=a("FwsT"),r=a("VU/8")(i.a,n.a,!1,null,null,null);e.a=r.exports},"gi/3":function(t,e,a){"use strict";var i=a("Xxa5"),n=a.n(i),r=a("exGp"),l=a.n(r),s=a("goay");e.a={components:{DemograficDashBoard:s.a},props:[],fetch:function(){var t=l()(n.a.mark(function t(e){var a=e.store;return n.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,a.dispatch("bi/dashdemografic/loadData",{},{root:!0});case 2:case"end":return t.stop()}},t,this)}));return function(e){return t.apply(this,arguments)}}()}},goay:function(t,e,a){"use strict";var i=a("k//D"),n=a("ObiV"),r=a("VU/8")(i.a,n.a,!1,null,null,null);e.a=r.exports},"k//D":function(t,e,a){"use strict";var i=a("Dd8w"),n=a.n(i),r=a("NYxO"),l=a("Wxz/"),s=a("vp33"),o=a("hlHE");e.a={data:function(){return{dimYears:o.g,biPax:o.b,filter:{country:"Italia",year:o.c,channel:"C",pax:"Single"},libraryMonth:o.i,biChannels:o.a,libraryPie:{chart:{type:"pie",options3d:{enabled:!0,alpha:45,beta:0}},plotOptions:{pie:{allowPointSelect:!0,showInLegend:!1,cursor:"pointer",depth:35,dataLabels:{enabled:!0,format:"<b>{point.name}</b>: {point.percentage:.1f} %"}}}}}},components:{DimensionSelect:l.a,BiChart:s.a},computed:n()({channelPaxListFiltered:function(){var t=this;return this.channelPaxList.filter(function(e){return e.filter+""==t.filter.year+""})},paxChannelListFiltered:function(){var t=this;return this.paxChannelList.filter(function(e){return e.filter+""==t.filter.year+""})},monthChannelListFiltered:function(){var t=this;return this.monthChannelList.filter(function(e){return e.filter+""==t.filter.year+""&&e.filter1===t.filter.pax})},monthPaxListFiltered:function(){var t=this;return this.monthPaxList.filter(function(e){return e.filter+""==t.filter.year+""&&e.filter1===t.filter.channel})}},Object(r.mapState)("bi/dashdemografic",["channelPaxList","paxChannelList","monthChannelList","monthPaxList"]))}}});