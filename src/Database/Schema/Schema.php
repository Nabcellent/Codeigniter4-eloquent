<?php

namespace Nabz\Database\Schema;

use Illuminate\Database\Schema\Builder;
use Nabz\Models\DB;

class Schema extends Builder {
    /**
     * Create a new database Schema manager.
     *
     */
    public function __construct() {
        parent::__construct(DB::connection());

        $this->connection = DB::connection();
        $this->grammar = $this->connection->getSchemaGrammar();
    }
}
