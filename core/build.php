<?php

define('ER_ENV', $env);
define('ER_SOURCE', $env[DIR][SRC]);
define('ER_VIEW_DIR', $env[DIR][VIEW]);

require_once __DIR__ . '/global/super.variable.php';
require_once __DIR__ . '/includes/default.router.php';