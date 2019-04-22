# 分布式搜索引擎

------

### 技术：

> * 爬虫Springboot+jsoup+redis+elasticsearch
> * 数据交互Rest
> * 前端Ajax+jQuery
> * 后端Php7.0+MySQL+redis做网站的前后台API
> * shell+docker做一键部署和守护进程

------

### 运行方式
> * 将爬虫配置redis主服务器地址和es数据库的地址然后打包
> * 将php-api部署在web服务器中用lnmp+redis，需要再config.php中配置redis地址和mysql地址
> * 将soso和sosospider-web部署在nginx目录下即可，要配置cookie.js中的server地址（为php-api部署的地址）

-----
### 使用方式
> * 进入http://119.29.189.104:81/sosospider-web/userlogin.html
登录用户123密码124新增一个网站
> * 进入http://119.29.189.104:81/sosospider-web/login.html
登录用户123密码123进入系统后台
> * 添加一个部署好的爬虫
> * 添加爬虫任务
> * 启动爬虫
