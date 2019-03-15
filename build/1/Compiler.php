<?php
namespace Build\Core\Drivers;

class Compiler
{
    function __construct($compiler_name, $compiler_type, $compiler_version, $compiler_extension)
    {
        $this->name = $compiler_name;
        $this->type = $compiler_type;
        $this->version = $compiler_version;
        $this->extension = $compiler_extension;
    }
}