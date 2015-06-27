---
layout: post
title: HTML常用控件元素的用法
date: 2015-06-23 21:11:05
categories: CompSci
tags: Website HTML
---

这篇东东的工作量真TM大啊....慢慢写吧...分几篇吧...  
前篇: 经典HTML控件  
后篇: HTML5新控件  

## 表单 Form 对象

## 输入框 Text 对象
[Text](http://www.w3school.com.cn/jsref/dom_obj_text.asp)主代码: `<input type="text"/>`   
一般的文件输入框. 很基础. 

`<form>Email: <input type="text" name="email" /></form>`

<form>Email: <input type="text" name="email" /></form>

## 密码输入框 Password 对象
[Password](http://www.w3school.com.cn/jsref/dom_obj_password.asp)主代码: `<input type="password"/>`

`<form><input type="password" name="pwd" /></form>`

<form><input type="password" name="pwd" /></form>

## 按钮 Button 对象
[Button](http://www.w3school.com.cn/jsref/dom_obj_button.asp)主代码: `<input type="button"/>`
最一般普通的按钮. 常用属性和事件:
- value :
- onclick :

`<form><input type="button" value="Click me" onclick="alert('Hello World')" /></form>`

<form><input type="button" value="Click me" onclick="alert('Hello World')" /></form>

## 单选 Radio 对象
[Radio](http://www.w3school.com.cn/jsref/dom_obj_radio.asp)主代码:`<input type="radio"/>`

~~~ html
<form action="" method="get"> 
您最喜欢水果？<br />
<label><input name="Fruit" type="radio" value="" checked/>苹果 </label> 
<label><input name="Fruit" type="radio" value="" />桃子 </label> 
<label><input name="Fruit" type="radio" value="" />香蕉 </label> 
<label><input name="Fruit" type="radio" value="" />梨 </label> 
<label><input name="Fruit" type="radio" value="" />其它 </label> 
</form> 
~~~


<form action="" method="get"> 您最喜欢水果？<br /><label><input name="Fruit" type="radio" value="" checked/>苹果 </label><label><input name="Fruit" type="radio" value="" />桃子</label> <label><input name="Fruit" type="radio" value="" />香蕉 </label> <label><input name="Fruit" type="radio" value="" />梨 </label> <label><input name="Fruit" type="radio" value="" />其它 </label> </form> 


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

<form action="" method="get"> 您喜欢的水果？<br /><br /> <label><input name="Fruit" type="checkbox" value="" checked/>苹果 </label> <label><input name="Fruit" type="checkbox" value="" />桃子 </label> <label><input name="Fruit" type="checkbox" value="" />香蕉 </label> <label><input name="Fruit" type="checkbox" value="" />梨 </label> </form> 


## 选择器 Select对象
[Select](http://www.w3school.com.cn/jsref/dom_obj_select.asp)主代码: `<select><option value="v1">option1</option></select>`

~~~ html
<form>
<select id="sel">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select></form>
~~~

<form><select id="sel"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></form>

## 文件提交 FileUpload 对象
[File](http://www.w3school.com.cn/jsref/dom_obj_fileupload.asp) 主代码: `<input type="file">` 

`<form><input type="file" /></form>`

<form><input type="file" /></form>

## Image 对象
[Input Image](http://www.w3school.com.cn/jsref/dom_obj_input_image.asp) 主代码`<input type="image" />`

`<form><input type="image" src="http://platinhom.github.io/images/shortcut.png" alt="Submit" /></form>`

<form><input type="image" src="http://platinhom.github.io/images/shortcut.png" alt="Submit" /></form>

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

## 重置表格 Reset 对象
[Reset](http://www.w3school.com.cn/jsref/dom_obj_reset.asp) 主代码: `<input type="reset"> `

`<form><input type="reset" /></form>`

<form><input type="reset" /></form>

## 隐藏字段 Hidden 对象
[hidden](http://www.w3school.com.cn/jsref/dom_obj_hidden.asp) 主代码:`<input type="hidden">`  
一般用于储存一些不显示的信息,又可以通过JS进行操作修改,保存内容,被进一步调用等.  

`<form><input type="hidden" name="country" value="Norway" /></form>`

<form><input type="hidden" name="country" value="Norway" /></form>

## 显示细节 Details 对象
[Details](http://www.w3school.com.cn/jsref/dom_obj_details.asp) 主代码:`<details>....</details>`   
创建一个可显示详细细节的对象.

`<details id="myDetails">Some additional details...</details>`

<details id="myDetails">Some additional details...</details>


----------------
一些常用处理代码

### 可以用以下JS代码创建和访问对象

~~~ javascript
var x = document.createElement("INPUT");
x.setAttribute("type", "text");
document.body.appendChild(x);
x.setAttribute("id", "myColor");
var y = document.getElementById("myColor");
~~~

### 可以用以下JS代码访问多选栏(checkbox,radio)中被选中的值.

~~~ javascript
function GetValueFromNames(name){
	var chkObjs = document.getElementsByName(name);
    for(var i=0;i<chkObjs.length;i++){
        if(chkObjs[i].checked){
            stype=chkObjs[i].value;
            break;
        }
    }
}
~~~

## Reference
1. [HTML \<input\> 标签](http://www.w3school.com.cn/tags/tag_input.asp)以及[HTML \<input\> 标签的 type 属性](http://www.w3school.com.cn/tags/att_input_type.asp)

---
