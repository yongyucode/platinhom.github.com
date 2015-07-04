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
安装时会提示你输入root密码.另外还可以注册新用户.好了,之后终于可以登录和操作了!使用安装后的命令行工具或者别的命令行工具配合环境变量的存在,就可以直接登录了.

### 登录到SQL:

- `mysql -h 主机名 -u 用户名 -p`
	- -h : 该命令用于指定客户端所要登录的MySQL主机名, 登录当前机器该参数可以省略;
	- -u : 所要登录的用户名,缺省为当前用户
	- -p : 告诉服务器将会使用一个密码来登录, 如果所要登录的用户名密码为空, 可以忽略此选项。
- 修改root密码: 这是个暴力的过程,但是一旦你忘了..好像我的xampp按理预设密码为空,但是我装的时候却有密码..所以要暴力对待.
	1. 登录机器root账号(Mac要启动root账号,百度去吧)
	2. 停止mysqld服务(例如我在xampp中直接停止服务器服务).很关键.
	3. 搜索到你的mysqld执行文件,过去运行`./mysqld --skip-grant-tables` 这时会卡着.那就成功了.这条命令是跳过权限检查启动mysql服务.
	4. 另开一个窗口,切换到mysql命令目录所在,运行`mysql –u root`登录root,呵呵,成功了.
	5. `use mysql`打开mysql数据库.`update user set password=PASSWORD('新密码') where user='root'`, 一定要一模一样去写,新密码自己改自己的就可以了.`flush privileges`刷新保存.搞掂.
	6. 刚才那个`mysqld --skip-grant-tables`会一直运行,在另外这个root窗口, `ps -ef |grep mysqld --skip-grant-tables`把他找出来,一般有两个结果,注意有一个是grep命令的..找到这个进程的pid,然后`kill pidnumber`.否则mysqld服务无法启动.
	7. 这步是xampp用户登录phpadmin的,不是必要的.修改xamppfiles/phpmyadmin/config.inc.php.其中`$cfg['Servers'][$i]['auth_type'] = 'http';$cfg['Servers'][$i]['user'] = 'root';$cfg['Servers'][$i]['password'] = 'abcd';`这里,auth_type由config改为http,密码改为刚才改的.这时就可以使用xampp的phpmyadmin了.这时最好运行一下`xamppfiles/xampp security`更改一下xampp密码,mysql,ftp密码等.
- 添加用户(root): 和上类似,`use mysql`调用mysql数据库,然后`insert into user(Host,User,Password) values('localhost','Hom',password('hi'));`.这样就在mysql数据库中插入了用户Hom和密码.`flush privileges`刷新权限.


### 创建数据库

- `create database test_db character set gbk;`  
创建数据库,并设定字符编码.数据库名为test_db.注意最后分号语句结束的存在!不加分号会在下一行输入. 成功后 Query OK, 1 row affected(0.02 sec). 失败的话,可能没有权限如`ERROR 1044 (42000): Access denied for user ''@'localhost' to database 'hom_db'`.
- 可以使用 show databases; 命令查看已经创建了哪些数据库。

`quit`/`exit` 或者 `\q`都是退出

### 快速练习

~~~sql
create database test_db character set gbk;
use test_db;
create table students (id int unsigned not null auto_increment primary key, name char(8) not null, sex char(4) not null, age tinyint unsigned not null, tel char(13) null default "-" );
insert into students values(NULL, "王刚", "男", 20, "13811371377");
insert into students (name, sex, age) values("孙丽华", "女", 21);
~~~

我这里用xampp, 在xampp主页面左下角登录phpmyadmin,输入root和密码进去后就可以管理数据库系统了.从上面最左的数据库中可以看到刚才新建的数据库和其内容. ╮(╯▽╰)╭ 成功了.

## Reference

1. [21分钟 MySQL 入门教程](http://www.cnblogs.com/mr-wid/archive/2013/05/09/3068229.html#d17)

---

