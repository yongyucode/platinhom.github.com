$wnd.jsme.runAsyncCallback5('function dR(){this.pb=on("file");this.pb[Zc]="gwt-FileUpload"}r(358,339,ji,dR);_.Ad=function(a){sv(this,a)};function eR(a){var b=$doc.createElement(zd);EK(pg,b.tagName);this.pb=b;this.b=new nL(this.pb);this.pb[Zc]="gwt-HTML";mL(this.b,a,!0);vL(this)}r(362,363,ji,eR);function fR(){$x();var a=$doc.createElement("textarea");!cu&&(cu=new bu);!au&&(au=new Mt);this.pb=a;this.pb[Zc]="gwt-TextArea"}r(402,403,ji,fR);\nfunction gR(a,b){var c,d;c=$doc.createElement(Pg);d=$doc.createElement(zg);d[Bc]=a.a.a;d.style[Vg]=a.b.a;var e=(eu(),fu(d));c.appendChild(e);du(a.d,c);Ev(a,b,d)}function kR(){Gw.call(this);this.a=(Jw(),Qw);this.b=(Rw(),Uw);this.e[Vc]=$a;this.e[Uc]=$a}r(411,355,Ah,kR);_.Vd=function(a){var b;b=qn(a.pb);(a=Iv(this,a))&&this.d.removeChild(qn(b));return a};\nfunction lR(a){try{a.w=!1;var b,c,d,e,f;d=a.hb;c=a.ab;d||(a.pb.style[Wg]=re,a.ab=!1,a.ge());b=a.pb;b.style[Ce]=0+(lp(),If);b.style[Hg]=ab;e=An()-kn(a.pb,wf)>>1;f=zn()-kn(a.pb,vf)>>1;WM(a,dj(Bn($doc)+e,0),dj(Cn($doc)+f,0));d||((a.ab=c)?(Ox(a.pb,Vf),a.pb.style[Wg]=Xg,Ai(a.gb,200)):a.pb.style[Wg]=Xg)}finally{a.w=!0}}function mR(a){a.i=(new iM(a.j)).tc.Xe();ov(a.i,new nR(a),(qq(),qq(),rq));a.d=F(my,q,41,[a.i])}\nfunction oR(){qN();var a,b,c,d,e;NN.call(this,(eO(),fO),null,!0);this.Vg();this.db=!0;a=new eR(this.k);this.f=new fR;this.f.pb.style[Zg]=cb;av(this.f,cb);this.Tg();hN(this,"400px");e=new kR;e.pb.style[qe]=cb;e.e[Vc]=10;c=(Jw(),Kw);e.a=c;gR(e,a);gR(e,this.f);this.e=new Yw;this.e.e[Vc]=20;for(b=this.d,c=0,d=b.length;c<d;++c)a=b[c],Vw(this.e,a);gR(e,this.e);vN(this,e);rM(this,!1);this.Ug()}r(671,672,HI,oR);_.Tg=function(){mR(this)};\n_.Ug=function(){var a=this.f;a.pb.readOnly=!0;var b=ev(a.pb)+"-readonly";$u(a.Id(),b,!0)};_.Vg=function(){qM(this.I.b,"Copy")};_.d=null;_.e=null;_.f=null;_.i=null;_.j="Close";_.k="Press Ctrl-C (Command-C on Mac) or right click (Option-click on Mac) on the selected text to copy it, then paste into another program.";function nR(a){this.a=a}r(674,1,{},nR);_.gd=function(){xN(this.a,!1)};_.a=null;function pR(a){this.a=a}r(675,1,{},pR);\n_.Kc=function(){jv(this.a.f.pb,!0);this.a.f.pb.focus();var a=this.a.f,b;b=ln(a.pb,Ug).length;if(0<b&&a.kb){if(0>b)throw new bG("Length must be a positive integer. Length: "+b);if(b>ln(a.pb,Ug).length)throw new bG("From Index: 0  To Index: "+b+"  Text Length: "+ln(a.pb,Ug).length);try{a.pb.setSelectionRange(0,0+b)}catch(c){}}};_.a=null;function qR(a){mR(a);a.a=(new iM(a.b)).tc.Xe();ov(a.a,new rR(a),(qq(),qq(),rq));a.d=F(my,q,41,[a.a,a.i])}\nfunction sR(a){a.j="Cancel";a.k="Paste the text to import into the text area below.";a.b="Accept";qM(a.I.b,"Paste")}function tR(a){qN();oR.call(this);this.c=a}r(677,671,HI,tR);_.Tg=function(){qR(this)};_.Ug=function(){av(this.f,"150px")};_.Vg=function(){sR(this)};_.ge=function(){MN(this);Vm((Sm(),Tm),new uR(this))};_.a=null;_.b=null;_.c=null;function vR(a){qN();tR.call(this,a)}r(676,677,HI,vR);_.Tg=function(){var a;qR(this);a=new dR;ov(a,new wR(this),(YJ(),YJ(),ZJ));this.d=F(my,q,41,[this.a,a,this.i])};\n_.Ug=function(){av(this.f,"150px");IB(new xR(this),this.f)};_.Vg=function(){sR(this);this.k+=" Or drag and drop a file on it."};function wR(a){this.a=a}r(678,1,{},wR);_.fd=function(a){var b,c;b=new FileReader;a=(c=a.a.target,c.files[0]);yR(b,new zR(this));b.readAsText(a)};_.a=null;function zR(a){this.a=a}r(679,1,{},zR);_.gf=function(a){bB();Zx(this.a.a.f,a)};_.a=null;function xR(a){this.a=a;this.b=new AR(this);this.c=this.d=1}r(680,510,{},xR);_.a=null;function AR(a){this.a=a}r(681,1,{},AR);\n_.gf=function(a){this.a.a.f.pb[Ug]=null!=a?a:l};_.a=null;function rR(a){this.a=a}r(685,1,{},rR);_.gd=function(){if(this.a.c){var a=this.a.c,b;b=new ZA(a.a,0,ln(this.a.f.pb,Ug));PB(a.a.a,b.a)}xN(this.a,!1)};_.a=null;function uR(a){this.a=a}r(686,1,{},uR);_.Kc=function(){jv(this.a.f.pb,!0);this.a.f.pb.focus()};_.a=null;r(687,1,Th);_.Zc=function(){var a,b;a=new BR(this.a);void 0!=$wnd.FileReader?b=new vR(a):b=new tR(a);jN(b);lR(b)};function BR(a){this.a=a}r(688,1,{},BR);_.a=null;r(689,1,Th);\n_.Zc=function(){var a;a=new oR;var b=this.a,c;Zx(a.f,b);b=(c=gG(b,"\\r\\n|\\r|\\n|\\n\\r"),c.length);av(a.f,20*(10>b?b:10)+If);Vm((Sm(),Tm),new pR(a));jN(a);lR(a)};function yR(a,b){a.onload=function(a){b.gf(a.target.result)}}V(671);V(677);V(676);V(688);V(674);V(675);V(685);V(686);V(678);V(679);V(680);V(681);V(362);V(411);V(402);V(358);x(GI)(5);\n//@ sourceURL=5.js\n')