#! /bin/bash
# Author: PlatinHom
# Last: 2015-06-07

# Full Usage: ./a.sh  title category tag
# Simple Usage without category and tag: ./a.sh  title

title=$1
category=$2
tag="${@:3}"

if [ -z $1 ];then
title="TempTitle-`date +%H%M%S`"
fi

if [ -z $2 ];then
category="Other"
fi

if [ -z $3 ];then
tag="Other"
fi

#My blog use GMT+8:00 time zone-China
# For MacOS
if [ `uname -s` == "Darwin" ];then
	today=`date -u -v "+8H" +"%Y-%m-%d"`
# Other OS
else
	today=`date -u -d "+8 hour" +"%Y-%m-%d"`
fi

#In github's jekyll,you should enter GMT time (time zone UTC(+0:00))
nowGMT=`date -u +"%Y-%m-%d %H:%M:%S"`
 
touch _posts/"${today}-${title}.md"
echo "---" >>_posts/"${today}-${title}.md"
echo "layout: post" >>_posts/"${today}-${title}.md"
echo "title: $title" >>_posts/"${today}-${title}.md"
echo "date: $nowGMT" >>_posts/"${today}-${title}.md"
echo "categories: $category" >>_posts/"${today}-${title}.md"
echo "tags: $tag" >>_posts/"${today}-${title}.md"
echo "---" >>_posts/"${today}-${title}.md"
echo "" >>_posts/"${today}-${title}.md"
echo "" >>_posts/"${today}-${title}.md"
echo "---" >>_posts/"${today}-${title}.md"
