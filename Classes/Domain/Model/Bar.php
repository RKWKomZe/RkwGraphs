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
 * Bar
 */
class Bar extends Graph
{

    /**
     * Bar constructor.
     *
     * @param $settings
     * @param $contentUid
     */
    public function __construct($settings, $contentUid)
    {
        parent::__construct($settings, $contentUid);

        $this->chartType = 'bars';
    }

    /**
     * @return array
     */
    public function process()
    {
        parent::process();

        return array_merge($this->generalOptions, [
            'contentUid'        => $this->contentUid,
            'horizontal'        => filter_var($this->settings['bars']['horizontal'], FILTER_VALIDATE_BOOLEAN),
            'stacked'           => filter_var($this->settings['bars']['stacked'], FILTER_VALIDATE_BOOLEAN),
            'stackedPercent'    => true,
            'percentage'        => true,
            'offsetX'           => $this->settings['bars']['offsetX'],
            'dataLabelsOffsetX' => $this->settings['bars']['dataLabels']['offsetX'],
            'dataLabelsOffsetY' => $this->settings['bars']['dataLabels']['offsetY'],
            'dataLabelsColors'  => $this->settings['bars']['dataLabels']['style']['colors']
        ]);

    }

}