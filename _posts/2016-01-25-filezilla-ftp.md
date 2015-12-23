---
layout: post
title: FileZilla搭建ftp服务器
date: 2016-01-25 07:48:05
categories: IT
tags: Internet Software
---

XAMPP原来就配有了FileZilla的Server程序. 如果没有装XAMPP可以自行去[官网下载](https://filezilla-project.org/download.php?type=server)FileZilla的Server端程序.

安装很easy啦...下一步步步就OK了. 安装后有2个执行文件, 按理在安装文件夹下的:`FileZilla Server.exe` 和`FileZilla Server Interface.exe`, 前者才是真正后台服务主程序, 后者不过是个设置的图形界面罢了.

如果是在XAMPP, 先配置(Admin进入FileZilla Server Interface),然后直接点开启FileZilla服务即可.(注意如果另外开了`FileZilla Server`非XAMPP版的话,可能会出现Interface和server交互出问题, 因为版本的问题, 解决办法是去FileZilla Server的安装目录下点击`FileZilla Server.exe`然后关闭服务.最好避免冲突还Unistall掉服务. 如果没有关好,尝试使用管理员权限)

[官网:配置网络](https://wiki.filezilla-project.org/Network_Configuration)

------
