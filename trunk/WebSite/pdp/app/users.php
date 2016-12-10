<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model {
//model user rcupere la table users


    protected $table = 'users';

    static $cache = [];

    public static function allCached($forceRefresh = false)
    {
        if (!isset(self::$cache['all']) || $forceRefresh) {
            self::$cache['all'] = users::all();
        }

        return self::$cache['all'];
    }







}
