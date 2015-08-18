#! /usr/bin/env python
# -*- coding: utf8 -*-

'''
Author: Hom, Date: 2015.8.18
To pre-process SVM input to training set and validation set.
User can set the training set radio, defaul is 0.8
User can also assign the output sets number, defalut is 1
Usage: python SVM_trainvalid.py input.txt [outsets trainingradio] 
'''

print __doc__

import os,sys,random
from math import *

trainradio=0.8;
outsets=1;

def countclass(data):
	classdict={};
	classlist=[];
	for line in data:
		classNum=line.strip().split()[0];
		if (classNum.isdigit()):
			if (classNum in classdict):
				classdict[classNum].append(line);
			else:
				classdict[classNum]=[line];
				classlist.append(classNum);
	return [classlist,classdict];

def writeTrainValid(classlist, classdict, fname='data.txt',outputsets=1, trainsetradio=0.8, newline=False):
	fnamelist=os.path.splitext(fname);

	for outset in range(outputsets):
		trainfname=fnamelist[0]+"_train_"+str(outset+1)+fnamelist[1];
		validfname=fnamelist[0]+"_valid_"+str(outset+1)+fnamelist[1];
		ftrain=open(trainfname,'w');
		fvalid=open(validfname,'w');
		for c in classlist:
			classNow=classdict[c];
			count=len(classNow);
			Ntrain=int(count*trainsetradio);
			#Nvalid=count-Ntrain;
			shufflelist=range(count);
			random.shuffle(shufflelist);
			if (newline):
				for i in shufflelist[:Ntrain]:
					ftrain.write(classNow[i]+'\n');
				for i in shufflelist[Ntrain:]:
					fvalid.write(classNow[i]+'\n');	
			else:
				for i in shufflelist[:Ntrain]:
					ftrain.write(classNow[i]);
				for i in shufflelist[Ntrain:]:
					fvalid.write(classNow[i]);	
		ftrain.close();
		fvalid.close();

if (__name__ == '__main__'):
	if (len(sys.argv) < 2):
		print "Please give an input SVM data file!";
		exit(1);
	elif(len(sys.argv)>=3):
		if (sys.argv[2].isdigit()):
			outsets=int(sys.argv[2]);
		else: 
			print "Output sets should be a digit!";
			exit(1);
		if (len(sys.argv)==4):
			if (sys.argv[3].isdigit()):
				trainradio=float(sys.argv[3]);
				if (trainradio>1.0 or trainradio<0):
					print "Training set radio should be [0,1]";
					exit(1);
			else: 
				print "Training set radio should be a digit!";
				exit(1);

	fname=sys.argv[1];
	fr=open(fname);
	data=fr.readlines();
	# Analyze classification of data
	countresult=countclass(data);
	# Write out training set and validation set
	# Output many sets of training/validation set based on outsets parameter
	writeTrainValid(countresult[0],countresult[1],fname,outsets,trainradio,False);
	fr.close();
#end main