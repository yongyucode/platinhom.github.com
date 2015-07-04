---
layout: post
title: MySQL学习2-数据库和报表
date: 2015-07-04 10:30:52
categories: MathStat
tags: Database
---

## 数据库

### 创建数据库

- `create database test_db character set gbk;`  
创建数据库,并设定字符编码.数据库名为test_db.注意最后分号语句结束的存在!不加分号会在下一行输入. 成功后 Query OK, 1 row affected(0.02 sec). 失败的话,可能没有权限如`ERROR 1044 (42000): Access denied for user 'Hom'@'localhost' to database 'hom_db'`.
- 数据库保存位置参看配置文件(my.ini/my.cnf)中`data_home_dir`相关信息,window一般在安装目录下data文件夹或者programdata/mysql下的data文件夹,linux系统一般在某个文件夹下var/mysql下.例如在xamppfiles目录下. 数据库名对应的是文件夹,里面报表文件等.

### 选择操作的数据库

- 可以使用 `show databases`; 命令查看已经创建了哪些数据库。注意复数..
- 登录时, 使用-D选项指明 `mysql -D 所选择的数据库名 -h 主机名 -u 用户名 -p`.
- 登录后,使用use. ` use 数据库名;`.
- 只能选择操作一个数据库.使用use后会改变操作的数据库对象.

### 删除数据库

- `drop database name` 删除指定数据库
- `drop database if exists name;` 如果存在则删除

## 数据库表

### 创建数据库表

- 格式: `create table 表名称{列声明};` 列声明是表头.
- 列声明结构块: `{条目1,条目2...条目N}`,逗号分隔,一般为了好看分行.
- 条目的格式:`名字 类型 可否为空 其余限定`.前三者是必须的: 名字随便取.类型参看另一篇的说明,可否为空为`null/not null`,默认可为空. 全部用空格分隔. 
	- 这么多条目中需有一个主键. 这个主键是唯一的,用`primary key`声明. `id int unsigned not null auto_increment primary key,`就是一个主键例子.
	- 主键一般伴随`auto_increment`(需在整数列中使用, 其作用是在插入数据时若该列为 NULL, MySQL将自动产生一个比现存值更大的唯一标识符值。在每张表中仅能有一个这样的值且所在列必须为索引列。)
	- `default '-'` 缺省值是'-'.
- 使用 `show tables;`命令可查看已创建了表的名称.注意复数..
- 使用 `describe 表名;` 命令可查看已创建的表的详细信息。

### 简单的输入和操作数据


### 修改数据库表

- `alter table 表单 操作` 修改数据库表,包括:
	- `alter table 表名 add 列名 列数据类型 [after 插入位置];` 插入新列. after可以指明在哪列(列头名)之后插入,否则就追加.
	- `alter table 表名 change 列名称 列新名称 新数据类型;` 更改数据类型.就是把定一个列条目时的东东写一遍.
	- `alter table 表名 drop 列名称;` 删除一列
	- `alter table 表名 rename 新表名;` 重命名数据库表
- `drop table 表名;` 删除库表.

## Reference

1.[w3school-sql](http://www.w3school.com.cn/sql/index.asp)
2.[21分钟 MySQL 入门教程](http://www.cnblogs.com/mr-wid/archive/2013/05/09/3068229.html#d17)

---
