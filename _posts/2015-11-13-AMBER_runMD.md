---
layout: post
title: AMBER:一般动力学流程
date: 2015-11-13 11:21:28
categories: CompCB
tags: CompBiol MD
---

## 参数文件位置

- Amber/dat/leap/cmd/ : source加载的一系列力场等文件所在
- Amber/dat/leap/cmd/oldff : source加载的一系列力场等**旧版**文件所在, 如source oldff/leaprc.ff99SB
- Amber/dat/antechamber/ : antechamber处理小分子时的参数, 包括原子类型, parmchk等. 

[ParmEd: top文件加工](http://jswails.wikidot.com/parmed)

bin/parmed.py 以及对应在bin/ParmEd文件夹呢的脚本

babel abc.sdf -O out.mol2 -m # 分割文件并转为mol2, 文件名为out1.mol2,out2.mol2


------
