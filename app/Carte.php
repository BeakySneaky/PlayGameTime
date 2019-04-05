<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carte extends Model
{
    /**

     * Un modeleA peut être associé à plusieurs modeleB.

     *

     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany

     */

    public function utilisateur() : BelongsToMany

    {

        return $this->belongsToMany('App\Utilisateur', 'carte_utilisateur', 'carte_id', 'utilisateur_id',
            'id', 'id');

    }
}
