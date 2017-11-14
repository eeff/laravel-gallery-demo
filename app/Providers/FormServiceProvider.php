<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('text', 'componets.form.text', ['name', 'value' => null, 'attributes' =>[]]);
        \Form::component('textarea', 'componets.form.text', ['name', 'value' => null, 'attributes' =>[]]);
        \Form::component('tsubmit', 'componets.form.text', ['name', 'value' => null, 'attributes' =>[]]);
        \Form::component('hidden', 'componets.form.text', ['name', 'value' => null, 'attributes' =>[]]);
        \Form::component('file', 'componets.form.text', ['name', 'attributes' =>[]]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
