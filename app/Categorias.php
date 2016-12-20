<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorias';

    protected $filleable =['nombre','rubro_id','eliminado'];

    public $timestamps = false;

public function product(){

	return $this.hasMany('App\Productos');
}


}
?>