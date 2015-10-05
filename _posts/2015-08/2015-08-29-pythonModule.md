---
layout: post
title: Python模组
date: 2015-08-29 13:33:01
categories: Coding
tags: Python
---

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
