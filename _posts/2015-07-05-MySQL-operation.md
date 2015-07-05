---
layout: post
title: MySQL学习4-操作命令
date: 2015-07-05 10:37:58
categories: MathStat
tags: Database SQL
---

# 主句

## 数据

- `SELECT`: 选择和显示数据
	- `select 列名称 from 表名称 [查询条件];` 一般通式. 可以选择1或多列数据(多列名要`,`分隔)
	- `select 列名称 from 表名称 where 列 运算符 值;` where子句用于查询条件,请参看where子句
	- `SELECT DISTINCT 列 FROM 表 ` distinct关键词就是选取结果不重复
	- `select 列名称 from 表名称 order/desc by 列` 根据列来升序/降序排列结果
- `INSERT`: 插入一行数据
	- `INSERT INTO 表名称 VALUES (值1, 值2,....)` 输入所有值并插入,不需要列名
	- `insert [into] 表名 (列名1, 列名2, 列名3, ...) values (值1, 值2, 值3, ...);` 可以选择只填个别值.列和值要对上.
- `UPDATE`:更新修改数据
	- `UPDATE 表名称 SET 列名称 = 新值 WHERE 列名称 = 某值` 将满足条件该行某列值替换掉.前后列名无需相同. 多个同时替换时使用`,`分隔.
	- `UPDATE 表名称 SET 列名称 = 新值` 所有行对应列均进行如此修改
- `DELETE`:删除某行.删除一个值使用UPDATE办法
	- `DELETE FROM 表名称 WHERE 列名称 = 值` 删除满足条件的行
	- `DELETE FROM 表名称` 删除所有行数据
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
- `SHOW` 显示对象,对象一般复数
	- `show databases`
	- `show tables`
	- `show columns from tablename;`
	- `SHOW INDEX FROM table_name`
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

# 子句

- `where 列 运算符 值`: 常用查询条件,一般在select,update,delete中用.
	- `where 列1 = 值1 and/or 列2 <> 值2` 比较运算符和逻辑运算符匹配
	- `where 列 like 匹配串;` Like操作符使用字符串匹配来查询
	- `where 列 in (value1,value2);` 满足其中一个值
	- `where 列 between val1 and val2` 在两个值之间,mySQL是包括两头(不同SQL语言定义不同,有的是[],有的是[), 有的是().)
	- `where 列 not 上面条件` 不符合条件的
- `order by colA [asc], colB [desc]`: 按升序/降序排列结果, 先按colA来排,相同的根据colB来排.asc升序默认,desc降序
- `group by`
- `Limit n`头几行;`limit n,m` 就是n+1到n+m行(即默认n=0). SQL`TOP number/ n PERCENT`: 头几行:不是所有都支持. Oracle使用查询条件 `WHERE ROWNUM <= n` 
- `group by remark order by regdate limit 6` 先分组 再排序 再显示前6行.LIMIT放最后 这是语法不能颠倒。


---
