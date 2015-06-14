---
layout: post
title: Shell中控制,循环和函数
date: 2015-06-14 06:08:20
categories: CompSci
tags: Shell Bash
---
这里暂时讨论只针对Bash及对应变体,csh等与bash差异较大,在此不讨论.

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
- case可以把 `1) commands ;;`写在一行.

### 比较和判断

- 数值比较:  
`-eq` 等于, `-ne` 不等于, `-gt` 大于,`-ge` 大于等于,`-lt` 小于, `-le` 小于等于.  
如`[ 3 -eq $mynum ]`,直接用数字

- 字符串比较:  
`-z` 空字符串; `-n` 非空字符串; `=`或`==` 字符串全等; `!=`字符串不等;`>,>=,<,<=` 字符串大小比较(按字符比较).  
如`[ -z "$myvar" ]`,`[ "$myvar" = "one two three" ]`  
一般加入**双引号**避免空格的干扰.

- 文件判断  
  - 一元判断符: `-e`或`-a`文件或文件夹存在; `-d` 文件夹; `-f` 文件; `-L`或`-h` 链接; `-s` 非空文件; `-w` 可写; `-r` 可读; `-x`可执行; `-b`二进制文件; `-c`字符型文件; `-u` 具suid;  
  - 二元判断符: `f1 -nt f2`:文件1比文件2新(或文件2不存在); `f1 -ot f2`:文件2比文件1新(或文件1不存在)  

更多与运算,test,`[[ ]]`差别用法请后续..

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

~~~ bash
# 根据文件名后缀进行解压,case的运用.
function extract() { 
    if [ -f $1 ] ; then 
      case $1 in 
        *.tar.bz2)   tar xjf $1     ;; 
        *.tar.gz)    tar xzf $1     ;; 
        *.bz2)       bunzip2 $1     ;; 
        *.rar)       unrar e $1     ;; 
        *.gz)        gunzip $1      ;; 
        *.tar)       tar xf $1      ;; 
        *.tbz2)      tar xjf $1     ;; 
        *.tgz)       tar xzf $1     ;; 
        *.zip)       unzip $1       ;; 
        *.Z)         uncompress $1  ;; 
        *.7z)        7z x $1        ;; 
        *)     echo "'$1' cannot be extracted via extract()" ;; 
         esac 
     else 
         echo "'$1' is not a valid file" 
     fi 
}
~~~

---
