---
layout: post
title: Python调用Fortran
date: 2015-08-13 11:53:56
categories: Coding
tags: Python
---

fortran90程序pow.f90：

~~~fortran
SUBROUTINE pow(x,n,p)
  IMPLICIT NONE
  !f2py intent(in) x
  !f2py intent(in) n
  !f2py intent(out) p
  REAL(KIND=8) :: x,n,p
  
  p = x**n

END SUBROUTINE pow
~~~

这三个 

~~~fortran
  !f2py intent(in) x
  !f2py intent(in) n
  !f2py intent(out) p
~~~
必须要有！

接着终端利用`f2py`编译,生成*pow.so*库.

~~~bash
f2py -m pow -c pow.f90
~~~

然后test.py内容：

~~~python
#!/usr/bin/env python

import pow as pw

x = 3.
n = 3.5
p = pw.pow(x,n)
~~~

------
