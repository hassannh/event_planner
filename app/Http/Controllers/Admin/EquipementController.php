<?php

namespace App\Http\Controllers\Admin;

use App\Models\Equipement;
use App\Http\Controllers\Controller;
use App\Http\Requests\EquipementFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;





class EquipementController extends Controller
{
    public function index(){
        $equipements = Equipement::orderBy('id','DESC')->get();
        return view('admin.equipement.index',['equipements'=>$equipements]);
    }

    public function create(){
        return  view('admin.equipement.create');
    }

  
    
    public function store(Request $request){
      $validator = Validator::make($request->all(),[
        'nameEquipement'=>'required',
        'slug'=>'required',
        'image'=>'required|mimes:gif,png,jpg,jpeg|max:2048',
      ]);
      if($validator->passes()){
        $equipement = new Equipement;
        $equipement->nameEquipement = $request->nameEquipement;
        $equipement->slug= $request->slug;



        if($request->hasFile('image')){
         $file=$request->file('image');
         $ext=$file->getClientOriginalExtension();
         $newFileName=time().'.'.$ext;
         $file->move(public_path().'/uploads/equipement/', $newFileName);
         $equipement->save();
         
        }
       
     
        $equipement->image=$newFileName;
        $equipement->save();
        $request->session()->flash('success','Equipement added successfully');
        return redirect('admin/equipement');
        
      }else{
        return redirect('admin/equipement/create')->withErrors($validator)->withInput();
      }
    }

    public function edit($id){
      $equipement = Equipement::find($id);
    

      return view('admin.equipement.edit',['equipement'=> $equipement]);
    }

    public function update($id,Request $request){
      
      $validator = Validator::make($request->all(),[
        'nameEquipement'=>'required',
        'slug'=>'required',
        'image'=>'required|mimes:gif,png,jpg,jpeg|max:2048',
      ]);
      if($validator->passes()){
        $equipement = Equipement::find($id);
        $equipement->nameEquipement = $request->nameEquipement;
        $equipement->slug= $request->slug;



        if($request->hasFile('image')){
         $oldImage =  $equipement->image;
         $file=$request->file('image');
         $ext=$file->getClientOriginalExtension();
         $newFileName=time().'.'.$ext;
         $file->move(public_path().'/uploads/equipement/', $newFileName);
         $equipement->save();

         File::delete(public_path().'/uploads/equipement/'.$oldImage);
         
        }
       
         $equipement->image=$newFileName;
       
        $equipement->save();
        $request->session()->flash('success','Equipement updeted successfully');
        return redirect('admin/equipement');
        
      }else{
        return redirect()->route('equipement.edit',$equipement->id)->withErrors($validator)->withInput();
      }
    }

    public function destory($id,Request $request){
      
       $equipement =Equipement::findOrFail($id);
       File::delete(public_path().'/uploads/equipement/'.$equipement->image);
       $equipement->delete();
       $request->session()->flash('success','Equipement deleted successfully');
       return redirect()->route('equipement.index');
    }

    
}
