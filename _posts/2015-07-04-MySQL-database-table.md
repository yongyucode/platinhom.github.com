---
layout: post
title: MySQL学习2-数据库和报表
date: 2015-07-04 10:30:52
categories: MathStat
tags: Database SQL
---

## 数据库

### 创建数据库

- `create database test_db character set gbk;`  
创建数据库,并设定字符编码.数据库名为test_db.注意最后分号语句结束的存在!不加分号会在下一行输入. 成功后 Query OK, 1 row affected(0.02 sec). 失败的话,可能没有权限如`ERROR 1044 (42000): Access denied for user 'Hom'@'localhost' to database 'hom_db'`.
- 数据库保存位置参看配置文件(my.ini/my.cnf)中`data_home_dir`相关信息,window一般在安装目录下data文件夹或者programdata/mysql下的data文件夹,linux系统一般在某个文件夹下var/mysql下.例如在xamppfiles目录下. 数据库名对应的是文件夹,里面报表文件等.

### 选择操作的数据库

- 可以使用 `show databases`; 命令查看已经创建了哪些数据库。注意复数..
- 登录时, 使用-D选项指明 `mysql -D 所选择的数据库名 -h 主机名 -u 用户名 -p`.
- 登录后,使用use. `use 数据库名;`.
- 只能选择操作一个数据库.使用use后会改变操作的数据库对象.

### 删除数据库

- `drop database name` 删除指定数据库
- `drop database if exists name;` 如果存在则删除

## 数据库表
数据库就如同一个excel文件, 而数据库表则相当于excel里面的每个sheet. 一个数据库可以包含多个数据库表.数据库表和sheet还是有区别的, 其有更严格的格式需求,虽然看上去差不多.  
![](http://images.cnitblog.com/blog/453818/201305/09030127-13657abaf11945d1916297e6d23f2ec9.png) 

- 表头(header): 每一列的名称;必须
- 列(row): 具有相同数据类型的数据的集合;
- 行(col): 每一行用来描述某个人/物的具体信息;
- 值(value): 行的具体信息, 每个值必须与该列的数据类型相同;
- 键(key): 表中用来识别某个特定的人\物的方法, 键的值在当前列中具有唯一性,又叫索引列.

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

- 插入一行数据: 插入一行数据:`insert [into] 表名 [(列名1, 列名2, 列名3, ...)] values (值1, 值2, 值3, ...);`.可以不值列名按顺序代入;也可以指明列名和对应的值,排好队就好了;有缺省值或自增的可以不指明.
	- `insert into students values(NULL, "王刚", "男", 20, "13811371377");`
	- `insert into students (name, sex, age) values("孙丽华", "女", 21);`
- 读取一列数据: `select 列名称 from 表名称 [查询条件];`
	- `select name, age from students;`
	- `select * from students where sex="女";`
- 修改数据: `update 表名称 set 列名称=新值 [where 更新条件];`
	- `update students set age=age+1;` 无条件全部操作
	- `update students set tel=default,age=19 where id=5;`通过某些条件定位到行.可以同时修改两项,逗号分隔.
- 删除数据: `delete from 表名称 where 删除条件;`
	- `delete from students where id=2;`删除一行
	- `delete from students;`删除所有

### 修改数据库表

- `alter table 表单 操作` 修改数据库表,包括:
	- `alter table 表名 add 列名 列数据类型 [after 插入位置];` 插入新列. after可以指明在哪列(列头名)之后插入,否则就追加.
	- `alter table 表名 change 列名称 列新名称 新数据类型;` 更改数据类型.就是把定一个列条目时的东东写一遍.
	- `alter table 表名 drop 列名称;` 删除一列
	- `alter table 表名 rename 新表名;` 重命名数据库表
- `drop table 表名;` 删除库表.

### 索引

1. 建立索引:
	- `CREATE INDEX [索引列名] ON [表名] ([字段名]);` 
create index ind_id on table1 (id);   
create unique index ind_id on table1 (id);//建立唯一性索引 
	- `alter table table_name add unique (column_list);`
`alter table table1 add index ind_id (id);` 
`alter table table_name add unique (column_list);`
2. 删除索引   
`drop index idx_id on table1; `  
`alter table table1 drop index ind_id;`

### Alter的修改数据库表和insert/select/Update/delete区别?
数据报表是以表头header为基础组织数据的,就像三维空间有XYZ三个坐标一样.而数据则是以每行每行每行的形式储存的,如每个原子的数据.  
修改原子的数据,就是操作数据, 选用insert/select/Update/delete, 而where定位条件是`列=条件`去操作,相当于操作某些指定原子.  
而Alter进行操作则是改变数据结构了, 例如新增原子半径, 原子电荷, 变为2维坐标. 均是整列整列操作, 没有行的筛选条件(因为对所有对象都起效). 要对行的某些数据进行操作, 又回到之前的insert/select/Update/delete+where去了.

## Reference

1. [w3school-sql](http://www.w3school.com.cn/sql/index.asp)  
2. [21分钟 MySQL 入门教程](http://www.cnblogs.com/mr-wid/archive/2013/05/09/3068229.html#d17) 

---
