<?php

use Core\Etherio\Etherio as App;

// required(APP_MODL_DIR, 'Route.php');

$app = new App();
$app->route = $app->router();
$app->view = $app->views();
$app->view->render();

print $app->response;

exit;