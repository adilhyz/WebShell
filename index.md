---
layout: default
title: WebShell
---

<style>
.disclaimer {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
.disclaimer {
  cursor: pointer;
  position: relative;
  display: inline-block;
  font-size: 19px;
  background-clip: text;
  -webkit-background-clip: text;
  color: #0e0e0e;
  background-repeat: no-repeat;
  transition: background 0.2s ease-out;
}

.disclaimer:hover {
  background-position: 0 11px;
}

.disclaimer {
  position: relative;
}

.disclaimer:before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  height: 5px;
  background:rgba(255, 0, 0, 0.54);
  bottom: 6px;
  transition: all 0.2s ease-out;
}

.disclaimer:hover:before {
  transform: translateY(6px)
}


.text { 
  color: #FF5151;
  text-decoration: none;
  display: inline;
  background-image: linear-gradient(to bottom, transparent 20%, currentColor 17%);
  background-position: 1 1;
  transition: background-size 0.5s ease-in-out 0.2s;
  background-repeat: no-repeat;
  background-size: 0% 6px;
}

  .text:hover,
  .text:focus {
    background-size: 100% 2px;
    transition-delay: 0s;
  }

</style>
<!-- # [WebShell](https://adilhyz.github.io/WebShell) -->

<a id="top"></a>

![hudaw](https://adilhyz.github.io/WebShell/screenshot.png)

Shell Backdoor, could be useful for the needs of

<span class="disclaimer"> Disclaimer </span>
 
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