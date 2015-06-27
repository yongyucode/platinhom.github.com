---
layout: post
title: HTML控件元素的用法
date: 2015-06-23 21:11:05
categories: CompSci
tags: Website HTML
---

## 输入框 Text 对象
[Text](http://www.w3school.com.cn/jsref/dom_obj_text.asp)主代码: `<input type="text"/>`   
类似地有[密码输入框](http://www.w3school.com.cn/jsref/dom_obj_password.asp),主代码: `<input type="password"/>`

## 按钮 Button 对象
[Button](http://www.w3school.com.cn/jsref/dom_obj_button.asp)主代码: `<input type="button"/>`

## 单选 Radio 对象
[Radio](http://www.w3school.com.cn/jsref/dom_obj_radio.asp)主代码:`<input type="radio"/>`

~~~ html
<form action="" method="get"> 
您最喜欢水果？<br /><br /> 
<label><input name="Fruit" type="radio" value="" checked/>苹果 </label> 
<label><input name="Fruit" type="radio" value="" />桃子 </label> 
<label><input name="Fruit" type="radio" value="" />香蕉 </label> 
<label><input name="Fruit" type="radio" value="" />梨 </label> 
<label><input name="Fruit" type="radio" value="" />其它 </label> 
</form> 
~~~

<form action="" method="get"> 
您最喜欢水果？<br /><br /> 
<label><input name="Fruit" type="radio" value="" checked/>苹果 </label> 
<label><input name="Fruit" type="radio" value="" />桃子 </label> 
<label><input name="Fruit" type="radio" value="" />香蕉 </label> 
<label><input name="Fruit" type="radio" value="" />梨 </label> 
<label><input name="Fruit" type="radio" value="" />其它 </label> 
</form> 

## 多选 checkbox 对象
[Checkbox](http://www.w3school.com.cn/jsref/dom_obj_checkbox.asp) 主代码: `<input type="checkbox"/>`

~~~ html
<form action="" method="get"> 
您喜欢的水果？<br /><br /> 
<label><input name="Fruit" type="checkbox" value="" checked/>苹果 </label> 
<label><input name="Fruit" type="checkbox" value="" />桃子 </label> 
<label><input name="Fruit" type="checkbox" value="" />香蕉 </label> 
<label><input name="Fruit" type="checkbox" value="" />梨 </label> 
</form> 
~~~

<form action="" method="get"> 
您喜欢的水果？<br /><br /> 
<label><input name="Fruit" type="checkbox" value="" checked/>苹果 </label> 
<label><input name="Fruit" type="checkbox" value="" />桃子 </label> 
<label><input name="Fruit" type="checkbox" value="" />香蕉 </label> 
<label><input name="Fruit" type="checkbox" value="" />梨 </label> 
</form> 

## [选择器 Select对象](http://www.w3school.com.cn/jsref/dom_obj_select.asp)
主代码 `<select><option value="v1">option1</option></select>`

## 滑块控件 Range 对象
[Range](http://www.w3school.com.cn/jsref/dom_obj_range.asp)主代码`<input type="range">`. HTML5新元素.

~~~ html
<input type="range" id="myRange">

<p>点击按钮来获得滑块控件的值。</p>

<button onclick="myFunctionRange()">试一下</button>

<p id="demoRange"></p>

<script>
function myFunctionRange() {
    var x = document.getElementById("myRange").value;
    document.getElementById("demoRange").innerHTML = x;
}
</script>
~~~

<input type="range" id="myRange">

<p>点击按钮来获得滑块控件的值。</p>

<button onclick="myFunctionRange()">试一下</button>

<p id="demoRange"></p>

<script>function myFunctionRange() {var x = document.getElementById("myRange").value;document.getElementById("demoRange").innerHTML = x;}</script>

## 数值选择 Number 控件
[Number](http://www.w3school.com.cn/jsref/dom_obj_number.asp)主代码:`<input type="number">`. HTML5新元素.

~~~ html
<input type="number" id="myNumber" value="2" max="10" min="-2">

<p>点击按钮来获得 number 字段的数字。</p>

<button onclick="myFunctionNumber()">试一下</button>

<p id="demoNumber"></p>

<script>
function myFunctionNumber() {
    var x = document.getElementById("myNumber").value;
    document.getElementById("demoNumber").innerHTML = x;
}
</script>
~~~

<input type="number" id="myNumber" value="2" max="10" min="-2">

<p>点击按钮来获得 number 字段的数字。</p>

<button onclick="myFunctionNumber()">试一下</button>

<p id="demoNumber"></p>

<script>function myFunctionNumber() {    var x = document.getElementById("myNumber").value;    document.getElementById("demoNumber").innerHTML = x;}</script>

## 日期选择 Date 对象
[Date](http://www.w3school.com.cn/jsref/dom_obj_date.asp)主代码`<input type="date">` (HTML5才支持)

~~~ html
<input type="date" id="myDate" value="2014-06-01">

<p>点击按钮来获得 date 字段的日期。</p>

<button onclick="myFunctionDate()">试一下</button>

<p id="demoDate"></p>

<script>
function myFunctionDate() {
    var x = document.getElementById("myDate").value;
    document.getElementById("demoDate").innerHTML = x;
}
</script>
~~~

<input type="date" id="myDate" value="2014-06-01">

<p>点击按钮来获得 date 字段的日期。</p>

<button onclick="myFunctionDate()">试一下</button>

<p id="demoDate"></p>

<script>function myFunctionDate() {var x = document.getElementById("myDate").value;document.getElementById("demoDate").innerHTML = x;}</script>


## 拾色器 color 对象
[Color](http://www.w3school.com.cn/jsref/dom_obj_color.asp) 主代码: `<input type="color">`. HTML5新元素.

~~~ html
选择您喜爱的颜色：<input type="color" id="myColor">

<p>请点击按钮来获得颜色选择器的颜色。</p>

<p id="demoColor"></p>

<button onclick="myFunctionColor()">试一下</button>

<script>
function myFunctionColor() {
    var x = document.getElementById("myColor").value;
    document.getElementById("demoColor").innerHTML = x;
}
</script>
~~~

选择您喜爱的颜色：
<input type="color" id="myColor">
<p>请点击按钮来获得颜色选择器的颜色。</p>
<p id="demoColor"></p>
<button onclick="myFunctionColor()">试一下</button>

<script>function myFunctionColor(){var x = document.getElementById("myColor").value;document.getElementById("demoColor").innerHTML = x;}</script>

## 提交表单 Submit 对象
[submit](http://www.w3school.com.cn/jsref/dom_obj_submit.asp)主代码:`<input type="submit">`   主要使用form的`onsubmit`属性来调用检查函数.形式其实只是个普通按钮.


~~~ html
<script type="text/javascript">
function validate()
{
var at=document.getElementById("email").value.indexOf("@")
var age=document.getElementById("age").value
var fname=document.getElementById("fname").value
submitOK="true"

if (fname.length>10)
 {
 alert("名字必须小于 10 个字符。")
 submitOK="false"
 }
if (isNaN(age)||age<1||age>100)
 {
 alert("年龄必须是 1 与 100 之间的数字。")
 submitOK="false"
 }
if (at==-1) 
 {
 alert("不是有效的电子邮件地址。")
 submitOK="false"
 }
if (submitOK=="false")
 {
 return false
 }
}
</script>

<body>
<form action="/example/hdom/hdom_submitpage.html" onsubmit="return validate()">
名字（最多 10 个字符）：<input type="text" id="fname" size="20"><br />
年龄（从 1 到 100）：<input type="text" id="age" size="20"><br />
电子邮件：<input type="text" id="email" size="20"><br />
<br />
<input type="submit" value="提交"> 
</form>
~~~


可以用以下JS代码创建和访问对象

~~~ javascript
var x = document.createElement("INPUT");
x.setAttribute("type", "color");
document.body.appendChild(x);
x.setAttribute("id", "myColor");
var y = document.getElementById("myColor");
~~~

---
