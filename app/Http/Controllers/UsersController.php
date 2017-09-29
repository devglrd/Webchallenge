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



}
