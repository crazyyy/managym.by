function main(){$("#tabs > div").each(function(e,t){$(this).hide();var a="tab_wrapp__"+e;$(this).addClass(a)}),$(".tab").each(function(e,t){$(this).attr("data-id",e)}),$(".tab").on("click",function(e){var t=$(this).attr("data-id"),a=".tab_wrapp__"+t;$("#tabs > div").hide(),$(a).fadeIn(400),$(a).hasClass("current")||($("div.current").removeClass("current"),$(a).addClass("current"))})}!function(){for(var e,t=function(){},a=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],n=a.length,r=window.console=window.console||{};n--;)e=a[n],r[e]||(r[e]=t)}(),"undefined"==typeof jQuery?console.warn("jQuery hasn't loaded"):console.log("jQuery has loaded"),$(function(){var e=$(".headnav"),t=e.children().length,a=100/t;a+="%",$(".headnav li").each(function(e,t){$(this).css("width",a)}),$(".lessons-list li a").on("click",function(e){e.preventDefault(e);var t=$(this).parent();if(!t.hasClass("active")){$(".lessons-list li").removeClass("active"),t.addClass("active");var a=t.attr("data-id"),n=".lesson-"+a;$(".lessons-bloks .lesson-active").removeClass("lesson-active"),$(n).addClass("lesson-active")}})}),function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):e("undefined"!=typeof jQuery?jQuery:window.Zepto)}(function(e){"use strict";function t(t){var a=t.data;t.isDefaultPrevented()||(t.preventDefault(),e(t.target).ajaxSubmit(a))}function a(t){var a=t.target,n=e(a);if(!n.is("[type=submit],[type=image]")){var r=n.closest("[type=submit]");if(0===r.length)return;a=r[0]}var o=this;if(o.clk=a,"image"==a.type)if(void 0!==t.offsetX)o.clk_x=t.offsetX,o.clk_y=t.offsetY;else if("function"==typeof e.fn.offset){var i=n.offset();o.clk_x=t.pageX-i.left,o.clk_y=t.pageY-i.top}else o.clk_x=t.pageX-a.offsetLeft,o.clk_y=t.pageY-a.offsetTop;setTimeout(function(){o.clk=o.clk_x=o.clk_y=null},100)}function n(){if(e.fn.ajaxSubmit.debug){var t="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(t):window.opera&&window.opera.postError&&window.opera.postError(t)}}var r={};r.fileapi=void 0!==e("<input type='file'/>").get(0).files,r.formdata=void 0!==window.FormData;var o=!!e.fn.prop;e.fn.attr2=function(){if(!o)return this.attr.apply(this,arguments);var e=this.prop.apply(this,arguments);return e&&e.jquery||"string"==typeof e?e:this.attr.apply(this,arguments)},e.fn.ajaxSubmit=function(t){function a(a){var n,r,o=e.param(a,t.traditional).split("&"),i=o.length,s=[];for(n=0;n<i;n++)o[n]=o[n].replace(/\+/g," "),r=o[n].split("="),s.push([decodeURIComponent(r[0]),decodeURIComponent(r[1])]);return s}function i(n){for(var r=new FormData,o=0;o<n.length;o++)r.append(n[o].name,n[o].value);if(t.extraData){var i=a(t.extraData);for(o=0;o<i.length;o++)i[o]&&r.append(i[o][0],i[o][1])}t.data=null;var s=e.extend(!0,{},e.ajaxSettings,t,{contentType:!1,processData:!1,cache:!1,type:l||"POST"});t.uploadProgress&&(s.xhr=function(){var a=e.ajaxSettings.xhr();return a.upload&&a.upload.addEventListener("progress",function(e){var a=0,n=e.loaded||e.position,r=e.total;e.lengthComputable&&(a=Math.ceil(n/r*100)),t.uploadProgress(e,n,r,a)},!1),a}),s.data=null;var c=s.beforeSend;return s.beforeSend=function(e,a){t.formData?a.data=t.formData:a.data=r,c&&c.call(this,e,a)},e.ajax(s)}function s(a){function r(e){var t=null;try{e.contentWindow&&(t=e.contentWindow.document)}catch(a){n("cannot get iframe.contentWindow document: "+a)}if(t)return t;try{t=e.contentDocument?e.contentDocument:e.document}catch(a){n("cannot get iframe.contentDocument: "+a),t=e.document}return t}function i(){function t(){try{var e=r(v).readyState;n("state = "+e),e&&"uninitialized"==e.toLowerCase()&&setTimeout(t,50)}catch(a){n("Server abort: ",a," (",a.name,")"),s(S),w&&clearTimeout(w),w=void 0}}var a=f.attr2("target"),o=f.attr2("action"),i="multipart/form-data",c=f.attr("enctype")||f.attr("encoding")||i;$.setAttribute("target",m),l&&!/post/i.test(l)||$.setAttribute("method","POST"),o!=d.url&&$.setAttribute("action",d.url),d.skipEncodingOverride||l&&!/post/i.test(l)||f.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),d.timeout&&(w=setTimeout(function(){k=!0,s(j)},d.timeout));var u=[];try{if(d.extraData)for(var p in d.extraData)d.extraData.hasOwnProperty(p)&&(e.isPlainObject(d.extraData[p])&&d.extraData[p].hasOwnProperty("name")&&d.extraData[p].hasOwnProperty("value")?u.push(e('<input type="hidden" name="'+d.extraData[p].name+'">').val(d.extraData[p].value).appendTo($)[0]):u.push(e('<input type="hidden" name="'+p+'">').val(d.extraData[p]).appendTo($)[0]));d.iframeTarget||g.appendTo("body"),v.attachEvent?v.attachEvent("onload",s):v.addEventListener("load",s,!1),setTimeout(t,15);try{$.submit()}catch(h){var b=document.createElement("form").submit;b.apply($)}}finally{$.setAttribute("action",o),$.setAttribute("enctype",c),a?$.setAttribute("target",a):f.removeAttr("target"),e(u).remove()}}function s(t){if(!b.aborted&&!L){if(A=r(v),A||(n("cannot access response document"),t=S),t===j&&b)return b.abort("timeout"),void T.reject(b,"timeout");if(t==S&&b)return b.abort("server abort"),void T.reject(b,"error","server abort");if(A&&A.location.href!=d.iframeSrc||k){v.detachEvent?v.detachEvent("onload",s):v.removeEventListener("load",s,!1);var a,o="success";try{if(k)throw"timeout";var i="xml"==d.dataType||A.XMLDocument||e.isXMLDoc(A);if(n("isXml="+i),!i&&window.opera&&(null===A.body||!A.body.innerHTML)&&--E)return n("requeing onLoad callback, DOM not available"),void setTimeout(s,250);var l=A.body?A.body:A.documentElement;b.responseText=l?l.innerHTML:null,b.responseXML=A.XMLDocument?A.XMLDocument:A,i&&(d.dataType="xml"),b.getResponseHeader=function(e){var t={"content-type":d.dataType};return t[e.toLowerCase()]},l&&(b.status=Number(l.getAttribute("status"))||b.status,b.statusText=l.getAttribute("statusText")||b.statusText);var c=(d.dataType||"").toLowerCase(),u=/(json|script|text)/.test(c);if(u||d.textarea){var f=A.getElementsByTagName("textarea")[0];if(f)b.responseText=f.value,b.status=Number(f.getAttribute("status"))||b.status,b.statusText=f.getAttribute("statusText")||b.statusText;else if(u){var m=A.getElementsByTagName("pre")[0],h=A.getElementsByTagName("body")[0];m?b.responseText=m.textContent?m.textContent:m.innerText:h&&(b.responseText=h.textContent?h.textContent:h.innerText)}}else"xml"==c&&!b.responseXML&&b.responseText&&(b.responseXML=M(b.responseText));try{_=F(b,c,d)}catch(y){o="parsererror",b.error=a=y||o}}catch(y){n("error caught: ",y),o="error",b.error=a=y||o}b.aborted&&(n("upload aborted"),o=null),b.status&&(o=b.status>=200&&b.status<300||304===b.status?"success":"error"),"success"===o?(d.success&&d.success.call(d.context,_,"success",b),T.resolve(b.responseText,"success",b),p&&e.event.trigger("ajaxSuccess",[b,d])):o&&(void 0===a&&(a=b.statusText),d.error&&d.error.call(d.context,b,o,a),T.reject(b,"error",a),p&&e.event.trigger("ajaxError",[b,d,a])),p&&e.event.trigger("ajaxComplete",[b,d]),p&&!--e.active&&e.event.trigger("ajaxStop"),d.complete&&d.complete.call(d.context,b,o),L=!0,d.timeout&&clearTimeout(w),setTimeout(function(){d.iframeTarget?g.attr("src",d.iframeSrc):g.remove(),b.responseXML=null},100)}}}var c,u,d,p,m,g,v,b,y,x,k,w,$=f[0],T=e.Deferred();if(T.abort=function(e){b.abort(e)},a)for(u=0;u<h.length;u++)c=e(h[u]),o?c.prop("disabled",!1):c.removeAttr("disabled");if(d=e.extend(!0,{},e.ajaxSettings,t),d.context=d.context||d,m="jqFormIO"+(new Date).getTime(),d.iframeTarget?(g=e(d.iframeTarget),x=g.attr2("name"),x?m=x:g.attr2("name",m)):(g=e('<iframe name="'+m+'" src="'+d.iframeSrc+'" />'),g.css({position:"absolute",top:"-1000px",left:"-1000px"})),v=g[0],b={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var a="timeout"===t?"timeout":"aborted";n("aborting upload... "+a),this.aborted=1;try{v.contentWindow.document.execCommand&&v.contentWindow.document.execCommand("Stop")}catch(r){}g.attr("src",d.iframeSrc),b.error=a,d.error&&d.error.call(d.context,b,a,t),p&&e.event.trigger("ajaxError",[b,d,a]),d.complete&&d.complete.call(d.context,b,a)}},p=d.global,p&&0===e.active++&&e.event.trigger("ajaxStart"),p&&e.event.trigger("ajaxSend",[b,d]),d.beforeSend&&d.beforeSend.call(d.context,b,d)===!1)return d.global&&e.active--,T.reject(),T;if(b.aborted)return T.reject(),T;y=$.clk,y&&(x=y.name,x&&!y.disabled&&(d.extraData=d.extraData||{},d.extraData[x]=y.value,"image"==y.type&&(d.extraData[x+".x"]=$.clk_x,d.extraData[x+".y"]=$.clk_y)));var j=1,S=2,C=e("meta[name=csrf-token]").attr("content"),D=e("meta[name=csrf-param]").attr("content");D&&C&&(d.extraData=d.extraData||{},d.extraData[D]=C),d.forceSync?i():setTimeout(i,10);var _,A,L,E=50,M=e.parseXML||function(e,t){return window.ActiveXObject?(t=new ActiveXObject("Microsoft.XMLDOM"),t.async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&"parsererror"!=t.documentElement.nodeName?t:null},O=e.parseJSON||function(e){return window.eval("("+e+")")},F=function(t,a,n){var r=t.getResponseHeader("content-type")||"",o="xml"===a||!a&&r.indexOf("xml")>=0,i=o?t.responseXML:t.responseText;return o&&"parsererror"===i.documentElement.nodeName&&e.error&&e.error("parsererror"),n&&n.dataFilter&&(i=n.dataFilter(i,a)),"string"==typeof i&&("json"===a||!a&&r.indexOf("json")>=0?i=O(i):("script"===a||!a&&r.indexOf("javascript")>=0)&&e.globalEval(i)),i};return T}if(!this.length)return n("ajaxSubmit: skipping submit process - no element selected"),this;var l,c,u,f=this;"function"==typeof t?t={success:t}:void 0===t&&(t={}),l=t.type||this.attr2("method"),c=t.url||this.attr2("action"),u="string"==typeof c?e.trim(c):"",u=u||window.location.href||"",u&&(u=(u.match(/^([^#]+)/)||[])[1]),t=e.extend(!0,{url:u,success:e.ajaxSettings.success,type:l||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},t);var d={};if(this.trigger("form-pre-serialize",[this,t,d]),d.veto)return n("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(t.beforeSerialize&&t.beforeSerialize(this,t)===!1)return n("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var p=t.traditional;void 0===p&&(p=e.ajaxSettings.traditional);var m,h=[],g=this.formToArray(t.semantic,h);if(t.data&&(t.extraData=t.data,m=e.param(t.data,p)),t.beforeSubmit&&t.beforeSubmit(g,this,t)===!1)return n("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[g,this,t,d]),d.veto)return n("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var v=e.param(g,p);m&&(v=v?v+"&"+m:m),"GET"==t.type.toUpperCase()?(t.url+=(t.url.indexOf("?")>=0?"&":"?")+v,t.data=null):t.data=v;var b=[];if(t.resetForm&&b.push(function(){f.resetForm()}),t.clearForm&&b.push(function(){f.clearForm(t.includeHidden)}),!t.dataType&&t.target){var y=t.success||function(){};b.push(function(a){var n=t.replaceTarget?"replaceWith":"html";e(t.target)[n](a).each(y,arguments)})}else t.success&&b.push(t.success);if(t.success=function(e,a,n){for(var r=t.context||this,o=0,i=b.length;o<i;o++)b[o].apply(r,[e,a,n||f,f])},t.error){var x=t.error;t.error=function(e,a,n){var r=t.context||this;x.apply(r,[e,a,n,f])}}if(t.complete){var k=t.complete;t.complete=function(e,a){var n=t.context||this;k.apply(n,[e,a,f])}}var w=e("input[type=file]:enabled",this).filter(function(){return""!==e(this).val()}),$=w.length>0,T="multipart/form-data",j=f.attr("enctype")==T||f.attr("encoding")==T,S=r.fileapi&&r.formdata;n("fileAPI :"+S);var C,D=($||j)&&!S;t.iframe!==!1&&(t.iframe||D)?t.closeKeepAlive?e.get(t.closeKeepAlive,function(){C=s(g)}):C=s(g):C=($||j)&&S?i(g):e.ajax(t),f.removeData("jqxhr").data("jqxhr",C);for(var _=0;_<h.length;_++)h[_]=null;return this.trigger("form-submit-notify",[this,t]),this},e.fn.ajaxForm=function(r){if(r=r||{},r.delegation=r.delegation&&e.isFunction(e.fn.on),!r.delegation&&0===this.length){var o={s:this.selector,c:this.context};return!e.isReady&&o.s?(n("DOM not ready, queuing ajaxForm"),e(function(){e(o.s,o.c).ajaxForm(r)}),this):(n("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)")),this)}return r.delegation?(e(document).off("submit.form-plugin",this.selector,t).off("click.form-plugin",this.selector,a).on("submit.form-plugin",this.selector,r,t).on("click.form-plugin",this.selector,r,a),this):this.ajaxFormUnbind().bind("submit.form-plugin",r,t).bind("click.form-plugin",r,a)},e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},e.fn.formToArray=function(t,a){var n=[];if(0===this.length)return n;var o,i=this[0],s=this.attr("id"),l=t?i.getElementsByTagName("*"):i.elements;if(l&&!/MSIE [678]/.test(navigator.userAgent)&&(l=e(l).get()),s&&(o=e(':input[form="'+s+'"]').get(),o.length&&(l=(l||[]).concat(o))),!l||!l.length)return n;var c,u,f,d,p,m,h;for(c=0,m=l.length;c<m;c++)if(p=l[c],f=p.name,f&&!p.disabled)if(t&&i.clk&&"image"==p.type)i.clk==p&&(n.push({name:f,value:e(p).val(),type:p.type}),n.push({name:f+".x",value:i.clk_x},{name:f+".y",value:i.clk_y}));else if(d=e.fieldValue(p,!0),d&&d.constructor==Array)for(a&&a.push(p),u=0,h=d.length;u<h;u++)n.push({name:f,value:d[u]});else if(r.fileapi&&"file"==p.type){a&&a.push(p);var g=p.files;if(g.length)for(u=0;u<g.length;u++)n.push({name:f,value:g[u],type:p.type});else n.push({name:f,value:"",type:p.type})}else null!==d&&"undefined"!=typeof d&&(a&&a.push(p),n.push({name:f,value:d,type:p.type,required:p.required}));if(!t&&i.clk){var v=e(i.clk),b=v[0];f=b.name,f&&!b.disabled&&"image"==b.type&&(n.push({name:f,value:v.val()}),n.push({name:f+".x",value:i.clk_x},{name:f+".y",value:i.clk_y}))}return n},e.fn.formSerialize=function(t){return e.param(this.formToArray(t))},e.fn.fieldSerialize=function(t){var a=[];return this.each(function(){var n=this.name;if(n){var r=e.fieldValue(this,t);if(r&&r.constructor==Array)for(var o=0,i=r.length;o<i;o++)a.push({name:n,value:r[o]});else null!==r&&"undefined"!=typeof r&&a.push({name:this.name,value:r})}}),e.param(a)},e.fn.fieldValue=function(t){for(var a=[],n=0,r=this.length;n<r;n++){var o=this[n],i=e.fieldValue(o,t);null===i||"undefined"==typeof i||i.constructor==Array&&!i.length||(i.constructor==Array?e.merge(a,i):a.push(i))}return a},e.fieldValue=function(t,a){var n=t.name,r=t.type,o=t.tagName.toLowerCase();if(void 0===a&&(a=!0),a&&(!n||t.disabled||"reset"==r||"button"==r||("checkbox"==r||"radio"==r)&&!t.checked||("submit"==r||"image"==r)&&t.form&&t.form.clk!=t||"select"==o&&t.selectedIndex==-1))return null;if("select"==o){var i=t.selectedIndex;if(i<0)return null;for(var s=[],l=t.options,c="select-one"==r,u=c?i+1:l.length,f=c?i:0;f<u;f++){var d=l[f];if(d.selected){var p=d.value;if(p||(p=d.attributes&&d.attributes.value&&!d.attributes.value.specified?d.text:d.value),c)return p;s.push(p)}}return s}return e(t).val()},e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})},e.fn.clearFields=e.fn.clearInputs=function(t){var a=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var n=this.type,r=this.tagName.toLowerCase();a.test(n)||"textarea"==r?this.value="":"checkbox"==n||"radio"==n?this.checked=!1:"select"==r?this.selectedIndex=-1:"file"==n?/MSIE/.test(navigator.userAgent)?e(this).replaceWith(e(this).clone(!0)):e(this).val(""):t&&(t===!0&&/hidden/.test(n)||"string"==typeof t&&e(this).is(t))&&(this.value="")})},e.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})},e.fn.enable=function(e){return void 0===e&&(e=!0),this.each(function(){this.disabled=!e})},e.fn.selected=function(t){return void 0===t&&(t=!0),this.each(function(){var a=this.type;if("checkbox"==a||"radio"==a)this.checked=t;else if("option"==this.tagName.toLowerCase()){var n=e(this).parent("select");t&&n[0]&&"select-one"==n[0].type&&n.find("option").selected(!1),this.selected=t}})},e.fn.ajaxSubmit.debug=!1}),$(function(){$.browser.webkit&&$("iframe[src='about:blank']").hide()}),!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e("object"==typeof exports?require("jquery"):jQuery)}(function(e){var t,a=navigator.userAgent,n=/iphone/i.test(a),r=/chrome/i.test(a),o=/android/i.test(a);e.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},e.fn.extend({caret:function(e,t){var a;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof e?(t="number"==typeof t?t:e,this.each(function(){this.setSelectionRange?this.setSelectionRange(e,t):this.createTextRange&&(a=this.createTextRange(),a.collapse(!0),a.moveEnd("character",t),a.moveStart("character",e),a.select())})):(this[0].setSelectionRange?(e=this[0].selectionStart,t=this[0].selectionEnd):document.selection&&document.selection.createRange&&(a=document.selection.createRange(),e=0-a.duplicate().moveStart("character",-1e5),t=e+a.text.length),{begin:e,end:t})},unmask:function(){return this.trigger("unmask")},mask:function(a,i){var s,l,c,u,f,d,p,m;if(!a&&this.length>0){s=e(this[0]);var h=s.data(e.mask.dataName);return h?h():void 0}return i=e.extend({autoclear:e.mask.autoclear,placeholder:e.mask.placeholder,completed:null},i),l=e.mask.definitions,c=[],u=p=a.length,f=null,e.each(a.split(""),function(e,t){"?"==t?(p--,u=e):l[t]?(c.push(new RegExp(l[t])),null===f&&(f=c.length-1),u>e&&(d=c.length-1)):c.push(null)}),this.trigger("unmask").each(function(){function s(){if(i.completed){for(var e=f;d>=e;e++)if(c[e]&&D[e]===h(e))return;i.completed.call(C)}}function h(e){return i.placeholder.charAt(e<i.placeholder.length?e:0)}function g(e){for(;++e<p&&!c[e];);return e}function v(e){for(;--e>=0&&!c[e];);return e}function b(e,t){var a,n;if(!(0>e)){for(a=e,n=g(t);p>a;a++)if(c[a]){if(!(p>n&&c[a].test(D[n])))break;D[a]=D[n],D[n]=h(n),n=g(n)}j(),C.caret(Math.max(f,e))}}function y(e){var t,a,n,r;for(t=e,a=h(e);p>t;t++)if(c[t]){if(n=g(t),r=D[t],D[t]=a,!(p>n&&c[n].test(r)))break;a=r}}function x(){var e=C.val(),t=C.caret();if(m&&m.length&&m.length>e.length){for(S(!0);t.begin>0&&!c[t.begin-1];)t.begin--;if(0===t.begin)for(;t.begin<f&&!c[t.begin];)t.begin++;C.caret(t.begin,t.begin)}else{for(S(!0);t.begin<p&&!c[t.begin];)t.begin++;C.caret(t.begin,t.begin)}s()}function k(){S(),C.val()!=A&&C.change()}function w(e){if(!C.prop("readonly")){var t,a,r,o=e.which||e.keyCode;m=C.val(),8===o||46===o||n&&127===o?(t=C.caret(),a=t.begin,r=t.end,r-a===0&&(a=46!==o?v(a):r=g(a-1),r=46===o?g(r):r),T(a,r),b(a,r-1),e.preventDefault()):13===o?k.call(this,e):27===o&&(C.val(A),C.caret(0,S()),e.preventDefault())}}function $(t){if(!C.prop("readonly")){var a,n,r,i=t.which||t.keyCode,l=C.caret();if(!(t.ctrlKey||t.altKey||t.metaKey||32>i)&&i&&13!==i){if(l.end-l.begin!==0&&(T(l.begin,l.end),b(l.begin,l.end-1)),a=g(l.begin-1),p>a&&(n=String.fromCharCode(i),c[a].test(n))){if(y(a),D[a]=n,j(),r=g(a),o){var u=function(){e.proxy(e.fn.caret,C,r)()};setTimeout(u,0)}else C.caret(r);l.begin<=d&&s()}t.preventDefault()}}}function T(e,t){var a;for(a=e;t>a&&p>a;a++)c[a]&&(D[a]=h(a))}function j(){C.val(D.join(""))}function S(e){var t,a,n,r=C.val(),o=-1;for(t=0,n=0;p>t;t++)if(c[t]){for(D[t]=h(t);n++<r.length;)if(a=r.charAt(n-1),c[t].test(a)){D[t]=a,o=t;break}if(n>r.length){T(t+1,p);break}}else D[t]===r.charAt(n)&&n++,u>t&&(o=t);return e?j():u>o+1?i.autoclear||D.join("")===_?(C.val()&&C.val(""),T(0,p)):j():(j(),C.val(C.val().substring(0,o+1))),u?t:f}var C=e(this),D=e.map(a.split(""),function(e,t){return"?"!=e?l[e]?h(t):e:void 0}),_=D.join(""),A=C.val();C.data(e.mask.dataName,function(){return e.map(D,function(e,t){return c[t]&&e!=h(t)?e:null}).join("")}),C.one("unmask",function(){C.off(".mask").removeData(e.mask.dataName)}).on("focus.mask",function(){if(!C.prop("readonly")){clearTimeout(t);var e;A=C.val(),e=S(),t=setTimeout(function(){C.get(0)===document.activeElement&&(j(),e==a.replace("?","").length?C.caret(0,e):C.caret(e))},10)}}).on("blur.mask",k).on("keydown.mask",w).on("keypress.mask",$).on("input.mask paste.mask",function(){C.prop("readonly")||setTimeout(function(){var e=S(!0);C.caret(e),s()},0)}),r&&o&&C.off("input.mask").on("input.mask",x),S()})}})}),$(function(){$("#top_phone").mask("+375 (99) 999-99-99"),$("#bot_phone").mask("+375 (99) 999-99-99")}),$(document).ready(function(){$("button.signup").click(function(){$("#schedule .today").hide(),$("#schedule .apply").show()}),$("header .signup").click(function(){return $("#schedule .today").hide(),$("#schedule .apply").show(),ScrollTO("#form"),!1}),$("#descr .text button").click(function(){$("#descr .text .hidden").slideToggle(),$(this).toggleClass("open"),"А также"==$(this).find("span").text()?$(this).find("span").text("Свернуть"):$(this).find("span").text("А также")})}),function(e){function t(t){var r=t.find(".marker"),o={zoom:16,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP},i=new google.maps.Map(t[0],o);return i.markers=[],r.each(function(){a(e(this),i)}),n(i),i}function a(e,t){var a=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),n=new google.maps.Marker({position:a,map:t});if(t.markers.push(n),e.html()){var r=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(n,"click",function(){r.open(t,n)})}}function n(t){var a=new google.maps.LatLngBounds;e.each(t.markers,function(e,t){var n=new google.maps.LatLng("53.925141","27.617896");a.extend(n)}),1==t.markers.length?(t.setCenter(a.getCenter()),t.setZoom(16)):t.fitBounds(a)}var r=null;e(document).ready(function(){e(".acf-map").each(function(){r=t(e(this))})})}(jQuery),$(".headnav").addClass("mobile_menu"),$(".tog-menu").on("click",function(){$(".headnav").toggle("slow",function(){}),$(".headnav").toggleClass("mobile_opened"),$(".bg_icon").toggleClass("icon_visible"),$(".menu_slide_down").toggleClass("trigger_down"),$(".tog-menu").hasClass("tog-epened")?$(".tog-menu").removeClass("tog-epened"):$(".tog-menu").addClass("tog-epened")}),$(".topheadnav").addClass("mobile_menu_top"),$(".tog-menu-top").on("click",function(){$(".topheadnav").toggle("slow",function(){}),$(".header_info_block").toggleClass("info-block-hide"),$(".tog-menu-top").hasClass("tog-epened-top")?$(".tog-menu-top").removeClass("tog-epened-top"):$(".tog-menu-top").addClass("tog-epened-top")}),$("#toPrice").on("click",function(e){$("html, body").animate({scrollTop:$("#priceblock").offset().top},2e3),e.preventDefault()}),$("#to_telephone").on("click",function(e){$("html, body").animate({scrollTop:$("#toPhone").offset().top},2e3)}),$(document).ready(function(){$(window).scroll(function(){$(this).scrollTop()>500?$(".scrollToTop").fadeIn():$(".scrollToTop").fadeOut()}),$(".scrollToTop").click(function(){return $("html, body").animate({scrollTop:0},800),!1})}),$(document).ready(main()),$(document).ready(function(){$(".tab").click(function(){$(".tab").removeClass("active"),$(this).addClass("active")})}),$(".table_arrow_down").on("click",function(e){var t=$(this).parent();$(this).toggleClass("dropdown_active"),$(t).hasClass("programm_content_wrap--opened")?$(t).removeClass("programm_content_wrap--opened"):$(t).addClass("programm_content_wrap--opened")});
$(".get_in").click(function() {
    $('html, body').animate({
        scrollTop: $("#team_cost_form").offset().top
    }, 1000);
});
//# sourceMappingURL=maps/scripts.js.map
