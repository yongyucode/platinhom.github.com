---
layout: post
title: 剪贴板的命令行/代码操作
date: 2015-06-28 05:38:27
categories: CompSci
tags: IT System
---

## Window
`clip` system32里自带程序

- `dir | clip` 将命令结果重定向到剪贴板
- `clip <readme.txt` 将文件内容复制到剪贴板
- `echo |clip ` 清空剪贴板

## Mac
`pbcopy`和`pbpaste`
- `cat file | pbcopy` 复制内容到剪贴板
- `pbcopy < readme.txt` 将文件内容输入到剪贴板
- `echo 'Hello World!' | tee >(pbcopy) tmp.txt` 同时将输出到文件, 剪贴板, 屏幕
- `pbpaste` 黏贴

## Linux
需要安装`xsel`或者`xclip` 可能需要另装.

---
