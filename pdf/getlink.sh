#! /bin/bash

echo "---">index.md
echo layout:post>>index.md
echo "---">>index.md

for files in *.pdf */*.pdf
do
echo "[${files}](/pdf/${files})" >> index.md
done
