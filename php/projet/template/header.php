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
                <li class="nav-item"><a href="des.php" class="nav-link <?= $menu === 'des' ? 'active' : '' ?>">Jeu de
                        Dés</a></li>

                <li class="nav-item"><a href="randNums.php"
                                        class="nav-link <?= $menu === 'randNums' ? 'active' : '' ?>">Nombre
                        Aléatoire</a>
                </li>

                <li class="nav-item"><a href="forum.php"
                                        class="nav-link <?= $menu === 'forum' ? 'active' : '' ?>">Inscription</a></li>

                <li class="nav-item"><a href="edf.php"
                                        class="nav-link <?= $menu === 'edf' ? 'active' : '' ?>">Edf</a></li>

                <li class="nav-item"><a href="dayOfTheWeek.php"
                                        class="nav-link <?= $menu === 'dayOfTheWeek' ? 'active' : '' ?>">Jour de la
                        Semaine</a></li>

                <li class="nav-item"><a href="calculatrice.php"
                                        class="nav-link <?= $menu === 'calculatrice' ? 'active' : '' ?>">Calculatrice</a>
                </li>

                <li class="nav-item"><a href="bandwidth.php"
                                        class="nav-link <?= $menu === 'bandwidth' ? 'active' : '' ?>">Bande Passante</a>
                </li>
                
            </ul>

            <ul class="navbar-nav ms-auto">
                <?php
                if (!isset($_SESSION['user'])) { ?>
                    <li class="nav-item"><a href="loginv2bis.php"
                                            class="nav-link <?= $menu === 'securite' ? 'active' : '' ?>">se
                            connecter</a></li>
                    <?php
                }
                if (!empty($_SESSION['user'])) { ?>
                    <li class="nav-item">Utilisateur : <?= $_SESSION['user'] ?> <a href="logout.php"
                                                                                   class="nav-link <?= $menu === 'securite' ? 'active' : '' ?>">se
                            déconnecter</a></li>
                    <?php
                }
                ?>
            </ul>

        </div>
    </nav>
</header>