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
根据残基在溶液中一般pKa和在蛋白中pKa可以知道`pKa Shift=pKa'(protein)-pKa(solution)`,再根据该残基在两种状态的$\delta G$
$$\alg \Delta \Delta G = \ealg$$

- [APBS](http://www.poissonboltzmann.org/)
[APBS-PDB2PQR](http://www.poissonboltzmann.org/docs/downloads/); [APBS-download](http://sourceforge.net/projects/apbs/); [PDB2PQR-download](http://sourceforge.net/projects/pdb2pqr/); [APBS-PDB2PQR github](https://github.com/Electrostatics/apbs-pdb2pqr);  
[egg Lysozyme pKa example](http://www.poissonboltzmann.org/examples/Lysozyme_pKa_example/)

- [PBEQ server](http://www.charmm-gui.org/?doc=input/pbeqsolver);  

- [DelPhi](http://wiki.c2b2.columbia.edu/honiglab_public/index.php/Software:DelPhi);  

### Force-Field Based

- PROPKA  
Empirical pKa predictors based on physical description of the desolvation and dielectric response for the protein. Most update 3.0 reference: (Olsson-2011, Søndergaard-2011)


## Reference

1. Donald Bashford and Martin Karplus. pKa’s of  Ionizable Groups in Proteins:  Atomic Detail from a Continuum Electrostatic Model. Biochemistry 1990, 29, 10219-10225. [ref](/pdf/reference/pKa-pI/pKa-PB.pdf)
2. An-Suei Yang, M. R. Gunner, Rosemary Sampogna, Kim Sharp, and Barry Honig. On the Calculation of pKas in Proteins. PROTEINS: Structure, Function, and Genetics 1993, 15, 252-265. [ref](/pdf/reference/pKa-pI/On_the_calculation_of_pKas_in_protein.pdf)
3. Jens E. Nielsen and Gerrit Vriend. Optimizing the Hydrogen-Bond Network in Poisson–Boltzmann Equation-Based pKa Calculations. PROTEINS: Structure, Function, and Genetics 2001, 43, 403–412. [ref](/pdf/reference/pKa-pI/Nielsen_et_al-2001-Proteins.pdf)
4. Sunhwan Jo, Miklos Vargyas, Judit Vasko-Szedlar, Benoît Roux and Wonpil Im. PBEQ-Solver for online visualization of electrostatic potential of biomolecules. Nucleic Acids Research, 2008, 36, W270–W275. [ref](/pdf/reference/pKa-pI/NAR-PBEQ.pdf)
5. Mats H. M. Olsson, Chresten R. Søndergaard, Michal Rostkowski, and Jan H. Jensen. PROPKA3: Consistent Treatment of Internal and Surface
Residues in Empirical pKa Predictions. J. Chem. Theory Comput. 2011, 7, 525–537. [ref](/pdf/reference/pKa-pI/olsson2011.pdf)
6. Chresten R. Søndergaard, Mats H. M. Olsson, Michaz Rostkowski, and Jan H. Jensen. Improved Treatment of Ligands and Coupling Effects in Empirical Calculation and Rationalization of pKa Values. J. Chem. Theory Comput. 2011, 7, 2284–2295. [ref](/pdf/reference/pKa-pI/ct200133y.pdf)

---
