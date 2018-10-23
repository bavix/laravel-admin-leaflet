laravel-admin-leaflet
======

![_2018-10-23_16-33-59](https://user-images.githubusercontent.com/5111255/47364262-8ad4fd00-d6e1-11e8-846f-8a44b59993ea.png)

Get Started
---
```
composer require bavix/laravel-admin-leaflet
```

How to use?
---

Enable `leaflet` in config. config/admin.php
```
    'extensions' => [
        'leaflet' => [
            'enable' => true,
        ],
    ],
```

Write in the YourController.php
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
