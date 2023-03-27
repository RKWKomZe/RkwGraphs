<?php

namespace RKW\RkwGraphs\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Class Bar
 *
 * @author Christian Dilger <c.dilger@addorange.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwGraphs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Bar extends Graph
{

    /**
     * Bar constructor.
     *
     * @param $settings
     * @param $contentUid
     * @todo that is not the proper way to handle this in TYPO3. Settings shouldn't be handled in models
     */
    public function __construct($settings, $contentUid)
    {
        parent::__construct($settings, $contentUid);
        $this->chartType = 'bars';
    }


    /**
     * @return array
     * @todo Settings shouldn't be handled in models. Models are data-containers and non-functional
     */
    public function process(): array
    {
        parent::process();

        /** @todo why not using something like settings => $this->settings[$this->chartType]?  */
        return array_merge($this->generalOptions, [
            'contentUid'        => $this->contentUid,
            'horizontal'        => filter_var($this->settings[$this->chartType]['horizontal'], FILTER_VALIDATE_BOOLEAN),
            'stacked'           => filter_var($this->settings[$this->chartType]['stacked'], FILTER_VALIDATE_BOOLEAN),
            'stackedPercent'    => true,
            'percentage'        => true,
            'offsetX'           => $this->settings[$this->chartType]['offsetX'],
            'dataLabelsOffsetX' => $this->settings[$this->chartType]['dataLabels']['offsetX'],
            'dataLabelsOffsetY' => $this->settings[$this->chartType]['dataLabels']['offsetY'],
            'dataLabelsColors'  => $this->settings[$this->chartType]['dataLabels']['style']['colors']
        ]);

    }

}
