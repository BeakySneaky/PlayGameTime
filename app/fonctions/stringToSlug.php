<?php
/**
 * Remplace les espaces et caractères spéciaux dans une chaîne pour qu'elle puisse servir de slug, de nom de fichier ou de nom de dossier.
 * Source : christianelagace.com
 *
 * @param string $chaine Chaîne à nettoyer
 * @return string Chaîne nettoyée
 */

function stringToSlug(string $chaine): string
{
    // Selon la doc de PHP (http://php.net/manual/fr/function.trim.php),
    // les caractères suivants seront supprimés en début et en fin de chaîne avec trim
    // " " (ASCII 32 (0x20)), un espace ordinaire.
    // "\t" (ASCII 9 (0x09)), une tabulation.
    // "\n" (ASCII 10 (0x0A)), une nouvelle ligne (line feed).
    // "\r" (ASCII 13 (0x0D)), un retour chariot (carriage return).
    // "\0" (ASCII 0 (0x00)), le caractère NUL.
    // "x0B" (ASCII 11 (0x0B)), une tabulation verticale.

    // enleve les espaces de début et de fin
    $chaine = trim($chaine);

    // si plusieurs espaces d'affilée, les remplace par un seul (tiré de la doc PHP : http://php.net/manual/fr/function.preg-replace.php)
    $chaine = preg_replace('/\s\s+/', ' ', $chaine);

    // remplace les espaces intérieurs par des barres-en-bas
    $espaces = "\\x00-\\x20";   // caractères apparaîssant comme des espaces et caractères de contrôle
    $chaine = preg_replace("/[" . $espaces . "]+/", '_', $chaine);

    // remplace les caractères accentués
    $speciaux = [
        'à' => 'a',
        'â' => 'a',
        'À' => 'A',
        'Â' => 'A',
        'ç' => 'c',
        'Ç' => 'c',
        'é' => 'e',
        'è' => 'e',
        'ê' => 'e',
        'ë' => 'e',
        'É' => 'E',
        'È' => 'E',
        'Ê' => 'E',
        'Ë' => 'E',
        'î' => 'i',
        'ï' => 'i',
        'Î' => 'I',
        'Ï' => 'I',
        'ô' => 'o',
        'Ô' => 'O',
        'ù' => 'u',
        'û' => 'u',
        'ü' => 'u',
        'Ù' => 'U',
        'Û' => 'U',
        'Ü' => 'U',
    ];
    $nettoyes = array_values($speciaux);
    $accentues = array_keys($speciaux);
    $chaine = str_replace($accentues, $nettoyes, $chaine);

    // remplace tout autre caractère non prévu par une barre-en-bas
    // ne permet que les lettres, chiffres, barres-en-bas, traits d'union et points
    // pour en savoir plus sur le 1er paramètre de preg_replace (le patron) : http://www.php.net/manual/en/reference.pcre.pattern.syntax.php
    // les / du début et de la fin ne font qu'entourer l'expression. On aurait pu prendre n'importe quel caractère en autant qu'il ne fasse pas partie de l'expression. (voir http://php.net/manual/en/regexp.reference.delimiters.php pour les délimiteurs)
    // les [ et ] sont pour indiquer une étendue (ex: [A-Z] signifie A à Z)
    // le ^ du début est pour faire la négation
    // le i final est pour "case insensitive" (voir http://www.php.net/manual/en/reference.pcre.pattern.modifiers.php pour les autres modificateurs)
    // le - et le . sont précédés d'un \ pour ne pas qu'ils soient interprétés
    $chaine = preg_replace("/[^A-Za-z0-9_\-\.]/i", "_", $chaine);
    return $chaine;

}
