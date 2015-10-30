---
layout: post
title: Python:元类metaclass
date: 2015-10-23 05:17:21
categories: Coding
tags: Python
---

元类就是类的类. 实际上,我们用`class` 关键词创建的类也是一个对象也就是我们常说的类其实也是通过一个底层的类来构建的,这个类就是元类(metaclass).

## 元类和类

先看一段代码:

~~~python
class C():pass
class CC(object):pass
c=C();
cc=CC();
type(C)
# <type 'classobj'>
type(CC)
# <type 'type'>
type(c)
# <type 'instance'>
type(cc)
# <class '__main__.CC'>

print C
# __main__.C
print CC
# <class '__main__.CC'>
print c
# <__main__.C instance at 0x1096f4320>
print cc
# <__main__.CC object at 0x1096ed950>

BB=CC
bb=BB();
print bb
# <__main__.CC object at 0x1096eda10>
~~~

以上是经典的查看经典类和新型类(继承自object)信息的代码. 经典类的类叫 **classobj**, 而新式类的类叫 **type**. 经典类对象的类是熟知的**instance**, 而新式类的对象的类则是创建该类的类对象`__main__.CC`. 打印出来的效果也是,新式类才是真的类,其对象也才是真的object对象.

新式类本事其实也是一个对象, 可以用变量接收, 可以作为函数参数传递甚至返回, 可以拷贝, 可以添加新属性, 可以创造对象(类的特性). 例如上述例子用BB接收类,用BB同样可以创造CC类的对象.

新式类的类叫`type`, 这个type就是元类. 可以用元类来创建我们所熟知的新式类. 

## type函数利用元类创建新式类

我们可以使用type函数来获取类型,同样也可以用该函数创造一个类,取决于参数. `type(类名, 父类的元组（针对继承的情况，可以为空），包含属性的字典（名称和值）)`, 例如:

~~~python
CCC=type('CCC',(),{});
ccc=CCC()
print CCC
# <type 'type'>
print ccc
# <__main__.CCC object at 0x1096ed990>
~~~

这里使用type创建一个新式类, (虽然不继承任何类,但实际继承了object, 用一个变量CCC接收, 这个变量实际就是类名, 类似于上面的CC和BB.而实际类对象类型取决于type第一个参数字符串. 如果不加后面的元组和字典, type一个字符串返回的是<type 'str'>. 

例如CCCC继承自CCC并且有个方法fun,属性attr:

~~~python
def fun():pass
CCCC=type('CCCC',(CCC,),{'attr':True,'fun':fun})

class CCCC(CCC):
	self.attr=True
	self.fun=fun
~~~

实际上我们使用class关键词创建新式类时是调用了type函数来实现的.

## `__metaclass__`类属性

`__metaclass__`属性用于指明该类创建时使用的元类. 如果没有该属性,则使用type来创建. 注意, 这个过程是逐层搜的, 首先搜索该类的定义, 再搜索继承的父类, 要是还找不到就在模块里面找, 模块级别都找不到该属性, 就用type来创建. 例如上述CCCC的class式定义中,首先搜索CCCC类的定义,其次是CCC父类,再是模组(main这里), 最后才是用type. 

决定了`__metaclass__`以后, 则用其来创建一个类对象. 那么, 这个元类怎么创建类对象呢...怎么定义自己的元类呢..

## 自定义元类.


## Reference

1. [深刻理解Python中的元类(metaclass)](http://blog.jobbole.com/21351/)
2. [Python Types and Objects](http://www.cafepy.com/article/python_types_and_objects/python_types_and_objects.html)


------
