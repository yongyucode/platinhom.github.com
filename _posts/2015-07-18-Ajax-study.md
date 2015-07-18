---
layout: post
title: AJAX学校
date: 2015-07-18 06:42:38
categories: IT
tags: JS
---

AJAX就是**异步 JavaScript 和 XML（Asynchronous JavaScript and XML）**. 简短地说，在不重载整个网页的情况下，AJAX 通过后台加载数据，并在网页上进行显示。使用XML进行数据交流, 使得数据可以按需要进行加载.

## 加载数据  
** $(selector).load(URL,data,callback); **



jQuery.ajax()	|  执行异步 HTTP (Ajax) 请求。
.ajaxComplete()	|  当 Ajax 请求完成时注册要调用的处理程序。这是一个 Ajax 事件。
.ajaxError()	|  当 Ajax 请求完成且出现错误时注册要调用的处理程序。这是一个 Ajax 事件。
.ajaxSend()	|  在 Ajax 请求发送之前显示一条消息。
jQuery.ajaxSetup()	|  设置将来的 Ajax 请求的默认值。
.ajaxStart()	|  当首个 Ajax 请求完成开始时注册要调用的处理程序。这是一个 Ajax 事件。
.ajaxStop()	|  当所有 Ajax 请求完成时注册要调用的处理程序。这是一个 Ajax 事件。
.ajaxSuccess()	|  当 Ajax 请求成功完成时显示一条消息。
jQuery.get()	|  使用 HTTP GET 请求从服务器加载数据。
jQuery.getJSON()	|  使用 HTTP GET 请求从服务器加载 JSON 编码数据。
jQuery.getScript()	|  使用 HTTP GET 请求从服务器加载 JavaScript 文件，然后执行该文件。
.load()	|  从服务器加载数据，然后把返回到 HTML 放入匹配元素。
jQuery.param()	|  创建数组或对象的序列化表示，适合在 URL 查询字符串或 Ajax 请求中使用。
jQuery.post()	|  使用 HTTP POST 请求从服务器加载数据。
.serialize()	|  将表单内容序列化为字符串。
.serializeArray()	|  序列化表单元素，返回 JSON 数据结构数据。

## Reference
1. [](http://www.w3school.com.cn/jquery/jquery_ref_ajax.asp)
2. [AJAX教程](http://www.w3school.com.cn/ajax/index.asp)

------
