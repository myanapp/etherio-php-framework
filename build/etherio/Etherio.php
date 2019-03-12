<?php

namespace Core\Etherio;

class Etherio
{
    public function router()
    {
        return new \Core\Etherio\Components\Router();
    }

    public function views()
    {
        return new \App\Models\Views($this);
    }
}
