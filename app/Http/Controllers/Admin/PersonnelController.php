<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personnel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class PersonnelController extends Controller
{
   

    public function index()
    {
    $personnels = Personnel::all();
    return view('admin.personnel.index', compact('personnels'));
    }
    
    public function create()
    {
        return view('admin.personnel.create');
    }
     
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'NomPers' => 'required|max:255',
        'price' => 'required|integer',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $personnel = new Personnel;

    $personnel->NomPers = $validatedData['NomPers'];
    $personnel->price = $validatedData['price'];
    $personnel->description = $validatedData['description'];

    if($request->hasFile('image')){
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $newFileName=time().'.'.$ext;
        $file->move(public_path().'/uploads/personnel/', $newFileName);
        $personnel->image = $newFileName;
    }

    $personnel->save();

    return redirect('admin/personnel')->with('success', 'Personnel added successfully.');
   }

   public function edit($id)
   {
    $personnel = Personnel::find($id);
    return view('admin.personnel.edit', compact('personnel'));
   }

   public function update(Request $request, $id)
{
    $request->validate([
        'NomPers' => 'required',
        'price' => 'required|integer',
        'description' => 'required',
    ]);

    $personnel = Personnel::findOrFail($id);

    $personnel->NomPers = $request->input('NomPers');
    $personnel->price = $request->input('price');
    $personnel->description = $request->input('description');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images/personnel/');
        $image->move($destinationPath, $filename);
        $personnel->image = $filename;
    }

    $personnel->save();

    return redirect()->route('personnel.index')->with('success', 'Personnel updated successfully.');
}

public function destroy($id)
{
    $personnel = Personnel::find($id);

    if (!$personnel) {
        return redirect()->back()->with('error', 'Personnel not found!');
    }

    if ($personnel->image != '' && file_exists(public_path().'/uploads/personnel/'.$personnel->image)) {
        unlink(public_path().'/uploads/personnel/'.$personnel->image);
    }

    $personnel->delete();

    return redirect()->back()->with('success', 'Personnel deleted successfully!');
}


}
