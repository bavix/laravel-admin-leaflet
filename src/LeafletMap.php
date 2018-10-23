<?php

namespace Bavix\Leaflet;

use Encore\Admin\Form\Field;
use Bavix\Leaflet\Tiles\Sputnik;
use Illuminate\Support\Str;

class LeafletMap extends Field
{

    /**
     * @var Tile
     */
    protected $tile;

    /**
     * @var string
     */
    protected $view = 'laravel-admin-leaflet::leaflet';

    /**
     * @var array
     */
    protected static $css = [
        'https://unpkg.com/leaflet@1.3.4/dist/leaflet.css',
        'https://unpkg.com/leaflet-geosearch@2.7.0/assets/css/leaflet.css',
    ];

    /**
     * @var array
     */
    protected static $js = [
        'https://unpkg.com/leaflet@1.3.4/dist/leaflet.js',
        'https://unpkg.com/leaflet-geosearch@2.7.0/dist/bundle.min.js',
    ];

    /**
     * LeafletMap constructor.
     * @param $column
     * @param array $arguments
     */
    public function __construct($column, array $arguments)
    {
        $column = [
            'lat' => $column,
            'lng' => \array_shift($arguments),
        ];

        if (empty($arguments)) {
            $arguments = ['Leaflet'];
        }

        $this->options((array)\config('admin.extensions.leaflet.config'));
        parent::__construct($column, $arguments);
    }

    /**
     * @return Tile
     */
    protected function getTile(): Tile
    {
        if (!$this->tile) {
            $class = $this->options['tile'] ?? Sputnik::class;
            $this->tile = new $class();
        }

        return $this->tile;
    }

    /**
     * @return string
     */
    protected function tileOptions(): string
    {
        return \json_encode([
            'attribution' => $this->getTile()->attribution(),
            'maxZoom' => $this->getTile()->maxZoom(),
        ]);
    }

    /**
     * @return int
     */
    protected function zoom(): int
    {
        return $this->options['zoom'] ?? ($this->getTile()->maxZoom() - 1);
    }

    /**
     * @return string
     */
    protected function style(): string
    {
        return $this->options['style'] ?? 'bar';
    }

    /**
     * @return string
     */
    protected function provider(): string
    {
        switch ($this->options['geoProvider'] ?? '') {
            case 'bing': return 'BingProvider';
            case 'esri': return 'EsriProvider';
            case 'google': return 'GoogleProvider';
            case 'locationIQ': return 'LocationIQProvider';
        }

        return 'OpenStreetMapProvider';
    }

    /**
     * @return string
     */
    protected function providerParams(): string
    {
        switch ($this->options['geoProvider'] ?? '') {
            case 'bing':
            case 'google':
            case 'locationIQ':
                return json_encode([
                    'params' => [
                        'key' => config('admin.extensions.leaflet.keys.' . $this->options['geoProvider'])
                    ]
                ]);
        }

        return '';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function render()
    {
        $uuid = Str::uuid();
        $this->variables['uuid'] = $uuid;

        $this->script = <<<script
    var latitude = document.getElementById('{$uuid}{$this->id['lat']}');
    var longitude = document.getElementById('{$uuid}{$this->id['lng']}');
    var map = L.map('$uuid').setView([latitude.value, longitude.value], {$this->zoom()});
    var marker = L.marker([latitude.value, longitude.value]).addTo(map);

    L.tileLayer('{$this->getTile()->layer()}', {$this->tileOptions()}).addTo(map);

    var searchControl = new GeoSearch.GeoSearchControl({
      provider: new GeoSearch.{$this->provider()}({$this->providerParams()}),
      style: '{$this->style()}',
    });

    map.addControl(searchControl);
    map.on('geosearch/showlocation', function (e) {
        latitude.value = e.location.x;
        longitude.value = e.location.y;
    });
script;

        return parent::render();
    }

}
