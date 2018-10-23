<?php

namespace Bavix\Leaflet\Tiles;

use Bavix\Leaflet\Tile;

class OpenStreetMapDE extends Tile
{

    /**
     * @return string
     */
    public function layer(): string
    {
        return 'https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png';
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
