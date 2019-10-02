<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arqueo extends Model
{
    protected $table = 'arqueos';
    protected $fillable = [
        'mil','quinientos','doscientos',
        'cien','cincuenta','veinte',
        'diez','cinco','dos',
        'uno','cincuenta_cent','veinte_cent',
        'diez_cent','cinco_cent','total_efectivo',
        'total_cheques','total','mes',
        'arqueo_id','user_id','agencia_id'


    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
        
    }

    public function agencia(){
        return $this->belongsTo('App\Agencia','agencia_id');
        
    }

    public function integration(){

    }


}
