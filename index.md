---
layout: default
#title: WebShell
---

# [WebShell](https://adilhyz.github.io/WebShell)

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

<br><br><br>

## Safety Backd00r

<style>
  .shell-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    gap: 20px;
    padding: 20px;
  }

  .shell-card {
    background: #111;
    border: 1px solid #0f0;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(181, 232, 83, 0.2);
    overflow: hidden;
    display: flex;
    flex-direction: column;
  }

  .shell-card img {
    width: 100%;
    height: auto;
  }

  .shell-card h2 {
    margin: 10px;
    color: #0f0;
  }

  .shell-card .info {
    padding: 0 10px 10px 10px;
    font-size: 14px;
    color: #ccc;
  }

  .shell-card a {
    margin: 0 10px 10px 10px;
    color: #0f0;
    text-decoration: none;
  }

    .shell-card a:active a::hover {
    margin: 0 10px 10px 10px;
    color: #fff;
    text-decoration: none;
  }
</style>

<div class="shell-container">
  {% for shell in site.data.shells %}
  <div class="shell-card">
    <img src="{{ shell.image }}" alt="{{ shell.name }}">
    <h2>{{ shell.name }}</h2>
    <div class="info">
      <p>Size: {{ shell.size }}</p>
      <p>Version: {{ shell.version }}</p>
      <p>User/Password: {{ shell.password }}</p>
    </div>
    <a href="{{ shell.download }}">Download</a>
    <a href="{{ shell.raw }}">Raw &gt;</a>
  </div>
  {% endfor %}
</div>
