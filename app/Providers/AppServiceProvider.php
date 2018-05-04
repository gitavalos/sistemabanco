<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;// Importing DuskServiceProvider class

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Validator::extend('dentrode', function($attribute, $value, $parameters, $validator) {
        $min_field = $parameters[0] + 1;
        $data = $validator->getData();
        $min_value = $min_field;
        return $value < $min_value;
      });   
  
      Validator::replacer('dentrode', function($message, $attribute, $rule, $parameters) {
        return str_replace(':field', $parameters[0],$message);
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      if ($this->app->environment('local', 'testing')) {
        $this->app->register(DuskServiceProvider::class);
      } 
    }
}
