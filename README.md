---
layout: default
title: WebShell
---

# [WebShell](https://adilhyz.github.io/WebShell)

![hudaw](https://adilhyz.github.io/WebShell/screenshot.png)

Shell Backdoor, could be useful for the needs of

This is just for `learning` purpose only, I am not responsible if there is any mess

Author: [Adilhyz](https://adilhyz.github.io)

## **Category ⛱**

&ensp;[<kbd> <br> Safety Backd00r <br> </kbd>](#safety-backd00r)&ensp;
&ensp;[<kbd> <br> File Manager <br> </kbd>](#file-manager)&ensp;
&ensp;[<kbd> <br>Mini Backd00r <br> </kbd>](#mini-backd00r)&ensp;
&ensp;[<kbd> <br> Fully Backd00r <br> </kbd>](#fully-backd00r)&ensp;
&ensp;[<kbd> <br> Bypass Backd00r <br> </kbd>](#bypass-backd00r)&ensp;

<br><br><br>

## Safety Backd00r

<style>
  .shell-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
  }

  .shell-card {
    background: #111;
    border: 1px solid #0f0;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 255, 0, 0.2);
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
</style>

<div class="shell-container">
  {% for shell in site.data.shells %}
  <div class="shell-card">
    <img src="{{ shell.image }}" alt="{{ shell.name }}">
    <h2>{{ shell.name }}</h2>
    <div class="info">
      <p>{{ shell.size }}</p>
      <p>Password: {{ shell.password }}</p>
      <p>Version: {{ shell.version }}</p>
    </div>
    <a href="{{ shell.download }}">Download</a>
    <a href="{{ shell.raw }}">Raw &gt;</a>
  </div>
  {% endfor %}
</div>
