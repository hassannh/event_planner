<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SousServiceRequest;

use App\Models\Service;
use App\Models\sousServiceImage;
use App\Models\SousService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class SousServiceController extends Controller
{
    public function index(){
        $sousServices = SousService::all();
        return view('admin.sousService.index',[ 'sousServices' => $sousServices]);
    }

    public function create(){
        $service = Service::all();
        return  view('admin.sousService.create',['service'=>$service]);
    }

    public function store(SousServiceRequest $request){
        $validatData = $request->validated();
        $service = Service::findOrFail($validatData['service_id']);
       

          $sousService = $service->sousService()->create([
            'service_id'=>$validatData['service_id'],
            'typeName'=>$validatData['typeName'],
            'price'=>$validatData['price'],
            'description'=>$validatData['description'],
           
          ]);
         
         $i=1;
          if($request->hasFile('images')){
            $uploadPath = public_path().'/uploads/sousService/';
            foreach($request->file('images') as $imageFile){
               
                $ext=$imageFile->getClientOriginalExtension();
                $fileName=time().$i++.'.'.$ext;
                $imageFile->move($uploadPath, $fileName);
                $finalImagepath = $fileName;
               
                $sousService->sousServiceimages()->create([
                  'sous_service_id' => $sousService->id,
                  'images' => $finalImagepath,
                ]);
            }
          }
        
 
          $request->session()->flash('success','sousService added successfully');
          return redirect('/admin/sousService');
    }

    public function edit(int $sousService_id){
        $service = Service::all();
        $sousService = SousService::findOrFail($sousService_id);
        return view('admin.sousService.edit',compact('service','sousService'));
    }

    
    public function update(SousServiceRequest $request, int $sousService_id)
    {
        $validatedData = $request->validated();
        $sousService = SousService::findOrFail($sousService_id);
        if ($sousService) {
            $sousService->update([
                'service_id' => $validatedData['service_id'],
                'typeName' => $validatedData['typeName'],
                'price' => $validatedData['price'],
                'description' => $validatedData['description'],
            ]);
            $i = 1;
            if ($request->hasFile('images')) {
                $uploadPath = public_path() . '/uploads/sousService/';
                foreach ($request->file('images') as $imageFile) {
                    $ext = $imageFile->getClientOriginalExtension();
                    $fileName = time() . $i++ . '.' . $ext;
                    $imageFile->move($uploadPath, $fileName);
                    $finalImagepath = $fileName;
                    $sousService->sousServiceimages()->create([
                        'sous_service_id' => $sousService->id,
                        'images' => $finalImagepath,
                    ]);
                }
            }
            $request->session()->flash('success', 'SousService updated successfully');
            return redirect('/admin/sousService');
        } else {
            $request->session()->flash('success', 'No SousService with the given id found');
            return redirect('/admin/sousService');
        }
    }
    

    public function destroyImage(int $sousService_image_id){
        $sousServiceimages =sousServiceImage::findOrFail($sousService_image_id);
        if(File::exists($sousServiceimages->image)){
         File::delete($sousServiceimages->image);
        }
        $sousServiceimages->delete();
        session()->flash('success','the sousService Image is deleted');
        return redirect()->back();
    }

    public function destroy(int $sousService_id){
        $sousService = SousService::findOrFail($sousService_id);
         if($sousService->sousServiceimages()){
          foreach($sousService->sousServiceimages() as $image){
            if(File::exists($image->image)){
              File::delete($image->image);
            }
          }
         }
         $sousService->delete();
         session()->flash('success','the sousService  deleted succesfuly');
         return redirect()->back();
       }
}

