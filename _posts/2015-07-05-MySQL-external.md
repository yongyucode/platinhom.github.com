---
layout: post
title: MySQL学习6-外部数据交流
date: 2015-07-05 04:24:32
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

---
