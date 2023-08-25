<?php

namespace LiveControls\Masks;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use LiveControls\Masks\Http\Livewire\CurrencyMask;

class MasksServiceProvider extends ServiceProvider
{
  public function register()
  { 
      $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'livecontrols_masks');
  }

  public function boot()
  {
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'livecontrols-masks');

      Livewire::component('livecontrols-currencymask', CurrencyMask::class);

      Blade::directive('livecontrolsMasks', function () {
        if(config('livecontrols_masks.local_files', false) === false){
          return '<script src="https://unpkg.com/imask"></script>';
        }
        return '';
      });

      
      $this->publishes([
        __DIR__.'/../config/config.php' => config_path('livecontrols_masks.php'),
      ], 'livecontrols.masks.config');
  }
}
