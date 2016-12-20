<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Productos';

    public $timestamps = false;

    public function cat(){

    	return $this->belongsTo('App\Categorias','categoriaid');
    }

    public function pedidoItem(){

    	return $this->hasOne('App\PedidoItems');
    }
}


