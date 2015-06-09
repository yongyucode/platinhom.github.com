#! /bin/bash
# Author: Platinhom
# Last updated:2015.6.9

# To list all the pdf file into the index.md file.
# Notice the encoding problem. http://platinhom.github.io/2015/06/09/msys-utf8-problem.html

echo "---">index.md
echo "title: PDF">>index.md
echo "layout: page">>index.md
echo "comments: yes">>index.md
echo "---">>index.md
echo "">>index.md

echo "## The files were collected from Internet. If they violate your right, please contact me by [e-mail](mailto:zhaozxcpu@hotmail.com).">>index.md

echo "- Manual:    ">>index.md
for files in manual/*.pdf
do
filename=${files##*/}
echo "[${filename%.*}](/pdf/${files})" >> index.md
done

echo "- Book:    ">>index.md
for files in book/*.pdf
do
filename=${files##*/}
echo "[${filename%.*}](/pdf/${files})" >> index.md
done

echo "- Paper:    ">>index.md
for files in reference/*.pdf
do
filename=${files##*/}
echo "[${filename%.*}](/pdf/${files})" >> index.md
done

echo "">>index.md


if [ ! -z "`file index.md|grep ISO-8859`" ];then
iconv -f GBK -t UTF-8 index.md > index-2.md
rm index.md
mv index-2.md index.md
fi