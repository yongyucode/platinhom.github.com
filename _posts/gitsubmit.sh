#! /bin/bash
# file: gitsubmit.sh

cd ..
git add -A
git commit -am "regular"
if [ -z $1 ];then
	git push origin master
else
	#git remote add gitcafe git@gitcafe.com:platinhom/platinhom.git 
	git push gitcafe master:gitcafe-pages
fi
cd -
