"use strict";angular.module("widgetkit").controller("twitterCtrl",["$scope","$element","Application","$http",function(t,n,i,e){var o,c=this;c.connected=n[0].getAttribute("data-status"),c.loading=!1,c.openPopup=function(t){o=window.open(t,"","width=800,height=500")},t.$watch("twitter.pin",function(t){!t||t.length<7||(c.loading=!0,e.post(i.url("twitter_auth"),{pin:t}).then(function(){c.connected=!0,c.pin="",o&&o.close()}).finally(function(){c.loading=!1}))}),c.disconnect=function(){c.loading=!0,e.delete(i.url("twitter_auth")).then(function(){c.connected=!1}).finally(function(){c.loading=!1})}}]);