---
layout: post
title: Python:获取文献PDF文献doi
date: 2015-12-20 16:51:07
categories: Coding
tags: Python
keywords: "doi, pdf, python, pdfminer, regex" 
---

# Get DOI number from PDF file based on python 

-----

只能针对第一页具有doi号并且pdf不是扫描版..

需要安装python模块: [pdfminer](https://euske.github.io/pdfminer/)  
测试在python 2.7.10 上实现.

### 原理

- pdfminer读取pdf首页 (以后可以加入选项读取指定页码). [参考](/2015/12/18/pdfminer/)
- 正则表达式从输出内容中抓取doi号 (只支持`10.*/*`形式, 要是`10.*.*`暂不支持). [参考](http://stackoverflow.com/questions/27910/finding-a-doi-in-a-document-or-page)

### 使用

~~~bash
# 获取一个/多个pdf文件doi
# 输出屏幕: 文件名 Found: doi号
python getfiledoi.py a.pdf b.pdf c.pdf Done/*.pdf

# 根据doi号重命名文件, -r 选项
# 文件名为: 出版商号@文献号 , 如10.1021@jp123456f
python getfiledoi -r a.pdf

# 只输出doi号, 没有就空输出
python getfiledoi -d a.pdf
~~~

<script src="https://gist.github.com/platinhom/07475ec4efc514dd90d8.js?file=getfiledoi.py"></script>

------
