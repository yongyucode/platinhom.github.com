---
layout: post
title: JQuery
date: 2015-07-16 17:20:07
categories: IT
tags: JS
---

Jquery是JS的一个函数库,更为方便地进行HTML元素选取, HTML元素,操作CSS, 操作HTML, DOM 遍历和修改AJAX, 具有常用的事件函数JavaScript, 特效和动画HTML以及有更多Utilities.

## 安装
1. 直接使用google CDN上提供的库([Link](https://developers.google.com/speed/libraries/#jquery))  
`*<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>`  
微软也提供: `<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>`
可以省略掉1.11.3后面的,例如1.11表示最新的1.11.x  
在线版的优势是用户之前可能加载过,所以打开网页就不用再加载了.
2. 直接下载下来放到服务器上  
两个版本,一个版本是常用的 *jquery.min.js* 精简压缩版和 *jquery-1.8.0.js* 测试开发版, 前者密密麻麻的,后者有序比较容易编辑.

## 基本语法

- 选取元素 `$(selector).action()`  
selector就是某种元素,CSS(前6种)和XPath(后几种)选择器的组合.action就是操作元素的函数.常用选择器:
	1. **this** 自身
	2. **"tagname"** 选取所有某种标签
	3. **".classname"** 选取所有类名的元素
	4. **"#idname"** 选取所有指定id的元素
	5. **"tagname#idname"** 选取某种标签下ID为指定的元素
	6. **"tagname.classname"** 选取某种标签下类名为指定的元素
	7. **"ul li:first"** 每个 \<ul\> 的第一个 \<li\> 元素
	7. **"[href]"** 所有带有href属性的元素
	8. **"[href='#']"** 选取所有带有 href 值等于 "#" 的元素。
	9. **"[href!='#']"** 选取所有带有 href 值不等于 "#" 的元素。
	10. **"[href$='.jpg']"** 选取所有 href 值以 ".jpg" 结尾的元素。


## Jquery常用函数
所有JQ的函数都放在 *$(document).ready(function(){...});* 内,防止提前加载函数.

- `hide()` 隐藏元素
- `css("property","value")` 设置css属性
- 

## Reference
1. [Jquery选择器参考手册](http://www.w3school.com.cn/jquery/jquery_ref_selectors.asp)

------
