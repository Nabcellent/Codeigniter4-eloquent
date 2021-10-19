<?php

namespace Nabz\Support\Facades;

use Illuminate\Support\Facades\Facade;
use Nabz\Database\Schema\CI4Builder;
use Nabz\Models\DB;

/**
 * @method static CI4Builder create(string $table, \Closure $callback)
 * @method static CI4Builder createDatabase(string $name)
 * @method static CI4Builder disableForeignKeyConstraints()
 * @method static CI4Builder drop(string $table)
 * @method static CI4Builder dropDatabaseIfExists(string $name)
 * @method static CI4Builder dropIfExists(string $table)
 * @method static CI4Builder enableForeignKeyConstraints()
 * @method static CI4Builder rename(string $from, string $to)
 * @method static CI4Builder table(string $table, \Closure $callback)
 * @method static bool hasColumn(string $table, string $column)
 * @method static bool hasColumns(string $table, array $columns)
 * @method static bool dropColumns(string $table, array $columns)
 * @method static bool hasTable(string $table)
 * @method static void defaultStringLength(int $length)
 * @method static void registerCustomDoctrineType(string $class, string $name, string $type)
 * @method static array getColumnListing(string $table)
 *
 * @see \Nabz\Database\Schema\CI4Builder
 */
class Schema extends Facade {
    /**
     * Get a schema builder instance for a connection.
     *
     * @return CI4Builder
     */
    public static function connection(): CI4Builder {
        return new CI4Builder(DB::connection());
    }

    /**
     * Get a schema builder instance for the default connection.
     *
     * @return CI4Builder
     */
    protected static function getFacadeAccessor(): CI4Builder {
        return new CI4Builder(DB::connection());
    }
}
