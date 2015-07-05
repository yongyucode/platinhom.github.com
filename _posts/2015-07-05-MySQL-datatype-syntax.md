---
layout: post
title: MySQL学习3-数据和数据操作
date: 2015-07-05 06:59:48
categories: MathStat
tags: Database SQL
---

SQL 对大小写不敏感！

## 三大数据类型

1. 数字类型
	- 整数: tinyint、smallint、mediumint、int、bigint
	- 浮点数: float、double、real、decimal
2. 日期和时间: date、time、datetime、timestamp、year
3. 字符串类型
	- 字符串: char、varchar
	- 文本: tinytext、text、mediumtext、longtext
	- 二进制(可用来存储图片、音乐等): tinyblob、blob、mediumblob、longblob



## 数据选择

### where子句 `where 列 运算符 值`
常用`SELECT 列名称 FROM 表名称 WHERE 列 运算符 值`,一般在select,update,delete中用.  
条件值使用单引号来表明是字符串,数值型不要使用单引号。

- `=`	等于
- `<>`	不等于(mysql还支持用!=)
- `>`	大于
- `<`	小于
- `>=`	大于等于
- `<=`	小于等于
- `BETWEEN .. AND`	在某个范围内
- `LIKE`	搜索某种匹配模式
- `IN`  后面是(值1,值2..).多种可能指定值匹配
- `not` 不满足后面条件的.
- `and` 两个不同条件的同时匹配
- `or` 两个不同条件匹配其中之一. 复杂条件运算请多使用括号.
- `REGEXP` 后面跟正则表达式.参看Ref4

### SQL 通配符和Like操作符
在对字符串数据匹配时使用.注意在权限啊列选择啊等时还是使用一般的"*".  
一般配合Like操作符使用`LIKE 'C%on'`这样,需要LIKE关键词

- `%`	替代一个或多个字符
- `_`	仅替代一个字符
- `[charlist]`	字符列中的任何单一字符
- `[^charlist]或者[!charlist]`	不在字符列中的任何单一字符

## Reference

1. [mysql数据类型](http://www.cnblogs.com/zbseoag/archive/2013/03/19/2970004.html)
2. [W3S-SQL 数据类型](http://www.w3school.com.cn/sql/sql_datatypes.asp)
3. [RUNOOB-MySQL教程](http://www.runoob.com/mysql/mysql-tutorial.html)
4. [MySQL-正则表达式](http://www.runoob.com/mysql/mysql-regexp.html)

---
