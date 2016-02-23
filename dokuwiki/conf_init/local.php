<?php
/**
 * This is an example of how a local.php could look like.
 * Simply copy the options you want to change from dokuwiki.php
 * to this file and change them.
 *
 * When using the installer, a correct local.php file be generated for
 * you automatically.
 */

$conf['title'] = 'Cyan百科';              //wiki页面的标题，即页面右上方的标题。
$conf['useacl'] = 1;                     //启用ACL管理。0-不启用；1-启用。见下：

$conf['authtype'] = 'authplain';             //这里使用plain（简单）验证方式。
$conf['superuser'] = 'admin';            //超级用户（管理员）登录名。
