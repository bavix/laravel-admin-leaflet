<?php

namespace Bavix\Leaflet;

abstract class Tile
{
    /**
     * @return string
     */
    abstract public function layer(): string;

    /**
     * @return string
     */
    abstract public function attribution(): string;

    /**
     * @return int
     */
    public function maxZoom(): int
    {
        return 19;
    }

}
