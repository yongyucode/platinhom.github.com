#! /usr/bin/env python
# -*- coding: utf8 -*-

# file: UPDateFromScript.py
# Author: Hom, Date: 2015.6.25
# A script with UPDateFromScript.sh to update the code blocks in blogs.
# Usage as: python UPDateFromScript.py sourcecode_file blog_file

import os,sys

# The main function to refresh the code block in blog.
# Input 1:source code file; 2:blog file containing code block.
def RefreshFile(fi,fu):
	fin=open(fi,'r');
	fui=open(fu,'r');
	fuo=open(fu+'-tmp.md','w')
	findplace=False;
	findcode=False;
	codepre=""
	for line in fui:
		# Find the head: "###### FILE: scriptname"
		if (line[:6]=="######"):
			tmp=line.split()
			if (tmp[1].upper()[:4]=="FILE" and tmp[2]==fi):
				print fi,fu
				findplace=True;
				fuo.write(line);
				continue;
		# Find the code block beginning with ~~~ 
		if (findplace and (not findcode)):
			if (line[:3]=="~~~"):
				codepre=line.split()[0];
				findcode=True;
				fuo.write(line);
				for line2 in fin:
					fuo.write(line2);
				continue;
		#Find the end of code block
		if (findplace and findcode):
			if (line[:3]=="~~~"):
					if (line.strip()==codepre):
						findcode=False;
						findplace=False;
						fuo.write('\n');
						fuo.write(line);
						continue;
			continue;
		fuo.write(line);	
	fin.close();
	fui.close();
	fuo.close();
	return fu+'-tmp.md';

if (__name__ == '__main__'):
	if (len(sys.argv)!=3):
		print "Make sure two input files run as: ./UPDateFromScript.py sourcecode_file blog_file!"
		exit(1)
	# read the input, avoid last \n
	fi=sys.argv[1].strip();
	fu=sys.argv[2].strip();
	# Warning : This return string is important for UPDateFromScript.sh!
	print "!!! New file as: "+RefreshFile(fi,fu);
#end main


