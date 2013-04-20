var aDOM = 0, ieDOM = 0, nsDOM = 0; var stdDOM = document.getElementById;
if (stdDOM) aDOM = 1; else {ieDOM = document.all; if (ieDOM) aDOM = 1; else {
var nsDOM = ((navigator.appName.indexOf('Netscape') != -1)
&& (parseInt(navigator.appVersion) ==4)); if (nsDOM) aDOM = 1;}}
function xDOM(objectId, wS) {
if (stdDOM) return wS ? document.getElementById(objectId).style:
document.getElementById(objectId);
if (ieDOM) return wS ? document.all[objectId].style: document.all[objectId];
if (nsDOM) return document.layers[objectId];
}                  