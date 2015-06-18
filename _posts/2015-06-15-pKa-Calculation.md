---
layout: post
title: pKa Calculation
date: 2015-06-15 08:43:13
categories: CompBiol
tags: 计算生物
---

### PB-Based
First finite-difference PB (FDPB) solver for irregular shape was constructed by Bashford and Karplus(Bashford-1990).
Neilsen et al optimize the hydrogen-bond network in protein for PB-based pKa calculations.(Nielsen-2001)

由平衡常数公式可以推得:
$$\alg \Delta G^o (A,HA) &= RT\ln 10 (pH-pK_a) \ealg$$  
根据残基在溶液中一般pKa和在蛋白中pKa可以知道`pKa Shift=pKa'(protein)-pKa(solution)`,再根据该残基在两种状态的$\Delta G$可以知道:  

$$\alg pK'_a = pKa + \frac{1}{RT \ln 10}[\Delta G_p (A,HA) - \Delta G_s (A,HA)]\ealg$$ ,其中s代表溶液状态,p代表蛋白状态. 
 
计算从气相到溶液相的溶剂化能,根据热力学平衡有:  

$$\alg \Delta G_s(HA,A) = -\Delta G_{g/s}(HA)+\Delta G_{g}(HA,A)+\Delta G_{g/s}(A)+\Delta G_{g/s}(H)\ealg$$  

计算从气相到蛋白相的溶剂化能,根据热力学平衡有:  

$$\alg \Delta G_p(HA,A) = -\Delta G_{g/p}(HA)+\Delta G_{g}(HA,A)+\Delta G_{g/p}(A)+\Delta G_{g/p}(H)\ealg$$  

由于游离质子在溶液中,不受蛋白影响,故有$$\Delta G_{g/p}(H) = \Delta G_{g/s}(H)$$, 两式相减,有:  

$$\alg \Delta \Delta G_{solv} = \Delta G_p(HA,A)-\Delta G_s(HA,A ) = RT\ln 10(pK^p_a-pK^s_a)\\ = \Delta G_{g/p}(A)-\Delta G_{g/s}(A)-[\Delta G_{g/p}(HA)-\Delta G_{g/s}(HA)] \ealg$$  

可以通过PB方程求解得出每个物质的溶剂化能,从而根据上式解得$$pK^p_a - pK^s_a$$.

#### Tools or server.

- [APBS](http://www.poissonboltzmann.org/)
[APBS-PDB2PQR](http://www.poissonboltzmann.org/docs/downloads/); [APBS-download](http://sourceforge.net/projects/apbs/); [PDB2PQR-download](http://sourceforge.net/projects/pdb2pqr/); [APBS-PDB2PQR github](https://github.com/Electrostatics/apbs-pdb2pqr);  
[egg Lysozyme pKa example](http://www.poissonboltzmann.org/examples/Lysozyme_pKa_example/)

运行APBS: `apbs file.in 2>&1 | tee file.out`

#### APBS参数文件范例:

~~~
read
    mol pqr 2LZT-noASH66.pqr # This is the compound for which we will calculate
                         # solvation energies
    mol pqr 2LZT-ASP66.pqr      # This is a compound used as a reference for grid
                         # centering
end

elec name inhom          
    mg-auto              # Focusing calculations
    dime 258 258 258     # This is a good grid spacing for this system
    cglen 52.0 66.0 79.0 # These are reasonable coarse grid settings for
                         # this system (PDB2PQR-recommended)
    fglen 51.0 59.0 67.0 # These are reasonable fine grid settings for this
                         # system (PDB2PQR-recommended)
    cgcent mol 2         # Center the grid on the reference molecule
    fgcent mol 2         # Center the grid on the reference molecule
    mol 1
    lpbe
    bcfl sdh
    pdie 20.00
    sdie 78.54
    srfm smol
    sdens 40.0
    chgm spl2
    srad 1.40
    swin 0.30
    temp 298.15
    calcenergy total
    calcforce no
end

# Print the final energy 
print energy inhom end

quit
~~~

- [PBEQ server](http://www.charmm-gui.org/?doc=input/pbeqsolver);  

- [DelPhi](http://wiki.c2b2.columbia.edu/honiglab_public/index.php/Software:DelPhi);  
[Delphi workshop](http://cinjweb.umdnj.edu/~kerrigje/pdf_files/Delphi_Workshop.pdf),[Manual](https://honiglab.c2b2.columbia.edu/software/DelPhi/doc/delphi_manual.pdf)

NOTE: Delphi reports energy in units of kT. (1 kT = 0.592 kcal/mol for T = 298 K and k= 0.001986577 kcal/mol•K) 

#### input parameters file example

~~~
!gsize=165					   ! GRID SIZE: must be an odd number. A larger grid size will give more accurate potentials;
							   ! however, will require more cpu time. (NOTE: min = 5; max = 571) 
scale=2.0                      ! Reciprocal of one grid spacing (grids/angstrom). 
in(pdb,file="2LZT-ASP66.pqr")            ! reads in ala.pdb
in(crg,file="delphi-charge.crg")         ! reads in charge file ala.crg
in(siz,file="delphi-radius.siz")         ! reads in size file ala.siz
indi=2                         ! interior dielectric default= 2
exdi=80						   ! exterior dielectric constant, default 80 for water
prbrad=1.40				       ! Probe radius. Used for the solvent accessible surface calculation. (prbrad = 1.4 for water.) 
energy(s,c,g)                  ! outputs reaction field (solvation), coulombic and grid energies. 
                               ! ION:Use for the direct ionic contribution
in(frc,file="self")            ! uses pdb file entries to output potential
salt=0						   ! The concentration of the first kind of salt (in mol/L). 
!perfil=90                     ! sets percent box fill to 90%
!bndcon=2                      ! An integer flag used to specify the type of boundary condition. 
							   ! 1 – potential is zero 
							   ! 2 – dipolar, boundary potentials are approximated by the Debye-Hückel potential. 
							   ! 3 – focusing, (requires a potential map from a prior calculation)
							   ! 4 – Coulombic, Approximate from the sum of the Debye-Hückel potentials of all charges qi
!in(phi,unit=18)               ! reads in a previously created potential map for focussing calcs - not enabled
!out(modpdb)                   ! outputs pdb file with radii and charges
!out(frc,file="ala.frc")       ! and field values in ala.frc
!out(phi,unit=14)              ! outputs a potential map in default file
!out(phi,file="ala.phi")       ! outputs potential map in ala.phi
!acenter(28.114,40.477,9.909)  ! Takes 3 coordinates (in ?) and uses those coordinates for positioning of the molecule center. 
!salt2 					       ! Used to handle multiple valence salts 
!ionrad = The ion exclusion layer around the molecule (in A). Default ionrad = 2.0 for sodium chloride.
!nonit - An integer number(>0) used to designate the number of iterations with the nonlinear PB equation. 
~~~

#### A script to extract the information from pqr file to siz/crg file for delpha

~~~ python
#! /usr/bin/env python
# -*- coding: utf8 -*-

# Author: Hom, Date: 2015.6.17
# To extract the information from pqr file to siz and crg files for delpha.
# Usage: python pqr2sizcrg.py input.pqr

import os,sys

if (__name__ == '__main__'):
	if (len(sys.argv)!=2):
		print "Please assign the pqr file."
		input()
		exit()
	fname=sys.argv[1]
	fnamelist=os.path.splitext(fname)
	fcrg=fnamelist[0]+".crg"
	fsiz=fnamelist[0]+".siz"
	fr=open(fname)
	fs=open(fsiz,'w')
	fc=open(fcrg,'w')
	fs.write("!Extract info. from pqr to siz file. By Hom.\n")
	fc.write("!Extract info. from pqr to crg file. By Hom.\n")
	fs.write("atom__resnumbc_radius_\n")
	fc.write("atom__resnumbc_charge_\n")
	for line in fr:
		items=line.split()
		if (items[0]=="ATOM" or items[0]=="HETATM"):
			outline="%-5.5s %-3.3s %-4.4s "%(items[2],items[3],items[4])
			outs=outline+"%-6.6s \n"%items[9]
			outc=outline+"%-6.6s \n"%items[8]
			fs.write(outs)
			fc.write(outc)

#end main
~~~

- Born Formula  
The Born Formula can calculate the a charged atom with a lower dielectric constant $$\varepsilon_{int}$$ immersed in a continuum media with a higher dielectric constant $$\varepsilon_{ext}$$.

$$\alg \Delta G^{sol} = - \frac{Q^2}{2 \cdot 4 \cdot \pi \cdot \varepsilon_0 } \cdot \frac{1}{r} (\frac{1}{\varepsilon_{int}}-\frac{1}{\varepsilon_{ext}}) \ealg$$    

In the formula, $$e=1.602176565\times 10^{-19}C$$,$$\varepsilon_0=8.8541878176\times 10^{-12}F/m$$,$$k=1.38\times 10^{-23}J/K$$, T=297.33K.
For example, Q=10e, $$\varepsilon_{int}=4.0$$, $$\varepsilon_{ext}=80.0$$, r=1 A, energy is -6673.71kT; $$\varepsilon_{int}=20.0$$, $$\varepsilon_{ext}=80.0$$, energy is -1024.255kT

$$\frac{Q^2}{ 4 \cdot \pi \cdot \varepsilon_0 } \cdot \frac{e^2}{ \AA } \cdot \frac{NA}{kcal} = 332.06364261083113511637811411787 $$

### Empirical/Scoring function Based

- [PROPKA](https://github.com/jensengroup/propka-3.1)  
Empirical pKa predictors based on physical description of the desolvation and dielectric response for the protein. Most update 3.0 reference: (Olsson-2011, Søndergaard-2011)

- [Rosetta pKa](http://rosie.rosettacommons.org/pka)  
Consider side-chain ﬂexibility and use new scoring function incorporating a Coulomb electrostatic potential and optimizing the solvation reference energies for pKa calculations. (Kilambi-2012).


## Reference
<style>ol li{font-size:16px;padding:0;margin:2px 0 2px 36px} ol li strong{font-size:16px;padding:0;}</style>

1. Donald Bashford and Martin Karplus. pKa’s of  Ionizable Groups in Proteins:  Atomic Detail from a Continuum Electrostatic Model. Biochemistry **1990**, 29, 10219-10225. [ref](/pdf/reference/pKa-pI/pKa-PB.pdf)
2. An-Suei Yang, M. R. Gunner, Rosemary Sampogna, Kim Sharp, and Barry Honig. On the Calculation of pKas in Proteins. PROTEINS: Structure, Function, and Genetics **1993**, 15, 252-265. [ref](/pdf/reference/pKa-pI/On_the_calculation_of_pKas_in_protein.pdf)
3. Jens E. Nielsen and Gerrit Vriend. Optimizing the Hydrogen-Bond Network in Poisson–Boltzmann Equation-Based pKa Calculations. PROTEINS: Structure, Function, and Genetics **2001**, 43, 403–412. [ref](/pdf/reference/pKa-pI/Nielsen_et_al-2001-Proteins.pdf)
4. Sunhwan Jo, Miklos Vargyas, Judit Vasko-Szedlar, Benoît Roux and Wonpil Im. PBEQ-Solver for online visualization of electrostatic potential of biomolecules. Nucleic Acids Research, **2008**, 36, W270–W275. [ref](/pdf/reference/pKa-pI/NAR-PBEQ.pdf)
5. Mats H. M. Olsson, Chresten R. Søndergaard, Michal Rostkowski, and Jan H. Jensen. PROPKA3: Consistent Treatment of Internal and Surface
Residues in Empirical pKa Predictions. J. Chem. Theory Comput. **2011**, 7, 525–537. [ref](/pdf/reference/pKa-pI/olsson2011.pdf)
6. Chresten R. Søndergaard, Mats H. M. Olsson, Michaz Rostkowski, and Jan H. Jensen. Improved Treatment of Ligands and Coupling Effects in Empirical Calculation and Rationalization of pKa Values. J. Chem. Theory Comput. **2011**, 7, 2284–2295. [ref](/pdf/reference/pKa-pI/ct200133y.pdf)
7. Krishna Praneeth Kilambi and Jeffrey J. Gray. Rapid Calculation of Protein pKa Values Using Rosetta. Biophysical Journal. **2012**, 103, 587–595.[ref](/pdf/reference/pKa-pI/rosetta-pKa.pdf)


---
