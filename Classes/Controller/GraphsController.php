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

        $options = array_merge($options, [
            'contentUid' => $this->contentUid,
            'horizontal' => $horizontal,
            'stacked' => $stacked,
            'stackedPercent' => true,
            'percentage' => true,
            'offsetX' => $offsetX,
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

        $options = $this->setOptions('candlesticks');

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

        $GLOBALS['TSFE']->additionalFooterData[$txRkwGraphsElement] = '
            <script type="text/javascript">
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
    protected function setOptions($type = null)
    {

        $type = 'text/javascript';

        $title = $this->settings['title'];

        $colors = $this->settings['colors'];
        $labels = $this->settings['labels'];
        $series = $this->settings['series'];

        $xaxisLabel = $this->settings['xaxis']['label'];
        $yaxisLabel = $this->settings['yaxis']['label'];

        $yaxis2Show = $this->settings['bars']['yaxis2']['show'];
        $yaxis2Label = $this->settings['bars']['yaxis2']['label'];

        if ($type === 'candlesticks') {
            $series = (trim($this->settings['series']) !== '') ? $this->settings['series'] : $this->settings['candlesticks']['series']['value'];
        }

        $captionLabel = $this->settings['caption']['label'];
        $caption = $this->settings['caption']['text'];

        $legendShow = filter_var($this->settings['legend']['show'], FILTER_VALIDATE_BOOLEAN);

        return compact(
            'type',
            'title',
            'xaxisLabel',
            'yaxisLabel',
            'yaxis2Show',
            'yaxis2Label',
            'colors',
            'labels',
            'series',
            'captionLabel',
            'caption',
            'legendShow'
        );
    }

}
