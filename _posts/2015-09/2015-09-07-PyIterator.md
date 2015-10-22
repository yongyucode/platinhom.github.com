---
layout: post
title: Python迭代器和生成器
date: 2015-09-06 20:49:30
categories: Coding
tags: Python
---

## 可迭代对象Iterable

凡是可以用作for循环的都是可迭代对象,包括一般的list,tuple,set,dict,迭代器和生成器(或生成器函数)等.

可迭代对象可以通过`iter(obj)`生成迭代器. 可迭代对象本质是数据流,一个接一个的数据,但不一定像迭代器和生成器一样记住迭代到那个点, 下一个是什么, 利用iter()函数可以将list等转变为迭代器(其实是生成器), 逐个元素投出.

可以通过`isinstance(obj, Iterable)`来判断对象是否可迭代对象.

## 迭代器(Iterator)对象：

凡是可以通过next()方法返回下一个值的可迭代对象就是迭代器. 生成器是一种迭代器.

可以通过`isinstance(obj, Iterator)`来判断对象是否迭代器.

迭代到没有值了返回`StopIteration`错误.

## generator生成器对象

生成器通过`生成器函数`产生, 生成器函数可以通过常规的def语句来定义, 不用return而是使用`yield`一次返回一个结果, 返回后停在相应位置, 再次调用时继续执行生成下一个结果, 当生成器结束没有下次执行时, 返回`StopIteration`.

~~~python
# 生成器函数
def fib(max):
    n, a, b = 0, 0, 1
    while n < max:
        #生成器关键一步yield,每次执行到此返回,下次从此开始.
        yield b
        a, b = b, a + b
        n = n + 1
# 通过生成器函数产生生成器对象
g=fib(6);
# 单独调用生成器对象
print g.next();
# 利用循环迭代生成器
for i in g:
    print i
~~~

## list等的迭代器.

通过iter()函数将list/dict等数据组组转为迭代器.

~~~python
# 创建一个列表迭代器(listiterator)
i1 = iter([1, 2, 3])  # iter是Python BIF，用于生成迭代器，文档见底部
type(i1)
<type 'listiterator'>
i1
<listiterator object at 0x1cedf50>

# 创建一个字典项迭代器(dictionary-itemiterator)
d = dict(a = 1, b = 2)
i2 = d.iteritems()  # 生成iterator对象，对于字典来说还有iterkeys, itervalues等方法可用
i2
<dictionary-itemiterator object at 0x1dfe208>
[e for e in d.iteritems()]  # dict.iteritems方法生成的是迭代器元素为键值对形式
[('a', 1), ('b', 2)]

# 另外还有tuple/set等都可使用iter函数返回iterator对象
~~~

步进式访问迭代器(Iterator)中元素

~~~python
i = iter(range[3])
i.next()
0
i.next()
1
next(i)  # next() - python2.6新增BIF，作用同iterator.next()
2
next(i)  # 无元素可迭代时，抛出StopIteration异常，可以通过捕获此异常判断是否迭代完毕
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

TODO:

------
