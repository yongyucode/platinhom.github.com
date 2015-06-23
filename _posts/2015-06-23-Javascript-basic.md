---
layout: post
title: Javascript基础篇
date: 2015-06-22 22:47:49
categories: CompSci
tags: JS
---

JavaScript 是属于网络的轻量级脚本语言,可以直接插入HTML页面中使用, 因此被数百万计的网页用来改进设计、验证表单、检测浏览器、创建cookies以及更多的应用,是因特网上最流行的脚本语言。
Javasciprt使用浏览器即可运行和查看结果,不需另装任何解析器! JavaScript和Java语法类似,但是完全是两种不同的语言.  

在HTML中使用外链(`src="/*.js"`)或者内嵌的方法引入JS.例如下面的例子. 其中. HTML type默认是JS, 所以可以不写.

~~~ markup
<!--外链-->
<script type="text/javascript" src="/jsmol/JSmol.min.js"></script>
<!--内嵌-->
<script type="text/javascript">
var hello;
</script>
~~~

测试和练习十分容易, 新建一个txt文件,改名为test.html, 文本编辑器打开后, 写入以下基本信息.在中间填入指令, 并用浏览器打开刷新即可.

~~~~ markup
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
~~~~

JS的内容会在页面加载时加载. 事件发生时动作可以利用函数来调用. 通过事件来操作页面元素是JS重要的作用.


## 基础知识

- 分割语句`;`,注释`//`和`/* comment */`, 大小写敏感, 字符串`' '`和`" "`相等. null空值清空变量; Undefined是没赋值.
- 变量 `var v1=1,v2="age";` var万能的动态类型. `String`字符串型; 数字只有一种类型`Number`,可以用科学计数法`y=123e-5;`,`Boolean`布尔型`true/false`; 全局变量(在函数外声明的)生存期是页面; 局部变量是函数结束. 函数内使用 `vname=value` 不声明就赋值的会被作为全局变量.
- 数组,`var=new Array();var[0]=1;var[1]=2;`也可以`=new Array(1,2)`或`=[1,2]`.数组下标`0`开始.
- 对象(`Object`), `var person={name:"Bill", id:5566};`,调用属性`person.name;person["name"];`,方法类似. 对象当然还有方法了. Java的想法: 一切皆对象.
- 函数 `function fname([var1,var2]){..}`, 可以`return var1;`返回值.
- 运算: 和C类似,支持`%`求余,`++`累加,`+=`自运算.
- 字符串: 连接也是用加号. 数字和字符串相加,数字会转为字符串再处理.
- 比较: `==`等于,`===`全等于(值和类型),`!=`不等于, `>,>=`, `&&`与,`||`或,`!`非. 三目: `var1=(condition)?trueValue:falseValue`
- 条件句: `if (){;} else if {;} else {;}`; `switch(var1){case val1: {;} break; default:{;}}`
- 循环: `for (var i=0;循环条件;i++){;}`; `for (x in person){;}`遍历对象属性(x此时为属性名); `while (循环条件){;}`和`do {;} while (循环条件)` 先判后做和先做后判; `break`和`continue`;
- 标签: `labelname: {..;break labelname;..}` 可用于跳出指定代码块.
- 错误: `try{;} catch(err){;}` 测试并捕获. `throw exception` 抛出错误,一般是字符串.

## JS常用

- `alert('Welcome!')` : 弹出提示框
- `document.write("");` : 写入内容到网页,加载完网页后执行,会覆盖网页...
- `x=document.getElementById("demo")` : 获取元素

---