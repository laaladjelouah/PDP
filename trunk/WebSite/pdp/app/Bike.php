<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model {

    //model bike


    protected $table = 'Bike';

    static $cache = [];

    public static function allCached($forceRefresh = false)
    {
        if (!isset(self::$cache['all']) || $forceRefresh) {
            self::$cache['all'] = Bike::all();
        }

        //recuperer toute la table Bike dans $cache
        return self::$cache['all'];
    }




}
