<?php

namespace Pyz\Shared\PlanetSearch;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
class PlanetSearchConstants
{
    /**
     * Specification:
     * - Queue name as used for processing planet messages
     *
     * @api
     *
     * @var string
     */
    public const PLANET_SYNC_SEARCH_QUEUE = 'sync.search.planet';
}
