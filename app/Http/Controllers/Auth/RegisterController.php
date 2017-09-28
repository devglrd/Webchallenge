<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'bio' => 'string',
            'state' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        //ils faut savoir si on a coché developpeur

        $idCurrent = Auth::id();

        $inte = 0;
        $designer = 0;

        if (isset($data['designer'])){
            if ($data['designer'] === 'on') {
                $designer = 1;
            }
        }

        if (isset($data['developpeur'])){
            if ($data['developpeur'] === 'on') {
                $inte = 1;
            }
        }

        $count = count($data['skills']);

        $count = $count-1;

        //donc si jsuis pas completement con la ce que ça fait ça compte le nombre de skill
        // que le gars veut ce mettre et ça
        //donc
        /*foreach ($count as $skill){
            DB::table('users_has_skills')->insert([
               'id_user' => $idCurrent,
                'id_skill' => $data['skills'][$skill]
            ]);
        }*/

        $lastUser = User::all()->count();

        $lastUser = $lastUser+1;

        for ($i = 0;$i <= $count; $i++){
            DB::table('users_has_skills')->insert([
                'id_user' => $lastUser,
                'id_skill' => $data['skills'][$i],
            ]);
        }

        // j'ai un autre probleme => en gros la la variable

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'bio' => $data['bio'],
            'statut' => $data['state'][0],
            'is_designer' => $designer,
            'is_integrator' => $inte,
        ]);


    }
}
