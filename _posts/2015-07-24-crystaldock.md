---
layout: post
title: crystaldock
date: 2015-07-23 20:27:28
categories: CompSci
tags: CompBiol CADD Python src
---

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>

$.get("http://platinhom.github.io/other/scripts/crystal_dock.py",function(data,status){
	//alert("Data: " + data + "\nStatus: " + status);
	
	$("#src").html(data);
});
Prism.highlightAll();
</script>

<pre><code class="language-python" id="src"></code></pre>


------
