<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BikeLock extends Model {

    //model Bikelock


    protected $table = 'BikeLock';
    static $cache = [];

    public static function allCached($forceRefresh = false) {
        if (!isset(self::$cache['all']) || $forceRefresh) {
            self::$cache['all'] = BikeLock::all();
        }

        return self::$cache['all'];
    }

}
