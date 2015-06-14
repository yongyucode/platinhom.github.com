---
layout: post
title: Shell中控制,循环和函数
date: 2015-06-14 06:08:20
categories: CompSci
tags: Shell Bash
---

## 控制
Bash支持if判断和case选择语句.

~~~ bash
## if...fi
if [ expression ]
then
    commands
elif  [ expression ];then
    commands
else
    commands2
fi
 
## Case..esac
case $a in
1)
    commands
    ;;
*)
    commands
    ;;
esac
~~~

- `if [ true ];then`更常一句写完.
- 判断条件expression和中括号之间要留有空格

## 循环
Bash支持`while do`循环和`for do`循环

~~~~ bash
## while..do..done
while [ expression]  #可以true/false
do
    commands
done

## for..do..done
for var in argument-list
do
    commands
done
~~~~

- 在`for do`中,argument-list可以是"a b c"的字符串,可以是a b c的字符串列表, 可以是产生字符串的命令dir, 可以是`$*`所有参数,可以是通配符`*`等产生的结果, 或`$(command)`,或`$listvar`.
- 打断循环: `break`, `continue`

## 函数



---
