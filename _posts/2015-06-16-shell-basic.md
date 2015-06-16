---
layout: post
title: Shell基础与指令
date: 2015-06-16 00:02:31
categories: CompSci
tags: Shell Bash
---

## 绝对路径和相对路径

`pwd` 查看和返回当前目录绝对路径.

## 管道与重定向

- 管道: `|` 在命令后使用管道,可以将管道前的指令的输出作为下一个指令的输入(可以认为以中介临时文件形式)
- 输出重定向:`>` 将前面指令的输出重定向到别的地方,例如本来显示在屏幕的输出到指定文件.
- 输入重定向:`<` 将后面的内容作为输入到前面的指令. 

## 文件/目录相关指令

~~~ bash
# cd 移动到某文件夹作工作目录
cd dirname  #移动到指定文件夹
cd ~	#移动到用户目录
cd ..	#移动到上级目录,../..是上上级目录
cd -	#移动到上次所在的目录

# ls 显示文件/目录内容
ls -l #一般也用ll,显示详细,一般配合-h(文件大小以Mb等形式形式)
ls -a #显示所有文件

# mkdir 创建文件夹

# rmdir 删除文件夹(必须为空)

# cp f1 f2 复制文件f1为f2
cp A B dir      #将A个B复制到目录
cp -r dirA dirB #递归复制目录所有内容

# mv f1 f2 移动文件,可以用于改名

# rm 删除文件,不可逆.
rm -rf dir #递归地删除整个目录,-f是强制进行,不提示

# file 判断文件类型
 
~~~

## 运行状况相关指令

~~~
top
ps
bg
fg
jobs
kill
nohup
~~~

## 文件内容显示和操作相关指令

~~~
echo
read
tee
wc
cat
head
tail
more
less
split
diff
cmp
sort
cut
~~~

## 用户和配置指令

~~~
chmod
chown
chgrp
id
who
logout
su
whoami

source
alias
unset
unalias
export

~~~

## 系统管理指令
~~~ 
# shutdown: 关机/重启
# shutdown [options][time][message]
# options -r 重启,-h等系统服务停止后再进行,-f 快速关机
# time可以是hh:mm绝对时间,可以是+m多少分钟后,可以是now,message是管理员发给用户的提示.

reboot
date
mount
unmount
init

~~~

## 网络相关

~~~
ssh
scp
sftp
wget
ping
ifconfig
~~~



---
