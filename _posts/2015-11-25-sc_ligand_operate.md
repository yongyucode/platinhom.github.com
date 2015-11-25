---
layout: post
title: Schrodinger操作小分子
date: 2015-11-24 17:38:31
categories: CompCB
tags: CompBiol Software
---

## pv_convert.py

Usage:   

`$SCHRODINGER/run pv_convert.py -m <pose\_viewer\_file> [-M <radius>]...`  
`$SCHRODINGER/run pv_convert.py -p|-l|-r <structure_file> ...`
 
 Converts pose viewer files into a series of complexes, and convert complexes into ligand-only, receptor-only, or pose viewer files.  The -merge_pv mode takes an input pose viewer file and creates a file with a series of receptor-ligand complexes. The other modes take a file with one or more receptor-ligand complexes and extract the receptor and ligand into a pose viewer format maestro file, or extract the ligands into a file, or extract the the receptors into a file. The last molecule in the complex is assumed to be the ligand by default. 

 Copyright Schrodinger, LLC. All rights reserved.
 
Options:  

~~~
-v, -version          Show the program's version and exit.
-h, -help             Show this help message and exit.
-m, -merge_pv         Combine pose viewer receptor and poses into a series  
					of complexes.
-M MERGE\_PV\_RADIUS, -merge\_pv\_radius MERGE\_PV_RADIUS   
                     When combining pose viewer receptor and poses into a  
                     series of complexes, only include receptor residues  
                     within this distance, in angstroms, from the ligand.  
-p, -split_pv         Extract receptor and ligand from complexes, write as  
                     pose viewer format file(s).
-l, -split_ligand     Extract ligand from complexes, write ligand(s) to  
                     output file(s).
-r, -split_receptor   Extract receptor from complexes, write receptor(s) to  
                     output file(s).
-a ASL, -asl ASL      Optional ASL expression to identify the ligand  
                     molecule from a receptor-ligand complex.  The entire  
                     string must be quoted, and internal quotes must be  
                     escaped.  e.g. -asl "res.ptype \'UNK \'".  
-q, -quiet            Run tasks without intermediate reporting.  
-asl\_file ASL_FILE    Optional file containing the ASL expression. The  
                     expression in the file supersedes -asl expression.  
-s, -separate_files   When splitting ligands/receptors from complexes put  
                        each ligand/receptor into a unique file name (old  
                        default mode).  
~~~

## structcat

structcat - concatenate structure files of various formats into one file
 
`$SCHRODINGER/utilities/structcat -i[<format>] <inputfile> [-i[<format>] <inputfile>...] [-o[<format>]] <outputfile>`
 
(or)
 
`$SCHRODINGER/utilities/structcat <inputfiles> -o[<format>] <outputfile>`
 
  <format> must be one of:  

-    mae  : Maestro format
-    sd   : V2000 SDfile format
-    pdb  : PDB format
-    mol2 : sybyl (.mol2) format
-    smi  : SMILES format
 
  If <format> is omitted, the file extension is used to determine the format.


## structconvert 

~~~
usage: structconvert.py [-h]
                        [-imm | -imol2 | -imae | -ismi | -icsv | -ipdb | -isd]
                        [-omm | -omol2 | -omae | -osmi | -ocsv | -opdb | -osd]
                        [-a] [-stereo {none,annotation,3d}] [-smi SMILESCol]
                        [-name nameCol]
                        [-split-nstructures STRUCTURES\_PER\_OUTPUTFILE | -split-nfiles OUTPUTFILE_COUNT]
                        [-n selectStr] [-no_color] [-no\_dup_conect]
                        [-multbonds] [-warn_h] [-no_geometry] [-no_renum]
                        [-no_reorder] [-reorder\_by_resnum]
                        [-reorder\_by_sequence] [-no_fixelem] [-first_occ]
                        [-all_occ] [-remediated] [-hybrid36] [-psp]
                        [-ignore_obsolete] [-warn_obsolete]
                        [-use_component_dict] [-no_component_dict]
                        [-data DATA] [-model MODEL] [-num\_models NUM_MODELS]
                        [-histidine HISTIDINE] [-occ OCC] [-nostereo]
                        [-noarom] [-nolewis] [-notypes] [-2D] [-u]
                        inputfile outputfile
~~~

positional arguments:
-  inputfile
-  outputfile
 
optional arguments:

~~~
  -h, --help            show this help message and exit
  -a                    Append to output file instead of overwriting (not supported for all conversions)
  -stereo {none,annotation,3d}
                        Stereochemsitry source when writing to SMILES (default 3d)
  -smi SMILESCol        User specified field of SMILES strings, either by name or by column index starting at 1. By default, SMILES column is the first column (CSV format only).
  -name nameCol         User specified field to use as molecule name, either by name or by column index. By default, it is the second column (CSV format only).
  -split-nstructures STRUCTURES\_PER_OUTPUTFILE
                        Split the output files in N structures per file (Only mae -> mae conversions)
  -split-nfiles OUTPUTFILE_COUNT
                        Split the output into N files. (Only mae -> mae conversions)
  -n selectStr          The set of input structures to process:
                        1,4       - structures 1 and 4
                        1:10,14   - structures 1 through 10 and 14
                        2:        - structures 2 through the end of file
                        :5,13:18  - structures 1 through 5 and 13 through 18
                        
                        All structures are processed by default.
                        (This option is not supported by all conversions)
~~~

Input formats:

-  -imm                  MacroModel (.dat) format
-  -imol2                sybyl (.mol2) format
-  -imae                 Maestro format
-  -ismi                 SMILES format
-  -icsv                 CSV file, SMILES with properties
-  -ipdb                 PDB format
-  -isd                  V2000 SDfile format
-  -omm                  MacroModel (.dat) format
-  -omol2                sybyl (.mol2) format
-  -omae                 Maestro format
-  -osmi                 SMILES format
-  -ocsv                 CSV file, SMILES with properties
-  -opdb                 PDB format
-  -osd                  V2000 SDfile format
 
For conversion to/from PDB format, the following options are also supported:

- -no_color
- -no\_dup_conect
- -multbonds
- -warn_h
- -no_geometry
- -no_renum
- -no_reorder
- -reorder\_by_resnum
- -reorder\_by_sequence
- -no_fixelem
- -first_occ
- -all_occ
- -remediated
- -hybrid36
- -psp
- -ignore_obsolete
- -warn_obsolete
- -use\_component_dict
- -no\_component_dict
- -data DATA
- -model MODEL
- -num\_models NUM_MODELS
- -histidine HISTIDINE
- -occ OCC
 
For conversion to/from SD format, the following options are also supported:

-  -nostereo
-  -noarom
-  -nolewis
-  -notypes
-  -2D
-  -u
 
Limitations:

-  * PDB and SMILES format can not be interconverted.
-  * Only first structure is written when writing to PDB format.
-  * Structures can not be written to the obsolete MM format.
-  * When SMILES are converted to Maestro format, the output structures are 2D (not valid for many programs). Use LigPrep to generate 3D Maestro structures from SMILES.
-  * Conversion to older/newer Maestro format is only supported for input Maestro format file.


## Reference

1. [How do I combine a receptor and a ligand from separate files into a file with a single entry for the complex?](http://www.schrodinger.com/kb/286)
2. [Can I combine Maestro files or other structure files from the command line?](http://www.schrodinger.com/kb/190)

------
