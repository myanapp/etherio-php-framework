<?php

namespace Core\Etherio;

class Etherio {
    
    public function router() {
        return new \Core\Etherio\Components\Router($this);
    }

    public function views() {
        return new \App\Models\Views($this);
    }
}