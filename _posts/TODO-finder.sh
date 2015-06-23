#! /bin/bash

if [ -f *.html ];then
	grep "TODO" *.md *.html
	grep "todo" *.md *.html
	grep "Todo" *.md *.html
	grep "ToDo" *.md *.html
else
	grep "TODO" *.md
	grep "todo" *.md
	grep "Todo" *.md
	grep "ToDo" *.md
fi

