<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pedidos';

    protected $filleable =['subtotal','envio','user_id'];

    

    public function usuarios(){

    	return $this->belongsTo('App\User','user_id');
    }
}
