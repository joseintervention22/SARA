<?php

namespace App\Providers;

use App\Reembolso;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //USUARIO DE AGENCIA EDITOR
        view()->composer('fragments.messages',function($view){
            $usuario = Auth::id();
            $estados = Reembolso::where('user_id',$usuario)
            ->where('estado','<=',5)
            ->count();
            $est = Reembolso::where('user_id',$usuario)
            ->where('estado','<=',5)
            ->get();
            $view
                ->with('user', $estados)
                ->with('est', $est);
        });
        //RECHAZOS AGENCIA
        view()->composer('fragments.tasks',function($view){
            $usuario = Auth::id();
            $errorcont = Reembolso::where('user_id',$usuario)->where('estado','>=',7)->count();
            $rechazos = Reembolso::where('user_id',$usuario)->where('estado','>=','7')->get();
            $view ->with('errorcont',$errorcont)
                  ->with('rechazos',$rechazos);
        });

        //USUARIO REVISOR EN ZONA
        view()->composer('fragments.notifications',function($view){
            $errorcont = Reembolso::where('estado','=',1)->count();
            $inbox = Reembolso::where('estado','=',1)->get();
 
            $view->with('conteo',$errorcont)
                 ->with('inbox',$inbox);
        });
        //RECHAZOS REVISOR
        view()->composer('fragments.tasks2',function($view){
            $errorcont = Reembolso::where('estado','>=',8)->count();
            $rechazos  = Reembolso::where('estado','>=',8)->get();
 
            $view->with('errorcont',$errorcont)
                 ->with('rechazos',$rechazos);
        });


        //USUARIO FIRMA EN ZONA
        
        view()->composer('fragments.firma.notifications',function($view){
            $errorcont = Reembolso::where('estado','=',2)->count();
            $inbox = Reembolso::where('estado','=',2)->get();

            $view->with('conteo',$errorcont)
                 ->with('inbox',$inbox);
        });
        //RECHAZOS FIRMA
        view()->composer('fragments.firma.tasks',function($view){
            $errorcont = Reembolso::where('estado','>=',9)->count();
            $rechazos = Reembolso::where('estado','>=',9)->get();

            $view->with('errorcont',$errorcont)
                 ->with('rechazos',$rechazos);
        });

        //USUARIO PAGA EN ZONA

        view()->composer('fragments.pago.notifications',function($view){
            $errorcont = Reembolso::where('estado','=',3)->count();
            $inbox = Reembolso::where('estado','=',3)->get();

            $view->with('conteo',$errorcont)
                 ->with('inbox',$inbox);
        });
        //RECHAZOS PAGA
        view()->composer('fragments.pago.tasks',function($view){
            $errorcont = Reembolso::where('estado','>=',10)->count();
            $rechazos = Reembolso::where('estado','>=',10)->get();

            $view->with('errorcont',$errorcont)
                 ->with('rechazos',$rechazos);
        });



        //USUARIO OFICINA DE FINANZAS
        view()->composer('fragments.finanzas.notifications',function($view){
            $errorcont = Reembolso::where('estado','=',4)->count();
            $inbox = Reembolso::where('estado','=',4)->get();

            $view->with('conteo',$errorcont)
                 ->with('inbox',$inbox);
        });




    }
}
