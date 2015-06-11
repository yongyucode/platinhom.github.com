#! /bin/bash
# Author: PlatinHom
# Last: 2015-06-07

# Full Usage: ./a.sh  title category tag
# Simple Usage without category and tag: ./a.sh  title

title=$1
category=$2
tag=$3

if [ -z $1 ];then
title="TempTitle-`date +%H%M%S`"
fi

if [ -z $2 ];then
category="Other"
fi

if [ -z $3 ];then
tag="Other"
fi


today=`date +%Y-%m-%d`
now=`date "+%Y-%m-%d %H:%M:%S"` 
touch _posts/"${today}-${title}.md"
echo "---" >>_posts/"${today}-${title}.md"
echo "layout: post" >>_posts/"${today}-${title}.md"
echo "title: $title" >>_posts/"${today}-${title}.md"
echo "date: $now" >>_posts/"${today}-${title}.md"
echo "categories: $category" >>_posts/"${today}-${title}.md"
echo "tags: $tag" >>_posts/"${today}-${title}.md"
echo "---" >>_posts/"${today}-${title}.md"
echo "" >>_posts/"${today}-${title}.md"
echo "" >>_posts/"${today}-${title}.md"
echo "---" >>_posts/"${today}-${title}.md"
