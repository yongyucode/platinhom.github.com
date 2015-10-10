---
layout: post
title: Python基础
date: 2015-08-31 12:51:01
categories: Coding
tags: Python
---

关键词列表:

and           |      elif         |       if          |        print
as            |      else         |       import      |        raise
assert        |      except       |       in          |        return
break         |      exec         |       is          |        try
class         |      finally      |       lambda      |        while
continue      |      for          |       not         |        with
def           |      from         |       or          |        yield
del           |      global       |       pass		  |

int('6.000000000000000000e+00')报错,float('6.000000000000000000e+00')则可以


## 内建函数

isinstance(var, type): 可以比较两个参数项类型是否相同.如isinstance("abcd",str).isinstance和type比较差异参看[ref](http://segmentfault.com/q/1010000000127305),主要是isinstance可以对继承的类也进行相等判断,type不行.

## 小知识

- 关于python安装路径注册表: HKEY\_LOCAL\_MACHINE\SOFTWARE\Wow6432Node\Python\PythonCore\2.7\InstallPath. 在安装一些python应用时检测版本时, 可以修改这里的值来变更安装对应的版本及路径.

## Reference

1. [Python简明教程](http://woodpecker.org.cn/abyteofpython_cn/chinese/)
2. [Pyhon2官方手册](https://docs.python.org/2/)
2. [Python标准库](https://docs.python.org/2/library/index.html)
4. [Python中文手册](http://www.pythondoc.com/pythontutorial27/index.html)

------
