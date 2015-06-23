---
layout: post_small
title: Javascript基础篇
date: 2015-06-22 22:47:49
categories: CompSci
tags: JS
---

JavaScript 是属于网络的轻量级脚本语言,可以直接插入HTML页面中使用, 因此被数百万计的网页用来改进设计、验证表单、检测浏览器、创建cookies以及更多的应用,是因特网上最流行的脚本语言。
Javasciprt使用浏览器即可运行和查看结果,不需另装任何解析器! JavaScript和Java语法类似,但是完全是两种不同的语言.  

在HTML中使用外链(`src="/*.js"`)或者内嵌的方法引入JS.例如下面的例子. 其中. HTML type默认是JS, 所以可以不写.

~~~ html
<!--外链-->
<script type="text/javascript" src="/jsmol/JSmol.min.js"></script>
<!--内嵌-->
<script type="text/javascript">
var hello;
</script>
~~~

测试和练习十分容易, 新建一个txt文件,改名为test.html, 文本编辑器打开后, 写入以下基本信息.在中间填入指令, 并用浏览器打开刷新即可.

~~~ html
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8" />
</head>
<body>
<p> This is a test for javascript! </p>
<script type="text/javascript">



</script>
<button type="button" onclick="alert('Welcome!')">点击这里测试</button>
</body>
</html>
~~~

JS的内容会在页面加载时加载. 事件发生时动作可以利用函数来调用. 通过事件来操作页面元素是JS重要的作用.


## 基础知识

- 分割语句`;`,注释`//`和`/* comment */`, 大小写敏感, 字符串`' '`和`" "`相等. null空值清空变量; undefined是没赋值.
- 基础类型: `String`字符串型; 数字只有一种浮点类型`Number`,可以用科学计数法`y=123e-5;`;`Boolean`布尔型`true/false`;
- 变量 `var v1=1,v2="age";` var万能的动态类型. 全局变量(在函数外声明的)生存期是页面; 局部变量是函数结束. 函数内使用 `vname=value` 不声明就赋值的会被作为全局变量.
- 数组,`var=new Array();var[0]=1;var[1]=2;`也可以`=new Array(1,2)`或`=[1,2]`.数组下标`0`开始.
- 对象(`Object`), `var person={name:"Bill", id:5566};`,调用属性`person.name;person["name"];`,方法类似. 对象当然还有方法了. Java的想法: 一切皆对象.
- 函数 `function fname([var1,var2]){..}`, 可以`return var1;`返回值.
- 运算: 和C类似,支持`%`求余,`++`累加,`+=`自运算.
- 字符串: 连接也是用加号. 数字和字符串相加,数字会转为字符串再处理.
- 比较: `==`等于(5=="5"是对),`===`全等于(值和类型),`!=`不等于, `>,>=`, `&&`与,`||`或,`!`非. 
- 条件句: `if (){;} else if {;} else {;}`; `switch(var1){case val1: {;} break; default:{;}}`; 三目: `var1=(condition)?trueValue:falseValue`
- 循环: `for (var i=0;循环条件;i++){;}`; `for (x in person){;}`遍历对象属性(x此时为属性名); `while (循环条件){;}`和`do {;} while (循环条件)` 先判后做和先做后判; `break`和`continue`;
- 标签: `labelname: {..;break/continue labelname;..}` 可用于跳出指定代码块.
- 错误: `try{;} catch(err){;}` 测试并捕获. `throw exception` 抛出错误,一般是字符串.

## HTML DOM
DOM就是document objective model.就是HTML各个元素对象. JS可以操控他们, 通过id,标签名,类名来找到元素, 并可以改变他们的元素,属性,css,对事件作出反应. 更多事件[参考](http://www.w3school.com.cn/jsref/dom_obj_event.asp).

- `x=document.getElementById("demo")` : 获取元素
- `var y=x.getElementsByTagName("p");` : 在获取元素后使用tag名来获取子元素(所有子元素).
- `document.write("");` : 写入内容到网页,加载完网页后执行,会覆盖网页...
- `document.getElementById("p1").innerHTML="New_Val"`: 改变其HTML内容.
- `document.getElementById(id).attribute=new_value`: 改变属性值
- `document.getElementById("p2").style.color="blue"` 改变样式.
- `document.getElementById("myBtn").onclick=function(){displayDate()};` 对事件做响应,这里通过调用元素事件完成.

- `<h1 onclick="changetext(this)">请点击该文本</h1>` 对事件作出响应,这里调用函数完成,函数中参数是id,这里this就是该元素.
- `<body onload="checkCookies()">` onload事件就是页面加载时做的东东,`onunload`是离开页面做的.经常用于cookie处理,检查浏览器等.
- `<input type="text" id="fname" onchange="upperCase()">` onchange事件是离开输入框/按下确定时的[事件](http://www.w3school.com.cn/tiy/t.asp?f=js_dom_event_onchange).
- `<div onmouseover="mOver(this)" onmouseout="mOut(this)">` onmouseover/out是鼠标移入和移出事件,相应不同函数.
- `onmousedown, onmouseup` 这两个事件对应鼠标按下和释放的事件.和onclick相关

## 常用属性和方法

### 字符串

- `str.length` 返回长度

## JS常用方法

- `alert('Welcome!')` : 弹出提示框
- `confirm(str);`:弹出对话框,提示字符串str,返回true/false(确定/取消)
- `prompt(str1, str2);`: 提问对话框,可输入值.str1是提示信息,str2是预设内容.按确定返回输入字符串,取消null.
- `window.open(<URL>, <窗口名称>, <参数字符串>)` 打开新窗口.
- `window.close()` 窗口关闭.这里window也可以是window.open打开后的返回值窗口变量.
- `console.log(command)` 执行命令后将结果返回到控制台.控制台要另外在浏览器调用.


## Reference
1. [w3school-cn-javascript教程](http://www.w3school.com.cn/js/index.asp)
2. [JavaScript面向对象精要(一)](http://segmentfault.com/a/1190000002890067), [JavaScript面向对象精要(二)](http://segmentfault.com/a/1190000002896562)


---