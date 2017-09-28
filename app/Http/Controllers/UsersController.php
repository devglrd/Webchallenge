<?php

namespace App\Http\Controllers;

use App\Design;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function getAll(){

        $userInfo = $this->getProfilInfo();

        $userDesign = $this->getDesign();

        $userSkill = $this->getSkill();

        //envoie a la vue
        return view('app.statics.users.index', compact('userDesign', 'userInfo', 'userSkill'));
    }

    public function getProfilInfo(){

        $idCurreent = Auth::id();

        $currentUser = User::all()->where('id', $idCurreent);

        return $currentUser;

    }

    public function getDesign(){

        $idCurrent = Auth::id();

        $currentDesign = Design::all()->where('id_designer', $idCurrent);

        return $currentDesign;

    }

    public function getSkill(){

        $idCurrent = Auth::id();

        //je recupere les id des skills qui correspond a l'utilisateur
        $skillIdCurrent = DB::table('users_has_skills')->where('id_user', $idCurrent)->get();

        return $skillIdCurrent;
    }





}
