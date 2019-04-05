<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Hash;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    /**
     * Un modeleA peut être associé à plusieurs modeleB.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carte(): BelongsToMany
    {
        return $this->belongsToMany('App\Carte', 'carte_utilisateur', 'utilisateur_id'
            , 'carte_id', 'id', 'id');

    }

    /**
     * Un modeleA peut être associé à plusieurs modeleB.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function article(): BelongsToMany
    {
        return $this->belongsToMany('App\Article', 'paniers', 'utilisateur_id', 'article_id'
            , 'id', 'id');
    }

    /**
     * Liste de champs pouvant être assignés en lot (mass assignment).
     *
     * @var array
     */
    protected $fillable = [
        'prenom',
        'nomfamille',
        'courriel',
        'nom_usager',
        'mot_de_passe',
        'administrateur',


    ];
    /**
     * Liste des champs qui ne doivent pas faire partie de la représentation JSON
     * @var array
     */
    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    /**
     * Retrouve le mot de passe de l'usager.
     * Nécessaire pour l'authentification puisque Laravel a besoin d'un champ qui s'appelle password.
     * Voir : http://stackoverflow.com/questions/26073309/how-to-change-custom-password-field-name-for-laravel-4-and-laravel-5-user-auth
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    /**
     * Assigne un mot de passe crypté au champ motdepasse.
     * Le mot de passe sera donc crypté même si on fait directement $usager->motdepasse = 'motenclair';
     *
     * @param String
     * @return string
     */
    public function setMotDePasseAttribute($mot_de_passe)
    {
        return $this->attributes['mot_de_passe'] = bcrypt($mot_de_passe);

    }

}
