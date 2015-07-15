---
layout: post_small
title: Javascript基础篇
date: 2015-06-22 22:47:49
categories: CompSci
tags: JS
---

JavaScript 是属于网络的轻量级脚本语言,可以直接插入HTML页面中使用, 因此被数百万计的网页用来改进设计、验证表单、检测浏览器、创建cookies以及更多的应用,是因特网上最流行的脚本语言。
Javasciprt使用浏览器即可运行和查看结果,不需另装任何解析器! JavaScript和Java语法类似,但是完全是两种不同的语言.  

JavaScript 是面向对象的语言，但JS不使用类。在JS中，不会创建类，也不会通过类来创建对象（就像在其他面向对象的语言中那样）。JavaScript 基于 prototype，而不是基于类的.

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
- 基础对象: `String`[字符串型](http://www.w3school.com.cn/jsref/jsref_obj_string.asp); [数字类型](http://www.w3school.com.cn/jsref/jsref_obj_number.asp)只有一种浮点类型`Number`,可以用科学计数法`y=123e-5`,支持8/16进制`0577,0x1f`;`Boolean`[布尔型](http://www.w3school.com.cn/jsref/jsref_obj_Boolean.asp)`true/false`;
- 内置对象: `Date`[日期型](http://www.w3school.com.cn/jsref/jsref_obj_date.asp); `Array`[数组型](http://www.w3school.com.cn/jsref/jsref_obj_array.asp); `Math` [数学型](http://www.w3school.com.cn/jsref/jsref_obj_math.asp); `Regexp`[正则表达式类型](http://www.w3school.com.cn/jsref/jsref_obj_regexp.asp); `Event`[事件类型](http://www.w3school.com.cn/jsref/jsref_events.asp) (其实就是各种相应罢了,不怎么算对象); `Object` 对象型; `Function`[函数型](http://www.w3school.com.cn/jsref/jsref_obj_global.asp).
- 浏览器对象: `Window` [窗口对象](http://www.w3school.com.cn/jsref/dom_obj_window.asp); `Navigator`[浏览器对象](http://www.w3school.com.cn/jsref/dom_obj_navigator.asp); `Screen` [显示屏对象](http://www.w3school.com.cn/jsref/dom_obj_screen.asp); `History` [浏览历史记录对象](http://www.w3school.com.cn/jsref/dom_obj_history.asp); `Location` [网站地址对象](http://www.w3school.com.cn/jsref/dom_obj_location.asp)
- 变量 `var v1=1,v2="age";` var万能的动态类型. 全局变量(在函数外声明的)生存期是页面; 局部变量是函数结束. 函数内使用 `vname=value` 不声明就赋值的会被作为全局变量.
- 数组,`var=new Array();var[0]=1;var[1]=2;`也可以`=new Array(1,2)`或`=[1,2]`.数组下标`0`开始.
- 对象(`Object`), `var person={name:"Bill", id:5566};`,调用属性`person.name;person["name"];`,方法类似. 对象当然还有方法了. Java的想法: 一切皆对象. 利用函数构造`function person(name,age){this.name=name;this.age=age;}`(对象构造器,this是自身);`this.changeName=changeName;function changeName(name){this.lastname=name;}` 对象内创建方法.
- 函数 `function fname([var1,var2]){..}`, 可以`return var1;`返回值.JS居然不支持参数默认值方法..
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
- `document.getElementsByName("name")` 通过元素名来获取元素,可能是个多对象的数组.
- `document.createElement("p");` 创建元素(节点)
- `document.createTextNode("这是新段落。");`创建元素内容
- `para.appendChild(node);div1.appendChild(para)` 向元素添加内容,再把元素放到父元素里
- `child.parentNode.removeChild(child);` 删除子元素.这里通过调用父元素属性再实现移除.

- `<h1 onclick="changetext(this)">请点击该文本</h1>` 对事件作出响应,这里调用函数完成,函数中参数是id,这里this就是该元素.
- `<body onload="checkCookies()">` onload事件就是页面加载时做的东东,`onunload`是离开页面做的.经常用于cookie处理,检查浏览器等.
- `<input type="text" id="fname" onchange="upperCase()">` onchange事件是离开输入框/按下确定时的[事件](http://www.w3school.com.cn/tiy/t.asp?f=js_dom_event_onchange).
- `<div onmouseover="mOver(this)" onmouseout="mOut(this)">` onmouseover/out是鼠标移入和移出事件,相应不同函数.
- `onmousedown, onmouseup` 这两个事件对应鼠标按下和释放的事件.和onclick相关

## 常用属性和方法

### 字符串

- `str.length` 返回长度
- `str.substring(x,y)` 返回子串,和python的语法类似,0开始[x,y)返回x+1到y的子串.
- `str.substr(start,len)` 返回子串,从start开始长度为len. 注意序号0开始,支持-1负数表示从后倒数起.len省略则返回到结尾.
- `str.toUpperCase()/toLowerCase` 全部大/小写化
- `str.indexOf(str2[,start])` 从start位开始(默认0)搜索str2,找到后返回首个匹配字母的索引,没找到返回-1.
- `str.replace(regexp/substr,replacement)` 使用正则/子串搜索并替换.
- `str.split(separator,max)` 必须指明分隔符. max是最大分的次数,默认无穷.
- `escape(str)` 将字符串转为网址那种编码.被废弃,应该用encodeURI()和encodeURIComponent()来代替.

## 数组

- `ary.pop()` 删除并返回最后一个元素
- `ary.shift()` 删除并返回第一个元素
- `ary.push(ele....)` 追加元素,可以数个,返回新长度
- `ary.unshift(ele....)` 向数组开头追加元素,可以数个,返回新长度
- `ary.splice(index,N,ele....)` 从数组中index开始(可以负数)删除N个元素,N=0则不删除只增加.ele是要添加的元素. 改变原来数组,返回删除的项目.`ary.splice(0,ary.length);`清空数组,和`ary=[]`;一样


## JS常用方法

- `alert('Welcome!')` : 弹出提示框
- `confirm(str);`:弹出对话框,提示字符串str,返回true/false(确定/取消)
- `prompt(str1, str2);`: 提问对话框,可输入值.str1是提示信息,str2是预设内容.按确定返回输入字符串,取消null.
- `window.open(<URL>, <窗口名称>, <参数字符串>)` 打开新窗口.
- `window.close()` 窗口关闭.这里window也可以是window.open打开后的返回值窗口变量.
- `console.log(command)` 执行命令后将结果返回到控制台.控制台要另外在浏览器调用.


## Reference
1. [w3school-cn-javascript教程](http://www.w3school.com.cn/js/index.asp)
2. [Codecademy-JS教程练习](http://www.codecademy.com/zh/tracks/javascript)
3. [JavaScript面向对象精要(一)](http://segmentfault.com/a/1190000002890067), [JavaScript面向对象精要(二)](http://segmentfault.com/a/1190000002896562)


---