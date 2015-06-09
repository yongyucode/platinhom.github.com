#! /bin/bash

rm ./index.md
echo "---">index.md
echo "title: PDF">>index.md
echo "layout: page">>index.md
echo "comments: yes">>index.md
echo "---">>index.md
echo "">>index.md

for files in *.pdf */*.pdf
do
echo "[${files}](/pdf/${files})" >> index.md
done
