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
while [ expression ]  #可以true/false
do
    commands
done

## for..do..done
for var in argument-list
do
    commands
done
~~~~

- 在`for do`中,argument-list可以是"a b c"的字符串(如`$*`),可以是a b c的字符串列表(如`$@`), 可以是产生字符串的命令ls, 可以是`$*`所有参数,可以是通配符`*`等产生的结果, 或`$(command)`,或`$listvar`.
- 打断循环: `break`, `continue`

## 函数
使用function fname{}方法定义.功能比较弱:返回值只能是整数,没有实际形参的定义.

~~~~ bash

[function] fname[()]
{
echo $1 $2
statements;
[return int;]
}

fname p1 p2
~~~~

- function关键词可省略,甚至()也可以省略.不建议省略.
- 返回值是0~255的整数.若不输入return语句,则返回最后一句的返回值.
- 可用`$?`显示最后命令的退出状态,可以用于函数调用后的返回值的获取。一般地0表示没有错误，其他任何值表明有错误.
- 函数的参数使用shell脚本的参数传递的方法.`$n`n是对应1,2,3,就是获取对应的参数.`$#`获取参数个数.还有`$@`和`$*`获取所有参数,前者字符串化逐个来,后者所有参数再字符串化.
- 自定义函数需要在执行前先定义,不能定义在文件末尾.可以写到sh文件后进行source,可以写到.bashrc里进行预加载.
- 系统在搜索命令时先搜可执行命令,随后再到自定义函数.
- 删除定义的函数用`unset .f function_name`命令,需要`.f`指明函数.

### 例子

#### 函数

~~~ bash
# 批处理对后缀名为选项1的进行后面的指令.
function batchexec()
{
find . -type f -iname '*.'${1}'' -exec ${@:2}  {} /; ;
}
# 所有sh文件进行775权限操作.
batchexec sh chmod 755
~~~

---
