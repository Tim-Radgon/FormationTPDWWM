<form method="get">
    <input type="text" name="moninput">
    <input type="text" name="moninputbis">
    <input type="submit" value="envoie">
</form>

<?php
if (empty($_GET['moninput'])) {
    echo 'tu dois remplir mon premier champ';
}
var_dump($_GET);
