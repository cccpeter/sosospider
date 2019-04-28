# 分布式搜索引擎

------

### 技术：

> * 爬虫Springboot+jsoup+redis+elasticsearch
> * 数据交互Rest
> * 前端Ajax+jQuery
> * 后端Php7.0+MySQL+redis做网站的前后台API
> * shell+docker做部署和守护进程

------

### 运行方式
> * 将爬虫配置redis主服务器地址和es数据库的地址然后打包
> * 将php-api部署在web服务器中用lnmp+redis，需要再config.php中配置redis地址和mysql地址
> * 将soso和sosospider-web部署在nginx目录下即可，要配置cookie.js中的server地址（为php-api部署的地址）
> * 注需要springboot中需要配置es和redis的地址
-----
### 使用方式
> * 进入http://xxxx/soso/index.html
进入搜索网站
> * 进入http://xxxx/sosospider-web/userlogin.html
登录站长用户123密码124新增一个网站（自行注册http://xxxx/sosospider-web/register.html）
> * 进入http://xxxx/sosospider-web/login.html
登录管理员用户123密码123进入系统后台（或者自行数据添加user表的数据）
> * 添加一个部署好的爬虫
> * 添加爬虫任务
> * 启动爬虫
