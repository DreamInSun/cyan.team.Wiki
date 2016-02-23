#!/bin/sh

echo ========== Configuration ==========

if [ ! -d "$DOKUWIKI_ROOT/data/pages"]; then 
  cp -rf $DOKUWIKI_ROOT/data_init/* $DOKUWIKI_ROOT/data
fi

chmod -R 777 $DOKUWIKI_ROOT/conf
chmod -R 777 $DOKUWIKI_ROOT/data

echo ========== Start Httpd ==========
apache2-foreground