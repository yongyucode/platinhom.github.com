---
layout: post
title: crystaldock
date: 2015-07-23 20:27:28
categories: CompSci
tags: CompBiol CADD Python src
---

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<pre><code class="language-python" id="src"></code></pre>

<script>
$.get("http://platinhom.github.io/other/scripts/crystal_dock.py",function(data,status){
	//alert("Data: " + data + "\nStatus: " + status);
	$("#src").html(data);
	Prism.highlightAll();
	//Prism.highlightElement($('#src')[0]);
});
</script>


## Reference
1. [Crystal Dock](http://nbcr.ucsd.edu/data/sw/hosted/crystaldock/), [l](http://pubs.acs.org.sci-hub.org/doi/abs/10.1021/ci200357y)
2. [SF-download](http://sourceforge.net/projects/crystaldock/files/)
3. [CrystalDock: A Novel Approach to Fragment-Based Drug Design](http://pubs.acs.org/doi/abs/10.1021/ci200357y)

------
