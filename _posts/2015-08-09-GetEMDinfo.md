---
layout: post
title: 根据ID抓取EMD数据信息
date: 2015-08-09 07:07:00
categories: CompCB
tags: CompBiol EMD Python
---

这是以前用来统计EMD数据库中有fitting的EMD有多少, 格点和分辨率多少的.  

使用就是脚本+EMD编号即可.

要新加新的抓取信息部分自行添加了~使用到python的正则表达式模块re,网页模块urllib2.

~~~python
#! /usr/bin/env python
# File: EMDwebAnalyser.py
#
# To get EMD information from EMD databank
# Usage: python EMDwebAnalyser.py 1149
# Return: EMDID FitPDB GridSize Resolution (1149 2BYU  3.33 16.50)
# Author: Zhixiong Zhao
# Last Upate: 2015.9.17

import urllib2,re,sys
if (len(sys.argv)<2):
        print "Please give a EMD number as first parameter!"
        exit()
emdnum=sys.argv[1];

#Get the corresponding PDB number from EMD number
# Emdatabank has updated its website....
#emdlink="http://www.ebi.ac.uk/pdbe/entry/EMD-"+emdnum;
#emdmaplink=emdlink+"/map"

# Use rutgers website..
emdlink="http://emsearch.rutgers.edu/atlas/"+emdnum+"_summary.html";
emdmaplink=emdlink.replace("summary","mapparams");
urlreq=urllib2.Request(emdlink);
emdweb=urllib2.urlopen(urlreq).read();
fstr=re.search('<td class="first"><a\s+?href=.*target="_atlas_external">(?P<emdnumber>.{4}?)</a>',emdweb);
if (fstr):
        pdbnum=fstr.group("emdnumber").upper();
else:
        pdbnum='    '

#Get the resolution
fstr=re.search('<a class="help" id="resolution" href="#">\s+?Resolution:\s+?</a></td><td width="" valign="top" class="first">(?P<Reso>.+?) &Aring;',emdweb);
if (fstr):
        reso=float(fstr.group("Reso"));
else:
        reso=-1.0;

#Get the Voxel spacing value (grid size)
urlreq=urllib2.Request(emdmaplink);
emdweb=urllib2.urlopen(urlreq).read();
fstr=re.search('<a class="help" id="voxelSpacing" href="#">Voxel spacing:</a></td><td class="first" width=""\s+?valign="top">(?P<spacing>.+?)&Aring;</td>',emdweb);
if (fstr):
        spacing=float(fstr.group("spacing"));
else:
        spacing=-1.0
print emdnum,pdbnum,"%5.2f"%spacing,"%5.2f"%reso;
~~~

------
