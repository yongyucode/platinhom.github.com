---
layout: post
title: Amber原子选取语法(Atom Mask Selection Syntax)
date: 2016-04-01 08:32:14
categories: CompCB
tags: CompBiol Amber
---

在Amber14手册可以参考: `28.2.3. Atom Mask Selection Syntax`

首先, 在命令行使用时要使用字符串形式`"mask"`, 在配置文件可以没有.

- `:`,`@`和`*`是保留字符,要注意! 
- 可以使用范围匹配符`-`
- 可以使用`,`作为分隔各成分
- 可以使用逻辑操作符`&`,`|`和`!`
- 对于使用名字, 大小写敏感!

### 选取残基

主要使用`:`,后面可以是编号或者残基名

- `:{residue numlist}` e.g. `[:1-10]`,`[:1,3,5]`,`[:1-3,5,7-9]`
- `:{residue namelist}` e.g. `[:LYS]`,`[:ARG,ALA,GLY]`

### 选取原子

主要使用`@`,后面可以是原子编号或者原子名. 如果要使用原子类型(就是力场类型一类的), 可以使用`@%类型名`; 如果要使用元素,使用`@/元素名`.

- `@{atom numlist}` e.g. `[@12,17]`,`[@54-85]`,`[@12,54-85,90]`
- `@{atom namelist}` e.g. `[@CA]`,`[@CA,C,O,N,H]`
- `@%{atom type name}` e.g. `[@%CT]`
- `@/{atom_element_name}` e.g.`[@/N]`

### 基于距离选取



### 实例

- `@CA,C,O,N,H` 所有主链backbone原子
- `!@CA,C,O,N,H` 所有非主链backbone原子 (注意可能包含水,离子,配体,蛋白残基侧链).
- `:5,10@CA` 残基5和10的CA原子

------
