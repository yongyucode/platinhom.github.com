---
layout: post
title: Python:Requests外插
date: 2015-12-25 05:26:58
categories: Coding
tags: Python
---

Requests 就是熟知的[Requests: HTTP for Humans](http://cn.python-requests.org/zh_CN/latest/) , 是个开源在[Github](https://github.com/kennethreitz/requests/)上的项目. 功能十分强大. 而且十分方便, 除了一般的网络连接功能外, 基本支持所有HTTP 的动作, 另外还可以很方便操作cookie, 保持session等. requests实际封装了[urllib3](https://urllib3.readthedocs.org/en/latest/)([Github](https://github.com/shazow/urllib3)). 

安装: `pip install requests` 搞掂...

<iframe src="http://cn.python-requests.org/zh_CN/latest/" width="100%" height="600px"></iframe>

## 基本使用

使用相应函数返回 **Response** 对象. 然后就对该对象调用方法或属性进行进一步操作.

可以使用各种HTTP类型请求来获取响应对象, 最常用是get的方法.

- requests.get(url, *args): 打开网页, 并获取响应对象. 
- requests.post(url, *args): 
- requests.put
- requests.delete
- requests.patch
- requests.request
- requests.head
- requests.options

### get等方法的功能参数

- params : 传递参数给GET/POST等行为. 实参需要字典.
- allow_redirects : 运行自动跳转, 默认False. 可以设置False禁止跳转.
- timeout : 连接超时的设定, 单位秒的浮点数.
- cookies : 可以设定发送cookies, 实参要字典.
- data : POST传递的数据
- files : 在post时可以上传文件. 看例子.

### Response对象

#### 属性

- url : 获取相应网址, 包括传递的参数如`?key=value,key2=value2`等.
- `text` : 网页响应内容, 一般就是相应网页内容 
- content : 二进制的相应内容, 
- encoding : 网页编码
- `status_code` : 状态吗, int型. 例如404, 正常200. 跳转可能302,303.
- history: 返回请求历史的一个列表. 可以查看出重定向过程. 
- cookies: 返回cookies的一个字典.
- headers: 响应头, 一个字典.

> 注意:

- 防止warning (disable request wanrning): 因为HTTPS的SSL/TLS验证有时经常报warning, 可以通过[关闭urllib3的warning](https://urllib3.readthedocs.org/en/latest/security.html#snimissingwarning)来进行:`urllib3.disable_warnings()`, 在requests中是: `requests.packages.urllib3.disable_warnings()`.


### 应用例子

##### 传递参数给操作(例如GET 的参数)

可以传递各种参数给类型请求的方法.

~~~python
# google scholar search shoichet, >=2015 , 3 record per page
searchargv = {'q': 'shoichet', 'as_ylo': '2015', 'num':'3'}
r = requests.get("http://scholar.google.com/scholar", params=payload)
~~~

##### 定制header模拟浏览器

使用headers参数可以自己定制头部, 还可以写成一个多User-Agent的列表, 从中随机挑选一个(`uagents[random.randint(0,len(uagents)-1)]`), 再构建头部, 这样就可以伪装成不同浏览器访问了~~

~~~python
bingacademicurl="http://www.bing.com/academic/"
hdr={'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',\
'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36',\
'Connection':'keep-alive','Content-Encoding': 'gzip','Content-Type': 'text/html; charset=utf-8','Host':'www.bing.com'}
param={"mkt":"zh-CN",'q':"keyword",'first':"1"}
r=requests.get(self.bingacademicurl,params=param,headers=self.hdr)
~~~


##### 获取自动跳转真实地址

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

##### 防止跳转


##### 抓取二进制文件如pdf

注意对于二进制文件(如图片,pdf), 打开文件方式应该是`'wb'`, 写入内容应该是`r.content`而不是r.text. 这里加了个根据header的类型判断是否pdf,不是就扔掉. 更好的方法是用`with`来执行啦.

~~~python
def getwebpdf(link,fname):
	'''Get a PDF from a link. if fail, return False'''
	try:
		rpdf=requests.get(link)
		if (rpdf.status_code is 200 and rpdf.headers['Content-Type'].lower().strip()=='application/pdf'):
			fpdf=open(fname,'wb')
			fpdf.write(rpdf.content)
			fpdf.close()
			return True
	except requests.exceptions.ConnectionError:
		print "Error to get pdf linK: "+link+" for file: "+fname
	return False
~~~

##### 上传多个文件 
以一个为例, 相当于把相应post的id对应为一个字典的键.

~~~python
>>> url = 'http://httpbin.org/post'
>>> files = {'file': open('report.xls', 'rb')}
# 还可以设置文件名,类型和请求头:
>>> files = {'file': ('report.xls', open('report.xls', 'rb'), 'application/vnd.ms-excel', {'Expires': '0'})}

>>> r = requests.post(url, files=files)
>>> r.text
{
  ...
  "files": {
    "file": "<censored...binary...data>"
  },
  ...
}
~~~


## Reference

1. [快速入门](http://cn.python-requests.org/zh_CN/latest/user/quickstart.htm)
2. [高级入门](http://cn.python-requests.org/zh_CN/latest/user/advanced.html)


------
