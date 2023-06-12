<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evenement;

class EvenementController extends Controller
{
    public function index(){
        $evenements  = Evenement::with('salle','typeEvent')->orderBy('id','DESC')->get();
        return view("admin.evenement.index",['evenements'=>$evenements]);
    }
}
