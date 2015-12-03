---
layout: post
title: Jekyll下划线文件夹问题
date: 2015-12-02 04:31:49
categories: IT
tags: Website
---


今天下了Python的手册, 在Github/Jekyll生成时均页面无法正常显示, 但直接双击相应文件浏览器直接打开都没有问题. 据查, 主要原因是Jekyll对所有underscore leading文件夹(如\_)均不进行复制到_site文件夹操作, 因此无法在网页中存在\_static等文件夹, 从而无法加载一些js/css文件.

[Sphinx](http://sphinx-doc.org/)


TODO:

[^jekyllgithubissue]: [Jekyll ignores directories/files with underscores](https://github.com/jekyll/jekyll/issues/55)

------
