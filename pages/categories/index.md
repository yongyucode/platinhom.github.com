---
title: 类别
layout: page_small
---

<div id='tag_cloud'>
Categories:  
{% for cat in site.categories %}
<a class="linknoline" href="#{{ cat[0] }}" title="{{ cat[0] }}" rel="{{ cat[1].size }}">{{ cat[0] }} <span style="color:#07e"> ({{ cat[1].size }})</span></a>&nbsp;&nbsp;&nbsp;
{% endfor %}

<br/>
Types: 
<a class="linknoline" href="/DailyTools" title="Tools">Tools</a>&nbsp;&nbsp;&nbsp;
<a class="linknoline" href="/pages/archives.html" title="Archives">Archives</a>&nbsp;&nbsp;&nbsp;
<a class="linknoline" href="/pages/allblogs.html" title="AllBlogs">All Blogs</a>&nbsp;&nbsp;&nbsp;

<hr style="margin:5px;border-width:2px;">

<span style="font-size:0.8em">
<a class="linknoline" href="/1234/01/01/Python-Language/">Python语法汇总</a>&nbsp;&nbsp;
<a class="linknoline" href="/1234/01/02/Python-BuildinModules/">Python内建模块</a>&nbsp;&nbsp;
<br/>
<a class="linknoline" href="/1111/11/11/Plans/">备忘计划</a>&nbsp;&nbsp;
<a class="linknoline" href="/1111/11/10/important-blog/">重要博客</a>&nbsp;&nbsp;
</span>

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
