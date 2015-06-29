---
layout: post
title: PHP学习笔记-网站信息交互篇
date: 2015-06-30 08:35:36
categories: CompSci
tags: PHP HTML website
---

## [超全局变量](http://www.w3school.com.cn/php/php_superglobals.asp)

- 可以全局调用,包括函数内.
- `$GLOBALS`: 储存了所有全局变量, 通过变量名可以获取全局变量.
- `$_SERVER`: 保存关于报头,路径,脚本位置信息. 如`$_SERVER["PHP_SELF"] `返回脚本文件名;  `$_SERVER["REQUEST_METHOD"]` 提交方法,如POST/GET.
- `$_REQUEST`: 收集HTML表单提交的数据.很重要,例如`$_REQUEST['hi']`可以获得表单提交后name为hi的标签的数据.通过在`<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">`指明脚本文件(这里是脚本自身),然后就可以调用`$_REQUEST`来收集值.
- `$_POST`: 收集提交`method="post"`的HTML表单收据,也常用于变量传递.见上例,不过用的是`$_POST['hi']`来收集.
- `$_GET`: 收集提交`method="get"`的表单数据,也可收集URL发送的数据. `<a href="test_get.php?subject=PHP&web=W3school.com.cn">测试 $GET</a>`, 在test_get.php中用`$_GET['subject']`就可以获取相应`?`后的数据.
- `_FILES`:
- `$_ENV`: 
- `$_COOKIE`: 
- `$_SESSION`: 

`$_GET` 是通过 URL 参数传递到当前脚本的变量数组,这时变量名和值都在网址上,可以添加到标签,可用于发送非敏感数据(例如密码就不要这么干)。`$_POST` 是通过 HTTP POST 传递到当前脚本的变量数组。用的method也不同.

- `htmlspecialchars(str)` 函数能够避免 `$_SERVER["PHP_SELF"]` 被利用,可以将特殊字符转为HTML实体,避免`<>`被利用.


~~~ php

<?php
//预处理提交信息
// 定义变量并设置为空值
$name = $email = $gender = $comment = $website = "";
//处理必须输入的项. 因为下面的需要调用,所以要把php内容放前面.
$nameErr = $emailErr = $genderErr = $websiteErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name"><span class="error">* <?php echo $nameErr;?></span><br><br>
E-mail: <input type="text" name="email"><span class="error">* <?php echo $emailErr;?></span><br><br>
Website: <input type="text" name="website"><span class="error"><?php echo $websiteErr;?></span><br><br>
Comment: <textarea name="comment" rows="5" cols="40"></textarea><br><br>
Gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<span class="error">* <?php echo $genderErr;?></span><br><br>
<input type="submit" name="submit" value="Submit"> 
</form>

~~~


## Reference
1. [超全局变量](http://www.w3school.com.cn/php/php_superglobals.asp)
2. 

---
