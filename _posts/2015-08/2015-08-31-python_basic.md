---
layout: post_small
title: Python基础
date: 2015-08-31 12:51:01
categories: Coding
tags: Python
---

## 基础语法

函数
def funcname([argv1,argv2..]): contents;  return [vars]
定义函数,也可以不加形参argv,return定义返回内容
\*args表示任何多个无名参数，它是一个tuple；\*\*kwargs表示关键字参数，它是一个 dict。并且同时使用\*args和\*\*kwargs时，必须\*args参数列要在\*\*kwargs前。若此时给的是list或tuple,可直接在前面加\*.如func(\*list1)。
类
class name:
    def __init__ (self,a):初始化类,a为要填入的形参。
    def func(self,a):self.arg=var 定义类的方法,后面一句可帮类建立arg属性(属性！)
特殊变量
__doc__ 在开头的一段话,可以紧接print来打印和显示
__name__ 当前文件名字
__main__ 主函数
注意！
字典是没有顺序的！
若x=y=’abc’，改变y对x不影响（同理数值,元组）;但x=y=[1,2,3],通过改变列表的方法改变x，y的值也受影响，因为指向同一个列表，同理对于字典也是。若xy本来指向同一列表，x又被重新赋值，x和y就不等同了。若使其不指向同一地址而是赋值，使用x=y[:]表达。同一性检测x is y对于这个问题很重要。

​Python中的类不是封闭的，你可以动态的为类添加方法。
class Foo:
    pass
def bar(self):
    print "ok"
Foo.bar = bar
Foo().bar()

如果你想添加的是一个静态方法，可以这样：
class Foo:
    pass
@staticmethod
def bar():
    print "ok"
Foo.bar = bar
Foo.bar()


## 标准IDLE

## 小知识

- `#! /usr/bin/env python` 首行, 或者`#! /usr/bin/python2`, 再`chmod +x *.py`就可以使脚本在unix基础系统上能直接执行.(如果是window编写的可能出现最后换行符问题不识别,此时先`dos2unix *.py`就好了)
- 第二行 `# -*- coding: utf8 -*-` 指明字符集，用utf8就可以支持中文了！
- 关于python安装路径注册表: HKEY\_LOCAL\_MACHINE\SOFTWARE\Wow6432Node\Python\PythonCore\2.7\InstallPath. 在安装一些python应用时检测版本时, 可以修改这里的值来变更安装对应的版本及路径.
- 避免window下运行完程序关闭窗口，可写入：raw_input(‘press <enter>’) 一句
#Filename: abc.py作注释

基础概念知识 不懂按help(xx) 
1.      IDLE Python集成开发环境
2.      edit|run或Ctrl+F5为运行程序
4.      注意机读形式和人读形式区别：例如长数10000，但机读为10000L；字符人读abc，机读为’abc’，print时是用人读形式，而repr则是可把人读形式转化为机读形式，并把结果保存为人读形式。因为变量必须非数字起头，所以机器默认abc为变量，’abc’为字符串输入，故repr(‘hello’)实际就是’hello’,没有意义。
5.      关于换行输入，例如abc想把bc放在输入的第二行便于观察，按enter换行会变确定而出错，因此需要把enter键的值转义为换行.因此行末的\为转义换行，而真需要\时需要输入\\. 不能最后\’ 因为会转义。
6.      r’abc\n’就是abc\n，但r’let\’s go’必须转义，否则语法错误，这样进行r处理后输出let\’s go。同理若r’c:\’会因转义了’报错，而r’c:\\’ 则会输出c:\\。
7.      字符串是特殊的序列，但是列表不可以和字符串合并相加。另外，用in检测成员资格时，[‘abc’,’def’,’ghi’]必须对应abc才能true，bcd则false。但是对于字符串’abcdefg’，只要包含相同'bcd'都true。而且seqA in seqB也需要A作为子元素才行。
8.      (序列)变量不能以数字开头，只能含字母数字或下划线。区分大小写。
9.      单元素分片是值，但是多于一个元素就是序列了。
10.  字符串格式化：str %转换标志(-+空格0)最小字段宽.精度值或* 最后跟转换类型。-为左对齐，+为数值要加+-号，空白为正数前空格，0为转换值不足最小字段宽补0。精度值为最大字符数，*的话需要后面赋值。转换类型常用d/i正数f浮点s字符串r机读字符串C单字符x/X大或小写16进制。可以用元组来格式化, 列表不行!字典格式化%(key) % {key:val}
11.  空字典可以随意用赋值添加项，而列表不行。x=[],x[42]=’go’出错
12. 关于输出print时，用，表示空格连接，下一行可再用print进行连接，可避免换行；用\换行，下一行的内容紧接上一行，即相当于+换行；+则表示直接字符串连接；用；表示另一个逻辑行。需另外有语句。
13. 序列最基本的特征就是：index化功能和分片slicing。\
14. 在keyword的关键词声明中如def,if,elif等，需要用:引出其实质内容块，并进行缩进。在def语句中，如果在IDLE shell中进行定义，结束时enter后在退出该块后，再按一下enter结束；在return后，则会自动退出块缩进。
15.在对序列进行for in时，尽量不要对该序列进行删增，排序等操作，易错！最好先用一个替代序列seq2=seq1[:]来赋值进行操作。
 ​抬头:

数值有四种类型：整数 长整数 浮点数 和复数。
_在交互模式下代表上一个结果。如3+4~~7, 2+_~~9
查看历史记录Alt+p（之前）和Alt+n（之后），linux下是Ctrl+P/N （注意要小写状态。。)
关于补全expand word(Alt+/)指的是自动填充曾经输入的,可多按几次换别的;show completion默认是Ctrl+space,但一般被输入法占据，可用Ctrl+Alt+Space,显示可补全的所有东西提示，用上下方向键控制选择。Tab补全,如果只有一个可选则自动补全,否则会和show completion一样。
​Go to line （Alt+G）直接跳到某一行
Indent region：使所选内容右移一级，即增加缩进量。Ctrl+]
Dedent region：使所选内容组左移一级，即减少缩进量。Ctrl+[ 和括号指向相关..
Comment out region：将所选内容变成注释。Alt+3
Uncomment region：去除所选内容每行前面的注释符。Alt+4
Tabify region:使所选空格变Tab.Alt+5
UnTabify region:使所选Tab变指定空格.Alt+6
​关于py和pyw区别在于,后者使用pythonw.exe来运行,没有了控制台(如dos).
if __name__ == '__main__': main()  该句常用,因为限制其为脚本而非模块.
pyc文件是编译好的模块文件,可以加速运行.可以用py_compile.complie(file)来编译
关于import: 需要在系统路径中含有该路径,可以设置PYTHONPATH 的环境变量来永久添加. 暂时性增加,一般在发布程序时,因为不能改系统变量,所以,这时最好把模块放在同目录或附近目录下,此时,添加搜索路径方法:
import sys;sys.path.append('..')或sys.path.insert(0,'..')(后者可以优先化). 也可修改..为.或任意目录.
定义包:在某目录dira下建__init__.py 可以为空,然后将相应的a.py,b.py放进去 然后import dira.a就可以了

读取环境变量 filename = os.environ.get('PYTHONSTARTUP')

if filename and os.path.isfile(filename):

execfile(filename)
表达式（xyz代表数字，abc代表字符,ABC代表序列）就是一种表达，返回值作为输入
x整型               整形输入，表达返回int或long
x.浮点型           只要后面带点，都处理为返回浮点型float
a+bj 复数            复数类型(ab均是float,0+1j)，*.real, *.img, *.conjugate 分别代表实部虚步和共轭复数（方法）。 
‘abc’,“abc”，'''abc''',r'\n' 字符串 string str类型
u‘foo'                  unicode字符序列
0xAF                            16进制输入，返回int
0AA                    8进制输入，返回int
xL                        长整型输入，返回长整形（大于(2^31)-1或小于(-2^31)会自动处理为长整）
xj                         虚数表达
None                  空值，注意首字大写
“abc”                 或’abc’，8位ASCII字符，注意里面有’”时要用不同符号或转义。实为序列。
‘ab’+’de’           拼接字符串，对于直接的方法，还可以没有加号（不推荐）
‘ab’*3                重复字符串。=’ababab’。3处可被替换
\`ab\`                     =rept(“ab”)
‘’’abc’’’              长字符串，可以enter换行不需\来结尾，’和”可以不需转义（但注意转义依然起效）
r’abc’                 原始字符串，输入的照样作为字符串处理。但输入时依然受制于’/’，但实际的值不受转义影响。
u’abc’                 16位unicode字符串，3.0后用unicode。
[a,b,c]                列表
(a,b,c)                元组，单元素时(a,)也可以a,。
{a:b}                   字典，整对称项，前者为键后者为值。d[‘a’]代表该对应键,可进行赋值,in,删除等
A[x]                     索引。序列A第x+1个元素（因为0为第一个）x若为负数，则从倒数起。
OK[A,B,C]                   序列作为元素构成新的序列。尤其注意检验元素in语法时。
a[b][c]                字典a中键b是字典，c是b的一个键。字典中的字典。
A[x:y]                 分片。序列A第x+1到第y个（y+1作为尾部）元素，不指xy为第一和末尾。y大于序列长则为末端。
A[x:y:z]              z为步长。z>0,x>y;z<0,x<y。[::2]表示从头到尾步长2遍历。[8:3:-1]表示第9到第5个。
A+B                    序列相加。A或B可以以[x,y,z]表示。字符串不可与序列相加，加实质将B元素接于A后。
A*3                     序列乘法，重复序列，注意是后接而非元素重复。
x//y                    整除运算(只取整数部分)
x%y                    取余运算
x\*\*y                   乘方运算（优先于取反，需显式说明。如(-3)**2）=pow（x,y）
x==y                   相等性测试
x!=y                    不等于，返回真假
x>y                      类似<,>=,<=，比较大小操作，返回真假
0<x<10              多重判断，返回真假
a is b                  a和b同一性运算符。对于字符数值元组等不可变值,和==一致;但不可变型值如列表,和地址有关。
a is not b           a和b不是同一个对象
a in A                  成员资格，返回True或False,布尔运算符。
a not in A          非成员检查，返回真假
‘\n’,’\t’               换行，制表符
‘a%s’ % b          格式化字符串，将b代替%s还可以往前加参数。
'%10.2f' % float 格式化字符串,用变量来格式化成float,10长度,2位小数
‘%(key)s’ %d    格式化字符串，将字典d的key键的值代替%s。
False                  假:False,None,0,””,(),[],{}都是假，即0、空序列、字典、空值和标准假值都算假，其余一切都真。
not exp              非的表达。表达是判断条件时就反结果；是普通表达时就当做布尔型输入not ‘a’ False
exp1 and exp2          且的表达,会短路要是exp1是假则跳出假。若exp1假输出exp1真则输出exp2
exp1 or exp2             或的表达,会短路要是exp1是真则跳出真。若exp1假输出exp2真则输出exp1
a if b else c       三元运算符，b真则输出a，假则输出c
[exp for A if]     列表推导式,利用for的特性根据列表A生成元素为exp结果的新列表.用if部分可以筛选A的元素.
                            例如[x*x for x in range(10) if x%3==0]x在0-9中当x整除3时输出seq[a]=x*x的列表[0,9,36,81]
set (seq)      构建一个集合，内无重复元素。​


​
## 内建函数，作为一种预设运算，用于返回值，特殊表达式
- float(object): 转换为浮点数
- int(object): 转换为整数，带小数时向下取整运算
- long(object): 转换为长整形数
- str(object): 转换为字符串(1000L->1000)
- repr(object): 返回值为适合机读的字符串形式(1000L->1000L)
- ord(‘char’): 将某单字符转成字母顺序值（单字符包括\n等）
- chr(num): 将字母顺序值转为某单字符（0~255）
- unichr(num): 将字母顺序值转为某unicode单字符（0~65535）
- unicode(var,codec): 将变量按codec转为unicode型(前面加了个u)=str.decode(codec)
- abs(number): 返回绝对值
- cmath.sqrt(number): 可带虚数均方根
- math.ceil(number): 返回数的上入整数，返回值为浮点数
- math.floor(number): 返回数的下舍整数，返回值为浮点数
- math.sqrt(number): 计算平方根，需为实数，返回浮点数
- pow(x, y[, z]): 返回x的y次幂，（所得结果对z取模），类型数相关
- round(number[, ndigits]): 根据给定精度进行四舍五入,返回float
- complex(real, img): 创建出复数，返回复数。
- input(prompt): 获取用户输入，须合法的python表达式：”字符”
- raw_input(prompt): 获取用户输入，返回字符串
- help([object]): 交互式帮助
- id(obj): 返回对象的id
- cmp(x, y): 比较xy的值大小，相同0前大1后大-1。
- len(seq): 返回序列的长度（元素个数）,或者字典的项数int。
- list(seq): 序列（字符串）转换为列表。
- tuple(seq): 把序列转为元组（包括列表、元组、字符串均可）
- bool(‘any’): 将任意转成布尔型，除了False的特殊值，其余均真。一般不需显式说明
- max(args): 返回序列或参数集合中最大值,多于一个序列时，比较第一个，迭代。
- min(args): 返回序列或参数集合中最小值,多于一个序列时，比较第一个，迭代。
- sum(sqe[,start]): 求序列之和。start参数为起始值，用于复合使用。
- reversed(seq): 序列反向迭代
- sorted(seq): 返回A已排序的列表，不改变A的顺序。
- string.Template(’a’): 模板字符串，结合$x和A.substitute(x=’a’)使用
- string.capwords(‘str’): 词首字母大写，较好，返回字符串
- string.maketrans(‘ab’,’cd’): 将256位字符表中a和b相应换成c和d，返回字符串.用于translate方法。
- range([x,]y[,z]): 产生整形列表,x起y终z步长,默认x=0,z=1.常用在for语句中.切记y终点在列表外
- xrange([x,]y[,z]): 类似于range但是更简洁,用于迭代用
- zip(seqA,SeqB….): 多个序列(包括元组字符串)的项组成一个元组并返回列表,最短序列决定列表长(舍去).
- filter(func,list): 对list元素都执行func,如返回True则保留,否则被过滤掉.
- map(func,list): 对list元素都执行func,并返回对应的list
- reduce(func,seq[,init]): init默认第一项,把该项和后一项传递给func,返回的结果再和下一项扔给func,直到结束
- enumerate(iter): 对可迭代对象所有项迭代索引,项目对。如用于编号迭代。返回迭代对象
- eval(exp[,global[,local]]): 会计算表达式exp的值,并返回结果.eval(raw_input(…))等于input(..).可用两个命名空间。
- set(seq): 返回([...])的集合,无重复元素的.seq可为字符串,元组,列表.
- type(var): 返回变量类型,type('a')==str 返回True
- vars(): 返回当前局部变量
- callable(obj): 检查对象是否可调用,可调用返回True
- help(module[.func]): 查看模组帮助,
- lambda x: 含x表达: 就是对x进行表达式中的运作,返回函数对象lambda.用法a=lambda x:x*2+3 执行a(5). 
- dir([obj]): 列出obj的所含标识符(函数,类,变量,模块),不加参数针对当前模块
- isinstance(var, type): 可以比较两个参数项类型是否相同.如isinstance("abcd",str).isinstance和type比较差异参看[ref](http://segmentfault.com/q/1010000000127305),主要是isinstance可以对继承的类也进行相等判断,type不行.

## 语句，就是操作，包括赋值判断循环执行等
a=1: a[1]=2: 赋值,变量或列表元素
a,b,c=1,2,3: 序列解包，就是把元组解包赋值
x=y=’abc’: 链式赋值，相当于y=’abc’，x=y
x+=1;a*=2: 就是x=x+1，a=a*2.增量赋值
C=A[:]: 将A所有元素赋给C，即构造和A一样的C。
A[x:y]=[w:z]: 分片赋值。A[x:x]表示插入,A[x:y]=[]表删除。可以实现任意替换插入删除。
print ‘A’+’B’,’C’: 显示A和B直接连接，然后空格再C。
del a,b,c: 删除对象，但不会自动放内存..
import 模块名: 调用模块
import module as abc: 调用模块并用abc的名字调用
from 模块 import 函数: 调用模块中的函数，免除模块.函数的输入。一般使用import更好。
from \_\_future\_\_ import division: 调用新特性的除法，不会产生1/2=0的取整.
from module import *: 调用所有模组中的函数，可能会覆盖。
from mod import func as abc: 调用某个函数并用abc的名字调用。
 ​
A=[‘a1’,’a2’,’a3’,’a4’]: 
if a in A: print ‘go!’: If选择判断
else:行为: If的另一个跳出
elif 判断语句:行为: 多重选择的判断，用于多选。
if…: …if… : …: 嵌套代码块，用于多条件判断
assert 条件: 一旦不满足该条件，程序就崩溃推出。条件后可以,’abc’来解释断言
while judge: do: while循环,为使动起来需要内加自变值语句。
while True/[if] break: 除了某个条件break出去，一直循环。
for i in seq:do: 对满足seq资格的进行循环,迭代器自变,seq可以是序列字典(key).结合range函数。
for:if:break /else: 循环到一定条件则跳出，否则结束循环后执行else子句
for i in iterable:do: 用迭代器来做循环，如iglob,enumerate等生产的对象
for index,i in enumerate(obj[,start]):do: 枚举对象产生的是(0,seq[0])的值,索引在前,可指明起始值
del obj: 删除对象，可以是变量，序列，序列元素，字典的项
pass: 无操作占位符，用于填补语法空代码。一般结合注释使用。
break: 提早完成跳出，尤其用于while True等,只挑出当前一轮循环。
continue: 使当前迭代结束，跳到下一轮循环。用于跳过后面有繁琐循环体。即是break掉这轮循环
str % values: 字符串格式化，values可以是字符数字或者元组。
exec “action”: action就是普通的语句，将执行语句中的行为。命名空间行为。
scope={}\exec’action’ in scope: 命名空间,就是创立一个含有内建函数的空间,使exec的行为在这个空间中执行,而不影响真实外部。关键是exec in {}表达。同样适用于: eval.内含’__builtins__’项: 

assert 条件,promt: 断言语句，不符合条件的则弹出AssertionError:promt的错误。
 ​
# 方法

## 列表方法
A.append（对象）: 列表末追加新对象（一次一个，对象可为列表）
A.count(obj): 统计列表某元素出现次数
A.extend(B): 在列表A后追加另一序列B的值
A.index(obj): 索引,返回obj元素在列表中索引号n（第n+1个）
A.insert(index,obj): 插入，在索引号处插入对象。
A.pop(index): 移除索引号的元素,返回该元素的值。()时移除最后一个,出栈.唯一修改列表还能返回值。
A.sort(): 排序，默认按升序。可添加参数cmp、key、reverse。cmp可以自定义的函数,返回负数时, 按此时顺序排序，详见脚本例子
A.remove(obj): 移除列表内某个指定元素，不返回任何值。
A.reverse(): 反向列表A，不返回值。

 ​
## 字符串方法（并不能改变字符串的值，只起到返回作用）
- str.decode(codec): 根据codec将字符串解码成unicode,等于unicode函数
- str.encode(codec): 根据codec将unicode字符串编码为codec的内容
- str.find(a,x,y): str中查找字符串a,xy为查找始末(不含y)不输入xy默认头到尾.返回索引号,没有返回-1
- str.rfind(a,x,y): str中查找最后一个字符串a,xy为始末,返回最后一个的索引号，没有返回-1
- str.index(a,x,y): 和find功能基本一致，区别在查找不到返回错误
- str.rindex(a,x,y): 和rfind功能基本一致，区别在查找不到返回错误
- str.count(a,x,y): str中查找a,xy始末,返回a出现次数
- str.startwith(a,x,y): str中检查xy范围内是否以字符串a起始，返回TrueFalse
- str.endwith(a,x,y): str中检查xy范围内是否以字符串a终结，返回TrueFalse
- str.join(Seq): 序列Seq各字符元素用str连接起来.要在始末加连接符要加空元素’’.返回连接的字符串
- str.lower(): str小写化，返回小写字符串
- str.islower(): 检查str是否小写，返回真假
- str.capitalize(): str句首首字母大写，返回字符串
- str.swapcase(): str字母交换大小写，返回字符串
- str.title(): str词首大写，包括's，the等。返回字符串
- str.istitle(): 检查str是否词首大写，返回真假
- str.upper(): str大写化，返回大写字符串
- str.isupper(): 检查str是否大写，返回真假
- str.replace(a,b,[x]): 替换,将a变成b。x为参数限定最大替换数，不输为全替换。返回字符
- str.expandtabs([x]): 将Tab产生的长度替换为x个空格，不指明x为默认tab长度。返回字符串
- str.split([spe[,x]]): 将分隔符spe(不输入默认空格换行制表符等)从字符串中去除,x为最大去除数。返回列表
- str.splitlines([keepends]): 将多行分裂开成列表，可选保留换行符不。
- str.strip('a'): 将str两端的符合条件'a'的都删除,返回字符串.不输默认空格tab换行,或者某些单字符
- str.lstrip('a'): 同strip，不过只删左边end部分
- str.rstrip('a'): 同strip，不过只删右边开头部分
- str.translate(table[,'char']): 按字母表（用maketrans函数产生）单字符地替换str，删掉'char'，返回字符串
- str.zfill(x): 填充字符串使其变成长度x的字符串，不足从左填入0
- str.center(x[,'a']): 变成长度x字符串,str归中处理(若基数右侧多1).指明a的话即用a填充,否则空格
- str.ljust(x[,'a']): 变成长度x字符串,str左对齐处理.指明a的话即用a填充,否则空格
- str.rjust(x[,'a']): 变成长度x字符串,str右对齐处理.指明a的话即用a填充,否则空格
- str.isalnum(): 检查str是否数字或字母，返回是否。
- str.isalpha(): 检查str是否字母，返回是否。
- str.isdigit(): 检查str是否数字，返回是否。
- str.isspace(): 检查str是否空格，返回是否。
- str.partition('sep'): 从左搜索str的分隔符sep，并返回(head,sep,tail)即分隔开后的元组
- str.rpartition('sep'): 从右搜索str的分隔符sep，并返回(head,sep,tail)即分隔开后的元组
 
## 字典方法
- dict.clear(): 清空字典所有的项，无返回值None。
- dict.copy(): 浅复制副本，用于赋值,深复制用copy.deepcopy
- dict.fromkeys(seq[,val]): 从seq内读入键，建立并返回一个新的字典，值通为val或者None（默认）
- dict.get(key[,noneval]): 读取并返回字典某key的值,若不存在该键返回None或指定值,好处在于不存在不报错。
- dict.setdefault(key[,val]): 和get类似，读取并返回键值。差别在于，若不存在，则新建该键及键值。
- dict.update(dictB): 用dictB的项更新dict，相当于复制。若有相同键则覆盖。
- dict.has_key('key'): 检查是否字典中含有该键值，和in用法一样，返回真假。
- dict.items(): 将字典所有项以列表方式返回,每个项以元组方式,但返回时没有特殊顺序
- dict.iteritems(): 和items功能一样，但是返回迭代器对象,可用list()将函数读出
- dict.keys(): 返回字典中的键的列表
- dict.iterkeys(): 返回字典中的键的列表的迭代器对象
- dict.values(): 返回字典中值的列表
- dict.itervalues(): 返回字典中值的列表的迭代器对象
- dict.pop(key): 读出某键的值,并从字典中删除该项，栈操作。
- dict.popitem(): 随机读出字典中一个项以元组返回,并从字典中删除。

## 集合方法
set.add(element)    集合添加一个元素
set.update(seq)    集合添加多项
set.remove(element)    移除集合一个元素
t|s 并集 t&s 交集 t-s 差集 t^s交集的补集(只出现t或s中，不能都有)

## 文件方法和属性  help(file)
- open('filepath','mode'[,bufsize])    同file,但可以打开文件对象。'r''w''a''b''+'分别为读,写,追加,二进制方法,和读/写,后两种可以和前面合用。
- file('filepath','mode'[,bufsize])    建立文件对象,bufsize为缓存区大小,一般不设.mode默认'r'读。'U'模式支持各种换行符.
- f.read([size])                读取文件,记得有定位的,读完就改变定位.size指明为读取字节数,不指明全部读取.返回字符串
- f.readline([size])            读取一行,读完改变定位,size指明为读取字节数(非行数),不指名读取一行(常用)。返回字符串.读行是从当前位至\n为止。
- f.readlines([size])            不设置size读取所有行,以每行为序列的一个元素返回全文的序列。
- f.write(str)                把字符串(必须是字符串)写入到文件中.注意,和定位符有关.不会帮你换行,手动加入制表符.若对已存在文件操作则覆盖
- f.writelines(seq)            把序列的各个str串连起来全部写入到文件中。
- f.close()                    关闭文件，否则驻留内存。常用try..finally的后者来保证关闭。
- \#readfile('filepath')    读取文件内容并返回内容，参数为路径。
- \#addfile('filepath','str')    追加str到p文件的末尾，返回None。
- f.name        返回file的filepath+name
- f.closed        返回file是否关闭真假
- f.mode        返回file读取模式
- f.encoding        ？
- f.newlines        ？
- f.softspace        ？
- f.tell()        返回文件操作标记符所在处，换行符\n占两位其余一位，从0开始。但\n用read来读代表1byte。
- f.next()        和readline()类似，从当前处读到行末并返回，跳至下一行开头。注意，实际文件操作符其实已到文件末,tell()显示文件末尾,没法用read()类再读取。
- f.seek(offset[,whence])    文件操作符移动到offset步数的位置,正值正移负值负移,移动的起点whence为0时为文件头1为当前操作符位置2为文件末。不输入默认为从文件头开始。注意a模式下每次都会自动返回到文件末。
- f.truncate([size])        裁剪，不可用于只读。输入大小，就是文件保留的大小。不标大小表示裁到文件操作符，若大于文件大小则补空格(win)
- f.isatty()        返回文件是否是一个终端设备文件（unix）
- f.fileno()        返回长整形的‘文件标签’
- f.flush()        把缓冲区内容写入硬盘
- for line in file1： 用迭代器逐行读取，注意此时不能再用readline()之类读取，不怎么占内存的方式



​

​



关键词列表:

and           |      elif         |       if          |        print
as            |      else         |       import      |        raise
assert        |      except       |       in          |        return
break         |      exec         |       is          |        try
class         |      finally      |       lambda      |        while
continue      |      for          |       not         |        with
def           |      from         |       or          |        yield
del           |      global       |       pass		  |

int('6.000000000000000000e+00')报错,float('6.000000000000000000e+00')则可以








## Reference

1. [Python简明教程](http://woodpecker.org.cn/abyteofpython_cn/chinese/)
2. [Pyhon2官方手册](https://docs.python.org/2/)
2. [Python标准库](https://docs.python.org/2/library/index.html)
4. [Python中文手册](http://www.pythondoc.com/pythontutorial27/index.html)

------
