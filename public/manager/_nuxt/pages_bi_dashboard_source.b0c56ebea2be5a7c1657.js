webpackJsonp([40],{"1ckk":function(e,n,o){"use strict";n.a={props:["dimension","dimensionsObject","dimensionList","label","multiple"]}},"2cir":function(e,n,o){"use strict";var t=o("9xRE"),c=o("UwR7"),r=o("VU/8")(t.a,c.a,!1,null,null,null);n.a=r.exports},"9xRE":function(e,n,o){"use strict";var t=o("Dd8w"),c=o.n(t),r=o("NYxO"),h=o("Wxz/"),a=o("vp33"),i=o("hlHE");n.a={data:function(){return{libraryMonth:{xAxis:{categories:Object(i.g)()},plotOptions:{line:{allowPointSelect:!0,cursor:"pointer",depth:35,dataLabels:{enabled:!1}}}},libraryPie:{chart:{type:"pie",options3d:{enabled:!0,alpha:45,beta:0}},plotOptions:{pie:{allowPointSelect:!0,showInLegend:!0,cursor:"pointer",depth:35,dataLabels:{enabled:!0,format:"<b>{point.name}</b>: {point.percentage:.1f} %"}}}}}},components:{DimensionSelect:h.a,BiChart:a.a},computed:c()({},Object(r.mapGetters)("bi/dashsource",["costByMonth_ChannelSerie","countByYear_MonthSerie","costByMonth_ChannelSerieYearFactory","dimYearOptions","dimCountryOptions","currentYear","previousYear","previous2Year","previous3Year","previous4Year","previous5Year","yearPieData"]),Object(r.mapState)("reservation",["filter","list"]),{costByMonth_ChannelSerieCurrentYear:function(){return this.costByMonth_ChannelSerieYearFactory(this.currentYear,"opened_year")},costByMonth_ChannelSeriePreviousYear:function(){return this.costByMonth_ChannelSerieYearFactory(this.previousYear,"opened_year")},costByMonth_ChannelSeriePrevious2Year:function(){return this.costByMonth_ChannelSerieYearFactory(this.previous2Year,"opened_year")},costByMonth_ChannelSeriePrevious3Year:function(){return this.costByMonth_ChannelSerieYearFactory(this.previous3Year,"opened_year")},costByMonth_ChannelSeriePrevious5Year:function(){return this.costByMonth_ChannelSerieYearFactory(this.previous5Year,"opened_year")},costByMonth_ChannelSeriePrevious4Year:function(){return this.costByMonth_ChannelSerieYearFactory(this.previous4Year,"opened_year")}})}},AIh4:function(e,n,o){"use strict";var t={render:function(){var e=this.$createElement,n=this._self._c||e;return n("v-container",{attrs:{"grid-list-xs":"",fluid:""}},[n("SourceDashBoard")],1)},staticRenderFns:[]};n.a=t},FwsT:function(e,n,o){"use strict";var t={render:function(){var e=this,n=e.$createElement;return(e._self._c||n)("v-select",{attrs:{chips:"",multiple:e.multiple,label:e.label,items:e.dimensionList},model:{value:e.dimensionsObject[e.dimension],callback:function(n){e.$set(e.dimensionsObject,e.dimension,n)},expression:"dimensionsObject[dimension]"}})},staticRenderFns:[]};n.a=t},UwR7:function(e,n,o){"use strict";var t={render:function(){var e=this,n=e.$createElement,o=e._self._c||n;return o("v-layout",{attrs:{rows:"",wrap:""}},[o("v-toolbar",{staticClass:"mb-3 elevation-1",attrs:{dense:"","scroll-threshold":"1","scroll-off-screen":"true"}},[o("v-toolbar-title",[o("v-icon",[e._v("dashboard")]),e._v("\n                "+e._s(e.$t("Rapporto per Canale di Provenienza"))+"\n            ")],1)],1),o("v-flex",{attrs:{xs12:""}},[o("bi-chart",{attrs:{library:e.libraryMonth,type:"line-chart",data:e.countByYear_MonthSerie,title:e.$t("Prenotazioni per mese - Tutti i canali")}})],1),e.currentYear?o("v-flex",{attrs:{xs12:""}},[o("bi-chart",{staticClass:"mt-3",attrs:{library:e.libraryMonth,type:"line-chart",data:e.costByMonth_ChannelSerieCurrentYear,title:e.$t("Prenotazioni per mese per canale")+" - "+e.currentYear}})],1):e._e(),e.previousYear?o("v-flex",{attrs:{xs12:""}},[o("bi-chart",{staticClass:"mt-3",attrs:{library:e.libraryMonth,type:"line-chart",data:e.costByMonth_ChannelSeriePreviousYear,title:e.$t("Prenotazioni per mese per canale")+" - "+e.previousYear}})],1):e._e(),e._v("\n|"+e._s(e.previous2Year)+"|\n        "),e.previous2Year?o("v-flex",{attrs:{xs12:""}},[o("bi-chart",{staticClass:"mt-3",attrs:{library:e.libraryMonth,type:"line-chart",data:e.costByMonth_ChannelSeriePrevious2Year,title:e.$t("Prenotazioni per mese per canale")+" - "+e.previous2Year}})],1):e._e(),e.previous3Year?o("v-flex",{attrs:{xs12:""}},[o("bi-chart",{staticClass:"mt-3",attrs:{library:e.libraryMonth,type:"line-chart",data:e.costByMonth_ChannelSeriePrevious3Year,title:e.$t("Prenotazioni per mese per canale")+" - "+e.previous3Year}})],1):e._e(),e.previous4Year?o("v-flex",{attrs:{xs12:""}},[o("bi-chart",{staticClass:"mt-3",attrs:{library:e.libraryMonth,type:"line-chart",data:e.costByMonth_ChannelSeriePrevious4Year,title:e.$t("Prenotazioni per mese per canale")+" - "+e.previous4Year}})],1):e._e(),e.previous5Year?o("v-flex",{attrs:{xs12:""}},[o("bi-chart",{staticClass:"mt-3",attrs:{library:e.libraryMonth,type:"line-chart",data:e.costByMonth_ChannelSeriePrevious5Year,title:e.$t("Prenotazioni per mese per canale")+" - "+e.previous5Year}})],1):e._e(),o("v-flex",{attrs:{xs12:""}},[o("bi-chart",{staticClass:"mt-3",attrs:{library:e.libraryPie,type:"pie-chart",pieData:e.yearPieData}})],1)],1)},staticRenderFns:[]};n.a=t},"Wxz/":function(e,n,o){"use strict";var t=o("1ckk"),c=o("FwsT"),r=o("VU/8")(t.a,c.a,!1,null,null,null);n.a=r.exports},ZjQt:function(e,n){e.exports=[{rescount:30,opened_month:1,opened_year:2014,checkin_month:8,checkin_year:2014,checkout_month:8,checkout_year:2014,origin:"BOOKINGONE",country:"Italia"},{rescount:41,opened_month:2,opened_year:2014,checkin_month:5,checkin_year:2014,checkout_month:5,checkout_year:2014,origin:"BOOKINGONE",country:"Czech Republic"},{rescount:44,opened_month:3,opened_year:2014,checkin_month:7,checkin_year:2014,checkout_month:7,checkout_year:2014,origin:"BOOKINGONE",country:"Austria"},{rescount:46,opened_month:4,opened_year:2014,checkin_month:6,checkin_year:2014,checkout_month:6,checkout_year:2014,origin:"BOOKINGONE",country:"Italia"},{rescount:40,opened_month:5,opened_year:2014,checkin_month:5,checkin_year:2014,checkout_month:5,checkout_year:2014,origin:"BOOKINGONE",country:"Austria"},{rescount:48,opened_month:6,opened_year:2014,checkin_month:9,checkin_year:2014,checkout_month:9,checkout_year:2014,origin:"BOOKINGONE",country:"Austria"},{rescount:35,opened_month:7,opened_year:2014,checkin_month:7,checkin_year:2014,checkout_month:8,checkout_year:2014,origin:"BOOKINGONE",country:"Austria"},{rescount:35,opened_month:8,opened_year:2014,checkin_month:8,checkin_year:2014,checkout_month:9,checkout_year:2014,origin:"BOOKINGONE",country:"Italia"},{rescount:5,opened_month:9,opened_year:2014,checkin_month:9,checkin_year:2014,checkout_month:9,checkout_year:2014,origin:"BOOKINGONE",country:"Italia"},{rescount:5,opened_month:11,opened_year:2014,checkin_month:7,checkin_year:2015,checkout_month:7,checkout_year:2015,origin:"BOOKINGONE",country:"Switzerland"},{rescount:8,opened_month:12,opened_year:2014,checkin_month:6,checkin_year:2015,checkout_month:6,checkout_year:2015,origin:"BOOKINGONE",country:"Austria"},{rescount:1,opened_month:12,opened_year:2014,checkin_month:7,checkin_year:2015,checkout_month:7,checkout_year:2015,origin:"EMAIL",country:"Italia"},{rescount:31,opened_month:1,opened_year:2015,checkin_month:6,checkin_year:2015,checkout_month:6,checkout_year:2015,origin:"BOOKINGONE",country:"Germany"},{rescount:53,opened_month:2,opened_year:2015,checkin_month:4,checkin_year:2015,checkout_month:5,checkout_year:2015,origin:"BOOKINGONE",country:"Italia"},{rescount:58,opened_month:3,opened_year:2015,checkin_month:6,checkin_year:2015,checkout_month:6,checkout_year:2015,origin:"BOOKINGONE",country:"Austria"},{rescount:44,opened_month:4,opened_year:2015,checkin_month:6,checkin_year:2015,checkout_month:6,checkout_year:2015,origin:"BOOKINGONE",country:"Austria"},{rescount:48,opened_month:5,opened_year:2015,checkin_month:5,checkin_year:2015,checkout_month:5,checkout_year:2015,origin:"BOOKINGONE",country:"Austria"},{rescount:36,opened_month:6,opened_year:2015,checkin_month:8,checkin_year:2015,checkout_month:8,checkout_year:2015,origin:"BOOKINGONE",country:"Italia"},{rescount:28,opened_month:7,opened_year:2015,checkin_month:7,checkin_year:2015,checkout_month:7,checkout_year:2015,origin:"BOOKINGONE",country:"Austria"},{rescount:31,opened_month:8,opened_year:2015,checkin_month:8,checkin_year:2015,checkout_month:8,checkout_year:2015,origin:"BOOKINGONE",country:"Italia"},{rescount:21,opened_month:9,opened_year:2015,checkin_month:9,checkin_year:2015,checkout_month:9,checkout_year:2015,origin:"BOOKINGONE",country:"Germany"},{rescount:1,opened_month:11,opened_year:2015,checkin_month:8,checkin_year:2016,checkout_month:8,checkout_year:2016,origin:"BOOKINGONE",country:"Austria"},{rescount:21,opened_month:12,opened_year:2015,checkin_month:5,checkin_year:2016,checkout_month:5,checkout_year:2016,origin:"BOOKINGONE",country:"Italia"},{rescount:41,opened_month:1,opened_year:2016,checkin_month:6,checkin_year:2016,checkout_month:6,checkout_year:2016,origin:"BOOKINGONE",country:"Austria"},{rescount:57,opened_month:2,opened_year:2016,checkin_month:7,checkin_year:2016,checkout_month:7,checkout_year:2016,origin:"BOOKINGONE",country:"Austria"},{rescount:2,opened_month:2,opened_year:2016,checkin_month:4,checkin_year:2016,checkout_month:4,checkout_year:2016,origin:"EMAIL",country:"Italia"},{rescount:77,opened_month:3,opened_year:2016,checkin_month:6,checkin_year:2016,checkout_month:6,checkout_year:2016,origin:"BOOKINGONE",country:"Italia"},{rescount:72,opened_month:4,opened_year:2016,checkin_month:7,checkin_year:2016,checkout_month:7,checkout_year:2016,origin:"BOOKINGONE",country:"Italia"},{rescount:118,opened_month:5,opened_year:2016,checkin_month:6,checkin_year:2016,checkout_month:7,checkout_year:2016,origin:"BOOKINGONE",country:"Switzerland"},{rescount:139,opened_month:6,opened_year:2016,checkin_month:6,checkin_year:2016,checkout_month:6,checkout_year:2016,origin:"BOOKINGONE",country:"Italia"},{rescount:143,opened_month:7,opened_year:2016,checkin_month:9,checkin_year:2016,checkout_month:9,checkout_year:2016,origin:"BOOKINGONE",country:"Germany"},{rescount:77,opened_month:8,opened_year:2016,checkin_month:8,checkin_year:2016,checkout_month:8,checkout_year:2016,origin:"BOOKINGONE",country:"Spain"},{rescount:19,opened_month:9,opened_year:2016,checkin_month:9,checkin_year:2016,checkout_month:9,checkout_year:2016,origin:"BOOKINGONE",country:"Italia"},{rescount:3,opened_month:10,opened_year:2016,checkin_month:6,checkin_year:2017,checkout_month:6,checkout_year:2017,origin:"BOOKINGONE",country:"Germany"},{rescount:10,opened_month:11,opened_year:2016,checkin_month:7,checkin_year:2017,checkout_month:7,checkout_year:2017,origin:"BOOKINGONE",country:"Russian Federation"},{rescount:31,opened_month:12,opened_year:2016,checkin_month:6,checkin_year:2017,checkout_month:6,checkout_year:2017,origin:"BOOKINGONE",country:"Germany"},{rescount:5,opened_month:12,opened_year:2016,checkin_month:6,checkin_year:2017,checkout_month:6,checkout_year:2017,origin:"EMAIL",country:"Italia"},{rescount:69,opened_month:1,opened_year:2017,checkin_month:8,checkin_year:2017,checkout_month:8,checkout_year:2017,origin:"BOOKINGONE",country:"Austria"},{rescount:13,opened_month:1,opened_year:2017,checkin_month:6,checkin_year:2017,checkout_month:6,checkout_year:2017,origin:"EMAIL",country:"Italia"},{rescount:90,opened_month:2,opened_year:2017,checkin_month:6,checkin_year:2017,checkout_month:7,checkout_year:2017,origin:"BOOKINGONE",country:"Italia"},{rescount:3,opened_month:2,opened_year:2017,checkin_month:7,checkin_year:2017,checkout_month:7,checkout_year:2017,origin:"BOOKINGONE",country:"Italia"},{rescount:147,opened_month:3,opened_year:2017,checkin_month:7,checkin_year:2017,checkout_month:7,checkout_year:2017,origin:"BOOKINGONE",country:"Italia"},{rescount:3,opened_month:3,opened_year:2017,checkin_month:7,checkin_year:2017,checkout_month:7,checkout_year:2017,origin:"BOOKINGONE",country:"Switzerland"},{rescount:136,opened_month:4,opened_year:2017,checkin_month:7,checkin_year:2017,checkout_month:7,checkout_year:2017,origin:"BOOKINGONE",country:"Austria"},{rescount:94,opened_month:5,opened_year:2017,checkin_month:6,checkin_year:2017,checkout_month:6,checkout_year:2017,origin:"BOOKINGONE",country:"Germany"},{rescount:96,opened_month:6,opened_year:2017,checkin_month:8,checkin_year:2017,checkout_month:8,checkout_year:2017,origin:"BOOKINGONE",country:"Italia"},{rescount:89,opened_month:7,opened_year:2017,checkin_month:7,checkin_year:2017,checkout_month:7,checkout_year:2017,origin:"BOOKINGONE",country:"Italia"},{rescount:43,opened_month:8,opened_year:2017,checkin_month:9,checkin_year:2017,checkout_month:9,checkout_year:2017,origin:"BOOKINGONE",country:"Italia"},{rescount:19,opened_month:9,opened_year:2017,checkin_month:9,checkin_year:2017,checkout_month:9,checkout_year:2017,origin:"BOOKINGONE",country:"Italia"},{rescount:9,opened_month:10,opened_year:2017,checkin_month:10,checkin_year:2017,checkout_month:10,checkout_year:2017,origin:"BOOKINGONE",country:"France"},{rescount:13,opened_month:11,opened_year:2017,checkin_month:12,checkin_year:2017,checkout_month:12,checkout_year:2017,origin:"BOOKINGONE",country:"Italia"},{rescount:9,opened_month:11,opened_year:2017,checkin_month:12,checkin_year:2017,checkout_month:12,checkout_year:2017,origin:"EMAIL",country:"Italia"},{rescount:27,opened_month:12,opened_year:2017,checkin_month:12,checkin_year:2017,checkout_month:1,checkout_year:2018,origin:"BOOKINGONE",country:"Italia"},{rescount:4,opened_month:12,opened_year:2017,checkin_month:12,checkin_year:2017,checkout_month:1,checkout_year:2018,origin:"EMAIL",country:"Italia"},{rescount:43,opened_month:1,opened_year:2018,checkin_month:8,checkin_year:2018,checkout_month:8,checkout_year:2018,origin:"BOOKINGONE",country:"Austria"},{rescount:18,opened_month:1,opened_year:2018,checkin_month:1,checkin_year:2018,checkout_month:1,checkout_year:2018,origin:"EMAIL",country:"Italia"},{rescount:33,opened_month:2,opened_year:2018,checkin_month:6,checkin_year:2018,checkout_month:6,checkout_year:2018,origin:"BOOKINGONE",country:"Austria"},{rescount:34,opened_month:2,opened_year:2018,checkin_month:3,checkin_year:2018,checkout_month:4,checkout_year:2018,origin:"EMAIL",country:"Italia"},{rescount:52,opened_month:3,opened_year:2018,checkin_month:5,checkin_year:2018,checkout_month:5,checkout_year:2018,origin:"BOOKINGONE",country:"Germany"},{rescount:60,opened_month:3,opened_year:2018,checkin_month:4,checkin_year:2018,checkout_month:4,checkout_year:2018,origin:"EMAIL",country:"Italia"},{rescount:67,opened_month:4,opened_year:2018,checkin_month:6,checkin_year:2018,checkout_month:7,checkout_year:2018,origin:"BOOKINGONE",country:"Italia"},{rescount:45,opened_month:4,opened_year:2018,checkin_month:4,checkin_year:2018,checkout_month:4,checkout_year:2018,origin:"EMAIL",country:"Italia"},{rescount:64,opened_month:5,opened_year:2018,checkin_month:6,checkin_year:2018,checkout_month:6,checkout_year:2018,origin:"BOOKINGONE",country:"Italia"},{rescount:33,opened_month:5,opened_year:2018,checkin_month:6,checkin_year:2018,checkout_month:6,checkout_year:2018,origin:"EMAIL",country:"Italia"},{rescount:50,opened_month:6,opened_year:2018,checkin_month:7,checkin_year:2018,checkout_month:7,checkout_year:2018,origin:"BOOKINGONE",country:"Switzerland"},{rescount:6,opened_month:6,opened_year:2018,checkin_month:8,checkin_year:2018,checkout_month:8,checkout_year:2018,origin:"EMAIL",country:"Italia"},{rescount:48,opened_month:7,opened_year:2018,checkin_month:7,checkin_year:2018,checkout_month:7,checkout_year:2018,origin:"BOOKINGONE",country:"Switzerland"},{rescount:8,opened_month:7,opened_year:2018,checkin_month:7,checkin_year:2018,checkout_month:7,checkout_year:2018,origin:"EMAIL",country:"France"},{rescount:29,opened_month:8,opened_year:2018,checkin_month:9,checkin_year:2018,checkout_month:9,checkout_year:2018,origin:"BOOKINGONE",country:"Italia"},{rescount:3,opened_month:8,opened_year:2018,checkin_month:8,checkin_year:2018,checkout_month:9,checkout_year:2018,origin:"EMAIL",country:"Italia"},{rescount:10,opened_month:9,opened_year:2018,checkin_month:9,checkin_year:2018,checkout_month:9,checkout_year:2018,origin:"BOOKINGONE",country:"Italia"},{rescount:5,opened_month:10,opened_year:2018,checkin_month:10,checkin_year:2018,checkout_month:10,checkout_year:2018,origin:"BOOKINGONE",country:"France"},{rescount:1,opened_month:10,opened_year:2018,checkin_month:10,checkin_year:2018,checkout_month:10,checkout_year:2018,origin:"EMAIL",country:"Austria"},{rescount:1,opened_month:11,opened_year:2018,checkin_month:4,checkin_year:2019,checkout_month:4,checkout_year:2019,origin:"BOOKINGONE",country:"Italia"}]},rrwf:function(e,n,o){"use strict";var t=o("ZjQt"),c=o.n(t),r=o("2cir");n.a={components:{SourceDashBoard:r.a},fetch:function(e){e.store.commit("bi/dashsource/setList",c.a,{root:!0})}}},uBP9:function(e,n,o){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var t=o("rrwf"),c=o("AIh4"),r=o("VU/8")(t.a,c.a,!1,null,null,null);n.default=r.exports}});