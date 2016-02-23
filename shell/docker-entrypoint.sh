#!/bin/sh

echo ========== Configuration ==========
#php config.php

export DOKUWIKI_ROOT=$APACHE_DOC

chmod -R 777 $DOKUWIKI_ROOT/conf
chmod -R 777 $DOKUWIKI_ROOT/data

echo ========== Start Httpd ==========
apache2-foreground