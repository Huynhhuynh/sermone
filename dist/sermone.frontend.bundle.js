!function(){"use strict";var e={528:function(e,r,n){var t=n(645),i=n.n(t)()((function(e){return e[1]}));i.push([e.id,".sermone-container{margin:0 auto;max-width:calc(100% - 40px)}.sermone-seperate{display:inline-block;width:100%;border-bottom:solid 1px #eee;margin-bottom:15px}.sermone-single .sermone-header{display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;margin-bottom:65px}.sermone-single .sermone-header .sermone-thumb,.sermone-single .sermone-header .sermone-detail{width:47%}.sermone-single .sermone-header .sermone-thumb{border:solid 1px #eee;border-radius:3px;background:#fff;padding:6px}.sermone-single .sermone-header .sermone-thumb img{width:100%;border-radius:3px}.sermone-single .sermone-header .sermone-detail .in-scripture,.sermone-single .sermone-header .sermone-detail .in-tax{font-size:14px}.sermone-single .sermone-header .sermone-detail .in-scripture{margin-bottom:6px}.sermone-single .sermone-header .sermone-detail .post-title{margin-top:16px}.sermone-single .sermone-content-summary{width:768px;max-width:100%;margin:0 auto;display:flex;flex-wrap:wrap;justify-content:space-between}.sermone--preacher-list{margin:0;padding:0;display:flex;flex-wrap:wrap;align-items:center;margin-bottom:22px}.sermone--preacher-list li{list-style:none;margin:0;padding:0;transition:.3s ease;-webkit-transition:.3s ease}.sermone--preacher-list li.preacher-item{--preacher-item-size: 56px;width:var(--preacher-item-size)}.sermone--preacher-list li.preacher-item .__avatar{display:block;width:100%;border-radius:var(--preacher-item-size);border:solid 3px #f5f5f5;box-sizing:border-box;line-height:0;background:#fff}.sermone--preacher-list li.preacher-item .__avatar img{width:100%;border-radius:var(--preacher-item-size)}.sermone--preacher-list li.preacher-item+.preacher-item{margin-left:calc( var(--preacher-item-size) / 1.7 * -1 )}.sermone--preacher-list:hover li.preacher-item{margin-left:0;margin-right:5px}.sermone--date-and-share{display:flex;flex-wrap:wrap;justify-content:space-between;font-size:14px}.sermone--date-and-share .date-preached{display:flex;align-items:center}.sermone--date-and-share .date-preached .__icon{display:inline-block;width:18px;min-width:18px;margin-right:6px}.sermone--date-and-share .date-preached .__icon svg{width:100%}.sermone--share-container{margin:0;padding:0;display:flex;flex-wrap:wrap}.sermone--share-container li{list-style:none;margin:0}.sermone--share-container li a{display:block;line-height:0}.sermone--share-container li:not(:last-child){margin-right:12px}.sermone--share-container li .__icon{display:inline-block;width:18px}.sermone--share-container li .__icon svg{width:100%}",""]),r.Z=i},645:function(e){e.exports=function(e){var r=[];return r.toString=function(){return this.map((function(r){var n=e(r);return r[2]?"@media ".concat(r[2]," {").concat(n,"}"):n})).join("")},r.i=function(e,n,t){"string"==typeof e&&(e=[[null,e,""]]);var i={};if(t)for(var a=0;a<this.length;a++){var o=this[a][0];null!=o&&(i[o]=!0)}for(var s=0;s<e.length;s++){var l=[].concat(e[s]);t&&i[l[0]]||(n&&(l[2]?l[2]="".concat(n," and ").concat(l[2]):l[2]=n),r.push(l))}},r}},896:function(e,r,n){n.r(r);var t=n(379),i=n.n(t),a=n(528);i()(a.Z,{insert:"head",singleton:!1}),r.default=a.Z.locals||{}},379:function(e,r,n){var t,i=function(){var e={};return function(r){if(void 0===e[r]){var n=document.querySelector(r);if(window.HTMLIFrameElement&&n instanceof window.HTMLIFrameElement)try{n=n.contentDocument.head}catch(e){n=null}e[r]=n}return e[r]}}(),a=[];function o(e){for(var r=-1,n=0;n<a.length;n++)if(a[n].identifier===e){r=n;break}return r}function s(e,r){for(var n={},t=[],i=0;i<e.length;i++){var s=e[i],l=r.base?s[0]+r.base:s[0],c=n[l]||0,d="".concat(l," ").concat(c);n[l]=c+1;var m=o(d),p={css:s[1],media:s[2],sourceMap:s[3]};-1!==m?(a[m].references++,a[m].updater(p)):a.push({identifier:d,updater:h(p,r),references:1}),t.push(d)}return t}function l(e){var r=document.createElement("style"),t=e.attributes||{};if(void 0===t.nonce){var a=n.nc;a&&(t.nonce=a)}if(Object.keys(t).forEach((function(e){r.setAttribute(e,t[e])})),"function"==typeof e.insert)e.insert(r);else{var o=i(e.insert||"head");if(!o)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");o.appendChild(r)}return r}var c,d=(c=[],function(e,r){return c[e]=r,c.filter(Boolean).join("\n")});function m(e,r,n,t){var i=n?"":t.media?"@media ".concat(t.media," {").concat(t.css,"}"):t.css;if(e.styleSheet)e.styleSheet.cssText=d(r,i);else{var a=document.createTextNode(i),o=e.childNodes;o[r]&&e.removeChild(o[r]),o.length?e.insertBefore(a,o[r]):e.appendChild(a)}}function p(e,r,n){var t=n.css,i=n.media,a=n.sourceMap;if(i?e.setAttribute("media",i):e.removeAttribute("media"),a&&"undefined"!=typeof btoa&&(t+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(a))))," */")),e.styleSheet)e.styleSheet.cssText=t;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(t))}}var u=null,f=0;function h(e,r){var n,t,i;if(r.singleton){var a=f++;n=u||(u=l(r)),t=m.bind(null,n,a,!1),i=m.bind(null,n,a,!0)}else n=l(r),t=p.bind(null,n,r),i=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(n)};return t(e),function(r){if(r){if(r.css===e.css&&r.media===e.media&&r.sourceMap===e.sourceMap)return;t(e=r)}else i()}}e.exports=function(e,r){(r=r||{}).singleton||"boolean"==typeof r.singleton||(r.singleton=(void 0===t&&(t=Boolean(window&&document&&document.all&&!window.atob)),t));var n=s(e=e||[],r);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var t=0;t<n.length;t++){var i=o(n[t]);a[i].references--}for(var l=s(e,r),c=0;c<n.length;c++){var d=o(n[c]);0===a[d].references&&(a[d].updater(),a.splice(d,1))}n=l}}}}},r={};function n(t){if(r[t])return r[t].exports;var i=r[t]={id:t,exports:{}};return e[t](i,i.exports,n),i.exports}n.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(r,{a:r}),r},n.d=function(e,r){for(var t in r)n.o(r,t)&&!n.o(e,t)&&Object.defineProperty(e,t,{enumerable:!0,get:r[t]})},n.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n(896)}();