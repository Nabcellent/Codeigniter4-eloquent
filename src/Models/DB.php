<?php

namespace Nabz\Models;

use CodeIgniter\Config\Services;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Illuminate\Pagination\Paginator;
use Nabz\Pagination\ViewBridge;

class DB extends Manager {
    protected string $driver;

    public function __construct() {
        parent::__construct();

        $this->driver = match (config('Database')->default['DBDriver']) {
            'Postgre' => 'pgsql',
            'SQLite3' => 'sqlite',
            default => 'mysql',
        };

        $this->addConnection([
            'driver'    => $this->driver,
            'host'      => config('Database')->default['hostname'],
            'port'      => config('Database')->default['port'],
            'database'  => config('Database')->default['database'],
            'username'  => config('Database')->default['username'],
            'password'  => config('Database')->default['password'],
            'charset'   => config('Database')->default['charset'],
            'collation' => config('Database')->default['DBCollat'],
            'prefix'    => config('Database')->default['DBPrefix'],
            'strict'    => config('Database')->default['strictOn'],
            'schema'    => config('Database')->connect()->schema ?? 'public'
        ]);

        $this->setEventDispatcher(new Dispatcher(new Container));
        $this->setAsGlobal();
        $this->bootEloquent();

        Paginator::$defaultView = config('Eloquent')->defaultView;

        Paginator::$defaultSimpleView = config('Eloquent')->simpleDefaultView;

        Paginator::viewFactoryResolver(function() {
            return new ViewBridge();
        });

        Paginator::currentPathResolver(function() {
            return current_url();
        });

        Paginator::currentPageResolver(function($pageName = 'page') {
            $page = Services::request()->getVar($pageName);

            if(filter_var($page, FILTER_VALIDATE_INT) !== false && (int)$page >= 1) {
                return (int)$page;
            }

            return 1;
        });

        Paginator::queryStringResolver(function() {
            return Services::uri()->getQuery();
        });
    }
}
