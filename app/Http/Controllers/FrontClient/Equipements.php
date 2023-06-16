<?php

namespace App\Http\Controllers\FrontClient;

// use App\Models\Images;
// use App\Models\Article;
use App\Models\Equipement;
// use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Equipements extends Controller
{
    public function equipement(){
        $equipements = Equipement::all(); 
        return view('frontClient.equipement',['equipements'=>$equipements]);
    }


    public function dashindex(){


        // dd("hhhhhhhhhhhhhhhhhhhh");
        // $equipements = Equipement::orderBy('id','DESC')->get();


          return view('frontClient.equipements');
      }




    public function article($id)
    {
        $equipement = Equipement::find($id);
        if ($equipement) {
            $articles = $equipement->articles()->with('images')->get();
            return view('frontClient.article', compact('articles', 'equipement'));
        } else {
            return redirect()->back();
        }
    }
  
}
