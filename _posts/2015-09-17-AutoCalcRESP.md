---
layout: post
title: 自动计算ESP和RESP电荷(AMBER and G09)
date: 2015-09-17 00:22:13
categories: CompCB
tags: CompBiol
---

[Gaussian 09 fix](http://ambermd.org/bugfixesat.html)
In Gaussian09 rev B.01, the facility to write out the electrostatic potential on a grid of points was inadvertently deleted. This means that antechamber and resp jobs won't work as they should. Fernando Clemente of Gaussian has kindly provided a script to work around the problem. Download the fixreadinesp.sh file, and follow the instructions there. (Note: you will have to make the script executable by typing chmod +x fixreadinesp.sh.)

[Problem](http://archive.ambermd.org/201108/0726.html)

------
