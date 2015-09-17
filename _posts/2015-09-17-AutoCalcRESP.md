---
layout: post
title: 自动计算ESP和RESP电荷(AMBER and G09)
date: 2015-09-17 00:22:13
categories: CompCB
tags: CompBiol
---

我们可以使用高斯对结构进行优化计算拟合ESP电荷,并再利用Ambertool的AnteChamber来转换高斯输出文件结果到指定文件格式,用于计算.这里就是要对小分子结构拟合出ESP和RESP电荷.

## 高斯计算



[Gaussian 09 fix](http://ambermd.org/bugfixesat.html)  
In Gaussian09 rev B.01, the facility to write out the electrostatic potential on a grid of points was inadvertently deleted. This means that antechamber and resp jobs won't work as they should. Fernando Clemente of Gaussian has kindly provided a script to work around the problem. Download the fixreadinesp.sh file, and follow the instructions there. (Note: you will have to make the script executable by typing chmod +x fixreadinesp.sh.)

[Problem](http://archive.ambermd.org/201108/0726.html)

## antechamber拟合电荷


~~~bash
#! /bin/bash
# Usage: Calculate Molecule ESP/RESP charge via Amber/G09.
# Input: molecule file in pdb/mol2 format
# Author: Zhixiong Zhao 2015-9-17

if [ -z $1 ];then
echo "Please assign the input file!"
exit
fi


#Setup the amber/Gaussian environment. You should modify by your own environment
if [ -z $AMBERHOME ];then
source /mnt/home/zhaozx/AmberTools/amber.sh
fi

if [ -z $g09root ];then
source /mnt/home/zhaozx/g09/gau_setup.sh
fi

# Generate bugfix tool fixreadinesp.sh developed by Fernando Clemente of Gaussian
# http://ambermd.org/fixreadinesp.sh

if [ ! -f fixreadinesp.sh ];then

echo "#!/bin/bash" > fixreadinesp.sh
echo "if [ \"\$(grep \"Charges from ESP fit\" \${1})\" != \"\" ] ; then" >> fixreadinesp.sh
echo "  printf \"%s\n\" \"\$(grep -i \"%chk=\" \${1})\"" >> fixreadinesp.sh
echo "  printf \"#p geom=allcheck chkbas guess=(read,only) density=check\n\"" >> fixreadinesp.sh
echo "  printf \"nosymm prop=(potential,read) pop=minimal\n\n\"" >> fixreadinesp.sh
echo "  grep \"ESP Fit Center\" \${1} | cut -c32- -" >> fixreadinesp.sh
echo "  printf \"\n\"" >> fixreadinesp.sh
echo "else" >> fixreadinesp.sh
echo "  awk '" >> fixreadinesp.sh
echo "  {" >> fixreadinesp.sh
echo "    if (\$0 ~ /Electric Field/) { " >> fixreadinesp.sh
echo "      while (\$0 !~ /Atom/) { print \$0 ; getline } " >> fixreadinesp.sh
echo "      while (\$0 ~ /Atom/) { print \$0 ; getline }" >> fixreadinesp.sh
echo "      while (\$0 !~ /^ ------/) {" >> fixreadinesp.sh
echo "        CENTERID=\$1" >> fixreadinesp.sh
echo "        OLDSTR=sprintf(\"%i    \",CENTERID)" >> fixreadinesp.sh
echo "        NEWSTR=sprintf(\"%i Fit\",CENTERID)" >> fixreadinesp.sh
echo "        sub(OLDSTR,NEWSTR,\$0)" >> fixreadinesp.sh
echo "        print \$0" >> fixreadinesp.sh
echo "        getline" >> fixreadinesp.sh
echo "        }" >> fixreadinesp.sh
echo "      }" >> fixreadinesp.sh
echo "    sub(/Read-in Center/,\"ESP Fit Center\",\$0)" >> fixreadinesp.sh
echo "    print \$0" >> fixreadinesp.sh
echo "  }' \${1}" >> fixreadinesp.sh
echo "  fi" >> fixreadinesp.sh

chmod +x fixreadinesp.sh

fi

basename=${1%.*}
exdname=${1##*.}

if [ $exdname = "mol2" ];then
antechamber -fi mol2 -fo gcrt -pf y -i $1  -o ${basename}.gjf -gn "%nproc=8" -gm "%mem=1000MB" -gk "#HF/6-31G* SCF=tight Test Pop=MK iop(6/33=2) iop(6/42=6) opt nosymm" -ch "${basename}"
elif [ $exdname = "pdb" ];then
antechamber -fi pdb -fo gcrt -pf y -i $1 -o ${basename}.gjf -gn "%nproc=8" -gm "%mem=1000MB" -gk "#HF/6-31G* SCF=tight Test Pop=MK iop(6/33=2) iop(6/42=6) opt nosymm" -ch "${basename}"
else
echo "Only support for pdb or mol2 files!"
exit
fi

g09 ${basename}.gjf
antechamber -fi gout -fo mol2 -pf y -i ${basename}.log -o ${basename}_esp.mol2 -c esp

# Fix bug in G09 b01
./fixreadinesp.sh ${basename}.log > tmpesp.gjf
g09 tmpesp.gjf
./fixreadinesp.sh tmpesp.log > ${basename}.out
antechamber -fi gout -fo mol2 -pf y -i ${basename}.out -o ${basename}_resp.mol2 -c resp

rm punch qout QOUT esout tmpesp.gjf tmpesp.log
~~~


[iop](http://www.gaussian.com/g_tech/g_iops/iops2.pdf)

------
