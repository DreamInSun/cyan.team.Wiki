#!/bin/sh

echo ========== Configuration ==========

if [ ! -d "$DOKUWIKI_ROOT/data/pages"]; then 
  cp -rf $DOKUWIKI_ROOT/data_init/* $DOKUWIKI_ROOT/data
fi

if [ ! -d "/backup/conf"]; then 
  mkdir -p /backup/conf/
  cp -rf $DOKUWIKI_ROOT/conf_init/* /backup/conf/
fi

chmod -R 777 $DOKUWIKI_ROOT/conf
chmod -R 777 $DOKUWIKI_ROOT/data
chmod -R 777 $DOKUWIKI_ROOT/lib/plugins
chmod -R 777 $DOKUWIKI_ROOT/lib/tpl

echo ========== Start Httpd ==========
apache2-foreground