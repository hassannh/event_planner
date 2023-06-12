<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
</head>
<body>
  
      <nav class="sidebar sidebar-offcanvas " id="sidebar">
        <ul class="nav">
        
        
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/equipement')}}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title fs-5">Equipements
              </span>
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/articles')}}">
              <i class="mdi  mdi-plus-circle menu-icon"></i>
              <span class="menu-title fs-5">Articles
              </span>
              
            </a>
            
          </li>
          
         
          <li class="nav-item">
            <a class="nav-link"  href="{{url('admin/typeevent')}}">
              <i class="mdi mdi-playlist-plus menu-icon"></i>
              <span class="menu-title fs-5">Type-D'événement
              </span>
              
            </a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/salle')}}">
              <i class="mdi mdi-home-variant menu-icon"></i>
              <span class="menu-title fs-5">Salles</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link"  href="{{url('admin/personnel')}}" >
              <i class="mdi  mdi-account menu-icon"></i>
              <span class="menu-title fs-5">Personnels
              </span>
            
            </a>
           
          </li>
         
        
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/service')}}">
              <i class="mdi  mdi-settings-box menu-icon"></i>
              <span class="menu-title fs-5">Services
              </span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/sousService')}}">
              <i class="mdi  mdi-settings-box menu-icon"></i>
              <span class="menu-title fs-5">Sous Services
              </span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/user')}}">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title fs-5">Utilisateurs</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/evenement') }}">
              <i class="mdi mdi-calendar-check menu-icon"></i>
              <span class="menu-title fs-5">Evénements</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/StaticEqui') }}">
            <i class="mdi mdi-chart-bar menu-icon "></i>
            <span class="menu-title fs-5">Statistique Articles</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="mdi mdi-chart-bar menu-icon "></i>
            <span class="menu-title fs-5">Statistique Service</span>
            </a>
          </li>


        </ul>
      </nav>
</body>
</html>