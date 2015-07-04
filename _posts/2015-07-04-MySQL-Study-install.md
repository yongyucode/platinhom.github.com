---
layout: post
title: MySQL学习1-安装登录和创建数据库
date: 2015-07-04 11:00:00
categories: MathStat
tags: Database
---
![](http://dev.mysql.com/common/logos/logo-mysql-110x57.png)
下载: [官网下载](http://dev.mysql.com/downloads/mysql/) 

### 失败的安装...

- 安装及简单配置: 先学基础,下了Mac版发现安装需要600多M,好大...然后就去下了window版. Window版是免安装的uninstall的.解压后放到某个文件夹, 复制里面的my-default.ini,黏贴,将黏贴得到新文件F2改名为my.ini.打开文件,在[client] 与 [mysqld] 下均添加一行: `default-character-set = gbk`.基本设置完成了,然后设置环境变量和启动后台服务.   
- 注册环境变量和安装服务: 右键我的电脑-高级设置-环境变量,在上面用户环境变量里加入新项: `MYSQL_HOME`,值为安装的文件夹,例如D:\Software\MySQL 然后更改path环境变量,在最后面加入`;%MYSQL_HOME%\bin;`(;是分隔符). 然后跑到C:/Window/System32里面,右键cmd.exe文件,用管理员权限打开命令行窗口, 执行`mysqld --install MySQL --defaults-file="my.ini"`, 提示"Service successfully installed."表示成功. 要是不是管理员权限打开cmd运行的话,会提示`Install/Remove of the Service Denied!`.  
- 启动MySQL服务: 在管理员权限 Windows 命令提示符下运行: 启动: `net start MySQL`. 另外, 停止: net stop MySQL; 卸载: sc delete MySQL. 当然暂时不执行后两者了.

However. 按上述方法安装后服务启动不了,一直报错: 服务无法启动 3523. 研究了半天, 看来现在自解压版本的配置文件不能这么直接修改就用..好吧. 最后还是去下了个直接安装版本.....上面的内容就忽略掉吧.....直接去找installer 版本来安装, 直接下一步下一步就搞掂了....按照上述第二条将环境变量设置后,就可以直接使用了. 再去看看他的配置文件(在C盘ProgramData里面那个版本),复杂多了...好吧..

##使用
安装时会提示你输入root密码.另外还可以注册新用户.好了.

### 登录到SQL:

- `mysql -h 主机名 -u 用户名 -p`
	- -h : 该命令用于指定客户端所要登录的MySQL主机名, 登录当前机器该参数可以省略;
	- -u : 所要登录的用户名,缺省为当前用户
	- -p : 告诉服务器将会使用一个密码来登录, 如果所要登录的用户名密码为空, 可以忽略此选项。

## Reference

1. [21分钟 MySQL 入门教程](http://www.cnblogs.com/mr-wid/archive/2013/05/09/3068229.html#d17)

---

