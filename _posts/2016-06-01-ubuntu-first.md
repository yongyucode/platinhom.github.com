---
layout: post
title: 新电脑新系统-Win10+Ubuntu
date: 2016-05-31 23:26:46
categories: IT
tags: System
---

好久好久没有写blog了, 好像失踪si了一样. 忙着找工作啊, 结掉米国这边的东东. 

新买了一台Lenovo的Yoga 900, 看起来很酷, Bestbuy Open Box退伍军人节再打9折,900刀含税. Win10系统, 256GB硬盘, 有点少.. 用来日常办公吧. 不过和MBP有点冲突...

自带Win10系统, 打算装双系统, 就是日常办公调试, 可能也够用吧.

## Win10系统初探

Win10是针对触屏进行改进的系统, 和Win7还是有很大区别的(Win8就忽略了吧), 感觉上Win10 2 in 1 本有以下区别:

- App应用: 和一般exe装程序不同, app应用通过微软Store来安装.例如qq或者网易云音乐就是更贴切平板控制模式, 更适合触屏. 另外, 空间也省点. 换句话, 就是Win10既可以像以往操作系统那样安装程序, 也可以像手机平板那样从商店安装APP.
- 操作中心: 类似于安卓那种顶部提示中心和一些功能的快捷控制(例如wifi,定位,飞行模式等). 这种设计就是为了Win10用于手机和平板吧. 我电脑可以右划调出操作中心, 也可以按个右下角一个信息提示一样的图标调出.
- 虚拟桌面和任务视图: 就是Win键+Tab的功能, 不过现在还可以设置多个桌面, 有点像Mac里面的任务-桌面控制视图.
- 平板模式: 在操作中心里面就有, 选了以后键盘禁用, 开始菜单变得更像手机里面一个一个大图标(Win8那种全屏列表). 另外, 旋转控制的键这时就可以用了, 电脑就像平板一样.
- Cortana, 类似于Siri吧, 我就用来搜索..
- 开始菜单: 变得更复杂, 可以定制菜单位置啊, 内容了, 还有平板模式. Win8是横向列出程序, Win10是纵向的, 怪怪的...
- EDGE浏览器: 感觉还可以, 速度也OK.
- 新的设置菜单: 也是为了平板设计的吧, 图标大大的, 功能和控制面板类似, 摆放得不习惯, 需要学习周期.
- 高分屏设计: 分辨率, 自定义DPI, 字体等都有所改进, 为了4K屏吧.

总体感觉, Win10系统和Win7其实差异也不大, 更兼容于手机和平板的系统, 比Win8又更像桌面系统. 如果更偏向于桌面系统, Win7足矣 (反正国人也是用盗版..Win10免费特性也用不上).

----------

附虚拟桌面快捷键：

- 贴靠窗口：Win +左/右> Win +上/下>窗口可以变为1/4大小放置在屏幕4个角落
- 切换窗口：Alt + Tab（不是新的，但任务切换界面改进）
- 任务视图：Win + Tab（松开键盘界面不会消失）
- 创建新的虚拟桌面：Win + Ctrl + D
- 关闭当前虚拟桌面：Win + Ctrl + F4
- 切换虚拟桌面：Win + Ctrl +左/右


## Win10安装双系统

1. 去[Ubuntu官网](http://www.ubuntu.com/)下载系统, 这里下载的是[个人桌面版](http://www.ubuntu.com/download/desktop). 下载文件是iso文件, 可以写到光盘或者U盘.
2. 找个U盘4G左右大小, 备份好数据后, 格式化掉.
3. 下载[UltraISO](https://www.ezbsystems.com/ultraiso/download.htm),试用版即可, 使用不介绍了(打开iso,写入硬盘映像,选择U盘写入即可)
4. 然后准备好一个分区空间用来安置Ubuntu, 打开 **磁盘管理**, 我从C盘里选择压缩磁盘, 压缩出48G出来. (记住盘符哦!)
5. 准备好后,重启, 使用自己电脑设置boot顺序的方法选择U盘启动(例如Yoga 900是完全关机后捅侧面的小键). 然后进去就可以开始安装Ubuntu了.
6. 安装一些常规就不说了, 有两步很重要: 第一是安装类型选择其他选项(Other option), 来自定义分区(比较稳妥), 第二是设置分区表.
7. 分区表, 选择刚才释放空间出来的分区(空闲空间), 点击下面的`+`号用来添加分区, 主要是三个:
	- 系统文件, `/`, 分区类型主分区, 分区位置空间起始位置, Ext4 日志文件系统, 挂载点: `/`
	- 虚拟内存交换分区, `swap`, 建议是物理内存2倍大小(例如我8G内存就是16384 MB). 逻辑分区, 空间起始位置, 用于Swap (没有挂载点)
	- 启动分区, `/boot`, 设置200MB就够了, 逻辑分区, 空间起始位置, Ext4 日志文件系统, 挂载点: `/boot`
	- 理论上还需要挂载一个`/home`分区来放用户文件(例如我就是16G给`/`,16G给`/home`), 但其实不挂也可以.
8. 分区表弄好后, 选中`/boot`分区, 看清楚是`/dev/sda?`,下面安装启动引导器的设备选择相应的/boot分区的`/dev/sda?` ( **很重要**). 
9. 然后其余就随意设置, 安装完后重启, 然后就会出现系统选择的界面(默认第一个是ubuntu, 不按键就会进入, 第三个是Win10). 如果没有系统选择界面而是进入了Win10, 可能需要更改BIOS里面EFI boot顺序(将Ubuntu的提到第一)

图文安装参考Volcanoo的[Windows10+Ubuntu双系统安装(多图)](http://www.jianshu.com/p/2eebd6ad284d). 里面的快速启动可以关闭掉(以前帮Li qianhuan也不知道什么原因关过),禁用安全启动和后面的我后来就没有搞了, 不成功. 电脑主板和系统限制了. 

> 在上面的安装教程里有些东东是不需要的了, 例如EasyBCD. 新电脑的话都有[UEFI 统一可扩展固件接口](https://en.wikipedia.org/wiki/Unified_Extensible_Firmware_Interface), 这玩意限制了对自由系统Linux的安装和双启动. 即使安装了EasyBCD也不能搞掂双系统选择, 有个帖子说要禁用UEFI后还要再重装Win10才可以(至少我根据帖子里的方法, 不用UEFI, 设置了Legacy的, 首选Legacy不是UEFI, 禁用Secure Boot, 停用了快速启动, 但都不能正常使用EasyBCD设置多启动选择, 所以可以不用白费力气安装EasyBCD和进行一大堆的BIOS设置了. 现在的Ubuntu兼容Win10的启动,将首boot设为Ubuntu就可以了, 就是没有这篇博文那样启动时那么fancy)

> 这篇[如何在 Win8 上禁用 UEFI 安全引导以安装Linux](https://linux.cn/article-3061-1.html)讲解禁用UEFI, 但我测试无效. 其实用 高级重启->疑难解答->UEFI设置重启电脑进入BIOS界面和直接进入BIOS界面是一样的. 另外, 高级重启在帖子里是用更新恢复->高级启动->立即重启实现, 更简单方法是, 开始菜单->电源->按着Shift键点重启就可以了.

## Ubuntu初探

这里安装的是Ubuntu 16.04 LTS 长期稳定版. 安装后先用apt-get测试安装pymol失败.. 

~~~bash
Reading package lists... Done
Building dependency tree
Reading state information... Done
E: Unable to locate package <package> 
~~~

原因是某些东东太老了. 先要更新一下ubuntu的所有软件:

`sudo apt-get update`

然后就可以`sudo apt-get install pymol`,`sudo apt-get install python-pip`等来安装软件啦~ 安装软件需要在软件源里存在哦. 可以在ubuntu软件包里面搜索: [http://packages.ubuntu.com/](http://packages.ubuntu.com/)


#### 安装sogou拼音中文输入法

安装是在**Ubuntu 16.04 LTS 长期稳定版**测试

1. 到[官网](http://pinyin.sogou.com/linux/?r=pinyin)下载新版本的输入法
2. 不要双击安装, 因为默认安装器是GNOME的. 
3. cd到Download文件夹, `sudo dpkg -i sogoupinyin_2.0.0.0070_amd64.deb` 尝试使用dpkg安装
4. 上一步会失败(提示 *Error were encountered while processing sogoupinyin*), 此时再用 `sudo apt-get install -f` 自动解决上步失败的依赖关系
5. 重新`sudo dpkg -i sogoupinyin_2.0.0.0070_amd64.deb`, 可能会出现 *No such key 'Gtk/IMMOdule' in schema 'org.gnome.settings-daemon-plugins.xsetting' as specified in override file '/usr/share/glib-2.0/schemas/50_sogoupinyin.gschema.override'; ignoring override for this key* 这样的提示. 忽略它.
6. 点系统设置 *System Settings* -> 语言支持 *Language Support* -> 如果没有中文,点 `Install/Remove Languages` 安装简体中文. 会提示安装, 等.
7. **Keyboard input method system** (键盘输入法系统)那里选择fcitx (默认ibus, fcitx是支持搜狗输入法的中国人自制的输入法系统哦! 输入法图标重新登入后会变成一个键盘, 界面也和先前的不同)
8. Log out登出再登入(或者重启),这时输入法图标应该变成了fcitx.
9. 点击输入法图标, 设置, 进入输入法设置面板 (也可以命令行`fcitx-configtool`直接打开设置面板). 点击左下角的`+` 号添加输入法(默认就一个英语). 去掉那个Only show Current language 的选项, 然后搜索sogou,找到后OK. 好了添加完成了. 重启或者登出.

> 如果不想要ibus, 可以`sudo apt-get remove ibus scim` 卸掉, 不介意的话就不用卸了.  
> 据说12.04老版自带fcitx版本太旧, 需要升级. 可以用更新管理器,软件源添加 `ppa:fcitx-team/nightly`, 重新载入后搜出fcitx来更新. 或者用命令`sudo apt-get-repository ppa:fcitx-team/nightly`添加源再 `sudo apt-get update`自动升级. 

------
