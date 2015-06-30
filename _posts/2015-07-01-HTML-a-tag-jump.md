---
layout: post
title: HTML的\<a\>标签和跳转
date: 2015-06-30 21:12:35
categories: CompSci
tags: HTML
---

`<a href=""></a>`标签以及页面跳转功能是个是造网页时十分重要的标签, 对于写入各种子链接十分重要. 这里总结一下.

## 锚([Anchor](http://www.w3school.com.cn/tags/tag_a.asp))和超链接 `<a>`

### 属性和方法

- `href`: 定义超链接指向的页面的 URL。也可以页内跳转(利用锚`"#name"`),可以发送邮件. 注意若为文件夹网址,最好在最后加上`/`
- `target`: 规定何处打开超链接文档, `_self`, 本窗口,默认值; `_blank`,新窗口; _parent,  _top; framename;
- `rel`: 规定当前文档与被链接文档之间的关系。
- `hreflang`: 规定被链接文档的语言。
- `name`: 定义锚名称, HTML5不支持
- `rev`: 和rel一样,HTML5不支持
- `shape`: 规定链接的形状(default,rect,circle,poly)。HTML5不支持
- `charset`: 规定被链接文档的字符集。HTML5不支持
- `coords`: 规定链接的坐标。HTML5不支持
- `download`: 规定被下载的超链接目标(其实就是下载后的名字,对于图片等可以自动后缀.真实连接还是在href). HTML5新属性

- 支持全局属性

### [DOM对象](http://www.w3school.com.cn/jsref/dom_obj_anchor.asp)

- `document.getElementById(ID)` 来调用
- `anchors[]`数组访问锚
- `blur()`, a对象方法把焦点从链接上移开
- `focus()`,给连接应用焦点.

## 应用

### 文字或图片提供超链接

- `<a href="/example/html">我是超链接</a>`  文字作为超链接
- `<a href="/example/html"><img src="/eg_buttonnext.gif" /></a>` 图片作为超链接

### 页内跳转

- `<a name="tips">基本的注意事项 - 有用的提示</a>` 命名锚. 不仅仅是`<a>`可以,别的标签也可以.
- `<a href="#tips">有用的提示</a>` 跳转到锚.
- `<a href="http://www.w3school.com.cn/html/html_links.asp#tips">有用的提示</a>` 直接在链接中新页面中跳转到媌
- `<a href="#top">Top</a>` 跳转到顶部(不需定义锚). 找不到已定义的命名锚也会跳转到top.

### 邮件

- `href="mailto:yourmail@microsoft.com?subject=Hello%20again"` subject是题目, `%20`是空格.

### 新窗口打开

`<a href="http://platinhom.github.io/" target="_blank">My Blog!</a>`

<a href="http://platinhom.github.io/" target="_blank">My Blog!</a>



### PHP实现弹出消息框并自动返回
因为PHP无法操作客户端, 只能echo出HTML代码,利用JS来操控DOM.

- 使用JS的`history.back()`来返回,就是一般的返回后退,之前的表单输入会保留.  
`echo "<script>alert('We will go back! The old input will be kept!'); history.back();</script>"`
- 使用JS的`location.href='../index.html'`来返回. 注意这是重新进入页面,并不是真正返回, 输入内容会重置!  
`echo "<script>alert('We will go back by redirection! The old input will lost!');location.href='../index.html';</script>";`

---
