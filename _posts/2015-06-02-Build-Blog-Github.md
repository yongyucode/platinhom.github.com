---
layout: post
title: 使用Github搭建博客
date: 2015-06-02 11:06:56
category: "Github"
---

### 安装git
- Window推荐使用[Msysgit](http://msysgit.github.io/),安装完毕直接使用命令行界面登入.
- Ubuntu可以直接`sudo apt-get install git`
- Mac我也忘了..
- 图形界面待补充...

### 在github注册账号
1. **注册**: 到github注册账户[link](https://github.com/)
2. **创建密钥**: 使用`ssh-keygen ssh-keygen -t rsa -b 4096 -C "yourmail@hotmail.com` 来创建公有私有密钥,使用默认的地址,若不输入passphrase则可以跳过每次输入密码.然后复制公钥`~/.ssh/id_rsa.pub`的内容,在github账号中`Settings`,`SSH keys`中黏贴该密钥. 更多ssh key产生和处理请参考[github sshkey generation](https://help.github.com/articles/generating-ssh-keys/),[中文ssh key 介绍](https://wiki.archlinux.org/index.php/SSH_Keys_(%E7%AE%80%E4%BD%93%E4%B8%AD%E6%96%87\))
3. **本地库**: 创建一个文件夹如MyGit,`mkdir MyGit`, 然后进去`git init`创建空的本地库(加入`.git`文件夹), 若之前没有设置过,还需要`git config --global user.name "yourname"`以及`git config --global user.email "yourmail@email.com"`来注册基本信息.

### Github上创建博客
- 在Github创建新的Repository[New Repository](https://github.com/new). 在Github主页右下角一般显示了你当前库数量.
- 啊

### 将项目拉到本地,并修改
1. 在Github中,打开自己的主页项目如`https://github.com/name/name.github.com`,在右下clone URL处选择`SSH`并点图标进行复制
2. 在本地需要放置网页的库(文件夹内),克隆远程项目到本地(这里使用ssh协议,所以请确保上述ssh key已正常可用).使用命令`git clone git@github.com:name/name.github.com.git` 来克隆内容到本地(提示是否登录,yes)
3. `touch readme.md` 创建库的说明文件,编辑内容可在github网页中看到.
4. 可以自行将主页内容拉到此处,使用`index.html`作主页文件.

### 可以使用Jekyll来构建

- 安装Jekyll
首先需要使用gem,gem是ruby安装后配套产生的. [下载ruby](http://rubyinstaller.org/downloads/)
可以使用 `gem update --system` 来升级gem
在命令行中 `gem install jekyll` 进行安装

##### Reference
1. [基础教程网-TeliuTe](http://teliute.org/mix/Tegit/lesson1/lesson1.html)



原创文章转载请注明出处: [使用Github搭建博客](http://9leg.com/java/2015/06/02/Build-Blog-Github.html)
