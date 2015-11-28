---
layout: post_small
title: Liquid语言(jekyll所需)
date: 2015-11-28 09:37:35
categories: IT
tags: Software Git
---

<link rel="stylesheet" href="/jcss/css/pygments_monokai.css">

{% raw %}
Liquid语言是一种标记语言, 将模板转化为相应的代码从而进行相关的"编译". 被广泛用于多种工具中, 最为著名就是Github的Jekyll静态网页生成系统. Liquid使用Ruby编写而成.

Liquid语言有两大类标记: 一种是结果型(Output), 一种是语句型, 前者进行输出为text, 后者主要进行语句相关操作,如if, for等.  

Output型使用{{ output }} 进行, 而Tag型则采用 {% tag %}. 

## Output型

一种**直接输出**, 例如变量. {{ var }}  
一种是**过滤器**, 采用: {{ var | filter1 |filter2 }}形式, filter相当于一个处理函数, 对变量进行操作并返回新值. 新值用于下一个过滤器或者用于直接输出为结果. 过滤器可以见下面介绍. jekyll有额外的过滤器参考[模板部分](http://jekyllrb.com/docs/templates/).

## Tag型 

说白了就是一般的语句, 包括If/Unless/Case判断, For/Loop循环等. 写完Tag后一般需要有后续的EndTagname. 如: {% if %} {% endif %}

先说一下, Liquid支持 `and`, `or`, `!=`, `==`, `contains` (包含), `true`, `false`.

### 常用tag包括:

- {% `assign` var=value %} 赋值语句. 没有end.
- {% `capture` var %} context {% endcapture %} 将中间的内容赋值给变量. 因此可以不是简单的值而是获取变量经操作后再赋值.更强大.
- {% `if` condition %}, {% `elsif` condition %}, {% `else` %}, {% `endif` %} 系列. 支持and, or, 不支持not. if not使用 {% `unless` condition %} .. {% `endunless` %}进行. 注意是 **elsif** 而不是elseif.
- {% `case` var %}, {% `when` value %}, {% `else` %}, {% `endcase` %} 系列, 多种条件选择.
- {% `for` var `in` array %}, {% `else` %}, {% `endfor` %} 循环, 后面可以跟一些修饰符 `parameter:value` 进一步控制. else可用于数组为空时的情况. 另外也支持 {% `break` %}和{% `continue` %}打断虚幻.
- {% `cycle` [groupname:] val1, val2, .. %} 循环逐个列出指定内容. 注意没有end. 每调用一次就会列出下个值. groupname是列的时候区分组的, 默认不加列名就是只有一个组.
- {% `comment` %} .. {% `endcomment` %} , Liquid注释(不是HTML注释), 不解释也不显示.
- {% `raw` %} ... {% `endraw` %}, 不作为Liquid解释, 会作为源码显示. 例如本文上边文字部分由该对tag包围. **很重要!**
- {% `include` filename %}, 将另一个文件作为模板片段插入.

新建tag可以使用Ruby进行, 参考最后for programmer的部分.

### 在Jekyll里还包括:

- {% `include_relative` filename %} 以当前文件所在目录来定位文件进行插入. {% include %}的包含则在`_includes`文件夹内.
- {% `highlight` lang linenos %} {% `endhighlight` %} Rouge或Pygments语法高亮. lang对应相应编程语言, 如vb.net(更多参考:[Rouge](http://rouge.jneen.net/)与[支持语言](https://github.com/jneen/rouge/wiki/List-of-supported-languages-and-lexers), [Pygments](http://pygments.org)与[支持语言](http://pygments.org/languages/))linenos是打开行号显示, 非必要.
- {% `post_url` /subdir/2010-07-21-name-of-post %} 可以将_posts里的blog文件名转化为相应url. 注意地址, 注意没有后缀.
- {% `gist` user/gistID filename %} 插入Gist内容. user和gistID对应在Gist的网址里.文件名可用于指定gist中某文件(非必要选项). 需要额外安装[jekyll-gist](https://github.com/jekyll/jekyll-gist)插件, 建议直接使用gist的embed功能.

{% endraw %}

----

if tab实例 (用的highlight的tag, 先包裹raw的tag去liquid解析, 再包含代码):

{% highlight Liquid linenos%}
{% raw s%}
{% if user.name == 'tobi' %}
  Hello tobi
{% elsif user.name == 'bob' %}
  Hello bob
{% endif %}
{% endraw %}
{% endhighlight %}

<script src="https://gist.github.com/platinhom/e96aed93a8fc0f5063cc.js"></script>

## Reference

1. [Liquid-Github](https://github.com/Shopify/liquid), [Github](https://github.com/Shopify/liquid/wiki)
2. [Jekyll-Template](http://jekyllrb.com/docs/templates/), [Jekyll-Plugins](http://jekyllrb.com/docs/plugins/)
3. [shopify中的Liquid介绍](https://docs.shopify.com/themes/liquid-documentation/basics)

------
