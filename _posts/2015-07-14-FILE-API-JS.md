---
layout: post
title: JS利用FILE-API读取操作文件
date: 2015-07-13 21:15:06
categories: CompSci
tags: Html JS
---

今天要写个脚本能够对上传文件进行分析, 需要HTML客户端使用JS分析文件.

-------

## About File API

HTML5为我们提供了一种与本地文件系统交互的标准方式：**File API**。该规范主要定义了以下数据结构：

- File: 文件对象,包含有文件名,文件大小,mimetype类型和对文件句柄引用等.
- FileList: 一个文件对象的数组.
- Blob: 操作分割文件到字节

#### To check your browser whether support HTML5 File-API

~~~javascript
// Check for the various File API support.
function isSupportFileApi() {
    if(window.File && window.FileList && window.FileReader && window.Blob) {
        alert('The File APIs are supported in this browser!');//return true;
    } else{
    alert('The File APIs are not fully supported in this browser.');//return false;
}}
//A button to call this function
~~~

<script>function isSupportFileApi() {if(window.File && window.FileList && window.FileReader && window.Blob) {alert("The File API are supported in this browser!");}else{alert('The File APIs are not fully supported in this browser.');}}</script><input type="button" value="检测" onclick="isSupportFileApi()">

## Use File Handle

### Use Form: input type=file

- 可以使用新multiple属性来进行多选, 此时files需要用数组.
- output标签也是新对象,用来定义不同类型的输出,例如脚本的输出.

~~~javascript
<input type="file" id="files" name="files[]" multiple />
<output id="list"></output>

<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
~~~

<input type="file" id="files" name="files[]" multiple />

<output id="list"></output>

<script>  function handleFileSelect(evt) {var files = evt.target.files;var output = [];for (var i = 0, f; f = files[i]; i++) {output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',f.size, ' bytes, last modified: ',f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a','</li>');} document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';}document.getElementById('files').addEventListener('change', handleFileSelect, false);</script>


### Use drag method

~~~javascript
<div id="drop_zone">Drop files here</div>
<output id="list2"></output>

<script>
  function handleFileSelect2(evt) {
    evt.stopPropagation();
    evt.preventDefault();

    var files = evt.dataTransfer.files; // FileList object.

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
    }
    document.getElementById('list2').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  function handleDragOver(evt) {
    evt.stopPropagation();
    evt.preventDefault();
    evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
  }

  // Setup the dnd listeners.
  var dropZone = document.getElementById('drop_zone');
  dropZone.addEventListener('dragover', handleDragOver, false);
  dropZone.addEventListener('drop', handleFileSelect2, false);
</script>
~~~

<div id="drop_zone" style="width:10em;height:2em;margin:auto;color:red;background:yellow;text-align:center;padding:auto;font-size:20pt">Drop files here</div>

<output id="list2"></output>

<script>  function handleFileSelect2(evt) {evt.stopPropagation(); evt.preventDefault();var files = evt.dataTransfer.files;var output = [];for (var i = 0, f; f = files[i]; i++) {output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ', f.size, ' bytes, last modified: ',f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',  '</li>');}document.getElementById('list2').innerHTML = '<ul>' + output.join('') + '</ul>';  }  function handleDragOver(evt) { evt.stopPropagation(); evt.preventDefault(); evt.dataTransfer.dropEffect = 'copy'; } var dropZone = document.getElementById('drop_zone');  dropZone.addEventListener('dragover', handleDragOver, false);  dropZone.addEventListener('drop', handleFileSelect2, false);</script>


## Reference

1. [Reading files in JavaScript using the File APIs](http://www.html5rocks.com/en/tutorials/file/dndfiles/)
2. [W3-File API](http://www.w3.org/TR/file-upload/)

------
