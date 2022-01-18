<?php

/**
 * Affiche un template
 *
 * @param string $nomDuFichier
 * @param string|null $resultat
 * @return void
 */
function body(string $nomDuFichier, string $resultat = null, array $detail = []): void
{
    $menu = '';

    require('./template/body.php');
}

/**
 * Redirige sur une autre page
 *
 * @param string $url
 * @return void
 */
function redirection(string $url): void
{
    header("Location: " . $url);
    die();
}