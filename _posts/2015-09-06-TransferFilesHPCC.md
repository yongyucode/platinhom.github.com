---
layout: post
title: 传输文件到集群
date: 2015-09-05 20:50:39
categories: IT
tags: Cluster
---

感觉xmanager的ftp工具对于HPCC不太好用,打算换一个ftp工具. 本来传输时是一卡一卡的,要刷新才能起效,而且速度很慢..后来换了Filzilla以后30多M/s...吓尿了...

顺便归纳以下传输文件到集群的方法.


## 图形界面FTP工具(Windows/OS X/Linux)

下载安装免费开源FTP工具, 如[Filezilla client](http://filezillaproject.org/download.php).
下载安装后,打开后,输入IP地址,用户名,密码即可..十分方便.端口22是sftp,21是ftp.一般22就挺好.例如下图.第一次使用会让你是否记住服务器端主机信息,accept/yes/OK就好了.

![](https://wiki.hpcc.msu.edu/download/attachments/13864442/filezilla_screen1.png?version=1&modificationDate=1314306681000&api=v2)

支持拖拽,右键来指定传输向上/向下传输.左边是本地,右边是服务器端文件系统.不用介绍了..

## 映射网络地址到本地

该方法一般只适合于局域网或者校园内.可以参考[HPCC映射到本地](https://wiki.hpcc.msu.edu/display/hpccdocs/Mapping+HPC+drives+to+a+campus+computer). 好处是可以直接在电脑上复制黏贴.缺点是弄起来复杂一些.


## Dropbox (Windows/OS X/Linux)
If you are a Dropbox user, you can setup HPCC to sync automatically with your Dropbox account.
Download the following file to your home directory on HPCC, http://www.dropbox.com/download/?plat=lnx.x86_64
Log into one of the development nodes
`ssh dev-intel10`
untar the downloaded file using the following command
`tar -zxvf dropbox-lnx.x86_64-x.x.xx.tar.gz`
start screen
`screen`
run dropboxd in a screen session and You should see output like this:

~~~bash
~/.dropbox-dist/dropboxd
This client is not linked to any account... Please visit https://www.dropbox.com/cli_link?host_id=7d44a557aa58f285f2da0x67334d02c1 to link this machine.
~~~

Copy the link to a web browser to activate your installation.
After the client is registered, detach the screen session by pressing ctrl-a, and then d.

## Unix指令(Linux/Mac/Win下Mingw)
有不少命令是可以支持网络传输文件的.Linux/Mac一般直接使用,Win下就要靠Mingw了,不一定有呢..

### scp 远程复制

命令格式就是`scp -r fromFile ToFile`, -r是针对文件夹. 远程端格式是`用户名@主机名或ip:指定位置或文件名`.例如: 

~~~bash
scp "My File Name" username@hpcc.msu.edu:"My\ File\ Name"
scp username@hpcc.msu.edu:example.txt ./example_copy.txt
~~~

### rsync 文件夹同步

和scp相比,没有更新的相同文件不会同步到本地/远端. 基本用法是`rsync -ave 来源文件夹 接收文件夹`.文件夹格式也是 `用户名@主机名或ip:指定位置`.如: 

~~~bash
rsync -ave ssh <local_dir> username@hpcc.msu.edu:<hpcc_dir>
rsync -ave ssh username@hpcc.msu.edu:<hpcc_dir> <local_dir>
~~~

Icon
the first time you use rsync, you might want to add the -n flag to do a dry run before any files are copied.
Interactive file copy (sftp)
When preforming several data transfers between hosts, the sftp command may be preferable, as it allows the user to work interactively. Running
`sftp username@hpcc.msu.edu`
from a local host establishes a connection between that host and the cluster. Both hosts can be navigated. For the local file system, lcd changes to the specified directory, lpwd prints the working directory, and lls prints a list of files in the current directory. For the remote file system, the same three commands are available, minus the leading "l." Also available are commands to change permissions, rename files, and manipulate directories on the remote host. The two key commands are get example.txt, which copies the file in the remote working directory to the local working directory, and put example.txt, which copies the file in the local working directory to the remote working directory. The quit command closes the connection between hosts.
Copy file from Internet (Wget)
Wget is a simple command useful for copying files from the Internet to a user's file space on the cluster. Submitting the line
`wget http://www.examplesite.com/examplefile.txt`
downloads examplefile.txt to the user's working directory. Other protocols, such as ftp, are also available.


1. [Transferring Files to the HPCC](https://wiki.hpcc.msu.edu/display/hpccdocs/Transferring+Files+to+the+HPCC)

------
