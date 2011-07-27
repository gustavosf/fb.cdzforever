<?php

if ($_SERVER['SERVER_NAME'] == 'fb.cdzforever.net') {
	define ('DEVELOPMENT_ENVIRONMENT', false);
} else {
	define ('DEVELOPMENT_ENVIRONMENT', true);
}

// database configuration (not tracked), includes
// DB_DRIVER (usually mysql), DB_HOST, DB_NAME, DB_USER and DB_PASSWORD
include "db.config.php";

// base configuration
define('BASE_URI','http://fb.cdzforever.net/');

define('LIB_DIR', dirname(dirname(__FILE__)).DS.'lib');
define('APL_DIR', dirname(dirname(__FILE__)).DS.'apl');
define('VIEW_DIR', dirname(dirname(__FILE__)).DS.'apl'.DS.'views');

define('APP_ID', '240133959342144');
define('APP_URL', 'http://apps.facebook.com/cdzforever');