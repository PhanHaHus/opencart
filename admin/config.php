<?php
// HTTP
define('HTTP_SERVER',  $_SERVER['HTTP_HOST']);

// HTTPS
define('HTTPS_SERVER',  $_SERVER['HTTP_HOST']);
define('DIR_FOLDER', $_SERVER['DOCUMENT_ROOT']);
define('HTTP_CATALOG',  $_SERVER['HTTP_HOST']);
// HTTPS
define('HTTPS_SERVER',  $_SERVER['HTTP_HOST'].'/admin/');

// DIR
define('DIR_APPLICATION', DIR_FOLDER.'/admin/');
define('DIR_SYSTEM', DIR_FOLDER.'/system/');
define('DIR_LANGUAGE', DIR_FOLDER.'/admin/language/');
define('DIR_TEMPLATE', DIR_FOLDER.'/admin/view/template/');
define('DIR_CONFIG', DIR_FOLDER.'/system/config/');
define('DIR_IMAGE', DIR_FOLDER.'/image/');
define('DIR_CACHE', DIR_FOLDER.'/system/storage/cache/');
define('DIR_DOWNLOAD', DIR_FOLDER.'/system/storage/download/');
define('DIR_LOGS', DIR_FOLDER.'/system/storage/logs/');
define('DIR_MODIFICATION', DIR_FOLDER.'/system/storage/modification/');
define('DIR_UPLOAD', DIR_FOLDER.'/system/storage/upload/');
define('DIR_CATALOG', DIR_FOLDER.'/catalog/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'thungloa');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');
