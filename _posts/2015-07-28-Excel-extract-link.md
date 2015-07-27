---
layout: post
title: Excel批量提取链接地址
date: 2015-07-27 21:44:55
categories: IT
tags: VB Excel
---

- 方法一: 使用指定range逐一迭代  
Offset(y,x) 返回的是该cell相应行和列的偏移后的对象.

~~~VB
Sub test()
For Each cell In Range("A2:A6")
cell.Offset(0, 1) = cell.Hyperlinks(1).Address
Next
End Sub
~~~

- 方法二: 使用所有Hyperlinks的集合来迭代.

~~~
Sub ExtractHL()
    Dim HL As Hyperlink
    For Each HL In ActiveSheet.Hyperlinks
        HL.Range.Offset(0, 2).Value = HL.Address
        HL.Range.Offset(0, 3).Value = "[" + HL.Range.Offset(0, 0).Value + "](" + HL.Address + ") : " + HL.Range.Offset(0, 1).Value
    Next
End Sub
~~~

------