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

// app configuration (not tracked), includes
// APP_ID, APP_SECRET and APP_URL (which is apps.facebook.com/cdzforever ;D)
include "app.config.php";