<?php
function __autoload($class)
{
require_once '../../domain/' . $class . '.php';
}