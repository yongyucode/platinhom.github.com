---
layout: post
title: 查找文件差异的diff和工具
date: 2015-08-28 06:27:30
categories: IT
tags: Bash IDE
---

## diff命令

### 选项

### 结果

## Sublime插件

### [FileDiffs](https://github.com/colinta/SublimeFileDiffs)

- 特点: 免费, sublime版diff,支持外部diff工具. 缺点: 就真的是diff结果的显示..
- 用法: 
	1. 安装后, 调用处filediffs菜单:
		- 方法1: Ctrl+Shift+P调出指令框再输入filediffs找到filediffs: menus,点击即可
		- 方法2: 修改Key Bindings-User里面,增加新的key如下面列出所示,随后可以用快捷键ctrl+shift+d来进行.
	2. 随后会出现5个选项命令: 
		1. `file_diff_clipboard`: 是当前(文件/选择)和粘贴板比较
		2. `file_diff_saved`: 当前(文件/选择)状态和先前保存状态的差异
		3. `file_diff_file`: 当前(文件/选择)状态和Project类某文件的差异
		4. `file_diff_tab`: 当前(文件/选择)状态和当前某tab打开的文件的差异(我最常用)
		5. `file_diff_previous`: 当前(文件/选择)状态和先前处于活动状态的文件的差异(特殊的两tab比较)
		6. `file_diff_selections`: 先要选择两个区域,然后才会出现该选项.比较两个选择区域
	3. 使用相应命令后将生产untitled临时文件,储存diff结果.开始时告诉你---和+++代表什么文件,后面相应-,+着色对于相应文件.就这样了
	4. 外部程序: 通过Filediffs的default setting可以设置一些参数,例如可以取消注释掉某些行来启动外部另外一些diff程序,最好使用绝对路径(或者加入到/usr/local/bin/ 符号链接)

~~~css
	//filediffs
	{ "keys": ["ctrl+shift+d"], "command": "file_diff_menu" },
	{ "keys": ["ctrl+shift+e"], "command": "file_diff_menu", "args": {"cmd": ["opendiff", "$file1", "$file2"] } }
~~~

### [diffy](https://packagecontrol.io/packages/Diffy)

- 特点: 分屏差异化显示,缺点:不能同步两边进行文件拉动.
- 用法: 
	1. Alt+shift+2/1切换双视窗和单视窗(或者View->Layout->Column:2)
	2. 两个视窗各放置需要比较的文件(如果是复制内容新建一个临时文件就好了).
	3. ctrl+k, ctrl+d(Mac: super+k,super+d)进行比较,其实就是将差异之处列出来.
	4. ctrl+k, ctrl+c取消比较

------
