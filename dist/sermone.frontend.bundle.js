!function(){"use strict";var e,n,i={118:function(e){var n;window,(n=jQuery)((function(){n("body").on("click",".sermone--media-nav-container a[data-nav-type=tab]",(function(e){e.preventDefault();var i=n(this).data("nav-key");n(this).parent(".media-item").addClass("__active").siblings().removeClass("__active"),n(".sermone--media-tab-container").find(".__tab-item[data-tab-key=".concat(i,"]")).addClass("__active").siblings().removeClass("__active")}))})),e.exports={}},405:function(e){var n,i,t;window,n=jQuery,i=null,t={},n((function(){(i=n("#sermone-modal")).on({"__open:sermone":function(e,i){n("body").addClass("__sermone-quickview-modal-open")},"__close:sermone":function(e){n("body").removeClass("__sermone-quickview-modal-open")},"__loading:sermone":function(e){1==(arguments.length>1&&void 0!==arguments[1]&&arguments[1])?i.addClass("__is-loading"):i.removeClass("__is-loading")},"__loadContent:sermone":function(e,i,r){t[i]?r.call("",t[i]):n.ajax({type:"POST",url:PHP_DATA.ajax_url,data:{action:"sermone_ajax_quickview_template",post_id:i},success:function(e){r&&r.call("",e),1==e.success&&(t[i]=e)},error:function(e){console.log(e)}})},"__pushContent:sermone":function(e,n){i.find(".sermone-modal-content").html(n)}}),n("body").on("click","[data-sermone-quickview]",(function(e){e.preventDefault();var t=n(this).data("sermone-quickview");i.trigger("__open:sermone"),i.trigger("__loading:sermone",[!0]),i.trigger("__loadContent:sermone",[t,function(e){i.trigger("__loading:sermone",[!1]),i.trigger("__pushContent:sermone",[e.content])}])})),n("body").on("click",(function(e){n(e.target).hasClass("sermone-modal-container")&&i.trigger("__close:sermone")}))})),e.exports={}},870:function(e){var n,i;n=window,(i=jQuery)((function(){i("body").on("click",".sermone--share-container .share-item > a",(function(e){e.preventDefault();var t=i(this).attr("href"),r=i(this).attr("title");n.open(t,r,"width=400,height=350")}))})),e.exports={}},528:function(e,n,i){var t=i(645),r=i.n(t)()((function(e){return e[1]}));r.push([e.id,".sermone-container{margin:0 auto;max-width:calc(100% - 40px)}.sermone-seperate{display:inline-block;width:100%;border-bottom:solid 1px #eee;margin-bottom:15px}.sermone-single .sermone-header{display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;margin-bottom:65px}.sermone-single .sermone-header .sermone-thumb,.sermone-single .sermone-header .sermone-detail{width:47%}@media(max-width: 768px){.sermone-single .sermone-header .sermone-thumb,.sermone-single .sermone-header .sermone-detail{width:100%}}.sermone-single .sermone-header .sermone-thumb{border:solid 1px #eee;border-radius:3px;background:#fff;padding:6px}@media(max-width: 768px){.sermone-single .sermone-header .sermone-thumb{margin-bottom:25px}}.sermone-single .sermone-header .sermone-thumb img{width:100%;border-radius:3px}.sermone-single .sermone-header .sermone-detail .in-scripture,.sermone-single .sermone-header .sermone-detail .in-tax{font-size:14px}.sermone-single .sermone-header .sermone-detail .in-scripture{margin-bottom:6px}.sermone-single .sermone-header .sermone-detail .post-title{margin-top:16px}.sermone-single .sermone-content-summary{width:768px;max-width:100%;margin:0 auto;display:flex;flex-wrap:wrap;justify-content:space-between}.sermone--preacher-list{margin:0;padding:0;display:flex;flex-wrap:wrap;align-items:center;margin-bottom:22px}.sermone--preacher-list li{list-style:none;margin:0;padding:0;transition:.3s ease;-webkit-transition:.3s ease}.sermone--preacher-list li.preacher-item{--preacher-item-size: 56px;width:var(--preacher-item-size)}.sermone--preacher-list li.preacher-item .__avatar{display:block;width:100%;border-radius:var(--preacher-item-size);border:solid 3px #f5f5f5;box-sizing:border-box;line-height:0;background:#fff}.sermone--preacher-list li.preacher-item .__avatar img{width:100%;border-radius:var(--preacher-item-size)}.sermone--preacher-list li.preacher-item+.preacher-item{margin-left:calc( var(--preacher-item-size) / 1.7 * -1 )}.sermone--preacher-list:hover li.preacher-item{margin-left:0;margin-right:5px}.sermone--date-and-share{display:flex;flex-wrap:wrap;justify-content:space-between;font-size:14px}.sermone--date-and-share .date-preached{display:flex;align-items:center;margin-bottom:10px}.sermone--date-and-share .date-preached .__icon{display:inline-block;width:18px;min-width:18px;margin-right:6px}.sermone--date-and-share .date-preached .__icon svg{width:100%}.sermone--share-container{margin-bottom:10px;margin:0;padding:0;display:flex;flex-wrap:wrap}.sermone--share-container li{list-style:none;margin:0}.sermone--share-container li a{display:block;line-height:0}.sermone--share-container li:not(:last-child){margin-right:12px}.sermone--share-container li .__icon{display:inline-block;width:18px}.sermone--share-container li .__icon svg{width:100%}.sermone--media-nav-container{margin:0;padding:0;display:flex;align-items:center;width:100%;margin-bottom:35px;overflow:auto}.sermone--media-nav-container li{list-style:none;margin:0;padding:0;width:calc(100% / 4);min-width:100px}.sermone--media-nav-container li span.__icon{display:block;width:18px}.sermone--media-nav-container li span.__icon svg{width:100%}.sermone--media-nav-container li a{width:100%;border:solid 1px #eee;border-width:1px 0 1px 1px;display:flex;justify-content:space-between;flex-wrap:wrap;font-size:14px;line-height:18px;text-decoration:none;text-align:center;padding:14px;line-height:normal;color:#000;transition:.3s ease;-webkit-transition:.3s ease}@media(max-width: 425px){.sermone--media-nav-container li a{justify-content:center;flex-direction:column-reverse;align-items:center}.sermone--media-nav-container li a>span.__icon{margin-bottom:6px}}.sermone--media-nav-container li a:hover{background:#eee}.sermone--media-nav-container li a.__item-disable{opacity:.8;background:#f5f5f5;color:#8c8c8c;pointer-events:none}.sermone--media-nav-container li a.__item-disable svg{fill:#8c8c8c}.sermone--media-nav-container li:last-child a{border-right-width:1px}.sermone--media-nav-container li.__active>a{color:#fff;background:#000}.sermone--media-nav-container li.__active svg{fill:#fff}.sermone--media-tab-container{width:100%}.sermone--media-tab-container .__tab-item{width:100%;display:none;margin-bottom:35px}.sermone--media-tab-container .__tab-item .sermone--media-content-type{width:100%;display:flex;justify-content:center;flex-wrap:wrap;overflow:hidden;border-radius:3px;position:relative}.sermone--media-tab-container .__tab-item .sermone--media-content-type iframe{position:absolute;left:0;top:0;width:100% !important;height:100% !important}.sermone--media-tab-container .__tab-item.__tab-sermone-video .sermone--media-content-type{padding-bottom:60%}.sermone--media-tab-container .__tab-item.__tab-sermone-audio .sermone--media-content-type{padding-bottom:15%;min-height:150px}.sermone--media-tab-container .__tab-item.__active{display:block}.sermone-archive-style-list .sermone-item-preview{margin-bottom:55px}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner{display:flex;flex-wrap:wrap;justify-content:space-between}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-thumb{width:220px}@media(max-width: 660px){.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-thumb{margin-bottom:20px}}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-thumb a{display:block}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-thumb img{width:100%}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry{display:flex;justify-content:space-between;flex-wrap:wrap;width:calc(100% - 270px)}@media(max-width: 660px){.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry{width:100%}}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-info{width:80%}@media(max-width: 768px){.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-info{width:100%}}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-info .sermone-title{margin-top:0}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-info .in-tax,.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-info .more-info{font-size:14px;margin-bottom:10px}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-actions{width:15%}@media(max-width: 768px){.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-actions{width:100%;display:flex;flex-wrap:wrap}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-actions a{margin-right:15px}}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-actions a{display:flex;align-items:center;justify-content:space-between;border-bottom:solid 1px #000;color:#000;padding:15px 0;text-decoration:none}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-actions a .__icon{display:inline-bock;width:18px;min-width:18px;margin-left:6px}.sermone-archive-style-list .sermone-item-preview .sermone-post-inner .sermone-entry .sermone-actions a .__icon svg{width:100%}.sermone-modal-container{position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(1,1,1,.6);z-index:999;visibility:hidden;opacity:0;overflow:auto;transition:.3s ease;-webkit-transition:.3s ease}.sermone-modal-container .sermone-modal-content{width:700px;max-width:calc(100% - 40px);margin:10vh auto;box-sizing:border-box;background:#fff;opacity:0;transition:.3s ease;-webkit-transition:.3s ease}.sermone-modal-container.__is-loading .sermone-modal-content{visibility:hidden;opacity:0}body.__sermone-quickview-modal-open{overflow:hidden}body.__sermone-quickview-modal-open .sermone-modal-container{visibility:visible;opacity:1}body.__sermone-quickview-modal-open .sermone-modal-container .sermone-modal-content{opacity:1}.sermone-quickview-detail-container .sermone-header{display:flex;flex-wrap:wrap;justify-content:space-between;padding:30px;border-bottom:solid 1px #e2e2e2;background:#fafafa}@media(max-width: 600px){.sermone-quickview-detail-container .sermone-header{padding:15px}}@media(max-width: 600px){.sermone-quickview-detail-container .sermone-header .sermone-thumb{margin-bottom:15px}}.sermone-quickview-detail-container .sermone-header .sermone-thumb img{width:150px}.sermone-quickview-detail-container .sermone-header .sermone-info{width:calc(100% - 180px)}@media(max-width: 600px){.sermone-quickview-detail-container .sermone-header .sermone-info{width:100%}}.sermone-quickview-detail-container .sermone-header .sermone-info .more-info,.sermone-quickview-detail-container .sermone-header .sermone-info .in-tax{font-size:14px;margin-bottom:10px}.sermone-quickview-detail-container .sermone-header .sermone-info .sermone-title{margin:0}.sermone-quickview-detail-container .sermone-content{padding:30px}@media(max-width: 600px){.sermone-quickview-detail-container .sermone-content{padding:15px}}.sermone-quickview-detail-container .sermone--media-tab-container{padding:0 30px}@media(max-width: 600px){.sermone-quickview-detail-container .sermone--media-tab-container{padding:0 15px}}.sermone-quickview-detail-container .sermone--media-tab-container .__tab-item{margin-bottom:0}",""]),n.Z=r},645:function(e){e.exports=function(e){var n=[];return n.toString=function(){return this.map((function(n){var i=e(n);return n[2]?"@media ".concat(n[2]," {").concat(i,"}"):i})).join("")},n.i=function(e,i,t){"string"==typeof e&&(e=[[null,e,""]]);var r={};if(t)for(var o=0;o<this.length;o++){var a=this[o][0];null!=a&&(r[a]=!0)}for(var s=0;s<e.length;s++){var m=[].concat(e[s]);t&&r[m[0]]||(i&&(m[2]?m[2]="".concat(i," and ").concat(m[2]):m[2]=i),n.push(m))}},n}},896:function(e,n,i){i.r(n);var t=i(379),r=i.n(t),o=i(528);r()(o.Z,{insert:"head",singleton:!1}),n.default=o.Z.locals||{}},379:function(e,n,i){var t,r=function(){var e={};return function(n){if(void 0===e[n]){var i=document.querySelector(n);if(window.HTMLIFrameElement&&i instanceof window.HTMLIFrameElement)try{i=i.contentDocument.head}catch(e){i=null}e[n]=i}return e[n]}}(),o=[];function a(e){for(var n=-1,i=0;i<o.length;i++)if(o[i].identifier===e){n=i;break}return n}function s(e,n){for(var i={},t=[],r=0;r<e.length;r++){var s=e[r],m=n.base?s[0]+n.base:s[0],d=i[m]||0,c="".concat(m," ").concat(d);i[m]=d+1;var l=a(c),p={css:s[1],media:s[2],sourceMap:s[3]};-1!==l?(o[l].references++,o[l].updater(p)):o.push({identifier:c,updater:f(p,n),references:1}),t.push(c)}return t}function m(e){var n=document.createElement("style"),t=e.attributes||{};if(void 0===t.nonce){var o=i.nc;o&&(t.nonce=o)}if(Object.keys(t).forEach((function(e){n.setAttribute(e,t[e])})),"function"==typeof e.insert)e.insert(n);else{var a=r(e.insert||"head");if(!a)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");a.appendChild(n)}return n}var d,c=(d=[],function(e,n){return d[e]=n,d.filter(Boolean).join("\n")});function l(e,n,i,t){var r=i?"":t.media?"@media ".concat(t.media," {").concat(t.css,"}"):t.css;if(e.styleSheet)e.styleSheet.cssText=c(n,r);else{var o=document.createTextNode(r),a=e.childNodes;a[n]&&e.removeChild(a[n]),a.length?e.insertBefore(o,a[n]):e.appendChild(o)}}function p(e,n,i){var t=i.css,r=i.media,o=i.sourceMap;if(r?e.setAttribute("media",r):e.removeAttribute("media"),o&&"undefined"!=typeof btoa&&(t+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(o))))," */")),e.styleSheet)e.styleSheet.cssText=t;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(t))}}var h=null,u=0;function f(e,n){var i,t,r;if(n.singleton){var o=u++;i=h||(h=m(n)),t=l.bind(null,i,o,!1),r=l.bind(null,i,o,!0)}else i=m(n),t=p.bind(null,i,n),r=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(i)};return t(e),function(n){if(n){if(n.css===e.css&&n.media===e.media&&n.sourceMap===e.sourceMap)return;t(e=n)}else r()}}e.exports=function(e,n){(n=n||{}).singleton||"boolean"==typeof n.singleton||(n.singleton=(void 0===t&&(t=Boolean(window&&document&&document.all&&!window.atob)),t));var i=s(e=e||[],n);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var t=0;t<i.length;t++){var r=a(i[t]);o[r].references--}for(var m=s(e,n),d=0;d<i.length;d++){var c=a(i[d]);0===o[c].references&&(o[c].updater(),o.splice(c,1))}i=m}}}}},t={};function r(e){if(t[e])return t[e].exports;var n=t[e]={id:e,exports:{}};return i[e](n,n.exports,r),n.exports}r.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(n,{a:n}),n},r.d=function(e,n){for(var i in n)r.o(n,i)&&!r.o(e,i)&&Object.defineProperty(e,i,{enumerable:!0,get:n[i]})},r.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r(896),r(118),r(870),r(405),e=window,(n=jQuery)((function(){})),n(e).on("load",(function(){}))}();