<?php

namespace Core\Etherio\Components;

use \Core\Etherio\Components\Route;

class Router {
    public function __construct() {
        // assigning to GLOBAL callable variables for REQUESTED URI and METHOD
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = urldecode(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );

        // NORMAL Routing...
        if ($this->method==='GET') {
            $require = 'routes/gets.php';
        } elseif ($this->method==='POST') {
            $require = 'routes/posts.php';
        }
        
        $this->api = '/api' === substr($this->uri, 0, 4);
        // API Routing...
        if ($this->api) {
            $this->uri = str_replace('/api', '', $this->uri);
            $this->uri = empty($this->uri) ? '/' : $this->uri;
            $require = 'routes/apis.php';
        }

        /*s adding respective Routes/... file to navigate relative page. */
        require_once __ROOT__ . '/' . $require;
        $this->routes = \Route::$routes;
        $this->response = $this->routes[$this->method][$this->uri] ?? false;
    }
}