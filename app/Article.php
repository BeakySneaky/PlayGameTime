<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    /**
     * Un modeleA peut être associé à plusieurs modeleB.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function utilisateur() : BelongsToMany
    {
        return $this->belongsToMany('App\Article', 'paniers', 'article_id'
            , 'utilisateur_id', 'id', 'id');
    }
    /**
     * Un modeleA appartient à un modeleB (ou "est associé à" ou "a").
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type() : BelongsTo
    {
        return $this->belongsTo('App\Type', 'type_id', 'id');
    }
    /**
     * Liste de champs pouvant être assignés en lot (mass assignment).
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'type_id',
    ];
}
