<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeEvent;
use Illuminate\Support\Facades\Validator;

class TypeEventController extends Controller
{
    public function index(){
        $typeevent = TypeEvent::orderBy('id','DESC')->get();
        return view('admin.typeevent.index',['typeevent'=>$typeevent]);
    }
    public function create(){
        return  view('admin.typeevent.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
          'TypeName'=>'required',
          
        ]);
        if($validator->passes()){
          $typeevent = new TypeEvent;
          $typeevent->TypeName = $request->TypeName;

          $typeevent->save();
          $request->session()->flash('success','Type Event added successfully');
          return redirect('admin/typeevent');
          
        }else{
          return redirect('admin/typeevent/create')->withErrors($validator)->withInput();
        }
      }

      public function destory(int $idTypeEvent){
      
        $typeevent = TypeEvent::findOrFail($idTypeEvent);
        
        $typeevent->delete();
        session()->flash('success','TypeEvent deleted successfully');
        return redirect()->back();
     }
}
