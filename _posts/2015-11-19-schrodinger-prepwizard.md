---
layout: post
title: Schrodinger:prepwizard
date: 2015-11-18 19:42:46
categories: CompCB
tags: CompBiol Software
---


Protein Preparation Wizard  Import and Process Tab
Summary
Import and Process Tab Features
Related Topics
Summary
In this tab you can import a structure if there is not already a structure in the Workspace, select options to amend the structure, and perform the basic preparation tasks.

Note: You should always check that the structure is correct after any automatic procedure is run.

Import and Process Tab Features
Import structure into Workspace section
Preprocess the Workspace structure section
Import structure into Workspace section
The Protein Preparation Wizard uses the structure in the Workspace as its input. The import controls are provided so you can conveniently load a structure from an external source. These allow you to obtain a protein structure from a file or from the PDB. The structure is imported into the project as a project entry, and replaces the Workspace.

PDB text box
Include options
Import button
Browse button
PDB text box
Enter the PDB ID of the protein you want to retrieve in this text box.

Include options
These options allow you to choose extra data from the PDB to download along with the structure:

Diffraction data option Select this option to download the X-ray diffraction data as well as the structure. This is particularly useful for PrimeX.

Biological unit option Select this option to download the biological unit from the PDB rather than the regular PDB file. All structures in the biological unit are merged into a singe project entry on import. This option requires an internet connection.

Alternate positionsSelect this option to include alternate positions of the atoms in the structure. By default only the highest occupancy position is downloaded.

Import button
Click this button to import the specified protein from your local copy of the PDB, with a fallback to downloading from the PDB web site. If you want to download the protein from the PDB web site, you can use the Get PDB File dialog box to download the file, then import it by clicking Browse in the Protein Preparation Wizard panel.

Browse button
Clicking this button opens the Import panel, in which you can navigate to the desired file and import it.

Preprocess the Workspace structure section
In this section you select options to amend the structure and perform the basic preparation tasks. A new entry is created for the preprocessed structure, which is colored by element.

Align to options
Assign bond orders option
Add hydrogens option
Remove original hydrogens option
Create zero-order bonds to metals option
Create disulfide bonds option
Convert selenomethionines to methionines option
Fill in missing side chains using Prime option
Fill in missing loops using Prime option
Cap termini option
Delete waters beyond N  from het groups option and text box
Preprocess button
View Problems button
Align to options
Align the protein structure to a reference structure using the structalign program, with the default settings. This option has two associated options for selection of the reference structure:

Selected entryUse the entry that is selected in the Project Table for the reference structure. There must be only one entry selected in the Project Table.
PDBUse the protein from the PDB whose 4-letter ID is given in the text box.
See the Protein Structure Alignment Panel topic for more information.

Assign bond orders option
Assign bond orders to all bonds in the structure, including het groups. This option performs the same task as Assign Bond Orders on the Tools menu.

Add hydrogens option
Add hydrogens to all atoms in the structure that lack them. The hydrogens are added by the utility applyhtreat.

Remove original hydrogens option
Remove the original hydrogens before adding hydrogens to the structure. This option allows any problems with hydrogen atoms in the original structure to be fixed, including nonstandard names, which prevent proper H-bond assignment.

Create zero-order bonds to metals option
Break bonds to metals and corrects the formal charge on the metal and the neighboring atoms, then add zero-order bonds between the metal and its ligands, so that it is still considered part of the same molecule.

Create disulfide bonds option
Find sulfur atoms that are within 3.2  of each other, and add bonds between them. CYS residues are renamed to CYX when the bond is added. This option is selected by default.

Convert selenomethionines to methionines option
This option converts selenomethionines (MSE) to methionines (MET), and is not selected by default. A dialog box opens to inform you if any conversions are done.

Fill in missing side chains using Prime option
Run a Prime refinement job (refinestruct) to place and optimize the missing side chains. See the Predict Side Chains Panel topic for more information.

Fill in missing loops using Prime option
Fill in missing loops from the SEQRES records in the PDB file. Requires Prime. The resulting loop may not be of high quality, and a Prime loop refinement should be performed to obtain higher quality. See the Refine Loops Panel topic for details.

Cap termini option
Add ACE (N-acetyl) and NMA (N-methyl amide) groups to uncapped N and C termini. These termini include any chain breaks.

Delete waters beyond N  from het groups option and text box
Delete waters that are more than the specified distance (in angstroms) from any het group.

You can also delete waters individually in the Review and Modify tab, and you can delete waters that do not form H-bonds with non-waters in the Refine tab.

Preprocess button
Prepare the structures using the options selected in this section. The progress of the structure correction is displayed at the foot of the panel. When all operations are finished, a new entry is created and a color scheme is applied to the structure. The tables in the Review Structure tab are filled in, and if any problems are found with the structure, the Protein Preparation - Problems dialog box is displayed, listing the problematic atoms or residues.

View Problems button
Open the Protein Preparation - Problems dialog box, which contains tables of residues that have missing atoms, overlapping atoms, and atoms that are incorrectly typed. The Workspace structure is analyzed to detect these problems before opening the dialog box. You can click on a row in any of the tables in the dialog box to zoom in on the atoms or residues listed in that row. To fix a problem, you can use any of the Maestro capabilities.

Related Topics
Protein Preparation Wizard Panel


[免费可视化主程序-Maestro](https://www.schrodinger.com/freemaestro/), [帮助手册(需要注册)](http://www.schrodinger.com/supportdocs/18/)


I am trying to run the Protein Preparation Wizard from the command line with -NJOBS for multicore processing but I am getting this error message: 

PDB format is not supported for StructureWriter
RuntimeError: PDB format is not supported for StructureWriter

What is the problem?

It looks like you had the output file format set to PDB (filename.pdb). For multi-structure processing, you will have to set the output format to Maestro (filename.mae), as multi-structure PDB files are not supported.
The -NJOBS option is used to distribute the preparation of multiple proteins. The input file must be a multi-structure Maestro file. So, as an example, if you had a Maestro file with 3 proteins (3_pdb.mae) to be prepared, you could run a command like this:
$SCHRODINGER/utilities/prepwizard -NJOBS 3 -HOST MY\_HOST:3 3\_pdb.mae 3\_pdb\_prep.mae
in order to distribute the job over three processors on MY_HOST.


------
