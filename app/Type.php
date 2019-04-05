<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    /**
     * Un modeleA peut avoir plusieurs modeleB (ou "peut être associé à").
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function article() : HasMany
    {
        return $this->hasMany('App\Article', 'type_id', 'id');
    }

}
