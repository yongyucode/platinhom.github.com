---
layout: post_small
title: ExcelFunction
date: 2015-09-03 20:10:10
categories: IT
tags: Excel
---

<style>
strong{font-size:16px;}
</style>


## 基本知识

- `$`     绝对引用
- `&`     字符串拼接
-  `'`      在单元格开头时标记为字符串而非数值型
- `".."`	表明是字符串
- 转置(行列转置)一般使用选择性黏贴->转置实现,也可以用TRANSPOSE函数



----
## 函数:
###excel相关(单元格,文件薄)
- #### [Column](https://support.office.microsoft.com/zh-cn/article/COLUMN-%E5%87%BD%E6%95%B0-44e8c754-711c-4df3-9da4-47a55042554b?ui=zh-CN&rs=zh-CN&ad=CN  ) #返回单元格列号信息
 - COLUMN([reference])
 [实例](http://jingyan.baidu.com/article/fec7a1e519f6411190b4e7a6.html )
- #### [Raw](https://support.office.microsoft.com/zh-cn/article/ROW-%E5%87%BD%E6%95%B0-3A63B74A-C4D0-4093-B49A-E76EB49A6D8D?ui=zh-CN&rs=zh-CN&ad=CN   )  #返回单元格行号信息
 - ROW([reference])



###字符串相关:
[待总结](http://www.360doc.com/content/13/0107/15/83610_258773240.shtml  )
- #### [Concatenate](https://support.office.microsoft.com/zh-cn/article/CONCATENATE-%E5%87%BD%E6%95%B0-8F8AE884-2CA8-4F7A-B093-75D702BEA31D?ui=zh-CN&rs=zh-CN&ad=CN  ) #字符串合并
 - CONCATENATE(text1, [text2], ...)
效果和 & 基本相同

- #### [Text](https://support.office.microsoft.com/zh-tw/article/TEXT-%E5%87%BD%E6%95%B8-29cea14b-bd86-426c-9985-cb2f0b19df58?CorrelationId=0ebeeaca-58d9-40c4-84d1-9b64ac192a9d&ui=zh-TW&rs=zh-TW&ad=TW  ) #转化为指定形式字符串
 - TEXT(value, format_text)  
如text(A1,"#0.00") 显示为#3.99.




## 逻辑类

- **OR**(logical1,logical2, ...): 返回所有值的OR逻辑。
- **AND**(logical1,logical2, ...): 返回所有值的AND逻辑。   
如果指定的逻辑条件参数中包含非逻辑值时，则函数返回错误值“#VALUE!”或“#NAME”。
- if(测试条件，真值，[假值])


## 运算

运算对象一般可以是地址,可以是数值,有些函数支持区域.

### 单数值处理

- **ABS**(number): 求出相应数字的绝对值。  
如果number参数不是数值，而是一些字符（如A等），则B2中返回错误值“#VALUE！”。
- **INT**(number)：将数值向下取整为最接近的整数。
- **MOD**(A,B):求出两数相除A/B的余数。  
如果B为零，则显示错误值“#DIV/0!”；MOD函数可以借用函数INT来表示：上述公式可以修改为：=13-4*INT(13/4)。

### 区域数值处理

- **SUM**(Number1,Number2……)：计算所有参数数值的和。  
如果参数为数组或引用，只有其中的数字将被计算。数组或引用中的空白单元格、逻辑值、文本或错误值将被忽略；如果将上述公式修改为：=SUM(LARGE(D2:D63,{1,2,3,4,5}))，则可以求出前5名成绩的和。
- **AVERAGE**(number1,number2,……): 求出所有参数的算术平均值。    
如果引用区域中包含“0”值单元格，则计算在内；如果引用区域中包含空白或字符单元格，则不计算在内。
- **MAX**(number1,number2……)：求出一组数中的最大值。  
如果参数中有文本或逻辑值，则忽略。
- **MIN**(number1,number2……)：求出一组数中的最小值。



Ref: http://ce.sysu.edu.cn/hope2008/beautydesign/ShowArticle.asp?ArticleID=12385 

技巧:
1. 将函数形式转为结果: 复制区域数据, 然后右键选择性黏贴, 这时选数值, 函数的值就被粘过来了.注意hyperlink不行
2.绝对引用: A88=$A$88, 注意可以固定A或88, 按F4整体改变

 
查询函数请点excel的帮助,里面有概况

Hyperlink(link,name) 超链接,变量1是连接变量2是显示下划线名字.
关于自动超链接:在excel选项中找到自动更正选项-> 自动套用格式, 勾选替换为超链接. 点击超链接的cell, 然后在数值栏处enter一下就OK

## 文本类

- **LEN**(text)：统计文本字符串中字符数目。  
LEN要统计时，无论中全角字符，还是半角字符，每个字符均计为“1”；与之相对应的一个函数——**LENB**，在统计时半角字符计为“1”，全角字符计为“2”。
- **CONCATENATE**(Text1，Text……)：将多个字符文本或单元格中的数据连接在一起，显示在一个单元格中。  
如果参数不是引用的单元格，且为文本格式的，请给参数加上英文状态下的双引号.
- **LEFT**(text,num_chars)：从一个文本字符串的第一个字符开始，截取指定数目的字符。可参考RIGHT
- **RIGHT**(text,num\_chars)：从一个文本字符串的最后一个字符开始，截取指定数目的字符。  
参数说明：text代表要截字符的字符串；num_chars代表给定的截取数目。**
Num\_chars参数必须大于或等于0，如果忽略，则默认其为1；如果num\_chars参数大于文本长度，则函数返回整个文本。
- **MID**(text,start\_num,num\_chars)：从一个文本字符串的指定位置开始，截取指定数目的字符。  
text代表一个文本字符串；start\_num表示指定的起始位置；num\_chars表示要截取的数目。



## 功能类

- **COLUMN**(reference)：显示所引用单元格的列标号值。reference为引用的单元格,不输入为当前列.  
如果在B11单元格中输入公式：=COLUMN()，显示出2；与之相对应的还有一个返回行标号值的函数——**ROW**(reference)。



### 判断对错

- **ISERROR**(value)：用于测试函数式返回的数值是否有错。如果有错，该函数返回TRUE，反之返回FALSE。  
Value表示需要测试的值或表达式。此函数通常与IF函数配套使用，如果公式为：=IF(ISERROR(A35/B35),"",A35/B35)，如果B35为空或“0”，则相应的单元格显示为空，反之显示A35/B35的结果。

### 时间日期相关

- **DATE**(year,month,day)：给出指定数值的日期(返回日期格式)。  year为指定的年份数值（小于9999）；month为指定的月份数值（可以大于12）；day为指定的天数.(超过公历值会进位,例如13月=下年1月)
- **NOW**()：给出当前系统日期和时间。该函数不需要参数。  
显示出来的日期和时间格式，可以通过单元格格式进行重新设置。如果系统日期和时间发生了改变，只要按一下F9功能键，即可让其随之改变。
- **YEAR**(serial_number)：求出指定日期或引用单元格中的日期的年份。(年,y)
- **MONTH**(serial_number)：求出指定日期或引用单元格中的日期的月份。(月,m)
- **DAY**(serial_number)：求出指定日期或引用单元格中的日期的天数。(日,d)  
如果是给定的日期，请包含在英文双引号中。
- **DATEDIF**(data1,data2,unit)：计算返回两个日期参数的差值。  
unit为"y","m","d",即指明相减的单位为年/月/日.这是Excel中的一个隐藏函数，在函数向导中是找不到的，可以直接输入使用，对于计算年龄、工龄等非常有效。

6、COUNTIF函数
函数名称：COUNTIF

主要功能：统计某个单元格区域中符合指定条件的单元格数目。
使用格式：COUNTIF(Range,Criteria)

参数说明：Range代表要统计的单元格区域；Criteria表示指定的条件表达式。
应用举例：在C17单元格中输入公式：=COUNTIF(B1:B13,">=80")，确认后，即可统计出B1至B13单元格区域中，数值大于等于80的单元格数目。

特别提醒：允许引用的单元格区域中有空白单元格出现。











10、DCOUNT函数

函数名称：DCOUNT
主要功能：返回数据库或列表的列中满足指定条件并且包含数字的单元格数目。

使用格式：DCOUNT(database,field,criteria)
参数说明：Database表示需要统计的单元格区域；Field表示函数所使用的数据列（在第一行必须要有标志项）；Criteria包含条件的单元格区域。

应用举例：如图1所示，在F4单元格中输入公式：=DCOUNT(A1:D11,"语文",F1:G2)，确认后即可求出“语文”列中，成绩大于等于70，而小于80的数值单元格数目（相当于分数段人数）。


特别提醒：如果将上述公式修改为：=DCOUNT(A1:D11,,F1:G2)，也可以达到相同目的。



11、FREQUENCY函数
函数名称：FREQUENCY

主要功能：以一列垂直数组返回某个区域中数据的频率分布。
使用格式：FREQUENCY(data_array,bins_array)

参数说明：Data_array表示用来计算频率的一组数据或单元格区域；Bins_array表示为前面数组进行分隔一列数值。
应用举例：如图2所示，同时选中B32至B36单元格区域，输入公式：=FREQUENCY(B2:B31,D2:D36)，输入完成后按下“Ctrl+Shift+Enter”组合键进行确认，即可求出B2至B31区域中，按D2至D36区域进行分隔的各段数值的出现频率数目（相当于统计各分数段人数）。


特别提醒：上述输入的是一个数组公式，输入完成后，需要通过按“Ctrl+Shift+Enter”组合键进行确认，确认后公式两端出现一对大括号（{}），此大括号不能直接输入。



12、IF函数
函数名称：IF

主要功能：根据对指定条件的逻辑判断的真假结果，返回相对应的内容。
使用格式：=IF(Logical,Value_if_true,Value_if_false)

参数说明：Logical代表逻辑判断表达式；Value_if_true表示当判断条件为逻辑“真（TRUE）”时的显示内容，如果忽略返回“TRUE”；Value_if_false表示当判断条件为逻辑“假（FALSE）”时的显示内容，如果忽略返回“FALSE”。
应用举例：在C29单元格中输入公式：=IF(C26>=18,"符合要求","不符合要求")，确信以后，如果C26单元格中的数值大于或等于18，则C29单元格显示“符合要求”字样，反之显示“不符合要求”字样。

特别提醒：本文中类似“在C29单元格中输入公式”中指定的单元格，读者在使用时，并不需要受其约束，此处只是配合本文所附的实例需要而给出的相应单元格，具体请大家参考所附的实例文件。



- **INDEX**(array,row\_num,column\_num)：返回列表或数组中的元素值，此元素由行序号和列序号的索引值进行确定。

参数说明：Array代表单元格区域或数组常量；Row\_num表示指定的行序号（如果省略row\_num，则必须有 column\_num）；Column\_num表示指定的列序号（如果省略column\_num，则必须有 row\_num）。
应用举例：如图3所示，在F8单元格中输入公式：=INDEX(A1:D11,4,3)，确认后则显示出A1至D11单元格区域中，第4行和第3列交叉处的单元格（即C4）中的内容。


特别提醒：此处的行序号参数（row\_num）和列序号参数（column\_num）是相对于所引用的单元格区域而言的，不是Excel工作表中的行或列序号。




 
   









18、MATCH函数

函数名称：MATCH
主要功能：返回在指定方式下与指定数值匹配的数组中元素的相应位置。

使用格式：MATCH(lookup_value,lookup_array,match_type)
参数说明：Lookup_value代表需要在数据表中查找的数值；

                   Lookup_array表示可能包含所要查找的数值的连续单元格区域；
                   Match_type表示查找方式的值（-1、0或1）。

       如果match_type为-1，查找大于或等于 lookup_value的最小数值，Lookup_array 必须按降序排列；
       如果match_type为1，查找小于或等于 lookup_value 的最大数值，Lookup_array 必须按升序排列；

       如果match_type为0，查找等于lookup_value 的第一个数值，Lookup_array 可以按任何顺序排列；如果省略match_type，则默认为1。
应用举例：如图4所示，在F2单元格中输入公式：=MATCH(E2,B1:B11,0)，确认后则返回查找的结果“9”。


特别提醒：Lookup_array只能为一列或一行。



















26、RANK函数
函数名称：RANK

主要功能：返回某一数值在一列数值中的相对于其他数值的排位。
使用格式：RANK（Number,ref,order）

参数说明：Number代表需要排序的数值；ref代表排序数值所处的单元格区域；order代表排序方式参数（如果为“0”或者忽略，则按降序排名，即数值越大，排名结果数值越小；如果为非“0”值，则按升序排名，即数值越大，排名结果数值越大；）。
应用举例：如在C2单元格中输入公式：=RANK(B2,$B$2:$B$31,0)，确认后即可得出丁1同学的语文成绩在全班成绩中的排名结果。

特别提醒：在上述公式中，我们让Number参数采取了相对引用形式，而让ref参数采取了绝对引用形式（增加了一个“$”符号），这样设置后，选中C2单元格，将鼠标移至该单元格右下角，成细十字线状时（通常称之为“填充柄”），按住左键向下拖拉，即可将上述公式快速复制到C列下面的单元格中，完成其他同学语文成绩的排名统计。


IF (条件, 真时, 假时)





28、SUBTOTAL函数
函数名称：SUBTOTAL

主要功能：返回列表或数据库中的分类汇总。
使用格式：SUBTOTAL(function_num, ref1, ref2, ...)

参数说明：Function_num为1到11（包含隐藏值）或101到111（忽略隐藏值）之间的数字，用来指定使用什么函数在列表中进行分类汇总计算（如图6）；ref1, ref2,……代表要进行分类汇总区域或引用，不超过29个。

应用举例：如图7所示，在B64和C64单元格中分别输入公式：=SUBTOTAL(3,C2:C63)和=SUBTOTAL103,C2:C63)，并且将61行隐藏起来，确认后，前者显示为62（包括隐藏的行），后者显示为61，不包括隐藏的行。

特别提醒：如果采取自动筛选，无论function_num参数选用什么类型，SUBTOTAL函数忽略任何不包括在筛选结果中的行；SUBTOTAL函数适用于数据列或垂直区域，不适用于数据行或水平区域。







30、SUMIF函数
函数名称：SUMIF

主要功能：计算符合指定条件的单元格区域内的数值和。
使用格式：SUMIF（Range,Criteria,Sum_Range）

参数说明：Range代表条件判断的单元格区域；Criteria为指定条件表达式；Sum_Range代表需要计算的数值所在的单元格区域。
应用举例：如图7所示，在D64单元格中输入公式：=SUMIF(C2:C63,"男",D2:D63)，确认后即可求出“男”生的语文成绩和。

特别提醒：如果把上述公式修改为：=SUMIF(C2:C63,"女",D2:D63)，即可求出“女”生的语文成绩和；其中“男”和“女”由于是文本型的，需要放在英文状态下的双引号（"男"、"女"）中。



31、TEXT函数
函数名称：TEXT

T 函数转为文本 (http://www.360doc.com/content/13/0107/15/83610_258773240.shtml)

主要功能：根据指定的数值格式将相应的数字转换为文本形式。
使用格式：TEXT(value,format_text)

参数说明：value代表需要转换的数值或引用的单元格；format_text为指定文字形式的数字格式。
应用举例：如果B68单元格中保存有数值1280.45，我们在C68单元格中输入公式：=TEXT(B68, "$0.00")，确认后显示为“

INDIRECT(字符串)
将字符串转换为相应的位置, 如表示某格,原来是'sheet名'!A6 这样, 可以用INDIRECT("'8-" & B10 & "' ! A6") 去引用,假设B10储存了部分sheet名,8-是公有sheet名
indirect 函数只能引用打开的工作薄

index(范围2, match(值,范围1)) 可以查找在范围1的某列中某值的位置并返回该位置别的行的相应值

 




## Reference

1. [Office官方:Excel 函数（按类别列出）](https://support.office.com/zh-cn/article/Excel-%E5%87%BD%E6%95%B0%EF%BC%88%E6%8C%89%E7%B1%BB%E5%88%AB%E5%88%97%E5%87%BA%EF%BC%89-5f91f4e9-7b42-46d2-9bd1-63f26a86c0eb?ui=zh-CN&rs=zh-CN&ad=CN)

------
