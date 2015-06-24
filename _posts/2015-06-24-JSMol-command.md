---
layout: post
title: JSMol指令
date: 2015-06-23 22:01:59
categories: CompBiol
tags: CompBiol CompChem
---

To learn something about JSmol and install JSMol, please refer to my blog before: [JSMol使用](http://platinhom.github.io/2015/06/19/JSMol/).  
The best place to study JSMol is [Jmol/JSmol interactive scripting documentation](http://chemapps.stolaf.edu/jmol/docs/).  
Here I just summary some commands I meet.  

## [Jmol对象](http://wiki.jmol.org/index.php/Jmol_JavaScript_Object/Functions)

- `Jmol.getApplet = function(id, Info, checkOnly)`,id是用于识别Jmol对象的名字,要字符串.Info是个类似字典的结构.
- `Jmol.jmolButton(JmolObject, script, label, id, title)`,插入一个按钮于下方,第二个是命令字符串,第三个是显示的内容.第四个是html id,第五个是鼠标在上面时的显示.
- `Jmol.jmolCheckbox(JmolObject, scriptWhenChecked, scriptWhenUnchecked, labelHtml, isChecked, id, title)`,第二三个分别是选中和不选中时的动作.
- `Jmol.setCheckboxGroup(chkMaster,chkBoxes)` 多选
- `Jmol.jmolRadio(JmolObject, script, labelHtml, isChecked, separatorHtml, groupName, id, title)` 多选一,第三项是显示内容,第四项是是否默认被选,第五项是可用于插入html代码用于分隔,如`"<br>"`,第六项是组名,用于区分不同组.
- `Jmol.jmolRadioGroup(JmolObject, arrayOfRadioButtons, separatorHtml, groupName, id, title)` 使用array来创建多选一.
- `Jmol.jmolLink(JmolObject, script, text, id, title)` 超链接形式做响应
- `Jmol.jmolCommandInput(JmolObject, label, size, id, title)` 支持输入命令!
- `Jmol.jmolMenu(JmolObject, arrayOfMenuItems, size, id, title)` 插入菜单.
- `Jmol.jmolBr()` 在html插入换行.
- `Jmol.jmolHtml('context')` 再html插入指定内容.
- `Jmol.script = function(JmolObject, myScript)` 使用脚本或命令字符串.一般脚本用`*.spt`结尾,不需要加引号.
- `Jmol.showInfo(jmolObject, true/false)`: 是否显示控制台结果(会取代分子显示)
- `Jmol.clearConsole(jmolObject)`: 清除控制台结果.

## 整体控制

`load abc/def.pdb` [load](http://chemapps.stolaf.edu/jmol/docs/?ver=14.2#load)载入分子, `load $caffeine`在NIH Cactus搜索结构,可以使用SMILES,CAS,化学名等; `load :name`从pubmed搜索,支持CAS,CID,NAME,INCHI,SMILES等; `=XXXX`从RCSB载入PDB,`==XXX`从RCSB载入配体分子; 
`load ?` 弹出选框来选择分子,并打开
`write FILE ?` 写出文件,FILE文件, 弹出框指明保存文件名, 会进行下载.
`write PNGJ filename` 保存图片
`spin on/off;` 开关自旋转.(会影响surface等的表现,不需要时请关掉)
`console`: 开启控制台
`show/clear/hide`: 显示控制台命令及结果/清除/隐藏.
`image` 马上截图.弹出一个新页面,可以保存.
`set antialiasDisplay true/false`: 设置是否开抗锯齿, 不开会快点.
`set platformSpeed n`: 设置响应速度,数值越大越慢. all features:8; no antialiasing:7; no translucency:6; surfaces dotted:5; cartoons as trace:4; geosurfaces as dots:3; ellipsoids as dots:2; wireframe only: 1. 一般设5比较好,可以看表面cartoon. 设5时可显示表面,转动时变dot,但注意要关闭spin.

`refresh` 刷新,一般在脚本中使用.
`delay n` 暂停几秒.会刷新.
`pause/resume` 暂停和恢复脚本运行
`quit/exit` 类似, 可以退出脚本,进行下个脚本或者后续命令.



## 描绘方式

- `display not water`: 隐藏水分子
- `spacefill only`: spacefill 球状显示
- `wireframe -0.1`: wireframe 棍状
- `spacefill 23%;wireframe 0.15`: ball&stick 球棍显示.
- `select protein or nucleic;cartoons only`: cartoons方式. only会关闭其余显示.除了only还可以`on/off`.
- `set cartoonFancy true/false`: fancy控制, 开启后条带更有厚度.受控于响应速度.
- `set cartoonFancy false;set hermitelevel 0`: flat

## Label

- `if (_fileType == "Pdb";){select *.CA;label %n%R}else{select *;label %a};`:选择原子后开启标签, 关闭`labels off`. 格式化字符串`%a%c%n%R`.分别是原子名,链名,残基名,残基号.
- :off
- `font echo 20 serif;fsize=20;set echo top center;echo echo test`:echo, 取消用`echo;`
- `if (!fsize){fsize=20};fsize += 4;font echo @fsize serif;`:larger
- `if (!fsize){fsize=20};fsize -= 4;if (fsize < 10){fsize = 10};font echo @fsize serif`:smaller


## [颜色](http://chemapps.stolaf.edu/jmol/docs/?ver=14.2#color)


color cartoons structure
color rockets chain
color backbone blue


- `color property atomno`: color atomno (氮端到碳端渐变)
- `color cpk`: color cpk(CPK着色法,氧红氮蓝)
- `color structure`: 根据二级结构着色


## [表面](http://chemapps.stolaf.edu/jmol/docs/?ver=14.2#isosurface)

- `isosurface "filename";` : 打开surface文件
- `select *;isosurface vdw;` 先选中原子, 再生产vdw表面 
- `isosurface delete` 删除表面
- `isosurface translucent 6` 设置透明度. 0-8的整数.
- `isosurface opaque` 设置为不透明
- `if ({atomno < 10}.partialcharge == 0){calculate partialcharge};isosurface vdw map mep`: mep
- `isosurface "=XXXX"` 读入2fo-fc maps, `"==XXXX"`则读入fo-fc map.使用[Uppsala EDS](http://eds.bmc.uu.se/eds/).

## 模拟
- `minimize`: 优化结构
- `set modelkitmode;set picking dragMinimize`: 可以选择拖动原子并优化. 取消`!quit;set modelkitmode false;set picking ident;`
- `mo homo/lumo` 打开例如GAMESS文件,可以可视化HOMO和LUMO轨道. `mo mesh nofill`和`mo fill nomess`分别是表面和mesh显示轨道.


## Reference
1. [JSMol使用](http://platinhom.github.io/2015/06/19/JSMol/).
2. [Jmol/JSmol interactive scripting documentation](http://chemapps.stolaf.edu/jmol/docs/).

---
