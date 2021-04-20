<nav class="navbar navbar-expand-md navbar-dark primary-color">
    <a class="navbar-brand" href="{{ route('index') }}">FuturoVTC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="#">Hotliner</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="#">Chauffeur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="#">Garagiste</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ressources humaines</a>
                <div class="dropdown-menu dropdown-info" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item waves-effect waves-light" href="{{ route('indexHR') }}">Liste Employés</a>
                    <a class="dropdown-item waves-effect waves-light" href="{{ route('createHREmploye') }}">Nouvel employé</a>
                    <a class="dropdown-item waves-effect waves-light" href="#">Fiche de paye</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
