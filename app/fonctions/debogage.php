<?php
/**
 * Fait un dump and die seulement si en mode débogage.
 * Source : christianelagace.com
 *
 * @param  mixed
 * @return void
 */
function ddd($donnees): void
{
    if (Config::get('app.debug')) {
        dd($donnees);
    }
}

/**
 * Enregistre une requête SQL dans le fichier de log, seulement si en mode débogage.
 * Source : christianelagace.com
 *
 * // Inspiré de : https://scotch.io/tutorials/debugging-queries-in-laravel
 *
 * @return void
 */

function logSql(): void
{
    if (Config::get('app.debug')) {
        \DB::listen(function ($query) {
            \Log::debug('Requête : ', [$query->sql, $query->bindings]);
        });
    }
}