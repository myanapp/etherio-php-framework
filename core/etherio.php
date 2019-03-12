<?php

class Etherio
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    { }

    /**
     * __set
     *
     * @param  mixed $name
     * @param  mixed $value
     *
     * @return void
     */
    public function __set($name, $value)
    {
        return $this->{$name} = $value;
    }

    /**
     * __get
     *
     * @param  mixed $name
     *
     * @return void
     */
    public function __get($name)
    {
        return $this->{$name};
    }
}