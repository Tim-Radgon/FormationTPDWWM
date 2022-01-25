<?php

/**
 * Affiche un template
 *
 * @param string $nomDuFichier
 * @param string|null $resultat
 * @param array|null $detail
 * @return void
 */
function body(string $nomDuFichier, string $resultat = null, array $detail = []): void
{
    if ($detail) {
        extract($detail, EXTR_SKIP);
    }

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