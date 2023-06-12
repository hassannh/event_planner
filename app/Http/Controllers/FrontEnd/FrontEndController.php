<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipement;
use App\Models\Personnel;
use App\Models\Salle;
use App\Models\Service;
use App\Http\Controllers\Admin\EquipementController;

class FrontEndController extends Controller
{
    public function index(){
      $equipements = Equipement::all();
      return view('frontend.index',['equipements'=>$equipements]);
    }

    public function indexPersonnel(){
        $personnels = Personnel::all();
       return view('frontend.indexPersonnel',['personnels'=>$personnels]);
    }

    public function indexservice(){
        $Services = Service::all();
        return view('frontend.indexservice',['Services'=>$Services]);
    }

    public function indexSalle(){
      // dd("hhhhhhhhhhhhhhhhhh");
      $salles = Salle::with('salleimages')->get();
      return view('frontend.indexSalle', ['salles' => $salles]);
    }
    
    public function realisation(){
      return view('frontend.realisation');
    }

    public function contact(){
      return view('frontend.contact');
     }
}
