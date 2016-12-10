<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class ProfileModel extends Model {

    public static $hashed_password = 'null';

    public static function store(Array $request, $id) {

        // Variable to know if information changed
        $modified = false;
        $user = User::find($id);

        if (strcmp($user->lastname, $request['lastname']) !== 0) {
            $user->lastname = $request['lastname'];
            $modified = true;
        }
        if (strcmp($user->firstname, $request['firstname']) !== 0) {
            $user->firstname = $request['firstname'];
            $modified = true;
        }
        if (strcmp($user->birthdate, $request['birthdate']) !== 0) {
            $user->birthdate = $request['birthdate'];
            $modified = true;
        }
        if (strcmp($user->email, $request['email']) !== 0) {
            $user->email = $request['email'];
            $modified = true;
        }
        if (strcmp($user->password, $request['password']) !== 0) {
            /* use the keyword self instead of the keyword $this because during
             * tests, we can't use $this when we are not in object context
             */
            self::$hashed_password = Hash::make($request['password']);
            // Store the hashed password
            $user->password = self::$hashed_password;
            $modified = true;
        }
        if (strcmp($user->phoneNumber, $request['phoneNumber']) !== 0) {
            $user->phoneNumber = $request['phoneNumber'];
            $modified = true;
        }
        $user->save();
        return $modified;
    }

    public static function getHashedPassword() {
        return self::$hashed_password;
    }

}
