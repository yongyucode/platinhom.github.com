---
layout: post
title: Python模块和包
date: 2015-08-29 13:33:01
categories: Coding
tags: Python
---

python没有什么头文件cpp文件之分, 每个py文件都可以作为独立的模块module. 我们应该熟知使用 *import os* 一类语句加载标准模块.这里总结下模块,包等更多东东.

## 模块 module

### 加载模块

加载模块最常用方法有:

~~~python
import module
import module as mod
from module import sth
from module import *
~~~

模块就是一个py文件, import时不需要文件后缀. 第一种方法加载整个模块(内容带命名空间); 第二种方法便于缩写(带命名空间); 第三者选定性加载内容且不需再带命名空间; 第四种方法加载所有东西且没有命名空间.

- 模块不能带路径,例如在a文件夹内的模块b, 不可以 *import a/b*,这时要用包(见下面).  
- 模块加载的路径储存在`sys.path`中.可以将某个文件夹路径加载到该列表中, 从而实现对文件夹内py文件的加载.
- 已加载的模块储存在`sys.modules`当中,可以对其进行检查模块是否已加载.
- 模块若已被加载, 再次加载将无效.此时如模块被修改需重新加载, 要用`reload(modname)`重新加载.



## 包 package

`__init__.py` : 初始化文件,用途在于说明该文件夹是个package, 可以用于import package.module.

~~~python
import sys;
if not "/home/a/" in sys.path:
    sys.path.append("/home/a/")
if not 'b' in sys.modules:
    b = __import__('b')
else:
    eval('import b')
    b = eval('reload(b)')
~~~

------
