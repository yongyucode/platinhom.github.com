#! /bin/bash

now=`pwd`
cd ..
for dir in HomCADD DailyTools HomPDF MolShow platinhom.github.com
do
	cd $dir
	echo ${dir} pulling..
	git pull
	cd ..
done

cd $now

