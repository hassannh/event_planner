<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
   
    
    public function index()
    {
    
        // Event service data
        $eventServiceData = DB::table('event_service')
            ->select('sousService_id', DB::raw('count(*) as count'))
            ->groupBy('sousService_id')
            ->get();
        $chartData = [];
        $chartData[] = ['Sous Service', 'Count'];
    
        foreach ($eventServiceData as $row) {
            $sousServiceName = DB::table('sous_service')->where('id', $row->sousService_id)->value('typeName');
            $chartData[] = [$sousServiceName, $row->count];
        }
         

    
        return view('admin.dashboard', compact('chartData'));
    }
    

    public function index2(){
        $eventServiceData = DB::table('_event_article')
        ->select('article_id', DB::raw('count(*) as count'))
        ->groupBy('article_id')
        ->get();
        $chartData = [];
        $chartData[] = ['Articles', 'Count'];

        foreach ($eventServiceData as $row) {
        $sousServiceName = DB::table('articles')->where('id', $row->article_id)->value('name');
        $chartData[] = [$sousServiceName, $row->count];
        }
     
        return view('admin.StaticEqui', compact('chartData'));
    }
}

