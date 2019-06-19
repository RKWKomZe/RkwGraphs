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
 * Graph
 */
abstract class Graph extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{


    protected $contentUid;

    protected $settings;

    protected $chartType;

    /**
     * @var array
     */
    protected $generalOptions;

    /**
     * Graph constructor.
     *
     * @param $settings
     * @param $contentUid
     */
    public function __construct($settings, $contentUid)
    {
        $this->settings = $settings;
        $this->contentUid = $contentUid;

        $this->generalOptions = $this->setGeneralOptions();
    }

    /**
     * @return mixed
     */
    public function getChartType()
    {
        return $this->chartType;
    }

    /**
     * @return array
     */
    public function setGeneralOptions()
    {
        $scriptType = 'text/javascript';

        $title = $this->settings['title'];

        $colors = $this->settings['colors'];
        $labels = $this->settings['labels'];
        $series = $this->settings['series'];

        $unit = $this->settings['unit'];

        $xaxisLabel = $this->settings['xaxis']['label'];
        $yaxisLabel = $this->settings['yaxis']['label'];

        $yaxis2Show = $this->settings['bars']['yaxis2']['show'];
        $yaxis2Label = $this->settings['bars']['yaxis2']['label'];

        if ($this->chartType === 'candlesticks') {
            $series = (trim($this->settings['series']) !== '') ? $this->settings['series'] : $this->settings['candlesticks']['series']['value'];
        }

        $caption = $this->settings['caption'];

        $legendShow = filter_var($this->settings['legend']['show'], FILTER_VALIDATE_BOOLEAN);

        return compact(
            'scriptType',
            'title',
            'xaxisLabel',
            'yaxisLabel',
            'yaxis2Show',
            'yaxis2Label',
            'colors',
            'labels',
            'series',
            'unit',
            'caption',
            'legendShow'
        );
    }

    /**
     * @return array
     */
    public function process()
    {
        return array_merge($this->generalOptions, [
            'contentUid' => $this->contentUid
        ]);
    }
}