<?php

namespace Bavix\Leaflet\Tiles;

use Bavix\Leaflet\Tile;

class OpenStreetMapMapnik extends Tile
{

    /**
     * @return string
     */
    public function layer(): string
    {
        return 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    }

    /**
     * @return string
     */
    public function attribution(): string
    {
        return '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>';
    }

}
