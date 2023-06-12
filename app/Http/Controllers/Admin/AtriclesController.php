<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Requests;
use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;
use App\Models\Images;
use App\Models\Equipement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;



class AtriclesController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('admin.articles.index',[ 'articles' => $articles]);
    }

    public function create(){
        $equipements = Equipement::all();
        return  view('admin.articles.create',['equipements'=>$equipements]);
    }

    public function store(ArticleFormRequest $request){
        $validatData = $request->validated();
        $equipements = Equipement::findOrFail($validatData['equipement_id']);
       

          $article = $equipements->articles()->create([
            'equipement_id'=>$validatData['equipement_id'],
            'name'=>$validatData['name'],
            'price'=>$validatData['price'],
            'description'=>$validatData['description'],
           
          ]);
         
         $i=1;
          if($request->hasFile('images')){
            $uploadPath = public_path().'/uploads/articles/';
            foreach($request->file('images') as $imageFile){
               
                $ext=$imageFile->getClientOriginalExtension();
                $fileName=time().$i++.'.'.$ext;
                $imageFile->move($uploadPath, $fileName);
                $finalImagepath = $fileName;
               
                $article->Articleimages()->create([
                 'article_id'=>$article->id,
                 'images'=> $finalImagepath,
                ]);
            }
          }
         
 
          $request->session()->flash('success','Articles added successfully');
          return redirect('/admin/articles');
    }
         
   public function edit(int $article_id){
   $equipements = Equipement::all();
   $article = Article::findOrFail($article_id);
   return view('admin.articles.edit',compact('equipements','article'));
   }

   public function update(ArticleFormRequest $request ,int $article_id){
    $validatData = $request->validated();
    $article = Equipement::findOrFail($validatData['equipement_id'])
               ->articles()->where('id',$article_id)->first();
               if($article){
                $article->update([
                  'equipement_id'=>$validatData['equipement_id'],
                  'name'=>$validatData['name'],
                  'price'=>$validatData['price'],
                  'description'=>$validatData['description'],
                ]);
                $i=1;
                if($request->hasFile('images')){
                  $uploadPath = public_path().'/uploads/articles/';
                  foreach($request->file('images') as $imageFile){
                     
                      $ext=$imageFile->getClientOriginalExtension();
                      $fileName=time().$i++.'.'.$ext;
                      $imageFile->move($uploadPath, $fileName);
                      $finalImagepath = $fileName;
                     
                      $article->Articleimages()->create([
                       'article_id'=>$article->id,
                       'images'=> $finalImagepath,
                      ]);
                  }
                }
                $request->session()->flash('success','Articles updeted successfully');
                return redirect('/admin/articles');
               }
               else{
                $request->session()->flash('success','No Sush Articles id Found');
                return redirect('/admin/articles');
               }
   }
   
    public function destroyImage(int $article_image_id){
     $articlesimages =Images::findOrFail($article_image_id);
     if(File::exists($articlesimages->image)){
      File::delete($articlesimages->image);
     }
     $articlesimages->delete();
     session()->flash('success','the Article Image is deleted');
     return redirect()->back();
    }

   public function destroy(int $article_id){
    $article = Article::findOrFail($article_id);
     if($article->Articleimages()){
      foreach($article->Articleimages() as $image){
        if(File::exists($image->image)){
          File::delete($image->image);
        }
      }
     }
     $article->delete();
     session()->flash('success','the Article  deleted succesfuly');
     return redirect()->back();
   }
   
}
