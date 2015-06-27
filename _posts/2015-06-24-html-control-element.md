---
layout: post
title: HTML控件元素的用法
date: 2015-06-23 21:11:05
categories: CompSci
tags: Website HTML
---

## [输入框 Text 对象](http://www.w3school.com.cn/jsref/dom_obj_text.asp)
主代码: `<input type="text">`   
类似地有[密码输入框](http://www.w3school.com.cn/jsref/dom_obj_password.asp),主代码: `<input type="password">`

## [按钮 Button 对象](http://www.w3school.com.cn/jsref/dom_obj_button.asp)
主代码: `<input type="button">`

## [单选 Radio 对象](http://www.w3school.com.cn/jsref/dom_obj_radio.asp)

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

## [多选 checkbox 对象]()

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

## [拾色器 color 对象](http://www.w3school.com.cn/jsref/dom_obj_color.asp)
主代码: `<input type="color">`

~~~ html
选择您喜爱的颜色：<input type="color" id="myColor">

<p>请点击按钮来获得颜色选择器的颜色。</p>

<p id="demo"></p>

<button onclick="myFunction()">试一下</button>

<script>
function myFunction() {
    var x = document.getElementById("myColor").value;
    document.getElementById("demo").innerHTML = x;
}
</script>
~~~

选择您喜爱的颜色：<input type="color" id="myColor">
<p>请点击按钮来获得颜色选择器的颜色。</p>
<p id="demo"></p>
<button onclick="myFunction()">试一下</button>

<script>function myFunction() {var x = document.getElementById("myColor").value;document.getElementById("demo").innerHTML = x;}</script>

可以用以下JS代码创建和访问对象

~~~ javascript
var x = document.createElement("INPUT");
x.setAttribute("type", "color");
document.body.appendChild(x);
x.setAttribute("id", "myColor");
var y = document.getElementById("myColor");
~~~

---
