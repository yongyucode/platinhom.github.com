---
layout: post
title: Python迭代器
date: 2015-09-06 20:49:30
categories: Coding
tags: Python
---

迭代器(Iterator)对象：

~~~python
# 创建一个列表迭代器(listiterator)
>>> i1 = iter([1, 2, 3])  # iter是Python BIF，用于生成迭代器，文档见底部
>>> type(i1)
<type 'listiterator'>
>>> i1
<listiterator object at 0x1cedf50>

# 创建一个字典项迭代器(dictionary-itemiterator)
>>> d = dict(a = 1, b = 2)
>>> i2 = d.iteritems()  # 生成iterator对象，对于字典来说还有iterkeys, itervalues等方法可用
>>> i2
<dictionary-itemiterator object at 0x1dfe208>
>>> [e for e in d.iteritems()]  # dict.iteritems方法生成的是迭代器元素为键值对形式
[('a', 1), ('b', 2)]

# 另外还有tuple/set等都可使用iter函数返回iterator对象
~~~

步进式访问迭代器(Iterator)中元素

~~~python
>>> i = iter(range[3])
>>> i.next()
0
>>> i.next()
1
>>> next(i)  # next() - python2.6新增BIF，作用同iterator.next()
2
>>> next(i)  # 无元素可迭代时，抛出StopIteration异常，可以通过捕获此异常判断是否迭代完毕
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
StopIteration
~~~

遍历迭代器(Iterator)：

~~~python
# 手动循环
try:
    while True:
        next(i)  # python2.6之前版本使用iterator.next()方法
except StopIteration:
    print 'Done'

# for循环
>>> i = iter(range(3))
# 以下句法叫做列表解析，这与生成器表达式类似，之后文章介绍生成器时再记
>>> [e for e in i]  # for在这里不断调用next函数，直到捕获StopIteration异常后退出
[0, 1, 2]
~~~

将迭代器(Iterator)传递给其他函数使用：

~~~python
>>> list(iter(range(3)))
[0, 1, 2]
~~~

帮助迭代器(Iterator)实现索引功能：

~~~python
>>> i = iter('abc')  # python中字符串也是可迭代对象
>>> [(k, v) for k, v in enumerate(i)]  # enumerate返回一个元素为tuple的iterator，文档见底部
[(0, 'a'), (1, 'b'), (2, 'c')]
~~~

注：
iter函数 - [文档](https://docs.python.org/2/library/functions.html#iter)
enumerate函数 - [文档](https://docs.python.org/2/library/functions.html#enumerate)

[Python迭代器和生成器](http://www.cnblogs.com/wilber2013/p/4652531.html)

------
