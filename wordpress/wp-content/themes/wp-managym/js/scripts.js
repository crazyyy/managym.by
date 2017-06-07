!function(){for(var e,t=function(){},a=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],n=a.length,r=window.console=window.console||{};n--;)e=a[n],r[e]||(r[e]=t)}(),"undefined"==typeof jQuery?console.warn("jQuery hasn't loaded"):console.log("jQuery has loaded"),$(function(){var e=$(".headnav"),t=e.children().length,a=100/t;a+="%",$(".headnav li").each(function(e,t){$(this).css("width",a)})}),function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):e("undefined"!=typeof jQuery?jQuery:window.Zepto)}(function(e){"use strict";function t(t){var a=t.data;t.isDefaultPrevented()||(t.preventDefault(),e(t.target).ajaxSubmit(a))}function a(t){var a=t.target,n=e(a);if(!n.is("[type=submit],[type=image]")){var r=n.closest("[type=submit]");if(0===r.length)return;a=r[0]}var i=this;if(i.clk=a,"image"==a.type)if(void 0!==t.offsetX)i.clk_x=t.offsetX,i.clk_y=t.offsetY;else if("function"==typeof e.fn.offset){var o=n.offset();i.clk_x=t.pageX-o.left,i.clk_y=t.pageY-o.top}else i.clk_x=t.pageX-a.offsetLeft,i.clk_y=t.pageY-a.offsetTop;setTimeout(function(){i.clk=i.clk_x=i.clk_y=null},100)}function n(){if(e.fn.ajaxSubmit.debug){var t="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(t):window.opera&&window.opera.postError&&window.opera.postError(t)}}var r={};r.fileapi=void 0!==e("<input type='file'/>").get(0).files,r.formdata=void 0!==window.FormData;var i=!!e.fn.prop;e.fn.attr2=function(){if(!i)return this.attr.apply(this,arguments);var e=this.prop.apply(this,arguments);return e&&e.jquery||"string"==typeof e?e:this.attr.apply(this,arguments)},e.fn.ajaxSubmit=function(t){function a(a){var n,r,i=e.param(a,t.traditional).split("&"),o=i.length,s=[];for(n=0;n<o;n++)i[n]=i[n].replace(/\+/g," "),r=i[n].split("="),s.push([decodeURIComponent(r[0]),decodeURIComponent(r[1])]);return s}function o(n){for(var r=new FormData,i=0;i<n.length;i++)r.append(n[i].name,n[i].value);if(t.extraData){var o=a(t.extraData);for(i=0;i<o.length;i++)o[i]&&r.append(o[i][0],o[i][1])}t.data=null;var s=e.extend(!0,{},e.ajaxSettings,t,{contentType:!1,processData:!1,cache:!1,type:c||"POST"});t.uploadProgress&&(s.xhr=function(){var a=e.ajaxSettings.xhr();return a.upload&&a.upload.addEventListener("progress",function(e){var a=0,n=e.loaded||e.position,r=e.total;e.lengthComputable&&(a=Math.ceil(n/r*100)),t.uploadProgress(e,n,r,a)},!1),a}),s.data=null;var l=s.beforeSend;return s.beforeSend=function(e,a){t.formData?a.data=t.formData:a.data=r,l&&l.call(this,e,a)},e.ajax(s)}function s(a){function r(e){var t=null;try{e.contentWindow&&(t=e.contentWindow.document)}catch(a){n("cannot get iframe.contentWindow document: "+a)}if(t)return t;try{t=e.contentDocument?e.contentDocument:e.document}catch(a){n("cannot get iframe.contentDocument: "+a),t=e.document}return t}function o(){function t(){try{var e=r(v).readyState;n("state = "+e),e&&"uninitialized"==e.toLowerCase()&&setTimeout(t,50)}catch(a){n("Server abort: ",a," (",a.name,")"),s(D),w&&clearTimeout(w),w=void 0}}var a=f.attr2("target"),i=f.attr2("action"),o="multipart/form-data",l=f.attr("enctype")||f.attr("encoding")||o;T.setAttribute("target",p),c&&!/post/i.test(c)||T.setAttribute("method","POST"),i!=d.url&&T.setAttribute("action",d.url),d.skipEncodingOverride||c&&!/post/i.test(c)||f.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),d.timeout&&(w=setTimeout(function(){k=!0,s(S)},d.timeout));var u=[];try{if(d.extraData)for(var m in d.extraData)d.extraData.hasOwnProperty(m)&&(e.isPlainObject(d.extraData[m])&&d.extraData[m].hasOwnProperty("name")&&d.extraData[m].hasOwnProperty("value")?u.push(e('<input type="hidden" name="'+d.extraData[m].name+'">').val(d.extraData[m].value).appendTo(T)[0]):u.push(e('<input type="hidden" name="'+m+'">').val(d.extraData[m]).appendTo(T)[0]));d.iframeTarget||g.appendTo("body"),v.attachEvent?v.attachEvent("onload",s):v.addEventListener("load",s,!1),setTimeout(t,15);try{T.submit()}catch(h){var b=document.createElement("form").submit;b.apply(T)}}finally{T.setAttribute("action",i),T.setAttribute("enctype",l),a?T.setAttribute("target",a):f.removeAttr("target"),e(u).remove()}}function s(t){if(!b.aborted&&!C){if(M=r(v),M||(n("cannot access response document"),t=D),t===S&&b)return b.abort("timeout"),void j.reject(b,"timeout");if(t==D&&b)return b.abort("server abort"),void j.reject(b,"error","server abort");if(M&&M.location.href!=d.iframeSrc||k){v.detachEvent?v.detachEvent("onload",s):v.removeEventListener("load",s,!1);var a,i="success";try{if(k)throw"timeout";var o="xml"==d.dataType||M.XMLDocument||e.isXMLDoc(M);if(n("isXml="+o),!o&&window.opera&&(null===M.body||!M.body.innerHTML)&&--$)return n("requeing onLoad callback, DOM not available"),void setTimeout(s,250);var c=M.body?M.body:M.documentElement;b.responseText=c?c.innerHTML:null,b.responseXML=M.XMLDocument?M.XMLDocument:M,o&&(d.dataType="xml"),b.getResponseHeader=function(e){var t={"content-type":d.dataType};return t[e.toLowerCase()]},c&&(b.status=Number(c.getAttribute("status"))||b.status,b.statusText=c.getAttribute("statusText")||b.statusText);var l=(d.dataType||"").toLowerCase(),u=/(json|script|text)/.test(l);if(u||d.textarea){var f=M.getElementsByTagName("textarea")[0];if(f)b.responseText=f.value,b.status=Number(f.getAttribute("status"))||b.status,b.statusText=f.getAttribute("statusText")||b.statusText;else if(u){var p=M.getElementsByTagName("pre")[0],h=M.getElementsByTagName("body")[0];p?b.responseText=p.textContent?p.textContent:p.innerText:h&&(b.responseText=h.textContent?h.textContent:h.innerText)}}else"xml"==l&&!b.responseXML&&b.responseText&&(b.responseXML=O(b.responseText));try{E=X(b,l,d)}catch(y){i="parsererror",b.error=a=y||i}}catch(y){n("error caught: ",y),i="error",b.error=a=y||i}b.aborted&&(n("upload aborted"),i=null),b.status&&(i=b.status>=200&&b.status<300||304===b.status?"success":"error"),"success"===i?(d.success&&d.success.call(d.context,E,"success",b),j.resolve(b.responseText,"success",b),m&&e.event.trigger("ajaxSuccess",[b,d])):i&&(void 0===a&&(a=b.statusText),d.error&&d.error.call(d.context,b,i,a),j.reject(b,"error",a),m&&e.event.trigger("ajaxError",[b,d,a])),m&&e.event.trigger("ajaxComplete",[b,d]),m&&!--e.active&&e.event.trigger("ajaxStop"),d.complete&&d.complete.call(d.context,b,i),C=!0,d.timeout&&clearTimeout(w),setTimeout(function(){d.iframeTarget?g.attr("src",d.iframeSrc):g.remove(),b.responseXML=null},100)}}}var l,u,d,m,p,g,v,b,y,x,k,w,T=f[0],j=e.Deferred();if(j.abort=function(e){b.abort(e)},a)for(u=0;u<h.length;u++)l=e(h[u]),i?l.prop("disabled",!1):l.removeAttr("disabled");if(d=e.extend(!0,{},e.ajaxSettings,t),d.context=d.context||d,p="jqFormIO"+(new Date).getTime(),d.iframeTarget?(g=e(d.iframeTarget),x=g.attr2("name"),x?p=x:g.attr2("name",p)):(g=e('<iframe name="'+p+'" src="'+d.iframeSrc+'" />'),g.css({position:"absolute",top:"-1000px",left:"-1000px"})),v=g[0],b={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var a="timeout"===t?"timeout":"aborted";n("aborting upload... "+a),this.aborted=1;try{v.contentWindow.document.execCommand&&v.contentWindow.document.execCommand("Stop")}catch(r){}g.attr("src",d.iframeSrc),b.error=a,d.error&&d.error.call(d.context,b,a,t),m&&e.event.trigger("ajaxError",[b,d,a]),d.complete&&d.complete.call(d.context,b,a)}},m=d.global,m&&0===e.active++&&e.event.trigger("ajaxStart"),m&&e.event.trigger("ajaxSend",[b,d]),d.beforeSend&&d.beforeSend.call(d.context,b,d)===!1)return d.global&&e.active--,j.reject(),j;if(b.aborted)return j.reject(),j;y=T.clk,y&&(x=y.name,x&&!y.disabled&&(d.extraData=d.extraData||{},d.extraData[x]=y.value,"image"==y.type&&(d.extraData[x+".x"]=T.clk_x,d.extraData[x+".y"]=T.clk_y)));var S=1,D=2,A=e("meta[name=csrf-token]").attr("content"),L=e("meta[name=csrf-param]").attr("content");L&&A&&(d.extraData=d.extraData||{},d.extraData[L]=A),d.forceSync?o():setTimeout(o,10);var E,M,C,$=50,O=e.parseXML||function(e,t){return window.ActiveXObject?(t=new ActiveXObject("Microsoft.XMLDOM"),t.async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&"parsererror"!=t.documentElement.nodeName?t:null},F=e.parseJSON||function(e){return window.eval("("+e+")")},X=function(t,a,n){var r=t.getResponseHeader("content-type")||"",i="xml"===a||!a&&r.indexOf("xml")>=0,o=i?t.responseXML:t.responseText;return i&&"parsererror"===o.documentElement.nodeName&&e.error&&e.error("parsererror"),n&&n.dataFilter&&(o=n.dataFilter(o,a)),"string"==typeof o&&("json"===a||!a&&r.indexOf("json")>=0?o=F(o):("script"===a||!a&&r.indexOf("javascript")>=0)&&e.globalEval(o)),o};return j}if(!this.length)return n("ajaxSubmit: skipping submit process - no element selected"),this;var c,l,u,f=this;"function"==typeof t?t={success:t}:void 0===t&&(t={}),c=t.type||this.attr2("method"),l=t.url||this.attr2("action"),u="string"==typeof l?e.trim(l):"",u=u||window.location.href||"",u&&(u=(u.match(/^([^#]+)/)||[])[1]),t=e.extend(!0,{url:u,success:e.ajaxSettings.success,type:c||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},t);var d={};if(this.trigger("form-pre-serialize",[this,t,d]),d.veto)return n("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(t.beforeSerialize&&t.beforeSerialize(this,t)===!1)return n("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var m=t.traditional;void 0===m&&(m=e.ajaxSettings.traditional);var p,h=[],g=this.formToArray(t.semantic,h);if(t.data&&(t.extraData=t.data,p=e.param(t.data,m)),t.beforeSubmit&&t.beforeSubmit(g,this,t)===!1)return n("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[g,this,t,d]),d.veto)return n("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var v=e.param(g,m);p&&(v=v?v+"&"+p:p),"GET"==t.type.toUpperCase()?(t.url+=(t.url.indexOf("?")>=0?"&":"?")+v,t.data=null):t.data=v;var b=[];if(t.resetForm&&b.push(function(){f.resetForm()}),t.clearForm&&b.push(function(){f.clearForm(t.includeHidden)}),!t.dataType&&t.target){var y=t.success||function(){};b.push(function(a){var n=t.replaceTarget?"replaceWith":"html";e(t.target)[n](a).each(y,arguments)})}else t.success&&b.push(t.success);if(t.success=function(e,a,n){for(var r=t.context||this,i=0,o=b.length;i<o;i++)b[i].apply(r,[e,a,n||f,f])},t.error){var x=t.error;t.error=function(e,a,n){var r=t.context||this;x.apply(r,[e,a,n,f])}}if(t.complete){var k=t.complete;t.complete=function(e,a){var n=t.context||this;k.apply(n,[e,a,f])}}var w=e("input[type=file]:enabled",this).filter(function(){return""!==e(this).val()}),T=w.length>0,j="multipart/form-data",S=f.attr("enctype")==j||f.attr("encoding")==j,D=r.fileapi&&r.formdata;n("fileAPI :"+D);var A,L=(T||S)&&!D;t.iframe!==!1&&(t.iframe||L)?t.closeKeepAlive?e.get(t.closeKeepAlive,function(){A=s(g)}):A=s(g):A=(T||S)&&D?o(g):e.ajax(t),f.removeData("jqxhr").data("jqxhr",A);for(var E=0;E<h.length;E++)h[E]=null;return this.trigger("form-submit-notify",[this,t]),this},e.fn.ajaxForm=function(r){if(r=r||{},r.delegation=r.delegation&&e.isFunction(e.fn.on),!r.delegation&&0===this.length){var i={s:this.selector,c:this.context};return!e.isReady&&i.s?(n("DOM not ready, queuing ajaxForm"),e(function(){e(i.s,i.c).ajaxForm(r)}),this):(n("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)")),this)}return r.delegation?(e(document).off("submit.form-plugin",this.selector,t).off("click.form-plugin",this.selector,a).on("submit.form-plugin",this.selector,r,t).on("click.form-plugin",this.selector,r,a),this):this.ajaxFormUnbind().bind("submit.form-plugin",r,t).bind("click.form-plugin",r,a)},e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},e.fn.formToArray=function(t,a){var n=[];if(0===this.length)return n;var i,o=this[0],s=this.attr("id"),c=t?o.getElementsByTagName("*"):o.elements;if(c&&!/MSIE [678]/.test(navigator.userAgent)&&(c=e(c).get()),s&&(i=e(':input[form="'+s+'"]').get(),i.length&&(c=(c||[]).concat(i))),!c||!c.length)return n;var l,u,f,d,m,p,h;for(l=0,p=c.length;l<p;l++)if(m=c[l],f=m.name,f&&!m.disabled)if(t&&o.clk&&"image"==m.type)o.clk==m&&(n.push({name:f,value:e(m).val(),type:m.type}),n.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}));else if(d=e.fieldValue(m,!0),d&&d.constructor==Array)for(a&&a.push(m),u=0,h=d.length;u<h;u++)n.push({name:f,value:d[u]});else if(r.fileapi&&"file"==m.type){a&&a.push(m);var g=m.files;if(g.length)for(u=0;u<g.length;u++)n.push({name:f,value:g[u],type:m.type});else n.push({name:f,value:"",type:m.type})}else null!==d&&"undefined"!=typeof d&&(a&&a.push(m),n.push({name:f,value:d,type:m.type,required:m.required}));if(!t&&o.clk){var v=e(o.clk),b=v[0];f=b.name,f&&!b.disabled&&"image"==b.type&&(n.push({name:f,value:v.val()}),n.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}))}return n},e.fn.formSerialize=function(t){return e.param(this.formToArray(t))},e.fn.fieldSerialize=function(t){var a=[];return this.each(function(){var n=this.name;if(n){var r=e.fieldValue(this,t);if(r&&r.constructor==Array)for(var i=0,o=r.length;i<o;i++)a.push({name:n,value:r[i]});else null!==r&&"undefined"!=typeof r&&a.push({name:this.name,value:r})}}),e.param(a)},e.fn.fieldValue=function(t){for(var a=[],n=0,r=this.length;n<r;n++){var i=this[n],o=e.fieldValue(i,t);null===o||"undefined"==typeof o||o.constructor==Array&&!o.length||(o.constructor==Array?e.merge(a,o):a.push(o))}return a},e.fieldValue=function(t,a){var n=t.name,r=t.type,i=t.tagName.toLowerCase();if(void 0===a&&(a=!0),a&&(!n||t.disabled||"reset"==r||"button"==r||("checkbox"==r||"radio"==r)&&!t.checked||("submit"==r||"image"==r)&&t.form&&t.form.clk!=t||"select"==i&&t.selectedIndex==-1))return null;if("select"==i){var o=t.selectedIndex;if(o<0)return null;for(var s=[],c=t.options,l="select-one"==r,u=l?o+1:c.length,f=l?o:0;f<u;f++){var d=c[f];if(d.selected){var m=d.value;if(m||(m=d.attributes&&d.attributes.value&&!d.attributes.value.specified?d.text:d.value),l)return m;s.push(m)}}return s}return e(t).val()},e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})},e.fn.clearFields=e.fn.clearInputs=function(t){var a=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var n=this.type,r=this.tagName.toLowerCase();a.test(n)||"textarea"==r?this.value="":"checkbox"==n||"radio"==n?this.checked=!1:"select"==r?this.selectedIndex=-1:"file"==n?/MSIE/.test(navigator.userAgent)?e(this).replaceWith(e(this).clone(!0)):e(this).val(""):t&&(t===!0&&/hidden/.test(n)||"string"==typeof t&&e(this).is(t))&&(this.value="")})},e.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})},e.fn.enable=function(e){return void 0===e&&(e=!0),this.each(function(){this.disabled=!e})},e.fn.selected=function(t){return void 0===t&&(t=!0),this.each(function(){var a=this.type;if("checkbox"==a||"radio"==a)this.checked=t;else if("option"==this.tagName.toLowerCase()){var n=e(this).parent("select");t&&n[0]&&"select-one"==n[0].type&&n.find("option").selected(!1),this.selected=t}})},e.fn.ajaxSubmit.debug=!1}),$(function(){$.browser.webkit&&$("iframe[src='about:blank']").hide()}),!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e("object"==typeof exports?require("jquery"):jQuery)}(function(e){var t,a=navigator.userAgent,n=/iphone/i.test(a),r=/chrome/i.test(a),i=/android/i.test(a);e.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},e.fn.extend({caret:function(e,t){var a;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof e?(t="number"==typeof t?t:e,this.each(function(){this.setSelectionRange?this.setSelectionRange(e,t):this.createTextRange&&(a=this.createTextRange(),a.collapse(!0),a.moveEnd("character",t),a.moveStart("character",e),a.select())})):(this[0].setSelectionRange?(e=this[0].selectionStart,t=this[0].selectionEnd):document.selection&&document.selection.createRange&&(a=document.selection.createRange(),e=0-a.duplicate().moveStart("character",-1e5),t=e+a.text.length),{begin:e,end:t})},unmask:function(){return this.trigger("unmask")},mask:function(a,o){var s,c,l,u,f,d,m,p;if(!a&&this.length>0){s=e(this[0]);var h=s.data(e.mask.dataName);return h?h():void 0}return o=e.extend({autoclear:e.mask.autoclear,placeholder:e.mask.placeholder,completed:null},o),c=e.mask.definitions,l=[],u=m=a.length,f=null,e.each(a.split(""),function(e,t){"?"==t?(m--,u=e):c[t]?(l.push(new RegExp(c[t])),null===f&&(f=l.length-1),u>e&&(d=l.length-1)):l.push(null)}),this.trigger("unmask").each(function(){function s(){if(o.completed){for(var e=f;d>=e;e++)if(l[e]&&L[e]===h(e))return;o.completed.call(A)}}function h(e){return o.placeholder.charAt(e<o.placeholder.length?e:0)}function g(e){for(;++e<m&&!l[e];);return e}function v(e){for(;--e>=0&&!l[e];);return e}function b(e,t){var a,n;if(!(0>e)){for(a=e,n=g(t);m>a;a++)if(l[a]){if(!(m>n&&l[a].test(L[n])))break;L[a]=L[n],L[n]=h(n),n=g(n)}S(),A.caret(Math.max(f,e))}}function y(e){var t,a,n,r;for(t=e,a=h(e);m>t;t++)if(l[t]){if(n=g(t),r=L[t],L[t]=a,!(m>n&&l[n].test(r)))break;a=r}}function x(){var e=A.val(),t=A.caret();if(p&&p.length&&p.length>e.length){for(D(!0);t.begin>0&&!l[t.begin-1];)t.begin--;if(0===t.begin)for(;t.begin<f&&!l[t.begin];)t.begin++;A.caret(t.begin,t.begin)}else{for(D(!0);t.begin<m&&!l[t.begin];)t.begin++;A.caret(t.begin,t.begin)}s()}function k(){D(),A.val()!=M&&A.change()}function w(e){if(!A.prop("readonly")){var t,a,r,i=e.which||e.keyCode;p=A.val(),8===i||46===i||n&&127===i?(t=A.caret(),a=t.begin,r=t.end,r-a===0&&(a=46!==i?v(a):r=g(a-1),r=46===i?g(r):r),j(a,r),b(a,r-1),e.preventDefault()):13===i?k.call(this,e):27===i&&(A.val(M),A.caret(0,D()),e.preventDefault())}}function T(t){if(!A.prop("readonly")){var a,n,r,o=t.which||t.keyCode,c=A.caret();if(!(t.ctrlKey||t.altKey||t.metaKey||32>o)&&o&&13!==o){if(c.end-c.begin!==0&&(j(c.begin,c.end),b(c.begin,c.end-1)),a=g(c.begin-1),m>a&&(n=String.fromCharCode(o),l[a].test(n))){if(y(a),L[a]=n,S(),r=g(a),i){var u=function(){e.proxy(e.fn.caret,A,r)()};setTimeout(u,0)}else A.caret(r);c.begin<=d&&s()}t.preventDefault()}}}function j(e,t){var a;for(a=e;t>a&&m>a;a++)l[a]&&(L[a]=h(a))}function S(){A.val(L.join(""))}function D(e){var t,a,n,r=A.val(),i=-1;for(t=0,n=0;m>t;t++)if(l[t]){for(L[t]=h(t);n++<r.length;)if(a=r.charAt(n-1),l[t].test(a)){L[t]=a,i=t;break}if(n>r.length){j(t+1,m);break}}else L[t]===r.charAt(n)&&n++,u>t&&(i=t);return e?S():u>i+1?o.autoclear||L.join("")===E?(A.val()&&A.val(""),j(0,m)):S():(S(),A.val(A.val().substring(0,i+1))),u?t:f}var A=e(this),L=e.map(a.split(""),function(e,t){return"?"!=e?c[e]?h(t):e:void 0}),E=L.join(""),M=A.val();A.data(e.mask.dataName,function(){return e.map(L,function(e,t){return l[t]&&e!=h(t)?e:null}).join("")}),A.one("unmask",function(){A.off(".mask").removeData(e.mask.dataName)}).on("focus.mask",function(){if(!A.prop("readonly")){clearTimeout(t);var e;M=A.val(),e=D(),t=setTimeout(function(){A.get(0)===document.activeElement&&(S(),e==a.replace("?","").length?A.caret(0,e):A.caret(e))},10)}}).on("blur.mask",k).on("keydown.mask",w).on("keypress.mask",T).on("input.mask paste.mask",function(){A.prop("readonly")||setTimeout(function(){var e=D(!0);A.caret(e),s()},0)}),r&&i&&A.off("input.mask").on("input.mask",x),D()})}})}),$(function(){$("#top_phone").mask("+375 (99) 999-99-99"),$("#bot_phone").mask("+375 (99) 999-99-99")}),$(document).ready(function(){$("button.signup").click(function(){$("#schedule .today").hide(),$("#schedule .apply").show()}),$("header .signup").click(function(){return $("#schedule .today").hide(),$("#schedule .apply").show(),ScrollTO("#form"),!1}),$("#descr .text button").click(function(){$("#descr .text .hidden").slideToggle(),$(this).toggleClass("open"),"А также"==$(this).find("span").text()?$(this).find("span").text("Свернуть"):$(this).find("span").text("А также")})}),function(e){function t(t){var r=t.find(".marker"),i={zoom:16,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP},o=new google.maps.Map(t[0],i);return o.markers=[],r.each(function(){a(e(this),o)}),n(o),o}function a(e,t){var a=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),n=new google.maps.Marker({position:a,map:t});if(t.markers.push(n),e.html()){var r=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(n,"click",function(){r.open(t,n)})}}function n(t){var a=new google.maps.LatLngBounds;e.each(t.markers,function(e,t){var n=new google.maps.LatLng("53.925141","27.617896");a.extend(n)}),1==t.markers.length?(t.setCenter(a.getCenter()),t.setZoom(16)):t.fitBounds(a)}var r=null;e(document).ready(function(){e(".acf-map").each(function(){r=t(e(this))})})}(jQuery);
//# sourceMappingURL=maps/scripts.js.map
