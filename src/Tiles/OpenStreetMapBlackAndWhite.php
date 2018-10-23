<?php

namespace Bavix\Leaflet\Tiles;

use Bavix\Leaflet\Tile;

class OpenStreetMapBlackAndWhite extends Tile
{

    /**
     * @return string
     */
    public function layer(): string
    {
        return 'http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png';
    }

    /**
     * @return string
     */
    public function attribution(): string
    {
        return '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>';
    }

    /**
     * @return int
     */
    public function maxZoom(): int
    {
        return 18;
    }

}
