"use strict";angular.module("widgetkit").controller("woocommerceCtrl",["$scope",function(n){n.content.data.mapping||(n.content.data.mapping=[]);var a=this,t=n.content.data.mapping;a.mapping=t,angular.forEach(t,function(n,a){angular.isArray(n)&&(t[a]={})}),a.addMap=function(){t.push({})},a.deleteMap=function(n){t.splice(t.indexOf(n),1)}}]);