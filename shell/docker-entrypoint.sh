#!/bin/sh

echo ========== Configuration ==========
#php config.php

export DOKUWIKI_ROOT=$APACHE_DOC

if [ ! -d "$DOKUWIKI_ROOT/data/pages"]; then 
  cp -rf $DOKUWIKI_ROOT/data_init/* $WIKI_DATA
fi

chmod -R 777 $DOKUWIKI_ROOT/conf
chmod -R 777 $DOKUWIKI_ROOT/data

echo ========== Start Httpd ==========
apache2-foreground