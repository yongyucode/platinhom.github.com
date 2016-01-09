---
layout: post
title: 必应学术搜索
date: 2016-01-08 20:54:26
categories: IT
tags: Website Python
---

&filters=time%3age2014 (time:ge2104)

&first=11 从第11个结果开始.

搜索结果: 

- body > div#b\_content > ol#b\_results >  li.b_algo 就是每个结果
- 搜索结果每条: 
	- h2 -> a : 结果title以及对应链接
	- div.b_caption : 后面的信息
		- div.b\_snippet -> div.b\_attribution -> cite : 就是链接地址
		- div.b\_snippet -> p : 就是摘要, 作者信息等.
		- div.sa\_uc -> ul.b\_vList -> li.b\_annooverride -> div.b\_acedemicanswer : 内含下面一块文献信息
			- div.b_hPanel (span 作者): 作者信息
			- div.b_hPanel (span 期刊): 期刊信息和年份
			- div.b_hPanel (span 关键字): 关键词信息
			- div.b\_factrow : 内含被引数和引用/下载的按钮
				- div.b_hPanel -> span 被引数 -> span 被引数量 -> span.b\_citeItem (含有data-paperid) 引用
				- div.b_hPanel -> span 被引数 -> span 被引数量 -> span.b\_downloadItem (含有data-paperid) 下载
- body > div#b\_content > ol#b\_results > li (data-bm) > div.b\_pag > ul > li > a 各种下一页.

### 引用和download

点击引用后显示的内容:

`http://mylib.chinacloudsites.cn/Paper/Bibliography/%PaperId%`

点击相应文献工具后对应的:

- BibTeX: `http://mylib.chinacloudsites.cn/Paper/Citation/%PaperId%?type=bibtex`
- EndNote: 	`http://mylib.chinacloudsites.cn/Paper/Citation/%PaperId%?type=endnote`
- RefMan: `http://mylib.chinacloudsites.cn/Paper/Citation/%PaperId%?type=refman`
- RefWorks: `http://mylib.chinacloudsites.cn/Paper/Citation/%PaperId%?type=refworks`

点击下载后实际加载内容:

`http://mylib.chinacloudsites.cn/Paper/Download/%paperId%`

以上经测可以爬

------
