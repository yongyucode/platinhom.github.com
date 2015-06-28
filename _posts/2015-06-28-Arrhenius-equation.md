---
layout: post_mathjax
title: Arrhenius阿伦尼乌斯方程
date: 2015-06-27 20:33:11
categories: CompChem
tags: CompChem PhysChem
---

阿伦尼乌斯方程（或公式）是化学反应的速率常数与温度之间的关系式，适用于基元反应和非基元反应，甚至某些非均相反应. 其一般数学式(不定积分)为:  

$$\alg k= Ae^{-E_a/RT} \quad or \quad \ln k = - \frac{E_a}{RT}+\ln A \ealg$$

通过下式可知,lnk 随 T 的变化率与活化能 $E_a$ 成正比。因此活化能越高，温度升高时反应速率增加得越快，反应速率对温度越敏感。如果同时存在多个活化能值不同的反应，则高温对活化能高的反应有利，低温对活化能低的反应有利。

$$\alg E_a \equiv -R \left [ \frac{\partial \ln k}{\partial (1/T)} \right ]_P \ealg$$

对温度作变量, 微分形式和定积分形式为: 

$$\alg \frac{d \ln k}{d T} = \frac{-E_a}{RT^2} \quad and \quad \ln \frac{k_2}{k_1} = - \frac{E_a}{R} \left ( \frac{1}{T_1} - \frac{1}{T_2}\right ) \ealg$$

实验中, 测得不同温度 T 下的速率常数 k 值，其lnk--1/T图应为一直线，直线的斜率和截距分别为 $$-frac{E_a}{R}$$ 和 ln A，从此可以分别求得活化能 $E_a$ 和指前因子A。

其中,k 为反应的速率常数；A 称为指前因子/阿伦尼乌斯常数，单位与 k 相同；$E_a$ 为反应的活化能，单位为焦（J）或千焦（kJ），在温度变化范围不大时被视为常数；R 为气体常数；T 为绝对温标下的温度，单位为开尔文（K）。

## 阿伦尼乌斯在反应中的应用.

当温度一定, 比较两个不同反应状态(如加入催化剂)的速度差异:

$$\alg \ln \frac{k_2}{k_1} = - \frac{\Delta E_a}{RT} \ealg$$

若通过过渡态计算后, 算得不同过渡态和反应物的能垒的差为$\Delta E_a$, 就可以推算得速度比:

$$\alg \frac{k_2}{k_1}= e^{-\Delta E_a/RT} \ealg$$


## 这里应该有个插件来进行计算.


## Reference
1. [中文维基](https://zh.wikipedia.org/wiki/%E9%98%BF%E4%BC%A6%E5%B0%BC%E4%B9%8C%E6%96%AF%E6%96%B9%E7%A8%8B)和[英文维基](https://en.wikipedia.org/wiki/Arrhenius_equation)

---
