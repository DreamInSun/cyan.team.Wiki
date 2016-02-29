# cyan.team.Wiki

基于DokuWiki的知识库管理系统，安装了常用插件，针对性优化。



========================================
## 安装插件
captcha
wrap
move
fastwiki
gallery
javadoc
move
message
oauth
opelayersmap
overlay
popularity
davcal
geophp

## 安装模板
Vector

========================================
## 默认账户
admin:admin


========================================
## 配置参数

LOAD_CONFIG 挂载配置到/Backup,设置该值可以在启动阶段载入配置

========================================
## 备份操作
将备份文件夹Mount在/backup下

在网站根目录输入 backup.php，则将配置备份到对应文件夹
在网站根目录输入 restore.php，则将配置备份恢复到运行目录


========================================
## 启动命令

### Demo运行
docker run -p 80:80 dreaminsun/dokuwiki

### 使用自定义配置

### 数据持久化
docker run --restart always \
  -v /var/www/html/data:/data/dokuwiki/data \
  -v /backup:/data/dokuwiki/backup \
  -p 80:80 
  dreaminsun/dokuwiki

========================================