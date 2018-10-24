laravel-admin-leaflet
======

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bavix/laravel-admin-leaflet/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bavix/laravel-admin-leaflet/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/bavix/laravel-admin-leaflet/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bavix/laravel-admin-leaflet/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bavix/laravel-admin-leaflet/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bavix/laravel-admin-leaflet/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/bavix/laravel-admin-leaflet/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

[![Package Rank](https://phppackages.org/p/bavix/laravel-admin-leaflet/badge/rank.svg)](https://packagist.org/packages/bavix/laravel-admin-leaflet)
[![Latest Stable Version](https://poser.pugx.org/bavix/laravel-admin-leaflet/v/stable)](https://packagist.org/packages/bavix/laravel-admin-leaflet)
[![Latest Unstable Version](https://poser.pugx.org/bavix/laravel-admin-leaflet/v/unstable)](https://packagist.org/packages/bavix/laravel-admin-leaflet)
[![License](https://poser.pugx.org/bavix/ip/license)](https://packagist.org/packages/bavix/laravel-admin-leaflet)
[![composer.lock](https://poser.pugx.org/bavix/laravel-admin-leaflet/composerlock)](https://packagist.org/packages/bavix/laravel-admin-leaflet)

![_2018-10-23_16-33-59](https://user-images.githubusercontent.com/5111255/47364262-8ad4fd00-d6e1-11e8-846f-8a44b59993ea.png)

* **Vendor**: bavix
* **Package**: laravel-admin-leaflet
* **Version**: [![Latest Stable Version](https://poser.pugx.org/bavix/laravel-admin-leaflet/v/stable)](https://packagist.org/packages/bavix/laravel-admin-leaflet)
* **PHP Version**: 7.1+ 
* **Laravel Version**: 5.7+ 
* **[Composer](https://getcomposer.org/):** `composer require bavix/laravel-admin-leaflet`

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

---
Supported by

[![Supported by JetBrains](https://cdn.rawgit.com/bavix/development-through/46475b4b/jetbrains.svg)](https://www.jetbrains.com/)
