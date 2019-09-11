<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{

    protected $table = 'integrations';

    protected $fillable = [

        'importefec','importeche','saldob',
        'reembolsop','documentos','otros',
        'comprobado','fondo','diferencia',
        'arqueo_id','user_id'
    ];


    public function user(){
        return $this->belongsTo('App\User','user_id');
        
    }

    public function arqueo(){
        return $this->belongsTo('App\Arqueo','arqueo_id');
        
    }



}
