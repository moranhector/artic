<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articulos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'descripcion',
                  'precio',
                  'costo',
                  'categoria_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the categoria for this model.
     *
     * @return App\Models\Categoria
     */
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria','categoria_id');
    }



}
