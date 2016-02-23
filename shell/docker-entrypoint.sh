#!/bin/sh

echo ========== Configuration ==========

if [ ! -d "$DOKUWIKI_ROOT/data/pages"]; then 
  echo Initialize data
  cp -rf $DOKUWIKI_ROOT/data_init/* $DOKUWIKI_ROOT/data
fi

chmod -R 777 $DOKUWIKI_ROOT/conf
chmod -R 777 $DOKUWIKI_ROOT/data
chmod -R 777 $DOKUWIKI_ROOT/lib/plugins
chmod -R 777 $DOKUWIKI_ROOT/lib/tpl

echo ========== Start Httpd ==========
apache2-foreground