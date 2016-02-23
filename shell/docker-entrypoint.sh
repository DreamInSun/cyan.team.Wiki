#!/bin/sh

echo ========== Configuration ==========
#php config.php

export DOKUWIKI_ROOT=$APACHE_DOC

mkdir -p $DOKUWIKI_ROOT/data/pages
mkdir -p $DOKUWIKI_ROOT/data/attic 
mkdir -p $DOKUWIKI_ROOT/data/media 
mkdir -p $DOKUWIKI_ROOT/data/media_attic 
mkdir -p $DOKUWIKI_ROOT/data/media_meta 
mkdir -p $DOKUWIKI_ROOT/data/meta 
mkdir -p $DOKUWIKI_ROOT/data/cache
mkdir -p $DOKUWIKI_ROOT/data/locks 
mkdir -p $DOKUWIKI_ROOT/data/index 
mkdir -p $DOKUWIKI_ROOT/data/tmp 

chmod -R 777 $DOKUWIKI_ROOT/conf
chmod -R 777 $DOKUWIKI_ROOT/data

echo ========== Start Httpd ==========
apache2-foreground