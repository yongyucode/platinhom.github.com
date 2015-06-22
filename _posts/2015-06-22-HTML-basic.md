---
layout: post
title: HTML基础篇
date: 2015-06-21 20:37:29
categories: CompSci
tags: Website IT
---

新手可到[CodeCademy](http://www.codecademy.com/)进行简单的学习, [中文版地址](http://www.codecademy.com/zh).

HTML使用markup语言进行编写.

## 基础要素

### 基础知识
- `<**>` - `</**>` 标签（开始标签和结束标签），定义一系列内容，标签和内容组成一个html的元素。`<></>`两者间为内容，`<>`内可加属性定义, 属性和标签名间加空格，内容`bgcolor="red"`这样，定义值为引号内，可用单引号或双引号。注意元素内的内容的多个连续空格会合并成一个，也会忽略你的换行等书写格式。
- `<** />` self-closing标签，无结束标签。例如`<br />` 不写`/`也行。
- `<! *****>`: 注释内容，新版用`<!--****-->`

### 主要要素：

- `<!DOCTYPE html>` : 标记为html语言，一般在第一行.
- `<html> </html>` : 主体部分,包含了head,body等. 一般如`<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-us"> ... </html>`
- `<head> </head>` : 头信息，不被显示，可以放一些参数样式和js脚本等。主要是方便搜索引擎。
- `<body> </body>` : 主体, 显示的内容.
- `<footer> </footer>`: 页脚,底注.

head元素一般包括title，style，script,meta等

- `<title> </title>` : 网页标题。一般写在head内。基本要素之一.
- `<style> </style>`: 定义样式，和css文件一样写法。参看css文件。
- `<link />`: 定义载入连接文件，例如css：`<link type="text/css" rel="stylesheet" href="stylesheet.css" />`
- `<script> </script>`: 定义脚本,可外链或写在页面上.

### 页面元素：

- `<hr>`: 一条大横分隔线，无结束符。
- `<div> </div>`：分块，
- `<span> </span>`：将整体内容分块处理.
- `<p> </p>` : 段落元素, 其实就是上下空一行隔开内容.常用文字元素. 
- `<h1>`到`<h6>`: 标题元素，从1到6减小字体大小，加粗，上下留空。属性：align="center"
- `<img src=url/>`: 图片，无结束符。使用src属性指定图片，可以是本地或者超链接。
- `<a> </a>`: 锚标签，用来连接到别的地方。href属性指定超链接，邮件可用`"mailto:abc@163.com?subject=Hello%20again"`这样子指定，注意?分隔内容。`<a>显示内容（可以是图片）</a>`； 属性`target="_blank" `将以新链接打开，target定义从什么地方打开连接地址。`name`属性用来定义定义锚的名字，用`"#name"`进行业内跳转，也可以`url#name`来去某节跳转。
- `<li></li>`: 在有序和无序列表中的每一项内容.
- `<ol> </ol>`: 有序列表; 
- `<ul></ul>`: 无序列表，默认起始一个大点。每个项为一行，用`<li></li>`表示该项。li的前符号可用list-style-type定义
- `<table> </table>`:`<tr></tr>`行`<tc></tc>`列，`<td> </td>`数据格，`<thead> </thead>`和`<tbody> </tbody>`像一般的头和body一样，thead内用tr创建行后用`<th></th>`加首行的格内容；注意tbody用align可以全部整体align；`colspan="3"`属性进行单元格合并（适于th，td）；style很多，如padding; border-left/right/bottom/top:1px solid/dashed/dotted black/#123456; table有border-collapse:collapse.


## 格式控制：

### 简单HTML控制

- `<br>`: 换行
- `<pre>`: 预格式化，就是按输入的内容显示，包括输入的多个空格、换行这些元素。一般在css中`pre code`这样去专门定义,更优先.
- `<b>` : 内容被加粗
- `<strong>`: 内容被强调，显示起来和bold一样，可以修改强调的格式。
- `<i>`:italic，斜体
- `<em>`: 强调，显示也是斜体
- `<del>`: 标记被删除（就是文字中间一横）
- `<ins>`: 标记为插入（就是下划线）
- `<big>`/`<small>`: 变大变小
- `<sup>`/`<sub>`:上下标
- `<code>/<kbd>/<tt>/<samp>/<var>`: 一般用来显示计算机输出结果。。见右下图
- `<address>`: 地址的格式，一般为斜体。


- `<abbr title="United Nations">UN</abbr>`: 缩写，鼠标移到UN上时显示缩写
- `<acronym title="World Wide Web">WWW</acronym>`: 首字母缩写, 和abbr差不多。
- `<bdo>`: 文字从右到左。。。
- `<q>`和`<blockquote>`: 小块引用（只加引号）和大块引用（新行，起始空几格）


 
margin控制边缘空白，padding控制和边界的距离，border为边界宽度。margin：auto为左右相等，即居中处理。1 2 3 4表示上右下左顺时针的距离，若只指明一个表示四面一样。也可以专用margin-top/right/bottom/left来指明。同理border和padding。注意padding会使用bgcolor。注意这些px值可以为负值，因为相对位置。






## 属性：

- `id` ：指明特定ID，用于CSS和JS操作.
- `class`：指明属于某类型，用于CSS渲染.
- `style`：放在标签内，格式为`style="name:value; name2:value2"` name例如font-size(10px 无空格，或者用1em，em表示默认字体大小倍数，和硬件无关),color(green,更多， 采用16进制6个数字，可搜hex color picker来辨认)， font-family（Times, Arial,更多 ， 注意首字母大写；css一般支持：serif, sans-serif, cursive草书； 可用,来分隔多个可能字体，因为不一定都支持，会按顺序选择字体，将serif等放最后），background-color, text-align（center，left，right），width,heigh, border（1px dashed black 三者格式，其实对应子属性border-width,border-style, border-color； 另外还有border-radius表示块的角的弯曲度）；对于超链接a还可以有text-decoration:none/underline (修饰为下划线)； margin(auto，居中保持两边一致)； font-weight(bold)
- `display`: block 默认竖排放置block；inline-block：横排放置block；inline：以最小尺寸横放，若为空会叠放一起，适合于`<p><h1>`等；none：不显示。
- `margin/border/padding`
- `float`：放置位置，left/right，会一个挨一个放置，注意这个left/right是相对剩余空间而言。
- `clear`:right/left/both 当有使用float的元素时，使用clear时，若有对应位置的float的元素，则换新行。
- `right/left/top/bottom`相对位置偏移，针对核心部分，受position控制。
- `position`：static(默认)/absolute/relative/fixed/inherit 子元素相对母元素的位置。static是默认的放置，不管left等的变化。absolute是相对非static的上级父元素的left时的位置，若没有则根据html的位置; relative是相对用static时的位置而言；fixed是固定位置，不受滚动条控制。
- `z-index`：叠放时的优先序

## JavaScript
HTML网页支持的脚本语言.基于Java语言开发.用于很多复制操作和调用. 这里不进行讨论了.

- `document.writeln("contex")`将内容写到html页面上.

## CSS：Cascading Style Sheets
选择器 {属性 : 值；.....} 要是定义了id，可以用#id名来定义特点元素。.bold{}可以定义特点格式。css注释和c一致，采用`/*  */`格式。选择器若为某种标签，可根据嵌套环境作选择，例如div div p {...}这样。用`*`可以作通配所有选择器。div > p {....} 强制直接相连，否则div li p {}也会受影响。对应指定ID的可用#IDName来专指；对应使用class来指明类别的，使用 .ClassName来专指。其中，优先级ID>Class>特点环境元素>一般元素>通配`*`  
准类选择器： selector: pseudo-class-selector{...} 准类选择器为一些改变和行为，如hover悬停，link未点击, visited 已点击， first-child 第一个满足的元素，nth-child(n)第N个满足的元素，类似地 last-child. 注意selector:nth-child(n)和selector :nth-child(n)有区别，没有空格的前者是body中第n个的selector，有空格的后者是selector中第n个子元素。

## Reference
1. [html术语表](http://www.codecademy.com/zh/glossary/html)
2. [css术语表](http://www.codecademy.com/zh/glossary/css)
3. [w3school](http://www.w3schools.com/)

---
