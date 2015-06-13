---
layout: post
title: 读取命令行选项
date: 2015-06-13 06:08:03
categories: CompSci
tags: Python Shell IT技术
---

- 从命令行输入参数选项是我们基本的程序互动内容,是基本的功能.调用命令行参数是第一个技能,分析命令行参数是第二步.每种不同语言的程序或脚本都具有读取命令行参数的功能.

### Python: sys.argv
sys库里的argv是所有命令行选项的列表.根据空格/tab来分隔来放置.第0个是脚本名字,1开始才是参数列表.所以参数个数是len(sys.argv)-1.第一个选项就是`sys.argv[1]`

#### python例子 

~~~~ python
#!/usr/bin/python
# Filename: cat.py
import sys
def readfile(filename):
    print '''Print a file to the standard output.'''
    f = file(filename)
    while True:
        line = f.readline()
        if len(line) == 0:
            break
        print line, # notice comma
    f.close()
# Script starts from here

# No argv given.
if len(sys.argv) < 2:
    print 'No action specified.'
    sys.exit()
# Analyse argv with --
if sys.argv[1].startswith('--'):
    option = sys.argv[1][2:]
    # fetch sys.argv[1] but without the first two characters
    if option == 'version':
        print 'Version 1.2'
    elif option == 'help':
        print '''/
This program prints files to the standard output.
Any number of files can be specified.
Options include:
  --version : Prints the version number
  --help    : Display this help'''
    else:
        print 'Unknown option.'
    sys.exit()
else:
    for filename in sys.argv[1:]:
        readfile(filename)
~~~~

### Shell
shell更为简单,就是调用变量`$1 $2 $3`这样子.


### Fortran

`argc=iargc()` 命令行参数个数,用于方便循环读取.
`call getarg(i,buffer)` 读取命令行,i是第几个,buffer是字符组用于储存.

#### Fortran例子
分析参数, 将多个输入参数的磨光次数进行排序

~~~~ fortran
!* For input arguments
!* 1st: file; other: polish times for writing result.
argc=iargc();
CALL GETARG(1, mapname)
if (argc < 1) then
    print *,'Error, Please assign the filename!'
    print *,'1:filename '
    stop
end if

! Analyse file name.
dotPlace=index(mapname,'.',back = .true.);
basename=mapname(:dotPlace-1);
extname=mapname(dotPlace+1:);
if (extname(1:3)/='map') then
	print *,'Error, Please assign the filename!'
    print *,'1:filename '
    stop
endif


! read the other arguments
Kpolish=0; j=0
if (argc>1) then
	do i=2,argc
		call GETARG(i,tmpstr)
		read(tmpstr,*) j
		if (j == 0 ) then
			readFromMap=.true.
            writedat=.false.
		else
			Kpolish=Kpolish+1
			Tpolish(Kpolish)=j
		end if 
	enddo
	!* sort from small to large
	call bubble_sort(Tpolish,Kpolish);
else 
	readFromMap=.true.
endif
~~~~

---
