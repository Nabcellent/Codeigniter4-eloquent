<?php

namespace Nabz\Config;

use CodeIgniter\Config\BaseConfig;

class Eloquent extends BaseConfig
{
    public $defaultView = '\Nabz\Views\default';
    public $bootstrap4View = '\Nabz\Views\bootstrap4';
    public $simpleDefaultView = '\Nabz\Views\simpleDefault';
}