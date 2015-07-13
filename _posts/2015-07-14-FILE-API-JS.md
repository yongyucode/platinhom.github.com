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

HTML5为我们提供了一种与本地文件系统交互的标准方式：File Api。该规范主要定义了以下数据结构：

- File: 文件对象,包含有文件名,文件大小,类型等.
- FileList: 一个文件对象的数组.
- Blob: 操作分割文件到字节

#### To check your browser whether support HTML5 File-API

~~~js
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

~~~js
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

~~~js
<div id="drop_zone">Drop files here</div>
<output id="list"></output>

<script>
  function handleFileSelect(evt) {
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
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  function handleDragOver(evt) {
    evt.stopPropagation();
    evt.preventDefault();
    evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
  }

  // Setup the dnd listeners.
  var dropZone = document.getElementById('drop_zone');
  dropZone.addEventListener('dragover', handleDragOver, false);
  dropZone.addEventListener('drop', handleFileSelect, false);
</script>
~~~

<div id="drop_zone">Drop files here</div>

<output id="list"></output>

<script>  function handleFileSelect(evt) {evt.stopPropagation(); evt.preventDefault();var files = evt.dataTransfer.files;var output = [];for (var i = 0, f; f = files[i]; i++) {output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ', f.size, ' bytes, last modified: ',f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',  '</li>');}document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';  }  function handleDragOver(evt) { evt.stopPropagation(); evt.preventDefault(); evt.dataTransfer.dropEffect = 'copy'; } var dropZone = document.getElementById('drop_zone');  dropZone.addEventListener('dragover', handleDragOver, false);  dropZone.addEventListener('drop', handleFileSelect, false);</script>


## Reference

1. [Reading files in JavaScript using the File APIs](http://www.html5rocks.com/en/tutorials/file/dndfiles/)
2. [W3-File API](http://www.w3.org/TR/file-upload/)

------
