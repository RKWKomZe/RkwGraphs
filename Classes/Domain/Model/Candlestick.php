<?php

namespace RKW\RkwGraphs\Domain\Model;

/***
 *
 * This file is part of the "RKW FeeCalculator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Christian Dilger <c.dilger@addorange.de>
 *
 ***/

/**
 * Candlestick
 */
class Candlestick extends Graph
{
    /**
     * Candlestick constructor.
     *
     * @param $settings
     * @param $contentUid
     */
    public function __construct($settings, $contentUid)
    {
        parent::__construct($settings, $contentUid);

        $this->chartType = 'candlesticks';
    }

}