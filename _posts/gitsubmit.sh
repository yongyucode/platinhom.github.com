#! /bin/bash
# file: gitsubmit.sh

commend=$1
if [ -z $commend ];then
commend=regular
fi

cd ..
git add -A
git commit -am "$commend"
if [ ! -z $2 ];then
	#git remote add gitcafe git@gitcafe.com:platinhom/platinhom.git 
	git push gitcafe master:gitcafe-pages
fi
git push origin master
cd -
