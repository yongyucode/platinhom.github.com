---
layout: post
title: antechamber使用
date: 2015-09-15 12:56:55
categories: CompCB
tags: CompBiol
---

Usage: antechamber options

-i -o -fi and -fo must be appear in command lines and the others are optional

- **-i**   input file name
- **-fi**  input file format
- **-o**  output file name
- **-fo**  output file format
- **-c**  charge method
- -cf  charge filename
- -nc  net molecular charge (int)
- -a   additionalt file name
- -fa  additionalt file format
- -ao  additionalt file operation
    - crd : only read in coordinate
    - crg: only read in charge
    - name  : only read in atom name
    - type  : only read in atom type
    - bond  : only read in bond type 
- -m   mulitiplicity (2S+1), default is 1
- -rn  residue name, if not available in the input file, default is MOL
- -rf  residue toplogy file name in prep input file, default is molecule.res
- -mp  mopac program name, default is mopac.sh
- -mk  mopac keyword in a pair of quotation mark
- -gk  gaussian keyword in a pair of quotation mark
- -at  atom type, can be gaff, amber, bcc and sybyl, default is gaff
- -du  check atom name duplications, can be yes(y) or no(n), default is no
- -j   atom type and bond type prediction index, default is 4 
    - 0    : no assignment
    - 1    : atom type 
    - 2    : full  bond types 
    - 3    : part  bond types 
    - 4    : atom and full bond type 
    - 5    : atom and part bond type 
- -s   status information can be 0 (brief), 1 (the default) and 2 (verbose)
- **-pf**  remove the intermediate files: can be yes (y) and no (n), default is no

#### List of the File Formats  

file format type  | abbre.  | index | file format type  | abbre.   |index
Antechamber       |  ac     |    1  | Sybyl Mol2        |   mol2   |   2 
PDB               |  pdb    |    3  | Modifiled PDB     |   mpdb   |   4 
AMBER PREP (int)  |  prepi  |    5  | AMBER PREP (car)  |   prepc  |   6 
Gaussian Z-Matrix |  gzmat  |    7  | Gaussian Cartesia |   gcrt   |   8 
Mopac Internal    |  mopint |    9  | Mopac Cartesian   |   mopcrt |  10 
Gaussian Output   |  gout   |   11  | Mopac Output      |   mopout |  12 
Alchemy           |  alc    |   13  | CSD               |   csd    |  14 
MDL               |  mdl    |   15  | Hyper             |   hin    |  16 
AMBER Restart     |  rst    |   17  |                   |          |

AMBER restart file can only be read in as additional file

--------------------------------------------------------------

#### List of the Charge Methods  

charge method   |  abbre. | index | charge method    |  abbre. | index
RESP            |   resp  |   1  |  AM1-BCC          |  bcc    |  2
CM2             |   cm2   |   3  |  ESP (Kollman)    |  esp    |  4
Mulliken        |   mul   |   5  |  Gasteiger        |  gas    |  6
Read in Charge  |   rc    |   7  |  Write out charge |  wc     |  8

----------------------------------------------------------------

## 例子:
用ligand.mol2作例子:

~~~bash
# Calculate bcc charge for input mol2
antechamber -i ligand.mol2 -fi mol2 -o ligand_bcc.mol2 -fo mol2 -c bcc -pf
# Convert file to prepi and use parmchk to generate amber input parameter
antechamber -i ligand_bcc.mol2 -fi mol2 -o ligand_bcc.prep -fo prepi -pf
parmchk -i ligand.prep -f prepi -o ligand.frcmod
# in tleap: loadAmberPrep ligand.frcmod

# Directly generate prepi file from mol2 with bcc charge, not commend
antechamber -i ligand.mol2 -fi mol2 -o small_bcc.prep -fo prepi -c bcc -pf

# Convert mol2 <-> Gaussian input/output for charge calculation for esp/resp
antechamber -i ligand.mol2 -fi mol2 -o ligand.gjf -fo gcrt -pf
antechamber -i ligand.log -fi gout -o ligand_resp.mol2 -fo mol2 -c resp -pf

# Write out the charge to charge file
antechamber -i ligand_bcc.mol2 -fi mol2 -c wc -cf ligand_c.crg
# Load known charge to molecule. The charge file ligand_c.crg is f10.8  8charge/per line
antechamber -i ligand.mol2 -fi mol2 -o ligand_c.mol2 -fo mol2 -c rc -cf ligand_c.crg

~~~

## Reference

1. [antechamber](http://ambermd.org/antechamber/ac.html#antechamber)

------
