<?php

namespace Nabz\Database\Schema;

use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder;

class CI4Builder extends Builder {
    /**
     * Create a new database Schema manager.
     *
     */
    public function __construct(Connection $connection) {
        parent::__construct($connection);
    }
}
