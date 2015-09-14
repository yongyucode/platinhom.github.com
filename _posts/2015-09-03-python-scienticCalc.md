---
layout: post
title: python科学计算软件安装
date: 2015-09-14 07:01:29
categories: Coding
tags: Python
---

Mac安装:
先安装homebrew

然后

~~~bash
brew install python --framework --universal #fw是告诉是一个框架用于安装别的东东.universal是32/64都装
easy_install pip  ##可能已经会安装上了

## 以下是科学计算一般需要的库
pip install numpy
pip install scipy
pip install ipython
pip install matplotlib
pip install pandas
pip install sympy
pip install nose
~~~


~~~
pip install jupyter
pip install "ipython[notebook]"
~~~

要是`No module named notebook.notebookapp`就要`pip install jupyter`安装一个附加工具[jupyter](http://jupyter.org/).

运行[notebook](http://ipython.org/notebook.html)使用命令行命令: `ipython notebook`

要使用qtconsole,就需要装上jupyter, qt, sip, pyqt几个东西.否则报错说No module或者Qt library找不到.

~~~
pip install jupyter
brew install qt
brew install sip
brew install pyqt
~~~
运行[qtconsole](http://ipython.org/ipython-doc/stable/interactive/qtconsole.html?highlight=qtconsole)使用命令行命令: `ipython qtconsole`

scipy官网推荐使用懒人用macports安装办法.需要先安装macports,使用port命令:

`sudo port install py27-numpy py27-scipy py27-matplotlib py27-ipython +notebook py27-pandas py27-sympy py27-nose`
这样就会一次性自动安装好多好多相关程序.


## Reference

1. [iPython](http://ipython.org/index.html)
2. [SciPy](http://www.scipy.org/index.html)
3. [Installing Python, virtualenv, NumPy, SciPy, matplotlib and IPython on Lion or Mountain Lion](http://www.thisisthegreenroom.com/2011/installing-python-numpy-scipy-matplotlib-and-ipython-on-lion/)

------
