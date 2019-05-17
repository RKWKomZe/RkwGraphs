<?php

namespace RKW\RkwGraphs\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/***
 *
 * This file is part of the "RKW Graphs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Steffen Kroggel <developer@steffenkroggel.de>
 *
 ***/

/**
 * GraphsController
 */
class GraphsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * @var
     */
    protected $contentUid;

    /**
     * @var
     */
    protected $chartType;

    /**
     * action pie
     *
     * @return void
     */
    public function donutAction()
    {
        $this->initializeAction();

        $options = $this->setOptions();

        $options = array_merge($options, [
            'contentUid' => $this->contentUid,
        ]);

        $this->view->assignMultiple($options);
    }

    /**
     * action bars
     *
     * @return void
     */
    public function barsAction()
    {
        $this->initializeAction();

        $options = $this->setOptions();

        $stacked = filter_var($this->settings['bars']['stacked'], FILTER_VALIDATE_BOOLEAN);
        $horizontal = filter_var($this->settings['bars']['horizontal'], FILTER_VALIDATE_BOOLEAN);
        $offsetX = $this->settings['bars']['offsetX'];
        $dataLabelsOffsetX = $this->settings['bars']['dataLabels']['offsetX'];
        $dataLabelsOffsetY = $this->settings['bars']['dataLabels']['offsetY'];
        $dataLabelsColors = $this->settings['bars']['dataLabels']['style']['colors'];

        $options = array_merge($options, [
            'contentUid' => $this->contentUid,
            'horizontal' => $horizontal,
            'stacked' => $stacked,
            'stackedPercent' => true,
            'percentage' => true,
            'offsetX' => $offsetX,
            'dataLabelsOffsetX' => $dataLabelsOffsetX,
            'dataLabelsOffsetY' => $dataLabelsOffsetY,
            'dataLabelsColors' => $dataLabelsColors
        ]);

        $this->view->assignMultiple($options);
    }

    /**
     * action candlesticks
     *
     * @return void
     */
    public function candlesticksAction()
    {
        $this->initializeAction();

        $options = $this->setOptions();

        $options = array_merge($options, [
            'contentUid' => $this->contentUid,
        ]);

        $this->view->assignMultiple($options);
    }

    /**
     * @return void
     */
    protected function initializeAction()
    {
        $this->getContentUid();

        $this->chartType = str_replace('Action', '', $this->actionMethodName);

        $this->addRenderCallToFooter();
    }

    /**
     * @return void
     */
    protected function getContentUid()
    {
        $this->contentUid = intval($this->configurationManager->getContentObject()->data['uid']);
    }

    /**
     * @return void
     */
    protected function addRenderCallToFooter()
    {

        $txRkwGraphsChart = 'txRkwGraphsChart' . $this->contentUid;
        $txRkwGraphsChartOptions = 'txRkwGraphsChartOptions' . $this->contentUid;
        $txRkwGraphsElement = 'txRkwGraphsElement' . $this->contentUid;
        $txRkwGraphsChartInit = 'txRkwGraphsChartInit' . $this->contentUid;

        $GLOBALS['TSFE']->additionalFooterData[$txRkwGraphsElement] = '
            <script type="text/javascript">
                
                if (typeof ' . $txRkwGraphsChartOptions . '.dataLabels !== "undefined") {
                    ' . $txRkwGraphsChartOptions . '.dataLabels.formatter = function(val) {
                        return Math.abs(val) + ' . $txRkwGraphsChartInit . '.unit;
                    };
                }
                
                if (typeof ' . $txRkwGraphsChartOptions . '.tooltip.y !== "undefined") {
                    ' . $txRkwGraphsChartOptions . '.tooltip.y.formatter = function(val) {
                        return Math.abs(val) + ' . $txRkwGraphsChartInit . '.unit;
                    }
                }
                
                 if ("' . $this->chartType . '" !== "candlesticks" && typeof ' . $txRkwGraphsChartOptions . '.yaxis !== "undefined") {
                    ' . $txRkwGraphsChartOptions . '.yaxis[0].labels.formatter = function(val) {
                        if (isNaN(val)) {
                            var strArray = val.toString().split("#");
                            if (typeof strArray[0] !== "undefined") {
                                return strArray[0]
                            }
                            return val
                        }
                        return Math.abs(Math.round(val)) + ' . $txRkwGraphsChartInit . '.unit;
                    }
                 }

                var ' . $txRkwGraphsChart . ' = new ApexCharts(
                    document.querySelector("#' . $txRkwGraphsChart . '"),
                    ' . $txRkwGraphsChartOptions . '
                );
                ' . $txRkwGraphsChart . '.render();

            </script>
        ';
    }

    /**
     * @param null $type
     *
     * @return array
     */
    protected function setOptions()
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

}
