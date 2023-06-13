<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\TypeEvent;
use App\Models\Salle;
use App\Models\User;
use App\Models\Evenement;
use App\Models\EventArticle;
use App\Models\Personnel;
use App\Models\Service;
use App\Models\SousService;
use App\Models\EventPersonnel;
use App\Models\EventService;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\URL;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $typeevente = TypeEvent::all();
        return view('home',['typeevente' => $typeevente]);
    }
   

    public function store(EventRequest $request)
{
    $validatedData = $request->validated();
    $typeEvent_id = TypeEvent::findOrFail($validatedData['typeEvent_id']);
    
    $startDate = $validatedData['datestart'];
    $endDate = $validatedData['dateEnd'];
    
    if ($endDate < $startDate) {
        return redirect()->back()->withInput()->withErrors(['dateEnd' => 'End date must be greater than start date.']);
    }
    
    $request->session()->put('typeEvent_id', $validatedData['typeEvent_id']);
    $request->session()->put('eventName', $validatedData['eventName']);
    $request->session()->put('guests', $validatedData['guests']);
    $request->session()->put('ville', $validatedData['ville']);
    $request->session()->put('datestart', $startDate);
    $request->session()->put('dateEnd', $endDate);
    
    return redirect()->route('frontClient.salle')->withInput();
}

    
    // public function salle()
    // {
    //     // dd("hhhhhhhhhhhhhhhh");
    //     $guests = session('guests');
    //     $salles = Salle::where('capacite', '>=', $guests)->get();
    //     return view('frontClient.salle', compact('salles', 'guests'));
    // }

    public function salle()
{
    // dd("hhhhhhhhhhhhhhhhh");
    $guests = session('guests');
    $salles = Salle::with('ImageSalle')->where('capacite', '>=', $guests)->get();
    // dd($salles);
    return view('frontClient.salle', compact('salles', 'guests'));
    
}
    
    public function storesalle(Request $request)
    {
        $validatedData = $request->validate([
            'salle_id' => 'required|integer',
            
        ]);
        $salle =  Salle::findOrFail($validatedData['salle_id']);
        $request->session()->put('salle_id', $request->input('salle_id'));
        
        $typeEvent_id = session('typeEvent_id');
        $salle_id = session('salle_id');
        $eventName = session('eventName');
        $guests = (int) session('guests');
        $ville = session('ville');
        $datestart = session('datestart');
        $dateEnd = session('dateEnd');
        
        // Save the data to the database
        $evenement = Evenement::create([
            'typeEvent_id' => $typeEvent_id,
            'salle_id' => $salle_id,
            'user_id' => auth()->id(),
            'eventName' => $eventName,
            'guests' => $guests,
            'ville' => $ville,
            'datestart' => $datestart,
            'dateEnd' => $dateEnd,
        ]);
        
        $eventId = session(['eventId' => $evenement->id]);
        
        return redirect()->route('frontClient.equipement', $evenement->id);
    }
    

     //store eventarticle
     public function storeArticle(Request $request)
     {
         $validatedData = $request->validate([
             'articles' => 'required',
         ]);
         $selectedArticles = [];
         //Bring all articles with quantity chosen by the user
         foreach($request->articles as  $articleId => $quantity){
             $selectedArticles[] = [
                 'article_id'  => $articleId,
                 //If the user select one article without set the quantity set quantity = 1
                 'quantity' =>  isset($request->quantity[$articleId]) ? $request->quantity[$articleId] : 1,
             ];
         }
         $event = Evenement::where('id', session('eventId'))->first();
         //Store articles with quantity in data base
         foreach($selectedArticles as $selectedArticle){
             //
             $eventArticle = EventArticle::where('event_id',$event->id)
             ->where('article_id', $selectedArticle['article_id'])
             ->first();
             //Check if article already stored in data base
             if($eventArticle){
                 $eventArticle->quantite = $selectedArticle['quantity'];
                 $eventArticle->save();
             }else{
             $eventArticle = new EventArticle;
             $eventArticle->event_id = $event->id;
             $eventArticle->article_id = $selectedArticle['article_id'];
             $eventArticle->quantite = $selectedArticle['quantity'];
             $eventArticle->save();
             }
         }
         return redirect()->route('frontClient.equipement');
     }

     public function indexTableArticle(){
        
        $event = Evenement::where('id' , session('eventId'))->first();
        $eventArticles = EventArticle::join('articles', '_event_article.article_id', '=', 'articles.id')
        ->join('_equipements', 'articles.equipement_id', '=' , '_equipements.id')
        ->where('event_id', $event->id)
        ->select('articles.name as article_nom', '_equipements.nameEquipement as equipement_nom', '_event_article.quantite','_event_article.id')
        ->get();
        if(count($eventArticles)>0)
            return view('frontClient.TableArticle', compact('eventArticles'));
        else
            return redirect()->route('frontClient.personnels');
    } 
    

     //Delete from table
     public function deleteArticle($id)
     {
         $data = EventArticle::findOrFail($id);
         $data->delete();
         return redirect()->route('frontClient.TableArticle');
     }
     //Update from table Article
     public function updateTableArticle(Request $request,$id){
        
         $quantities = $request->input('quantity');
        
         if ($quantities !== null) {
             foreach ($quantities as $articleId => $quantity) {
                 EventArticle::where('id', $articleId )->update(['quantite' => $quantity]);
             }
         }
         
         return redirect()->route('frontClient.personnels');
     }
     




     //personnel
     public function personnels(){
        $personnels = Personnel::all();
        return view('frontClient.personnels',['personnels'=>$personnels]);
    }
    




    //modification
    public function storePersonnel(Request $request)
    {
        $event = Evenement::where('id' , session('eventId'))->first();
        $eventPersonnels = EventPersonnel::join('personnel', 'event_personnel.personnel_id', '=', 'personnel.id')
        ->where('event_id', $event->id)
        ->select('personnel.NomPers as personnel_nom', 'event_personnel.nbrHomme','event_personnel.nbrFemme','event_personnel.id')
        ->get();
        if(count($eventPersonnels)>0)
            return redirect()->route('frontClient.tablePersonnel');
        else
            return redirect()->route('frontClient.service');

    }
     
    public function indexPersonnelEvent($id)
    {
        $personnelEvents = Personnel::find($id);
        return view('frontClient.eventPersonnel',compact('personnelEvents','id'));
    }



    
    public function storePersonnelEvent(Request $request){
        $validatedData = $request->validate([
            'personnel_id' => 'required|integer',
            'nbrHomme' => 'nullable|integer|min:0',
            'nbrFemme' => 'nullable|integer|min:0',
        ],
        [
            'nbrHomme.required_without_all' => 'Veuillez saisir au moins un nombre (Homme ou Femme)',
            'nbrFemme.required_without_all' => 'Veuillez saisir au moins un nombre (Homme ou Femme)',
    
        ]);
        //Au moins un nombre doit etre saisie si on cliquant savve
        if (empty($validatedData['nbrHomme']) && empty($validatedData['nbrFemme'])) {
            return redirect()->back()->withErrors(['message' => 'Veuillez saisir au moins un nombre (Homme ou Femme)']);
        }
        //Verifer si le nombre est deja saisie ou non
        $eventPersonnel = EventPersonnel::where('event_id',session('eventId'))
        ->where('personnel_id', $validatedData['personnel_id'])
        ->first();
        //stocker le nouvelle nombre si il est changer
        if($eventPersonnel){
            $eventPersonnel->nbrHomme = $validatedData['nbrHomme'] ?? $eventPersonnel->nbrHomme;
            $eventPersonnel->nbrFemme = $validatedData['nbrFemme'] ?? $eventPersonnel->nbrFemme;
            $eventPersonnel->save();
    
        }
        else{
            $eventPersonnel = new EventPersonnel;
            $eventPersonnel->event_id = session('eventId');
            $eventPersonnel->personnel_id = $validatedData['personnel_id'];
            $eventPersonnel->nbrHomme = $validatedData['nbrHomme'] ?? 0;
            $eventPersonnel->nbrFemme = $validatedData['nbrFemme'] ?? 0;
            $eventPersonnel->save();
        }
            return redirect()->route('frontClient.personnels');
        } 



        //Table Personnel
    public function indexTablePersonnel(){
    $event = Evenement::where('id' , session('eventId'))->first();
    $eventPersonnels = EventPersonnel::join('personnel', 'event_personnel.personnel_id', '=', 'personnel.id')
    ->where('event_id', $event->id)
    ->select('personnel.NomPers as personnel_nom', 'event_personnel.nbrHomme','event_personnel.nbrFemme','event_personnel.id')
    ->get();

    return view('frontClient.tablePersonnel', compact('eventPersonnels'));
   }

    //delete personnel
    public function deletePersonnel($id)
    {
       
        $data = EventPersonnel::findOrFail($id);
        $data->delete();
        return redirect()->route('frontClient.tablePersonnel');
    }
    
    //Update from table Article
    public function updatePersonnel(Request $request,$id){
        
        $nbrHommes = $request->input('nbrHomme');
        $nbrFemmes = $request->input('nbrFemme');
        if ($nbrHommes !== null) {
            foreach ($nbrHommes as $personnelId => $nbrHomme) {
                EventPersonnel::where('id', $personnelId )->update(['nbrHomme' => $nbrHomme]);
            }
        }
        if ($nbrFemmes !== null) {
            foreach ($nbrFemmes as $personnelId => $nbrFemme) {
                EventPersonnel::where('id', $personnelId )->update(['nbrFemme' => $nbrFemme]);
            }
        }
   
           return redirect()->route('frontClient.service');
    }


    //service
    public function service(){
        $services = Service::all();
        return view('frontClient.service',['services'=>$services]);
    }

   // modification 
   public function storeService(Request $request)
   {
       $event = Evenement::where('id' , session('eventId'))->first();
       $eventServices = EventService::join('sous_service', 'event_service.sousService_id', '=', 'sous_service.id')
       ->join('service', 'sous_service.service_id', '=' , 'service.id')
       ->where('event_id', $event->id)
       ->select('sous_service.typeName as SousService_nom', 'service.serviceName as Service_nom', 'event_service.id')
       ->get();
       if(count($eventServices) > 0)
           return redirect()->route('frontClient.tableservice');
       else
           return redirect()->route('frontClient.facture');

   }


    //SousService
    
   
    public function indexSousService($id)
    {
        $services = Service::where('id',$id)->first();
        if($services){
            $sousServices = $services->SousService()->get();
            return view('frontClient.SousService',compact('sousServices','services'));
        }else{
            return redirect()->back();
        }
    }




   
    public function storeSousService(Request $request)
    {
    $validatedData = $request->validate([
        'sousServices' => 'required',
    ]);
    $selectedServices = [];
    //Bring all sousServices
    foreach($request->sousServices as  $sousServiceId){
        $selectedServices[] = [
            'sousService_id'  => $sousServiceId,
        ];
    }
    $event = Evenement::where('id', session('eventId'))->first();
    //Store articles with quantity in data base
    foreach($selectedServices as $selectedService){
        $existingService = EventService::where('event_id', $event->id)
            ->where('sousService_id', $sousServiceId)
            ->exists();
        if(!$existingService){
            $eventService = new EventService;
            $eventService->event_id = $event->id;
            $eventService->sousService_id = $selectedService['sousService_id'];
            $eventService->save();
        }

    }
    return redirect()->route('frontClient.service');
    }

    //Table service
    public function indexTableService(){
    $event = Evenement::where('id' , session('eventId'))->first();
    $eventServices = EventService::join('sous_service', 'event_service.sousService_id', '=', 'sous_service.id')
    ->join('service', 'sous_service.service_id', '=' , 'service.id')
    ->where('event_id', $event->id)
    ->select('sous_service.typeName as SousService_nom', 'service.serviceName as Service_nom', 'event_service.id')
    ->get();
    return view('frontClient.tableservice', compact('eventServices'));
    }

     //Delete from table service
     public function deleteService($id)
     {
       $data = EventService::findOrFail($id);
       $data->delete();
       return redirect()->route('frontClient.tableservice');
     }









    //facture 
    //  public function indexFacture()
    //  {
        
    // //EventArticle
    // $event = Evenement::where('id' , session('eventId'))->first();

    //  //User
    //  $user = User::leftJoin('evenement', 'users.id', '=', 'evenement.user_id')
    //  ->where('evenement.id', $event->id)
    //  ->select('users.phone','users.company','users.address','users.email')
    //  ->first();
    // //Salle
    // $salle = Salle::leftJoin('evenement', 'salle.id', '=', 'evenement.salle_id')
    //     ->where('evenement.id', $event->id)
    //     ->select('salle.SalleName','salle.price')
    //     ->first();
    // //type d'evenement
    // $typeEvent = TypeEvent::leftJoin('evenement', '_type_event.id', '=', 'evenement.typeEvent_id')
    // ->where('evenement.id', $event->id)
    // ->select('_type_event.TypeName')
    // ->first();
    // //Articles
    // $eventArticles = EventArticle::join('articles', '_event_article.article_id', '=', 'articles.id')
    // ->join('_equipements', 'articles.equipement_id', '=' , '_equipements.id')
    // ->where('event_id', $event->id)
    // ->select('articles.name as article_nom', '_equipements.nameEquipement as equipement_nom', '_event_article.quantite','_event_article.id','articles.price as prixUnitaire')
    // ->get();
    // //EventPersonnel
    // $eventPersonnels = EventPersonnel::join('personnel', 'event_personnel.personnel_id', '=', 'personnel.id')
    // ->where('event_id', $event->id)
    // ->select('personnel.NomPers as personnel_nom', 'event_personnel.nbrHomme','event_personnel.nbrFemme','event_personnel.id','personnel.price as prixPersonnel')
    // ->get();
    // //EventService
    // $eventServices = EventService::join('sous_service', 'event_service.sousService_id', '=', 'sous_service.id')
    // ->join('service', 'sous_service.service_id', '=' , 'service.id')
    // ->where('event_id', $event->id)
    // ->select('sous_service.typeName as SousService_nom', 'service.serviceName as Service_nom', 'event_service.id','sous_service.price as prixService')
    // ->get();
    // return view('frontClient.facture',compact('eventArticles','eventPersonnels','eventServices','event','salle','typeEvent','user'));
    // }


    public function indexFacture()
{
    //EventArticle
    $event = Evenement::where('id', session('eventId'))->first();

    //User
    $user = User::leftJoin('evenement', 'users.id', '=', 'evenement.user_id')
        ->where('users.id', $event->user_id) // Use user ID instead of event ID
        ->select('users.phone', 'users.company', 'users.address', 'users.email')
        ->first();

    //Salle
    $salle = Salle::leftJoin('evenement', 'salle.id', '=', 'evenement.salle_id')
        ->where('evenement.id', $event->id)
        ->select('salle.SalleName', 'salle.price')
        ->first();

    //type d'evenement
    $typeEvent = TypeEvent::leftJoin('evenement', '_type_event.id', '=', 'evenement.typeEvent_id')
        ->where('evenement.id', $event->id)
        ->select('_type_event.TypeName')
        ->first();

    //Articles
    $eventArticles = EventArticle::join('articles', '_event_article.article_id', '=', 'articles.id')
        ->join('_equipements', 'articles.equipement_id', '=', '_equipements.id')
        ->where('event_id', $event->id)
        ->select('articles.name as article_nom', '_equipements.nameEquipement as equipement_nom', '_event_article.quantite', '_event_article.id', 'articles.price as prixUnitaire')
        ->get();

    //EventPersonnel
    $eventPersonnels = EventPersonnel::join('personnel', 'event_personnel.personnel_id', '=', 'personnel.id')
        ->where('event_id', $event->id)
        ->select('personnel.NomPers as personnel_nom', 'event_personnel.nbrHomme', 'event_personnel.nbrFemme', 'event_personnel.id', 'personnel.price as prixPersonnel')
        ->get();

    //EventService
    $eventServices = EventService::join('sous_service', 'event_service.sousService_id', '=', 'sous_service.id')
        ->join('service', 'sous_service.service_id', '=', 'service.id')
        ->where('event_id', $event->id)
        ->select('sous_service.typeName as SousService_nom', 'service.serviceName as Service_nom', 'event_service.id', 'sous_service.price as prixService')
        ->get();

    return view('frontClient.facture', compact('eventArticles', 'eventPersonnels', 'eventServices', 'event', 'salle', 'typeEvent', 'user'));
}





    public function downloadFacture(){
        //EventArticle

        // dd("hJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJhhhhh");

        $event = Evenement::where('id' , session('eventId'))->first();

        //User
       $user = User::leftJoin('evenement', 'users.id', '=', 'evenement.user_id')
       ->where('evenement.id', $event->id)
       ->select('users.phone','users.company','users.address','users.email')
       ->first();
        //Salle
        $salle = Salle::leftJoin('evenement', 'salle.id', '=', 'evenement.salle_id')
        ->where('evenement.id', $event->id)
        ->select('salle.SalleName','salle.price')
        ->first();
            
        //type d'evenement
        $typeEvent = TypeEvent::leftJoin('evenement', '_type_event.id', '=', 'evenement.typeEvent_id')
        ->where('evenement.id', $event->id)
        ->select('_type_event.TypeName')
         ->first();
        //Articles
        $eventArticles = EventArticle::join('articles', '_event_article.article_id', '=', 'articles.id')
        ->join('_equipements', 'articles.equipement_id', '=' , '_equipements.id')
        ->where('event_id', $event->id)
        ->select('articles.name as article_nom', '_equipements.nameEquipement as equipement_nom', '_event_article.quantite','_event_article.id','articles.price as prixUnitaire')
        ->get();
        //EventPersonnel
        $eventPersonnels = EventPersonnel::join('personnel', 'event_personnel.personnel_id', '=', 'personnel.id')
        ->where('event_id', $event->id)
        ->select('personnel.NomPers as personnel_nom', 'event_personnel.nbrHomme','event_personnel.nbrFemme','event_personnel.id','personnel.price as prixPersonnel')
        ->get();
        //EventService
        $eventServices = EventService::join('sous_service', 'event_service.sousService_id', '=', 'sous_service.id')
        ->join('service', 'sous_service.service_id', '=' , 'service.id')
        ->where('event_id', $event->id)
        ->select('sous_service.typeName as SousService_nom', 'service.serviceName as Service_nom', 'event_service.id','sous_service.price as prixService')
        ->get();
    
    
        $html = View::make('frontClient.pdfFacture',compact('eventArticles','eventPersonnels','eventServices','event','salle','typeEvent','user'))->render();
    
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->render();
            $filename = 'facture.pdf';
            
            return $dompdf->stream($filename);
                
    }
    


}