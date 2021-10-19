<?php

namespace Nabz\Support\Facades;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Facade;
use Nabz\Models\DB;

/**
 * @method static Builder create(string $table, \Closure $callback)
 * @method static Builder createDatabase(string $name)
 * @method static Builder disableForeignKeyConstraints()
 * @method static Builder drop(string $table)
 * @method static Builder dropDatabaseIfExists(string $name)
 * @method static Builder dropIfExists(string $table)
 * @method static Builder enableForeignKeyConstraints()
 * @method static Builder rename(string $from, string $to)
 * @method static Builder table(string $table, \Closure $callback)
 * @method static bool hasColumn(string $table, string $column)
 * @method static bool hasColumns(string $table, array $columns)
 * @method static bool dropColumns(string $table, array $columns)
 * @method static bool hasTable(string $table)
 * @method static void defaultStringLength(int $length)
 * @method static void registerCustomDoctrineType(string $class, string $name, string $type)
 * @method static array getColumnListing(string $table)
 *
 * @see \Illuminate\Database\Schema\Builder
 */
class Schema extends Facade {
    /**
     * Get a schema builder instance for a connection.
     *
     * @return Builder
     */
    public static function connection(): Builder {
        return new Builder(DB::connection());
    }

    /**
     * Get a schema builder instance for the default connection.
     *
     * @return Builder
     */
    protected static function getFacadeAccessor(): Builder {
        return new Builder(DB::connection());
    }
}
