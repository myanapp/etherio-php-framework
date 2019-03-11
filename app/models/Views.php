<?php

namespace App\Models;

class Views {
    function __construct($app) {
       $this->app = $app;
    }

    function render() {
        if ($this->app->route->api) {
            header('Content-Type: application/json; charset=UTF-8');
            
            if (!$this->app->route->response) {
                http_response_code(404);
                print('{"status": 404, "response": "page not found"}');
                exit;
            }

            if (is_callable($this->app->route->response)) {
                $this->app->response = json_encode(call_user_func($this->app->route->response));
            }
        }else{
            header('Content-Type: text/html; charset=UTF-8');
            
            if (!$this->app->route->response) {
                http_response_code(404);
                required(APP_VIEW_DIR, 'docs', '404.html');
                exit;
            }

            if (is_callable($this->app->route->response)) {
                $this->app->response = call_user_func($this->app->router->response);
            }
        }  
    }
}