---
title: 云标签
layout: page_small
---

<div id='tag_cloud'>
{% for tag in site.tags %}
<a href="#{{ tag[0] }}" title="{{ tag[0] }}" rel="{{ tag[1].size }}">{{ tag[0] }} <span style="color:#07e"> #{{ tag[1].size }}</span></a>&nbsp;&nbsp;&nbsp;
{% endfor %}
</div>

<ul class="listing">
{% for tag in site.tags %}
  <li class="listing-seperator" id="{{ tag[0] }}">{{ tag[0] }}</li>
  <p class="listing-item">
{% for post in tag[1] %}
  <a href="{{ site.url }}{{ post.url }}" title="{{ post.title }}">{{ post.title }}</a> ; 
{% endfor %}
	</p> 
{% endfor %}
</ul>

<!--script src="/jscss/jquery.tagcloud.js" charset="utf-8"></script> 
<script language="javascript">
$.fn.tagcloud.defaults = {
    size: {start: 1, end: 1, unit: 'em'},
      color: {start: '#f8e0e6', end: '#ff3333'}
};

$(function () {
    $('#tag_cloud a').tagcloud();
});
</script-->
