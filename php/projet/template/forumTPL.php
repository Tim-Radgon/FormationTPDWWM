<section>
    <h1>Inscription</h1>

    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="nom" id="nom" placeholder="Entrer le nom" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="prenom" placeholder="Entrer le prenom" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <input type="text" name="login" placeholder="Entrer le login" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="password" name="password" placeholder="Entrer le password" class="form-control">
            </div>
        </div>

        <input type="submit" class="btn btn-lg btn-primary mt-3 mb-3">
    </form>
</section>

<section>
    <h1>Liste des utilisateurs</h1>
    <?php
    foreach ($listUser as $user) {
        ?>
        <div class="user mb-3">
            <h2><?= $user['login'] ?></h2>
            <?php
            foreach ($user as $key => $val) {
                echo $key . ': <strong>' . $val . '</strong><br>';
            }
            ?>
        </div>
        <?php
    }
    ?>
</section>
