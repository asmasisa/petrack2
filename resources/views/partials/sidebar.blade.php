<!-- resources/views/partials/sidebar.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
<div class="sidebar" id="sidebar">
      <div class="menu-list">
        <ul class="ul1">
          <li><a href="{{ route('accueil') }}"><i class="fas fa-home"></i> Accueil</a></li>
          <li><a href="{{ route('publi') }}"><i class="fas fa-newspaper"></i> Publication</a></li>
        
          <li>
            <a href="{{ route('pet.PetProfil') }}">
                <i class="fas fa-paw"></i> Pet Profil <span class="caret"></span>
            </a>
            <!-- Dropdown menu pour Pet Profil -->
            <ul class="submenu">
                <li><a href="{{route('pet.create')}}">Ajouter Animal</a></li>
                <li><a href="{{ route('pet.PetProfil') }}">Liste des Animaux</a></li>
            </ul>
        </li>
          <li><a href="{{ route('messagerie') }}"><i class="fas fa-envelope"></i> Messages</a></li>
      
          <li><a href="{{ route('planning') }}"><i class="fas fa-calendar-alt"></i> Mon Planning</a></li>
          <li><a href=""><i class="fas fa-bullhorn"></i> Annonces</a></li>
      </ul>
        
        <ul class="ul2">
          <li><a href="{{ route('param') }}"><i class="fas fa-cog"></i> Paramètres </a></li>
          <li><a href=""> <i class="fas fa-question-circle"></i> Aide et Support</a></li>
          <hr class="separator">

          <form action="{{ route('logout') }}" method="POST">
            @csrf 
            <button type="submit" class="logout" id="log">
                <i class="fas fa-sign-out-alt"></i> Se déconnecter
            </button>
          </form>
        
      </div>
    </div>
</body>
</html>