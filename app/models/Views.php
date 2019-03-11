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
                return print('{"status": 404, "response": "page not found"}');
            }

            if (is_callable($this->app->route->response)) {
                $this->app->response = json_encode(call_user_func($this->app->route->response));
            }
        }else{
            header('Content-Type: text/html; charset=UTF-8');
            
            if (!$this->app->route->response) {
                http_response_code(404);
                return print('<h2>page not found</h2>');
            }

            if (is_callable($this->app->route->response)) {
                $this->app->response = call_user_func($this->app->router->response);
            }
        }  
    }
}