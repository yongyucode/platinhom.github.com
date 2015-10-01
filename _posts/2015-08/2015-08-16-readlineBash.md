---
layout: post
title: Bash中按行读取和处理
date: 2015-08-16 12:49:43
categories: Coding
tags: Bash
---

Bash的处理文档能力肯定是不如python友好了.但是要是能用Bash来处理, 那也是十分赞的. Bash还能配合awk, sed等一起操作, 用熟了应该不比python差.但是python的扩展库多,语言友好, bash就限定在那几个程序了...好吧, 那还是要学好的.

## for + cat 循环读取

使用cat 再for的缺点是, 要是有空格/tab, 就不会按行处理! 因为分隔符默认是空格,tab,换行! 这个问题再6-26号生日的博客中提及过了. 有两种写法去处理. 这里举例说明:

~~~bash
#! /bin/bash -login

# Backup the IFS
OLDIFS=$IFS
# Method 1:
IFS="
"
# Method 2:
IFS=$'\n'

echo > ambertype.log
for dir in `cat $1`
do
mol2pqr.sh ${dir}.mol2 pqrt no amber mbondi

for line in $(cat ${dir}.pqrt)
do
if [[ ${line:0:4} == "ATOM" || ${line:0:6} == "HETATM" ]];then
echo ${line:78:10} >> ambertype.log
fi
done

done

# Set back the IFS
IFS=$OLDIFS
~~~

这个脚本是操作文件内序号来读取文件,并提取行内信息的. 如果不设置IFS,读取结果是空白! 因为按空格和换行分隔了每个项...

## while read 循环读取

~~~bash
while read -r line
do
    echo $line
done < $testfile
~~~

------
