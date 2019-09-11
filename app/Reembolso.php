<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reembolso extends Model
{
    protected $table = 'reembolsos';

    protected $fillable = [
        'consecutivo','concepto','proveedor',
        'importe','archivo','user_id','fechac','estado','agencia_id'
        
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
        
    }

    public function agencia(){
        return $this->belongsTo('App\Agencia','agencia_id');
        
    }

    public function scopeConsecutivo($query, $consecutivo){
        
        if (trim($consecutivo) !="") {
            $query->where('consecutivo','like',"%$consecutivo%");

        }
    }




}
