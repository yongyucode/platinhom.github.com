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
- 可以使用 `show databases`; 命令查看已经创建了哪些数据库。
- 数据库保存位置参看配置文件(my.ini/my.cnf)中`data_home_dir`相关信息,window一般在安装目录下data文件夹或者programdata/mysql下的data文件夹,linux系统一般在某个文件夹下var/mysql下.例如在xamppfiles目录下. 数据库名对应的是文件夹,里面报表文件等.

### 选择操作的数据库

- 登录时, 使用-D选项指明 `mysql -D 所选择的数据库名 -h 主机名 -u 用户名 -p`.
- 登录后,使用use. ` use 数据库名;`.
- 只能选择操作一个数据库.使用use后会改变操作的数据库对象.

### 删除数据库

- `drop database name` 删除指定数据库
- `drop database if exists name;` 如果存在则删除


## Reference

1.[w3school-sql](http://www.w3school.com.cn/sql/index.asp)

---
