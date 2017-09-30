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

    public function getAll(){

        $userInfo = $this->getProfilInfo();

        $userDesigns = $this->getDesigns();

        $userSkills = $this->getSkills();

        $userPost = $this->getPost();

        //envoie a la vue


        return view('app.statics.users.index', compact('userInfo', 'userDesigns', 'userSkills' , 'userPost'));
    }

    public function getProfilInfo(){

        $idCurreent = Auth::id();

        $currentUser = User::all()->where('id', $idCurreent);

        return $currentUser;

    }

    public function getDesigns(){

        $idCurrent = Auth::id();

        $currentDesign = Design::all()->where('id_designer', $idCurrent);

        return $currentDesign;

    }

    public function getSkills(){
        $idCurrent = Auth::id();

        $user = User::where('id', $idCurrent)->with('skills')->first();

        return $user->skills;
    }

    public function getPost(){
        $idCurrent = Auth::id();

        $user = User::where('id', $idCurrent)->with('posts')->first();

        return $user->posts;
    }


    public function edit($id){

        $this->middleware('auth');

        $idcurrent = Auth::id();

        // je veux tout les competences qui ne sont pas a l'utilisateur
        $allSkill = Skill::all();

        //les skills qu'il a
        $userSkill = $this->getSkills();

        $userCurrent = User::where('id', $idcurrent)->first();


        // Si $userSkill->id === $skillWithoutUserSkill->id{remove from tableau}
        // trouve moi les skills que l'user a et ne les prends pas

        return view('app.statics.users.edit', compact('userCurrent', 'allSkill', 'userSkill'));
    }

    public function update(Request $request, $id){


        $inte = 0;
        $designer = 0;

        if (isset($data['designer'])){
            if ($request['designer'] === 'on') {
                $designer = 1;
            }
        }

        if (isset($data['developpeur'])){
            if ($request['developpeur'] === 'on') {
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
