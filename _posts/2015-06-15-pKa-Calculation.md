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

- [PBEQ server](http://www.charmm-gui.org/?doc=input/pbeqsolver);  

- [DelPhi](http://wiki.c2b2.columbia.edu/honiglab_public/index.php/Software:DelPhi);  



### Empirical/Scoring function Based

- [PROPKA](https://github.com/jensengroup/propka-3.1)  
Empirical pKa predictors based on physical description of the desolvation and dielectric response for the protein. Most update 3.0 reference: (Olsson-2011, Søndergaard-2011)

- [Rosetta pKa](http://rosie.rosettacommons.org/pka)  
Consider side-chain ﬂexibility and use new scoring function incorporating a Coulomb electrostatic potential and optimizing the solvation reference energies for pKa calculations. (Kilambi-2012).


## Reference

<style>p,ul,ol,dl,li{font-size:16px}</style>

1. Donald Bashford and Martin Karplus. pKa’s of  Ionizable Groups in Proteins:  Atomic Detail from a Continuum Electrostatic Model. Biochemistry 1990, 29, 10219-10225. [ref](/pdf/reference/pKa-pI/pKa-PB.pdf)
2. An-Suei Yang, M. R. Gunner, Rosemary Sampogna, Kim Sharp, and Barry Honig. On the Calculation of pKas in Proteins. PROTEINS: Structure, Function, and Genetics 1993, 15, 252-265. [ref](/pdf/reference/pKa-pI/On_the_calculation_of_pKas_in_protein.pdf)
3. Jens E. Nielsen and Gerrit Vriend. Optimizing the Hydrogen-Bond Network in Poisson–Boltzmann Equation-Based pKa Calculations. PROTEINS: Structure, Function, and Genetics 2001, 43, 403–412. [ref](/pdf/reference/pKa-pI/Nielsen_et_al-2001-Proteins.pdf)
4. Sunhwan Jo, Miklos Vargyas, Judit Vasko-Szedlar, Benoît Roux and Wonpil Im. PBEQ-Solver for online visualization of electrostatic potential of biomolecules. Nucleic Acids Research, 2008, 36, W270–W275. [ref](/pdf/reference/pKa-pI/NAR-PBEQ.pdf)
5. Mats H. M. Olsson, Chresten R. Søndergaard, Michal Rostkowski, and Jan H. Jensen. PROPKA3: Consistent Treatment of Internal and Surface
Residues in Empirical pKa Predictions. J. Chem. Theory Comput. 2011, 7, 525–537. [ref](/pdf/reference/pKa-pI/olsson2011.pdf)
6. Chresten R. Søndergaard, Mats H. M. Olsson, Michaz Rostkowski, and Jan H. Jensen. Improved Treatment of Ligands and Coupling Effects in Empirical Calculation and Rationalization of pKa Values. J. Chem. Theory Comput. 2011, 7, 2284–2295. [ref](/pdf/reference/pKa-pI/ct200133y.pdf)
7. Krishna Praneeth Kilambi and Jeffrey J. Gray. Rapid Calculation of Protein pKa Values Using Rosetta. Biophysical Journal. 2012, 103, 587–595.[ref](/pdf/reference/pKa-pI/rosetta-pKa.pdf)

---
