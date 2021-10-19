<?php

namespace Nabz\Config;

use CodeIgniter\Config\BaseConfig;

class Eloquent extends BaseConfig
{
    public string $defaultView = '\Nabz\Views\default';

    public string $simpleDefaultView = '\Nabz\Views\simpleDefault';
}