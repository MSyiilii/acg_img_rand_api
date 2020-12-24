# 随机二次元图片API

## 介绍

- 若在二次元壁纸API，是一个外链形式的壁纸服务，通过一个 URL 随机输出图片！
- 随机提供动漫二次元风格壁纸。
- 会在项目根目录下新建一个IMG_APIlog文件夹用以存储调用日志
- 白名单功能
- 调用测试：[ruozai.top/images.php](https://www.ruozai.top/images.php)

## 调用

- 需要申请调用。申请地址：[https://www.ruozai.top/index.php/archives/89/](https://www.ruozai.top/index.php/archives/89/)
- 把地址https://www.ruozai.top/images.php 复制到你需要展示图片的地方，相当于图片的文件地址。
- 如果在同一页面多次调用请在地址后加上?rand

## 部署

1. 克隆项目到本地
2. 将除网络图库外所有文件复制到你的网站根目录下
3. 自建图库或者使用网络图库，根据图库访问规则重写images.php 文件中的getImg()方法，最终将图片url赋值。
4. 在images.php中的$domain_list中添加白名单
5. 访问:你的域名/images.php

## 附个人从网络上收集的一些图库
