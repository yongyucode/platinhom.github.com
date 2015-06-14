#! /bin/bash


function hi
{
	echo "I'm in funtion"
	echo "$1"
	return 12
}

echo `hi`
hi 10
echo $?

