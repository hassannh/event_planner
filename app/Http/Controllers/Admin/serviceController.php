<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;


class serviceController extends Controller
{
    public function index(){
      $service = Service::orderBy('id','DESC')->get();
        return view('admin.service.index',['service'=>$service]);
    }

    public function create(){
        return  view('admin.service.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
          'serviceName'=>'required',
          'image'=>'required|mimes:gif,png,jpg,jpeg|max:2048',
        ]);
        if($validator->passes()){
          $service = new Service;
          $service->serviceName = $request->serviceName;
          
  
  
  
          if($request->hasFile('image')){
           $file=$request->file('image');
           $ext=$file->getClientOriginalExtension();
           $newFileName=time().'.'.$ext;
           $file->move(public_path().'/uploads/service/', $newFileName);
           $service->save();
           
          }
         
          $service->image=$newFileName;
          $service->save();
          $request->session()->flash('success','service added successfully');
          return redirect('admin/service');
          
        }else{
          return redirect('admin/service/create')->withErrors($validator)->withInput();
        }
      }

      public function edit($id){
        $service = Service::find($id);
      
  
        return view('admin.service.edit',['service'=> $service]);
      }


      public function update($id,Request $request){
      
        $validator = Validator::make($request->all(),[
          'serviceName'=>'required',
          'image'=>'required|mimes:gif,png,jpg,jpeg|max:2048',
        ]);
        if($validator->passes()){
          $service = Service::find($id);
          $service->serviceName = $request->serviceName;
         
  
  
  
          if($request->hasFile('image')){
           $oldImage =  $service->image;
           $file=$request->file('image');
           $ext=$file->getClientOriginalExtension();
           $newFileName=time().'.'.$ext;
           $file->move(public_path().'/uploads/service/', $newFileName);
           $service->save();
  
           File::delete(public_path().'/uploads/service/'.$oldImage);
           
          }
         
           $service->image=$newFileName;
         
          $service->save();
          $request->session()->flash('success','service updeted successfully');
          return redirect('admin/service');
          
        }else{
          return redirect()->route('service.edit',$service->id)->withErrors($validator)->withInput();
        }
      }

      public function destory($id,Request $request){
      
        $service = Service::findOrFail($id);
        File::delete(public_path().'/uploads/service/'.$service->image);
        $service->delete();
        $request->session()->flash('success','service deleted successfully');
        return redirect()->route('service.index');
     }
}
