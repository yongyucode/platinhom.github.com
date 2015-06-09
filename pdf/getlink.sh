#! /bin/bash

echo "---">index.md
echo "title: PDF">>index.md
echo "layout: page">>index.md
echo "comments: yes">>index.md
echo "---">>index.md
echo "">>index.md

echo "## The files were collected from Internet. If they violate your right, please contact me by [e-mail](mailto:zhaozxcpu@hotmail.com).">>index.md
for files in *.pdf */*.pdf
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