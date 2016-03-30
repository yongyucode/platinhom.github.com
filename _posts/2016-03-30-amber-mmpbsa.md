---
layout: post
title: Amber:MM-PBSA小记
date: 2016-03-29 20:55:32
categories: CompCB
tags: CompBiol Amber
---

AMBER PBSA部分的执行现有两套方法: 一个使用老的Perl脚本 `mm_pbsa.pl`, 一个使用新的Python方法`MMPBSA.py`. Perl版本老式教程部分参考[这里](http://ambermd.org/tutorials/advanced/tutorial3/section3.htm), Python部分参考[这里](http://ambermd.org/tutorials/advanced/tutorial3/py_script/). 在新版本Python的教程里还提供了[Normal Mode Analysis](http://ambermd.org/tutorials/advanced/tutorial3/py_script/section5.htm), [Alanine突变](http://ambermd.org/tutorials/advanced/tutorial3/py_script/section3.htm), 将[自由能分解到残基上](http://ambermd.org/tutorials/advanced/tutorial3/py_script/section6.htm),[并行计算](http://ambermd.org/tutorials/advanced/tutorial3/py_script/section4.htm)等的教程.

## Perl脚本

这是老版本的用法, 使用就是:

`mm_pbsa.pl mmpbsa.in > extract_coords.log`

参数文件是`mmpbsa.in`内, 屏幕输出(实际只是执行过程, 意义不大)重定向到指定文件.

这里以教程中的PB/GB参数文件为例 (这里我合并了其中两步为一步, 即两个输入文件合并了):

~~~bash
#
# Input parameters for mm_pbsa.pl
#
# Holger Gohlke
# 15.02.2012
#
################################################################################
@GENERAL
#
# General parameters
#   0: means NO; >0: means YES
#
#   mm_pbsa allows to calculate (absolute) free energies for one molecular
#     species or a free energy difference according to:
#
#     Receptor + Ligand = Complex,
#     DeltaG = G(Complex) - G(Receptor) - G(Ligand).
#
#   VERBOSE - If set to 1, input and output files are not removed. This is
#             useful for debugging purposes.
#   PARALLEL - If set to values > 1, energy calculations for snapshots are
#              done in parallel, using PARALLEL number of threads. 
#
#   PREFIX - To the prefix, "{_com, _rec, _lig}.crd.Number" is added during
#            generation of snapshots as well as during mm_pbsa calculations.
#   PATH - Specifies the location where to store or get snapshots.
#   START - Specifies the first snapshot to be used in energy calculations
#           (optional, defaults to 1).
#   STOP - Specifies the last snapshot to be used in energy calculations 
#          (optional, defaults to 10e10).
#   OFFSET - Specifies the offset between snapshots in energy calculations 
#            (optional, defaults to 1).
#
#   COMPLEX - Set to 1 if free energy difference is calculated.
#   RECEPTOR - Set to 1 if either (absolute) free energy or free energy
#              difference are calculated.
#   LIGAND - Set to 1 if free energy difference is calculated.
#
#   COMPT - parmtop file for the complex (not necessary for option GC).
#   RECPT - parmtop file for the receptor (not necessary for option GC).
#   LIGPT - parmtop file for the ligand (not necessary for option GC).
#
#   GC - Snapshots are generated from trajectories (see below).
#   AS - Residues are mutated to Ala during generation of snapshots from
#        trajectories.
#   DC - Decompose the free energies into individual contributions.
#        (When using DC, MM and GB must be set to 1, even if a PB decomposition
#         is also requested.)
#
#   MM - Calculation of gas phase energies using sander.
#   GB - Calculation of desolvation free energies using the GB models in sander
#        (see below).
#   PB - Calculation of desolvation free energies using the PB method and
#        computation of nonpolar solvation free energies according to
#        the INP option in pbsa (see below).
#   MS - Calculation of nonpolar contributions to desolvation using molsurf
#        (see below).
#        If MS == 0 and GB == 1, nonpolar contributions are calculated either
#        with the LCPO (GBSA == 1) or the ICOSA (GBSA == 2) method in sander 
#        (see below).
#        If MS == 0 and PB == 1, nonpolar contributions are calculated according
#        the INP option in pbsa (see below).
#   NM - Calculation of entropies with nmode.
#
VERBOSE               0
PARALLEL              0
#
PREFIX                snapshot
PATH                  ./
START                 1
STOP                  200
OFFSET                1
#
COMPLEX               1
RECEPTOR              1
LIGAND                1
#
COMPT                 ./ras-raf.prmtop
RECPT                 ./ras.prmtop
LIGPT                 ./raf.prmtop
#
GC                    1
AS                    0
DC                    0
#
MM                    1
GB                    1
PB                    1
MS                    1
#
NM                    0
#
################################################################################
@MAKECRD
#
# The following parameters are passed to make_crd_hg, which extracts snapshots
#   from trajectory files. (This section is only relevant if GC = 1 OR 
#   AS = 1 above.)
#
#   BOX - "YES" means that periodic boundary conditions were used during MD
#         simulation and that box information has been printed in the
#         trajecotry files; "NO" means opposite.
#   NTOTAL - Total number of atoms per snapshot printed in the trajectory file
#            (including water, ions, ...).
#   NSTART - Start structure extraction from NSTART snapshot.
#   NSTOP - Stop structure extraction at NSTOP snapshot.
#   NFREQ - Every NFREQ structure will be extracted from the trajectory.
#
#   NUMBER_LIG_GROUPS - Number of subsequent LSTART/LSTOP combinations to
#                       extract atoms belonging to the ligand.
#   LSTART - Number of first ligand atom in the trajectory entry.
#   LSTOP - Number of last ligand atom in the trajectory entry.
#   NUMBER_REC_GROUPS - Number of subsequent RSTART/RSTOP combinations to
#                       extract atoms belonging to the receptor.
#   RSTART - Number of first receptor atom in the trajectory entry.
#   RSTOP - Number of last receptor atom in the trajectory entry.
#   Note: If only one molecular species is extracted, use only the receptor
#         parameters (NUMBER_REC_GROUPS, RSTART, RSTOP).
#
BOX                   YES
NTOTAL                42193
NSTART                1
NSTOP                 200
NFREQ                 1
#
NUMBER_LIG_GROUPS     1
LSTART                2622
LSTOP                 3862
NUMBER_REC_GROUPS     1
RSTART                1
RSTOP                 2621
#
################################################################################
@TRAJECTORY
#
# Trajectory names
#
#   The following trajectories are used to extract snapshots with "make_crd_hg":
#   Each trajectory name must be preceeded by the TRAJECTORY card.
#   Subsequent trajectories are considered together; trajectories may be
#     in ascii as well as in .gz format.
#   To be able to identify the title line, it must be identical in all files.
#
TRAJECTORY            ./prod1.mdcrd
TRAJECTORY            ./prod2.mdcrd
TRAJECTORY            ./prod3.mdcrd
TRAJECTORY            ./prod4.mdcrd
#
################################################################################
@PB
#
# PB parameters (this section is only relevant if PB = 1 above)
#
#   The following parameters are passed to the PB solver.
#   Additional input parameters may also be added here. See the sander PB
#   documentation for more options.
#
#   PROC -  Determines which program is used for solving the PB equation:
#           Delphi (PROC == 1), PBSA (PROC == 2), or APBS (PROC == 3).
#           By default, PROC == 2, the pbsa program of the AMBER suite is used.
#   REFE -  Determines which reference state is taken for PB calc:
#           By default, REFE == 0, reaction field energy is calculated with
#           EXDI/INDI. Here, INDI must agree with DIELC from MM part.
#   INDI -  Dielectric constant for the solute.
#   EXDI -  Dielectric constant for the surrounding solvent.
#   ISTRNG - Ionic strength (in mM) for the Poisson-Boltzmann solvent.
#   SCALE - Lattice spacing in no. of grids per Angstrom.
#   LINIT - No. of iterations with linear PB equation.
#   RADIOPT - Option to set up radii for PB calc:
#             0: uses the radii from the prmtop file. Default.
#             1: uses the radii optimized by Tan and Luo with respect to the
#                reaction field energies computed in the TIP3P explicit solvents
#                (Tan & Luo, J. Phys. Chem. B, 2006, 110, 18680-18687). 
#                Note that optimized radii are based on AMBER atom types
#                (upper case) and charges. Radii from the prmtop files are used
#                if the atom types are defined by antechamber (lower case).
#   ARCRES - Resolution (in the unit of Angstrom) of solvent accessible arcs
#   IVCAP - If set to 1, a solvent sphere (specified by CUTCAP,XCAP,YCAP,
#           and ZCAP) is excised from a box of water. If set to 5, a solvent
#           shell is excised, specified by CUTCAP (the thickness of the shell 
#           in A). The electrostatic part of the solvation free energy is 
#           estimated from a linear response approximation using the explicit 
#           solvent plus a reaction field contribution from outside the sphere 
#           (i.e., a hybrid solvation approach is pursued). 
#           In addition, the nonpolar contribution is estimated from a sum of 
#           (attractive) dispersion interactions calc. between the solute and 
#           the solvent molecules plus a (repulsive) cavity contribution 
#           (Gohlke & Case, J. comput. Chem. 2004, 25, 238-250). 
#           For the latter, the surface calculation must be done with MS = 1 and
#           the PROBE should be set to 1.4 to get the solvent excluded surface.
#           In this case bondi radii are used as cavity radii set.
#   CUTCAP - Radius of the water sphere or thickness of the water shell.
#            Note that the sphere must enclose the whole solute.
#   XCAP  - Location of the center of the water sphere.
#   YCAP
#   ZCAP
#
# NP Parameters for nonpolar solvation energies if MS = 0
#
#   INP   - Option for modeling nonpolar solvation free energy.
#           See sander PB documentation for more information on the
#           implementations by Tan and Luo.
#           1: uses the solvent-accessible-surface area to correlate total
#              nonpolar solvation free energy:
#              Gnp = SURFTEN * SASA + SURFOFF. Default.
#           2: uses the solvent-accessible-surface area to correlate the
#              repulsive (cavity) term only, and uses a surface-integration
#              approach to compute the attractive (dispersion) term:
#              Gnp = Gdisp + Gcavity
#                  = Gdisp + SURFTEN * SASA + SURFOFF.
#           When this option is used, RADIOPT has to be set to 1,
#           i.e. the radii set optimized by Tan and Luo.
#   SURFTEN/SURFOFF - Values used to compute the nonpolar
#           solvation free energy Gnp acccording to INP.
#           If INP = 1 and RADIOPT = 0 (default, see above),
#           use SURFTEN/SURFOFF parameters that fit with the radii from the
#           prmtop file, e.g., 
#           use SURFTEN: 0.00542 and SURFOFF: 0.92 for PARSE radii.
#           If INP = 2 and RADIOPT = 1, please set these to the following: 
#           SURFTEN: 0.0378; OFFSET: -0.5692
#
# NP Parameters for nonpolar solvation energies if MS = 1
#
#   SURFTEN/SURFOFF - Values used to compute the nonpolar contribution Gnp to
#           the desolvation according to:
#      (I)  Gnp = SURFTEN * SASA + SURFOFF (if IVCAP == 0)
#           Use parameters that fit with the radii from the reaction field
#           calculation. E.g., use SURFTEN: 0.00542, SURFOFF: 0.92 for
#           PARSE radii 
#      (II) Gnp = Gdisp + Gcavity = Gdisp + SURFTEN * SESA + SURFOFF (IVCAP > 0)
#           Nonpolar solvation free energy calculated as discribed for IVCAP > 0
#           above. In this case use SURFTEN: 0.069; SURFOFF: 0.00 for
#           calculating the Gcavity contribution.
#
PROC                  2
REFE                  0
INDI                  1.0
EXDI                  80.0
SCALE                 2
LINIT                 1000
ISTRNG                0.0
RADIOPT               0
ARCRES                0.0625
INP                   1
#
SURFTEN               0.005
SURFOFF               0.00
#
IVCAP                 0
CUTCAP                -1.0
XCAP                  0.0
YCAP                  0.0
ZCAP                  0.0
#
################################################################################
@MM
#
# MM parameters (this section is only relevant if MM = 1 above)
#
#   The following parameters are passed to sander.
#   For further details see the sander documentation.
#
#   DIELC - Dielectricity constant for electrostatic interactions.
#           Note: This is not related to GB calculations.
#
DIELC                 1.0
#
################################################################################
@GB
#
# GB parameters (this section is only relevant if GB = 1 above)
#
#   The first group of the following parameters are passed to sander.
#   For further details see the sander documentation.
#
#   IGB - Switches between Tsui's GB (1) and Onufriev's GB (2, 5).
#   GBSA - Switches between LCPO (1) and ICOSA (2) method for SASA calc.
#          Decomposition only works with ICOSA.
#   SALTCON - Concentration (in M) of 1-1 mobile counterions in solution.
#   EXTDIEL - Dielectricity constant for the solvent.
#   INTDIEL - Dielectricity constant for the solute.
#
#   SURFTEN / SURFOFF - Values used to compute the nonpolar contribution Gnp to
#    the desolvation according to Gnp = SURFTEN * SASA + SURFOFF.
#    Choose SURFTEN and SURFOFF values according to the selected
#    GB model, e.g.:
#    IGB=1 : SURFTEN=0.0072, SURFOFF=0.0, mbondi radii
#            (Tsui & Case, Biopolymers 2000, 56, 275-291)
#    IGB=2 : SURFTEN=0.005, SURFOFF=0.0, mbondi2 radii
#            (Onufriev et al, Proteins 2004, 55, 383-394)
#    IGB=5 : SURFTEN=0.005, SURFOFF=0.0, mbondi2 radii
#            (Onufriev et al, Proteins 2004, 55, 383-394)
#
IGB                   2
GBSA                  1
SALTCON               0.00
EXTDIEL               80.0
INTDIEL               1.0
#
SURFTEN               0.005
SURFOFF               0.00
#
################################################################################
@MS
#
# Molsurf parameters (this section is only relevant if MS = 1 above)
#
#   PROBE - Radius of the probe sphere used to calculate the SAS.
#           In general, since Bondi radii are already augmented by 1.4A,
#           PROBE should be 0.0
#           In IVCAP = 1 or 5, the solvent excluded surface is required for
#           calculating the cavity contribution. Bondi radii are not
#           augmented in this case and PROBE should be 1.4.
#
PROBE                 0.0
#
################################################################################
@PROGRAMS
#
# Additional program executables can be defined here
#
#
################################################################################
~~~

这个参数文件很长..里面有参数详细解析. `@TRAJECTORY`这样的是选项卡, 即代表一系列相关参数在这部分, 例如@PB, @GB. 注释使用`#`.

一般地, 我们关注以下部分:

- `@GENERAL`卡:
	- `PREFIX` : 输入每帧文件和输出文件的前缀, 输出结果有 (算复合物结合自由能不算NMODE): 
		- $PREFIX_statics.out : 总输出文件, 读取分析这个就OK了, 里面包括三个单体和Delta的能量和各项的数值.
		- $PREFIX_com.all.out : 类似还有 rec, lig版本, 总共三个文件, 就是三个单体的各项计算的结果. 多个坐标轨迹输入会有更多的相应输出.
	- `MM`/`PB`/`GB`/`MS`/`NM`: 这是控制计算什么内容, 分别是分子力学能量, PB, GB, 表面(非极性贡献)和Normal Mode (熵). 一般地, MM, MS都设1, NM设0(要算才设1), PB/GB根据需要设定. 有时进行特殊计算, 某些项是必须打开的.
	- `COMPLEX`/`RECEPTOR`/`LIGAND` : 是否进行相应自由能计算. 受体可以单独计算, 一般算复合物三个都设1.
	- `COMPT`/`RECPT`/`LIGPT`: 复合物 (无溶剂), 受体和配体的prmtop文件指定.
	- `PATH` : 放置每帧Snapshot的文件夹位置. 如果GC=0, 保证PATH文件夹内有合符规格的每帧文件. GC=1, 这个路径就是输出每帧坐标的输出文件夹.
	- `GC` : 这个是用来将轨迹文件crd分解为每帧的crd的, 分解轨迹到PATH文件夹内. 文件名为 `$PATH/$PREFIX_com.crd.Number`, 相应com/rec/lig对应复合物, 受体和配体.Number是帧编号, 从1开始. 如果没有独立分解出每帧, GC就使用1让他自己生成, 此时需要用到输入文件的 `@MAKECRD` 和 `@TRAJECTORY` 卡部分.
	- `START`/`STOP`/`OFFSET` : 计算时使用的SNAPSHOT从START到STOP为止, 间隔为OFFSET. 如果GC=1, 可以GC时产生相应的帧, 这时这里的START/STOP/OFFSET用默认就好了(1/10e10/1). 如果产生了全部的SNAPSHOT, 想再自定义采帧方式, 可以改这三个.
	- `AS` : 进行Alanine扫描的设置, 这里不介绍. 不进行就设0.
	- `DC` : 进行能量分解的设置, 这里不介绍. 不进行就设0.
	- `VERBOSE` : 默认0是删除中间输入输出文件, 设置1则保留. 用于debug. 
	- `PARALLEL` : 并行计算时设置>1整数. 默认不适用时为0. (设置8就是同时分析8帧哦)  
- `@MAKECRD`卡
	- BOX : MD是否使用周期边界, 一般是,=1.
	- NTOTAL : MD轨迹文件每帧原子数 (包括溶剂,离子哦!)
	- NSTART/NSTOP/NFREQ : 提取帧从NSTART 到NSTOP(包含), 提取间隔是NFREQ为一帧.例如MD总2000帧, 每10帧输出一次.可以设1/2000/10.
	- NUMBER_LIG\_GROUPS/LSTART/LSTOP : 配体有几组,每组原子取自下面的LSTART到LSTOP. (如果原子序号不连续, 就要多个组, 多个组就要写多个LSTART/LSTOP)
	- NUMBER_REC\_GROUPS/RSTART/RSTOP : 受体有几组,每组原子取自下面的RSTART到RSTOP. (如果原子序号不连续, 就要多个组, 多个组就要写多个RSTART/RSTOP)
- `@TRAJECTORY`卡
	- `TRAJECTORY` : 指定相应的轨迹文件, 按顺序读入输出帧. 可以有多个TRAJECTORY.
- `@PB`卡
	- `PROC` : 使用哪种PB方法, 缺省2是使用内置的 *pbsa* 程序进行计算.
	- `REFE` : 使用reference state方法, 缺省0是使用EXDI/INDI计算reaction ﬁield energy. 
	- `INDI`/`EXDI` : 重要参数, 溶质和溶剂的介电常数. 这里溶质介电常数要和MM计算分子力学时的静电能时要一致! 默认1.0和80.0.
	- `ISTRNG` : 离子强度 (mM)
	- `PRBRAD` : 溶剂探针半径, 默认1.4. Luo等的方法可以设1.6.
	- `RADIOPT` : PB计算的原子半径采用何种方法, 这里perl说默认0是使用输入文件的原子半径, 1是使用Luo等的优化方法(原子类型大写时使用AMBER内置的处理, 小写时(如antechamber)采用top文件的原子半径). 这个设置错误可能会报错.
	- `LINIT` : 线性PB计算迭代最大次数.
	- `ARCRES` : 溶剂可及的弧度的点的分辨率. 越小越精确咯. 默认0.25, 见很多都用0.0625. 是*pbsa*的参数.
	- `INP` : 非极性溶剂化能的计算方法, 默认1是`Gnp=SURFTEN*SASA+SURFOFF`, 2是`Gnp=Gdisp+Gcavity=Gdisp+SURFTEN*SASA+SURFOFF`. Gdisp是吸引项, Gcavity是排斥项(SAS相关). 如果INP设为2, RADIOPT要设为1 (使用Luo等的方法)
	- `SURFTEN`和`SURFOFF` : 表面张力系数和一个offset值. 和INP, IVCAP 等设置时最好相关. 
- `@GB`卡
	- 暂忽略
- `@MM`卡:
	- `DIELC` : 分子力学计算时静电作用的介电常数.

对于PB/GB计算自由能的[参数推荐](http://ambermd.org/tutorials/advanced/tutorial3/files/recommended_settings.pdf). 

对于输出结果在$PREFIX_statics.out中, 每项的含义:

~~~
*** Abbreviations for mm_pbsa output ***
ELE - 非键静电能项, 基于力场. non-bonded electrostatic energy + 1,4-electrostatic energy
VDW - 范德华作用能项, 基于力场. non-bonded van der Waals energy + 1,4-van der Waals energy
INT - 内能项, 基于力场. bond, angle, dihedral energies
GAS - 气相下静电+范德华+内能, 也就是力场能量. ELE + VDW + INT
PBSUR - PB非极性溶剂化能项. hydrophobic contrib. to solv. free energy for PB calculations
PBCAL - PB静电溶剂化能项. reaction field energy calculated by PB
PBSOL - PB溶剂化能. PBSUR + PBCAL
PBELE - PB结合自由能静电贡献项. PBCAL + ELE
PBTOT - PB计算结合自用能. PBSOL + GAS
GBSUR - hydrophobic contrib. to solv. free energy for GB calculations
GB - reaction field energy calculated by GB
GBSOL - GBSUR + GB
GBELE - GB + ELE
GBTOT - GBSOL + GAS
TSTRA - 平动熵贡献能. translational entropy (as calculated by nmode) times temperature
TSROT - 转动熵贡献能. rotational entropy (as calculated by nmode) times temperature
TSVIB - 振动熵贡献能. vibrational entropy (as calculated by nmode) times temperature
*** Prefixes in front of abbreviations for energy decomposition ***
"T" - energy part due to _T_otal residue
"S" - energy part due to _S_idechain atoms
"B" - energy part due to _B_ackbone atoms
~~~

所以, 如果只是进行PB/GB计算结合自由能, 读取PBTOT/GBTOT即可 (结合自由能=complex-receptor-ligand, Delta的输出里面其实就是最终结果). 

一般地, MM部分由ELE, VDW和INT组成, 计算delta时内能项基本被抵消. 溶剂化部分, PB/GB一般通过solver计算. 非极性作用项则是通过面积来拟合.



------
