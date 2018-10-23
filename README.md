laravel-admin extension
======

Get Started
---
```
composer require bavix/laravel-admin-leaflet
```

How to use?
---

```
$form->leaflet('latitude', 'longitude');
```

Configuration
----

```
    /*
    |--------------------------------------------------------------------------
    | Settings for extensions.
    |--------------------------------------------------------------------------
    |
    | You can find all available extensions here
    | https://github.com/laravel-admin-extensions.
    |
    */
    'extensions' => [
        'leaflet' => [
            'enable' => true,
            'config' => [
                // tileLayer
                'tile' => \Bavix\Leaflet\Tiles\OpenStreetMapDE::class, // default \Bavix\Leaflet\Tiles\Sputnik::class

                // marker zoom
                'zoom' => 13, // default maxZoom - 1

                // style GeoSearchControl
                'style' => 'button', // default 'bar'

                // 'bing' or 'google' or 'locationIQ' or 'esri'
                'geoProvider' => 'bing', // default 'OpenStreetMap'
            ],
            'keys' => [
                'bing' => '__YOUR_BING_KEY__',
                'google' => '__YOUR_GOOGLE_KEY__',
                'locationIQ' => '__YOUR_LOCATIONIQ_KEY__',
            ],
        ],
    ],
```
