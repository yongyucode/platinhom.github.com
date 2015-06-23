---
layout: post
title: JSMol-command
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

`load abc/def.pdb` 载入分子
`spin on/off;` 开关自旋转.(会影响surface等的表现,不需要时请关掉)
`console`: 开启控制台
`show/clear/hide`: 显示控制台命令及结果/清除/隐藏.
`image` 马上截图.弹出一个新页面,可以保存.
`set antialiasDisplay true/false`: 设置是否开抗锯齿, 不开会快点.
`set platformSpeed n`: 设置响应方式,数值越大越慢. all features:8; no antialiasing:7; no translucency:6; surfaces dotted:5; cartoons as trace:4; geosurfaces as dots:3; ellipsoids as dots:2; wireframe only: 1. 一般设5比较好,可以看表面cartoon. 设5时可显示表面,转动时变dot,但注意要关闭spin.




## 描绘方式


## 颜色


color cartoons structure
color rockets chain
color backbone blue

## 表面

`select *;isosurface vdw;` 先选中原子, 再生产vdw表面 
`isosurface delete` 删除表面
`isosurface translucent 6` 设置透明度. 0-8的整数.
`isosurface opaque` 设置为不透明

## Reference
1. [JSMol使用](http://platinhom.github.io/2015/06/19/JSMol/).
2. [Jmol/JSmol interactive scripting documentation](http://chemapps.stolaf.edu/jmol/docs/).

---
