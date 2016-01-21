---
layout: post
title: acs-free-getdoi
date: 2016-01-21 21:52:18
categories: IT
tags: Python Internet
---

这套脚本完成两个任务 :

1. 从ACS某个Journal中抓取所有free download的pdf的DOI号
2. 根据DOI去ACS下载PDF

----------

### 脚本一

第一个脚本是爬虫抓取DOI号的, 需要安装requests和BeautifulSoup. 需要修改:

- 该journal的简称(在loi变量的末端, 例如bichaw是biochemistry的简称)  
- 输出文件, 这里是helloworld.txt. 

当然, 这两个可以在sys.argv里获取, 自行修改吧.


~~~python
#! /usr/bin/env python

import os,sys,gc,glob
import re,difflib,time,random,copy
import requests,urllib2,urlparse
from optparse import OptionParser
from bs4 import BeautifulSoup
from HTMLParser import HTMLParser

############ Global setting #############
escaper=HTMLParser()
#disable requests warning
requests.packages.urllib3.disable_warnings()

#jnprdf
loi="http://pubs.acs.org/loi/bichaw"

rloi=requests.get(loi)
sloi=BeautifulSoup(rloi.text)
# Find each issue.
rows=sloi.findChildren("div",attrs={'class':'row'})
issueurl=[ row.a['href'] for row in rows ]

f=open("helloworld.txt",'a')


for ilink in issueurl:
	print "Doing: "+ilink
	tmp=ilink.split('/')
	if (int(tmp[-2])>43):
		continue
	if (int(tmp[-2]) == 43 and int(tmp[-1]) >=11):
		continue
	try:
		r=requests.get(ilink)
		rs=BeautifulSoup(r.text)
		# Find Author/Editors Choice free download
		eds=rs.findChildren(attrs={'class':"icon-item editors-choice"})
		aus=rs.findChildren(attrs={'class':"icon-item author-choice"})
		# Find doi download link
		outs= [ out.parent.findChild(attrs={'class':"icon-item pdf-high-res"}).a['href'] for out in eds+aus] 
		# Find Correction
		corr=rs.findChildren(attrs={'id':'AdditionsandCorrections'})
		outs=outs+[out.parent.parent.findChild(attrs={'class':"icon-item pdf-high-res"}).a['href'] for out in corr]
		for out in outs:
			f.write(out+'\n')  
		#'/doi/pdf/10.1021/acs.jmedchem.5b00326'
		sys.stdou.flus()
		f.flush()
	except:
		pass

f.close()
~~~


### 脚本二

第二个脚本是抓取相应pdf的, 十分简单. 可以通用于ACS的抓取(别的杂志社要更改相应下载链接的解释). 没有检查抓取后的响应码. 也可以改为不需要requests的.

需要urllib2, time, glob, sys, os 其实足矣.

~~~python
#! /usr/bin/env python
 
import os,sys,gc,glob
import re,difflib,time,random,copy
import requests,urllib2,urlparse
from optparse import OptionParser
from bs4 import BeautifulSoup
from HTMLParser import HTMLParser
 
############ Global setting #############
escaper=HTMLParser()
#disable requests warning
requests.packages.urllib3.disable_warnings()
 
def quotefileDOI(doi):
        '''Quote the doi name for a file name'''
        return urllib2.quote(doi,'+/()').replace('/','@')
 
def unquotefileDOI(doi):
        '''Unquote the doi name for a file name'''
        return urllib2.unquote(doi.replace('@','/'))
 
f=open(sys.argv[1])
 
count=0
 
for line in f:
        doi=urllib2.unquote( line[line.find('10.'):].strip() )
        link="http://pubs.acs.org"+line.strip()
        # save file name
        fname=quotefileDOI(doi)+".pdf"
        r=requests.get(link)
        fw=open(fname,'wb')
        fw.write(r.content)
        fw.close()
        count+=1
        # When too much files(>300), move to a folder to upload to a server
        if (count>=300):
                for i in glob.iglob("*.pdf"):
                        os.renames(i,'Done/'+i)
                count=0
        time.sleep(random.randint(3,8))
f.close()
~~~

> 已处理:

biochemistry, jacs, jpcA, jpcC, jmc, joc, ol, ic, acsMCL, acsChemBiol, BioMacMol, 


------
