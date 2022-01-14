<!--action n'a pas de valeur car on va le réafficher dans la même page et non dans une autre -->
<form action="" method="post">

    <label for="dice">Formule de dés</label>
    <input type="text" name="dice" id="dice" value="<?= $_SESSION['dice'] ?? '' ?>">

    <input type="submit" value="Jet de dé(s)">

</form>