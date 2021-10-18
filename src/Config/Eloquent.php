<?php

namespace Fluent\Config;

use CodeIgniter\Config\BaseConfig;

class Eloquent extends BaseConfig
{
    public string $defaultView = '\Fluent\Views\default';

    public string $simpleDefaultView = '\Fluent\Views\simpleDefault';
}