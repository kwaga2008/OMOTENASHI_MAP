google.maps.__gjsload__('infowindow', function(_){var kR=function(){this.j=new _.Lw},lR=function(a,b){if(1==a.j.mb()){var c=a.j.Ra()[0];c.l!=b.l&&(c.set("map",null),a.j.remove(c))}a.j.add(b)},mR=function(a,b){var c=this,d=this.j=_.W("div");_.Uw(d,"default");d.style.position="absolute";d.style.left=d.style.top="0";a.floatPane.appendChild(this.j);this.H=_.W("div",this.j);this.D=_.W("div",this.H);this.l=_.W("div",this.D);this.m=_.W("div",this.l);_.FC(this.j);_.im(this.l,"gm-style-iw");_.im(this.H,"gm-style-iw-a");_.im(this.D,"gm-style-iw-t");_.im(this.l,
"gm-style-iw-c");_.im(this.m,"gm-style-iw-d");_.om.m&&(b?this.l.style.paddingLeft=0:this.l.style.paddingRight=0,this.l.style.paddingBottom=0,this.m.style.overflow="scroll");_.Tw(this.j,!1);_.S.addDomListener(d,"mousedown",_.Jd);_.S.addDomListener(d,"mouseup",_.Jd);_.S.addDomListener(d,"mousemove",_.Jd);_.S.addDomListener(d,"pointerdown",_.Jd);_.S.addDomListener(d,"pointerup",_.Jd);_.S.addDomListener(d,"pointermove",_.Jd);_.S.addDomListener(d,"dblclick",_.Jd);_.S.addDomListener(d,"click",_.Jd);_.S.addDomListener(d,
"touchstart",_.Jd);_.S.addDomListener(d,"touchend",_.Jd);_.S.addDomListener(d,"touchmove",_.Jd);_.S.qa(d,"contextmenu",this,this.Cl);_.S.qa(d,"wheel",this,_.Jd);_.S.qa(d,"mousewheel",this,_.Gd);_.S.qa(d,"MozMousePixelScroll",this,_.Gd);_.KC(this.l,function(e){_.Jd(e);_.S.trigger(c,"closeclick");c.set("open",!1)},{zh:new _.Q(14,14),padding:new _.P(8,8),offset:new _.P(-6,-6)});this.A=null;this.F=!1;this.B=new _.hg(function(){!c.F&&c.get("content")&&c.get("visible")&&(_.S.trigger(c,"domready"),c.F=!0)},
0)},oR=function(a){var b=!!a.get("open"),c=b&&a.get("position");_.Tw(a.j,c);c=a.get("content");b=b?c:null;b!=a.A&&(b&&(a.F=!1,a.m.appendChild(c)),a.A&&(c=a.A.parentNode,c==a.m&&c.removeChild(a.A)),a.A=b,nR(a))},pR=function(a){var b=a.get("pixelOffset")||new _.Q(0,0),c=new _.Q(a.l.offsetWidth,a.l.offsetHeight);a=-b.height+c.height+11+60;var d=b.height+60,e=-b.width+c.width/2+60;c=b.width+c.width/2+60;0>b.height&&(d-=b.height);return{top:a,bottom:d,left:e,right:c}},nR=function(a){var b=a.get("layoutPixelBounds");
var c=a.get("maxWidth");var d=a.get("pixelOffset");if(d){if(b){var e=b.aa-b.V;b=b.ba-b.X-(11+-d.height);240<=e&&(e-=120);240<=b&&(b-=120)}else b=e=654;e=Math.min(e,654);null!=c&&(e=Math.min(e,c));e=Math.max(0,e);b=Math.max(0,b);c=new _.Q(e,b)}else c=null;c&&(a.l.style.maxWidth=_.V(c.width),a.l.style.maxHeight=_.V(c.height),_.om.m?(a.m.style.maxWidth=_.V(c.width-18),a.m.style.maxHeight=_.V(c.height-18)):(a.m.style.maxWidth=_.V(c.width-36),a.m.style.maxHeight=_.V(c.height-36)),qR(a),a.B.start())},qR=
function(a){var b=a.get("position");if(b&&a.get("pixelOffset")){var c=pR(a),d=b.x-c.left,e=b.y-c.top,f=b.x+c.right;c=b.y+c.bottom;_.vm(a.H,b);b=a.get("zIndex");_.Am(a.j,_.M(b)?b:e+60);a.set("pixelBounds",_.rd(d,e,f,c))}},rR=function(a){a=a.__gm.get("panes");return new mR(a,_.bs.j)},sR=function(a,b,c){var d=this;this.D=!0;this.da=this.B=this.A=null;var e=b.__gm,f=b instanceof _.re;f&&c?c.then(function(m){d.D&&(d.A=m,d.da=new _.AC(function(q){d.B=new _.Mm(b,m,q,_.n());m.ta(d.B);return d.B}),d.da.bindTo("latLngPosition",
a,"position"),h.bindTo("position",d.da,"pixelPosition"))}):(this.da=new _.AC,this.da.bindTo("latLngPosition",a,"position"),this.da.bindTo("center",e,"projectionCenterQ"),this.da.bindTo("zoom",e),this.da.bindTo("offset",e),this.da.bindTo("projection",b),this.da.bindTo("focus",b,"position"));this.j=f?a.j.get("logAsInternal")?"Ia":"Id":null;this.m=[];var g=new _.mx(["scale"],"visible",function(m){return null==m||.3<=m});this.da&&g.bindTo("scale",this.da);var h=this.F=rR(b);h.set("logAsInternal",!!a.j.get("logAsInternal"));
h.bindTo("zIndex",a);h.bindTo("layoutPixelBounds",e,"pixelBounds");h.bindTo("maxWidth",a);h.bindTo("content",a);h.bindTo("pixelOffset",a);h.bindTo("visible",g);this.da&&h.bindTo("position",this.da,"pixelPosition");this.l=new _.hg(function(){if(b instanceof _.re)if(d.A){var m=a.get("position");m&&_.kr(b,d.A,new _.Cd(m),pR(h))}else c.then(function(){return d.l.start()});else(m=h.get("pixelBounds"))?_.S.trigger(e,"pantobounds",m):d.l.start()},150);if(f){var k=null;this.m.push(_.S.ma(a,"position_changed",
function(){var m=a.get("position");!m||a.get("disableAutoPan")||m.equals(k)||(d.l.start(),k=m)}))}else a.get("disableAutoPan")||this.l.start();h.set("open",!0);this.m.push(_.S.addListener(h,"domready",function(){a.trigger("domready")}));this.m.push(_.S.addListener(h,"closeclick",function(){a.close();a.trigger("closeclick");d.j&&_.Zm(d.j,"-i",d)}));if(this.j){var l=this.j;_.Xm(b,this.j);_.Zm(l,"-p",this);f=function(){var m=a.get("position"),q=b.getBounds();m&&q&&q.contains(m)?_.Zm(l,"-v",d):_.$m(l,
"-v",d)};this.m.push(_.S.addListener(b,"idle",f));f()}},tR=function(a,b,c){return b instanceof _.re?new sR(a,b,c):new sR(a,b)},uR=function(a){a=a.__gm;return a.IW_AUTO_CLOSER=a.IW_AUTO_CLOSER||new kR};_.qj(mR,_.T);_.p=mR.prototype;_.p.open_changed=function(){oR(this)};_.p.content_changed=function(){oR(this)};_.p.dispose=function(){this.j.parentNode.removeChild(this.j);this.B.stop();this.B.dispose()};_.p.pixelOffset_changed=function(){var a=this.get("pixelOffset")||new _.Q(0,0);this.D.style.right=_.V(-a.width);this.D.style.bottom=_.V(-a.height+11);nR(this)};_.p.layoutPixelBounds_changed=function(){nR(this)};
_.p.position_changed=function(){if(this.get("position")){qR(this);var a=!!this.get("open");_.Tw(this.j,a)}else _.Tw(this.j,!1)};_.p.zIndex_changed=function(){qR(this)};_.p.visible_changed=function(){_.Pw(this.j,this.get("visible"));this.B.start()};_.p.Cl=function(a){for(var b=!1,c=this.get("content"),d=a.target;!b&&d;)b=d==c,d=d.parentNode;b?_.Gd(a):_.Id(a)};Object.freeze(new _.P(0,0));sR.prototype.close=function(){if(this.D){this.D=!1;this.j&&(_.$m(this.j,"-p",this),_.$m(this.j,"-v",this));for(var a=_.ua(this.m),b=a.next();!b.done;b=a.next())_.S.removeListener(b.value);this.m.length=0;this.l.stop();this.l.dispose();this.A&&this.B&&this.A.Vc(this.B);a=this.F;a.unbindAll();a.set("open",!1);a.dispose();this.da&&this.da.unbindAll()}};_.Je("infowindow",{pj:function(a){var b=null;(0,_.S.ma)(a,"map_changed",function d(){var e=a.get("map");b&&(b.Lg.j.remove(a),b.Ol.close(),b=null);if(e){var f=e.__gm;f.get("panes")?(b={Ol:tR(a,e,e instanceof _.re?f.j.then(function(g){return g.sa}):void 0),Lg:uR(e)},lR(b.Lg,a)):_.S.addListenerOnce(f,"panes_changed",d)}})}});});
