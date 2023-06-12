<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\salleRequest;
use App\Models\Salle;
use App\Models\ImageSalle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class salleController extends Controller
{
    public function index(){
        $salles = Salle::all();
        return view('admin.salle.index',['salles'=>$salles]);
    }

    public function create(){
       
        return  view('admin.salle.create');
    }

    public function store(salleRequest $request)
    {
        $validatedData = $request->validated();
    
        $salle = new Salle();
        $salle->SalleName = $validatedData['SalleName'];
        $salle->price = $validatedData['price'];
        $salle->capacite = $validatedData['capacite'];
        $salle->description = $validatedData['description'];
        $salle->save();
    
        $i = 1;
        if ($request->hasFile('images')) {
            $uploadPath = public_path().'/uploads/salles/';
            foreach ($request->file('images') as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$ext;
                $imageFile->move($uploadPath, $fileName);
                $finalImagePath = $fileName;
                $salle->salleimages()->create([
                    'salle_id' => $salle->id,
                    'images' => $finalImagePath,
                ]);
            }
        }
    
        return redirect()->route('salle.index')->with('success', 'Salle created successfully.');
    }
    
    public function destroy($id)
   {
    $salle = Salle::find($id);
    $salle->delete();
    return redirect()->route('salle.index')->with('success', 'Salle deleted successfully!');
   }

   public function edit($id)
{
    $salle = Salle::find($id);
    return view('admin.salle.edit', compact('salle'));
}

public function update(salleRequest $request, $id)
{
    $salle = Salle::find($id);
    $salle->SalleName = $request->input('SalleName');
    $salle->price = $request->input('price');
    $salle->capacite = $request->input('capacite');
    $salle->description = $request->input('description');
    
    $salle->save();

    $i=1;
    if($request->hasFile('images')){
        $uploadPath = public_path().'/uploads/salles/';
        foreach($request->file('images') as $imageFile){
            $ext=$imageFile->getClientOriginalExtension();
            $fileName=time().$i++.'.'.$ext;
            $imageFile->move($uploadPath, $fileName);
            $finalImagepath = $fileName;
            
            $salle->salleimages()->create([
                'salle_id'=>$salle->id,
                'images'=> $finalImagepath,
            ]);
        }
    }
    return redirect()->route('salle.index')->with('success', 'Salle updated successfully!');
}


   public function destroyImage(int $salle_image_id){
    $salle_image = ImageSalle::findOrFail($salle_image_id);
    if(File::exists($salle_image->image)){
        File::delete($salle_image->image);
    }
    $salle_image->delete();
    session()->flash('success','The salle image is deleted.');
    return redirect()->back();
   }


}


