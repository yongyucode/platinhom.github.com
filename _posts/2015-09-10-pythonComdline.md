---
layout: post
title: Python外部调用命令
date: 2015-09-09 21:02:06
categories: Coding
tags: Python
---

### 方法1: os.system

直接使用 `os.system("command")` 来执行外部程序,返回程序结束返回码(正常0/1错误)

缺点: 不能获取程序输出stdout.不能像PHP的`exec(string $command [, array &$output [, int &$return_var ]] )`来用数组储存输出stdout.

### 方法2: os.popen

popen实际是获取命令运行后的输出结果,储存在临时文件当中. 使用命令: 

`os.popen(command [, mode, bufsize])`

支持逐行分析如下例代码:

~~~python
import os
p = os.popen('command',"r")
while 1:
    line = p.readline()
    if not line: break
    print line
~~~

也支持 `p.readlines()`, `for line in p`等文件处理方法.


### 方法3: subprocess.Popen 
subprocess模块提供子进程处理方法.

~~~python
import subprocess as sub
p = sub.Popen('your command',stdout=sub.PIPE,stderr=sub.PIPE)
output, errors = p.communicate()
print output
~~~

另外也可以更方便地使用使用**check_output**函数: 

`output = subprocess.check_output(["command", "arg1", "arg2"]);` 

------
