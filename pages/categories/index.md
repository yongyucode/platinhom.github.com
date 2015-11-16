---
title: 类别
layout: page_small
---

<div id='tag_cloud'>
Categories:  
{% for cat in site.categories %}
<a href="#{{ cat[0] }}" title="{{ cat[0] }}" rel="{{ cat[1].size }}">{{ cat[0] }} <span style="color:#07e"> ({{ cat[1].size }})</span></a>&nbsp;&nbsp;&nbsp;
{% endfor %}

<br/>
Types: 
<a href="/DailyTools" title="Tools">Tools</a>&nbsp;&nbsp;&nbsp;
<a href="/pages/archives.html" title="Archives">Archives</a>&nbsp;&nbsp;&nbsp;
<a href="/pages/allblogs.html" title="AllBlogs">All Blogs</a>&nbsp;&nbsp;&nbsp;
</div>

<hr style="margin:5px;border-width:2px;">

<!--a href="{{ site.url }}{{ post.url }}" title="{{ post.title }}">{{ post.title }} </a-->

<ul class="listing">
{% for cat in site.categories %}
  <li class="listing-seperator" id="{{ cat[0] }}">{{ cat[0] }}</li>
{% for post in cat[1] %}
  {% if post.archive != true %}
  <li class="listing-item">
  <time datetime="{{ post.date | date:"%Y-%m-%d" }}">{{ post.date | date:"%Y-%m-%d" }}</time>
  <a href="{{ post.url }}" title="{{ post.title }}">{{ post.title }}</a>
  </li>
  {% endif %}
{% endfor %}
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

------

Notice: [Archives](/pages/archives.html) are not listed here! 
