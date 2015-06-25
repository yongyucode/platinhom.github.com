#! /bin/bash
# file: UPDateFromScript.sh
# Author: Platinhom, 2015.6.25

# A script to update the code block in the blog files.
# The code block should be between ~~~ ..... ~~~ 
# and has a line before the block: ###### FILE: sourcecode_file   
#
# You may change the two directories, saving the source code files and blog files.
sd="/Users/Hom/MyGit/Homepage/platinhom.github.com/scripts"
pd="/Users/Hom/MyGit/Homepage/platinhom.github.com/_posts"

cd $sd

### linkfile save the relation between source code file and blog files.
: > linkfile 
date >> UpDateFromScript.log

for fii in *.[spcf]*
do
###  !!!!!! sourcecode_file
echo "!!!!!! $fii">>linkfile
grep "$fii" ${pd}/*.[mh]*[dl] | grep "###### FILE:" | awk -F \: '{print $1}' >>linkfile
done

# IFS is seperate symbol.
# Avoid the blank to seperate file name, 
# Here we change it temply.
OLDIFS=$IFS
IFS=$'\n'

sourcefile=""
blogfile=""
for line in `cat linkfile`
do

if [ ${line:0:6} = "!!!!!!" ];then
	sourcefile=${line:7};
else
	blogfile=$line;
	# Run the program by UPDateFromScript.py !
	newfile=`python UPDateFromScript.py "$sourcefile" "$blogfile" | grep "!!! New file"`;

	if [ -z "${newfile}" ];then
		echo "$sourcefile and $blogfile with the same codes"!
	else
		# Notice the string return...
		newfile=${newfile:17};
		# Log the result difference
		echo $newfile $blogfile | tee -a UpDateFromScript.log;
		diff $newfile $blogfile | tee -a UpDateFromScript.log;
		# Replace the old file
		echo "Compare done! Stop 5s. If you need, Ctrl+C to cancel replacement!"
		sleep 5
		mv $newfile $blogfile
	fi
fi
done

# Correct the IFS
IFS=$OLDIFS
