<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\CreditCardModel;
use Validator;
use \Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request as Request;

class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers,
    ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /* public function authenticated(Request $request, User $user) {

      if ($user->subscriber == 'false') {
      return redirect()->intended($this->redirectPath());
      } else {
      // Raise exception, or redirect with error saying account is not active
      return ("not allowed to connect");
      }
      } */

    public function getCredentials(Request $request) {
        $credentials = $request->only($this->loginUsername(), 'password');
        $credentials['subscriber'] = 'true';
        $credentials['blacklisted'] = 'false';
        return $credentials;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        //dd($data);
        return Validator::make($data, [
                    'lastname' => 'required|alpha|max:30',
                    'email' => 'required|email|max:50|unique:users',
                    'firstname' => 'required|alpha|max:30',
                    'birthdate' => 'required|date',
                    'password' => 'required|confirmed|min:6|max:30',
                    'phoneNumber' => 'required|digits:10',
                    'credit_card_number' => 'required|digits:16',
                    'card_owner' => 'required|alpha|max:30',
                    'expiration_date' => 'required|date|after:today',
                    'cvv_code' => 'required|digits:3',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {

        $data = array_add($data, 'credit', '30.0');
        $data = array_add($data, 'blacklisted', 'false');
        $data = array_add($data, 'subscriber', 'true');

        //Create the new user
        $new_user = User::create([
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'firstname' => $data['firstname'],
                    'birthdate' => $data['birthdate'],
                    'password' => bcrypt($data['password']),
                    'credit' => $data['credit'],
                    'phoneNumber' => $data['phoneNumber'],
                    'blacklisted' => $data['blacklisted'],
                    'subscriber' => $data['subscriber'],
        ]);

        $user_attributes = $new_user->attributesToArray();

        // Create the user's credit card
        $credit_card = CreditCardModel::create([
                    'user_id' => $user_attributes['id'],
                    'expiration_date' => $data['expiration_date'],
                    'card_owner' => $data['card_owner'],
                    'credit_card_number' => $data['credit_card_number'],
                    'cvv_code' => $data['cvv_code'],
        ]);

        return $new_user;
    }

}
