
## The file here means:

### default.html: A basic template for all.

### page.html: A template when create a main page for blog
### page.html: Similar to page.html, `p,ol,ul,li` with small font.

### post.html: A template for posting blogs, with basic loading.
### post_mathjax.html: Posting blogs with mathjax loading.
### post_small.html: Posting blogs with mathjax loading and small font for `p,ol,ul,li`.
### posttoc.html: 
### post_full.html: A template contains full things.

### slide.html: I don't know..


## Note:

- Cancel ChemDoodleWeb in post.html and so on, only in posttoc.html.

~~~~ markup
<script src="/jscss/ChemDoodleWeb.js"></script>
~~~~

- Cancel Mathjax in many templates.

~~~~ markup
<script src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script type="text/x-mathjax-config">
MathJax.Hub.Config({tex2jax:{processEscapes: true, inlineMath: [ ['$','$'], ["\\(","\\)"] ], skipTags: ['script', 'noscript', 'style', 'textarea', 'pre', 'code']}});
MathJax.Hub.Config({TeX:{extensions: ["cancel.js", "enclose.js"],
Macros:{a:"\\alpha",b:"\\beta",c:"\\chi",d:"\\delta",e:"\\epsilon",f:"\\phi",g:"\\gamma",h:"\\eta",i:"\\iota",j:"\\varphi",k:"\\kappa",l:"\\lambda",m:"\\mu",n:"\\nu",o:"\\omicron",p:"\\pi",q:"\\theta",r:"\\rho",s:"\\sigma",t:"\\tau",u:"\\upsilon",v:"\\varpi",w:"\\omega",x:"\\xi",y:"\\psi",z:"\\zeta",D:"\\Delta",F:"\\Phi",G:"\\Gamma",J:"\\vartheta",L:"\\Lambda",P:"\\Pi",Q:"\\Theta",S:"\\Sigma",U:"\\Upsilon",V:"\\varsigma",W:"\\Omega",X:"\\Xi",Y:"\\Psi",ve:"\\varepsilon",vk:"\\varkappa",vq:"\\vartheta",vp:"\\varpi",vr:"\\varrho",vs:"\\varsigma",vf:"\\varphi",alg:"\\begin{align}", ealg:"\\end{align}",bmat:"\\begin{bmatrix}", Bmat:"\\begin{Bmatrix}", pmat:"\\begin{pmatrix}", Pmat:"\\begin{Pmatrix}", vmat:"\\begin{vmatrix}", Vmat:"\\begin{Vmatrix}",ebmat:"\\end{bmatrix}", eBmat:"\\end{Bmatrix}",  epmat:"\\end{pmatrix}",  ePmat:"\\end{Pmatrix}",  evmat:"\\end{vmatrix}",  eVmat:"\\end{Vmatrix}",AA:"\\unicode{x212B}", Sum:"\\sum\\limits", abs:['\\lvert #1\\rvert',1], rmd:['\\mathop{\\mathrm{d}#1}',1],bi:['\\boldsymbol{#1}', 1], obar:['0\\!\\!\\!\\raise{.05em}{-}'],opar:['\\frac{\\partial #1}{\\partial #2}', 2], oppar:['\\frac{\\partial^2 #1}{\\partial #2^2}', 2]}}});
MathJax.Hub.Queue(function(){
var all=MathJax.Hub.getAllJax(),i;for(i=0;i<all.length;i+=1){all[i].SourceElement().parentNode.className+=' has-jax';}});
</script>
~~~~