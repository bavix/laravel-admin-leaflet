<?php

namespace Bavix\Leaflet\Tiles;

use Bavix\Leaflet\Tile;

class Sputnik extends Tile
{

    /**
     * @return string
     * @see http://api.sputnik.ru/maps/tiles/index.html
     */
    public function layer(): string
    {
        return 'http://tiles.maps.sputnik.ru/{z}/{x}/{y}.png?apiKey=' .
            env('SPUTNIK_KEY', '5032f91e8da6431d8605-f9c0c9a00357');
    }

    /**
     * @return string
     */
    public function attribution(): string
    {
        return '<a href="http://maps.sputnik.ru/">Спутник</a> | &copy; Ростелеком | &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>';
    }

}
