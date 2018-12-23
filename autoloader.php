<?php
spl_autoload_register("load_class");

function load_class($class_name)
{
    require_once 'php/class/'.$class_name.'.php';
}
