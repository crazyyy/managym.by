// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function() {};
  var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());
if (typeof jQuery === 'undefined') {
  console.warn('jQuery hasn\'t loaded');
} else {
  console.log('jQuery has loaded');
}
// Place any jQuery/helper plugins in here.


$(function() {
  var $headnav = $('.headnav');
  var numberOfChildren = $headnav.children().length;
  var width = 100 / numberOfChildren;

  width = width + '%';
  $('.headnav li').each(function(index, el) {
    $(this).css('width', width)
  });

  $('.lessons-list li a').on('click', function(e) {
    e.preventDefault(e);
    var $parent = $(this).parent();
    if (!$parent.hasClass('active')) {
      $('.lessons-list li').removeClass('active');
      $parent.addClass('active');
      var thisId = $parent.attr('data-id');
      var selector = '.lesson-' + thisId;
      $('.lessons-bloks .lesson-active').removeClass('lesson-active');
      $(selector).addClass('lesson-active');
    }

  })


});


/** jquery.form */
(function(factory) {
    "use strict";
    if (typeof define === 'function' && define.amd) {
      define(['jquery'], factory);
    } else {
      factory((typeof(jQuery) != 'undefined') ? jQuery : window.Zepto);
    }
  }
  (function($) {
    "use strict";
    var feature = {};
    feature.fileapi = $("<input type='file'/>").get(0).files !== undefined;
    feature.formdata = window.FormData !== undefined;
    var hasProp = !!$.fn.prop;
    $.fn.attr2 = function() {
      if (!hasProp) {
        return this.attr.apply(this, arguments);
      }
      var val = this.prop.apply(this, arguments);
      if ((val && val.jquery) || typeof val === 'string') {
        return val;
      }
      return this.attr.apply(this, arguments);
    };
    $.fn.ajaxSubmit = function(options) {
      if (!this.length) {
        log('ajaxSubmit: skipping submit process - no element selected');
        return this;
      }
      var method, action, url, $form = this;
      if (typeof options == 'function') {
        options = {
          success: options
        };
      } else if (options === undefined) {
        options = {};
      }
      method = options.type || this.attr2('method');
      action = options.url || this.attr2('action');
      url = (typeof action === 'string') ? $.trim(action) : '';
      url = url || window.location.href || '';
      if (url) {
        url = (url.match(/^([^#]+)/) || [])[1];
      }
      options = $.extend(true, {
        url: url,
        success: $.ajaxSettings.success,
        type: method || $.ajaxSettings.type,
        iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank'
      }, options);
      var veto = {};
      this.trigger('form-pre-serialize', [this, options, veto]);
      if (veto.veto) {
        log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');
        return this;
      }
      if (options.beforeSerialize && options.beforeSerialize(this, options) === false) {
        log('ajaxSubmit: submit aborted via beforeSerialize callback');
        return this;
      }
      var traditional = options.traditional;
      if (traditional === undefined) {
        traditional = $.ajaxSettings.traditional;
      }
      var elements = [];
      var qx, a = this.formToArray(options.semantic, elements);
      if (options.data) {
        options.extraData = options.data;
        qx = $.param(options.data, traditional);
      }
      if (options.beforeSubmit && options.beforeSubmit(a, this, options) === false) {
        log('ajaxSubmit: submit aborted via beforeSubmit callback');
        return this;
      }
      this.trigger('form-submit-validate', [a, this, options, veto]);
      if (veto.veto) {
        log('ajaxSubmit: submit vetoed via form-submit-validate trigger');
        return this;
      }
      var q = $.param(a, traditional);
      if (qx) {
        q = (q ? (q + '&' + qx) : qx);
      }
      if (options.type.toUpperCase() == 'GET') {
        options.url += (options.url.indexOf('?') >= 0 ? '&' : '?') + q;
        options.data = null;
      } else {
        options.data = q;
      }
      var callbacks = [];
      if (options.resetForm) {
        callbacks.push(function() {
          $form.resetForm();
        });
      }
      if (options.clearForm) {
        callbacks.push(function() {
          $form.clearForm(options.includeHidden);
        });
      }
      if (!options.dataType && options.target) {
        var oldSuccess = options.success || function() {};
        callbacks.push(function(data) {
          var fn = options.replaceTarget ? 'replaceWith' : 'html';
          $(options.target)[fn](data).each(oldSuccess, arguments);
        });
      } else if (options.success) {
        callbacks.push(options.success);
      }
      options.success = function(data, status, xhr) {
        var context = options.context || this;
        for (var i = 0, max = callbacks.length; i < max; i++) {
          callbacks[i].apply(context, [data, status, xhr || $form, $form]);
        }
      };
      if (options.error) {
        var oldError = options.error;
        options.error = function(xhr, status, error) {
          var context = options.context || this;
          oldError.apply(context, [xhr, status, error, $form]);
        };
      }
      if (options.complete) {
        var oldComplete = options.complete;
        options.complete = function(xhr, status) {
          var context = options.context || this;
          oldComplete.apply(context, [xhr, status, $form]);
        };
      }
      var fileInputs = $('input[type=file]:enabled', this).filter(function() {
        return $(this).val() !== '';
      });
      var hasFileInputs = fileInputs.length > 0;
      var mp = 'multipart/form-data';
      var multipart = ($form.attr('enctype') == mp || $form.attr('encoding') == mp);
      var fileAPI = feature.fileapi && feature.formdata;
      log("fileAPI :" + fileAPI);
      var shouldUseFrame = (hasFileInputs || multipart) && !fileAPI;
      var jqxhr;
      if (options.iframe !== false && (options.iframe || shouldUseFrame)) {
        if (options.closeKeepAlive) {
          $.get(options.closeKeepAlive, function() {
            jqxhr = fileUploadIframe(a);
          });
        } else {
          jqxhr = fileUploadIframe(a);
        }
      } else if ((hasFileInputs || multipart) && fileAPI) {
        jqxhr = fileUploadXhr(a);
      } else {
        jqxhr = $.ajax(options);
      }
      $form.removeData('jqxhr').data('jqxhr', jqxhr);
      for (var k = 0; k < elements.length; k++) {
        elements[k] = null;
      }
      this.trigger('form-submit-notify', [this, options]);
      return this;

      function deepSerialize(extraData) {
        var serialized = $.param(extraData, options.traditional).split('&');
        var len = serialized.length;
        var result = [];
        var i, part;
        for (i = 0; i < len; i++) {
          serialized[i] = serialized[i].replace(/\+/g, ' ');
          part = serialized[i].split('=');
          result.push([decodeURIComponent(part[0]), decodeURIComponent(part[1])]);
        }
        return result;
      }

      function fileUploadXhr(a) {
        var formdata = new FormData();
        for (var i = 0; i < a.length; i++) {
          formdata.append(a[i].name, a[i].value);
        }
        if (options.extraData) {
          var serializedData = deepSerialize(options.extraData);
          for (i = 0; i < serializedData.length; i++) {
            if (serializedData[i]) {
              formdata.append(serializedData[i][0], serializedData[i][1]);
            }
          }
        }
        options.data = null;
        var s = $.extend(true, {}, $.ajaxSettings, options, {
          contentType: false,
          processData: false,
          cache: false,
          type: method || 'POST'
        });
        if (options.uploadProgress) {
          s.xhr = function() {
            var xhr = $.ajaxSettings.xhr();
            if (xhr.upload) {
              xhr.upload.addEventListener('progress', function(event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                  percent = Math.ceil(position / total * 100);
                }
                options.uploadProgress(event, position, total, percent);
              }, false);
            }
            return xhr;
          };
        }
        s.data = null;
        var beforeSend = s.beforeSend;
        s.beforeSend = function(xhr, o) {
          if (options.formData) {
            o.data = options.formData;
          } else {
            o.data = formdata;
          }
          if (beforeSend) {
            beforeSend.call(this, xhr, o);
          }
        };
        return $.ajax(s);
      }

      function fileUploadIframe(a) {
        var form = $form[0],
          el, i, s, g, id, $io, io, xhr, sub, n, timedOut, timeoutHandle;
        var deferred = $.Deferred();
        deferred.abort = function(status) {
          xhr.abort(status);
        };
        if (a) {
          for (i = 0; i < elements.length; i++) {
            el = $(elements[i]);
            if (hasProp) {
              el.prop('disabled', false);
            } else {
              el.removeAttr('disabled');
            }
          }
        }
        s = $.extend(true, {}, $.ajaxSettings, options);
        s.context = s.context || s;
        id = 'jqFormIO' + (new Date().getTime());
        if (s.iframeTarget) {
          $io = $(s.iframeTarget);
          n = $io.attr2('name');
          if (!n) {
            $io.attr2('name', id);
          } else {
            id = n;
          }
        } else {
          $io = $('<iframe name="' + id + '" src="' + s.iframeSrc + '" />');
          $io.css({
            position: 'absolute',
            top: '-1000px',
            left: '-1000px'
          });
        }
        io = $io[0];
        xhr = {
          aborted: 0,
          responseText: null,
          responseXML: null,
          status: 0,
          statusText: 'n/a',
          getAllResponseHeaders: function() {},
          getResponseHeader: function() {},
          setRequestHeader: function() {},
          abort: function(status) {
            var e = (status === 'timeout' ? 'timeout' : 'aborted');
            log('aborting upload... ' + e);
            this.aborted = 1;
            try {
              if (io.contentWindow.document.execCommand) {
                io.contentWindow.document.execCommand('Stop');
              }
            } catch (ignore) {}
            $io.attr('src', s.iframeSrc);
            xhr.error = e;
            if (s.error) {
              s.error.call(s.context, xhr, e, status);
            }
            if (g) {
              $.event.trigger("ajaxError", [xhr, s, e]);
            }
            if (s.complete) {
              s.complete.call(s.context, xhr, e);
            }
          }
        };
        g = s.global;
        if (g && 0 === $.active++) {
          $.event.trigger("ajaxStart");
        }
        if (g) {
          $.event.trigger("ajaxSend", [xhr, s]);
        }
        if (s.beforeSend && s.beforeSend.call(s.context, xhr, s) === false) {
          if (s.global) {
            $.active--;
          }
          deferred.reject();
          return deferred;
        }
        if (xhr.aborted) {
          deferred.reject();
          return deferred;
        }
        sub = form.clk;
        if (sub) {
          n = sub.name;
          if (n && !sub.disabled) {
            s.extraData = s.extraData || {};
            s.extraData[n] = sub.value;
            if (sub.type == "image") {
              s.extraData[n + '.x'] = form.clk_x;
              s.extraData[n + '.y'] = form.clk_y;
            }
          }
        }
        var CLIENT_TIMEOUT_ABORT = 1;
        var SERVER_ABORT = 2;

        function getDoc(frame) {
          var doc = null;
          try {
            if (frame.contentWindow) {
              doc = frame.contentWindow.document;
            }
          } catch (err) {
            log('cannot get iframe.contentWindow document: ' + err);
          }
          if (doc) {
            return doc;
          }
          try {
            doc = frame.contentDocument ? frame.contentDocument : frame.document;
          } catch (err) {
            log('cannot get iframe.contentDocument: ' + err);
            doc = frame.document;
          }
          return doc;
        }
        var csrf_token = $('meta[name=csrf-token]').attr('content');
        var csrf_param = $('meta[name=csrf-param]').attr('content');
        if (csrf_param && csrf_token) {
          s.extraData = s.extraData || {};
          s.extraData[csrf_param] = csrf_token;
        }

        function doSubmit() {
          var t = $form.attr2('target'),
            a = $form.attr2('action'),
            mp = 'multipart/form-data',
            et = $form.attr('enctype') || $form.attr('encoding') || mp;
          form.setAttribute('target', id);
          if (!method || /post/i.test(method)) {
            form.setAttribute('method', 'POST');
          }
          if (a != s.url) {
            form.setAttribute('action', s.url);
          }
          if (!s.skipEncodingOverride && (!method || /post/i.test(method))) {
            $form.attr({
              encoding: 'multipart/form-data',
              enctype: 'multipart/form-data'
            });
          }
          if (s.timeout) {
            timeoutHandle = setTimeout(function() {
              timedOut = true;
              cb(CLIENT_TIMEOUT_ABORT);
            }, s.timeout);
          }

          function checkState() {
            try {
              var state = getDoc(io).readyState;
              log('state = ' + state);
              if (state && state.toLowerCase() == 'uninitialized') {
                setTimeout(checkState, 50);
              }
            } catch (e) {
              log('Server abort: ', e, ' (', e.name, ')');
              cb(SERVER_ABORT);
              if (timeoutHandle) {
                clearTimeout(timeoutHandle);
              }
              timeoutHandle = undefined;
            }
          }
          var extraInputs = [];
          try {
            if (s.extraData) {
              for (var n in s.extraData) {
                if (s.extraData.hasOwnProperty(n)) {
                  if ($.isPlainObject(s.extraData[n]) && s.extraData[n].hasOwnProperty('name') && s.extraData[n].hasOwnProperty('value')) {
                    extraInputs.push($('<input type="hidden" name="' + s.extraData[n].name + '">').val(s.extraData[n].value).appendTo(form)[0]);
                  } else {
                    extraInputs.push($('<input type="hidden" name="' + n + '">').val(s.extraData[n]).appendTo(form)[0]);
                  }
                }
              }
            }
            if (!s.iframeTarget) {
              $io.appendTo('body');
            }
            if (io.attachEvent) {
              io.attachEvent('onload', cb);
            } else {
              io.addEventListener('load', cb, false);
            }
            setTimeout(checkState, 15);
            try {
              form.submit();
            } catch (err) {
              var submitFn = document.createElement('form').submit;
              submitFn.apply(form);
            }
          } finally {
            form.setAttribute('action', a);
            form.setAttribute('enctype', et);
            if (t) {
              form.setAttribute('target', t);
            } else {
              $form.removeAttr('target');
            }
            $(extraInputs).remove();
          }
        }
        if (s.forceSync) {
          doSubmit();
        } else {
          setTimeout(doSubmit, 10);
        }
        var data, doc, domCheckCount = 50,
          callbackProcessed;

        function cb(e) {
          if (xhr.aborted || callbackProcessed) {
            return;
          }
          doc = getDoc(io);
          if (!doc) {
            log('cannot access response document');
            e = SERVER_ABORT;
          }
          if (e === CLIENT_TIMEOUT_ABORT && xhr) {
            xhr.abort('timeout');
            deferred.reject(xhr, 'timeout');
            return;
          } else if (e == SERVER_ABORT && xhr) {
            xhr.abort('server abort');
            deferred.reject(xhr, 'error', 'server abort');
            return;
          }
          if (!doc || doc.location.href == s.iframeSrc) {
            if (!timedOut) {
              return;
            }
          }
          if (io.detachEvent) {
            io.detachEvent('onload', cb);
          } else {
            io.removeEventListener('load', cb, false);
          }
          var status = 'success',
            errMsg;
          try {
            if (timedOut) {
              throw 'timeout';
            }
            var isXml = s.dataType == 'xml' || doc.XMLDocument || $.isXMLDoc(doc);
            log('isXml=' + isXml);
            if (!isXml && window.opera && (doc.body === null || !doc.body.innerHTML)) {
              if (--domCheckCount) {
                log('requeing onLoad callback, DOM not available');
                setTimeout(cb, 250);
                return;
              }
            }
            var docRoot = doc.body ? doc.body : doc.documentElement;
            xhr.responseText = docRoot ? docRoot.innerHTML : null;
            xhr.responseXML = doc.XMLDocument ? doc.XMLDocument : doc;
            if (isXml) {
              s.dataType = 'xml';
            }
            xhr.getResponseHeader = function(header) {
              var headers = {
                'content-type': s.dataType
              };
              return headers[header.toLowerCase()];
            };
            if (docRoot) {
              xhr.status = Number(docRoot.getAttribute('status')) || xhr.status;
              xhr.statusText = docRoot.getAttribute('statusText') || xhr.statusText;
            }
            var dt = (s.dataType || '').toLowerCase();
            var scr = /(json|script|text)/.test(dt);
            if (scr || s.textarea) {
              var ta = doc.getElementsByTagName('textarea')[0];
              if (ta) {
                xhr.responseText = ta.value;
                xhr.status = Number(ta.getAttribute('status')) || xhr.status;
                xhr.statusText = ta.getAttribute('statusText') || xhr.statusText;
              } else if (scr) {
                var pre = doc.getElementsByTagName('pre')[0];
                var b = doc.getElementsByTagName('body')[0];
                if (pre) {
                  xhr.responseText = pre.textContent ? pre.textContent : pre.innerText;
                } else if (b) {
                  xhr.responseText = b.textContent ? b.textContent : b.innerText;
                }
              }
            } else if (dt == 'xml' && !xhr.responseXML && xhr.responseText) {
              xhr.responseXML = toXml(xhr.responseText);
            }
            try {
              data = httpData(xhr, dt, s);
            } catch (err) {
              status = 'parsererror';
              xhr.error = errMsg = (err || status);
            }
          } catch (err) {
            log('error caught: ', err);
            status = 'error';
            xhr.error = errMsg = (err || status);
          }
          if (xhr.aborted) {
            log('upload aborted');
            status = null;
          }
          if (xhr.status) {
            status = (xhr.status >= 200 && xhr.status < 300 || xhr.status === 304) ? 'success' : 'error';
          }
          if (status === 'success') {
            if (s.success) {
              s.success.call(s.context, data, 'success', xhr);
            }
            deferred.resolve(xhr.responseText, 'success', xhr);
            if (g) {
              $.event.trigger("ajaxSuccess", [xhr, s]);
            }
          } else if (status) {
            if (errMsg === undefined) {
              errMsg = xhr.statusText;
            }
            if (s.error) {
              s.error.call(s.context, xhr, status, errMsg);
            }
            deferred.reject(xhr, 'error', errMsg);
            if (g) {
              $.event.trigger("ajaxError", [xhr, s, errMsg]);
            }
          }
          if (g) {
            $.event.trigger("ajaxComplete", [xhr, s]);
          }
          if (g && !--$.active) {
            $.event.trigger("ajaxStop");
          }
          if (s.complete) {
            s.complete.call(s.context, xhr, status);
          }
          callbackProcessed = true;
          if (s.timeout) {
            clearTimeout(timeoutHandle);
          }
          setTimeout(function() {
            if (!s.iframeTarget) {
              $io.remove();
            } else {
              $io.attr('src', s.iframeSrc);
            }
            xhr.responseXML = null;
          }, 100);
        }
        var toXml = $.parseXML || function(s, doc) {
          if (window.ActiveXObject) {
            doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.async = 'false';
            doc.loadXML(s);
          } else {
            doc = (new DOMParser()).parseFromString(s, 'text/xml');
          }
          return (doc && doc.documentElement && doc.documentElement.nodeName != 'parsererror') ? doc : null;
        };
        var parseJSON = $.parseJSON || function(s) {
          return window['eval']('(' + s + ')');
        };
        var httpData = function(xhr, type, s) {
          var ct = xhr.getResponseHeader('content-type') || '',
            xml = type === 'xml' || !type && ct.indexOf('xml') >= 0,
            data = xml ? xhr.responseXML : xhr.responseText;
          if (xml && data.documentElement.nodeName === 'parsererror') {
            if ($.error) {
              $.error('parsererror');
            }
          }
          if (s && s.dataFilter) {
            data = s.dataFilter(data, type);
          }
          if (typeof data === 'string') {
            if (type === 'json' || !type && ct.indexOf('json') >= 0) {
              data = parseJSON(data);
            } else if (type === "script" || !type && ct.indexOf("javascript") >= 0) {
              $.globalEval(data);
            }
          }
          return data;
        };
        return deferred;
      }
    };
    $.fn.ajaxForm = function(options) {
      options = options || {};
      options.delegation = options.delegation && $.isFunction($.fn.on);
      if (!options.delegation && this.length === 0) {
        var o = {
          s: this.selector,
          c: this.context
        };
        if (!$.isReady && o.s) {
          log('DOM not ready, queuing ajaxForm');
          $(function() {
            $(o.s, o.c).ajaxForm(options);
          });
          return this;
        }
        log('terminating; zero elements found by selector' + ($.isReady ? '' : ' (DOM not ready)'));
        return this;
      }
      if (options.delegation) {
        $(document).off('submit.form-plugin', this.selector, doAjaxSubmit).off('click.form-plugin', this.selector, captureSubmittingElement).on('submit.form-plugin', this.selector, options, doAjaxSubmit).on('click.form-plugin', this.selector, options, captureSubmittingElement);
        return this;
      }
      return this.ajaxFormUnbind().bind('submit.form-plugin', options, doAjaxSubmit).bind('click.form-plugin', options, captureSubmittingElement);
    };

    function doAjaxSubmit(e) {
      var options = e.data;
      if (!e.isDefaultPrevented()) {
        e.preventDefault();
        $(e.target).ajaxSubmit(options);
      }
    }

    function captureSubmittingElement(e) {
      var target = e.target;
      var $el = $(target);
      if (!($el.is("[type=submit],[type=image]"))) {
        var t = $el.closest('[type=submit]');
        if (t.length === 0) {
          return;
        }
        target = t[0];
      }
      var form = this;
      form.clk = target;
      if (target.type == 'image') {
        if (e.offsetX !== undefined) {
          form.clk_x = e.offsetX;
          form.clk_y = e.offsetY;
        } else if (typeof $.fn.offset == 'function') {
          var offset = $el.offset();
          form.clk_x = e.pageX - offset.left;
          form.clk_y = e.pageY - offset.top;
        } else {
          form.clk_x = e.pageX - target.offsetLeft;
          form.clk_y = e.pageY - target.offsetTop;
        }
      }
      setTimeout(function() {
        form.clk = form.clk_x = form.clk_y = null;
      }, 100);
    }
    $.fn.ajaxFormUnbind = function() {
      return this.unbind('submit.form-plugin click.form-plugin');
    };
    $.fn.formToArray = function(semantic, elements) {
      var a = [];
      if (this.length === 0) {
        return a;
      }
      var form = this[0];
      var formId = this.attr('id');
      var els = semantic ? form.getElementsByTagName('*') : form.elements;
      var els2;
      if (els && !/MSIE [678]/.test(navigator.userAgent)) {
        els = $(els).get();
      }
      if (formId) {
        els2 = $(':input[form="' + formId + '"]').get();
        if (els2.length) {
          els = (els || []).concat(els2);
        }
      }
      if (!els || !els.length) {
        return a;
      }
      var i, j, n, v, el, max, jmax;
      for (i = 0, max = els.length; i < max; i++) {
        el = els[i];
        n = el.name;
        if (!n || el.disabled) {
          continue;
        }
        if (semantic && form.clk && el.type == "image") {
          if (form.clk == el) {
            a.push({
              name: n,
              value: $(el).val(),
              type: el.type
            });
            a.push({
              name: n + '.x',
              value: form.clk_x
            }, {
              name: n + '.y',
              value: form.clk_y
            });
          }
          continue;
        }
        v = $.fieldValue(el, true);
        if (v && v.constructor == Array) {
          if (elements) {
            elements.push(el);
          }
          for (j = 0, jmax = v.length; j < jmax; j++) {
            a.push({
              name: n,
              value: v[j]
            });
          }
        } else if (feature.fileapi && el.type == 'file') {
          if (elements) {
            elements.push(el);
          }
          var files = el.files;
          if (files.length) {
            for (j = 0; j < files.length; j++) {
              a.push({
                name: n,
                value: files[j],
                type: el.type
              });
            }
          } else {
            a.push({
              name: n,
              value: '',
              type: el.type
            });
          }
        } else if (v !== null && typeof v != 'undefined') {
          if (elements) {
            elements.push(el);
          }
          a.push({
            name: n,
            value: v,
            type: el.type,
            required: el.required
          });
        }
      }
      if (!semantic && form.clk) {
        var $input = $(form.clk),
          input = $input[0];
        n = input.name;
        if (n && !input.disabled && input.type == 'image') {
          a.push({
            name: n,
            value: $input.val()
          });
          a.push({
            name: n + '.x',
            value: form.clk_x
          }, {
            name: n + '.y',
            value: form.clk_y
          });
        }
      }
      return a;
    };
    $.fn.formSerialize = function(semantic) {
      return $.param(this.formToArray(semantic));
    };
    $.fn.fieldSerialize = function(successful) {
      var a = [];
      this.each(function() {
        var n = this.name;
        if (!n) {
          return;
        }
        var v = $.fieldValue(this, successful);
        if (v && v.constructor == Array) {
          for (var i = 0, max = v.length; i < max; i++) {
            a.push({
              name: n,
              value: v[i]
            });
          }
        } else if (v !== null && typeof v != 'undefined') {
          a.push({
            name: this.name,
            value: v
          });
        }
      });
      return $.param(a);
    };
    $.fn.fieldValue = function(successful) {
      for (var val = [], i = 0, max = this.length; i < max; i++) {
        var el = this[i];
        var v = $.fieldValue(el, successful);
        if (v === null || typeof v == 'undefined' || (v.constructor == Array && !v.length)) {
          continue;
        }
        if (v.constructor == Array) {
          $.merge(val, v);
        } else {
          val.push(v);
        }
      }
      return val;
    };
    $.fieldValue = function(el, successful) {
      var n = el.name,
        t = el.type,
        tag = el.tagName.toLowerCase();
      if (successful === undefined) {
        successful = true;
      }
      if (successful && (!n || el.disabled || t == 'reset' || t == 'button' || (t == 'checkbox' || t == 'radio') && !el.checked || (t == 'submit' || t == 'image') && el.form && el.form.clk != el || tag == 'select' && el.selectedIndex == -1)) {
        return null;
      }
      if (tag == 'select') {
        var index = el.selectedIndex;
        if (index < 0) {
          return null;
        }
        var a = [],
          ops = el.options;
        var one = (t == 'select-one');
        var max = (one ? index + 1 : ops.length);
        for (var i = (one ? index : 0); i < max; i++) {
          var op = ops[i];
          if (op.selected) {
            var v = op.value;
            if (!v) {
              v = (op.attributes && op.attributes.value && !(op.attributes.value.specified)) ? op.text : op.value;
            }
            if (one) {
              return v;
            }
            a.push(v);
          }
        }
        return a;
      }
      return $(el).val();
    };
    $.fn.clearForm = function(includeHidden) {
      return this.each(function() {
        $('input,select,textarea', this).clearFields(includeHidden);
      });
    };
    $.fn.clearFields = $.fn.clearInputs = function(includeHidden) {
      var re = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;
      return this.each(function() {
        var t = this.type,
          tag = this.tagName.toLowerCase();
        if (re.test(t) || tag == 'textarea') {
          this.value = '';
        } else if (t == 'checkbox' || t == 'radio') {
          this.checked = false;
        } else if (tag == 'select') {
          this.selectedIndex = -1;
        } else if (t == "file") {
          if (/MSIE/.test(navigator.userAgent)) {
            $(this).replaceWith($(this).clone(true));
          } else {
            $(this).val('');
          }
        } else if (includeHidden) {
          if ((includeHidden === true && /hidden/.test(t)) || (typeof includeHidden == 'string' && $(this).is(includeHidden))) {
            this.value = '';
          }
        }
      });
    };
    $.fn.resetForm = function() {
      return this.each(function() {
        if (typeof this.reset == 'function' || (typeof this.reset == 'object' && !this.reset.nodeType)) {
          this.reset();
        }
      });
    };
    $.fn.enable = function(b) {
      if (b === undefined) {
        b = true;
      }
      return this.each(function() {
        this.disabled = !b;
      });
    };
    $.fn.selected = function(select) {
      if (select === undefined) {
        select = true;
      }
      return this.each(function() {
        var t = this.type;
        if (t == 'checkbox' || t == 'radio') {
          this.checked = select;
        } else if (this.tagName.toLowerCase() == 'option') {
          var $sel = $(this).parent('select');
          if (select && $sel[0] && $sel[0].type == 'select-one') {
            $sel.find('option').selected(false);
          }
          this.selected = select;
        }
      });
    };
    $.fn.ajaxSubmit.debug = false;

    function log() {
      if (!$.fn.ajaxSubmit.debug) {
        return;
      }
      var msg = '[jquery.form] ' + Array.prototype.join.call(arguments, '');
      if (window.console && window.console.log) {
        window.console.log(msg);
      } else if (window.opera && window.opera.postError) {
        window.opera.postError(msg);
      }
    }
  }));

/** jquery.form */


$(function() {
    if ($.browser.webkit) {
      $("iframe[src='about:blank']").hide();
    }
  })
  /*
      jQuery Masked Input Plugin
      Copyright (c) 2007 - 2015 Josh Bush (digitalbush.com)
      Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
      Version: 1.4.1
  */
  ! function(factory) {
    "function" == typeof define && define.amd ? define(["jquery"], factory) : factory("object" == typeof exports ? require("jquery") : jQuery);
  }(function($) {
    var caretTimeoutId, ua = navigator.userAgent,
      iPhone = /iphone/i.test(ua),
      chrome = /chrome/i.test(ua),
      android = /android/i.test(ua);
    $.mask = {
      definitions: {
        "9": "[0-9]",
        a: "[A-Za-z]",
        "*": "[A-Za-z0-9]"
      },
      autoclear: !0,
      dataName: "rawMaskFn",
      placeholder: "_"
    }, $.fn.extend({
      caret: function(begin, end) {
        var range;
        if (0 !== this.length && !this.is(":hidden")) return "number" == typeof begin ? (end = "number" == typeof end ? end : begin,
          this.each(function() {
            this.setSelectionRange ? this.setSelectionRange(begin, end) : this.createTextRange && (range = this.createTextRange(),
              range.collapse(!0), range.moveEnd("character", end), range.moveStart("character", begin),
              range.select());
          })) : (this[0].setSelectionRange ? (begin = this[0].selectionStart, end = this[0].selectionEnd) : document.selection && document.selection.createRange && (range = document.selection.createRange(),
          begin = 0 - range.duplicate().moveStart("character", -1e5), end = begin + range.text.length), {
          begin: begin,
          end: end
        });
      },
      unmask: function() {
        return this.trigger("unmask");
      },
      mask: function(mask, settings) {
        var input, defs, tests, partialPosition, firstNonMaskPos, lastRequiredNonMaskPos, len, oldVal;
        if (!mask && this.length > 0) {
          input = $(this[0]);
          var fn = input.data($.mask.dataName);
          return fn ? fn() : void 0;
        }
        return settings = $.extend({
            autoclear: $.mask.autoclear,
            placeholder: $.mask.placeholder,
            completed: null
          }, settings), defs = $.mask.definitions, tests = [], partialPosition = len = mask.length,
          firstNonMaskPos = null, $.each(mask.split(""), function(i, c) {
            "?" == c ? (len--, partialPosition = i) : defs[c] ? (tests.push(new RegExp(defs[c])),
              null === firstNonMaskPos && (firstNonMaskPos = tests.length - 1), partialPosition > i && (lastRequiredNonMaskPos = tests.length - 1)) : tests.push(null);
          }), this.trigger("unmask").each(function() {
            function tryFireCompleted() {
              if (settings.completed) {
                for (var i = firstNonMaskPos; lastRequiredNonMaskPos >= i; i++)
                  if (tests[i] && buffer[i] === getPlaceholder(i)) return;
                settings.completed.call(input);
              }
            }

            function getPlaceholder(i) {
              return settings.placeholder.charAt(i < settings.placeholder.length ? i : 0);
            }

            function seekNext(pos) {
              for (; ++pos < len && !tests[pos];);
              return pos;
            }

            function seekPrev(pos) {
              for (; --pos >= 0 && !tests[pos];);
              return pos;
            }

            function shiftL(begin, end) {
              var i, j;
              if (!(0 > begin)) {
                for (i = begin, j = seekNext(end); len > i; i++)
                  if (tests[i]) {
                    if (!(len > j && tests[i].test(buffer[j]))) break;
                    buffer[i] = buffer[j], buffer[j] = getPlaceholder(j), j = seekNext(j);
                  }
                writeBuffer(), input.caret(Math.max(firstNonMaskPos, begin));
              }
            }

            function shiftR(pos) {
              var i, c, j, t;
              for (i = pos, c = getPlaceholder(pos); len > i; i++)
                if (tests[i]) {
                  if (j = seekNext(i), t = buffer[i], buffer[i] = c, !(len > j && tests[j].test(t))) break;
                  c = t;
                }
            }

            function androidInputEvent() {
              var curVal = input.val(),
                pos = input.caret();
              if (oldVal && oldVal.length && oldVal.length > curVal.length) {
                for (checkVal(!0); pos.begin > 0 && !tests[pos.begin - 1];) pos.begin--;
                if (0 === pos.begin)
                  for (; pos.begin < firstNonMaskPos && !tests[pos.begin];) pos.begin++;
                input.caret(pos.begin, pos.begin);
              } else {
                for (checkVal(!0); pos.begin < len && !tests[pos.begin];) pos.begin++;
                input.caret(pos.begin, pos.begin);
              }
              tryFireCompleted();
            }

            function blurEvent() {
              checkVal(), input.val() != focusText && input.change();
            }

            function keydownEvent(e) {
              if (!input.prop("readonly")) {
                var pos, begin, end, k = e.which || e.keyCode;
                oldVal = input.val(), 8 === k || 46 === k || iPhone && 127 === k ? (pos = input.caret(),
                  begin = pos.begin, end = pos.end, end - begin === 0 && (begin = 46 !== k ? seekPrev(begin) : end = seekNext(begin - 1),
                    end = 46 === k ? seekNext(end) : end), clearBuffer(begin, end), shiftL(begin, end - 1),
                  e.preventDefault()) : 13 === k ? blurEvent.call(this, e) : 27 === k && (input.val(focusText),
                  input.caret(0, checkVal()), e.preventDefault());
              }
            }

            function keypressEvent(e) {
              if (!input.prop("readonly")) {
                var p, c, next, k = e.which || e.keyCode,
                  pos = input.caret();
                if (!(e.ctrlKey || e.altKey || e.metaKey || 32 > k) && k && 13 !== k) {
                  if (pos.end - pos.begin !== 0 && (clearBuffer(pos.begin, pos.end), shiftL(pos.begin, pos.end - 1)),
                    p = seekNext(pos.begin - 1), len > p && (c = String.fromCharCode(k), tests[p].test(c))) {
                    if (shiftR(p), buffer[p] = c, writeBuffer(), next = seekNext(p), android) {
                      var proxy = function() {
                        $.proxy($.fn.caret, input, next)();
                      };
                      setTimeout(proxy, 0);
                    } else input.caret(next);
                    pos.begin <= lastRequiredNonMaskPos && tryFireCompleted();
                  }
                  e.preventDefault();
                }
              }
            }

            function clearBuffer(start, end) {
              var i;
              for (i = start; end > i && len > i; i++) tests[i] && (buffer[i] = getPlaceholder(i));
            }

            function writeBuffer() {
              input.val(buffer.join(""));
            }

            function checkVal(allow) {
              var i, c, pos, test = input.val(),
                lastMatch = -1;
              for (i = 0, pos = 0; len > i; i++)
                if (tests[i]) {
                  for (buffer[i] = getPlaceholder(i); pos++ < test.length;)
                    if (c = test.charAt(pos - 1),
                      tests[i].test(c)) {
                      buffer[i] = c, lastMatch = i;
                      break;
                    }
                  if (pos > test.length) {
                    clearBuffer(i + 1, len);
                    break;
                  }
                } else buffer[i] === test.charAt(pos) && pos++, partialPosition > i && (lastMatch = i);
              return allow ? writeBuffer() : partialPosition > lastMatch + 1 ? settings.autoclear || buffer.join("") === defaultBuffer ? (input.val() && input.val(""),
                  clearBuffer(0, len)) : writeBuffer() : (writeBuffer(), input.val(input.val().substring(0, lastMatch + 1))),
                partialPosition ? i : firstNonMaskPos;
            }
            var input = $(this),
              buffer = $.map(mask.split(""), function(c, i) {
                return "?" != c ? defs[c] ? getPlaceholder(i) : c : void 0;
              }),
              defaultBuffer = buffer.join(""),
              focusText = input.val();
            input.data($.mask.dataName, function() {
                return $.map(buffer, function(c, i) {
                  return tests[i] && c != getPlaceholder(i) ? c : null;
                }).join("");
              }), input.one("unmask", function() {
                input.off(".mask").removeData($.mask.dataName);
              }).on("focus.mask", function() {
                if (!input.prop("readonly")) {
                  clearTimeout(caretTimeoutId);
                  var pos;
                  focusText = input.val(), pos = checkVal(), caretTimeoutId = setTimeout(function() {
                    input.get(0) === document.activeElement && (writeBuffer(), pos == mask.replace("?", "").length ? input.caret(0, pos) : input.caret(pos));
                  }, 10);
                }
              }).on("blur.mask", blurEvent).on("keydown.mask", keydownEvent).on("keypress.mask", keypressEvent).on("input.mask paste.mask", function() {
                input.prop("readonly") || setTimeout(function() {
                  var pos = checkVal(!0);
                  input.caret(pos), tryFireCompleted();
                }, 0);
              }), chrome && android && input.off("input.mask").on("input.mask", androidInputEvent),
              checkVal();
          });
      }
    });
  });
$(function() {
  $("#top_phone").mask("+375 (99) 999-99-99");
  $("#bot_phone").mask("+375 (99) 999-99-99");
})

$(document).ready(function() {
  $('button.signup').click(function() {
    $("#schedule .today").hide();
    $("#schedule .apply").show();
  });
  $("header .signup").click(function() {
    $("#schedule .today").hide();
    $("#schedule .apply").show();
    ScrollTO('#form');
    return false;
  });
  $("#descr .text button").click(function() {
    $("#descr .text .hidden").slideToggle();
    $(this).toggleClass("open");
    if ($(this).find("span").text() == "А также")
      $(this).find("span").text('Свернуть');
    else
      $(this).find("span").text('А также');
  });
});

(function($) {

  /*
   *  new_map
   *
   *  This function will render a Google Map onto the selected jQuery element
   *
   *  @type  function
   *  @date  8/11/2013
   *  @since 4.3.0
   *
   *  @param $el (jQuery element)
   *  @return  n/a
   */
  function new_map($el) {
    // var
    var $markers = $el.find('.marker');
    // vars
    var args = {
      zoom: 16,
      center: new google.maps.LatLng(0, 0),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    // create map
    var map = new google.maps.Map($el[0], args);
    // add a markers reference
    map.markers = [];
    // add markers
    $markers.each(function() {
      add_marker($(this), map);
    });
    // center map
    center_map(map);
    // return
    return map;

  }

  /*
   *  add_marker
   *
   *  This function will add a marker to the selected Google Map
   *
   *  @type  function
   *  @date  8/11/2013
   *  @since 4.3.0
   *
   *  @param $marker (jQuery element)
   *  @param map (Google Map object)
   *  @return  n/a
   */

  function add_marker($marker, map) {
    // var
    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
    // create marker
    var marker = new google.maps.Marker({
      position: latlng,
      map: map
    });
    // add to array
    map.markers.push(marker);
    // if marker contains HTML, add it to an infoWindow
    if ($marker.html()) {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content: $marker.html()
      });
      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
      });
    }
  }

  /*
   *  center_map
   *
   *  This function will center the map, showing all markers attached to this map
   *
   *  @type  function
   *  @date  8/11/2013
   *  @since 4.3.0
   *
   *  @param map (Google Map object)
   *  @return  n/a
   */

  function center_map(map) {
    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each(map.markers, function(i, marker) {
      var latlng = new google.maps.LatLng('53.925141', '27.617896');
      bounds.extend(latlng);

    });

    // only 1 marker?
    if (map.markers.length == 1) {
      // set center of map
      map.setCenter(bounds.getCenter());
      map.setZoom(16);
    } else {
      // fit to bounds
      map.fitBounds(bounds);
    }
  }


  /*
   *  document ready
   *
   *  This function will render each map when the document is ready (page has loaded)
   *
   *  @type  function
   *  @date  8/11/2013
   *  @since 5.0.0
   *
   *  @param n/a
   *  @return  n/a
   */
  // global var
  var map = null;
  $(document).ready(function() {
    $('.acf-map').each(function() {
      // create map
      map = new_map($(this));
    });
  });

})(jQuery);
