---
layout: post
title: MySQL学习4-操作命令
date: 2015-07-04 10:37:58
categories: MathStat
tags: Database SQL
---

## 数据

- `SELECT`: 选择和显示数据
	- `select 列名称 from 表名称 [查询条件];` 一般通式. 可以选择1或多列数据(多列名要`,`分隔)
	- `select 列名称 from 表名称 where 条件;` where相当于条件筛选呗.
- `INSERT`: 插入一行数据:`insert [into] 表名 [(列名1, 列名2, 列名3, ...)] values (值1, 值2, 值3, ...);`
- `UPDATE`
- `DELETE`
- `FILE`

## 结构

- `CREATE`: 创建数据库,报表等
	- `create database 数据库名 选项;` 
	- `create table 表名称{列声明};` 
- `ALTER`: 修改报表信息
	- `alter table 表名 add 列名 列数据类型 [after 插入位置];` 插入新列. after可以指明在哪列(列头名)之后插入,否则就追加.
	- `alter table 表名 change 列名称 列新名称 新数据类型;` 更改数据类型.就是把定一个列条目时的东东写一遍.
	- `alter table 表名 drop 列名称;` 删除一列
	- `alter table 表名 rename 新表名;` 重命名数据库表
- `INDEX`
- `DROP`: 删除数据库或报表
	- `drop database [if exist] 数据库名 `
	- `drop table 表名;`
- `CREATE TEMPORARY TABLES`
- `SHOW VIEW`
- `CREATE ROUTINE`
- `ALTER ROUTINE`
- `EXECUTE`
- `CREATE VIEW`
- `EVENT`
- `TRIGGER`

## 管理

- `GRANT` 授权
- `REVOKE` 取消授权
- `SUPER`
- `PROCESS`
- `RELOAD`
- `SHUTDOWN`
- `SHOW DATABASES`
- `LOCK TABLES`
- `REFERENCES`
- `REPLICATION CLIENT`
- `REPLICATION SLAVE`
- `CREATE USER`

---
