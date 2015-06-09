#! /bin/bash

LANG=zh_CN.UTF-8
LC_ALL=zh_CN.UTF-8
echo "---">index.md
echo "title: 关于我">>index.md
echo layout:page>>index.md
echo "comments: yes">>index.md
echo "---">>index.md
echo "">>index.md

for files in *.pdf */*.pdf
do
echo "[${files}](/pdf/${files})" >> index.md
done
