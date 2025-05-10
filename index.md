---
layout: default
title: WebShell
---

<!-- # [WebShell](https://adilhyz.github.io/WebShell) -->

![hudaw](https://adilhyz.github.io/WebShell/screenshot.png)

Shell Backdoor, could be useful for the needs of

This is just for `learning` purpose only, I am not responsible if there is any mess

Author: [Adilhyz](https://adilhyz.github.io)

## **Category ⛱**

[ Safety Backd00r ](#safety-backd00r)&ensp;
[ File Manager ](#file-manager)&ensp;
[ Mini Backd00r ](#mini-backd00r)&ensp;
[ Fully Backd00r ](#fully-backd00r)&ensp;
[ Bypass Backd00r ](#bypass-backd00r)&ensp;

<style>
  .shell-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    padding: 1rem;
  }

  .shell-card {
    background-color: #1e1e1e;
    border: 1px solid #55aa4e;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(181, 232, 83, 0.2);
    overflow: hidden;
    display: flex;
    flex-direction: column;
  }

  .shell-card:hover,
  .shell-card:active {
    background-color:rgba(30, 30, 30, 0.67);
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(204, 204, 204, 0.5);
  }

  .shell-card img {
    width: 100%;
    height: auto;
    object-fit: cover; /* Atau contain tergantung kebutuhan */
    cursor: -webkit-zoom-in; 
    cursor: zoom-in;
  }

  .shell-card h2 {
    margin: 10px;
    color: #55aa4e;
  }

  .shell-card .info {
    padding: 0 100px 10px 10px;
    font-size: 14px;
    color: #ccc;
  }

  .shell-card .info .size {
    font-size: 14px;
    font-weight: bold;
    color: #636c72 ;
  }

  .shell-card a {
    margin: 0 10px 10px 10px;
    color: #55aa4e;
    text-decoration: none;
  }

.shell-card a:hover,
.shell-card a:active {
  color: #ccc;
  text-decoration: underline;
}

@media (max-width: 480px) {
  .shell-container {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .shell-container {
    grid-template-columns: 1fr;
  }
}

</style>


{% assign grouped_shells = site.data.shells | group_by: "category" %}
{% for group in grouped_shells %}
  <h2 id="{{ group.name | slugify }}">{{ group.name }}</h2>
  <div class="shell-container">
    {% for shell in group.items %}
      <div class="shell-card">
        <h2>{{ shell.name }}</h2>
        <a href="{{ shell.image }}"><img src="{{ shell.image }}" alt="{{ shell.name }}"></a>
        <div class="info">
          <p class="size">Size: {{ shell.size }}</p>
          <p>Version: {{ shell.version }}</p>
        {% if shell.name == "Alfa v3 Shell" %}
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