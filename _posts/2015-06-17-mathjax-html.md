---
layout: post
title: 网页中使用Mathjax输入数学公式
date: 2015-06-16 18:16:21
categories: MathStat
tags: 数学 网页
---
MathJax是浏览器使用的JS库用于显示和解析数学公式符号,可用于对Latex,MathML等进行解析. 现在由AMS(American Mathematical Society)维护.很多网页如arXiv, Elsevier, Wiki等均使用MathJax进行解析.

### 安装

- 使用 MathJax Content Delivery Network服务  
直接在head部分加入以下一段代码,就可以利用网络的JS进行解释. 优点是会跟踪伺服器上的更新,使用预设定值进行解析.一般情况足够了.

~~~ html
<script type="text/javascript"
  src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
~~~

- 自行安装
就是将其放置在自己的服务器上,先下载[函数库](http://www.mathjax.org/download/),一个压缩文件,解压后将文件夹放到自己的服务器上,将JS调用时地址进行相应更改为如`/MathJax/MathJax.js`即可.

- 页面查看
可以在式子上右键点出菜单.在`Show Math As`中可以选择查看latex格式.在`Math Settings`中`Math Renderer`采用HTML-CSS格式显示.
在输入`><`时注意前后留空格,避免判断为html标签.

### 配置
默认情况下, 加入 MathJax 的网页会载入 `config/TeX-AMS-MML_HTMLorMML.js`,这个JS会载入最常用的模组,有已经预先设定好的状态.  
可以使用`config/default.js`预设值,也可以进行修改,详情参见[Common Configurations](http://docs.mathjax.org/en/latest/config-files.html#common-configurations) 和 [Configuration Options](http://docs.mathjax.org/en/latest/options/index.html#configuration).

一般在Latex中常用的`$...$`inline方式显示在mathjax中不支持.如想支持,需要更改代码为:

~~~ html
<script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
});
</script>
<script type="text/javascript" src="path-to-mathjax/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script
~~~

### 网页中加入数学式子


我这里要用`$$\alg ........\ealg$$`来插入
测试:  

$$ A &=(l_1^2, l_2^2, l_3^3, l_2l_3, l_1l_3, l_1l_2) \\ {1\over E} &=\sum(SA^TA) $$

## Reference:

- [MathJax主页](https://www.mathjax.org/)
- [MathJax Wiki](https://en.wikipedia.org/wiki/MathJax)
- [MathJax-Github](https://github.com/mathjax/MathJax)
- [博客:使用 MathJax 把 LaTeX 或 MathML 數學式子放進網頁](http://blogger.gtwang.org/2013/06/mathjax-latex-mathml.html)

---
