#! /bin/bash
# file: gitsubmit.sh

comment=$1
if [ -z $comment ];then
comment=regular
fi

git add -A
git commit -am "$comment"
if [ ! -z $2 ];then
	#git remote add gitcafe git@gitcafe.com:platinhom/platinhom.git 
	git push gitcafe HEAD:gitcafe-pages
fi
# may be changed to your branch here
git push origin master
