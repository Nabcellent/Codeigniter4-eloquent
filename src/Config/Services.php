<?php

namespace Nabz\Config;

use CodeIgniter\Config\BaseService as CoreServices;
use Nabz\Models\DB;

class Services extends CoreServices {
    public static function eloquent($getShared = true) {
        if($getShared) {
            return static::getSharedInstance('eloquent');
        }

        return new DB();
    }
}