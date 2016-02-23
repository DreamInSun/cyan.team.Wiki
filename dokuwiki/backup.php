<?php

echo "<br/>/*========== 开始备份配置 ===========*/<br/>";
$project_path = normalizePath(dirname(__FILE__) . "/");
$backup_path = normalizePath(getenv("BACKUP_DIR"));
$plugin_path = normalizePath($project_path . "lib/plugins/");
$tpl_path = normalizePath($project_path . "lib/tpl/");

echo "<br/>/*========== 确定路径 ===========*/";
echo "<br/>工程文件夹路径" . $project_path;
echo "<br/>备份文件夹路径" . $backup_path;
echo "<br/>插件文件夹路径" . $plugin_path;
echo "<br/>模板文件夹路径" . $tpl_path;
echo "<br/><br/>/*========== 主配置列表 ===========*/";
$conf_array = array(/* */
    'conf/acl.auth.php' => 'conf/acl.auth.php', /* */
    'conf/local.php' => 'conf/local.php', /* */
    'conf/users.auth.php' => 'conf/users.auth.php' /* */);


foreach ($conf_array as $key => $value) {
    $src_path = normalizePath($project_path . $value);
    $dest_path = normalizePath($backup_path . $value);
    /*=====  =====*/
    mkFolder(dirname($dest_path));
    /*===== Copy Config File =====*/
    echo "<br/>复制配制文件[" . $src_path . "]到[" . $dest_path . "]";
    copy($src_path, $dest_path);
}


echo "<br/><br/>/*========== 插件配置 ===========*/";
$plugin_arr = listPlugins($plugin_path);
foreach ($plugin_arr as $plugin) {
    $src_path = normalizePath($plugin_path . $plugin . "/conf");
    $dest_path = normalizePath($backup_path . "lib/plugins/" . $plugin . "/conf/");
    if (is_dir($src_path)) {
        /*=====  =====*/
        mkFolder(dirname($dest_path));
        /*===== Copy Config File =====*/
        echo "<br/>复制配制文件[" . $src_path . "]到[" . $dest_path . "]";
        recurse_copy($src_path, $dest_path);
    }
}

echo "<br/><br/>/*========== 模板配置 ===========*/";
$tpl_arr = listPlugins($tpl_path);
foreach ($tpl_arr as $tpl) {
    $src_path = normalizePath($tpl_path . $tpl . "/conf");
    $dest_path = normalizePath($backup_path . "lib/tpl/" . $tpl . "/conf/");
    if (is_dir($src_path)) {
        /*=====  =====*/
        mkFolder(dirname($dest_path));
        /*===== Copy Config File =====*/
        echo "<br/>复制配制文件[" . $src_path . "]到[" . $dest_path . "]";
        recurse_copy($src_path, $dest_path);
    }
}

echo "<br/><br/>/*========== 备份完成 ===========*/";


/*========== Assistant Function ===========*/
function mkFolder($path) {
    if (!is_readable($path)) {
        is_file($path) or mkdir($path, 0700, true);
    }
}

function listPlugins($dir) {
    $plugins = array();
    $filesnames = scandir($dir);
    foreach ($filesnames as $file) {
        if ($file != "." && $file != "..") {
            $file_path = $dir . '/' . $file;
            if (is_dir($file_path)) {
                array_push($plugins, $file);
            }
        }
    }
    return $plugins;
}

function normalizePath($path) {
    return str_replace('\\', '/', $path);
}

function recurse_copy($src, $des) {
    $dir = opendir($src);
    @mkdir($des);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $des . '/' . $file);
            }
            else {
                copy($src . '/' . $file, $des . '/' . $file);
            }
        }
    }
    closedir($dir);
}