---
layout: post
title: MySQL学习6-外部数据交流
date: 2015-07-06 4:24:32
categories: MathStat
tags: Database SQL
---

导入外部数据文本:   
1.执行外部的sql脚本   
当前数据库上执行:mysql < input.sql  
指定数据库上执行:mysql [表名] < input.sql  
2.数据传入命令 load data local infile "[文件名]" into table [表名];   
备份数据库：(dos下)   
mysqldump --opt school>school.bbb   
mysqldump -u 用户名  -p  需要备份的数据库名 >备份的文件的保存路径和文件名

备份数据库：(将数据库test备份)   
mysqldump -u root -p test>c:/test.txt   
备份表格：(备份test数据库下的mytable表格)   
mysqldump -u root -p test mytable>c:/test.txt   
将备份数据导入到数据库：(导回test数据库)   
mysql -u root -p test   

创建临时表：(建立临时表zengchao)   
create temporary table zengchao(name varchar(10));  

create table if not exists students(……); 

5、从已经有的表中复制表的结构   
create table table2 select * from table1 where 1<>1;   
  
6、复制表   
create table table2 select * from table1;   

修改列的类型   
alter table table1 modify id int unsigned;//修改列id的类型为int unsigned   
alter table table1 change id sid int unsigned;//修改列id的名字为sid，而且把属性修改为int unsigned 

联合字符或者多个列(将列id与":"和列name和"="连接)   
select concat(id,'':'',name,''='') from students;   

limit(选出10到20条)<第一个记录集的编号是0>  
select * from students order by id limit 9,10;   

3、显示数据表的结构：   
  
describe 表名;  

导入数据库备份文件：   
(1).在mysql命令窗口   
(2).新建一个要导入的数据库(因为备份中没有备份建数据库操作)   
(3).use 当前库名   
(4).source 备份的文件的保存路径和文件名(此命令不能加分号结尾)  

分页查询：select *from 表名 limit 每页数量 offset 偏移量;
3.查看表的结构：desc 表名   

查询时间：select now();   
查询当前用户：select user();   
查询数据库版本：select version();   
查询当前使用的数据库：select database();

create table 表名(规范为tbl_表名)   
(   
id int auto_increment primary key,( auto_increment为自动增长)   
name varchar(20) primary key   
)ENGINE=InnoDB DEFAULT CHARSET=gbk//支持事务和设置表的编码  

---
