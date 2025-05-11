---
layout: default
title: WebShell
---

<!-- # [WebShell](https://adilhyz.github.io/WebShell) -->

![hudaw](https://adilhyz.github.io/WebShell/screenshot.png)

Shell Backdoor, could be useful for the needs of

This is just for `learning` purpose only, I am not responsible if there is any mess

Author: [Adilhyz](https://adilhyz.github.io)

<a id="top"></a>


## **Category ⛱**

[ Safety Backd00r ](#safety-backd00r)&ensp;
[ File Manager ](#file-manager)&ensp;
[ Mini Backd00r ](#mini-backd00r)&ensp;
[ Fully Backd00r ](#fully-backd00r)&ensp;
[ Bypass Backd00r ](#bypass-backd00r)&ensp;

<a href="#top" id="toTopBtn" class="toptop">↑</a>


{% assign grouped = site.data.shells | group_by: "category" %}
{% for cat in grouped %}
  <h2 class="name" id="{{ cat.name | slugify }}">{{ cat.name }}</h2>
  <div class="shell-container">
    {% for shell in cat.items %}
      <div class="shell-card">
        <h2 class="name">{{ shell.name }}</h2>
        <a href="{{ shell.image }}"><img src="{{ shell.image }}" alt="{{ shell.name }}"></a>
        <div class="info">
          <p class="size">Size: {{ shell.size }}</p>
          <p>Version: {{ shell.version }}</p>
          {% if shell.name == "Alfa Shell" %}
            <p>User/Password: {{ shell.password }}</p>
          {% elsif shell.name == "Ipt Mini Shell" %}
            <p>User/Password: {{ shell.password }}</p>
          {% else %}
            <p>Password: {{ shell.password }}</p>
          {% endif %}
        </div>
        <a href="{{ shell.download }}">Download</a>
        <a href="{{ shell.raw }}">Raw &gt;</a>
      </div>
    {% endfor %}
  </div>
{% endfor %}