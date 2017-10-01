<?php

namespace App\Http\Controllers;

use App\Design;
use App\Skill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{

    public function index(){
        return view('backend.home.index');
    }

}
