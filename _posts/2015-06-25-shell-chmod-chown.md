---
layout: post
title: Linux权限:chmod和chown小结
date: 2015-06-25 00:30:15
categories: CompSci
tags: Bash Shell
---

今天William在使用PHP提交任务时总是不成功,估计是`exec()`指令的问题.由于不太了解PHP, 所以也比较头痛. 后来测试他的PHP可以运行程序,有返回结果,但是却没有输出文件, 比较奇怪. 最后在tmp新建个777文件夹后测试问题解决.原来还是Linux权限的问题, 提交任务的用户没有权限写文件. 这可能是搭建服务器很关键的问题. 这里总结下chmod 和 chown两个指令的用法.

## chmod

## chown

---
