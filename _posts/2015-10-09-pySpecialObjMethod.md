---
layout: post
title: Python对象的特殊属性和方法
date: 2015-10-09 07:36:03
categories: Coding
tags: Python
---

Python一切皆对象(object)，每个对象都可能有多个属性(attribute)。Python的属性有一套统一的管理方案。
 
对象的属性可能来自于其类定义，叫做类属性(class attribute)。
类属性可能来自类定义自身，也可能根据类定义继承来的。
一个对象的属性还可能是该对象实例定义的，叫做对象属性(object attribute)。
对象的属性储存在对象的`__dict__`属性中。
`__dict__`为一个词典，键为属性名，对应的值为属性本身。

## 属性

- `__doc__`: 帮助说明, 将字符串写在对象定义声明之下.
- `__module__`: 模组名,就是文件的名字(无后缀)部分
- `__class__`: 返回对象的类信息
- `__dict__`:储存对象属性

## 方法

- `__init__(self, args)`: 对象初始化时执行的函数
- `__getattr__(self,attr)`:在调用获取对象属性执行,只查询在不在`__dict__`中的属性
- `__setattr__(self,attr,value)`:在对对象属性赋值时执行
- `__delattr__(self,attr)`:在删除属性时执行
- `__getattribute__(self,name)`: 在调用获取对象**任意**属性时执行,和getattr比,任意属性都会调用
- `__str__(self)`: 在str()时执行相应功能
- `__repr__(self)`: 是输出和打印出来显示的内容.有时可以和`__repr__=__str__`解决
- `__len__(self)`: len()函数时返回长度的行为
- `__iter__(self)`: 作为可迭代对象时返回迭代器本身(或转为迭代器).

模组有:

`__name__`: 模组名




判断对象是否有指定属性:

1. hasattr(obj,attr): 返回真假(通过getattr异常与否来实现)
2. dir(obj): 列出对象现有属性
3. 通过try: obj.attr; except AttributeError: pass

1. [特殊方法](https://docs.python.org/2/reference/datamodel.html#special-method-names)

------
