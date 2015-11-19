---
layout: post
title: xshell-view
date: 2015-11-18 21:57:41
categories: IT
tags: Software
---

1、启动XQuartz
2、打开偏好设置，勾选输入下的“模拟三按键鼠标”
3、输出可以选择“全屏模式”，按Command-Option-A切换
4、如果修改了配置需要退出重新启动生效
5、选择“应用程序－终端”
6、终端窗口打开后输入：`xhost +` 然后回车
7、登陆远程主机：
ssh -X username@host
输入密码登陆
8、登陆后输入setenv回车，查看DISPLAY变量，对DISPLAY变量设置：
setenv DISPLAY localhost:10.0
9、可输入xclock，如果弹出窗口，说明可以使用远程主机的图形界面了。
10、退出时，先关闭图形窗口，然后命令行上输入exit退出



------
