---
layout: post
title: Sublime2&3 使用
date: 2015-06-20 20:07:37
categories: CompSci
tags: Editor Software
---


先去装package control 来安装各种插件 https://sublime.wbond.net/installation (使用**ctrl+\`** 调出命令行)

基本快捷键:
ctl+\`    开启控制命令行;   
\*`cmd+shift+P`    命令面板,支持缩写名称. 例如PCI就是安装软件. 
`cmd+S`    保存文件
`cmd+B`    使用预设编译设置来编译   
`cmd+shift+B`    编译运行
\* `cmd+D`    选词, 可以反复向下选词(多选词)
\* `cmd+ctrl+G`    选所有该词.
`cmd+L`    选中一行.
`cmd+G`    跳到某行
`ctrl+M`    括号前后跳转
`shift+ctrl+M`    选中括号内所有内容. 有说是cmd+ctrl+M的
\*`cmd+/`    注释该行    `cmd+alt+/`    块注释
`Ctrl+K+B `    开关侧栏
`F11`    全屏
`F6`    检查语法错误(再按取消)
`cmd+shift+enter`    直接在该行前插入行(不断行)     `cmd+enter`    直接在该行后插入行(不断行) 
`cmd+shift+[或]`    折叠/展开代码
`cmd+shift+ 上或下`    移动该行代码, 上下行互换
`cmd+shift+ T`    重新打开刚关闭的标签页
`cmd+F2` 和 `F2` 设置以及跳到下一个标签
`cmd+F` 查找
\*`cmd+E` 将选中内容作为查找内容(自动复制)

### 配置文件 : 使用 JsoN [百度百科](http://baike.baidu.com/view/136475.htm) 编写
####Build系统: 
参考说明: [中文版](http://jaylabs.sinaapp.com/Sublime_unofficial/reference/build_systems.html ),[英文版](http://sublimetext.info/docs/en/reference/build_systems.html  )  [非官方文档](http://sublime-text.readthedocs.org/en/latest/reference/build_systems.html  )
C++自带版本:
```
{
	"cmd": ["g++", "${file}", "-o", "${file_path}/${file_base_name}"],
	"file_regex": "^(..[^:]*):([0-9]+):?([0-9]+)?:? (.*)$",
	"working_dir": "${file_path}",
	"selector": "source.c, source.c++",

	"variants":
	[
		{
			"name": "Run",
			"cmd": ["bash", "-c", "g++ '${file}' -o '${file_path}/${file_base_name}' && '${file_path}/${file_base_name}'"]
		}
	]
}
```

gfortran version
```
{
     "cmd": ["gfortran", "-g", "-Wall", "${file}", "-o", "${file_path}/${file_base_name}"],
     "file_regex": "^(..[^:]*):([0-9]+):?([0-9]+)?:? (.*)$",
     "working_dir": "${file_path}",
     "selector": "source.f, source.f90",
     "shell": true,
     "variants":
     [
          {
               "name": "Run",
               //"cmd": [ "start", "${file_path}/${file_base_name}.exe"]
               "cmd" : ["${file_path}/${file_base_name}"]
          }
     ]
}
```

ifort in window64 version
```
{
	"cmd": ["cmd", "/E:on", "/V:on", "/K", "ipsxe-comp-vars.bat intel64 vs2010 && ifort ${file} -o ${file_path}/${file_base_name}"],
     "file_regex": "^.*\\\\([0-9A-Za-z_]+\\.[A-Za-z0-9]+)\\(([0-9]+)\\):[ ]+error[ ]+#([0-9]+):[ ]+(.*)$",
     "working_dir": "${file_path}",
     "selector": "source.f, source.f90,source.for,source.fortran90",
    "encoding":"cp936",
     //add the IVF path as follow to run the ipsxe-comp-vars.bat
      "path":"C:\\Program Files (x86)\\Intel\\Composer XE 2013\\bin;${path}",
     "variants":
     [
          {
               "name": "Run",
               //"cmd": ["cmd", "/e:on", "/v:on", "/c", "ipsxe-comp-vars intel64 vs2010 && ifort ${file} && ${file_base_name}"]
               "cmd" : ["${file_path}/${file_base_name}"]
          }
     ]
}
```
####fortran语法高亮
可以直接自动安装MinimalFortran package, 但该版本的语法比较傻, 不好用.
[建议](http://stackoverflow.com/questions/13713577/how-to-get-proper-text-color-highlighting-for-fortran-90-in-sublime-text-2  )安装: [textmate/fortran.tmbundle](https://github.com/textmate/fortran.tmbundle  ) 下载zip整个文件夹解压后, 直接放到AppData\Roaming\Sublime Text 3\Packages 文件夹夹内(改名为Fortran文件夹哦!)

#####Mac双击打开时在不新建窗口:
Perference->Setting Default->搜索New_Window, 打开文件在新窗口设为false. (ST3有bug, 要在Preference->browse package中打开文件夹, 并自己新建一个Default文件夹..保存再打开.)

### 安装:
**win64**: sublime 2.02 64 bit 
复制一个sublime.exe文件, 用ultraedit打开编辑(sublime保存2进制有点问题), 查找到4333 3342 3032, 修改3342->3242 然后将该文件放回执行文件夹, 打开后 Help->Enter License输入以下内容就OK了
```
—–BEGIN LICENSE—–
hiwanz
Unlimited User License
EA7E-26838
5B320641E6E11F5C6E16553C438A6839
72BA70FE439203367920D70E7DEB0E92
436D756177BBE49EFC9FBBB3420DB9D3
6AA8307E845B6AB8AF99D81734EEA961
02402C853F1FFF9854D94799D1317F37
1DAB52730F6CADDE701BF3BE03C34EF2
85E053D2B5E16502F4B009DE413591DE
0840D6E2CBF0A3049E2FAD940A53FF67
—–END LICENSE—–
 
```
### 插件
#####bracket highlighter: 括号高亮
 preferences->package settings->brackethighlighter->bracket settings default, 打开文件后编辑bracket_styles{} 将default的改underline为highlight, color更改为entity.name.class 即可. 更多设置[参考](http://blog.sserhuangdong.com/2014/04/22/my-sublime-setting/#BracketHighlighter配置  )
还可以实现快捷键选取括号内容, 跳转到开头/结尾等.

#####sublimeLinter: 代码错误提示

#####Alignment: 以等号为准对齐, Ctrl+Alt+A 使用

#####Emmet(Zen Coding): 高效编写html和css

#####Terminal: 可以方便地在文件出掉出命令行并在该文件夹. 可以右键文件来调用, 也可以cmd+shift+T

## Reference

1. [主页](http://www.sublimetext.com/)
2. [知乎:sublime有哪些实用技巧?](http://www.zhihu.com/question/19976788 )
3. [sublime非官方文档](http://sublime-text.readthedocs.org/en/latest/intro.html)
4. [善用佳软视频介绍](http://xbeta.info/sublime-text2.htm)


---
