<?php

namespace Bavix\Leaflet;

use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class LeafletServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(Leaflet $extension)
    {
        if (! Leaflet::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-admin-leaflet');
        }

        $this->app->booted(function () {
            Form::extend('leaflet', LeafletMap::class);
        });
    }
}
