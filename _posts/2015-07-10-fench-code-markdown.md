---
layout: post
title: Markdown中的代码块
date: 2015-07-09 18:27:52
categories: CompSci
tags: Editor Git
---

Fenced code block in markdown
-----

Markdown应该不陌生了,代码块不就是简单的`~~~ ~~~`或```` ```  ``` ````嘛...其实我也很希望就那么简单...

- 1\. 行内代码块`` `..` ``  
这个应该比较简单就是很简单的在行内用两个斜点.例如:  
这里是行内代码`print "hello world"`.  
也可以使用HTML代码`<code></code>`来实现,例如:  
这也是行内代码块<code>print "```...```"</code>.  
这是行内代码块中的代码块<code>print "`...`"</code>. (kramdown不支持嘛,github有显示).  

~~~markdown
这里是行内代码`print "hello world"`.
这也是行内代码块<code>print "```...```"</code>
这是行内代码块中的代码块<code>print "`...`"</code>. 
~~~

- 2\. 标准代码块  
标准代码块表示使用空格/tab来开头的块状代码块,而不是```` ``` ~~~ ````.

~~~
~~~
	Here are some code with tab at start.  

    Here are some code with 4 blank.
    
~~~
~~~

------
