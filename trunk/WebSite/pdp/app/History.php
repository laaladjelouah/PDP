<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    //model History


    protected $tebl1='users';
    protected $table = 'History';



    static $cache = [];


    public static function allCached($forceRefresh = false)
    {
        if (!isset(self::$cache['all']) || $forceRefresh) {



            $user_history = DB::table('users')
                ->join('History', 'user_id', '=', 'users.user.id')
                ->select('History.*', 'users.lastname', 'users.firstname')
                ->get();





            self::$cache['all'] = user_history;


        }




    }
}

