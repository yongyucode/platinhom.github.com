#! /bin/bash
# Author: PlatinHom
# Last: 2015-06-07

# Usage: ./a.sh category tag title

category=$1
tag=$2
title=$3

if [ -z $1 ];then
	category="Other"
fi

if [ -z $2 ];then
	category="其他"
fi

if [ -z $3 ];then
	title="TempTitle-`date +%H:%M:%S`"
fi

today=`date +%Y-%m-%d`
now=`date "+%Y-%m-%d %H:%M:%S"`

touch _posts/"${today}-${title}.md"
echo "---" >> _posts/"${today}-${title}.md"
echo "layout: post" >> _posts/"${today}-${title}.md"
echo "title: $title" >> _posts/"${today}-${title}.md"
echo "date: $now" >> _posts/"${today}-${title}.md"
echo "categories: $category" >> _posts/"${today}-${title}.md"
echo "tags: $tag" >> _posts/"${today}-${title}.md"
echo "---" >> _posts/"${today}-${title}.md"
echo "" >> _posts/"${today}-${title}.md"
echo "" >>_posts/"${today}-${title}.md"
echo "---" >>_posts/"${today}-${title}.md"
