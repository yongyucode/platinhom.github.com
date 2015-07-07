#! /bin/bash
# file: submit.sh

git add -A
git commit -am "regular"
git push origin master
git push gitcafe master:gitcafe-pages
