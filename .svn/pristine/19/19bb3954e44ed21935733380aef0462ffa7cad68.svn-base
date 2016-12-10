<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\ProfileModel as ProfileModel;
use App\Http\Controllers\Controller;

class ProfileController extends Controller {

    private $profile_model = null;

    public function __construct() {
        $this->profile_model = new ProfileModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('profile.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('profile.modifyProfile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find(intval($id));
        if ($user != null) {
            //Verify that the field email is unique in users table
            if (strcmp($user->email, $request->email) !== 0) {
                $this->validate($request,
                        ['email' => 'required|email|max:50|unique:users',]);
            }
            $this->validate($request,
                    [
                'lastname' => 'required|alpha|max:30',
                'firstname' => 'required|alpha|max:30',
                'birthdate' => 'required|date',
                'password' => 'required|confirmed|min:6|max:30',
                'phoneNumber' => 'required|digits:10',
            ]);
            $data = $request->except('_token');
            $modified = $this->profile_model->store($data, intval($id));
            if ($modified) {
                return redirect('profile')->with('status',
                                'Votre profil a bien été mis à jour.');
            }
            return redirect('profile')->with('status_not_modified',
                            "Aucune information n'a été modifiée.");
        }
        return 'Utilisateur non trouvé';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
