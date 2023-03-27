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
 * Class Graph
 *
 * @author Christian Dilger <c.dilger@addorange.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwGraphs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @todo since this class is used as abstract class it also should be one!
 */
abstract class Graph extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** @var int  */
    protected int $contentUid = 0;


    /** @var array */
    protected array $settings = [];


    /** @var string */
    protected string $chartType = '';


    /**
     * @var array
     */
    protected array $generalOptions = [];


    /**
     * Graph constructor.
     *
     * @param $settings
     * @param $contentUid
     * @todo Settings shouldn't be handled in models. Models are data-containers and non-functional
     */
    public function __construct($settings, $contentUid)
    {
        $this->settings = $settings;
        $this->contentUid = $contentUid;
        $this->generalOptions = $this->setGeneralOptions();
    }


    /**
     * @return string
     */
    public function getChartType(): string
    {
        return $this->chartType;
    }


    /**
     * @return array
     * @todo this should not be part of a model
     */
    public function setGeneralOptions(): array
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
    public function process(): array
    {
        return array_merge($this->generalOptions, [
            'contentUid' => $this->contentUid
        ]);
    }
}
