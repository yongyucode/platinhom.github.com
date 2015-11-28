---
layout: post_toc
title: Github相关总结
date: 1233-01-01 00:19:34
categories: IT
tags: Git
---

{::comment}
archive: true
> 本博文已合并到[Github相关总结](/1233/01/01/Github-related/#)中, 不再更新.
{:/comment}

本文将收录并重写和Github相关产品使用的博客并重新进行汇总. 一个艰巨的任务 =.=  
Git未来将再单独起一章汇总 =.=

> 一. Github和相关产品:

- [Gist介绍与用法](/2015/11/26/gist/){: target='_blank'}
- [Speaker Deck在线演示PPT文档](/2015/11/16/speakerdeck/){: target='_blank'}
- [Git大文件储存LFS (Git Large File Storage)](/2015/11/11/git-lfs/){: target='_blank'}
- [Github提交个人修改到开源项目](http://127.0.0.1:4000/2015/10/31/GithubPull/){: target='_blank'}
- [一个客户端拥有多个Github账号](/2015/11/17/diffAccount_Github/){: target='_blank'}

> 二. Github Page 搭建主页:

- [使用Github搭建博客](/2015/06/05/Build-Blog-Github/){: target='_blank'}
- [Project Page in Github Page](/2015/07/09/project-page-github/){: target='_blank'} , [页内](#l2-project-gh-pages)
- [Github Jekyll自定义404页面(MD方式)](/2015/07/09/404Page-Jekyll/){: target='_blank'} , [页内](#l2-404page)
- [将Github Page迁移到GitCafe Page](/2015/07/08/migrate-gitcafe/){: target='_blank'}

> 三. Markdown 撰写博客

- [Markdown 笔记](http://127.0.0.1:4000/2015/06/06/Markdown-note/){: target='_blank'}
- [kramdown和markdown较大的差异比较](http://127.0.0.1:4000/2015/11/06/Kramdown-note/){: target='_blank'}
- [Markdown中的代码块](http://127.0.0.1:4000/2015/07/10/fench-code-markdown/){: target='_blank'}
- [Pygments语法高亮](http://127.0.0.1:4000/2015/07/29/pygments-highlight/){: target='_blank'}

> 四. Github Page进阶---Jekyll:

- [Jekyll使用](/2015/07/27/Jekyll-usage/){: target='_blank'}
- [jekyll-window安装](/2015/07/30/jekyll-window/){: target='_blank'}
- [Liquid语言(jekyll所需)](/2015/11/28/Liquid-jekyll/){: target='_blank'}

> 五. Git 使用:

- [GIT命令总结](http://127.0.0.1:4000/2015/06/26/GIT-commands/){: target='_blank'}
- [GIT教程(ZZ自廖雪峰)](http://127.0.0.1:4000/2015/10/15/GitLearningExp/){: target='_blank'}

我是华丽丽滴分界线 ☺️

-------------------

# 一. Github和相关产品

## Github以及Github Page介绍

## Github社交

Github也提供了[Speaker Deck在线演示PPT/PDF文档](/1234/06/01/HTML-Language/#l3-speakerdeck)的服务, 方便用户进行交流学习. 通过将PPT转换为PDF后上传到Speaker Deck中, 就可以十分方便地获得嵌入代码, 从而在网页中展示你的报告.

## Gist介绍和应用

## Git大文件储存LFS (Git Large File Storage)

## Github类似产品: GitCafe和Gitlab

## 一个客户端拥有多个Git账号

# 二. Github Page 搭建主页

## 安装Git命令行工具

## 搭建初始化Github Page

## 套用模板

## 项目子页面 {#l2-project-gh-pages}

> 原博文: [Project Page in Github Page](/2015/07/09/project-page-github/){: target='_blank'}

It's very to create the web page for your new repository under your mainpage. Here, I record the procedure.

### Create a New Reposity

- You can easily create a new reposity in Github. At the left bottom corner of the main page of github, you can find your repositories. A "New reposity" button is there!
- Enter the name, describe your project, and choose whether create .gitingore file and license file. Then, create the new project.
- Copy the SSH address of your project, and `git clone git@github.com:username/projectname.git` clone the project with its address to local. It's not nessessary.

### Create a gh-pages branch
![](https://pages.github.com/images/create-branch@2x.png)

- The most easy way is to create the branch `gh-pages` online as the figure shown above. Enter the new name and github will remind you to create a new branch for it.
- You can also do that in command line by git: `git checkout --orphan gh-pages`, it will create a new branch without parent. If you want to create a blank branch only contains the project page, you can `git rm -rf .` to delete all the current files. I don't think it's nessesary indeed. It only need you to have a branch called `gh-pages`, that's enough. `git push -u origin gh-pages` to create your branch on remote.
- You can also change the default branch to gh-pages on repository setting. It will help you to change to gh-pages when you clone the repository.

### Create the page on gh-pages branch

- To create a simple index.html file online/on git is easy. But don't fancy.
- Use Jekyll! Yes, you can copy the jekyll needed files from your mainpage to the project page, such as _config.yml file, _layouts, _includes directory and even .gitignore CNAME 404.md files when you need. Because Jekyll need them to help you to convert markdown file to a page. If you don't copy these from your mainpage repository, the markdown file doesn't work at all!
- CSS/JS files don't need to be copied. Because the page can use them as its mainpage.
- Now you can visit `http://username.github.io/projectname` to visit the project page!

###### Reference
1. [Creating Project Pages manually](https://help.github.com/articles/creating-project-pages-manually/)
2. [GitCafe-Project Page](https://help.gitcafe.com/manuals/help/pages-services#为项目创建-pages-服务)

## 绑定网址

## 404页面 {#l2-404page}

> 原博文: [Github Jekyll自定义404页面(MD方式)](/2015/07/09/404Page-Jekyll/){: target='_blank'}

### Custom 404 Pages with Jekyll markdown style

-----

- It's very easy. Just create a file named `404.md` or `404.html` on the root directory of your homepage.
- Surely, we need to make it more interesting:

~~~markdown
---
title: 404
layout: page
---

<script language="JavaScript"> function myrefresh(){window.location="/";}setTimeout('myrefresh()',5000);</script>

## Error 404. Nothing was found :(   

How did you get to this link?

Please go to [homepage](/) or email me:

    zhaozxcpu@hotmail.com

## The page will redirect to the homepage after 5 seconds.....
~~~

- Here, I use my template "page" layout for it, similar to my homepage. 
- The javascript will refresh the 404 page after 5 second and redirect it to my homepage.
- You can change `window.location="/"` to `window.history.back()`, which could be back to the previous site.
- Below it's something you want to say~

Hey, see the result here: [My 404](http://platinhom.github.io/404)

Ref2 Yi Zeng also told you a method to create a 404.html page and use redirection in head of html. You can read it. But I recommand my method, it's easy and could retain you homepage style easily :)

###### Reference
1. [Custom 404 Pages](https://help.github.com/articles/custom-404-pages/)
2. [Create a custom Jekyll 404 page](http://yizeng.me/2013/05/26/create-a-custom-jekyll-404-page/)

# 三. Markdown 撰写博客

## 标准Markdown语言

## 强大的改进版: Kramdown

## 代码块与语法着色

# 四. Github Page进阶---Jekyll

## Jekyll介绍和本地化安装

## Jekyll使用

## Jekyll渲染器: Liquid

## Jekyll的插件

# 五. Git 使用



------