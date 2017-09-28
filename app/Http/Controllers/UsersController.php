<?php

namespace App\Http\Controllers;

use App\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function getDesign(){

        //On doit recuperer les designs des users

        //id current
        $idCurrent = Auth::id();

        //design de l'id current

        $currentDesigner = Design::all()->where('id_designer', $idCurrent);

        //envoie a la vue
        return view('app.statics.users.index', compact('currentDesigner'));
    }





}
