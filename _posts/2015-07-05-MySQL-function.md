---
layout: post
title: MySQL学习5-函数部分
date: 2015-07-05 11:48:41
categories: MathStat
tags: Database SQL
---

AVG(字段名) 得出一个表格栏平均值   
COUNT(*|字段名) 对数据行数的统计或对某一栏有值的数据行数统计   
MAX(字段名) 取得一个表格栏最大的值   
MIN(字段名) 取得一个表格栏最小的值   
SUM(字段名) 把数据栏的值相加   

select count(id) from test.text count()表示查询有多少条信息 这样根据表显示出10条   
select max(regdate) from test.text max() 查询最大值 只能针对数字 包括日期 根据表显示出2008-10-22 14:41:30   
select min(regdate)from test.text min() 查询最小值 只能针对数字 包括日期 根据表显示出2008-10-07 13:21:32   
select avg(id) from test.text   avg() 查询平均值 也只针对数字 包括日期 显示出5.5 如算平均分数   
select sum(id) from test.text   sum() 查询累计值 数字包括日期 显示出55 1+2+3+。。10=55 如算总分数   


联合字符或者多个列(将列id与":"和列name和"="连接)   
select concat(id,'':'',name,''='') from students; 

IFNULL(列名,0) 或 COALESCE(列名,0): 要是该列是null则按0处理.尤其将两列求和时重要.

---
