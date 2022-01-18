<header class="container-lg">
    <div class="justify-content-center d-none d-lg-flex ">
        <img class="logo me-1" src="apple.svg" width="40" alt="Projet Alkas"><span class="nomdusite">Alkas Projet</span>
    </div>

    <nav id="main-nav" class="navbar navbar-expand-lg navbar-light ms-3 me-3">
        <div class="navbar-brand d-sm-block d-lg-none"><img class="me-1" src="microsoft.svg" width="40"><span
                    class="nomdusite">Alkas Projet</span></div>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link <?= $menu === 'accueil' ? 'active' : '' ?>">accueil</a>
                </li>
                <li class="nav-item"><a href="des.php" class="nav-link <?= $menu === 'des' ? 'active' : '' ?>">jeu de
                        des</a></li>


                <li class="nav-item"><a href="aleat.php" class="nav-link <?= $menu === 'des' ? 'active' : '' ?>">aléatoire</a>
                </li>


                <li class="nav-item"><a href="forum.php"
                                        class="nav-link <?= $menu === 'forum' ? 'active' : '' ?>">forum</a></li>


            </ul>
        </div>
    </nav>
</header>