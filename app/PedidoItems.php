<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoItems extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pedido_items';

    protected $filleable =['precio','cantidad','producto_id','pedido_id'];

    public $timestamps = false;

    public function pedido(){

    	return $this->belongsTo('App\Pedidos','pedido_id');
    }
    public function producto(){

    	return $this->belongsTo('App\Productos','producto_id');
    }
}
