---
layout: post
title: Python:Requests外插
date: 2015-12-24 15:26:58
categories: Coding
tags: Python
---

Requests 就是熟知的[Requests: HTTP for Humans](http://cn.python-requests.org/zh_CN/latest/) , 是个开源在[Github](https://github.com/kennethreitz/requests/)上的项目.

安装: `pip install requests` 搞掂...

<iframe src="http://cn.python-requests.org/zh_CN/latest/" width="100%" height="600px"></iframe>

#### 获取自动跳转真实地址

~~~python
import urllib2, requests
u=urllib2.urlopen("http://dx.doi.org/10.1016/S1093-3263(00)80106-0")
# -> 报错"HTTPError: HTTP Error 404: Not Found" 
# -> 因为网站有防抓取功能
r = requests.get("http://dx.doi.org/10.1016/S1093-3263(00)80106-0")
print r.url
# -> http://www.sciencedirect.com/science/article/pii/S1093326300801060
print r.text 
#.... 网页html内容
~~~

------
