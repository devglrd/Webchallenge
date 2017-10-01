<?php

namespace App\Http\Controllers;

use App\Design;
use App\Skill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //voir le profil de l'utilsateur connecté
    public function getAll(){

        $title = 'Votre compte';

        $idCurrent = Auth::id();

        $id = $idCurrent;

        $userInfo = $this->getProfilInfo($id);

        $userDesigns = $this->getDesigns($id);

        $userSkills = $this->getSkills($id);

        $userPost = $this->getPost($id);

        //envoie a la vue

        return view('app.statics.users.index', compact('userInfo', 'userDesigns', 'userSkills' , 'userPost', 'title'));
    }

    //voir un profil specifique
    public function show($name){

        $user = User::where('name', $name)->first();

        $id = $user->id;

        $userDesigns = $this->getDesigns($id);

        $userSkills = $this->getSkills($id);

        $userPost = $this->getPost($id);

        return view( 'app.statics.users.show', compact('user', 'userDesigns', 'userSkills', 'userPost'));
    }

    public function getProfilInfo($id){


        $currentUser = User::all()->where('id', $id);

        return $currentUser;

    }

    public function getDesigns($id){


        $currentDesign = User::where('id', $id)->with('designs')->first();

        return $currentDesign->designs;

    }

    public function getSkills($id){

        $user = User::where('id', $id)->with('skills')->first();

        return $user->skills;
    }

    public function getPost($id){

        $user = User::where('id', $id)->with('posts')->first();

        return $user->posts;
    }

    public function edit($id){

        $this->middleware('auth');

        // je veux tout les competences qui ne sont pas a l'utilisateur
        $allSkill = Skill::all();

        //les skills qu'il a
        $userSkill = $this->getSkills($id);

        $userCurrent = User::where('id', $id)->first();


        // Si $userSkill->id === $skillWithoutUserSkill->id{remove from tableau}
        // trouve moi les skills que l'user a et ne les prends pas

        return view('app.statics.users.edit', compact('userCurrent', 'allSkill', 'userSkill'));
    }

    public function update(Request $request, $id){


        $inte = 0;
        $designer = 0;

        if (isset($request->designer)){
            if ($request->designer === 'on') {
                $designer = 1;
            }
        }

        if (isset($request->developpeur)){
            if ($request->developpeur === 'on') {
                $inte = 1;
            }
        }
        $count = count($request['skills']);

        $count = $count-1;

        $user = Auth::id();


        for ($i = 0;$i <= $count; $i++){
            DB::table('users_has_skills')->insert([
                'id_user' => $user,
                'id_skill' => $request['skills'][$i],
            ]);
        }

        DB::table('users')->where('id', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "bio" => $request->bio,
            "statut" => $request['state'][0],
            "is_designer" => $designer,
            "is_integrator" => $inte
        ]);


        return redirect()->route('account');


    }

}
