(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[41],{920:function(e,t,c){"use strict";(function(e){var n=c(0),o=c(4),a=c.n(o),r=c(78),s=c(20),i=c(936),u=c(2),l=c(7),b=c(10),d=c(12),f=c(53),p=c(430),O=c(363);t.a=({checkoutPageId:t,className:c,buttonLabel:o})=>{const m=Object(u.getSetting)("page-"+t,!1),j=Object(l.useSelect)(e=>e(b.CHECKOUT_STORE_KEY).isCalculating()),[k,v]=Object(i.a)(),[h,w]=Object(n.useState)(!1);Object(n.useEffect)(()=>{if("function"!=typeof e.addEventListener||"function"!=typeof e.removeEventListener)return;const t=()=>{w(!1)};return e.addEventListener("pageshow",t),()=>{e.removeEventListener("pageshow",t)}},[]);const E=Object(l.useSelect)(e=>e(b.CART_STORE_KEY).getCartData()),g=Object(d.applyCheckoutFilter)({filterName:"proceedToCheckoutButtonLabel",defaultValue:o||O.a,arg:{cart:E}}),C=Object(d.applyCheckoutFilter)({filterName:"proceedToCheckoutButtonLink",defaultValue:m||s.f,arg:{cart:E}}),{dispatchOnProceedToCheckout:_}=Object(p.b)(),y=Object(n.createElement)(r.a,{className:"wc-block-cart__submit-button",href:C,disabled:j,onClick:e=>{_().then(t=>{t.some(f.b)?e.preventDefault():w(!0)})},showSpinner:h},g),S=Object(n.useMemo)(()=>getComputedStyle(document.body).backgroundColor,[]);return Object(n.createElement)("div",{className:a()("wc-block-cart__submit",c)},k,Object(n.createElement)("div",{className:"wc-block-cart__submit-container"},y),"below"===v&&Object(n.createElement)("div",{className:"wc-block-cart__submit-container wc-block-cart__submit-container--sticky",style:{backgroundColor:S}},y))}}).call(this,c(921))},935:function(e,t,c){"use strict";c.r(t);var n=c(61),o=c(920),a=c(483);t.default=Object(n.withFilteredAttributes)(a.a)(o.a)},936:function(e,t,c){"use strict";c.d(t,"a",(function(){return a}));var n=c(0);const o={bottom:0,left:0,opacity:0,pointerEvents:"none",position:"absolute",right:0,top:0,zIndex:-1},a=()=>{const[e,t]=Object(n.useState)(""),c=Object(n.useRef)(null),a=Object(n.useRef)(new IntersectionObserver(e=>{e[0].isIntersecting?t("visible"):t(e[0].boundingClientRect.top>0?"below":"above")},{threshold:1}));Object(n.useLayoutEffect)(()=>{const e=c.current,t=a.current;return e&&t.observe(e),()=>{t.unobserve(e)}},[]);return[Object(n.createElement)("div",{"aria-hidden":!0,ref:c,style:o}),e]}}}]);